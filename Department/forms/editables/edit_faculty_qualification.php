<?php

require '../../role.php';
include('../../includes/check_login.php');
include("../../includes/config.php");
include('../../includes/config_connection.php');
include('../../includes/set_user_role.php');

$id = isset($_SESSION['edit_id']) ? $_SESSION['edit_id'] : '';
// unset($_SESSION['edit_id']);

$sql = "SELECT * FROM faculty_qualification WHERE Id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $staff = $row['name'];
    $qualification = $row['qualification'];
    $institute = $row['institute'];
    $date = $row['date'];
    $dep = $row['entity'];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $originalName = $_POST["original_name"];
    $staffName = $_POST["faculty_name"];
    $staffQualification = $_POST["qualification"];
    $staffInstitute = $_POST["institute"];
    $date = $_POST["date"];
    $entity = $dep;

    $query = "UPDATE faculty_qualification SET name=?, qualification=?, institute=?, date=? WHERE Id=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'ssssis', $staffName, $staffQualification, $staffInstitute, $date, $id, $dep );

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
    <title>Edit Faculty Qualification Entry</title>
    <link href="../../styles/edit_forms.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/c0795f1bee.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {
                event.preventDefault();

                if (!validateForm()) {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "edit_faculty_qualification.php?Id=<?php echo urlencode($id); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json', 
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            window.location.href = '../faculty_qualification.php';
                        }
                    },
                    error: function () {
                        alert("An error occurred during the update.");
                    }
                });
            });

            function validateForm() {
                var staffName = document.forms["myForm"]["faculty_name"].value;
                var staffQualification = document.forms["myForm"]["qualification"].value;
                var staffInstitute = document.forms["myForm"]["institute"].value;
                var progDate = document.forms["myForm"]["date"].value;

                if (staffName.trim() == "" || staffQualification.trim() == "" || staffInstitute.trim() == "" || progDate.trim() == "") {
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
                    <a href="../../forms/faculty_qualification.php" class="user_to_dash">
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
                <p class="form_heading">Edit Faculty Qualification</p>

                <div class="form_container">

                    <form id="myForm" action="" method="post" class="form_field">
                        <input type="hidden" name="original_name" value="<?php echo $name; ?>" class="input-fields">

                        <table>

                            <tr>
                                <td class="label_field"><label for="faculty_name" class="label-fields">Name of Faculty: </label></td>
                                <td><select name="faculty_name" class="input-fields">
                                        <option disabled>Name of Faculty</option>
                                        <?php
                                        $sql = "SELECT department from roles where name = '$userRole'";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        if ($row['department'] == 'centre')
                                            $sql = "SELECT Name FROM faculty";
                                        else
                                            $sql = "SELECT Name FROM faculty WHERE department='$userRole'";
                                        $result = mysqli_query($con, $sql);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['Name'] === $staff) ? 'selected' : '';
                                                echo '<option value="' . $row['Name'] . '" ' . $selected . '>' . $row['Name'] . '</option>';
                                            }
                                        } else {
                                            echo 'Query failed: ' . mysqli_error($con);
                                        }
                                        mysqli_close($con);
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="label_field">
                                    <label for="qualification" class="label-fields">Qualification: </label>
                                </td>
                                <td><input type="text" name="qualification" value="<?php echo $qualification; ?>" class="input-fields"></td>
                            </tr>

                            <tr>
                                <td class="label_field"> <label for="institute" class="label-fields">Institute: </label></td>
                                <td><input type="text" name="institute" value="<?php echo $institute; ?>" class="input-fields"></td>
                            </tr>
                            <tr>
                                <td class="label_field"> <label for="date" class="label-fields">Date: </label></td>
                                <td><input type="date" name="date" value="<?php echo $date; ?>" class="input-fields" required></td>
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
