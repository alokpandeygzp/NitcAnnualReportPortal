<?php
session_start();

if (empty($_SESSION['login'])) {
    header('Location: ../index.php');
}

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
    $mail = $_SESSION['email_address'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffName = $_POST["faculty_name"];
    $progTitle = $_POST["title"];
    $progStart = $_POST["start"];
    $progEnd = $_POST["end"];
    $entity = $mail;

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    // Use prepared statement to prevent SQL injection
    $query1 = "INSERT INTO conferences (title, name, start, end, entity) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query1);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'sssss', $progTitle, $staffName, $progStart, $progEnd, $entity);

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
    <title>Conferences</title>
    <link href="../styles/forms.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-<YOUR-INTEGRITY-CODE>" crossorigin="anonymous" />

    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {
                event.preventDefault();

                // Validate the form
                if (!validateForm()) {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "",
                    data: $(this).serialize(),
                    success: function () {
                        alert("Entry added.");
                        // Reload the page after a successful form submission
                        location.reload();
                    },
                    error: function () {
                        alert("Entry addition failed.");
                    }
                });
            });
            function validateForm() {
                var staffName = document.forms["myForm"]["faculty_name"].value;
                var progTitle = document.forms["myForm"]["title"].value;
                var progStart = document.forms["myForm"]["start"].value;
                var progEnd = document.forms["myForm"]["end"].value;

                if (staffName.trim() == "" || progTitle.trim() == "" || progStart.trim() == "" || progEnd.trim() == "") {
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
            <h2>Conferences</h2>
            <div class="content_container">
                <div class="left_container">

                    <div class="form_container">
                        <form id="myForm" action="" method="post" onsubmit="return validateForm();" class="form_field">
                            <input type="text" name="title" placeholder="Title" class="input-fields"><br><br>
                            <!-- <input type="text" name="name" placeholder="Co-ordinators" class="input-fields"><br><br> -->
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
                            <div class="date_holder">
                                <span>Start:</span>&nbsp;
                                <input type="date" name="start" placeholder="Start" class="input-fields"><br><br>
                            </div>
                            <div class="date_holder">
                                <span>Ends: </span>&nbsp;
                                <input type="date" name="end" placeholder="End" class="input-fields"><br><br>
                            </div>


                            <input type="submit" class="submit-button" value="Add Entry">
                        </form>
                    </div>
                </div>

                <div class="table_container">
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
                    $entity = $_GET["user"];
                    if ($entity == 'admin' || $entity == '')
                        $sql = "SELECT * FROM conferences";
                    else
                        $sql = "SELECT * FROM conferences where entity='$entity'";
                    $rs = mysqli_query($con, $sql);

                    echo '<div class="table_field">';
                    echo '
                <table border="1"> 
                <tr> 
                    <th class="box">S. no.</th>  
                    <th class="box">Title</th> 
                    <th class="box">Co-ordinators</th>
                    <th class="box">Start</th>                     
                    <th class="box">End</th>          
                    <th class="box">Entity</th>           
                    <th class="box">Action</th>
                </tr>';

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($rs)) {
                        $title = $row['title'];
                        $staff = $row['name'];
                        $start = $row['start'];
                        $end = $row['end'];
                        $dep = $row['entity'];
                        $id = $row['Id'];
                        echo '<tr>
                                <td class="box sn">' . $count . '</td>                    
                                <td class="box title">' . $title . '</td>
                                <td class="box coords">' . $staff . '</td>
                                <td class="box s_date">' . $start . '</td>
                                <td class="box e_date">' . $end . '</td>
                                <td class="box entity">' . $dep . '</td>
                            
                                <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <button class="edit_btn" data-id="' . $id . '"><i class="fas fa-edit"></i></button>
                                    <button class="delete_btn"  onclick=handleDeleteClick(' . $id . ') "><i class="fas fa-trash-alt"></i></button>        
                                    </div>
                                    </td>
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
</body>

</html>

<script>
    function handleEditClick(event) {
        var id = event.currentTarget.getAttribute("data-id");

        // Check if id is not null or undefined before redirecting
        if (id !== null && id !== undefined) {
            // Redirect to the edit page with the community service title as a parameter
            var user = "<?php echo $lname; ?>";
            window.location.href = 'editables/edit_conferences.php?Id=' + encodeURIComponent(id) + '&user=' +
                encodeURIComponent(user);
        } else {
            // Handle the case where id is null or undefined
            console.error("Invalid id for editing");
            // You may want to display an alert or handle the error in a way that suits your application
        }
    }


    function handleDeleteClick(id) {
        fetch('../api/api.php', {
            method: 'POST',
            body: JSON.stringify({
                id: id,
                action: 'delete',
                table: 'conferences',
                column: 'Id'
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

    document.addEventListener('DOMContentLoaded', function () {
        var editButtons = document.querySelectorAll(".edit_btn");
        var deleteButtons = document.querySelectorAll(".delete_btn");

        editButtons.forEach(function (button) {
            button.addEventListener("click", handleEditClick);
        });
    });
</script>