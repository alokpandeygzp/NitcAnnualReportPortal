<?php
require '../../role.php';
include('../../includes/check_login.php');
include("../../includes/config.php");
include('../../includes/config_connection.php');
include('../../includes/set_user_role.php');

$id = isset($_SESSION['edit_id']) ? $_SESSION['edit_id'] : '';
// unset($_SESSION['edit_id']);

$sql = "SELECT * FROM student_achievements WHERE Id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $studentName = $row['name'];
    $studentCourse = $row['course'];
    $studentSemester = $row['semester'];
    $studentRollno = $row['rollno'];
    $achievement = $row['achievement'];
    $date = $row['date'];
    $dep = $row['entity'];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $originalAchievement = $_POST["original_achievement"];
    $studentName = $_POST["name"];
    $studentCourse = $_POST["course"];
    $studentSemester = $_POST["semester"];
    $studentRollno = $_POST["rollno"];
    $achievement = $_POST["achievement"];
    $date = $_POST["date"];
    $entity = $dep;

    $query = "UPDATE student_achievements SET name=?, course=?, semester=?, rollno=?, achievement=?, date=? WHERE Id=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'ssssssis', $studentName, $studentCourse, $studentSemester, $studentRollno, $achievement, $date, $id, $dep );

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
    <title>Edit Student Achievements Entry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../styles/edit_forms.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
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
                    url: "edit_student_achievements.php?Id=<?php echo urlencode($id); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json', 
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            window.location.href = '../student_achievements.php';
                        }
                    },
                    error: function () {
                        alert("An error occurred during the update.");
                    }
                });
            });

            function validateForm() {
                var studentName = document.forms["myForm"]["name"].value;
                var studentCourse = document.forms["myForm"]["course"].value;
                var studentSemester = document.forms["myForm"]["semester"].value;
                var studentRollno = document.forms["myForm"]["rollno"].value;
                var studentAchievement = document.forms["myForm"]["achievement"].value;
                var progDate = document.forms["myForm"]["date"].value;

                if (studentName.trim() == "" || studentAchievement.trim() == "" || progDate.trim() == "" ||
                    studentCourse.trim() == "" || studentSemester.trim() == "" || studentRollno.trim() == "") {
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
                    <a href="../../forms/student_achievements.php" class="user_to_dash">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>    
                    <div class="user">
                        <img src="' . $pic . '" class="user_image" />
                        <h3>' . $fname . ' ' . $lname . '</h3>
                    </div>
                </div>';
                require "../../../common/logoutButton.php";
        echo '
            </div>';
        ?>
        <div class="subcontainer">
            <div class="content_container">
                <p class="form_heading">Edit Student Achievements</p>

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
                                <td class="label_field"><label for="rollno" class="label-fields">Roll No: </label></td>
                                <td><input type="text" name="rollno" value="<?php echo $studentRollno; ?>"
                                        class="input-fields" required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="course" class="label-fields">Course: </label></td>
                                <td><input type="text" name="course" value="<?php echo $studentCourse; ?>"
                                        class="input-fields" required></td>
                            </tr>
                            <tr>
                                <td class="label_field"><label for="semester" class="label-fields">Semester: </label></td>
                                <td><input type="number" name="semester" value="<?php echo $studentSemester; ?>"
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
