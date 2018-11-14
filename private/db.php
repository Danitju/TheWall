<?php
define ('HOST','localhost');
define ('USER','Daaani');
define ('PASS','lol123');
define ('DBNAME','24994_db');

$mysqli = new mysqli(HOST,USER,PASS,DBNAME);

if ($mysqli->errno){
    echo 'Connection error: ' . $mysqli->errno;
} 