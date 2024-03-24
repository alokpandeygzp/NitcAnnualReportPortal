<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"   && isset($_POST['form_type']) && $_POST['form_type'] === 'national') 
{
    $author = $_POST["author"];
    $conf_name = $_POST["conf_name"];
    $title = $_POST["title"];
    $vol = $_POST["vol_pp"];
    $author = filter_var($author, FILTER_SANITIZE_STRING);
    $conf_name = filter_var($conf_name , FILTER_SANITIZE_STRING);
    $title = filter_var($title , FILTER_SANITIZE_STRING);
    $vol = filter_var($vol , FILTER_SANITIZE_STRING);
    $entity = $mail;
    $id = $_POST['Id'];

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    if (!$con) {
        die ('Could not connect: ' . mysqli_error($con));
    }
    // Prepare the query for either insert or update
    if (isset ($id) && !empty ($id)) {
        $query = "UPDATE nationalconference  SET author=?, title=?, conf_name=?, vol_pp=? WHERE Id=? AND entity=?";
    } else {
        $query = "INSERT INTO nationalconference (author, title, conf_name, vol_pp, entity) VALUES (?, ?, ?,?, ?)";
    }

    
    $stmt = mysqli_prepare($con, $query);
    if (!$stmt) {
        echo '<script>alert("Failed to prepare statement.");</script>';
    } else {
        if (isset ($id) && !empty ($id)) {
            mysqli_stmt_bind_param($stmt, 'ssssss', $author, $title, $conf_name,  $vol, $id, $userRole );
        } else {
            mysqli_stmt_bind_param($stmt, 'sssss', $author, $title, $conf_name, $vol, $userRole );
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
        $("#national1").submit(function(event) {
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
            var author = document.forms["national1"]["author"].value;
            var conf_name = document.forms["national1"]["conf_name"].value;
            var ic = document.forms["national1"]["title"].value;
            var nc = document.forms["national1"]["vol_pp"].value;
            

            if (author.trim() == "" || conf_name.trim() == "" || ic.trim() == "" || nc.trim() == "") {
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
        <p class="form-name">National Conferences Publications for the year 2023-24</p>
        <div class="form-container">
            <form style="" id="national1" action="" method="post" onsubmit="return validateForm();">
                <input type="hidden" name="Id" value="<?php echo isset ($_GET['dataId']) ? $_GET['dataId'] : null; ?>">
                <input type="hidden" name="form_type" value="national">

                <div class="row mb-3">
                    <label for="author" class="col-sm-2 col-form-label label-class">Author Name: </label>
                    <div class="col-sm-10">
                           <input type="text" name="author" placeholder="Name of the Author" class="form-control"></input>
                    </div>
                </div>    

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label label-class">Title: </label>
                    <div class="col-sm-10">
                           <input type="text" name="title" placeholder="Title of the Paper" class="form-control"></input>
                    </div>
                </div> 

                <div class="row mb-3">
                    <label for="conf_name" class="col-sm-2 col-form-label label-class">Name of  National Conference: </label>
                    <div class="col-sm-10">
                           <input type="text" name="conf_name" placeholder="Name of  National Conference" class="form-control"></input>
                    </div>
                </div> 

                <div class="row mb-3">
                    <label for="vol_pp" class="col-sm-2 col-form-label label-class">Vol, Year, P.P.: </label>
                    <div class="col-sm-10">
                           <input type="text" name="vol_pp" placeholder="Vol, Year, P.P." class="form-control"></input>
                    </div>
                </div> 
                
                <button type="submit" class="submit_btn mt-2"><span>Add Entry</span></button>

            </form>
        </div>

    </div>



</body>

</html>