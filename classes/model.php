<?php
class Model{
	
	private $mongo  = null;
	private $db 	= null;

	// tmp zweidimensionale Arrays - werden fortlaufend in DB ausgelagert 
	private static $pdf_files = array(
		array("id"=>1, "version"=>2, "link"=>1, "source"=>"sources/milizpolitik.pdf", "description"=>"Die Schweizer Milizpolitik", "background"=>"Mit einem Budget von drei Seiten durfte ich einen kleinen Artikel über eine Milizpolitikerin oder einen Milizpolitiker der Schweiz verfassen.
			   Das Porträt fasst Edith Graf als Person und ihre Motivation, ein politisches Amt auszuüben. Die Zielgruppe der Arbeit betrifft Jugendliche und potenzielle Milizpolitiker der Zukunft."),
		array("id"=>2, "version"=>1, "link"=>1, "source"=>"sources/ipa_auszeichnung.pdf", "description"=>"Auszeichnung meiner IPA", "background"=>""),
	);
	// tmp linked tag until all ref. templates are done 
	private static $projects = array(
		array("template" =>"event", 		"title"=>"Eventorganisation",  				"time"=>"Februar 2016",
			  "content"=>"Klassische Postkarten als Einladungen für Events zu verschicken, ist nicht mehr zeitgemäss. Ein paar Codezeilen und die Webversion der interaktiven Einladung inklusive Ablaufsprogramm ist per Link für alle Gäste publiziert."),
		
		array("template" =>"wuza", 			"title"=>"WUZA - das Webprojekt", "content"=>"", "time"=>"seit Ende 2015",
			  "content"=>"Um neue Bereiche zu erlernen, Bekanntes zu vertiefen und Erschaffenes zu publizieren, wurde das Projekt WUZA ins Rollen gebracht.", "linked" => 1),
		
		array("template" =>"ipa", 			"title"=>"Meine IPA", 						"time"=>"März 2015",
			"content"=>"Ende Februar bis anfangs März absolvierte ich meine individuelle praktische Arbeit - kurz IPA.
			 Mein Thema war der vollautomatische Registrierungsprozess für die Cloud ERP-Lösung \"SQL-Ledger\".", "linked" => 1),
		
		array("template" =>"build_tool",	"title"=>"Build Tool - das WBB Plugin",
			"content"=>"WBB steht für \"WoltLab Burning Board\" und ist eine verbreitete Forensoftware für Communities. Dafür habe ich ein kleines Tool - einst für Gw2, derweilen für ESO - in PHP geschrieben.", "linked" => 1),
		
		array("template" =>"ibc",			"title"=>"IBC Switzerland Webauftritt", 	"time"=>"Sommer 2014", 		"content"=>"Ein bis heute kleines aber feines Projekt, welches einst eventuell wieder aufgefasst wird:
			  In kürzester Zeit wurde spontan eine Internetpräsenz erschaffen.", "linked" => 1),
		
		array("template" =>"js_mario", 		"title"=>"JavaScript Mario", 				"time"=>"", 				"content"=>"Der kleine Protagonist wird von Bomben bedroht!", "linked" => 1),
		array("template" =>"ios_started", 	"title"=>"iOS AppQuest und FlappyBird", 	"time"=>"im Jahr 2014", 	"content"=>"Die ersten Schritte in Objective-C und Swift."),
		array("template" =>"srf", 			"title"=>"SRF Migrationsprojekt", 			"time"=>"Sommer 2013",
			  "content"=>"Die drei Jahrgangsbesten der Berufsschule in meiner Ausbildungszeit, wurden für ein Migrationsprojekt von der Schweizerischen Radio- und Fernsehgesellschaft (SRG SSR) angeworben.
			  Über mehrere Samstage hinweg durften wir an dem Projekt teilnehmen und wertvolle Erfahrungen gewinnen."),
	);
	private static $songs = array(
		array("title"=>"Song 1", "artist"=>"Muster Max", "youtube_link"=>"http://youtube.com/hjdhf", "applemusic_link"=>"http://apple.com"),
		array("title"=>"Song 2", "artist"=>"Muster Hans", "youtube_link"=>"Hanna's & Petör", "applemusic_link"=>""),
		array("title"=>"Song 3", "artist"=>"Muster Peter", "youtube_link"=>"", "applemusic_link"=>"http://apple.com", "description"=>"Ein Test.")
	);
	
	// meta tags 
	private static $metas = array(
		'default'				=> array("description"=>"Herzlich willkommen bei WUZA! Dem Freizeitprojekt von Marcel Hess. Auf WUZA findest Du Diverses bezüglich Code, Musik und vielem mehr.", "keywords"=>"wuza, marcel, hess, wusa"),
		'quotes'				=> array("description"=>"Ein Zitat auf WUZA verpasst? Kein Problem! Hier findest Du das Archiv.", "keywords"=>"wuza, zitat, lustig, archiv, verpasst, alte, falschzitate"),
		'projects'				=> array("description"=>"Neben WUZA gibts noch andere Projekte von Marcel Hess! Entdecke hier einige davon.", "keywords"=>"wuza, projekte, projektanfrage, ipa, wbb, ibc"),
		'project_build_tool'	=> array("description"=>"WBB steht für WoltLab Burning Board. Ein kleines Tool - einst für Gw2 - derweilen für ESO.", "keywords"=>"wuza, build, tool, wbb, php, plugin"),
		'project_ibc'			=> array("description"=>"Webauftritt für IBC Switzerland.", "keywords"=>"wuza, ibc, switzerland"),
		'project_ipa'			=> array("description"=>"Die IPA von Marcel Hess: Vollautomatischer Registrierungsprozess für Cloud ERP-Lösung (SQL-Ledger)", "keywords"=>"wuza, "),
		'project_js_mario'		=> array("description"=>"Ein JavaScript Spiel mit Potenzial.", "keywords"=>"wuza, spiel, game"),
		'project_wuza'			=> array("description"=>"Über das WUZA Webprojekt im Detail.", "keywords"=>"wuza, webprojekt, backend, datenbank"),
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
		'project_build_tool'	=> array("de"=>"Build Tool", 		"en"=>"Build Tool"),
		'project_ibc'			=> array("de"=>"IBC Switzerland", 	"en"=>"IBC Switzerland"),
		'project_ipa'			=> array("de"=>"IPA", 				"en"=>""),
		'project_js_mario'		=> array("de"=>"JS Mario", 			"en"=>"JS Mario"),
		'project_wuza'			=> array("de"=>"Webprojekt", 		"en"=>"Web Project"),
		// other
		'pdf'					=> array("de"=>"PDF Anzeige", 	"en"=>"Display PDF"),
	);
	
	/**
	 * @param [optional via config] user password port
	 */
	public function __construct($request){
		$host = "mongodb://localhost" + ($request['db']['port'] ? ":".$request['db']['port'] : "");
		$options = array_filter(array(
			'username' => $request['db']['user'],
			'password' => $request['db']['password'],
		));
		
		try {
			$this->mongo = new MongoClient($host, $options);
			$this->db	 = $this->mongo->$request['db']['dbname'];
			
		} catch (Exception $e) {
			echo "Ups, ein Fehler ist unterlaufen. Es konnte keine Datenbankverbindung hergestellt werden. <b>Bitte versuche es später erneut.</b> <br/><i>",  $e->getMessage(), "</i><br/>";
			exit;
		}
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
	 * @param int $id Id of pdf file
	 * @return Array Array, if exists
	 * 						else null
	 */
	public static function getPDF($id){
		foreach (self::$pdf_files as $pdf) {
			if($pdf['id'] == $id){
				return $pdf;
			}
		}
		return null;
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
	
	// ######################################################################
	// End of static functions - in progress 2 connect everything with the db
	// ######################################################################
	
	/**
	 * @param string $value - dd.mm.yyyy
	 * @return MongoDate
	 */
	public function convertToDatabaseValue($value)
    {
        if ($value === null || $value instanceof MongoDate) {
            return $value;
        }
		return new MongoDate(strtotime($value));
    }
	
	/**
	 * @param MongoDate $value
	 * @return String dd.mm.yyyy
	 */
    public function convertToPHPValue($value){
        if ($value === null) {
            return null;
        }
        return date('d.m.Y', $value->sec); ;
    }
	
	/**
	 * @param Object $object
	 * @return Array $object
	 * function "getClassVars" is required in class that retruns all varis of the class
	 * function "getVari" is required to acces private varis if given
	 */
	public function objectToArray($object)
	{
		$new = array();
		foreach ($object->getClassVars() as $vari){
			$objvar = $object->getVari($vari);
			if(isset($vari, $objvar)){
				$new[$vari] = $objvar;
			}
		}
		return $new; 
	}
	
	/**
	 * @param String $collection, list $search_data, list $new_data
	 * @return Boolean $result
	 */
	public function upsert($collection, $search_data, $new_data){
		if(!isset($collection, $search_data, $new_data)){
			return false;
		}
		
		try {
			$result = $this->db->$collection->update(
				$search_data,
				array(
					'$set' => $new_data 
				),
				array('upsert' => true)
			);
		} catch (Exception $e) {
			// msg for debug if needed
			$msg = $e->getMessage();
			return false; 
		}
		
		return $result['ok'];
	}
	
	/**
	 * @param String $name of "auto_increment" collection/table 
	 * @return int next number
	 * replaces the missing auto_increment for counter fields
	 * use in arrays like this:
	 * $prep_array = array('id_field' => [Model::]getNextSequence("userid"), [...]);
	 */
	function getNextSequence($name){
		if(!isset($name)){
			return false;
		}
		$retval = $this->db->counter->findAndModify(
			 array('_id' => $name),
			 array('$inc' => array('seq'=> 1)),
			 null,
			 array(
				'upsert' => true,
				'new' => true,
			)
		);
		return $retval['seq'];
	}
	
	/**
	 * @param String $collection, list $options
	 * 	$options:
	 * 		list $filter - eq array('name' => 'iwas')
	 * 		list $sort - eq array('date' => -1)
	 * 		list $dates - eq array('start', 'end')
	 * 		int $limit
	 * @return list $result
	 */
	public function find($collection, $option){
		if(!isset($collection)){
			return false;
		}
		try {
			$result = $option['filter'] ? $this->db->$collection->find($option['filter']) : $this->db->$collection->find();
			if($option['sort'] && $result){
				$result->sort($option['sort']);
			}
			if($option['limit'] > 0 && $result){
				$result->limit($option['limit']);
			}
			
			// change to array 
			$result = iterator_to_array($result);
			
			// format date fields
			if($option['dates']){
				foreach($result as &$document) {
					foreach($option['dates'] as $datefield){
						$document[$datefield] = $this->convertToPHPValue($document[$datefield]);
					}
				}
			}
		} catch (Exception $e) {
			// msg for debug if needed
			$msg = $e->getMessage();
			return false; 
		}
		return $result;
	}
	
	
}
?>