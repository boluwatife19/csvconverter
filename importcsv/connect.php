<?php

$servername = 'localhost';
$dbUsername = 'root';
$password = '';
$dbname = 'importcsv';

$conn = new mysqli($servername, $dbUsername, $password, $dbname);

if(!$conn){
    die(mysqli_error($conn));
}

?>