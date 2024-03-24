<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['form_type']) && $_POST['form_type'] === 'community_services') {
    $staffName = $_POST["staff"];
    $progTitle = $_POST["title"];
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
        $query = "UPDATE community_services SET staff=?, title=?, date=? WHERE Id=? AND entity=?";
    } else {
        $query = "INSERT INTO community_services (staff, title, date, entity) VALUES (?, ?, ?, ?)";
    }


    
    $stmt = mysqli_prepare($con, $query);

    if (!$stmt) {
        echo '<script>alert("Failed to prepare statement.");</script>';
    } else {
        if (isset ($id) && !empty ($id)) {
            mysqli_stmt_bind_param($stmt, 'sssis', $staffName, $progTitle, $date, $id, $userRole);
        } else {
            mysqli_stmt_bind_param($stmt, 'ssss', $staffName, $progTitle, $date, $userRole);
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
    <script>
        function validateFormcommunityservices() {
            var staffName = document.forms["communityservices"]["staff"].value;
            var progTitle = document.forms["communityservices"]["title"].value;
            var date = document.forms["communityservices"]["date"].value;

            if (staffName.trim() == "" || progTitle.trim() == "" || date.trim() == "") {
                alert("Please fill in all fields.");
                return false;
            }
            return true;
        }
        $(document).ready(function () {
            $("#communityservices").submit(function (event) {
                event.preventDefault();
                if (!validateFormcommunityservices()) {
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
        });
    </script>
</head>

<body>
    <div class="d-flex flex-column align-items-center w-100">
        <p class="form-name">Community Services rendered during year 2023-24</p>
        <div class="form-container">
            <form style="" id="communityservices" action="" method="post"
                onsubmit="return validateFormcommunityservices();">
                <input type="hidden" name="Id" value="<?php echo isset ($_GET['dataId']) ? $_GET['dataId'] : null; ?>">
                <input type="hidden" name="form_type" value="community_services">

                <div class="row mb-3">
                    <label for="staff" class="col-sm-2 col-form-label label-class">Staff Name: </label>
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
                    <label for="title" class="col-sm-2 col-form-label label-class">Service: </label>
                    <div class="col-sm-10">
                        <textarea name="title" placeholder="Community services" class="form-control" rows=4></textarea>
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