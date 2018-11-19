<?php 
$servername = "localhost";
$serverUsername = "root";
$serverPassword = 'root';
$dbName = "xfirma";

//forbind til database
$connection = mysqli_connect($servername, $serverUsername, $serverPassword, $dbName);

//fejl hvis der ikke kan forbindes til databasen
if (!$connection) {
    die("Fejl! Kan ikke forbinde");
}
?>