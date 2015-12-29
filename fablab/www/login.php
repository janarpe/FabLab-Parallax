<?php
include_once '../include/class/db_connect.php';
include_once '../include/class/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FabLab Secure Login</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="style/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="style/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <script type="text/JavaScript" src="js/sha512.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        
        
        <form action="process_login.php" method="post" name="login_form">                      
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="icon_email" type="text" name="email" class="validate">
              <label for="icon_email"></label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">verified_user</i>
              <input id="password" type="password" name:"password" class="validate">
              <label for="password"></label>
            </div>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
        <p>If you don't have a login, please <a href="register.php">register</a></p>
        <p>If you are done, please <a href="logout.php">log out</a>.</p>
        <p>You are currently logged <?php echo $logged ?>.</p>
    </body>
</html>