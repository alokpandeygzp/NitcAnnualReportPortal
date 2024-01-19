<?php
// edit_community_services.php
session_start(); // Ensure session is started

if (empty($_SESSION['access_token'])) {
    $fname = "Welcome! ";
    $lname = $_GET["user"];
    $pic = "../../asset/nitc_logo_icon.svg";
    $mail = $_GET["user"];
} else {
    $fname = $_SESSION["first_name"];
    $lname = $_SESSION['last_name'];
    $pic = $_SESSION['profile_picture'];
    $mail = $_SESSION['email_address'];
}

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$title = isset($_GET['title']) ? $_GET['title'] : '';

$sql = "SELECT * FROM community_services WHERE title = '$title'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $staff = $row['staff'];
    $progTitle = $row['title'];
    $date = $row['date'];
    $dep = $row['entity'];
} else {
    echo 'Query failed: ' . mysqli_error($con);
}

mysqli_close($con);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_entry'])) {
    $originalTitle = $_POST["original_title"];
    $staffName = $_POST["faculty_name"];
    $progTitle = $_POST["title"];
    $progDate = $_POST["date"];
    $entity = $dep;

    $con = mysqli_connect('localhost', 'root', '', 'imsdemo');

    $query = "UPDATE community_services SET staff=?, title=?, date=? WHERE title=? AND entity=?";
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, 'sssss', $staffName, $progTitle, $progDate, $originalTitle, $entity);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true, 'message' => 'Entry updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Entry update failed.']);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    exit(); // Terminate script after AJAX request
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Community Services Entry</title>
    <link href="../../styles/edit_forms.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {
                event.preventDefault();

                if (!validateForm()) {
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "edit_community_services.php?user=<?php echo urlencode($lname); ?>&title=<?php echo urlencode($title); ?>",
                    data: $(this).serialize() + "&update_entry=1",
                    dataType: 'json', // Expect JSON response
                    success: function (response) {
                        alert(response.message);

                        if (response.success) {
                            // Redirect to the community services page after a successful update
                            window.location.href = '../community_services.php?user=<?php echo urlencode($lname); ?>';
                        }
                    },
                    error: function () {
                        alert("An error occurred during the update.");
                    }
                });
            });

            function validateForm() {
                var staffName = document.forms["myForm"]["faculty_name"].value;
                var progTitle = document.forms["myForm"]["title"].value;
                var progDate = document.forms["myForm"]["date"].value;

                if (staffName.trim() == "" || progTitle.trim() == "" || progDate.trim() == "") {
                    alert("Please fill in all fields.");
                    return false;
                }

                return true;
            }
        });
    </script>
</head>

<body>

    <div class="container">
        <?php
        echo '<div class="user_strip">
                <a href="../../dashboard.php?user=' . $lname . '" class="user_to_dash">
                    <div class="user">
                        <img src="' . $pic . '" class="user_image" />
                        <h3>' . $fname . ' ' . $lname . '</h3>
                    </div>
                </a>
                <div class="logout_btn_holder">
                    <a href="../../logout.php" class="">
                        <button class="logout_btn">Logout</button>
                    </a>
                </div>
            </div>';
        ?>
        <div class="subcontainer">
            <div class="content_container">
                <h2>Edit Community Services</h2><br>

                <div class="form_container">

                    <form id="myForm" action="" method="post" class="form_field">
                        <input type="hidden" name="original_title" value="<?php echo $progTitle; ?>" class="input-fields">

                        <table>

                            <tr>
                                <td class="label_field"><label for="faculty_name" class="label-fields">Staff: </label></td>
                                <td><select name="faculty_name" class="input-fields">
                                        <option disabled>Name of Staff</option>
                                        <?php
                                        $con = mysqli_connect('localhost', 'root', '', 'imsdemo');
                                        if (!$con) {
                                            die('Could not connect: ' . mysqli_error($con));
                                        }
                                        $entity = isset($_GET["user"]) ? $_GET["user"] : '';
                                        $sql = "SELECT Name FROM faculty WHERE Email='$entity'";
                                        $result = mysqli_query($con, $sql);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['Name'] === $staff) ? 'selected' : '';
                                                echo '<option value="' . $row['Name'] . '" ' . $selected . '>' . $row['Name'] . '</option>';
                                            }
                                        } else {
                                            echo 'Query failed: ' . mysqli_error($con);
                                        }
                                        mysqli_close($con);
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="label_field">
                                    <label for="title" class="label-fields">Title: </label>
                                </td>
                                <td><input type="text" name="title" value="<?php echo $progTitle; ?>" class="input-fields"
                                        readonly></td>
                            </tr>

                            <tr>
                                <td class="label_field"> <label for="date" class="label-fields">Date: </label></td>
                                <td><input type="date" name="date" value="<?php echo $date; ?>" class="input-fields"
                                        required></td>
                            </tr>

                            <tr>
                                <td class="label_field"><label for="entity" class="label-fields">Entity: </label></td>
                                <td><input type="text" name="entity" value="<?php echo $dep; ?>" class="input-fields"
                                        readonly></td>
                            </tr>
                        </table>

                        <input type="submit" class="submit-button" value="Update Entry">
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
