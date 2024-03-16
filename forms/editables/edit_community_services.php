<?php

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$id = isset($_GET['Id']) ? $_GET['Id'] : '';

$sql = "SELECT * FROM community_services WHERE Id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $staff = $row['staff'];
    $progTitle = $row['title'];
    $date = $row['date'];
    $dep = $row['entity'];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

mysqli_close($con);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $originalTitle = $_POST["original_title"];
    $staffName = $_POST["faculty_name"];
    $progTitle = $_POST["title"];
    $progDate = $_POST["date"];
    $entity = $dep;


    $query = "UPDATE community_services SET staff=?, title=?, date=? WHERE Id=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'sssis', $staffName, $progTitle, $progDate, $id, $entity);

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
    <link rel="stylesheet" href="../../styles/dashboard.css">
    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {
                event.preventDefault();

                if (!validateForm()) {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "edit_community_services.php?user=<?php echo urlencode($lname); ?>&Id=<?php echo urlencode($id); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json', // Expect JSON response
                    success: function (response) {

                        alert(response.message);

                        if (response.success) {
                            // Redirect to the community services page after a successful update
                            // window.location.href = '../community_services.php?user=<?php echo urlencode($lname); ?>';
                            console.log("successful");
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
                var progDate = document.forms["myForm"]["date"].value;

                if (staffName.trim() == "" || progTitle.trim() == "" || progDate.trim() == "") {
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
        <p class="form-name">Edit Community Services</p>
        <div class="form-container">
            <form id="myForm" action="" method="post">
                <input type="hidden" name="original_title" value="<?php echo $progTitle; ?>" class="">
                <div class="row mb-3">
                    <label for="faculty_name" class="col-sm-2 col-form-label label-class">Faculty Name: </label>
                    <div class="col-sm-10">
                        <!-- <input type="email" class="form-control" id="inputEmail3"> -->
                        <select name="faculty_name" class="form-control" id="faculty_name">
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
                        </select>
                        
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="community_services" class="col-sm-2 col-form-label label-class">Community Service:
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