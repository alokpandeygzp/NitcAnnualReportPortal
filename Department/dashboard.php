<?php
require 'role.php';
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
include ('includes/check_login.php');
include ("includes/config.php");
include ('includes/config_connection.php');
include ('includes/set_user_role.php');

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');

$pdf_link = "./doc/pdf.php?user=" . $mail;
if ($userRole != 'department' && $userRole != 'centre')
    $pdf_link = "./doc/pdf_all.php";
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

    <!-- updated ui code -->
    <div class="vw-100 vh-100 d-flex p-3 container-class text-light flex-nowrap gap-5">
        <!-- sidebar -->
        <div class="d-flex flex-column justify-content-between mt-5 mb-5 w-25">
            <!-- top container -->
            <div class="d-flex flex-column gap-4">
                <!--profile container  -->
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

                <!-- sidebar-list -->
                <div class="list-container d-flex flex-column gap-2">
                    <div class="hor-line"></div>

                    <div id="dashboard-btn" class="sidebar-links active"><i class="fa-solid fa-gauge icon-size"></i>
                        DASHBOARD</div>
                    <div id="view-data" class="sidebar-links"><i class="fa-regular fa-eye icon-size"></i> VIEW DATA
                    </div>
                    <div style="display: none;" id="view-data-list" class="sublinks-holder">
                        <div id="table-1-btn" class="sidebar-sublinks mt-1">
                            STUDENT ACHIEVEMENTS
                        </div>
                        <div id="table-2-btn" class="sidebar-sublinks mt-1">
                            FACULTY OBTAINING HIGHER QUALIFICATIONS
                        </div>
                        <div id="table-3-btn" class="sidebar-sublinks mt-1">
                            COMMUNITY SERVICES
                        </div>
                        <div id="table-4-btn" class="sidebar-sublinks mt-1">
                            CONFERENCES/WORKSHOPS CONDUCTED
                        </div>
                        <div id="table-5-btn" class="sidebar-sublinks mt-1">
                            CONFERENCES/WORKSHOPS ATTENDED
                        </div>
                        <div id="table-6-btn" class="sidebar-sublinks mt-1">
                            EXPERT LECTURES DELIVERED
                        </div>
                        <div id="table-7-btn" class="sidebar-sublinks mt-1">
                            EXPERT LECTURES INVITED
                        </div>
                        <div id="table-8-btn" class="sidebar-sublinks mt-1">
                            CONSULTANCY AND TESTING
                        </div>
                        <div id="table-9-btn" class="sidebar-sublinks mt-1">
                            PATENTS ACQUIRED AND FILED
                        </div>
                        <div id="table-10-btn" class="sidebar-sublinks mt-1">
                            JOURNAL PAPERS PUBLISHED
                        </div>
                        <div id="table-11-btn" class="sidebar-sublinks mt-1">
                            NATIONAL CONFERENCES PUBLICATIONS
                        </div>
                        <div id="table-12-btn" class="sidebar-sublinks mt-1">
                            WORKSHOPS PUBLICATIONS
                        </div>
                        <div id="table-13-btn" class="sidebar-sublinks mt-1">
                            INTERNATIONAL CONFERENCES PUBLICATIONS
                        </div>
                        <div id="table-14-btn" class="sidebar-sublinks mt-1">
                            FUNDED RESEARCH PROJECTS
                        </div>
                        <div id="table-15-btn" class="sidebar-sublinks mt-1">
                            OTHER SERVICES
                        </div>


                    </div>

                    <div id="add-data" class="sidebar-links"><i class="fa-solid fa-plus icon-size"></i> ADD DATA</div>
                    <div style="display: none;" id="add-data-list" class="sublinks-holder">
                        <div id="form-1-btn" class="sidebar-sublinks mt-1">
                            STUDENT ACHIEVEMENTS
                        </div>
                        <div id="form-2-btn" class="sidebar-sublinks mt-1">
                            FACULTY OBTAINING HIGHER QUALIFICATIONS
                        </div>
                        <div id="form-3-btn" class="sidebar-sublinks mt-1">
                            COMMUNITY SERVICES
                        </div>
                        <div id="form-4-btn" class="sidebar-sublinks mt-1">
                            CONFERENCES/WORKSHOPS CONDUCTED
                        </div>
                        <div id="form-5-btn" class="sidebar-sublinks mt-1">
                            CONFERENCES/WORKSHOPS ATTENDED
                        </div>
                        <div id="form-6-btn" class="sidebar-sublinks mt-1">
                            EXPERT LECTURES DELIVERED
                        </div>
                        <div id="form-7-btn" class="sidebar-sublinks mt-1">
                            EXPERT LECTURES INVITED
                        </div>
                        <div id="form-8-btn" class="sidebar-sublinks mt-1">
                            CONSULTANCY AND TESTING
                        </div>
                        <div id="form-9-btn" class="sidebar-sublinks mt-1">
                            PATENTS ACQUIRED AND FILED
                        </div>
                        <div id="form-10-btn" class="sidebar-sublinks mt-1">
                            JOURNAL PAPERS PUBLISHED
                        </div>
                        <div id="form-11-btn" class="sidebar-sublinks mt-1">
                            NATIONAL CONFERENCES PUBLICATIONS
                        </div>
                        <div id="form-12-btn" class="sidebar-sublinks mt-1">
                            WORKSHOPS PUBLICATIONS
                        </div>
                        <div id="form-13-btn" class="sidebar-sublinks mt-1">
                            INTERNATIONAL CONFERENCES PUBLICATIONS
                        </div>
                        <div id="form-14-btn" class="sidebar-sublinks mt-1">
                            FUNDED RESEARCH PROJECTS
                        </div>
                        <div id="form-15-btn" class="sidebar-sublinks mt-1">
                            OTHER SERVICES
                        </div>
                    </div>

                    <div id="report-btn" class="sidebar-links"><i class="fa-regular fa-circle-down icon-size"></i>
                        GENERATE REPORT</div>
                    <div class="hor-line"></div>

                </div>
            </div>

            <!-- bottom container -->
            <div class="">
                <div class="hor-line"></div>
                <!-- logout btn container -->
                <div class="logout-btn-holder">
                    <a href="../logout.php" class="logout_btn">
                        <span><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</span>
                    </a>
                </div>
            </div>
        </div>



        <!-- content space -->
        <div class="w-100 h-100 d-flex align-items-start justify-content-center rounded-3 bg-white text-primary p-3">
            <!--content container  -->
            <div class="mt-3 w-100 h-100">
                <!-- dashboard -->
                <div id="dashboard" style="display: block;">
                    <div class="d-flex flex-column align-items-center w-100">
                        <center>
                            <p class="form-name">Publications/Patents for the year 2023-24</p>
                        </center>



                        <?php

                        $sql = "SELECT * from roles where name='$userRole'";
                        $rs = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($rs);
                        $full = $row['full_name'];


                        $sql = "SELECT count(id) FROM journal where entity='$userRole'";
                        $rs = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($rs);
                        $journal = $row['count(id)'];

                        $rs = mysqli_query($con, $sql);
                        $sql = "SELECT count(id) FROM internationalconference  where entity='$userRole'";
                        $rs = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($rs);
                        $ic = $row['count(id)'];

                        $rs = mysqli_query($con, $sql);
                        $sql = "SELECT count(id) FROM nationalconference  where entity='$userRole'";
                        $rs = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($rs);
                        $nc = $row['count(id)'];

                        $rs = mysqli_query($con, $sql);
                        $sql = "SELECT count(id) FROM patents where entity='$userRole'";
                        $rs = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($rs);
                        $patent = $row['count(id)'];

                        echo '<div class="grid-container mt-4">
                                <div class="content-box">
                                    <p class="box-heading">DEPARTMENT</p>
                                    <p class="box-centent ">' . $full . '</p>
                                </div>
                                <div class="content-box">
                                    <p class="box-heading">JOURNALS</p>
                                    <p class="box-centent box-num">' . $journal . '</p>
                                </div>
                                <div class="content-box">
                                    <p class="box-heading">INTERNATIONAL CONFERENCES</p>
                                    <p class="box-centent box-num">' . $ic . '</p>
                                </div>
                                <div class="content-box">
                                    <p class="box-heading">NATIONAL CONFERENCES /WORKSHOPS</p>
                                    <p class="box-centent box-num">' . $nc . '</p>
                                </div>
                                <div class="content-box">
                                    <p class="box-heading">PATENTS</p>
                                    <p class="box-centent box-num">' . $patent . '</p>
                                </div>
                            </div>';
                        ?>
                    </div>
                </div>

                <!-- report -->
                <form action=<?php echo $pdf_link; ?> method="post" onsubmit="return validateFormForReport()"
                    id="report" style="display: none;">
                    <div class="report_generator">
                        <div class="section_container">
                            <p>Choose Period:</p>
                            <div class="time_period_selector">
                                <div class="start_date">
                                    <label for="startDate">Start: </label>
                                    <input type="date" id="startDate" name="startDate" class="input-fields" />
                                </div>
                                <div class="end_date">
                                    <label for="endDate">End: </label>
                                    <input type="date" id="endDate" name="endDate" class="input-fields" />
                                </div>
                            </div>
                        </div>
                        <div class="section_container">
                            <p>Choose Sections:</p>
                            <div class="section_selector">
                                <div>
                                    <input type="checkbox" id="all" name="all" value="all"
                                        onchange="selectAllOptions()" />
                                    <label for="all">All</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="studentAchievements" name="studentAchievements"
                                        value="studentAchievements" />
                                    <label for="studentAchievements">Student Achievements</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="facultyHigherQualification"
                                        name="facultyHigherQualification" value="facultyHigherQualification" />
                                    <label for="facultyHigherQualification">Faculty Obtaining Higher
                                        Qualifications</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="communityServices" name="communityServices"
                                        value="communityServices" />
                                    <label for="communityServices">Community Services</label>
                                </div>

                                <div>
                                    <input type="checkbox" id="conferencesConducted" name="conferencesConducted"
                                        value="conferencesConducted" />
                                    <label for="conferencesConducted">Conferences/Workshops Conducted</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="conferencesAttended" name="conferencesAttended"
                                        value="conferencesAttended" />
                                    <label for="conferencesAttended">Conferences/Workshops Attended</label>
                                </div>

                                <div>
                                    <input type="checkbox" id="expertLectures" name="expertLectures"
                                        value="expertLectures" />
                                    <label for="expertLectures">Expert Lectures Delivered</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="expertinvited" name="expertinvited"
                                        value="expertinvited" />
                                    <label for="expertinvited">Expert Lectures Invited</label>
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
                                    <input type="checkbox" id="publications" name="publications" value="publications" />
                                    <label for="publications">Publications/Patents</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="journal" name="journal" value="journal" />
                                    <label for="journal">Journal Papers Published</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="nationalconference" name="nationalconference"
                                        value="nationalconference" />
                                    <label for="nationalconference">National Conferences/Workshops Publications</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="workshop" name="workshop" value="workshop" />
                                    <label for="workshop">Workshops Publications</label>
                                </div>

                                <div>
                                    <input type="checkbox" id="internatioanlconference" name="internatioanlconference"
                                        value="internatioanlconference" />
                                    <label for="internatioanlconference">International Conferences Publications</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="fund" name="fund" value="fund" />
                                    <label for="fund">Fund Research Projects</label>
                                </div>


                                <div>
                                    <input type="checkbox" id="otherServices" name="otherServices"
                                        value="otherServices" />
                                    <label for="otherServices">Other Services</label>
                                </div>

                            </div>

                        </div>
                        <button type="submit" class="generate_btn"><span>generate report</span></button>
                    </div>
                </form>


                <!-- forms -->
                <div class="w-100">
                    <div id="form-1" style="display: none;">
                        <?php
                        echo "form 1 hai bhai"
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
                    <div id="form-9" style="display: none;">
                        <?php
                        echo "form 9 hai bhai";
                        ?>
                    </div>
                    <div id="form-10" style="display: none;">
                        <?php
                        echo "form 10 hai bhai";
                        ?>
                    </div>
                    <div id="form-11" style="display: none;">
                        <?php
                        echo "form 11 hai bhai";
                        ?>
                    </div>
                    <div id="form-12" style="display: none;">
                        <?php
                        echo "form 12 hai bhai";
                        ?>
                    </div>
                    <div id="form-13" style="display: none;">
                        <?php
                        echo "form 13 hai bhai";
                        ?>
                    </div>
                    <div id="form-14" style="display: none;">
                        <?php
                        echo "form 14 hai bhai";
                        ?>
                    </div>
                    <div id="form-15" style="display: none;">
                        <?php
                        echo "form 15 hai bhai";
                        ?>
                    </div>


                </div>

                <!-- tables -->
                <div style="color: #141e30">
                    <div id="table-1" style="display: none;">
                        <?php
                        require "./forms/viewData/student_achievements.php";
                        ?>
                    </div>
                    <div id="table-2" style="display: none;">
                        <?php
                        require "./forms/viewData/faculty_qualification.php";
                        ?>
                    </div>
                    <div id="table-3" style="display: none;">
                        <?php
                            require "./forms/viewData/community_services.php";
                        ?>
                    </div>
                    <div id="table-4" style="display: none;">
                        <?php
                            require "./forms/viewData/conferences.php";
                        ?>
                    </div>
                    <div id="table-5" style="display: none;">
                        <?php
                        require "./forms/viewData/conferencesattended.php";
                        ?>
                    </div>
                    <div id="table-6" style="display: none;">
                        <?php
                        require "./forms/viewData/expert_lectures.php";
                        ?>
                    </div>
                    <div id="table-7" style="display: none;">
                        <?php
                            require "./forms/viewData/expert_lecturesinvited.php";
                        ?>
                    </div>
                    <div id="table-8" style="display: none;">
                        <?php
                            require "./forms/viewData/consultancy.php";
                        ?>
                    </div>
                    <div id="table-9" style="display: none;">
                        <?php
                            require "./forms/viewData/patents.php";
                        ?>
                    </div>
                    <div id="table-10" style="display: none;">
                        <?php
                            require "./forms/viewData/journal.php";
                            // echo "temp 1";
                        ?>
                    </div>
                    <div id="table-11" style="display: none;">
                        <?php
                            require "./forms/viewData/national.php";
                            // echo "temp 2";
                        ?>
                    </div>
                    <div id="table-12" style="display: none;">
                        <?php
                            require "./forms/viewData/workshop.php";
                            // echo "temp 3";
                        ?>
                    </div>
                    <div id="table-13" style="display: none;">
                        <?php
                            require "./forms/viewData/international.php";
                        ?>
                    </div>
                    <div id="table-14" style="display: none;">
                        <?php
                            require "./forms/viewData/funded.php";
                        ?>
                    </div>
                    <div id="table-15" style="display: none;">
                        <?php
                            require "./forms/viewData/other_services.php";
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="script.js"></script>

    <script>
        console.log("ye chal raha h?");
    </script>


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