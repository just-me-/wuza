<?php
class Model{

	// tmp zweidimensionale Arrays
	private static $entries = array(
		array("id"=>0, "title"=>"Eintrag 1", "content"=>"Ich bin der erste Eintrag."),
		array("id"=>1, "title"=>"Eintrag 2", "content"=>"Ich bin der ewige Zweite!"),
		array("id"=>2, "title"=>"Eintrag 3", "content"=>"Na dann bin ich die Nummer drei.")
	);
	private static $projects = array(
		array("template" =>"build_tool",	"title"=>"Build Tool - das WBB Plugin",
			"content"=>"WBB steht für \"WoltLab Burning Board\". Ein kleines Tool - einst für Gw2 - derweilen für ESO."),
		array("template" =>"ios_started", 	"title"=>"iOS - AppQuest und FlappyBird", "content"=>""),
		array("template" =>"js_mario", 	"title"=>"JS - Mario neu erfunden", "content"=>""),
		array("template" =>"ipa", 	"title"=>"Meine IPA",
			"content"=>"IPA steht für individuelle praktische Arbeit.
			 Mein Thema war der vollautomatische Registrierungsprozess für die Cloud ERP-Lösung \"SQL-Ledger\"."),
		array("template" =>"wuza", 	"title"=>"WUZA - das Webprojekt", "content"=>"")
	);
	private static $songs = array(
		array("title"=>"Song 1", "artist"=>"Muster Max", "youtube_link"=>"http://youtube.com/hjdhf", "applemusic_link"=>"http://apple.com"),
		array("title"=>"Song 2", "artist"=>"Muster Hans", "youtube_link"=>"Hanna's & Petör", "applemusic_link"=>""),
		array("title"=>"Song 3", "artist"=>"Muster Peter", "youtube_link"=>"", "applemusic_link"=>"http://apple.com", "description"=>"Ein Test.")
	);
	private static $quotes = array(
		array("quote"=>"Blabla", "author"=>"max muster", "help"=>"lololol"),
	);
	
	// menu names and linked files
	private static $menu = array(
		array("file"=>"default"),
		array("file"=>"music"),
		array("file"=>"stories"),
		array("file"=>"projects"),
		array("file"=>"contact"),
		array("file"=>"social"),
		array("file"=>"impressum"),
	);
	
	// translations
	private static $locales = array(
		// menu
		'default'			=> array("de"=>"Home", 	"en"=>"Home"),
		'music'			=> array("de"=>"Musik", 	"en"=>"Music"),
		'stories'			=> array("de"=>"Stories", 	"en"=>"Stories"),
		'projects'			=> array("de"=>"Projekte", 	"en"=>"Projects"),
		'contact'			=> array("de"=>"Über mich", 	"en"=>"About Me"),
		'social'			=> array("de"=>"Soziales", 	"en"=>"Social"),
		'impressum'			=> array("de"=>"Impressum", 	"en"=>"Impressum"),
		// projects
		'project_build_tool'	=> array("de"=>"Build Tool", 	"en"=>"Build Tool"),
	);

	/**
	 * @return Array Array
	 */
	public static function getEntries(){
		return self::$entries;
	}
	
	/**
	 * @param string $term, $lang [default == de]
	 * @return Array Array
	 */
	public static function getTranslation($term, $lang = 'de'){
		return self::$locales[$term][$lang];
	}
	
	/**
	 * @return Array Array
	 */
	public static function getLocales(){
		return self::$locales;
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
	public static function getProjects(){
		return self::$projects;
	}
	
	/**
	 * @return Array Array
	 */
	public static function getSongs(){
		self::prepareSongLinks();
		return self::$songs;
	}
	
	private static function prepareSongLinks(){
		foreach (self::$songs as &$song) {
			if (!preg_match('/youtube\.com/i', $song['youtube_link']) && $song['youtube_link']) {
				$song['youtube_link'] = 'https://www.youtube.com/results?search_query='. urlencode($song['youtube_link']);
			}
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