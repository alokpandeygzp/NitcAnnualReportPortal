<?php
session_start();
require '../role.php';
include('../includes/check_login.php');
include("../includes/config.php");
include('../includes/config_connection.php');
include('../includes/set_user_role.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $author = $_POST["author"];
    $journal = $_POST["journal"];
    $title = $_POST["title"];
    $vol = $_POST["vol"];
    $author = filter_var($author, FILTER_SANITIZE_STRING);
    $journal = filter_var($journal , FILTER_SANITIZE_STRING);
    $title = filter_var($title , FILTER_SANITIZE_STRING);
    $vol = filter_var($vol , FILTER_SANITIZE_STRING);
    $entity = $mail;

    $query1 = "INSERT INTO journal (author, title, journal, vol_pp, entity) VALUES (?, ?, ?,?, ?)";
    $stmt = mysqli_prepare($con, $query1);
    mysqli_stmt_bind_param($stmt, 'sssss', $author, $title, $journal, $vol, $userRole );

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
    <title>Journal</title>
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
            var dept = document.forms["myForm"]["author"].value;
            var journal = document.forms["myForm"]["journal"].value;
            var ic = document.forms["myForm"]["title"].value;
            var nc = document.forms["myForm"]["vol"].value;
           

            if (dept.trim() == "" || journal.trim() == "" || ic.trim() == "" || nc.trim() == "") {
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
                require "../../common/logoutButton.php";
            echo '</div>';
        ?>

        <div class="subcontainer">
            <h2>Journal Papers Published for the year 2023-24</h2>
            <div class="content_container">
                <div class="left_container">

                    <div class="form_container">
                        <form id="myForm" action="" method="post" onsubmit="return validateForm();" class="form_field">
                            <input type="text" name="author" placeholder="Name of the Author" class="input-fields">
                            <input type="text" name="title" placeholder="Title of the Paper" class="input-fields">
                            <input type="text" name="journal" placeholder="Name of Journal" class="input-fields">
                            <input type="text" name="vol" placeholder="Vol, Year, P.P." class="input-fields">
                            <button type="submit" class="submit-button"><span>Add Entry</span></button>
                        </form>
                    </div>
                </div>

                <div class="table_container">
                    <input type="text" id="searchInput" class="input-fields search" onkeyup="searchTable()"
                        placeholder="Search for something...">

                    <?php
                    if ($userRole == 'admin')
                        $sql = "SELECT * FROM journal";
                    else
                        $sql = "SELECT * FROM journal where entity='$userRole'";
                    
                    $rs = mysqli_query($con, $sql);
                
                    echo '<div class="table_field">';
                    echo '
                        <table id="myTable" border="1"> 
                        <tr> 
                            <th class="box sn_box">S. no.</th> 
                            <th class="box">Name of the Author</th> 
                            <th class="box">Title of the Paper</th> 
                            <th class="box">Name of Journal</th> 
                            <th class="box">VOL, Year, P.P.</th>
			                <th class="box action_box">Action</th>

                        </tr>';

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($rs)) {
                        $author = $row['author'];
                        $title = $row['title'];
                        $journal = $row['journal'];
                        $vol = $row['vol_pp'];
                        $id = $row['id'];
                        echo '<tr>

                    <td class="box">' . $count . '</td>
                    <td class="box">' . $author . '</td>
                    <td class="box">' . $title . '</td>
                    <td class="box">' . $journal . '</td>
                    <td class="box">' . $vol . '</td>
                    <td class="box button_box btn">
                        <div class="btn_inner_box">
                            <button class="edit_btn" data-id="' . $id . '"><i class="fas fa-edit"></i></button>
                            <button class="delete_btn"  onclick=handleDeleteClick(' . $id . ') "><i class="fas fa-trash-alt"></i></button>        
                         </div></td>
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
                window.location.href = 'editables/edit_journal.php';
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
                table: 'journal',
                column: 'id'
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