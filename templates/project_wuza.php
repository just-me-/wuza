<div id="main_project_wuza" class="relative">

    <?php
       echo $this->getGitHubRibbon("https://github.com/just-me-/wuza");
    ?>

    <h1>WUZA - das Webprojekt</h1>
    <div id="wuza_slider" class="swiper-slider swiper-container right small-margin-left noselect fade-in-move-down">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="<?php echo $this->_['url']; ?>img/projects/wuza_original.jpg" alt="Wuza Original" />
                <span class="title">WUZA besteht seit dem 12.12.15</span>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo $this->_['url']; ?>img/projects/wuza_menu.jpg" alt="Wuza Menu" />
                <span class="title">August 17 - eine modernere Menüleiste</span>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo $this->_['url']; ?>img/projects/wuza_color.jpg" alt="Wuza Color" />
                <span class="title">Neue Kategorie, neue Farben</span>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo $this->_['url']; ?>img/projects/wuza_fancybackground.jpg" alt="Wuza Background" />
                <span class="title">Februar 20 - neues Design</span>
            </div>
        </div>
        <!-- pagination -->
        <div class="swiper-pagination"></div>

        <!-- navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <p class="fade-in-move-down">
        Wie Du wahrscheinlich bereits auf <a href="<?php echo $this->_['url']; ?>view/default">der Startseite</a> erfahren hast, ist WUZA ein Überprojekt für kleinere Projekte und Experimente.
        Nach dem Motto <i>Learning by Doing</i> werden immer weitere Bestandteile dem WUZA-Projekt hinzugefügt.
        Es gibt eine lange Liste mit reichlich Ideen für neue Extras und diversen Gebieten, welche ich meinem Know-how hinzufügen möchte. Aber leider gibt es immer diesen einen Faktor namens Zeit.
        Auf dieser Seite findest Du zu einzelnen - bereits umgesetzten - Bestandteilen und Features genauere Informationen und Hintergedanken.
    </p>

    <h2>Backend</h2>
    <p class="fade-in-move-down">
        Das Backend von WUZA ist noch nicht grossartig ausgebaut. Es gibt bereits das Nötigste wie eine
        Login-Funktion und Einsicht in gewisse Logdateien. Ansonsten ist lediglich die Zitatimplementierung
        über das Backend verknüpft, um neue Einträge zu erfassen oder bestehende zu verändern.
    </p>

    <div id="admin_slider" class="swiper-slider swiper-container right small-margin-left noselect fade-in-move-down">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="<?php echo $this->_['url']; ?>img/projects/wuza_admin_login.jpg" alt="Wuza Admin Login" />
                <span class="title">Login Bereich vom Backend</span>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo $this->_['url']; ?>img/projects/wuza_admin_edit.jpg" alt="Wuza Admin Edit" />
                <span class="title">Zitate hinzufügen, bearbeiten und löschen</span>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo $this->_['url']; ?>img/projects/wuza_admin_list.jpg" alt="Wuza Admin List" />
                <span class="title">Zitatauflistung</span>
            </div>
        </div>
        <!-- pagination -->
        <div class="swiper-pagination"></div>

        <!-- navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <h2>Datenbank</h2>
    <p class="fade-in-move-down">
        Die Daten von WUZA werden mittels MongoDB gespeichert, also einer NoSQL-Datenbank.
        Für eine direkte Datenbankeinsicht läuft eine angepasste Version von <a href="https://github.com/just-me-/phpmongodb" target=_blank>PHP MongoDB</a>.
    </p>

    <h2>WUZA Music</h2>
    <p>
        Dieses Kleinprojekt, welches im Hintergrund schon teilweise implementiert wurde, habe ich derzeitig eingestellt.
        Die Idee war es, meine wöchentlichen Playlists öffentlich einsehbar zu machen.
        Früher habe ich mir jede Woche Zeit dafür genommen, die neusten Lieder zu durchstöbern und entsprechende Playlists
        zu kreieren. Da ich deshalb meist Songs abspielte, die man noch nicht grossartig kennte, wurde ich öfters nach
        so einer praktischen Einsichtsmöglichkeit gefragt. Per Klick auf einen Song der Liste sollte man auf YouTube, Spotify oder AppleMusic weitergeleitet werden.
    </p>
    <p>
        Das Problem: Die Songliste auf WUZA zu pflegen wäre ein zu grosser Aufwand.
        Auch stelle ich mir heute nicht mehr wie früher wöchentlich Playlists zusammen, sondern lasse mir
        vermehrt von Plattformen wie Spotify oder AppleMusic die Listen automatisch generieren.
        Und falls ich doch mal wieder einzelne erstelle, sind die Listen über besagte Plattformen heutzutage fix geteilt und werden
        auch im Hintergrund auf den Geräten der Freunde synchronisiert.
    </p>

    <h2>Easter Eggs</h2>
    <img id="easteregg" class="right small-margin-left small-margin-bottom fade-in-move-down img-responsive img-rounded noselect" src="<?php echo $this->_['url']; ?>img/projects/wuza_easteregg.gif" alt="EasterEgg" />
    <p>
        Kleine Spielereien dürfen auf einer Seite wie WUZA natürlich keinesfalls fehlen.
        Bereits lassen sich einzelne - wie den &laquo;Gravity Troll&raquo;, rechts im GIF dargestellt - finden und auf der Website auslösen,
        andere sind erst noch auf der 2Do-Liste.
        Da sie nur als "kleine Spielerei" zählen, haben sie leider nicht die grösste Realisierungspriorität.
        Aber man darf sich freuen :-)
    </p>

    <h2>Rezepte</h2>
    <p>
        Wer kennt es nicht; die klassischen Familienrezepte finden ihren Platz
        - über mehrere handgeschriebene Kochbücher hinweg - in den Küchenregalen.
        Wird mal wieder ein Rezept gesucht, welches schon länger nicht mehr zubereitet wurde, fängt man an zu blättern, bis man es schliesslich wieder gefunden hat.
        Zum Glück hat man schon Übung mit Mutters bzw. Grossmutters Handschrift und das Entziffern fällt zumindest nach der Sucherei meist leicht.
    </p>
    <p>
        Doch nun geht es viel einfacher. Im <a href="<?php echo $this->_['url']; ?>view/recipes">Rezeptbereich von WUZA</a> werden die Rezepte fortlaufend digitalisiert.
        Einige davon sind auch öffentlich einsehbar. Sie lassen sich bequem filtern oder man kann auch spezifisch nach einem Rezept suchen
        und erhält sofort einen Treffer. Immer und überall. Dank dem Design werden die Rezepte stets übersichtlich dargestellt - auf dem Laptop, Tablet und dem Smartphone.
        Und wird man mal wieder nach einem Rezept gefragt, kann man es komfortabel per Link mit seinen Freunden teilen.
        So werden Rezepte heute bewahrt.
    </p>

    <h2>Im Hintergrund</h2>
    <p>
        WUZA beinhaltet auch Projekte, welche nicht direkt auf der Website von WUZA verlinkt oder präsentiert sind.
        Falls ein Projekt (noch) nicht in der <a href="<?php echo $this->_['url']; ?>view/projects">Projektübersicht</a> gelistet ist, lässt es sich meist dennoch
        über <a href="https://github.com/just-me-?tab=repositories" target=_blank>GitHub</a> verfolgen. Die meisten Projekte sind öffentlich einsehbar.
    </p>

    <div id="color_slider" class="swiper-slider swiper-container left small-margin-right noselect fade-in-move-down">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="<?php echo $this->_['url']; ?>img/projects/wuza_website_maerstetten.jpg" alt="Website Märstetten" />
                <span class="title">buerger-maerstetten.ch</span>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo $this->_['url']; ?>img/projects/wuza_website_fahrlehrer.jpg" alt="Website Fahrlehrer" />
                <span class="title">meinfahrlehrer.ch</span>
            </div>
        </div>
        <!-- pagination -->
        <div class="swiper-pagination"></div>

        <!-- navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <h2>Nice 2 know</h2>
    <p>
        WUZA ist nicht einfach eine statische Website, ganz im Gegenteil - lediglich ein paar Zeilen
        in den Konfigurationsdateien müssen angepasst werden und der Webauftritt erhält einen ganz neuen Charakter!
    </p>

</div>
