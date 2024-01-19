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
    $mail = $_SESSION['email_address'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conNature = $_POST["nature"];
    $conOrg = $_POST["org"];
    $conRevenue = $_POST["revenue"];
    $conStatus = $_POST["status"];
    $date = $_POST["date"];
    $entity = $mail;

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    // Use prepared statement to prevent SQL injection
    $query1 = "INSERT INTO consultancy (nature, organization, revenue, status, date, entity) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query1);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ssssss', $conNature, $conOrg, $conRevenue, $conStatus, $date, $entity);

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
    <title>Consultancy</title>
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
            var conNature = document.forms["myForm"]["nature"].value;
            var conOrg = document.forms["myForm"]["org"].value;
            var conRevenue = document.forms["myForm"]["revenue"].value;
            var conStatus = document.forms["myForm"]["status"].value;
            var date = document.forms["myForm"]["date"].value;


            if (conNature.trim() == "" || conOrg.trim() == "" || conRevenue.trim() == "" || conStatus.trim() ==
                "" || date.trim() == "") {
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
            <h2>Consultancy and Testing</h2>
            <div class="content_container">
                <div class="left_container">

                    <div class="form_container">
                        <form id="myForm" action="" method="post" onsubmit="return validateForm();" class="form_field">
                            <input type="text" name="nature" placeholder="Nature of service"
                                class="input-fields"><br><br>
                            <input type="text" name="org" placeholder="Organization" class="input-fields"><br><br>
                            <input type="text" type="number" onkeypress="return isNumberKey(event)" name="revenue"
                                placeholder="Revenue earned" class="input-fields"><br><br>

                            <select name="status" class="input-fields">
                                <option disabled selected>Status</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select><br><br>
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
                        $sql = "SELECT * FROM consultancy";
                    else
                        $sql = "SELECT * FROM consultancy where entity='$entity'";
                    $rs = mysqli_query($con, $sql);

                    echo '<div class="table_field">';
                    echo '
                <table border="1"> 
                <tr> 
                    <th class="box">S. no.</th> 
                    <th class="box">Nature of service</th> 
                    <th class="box">Organization</th> 
                    <th class="box">Revenue</th> 
                    <th class="box">Status</th>
                    <th class="box">Date</th>
                    <th class="box">Entity</th>
                    <th class="box">Action</th>
                </tr>';

                    $count = 1;
                    while ($row = mysqli_fetch_assoc($rs)) {
                        $nature = $row['nature'];
                        $org = $row['organization'];
                        $revenue = $row['revenue'];
                        $status = $row['status'];
                        $date = $row['date'];
                        $dep = $row['entity'];

                        echo '<tr>
                    <td class="box sn">' . $count . '</td>
                    <td class="box nature">' . $nature . '</td>
                    <td class="box org">' . $org . '</td>
                    <td class="box rev">' . $revenue . '</td>
                    <td class="box status">' . $status . '</td>
                    <td class="box status">' . $date . '</td>
                    <td class="box entity">' . $dep . '</td>
                        
                    <td class="box button_box btn">
                    <div class="btn_inner_box">
                                    <button class="edit_btn" data-id="' . $org . '"><i class="fas fa-edit"></i></button>
                                    <button class="delete_btn" data-id="' . $org . '"><i class="fas fa-trash-alt"></i></button>
                        </div>        </td>
                    </tr>';

                        $count++;
                    }
                    echo '</div>';
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
        window.location.href = 'editables/edit_consultancy.php?org=' + encodeURIComponent(id) + '&user=' +
            encodeURIComponent(user);
    } else {
        // Handle the case where id is null or undefined
        console.error("Invalid id for editing");
        // You may want to display an alert or handle the error in a way that suits your application
    }
}


function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function handleDeleteClick(event) {
    var id = event.target.getAttribute("data-id");

    // window.alert("status button clicked with ID: " + id);
    fetch('../api/api.php', {
            method: 'POST',
            body: JSON.stringify({
                id: id,
                action: 'delete',
                table: 'consultancy',
                column: 'organization'
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
    var deleteButtons = document.querySelectorAll(".delete_btn");

    editButtons.forEach(function(button) {
        button.addEventListener("click", handleEditClick);
    });

    deleteButtons.forEach(function(button) {
        button.addEventListener("click", handleDeleteClick);
    });
});
</script>