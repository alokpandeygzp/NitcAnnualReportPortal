<?php
session_start(); // Ensure session is started

if (empty($_SESSION['access_token'])) {
    $fname = "Welcome! ";
    $lname = $_GET["user"];
    $pic = "../../asset/nitc_logo_icon.svg";
    $mail = $_GET["user"];
} else {
    $fname = $_SESSION["first_name"];
    $lname = $_SESSION['last_name'];
    $pic = $_SESSION['profile_picture'];
    $mail = $_SESSION['email_address'];
}

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$org = isset($_GET['org']) ? $_GET['org'] : '';

$sql = "SELECT * FROM consultancy WHERE organization = '$org'";
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

mysqli_close($con);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $originalOrg = $_POST["original_org"];
    $conNature = $_POST["nature"];
    $conOrg = $_POST["org"];
    $conRevenue = $_POST["revenue"];
    $conStatus = $_POST["status"];
    $conDate = $_POST["date"];
    $entity = $dep;

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    $query = "UPDATE consultancy SET nature=?, organization=?, revenue=?, status=?, date=? WHERE organization=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'sssssss', $conNature, $conOrg, $conRevenue, $conStatus, $conDate, $originalOrg, $entity);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Entry updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Entry update failed.']);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    exit(); // Terminate script after AJAX request
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Consultancy Entry</title>
    <link href="../../styles/edit_forms.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {
                event.preventDefault();

                if (!validateForm()) {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "edit_consultancy.php?user=<?php echo urlencode($lname); ?>&org=<?php echo urlencode($org); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json', // Expect JSON response
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            // Redirect to the consultancy page after a successful update
                            window.location.href = '../consultancy.php?user=<?php echo urlencode($lname); ?>';
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
                <a href="../../dashboard.php?user=' . $lname . '" class="user_to_dash">
                    <div class="user">
                        <img src="' . $pic . '" class="user_image" />
                        <h3>' . $fname . ' ' . $lname . '</h3>
                    </div>
                </a>
                <div class="logout_btn_holder">
                    <a href="../../logout.php" class="">
                        <button class="logout_btn">Logout</button>
                    </a>
                </div>
            </div>';
        ?>
        <div class="subcontainer">
            <div class="content_container">
                <h2>Edit Consultancy</h2><br>

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
                            <tr>
                                <td class="label_field"><label for="entity" class="label-fields">Entity: </label></td>
                                <td><input type="text" name="entity" value="<?php echo $dep; ?>" class="input-fields"
                                        readonly></td>
                            </tr>
                        </table>

                        <input type="submit" class="submit-button" value="Update Entry">
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
