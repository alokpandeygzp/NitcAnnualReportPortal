<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"   && isset($_POST['form_type']) && $_POST['form_type'] === 'consultancy') 
{
    $conNature = $_POST["nature"];
    $conNature = filter_var($conNature, FILTER_SANITIZE_STRING);
    $conOrg = $_POST["organization"];
    $conOrg = filter_var($conOrg, FILTER_SANITIZE_STRING);
    $conRevenue = $_POST["revenue"];
    $conStatus = $_POST["status"];
    $date = $_POST["date"];
    $entity = $mail;
    $id = $_POST['Id'];

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    if (!$con) {
        die ('Could not connect: ' . mysqli_error($con));
    }

    // Prepare the query for either insert or update
    if (isset ($id) && !empty ($id)) {
        $query = "UPDATE consultancy SET nature=?, organization=?, revenue=?, status=?, date=? WHERE Id=? AND entity=?";
    } else {
        $query = "INSERT INTO consultancy (nature, organization, revenue, status, date, entity) VALUES (?, ?, ?, ?, ?, ?)";
    }

    
    $stmt = mysqli_prepare($con, $query);
    if (!$stmt) {
        echo '<script>alert("Failed to prepare statement.");</script>';
    } else {
        if (isset ($id) && !empty ($id)) {
            mysqli_stmt_bind_param($stmt, 'sssssis', $conNature, $conOrg, $conRevenue, $conStatus, $date, $id, $userRole );
        } else {
            mysqli_stmt_bind_param($stmt, 'ssssss', $conNature, $conOrg, $conRevenue, $conStatus, $date, $userRole);
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
        $("#consultancy1").submit(function(event) {
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
            var conNature = document.forms["consultancy1"]["nature"].value;
            var conOrg = document.forms["consultancy1"]["organization"].value;
            var conRevenue = document.forms["consultancy1"]["revenue"].value;
            var conStatus = document.forms["consultancy1"]["status"].value;
            var date = document.forms["consultancy1"]["date"].value;

            if(conNature.trim()=="" || conOrg.trim()=="" || conRevenue.trim()=="" || conStatus.trim()=="" || date.trim()=="") 
            {
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
        <p class="form-name">Consultancy and Testing for year 2023-24</p>
        <div class="form-container">
            <form style="" id="consultancy1" action="" method="post" onsubmit="return validateForm();">
                <input type="hidden" name="Id" value="<?php echo isset ($_GET['dataId']) ? $_GET['dataId'] : null; ?>">
                <input type="hidden" name="form_type" value="consultancy">

                 <div class="row mb-3">
                    <label for="nature" class="col-sm-2 col-form-label label-class">Nature Of Service: </label>
                    <div class="col-sm-10">
                        <input type="text" name="nature" placeholder="Nature of service" class="form-control"></input>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="organization" class="col-sm-2 col-form-label label-class">Organization: </label>
                    <div class="col-sm-10">
                           <input type="text" name="organization" placeholder="Organization" class="form-control"></input>
                    </div>
                </div>      
                <div class="row mb-3">
                    <label for="revenue" class="col-sm-2 col-form-label label-class">Revenue: </label>
                    <div class="col-sm-10">
                           <input type="number" name="revenue" placeholder="Revenue Earned" class="form-control"></input>
                    </div>
                </div>      
                <div class="row mb-3">
                    <label for="status" class="col-sm-2 col-form-label label-class">Status: </label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control">
                            <option disabled selected>Status</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>  
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