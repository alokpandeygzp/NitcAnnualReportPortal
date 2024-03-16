<?php
require '../../role.php';
include('../../includes/check_login.php');
include("../../includes/config.php");
include('../../includes/config_connection.php');
include('../../includes/set_user_role.php');


$id = isset($_SESSION['edit_id']) ? $_SESSION['edit_id'] : '';
// unset($_SESSION['edit_id']);

$sql = "SELECT * FROM nationalconference WHERE id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $author = $row["author"];
    $conf_name = $row["conf_name"];
    $title = $row["title"];
    $vol = $row["vol_pp"];
    $dep = $row["entity"];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $author = $_POST["author"];
    $conf_name = $_POST["conf_name"];
    $title = $_POST["title"];
    $vol = $_POST["vol"];
    $author = filter_var($author, FILTER_SANITIZE_STRING);
    $conf_name = filter_var($conf_name , FILTER_SANITIZE_STRING);
    $title = filter_var($title , FILTER_SANITIZE_STRING);
    $vol = filter_var($vol , FILTER_SANITIZE_STRING);
    
    $query = "UPDATE nationalconference  SET author=?, title=?, conf_name=?, vol_pp=? WHERE id=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'ssssss', $author, $title, $conf_name,  $vol, $id, $userRole );

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Entry updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Entry update failed.']);
    }

    mysqli_stmt_close($stmt);
    exit(); // Terminate script after AJAX request
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit National Conference</title>
    <link href="../../styles/edit_forms.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/c0795f1bee.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {
                event.preventDefault();

                if (!validateForm()) 
                {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "edit_national.php",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json',
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            window.location.href = '../national.php';
                        }
                    },
                    error: function () {
                        alert("An error occurred during the update.");
                    }
                });
            });

            function validateForm() {
                var author = document.forms["myForm"]["author"].value;
                var title = document.forms["myForm"]["title"].value;
                var conf_name = document.forms["myForm"]["conf_name"].value;
                var vol_pp = document.forms["myForm"]["vol"].value;

                if (author.trim() == "" || title.trim() == "" || conf_name.trim() == "" || vol_pp.trim() == "") {
                    alert("Please fill in all fields.");
                    return false;
                }

                return true;
            }
        });
    </script>
</head>

<body>

    <div class="container">        
        <?php
        echo '<div class="user_strip">
                <div class="holder_1">
                    <a href="../../forms/national.php" class="user_to_dash">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>    
                    <div class="user">
                        <img src="' . $pic . '" class="user_image" />
                        <h3>' . $fname . ' ' . $lname . '</h3>
                    </div>
                </div>';
                require "../../../common/logoutButton.php";
            echo '</div>';
        ?>
        <div class="subcontainer">
            <div class="content_container">
                <p class="form_heading">Edit National Conference</p>
                <div class="form_container">
                    <form id="myForm" action="" method="post" class="form_field">
                        <table>
                            <tr>
                                <td class="label_field"><label for="author" class="label-fields">Name of the Author:
                                    </label></td>
                                <td><input type="text" name="author" value="<?php echo $author; ?>"
                                        class="input-fields" required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="title" class="label-fields">Title of Paper: </label></td>
                                <td><input type="text" name="title" value="<?php echo $title; ?>" class="input-fields"
                                        required></td>
                            </tr>
                            
			    <tr>
                                <td class="label_field"><label for="conf_name" class="label-fields">Name of National Conference: </label></td>
                                <td><input type="text" name="conf_name" value="<?php echo $conf_name; ?>" class="input-fields"
                                        required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="vol" class="label-fields">VOL, P.P.: </label></td>
                                <td><input type="text" name="vol" value="<?php echo $vol; ?>" class="input-fields"
                                        required></td>
                            </tr>
                            
                        </table>

                        <button type="submit" class="submit-button"><span>Update Entity</span></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
