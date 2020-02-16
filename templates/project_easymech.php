<div id="main_project_easymech" class="fade-in-move-down">
    
    <h1>EasyMech</h1>
    <p>
        Für die Firma DuKoStapler wurde im Rahmen des Engineering Project an der HSR ein Maschinenverwaltungstool programmiert.
        Das Frontend wurde mit dem Framework React realisiert und das Backend mit C# in ASP.NET.
    </p>
    
    <h2>Ausgangslage und Ziel</h2>
    <p>
        Die Firma DuKoStapler GmbH verwaltet ihre Baumaschinen und Wartungspläne per Papieragenda.
        So sind heute Vermietungen der Maschinen immer sehr mühsam und aufwändig zu verbuchen und auch schwer nachzuverfolgen.
    </p>
    <p>
        Die Idee von «EasyMech» ist eine Software zu schreiben, welche die Verwaltung eines Baumaschinen Betriebs ermöglicht.
        In diesem System sollen Kunden und Baumaschinen verwaltet werden können, wobei die Maschinen
        in verschiedene Kategorien unterteilt sind. Für die Maschinen sollen verschiedene Dienstleistungen
        wie Servicearbeiten und Vermietungen erfasst werden können.
        Auch An- und Verkäufe von Maschinen soll in der Software abbildbar sein.
        Die im System geführten Maschinen können der Firma selber gehören oder im Fremdbesitz sein.
        Anhand der Software soll anschliessend ersichtlich sein, welche Arbeiten und Leistungen an welcher Maschine
        durchgeführt wurden. Auch die eingebauten Ersatzteile sollten ersichtlich sein.
        Wenn ein Service durchgeführt wurde, soll nach Ablauf eines definierten Zeitraums wieder eine Erinnerung / Arbeitsauftrag erstellt werden.
    </p>
    
    <h2>Ergebnis</h2>
    <p>
        Unsere Software nutzt Postgres als lizenzkostenfreier, persistenten Datenspeicher.
        
        Das .NET Backend greift auf diese Datenbasis zu.
        Dabei könnte der Postgres-Server an einem beliebigen Standort installiert sein.
        Geplant ist aber, dass alle Komponenten auf derselben Maschine laufen.
        Das Backend verarbeitet anschliessend die Daten und stellt sie mittels einer RESTful HTTP Schnittstelle zur Verfügung.
        Das Frontend spricht diese API an, beispielsweise mit einem http-GET-Request auf /maschine/{id}/ zum Lesen
        oder mit einem POST-Request zum Editieren.
        Der User greift auf das Frontend über einen Browser zu.
    </p>
        Das Backend übernimmt dabei die Aufgabe, die Daten aufzubereiten und zu validieren.
        Beispielsweise soll es prüfen, dass sich zwei Reservationen nicht überlappen.
    <p>
        Das Frontend ist für die übersichtliche und ansprechende Darstellung zuständig,
        sodass eine angenehme Usability geboten wird.
    </p>
    
    <h2>Architektonische Ziele</h2>
    <h3>Scalability</h3>
    <p>
       Um im Backend den Data-Access-Layer von der Schnittstelle zum Frontend zu trennen,
       haben wir einen Service-Layer eingeschoben. Wir antizipieren viele kleinere Anpassung der Datenbank
       und des Service-Interface. Durch die Trennung mit Hilfe von DTOs muss nicht bei jeder Anpassung
       am Interface die Domain angepasst werden. Zusätzlich können die einzelnen Packages bei Bedarf einfacher
       ausgetauscht oder in einem anderen Kontext wiederverwendet werden.
    </p>
    <p>
        Die Trennung in Backend und Frontend wurde aus ähnlichen Gründen gemacht.
        So können z.B. grosse Teile des Frontend wiederverwendet und nur die Inhalte ausgetauscht werden. 
    </p>
    <h3>Security</h3>
    <p>
        Um die Applikation zu schützen, wird der App ein Reverse-Proxy vorgeschaltet, der auf eine Keycloak-Instanz verweist.
        Das Applikations-Frontend ist nur mit gültigem JWT, ausgestellt durch Keycloak, erreichbar.
        Frontend und Backend laufen in je einem Docker-Container. So können wir ein einfaches Netzwerk konfigurieren
        und das Backend unzugänglich von aussen machen.
    </p>
    
</div>
