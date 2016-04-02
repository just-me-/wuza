<div id="main_quotes">
    
    <h1>Falschzitate</h1>
    
    <p>
    Du hast ein Zitat der Woche verpasst? Keine Sorge: Hier im Archiv kannst Du sie nachlesen!
    In der öffentlichen Ansicht erhältst Du Zugriff auf die letzten zehn Einträge.
    Falls zu weiter zurücklesen möchtest, sende mir doch eine kurze <a href="mailto:hallo@wuza.ch?subject=WUZA.ch%20Website">Anfrage per E-Mail</a>.
    </p>
    
    <!-- all quotes -->
    <?php
    foreach($this->_['quotes'] as $quote){
    ?>
        <div id="quote_<?php echo $quote['id']; ?>" class="quote bs-callout bs-callout-default noselect">
            <h4 class="no-margin">Zitat vom <?php echo $quote['date']; ?></h4>
            <p class="no-margin">
                &laquo;<?php echo $quote['quote']; ?>&raquo; &mdash; <?php echo $quote['author']; ?>
                <?php
                if($quote['help']){
                ?>
                    <span class="glyphicon glyphicon-question-sign clickable" aria-hidden="true" onclick="changeQuoteVisibility('<?php echo $quote['id']; ?>')"></span>
                <?php
                }
                ?>
            </p>
            <p id="quote_<?php echo $quote['id']; ?>_help" class="light no-margin" style="display: none">
                <?php echo $quote['help']; ?>
            </p>
        </div>
    <?php
    }
    ?>
    
    <h2>Hintergund der falschen Zitate</h2>
    
    <p>
    Die Idee der falsch zugeordneten Zitate stammt von dem Kleinkünstler Marc-Uwe Kling. Aus seinem Kalender &laquo;Der falsche Kalender&raquo; lassen sich hier auch einzelne Auszüge finden. Teils wurden sie aber auch abgeändert, um Hilfestellungen ergänzt oder
    es wurden eigene Falschreferenzierungen mit sarkastischem Charakter kreiert. 
    </p>
  
</div>