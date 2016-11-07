<?php
class View{

	private $path = 'templates';
	private $template = 'default';
	private $language = 'de';
	private $backend = false;

	/**
	 * includes all varis for template 
	 */
	private $_ = array();

	/**
	 * @param string $lang, string $js
	 */
	public function __construct($request){
		
		$this->assign('url', $request['link']."/");		
		if (!empty($request['lang'])){
			 $this->language = $request['lang'];
		}
		$this->assign("lang", $this->language);
		
		foreach (array("debug_mode", "js") as $key) {
			$this->assign($key, $request[$key]);
		}
	}
	
	/**
	 * @param string $key string $value
	 */
	public function assign($key, $value){
		$this->_[$key] = $value;
	}

	/**
	 * @param Boolean $value - true
	 * allow for admin backend templates
	 */
	public function setBackend($value){
		if($value === true){
			$this->backend = true;
		}
	}
	
	/**
	 * @param String $template name of template
	 * unless $template => $template eq 'default'
	 */
	public function setTemplate($template = 'default'){
		$this->template = $template;
	}
	
	/**
	 * @return string
	 */
	public function getTemplate(){
		return $this->template;
	}
	
	/**
	 * @return string
	 */
	public function getLang(){
		return $this->language;
	}
	
	/**
	 * @param String default date "dd.mm.jjjj"
	 * @return string
	 */
	public function getLastUpdate($default_date){
		$file_time = filemtime($this->path . DIRECTORY_SEPARATOR . $this->template . '.php'); 
		$file_date = date ("d.m.Y", $file_time);
		return $file_time ? $file_date : $default_date;
	}
	
	/**
	 * @param string $tpl name of template file - if not alrdy set via setTemplate()
	 * @return string Der Output des Templates.
	 */
	public function loadTemplate(){
		$tpl = $this->template;
		$file = $this->path . DIRECTORY_SEPARATOR . $tpl . '.php';
		$exists = file_exists($file);
		
		// protect admin files 
		$allowed = true;
		if (preg_match("/^admin|admin_/i", $tpl) && $this->backend != true){
			$allowed = false;	
		}
		
		// activate output buffer
		ob_start();
		if ($exists && $allowed){
			include $file;
		}
		else {
			// could not find template
			header("HTTP/1.0 404 Not Found");
			include $this->path . DIRECTORY_SEPARATOR . '404.php';
		}
			$output = ob_get_contents();
		// clean and deactivate output buffer
		ob_end_clean();
		
		return $output;
	}
	
	/**
	 * @param String link => default eq 'https://github.com/just-me-'
	 * @return string HTML - GitHub Icon
	 */
	private function getGitHubRibbon($link = 'https://github.com/just-me-'){
		return '<a href="'.$link.'" target="_blank" class="github-corner">
			<svg viewBox="0 0 250 250">
				<title>GitHub</title>
				<path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z" fill="#151513"></path>
				<path class="octo-arm" d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="#ffffff" style="transform-origin: 130px 106px;"></path>
				<path class="octo-body" d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="#ffffff"></path>
			</svg>
		</a>';
	}
	
}
?>