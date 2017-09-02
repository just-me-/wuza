<div id="main_project_teso_map" class="relative">
    
    <?php
       echo $this->getGitHubRibbon("https://github.com/just-me-/teso");
    ?>
    
    <h1>TESO Map</h1>
    <p class="fade-in-move-down">
        In TESO gibt es auf allen Karten sogenannte <i>Himmelsscherben</i>, welche beim Einsammeln lohnenswerte Belohnungen verleihen.
        Sie sind versteckt und nicht auf der IG-Karte verzeichnet. <br/>
        Auf dem PC/Mac ist das Problem schnell gelöst, wenn man nicht suchen möchte:
        Man installiert sich ein passendes Add-on und die Positionen werden dann entsprechend auf der IG-Karte dargestellt.
    </p>
    <p class="fade-in-move-down">
        Auf den Konsolen gibt es derzeit jedoch noch keine offizielle Möglichkeit, Add-ons zu installieren.
        Dafür ist man nur einen Knopfdruck vom Spielekonsolenbrowser entfernt.
        Daher wurde mit dem Projekt <i>TESO Map</i> eine simple Add-on-Alternative für den PS4-Browser entwickelt. 
    </p>
    <p class="fade-in-move-down">
        Über das Menü lassen sich sämtliche Karten der TESO-Welt abrufen.
        Auf ihnen sind die Positionen der Himmelsscherben vermerkt. Damit man sie auch gut erkennt, gibt es eine Blinkanimation.
        Klickt man eine Himmelsscherbe an, wird sie als <i>eingesammelt</i> markiert und verblasst.
        Durch einen erneuten Klick wird dies rückgängig gemacht.
        Die eingesammelten Scherben werden im Hintergrund gespeichert, damit man auch bei einem Kartenwechsel weiss,
        welche Scherben man auf früheren Karten bereits eingesammelt hat und welche noch fehlen. 
    </p>
    <p class="fade-in-move-down">
        Damit das ganze Projekt auch aus programmiertechnischer Sicht interessant und lehrreich ist,
        wurden diverse Animationen mittels HTML5 Canvas und CSS3 eingebaut.
        Die Logik im Hinterrund wird mit Ajax aktuell gehalten, um bereits gesammelte Himmelsscherben zu speichern. 
    </p>
    
    <video poster="<?php echo $this->_['url']; ?>img/projects/teso_map_cover.jpg" controls muted autoplay loop class="img-responsive fade-in-move-down">
        <source src="<?php echo $this->_['url']; ?>img/projects/teso_map.mp4" type="video/mp4"> 
        Leider kann das Video nicht abgespielt werden. 
    </video>
    
</div>
