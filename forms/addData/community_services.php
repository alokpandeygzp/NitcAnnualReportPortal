<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffName = $_POST["staff"];
    $progTitle = $_POST["title"];
    $date = $_POST["date"];
    $entity = $mail;
    $id = $_POST['Id'];

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
    // Check the connection
    if (!$con) {
       die('Could not connect: ' . mysqli_error($con));
   }

    if(isset($id) && !empty($id)) {
        $query = "UPDATE community_services SET staff=?, title=?, date=? WHERE Id=? AND entity=?";
    } else {
        $query = "INSERT INTO community_services (staff, title, date, entity) VALUES (?, ?, ?, ?)";
    }

   

    // Use prepared statement to prevent SQL injection
    
    $stmt = mysqli_prepare($con, $query);

    if(isset($id)) {
        mysqli_stmt_bind_param($stmt, 'sssis', $staffName, $progTitle, $date, $id, $entity);
    } else {
        mysqli_stmt_bind_param($stmt, 'ssss', $staffName, $progTitle, $date, $entity);
    }

    // Bind parameters
    

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
<html lang="en">

<head>
    <link rel="stylesheet" href="../../styles/dashboard.css">
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
                var staffName = document.forms["myForm"]["staff"].value;
                var progTitle = document.forms["myForm"]["title"].value;
                var date = document.forms["myForm"]["date"].value;

                if (staffName.trim() == "" || progTitle.trim() == "" || date.trim() == "") {
                    alert("Please fill in all fields.");
                    return false;
                }

                return true;
            }
        });
    </script>
</head>

<body>
    <div class="d-flex flex-column align-items-center w-100">
        <p class="form-name">Community Services</p>
        <div class="form-container">
            <form style="" id="myForm" action="" method="post" onsubmit="return validateForm();">
            <input type="hidden" name="Id" value="<?php echo isset($_GET['dataId']) ? $_GET['dataId'] : null; ?>">
    
            <div class="row mb-3">
                    <label for="faculty_name" class="col-sm-2 col-form-label label-class">Faculty Name: </label>
                    <div class="col-sm-10">
                        <!-- <input type="email" class="form-control" id="inputEmail3"> -->
                        <select name="staff" class="form-control" id="faculty_name">
                            <option disabled selected>Name of Staff</option>
                            <?php
                            // Establish a connection to the database
                            $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

                            // Check the connection
                            if (!$con) {
                                die('Could not connect: ' . mysqli_error($con));
                            }

                            // Set $entity based on your logic
                            // $entity = isset($_GET["user"]) ? $_GET["user"] : '';
                            // echo "Value of entity: " . $entity;

                            // Select the faculty names from the database based on the entity
                            $sql = "SELECT Name FROM faculty WHERE Email='junaid_m210662ca@nitc.ac.in'";
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
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="community_services" class="col-sm-2 col-form-label label-class">Community Services:
                    </label>
                    <div class="col-sm-10">
                        <textarea id="community_services" class="form-control" name="title"
                            placeholder="Community services" rows=4></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label label-class">Date: </label>
                    <div class="col-sm-10">
                        <input type="date" name="date" id="date" placeholder="Date here" class="form-control">
                    </div>
                </div>

                <button type="submit" class="submit_btn mt-2"><span>Add Entry</span></button>

            </form>
        </div>

    </div>



</body>

</html>