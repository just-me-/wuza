<div id="main_project_ipa">
    
    <h1>Meine IPA</h1>
    
    <p class="fade-in-move-down">
        SQL Ledger ist eine OpenSource ERP-Lösung, welche seit Jahren von der Firma leanux.ch aktiv weiterentwickelt wird.
        Auf Grund gegebener Lizenzgründen, ist der weiterentwickelte Code von den neuen Versionen nicht öffentlich einsichtlich.
        Daher keine GitHub-Verlinkung an dieser Stelle. 
    </p>
    <p class="fade-in-move-down">
        In meiner Ausbildungszeit waren Korrekturen und Erweiterungen von Funktionen für das ERP-System Bestandteile meiner primären Tätigkeiten.
        So ergab es sich, dass auch meine Abschlussarbeit eine Funktionserweiterung für SQL-Ledger sein sollte - eine automatisierte Registration für Benutzer.
    </p>
    <p class="fade-in-move-down">
        Die IPA (Individuelle Praktische Arbeit) ist ein Bestandteil des Qualifikationsverfahrens für die Ausbildung zum Informatiker mit eidg. Fähigkeitszeugnis.
        In dem zehntägigen Projekt gilt es zu zeigen, was man in den vier Jahren seiner Ausbildungszeit gelernt hat.
        Meine Projektarbeit - und natürlich auch meine Ausbildung - habe ich erfolgreich absolviert und meine Abschlussarbeit wurde sogar als <a class="getHard" href="view/pdf/file/2">eine der 10 besten Informatik-Praxisfacharbeiten der Schweiz</a> ausgezeichnet. 
    </p>
    
    <h2>Die Facharbeit</h2>
    <p class="fade-in-move-down">
        Das von mir am Ende der IPA geschriebene Websummary, welches man auch auf der <a href="https://pk19.ch/ipa-suchen/?action=show_ipa&id=11467" target=_blank>Website von pk19</a> finden kann, habe ich nachfolgend eingefügt.
        Es gibt eine kurze Übersicht in das Projekt. 
        Der vollständige Titel meiner IPA lautete: "<i>Vollautomatischer Registrierungsprozess für Cloud ERP-Lösung (SQL-Ledger)</i>".
    </p>
    
    <div class="blockquote text-justify">
        
        <h4>Umfeld und Ziel</h4>
        <p>
            Die Open-Source-Lösung SQL-Ledger, ein komplett webbasiertes ERP System zur Buchhaltung, wird von der Firma leanux.ch stets weiterentwickelt.
            SQL-Ledger wird nicht nur intern genutzt, sondern wir bieten auch Zugänge auf von uns gehosteten Installationen an.
            Mittlerweile sind verschiedenste Lösungen realisiert worden und alle haben unterschiedliche Konfigurationsaufwände für uns.
        </p>
        <p>
            Für das Projekt ESRlight, welche für Postfinance realisiert wurde, hat man einen eigenständigen Registrierungsprozess implementiert.
            Dies wurde jedoch komplett gebunden an Postkunden über die ESR-Teilnehmernummer und über Shell-Skripte realisiert. Daher war dies nicht allgemein wiederverwendbar.
        </p>
        
        <div id="register_screen" class="right small-margin-left fade-in-move-down">
            <img class="img-responsive" src="<?php echo $this->_['url']; ?>img/projects/ipa_register.jpg" alt="Registration" />
        </div>
        <p> 
            FacturaPlus, ein Projekt für Raiffeisen, erhielt eine Perl-Erweiterung, in welcher eine automatische Registrierung implementiert wurde.
            Dafür muss jedoch dem System eine Bankenliste aller verfügbaren Banken übergeben werden. So wurde das Produkt erneut kundengruppengebunden umgesetzt.
        </p>
        <p> 
            Das Produkt ClubLight, welches für Vereine angeboten wird, kann in verschiedenen Paketangeboten erworben werden.
            Um dafür die Zugangsdaten zu erhalten, muss der Benutzer ein Webformular ausfüllen. Dieses wird als Mail an uns, leanux.ch, übermittelt.
            Wir konfigurieren das gewünschte Paket und schicken dem Kunden anschliessend die Zugangsdaten.
        </p>
        <p> 
            Dies kostet Zeit und ist fehleranfällig. In einer neuen Version soll für SQL-Ledger die automatische Registrierung so erweitert werden,
            dass verschiedene Pakete konfigurieren werden können. Für diese kann man bestimmen, welche Funktionen sie beinhalten und für welche Zielgruppe sie verfügbar sind.
            So wird eine Registrierung für Kunden aller Schweizerischen Finanzinstitute ermöglicht.
            Wird eine Registrierung abgeschlossen, wird eine Datenbank mit den entsprechenden Benutzern automatisch erstellt und der Kunde erhält seine Zugangsdaten binnen wenigen Minuten.
        </p>
        
        
        <h4>Lösung</h4>
        <p>
            Um diese neue Art des Registrierungsprozesses zu ermöglichen, musste erst eine Paketverwaltung designt und implementiert werden.
            Diese dient neu als zentrale Konfigurationsstelle, bei welcher neu alle Einstellungsangaben übersichtlich pro Paket ermöglichen werden können.
            So werden zusätzliche Benutzereinstellungen oder Druckvorlagenbereitstellungen überflüssig.
        </p>
        <p>
            Die Paketinformationen, sowie die Möglichkeit für Benutzerangeben, wurden über eine neu gestaltete Registrationsoberfläche zur Verfügung gestellt.
            Der anschliessende Registrierungsprozess setzt eine komplette Datenbank mit definierten Druckvorlagen, Kontenpläne und Benutzerdaten zur Verfügung.
            Dabei kann pro Paket definiert werden, ob ein Benutzer einen Benutzernamen oder Passwort definieren darf, oder diese Informationen vom System generiert werden sollen.
        </p>
        
        <h4>Fazit</h4>
        <p>
            Die Zeit während meiner individuellen Praxisarbeit war zum einen sehr stresserfüllt unter dem stetigen Zeitdruck, auf der anderen Seite jedoch auch sehr lehrreich.
            Seinen Fokus komplett auf ein Projekt - ohne äussere Einflüsse oder Ablenkungen im Sinne von zwischeneingeschobenen Kleinarbeiten - legen zu können, war eine schöne Erfahrung, welche mir viel Spass gemacht hat.
            Während der Umsetzung meines Projekts kamen viele Themeninformationen der vergangenen vier Jahre zusammen, was für eine angenehme Auffrischung von gewissen Bereichen sorgte.
            Namentlich beispielsweise der Programmablaufplan. Am meisten profitiert habe ich rückblickend betrachtet in puncto Methodenkompetenz.
            Ich habe meine Schlüsse bereits jetzt aus einzelnen Fehlern gezogen und blicke positiv dem nächsten Projekt entgegen. 
        </p>
        <p>
            Ich freue mich darauf, die neue Funktionalität bei unseren Kunden einzuführen und dessen Rückmeldungen zu erfahren.
            Beim ersten Kunden ist die Aktualisierung auf die neuste Version bereits wenige Tage nach Abschluss der Praxisarbeit erfolgt. 
        </p>
        
    </div>
    
    
    <h2>Funktionsüberblick</h2>
    <p>
        Für einen groben Überblick meiner gemachten Erweiterungen habe ich ein kleines Video für meine IPA-Präsentation erstellt. Mit Einverständnis des damaligen Arbeitgebers kannst Du es nachfolgend abspielen.
        Klar, es ist nicht perfekt, aber bedenke, dass das Video lediglich ein "kleines Präsentationsextra" darstellte und die Zeit stark begrenzt war. 
    </p>
     
    <video poster="<?php echo $this->_['url']; ?>img/projects/ipa_paketverwaltung_cover.png" controls class="img-responsive">
        <source src="<?php echo $this->_['url']; ?>img/projects/ipa_paketverwaltung.mp4" type="video/mp4"> 
        Leider kann das Video nicht abgespielt werden. 
    </video>

    
</div>
