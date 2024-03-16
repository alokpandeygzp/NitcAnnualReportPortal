<?php
session_start();

// Check if the user is not logged in, redirect to login page
if(empty($_SESSION['login']))
{
    header('Location: ../../../index.php');
}
if (empty($_SESSION['access_token'])) {
    $fname = "Welcome! ";
    $lname = $_GET["user"];
    $pic = "../../asset/nitc_logo_icon.svg";
    $mail = $_GET["user"];

    //below two lines are commented out for testing purpose. uncomment it to properly run system with login.

    // header('Location: index.php');
    // exit();
} else {
    $fname = $_SESSION["first_name"];
    $lname = $_SESSION['last_name'];
    $pic = $_SESSION['profile_picture'];
    $mail = $_SESSION['email_address'];
}

$con = mysqli_connect('localhost', 'imsdemouser', '1msDem0PWD1234', 'imsdemo');
$sql = "SELECT role FROM entity where id='$mail'";
$rs = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($rs);
$userRole = $row['role'];

$pdf_link = "./doc/pdf.php?user=" . $mail;
if ($userRole != 'department' && $userRole != 'centre')
    $pdf_link = "./doc/pdf_all.php";

// Add your dashboard content here
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/dashboard.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="login_header">
            <img class="nitc_complete_logo" src="https://nitc.ac.in/xc-assets/logo/logo-black-01.svg" alt="NITC Logo">
            <h2 class="heading">
                NIVAHIKA- Institute Data Portal
            </h2>
        </div>

        <!-- user strip --pending -->
        <?php
        echo '<div class="user_strip">
                <div class="user">
                    <img src="' . $pic . '" class="user_image" />
                    <h3>' . $fname . ' ' . $lname . '</h3>
                </div>
                <div class="logout_btn_holder">';
        if ($userRole == 'admin') {
            echo '<a href="users.php?user=' . $lname . '" class="">
                                    <button class="logout_btn" style="margin-right: 20px;">Manage users</button>
                                </a>';
        }
        echo '
                    <a href="../../logout.php" class="">
                        <button class="logout_btn">Logout</button>
                    </a>                    
                </div  > 
            </div>';

        ?>

        <div class="content_container">
            <div class="content_sub_container">
                <div class="content_identifier">
                    Add Data
                </div>

                <div class="form_links">
                    <div class="table_type">
                        <p style="font-weight: bold">COURSE WISE ENROLMENT</p>
                        <div class="tables">
                            <a href="./forms/enrolmentGenCat.php">
                                <p class="form_link">&#8811; With Gender & Category break up</p>
                            </a>
                        </div>
                    </div>
                    <div class="table_type">
                        <p style="font-weight: bold">ADMISSION STATS -UG/PG, COURSE-WISE</p>
                        <div class="tables">
                            <a href="./forms/admission_btech.php">
                                <p class="form_link">&#8811; 1<sup>st</sup> Semester B.Tech/B.Arch<span class="sub">
                                        -2023-2024</span></p>
                            </a>
                            <a href="./forms/admission_mtech.php">
                                <p class="form_link">&#8811; 1<sup>st</sup> Semester M.Tech/M.Plan<span class="sub">
                                        -2023-2024</span></p>
                            </a>
                            <a href="./forms/admission_phd.php">
                                <p class="form_link">&#8811; M.Sc, MCA & Ph.D.<span class="sub"> -2023-2024</span></p>
                            </a>
                        </div>
                    </div>
                    <div class="table_type">
                        <p style="font-weight: bold">STUDENT's TOTAL STRENGTH</p>
                        <div class="tables">
                            <a href="./forms/strength_btech.php">
                                <p class="form_link">&#8811; 1<sup>st</sup> Semester B.Tech/B.Arch<span class="sub">
                                        -2023-2024</span></p>
                            </a>
                            <a href="./forms/strength_mtech.php">
                                <p class="form_link">&#8811; 1<sup>st</sup> Semester M.Tech/M.Plan<span class="sub">
                                        -2023-2024</span></p>
                            </a>
                            <a href="./forms/strength_phd.php">
                                <p class="form_link">&#8811; M. Tech./ M.Plan., MCA, MBA, M. Sc & Ph.D.
                                    <span class="sub"> -2023-2024</span>
                                </p>
                            </a>
                        </div>
                    </div>



                </div>
            </div>

            <div class="content_sub_container">
                <div class="content_identifier">
                    Generate Report
                </div>
                <form action="">
                    <div class="report_generator">
                        <!-- <div class="section_container">
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
                        </div> -->
                        <div class="section_container">
                            <p style="font-weight: bold">Choose Sections:</p>
                            <div class="section_selector">
                                <div class="section_in_generator">
                                    <div>
                                        <input type="checkbox" id="all" name="all" value="all"
                                            onchange="selectAllOptions()" />
                                        <label for="all">All</label>
                                    </div>
                                </div>

                                <div class="section_in_generator">
                                    <p style="font-weight: bold">TABLES:</p>
                                    <div class="subsection_in_generator">
                                        <p class="subheading">--COURSE WISE ENROLMENT</p>
                                        <div>
                                            <div>
                                                <input type="checkbox" id="genderAndCategory" name="genderAndCategory"
                                                    value="genderAndCategory" />
                                                <label for="genderAndCategory">With Gender & Category break up</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="subsection_in_generator">
                                        <p class="subheading">--ADMISSION STATS -UG/PG, COURSE-WISE</p>
                                        <div>
                                            <div>
                                                <input type="checkbox" id="admission_btech" name="admission_btech"
                                                    value="admission_btech" />
                                                <label for="admission_btech">1<sup>st</sup> Semester B.Tech/B.Arch<span
                                                        class="sub">
                                                        -2023-2024</span></label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="admission_mtech" name="admission_mtech"
                                                    value="admission_mtech" />
                                                <label for="admission_mtech">1<sup>st</sup> Semester M.Tech/M.Plan<span
                                                        class="sub">
                                                        -2023-2024</span></label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="admission_phd" name="admission_phd"
                                                    value="admission_phd" />
                                                <label for="admission_phd">M.Sc, MCA & Ph.D.<span class="sub">
                                                        -2023-2024</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="subsection_in_generator">
                                        <p class="subheading">--STUDENT's TOTAL STRENGTH</p>
                                        <div>
                                            <div>
                                                <input type="checkbox" id="strength_btech" name="strength_btech"
                                                    value="strength_btech" />
                                                <label for="strength_btech">1<sup>st</sup> Semester B.Tech/B.Arch<span
                                                        class="sub">
                                                        -2023-2024</span></label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="strength_mtech" name="strength_mtech"
                                                    value="strength_mtech" />
                                                <label for="strength_mtech">1<sup>st</sup> Semester M.Tech/M.Plan<span
                                                        class="sub">
                                                        -2023-2024</span></label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="strength_phd" name="strength_phd"
                                                    value="strength_phd" />
                                                <label for="strength_phd">M. Tech./ M.Plan., MCA, MBA, M. Sc & Ph.D.
                                                    <span class="sub"> -2023-2024</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section_in_generator">
                                    <p style="font-weight: bold">CHARTS</p>
                                    <div class="subsection_in_generator">
                                        <p class="subheading">--STUDENT's ADMISSION: Gender-wise</p>
                                        <div>
                                            <div>
                                                <input type="checkbox" id="bar_btech" name="bar_btech"
                                                    value="bar_btech" />
                                                <label for="bar_btech">B.Tech/B.Arch</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="bar_mtech" name="bar_mtech"
                                                    value="bar_mtech" />
                                                <label for="bar_mtech">M.Tech/M.Plan</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="bar_mba" name="bar_mba" value="bar_mba" />
                                                <label for="bar_mba">MBA</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="bar_msc" name="bar_msc" value="bar_msc" />
                                                <label for="bar_msc">M.Sc</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="bar_phd" name="bar_phd" value="bar_phd" />
                                                <label for="bar_phd">PhD</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="subsection_in_generator">
                                        <p class="subheading">--STUDENT's ADMISSION: Category-wise</p>
                                        <div>
                                            <div>
                                                <input type="checkbox" id="pie_ug" name="pie_ug" value="pie_ug" />
                                                <label for="pie_ug">UG Students</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="pie_pg" name="pie_pg" value="pie_pg" />
                                                <label for="pie_pg">PG Students</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="pie_phd" name="pie_phd" value="pie_phd" />
                                                <label for="pie_phd">Ph.D Students</label>
                                            </div>
                                        </div>
                                    </div>
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



</body>

</html>