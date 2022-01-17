<?php

// $hostname = 'localhost';
// $dbuser = 'phonumtj_cso';
// $dbpassword ='rich@you';
// $dbname = 'phonumtj_instatrade';

$hostname = 'localhost';
$dbuser = 'root';
$dbpassword ='';
$dbname = 'general';


$conn = new mysqli($hostname, $dbuser, $dbpassword, $dbname);

if($conn->connect_error){
    die('Database error: ' . $conn->error);
}

?>