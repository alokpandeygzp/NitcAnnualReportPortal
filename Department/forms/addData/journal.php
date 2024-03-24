<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"   && isset($_POST['form_type']) && $_POST['form_type'] === 'journal') 
{
    $author = $_POST["author"];
    $journal = $_POST["journal"];
    $title = $_POST["title"];
    $vol = $_POST["vol_pp"];
    $author = filter_var($author, FILTER_SANITIZE_STRING);
    $journal = filter_var($journal , FILTER_SANITIZE_STRING);
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
        $query = "UPDATE journal  SET author=?, title=?, journal=?,  vol_pp=? WHERE id=? AND entity=?";
    } else {
        $query = "INSERT INTO journal (author, title, journal, vol_pp, entity) VALUES (?, ?, ?,?, ?)";
    }

    
    $stmt = mysqli_prepare($con, $query);
    if (!$stmt) {
        echo '<script>alert("Failed to prepare statement.");</script>';
    } else {
        if (isset ($id) && !empty ($id)) {
            mysqli_stmt_bind_param($stmt, 'ssssss', $author, $title, $journal, $vol, $id, $userRole );

        } else {
            mysqli_stmt_bind_param($stmt, 'sssss', $author, $title, $journal, $vol, $userRole );

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
        $("#journal2").submit(function(event) {
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
            var dept = document.forms["journal2"]["author"].value;
            var journal = document.forms["journal2"]["journal"].value;
            var ic = document.forms["journal2"]["title"].value;
            var nc = document.forms["journal2"]["vol_pp"].value;
           
            if (dept.trim() == "" || journal.trim() == "" || ic.trim() == "" || nc.trim() == "") {
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
        <p class="form-name">Journal Papers Published for the year 2023-24</p>
        <div class="form-container">
            <form style="" id="journal2" action="" method="post" onsubmit="return validateForm();">
                <input type="hidden" name="Id" value="<?php echo isset ($_GET['dataId']) ? $_GET['dataId'] : null; ?>">
                <input type="hidden" name="form_type" value="journal">

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
                    <label for="journal" class="col-sm-2 col-form-label label-class">Name of Journal: </label>
                    <div class="col-sm-10">
                           <input type="text" name="journal" placeholder="Name of Journal" class="form-control"></input>
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