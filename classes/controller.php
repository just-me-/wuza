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
				$view->setTemplate('default');
				$view->assign('entries', $entries);
				break;
			
			case 'projects':
				$projects = Model::getProjects();
				$view->setTemplate('projects');
				$view->assign('projects', $projects);
				$header_titel .= " - " . Model::getTranslation("projects");
				break;
			
			case 'music':
				$songs = Model::getSongs();
				$view->setTemplate('music');
				$view->assign('songs', $songs);
				$header_titel .= " - " . Model::getTranslation("music");
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
		// tmp - fix coded for every page
		$this->view->assign('header_description', 'Herzlich willkommen bei WUZA! Dem Freizeitprojekt von Marcel Hess. Auf WUZA findest Du Diverses bezüglich Code, Musik und vielem mehr.');
		$this->view->assign('header_keywords', 'wuza, marcel, hess, wusa');
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