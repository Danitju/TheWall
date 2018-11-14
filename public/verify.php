<?php

require ('../private/db.php');

//Checken of de mail klopt met de hash
$query = "SELECT userid FROM users WHERE mailadres = ? AND hash = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing for SELECT.');
$stmt->bind_param('ss',$mailadres,$hash);
$mailadres = $_GET['mailadres'];
$hash = $_GET['hash'];
$stmt->execute();
$stmt->bind_result($userid);
$row = $stmt->fetch();
if (!$userid){
    echo 'Sorry, maar deze combinatie van mailadres en hash ken ik niet';
    exit();
}
$stmt->close();
// Account activeren
$query = "UPDATE users SET active = 1 WHERE userid =?";
$stmt = $mysqli->prepare($query) or die ('Error preparing update');
$stmt->bind_param('i',$userid);
$stmt->execute() or die ('Error updating');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Verify - Kabe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script> 
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900" rel="stylesheet"></head>
<body>

<nav>
            <span id="brand">
                  <a href="../index.php">Kabe壁</a>
            </span>

            <ul id="menu">
                  <li><a href=../index.php>Home</a></li>
        
            </ul>

            <div id="toggle">
                  <div class="span" id="one"></div>
                  <div class="span" id="two"></div>
                  <div class="span" id="three"></div>
            </div>
      </nav>

      <div id="resize">
            <ul id="menu">
                  <li><a href="../index.php">Home</a></li>
                 
            </ul>
      </div>


    <h1>Gefeliciteerd!</h1>
    <p>Je account is geactiveerd! Klik <a href="../index.php">hier</a> om terug te gaan;
</p>

<script>

$("#toggle").click(function() {

$(this).toggleClass('on');
$("#resize").toggleClass("active");

});


</script>

</body>
</html>