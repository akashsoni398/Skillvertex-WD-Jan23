<?php

session_start();

$dbhost = "localhost";
$dbname = "music_hub";
$dbuser = "root";
$dbpass = "";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

If(!$conn) {
    echo "Database error occured. Explaination: " . mysqli_connect_error();
}

?>