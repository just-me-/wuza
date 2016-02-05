<!doctype html>
<html lang="<?php echo $this->_['lang']; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $this->_['header_titel']; ?></title>
    
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->_['url']; ?>icon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->_['url']; ?>icon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->_['url']; ?>icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->_['url']; ?>icon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->_['url']; ?>icon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->_['url']; ?>icon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->_['url']; ?>icon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->_['url']; ?>icon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->_['url']; ?>icon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php echo $this->_['url']; ?>icon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo $this->_['url']; ?>icon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo $this->_['url']; ?>icon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo $this->_['url']; ?>icon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo $this->_['url']; ?>icon/manifest.json">
    <link rel="mask-icon" href="<?php echo $this->_['url']; ?>icon/safari-pinned-tab.svg">
    <link rel="shortcut icon" href="<?php echo $this->_['url']; ?>icon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="<?php echo $this->_['url']; ?>icon/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php echo $this->_['url']; ?>icon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- end favicon -->
    
    <link href="<?php echo $this->_['url']; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $this->_['url']; ?>css/bxslider.css" rel="stylesheet">
    <link href="<?php echo $this->_['url']; ?>css/wuza.css?version=%22<?php echo $this->_['version']; ?>%22" rel="stylesheet">
    
    <meta name="description" content="<?php echo $this->_['header_description']; ?>">
    <meta name="keywords" content="<?php echo $this->_['header_keywords']; ?>">
    
    <!-- for social-media-links -->
    <meta property="og:title" content="<?php echo $this->_['header_titel']; ?>" />
    <meta property="og:description" content="<?php echo $this->_['header_description']; ?>" />
    <meta property="og:image" content="<?php echo $this->_['url']; ?>img/WuzaIcon.png" />
    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand no-padding no-margin" href="<?php echo $this->_['url']; ?>">
          <img id="logo_big" class="logo visible-sm visible-md visible-lg" src="<?php echo $this->_['url']; ?>img/WuzaLogo.png?version=%22;<?php echo $this->_['version']; ?>%22" alt="WUZA"  height="45" weight="160">
          <img id="logo_small" class="logo visible-xs" src="<?php echo $this->_['url']; ?>img/WuzaLogo_clean.png?version=%22<?php echo $this->_['version']; ?>%22" alt="WUZA" height="45" weight="160">
        </a>
        
      </div>
      <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php
            foreach($this->_['menu'] as $menu){
              $active_class = $this->_['active_view'] == $menu['file'] ? "active" : "";
              $titel = $this->_['locales'][$menu['file']]['de']; // 2do: en or de?
            ?>
            <li class="<?php echo $active_class ?>"><a href="<?php echo $this->_['url']; ?>view/<?php echo $menu['file'] ?>"><?php echo $titel; ?></a></li>
            <?php
            }
            ?>
          </ul>
          
          <ul class="nav navbar-nav navbar-right none">
            <li><a <?php echo 'href="?lang=de"' ?> class="language">DE</a></li>
            <li><a <?php echo 'href="?lang=en"' ?> class="language">EN</a></li>
          </ul>
          
          <?php
          if($this->_['debug_mode']){
          ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a <?php echo 'href="?view='.$this->_['active_view'].'&XDEBUG_SESSION_START=1"' ?>><b>DEBUG</b></a></li>
          </ul>
          <?php
          }
          ?>
          
      </div>
      
    </nav>
    
    <?php
      if(!$this->_['js']) {
        print '
        <div class="test-js text-warning bg-warning small-padding">
          Bitte aktivieren Sie <b>JavaScript</b> für <b>wuza.ch</b>, um alle Funktionen dieser Seite vorgesehen nutzen zu können. 
        </div>
        ';
      }
    ?>
    
    <div class="main">
      
      <div class="container">
        <?php echo $this->_['content']; ?>
      </div>
      
      <!--
      <?php echo "by /mh"; ?>
      -->
      
      <div class="footer">
        <div class="right">Letzte Aktualisierung am <?php echo $this->_['last_update']; ?></div>
        <div class="left">Von Marcel Hess</div>
      </div>
      
    </div>
    
    <script src="<?php echo $this->_['url']; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->_['url']; ?>js/bxslider.min.js"></script>
    <script src="<?php echo $this->_['url']; ?>js/cookieconsent.min.js"></script>
    <script src="<?php echo $this->_['url']; ?>js/jGravity-min.js"></script>
    <script src="<?php echo $this->_['url']; ?>js/wuza.js?version=%22<?php echo $this->_['version']; ?>%22"></script>
    
    <input id="js" type="hidden" name="js" value="<?php echo $this->_['js']; ?>">
    <input id="lang" type="hidden" name="lang" value="<?php echo $this->_['lang']; ?>">
    <input id="url" type="hidden" name="url" value="<?php echo $this->_['url']; ?>">
    
  </body>
</html>