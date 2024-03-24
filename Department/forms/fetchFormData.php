<?php

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$dataId = isset($_GET['dataId']) ? $_GET['dataId'] : '';
$formName = isset($_GET['formName']) ? $_GET['formName'] : '';

$sql = "SELECT * FROM $formName WHERE Id = '$dataId'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row); // Return the data as JSON
} else {
    echo json_encode(array('error' => 'Unable to fetch data'));
}

mysqli_close($con);
