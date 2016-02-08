<?php
class View{

	private $path = 'templates';
	private $template = 'default';
	private $language = 'de';

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
		
		// activate output buffer
		ob_start();
		if ($exists){
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
	
}
?>