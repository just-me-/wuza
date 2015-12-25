<?php
class View{

	private $path = 'templates';
	private $template = 'default';

	/**
	 * includes all varis for template 
	 */
	private $_ = array();

	/**
	 * @param String $key 
	 * @param String $value
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
			include $this->path . DIRECTORY_SEPARATOR . '404.php';
		}
			$output = ob_get_contents();
		// clean and deactivate output buffer
		ob_end_clean();
		
		return $output;
	}
}
?>