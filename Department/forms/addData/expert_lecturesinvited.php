<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"   && isset($_POST['form_type']) && $_POST['form_type'] === 'expert_lecturesinvited') 
{
    $staffName = $_POST["staff"];
    $staffName = filter_var($staffName , FILTER_SANITIZE_STRING);
    $progTitle = $_POST["title"];
    $progTitle = filter_var($progTitle, FILTER_SANITIZE_STRING);
    $progStart = $_POST["start"];
    $progEnd = $_POST["end"];
    $entity = $mail;
    $id = $_POST['Id'];

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    if (!$con) {
        die ('Could not connect: ' . mysqli_error($con));
    }

    // Prepare the query for either insert or update
    if (isset ($id) && !empty ($id)) {
        $query = "UPDATE expert_lecturesinvited SET staff=?, title=?, start=?, end=? WHERE Id=? AND entity=?";
    } else {
        $query = "INSERT INTO expert_lecturesinvited (staff, title, start, end, entity) VALUES (?, ?, ?, ?, ?)";
    }

    
    $stmt = mysqli_prepare($con, $query);
    if (!$stmt) {
        echo '<script>alert("Failed to prepare statement.");</script>';
    } else {
        if (isset ($id) && !empty ($id)) {
            mysqli_stmt_bind_param($stmt, 'ssssis', $staffName, $progTitle, $progStart, $progEnd, $id, $userRole );
        } else {
            mysqli_stmt_bind_param($stmt, 'sssss', $staffName, $progTitle, $progStart, $progEnd, $userRole);
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
        $("#expert_lecturesinvited").submit(function(event) {
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
            var progTitle = document.forms["expert_lecturesinvited"]["title"].value;
            var progStart = document.forms["expert_lecturesinvited"]["start"].value;
            var progEnd = document.forms["expert_lecturesinvited"]["end"].value;
            var staffName = document.forms["expert_lecturesinvited"]["staff"].value;
            if (staffName.trim() == "" || progTitle.trim() == "" || progStart.trim() == "" || progEnd.trim() == "" ) {
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
        <p class="form-name">Expert lectures Invited in Conferences/Seminar/workshops during year 2023-24</p>
        <div class="form-container">
            <form style="" id="expert_lecturesinvited" action="" method="post" onsubmit="return validateForm();">
                <input type="hidden" name="Id" value="<?php echo isset ($_GET['dataId']) ? $_GET['dataId'] : null; ?>">
                <input type="hidden" name="form_type" value="expert_lecturesinvited">
                              
                 <div class="row mb-3">
                    <label for="staff" class="col-sm-2 col-form-label label-class">Speaker Name: </label>
                    <div class="col-sm-10">
                        <input type="text" name="staff" placeholder="Name of the Speaker" class="form-control"></input>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label label-class">Title: </label>
                    <div class="col-sm-10">
                           <input type="text" name="title" placeholder="Title of the Programme" class="form-control"></input>
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