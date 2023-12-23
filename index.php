<?php
require './database/db.php';
session_start();

include_once "libraries/vendor/autoload.php";

$google_client = new Google_Client();

// Define your ClientID, Client Secret Key, and Redirect Uri
$google_client->setClientId('730499365579-8gdkd0urnmj2abtsusqn4sidmlsl3ttn.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/imsdemo/');
$google_client->addScope('email');
$google_client->addScope('profile');

if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (!isset($token["error"])) {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        $_SESSION['first_name'] = $data['given_name'];
        $_SESSION['last_name'] = $data['family_name'];
        $_SESSION['email_address'] = $data['email'];
        $_SESSION['profile_picture'] = $data['picture'];

        // Check if the email ends with "@nitc.ac.in"
        if (strpos($_SESSION['email_address'], "@nitc.ac.in") === false) {
            // If not, log the user out and display an alert
            session_destroy();
            echo '<script>alert("Access restricted. Only NITC email addresses are allowed.");';
            echo 'window.location.href = "index.php";</script>';
            exit();
        }
        
    }
}

$login_button = '';

if (!$_SESSION['access_token']) {
    $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="asset/sign-in-with-google.png" /></a>';
}
?>

<html>

<head>
    <title>Dashboard</title>
    <link href="./res/basic_styles.css" type="text/css" rel="stylesheet">
</head>

<body style="padding: 10px; background-color: rgb(223, 216, 216);">
    <div class="container">
        <br />
        <h2 align="center">Login using NITC Account</h2>
        <br />
        <div class="panel panel-default">
            <?php
            if (!empty($_SESSION['access_token'])) {
                echo '<div class="panel-heading">Welcome NITC User</div><div class="panel-body">';
                echo '<img src="'.$_SESSION['profile_picture'].'" class="img-responsive img-circle img-thumbnail" />';
                echo '<h3><b>Name : </b>'.$_SESSION["first_name"].' '.$_SESSION['last_name']. '</h3>';
                echo '<h3><b>Email :</b> '.$_SESSION['email_address'].'</h3>';
                echo '<h3><a href="logout.php">Logout</a></h3></div>';
                ?>
                
                <!-- Main content after login -->
                <div>
                    <div style="padding: 15px 15px; margin-bottom: 20px; display: flex; justify-content: space-between; background-color: aliceblue; border-radius: 0.5rem;">
                        <p style="font-size: 40px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin: auto; text-align:center; padding: 0px;">Welcome to institute annual report portal</p>
                    </div>
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
                        </div>
                    </div>
                </div>
                <?php 
            } else {
                echo '<div align="center">'.$login_button . '</div>';
            }
            ?>
        </div>
    </div>
</body>

</html>
