<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Create a new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Annual Report');

// Add a page
$pdf->AddPage();

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imsdemo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pdf->writeHTML('<h1>Department of Computer Science<br></h1>', true, false, true, false, '');

// Fetch data from MySQL
$sql1 = "SELECT * FROM community_services";
$result = $conn->query($sql1);

// Output data as a table in PDF
if ($result->num_rows > 0) {
    $html = '<h3>a. Community Services</h3>
            <style>
                th {
                    text-align:center;      
                }
            </style>
		   <table border="1" cellpadding="8">
                <tr>
                    <th><h3>Name of Staff</h3></th>
                    <th><h3>Community Services</h3></th>
                </tr>';
    
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$row['staff'].'</td>
                    <td>'.$row['title'].'</td>
                    </tr>';
    }

    $html .= '</table>';

    // Output the HTML content to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    echo "No data found";
}


// Fetch data from MySQL
$sql1 = "SELECT * FROM other_services";
$result = $conn->query($sql1);

// Output data as a table in PDF
if ($result->num_rows > 0) {
    $html = '<h3>b. Other Academic and Administrative Services</h3>
            <style>
                th {
                    text-align:center;      
                }
            </style>
		   <table border="1" cellpadding="8">
                <tr>
                    <th><h3>Name of Staff</h3></th>
                    <th><h3>Other Services</h3></th>
                </tr>';
    
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$row['staff'].'</td>
                    <td>'.$row['title'].'</td>
                    </tr>';
    }

    $html .= '</table>';

    // Output the HTML content to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    echo "No data found";
}


// Fetch data from MySQL
$sql1 = "SELECT * FROM conferences";
$result = $conn->query($sql1);

// Output data as a table in PDF
if ($result->num_rows > 0) {
    $html = '<h3>c. Conferences/Summer/Winter School/Short term Courses/ Workshops conduct</h3>
            <style>
                th {
                    text-align:center;      
                }
            </style>
		   <table border="1" cellpadding="8">
                <tr>
                    <th><h3>Title</h3></th>
                    <th><h3>Co-ordinators</h3></th>
                    <th><h3>Duration and Period</h3></th>
                </tr>';
    
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$row['title'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['duration'].'</td>
                    </tr>';
    }

    $html .= '</table>';

    // Output the HTML content to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    echo "No data found";
}


// Fetch data from MySQL
$sql1 = "SELECT * FROM expert_lectures";
$result = $conn->query($sql1);

// Output data as a table in PDF
if ($result->num_rows > 0) {
    $html = '<h3>d. Expert lecturers delivered in Conferences/Seminar/workshops</h3>
            <style>
                th {
                    text-align:center;      
                }
            </style>
		   <table border="1" cellpadding="8">
                <tr>
                    <th><h3>Name of Staff</h3></th>
                    <th><h3>Title of Programme</h3></th>
                    <th><h3>Duration and Period</h3></th>
                    <th><h3>Organization</h3></th>
                </tr>';
    
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$row['staff'].'</td>
                    <td>'.$row['title'].'</td>
                    <td>'.$row['duration'].'</td>
                    <td>'.$row['organization'].'</td>
                    </tr>';
    }

    $html .= '</table>';

    // Output the HTML content to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    echo "No data found";
}


// Fetch data from MySQL
$sql1 = "SELECT * FROM faculty_qualification";
$result = $conn->query($sql1);

// Output data as a table in PDF
if ($result->num_rows > 0) {
    $html = '<h3>e. Details of Faculty, who acquired Higher Qualification</h3>
            <style>
                th {
                    text-align:center;      
                }
            </style>
		   <table border="1" cellpadding="8">
                <tr>
                    <th><h3>Name of Faculty</h3></th>
                    <th><h3>Qualification Acquired</h3></th>
                    <th><h3>Institute</h3></th>
                </tr>';
    
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['qualification'].'</td>
                    <td>'.$row['institute'].'</td>
                    </tr>';
    }

    $html .= '</table>';

    // Output the HTML content to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    echo "No data found";
}


// Fetch data from MySQL
$sql1 = "SELECT * FROM consultancy";
$result = $conn->query($sql1);

// Output data as a table in PDF
if ($result->num_rows > 0) {
    $html = '<h3>f. Consultancy and testing</h3>
            <style>
                th {
                    text-align:center;      
                }
            </style>
		   <table border="1" cellpadding="8">
                <tr>
                    <th><h3>Nature of service</h3></th>
                    <th><h3>Organization</h3></th>
                    <th><h3>Revenue Earned</h3></th>
                    <th><h3>Status</h3></th>
                </tr>';
    
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$row['nature'].'</td>
                    <td>'.$row['organization'].'</td>
                    <td>'.$row['revenue'].'</td>
                    <td>'.$row['status'].'</td>
                    </tr>';
    }

    $html .= '</table>';

    // Output the HTML content to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    echo "No data found";
}


// Fetch data from MySQL
$sql1 = "SELECT * FROM patents";
$result = $conn->query($sql1);

// Output data as a table in PDF
if ($result->num_rows > 0) {
    $html = '<h3>g. Patents acquired and filed</h3>
            <style>
                th {
                    text-align:center;      
                }
            </style>
		   <table border="1" cellpadding="8">
                <tr>
                    <th><h3>Name of Staff</h3></th>
                    <th><h3>Title</h3></th>
                    <th><h3>Year</h3></th>
                </tr>';
    
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$row['staff'].'</td>
                    <td>'.$row['title'].'</td>
                    <td>'.$row['year'].'</td>
                    </tr>';
    }

    $html .= '</table>';

    // Output the HTML content to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    echo "No data found";
}


// Fetch data from MySQL
$sql1 = "SELECT * FROM student_achievements";
$result = $conn->query($sql1);

// Output data as a table in PDF
if ($result->num_rows > 0) {
    $html = '<h3>h. Student achievements</h3>
            <style>
                th {
                    text-align:center;      
                }
            </style>
		   <table border="1" cellpadding="8">
                <tr>
                    <th><h3>Name</h3></th>
                    <th><h3>Achievement</h3></th>
                </tr>';
    
    while($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['achievement'].'</td>
                    </tr>';
    }

    $html .= '</table>';

    // Output the HTML content to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    echo "No data found";
}


// Close MySQL connection
$conn->close();

// Save the PDF to a file or output to the browser
$pdf->Output('Annualreport.pdf', 'D');
?>
