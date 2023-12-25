<?php    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conNature = $_POST["nature"];
        $conOrg = $_POST["org"];
        $conRevenue = $_POST["revenue"];
        $conStatus = $_POST["status"];  
        $entity = $_GET["user"];      

        $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

        $query1 = "INSERT INTO consultancy (nature, organization, revenue, status, entity) VALUES ('$conNature', '$conOrg', '$conRevenue', '$conStatus', , '$entity')";
        if (mysqli_query($con, $query1)) {
            echo '<script>alert("Entry added.");</script>';            
        } else {
            echo '<script>alert("Entry addition failed.");</script>';            
        }
        
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Consultancy</title>
    <link href="../res/basic_styles.css" type="text/css" rel="stylesheet">
    <script>
        function validateForm() {
            var conNature = document.forms["myForm"]["nature"].value;
            var conOrg = document.forms["myForm"]["org"].value;
            var conRevenue = document.forms["myForm"]["revenue"].value;
            var conStatus = document.forms["myForm"]["status"].value;

            if (conNature.trim() == "" || conOrg.trim() == "" || conRevenue.trim() == "" || conStatus.trim() == "") {
                alert("Please fill in all fields.");
                return false;
            }

            return true;
        }
    </script>

</head>

<body style="padding: 10px; background-color: rgb(223, 216, 216); color: rgb(91, 84, 84);">

    <div style="background-color: #ac8a8f; padding: 30px; display:flex; border-radius: 0.5rem;">
        <div style="background-color: aliceblue; padding: 20px; border-radius: 0.5rem; margin-right: 10px" >
            <form id="myForm" action="" method="post" onsubmit="return validateForm();">
                <input type="text" name="nature" placeholder="Nature of service" class="input-fields"><br><br>
                <input type="text" name="org" placeholder="Organization" class="input-fields"><br><br>
                <input type="text" name="revenue" placeholder="Revenue earned" class="input-fields"><br><br>
                <input type="text" name="status" placeholder="Status" class="input-fields"><br><br>            
                <input type="submit" class="action-buttons" value="SUBMIT">                
            </form>
        </div>

        <?php        
            $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
            $entity = $_GET["user"];  
            if($entity=='admin' || $entity=='')
                $sql = "SELECT * FROM consultancy";
            else
                $sql = "SELECT * FROM consultancy where entity='$entity'";
            $rs = mysqli_query($con, $sql);        

            echo '<div style="padding:10px; background-color: aliceblue; border-radius:0.5rem;">';
            echo '<style>
                    th, td {                                               
                        border: 1px solid white;
                    }
                </style>
                <table cellspacing="8" cellpadding="10" class="table-style"> 
                <tr> 
                    <th>S. no.</th> 
                    <th>Nature of service</th> 
                    <th>Organization</th> 
                    <th>Revenue</th> 
                    <th>Status</th>
                    <th>Entity</th>
                    <th>Action</th>
                </tr>';

            $count=1;
            while ($row = mysqli_fetch_assoc($rs)) {
                $nature = $row['nature'];            
                $org = $row['organization'];
                $revenue = $row['revenue'];
                $status = $row['status'];
                $dep = $row['entity'];
                
                echo '<tr>
                    <td>' . $count . '</td>
                    <td>' . $nature . '</td>
                    <td>' . $org . '</td>
                    <td>' . $revenue . '</td>
                    <td>' . $status . '</td>
                    <td>' . $dep . '</td>
    
                    <td><button style="margin-left: 10px;" class="delete-btn" data-id='.$org.'>Delete</button></td>';
                
                $count++;
            }
            echo '</div>';
        ?>

    </div>

</body>
</html>


<script>
    function handleDeleteClick(event) {
        var id = event.target.getAttribute("data-id");

        // window.alert("status button clicked with ID: " + id);
        fetch('../api/api.php', {
            method: 'POST',
            body: JSON.stringify({ id: id, action: 'delete', table: 'consultancy', column: 'organization'})
        })   
        .then(response => response.json())
        .then(data => {
            window.alert(data.message);
        })
        .catch(error => {            
            window.alert('Error:', error);
            // console.error('Error:', error);
            // window.alert('check console');
        });
        location.reload();
    }

    document.addEventListener('DOMContentLoaded', function() {        
        var statusButtons = document.querySelectorAll(".delete-btn");    

        statusButtons.forEach(function(button) {
            button.addEventListener("click", handleDeleteClick);
        });

    });
</script>