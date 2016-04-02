<?php
class Model{

	// tmp zweidimensionale Arrays - werden nach Implementation des Adminbereiches in DB ausgelagert 
	private static $entries = array(
		array("id"=>0, "title"=>"Eintrag 1", "content"=>"Ich bin der erste Eintrag."),
		array("id"=>1, "title"=>"Eintrag 2", "content"=>"Ich bin der ewige Zweite!"),
		array("id"=>2, "title"=>"Eintrag 3", "content"=>"Na dann bin ich die Nummer drei.")
	);
	// tmp linked tag until all ref. templates are done 
	private static $projects = array(
		array("template" =>"event", 		"title"=>"Eventorganisation",  				"time"=>"Februar 2016",
			  "content"=>"Klassische Postkarten als Einladungen für Events zu verschicken, ist nicht mehr zeitgemäss. Ein paar Codezeilen und die Webversion der interaktiven Einladung inklusive Ablaufsprogramm ist per Link für alle Gäste publiziert."),
		
		array("template" =>"wuza", 			"title"=>"WUZA - das Webprojekt", "content"=>"", "time"=>"seit Ende 2015",
			  "content"=>"Um neue Bereiche zu erlernen, Bekanntes zu vertiefen und Erschaffenes zu publizieren, wurde das Projekt WUZA ins Rollen gebracht."),
		
		array("template" =>"ipa", 			"title"=>"Meine IPA", 						"time"=>"März 2015",
			"content"=>"Ende Februar bis anfangs März absolvierte ich meine individuelle praktische Arbeit - kurz IPA.
			 Mein Thema war der vollautomatische Registrierungsprozess für die Cloud ERP-Lösung \"SQL-Ledger\"."),
		
		array("template" =>"build_tool",	"title"=>"Build Tool - das WBB Plugin",
			"content"=>"WBB steht für \"WoltLab Burning Board\" und ist eine verbreitete Forensoftware für Communities. Dafür habe ich ein kleines Tool - einst für Gw2, derweilen für ESO - in PHP geschrieben.", "linked" => 1),
		
		array("template" =>"ibc",			"title"=>"IBC Switzerland Webauftritt", 	"time"=>"Sommer 2014", 		"content"=>"Ein bis heute kleines aber feines Projekt, welches einst eventuell wieder aufgefasst wird:
			  In kürzester Zeit wurde spontan eine Internetpräsenz erschaffen."),
		
		array("template" =>"js_mario", 		"title"=>"JavaScript Mario", 				"time"=>"", 				"content"=>"Der kleine Protagonist wird von Bomben bedroht!"),
		array("template" =>"ios_started", 	"title"=>"iOS AppQuest und FlappyBird", 	"time"=>"im Jahr 2014", 	"content"=>"Die ersten Schritte in Objective-C und Swift."),
		array("template" =>"srf", 			"title"=>"SRF Migrationsprojekt", 			"time"=>"Sommer 2013",
			  "content"=>"Die drei Jahrgangsbesten der Berufsschule in meiner Ausbildungszeit wurden für ein Migrationsbprojekt von der Schweizerischen Radio- und Fernsehgesellschaft (SRG SSR) angeworben.
			  Über mehrere Samstage hinweg durften wir an dem Projekt teilnehmen und wertvolle Erfahrungen gewinnen."),
	);
	private static $songs = array(
		array("title"=>"Song 1", "artist"=>"Muster Max", "youtube_link"=>"http://youtube.com/hjdhf", "applemusic_link"=>"http://apple.com"),
		array("title"=>"Song 2", "artist"=>"Muster Hans", "youtube_link"=>"Hanna's & Petör", "applemusic_link"=>""),
		array("title"=>"Song 3", "artist"=>"Muster Peter", "youtube_link"=>"", "applemusic_link"=>"http://apple.com", "description"=>"Ein Test.")
	);
	// order by date - limit by 1 (home), 10 (public) or no limit (key)
	private static $quotes = array(
		// array("id" => 12, "date" => "15.04.2016", "quote"=>"Frage nicht, was Dein Land für Dich tun kann. Frage, was Du für Dein Land tun kannst.", "author"=>"Kim Jong-un", "help"=>""),
		// array("id" => 11, "date" => "10.04.2016", "quote"=>"We are anonymous. We are legion. We do not forgive. We do not forget. Expect us.", "author"=>"Das Finanzamt", "help"=>""),
		array("id" => 10, "date" => "03.04.2016", "quote"=>"Eine Erinnerung ist das einzige Paradies, aus dem man nicht vertrieben werden kann.", "author"=>"Ein Sozialdemokrat",
			  "help"=>"Die Sozialdemokratie hält an einer <i>Überwindung des Kapitalismus</i> und an der Idee des <i>demokratischen Sozialismus</i> fest."),
		array("id" => 9, "date" => "20.03.2016", "quote"=>"I kissed a girl and I liked it.", "author"=>"Silvio Berlusconi", "help"=>"Der italienische Politiker Berlusconi ist berühmt für die eine oder andere Affäre mit jungen Frauen."),
		array("id" => 8, "date" => "12.03.2016", "quote"=>"Ein Freund ist einer, der alles von Dir weiss, und der Dich trotzdem liebt.", "author"=>"Mark Zuckerberg", "help"=>"Mark Zuckerberg ist Gründer und Vorstandsvorsitzender des Unternehmens Facebook Inc."),
		array("id" => 7, "date" => "06.03.2016", "quote"=>"Traue keiner Statistik, die Du nicht selbst gefälscht hast.", "author"=>"Volkswagen", "help"=>"Volkswagen ist Ende 2015 in die Schlagzeilen gerückt wegen des Abgasskandals."),
		array("id" => 6, "date" => "28.02.2016", "quote"=>"Mit einem Wisch ist alles weg.", "author"=>"Gerichtsvollzieher", "help"=>""),
		array("id" => 5, "date" => "12.02.2016", "quote"=>"Bad boys, bad boys... Whatcha gonna do? Whatcha gonna do when they come for you?", "author"=>"Unternehmensberatung", "help"=>""),
		array("id" => 4, "date" => "30.01.2016", "quote"=>"Every breath you take, every move you make, every bond you break, every step you take, I'll be watching you. Every single day, every word you say, every game you play, I'll be watching you.",
			  "author"=>"Google", "help"=>""),
		array("id" => 3, "date" => "09.01.2016", "quote"=>"Hey Du, möchtest Du ein A kaufen?", "author"=>"Standard & Poor's", "help"=>"Standard & Poor’s Corporation ist eine bekannte (Kredit-)Ratingagentur. Ein A-Ranking gilt als eine sichere Anlage."),
		array("id" => 2, "date" => "03.01.2016", "quote"=>"Es ist erstaunlich, was man alles erreichen kann, wenn man sich nicht darum kümmert.", "author"=>"Angela Merkel", "help"=>""),
		array("id" => 1, "date" => "12.12.2015", "quote"=>"...und sie dreht sich doch!", "author"=>"Harald Junke", "help"=>"Das Zitat wird (fälschlicher weise oft) Galileo Galilei zugeordnet, welcher bestätigte, dass sich die Erde
            um die Sonne dreht. Harald Junke war ein deutscher Entertainer, an dessen Alkoholkrankheit die Öffentlichkeit rege Anteil nahm."),
	);
	
	// meta tags 
	private static $metas = array(
		'default'				=> array("description"=>"Herzlich willkommen bei WUZA! Dem Freizeitprojekt von Marcel Hess. Auf WUZA findest Du Diverses bezüglich Code, Musik und vielem mehr.", "keywords"=>"wuza, marcel, hess, wusa"),
		'quotes'				=> array("description"=>"Ein Zitat auf WUZA verpasst? Kein Problem! Hier findest Du das Archiv.", "keywords"=>"wuza, zitat, lustig, archiv, verpasst, alte, falschzitate"),
		'projects'				=> array("description"=>"Neben WUZA gibts noch andere Projekte von Marcel Hess! Entdecke hier einige davon.", "keywords"=>"wuza, projekte, projektanfrage, ipa, wbb, ibc"),
		'project_build_tool'	=> array("description"=>"WBB steht für WoltLab Burning Board. Ein kleines Tool - einst für Gw2 - derweilen für ESO.", "keywords"=>"wuza, build, tool, wbb, php, plugin"),
		'contact'				=> array("description"=>"WUZA ist ein Projekt von Marcel Hess! Erfahre hier mehr über mich.", "keywords"=>"marcel, hess, wuza, mail, märstetten, über, beruf, bereiche"),
		'social'				=> array("description"=>"WUZA ist sozial! Finde WUZA auf Social Media Plattformen - beispielsweise Twitter.", "keywords"=>"wuza, sozial, netzwerk, twitter, social media"),
		'impressum'				=> array("description"=>"Das rechtliche Zeugs für WUZA. Auch findest Du hier die Kontaktadresse.", "keywords"=>"impressum, kontakt, kontaktadresse, wuza, marcel, hess"),
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
	 * @param int $limit - limit by 1 (home), 10 (public) or no limit
	 * @return Array Array - order by date
	 */
	public static function getQuotes($limit){
		return self::$quotes;
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
	 * @param string $meta_type string $template
	 * @return String
	 */
	public static function getMeta($meta_type, $template){
		return self::$metas[$template][$meta_type] ? self::$metas[$template][$meta_type] : self::$metas['default'][$meta_type];
	}

	/**
	 * @return Array Array
	 */
	public static function getMenu(){
		return self::$menu;
	}
}
?>