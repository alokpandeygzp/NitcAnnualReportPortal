<?php
session_start();
require '../role.php';
include('../includes/check_login.php');
include("../includes/config.php");
include('../includes/config_connection.php');
include('../includes/set_user_role.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Publications/Patents</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../styles/forms.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/c0795f1bee.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
    <?php
        echo '<div class="user_strip">
                <div class="holder_1">
                    <a href="../dashboard.php" class="user_to_dash">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>    
                    <div class="user">
                        <img src="' . $pic . '" class="user_image" />
                        <h3>' . $fname . ' ' . $lname . '</h3>
                    </div>
                </div>';
                require "../../common/logoutButton.php";
            echo '</div>';
        ?>

        <div class="subcontainer">
           <center> <h2>Publications/Patents for the year 2023-24</h2></center>
            <div class="content_container">
                <div class="table_container">
                    <input type="text" id="searchInput" class="input-fields search" onkeyup="searchTable()"
                        placeholder="Search for something...">

                    <?php
                    
		    $sql = "SELECT * from roles where name='$userRole'";
		    $rs = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($rs);
		    $full = $row['full_name'];
                    
                    $sql = "SELECT count(id) FROM journal where entity='$userRole'";
		    $rs = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($rs);
		    $journal = $row['count(id)'];
                    
		    $rs = mysqli_query($con, $sql);
                    $sql = "SELECT count(id) FROM internationalconference  where entity='$userRole'";
		    $rs = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($rs);
		    $ic = $row['count(id)'];
                    
		    $rs = mysqli_query($con, $sql);
                    $sql = "SELECT count(id) FROM nationalconference  where entity='$userRole'";
		    $rs = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($rs);
		    $nc = $row['count(id)'];
                    
		    $rs = mysqli_query($con, $sql);
                    $sql = "SELECT count(id) FROM patents where entity='$userRole'";
		    $rs = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($rs);
		    $patent = $row['count(id)'];
                    echo '<div class="table_field">';
                    echo '
                        <table id="myTable" border="1"> 
                        <tr> 
                            <th class="box">Department</th> 
                            <th class="box">Journal</th> 
                            <th class="box">International Conference</th> 
                            <th class="box">National Conferences/Workshops</th> 
                            <th class="box">Patent</th>

                        </tr>

                    <tr>
                    <td class="box">' . $full. '</td>
                    <td class="box">' . $journal . '</td>
                    <td class="box">' . $ic . '</td>
                    <td class="box">' . $nc . '</td>
                    <td class="box">' . $patent . '</td>
                    </tr>';

                    echo '</table>
            </div>';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../Javascript/search_bar.js"></script>
</body>
</html>