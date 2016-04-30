<div id="main_projects">
    
    <h1>Music</h1>
    
    <!-- all songs -->
    <?php
    foreach($this->_['songs'] as $song){
        $youtube_visible = $song['youtube_link'] ? "" : "none";
        $applemusic_visible = $song['applemusic_link'] ? "" : "none";
    ?>
    
    <div class="song clear">
        <div class="titel left"><?php echo $song['title']; ?></div>
        <div class="artist left"><?php echo $song['artist']; ?></div>
        <div class="description left"><?php echo $song['description']; ?></div>
    
        <div class="opacity_logo applemusic right <?php echo $applemusic_visible; ?>">
            <a target=_blank <?php echo 'href="'.$song['applemusic_link'].'"'; ?>>
                <img src="<?php echo $this->_['url']; ?>img/applemusic_icon.png" alt="AppleMusic">
            </a>
        </div>
    
        <div class="opacity_logo youtube right <?php echo $youtube_visible; ?>">
            <a target=_blank <?php echo 'href="'.$song['youtube_link'].'"'; ?>>
                <img src="<?php echo $this->_['url']; ?>img/youtube_icon.png" alt="YouTube">
            </a>
        </div>

    </div>
    
    <?php
    }
    ?>

</div>
