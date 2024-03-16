<?php

$dbuser="imsdemouser";
$dbpass="1msDem0PWD1234";
$host="localhost";
$db="imsdemo";

$con = mysqli_connect($host,$dbuser, $dbpass, $db);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>