<?php

if (empty($_SESSION['login'])) {
    header('Location: ' . BASE_URL . '/index.php');
}

?>

