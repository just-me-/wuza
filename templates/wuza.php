<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>WUZA</title>
    
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="icon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="icon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="icon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="icon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="icon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="icon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="icon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="icon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="icon/manifest.json">
    <link rel="mask-icon" href="icon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="icon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="icon/mstile-144x144.png">
    <meta name="msapplication-config" content="icon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- end favicon -->
    
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/wuza.css?version="<?php echo $this->_['version']; ?>" rel="stylesheet">
    
  </head>
  
  <body>
    
    <!-- GoogleAnalytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-71745084-1', 'auto');
      ga('send', 'pageview');
    
    </script>
    <!-- end GoogleAnalytics -->
    
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-xs visible-sm visible-md visible-lg no-padding no-margin" href="?view=default">
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