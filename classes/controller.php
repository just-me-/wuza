<?php
class Controller{

	private $request = null;
	private $template = '';
	private $view = null;

	/**
	 * @param Array $request Array from $_GET & $_POST.
	 */
	public function __construct($request){
		$this->view = new View();
		$this->request = $request;
		$this->template = !empty($request['view']) ? $request['view'] : 'default';
	}

	/**
	 * @return String Content
	 */
	public function display(){
		$view = new View();
		switch($this->template){
			case 'entry':
				$view->setTemplate('entry');
				$entryid = $this->request['id'];
				$entry = Model::getEntry($entryid);
				$view->assign('title', $entry['title']);
				$view->assign('content', $entry['content']);
				break;
				
			case 'default':
				$entries = Model::getEntries();
				$view->setTemplate('default');
				$view->assign('entries', $entries);
				break;
			
			default:
				$template = preg_replace("/[^a-z']+/i", '', strtolower($this->template));
				$view->setTemplate($template);
				$view->assign('content', $view->loadTemplate());
		}
		
		$this->view->setTemplate('wuza');
		$this->view->assign('blog_title', 'WUZA');
		$this->view->assign('blog_footer', 'by /mh');
		$this->view->assign('active_view', $this->request['view']);
		$this->view->assign('version', $this->request['version']);
		$this->view->assign('blog_menu', Model::getMenu());
		$this->view->assign('blog_content', $view->loadTemplate());
		return $this->view->loadTemplate();
	}
}
?>