<?php    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $studentName = $_POST["name"];
        $studentAchievement = $_POST["achievement"];              

        $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

        $query1 = "INSERT INTO student_achievements (name, achievement) VALUES ('$studentName', '$studentAchievement')";
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
    <title>Student achievements</title>
    <link href="../res/basic_styles.css" type="text/css" rel="stylesheet">
    <script>
        function validateForm() {
            var studentName = document.forms["myForm"]["name"].value;
            var studentAchievement = document.forms["myForm"]["title"].value;            

            if (studentName.trim() == "" || studentAchievement.trim() == "") {
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
                <input type="text" name="name" placeholder="Name of student" class="input-fields"><br><br>
                <input type="text" name="achievement" placeholder="Achievement" class="input-fields"><br><br>
                <input type="submit" class="action-buttons" value="SUBMIT">
            </form>
        </div>

        <?php        
            $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
            $sql = "SELECT * FROM student_achievements";
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
                    <th>Name of student</th> 
                    <th>Achievement</th> 
                    <th>Action</th>
                </tr>';

            $count=1;
            while ($row = mysqli_fetch_assoc($rs)) {
                $name = $row['name'];            
                $achievement = $row['achievement'];
                
                echo '<tr>
                    <td>' . $count . '</td>
                    <td>' . $name . '</td>
                    <td>' . $achievement . '</td>
    
                    <td><button style="margin-left: 10px;" class="delete-btn" data-id='.$achievement.'>Delete</button></td>';
                
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
        fetch('api.php', {
            method: 'POST',
            body: JSON.stringify({ id: id, action: 'delete', table: 'student_achievements', column: 'achievement'})
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
