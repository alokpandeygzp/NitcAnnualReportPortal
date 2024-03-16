<?php
require './database/db.php';
session_start();

include_once "libraries/vendor/autoload.php";

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $_SESSION["login"] = "true";
    $sql = "SELECT * FROM entity WHERE id='$user'";
    $rs = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($rs);

    // Check if the email ends with "@nitc.ac.in" and if the user is authorized and exists in the database
    if (!$row) {
        // If not, log the user out and display an alert
        session_destroy();
        echo '<script>alert("Access restricted. You don\'t have the permission to view this page.");';
        echo 'window.location.href = "index.php";</script>';
        exit();
    } else {
        $userEmail = $row["id"];
        $userRole = $row["role"];

        $emailParts = explode('@', $userEmail);
        $userPrefix = $emailParts[0];

        if ($userRole == "dean" && $userEmail == "deanacad@nitc") {
            // If the prefix is not empty, redirect to the specific dean dashboard
            header("Location: Deans/" . strtolower($userPrefix) . "/dashboard.php?user=" . $user);
        } else if ($userRole == "admin") {
            header("Location: Admin/dashboard.php");
        } else {
            // If the prefix is empty or not found, redirect to normal dashboard
            header("Location: dashboard.php?user=" . $user);
        }
    }
}


$google_client = new Google_Client();

// Define your ClientID, Client Secret Key, and Redirect Uri
$google_client->setClientId('730499365579-8gdkd0urnmj2abtsusqn4sidmlsl3ttn.apps.googleusercontent.com');
$google_client->setClientSecret('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');
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

        // JavaScript for redirect after a delay
        echo '<script>
                setTimeout(function() {
                    document.getElementById("loading-spinner").style.display = "none";
                    window.location.href = "dashboard.php";
                }, 2000); // 2000 milliseconds (2 seconds) delay
            </script>';
        exit();

    }
}

$login_button = '';

if (!isset($_SESSION['access_token']) || empty($_SESSION['access_token'])) {
    $login_button = '
                    <div class="login_subcontainer">
                        <img class="nitc_logo" src="./asset/nitc_logo_icon.svg" loading="lazy" alt="google logo">
                        <a href="' . $google_client->createAuthUrl() . '">                   
                            <button class="login_btn">                            
                                <span>Login with NITC account</span>
                            </button>
                        </a>
                        
                    </div>
                    <p class="welcome-note">
                            <span class="welcome">Welcome</span> to the portal! Please sign in to access your account and begin your journey.
                        </p>
                    ';
} else {
    $_SESSION["login"] = "true";
    header('Location: dashboard.php');
}
?>

<html>

<head>
    <title>Login</title>
    <link href="./styles/styles.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>

<body>
    <div class="container">
        <div class="login_header">
            <img class="nitc_complete_logo" src="https://nitc.ac.in/xc-assets/logo/logo-black-01.svg" alt="NITC">
            <h2 class="heading">
                Annual Report Submission Portal for NITC
            </h2>
        </div>



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