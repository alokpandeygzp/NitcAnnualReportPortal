<?php
// edit_expert_lectures.php
session_start(); // Ensure session is started
if(empty($_SESSION['login']))
{
    header('Location: ../../index.php');
}
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

$id = isset($_GET['Id']) ? $_GET['Id'] : '';

$sql = "SELECT * FROM expert_lectures WHERE Id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $staff = $row['staff'];
    $progTitle = $row['title'];
    $start = $row['start'];
    $end = $row['end'];
    $progOrganization = $row['organization'];
    $dep = $row['entity'];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

mysqli_close($con);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $originalTitle = $_POST["original_title"];
    $staffName = $_POST["faculty_name"];
    $progTitle = $_POST["title"];
    $progStart = $_POST["start"];
    $progEnd = $_POST["end"];
    $progOrganization = $_POST["org"];
    $entity = $dep;

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    $query = "UPDATE expert_lectures SET staff=?, title=?, start=?, end=?, organization=? WHERE Id=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'sssssis', $staffName, $progTitle, $progStart, $progEnd, $progOrganization, $id, $entity);

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
    <title>Edit Expert Lectures Entry</title>
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
                    url: "edit_expert_lectures.php?user=<?php echo urlencode($lname); ?>&Id=<?php echo urlencode($id); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json', // Expect JSON response
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            // Redirect to the expert lectures page after a successful update
                            window.location.href = '../expert_lectures.php?user=<?php echo urlencode($lname); ?>';
                        }
                    },
                    error: function () {
                        alert("An error occurred during the update.");
                    }
                });
            });

            function validateForm() {
                var staffName = document.forms["myForm"]["faculty_name"].value;
                var progTitle = document.forms["myForm"]["title"].value;
                var progStart = document.forms["myForm"]["start"].value;
                var progEnd = document.forms["myForm"]["end"].value;
                var progOrganization = document.forms["myForm"]["org"].value;

                if (staffName.trim() == "" || progTitle.trim() == "" || progStart.trim() == "" || progEnd.trim() == "" || progOrganization.trim() == "") {
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
                <h2>Edit Expert Lectures</h2><br>

                <div class="form_container">

                    <form id="myForm" action="" method="post" class="form_field">
                        <input type="hidden" name="original_title" value="<?php echo $progTitle; ?>" class="input-fields">

                        <table>

                            <tr>
                                <td class="label_field"><label for="faculty_name" class="label-fields">Staff: </label></td>
                                <td><select name="faculty_name" class="input-fields">
                                        <option disabled>Name of Staff</option>
                                        <?php
                                        $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
                                        if (!$con) {
                                            die('Could not connect: ' . mysqli_error($con));
                                        }
                                        $entity = isset($_GET["user"]) ? $_GET["user"] : '';
                                        $sql = "SELECT Name FROM faculty WHERE Email='$entity'";
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
                                    <label for="title" class="label-fields">Title: </label>
                                </td>
                                <td><input type="text" name="title" value="<?php echo $progTitle; ?>" class="input-fields"
                                        readonly></td>
                            </tr>

                            <tr>
                                <td class="label_field"> <label for="start" class="label-fields">Start Date: </label></td>
                                <td><input type="date" name="start" value="<?php echo $start; ?>" class="input-fields"
                                        required></td>
                            </tr>

                            <tr>
                                <td class="label_field"> <label for="end" class="label-fields">End Date: </label></td>
                                <td><input type="date" name="end" value="<?php echo $end; ?>" class="input-fields"
                                        required></td>
                            </tr>

                            <tr>
                                <td class="label_field"><label for="org" class="label-fields">Organization: </label></td>
                                <td><input type="text" name="org" value="<?php echo $progOrganization; ?>"
                                        class="input-fields"></td>
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
