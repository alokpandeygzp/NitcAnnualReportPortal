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
    <link href="./res/basic_styles.css" type="text/css" rel="stylesheet">
</head>

<body style="padding: 10px; background-color: rgb(223, 216, 216);">
    <div>
        <div style="padding: 15px 15px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; background-color: aliceblue; border-radius: 0.5rem;">
            <p style="font-size: 40px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin: 0px">Welcome to institute annual report portal</p>
            <a href="./pdf.php"><button class="action-buttons" style="min-width: 150px">Generate report</button></a>
        </div>
        <?php
            
                echo '<div class="panel-heading">Welcome NITC User</div><div class="panel-body">';
                echo '<img src="'.$_SESSION['profile_picture'].'" class="img-responsive img-circle img-thumbnail" />';
                echo '<h3><b>Name : </b>'.$_SESSION["first_name"].' '.$_SESSION['last_name']. '</h3>';
                echo '<h3><b>Email :</b> '.$_SESSION['email_address'].'</h3>';
                echo '<h3><a href="logout.php">Logout</a></h3></div>';
                ?>
        <div style="padding: 15px; display: flex; justify-content: space-between; background-color: aliceblue; border-radius: 0.5rem;">
            <div style="padding: 20px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <a href="./forms/community_services.php"><button class="action-buttons">COMMUNITY SERVICES</button></a>
                            <a href="./forms/other_services.php"><button class="action-buttons">OTHER SERVICES</button></a>
                            <a href="./forms/conferences.php"><button class="action-buttons">CONFERENCES CONDUCTED</button></a>
                            <a href="./forms/expert_lectures.php"><button class="action-buttons">EXPERT LECTURES</button></a>
                            <a href="./forms/faculty_qualification.php"><button class="action-buttons">FACULTY HIGHER QUALIFICATION</button></a>
                            <a href="./forms/consultancy.php"><button class="action-buttons">CONSULTANCY AND TESTING</button></a>
                            <a href="./forms/patents.php"><button class="action-buttons">PATENTS ACQUIRED AND FILED</button></a>
                            <a href="./forms/student_achievements.php"><button class="action-buttons">STUDENT ACHIEVEMENTS</button></a>
                <!-- Add more buttons as needed -->
            </div>
        </div>
    </div>
</body>

</html>
