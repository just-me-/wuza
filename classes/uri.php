<?php
class URI {
	private $uri;
	private $uriParts = array();
	private $data;
	private $isPrettyUrl = true;
	private $currentURI;
	private $currentURL;
	private $scheme;
	private $host;
	private $port;
	private $user;
	private $pass;
	private $path;
	private $query;
	private $fragment;
	
	public function __construct($strip_vari) {
		$this->currentURI = parse_url($_SERVER["SCRIPT_URI"]);
		$this->port = $_SERVER["SERVER_PORT"];
		$this->host = $_SERVER["SERVER_NAME"];
		$this->scheme = $this->currentURI["scheme"];
		$this->getPath($strip_vari);
		
		//build the current url before anything is done
		$this->currentURL = $this->buildURL();
	}
	
	/**
	* @return string The full url of the current page is returned */
	public function getCurrentURL(){
		return $this->currentURL;
	}
	
	/**
	* @param string $varName the key to which a value must be returned
	* @return string the value of the query parameter is returned e.g
	* if url is path/name and @param $varName is path then "name" is returned
	* returns null if the requested var does not exist */
	public function getVar($varName) {
		if (isset($this->data[$varName])) {
			return $this->data[$varName];
		 } else {
			return NULL;
		 }
	}
	
	/**
	* @param string $varName the name of the key you wish to set a value to
	* this can be an existing key, in which case the old value is overriden
	* @param string $value */
	public function setVar($varName, $value) {
		$this->data[$varName] = $value;
	}
	
	/**
	* @param string $needed Name of needed param
	* if there are params but not the needed one you should show page 404
	* @param bool you should, you should not */
	public function shouldShow404($needed) {
		$keys = array_keys($this->data);
		if( ($keys[0]) && (!($this->getVar($needed))) ) {
			// get params but the needed one is not set or empty 
			return TRUE; 
		} else {
			// get no params at all or get all whats needed
			return FALSE; 
		}
	}
	
	/**
	* Only call this method if you do not want to include all the existing
	* varaibles/data from the current url, in which case you must
	* use setVar to set the query strign parameters you need */
	public function emptyQueryString() {
		$this->data = NULL;
	}
	
	/**
	* @return string returns the base domain without trailing slash */
	public function getHost(){
		return $this->scheme . "://" . $this->host;
	}
	
	public function buildURL() {
		$base = $this->scheme . "://" . $this->host . "/";
		$q = "";
		foreach ($this->data as $key => $val) {
			if ($this->isPrettyUrl == true) {
				//if key is not empty
				if(!empty($key))
					$q.=$key . "/" . $val . "/";
			 } else {
				//if empty we need a ?
				if (empty($q)) {
					$q.="?" . $key . "=" . $val;
				} else {
					$q.="&" . $key . "=" . $val;
				}
			}
		}
		return $base . $q;
	}
	
	private function getPath($strip_vari) {
		// Get the URL path...everything after the domain name
		$this->uri = $_SERVER['REQUEST_URI'];
		if($strip_vari) {
			$this->uri = preg_replace("/\/$strip_vari/", '', $this->uri);
		}
			
		if (preg_match('/\/index\.php\?|\/\?/', $this->uri)) {
			//only case where we can say for sure that its not a pretty url
			$this->isPrettyUrl = false;
			$this->parseQueryString();
		} else {
			// IF ? is found at an position >1 then still parse
			//can be found at domain.com/? or domain.com/path? or domain.com/path/?
			if (strpos($this->uri, "?") >1) {
				//remove the query string first i.e path/?some=value
				$parts = split('\?', $this->uri);
				
				//set new uri for parsequerystring to operate on
				$this->uri = $parts[1];
				$this->parseQueryString(); //parse query string and join data
				
				//now have idx 0 = path and idx 1 = some=value
				//set new uri for parse to operate on
				$this->uri = $parts[0];
				$this->parse();
			} else {
				$this->parse();
			}
		}
	}
	
	private function parseQueryString() {
		//parse query string $this->uriParts = parse_url($this->uri);
		$parts = "";
		if (isset($this->uriParts["query"])) {
			//parse the query string and stick its values into data
			parse_str($this->uriParts["query"], $parts);
		} else {
			parse_str($this->uriParts["path"], $parts);
		}
		//merge the query string with anything already in data
		$this->data = array_merge((array) $parts, (array) $this->data);
	}
	
	/**
	* if directory style url then parse parts */
	private function parse() {
		//// Split URL into array
		$this->uriParts = explode('/', $this->uri);
		
		//first element is always empty so remove it
		array_shift($this->uriParts);
		
		//domain.com/key/value is the format
		//every second part is a value and the first is the key
		$i = 0; //counter i, when =1 its a value when =0 its a key
		//on second iteration
		$key = ""; //need to store the key on the first iteration to access data array
		foreach ($this->uriParts as $part) {
			if ($i == 0) {
				//if i==0 then its a key so set it to an empty string
				$this->data[$part] = "";
				$key = $part;
				$i++; //only increment if i==0
			 } else {
				//need to make first letter upper case if the key is view
				if ($key == "view") {
					$this->data[$key] = ucfirst($part);
				} else {
					$this->data[$key] = $part;
				}
				//lets make sure we destroy this key since the value is now assigned
				unset($key);
					$i = 0; //reset to get next key
			 }
		}
	}
}

?> 