<?php
class Quote {
	private $user_id;
	private $date;
	private $quote;
	private $author;
	private $help;
	
	
	public function __construct($request){
		
		// fill up object from post data if exists
		foreach ($this->getClassVars() as $vari){
			if(isset($request[$vari])){
				$this->$vari = $request[$vari];
			}
		}
		// int value
		if($this->user_id) {
			$this->user_id = intval($this->user_id);
		}
		
	}
	
	/**
	 * @param Object $model - db ref
	 * @return Boolean true if successful
	 */
	public function save($model){
		
		// prepare counter
		if(!($this->user_id > 0)){
			$this->user_id = $model->getNextSequence("quote");
		}
		
		// prepare date dd.mm.yyyy to date object
		$this->date = $model->convertToDatabaseValue($this->date);
		
		$search_data = array('user_id'=>$this->user_id);
		$new_data = $model->objectToArray($this);
		
		return $model->upsert("quote", $search_data, $new_data);
	}
	
		/**
	 * @param Object $model - db ref
	 * @return Boolean true if successful
	 */
	public function delete($model){
		
		// id is needed
		if(!($this->user_id > 0)){
			return false; 
		}
		$search_data = array('user_id'=>$this->user_id);
		
		return $model->delete("quote", $search_data);
	}
	
	/**
	 * @return Array of all class vars 
	 */
	public function getClassVars(){
		return array_keys(get_class_vars(get_class($this)));
	}
	
	/**
	 * @param String name of vari
	 * @return variable (if allowed)  
	 */
	public function getVari($vari){
		// refuse new varis if necessary!
		return $this->$vari;
	}
	
	
}

?> 