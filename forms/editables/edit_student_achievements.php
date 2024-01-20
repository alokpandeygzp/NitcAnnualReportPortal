<?php
// edit_student_achievements.php
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
$sql = "SELECT * FROM student_achievements WHERE Id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $studentName = $row['name'];
    $achievement = $row['achievement'];
    $date = $row['date'];
    $dep = $row['entity'];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

mysqli_close($con);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $originalAchievement = $_POST["original_achievement"];
    $studentName = $_POST["name"];
    $achievement = $_POST["achievement"];
    $date = $_POST["date"];
    $entity = $dep;

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    $query = "UPDATE student_achievements SET name=?, achievement=?, date=? WHERE Id=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'sssis', $studentName, $achievement, $date, $id, $entity);

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
    <title>Edit Student Achievements Entry</title>
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
                    url: "edit_student_achievements.php?user=<?php echo urlencode($lname); ?>&Id=<?php echo urlencode($id); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json', // Expect JSON response
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            // Redirect to the student achievements page after a successful update
                            window.location.href = '../student_achievements.php?user=<?php echo urlencode($lname); ?>';
                        }
                    },
                    error: function () {
                        alert("An error occurred during the update.");
                    }
                });
            });

            function validateForm() {
                var studentName = document.forms["myForm"]["name"].value;
                var studentAchievement = document.forms["myForm"]["achievement"].value;
                var progDate = document.forms["myForm"]["date"].value;

                if (studentName.trim() == "" || studentAchievement.trim() == "" || progDate.trim() == "") {
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
                <h2>Edit Student Achievements</h2><br>

                <div class="form_container">

                    <form id="myForm" action="" method="post" class="form_field">
                        <input type="hidden" name="original_achievement" value="<?php echo $achievementId; ?>"
                            class="input-fields">

                        <table>

                            <tr>
                                <td class="label_field"><label for="name" class="label-fields">Student Name: </label></td>
                                <td><input type="text" name="name" value="<?php echo $studentName; ?>"
                                        class="input-fields" required></td>
                            </tr>
                            <tr>
                                <td class="label_field">
                                    <label for="achievement" class="label-fields">Achievement: </label>
                                </td>
                                <td><input type="text" name="achievement" value="<?php echo $achievement; ?>"
                                        class="input-fields" required></td>
                            </tr>

                            <tr>
                                <td class="label_field"> <label for="date" class="label-fields">Date: </label></td>
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
