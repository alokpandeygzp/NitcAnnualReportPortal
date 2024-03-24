<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['form_type']) && $_POST['form_type'] === 'patents') {
    $patentStaff = $_POST["staff"];
    $patentTitle = $_POST["title"];
    $progTitle = filter_var($progTitle, FILTER_SANITIZE_STRING);
    $date = $_POST["date"];
    $entity = $mail;
    $id = $_POST['Id'];

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    if (!$con) {
        die ('Could not connect: ' . mysqli_error($con));
    }

    // Prepare the query for either insert or update
    if (isset ($id) && !empty ($id)) {
        $query = "UPDATE patents SET staff=?, title=?, date=? WHERE Id=? and entity=? ";
    } else {
        $query = "INSERT INTO patents (staff, title, entity, date) VALUES (?, ?, ?, ?)";
    }



    $stmt = mysqli_prepare($con, $query);

    if (!$stmt) {
        echo '<script>alert("Failed to prepare statement.");</script>';
    } else {
        if (isset ($id) && !empty ($id)) {
            mysqli_stmt_bind_param($stmt, 'sssis', $patentStaff, $patentTitle, $date, $id, $userRole);
        } else {
            mysqli_stmt_bind_param($stmt, 'ssss', $patentStaff, $patentTitle, $userRole, $date);

        }

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Entry added/updated.");</script>';
        } else {
            echo '<script>alert("Entry addition/updation failed.");</script>';
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../styles/dashboard.css">
    <script>
        $(document).ready(function () {
            $("#patents1").submit(function (event) {
                event.preventDefault();
                if (!validateForm()) {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "",
                    data: $(this).serialize(),
                    success: function () {
                        alert("Entry added.");
                        location.reload();
                    },
                    error: function () {
                        alert("Entry addition failed.");
                    }
                });
            });

            function validateForm() {
                var patentStaff = document.forms["patents1"]["staff"].value;
                var patentTitle = document.forms["patents1"]["title"].value;
                var date = document.forms["patents1"]["date"].value;


                if (patentStaff.trim() == "" || patentTitle.trim() == "" || date.trim() == "") {
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
        <p class="form-name">Patents Acquired and Filed during year 2023-24</p>
        <div class="form-container">
            <form style="" id="patents1" action="" method="post" onsubmit="return validateForm();">

                <input type="hidden" name="Id" value="<?php echo isset ($_GET['dataId']) ? $_GET['dataId'] : null; ?>">
                <input type="hidden" name="form_type" value="patents">

                <div class="row mb-3">
                    <label for="staff" class="col-sm-2 col-form-label label-class">Name Of Staff: </label>
                    <div class="col-sm-10">
                        <select name="staff" class="form-control">
                            <option disabled selected>Name of Staff</option>

                            <?php
                            $sql = "SELECT department from roles where name = '$userRole'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_assoc($result);

                            if ($row['department'] == 'centre')
                                $sql = "SELECT Name FROM faculty";
                            else
                                $sql = "SELECT Name FROM faculty WHERE department='$userRole'";
                            $result = mysqli_query($con, $sql);


                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
                                }
                            } else {
                                echo 'Query failed: ' . mysqli_error($con);
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label label-class">Description of Patent: </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" placeholder="Description of Patent"
                            class="form-control"></input>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label label-class">Date: </label>
                    <div class="col-sm-10">
                        <input type="date" name="date" placeholder="Date" class="form-control">
                    </div>
                </div>

                <button type="submit" class="submit_btn mt-2"><span>Add Entry</span></button>

            </form>
        </div>

    </div>



</body>

</html>