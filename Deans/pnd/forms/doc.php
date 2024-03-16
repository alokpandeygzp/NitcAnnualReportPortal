<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (empty($_SESSION['login'])) {
    header('Location: ../index.php');
}

if (empty($_SESSION['access_token'])) {
    $fname = "Welcome! ";
    $lname = $_GET["user"];
    $pic = "../../../asset/nitc_logo_icon.svg";
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

$con = mysqli_connect('localhost', 'root', '', 'imsdemo');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = "DOC Fund";
    $year = "2024";
    $totalFunds = $_POST['totalFunds'];
    $currentlyAvailable = isset($_POST['currentlyAvailable']) ? $_POST['currentlyAvailable'] : 0;

    $cseFunds = $_POST['cseFunds'] ?? 0;
    $eceFunds = $_POST['eceFunds'] ?? 0;
    $electricalFunds = $_POST['electricalFunds'] ?? 0;
    $mechanicalFunds = $_POST['mechanicalFunds'] ?? 0;
    $architectureFunds = $_POST['architectureFunds'] ?? 0;
    $humanitiesFunds = $_POST['humanitiesFunds'] ?? 0;
    $biotechFunds = $_POST['biotechFunds'] ?? 0;
    $chemicalEngFunds = $_POST['chemicalEngFunds'] ?? 0;
    $chemistryFunds = $_POST['chemistryFunds'] ?? 0;
    $civilFunds = $_POST['civilFunds'] ?? 0;
    $educationFunds = $_POST['educationFunds'] ?? 0;
    $materialScienceFunds = $_POST['materialScienceFunds'] ?? 0;
    $mathematicsFunds = $_POST['mathematicsFunds'] ?? 0;
    $managementStudiesFunds = $_POST['managementStudiesFunds'] ?? 0;
    $physicalEducationFunds = $_POST['physicalEducationFunds'] ?? 0;
    $physicsFunds = $_POST['physicsFunds'] ?? 0;

    $query = "INSERT INTO `DeanPnD`(`Type`, `Year`, `TotalFunds`, `AvailableFunds`, `CSE`, `ECE`, `Electrical`, `Mechanical`, `Architecture`, `Humanities`, `BioTech`, `ChemicalEng`, `Chemistry`, `Civil`, `Education`, `MaterialScience`, `Mathematics`, `ManagementStudies`, `Physical Education`, `Physics`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt === false) {
        die("Error in prepared statement: " . mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, "siiiiiiiiiiiiiiiiiii", $type, $year, $totalFunds, $currentlyAvailable, $cseFunds, $eceFunds, $electricalFunds, $mechanicalFunds, $architectureFunds, $humanitiesFunds, $biotechFunds, $chemicalEngFunds, $chemistryFunds, $civilFunds, $educationFunds, $materialScienceFunds, $mathematicsFunds, $managementStudiesFunds, $physicalEducationFunds, $physicsFunds);

    if (mysqli_stmt_execute($stmt)) {
        echo "Entry added successfully";
    } else {
        echo "Entry addition failed: " . mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/forms.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/c0795f1bee.js" crossorigin="anonymous"></script>
    <title>DOC Fund Allocation</title>
    <script>
        function submitForm() {
            var departments = ["cse", "ece", "mechanical", "electrical", "architecture", "humanities", "biotech",
                "chemicalEng", "chemistry", "civil", "education", "materialScience", "mathematics", "managementStudies",
                "physicalEducation", "physics"
            ];

            for (var i = 0; i < departments.length; i++) {
                var funds = document.getElementById(departments[i] + "Funds").value;
                if (funds.trim() == "") {
                    alert("Please fill in all fields.");
                    return false;
                }
            }

            // Disable the button to prevent double submission
            $("#totalFundsEnter").prop("disabled", true);
            var type = "Plan Fund";
            var year = "2024";
            var totalFunds = $("#totalFunds").val();
            var currentlyAvailable = $(".currentlyAvailable").text().split(" ")[1];

            var cseFunds = $("#cseFunds").val() || 0;
            var eceFunds = $("#eceFunds").val() || 0;
            var electricalFunds = $("#electricalFunds").val() || 0;
            var mechanicalFunds = $("#mechanicalFunds").val() || 0;
            var architectureFunds = $("#architectureFunds").val() || 0;
            var humanitiesFunds = $("#humanitiesFunds").val() || 0;
            var biotechFunds = $("#biotechFunds").val() || 0;
            var chemicalEngFunds = $("#chemicalEngFunds").val() || 0;
            var chemistryFunds = $("#chemistryFunds").val() || 0;
            var civilFunds = $("#civilFunds").val() || 0;
            var educationFunds = $("#educationFunds").val() || 0;
            var materialScienceFunds = $("#materialScienceFunds").val() || 0;
            var mathematicsFunds = $("#mathematicsFunds").val() || 0;
            var managementStudiesFunds = $("#managementStudiesFunds").val() || 0;
            var physicalEducationFunds = $("#physicalEducationFunds").val() || 0;
            var physicsFunds = $("#physicsFunds").val() || 0;

            // AJAX call to submit the form data
            $.ajax({
                type: "POST",
                url: "",
                data: {
                    action: "submitForm",
                    type: type,
                    year: year,
                    totalFunds: totalFunds,
                    currentlyAvailable: currentlyAvailable,
                    cseFunds: cseFunds,
                    eceFunds: eceFunds,
                    electricalFunds: electricalFunds,
                    mechanicalFunds: mechanicalFunds,
                    architectureFunds: architectureFunds,
                    humanitiesFunds: humanitiesFunds,
                    biotechFunds: biotechFunds,
                    chemicalEngFunds: chemicalEngFunds,
                    chemistryFunds: chemistryFunds,
                    civilFunds: civilFunds,
                    educationFunds: educationFunds,
                    materialScienceFunds: materialScienceFunds,
                    mathematicsFunds: mathematicsFunds,
                    managementStudiesFunds: managementStudiesFunds,
                    physicalEducationFunds: physicalEducationFunds,
                    physicsFunds: physicsFunds
                },
                success: function (response) {
                    console.log(response);
                    // Handle success, if needed
                    alert("Entry added successfully");

                    // Re-enable the button after processing
                    $("#totalFundsEnter").prop("disabled", false);
                },
                error: function (error) {
                    console.error(error);
                    // Handle error, if needed
                    alert("Entry addition failed: " + data.message);
                    // Re-enable the button after processing
                    $("#totalFundsEnter").prop("disabled", false);
                }
            });
        }


        $(document).ready(function () {
            $("#planForm").submit(function (e) {
                e.preventDefault();
                submitForm();
            });


            $("#totalFundsEnter").click(function () {
                var totalFunds = $("#totalFunds").val();
                $(".currentlyAvailable").text("Rs " + totalFunds);
            });

            function updateDepartmentFunds(departmentSelector, fundsInput, currentFundsSelector) {
                var departmentFunds = $(fundsInput).val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().split(" ")[1]);

                if (departmentFunds.trim() === "") {
                    alert("Please fill in all fields.");
                    return false;
                }
                if (parseInt(departmentFunds) <= currentlyAvailable && !$(departmentSelector).hasClass('funds-added')) {
                    $(currentFundsSelector).text("Rs " + departmentFunds);
                    $(".currentlyAvailable").text("Rs " + (currentlyAvailable - parseInt(departmentFunds)));

                    $(departmentSelector).addClass('funds-added');
                } else {
                    alert("Funds already added or department funds exceed currently available funds!");
                }
            }

            $(".cseBtn").click(function () {
                updateDepartmentFunds(".cseBtn", "#cseFunds", ".cseCurrentFunds");
            });
            $(".eceBtn").click(function () {
                updateDepartmentFunds(".eceBtn", "#eceFunds", ".eceCurrentFunds");
            });
            $(".electricalBtn").click(function () {
                updateDepartmentFunds(".electricalBtn", "#electricalFunds", ".electricalCurrentFunds");
            });
            $(".mechanicalBtn").click(function () {
                updateDepartmentFunds(".mechanicalBtn", "#mechanicalFunds", ".mechanicalCurrentFunds");
            });
            $(".architectureBtn").click(function () {
                updateDepartmentFunds(".architectureBtn", "#architectureFunds",
                    ".architectureCurrentFunds");
            });
            $(".humanitiesBtn").click(function () {
                updateDepartmentFunds(".humanitiesBtn", "#humanitiesFunds", ".humanitiesCurrentFunds");
            });
            $(".biotechBtn").click(function () {
                updateDepartmentFunds(".biotechBtn", "#biotechFunds", ".biotechCurrentFunds");
            });
            $(".chemicalEngBtn").click(function () {
                updateDepartmentFunds(".chemicalEngBtn", "#chemicalEngFunds", ".chemicalEngCurrentFunds");
            });
            $(".chemistryBtn").click(function () {
                updateDepartmentFunds(".chemistryBtn", "#chemistryFunds", ".chemistryCurrentFunds");
            });
            $(".civilBtn").click(function () {
                updateDepartmentFunds(".civilBtn", "#civilFunds", ".civilCurrentFunds");
            });
            $(".educationBtn").click(function () {
                updateDepartmentFunds(".educationBtn", "#educationFunds", ".educationCurrentFunds");
            });
            $(".materialScienceBtn").click(function () {
                updateDepartmentFunds(".materialScienceBtn", "#materialScienceFunds",
                    ".materialScienceCurrentFunds");
            });
            $(".mathematicsBtn").click(function () {
                updateDepartmentFunds(".mathematicsBtn", "#mathematicsFunds", ".mathematicsCurrentFunds");
            });
            $(".managementStudiesBtn").click(function () {
                updateDepartmentFunds(".managementStudiesBtn", "#managementStudiesFunds",
                    ".managementStudiesCurrentFunds");
            });
            $(".physicalEducationBtn").click(function () {
                updateDepartmentFunds(".physicalEducationBtn", "#physicalEducationFunds",
                    ".physicalEducationCurrentFunds");
            });
            $(".physicsBtn").click(function () {
                updateDepartmentFunds(".physicsBtn", "#physicsFunds", ".physicsCurrentFunds");
            });



            // Event handler for the "Clear" button
            $(".clear-button").click(function () {
                // Reset all values to initial state
                var totalFunds = $("#totalFunds").val();
                $(".currentlyAvailable").text("Rs " + (totalFunds || 0));
                $(".input-fields").val("");

                // Reset department-wise values for all departments
                var departments = ["cse", "ece", "electrical", "mechanical", "architecture", "humanities",
                    "civil", "education", "chemicalEng", "biotech", "chemistry", "materialScience",
                    "mathematics", "managementStudies", "physicalEducation", "physics"
                ];

                departments.forEach(function (department) {
                    $("." + department + "CurrentFunds").text("Rs 0");
                    $("#" + department + "Funds").val("");
                });
                $(".funds-added").removeClass('funds-added');
            });


            // Event handler for the "Clear" button for CSE department
            $(".cseClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');
                var cseFunds = $("#cseFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".cseCurrentFunds").text("Rs 0");
                $("#cseFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(cseFunds || 0)));
            });
            $(".eceClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var eceFunds = $("#eceFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".eceCurrentFunds").text("Rs 0");
                $("#eceFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(eceFunds || 0)));
            });

            $(".electricalClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var electricalFunds = $("#electricalFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".electricalCurrentFunds").text("Rs 0");
                $("#electricalFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(electricalFunds ||
                    0)));
            });

            $(".mechanicalClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var mechanicalFunds = $("#mechanicalFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".mechanicalCurrentFunds").text("Rs 0");
                $("#mechanicalFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(mechanicalFunds ||
                    0)));
            });
            $(".architectureClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var architectureFunds = $("#architectureFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".architectureCurrentFunds").text("Rs 0");
                $("#architectureFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(architectureFunds ||
                    0)));
            });
            $(".humanitiesClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var humanitiesFunds = $("#humanitiesFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".humanitiesCurrentFunds").text("Rs 0");
                $("#humanitiesFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(humanitiesFunds ||
                    0)));
            });

            $(".chemicalEngClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var chemicalEngFunds = $("#chemicalEngFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".chemicalEngCurrentFunds").text("Rs 0");
                $("#chemicalEngFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(chemicalEngFunds ||
                    0)));
            });

            $(".biotechClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var biotechFunds = $("#biotechFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".biotechCurrentFunds").text("Rs 0");
                $("#biotechFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(biotechFunds || 0)));
            });

            $(".civilClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var civilFunds = $("#civilFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".civilCurrentFunds").text("Rs 0");
                $("#civilFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(civilFunds || 0)));
            });

            $(".educationClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var educationFunds = $("#educationFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".educationCurrentFunds").text("Rs 0");
                $("#educationFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(educationFunds || 0)));
            });


            $(".chemistryClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var chemistryFunds = $("#chemistryFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".chemistryCurrentFunds").text("Rs 0");
                $("#chemistryFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(chemistryFunds || 0)));
            });


            $(".materialScienceClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var materialScienceFunds = $("#materialScienceFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".materialScienceCurrentFunds").text("Rs 0");
                $("#materialScienceFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(materialScienceFunds ||
                    0)));
            });
            $(".mathematicsClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var mathematicsFunds = $("#mathematicsFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".mathematicsCurrentFunds").text("Rs 0");
                $("#mathematicsFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(mathematicsFunds ||
                    0)));
            });
            $(".managementStudiesClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var managementStudiesFunds = $("#managementStudiesFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".managementStudiesCurrentFunds").text("Rs 0");
                $("#managementStudiesFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(
                    managementStudiesFunds || 0)));
            });
            $(".physicalEducationClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var physicalEducationFunds = $("#physicalEducationFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".physicalEducationCurrentFunds").text("Rs 0");
                $("#physicalEducationFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(
                    physicalEducationFunds || 0)));
            });
            $(".physicsClearBtn").click(function () {
                $(".funds-added").removeClass('funds-added');

                var physicsFunds = $("#physicsFunds").val();
                var currentlyAvailable = parseInt($(".currentlyAvailable").text().replace("Rs ", ""));
                $(".physicsCurrentFunds").text("Rs 0");
                $("#physicsFunds").val("");
                $(".currentlyAvailable").text("Rs " + (currentlyAvailable + parseInt(physicsFunds || 0)));
            });

        });
    </script>
</head>

<body>

    <div class="container">

        <!-- user strip--pending  -->
        <?php
        echo '<div class="user_strip">
        <a href="../dashboard.php?user=' . $lname . '" class="user_to_dash">
        <div class="user">
            <img src="' . $pic . '" class="user_image" />
            <h3>' . $fname . ' ' . $lname . '</h3>
        </div>
    </a>
                <div class="logout_btn_holder">';

        echo '
                    <a href="../../../logout.php" class="">
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

        <div class="subcontainer">
            <h2>DOC Fund Allocation</h2>
            <div class="form_container">
                <form id="planForm" method="post" action="" onsubmit="submitForm();" class="form">
                    <table class="upper_table">
                        <tr class="table_row">
                            <td class="">Alloted Funds:</td>
                            <td class="">
                                <input class="input-fields" type="number" id="totalFunds" placeholder="Funds"
                                    name="totalFunds" class="input-fields" onkeypress="return isNumberKey(event)">
                            </td>
                            <td class="">

                            </td>

                        </tr>
                        <tr>
                            <td>
                                Date:
                            </td>
                            <td>
                                <input type="date" name="date" id="date" class="input-fields">
                            </td>
                            <td>
                                <button type="button" id="totalFundsEnter" class="enter-button">Enter</button>
                            </td>
                        </tr>
                        <tr class="table_row">
                            <td class="data">Currently Available:</td>
                            <td colspan="2" class="data">
                                <p class="currentlyAvailable">Rs 0</p>
                            </td>
                        </tr>
                    </table>
                    <table class="lower_table">
                        <tr>
                            <th>Department</th>
                            <th>Allot Funds</th>
                            <th>Alloted Funds</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td class="dep">CSE</td>
                            <td>
                                <input class="input-fields" type="number" id="cseFunds" placeholder="Funds"
                                    name="cseFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="cseCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn cseBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="cseClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">ECE</td>
                            <td>
                                <input class="input-fields" type="number" id="eceFunds" placeholder="Funds"
                                    name="eceFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="eceCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn eceBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="eceClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Mechanical</td>
                            <td>
                                <input class="input-fields" type="number" id="mechanicalFunds" placeholder="Funds"
                                    name="mechanicalFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="mechanicalCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn mechanicalBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="mechanicalClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Electrical</td>
                            <td>
                                <input class="input-fields" type="number" id="electricalFunds" placeholder="Funds"
                                    name="electricalFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="electricalCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn electricalBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="electricalClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Architecture</td>
                            <td>
                                <input class="input-fields" type="number" id="architectureFunds" placeholder="Funds"
                                    name="architectureFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="architectureCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn architectureBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="architectureClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Humanities</td>
                            <td>
                                <input class="input-fields" type="number" id="humanitiesFunds" placeholder="Funds"
                                    name="humanitiesFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="humanitiesCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn humanitiesBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="humanitiesClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">BioTech</td>
                            <td>
                                <input class="input-fields" type="number" id="biotechFunds" placeholder="Funds"
                                    name="biotechFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="biotechCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn biotechBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="biotechClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">ChemicalEng</td>
                            <td>
                                <input class="input-fields" type="number" id="chemicalEngFunds" placeholder="Funds"
                                    name="chemicalEngFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="chemicalEngCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn chemicalEngBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="chemicalEngClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Chemistry</td>
                            <td>
                                <input class="input-fields" type="number" id="chemistryFunds" placeholder="Funds"
                                    name="chemistryFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="chemistryCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn chemistryBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="chemistryClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Civil</td>
                            <td>
                                <input class="input-fields" type="number" id="civilFunds" placeholder="Funds"
                                    name="civilFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="civilCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn civilBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="civilClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="dep">Education</td>
                            <td>
                                <input class="input-fields" type="number" id="educationFunds" placeholder="Funds"
                                    name="educationFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="educationCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn educationBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="educationClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Material Science</td>
                            <td>
                                <input class="input-fields" type="number" id="materialScienceFunds" placeholder="Funds"
                                    name="materialScienceFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="materialScienceCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn materialScienceBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="materialScienceClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Mathematics</td>
                            <td>
                                <input class="input-fields" type="number" id="mathematicsFunds" placeholder="Funds"
                                    name="mathematicsFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="mathematicsCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn mathematicsBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="mathematicsClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Management Studies</td>
                            <td>
                                <input class="input-fields" type="number" id="managementStudiesFunds"
                                    placeholder="Funds" name="managementStudiesFunds"
                                    onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="managementStudiesCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn managementStudiesBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="managementStudiesClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Physical Education</td>
                            <td>
                                <input class="input-fields" type="number" id="physicalEducationFunds"
                                    placeholder="Funds" name="physicalEducationFunds"
                                    onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="physicalEducationCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn physicalEducationBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="physicalEducationClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="dep">Physics</td>
                            <td>
                                <input class="input-fields" type="number" id="physicsFunds" placeholder="Funds"
                                    name="physicsFunds" onkeypress="return isNumberKey(event)">
                            </td>
                            <td>
                                <p class="physicsCurrentFunds">Rs 0</p>
                            </td>
                            <td class="box button_box btn">
                                <div class="btn_inner_box">
                                    <p class="add_btn physicsBtn"><i class="fa-solid fa-plus"></i></p>
                                    <p class="physicsClearBtn"><i class="fa-solid fa-trash"></i></p>
                                </div>
                            </td>
                        </tr>

                    </table>

                    <div class="btn_container_end">
                        <button type="button" class="submit-button" onclick="submitForm();">Submit</button>
                        <button type="button" class="clear-button">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function validateForm() {
        var staffName = document.forms["myForm"]["faculty_name"].value;
        var progTitle = document.forms["myForm"]["title"].value;
        var date = document.forms["myForm"]["date"].value;

        if (staffName.trim() == "" || progTitle.trim() == "" || date.trim() == "") {
            alert("Please fill in all fields.");
            return false;
        }

        return true;
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

</html>