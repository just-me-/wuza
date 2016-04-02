<div id="main_project_build_tool" class="relative">
    
    <?php
       echo $this->getGitHubRibbon("https://github.com/just-me-/buildtool/tree/BB4_ESO");
    ?>
    
    <h1>Build Tool - das WBB Plugin</h1>
    
    <p>
        WBB steht für "WoltLab Burning Board". Ein kleines (PHP) Tool - einst für Gw2 - derweilen für ESO.
    </p>
    
    <h2>Geschichtliches</h2>
    <p>
        Angefangen hatte alles Ende 2013. Damals galt es für die Community von Abaddons Mund ein Plugin für die Forensoftware WBB zu kreieren. Ziel dieses Plugins sollte es sein,
        seine persönlich gestalteten IG (in game) Builds mit den Spielern desselben Servers teilen zu können.
        Auslöser dieser Problematik war, dass das Entwicklerstudio ArenaNet bei ihrem Nachfolger von dem Spiel Guild Wars den Spielern die Möglichkeit verwehrte, diesen Austausch direkt und einfach IG zu vollziehen. 
    </p>
    
    <p>
        Kurze Zeit später wurde eine erste Version, welche via PHP realisiert wurde, live geschaltet. Leider wurde das Tool nicht all zu rege genutzt und trotz Ankurbelversuche und versuchten FeedBack-Sammlungen wurde
        das Projekt aus den Augen verloren und schlussendlich als Leiche eingestanzt.
    </p>
    
    <p>
        Ein Jahr später - ich selbst in einer neuen Cummunity eines anderen Spiels tätig - wurde das Projekt wiedererweckt. <br/>
        Dazu musste das Tool auf die inzwischen neue Software WBB4 - besser gesagt auf das Framework WCF 2.0.x - umgeschrieben werden. In dem groben Umschreibprozess wurde
        auch der Code bereits grob etwas ausgemistet - jedoch blieb die geplante, grundlegende Ausmistung noch immer ausstehend und auch die Normalisierung der Datenbank stand weiterhin auf meiner 2Do-Liste. <br/>
        Um dem Verwahrlosungsprozess vorzubeugen, welcher sich damals im Gw2-Projekt eingenistet hatte, wurde vorab die Erarbeitung der neuen Erweiterungen noch enger mit den zukünftigen Nutzern getätigt als bei der ersten Version.
        Dies war durch die übersichtlichere Nutzergruppe jedoch auch leichter zu realisieren.
    </p>
    
    <p>
        Nach dem sich nach einiger Zeit jedoch auch in der neuen Version die Nutzungsaktivität auf <i>sporadisch</i> geändert hatte, wurde die weitere Arbeit an dem Plugin eingestellt.
        Mehr zur Zukunft des Projekts findest Du weiter unten unter <i>Ausblick von heute</i>.
    </p>
    
    <h2>Auszug der alten Beschreibung</h2>
    <p>
        Nachfolgend ein Ausschnitt aus der Benutzerbeschreibung, welche für die ESO-Version verfasst wurde.
        Zusätzlich gibt es Bild-Slider der ESO-Version. Es sind jeweils für die Auflösungen Smartphone, Tablet (Slider auf kleinen Bildschirmen ausgeblendet) und Desktop Gruppierungen vorhanden.
    </p>
    
        <div id="small_screens" class="right small-margin-left noselect">
        <ul class="bxslider">
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_small_1.png" title="Smartphone Ansicht"/></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_small_2.png" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_small_3.png" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_small_4.png" title="Build Bearbeitung" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_small_5.png" title="Validierung" /></li>
        </ul>
    </div>
        
    <div class="blockquote text-justify">
        <h4>Was ist das?</h4>
        <p>
            Dieses Programm ist dazu gedacht, Builds zentral zu sammeln. Benutzer können ihre Builds erstellen, sich von anderen Inspirationen holen, oder einfach stöbern; welche Builds sind in der Gilde besonders beliebt. 
            Dieses Tool ist nicht dazu gedacht, ein eigenständiger Buildeditor zu werden. Hier soll jeweils lediglich ein Link auf entsprechende Editoren-Seiten eingebunden werden.
        </p>
        
        <h4>Work in progress</h4>
        <p>
            Es gibt einzelne 2Do's, welche teils schon halbwegs implementiert sind und andere, die erst auf der Planungsliste stehen. Dazu gehört beispielsweise auch die <b>Like-Funktion</b>, welche bereits teils integriert ist. 
            Es soll die Möglichkeit gegeben werden, über eine Like-Funktion (das Veteran-Icon) Builds positiv zu bewerten. Eine Kommentar- und Bewertungsfunktion wird es in dem Sinne aber nicht geben. 
            Dies soll über Ajax umgesetzt werden, um das Benutzererlebnis zu optimieren. (Auch könnte das Filtermenü als Ajax-Schnittstelle umgeschrieben werden.)
        </p>
        
        <h4>CSS</h4>
        <p>
            Zurzeit ist das Tool noch in Gw2 Farben gehalten. Das kommt davon, dass ich es ursprünglich damals für eine Gw2-Community grob erstellt hatte. 
            Die momentan etwas hellen Farben im Vergleich zum restlichen Forum sollen etwas besser angegliedert werden - ein angepasstes Design eben.
        </p>
        
        
    
    
    <div id="middle_screens" class="left hidden-xs hidden-sm small-margin-right">
        <ul class="bxslider">
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_middle_1.png" title="Tablet Ansicht" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_middle_2.png" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_middle_3.png" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_middle_4.png" /></li>
        </ul>
    </div>
        
        <h4>Mehr Optionen</h4>
        <p>
            Zurzeit sind Grundangaben möglich wie Klasse und Waffen. Je nach Feedback können weitere Kriterien wie "ist Vampir", Art der Rüstungsteile, Nahrung und so weiter implementiert werden. 
            Grundsätzlich können diese Informationen bereits in der Beschreibung weiter gegeben werden. Ausserdem sind sie auch im externen Buildplaner enthalten.
            Es bleibt abzuwiegen, wie sinnvoll solche Erweiterungen wären, wenn man den Gedanken beibehält, nicht als eigenständiges Tool auftreten zu wollen.
        </p>
        
        <h4>Icons</h4>
        <p>
            Zum einen sollen die Icons erneuert und zum andern sollen die vielen Selects durch Icons wo möglich abgelöst werden für eine höhere Benutzerfreundlichkeit. 
            Die meisten Gw2 Icons wurden jedoch bereits durch welche von ESO ersetzt. Allerdings sollten eigene erstellt werden, welche deren Platz in Zukunft einnehmen.
        </p>
        
        <h4>Teilen</h4>
        <p>
            Damit Du Builds Freunden weiterempfehlen oder in einem Forenpost verlinken kannst, soll es eine Funktion geben, die durch einen Klick einen generierten Link in Deine Zwischenablage legt.
            Wird dieser aufgerufen, wird automatisch das entsprechende Build geöffnet und fokussiert.
        </p>
    </div>
    
    
    <h2>Ausblick von heute</h2>
    <p>
        Es ist nicht in Planung, das Projekt demnächst für eine neue Community wieder zu erwecken oder Wiederbelebungsversuche für die alten Versionen zu tätigen.
        Aufgrund des unbestimmten Aufschubs stehen die beiden Versionen auf GitHub zur Einsicht zur Verfügung.
        Falls Du planst, eine der beiden Versionen zu forken, schreib mir doch bitte ein <a href="mailto:hallo@wuza.ch?subject=WUZA.ch%20Website">Mail</a>.
        Ich empfehle mit der <a href="https://github.com/just-me-/buildtool/tree/BB4_ESO" target=_blank>ESO Version</a> zu starten und nicht jene von Gw2 weiter zu entwickeln. 
    </p>
    
    
    <div id="big_screens">
        <ul class="bxslider">
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_big_1.png" title="Desktop Ansicht" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_big_2.png" title="Geöffnete Detailbeschreibung" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_big_3.png" title="Ansicht Build erfassen" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_big_4.png" title="Bearbeitung" /></li>
            <li><img src="<?php echo $this->_['url']; ?>img/projects/build_tool_big_5.png" title="" /></li>
        </ul>
    </div>
    
    
</div>
