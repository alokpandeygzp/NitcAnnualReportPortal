<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"   && isset($_POST['form_type']) && $_POST['form_type'] === 'expert_lectures') 
{
    $staffName = $_POST["staff"];
    $progTitle = $_POST["title"];
    $progTitle = filter_var($progTitle, FILTER_SANITIZE_STRING);
    $progStart = $_POST["start"];
    $progEnd = $_POST["end"];
    $progOrganization = $_POST["organization"];
    $progOrganization = filter_var($progOrganization, FILTER_SANITIZE_STRING);
    $entity = $mail;
    $id = $_POST['Id'];

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    if (!$con) {
        die ('Could not connect: ' . mysqli_error($con));
    }

    // Prepare the query for either insert or update
    if (isset ($id) && !empty ($id)) {
        $query = "UPDATE expert_lectures SET staff=?, title=?, start=?, end=?, organization=? WHERE Id=? AND entity=?";
    } else {
        $query = "INSERT INTO expert_lectures (staff, title, start, end, organization, entity) VALUES (?, ?, ?, ?, ?, ?)";
    }

    
    $stmt = mysqli_prepare($con, $query);
    if (!$stmt) {
        echo '<script>alert("Failed to prepare statement.");</script>';
    } else {
        if (isset ($id) && !empty ($id)) {
            mysqli_stmt_bind_param($stmt, 'sssssis', $staffName, $progTitle, $progStart, $progEnd, $progOrganization, $id, $userRole );
        } else {
            mysqli_stmt_bind_param($stmt, 'ssssss', $staffName, $progTitle, $progStart, $progEnd, $progOrganization, $userRole);
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
    $(document).ready(function() {
        $("#expert_lectures").submit(function(event) {
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
            var progTitle = document.forms["expert_lectures"]["title"].value;
            var progStart = document.forms["expert_lectures"]["start"].value;
            var progEnd = document.forms["expert_lectures"]["end"].value;
            var progOrganization = document.forms["expert_lectures"]["organization"].value;
            var staffName = document.forms["expert_lectures"]["staff"].value;

            if (staffName.trim() == "" || progTitle.trim() == "" || progStart.trim() == "" || progEnd.trim() ==
                "" || progOrganization.trim() == "") {
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
        <p class="form-name">Expert lectures delivered in Conferences/Seminar/workshops during year 2023-24</p>
        <div class="form-container">
            <form style="" id="expert_lectures" action="" method="post" onsubmit="return validateForm();">
                <input type="hidden" name="Id" value="<?php echo isset ($_GET['dataId']) ? $_GET['dataId'] : null; ?>">
                <input type="hidden" name="form_type" value="expert_lectures">
                              
                 <div class="row mb-3">
                    <label for="staff" class="col-sm-2 col-form-label label-class">Speaker Name: </label>
                    <div class="col-sm-10">
                       <select name="staff" class="form-control">
                            <option disabled selected>Name of Speaker</option>
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
                    <label for="title" class="col-sm-2 col-form-label label-class">Title: </label>
                    <div class="col-sm-10">
                           <input type="text" name="title" placeholder="Title of the Programme" class="form-control"></input>
                    </div>
                </div>     

                <div class="row mb-3">
                    <label for="organization" class="col-sm-2 col-form-label label-class">Organization: </label>
                    <div class="col-sm-10">
                           <input type="text" name="organization" placeholder="Organization" class="form-control"></input>
                    </div>
                </div>     
                <div class="row mb-3">
                    <label for="start" class="col-sm-2 col-form-label label-class">Start: </label>
                    <div class="col-sm-10">
                        <input type="date" name="start" placeholder="Start" class="form-control">
                    </div>
                </div>
                
               
                <div class="row mb-3">
                    <label for="end" class="col-sm-2 col-form-label label-class">End: </label>
                    <div class="col-sm-10">
                        <input type="date" name="end" placeholder="End" class="form-control">
                    </div>
                </div>
                <button type="submit" class="submit_btn mt-2"><span>Add Entry</span></button>

            </form>
        </div>

    </div>



</body>

</html>