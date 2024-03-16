<?php
require '../../role.php';
include('../../includes/check_login.php');
include("../../includes/config.php");
include('../../includes/config_connection.php');
include('../../includes/set_user_role.php');


$id = isset($_SESSION['edit_id']) ? $_SESSION['edit_id'] : '';
// unset($_SESSION['edit_id']);

$sql = "SELECT * FROM publications WHERE id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $department = $row['department'];
    $journal = $row['journal'];
    $ic = $row['international_conference'];
    $nc = $row['national_conference'];
    $patent = $row['patent'];
    $dep = $row['entity'];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $department = $_POST["department"];
    $journal = $_POST["journal"];
    $ic = $_POST["iconference"];
    $nc = $_POST["nconference"];
    $patent = $_POST["patent"];
    $entity = $dep;

    $query = "UPDATE publications SET department=?, journal=?, international_conference=?, national_conference=?, patent=? WHERE id=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'sssssss', $department, $journal, $ic, $nc, $patent, $id, $dep );

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
    <title>Edit Publications</title>
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
                    url: "edit_publications.php?Id=<?php echo urlencode($id); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json',
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            window.location.href = '../publications.php';
                        }
                    },
                    error: function () {
                        alert("An error occurred during the update.");
                    }
                });
            });

            function validateForm() {
                var conNature = document.forms["myForm"]["department"].value;
                var conOrg = document.forms["myForm"]["journal"].value;
                var conRevenue = document.forms["myForm"]["iconference"].value;
                var conStatus = document.forms["myForm"]["nconference"].value;
                var conDate = document.forms["myForm"]["patent"].value;

                if (conNature.trim() == "" || conOrg.trim() == "" || conRevenue.trim() == "" || conStatus.trim() == "" || conDate.trim() == "") {
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
                    <a href="../../forms/publications.php" class="user_to_dash">
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
                <p class="form_heading">Edit Publications</p>

                <div class="form_container">

                    <form id="myForm" action="" method="post" class="form_field">
                        
                        <table>
                            <tr>
                                <td class="label_field"><label for="department" class="label-fields">Department:
                                    </label></td>
                                <td><input type="text" name="department" value="<?php echo $department; ?>"
                                        class="input-fields" required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="journal" class="label-fields">Journal: </label></td>
                                <td><input type="number" name="journal" value="<?php echo $journal; ?>" class="input-fields"
                                        required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="iconference" class="label-fields">International Conference: </label></td>
                                <td><input type="number" name="iconference" value="<?php echo $ic; ?>" class="input-fields"
                                        required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="nconference" class="label-fields">National Conference: </label></td>
                                <td><input type="number" name="nconference" value="<?php echo $nc; ?>" class="input-fields"
                                        required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="patent" class="label-fields">Patent: </label></td>
                                <td><input type="number" name="patent" value="<?php echo $patent; ?>" class="input-fields"
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
