<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (empty($_SESSION['login'])) {
    header('Location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST["email"];
    $name = $_POST["name"];
    $role = $_POST["role"];

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    $query1 = "INSERT INTO entity (id, name, role) VALUES ('$mail', '$name', '$role')";
    if (mysqli_query($con, $query1)) {
        echo '<script>alert("User added.");</script>';
    } else {
        echo '<script>alert("User addition failed.");</script>';
    }

    mysqli_close($con);

}

if (empty($_SESSION['access_token'])) {
    $fname = "Welcome! ";
    $lname = $_GET["user"];
    $pic = "../asset/nitc_logo_icon.svg";
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

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');
$sql = "SELECT role FROM entity where id='$mail'";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($rs);
$userRole = $row['role'];

$pdf_link = "./doc/pdf.php?user=" . $mail;
if ($userRole != 'department' && $userRole != 'centre')
    $pdf_link = "./doc/pdf_all.php";

// Add your dashboard content here
?>

<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="./dashboard.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c0795f1bee.js" crossorigin="anonymous"></script>


</head>

<body>
    <div class="container">
        <div class="login_header">
            <img class="nitc_complete_logo" src="https://nitc.ac.in/xc-assets/logo/logo-black-01.svg" alt="NITC">
            <h2 class="heading">
                Nivahika -Institute Data Report Portal
            </h2>
        </div>

        <?php
        echo '<div class="user_strip">
                <div class="user">
                    <img src="' . $pic . '" class="user_image" />
                    <h3>' . $fname . ' ' . $lname . '</h3>
                </div>
                <div class="logout_btn_holder">;
                    <a href="../logout.php" class="">
                        <button class="logout_btn">Logout</button>
                    </a>                    
                </div  > 
            </div>'

        ?>

        <div class="subcontainer">

            <h2>Manage users</h2>

            <div class="content_container">
                <div class="left_container">
                    <div class="form_container">
                        <form id="myForm" action="" method="post" onsubmit="return validateForm();" class="form_field">
                            <input type="text" name="name" placeholder="Name of Department/Centre"
                                class="input-fields">
                            <input type="text" name="email" placeholder="E-mail ID" class="input-fields">
                            <input type="text" name="Cemail" placeholder="Confirm E-mail ID"
                                class="input-fields">
                            <select name="role" class="input-fields">
                                <option value="department">Department</option>
                                <option value="centre">Centre</option>
                                <option value="dean">Dean</option>
                                <option value="registrar">Registrar</option>
                                <option value="admin">Admin</option>
                            </select>
                            <input type="submit" class="submit-button" value="Add Entry">
                        </form>
                    </div>
                </div>

                <div class="table_container">
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
                    $sql = "SELECT * FROM entity";
                    $rs = mysqli_query($con, $sql);

                    echo '<div class="table_field">';
                    echo '
        <table border="1"> 
        <tr> 
            <th class="box">S. no.</th> 
            <th class="box">E-mail ID</th>                     
            <th class="box">Name</th>
            <th class="box">Role</th>
            <th class="box">Action</th>
        </tr>';

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($rs)) {
                        $email = $row['id'];
                        $name = $row['name'];
                        $role = $row['role'];

                        echo '<tr>
                <td class="box sn">' . $count . '</td>
                <td class="box name">' . $email . '</td>
                <td class="box services">' . $name . '</td>
                <td class="box services">' . $role . '</td>
                <td class="box button_box btn"><button class="delete_btn" data-id="' . $email . '"><i class="fa-solid fa-trash"></i></button></td>
            </tr>';

                        $count++;
                    }
                    echo '</table>
    </div>';
                    ?>
                </div>
            </div>

        </div>


    </div>







    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {
                event.preventDefault();

                // Validate the form
                if (!validateForm()) {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "",
                    data: $(this).serialize(),
                    success: function () {
                        alert("User added.");
                        // Reload the page after a successful form submission
                        location.reload();
                    },
                    error: function () {
                        alert("User addition failed.");
                    }
                });
            });
            function validateForm() {
                var depName = document.forms["myForm"]["name"].value;
                var depMail = document.forms["myForm"]["email"].value;
                var conMail = document.forms["myForm"]["Cemail"].value;
                var role = document.forms["myForm"]["role"].value;

                if (depName.trim() == "" || depMail.trim() == "" || conMail.trim() == "") {
                    alert("Please fill in all fields.");
                    return false;
                }
                else if (depMail != conMail) {
                    alert("Mail IDs doesn't match.");
                    return false;
                }

                return true;
            }
        });
    </script>


</body>

</html>