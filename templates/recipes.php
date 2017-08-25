<div id="main_recipes">
    
    <h1>Rezepte</h1>
    <p>
        Bist Du auf der Suche nach einer Inspiration oder nach einem spezifischen Rezept von mir?
        Dann ist das genau der richtige Ort!
    </p>
    
    <div class="filtr-filters noselect">
        <span data-filter="all" class="clickable"> Alle </span>
        <span data-filter="1" class="clickable"> Hauptspeise </span>
        <span data-filter="2" class="clickable"> Beilage </span>
        <span data-filter="3" class="clickable"> Dessert </span>
        <span data-filter="4" class="clickable"> Apéro </span>
        <span data-shuffle class="shuffle clickable hidden-xs"> <i class="material-icons md-14">shuffle</i> </span>
     </div>

    <div class="filtr-container noselect">
        <?php
        foreach($this->_['recipes'] as $recipe){
        ?>
            <div class="filtr-item col-xs-6 col-sm-4 col-md-3" data-category="<?php echo $recipe['categories']; ?>" data-sort="value">
               <img class="max-100" src="<?php echo $this->_['url']; ?>img/recipes/<?php echo $recipe['img']; ?>" alt="<?php echo $recipe['name']; ?>">
               <span class="item-desc"><?php echo $recipe['name']; ?></span>
            </div>
        <?php
        }
        ?>
    </div>

</div>

<!-- not used yet for other sites -->
<script src="<?php echo $this->_['url']; ?>js/jquery.filterizr.min.js"></script>
<script src="<?php echo $this->_['url']; ?>js/jquery.flip.min.js"></script>

<!-- filter setup -->
<script>
    var fltr = $('.filtr-container').filterizr();
    
    // filter controls
    $('.filtr-filters span').click(function() {
        $('.filtr-filters span').removeClass('active');
        $(this).addClass('active');
        // handle shuffle control 
        $('.filtr-filters span.shuffle').removeClass('active');
    });
    
    
    var interval = setInterval(function(){        
        fltr.filterizr('shuffle');
    }, 4500);
    
    // fix first load 
    $(function() {
        setTimeout(function () {
            fltr.filterizr('shuffle');
        }, 1);
    })
    
</script>
