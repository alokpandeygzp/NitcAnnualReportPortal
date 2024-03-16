<?php
require '../../role.php';
include('../../includes/check_login.php');
include("../../includes/config.php");
include('../../includes/config_connection.php');
include('../../includes/set_user_role.php');


$id = isset($_SESSION['edit_id']) ? $_SESSION['edit_id'] : '';
// unset($_SESSION['edit_id']);

$sql = "SELECT * FROM funded WHERE id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $agent = $row['agent'];
    $amount = $row['amount'];
    $start = $row['start'];
    $status = $row['status'];
    $prin = $row['principal'];
    $dep = $row['entity'];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $title = $_POST["title"];
    $agent = $_POST["agent"];
    $amount = $_POST["amount"];
    $start = $_POST["start"];
    $status = $_POST["status"];
    $prin = $_POST["principal"];
    $entity = $dep;

    $query = "UPDATE funded SET title=?, agent =?, amount=?, start=?, status=?, principal=? WHERE id=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'ssssssss', $title, $agent, $amount, $start, $status, $prin, $id, $dep );

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
    <title>Edit Funded Research PRojects</title>
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
                    url: "edit_funded.php?Id=<?php echo urlencode($id); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json',
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            window.location.href = '../funded.php';
                        }
                    },
                    error: function () {
                        alert("An error occurred during the update.");
                    }
                });
            });

            function validateForm() {
                var conNature = document.forms["myForm"]["title"].value;
                var conOrg = document.forms["myForm"]["agent"].value;
                var conRevenue = document.forms["myForm"]["amount"].value;
                var conStatus = document.forms["myForm"]["start"].value;
                var conDate = document.forms["myForm"]["principal"].value;

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
                    <a href="../../forms/funded.php" class="user_to_dash">
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
                <p class="form_heading">Edit Funded Research Projects</p>

                <div class="form_container">

                    <form id="myForm" action="" method="post" class="form_field">
                        
                        <table>
                            <tr>
                                <td class="label_field"><label for="title" class="label-fields">Title:
                                    </label></td>
                                <td><input type="text" name="title" value="<?php echo $title; ?>"
                                        class="input-fields" required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="agent" class="label-fields">Agent: </label></td>
                                <td><input type="text" name="agent" value="<?php echo $agent; ?>" class="input-fields" required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="amount" class="label-fields">Amount (in lakhs): </label></td>
                                <td><input type="text" name="amount" value="<?php echo $amount; ?>" class="input-fields"
                                        required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="start" class="label-fields">Date: </label></td>
                                <td><input type="date" name="start" value="<?php echo $start; ?>" class="input-fields"
                                        required></td>
                            </tr>
			    <tr>
                                <td class="label_field"><label for="status" class="label-fields">Status: </label></td>
                                <td><select name="status" class="input-fields" required>
                                <option disabled selected value ="">Status</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            	</select>
				</td>
                            </tr>
			    <tr>
                                <td class="label_field"><label for="principal" class="label-fields">Principal Investigator: </label></td>
                                <td><input type="text" name="principal" value="<?php echo $prin; ?>" class="input-fields"></td>
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
