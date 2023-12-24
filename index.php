<?php
require './database/db.php';
session_start();

include_once "libraries/vendor/autoload.php";

$google_client = new Google_Client();

// Define your ClientID, Client Secret Key, and Redirect Uri
$google_client->setClientId('730499365579-8gdkd0urnmj2abtsusqn4sidmlsl3ttn.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/nitcannualreportportal/');
$google_client->addScope('email');
$google_client->addScope('profile');

if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (isset($token['access_token']) && !isset($token["error"])) {
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

        // Redirect to the dashboard on successful login
        header('Location: dashboard.php');
        exit();
    }
}

$login_button = '';

if (!isset($_SESSION['access_token']) || empty($_SESSION['access_token'])) {
    $login_button = '<a href="' . $google_client->createAuthUrl() . '">
                        <div class="login_btn_container">
                            <button class="login_btn">
                                <img class="nitc_logo" src="./asset/nitc_logo_icon.svg" loading="lazy" alt="google logo">
                                <span>Login with NITC account</span>
                            </button>
                        </div>
                    </a>';
}
?>

<html>

<head>
    <title>Login</title>
    <link href="./styles/index.css" type="text/css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="login_header">
            <img class="nitc_complete_logo" src="https://nitc.ac.in/xc-assets/logo/logo-black-01.svg" alt="NITC">
            <h2 class="heading">
                Annual Report Submission Portal for NITC
            </h2>
        </div>
        <div class="">
            <?php
            echo '<div align="center">' . $login_button . '</div>';
            ?>
        </div>
    </div>
</body>

</html>