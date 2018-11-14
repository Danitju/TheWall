<?php
require('../private/db.php');

ini_set('display_errors',1);
//Hoort de bezoeker hier uberhaupt wel te zijn ai lmao?
if (!isset($_POST['submit_registration'])) {
   header('Location: ../../index.php');
} 
//Zijn alle velden ingevuld?

if(empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password1']) OR empty($_POST['password2'])) {
    include "vergeten.php";
    exit();
}
//  //Zijn beide wachtwoorden gelijk?

 if($_POST['password1'] !=$_POST['password2']){
    include "wachtwoord.php";
    exit();
 }




//Checken of de username al bestaat
$query = "SELECT userid FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing 1');
$stmt->bind_param('s',$username) or die ('Error binding params 1.');
$username = $_POST['username'];
$result = $stmt->execute() or die ('Error querying username');
$row = $stmt->fetch();
if ($row){
    include "bezet.php";
    exit();

}

//Checken of de email al bestaat
$query = "SELECT userid FROM users WHERE mailadres = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing 2.');
$stmt->bind_param('s',$mailadres) or die ('Error binding 2.');
$mailadres = $_POST['email'];
$result = $stmt->execute() or die ('Error querying mailaddres');
$row = $stmt->fetch();
if ($row){
    include "email.php";
    exit();
}

//Gebruiker toevoegen aan de database
$query = "INSERT INTO users VALUES (0,?,?,?,?,0)";
$stmt = $mysqli->prepare($query) or die ('Error preparing 3');
$stmt->bind_param('ssss',$username,$mailadres,$hash,$password) or die ('Error binding 3');
$username = $_POST['username'];
$mailadres = $_POST['email'];
$random_number = rand(0,1000000);
$hash = hash('sha512',$random_number);
$password = hash('sha512',$_POST['password1']);
$result = $stmt->execute() or die ('Error inserting user.');


// De gebruiker een verificatie mail sturen
$to = $_POST['email'];
$subject = 'Verifieer je account bij the wall';
$message = 'Klik op de volgende link om je account te activeren: '; 
$message .= 'http://24994.hosts.ma-cloud.nl/ma/Login/public/verify.php?mailadres=' . $mailadres . '&hash=' . $hash;
$headers = 'From: 24994@ma-web.nl';
mail($to,$subject,$message,$headers) or die ('Error mailing');

include "account.php";