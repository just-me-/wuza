<?php
class Model{

	// tmp zweidimensionale Arrays - werden nach Implementation des Adminbereiches in DB ausgelagert 
	private static $entries = array(
		array("id"=>0, "title"=>"Eintrag 1", "content"=>"Ich bin der erste Eintrag."),
		array("id"=>1, "title"=>"Eintrag 2", "content"=>"Ich bin der ewige Zweite!"),
		array("id"=>2, "title"=>"Eintrag 3", "content"=>"Na dann bin ich die Nummer drei.")
	);
	private static $projects = array(
		array("template" =>"event", 		"title"=>"Eventorganisation",  				"time"=>"Februar 2016",
			  "content"=>"Klassische Postkarten als Einladungen für Events zu verschicken, ist nicht mehr zeitgemäss. Ein paar Codezeilen und die Webversion der interaktiven Einladung inklusive Ablaufsprogramm ist per Link für alle Gäste publiziert."),
		
		array("template" =>"wuza", 			"title"=>"WUZA - das Webprojekt", "content"=>"", "time"=>"seit Ende 2015",
			  "content"=>"Um neue Bereiche zu erlernen, Bekanntes zu vertiefen und Erschaffenes zu publizieren, wurde das Projekt WUZA ins Rollen gebracht."),
		
		array("template" =>"ipa", 			"title"=>"Meine IPA", 						"time"=>"März 2015",
			"content"=>"Ende Februar bis anfangs März absolvierte ich meine individuelle praktische Arbeit - kurz IPA.
			 Mein Thema war der vollautomatische Registrierungsprozess für die Cloud ERP-Lösung \"SQL-Ledger\"."),
		
		array("template" =>"build_tool",	"title"=>"Build Tool - das WBB Plugin",
			"content"=>"WBB steht für \"WoltLab Burning Board\" und ist eine verbreitete Forensoftware für Communities. Dafür habe ich ein kleines Tool - einst für Gw2, derweilen für ESO - in PHP geschrieben."),
		
		array("template" =>"ibc",			"title"=>"IBC Switzerland Webauftritt", 	"time"=>"Sommer 2014", 		"content"=>"Ein bis heute kleines aber feines Projekt, welches einst eventuell wieder aufgefasst wird:
			  In kürzester Zeit wurde spontan eine Internetpräsenz erschaffen."),
		
		array("template" =>"js_mario", 		"title"=>"JavaScript Mario", 				"time"=>"", 				"content"=>"Der kleine Protagonist wird von Bomben bedroht!"),
		array("template" =>"ios_started", 	"title"=>"iOS AppQuest und FlappyBird", 	"time"=>"im Jahr 2014", 	"content"=>"Die ersten Schritte in Objective-C und Swift."),
		array("template" =>"ios_started", 	"title"=>"SRF Migrationsprojekt", 		"time"=>"Sommer 2013",
			  "content"=>"Die drei Jahrgangsbesten der Berufsschule in meiner Ausbildungszeit wurden für ein Migrationsbprojekt von der Schweizerischen Radio- und Fernsehgesellschaft (SRG SSR) angeworben.
			  Über mehrere Samstage hinweg durften wir an dem Projekt teilnehmen und wertvolle Erfahrungen gewinnen."),
		
		
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
		array("file"=>"default", 		"icon"=>"home"),
		array("file"=>"music", 			"icon"=>"music_note"),
		array("file"=>"quotes", 		"icon"=>"bookmark"),
		// array("file"=>"stories"),
		// array("file"=>"farsi"),
		array("file"=>"projects", 		"icon"=>"book"),
		array("file"=>"contact", 		"icon"=>"face"),
		array("file"=>"social", 		"icon"=>"thumb_up"),
		array("file"=>"impressum", 		"icon"=>"account_balance"),
	);
	
	// translations
	private static $locales = array(
		// menu
		'default'			=> array("de"=>"Home", 		"en"=>"Home"),
		'music'				=> array("de"=>"Musik", 	"en"=>"Music"),
		'quotes'			=> array("de"=>"Zitate", 	"en"=>"Quotes"),
		'stories'			=> array("de"=>"Stories", 	"en"=>"Stories"),
		'farsi'				=> array("de"=>"Farsi", 	"en"=>"Farsi"),
		'projects'			=> array("de"=>"Projekte", 	"en"=>"Projects"),
		'contact'			=> array("de"=>"Über mich", "en"=>"About Me"),
		'social'			=> array("de"=>"Soziales", 	"en"=>"Social"),
		'impressum'			=> array("de"=>"Impressum", "en"=>"Impressum"),
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