<div id="main_project_wg_app" class="fade-in-move-down">
    
    <h1>WG App</h1>
    <p>
        Eine Meteor-Applikation für die Organisation des WG-Lebens.
        Dazu gehören eine Einkaufsliste, Eventveranstaltungen und die Kochplanung. 
        Dank dem WebSocket-Protokoll werden Änderungen live bei allen Benutzern sofort angezeigt. 
    </p>
    
    <h2>Einkaufsliste</h2>
    <p>
        Produkte für den wöchentlichen WG-Einkauf können in der Einkaufsliste eingetragen werden.
        Den jeweiligen Artikeln können Kategorien (Gemüse, Käse, Fleisch, Dosen) zugeordnet werden,
        sodass die Einkaufsliste entsprechend optimal für den Einkauf geordnet wird.
        Dringliche Artikel können mit einer roten Flamme gekennzeichnet werden. 
    </p>
    <p>
        Während eines Einkaufs können die Artikel auf der Liste abgehakt werden.
        Am Ende des Einkaufs wird der Cumulus Code für die Migros zum Scannen eingeblendet
        und die gekauften Artikel von der Liste gelöscht.
        In der Zählstatistik wird entsprechend vermerkt, wer wie oft schon einkaufen war, und wann das letzte Mal. 
    </p>
    
    <h2>Kochplanung</h2>
    <p>
        In der Kochliste können WG-Mitglieder eintragen, an welchem Abend sie was kochen möchten
        und die andern Mitbewohner können sich entsprechend zum Essen an- oder abmelden.
        Am Ende der Woche wird in der Statistik nachgetragen, wer wie oft gekocht hat. 
    </p>
    
    
    <h2>Events</h2>
    <p>
        Gewünschte WG-Events können in der Eventliste eingetragen werden.
        Es gibt verschiedene Kategorien wie Film oder Nintendo Switch Spiele.
        So wissen immer alle, welche Medien bereit wären oder noch heruntergeladen werden müssen. 
    </p>
    
    <h3>RESTful HTTP Schnittstelle</h3>
    <p>
        Damit neu heruntergeladene Filme komfortabel der Liste hinzugefügt werden können, wurde eine REST API implementiert.
        Mit einem lokalen Script können die Filmtitel so direkt dem Onlinetool hinzugefügt werden. 
    </p>
</div>
