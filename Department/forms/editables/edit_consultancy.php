<?php
require '../../role.php';
include('../../includes/check_login.php');
include("../../includes/config.php");
include('../../includes/config_connection.php');
include('../../includes/set_user_role.php');

$id = isset($_SESSION['edit_id']) ? $_SESSION['edit_id'] : '';
// unset($_SESSION['edit_id']);

$sql = "SELECT * FROM consultancy WHERE Id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $nature = $row['nature'];
    $org = $row['organization'];
    $revenue = $row['revenue'];
    $status = $row['status'];
    $date = $row['date'];
    $dep = $row['entity'];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $originalOrg = $_POST["original_org"];
    $conNature = $_POST["nature"];
    $conOrg = $_POST["org"];
    $conRevenue = $_POST["revenue"];
    $conStatus = $_POST["status"];
    $conDate = $_POST["date"];
    $entity = $dep;

    $query = "UPDATE consultancy SET nature=?, organization=?, revenue=?, status=?, date=? WHERE Id=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'sssssis', $conNature, $conOrg, $conRevenue, $conStatus, $conDate, $id, $dep );

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
    <title>Edit Consultancy Entry</title>
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
                    url: "edit_consultancy.php?Id=<?php echo urlencode($id); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json', 
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            window.location.href = '../consultancy.php';
                        }
                    },
                    error: function () {
                        alert("An error occurred during the update.");
                    }
                });
            });

            function validateForm() {
                var conNature = document.forms["myForm"]["nature"].value;
                var conOrg = document.forms["myForm"]["org"].value;
                var conRevenue = document.forms["myForm"]["revenue"].value;
                var conStatus = document.forms["myForm"]["status"].value;
                var conDate = document.forms["myForm"]["date"].value;

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
                    <a href="../../forms/consultancy.php" class="user_to_dash">
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
                <p class="form_heading">Edit Consultancy</p>

                <div class="form_container">

                    <form id="myForm" action="" method="post" class="form_field">
                        <input type="hidden" name="original_org" value="<?php echo $org; ?>" class="input-fields">

                        <table>
                            <tr>
                                <td class="label_field"><label for="nature" class="label-fields">Nature of service:
                                    </label></td>
                                <td><input type="text" name="nature" value="<?php echo $nature; ?>"
                                        class="input-fields" required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="org" class="label-fields">Organization: </label></td>
                                <td><input type="text" name="org" value="<?php echo $org; ?>" class="input-fields"
                                        required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="revenue" class="label-fields">Revenue earned:
                                    </label></td>
                                <td><input type="number" onkeypress="return isNumberKey(event)" name="revenue"
                                        value="<?php echo $revenue; ?>" class="input-fields" required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="status" class="label-fields">Status: </label></td>
                                <td><select name="status" class="input-fields">
                                        <option disabled>Status</option>
                                        <option value="In Progress" <?php echo ($status === 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                                        <option value="Completed" <?php echo ($status === 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="date" class="label-fields">Date: </label></td>
                                <td><input type="date" name="date" value="<?php echo $date; ?>" class="input-fields"
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
