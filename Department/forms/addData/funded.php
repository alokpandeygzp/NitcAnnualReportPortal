<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"   && isset($_POST['form_type']) && $_POST['form_type'] == 'funded') 
{
    $title = $_POST["title"];
    $agent = $_POST["agent"];
    $amount = $_POST["amount"];
    $start = $_POST["start"];
    $status = $_POST["status"];
    $principal = $_POST["principal"];
    $department = filter_var($department, FILTER_SANITIZE_STRING);
    $entity = $mail;
    $id = $_POST['Id'];

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    if (!$con) {
        die ('Could not connect: ' . mysqli_error($con));
    }

    // Prepare the query for either insert or update
    if (isset ($id) && !empty ($id)) {
        $query = "UPDATE funded SET title=?, agent =?, amount=?, start=?, status=?, principal=? WHERE id=? AND entity=?";
    } else {
        $query = "INSERT INTO funded (title, agent, amount, start, status, principal, entity) VALUES (?, ?, ?, ?, ?, ?, ?)";
    }

    
    $stmt = mysqli_prepare($con, $query);

    if (!$stmt) {
        echo '<script>alert("Failed to prepare statement.");</script>';
    } else {
        if (isset ($id) && !empty ($id)) {
            mysqli_stmt_bind_param($stmt, 'ssssssss', $title, $agent, $amount, $start, $status, $principal, $id, $userRole );
        } else {
            mysqli_stmt_bind_param($stmt, 'sssssss', $title, $agent, $amount, $start, $status , $principal, $userRole );
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
    $(document).ready(function() {
        $("#funded1").submit(function(event) {
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
            var dept = document.forms["funded1"]["title"].value;
            var journal = document.forms["funded1"]["agent"].value;
            var ic = document.forms["funded1"]["amount"].value;
            var start= document.forms["funded1"]["start"].value;
            var end = document.forms["funded1"]["status"].value;
            var patent = document.forms["funded1"]["principal"].value;
            if(dept.trim()=="" || journal.trim()=="" || ic.trim()=="" || start.trim()=="" || patent.trim()=="" || end.trim()=="")
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
        <p class="form-name">Funded Research Projects for the year 2023-24</p>
        <div class="form-container">
            <form style="" id="funded1" action="" method="post" onsubmit="return validateForm();">
                <input type="hidden" name="Id" value="<?php echo isset ($_GET['dataId']) ? $_GET['dataId'] : null; ?>">
                <input type="hidden" name="form_type" value="funded">
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label label-class">Title: </label>
                    <div class="col-sm-10">
                           <input type="text" name="title" placeholder="Title of the Paper" class="form-control"></input>
                    </div>
                </div> 

                <div class="row mb-3">
                    <label for="agent" class="col-sm-2 col-form-label label-class">Funding Agency: </label>
                    <div class="col-sm-10">
                           <input type="text" name="agent" placeholder="Funding Agency" class="form-control"></input>
                    </div>
                </div> 

                <div class="row mb-3">
                    <label for="amount" class="col-sm-2 col-form-label label-class">Amount: </label>
                    <div class="col-sm-10">
                        <input type="text" name="amount" placeholder="Amount (in lakhs)" pattern="\d+(\.\d{1,5})?" class="form-control">
                    </div>
                </div> 
                <div class="row mb-3">
                    <label for="start" class="col-sm-2 col-form-label label-class">Date: </label>
                    <div class="col-sm-10">
                        <input type="date" name="start"  class="form-control">
                    </div>
                </div> 
                
                <div class="row mb-3">
                    <label for="status" class="col-sm-2 col-form-label label-class">Status: </label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control" required>
                            <option disabled selected value ="">Status</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div> 
                
                <div class="row mb-3">
                    <label for="principal" class="col-sm-2 col-form-label label-class">Principal Investigator & Co-PIs: </label>
                    <div class="col-sm-10">
                    <input type="text" name="principal" placeholder="Principal Investigator & Co-PIs"  class="form-control">
                    </div>
                </div> 
                
                <button type="submit" class="submit_btn mt-2"><span>Add Entry</span></button>

            </form>
        </div>

    </div>



</body>

</html>