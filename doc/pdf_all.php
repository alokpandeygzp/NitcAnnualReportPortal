<?php
// Connect to MySQL database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imsdemo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$html ='<b>Annual Report</b><hr></hr>';

$sql = "SELECT * FROM entity";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    while($row_main = $res->fetch_assoc()) {
        $dep_id = $row_main['id'];
        $dep_name = $row_main['name'];

        $html .='<b>'.$dep_name.'</b><hr></hr>';

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM community_services where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0) {
            $html .= '<b>Community Services</b>
                    <table border="1" cellpadding="8">
                        <tr>
                            <th>Name of Staff</th>
                            <th>Community Services</th>
                        </tr>';
            
            while($row = $result->fetch_assoc()) {
                $html .= '<tr>
                            <td>'.$row['staff'].'</td>
                            <td>'.$row['title'].'</td>
                            </tr>';
            }

            $html .= '</table> <hr></hr>';

        } 


        // Fetch data from MySQL
        $sql1 = "SELECT * FROM other_services where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0) 
        {
            $html .= '<b>Other Academic and Administrative Services</b>
                    <table border="1" cellpadding="8">
                        <tr>
                            <th>Name of Staff</th>
                            <th>Other Services</th>
                        </tr>';
            
            while($row = $result->fetch_assoc()) {
                $html .= '<tr>
                            <td>'.$row['staff'].'</td>
                            <td>'.$row['title'].'</td>
                            </tr>';
            }

            $html .= '</table><hr></hr>';
        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM conferences where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0) {
            $html .= '<b>Conferences/Summer/Winter School/Short term Courses/ Workshops conduct</b>
                    <table border="1" cellpadding="8">
                        <tr>
                            <th><h3>Title</h3></th>
                            <th><h3>Co-ordinators</h3></th>
                            <th><h3>Start date</h3></th>
                            <th><h3>End date</h3></th>
                        </tr>';
            
            while($row = $result->fetch_assoc()) {
                $html .= '<tr>
                            <td>'.$row['title'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['start'].'</td>
                            <td>'.$row['end'].'</td>
                            </tr>';
            }

            $html .= '</table><hr></hr>';
        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM expert_lectures where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0) {
            $html .= '<b>Expert lecturers delivered in Conferences/Seminar/workshops</b>
                    <table border="1" cellpadding="8">
                        <tr>
                            <th><h3>Name of Staff</h3></th>
                            <th><h3>Title of Programme</h3></th>
                            <th><h3>Start date</h3></th>
                            <th><h3>End date</h3></th>
                            <th><h3>Organization</h3></th>
                        </tr>';
            
            while($row = $result->fetch_assoc()) {
                $html .= '<tr>
                            <td>'.$row['staff'].'</td>
                            <td>'.$row['title'].'</td>
                            <td>'.$row['start'].'</td>
                            <td>'.$row['end'].'</td>
                            <td>'.$row['organization'].'</td>
                            </tr>';
            }

            $html .= '</table><hr></hr>';

        } 


        // Fetch data from MySQL
        $sql1 = "SELECT * FROM faculty_qualification where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0) {
            $html .= '<b>Details of Faculty, who acquired Higher Qualification</b>
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

            $html .= '</table><hr></hr>';

        } 


        // Fetch data from MySQL
        $sql1 = "SELECT * FROM consultancy where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0) {
            $html .= '<b>Consultancy and testing</b>
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

            $html .= '</table><hr></hr>';

        } 


        // Fetch data from MySQL
        $sql1 = "SELECT * FROM patents where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0) {
            $html .= '<b>Patents acquired and filed</b>
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

            $html .= '</table><hr></hr>';

        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM student_achievements where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0) {
            $html .= '<b>Student achievements</b>
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

            $html .= '</table><hr></hr>';


        } 
    }    
} 


// Close MySQL connection
$conn->close();

// Create Word document using PHPWord library (install it via composer)
require 'vendor/autoload.php';

\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);

// Save the Word document
$filename = 'AnnualReport.docx';
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($filename);

echo 'Word document generated successfully: ' . $filename;


header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));

// Flush the output buffer
ob_clean();
flush();

// Output the file
readfile($filename);

// You can delete the file after it's downloaded if needed
unlink($filename);

exit;
?>