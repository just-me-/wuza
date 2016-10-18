<div id="edit_quote">
    
    <h1 class="page-header">Zitate</h1>
    
    
    <!-- all quotes -->
    <?php
    foreach($this->_['quotes'] as $quote){
    ?>
        <div id="quote_<?php echo $quote['user_id']; ?>" class="quote bs-callout bs-callout-default noselect">
            <h4 class="no-margin">Zitat vom <?php echo $quote['date']; ?></h4>
            <p class="no-margin">
                &laquo;<?php echo $quote['quote']; ?>&raquo; &mdash; <?php echo $quote['author']; ?>
                <?php
                if($quote['help']){
                ?>
                    <span class="glyphicon glyphicon-question-sign clickable" aria-hidden="true" onclick="changeQuoteVisibility('<?php echo $quote['user_id']; ?>')"></span>
                <?php
                }
                ?>
            </p>
            <p id="quote_<?php echo $quote['user_id']; ?>_help" class="light no-margin" style="display: none">
                <?php echo $quote['help']; ?>
            </p>
        </div>
    <?php
    }
    ?>
        
    
</div>