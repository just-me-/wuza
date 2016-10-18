<!doctype html>
<html id="admin_login" lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
        
        <title>WUZA Admin</title>
        
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/wuza.css" rel="stylesheet">
        <link href="wuzaadmin/css/wuza_admin.css" rel="stylesheet">
    </head>
  
    <body>
        <div class="login_container">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="wuzaadmin/img/unknown_user.png" />
                <p id="profile-name" class="profile-name-card">WUZA Admin</p>
                <form class="form-signin" action="admin.php" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="username" type="text" id="inputLogin" class="form-control" placeholder="Benutzer" required autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Passwort" required>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Anmelden</button>
                </form>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="wuzaadmin/js/wuza_admin.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
