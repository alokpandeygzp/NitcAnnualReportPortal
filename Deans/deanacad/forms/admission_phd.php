<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (empty($_SESSION['login'])) {
    header('Location: ../../../../index.php');
}

if (empty($_SESSION['access_token'])) {
    $fname = "Welcome! ";
    $lname = $_GET["user"];
    $pic = "../../../asset/nitc_logo_icon.svg";
    $mail = $_GET["user"];

    //below two lines are commented out for testing purpose. uncomment it to properly run system with login.

    // header('Location: index.php');
    // exit();
} else {
    $fname = $_SESSION["first_name"];
    $lname = $_SESSION['last_name'];
    $pic = $_SESSION['profile_picture'];
    $mail = $_SESSION['email_address'];
}

// $con = mysqli_connect('localhost', 'imsdemouser', '1msDem0PWD1234', 'imsdemo');
$con = mysqli_connect('localhost', 'root', '', 'imsdemo');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/forms.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/c0795f1bee.js" crossorigin="anonymous"></script>
    <title>Enrolment-gen & cat</title>
</head>

<body>

    <div class="container">

        <!-- user strip--pending  -->
        <?php
        echo '<div class="user_strip">
        <a href="../dashboard.php?user=' . $lname . '" class="user_to_dash">
        <div class="user">
            <img src="' . $pic . '" class="user_image" />
            <h3>' . $fname . ' ' . $lname . '</h3>
        </div>
    </a>
                <div class="logout_btn_holder">';

        echo '
                    <a href="../../../logout.php" class="">
                        <button class="logout_btn">Logout</button>
                    </a>                    
                </div  > 
            </div>';

        // echo '<div class="panel-heading">Welcome NITC User</div><div class="panel-body">';
        // echo '<img src="' . $_SESSION['profile_picture'] . '" class="img-responsive img-circle img-thumbnail" />';
        // echo '<h3><b>Name : </b>' . $_SESSION["first_name"] . ' ' . $_SESSION['last_name'] . '</h3>';
        // echo '<h3><b>Email :</b> ' . $_SESSION['email_address'] . '</h3>';
        // echo '<h3><a href="logout.php">Logout</a></h3></div>';
        ?>

        <div class="subcontainer">
            <div class="content_container">
                <!-- first table  -->
                <div class="top_container">
                    <form action="" method="" enctype="multipart/form-data" class="form_field">
                        <input type="file" id="enrolment_file" name="enrolment_file" accept=".xlsx, .csv, .xls"
                            class="input-fields">
                        <div class="upload_btn"><i class="fa-solid fa-upload"></i></div>
                    </form>
                    <div>
                        <div class="delete_btn">
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </div>
                </div>
                <div class="table_container">
                    <table border="1">
                        <thead>
                            <tr>
                                <th rowspan="2">Department</th>
                                <th rowspan="2">Branch</th>
                                <th rowspan="2">OP</th>
                                <th rowspan="2">OP-PH</th>
                                <th rowspan="2">OBC</th>
                                <th rowspan="2">OBC-PH</th>
                                <th rowspan="2">SC</th>
                                <th rowspan="2">ST</th>
                                <th rowspan="2">EWS</th>
                                <th rowspan="2">Total</th>
                                <th rowspan="2">self SP</th>
                                <th rowspan="2">SP</th>
                                <th rowspan="2">QIP</th>
                                <th rowspan="2">QIP(POLY)</th>
                                <th rowspan="2">DASA</th>
                                <th rowspan="2">ICR</th>
                                <th rowspan="2">SII</th>
                                <th colspan="2">Total</th>
                                <th rowspan="2">Total</th>
                            </tr>
                            <tr>
                                <th>Male</th>
                                <th>Female</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <!-- second table -->
                <div class="top_container">
                    <form action="" method="" enctype="multipart/form-data" class="form_field">
                        <input type="file" id="enrolment_file" name="enrolment_file" accept=".xlsx, .csv, .xls"
                            class="input-fields">
                        <div class="upload_btn"><i class="fa-solid fa-upload"></i></div>
                    </form>
                    <div>
                        <div class="delete_btn">
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </div>
                </div>
                <div class="table_container">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Ph.D.</th>
                                <th colspan="8">Category</th>
                                <th colspan="10">Scheme</th>
                            </tr>
                            <tr>
                                <th>Dept</th>
                                <th>OPEN</th>
                                <th>EWS</th>
                                <th>OBC</th>
                                <th>SC</th>
                                <th>SC-PwD</th>
                                <th>ST</th>
                                <th>ST-PwD</th>
                                <th>Total</th>
                                <th>Full Time</th>
                                <th>Full Time(*Others)</th>
                                <th>SP</th>
                                <th>SELF-SP</th>
                                <th>Part Time</th>
                                <th>Internal</th>
                                <th>External</th>
                                <th>QIP</th>
                                <th>QIP(POLY)</th>
                                <th>Total</th>
                            </tr>
                          
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>