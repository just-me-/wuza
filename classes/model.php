<?php
class Model{

	// tmp zweidimensionales Array
	private static $entries = array(
		array("id"=>0, "title"=>"Eintrag 1", "content"=>"Ich bin der erste Eintrag."),
		array("id"=>1, "title"=>"Eintrag 2", "content"=>"Ich bin der ewige Zweite!"),
		array("id"=>2, "title"=>"Eintrag 3", "content"=>"Na dann bin ich die Nummer drei.")
	);
	private static $menu = array(
		array("file"=>"default", "title"=>"Home"),
		array("file"=>"music", "title"=>"Music"),
		array("file"=>"stories", "title"=>"Stories"),
		array("file"=>"projects", "title"=>"Projects"),
		array("file"=>"contact", "title"=>"About Me"),
		array("file"=>"impressum", "title"=>"Impressum"),
	);

	/**
	 * @return Array Array
	 */
	public static function getEntries(){
		return self::$entries;
	}

	/**
	 * @param int $id Id of entry
	 * @return Array Array, if exists
	 * 						else null
	 */
	public static function getEntry($id){
		if(array_key_exists($id, self::$entries)){
			return self::$entries[$id];
		}else{
			return null;
		}
	}
	
	/**
	 * @return Array Array
	 */
	public static function getMenu(){
		return self::$menu;
	}
}
?>