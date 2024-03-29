<div id="main_default">
    <h1><strong class="bubbles">WUZA</strong> - Stay&nbsp;Calm & Be&nbsp;Yourself</h1>
    <p class="fade-in-move-down">
        Herzlich willkommen bei WUZA - einem Freizeitprojekt von Marcel Hess!
    </p>

    <div id="quote_home" class="quote bs-callout bs-callout-default noselect fade-in-move-down">
        <h4 class="no-margin">Falschzitat der Woche</h4>
        <p class="no-margin">
            <?php
            echo '&laquo;' . $this->_['quote']['quote'] . '&raquo; &mdash;'. $this->_['quote']['author'];
            if($this->_['quote']['help']){
            ?>
            <span class="glyphicon glyphicon-question-sign clickable" aria-hidden="true" onclick="changeQuoteVisibility('home');"></span>
            <?php
            }
            ?>

        </p>
        <p id="quote_home_help" class="light no-margin" style="display: none">
            <?php echo $this->_['quote']['help']; ?>
        </p>
        <p class="light no-margin none"><a href=#>weiter zum Archiv der falsch zugeordneten Zitate</a></p>

    </div>

    <h2>Über das WUZA-Projekt</h2>

    <h3>WuWhat?</h3>
    <p>
        Ja, die Namensgebung. Ein Punkt, nach welchem ich schon ein paar Mal gefragt wurde.
        Um die Antwort darauf zu geben, warum WUZA so heisst, wie ich es nun mal genannt habe, muss ich etwas ausholen.
    </p>
    <p>
        Die ursprüngliche Idee war es, einen just-me-Namen zu wählen. Einen Ähnlichen, wie jenen auf
        <a href="https://github.com/just-me-" target=_blank>GitHub</a>. Dabei geht es mir primär darum,
        vorab auszusagen, auf dem Account zu machen und zu veröffentlichen, worauf ich Lust und Laune habe.
        Ohne darauf Rücksicht nehmen zu müssen, ob das ganze Projekt nun allgemein nützlich, "schön" und
        unter dem Strich öffentlichkeitstauglich ist. <br/>
        Diesem Grundsatz möchte ich auch weiterhin auf WUZA folgen.
    </p>
    <p>
        Das Problem dabei war jedoch, dass solche Domainnamen, welche mir eingefallen sind,
        entweder bereits besetzt waren, oder aber ich hatte etwas an ihnen auszusetzen.
        Teils waren sie einfach schlicht zu lang oder zu "vertippanfällig". Sie haben mir nicht gefallen.
    </p>
    <p>
        In einer besonders stressigen Zeit empfiehlt es sich, nach dem WUSA-Motto zu leben. (Ja, mit S.)
        Wusa ist ein Hollywood Ausdruck, welcher sich im allgemeinen Sprachgebrauch durchgesetzt hat.
        Vergleichbar ist dieser mit Arnolds &laquo;Hasta la vista, baby&raquo;,
        &laquo;Lauf, Forrest, lauf!&raquo; aus Forrest Gump oder &laquo;Houston - wir haben ein Problem&raquo;
        aus dem Film Apollo 13. <br/>
        Nach dem Motto <i>keep calm and repeat wusa</i> gilt es seine
        Ohrläppchen zu massieren, tief durchzuatmen und zu entspannen.
    </p>
    <p>
        Um dem Ganzen eine eigene Note zu verpassen, wurde S durch Z ersetzt und der Slogan <i>Stay Calm & Be Yourself</i>
        gewählt. Also eine Verbindung der Grundsätze von WUSA und just-me. <br/>
        Und, ach ja: WUZA bedeutet im Internetslang übrigens auch <i>what's up?</i> Aber das tut im Grunde nichts zur Sache.
    </p>

    <h3>Easter Eggs</h3>
    <p>
        Besonders dürfen sich einige Personen darüber freuen, dass auf dieser Website verschiedene
        Easter Eggs anzutreffen sind - einige offensichtlicher als anderen.
        Um sich den Spass nicht selbst zu verderben, nicht den Sourcecode oder
        die Commit-History auf GitHub danach durchsuchen! <b>;-)</b>
        Bestimmte Hinweise lassen sich aber im HTML Code über den DOM-Inspector finden.
    </p>
    <p>
        Bemerkungen, dass neue Easter Eggs eingebaut wurden, lassen sich im nachfolgenden Bereich bezüglich
        der letzten Aktualisierungen oder auf der <a href="<?php echo $this->_['url']; ?>view/project_wuza">WUZA-Projektseite</a> finden. Frohes Suchen!
    </p>

    <!-- 2Do: loop -->
    <h3>Die letzten Aktualisierungen</h3>
    <div class="hover-list">
        <ul>
            <li><a class="blocked" href="#">Designaktualisierung <span>- der Hintergrund wurde komplett überarbeitet und es fliegen nun Vögel herum.</span></a></li>
            <li><a class="colorful" href="<?php echo $this->_['url']; ?>view/recipes">Rezepte <span>- auf der Suche nach einer neuen Idee?</span></a></li>
            <li><a class="blocked" href="#">Designaktualisierung <span>- das Menü wirkt nun noch moderner</span></a></li>
            <li><a class="colorful" href="<?php echo $this->_['url']; ?>view/contact">Fähigkeiten <span>- dem Bereich "Über mich" wurde der Abschnitt "Fähigkeiten" hinzugefügt</span></a></li>
            <!--<li><a class="colorful" href="view/projects">Weitere Projekte <span>- Projekte wie WUZA, meine IPA und JS Mario wurden erfasst</span></a></li>-->
            <li><a class="colorful" href="<?php echo $this->_['url']; ?>view/project_wuza">Backend <span>- eine erste Version wurde implementiert. Hier erhältst Du einen Einblick</span></a></li>
            <li><a class="colorful" href="<?php echo $this->_['url']; ?>view/quotes">Falschzitate <span>- hast Du ein Zitat der Woche verpasst? Kein Problen!</span></a></li>
            <li><a class="colorful" href="<?php echo $this->_['url']; ?>view/projects">Projektübersicht <span>- die ersten Projekte wurden in der Timeline erfasst</span></a></li>
            <li><a class="blocked" href="#">Easter Egg &laquo;Gravity Troll&raquo; <span>- Hinweis: Trolle einen Troll und er trollt dich zurück!</span></a></li>
            <!--<li><a class="colorful" href="view/project_build_tool">Projekt Build Tool <span>- ein  Projekt wurde auf WUZA neu erfasst</span></a></li>-->
            <li><a class="colorful" href="<?php echo $this->_['url']; ?>view/contact">Vorstellung <span>- die Seite "Über mich" enthält nun einen Steckbrief von mir</span></a></li>
            <!--<li><a class="colorful" href="view/impressum">Rechtliches <span>- das Impressum wurde hochgeladen</span></a></li>-->
        </ul>
    </div>

    <h3>Die Wird-ASAP-Erledigt-Liste</h3>
    <div class="hover-list">
        <ul>
            <li><a class="blocked" href="">Weitere Erfassungen der bisherigen Projekte <span>- da fehlt noch eine ganze Liste; vorerst das Wichtigste</span></a></li>
            <li><a class="blocked" href="">Musikprojekt implementieren <span>- ein neues Projekt, welches OnTheFly mit WUZA aufgezogen wird</span></a></li>
            <li><a class="blocked" href="">SEO <span>- bisher ist das Google-Ranking noch nicht gross gepusht worden</span></a></li>
            <li><a class="blocked" href="">Backend Ausbau <span>- ein bisschen Komfort für mich ;-)</span></a></li>
            <li><a class="blocked" href="">Mehr Easter Eggs <span>- man darf sich freuen :-)</span></a></li>
            <li><a class="blocked" href="">Spracherweiterung <span>- zumindest mal um Englisch</span></a></li>
            <li><a class="blocked" href="">Weitere Funktionen und Bereiche <span>- alles soll ja nicht gespoilert werden, oder? ;-)</span></a></li>
        </ul>
    </div>

</div>
