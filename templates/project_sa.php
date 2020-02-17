<div id="main_project_sa" class="fade-in-move-down">
    
    <h1>Dafny Language Server Redesign</h1>
    <p>
        In unserer Studienarbeit wurde der Dafny Language Server in C# neu implementiert. Das in TypeScript geschriebene Visual Studio Code Plugin, welches die Sprache Dafny unterstützt, kommuniziert über das LSP direkt mit dem Language Server.
    </p>
    
    <img class="img-responsive img-rounded" src="<?php echo $this->_['url']; ?>img/projects/sa.jpg" alt="SA Plakatübersicht" />
    
    <h2>Ausgangslage</h2>
    <p>
        Dafny ist eine formale Programmiersprache, um die Korrektheit eines Programms mit
        preconditions, postconditions, loop invariants und loop variants zu beweisen.
        In einer vorangegangenen Bachelorarbeit wurde ein Plugin für Visual Studio Code implementiert,
        um auf Dafny-spezifische statische Analysefunktionen zuzugreifen.
    </p>
    <p>
        Wenn Dafny beispielsweise keine postconditions nachweisen kann,
        wird der Code hervorgehoben und ein counter example angezeigt.
        Darüber hinaus bietet es Zugriff auf Codekompilierung,
        Vorschläge zur automatischen Vervollständigung und verschiedene automatisierte Refactorings.
    </p>
    <p>
        Das Plugin kommuniziert mit einem Sprachserver unter Verwendung des Language Server Protocol (LSP) von Microsoft,
        das die Kommunikation zwischen einer Entwicklungsumgebung (IDE) und einem Language Server standardisiert.
        Der Language Server selbst greift über eine proprietäre JSON-Schnittstelle auf die Dafny-Bibliothek zu,
        die das Backend der Dafny-Sprachanalyse enthält.
    </p>
    
    <h2>Ziele</h2>
    <p>
        Das Ziel dieser Arbeit war es, den Language Server so zu gestalten,
        dass er direkt in die Dafny-Bibliothek integriert werden kann, und die proprietäre JSON-basierte Interaktion zu übergehen.
        Anschliessend können so neue Sprachfunktionen implementiert und über das Sprachserverprotokoll angeboten werden.
        Um direkten Zugriff auf die Dafny-Bibliothek zu haben, wird der Sprachserver in C# neu implementiert.
    </p>
    
    <h2>Ergebnis</h3>
    <p>
        Der bereits vorhandene Language Server könnte durch unseren neu geschriebenen Server ersetzt werden.
        Da in ihm die Dafny-Bibliothek integriert ist, kann auf alle Funktionen direkt zugegriffen werden.
        Dies macht die proprietäre Schnittstelle zwischen dem alten Sprachserver und der Dafny-Bibliothek überflüssig.
        Die meisten Funktionen der vorherigen Bachelorarbeit werden mit dem neuen Language Server unterstützt.
        
        Diese beinhalten:
    </p>
    <ul>
        <li>Kompilierung und Codeüberprüfung􏰤</li>
        <li>Syntax- und Fehlerhervorhebung</li>
        <li>Vorschläge für die automatische Vervollständigung</li>
        <li>Code Lens</li>
        <li>Go to Definition</li>
    </ul>
    <p>
        Mit dem neuen Language Server können weitere Funktionen auf bequeme und einheitliche Weise hinzugefügt werden.
        Dies ermöglicht die Integration in andere IDEs nebst Visual Studio Code.
    </p>
    
</div>
