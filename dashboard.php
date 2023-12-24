<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (empty($_SESSION['access_token'])) {
    header('Location: login.php');
    exit();
}

// Add your dashboard content here
?>

<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="">
    <link href="./styles/styles.css" type="text/css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="login_header">
            <img class="nitc_complete_logo" src="https://nitc.ac.in/xc-assets/logo/logo-black-01.svg" alt="NITC">
            <h2 class="heading">
                Annual Report Submission Portal for NITC
            </h2>
        </div>



        <!-- <a href="./doc/pdf.php"><button class="">Generate Report</button></a> -->
        <?php
        echo '<div class="user_strip">
                <div class="user">
                    <img src="' . $_SESSION['profile_picture'] . '" class="user_image" />
                    <h3>' . $_SESSION["first_name"] . ' ' . $_SESSION['last_name'] . '</h3>
                </div>
                <div class="logout_btn_holder">
                    <a href="logout.php" class="">
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

        <div class="content_container">
            <div class="content_sub_container">
                <div class="content_identifier">
                    Add Data
                </div>

                <div class="form_links">
                    <a href="./forms/community_services.php">
                        <p class="form_link">&#8811; COMMUNITY SERVICES</p>
                    </a>

                    <a href="./forms/other_services.php">
                        <p class="form_link">&#8811; OTHER SERVICES</p>

                    </a>

                    <a href="./forms/conferences.php">
                        <p class="form_link">&#8811; CONFERENCES CONDUCTED</p>
                    </a>

                    <a href="./forms/expert_lectures.php">
                        <p class="form_link">&#8811; EXPERT LECTURES</p>
                    </a>

                    <a href="./forms/faculty_qualification.php">
                        <p class="form_link">&#8811; FACULTY HIGHER QUALIFICATION</p>
                    </a>

                    <a href="./forms/consultancy.php">
                        <p class="form_link">&#8811; CONSULTANCY AND TESTING</p>
                    </a>

                    <a href="./forms/patents.php">
                        <p class="form_link">&#8811; PATENTS ACQUIRED AND FILED</p>
                    </a>

                    <a href="./forms/student_achievements.php">
                        <p class="form_link">&#8811; STUDENT ACHIEVEMENTS</p>
                    </a>

                </div>

            </div>



            <div class="content_sub_container">
                <div class="content_identifier">
                    Generate Report
                </div>
                <div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>