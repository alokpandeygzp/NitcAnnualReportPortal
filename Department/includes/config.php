<?php

define('BASE_URL_DEPT', 'https://nivahika.nitc.ac.in/Department');
define('BASE_URL', 'https://nivahika.nitc.ac.in');

if (empty($_SESSION['login'])) {
    header('Location: ' . BASE_URL . '/index.php');
    exit();
}
$fname = $_SESSION["first_name"];
$lname = $_SESSION['last_name'];
$pic = $_SESSION['profile_picture'];
$mail = $_SESSION['email_address'];

?>