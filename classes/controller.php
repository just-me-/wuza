<?php
class Controller{

	private $request = null;
	private $template = '';
 	private $view = null;

	/**
	 * @param Array $request Array from $_GET & $_POST.
	 */
	public function __construct($request){
		$this->view = new View($request);
		
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
				$entries = Model::getEntries();
				$view->setTemplate($this->template);
				$view->assign('entries', $entries);
				break;
				
			case 'pdf':
				$header_titel .= " - " . Model::getTranslation($this->template);
				$pdf = Model::getPDF($this->request['file']);
				if($pdf){
					$view->setTemplate($this->template);
					foreach(array('description', 'background', 'source') as $vari) {
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
				$projects = Model::getQuotes();
				$view->assign($this->template, $projects);
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
	
	public function update_session(){
		$_SESSION["js"] 	= $this->request['js'];
		$_SESSION["lang"] 	= $this->view->getLang();
	}
}
?>