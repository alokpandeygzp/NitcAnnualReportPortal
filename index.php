<?php
#require './database/db.php';
session_start();

include_once "libraries/vendor/autoload.php";

// $con = mysqli_connect('localhost', 'imsdemouser', '1msDem0PWD1234', 'imsdemo');
$con = mysqli_connect('localhost', 'root', '', 'imsdemo');

$google_client = new Google_Client();

// Define your ClientID, Client Secret Key, and Redirect Uri
// $google_client->setClientId('708185783050-ogtfmfaspacgh48fqlcjkhndohtcgiis.apps.googleusercontent.com');
// $google_client->setClientSecret('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');
$google_client->setClientId('730499365579-8gdkd0urnmj2abtsusqn4sidmlsl3ttn.apps.googleusercontent.com');
$google_client->setClientSecret('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');
// $google_client->setRedirectUri('https://nivahika.nitc.ac.in');
$google_client->setRedirectUri('http://localhost/html');
$google_client->addScope('email');
$google_client->addScope('profile');

if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (isset($token['access_token']) && !isset($token["error"])) {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];
        $_SESSION["login"] = "true";
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        $_SESSION['first_name'] = $data['given_name'];
        $_SESSION['last_name'] = $data['family_name'];
        $_SESSION['email_address'] = $data['email'];
        $_SESSION['profile_picture'] = $data['picture'];

        $mail = $_SESSION['email_address'];

        $sql = "SELECT * FROM entity where id='$mail'";
        $rs = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($rs);

        // Check if the email ends with "@nitc.ac.in and if user is authorised and exist in database."
        if (!$row || strpos($_SESSION['email_address'], "@nitc.ac.in") === false) {
            // If not, log the user out and display an alert
            session_destroy();
            echo '<script>alert("Access restricted. You don\'t have the permission to view this page.");';
            echo 'window.location.href = "index.php";</script>';
            exit();
        }


        // Show loading screen with login avatar, "WELCOME" message, and loading spinner
        echo '<div style="text-align: center; margin-top: 50px;">
                <br><br>
                <img src="asset/login_avatar.png" alt="Login Avatar" style="width: 125px; height: 100px; border-radius: 50%;">
                <p style="font-size: 24px;">WELCOME</p>
                <br><br>
                <div id="loading-spinner" style="display: inline-block;">
                    <img src="asset/loading.gif" alt="Loading..." />
                </div>
                <p style="font-size: 24px;">We are signing you in...</p>
            </div>';

        $mail = $_SESSION['email_address'];
        $sql = "SELECT * FROM entity WHERE id='$mail'";
        $rs = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($rs);

        $userEmail = $row["id"];
        $userRole = $row["role"];
        $sql = "SELECT * FROM roles WHERE name='$userRole'";

        $rs = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($rs);

        $_SESSION["role"] = $row['department'];
        $userDept = $row['department'];
        $emailParts = explode('@', $userEmail);
        $userPrefix = $emailParts[0];

        if ($userDept == "dean") {
            $_SESSION['destination'] = "Deans/" . $userRole . "/dashboard.php";
        } else if($userDept == "se"){
            $_SESSION['destination'] = "SE/" . $userRole . "/dashboard.php";
        } else if($userDept == "others"){
            $_SESSION['destination'] = "Others/" . $userRole . "/dashboard.php";
        } else if ($userRole == "director") {
            $_SESSION['destination'] = "Director/dashboard.php";
        } else if ($userRole == "admin") {
            $_SESSION['destination'] = "Admin/dashboard.php";
        } else {
            // $_SESSION['destination'] = "dashboard.php";
            $_SESSION['destination'] = "Department/dashboard.php";
        }

        echo '<script>
            setTimeout(function() {
                document.getElementById("loading-spinner").style.display = "none";
                window.location.replace("' . $_SESSION['destination'] . '");
            }, 2000); // 2000 milliseconds (2 seconds) delay
            </script>';
        exit();

    }
}

$login_button = '';

if (isset($_SESSION['access_token']) && !empty($_SESSION['access_token'])) {
    $_SESSION["login"] = "true";

    if (isset($_SESSION['destination'])) {
        $redirectUrl = $_SESSION['destination'];
        // unset($_SESSION['destination']);
    } else {
        $redirectUrl = 'Department/dashboard.php';
    }

    header('Location: ' . $redirectUrl);
    exit();
} elseif (!isset($_SESSION['access_token']) || empty($_SESSION['access_token'])) {
    $login_button = '<div class="login_subcontainer">
    <img class="nitc_logo" src="./asset/nitc_logo_icon.svg" loading="lazy" alt="google logo">
    <a href="' . $google_client->createAuthUrl() . '">                   
        <button class="login_btn">                            
            <span>Login with NITC Gmail account</span>
        </button>
    </a>
    
</div>
<p class="welcome-note">
        <span class="welcome">Welcome</span> to the portal! Please sign in to access your account and begin your journey.
    </p>';
}
?>

<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./styles/styles.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="icon" href="https://nivahika.nitc.ac.in/asset/NITC_Icon.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <?php
        // require "./common/navbar.php";
        ?>
        <div class="sub_container">
            <div class="left">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="asset/index_photos/1_nitc.png" alt=""></div>
                        <div class="swiper-slide"><img src="asset/index_photos/2_nitc.png" alt=""></div>
                        <div class="swiper-slide"><img src="asset/index_photos/3_nitc.png" alt=""></div>
                        <div class="swiper-slide"><img src="asset/index_photos/4_nitc.png" alt=""></div>
                        <div class="swiper-slide"><img src="asset/index_photos/5_nitc.png" alt=""></div>
                        <div class="swiper-slide"><img src="asset/index_photos/6_nitc.png" alt=""></div>
                        <div class="swiper-slide"><img src="asset/index_photos/7_nitc.png" alt=""></div>
                        <div class="swiper-slide"><img src="asset/index_photos/8_nitc.png" alt=""></div>
                        <div class="swiper-slide"><img src="asset/index_photos/9_nitc.png" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="right">
                <?php
                echo '<div class="login_btn_container">' . $login_button . '</div>';
                ?>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const mySwiper = new Swiper('.swiper-container', {
                direction: 'horizontal', // or 'vertical' for vertical slider
                loop: true, // Set to true for infinite loop
                autoplay: {
                    delay: 2000, // Slide change interval in milliseconds
                    disableOnInteraction: false // Set to false to continue autoplay after user interaction
                }
            });
        });
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>