<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (empty($_SESSION['login'])) {
    header('Location: index.php');
}
if (empty($_SESSION['access_token'])) {
    $fname = "Welcome! ";
    $lname = $_GET["user"];
    $pic = "./asset/nitc_logo_icon.svg";
    // $mail = $_GET["user"];
    $mail = "cse@nitc";

    //below two lines are commented out for testing purpose. uncomment it to properly run system with login.

    // header('Location: index.php');
    // exit();
} else {
    $fname = $_SESSION["first_name"];
    $lname = $_SESSION['last_name'];
    $pic = $_SESSION['profile_picture'];
    $mail = $_SESSION['email_address'];
}

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');
$sql = "SELECT * FROM entity where id='$mail'";
$rs = mysqli_query($con, $sql);
$userRole = "";
while ($row = mysqli_fetch_assoc($rs))
    $userRole = $row['role'];
// $row = mysqli_fetch_assoc($rs);


$pdf_link = "./doc/pdf.php?user=" . $mail;
if ($userRole != 'department' && $userRole != 'centre')
    $pdf_link = "./doc/pdf_all.php";

// Add your dashboard content here
?>

<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="./styles/dashboard.css" type="text/css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c0795f1bee.js" crossorigin="anonymous"></script>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
</head>

<body>

    <div class="vw-100 vh-100 d-flex p-3 container-class text-light flex-nowrap gap-5">
        <div class="d-flex flex-column justify-content-between mt-5 mb-5 w-25">
            <div class="d-flex flex-column gap-4">
                <div class="d-flex ms-2 gap-2 align-items-end justify-content-start">
                    <div class="d-flex justify-content-center align-items-center">
                        <?php
                        echo '<img src="' . $pic . '" class="rounded-circle" />';
                        ?>
                    </div>
                    <div class="d-flex flex-column align-items-start justify-content-end">
                        <p class="name">
                            <?php
                            echo '' . $fname . ' ' . $lname . '';
                            ?>
                        </p>
                        <p class="email text-truncate" style="max-width: 120px">
                            <?php
                            echo '' . $mail . '';
                            ?>
                        </p>
                    </div>
                </div>

                <div class="list-container d-flex flex-column gap-2">
                    <div class="hor-line"></div>

                    <div id="dashboard-btn" class="sidebar-links active"><i class="fa-solid fa-gauge icon-size"></i>
                        DASHBOARD</div>
                    <div id="view-data" class="sidebar-links"><i class="fa-regular fa-eye icon-size"></i> VIEW DATA
                    </div>
                    <div style="display: none;" id="view-data-list" class="sublinks-holder">
                        <div id="table-1-btn" class="sidebar-sublinks mt-1">
                            COMMUNITY SERVICES
                        </div>
                        <div id="table-2-btn" class="sidebar-sublinks mt-1">
                            OTHER SERVICES
                        </div>
                        <div id="table-3-btn" class="sidebar-sublinks mt-1">
                            CONFERENCES CONDUCTED
                        </div>
                        <div id="table-4-btn" class="sidebar-sublinks mt-1">
                            EXPERT LECTURES
                        </div>
                        <div id="table-5-btn" class="sidebar-sublinks mt-1">
                            FACULTY HIGHER QUALIFICATION
                        </div>
                        <div id="table-6-btn" class="sidebar-sublinks mt-1">
                            CONSULTANCY AND TESTING
                        </div>
                        <div id="table-7-btn" class="sidebar-sublinks mt-1">
                            PATENTS ACQUIRED AND FILED
                        </div>
                        <div id="table-8-btn" class="sidebar-sublinks mt-1">
                            STUDENT ACHIEVEMENTS
                        </div>


                    </div>

                    <div id="add-data" class="sidebar-links"><i class="fa-solid fa-plus icon-size"></i> ADD DATA</div>
                    <div style="display: none;" id="add-data-list" class="sublinks-holder">
                        <div id="form-1-btn" class="sidebar-sublinks mt-1 form-btn">
                            COMMUNITY SERVICES
                        </div>
                        <div id="form-2-btn" class="sidebar-sublinks mt-1 form-btn">
                            OTHER SERVICES
                        </div>
                        <div id="form-3-btn" class="sidebar-sublinks mt-1 form-btn">
                            CONFERENCES CONDUCTED
                        </div>
                        <div id="form-4-btn" class="sidebar-sublinks mt-1 form-btn">
                            EXPERT LECTURES
                        </div>
                        <div id="form-5-btn" class="sidebar-sublinks mt-1 form-btn">
                            FACULTY HIGHER QUALIFICATION
                        </div>
                        <div id="form-6-btn" class="sidebar-sublinks mt-1 form-btn">
                            CONSULTANCY AND TESTING
                        </div>
                        <div id="form-7-btn" class="sidebar-sublinks mt-1 form-btn">
                            PATENTS ACQUIRED AND FILED
                        </div>
                        <div id="form-8-btn" class="sidebar-sublinks mt-1 form-btn">
                            STUDENT ACHIEVEMENTS
                        </div>
                    </div>

                    <div id="report-btn" class="sidebar-links"><i class="fa-regular fa-circle-down icon-size"></i>
                        GENERATE REPORT</div>
                    <div class="hor-line"></div>

                </div>
            </div>
            <div class="">
                <div class="hor-line"></div>
                <div class="logout-btn-holder">
                    <a href="./logout.php" class="logout_btn">
                        <span><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-100 h-100 d-flex align-items-start justify-content-center rounded-3 bg-white text-primary p-3">
            <div class="mt-3 w-100 h-100">
                <!-- dashboard -->
                <div id="dashboard" style="display: block;">
                    dashboard aa gaya bhai
                </div>

                <!-- report -->
                <form action=<?php echo $pdf_link; ?> method="post" onsubmit="return validateFormForReport()"
                    id="report" style="display: none;">
                    <div class="section_container">
                        <p>Choose Period:</p>
                        <div class="">
                            <div class="">
                                <label for="startDate">Start: </label>
                                <input type="date" id="startDate" name="startDate" class="" />
                            </div>
                            <div class="">
                                <label for="endDate">End: </label>
                                <input type="date" id="endDate" name="endDate" class="" />
                            </div>
                        </div>
                    </div>
                    <div class="">
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
                    <input type="submit" value="Generate Report" class="">

                </form>

                <!-- forms -->
                <div class="w-100">
                    <div id="form-1" style="display: none;">
                        <?php
                        require "./forms/addData/community_services.php";
                        ?>
                    </div>
                    <div id="form-2" style="display: none;">
                        <?php
                        echo "form 2 hai bhai";
                        ?>
                    </div>
                    <div id="form-3" style="display: none;">
                        <?php
                        echo "form 3 hai bhai";
                        ?>
                    </div>
                    <div id="form-4" style="display: none;">
                        <?php
                        echo "form 4 hai bhai";
                        ?>
                    </div>
                    <div id="form-5" style="display: none;">
                        <?php
                        echo "form 5 hai bhai";
                        ?>
                    </div>
                    <div id="form-6" style="display: none;">
                        <?php
                        echo "form 6 hai bhai";
                        ?>
                    </div>
                    <div id="form-7" style="display: none;">
                        <?php
                        echo "form 7 hai bhai";
                        ?>
                    </div>
                    <div id="form-8" style="display: none;">
                        <?php
                        echo "form 8 hai bhai";
                        ?>
                    </div>

                </div>

                <!-- tables -->
                <div style="color: #141e30">
                    <div id="table-1" style="display: none;">
                        <?php
                        require "./forms/viewData/community_services.php";
                        ?>
                    </div>
                    <div id="table-2" style="display: none;">
                        <?php
                        echo "table 2 hai bhai";
                        ?>
                    </div>
                    <div id="table-3" style="display: none;">
                        <?php
                        echo "table 3 hai bhai";
                        ?>
                    </div>
                    <div id="table-4" style="display: none;">
                        <?php
                        echo "table 4 hai bhai";
                        ?>
                    </div>
                    <div id="table-5" style="display: none;">
                        <?php
                        echo "table 5 hai bhai";
                        ?>
                    </div>
                    <div id="table-6" style="display: none;">
                        <?php
                        echo "table 6 hai bhai";
                        ?>
                    </div>
                    <div id="table-7" style="display: none;">
                        <?php
                        echo "table 7 hai bhai";
                        ?>
                    </div>
                    <div id="table-8" style="display: none;">
                        <?php
                        echo "table 8 hai bhai";
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>




    <script src="./script.js"></script>

    <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>



</body>

</html>