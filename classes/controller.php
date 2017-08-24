<?php
class Controller{

	private $request = null;
	private $template = '';
 	private $view = null;
 	private $model = null;

	/**
	 * @param Array $request Array from $_GET & $_POST.
	 */
	public function __construct($request){
		$this->view = new View($request);
		$this->model = new Model($request);
		
		$this->request = $request;
		$this->template = !empty($request['view']) ? $request['view'] : 'default';
	}

	/**
	 * @return String Content
	 */
	public function display(){
		$view = new View($this->request);
		$header_titel = "WUZA";
		$header_description = Model::getMeta("description", $this->template);
		$header_keywords = Model::getMeta("keywords", $this->template);
		
		// 2Do: not 100x case...
		switch($this->template){
			case 'entry':
				$view->setTemplate('entry');
				$entryid = $this->request['id'];
				$entry = Model::getEntry($entryid);
				$view->assign('title', $entry['title']);
				$view->assign('content', $entry['content']);
				$header_titel .= " - ". $entry['title'];
				break;
				
			case 'default':
				$view->setTemplate($this->template);
				$quotes = $this->model->find("quote", array(
															"sort"=>array("date"=>-1),
															"dates"=>array("date"),
															"limit"=>1,
															"filter"=>array(
																			'date'=>array( '$lte'=>New Mongodate(time()) )
																			)
															)
											 );
				$test = array_shift(array_values($quotes)); 
				$view->assign("quote", $test);
				break;
				
			case 'pdf':
				$header_titel .= " - " . Model::getTranslation($this->template);
				$pdf = Model::getPDF($this->request['file']);
				if($pdf){
					$view->setTemplate($this->template);
					foreach(array('description', 'background', 'source', 'link', 'version') as $vari) {
						$view->assign($vari, $pdf[$vari]);
					}
				}else{
					$view->setTemplate('404');
				}
				break;
			
			case 'projects':
				$header_titel .= " - " . Model::getTranslation($this->template);
				$view->setTemplate($this->template);
				$projects = Model::getProjects();
				$view->assign($this->template, $projects);
				break;
			
			case 'quotes':
				$header_titel .= " - " . Model::getTranslation($this->template);
				$view->setTemplate($this->template);
				$quotes = $this->model->find("quote", array(
															"sort"=>array("date"=>-1),
															"dates"=>array("date"),
															"limit"=>10,
															"filter"=>array(
																			'date'=>array( '$lte'=>New Mongodate(time()) )
																			)
															)
											 );
				$view->assign($this->template, $quotes);
				break;
			
			case 'music':
				$header_titel .= " - " . Model::getTranslation($this->template);
				$view->setTemplate($this->template);
				$songs = Model::getSongs();
				$view->assign('songs', $songs);
				break;
			
			default:
				$template = preg_replace("/[^a-z_']+/i", '', strtolower($this->template));
				$view->setTemplate($template);
				$view->assign('content', $view->loadTemplate());
				$template_trans = Model::getTranslation($this->template);
				if ($template_trans) {
					$header_titel .= " - " . $template_trans;
				}
		}
		
		$this->view->assign('header_titel', $header_titel);
		$this->view->assign('header_description', $header_description);
		$this->view->assign('header_keywords', $header_keywords);
		$this->view->setTemplate('wuza');
		
		$this->view->assign('active_view', $this->request['view']);
		$this->view->assign('version', $this->request['version']);
		$this->view->assign('last_update', $view->getLastUpdate($this->request['last_update']));
		$this->view->assign('menu', Model::getMenu());
		$this->view->assign('locales', Model::getLocales());
		$this->view->assign('content', $view->loadTemplate());
		
		return $this->view->loadTemplate();
	}
	
	/**
	 * @return String Content
	 */
	public function display_admin(){
		
		$show_backend = false; 
		
		if($_SESSION["wuzadmin"] === true){
			// logged in - do actions
			$show_backend = true; 
			
		} else{
			// login infos to check?
			if($this->request['username'] && $this->request['password']){
				// strip
				$username = $this->strip_strong($this->request['username']); 
				$password = $this->strip_strong($this->request['password']);
				// check 
				if(($username == $this->request['backend']['user']) && ($password == $this->request['backend']['password'])){
					// access granted
					$_SESSION["wuzadmin"] = true;
					$show_backend = true;
				} else{
					// show login again
					$show_backend = false;
				}
			} else{
				// show login form
				$show_backend = false;
			}
		}
		
		if($show_backend == true && $this->request['action'] != 'logout') {
			$view = new View($this->request);
			
			// show a page
			$page = ($this->request['page']) ? "admin_" . $this->request['page'] : 'admin_home';
			$view->setTemplate($page);
			$view->setBackend(true);
			
			// do an action if requested
			if($this->request['action']){
				switch($this->request['action']){
					case 'save_quote':
						$quote = new Quote($this->request);
						$status = ($quote->save($this->model)) ? "success" : "error"; 
						$view->assign('saved', $status);
						break;
					case 'delete_quote':
						$quote = new Quote($this->request);
						$status = ($quote->delete($this->model)) ? "deleted" : "error"; 
						$view->assign('saved', $status);
						break;
					case 'list_quotes':
						$quotes = $this->model->find("quote", array("sort"=>array("date"=>-1), "dates"=>array("date")));
						$view->assign('quotes', $quotes);
						break;
					case 'get_quote':
						$quote = $this->model->find("quote", array("filter"=>array('user_id' => intval($this->request['user_id'])), "dates"=>array("date")));
						$view->assign('quote', $quote);
						break;
					default:
						// do nothing at all
				}
			}
			
			$this->view->assign('admin_content', $view->loadTemplate());
			$this->view->setTemplate('admin_wuza');

		} else{
			if($_SESSION["wuzadmin"] == true){
				$_SESSION["wuzadmin"] = false;
			}
			$this->view->setTemplate('admin_login');
		}
		
		$this->view->setBackend(true);
		return $this->view->loadTemplate();
	}
	
	/**
	 * @param String $input
	 * @return String - strong stripped
	 */
	private function strip_strong($input) {
		$allowed_chars = "/[^0-9a-zA-Z-_\(\)\+]/";
		return preg_replace($allowed_chars, "", strip_tags($input));
	}
	
	public function update_session(){
		$_SESSION["js"] 	= $this->request['js'];
		$_SESSION["lang"] 	= $this->view->getLang();
	}
}
?>