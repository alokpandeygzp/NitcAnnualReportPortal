<?php
session_start();

// Check if the user is not logged in, redirect to login page

if (empty($_SESSION['access_token'])) {
    $fname="Welcome! ";
    $lname=$_GET["user"];
    $pic="./asset/nitc_logo_icon.svg";
    $mail=$_GET["user"];

    //below two lines are commented out for testing purpose. uncomment it to properly run system with login.

    // header('Location: index.php');
    // exit();
}
else {
    $fname=$_SESSION["first_name"];
    $lname=$_SESSION['last_name'];
    $pic=$_SESSION['profile_picture'];
    $mail=$_SESSION['email_address'];
}

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');
$sql = "SELECT role FROM entity where id='$mail'";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($rs);
$userRole = $row['role'];

$pdf_link="./doc/pdf.php?user=".$mail;
if($userRole!='department' && $userRole!='centre')
    $pdf_link="./doc/pdf_all.php";

// Add your dashboard content here
?>

<html>

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./styles/dashboard.css" type="text/css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="login_header">
            <img class="nitc_complete_logo" src="https://nitc.ac.in/xc-assets/logo/logo-black-01.svg" alt="NITC">
            <h2 class="heading">
                Annual Report Submission Portal for NITC
            </h2>
        </div>

        <?php
        echo '<div class="user_strip">
                <div class="user">
                    <img src="' . $pic . '" class="user_image" />
                    <h3>' . $fname . ' ' . $lname . '</h3>
                </div>
                <div class="logout_btn_holder">';
                    if ($userRole == 'admin') {
                        echo '<a href="users.php?user='.$lname.'" class="">
                                    <button class="logout_btn" style="margin-right: 20px;">Manage users</button>
                                </a>';
                    }
                    echo '
                    <a href="logout.php" class="">
                        <button class="logout_btn">Logout</button>
                    </a>                    
                </div  > 
            </div>';

        // echo '<div class="panel-heading">Welcome NITC User</div><div class="panel-body">';
        // echo '<img src="' . $_SESSION['profile_picture'] . '" class="img-responsive img-circle img-thumbnail" />';
        // echo '<h3><b>Name : </b>' . $_SESSION["first_name"] . ' ' . $_SESSION['last_name'] . '</h3>';
        // echo '<h3><b>Email :</b> ' . $_SESSION['email_address'] . '</h3>';
        // echo '<h3><a href="logout.php">Logout</a></h3></div>';
        ?>

        <div class="content_container">
            <div class="content_sub_container">
                <div class="content_identifier">
                    Add Data
                </div>

                <div class="form_links">
                    <a href="./forms/community_services.php?user=<?php echo $lname; ?>">
                        <p class="form_link">&#8811; COMMUNITY SERVICES</p>
                    </a>

                    <a href="./forms/other_services.php?user=<?php echo $lname; ?>">
                        <p class="form_link">&#8811; OTHER SERVICES</p>

                    </a>

                    <a href="./forms/conferences.php?user=<?php echo $lname; ?>">
                        <p class="form_link">&#8811; CONFERENCES CONDUCTED</p>
                    </a>

                    <a href="./forms/expert_lectures.php?user=<?php echo $lname; ?>">
                        <p class="form_link">&#8811; EXPERT LECTURES</p>
                    </a>

                    <a href="./forms/faculty_qualification.php?user=<?php echo $lname; ?>">
                        <p class="form_link">&#8811; FACULTY HIGHER QUALIFICATION</p>
                    </a>

                    <a href="./forms/consultancy.php?user=<?php echo $lname; ?>">
                        <p class="form_link">&#8811; CONSULTANCY AND TESTING</p>
                    </a>

                    <a href="./forms/patents.php?user=<?php echo $lname; ?>">
                        <p class="form_link">&#8811; PATENTS ACQUIRED AND FILED</p>
                    </a>

                    <a href="./forms/student_achievements.php?user=<?php echo $lname; ?>">
                        <p class="form_link">&#8811; STUDENT ACHIEVEMENTS</p>
                    </a>

                </div>

            </div>


                <div class="content_sub_container">
                    <div class="content_identifier">
                        Generate Report
                    </div>
                    <form action=<?php echo $pdf_link; ?> method="post" onsubmit="return validateForm()">                    
                    <div class="report_generator">
                        <div class="section_container">
                            <p>Choose Period:</p>
                            <div class="time_period_selector">
                                <div class="start_date">
                                    <label for="startDate">Start: </label>
                                    <input type="date" id="startDate" name="startDate" class="input_field" />
                                </div>
                                <div class="end_date">
                                    <label for="endDate">End: </label>
                                    <input type="date" id="endDate" name="endDate" class="input_field" />
                                </div>
                            </div>
                        </div>
                        <div class="section_container">
                            <p>Choose Sections:</p>
                            <div class="section_selector">
                                <div>
                                    <input type="checkbox" id="all" name="all" value="all" onchange="selectAllOptions()" />
                                    <label for="all">All</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="communityServices" name="communityServices"
                                        value="communityServices" />
                                    <label for="communityServices">Community Services</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="otherServices" name="otherServices" value="otherServices" />
                                    <label for="otherServices">Other Services</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="conferencesConducted" name="conferencesConducted"
                                        value="conferencesConducted" />
                                    <label for="conferencesConducted">Conferences Conducted</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="expertLectures" name="expertLectures"
                                        value="expertLectures" />
                                    <label for="expertLectures">Expert Lectures</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="facultyHigherQualification" name="facultyHigherQualification"
                                        value="facultyHigherQualification" />
                                    <label for="facultyHigherQualification">Faculty Higher Qualification</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="consultancyAndTesting" name="consultancyAndTesting"
                                        value="consultancyAndTesting" />
                                    <label for="consultancyAndTesting">Consultancy And Testing</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="patentAquiredAndFiled" name="patentAquiredAndFiled"
                                        value="patentAquiredAndFiled" />
                                    <label for="patentAquiredAndFiled">Patent Aquired And Filed</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="studentAchievements" name="studentAchievements"
                                        value="studentAchievements" />
                                    <label for="studentAchievements">Student Achievements</label>
                                </div>
                            </div>

                        </div>
                        <input type="submit" value="Generate Report" class="generate_btn">
                    </div>
                    </form>
                </div>
        </div>
    </div>
    <script>
        function selectAllOptions() {
            // Get the "All" checkbox
            var allCheckbox = document.getElementById("all");

            // Get all the checkboxes excluding the "All" checkbox
            var checkboxes = document.querySelectorAll('.section_selector input[type="checkbox"]:not(#all)');

            // Set the state of other checkboxes based on the "All" checkbox
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = allCheckbox.checked;
            });
        }
    </script>

    <script>
        function validateForm() {
            // Get current date
            // var currentDate = new Date();
            
            // Get start and end date values
            var startDate = document.getElementById("startDate").value;
            var endDate = document.getElementById("endDate").value;

            // Parse dates to compare
            var startDateTime = new Date(startDate).getTime();
            var endDateTime = new Date(endDate).getTime();
            // var currentDateTime = currentDate.getTime();

            // Check if start date is before end date
            if (startDateTime >= endDateTime) {
                alert("Start date must be before end date");
                return false; 
            }// Prevent form submission
            // } else if (endDateTime > currentDateTime) {
            //     alert("End date cannot be greater than current date");
            //     return false; // Prevent form submission
            // } 
            else {
                // Clear error messages
                document.getElementById("dateError").innerHTML = "";
                return true; // Allow form submission
            }
        }
    </script>

</body>

</html>