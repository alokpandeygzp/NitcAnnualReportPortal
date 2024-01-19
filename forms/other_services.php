<?php
session_start();

if (empty($_SESSION['access_token'])) {
    $fname = "Welcome! ";
    $lname = $_GET["user"];
    $pic = "../asset/nitc_logo_icon.svg";
    $mail = $_GET["user"];
    
    //below two lines are commented out for testing purpose. uncomment it to properly run system with login.

    // header('Location: index.php');
    // exit();
} else {
    $fname = $_SESSION["first_name"];
    $lname = $_SESSION['last_name'];
    $pic = $_SESSION['profile_picture'];
    $mail=$_SESSION['email_address'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffName = $_POST["faculty_name"];
    $progTitle = $_POST["title"];
    $date  = $_POST["date"];
    $entity = $mail;

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    $query1 = "INSERT INTO other_services (staff, title, date,  entity) VALUES (?, ?, ?, ?)";
    
    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, $query1);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ssss', $staffName, $progTitle, $date, $entity);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Entry added.");</script>';
    } else {
        echo '<script>alert("Entry addition failed.");</script>';
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Other services</title>
    <link href="../styles/forms.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-<YOUR-INTEGRITY-CODE>" crossorigin="anonymous" />
    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                event.preventDefault();

                // Validate the form
                if (!validateForm()) {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "",
                    data: $(this).serialize(),
                    success: function() {
                        alert("Entry added.");
                        // Reload the page after a successful form submission
                        location.reload();
                    },
                    error: function() {
                        alert("Entry addition failed.");
                    }
                });
            });

            function validateForm() {
                var staffName = document.forms["myForm"]["faculty_name"].value;
                var progTitle = document.forms["myForm"]["title"].value;
                var date = document.forms["myForm"]["date"].value;

                if (staffName.trim() == "" || progTitle.trim() == "" || date.trim()=="") {
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
        <!-- header -->
        <?php
        echo '<div class="user_strip">
                <a href="../dashboard.php?user=' . $lname . '" class="user_to_dash">
                    <div class="user">
                        <img src="' . $pic . '" class="user_image" />
                        <h3>' . $fname . ' ' . $lname . '</h3>
                    </div>
                </a>
                <div class="logout_btn_holder">
                    <a href="../logout.php" class="">
                        <button class="logout_btn">Logout</button>
                    </a>
                </div  > 
            </div>';

        ?>
        <div class="subcontainer">
            <h2>Other Services</h2>
            <div class="content_container">
                <div class="left_container">

                    <div class="form_container">
                        <form id="myForm" action="" method="post" onsubmit="return validateForm();" class="form_field">
                            <!-- <input type="text" name="name" placeholder="Name of staff" class="input-fields"><br><br> -->
                            <select name="faculty_name" class="input-fields">
                                <option disabled selected>Name of Staff</option>
                                <?php
                                    // Establish a connection to the database
                                    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

                                    // Check the connection
                                    if (!$con) {
                                        die('Could not connect: ' . mysqli_error($con));
                                    }

                                    // Set $entity based on your logic
                                    $entity = isset($_GET["user"]) ? $_GET["user"] : '';

                                    // Select the faculty names from the database based on the entity
                                    $sql = "SELECT Name FROM faculty WHERE Email='$entity'";
                                    $result = mysqli_query($con, $sql);

                                    // Check if the query was successful
                                    if ($result) {
                                        // Fetch and display faculty names as options
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
                                        }
                                    } else {
                                        echo 'Query failed: ' . mysqli_error($con);
                                    }

                                    // Close the database connection
                                    mysqli_close($con);
                                ?>
                            </select><br><br>
                            <textarea name="title" placeholder="Other services"  class="input-fields textarea" rows=4></textarea><br><br>
                            <div>
                                <label for="date">Date: </label>
                                <input type="date" name="date" id="date" class="input-fields">
                            </div><br><br>
                            <input type="submit" class="submit-button" value="Add Entry">
                        </form>
                    </div>
                </div>

                <div class="table_container">
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
                    $entity = $_GET["user"];
                    if ($entity == 'admin' || $entity == '')
                        $sql = "SELECT * FROM other_services";
                    else
                        $sql = "SELECT * FROM other_services where entity='$entity'";
                    $rs = mysqli_query($con, $sql);

                    echo '<div class="table_field">';
                    echo '
                <table  border="1"> 
                <tr> 
                    <th class="box">S. no.</th> 
                    <th class="box">Name of staff</th>                     
                    <th class="box">Services</th>
                    <th class="box">Date</th>
                    <th class="box">Entity</th>
                    <th class="box">Action</th>
                </tr>';

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($rs)) {
                        $staff = $row['staff'];
                        $title = $row['title'];
                        $date = $row['date'];
                        $dep = $row['entity'];

                        echo '<tr>
                    <td class="box sn">' . $count . '</td>
                    <td class="box name">' . $staff . '</td>
                    <td class="box services">' . $title . '</td>
                    <td class="box services">' . $date . '</td>
                    <td class="box entity">' . $dep . '</td>
                    
                    <td class="box button_box btn">
                    <div class="btn_inner_box">
                                <button class="edit_btn" data-id="' . $title . '"><i class="fas fa-edit"></i></button>
                                <button class="delete_btn" data-id="' . $title . '"><i class="fas fa-trash-alt"></i></button>
                     </div>       </td>
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
function handleEditClick(event) {
    var id = event.currentTarget.getAttribute("data-id");

    // Check if id is not null or undefined before redirecting
    if (id !== null && id !== undefined) {
        // Redirect to the edit page with the community service title as a parameter
        var user = "<?php echo $lname; ?>";
        window.location.href = 'editables/edit_other_services.php?title=' + encodeURIComponent(id) + '&user=' +
            encodeURIComponent(user);
    } else {
        // Handle the case where id is null or undefined
        console.error("Invalid id for editing");
        // You may want to display an alert or handle the error in a way that suits your application
    }
}

function handleDeleteClick(event) {
    var id = event.target.getAttribute("data-id");

    // window.alert("status button clicked with ID: " + id);
    fetch('../api/api.php', {
            method: 'POST',
            body: JSON.stringify({
                id: id,
                action: 'delete',
                table: 'other_services',
                column: 'title'
            })
        })
        .then(response => response.json())
        .then(data => {
            window.alert(data.message);

            // Reload the page after successful deletion
            location.reload();
        })
        .catch(error => {
            window.alert('Error:', error);
            // console.error('Error:', error);
            // window.alert('check console');
        });
    // location.reload();
}

document.addEventListener('DOMContentLoaded', function() {
    var editButtons = document.querySelectorAll(".edit_btn");
    var statusButtons = document.querySelectorAll(".delete_btn");

    editButtons.forEach(function (button) {
        button.addEventListener("click", handleEditClick);
    });

    statusButtons.forEach(function(button) {
        button.addEventListener("click", handleDeleteClick);
    });

});
</script>