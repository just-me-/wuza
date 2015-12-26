<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>WUZA</title>
    
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/wuza.css?version="<?php echo $this->_['version']; ?>" rel="stylesheet">
    
  </head>
  
  <body>
    
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-xs visible-sm visible-md visible-lg no-padding no-margin" href="#">
            <img id="logo" src="img/WuzaLogo.png?version='<?php echo $this->_['version']; ?>'" alt="<?php echo $this->_['blog_title']; ?>">
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php
            foreach($this->_['blog_menu'] as $menu){
              $active_class = $this->_['active_view'] == $menu['file'] ? "active" : "";
            ?>
            <li class="<?php echo $active_class ?>"><a href="?view=<?php echo $menu['file'] ?>"><?php echo $menu['title']; ?></a></li>
            <?php
            }
            ?>
          </ul>
      </div>
    </nav>
    
    <div class="main">
      <div class="container">
        <?php echo $this->_['blog_content']; ?>
      </div>
      
      <!--
      <?php echo $this->_['blog_footer']; ?>
      -->
    
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wuza.js?version="<?php echo $this->_['version']; ?>"></script>
    
    </div>
    
  </body>
</html>