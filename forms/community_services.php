<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffName = $_POST["name"];
    $progTitle = $_POST["title"];
    $entity = $_GET["user"];

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    $query1 = "INSERT INTO community_services (staff, title, entity) VALUES ('$staffName', '$progTitle', '$entity')";
    if (mysqli_query($con, $query1)) {
        echo '<script>alert("Entry added.");</script>';
    } else {
        echo '<script>alert("Entry addition failed.");</script>';
    }

    mysqli_close($con);

}

if (empty($_SESSION['access_token'])) {
    $fname = "Welcome! ";
    $lname = $_GET["user"];
    $pic = "./asset/nitc_logo_icon.svg";


    //below two lines are commented out for testing purpose. uncomment it to properly run system with login.

    // header('Location: index.php');
    // exit();
} else {
    $fname = $_SESSION["first_name"];
    $lname = $_SESSION['last_name'];
    $pic = $_SESSION['profile_picture'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Community services</title>
    <link href="../styles/forms.css" type="text/css" rel="stylesheet">
    <script>
        function validateForm() {
            var staffName = document.forms["myForm"]["name"].value;
            var progTitle = document.forms["myForm"]["title"].value;

            if (staffName.trim() == "" || progTitle.trim() == "") {
                alert("Please fill in all fields.");
                return false;
            }

            return true;
        }
    </script>

</head>

<body>


    <div class="container">
        <!-- header -->
        <?php
        echo '<div class="user_strip">
                <div class="user">
                    <img src="' . $pic . '" class="user_image" />
                    <h3>' . $fname . ' ' . $lname . '</h3>
                </div>
                <div class="logout_btn_holder">
                    <a href="../logout.php" class="">
                        <button class="logout_btn">Logout</button>
                    </a>
                </div  > 
            </div>';

        ?>
        <div class="content_container">
            <div class="left_container">
                <h2>Community Services</h2>
                <div class="form_container">
                    <form id="myForm" action="" method="post" onsubmit="return validateForm();" class="form_field">
                        <input type="text" name="name" placeholder="Name of staff" class="input-fields"><br><br>
                        <input type="text" name="title" placeholder="Community services" class="input-fields"><br><br>
                        <input type="submit" class="submit-button" value="Add Entry">
                    </form>
                </div>
            </div>

            <div class="table_container">
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
                $entity = $_GET["user"];
                if ($entity == 'admin' || $entity == '')
                    $sql = "SELECT * FROM community_services";
                else
                    $sql = "SELECT * FROM community_services where entity='$entity'";
                $rs = mysqli_query($con, $sql);

                echo '<div class="table_field">';
                echo '
                <table border="1"> 
                <tr> 
                    <th class="box">S. no.</th> 
                    <th class="box">Name of staff</th>                     
                    <th class="box">Services</th>
                    <th class="box">Entity</th>
                    <th class="box">Action</th>
                </tr>';

                $count = 1;
                while ($row = mysqli_fetch_assoc($rs)) {
                    $staff = $row['staff'];
                    $title = $row['title'];
                    $dep = $row['entity'];

                    echo '<tr>
                            <td class="box sn">' . $count . '</td>
                            <td class="box name">' . $staff . '</td>
                            <td class="box services">' . $title . '</td>
                            <td class="box entity">' . $dep . '</td>
                            <td class="box button_box btn"><button class="delete_btn" data-id=' . $title . '>Delete</button></td>
                        </tr>';

                    $count++;
                }
                echo '</table>
                </div>';
                ?>
            </div>
        </div>




    </div>

</body>

</html>


<script>
    function handleDeleteClick(event) {
        var id = event.target.getAttribute("data-id");

        // window.alert("status button clicked with ID: " + id);
        fetch('../api/api.php', {
            method: 'POST',
            body: JSON.stringify({ id: id, action: 'delete', table: 'community_services', column: 'title' })
        })
            .then(response => response.json())
            .then(data => {
                window.alert(data.message);
            })
            .catch(error => {
                // window.alert('Error:', error);
                console.error('Error:', error);
                window.alert('check console');
            });
        location.reload();
    }

    document.addEventListener('DOMContentLoaded', function () {
        var statusButtons = document.querySelectorAll(".delete-btn");

        statusButtons.forEach(function (button) {
            button.addEventListener("click", handleDeleteClick);
        });

    });
</script>