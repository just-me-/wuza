<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    <title>WUZA</title>
  </head>
  
  <body>
    
    <h1><?php echo $this->_['blog_title']; ?></h1>
    
    <div>
        <?php
        foreach($this->_['blog_menu'] as $menu){
        ?>
        <a href="?view=<?php echo $menu['file'] ?>"><?php echo $menu['title']; ?></a>
        <?php
        }
        ?>
    </div>
    
    <?php echo $this->_['blog_content']; ?>
    <hr />
    <?php echo $this->_['blog_footer']; ?>

  </body>
</html>