<div id="main_projects" class="relative">
    
    <?php
       echo $this->getGitHubRibbon();
    ?>
    
    <h1>Projekte</h1>
    <p>
        In diesem Bereich werden aktuelle, abgeschlossene und auch "aus den Augen verlorene" Projekte gelistet.
        Für genauere Details zu den jeweiligen Projekten, kann via die jeweilige Verlinkung der Überschrift das Projekt geöffnet werden. 
        Die meisten Projekte sind auf <a href="https://github.com/just-me-" target=_blank>GitHub</a> einzusehen. Näheres dazu in der eben benannten Projektansicht.
        Weitere Informationen kannst Du per <a href="mailto:hallo@wuza.ch?subject=WUZA.ch%20Website">Mail</a> anfragen. Selbiges gilt für allgemein offene Punkte oder spezifische Projektanfragen.
    </p>
    
    
    <!-- all projects -->
    <ul class="timeline noselect">
    <?php
    $count = 0;
    foreach($this->_['projects'] as $project){
    ?>
    <li>
        <?php echo '<div class="direction-'.(++$count%2 ? "l" : "r").'">'; ?>
            <div class="flag-wrapper">
                <span class="flag"><?php echo $project['linked'] ? '<a class="colorful" href="'.$this->_['url'].'view/project_'.$project['template'].'">'.$project['title'].'</a>' : $project['title'] ?></span>
                <?php echo $project['time'] ? '<span class="time-wrapper"><span class="time">'.$project['time'].'</span></span>' : ""; ?>
            </div>
            <?php echo $project['content'] ? '<div class="desc">'.$project['content'].'</div>' : ""; ?>
        </div>
    </li>
    <?php
    }
    ?>
    </ul>

</div>
