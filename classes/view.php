<?php
class View{

	private $path = 'templates';
	private $template = 'default';
	
	private $language = 'de';
	private $js_active = null;

	/**
	 * includes all varis for template 
	 */
	private $_ = array();

	/**
	 * @param string $lang, string $js
	 */
	public function __construct($lang, $js){
		if (!empty($lang)){
			 $this->language = $lang;
		}
		if (!empty($js)){
			 $this->js_active = $js;
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
	public function getJS(){
		return $this->js_active;
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
		$this->prepareTemplate();
		
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
			include $this->path . DIRECTORY_SEPARATOR . '404.php';
		}
			$output = ob_get_contents();
		// clean and deactivate output buffer
		ob_end_clean();
		
		return $output;
	}
	
	private function prepareTemplate(){
		$this->assign("lang", $this->language);
		$this->assign("js", $this->js_active);
	}
}
?>