<!doctype html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
        
        <title>WUZA Admin</title>
        <!-- fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" >
        
        <!-- CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="wuzaadmin/css/metisMenu.css" rel="stylesheet">
        <link href="wuzaadmin/css/datepicker.css" rel="stylesheet">
        <link href="wuzaadmin/css/sb-admin-2.css" rel="stylesheet">
        <link href="wuzaadmin/css/wuza_admin.css" rel="stylesheet">
        
    </head>
  
    <body id="admin_backend">
        
        <!-- Navigation -->
        <!-- Icon Menu -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">WUZA Admin Backend</a>
            </div>
            
            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="admin.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            
            <!-- Main Menu -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="admin.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-bookmark fa-fw"></i> Zitate<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin.php?page=add_quote">Neues Zitat erstellen</a>
                                </li>
                                <li>
                                    <a href="admin.php?page=edit_quote&action=list_quotes">Bestehende bearbeiten</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="wuzaadmin/bsadmin/" target=_blank><i class="fa fa-wrench fa-fw"></i> BS Backend Entwurf</a>
                        </li>
                        
                        <li>
                            <a href="wuzaadmin/phpmongodb/" target=_blank><i class="fa fa-database fa-fw"></i> PhP Mongo DB</a>
                        </li>
                        
                        <li>
                            <a href="admin.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> Abmelden</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <?php echo $this->_['admin_content']; ?>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="wuzaadmin/js/metisMenu.js"></script>
        <script src="wuzaadmin/js/datepicker.js"></script>
        <script src="wuzaadmin/js/datepicker.de.js"></script>
        <script src="wuzaadmin/js/autosize.js"></script>        
        <script src="wuzaadmin/js/sb-admin-2.js"></script>
        <script src="wuzaadmin/js/wuza_admin.js"></script>
    </body>
</html>



    
