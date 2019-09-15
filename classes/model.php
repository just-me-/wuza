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
		array("template" =>"appquest", 	"title"=>"iOS AppQuest als Coach", 	"time"=>"Sep. bis Dez. 2019",
			  "content"=>"Nachdem ich im 2014 Teilnehmer an der AppQuest war, bin ich nun selbst als Coach für die beiden diesjährigen iOS-Teams verantwortlich."),
		
		array("template" =>"antenne", 	"title"=>"Newsfeed Antenne Märstetten",  	"time"=>"Juni 2019",
			  "content"=>"Mittels React wurde ein Newsticker für die Bewohner von Märstetten implementiert.", "linked" => 1),
		
		array("template" =>"easymech", 	"title"=>"EasyMech",  			"time"=>"seit Februar 2019",
			  "content"=>"Für die Firma DuKoStapler wurde ein Maschinenverwaltungstool programmiert. Das Frontend wurde mit React realisiert und das Backend mit C# in ASP.NET.", "linked" => 1),
		
		array("template" =>"rock_the_ring", 	"title"=>"Rock the Ring",  			"time"=>"Februar bis Mai 2019",
			  "content"=>"Für das Festival «Rock the Ring» wurde eine neue, moderne Website erstellt. Zusätzlich wurden moderne Lösungsansätze mit nativen Smartphone-Funktionen (wie Ticketkäufe per Siri und Apple Pay) mittels React Native entworfen.", "linked" => 1),
		
		array("template" =>"studentenportal", 	"title"=>"Studentenportal",  			"time"=>"seit Mai 2018",
			  "content"=>"Seit Mai administriere ich das Studentenportal.ch der HSR und entwickle es weiter. Es basiert auf dem Django Web Framework, welches in Python geschrieben wurde."),
		
		array("template" =>"wg_app", 			"title"=>"WG App",  					"time"=>"seit Mai 2018",
			  "content"=>"Eine Meteor Applikation für die Organisation des WG-Lebens. Dazu gehören eine Einkaufsliste, Eventveranstaltungen und Kochplanung.", "linked" => 1),
		
		array("template" =>"excel", 			"title"=>"VBA in Excel",  				"time"=>"Januar 2018",
			  "content"=>"Für eine Abteilung der Credit Suisse wurde ein Makro geschrieben, welche automatisch Gewinn- und Verluststatistiken im Hintergrund erfasst."),
		
		array("template" =>"sbb", 			"title"=>"SBB Fahrplan",  					"time"=>"Oktober 2017",
			  "content"=>"Mittels der SBB API wurde eine kleine, animierte Übersicht der nächsten Bus-Verbindungen von der WG zur HSR und zurück erstellt. Ideal, um sie mit beispielsweise einem Raspberry Pi auf einem Display anzeigen zu lassen.", "linked" => 1),
		
		array("template" =>"kongressapp", 		"title"=>"KongressApp",  				"time"=>"September 2017",
			  "content"=>"Eine Applikation, welche in Meteor geschrieben wurde. Sie übernimmt den Q&A Teil während einer Keynote. Teilnehmer können so einfach und unkompliziert Fragen einreichen, welche von einer Moderation live aufgeschaltet werden können."),
		
		array("template" =>"meteor", 			"title"=>"Meteor",  					"time"=>"seit August 2017",
			  "content"=>"Erste Applikationen mit dem Full-Stack JavaScript-Framework sowie Pläne, gewisse WUZA-Projekte (wie WUZAlife) mit Meteor neu zu schreiben."),
		
		array("template" =>"teso_addons", 		"title"=>"TESO Add-ons",  				"time"=>"Februar 2017",
			  "content"=>"Mittels LUA wurden mehrere Add-ons realisiert. So wurden die LUA-Kentnisse gefestigt und ausgebaut, aber auch die API von TESO habe ich besser kennengelernt und so allgemein weitere Erfahrung in der Add-on-Entwicklung gesammelt.", "linked" => 1),
		
		array("template" =>"wordpress", 		"title"=>"WordPress Sites",  			"time"=>"seit Ende 2016",
			  "content"=>"Via BeeBase wurden mehrere Webauftritte von Kunden auf eine moderne Art umgesetzt.", "linked" => 1),
		
		array("template" =>"teso_map", 		"title"=>"TESO Map",  						"time"=>"Dezember 2016",
			  "content"=>"Ein Kleinprojekt, bei welchem ich mich mit HTML5 Canvas animationstechnisch etwas ausgetobt habe. Dank Ajax und dem PS4-Browser-Support hat das Projekt aber auch einen praktischen Nutzen.", "linked" => 1),
		
		array("template" =>"event", 		"title"=>"Eventorganisation",  				"time"=>"Februar 2016",
			  "content"=>"Klassische Postkarten als Einladungen für Events zu verschicken, ist nicht mehr zeitgemäss. Ein paar Codezeilen und die Webversion der interaktiven Einladung inklusive Ablaufsprogramm ist per Link für alle Gäste publiziert.", "linked" => 1),
		
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
	// tmp linked recipes templates
	// 1-Hauptspeise, 2-Beilage, 3-Dessert, 4-Apéro
	private static $recipes = array(
		array("template" =>"mojito", 			"name"=>"Mojito",					"categories"=>"4", 		"img"=>"mojito_main.jpg" ),
		array("template" =>"gluehwein", 		"name"=>"Glühwein",					"categories"=>"4", 		"img"=>"gluehwein_main.jpg" ),
		array("template" =>"tee", 				"name"=>"Persischer Tee",			"categories"=>"4", 		"img"=>"tee_main.jpg" ),
		array("template" =>"tomaten_poulet", 	"name"=>"Tomaten Poulet",			"categories"=>"1", 		"img"=>"tomaten_poulet_main.jpg" ),
		array("template" =>"ofen_poulet", 		"name"=>"Ofen Poulet",				"categories"=>"1", 		"img"=>"ofen_poulet_main.jpg" ),
		array("template" =>"susssauer",		 	"name"=>"Süss-Sauer",				"categories"=>"1", 		"img"=>"susssauer_main.jpg" ),
		array("template" =>"mandeln", 			"name"=>"Gebrannte Mandeln",		"categories"=>"3, 4", 	"img"=>"mandeln_main.jpg" ),
		array("template" =>"pancakes", 			"name"=>"Pancakes",					"categories"=>"1, 3", 	"img"=>"pancakes_main.jpg" ),
		array("template" =>"cookies", 			"name"=>"American Cookies",			"categories"=>"3, 4", 	"img"=>"cookies_main.jpg" ),
		array("template" =>"cheesecake", 		"name"=>"Cheesecake",				"categories"=>"3", 		"img"=>"cheesecake_main.jpg" ),
		array("template" =>"jelly_shots", 		"name"=>"Jelly Shots",				"categories"=>"4", 		"img"=>"jelly_shots_main.jpg" ),
		array("template" =>"cupcakes", 			"name"=>"Cupcakes",					"categories"=>"3, 4", 	"img"=>"cupcakes_main.jpg" ),
		array("template" =>"lebkuchen", 		"name"=>"Lebkuchen",				"categories"=>"3", 		"img"=>"lebkuchen_main.jpg" ),
		array("template" =>"kuchen", 			"name"=>"Kuchen",					"categories"=>"3", 		"img"=>"kuchen_main.jpg" ),
		array("template" =>"tassenkuchen", 		"name"=>"Tassenkuchen",				"categories"=>"3", 		"img"=>"tassenkuchen_main.jpg" ),
		array("template" =>"mandelkuchen", 		"name"=>"Mandelkuchen",				"categories"=>"3", 		"img"=>"mandelkuchen_main.jpg" ),
		array("template" =>"nidelwahe", 		"name"=>"Nidelwähe",				"categories"=>"3", 		"img"=>"nidelwahe_main.jpg" ),
		array("template" =>"bananen", 			"name"=>"Gekochte Bananen",			"categories"=>"3", 		"img"=>"bananen_main.jpg" ),
		array("template" =>"creme", 			"name"=>"Crème",					"categories"=>"3", 		"img"=>"creme_main.jpg" ),
		array("template" =>"reis", 				"name"=>"Persischer Reis",			"categories"=>"2", 		"img"=>"reis_main.jpg" ),
		array("template" =>"basmati_reis", 		"name"=>"Basmati-Reis",				"categories"=>"2", 		"img"=>"basmati_reis_main.jpg" ),
		array("template" =>"bolognese", 		"name"=>"Spaghetti Bolognese",		"categories"=>"1", 		"img"=>"bolognese_main.jpg" ),
		array("template" =>"burger", 			"name"=>"Burger mit Country Cuts",	"categories"=>"1", 		"img"=>"burger_main.jpg" ),
		array("template" =>"chicken_pie", 		"name"=>"Chicken Pie",				"categories"=>"1", 		"img"=>"chicken_pie_main.jpg" ),
		array("template" =>"enchiladas", 		"name"=>"Enchiladas",				"categories"=>"1", 		"img"=>"enchiladas_main.jpg" ),
		array("template" =>"indisches_brot", 	"name"=>"Indisches Fladenbrot",		"categories"=>"2", 		"img"=>"indisches_brot_main.jpg" ),
		array("template" =>"waffeln", 			"name"=>"Waffeln",					"categories"=>"1, 3", 	"img"=>"waffeln_main.jpg" ),
		array("template" =>"tiramisu", 			"name"=>"Tiramisu",					"categories"=>"3", 		"img"=>"tiramisu_main.jpg" ),
		array("template" =>"schokoladenkuchen",	"name"=>"Schokoladenkuchen",		"categories"=>"3", 		"img"=>"schokoladenkuchen_main.jpg" ),
		array("template" =>"ananaskuchen",		"name"=>"Gestürzter Ananaskuchen",	"categories"=>"3", 		"img"=>"ananaskuchen_main.jpg" ),
		array("template" =>"omlette",			"name"=>"Schweizer Omlette",		"categories"=>"1", 		"img"=>"omlette_main.jpg" ),
		array("template" =>"french_toast",		"name"=>"French Toast",				"categories"=>"1", 		"img"=>"french_toast_main.jpg" ),
		array("template" =>"salatsauce",		"name"=>"Salatsauce",				"categories"=>"2", 		"img"=>"salatsauce_main.jpg" ),
		array("template" =>"curry",				"name"=>"Curry",					"categories"=>"1", 		"img"=>"curry_main.jpg" ),
		array("template" =>"fritata",			"name"=>"Fritata",					"categories"=>"1", 		"img"=>"fritata_main.jpg" ),
		array("template" =>"honig_poulet",		"name"=>"Honig Poulet",				"categories"=>"1", 		"img"=>"honig_poulet_main.jpg" ),
		array("template" =>"lasagne",			"name"=>"Lasagne",					"categories"=>"1", 		"img"=>"lasagne_main.jpg" ),
		array("template" =>"pasta",				"name"=>"Sizilianische Pasta",		"categories"=>"1", 		"img"=>"pasta_main.jpg" ),
		array("template" =>"riz_casimir",		"name"=>"Riz Casimir",				"categories"=>"1", 		"img"=>"riz_casimir_main.jpg" ),
		array("template" =>"zueri_doener",		"name"=>"Züri-Döner",				"categories"=>"1", 		"img"=>"zueri_doener_main.jpg" ),
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
		'recipes'				=> array("description"=>"Auf der Suche nach einer neuen Rezeptidee? Hier bist Du richtig!", "keywords"=>"wuza, rezept, idee"),
		'recipe_mojito'				=> array("description"=>"WUZA-Rezept für Mojito.", "keywords"=>"mojito, rezept"),
		'recipe_gluehwein'			=> array("description"=>"WUZA-Rezept für Glühwein.", "keywords"=>"glühwein, rezept"),
		'recipe_tee'				=> array("description"=>"WUZA-Rezept für persischen Tee.", "keywords"=>"tee, persisch, iranisch, schwarztee, rezept"),
		'recipe_tomaten_poulet'		=> array("description"=>"WUZA-Rezept für Tomaten Poulet.", "keywords"=>"tomaten, poulet, rezept"),
		'recipe_ofen_poulet'		=> array("description"=>"WUZA-Rezept für Poulet aus dem Ofen.", "keywords"=>"ofen, poulet, rezept"),
		'recipe_mandeln'			=> array("description"=>"WUZA-Rezept für Gebrannte Mandeln.", "keywords"=>"gebrannt, mandeln, rezept"),
		'recipe_pancakes'			=> array("description"=>"WUZA-Rezept für Pancakes", "keywords."=>"pancakes, rezept"),
		'recipe_cookies'			=> array("description"=>"WUZA-Rezept für American Cookies.", "keywords"=>"american, cookies, rezept"),
		'recipe_cheesecake'			=> array("description"=>"WUZA-Rezept für Cheesecake.", "keywords"=>"cheesecake, rezept"),
		'recipe_nidelwahe'			=> array("description"=>"WUZA-Rezept für Nidelwähe.", "keywords"=>"nidel, wähe, torte, kuchen, rezept"),
		'recipe_bananen'			=> array("description"=>"WUZA-Rezept für gekochte Bananen.", "keywords"=>"bananen, gekocht, rezept"),
		'recipe_creme'				=> array("description"=>"WUZA-Rezept für eine Crème.", "keywords"=>"creme, crème, rezept"),
		'recipe_jelly_shots'		=> array("description"=>"WUZA-Rezept für Jelly Shots.", "keywords"=>"jelly, shots, rezept"),
		'recipe_cupcakes'			=> array("description"=>"WUZA-Rezept für Cupcakes.", "keywords"=>"cupcakes, rezept"),
		'recipe_lebkuchen'			=> array("description"=>"WUZA-Rezept für Lebkuchen.", "keywords"=>"lebkuchen, rezept"),
		'recipe_kuchen'				=> array("description"=>"WUZA-Rezept für Kuchen.", "keywords"=>"kuchen, rezept"),
		'recipe_tassenkuchen'		=> array("description"=>"WUZA-Rezept für Tassenkuchen.", "keywords"=>"tasse, kuchen, mikrowelle, rezept"),
		'recipe_mandelkuchen'		=> array("description"=>"WUZA-Rezept für Mandelkuchen.", "keywords"=>"mandel, kuchen, rezept"),
		'recipe_reis'				=> array("description"=>"WUZA-Rezept für persischen Reis.", "keywords"=>"persisch, reis, rezept"),
		'recipe_indisches_brot'		=> array("description"=>"WUZA-Rezept für indisches Brot.", "keywords"=>"indisch, brot, rezept"),
		'recipe_waffeln'			=> array("description"=>"WUZA-Rezept für Waffeln.", "keywords"=>"waffeln, rezept"),
		'recipe_tiramisu'			=> array("description"=>"WUZA-Rezept für Tiramisu.", "keywords"=>"tiramisu, rezept"),
		'recipe_schokoladenkuchen'	=> array("description"=>"WUZA-Rezept für Schokoladenkuchen.", "keywords"=>"schokoladenkuchen, rezept"),
		'recipe_omlette'			=> array("description"=>"WUZA-Rezept für Omlette.", "keywords"=>"omlette, rezept"),
		'recipe_french_toast'		=> array("description"=>"WUZA-Rezept für French Toast.", "keywords"=>"french, toast, rezept"),
		'recipe_ananaskuchen'		=> array("description"=>"WUZA-Rezept für einen gestürzten Ananaskuchen.", "keywords"=>"gestürzt, ananas, kuchen, rezept"),
		'recipe_salatsauce'			=> array("description"=>"WUZA-Rezept für ein Grundrezept für eine französische Salatsauce.", "keywords"=>"französisch, salatsauce, rezept"),
		'recipe_bolognese'			=> array("description"=>"WUZA-Rezept für Spaghetti Bolognese.", "keywords"=>"spaghetti, bolognese, rezept"),
		'recipe_burger'				=> array("description"=>"WUZA-Rezept für Burger mit Country Cuts.", "keywords"=>"burger, country cuts, rezept"),
		'recipe_chicken_pie'		=> array("description"=>"WUZA-Rezept für Chicken Pie.", "keywords"=>"chicken, pie, rezept"),
		'recipe_enchiladas'			=> array("description"=>"WUZA-Rezept für Enchiladas.", "keywords"=>"enchiladas, mexikanisch, rezept"),
		'recipe_susssauer'			=> array("description"=>"WUZA-Rezept für Süss-Sauer.", "keywords"=>"süss, sauer, chinesisch, rezept"),
		'recipe_basmati_reis'		=> array("description"=>"WUZA-Rezept für Basmati-Reis ohne Reiskocher.", "keywords"=>"basmati, reiss, pfanne, ohne reiskocher, rezept"),
		'recipe_curry'				=> array("description"=>"WUZA-Rezept für Curry.", "keywords"=>"curry, rezept"),
		'recipe_fritata'			=> array("description"=>"WUZA-Rezept für Fritata.", "keywords"=>"fritata, rezept"),
		'recipe_honig_poulet'		=> array("description"=>"WUZA-Rezept für asiatisches Honig Poulet.", "keywords"=>"asiatisch, honig, poulet, rezept"),
		'recipe_lasagne'			=> array("description"=>"WUZA-Rezept für Lasagne.", "keywords"=>"lasagne, rezept"),
		'recipe_pasta'				=> array("description"=>"WUZA-Rezept für sizilianische Past.", "keywords"=>"pasta, sizilianisch, rezept"),
		'recipe_riz_casimir'		=> array("description"=>"WUZA-Rezept für Riz Casimir.", "keywords"=>"riz casimir, rezept"),
		'recipe_zueri_doener'		=> array("description"=>"WUZA-Rezept für Züri-Döner.", "keywords"=>"züri, döner, zürcher geschnetzeltes, rezept"),
		'projects'				=> array("description"=>"Neben WUZA gibts noch andere Projekte von Marcel Hess! Entdecke hier einige davon.", "keywords"=>"wuza, projekte, projektanfrage, ipa, wbb, ibc"),
		'project_build_tool'	=> array("description"=>"WBB steht für WoltLab Burning Board. Ein kleines Tool - einst für Gw2 - derweilen für ESO.", "keywords"=>"wuza, build, tool, wbb, php, plugin"),
		'project_ibc'			=> array("description"=>"Webauftritt für IBC Switzerland.", "keywords"=>"wuza, ibc, switzerland"),
		'project_ipa'			=> array("description"=>"Die IPA von Marcel Hess: Vollautomatischer Registrierungsprozess für Cloud ERP-Lösung (SQL-Ledger)", "keywords"=>"wuza, "),
		'project_js_mario'		=> array("description"=>"Ein JavaScript Spiel mit Potenzial.", "keywords"=>"wuza, spiel, game"),
		'project_wuza'			=> array("description"=>"Über das WUZA Webprojekt im Detail.", "keywords"=>"wuza, webprojekt, backend, datenbank"),
		'project_event'			=> array("description"=>"Moderne, interaktive Einladungskarten.", "keywords"=>"wuza, einladung, karte, modern, interaktiv"),
		'project_teso_addons'	=> array("description"=>"LUA Add-ons für TESO.", "keywords"=>"wuza, lua, teso, addon, add-on"),
		'project_teso_map'		=> array("description"=>"Eine animationsreiche Karte für die Himmelsscherben in TESO.", "keywords"=>"wuza, animationen, canvas, teso, himmelsscherben"),
		'project_wordpress'		=> array("description"=>"Modernisierung von Webauftritten.", "keywords"=>"wuza, wordpress, website, webseite, firmen, firma"),
		'project_antenne'		=> array("description"=>"Newsfeed Antenne Märstetten.", "keywords"=>"wuza, react, antenne märstetten"),
		'project_easymech'		=> array("description"=>"EasyMech, das Maschinenverwaltungstool.", "keywords"=>"wuza, easymech, react, C#, ASP.NET"),
		'project_rock_the_ring'	=> array("description"=>"Rock the Ring Website Redesign.", "keywords"=>"wuza, rock the ring, website, redesign"),
		'project_wg_app'		=> array("description"=>"WG App in Meteor.", "keywords"=>"wuza, meteor, WG, einkäufe, essensliste"),
		'project_sbb'			=> array("description"=>"SBB Fahrplan durch SBB API.", "keywords"=>"wuza, sbb, fahrplan, api"),
		'contact'				=> array("description"=>"WUZA ist ein Projekt von Marcel Hess! Erfahre hier mehr über mich.", "keywords"=>"marcel, hess, wuza, mail, märstetten, über, beruf, bereiche"),
		'social'				=> array("description"=>"WUZA ist sozial! Finde WUZA auf Social Media Plattformen - beispielsweise Twitter.", "keywords"=>"wuza, sozial, netzwerk, twitter, social media"),
		'impressum'				=> array("description"=>"Das rechtliche Zeugs für WUZA. Auch findest Du hier die Kontaktadresse.", "keywords"=>"impressum, kontakt, kontaktadresse, wuza, marcel, hess"),
	);
	
	// menu names and linked files
	private static $menu = array(
		array("file"=>"default", 		"icon"=>"home"),
		// array("file"=>"music", 		"icon"=>"music_note"),
		array("file"=>"recipes", 		"icon"=>"restaurant"),
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
		'recipes'			=> array("de"=>"Rezepte", 	"en"=>"Recipes"),
		'recipe_mojito'				=> array("de"=>"Mojito", 			"en"=>""),
		'recipe_gluehwein'			=> array("de"=>"Glühwein", 			"en"=>""),
		'recipe_tee'				=> array("de"=>"Persischer Tee", 	"en"=>""),
		'recipe_tomaten_poulet'		=> array("de"=>"Tomaten Poulet", 	"en"=>""),
		'recipe_ofen_poulet'		=> array("de"=>"Ofen Poulet ", 		"en"=>""),
		'recipe_mandeln'			=> array("de"=>"Gebrannte Mandeln", "en"=>""),
		'recipe_pancakes'			=> array("de"=>"Pancakes", 			"en"=>""),
		'recipe_cookies'			=> array("de"=>"American Cookies", 	"en"=>""),
		'recipe_cheesecake'			=> array("de"=>"Cheesecake", 		"en"=>""),
		'recipe_jelly_shots'		=> array("de"=>"Jelly Shots", 		"en"=>""),
		'recipe_cupcakes'			=> array("de"=>"Cupcakes", 			"en"=>""),
		'recipe_lebkuchen'			=> array("de"=>"Lebkuchen", 		"en"=>""),
		'recipe_kuchen'				=> array("de"=>"Kuchen", 			"en"=>""),
		'recipe_tassenkuchen'		=> array("de"=>"Tassenkuchen", 		"en"=>""),
		'recipe_mandelkuchen'		=> array("de"=>"Mandelkuchen", 		"en"=>""),
		'recipe_reis'				=> array("de"=>"Persischer Reis", 	"en"=>""),
		'recipe_indisches_brot'		=> array("de"=>"Indisches Brot", 	"en"=>""),
		'recipe_waffeln'			=> array("de"=>"Waffeln", 			"en"=>""),
		'recipe_tiramisu'			=> array("de"=>"Tiramisu", 			"en"=>""),
		'recipe_schokoladenkuchen'	=> array("de"=>"Schokoladenkuchen", "en"=>""),
		'recipe_omlette'			=> array("de"=>"Omlette", 			"en"=>""),
		'recipe_french_toast'		=> array("de"=>"French Toast", 		"en"=>""),
		'recipe_susssauer'			=> array("de"=>"Süss-Sauer", 		"en"=>""),
		'recipe_chicken_pie'		=> array("de"=>"Chicken Pie", 		"en"=>""),
		'recipe_enchiladas'			=> array("de"=>"Enchiladas", 		"en"=>""),
		'recipe_nidelwahe'			=> array("de"=>"Nidelwähe", 		"en"=>""),
		'recipe_bananen'			=> array("de"=>"Gekochte Bananen",	"en"=>""),
		'recipe_creme'				=> array("de"=>"Crème", 			"en"=>""),
		'recipe_basmati_reis'		=> array("de"=>"Basmati-Reis", 		"en"=>""),
		'recipe_curry'				=> array("de"=>"Curry", 			"en"=>""),
		'recipe_fritata'			=> array("de"=>"Fritata", 			"en"=>""),
		'recipe_honig_poulet'		=> array("de"=>"Honig Poulet", 		"en"=>""),
		'recipe_lasagne'			=> array("de"=>"Lasagne", 			"en"=>""),
		'recipe_riz_casimir'		=> array("de"=>"Riz Casimir", 		"en"=>""),
		'recipe_zueri_doener'		=> array("de"=>"Züri-Döner", 		"en"=>""),
		'recipe_pasta'				=> array("de"=>"Sizilianische Past", 		"en"=>""),
		'recipe_burger'				=> array("de"=>"Burger mit Country Cuts", 	"en"=>""),
		'recipe_ananaskuchen'		=> array("de"=>"Gestürzter Ananaskuchen", 	"en"=>""),
		'recipe_salatsauce'			=> array("de"=>"Französische Salatsauce", 	"en"=>""),
		'recipe_bolognese'			=> array("de"=>"Spaghetti Bolognese", 		"en"=>""),
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
		'project_event'			=> array("de"=>"Eventorganisation", "en"=>""),
		'project_teso_addons'	=> array("de"=>"TESO Add-ons", 		"en"=>""),
		'project_teso_map'		=> array("de"=>"TESO Map", 			"en"=>""),
		'project_wordpress'		=> array("de"=>"WordPress Sites", 	"en"=>""),
		'project_easymech'		=> array("de"=>"EasyMech", 			"en"=>""),
		'project_rock_the_ring'	=> array("de"=>"Rock the Ring", 	"en"=>""),
		'project_wg_app'		=> array("de"=>"WG App", 			"en"=>""),
		'project_sbb'			=> array("de"=>"SBB Fahrplan", 		"en"=>""),
		'project_antenne'		=> array("de"=>"Newsfeed Antenne Märstetten", 	"en"=>""),
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
	public static function getRecipes(){
		return self::$recipes;
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
	 * @param String $collection, list $search_data
	 * @return Boolean $result
	 */
	public function delete($collection, $search_data){
		if(!isset($collection, $search_data)){
			return false;
		}
		
		try {
			$result = $this->db->$collection->remove($search_data);
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