<?php
session_start();

if (isset($_COOKIE['userid']) OR isset($_SESSION['userid'])){
    header('Location: welkom.php');
}


?>



<html>
    <head>
        <link href="Main.css" rel="stylesheet"/>
        <script src="jquery-1.10.2.min.js"></script>
        <script src="JQUERY%20Main.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900" rel="stylesheet">
        <title>Login</title>
    </head>
    

    <body>
        <div id="box">
            <div id="main"></div>
            
            <div id="loginform">
                <h1>LOGIN</h1>
                <form method="post" action="../inloggen/public/inlogpoort.php">
    <label>Gebruikersnaam:<input placeholder="Gebruikersnaam" name="username" /></label><br>
    <label>Wachtwoord:<input placeholder="Wachtwoord" type="password" name="password" /></label><br>
    <input type="submit" name="submit_login" value="Inloggen"/>
    </form>
            </div>
            
            <div id="signupform">
                <h1>SIGN UP</h1>
                <form method="post" action="public/process_registration.php">
                    <label>Gebruikersnaam:<br><input placeholder="Gebruikersnaam"name="username" /></label><br>
                    <label>E-Mail<br><input placeholder="Email" type="email" name="email" /></label><br>
                    <label>Wachtwoord<br><input placeholder="wachtwoord" type="password" name="password1" /></label><br>
                    <label>Wachtwoord herhalen<br><input placeholder="herhaal wachtwoord" type="password" name="password2" /></label><br><br>
                    <label><input type="submit" name="submit_registration" value="Registreren"/></label><br>
</form>
            </div>
            
            <div id="login_msg">Heb je een account?</div>
            <div id="signup_msg">Heb je nog geen account?</div>
            
            <button id="login_btn">LOGIN</button>
            <button id="signup_btn">SIGN UP</button>
            
            
        </div>
    </body>
</html>