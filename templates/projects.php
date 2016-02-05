<div id="main_projects">
    
    <h1>Projekte</h1>
    <p>
        In diesem Bereich werden aktuelle, abgeschlossene und auch "aus den Augen verlorenen" Projekte gelistet.
        Zu genaueren Details zu den jeweiligen Projekte, kann via die jeweilige Überschrift das Projekt geöffnet werden. 
    </p>
    
    <!-- all projects -->
    <?php
    foreach($this->_['projects'] as $project){
    ?>
    
    <h2><a class="getHard" href="view/project_<?php echo $project['template'] ?>"><?php echo $project['title']; ?></a></h2>
    <p><?php echo $project['content']; ?></p>
    
    <?php
    }
    ?>

</div>
