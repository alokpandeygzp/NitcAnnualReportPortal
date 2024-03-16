<?php
// session_start();

require '../role.php';
include('../includes/check_login.php');
include("../includes/config.php");
include('../includes/config_connection.php');
include('../includes/set_user_role.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $_POST["name"];
    $studentName = filter_var($studentName, FILTER_SANITIZE_STRING);
    $studentAchievement = $_POST["achievement"];
    $studentAchievement = filter_var($studentAchievement, FILTER_SANITIZE_STRING);
    $date = $_POST["date"];
    $studentCourse = $_POST["course"];
    $studentSemester = $_POST["semester"];
    $studentRollno = $_POST["rollno"];
    $entity = $mail;

    $query1 = "INSERT INTO student_achievements (name, course, semester, rollno, achievement, entity, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query1);
    mysqli_stmt_bind_param($stmt, 'sssssss', $studentName, $studentCourse, $studentSemester, $studentRollno, $studentAchievement, $userRole, $date);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Entry added.");</script>';
    } else {
        echo '<script>alert("Entry addition failed.");</script>';
    }

    mysqli_stmt_close($stmt);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student achievement</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../styles/forms.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/c0795f1bee.js" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        $("#myForm").submit(function(event) {
            event.preventDefault();
            if (!validateForm()) {
                return;
            }

            $.ajax({
                type: "POST",
                url: "",
                data: $(this).serialize(),
                success: function() {
                    alert("Entry added.");
                    location.reload();
                },
                error: function() {
                    alert("Entry addition failed.");
                }
            });
        });

        function validateForm() {
            var studentName = document.forms["myForm"]["name"].value;
            var studentCourse = document.forms["myForm"]["course"].value;
            var studentSemester = document.forms["myForm"]["semester"].value;
            var studentRollno = document.forms["myForm"]["rollno"].value;
            var studentAchievement = document.forms["myForm"]["achievement"].value;
            var date = document.forms["myForm"]["date"].value;

            if (studentName.trim() == "" || studentAchievement.trim() == "" || date.trim() == "" ||
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
                    <a href="../dashboard.php" class="user_to_dash">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>    
                    <div class="user">
                        <img src="' . $pic . '" class="user_image" />
                        <h3>' . $fname . ' ' . $lname . '</h3>
                    </div>
                </div>';
        // require "../../common/logoutButton.php";
        echo '</div>';
        ?>

        <div class="subcontainer">
            <h2>Student Achievements during year 2023-24</h2>
            <div class="content_container">
                <div class="left_container">

                    <div class="form_container">
                        <form id="myForm" action="" method="post" onsubmit="return validateForm();" class="form_field">
                            <input type="text" name="name" placeholder="Name of student" class="input-fields"
                                autocomplete="off">
                            <input type="text" name="rollno" placeholder="Roll No." class="input-fields"
                                autocomplete="off">
                            <input type="text" name="course" placeholder="Course" class="input-fields"
                                autocomplete="off">
                            <input type="number" name="semester" placeholder="Semester" class="input-fields"
                                autocomplete="off">

                            <input type="text" name="achievement" placeholder="Achievement" class="input-fields"
                                autocomplete="off">
                            <div>
                                <input type="date" name="date" id="date" class="input-fields">
                            </div>
                            <button type="submit" class="submit-button"><span>Add Entry</span></button>
                        </form>
                    </div>
                </div>


                <div class="table_container">
                    <input type="text" id="searchInput" class="input-fields search" onkeyup="searchTable()"
                        placeholder="Search for something...">
                    <?php

                    if ($userRole == 'admin')
                        $sql = "SELECT * FROM student_achievements order by date";
                    else
                        $sql = "SELECT * FROM student_achievements where entity='$userRole' order by date";
                    $rs = mysqli_query($con, $sql);

                    echo '<div class="table_field">';
                    echo '
                <table id = "myTable" border="1"> 
                <tr> 
                    <th class="box sn_box">S. no.</th> 
                    <th class="box">Name of student</th> 
                    <th class="box">Course</th>
                    <th class="box">Semester</th>
                    <th class="box">Roll No</th>
                    <th class="box">Achievement</th> 
                    <th class="box date_box">Date</th> 
                    <th class="box action_box">Action</th>
                </tr>';

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($rs)) {
                        $name = $row['name'];
                        $course = $row['course'];
                        $semester = $row['semester'];
                        $rollno = $row['rollno'];
                        $achievement = $row['achievement'];
                        $date = $row['date'];
                        $id = $row['Id'];
                        echo '<tr>
                    <td class="box">' . $count . '</td>
                    <td class="box">' . $name . '</td>
                    <td class="box">' . $course . '</td>
                    <td class="box">' . $semester . '</td>
                    <td class="box">' . $rollno . '</td>
                    <td class="box">' . $achievement . '</td>
                    <td class="box">' . $date . '</td>
    
                    <td class="box button_box btn">
                    <div class="btn_inner_box">
                        <button class="edit_btn" data-id="' . $id . '"><i class="fas fa-edit"></i></button>
                        <button class="delete_btn"  onclick=handleDeleteClick(' . $id . ') "><i class="fas fa-trash-alt"></i></button>        
                    </div>         </td>
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
    <script src="../Javascript/search_bar.js"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<script>
function handleEditClick(event) {
    var id = event.currentTarget.getAttribute("data-id");

    if (id !== null && id !== undefined) {
        var user = "<?php echo $lname; ?>";

        // Using AJAX to send the id to a PHP script
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "set_session.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Redirect after setting the session variable
                window.location.href = 'editables/edit_student_achievements.php';
            }
        };
        xhr.send("id=" + id);
    } else {
        console.error("Invalid id for editing");
    }
}



function handleDeleteClick(id) {
    var isConfirmed = confirm("Are you sure you want to delete this entry?");
    if (isConfirmed) {

        fetch('../../api/api.php', {
                method: 'POST',
                body: JSON.stringify({
                    id: id,
                    action: 'delete',
                    table: 'student_achievements',
                    column: 'Id'
                })
            })
            .then(response => response.json())
            .then(data => {
                // window.alert(data.message);
                location.reload();
            })
            .catch(error => {
                window.alert('Error:', error);
            });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var editButtons = document.querySelectorAll(".edit_btn");
    var deleteButtons = document.querySelectorAll(".delete_btn");

    editButtons.forEach(function(button) {
        button.addEventListener("click", handleEditClick);
    });
});
</script>