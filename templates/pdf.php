<div id="main_pdf">
    
    <h1><?php echo $this->_['description'] ? $this->_['description'] : 'PDF Anzeige'?></h1>
    
    <?php
    $download_link = $this->_['link'] ? '<a href="' . $this->_['url'] . $this->_['source'] . '" target="_blank">Das Dokument als PDF herunterladen.</a>' : '';
    if($this->_['background']){
    ?>
    <div class="pdf_background blockquote text-justify">
        <h4>Hintergrund und Entstehung</h4>
        <p class="fade-in-move-down">
            <?php echo $this->_['background'] . '<br/>' . $download_link ?>
        </p>
    </div>
    <?php
    } else {
        echo '<p>' . $download_link . '</p>';
    }
    ?>
    
    <div class='a4pdf embed-responsive'>
        <object data='<?php echo $this->_['url'] . $this->_['source'] . "?version=" . $this->_['version'] ?>' type='application/pdf' width='100%' height='100%'>
        <p>
            Es scheint so, als hätte Dein Browser kein verfügbares PDF Plugin,
            um das PDF anzuzeigen. <br/>
            Kein Problem! <a href="<?php echo $this->_['url'] . $this->_['source'] ?>">Klicke einfach hier, um die PDF Datei herunterzuladen.</a>
        </p>  
        </object>
    </div>

</div>
