<?php
// Connect to MySQL database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imsdemo";

$conn = new mysqli($servername, $username, $password, $dbname);
// Create Word document using PHPWord library (install it via composer)
require 'vendor/autoload.php';

\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
$center = $phpWord->addParagraphStyle('p2Style', array('align'=>'center','marginTop' => 1));
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$section->addText('Annual Report',array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 16),$center);
$section->addTextBreak(1);
$sql = "SELECT * FROM entity";
$res = $conn->query($sql);

if ($res->num_rows > 0 ) 
{
    while($row_main = $res->fetch_assoc()) 
    {
        $dep_id = $row_main['id'];
        $dep_name = $row_main['name'];
        $role = $row_main['role'];

        if(!($role=='department' || $role=='centre'))
            continue;

        $flag=0;

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM community_services where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0 and isset($_POST['communityServices'])) 
        {
            $section->addText($dep_name, array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 16),$center);
            $section->addTextBreak(1);
            $flag=1;

            $section->addText('Community Services',array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 14));
            $section->addTextBreak(1);
            $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));

            // Add table headers with some basic styling
            $table->addRow();
            $table->addCell(3000)->addText('Name of Staff', array('bold' => true, 'size' => 14));
            $table->addCell(6300)->addText('Community Services', array('bold' => true, 'size' => 14));

            while ($row = $result->fetch_assoc()) {
                $table->addRow();
                $table->addCell(3000)->addText($row['staff'], array('size' => 11));
                $table->addCell(6300)->addText($row['title'], array('size' => 10));
            }
            $section->addTextBreak(1);
            // $section->addPageBreak();
        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM other_services where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0 and isset($_POST['otherServices'])) 
        {

            if($flag==0) {
                $section->addText($dep_name, array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 16),$center);
                $section->addTextBreak(1);
                $flag=1;
            }

            $section->addText('Other Academic and Administrative Services',array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 14));
            $section->addTextBreak(1);
            $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
            // Add table headers with some basic styling
            $table->addRow();
            $table->addCell(3000)->addText('Name of Staff', array('bold' => true, 'size' => 14));
            $table->addCell(6300)->addText('Other Sefvices', array('bold' => true, 'size' => 14));

            while ($row = $result->fetch_assoc()) {
                $table->addRow();
                $table->addCell(3000)->addText($row['staff'], array('size' => 11));
                $table->addCell(6300)->addText($row['title'], array('size' => 10));
            }
            $section->addTextBreak(1);
        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM conferences where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0 and isset($_POST['conferencesConducted'])) 
        {

            if($flag==0) {
                $section->addText($dep_name, array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 16),$center);
                $section->addTextBreak(1);
                $flag=1;
            }

            $section->addText('Conferences/Summer/Winter School/Short term Courses/ Workshops conduct',array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 14));
            $section->addTextBreak(1);
            $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
            // Add table headers with some basic styling
            $table->addRow();
            $table->addCell(3000)->addText('Title', array('bold' => true, 'size' => 14));
            $table->addCell(6000)->addText('Co-ordinators', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('Start Date', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('End Date', array('bold' => true, 'size' => 14));
            
            while ($row = $result->fetch_assoc()) {
                $table->addRow();
                $table->addCell(3000)->addText($row['title'], array('size' => 11));
                $table->addCell(6000)->addText($row['name'], array('size' => 10));
                $table->addCell(6000)->addText($row['start'], array('size' => 10));
                $table->addCell(6000)->addText($row['end'], array('size' => 10));
            
            }
            $section->addTextBreak(1);    
        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM expert_lectures where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0 and isset($_POST['expertLectures'])) 
        {

            if($flag==0) {
                $section->addText($dep_name, array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 16),$center);
                $section->addTextBreak(1);
                $flag=1;
            }

            $section->addText('Expert lecturers delivered in Conferences/Seminar/workshops',array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 14));
            $section->addTextBreak(1);
            $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
            // Add table headers with some basic styling
            $table->addRow();
            $table->addCell(3000)->addText('Name of Staff', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('Title of Programme', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('Start Date', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('End Date', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('Organization', array('bold' => true, 'size' => 14));
            
            while ($row = $result->fetch_assoc()) {
                $table->addRow();
                $table->addCell(3000)->addText($row['staff'], array('size' => 11));
                $table->addCell(3000)->addText($row['title'], array('size' => 11));
                $table->addCell(6000)->addText($row['start'], array('size' => 10));
                $table->addCell(6000)->addText($row['end'], array('size' => 10));
                $table->addCell(3000)->addText($row['organization'], array('size' => 11));    
            }
            $section->addTextBreak(1);        
        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM faculty_qualification where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0 and isset($_POST['facultyHigherQualification'])) 
        {

            if($flag==0) {
                $section->addText($dep_name, array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 16),$center);
                $section->addTextBreak(1);
                $flag=1;
            }

            $section->addText('Details of Faculty, who acquired Higher Qualification',array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 14));
            $section->addTextBreak(1);
            $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
            // Add table headers with some basic styling
            $table->addRow();
            $table->addCell(3000)->addText('Name of Faculty', array('bold' => true, 'size' => 14));
            $table->addCell(6000)->addText('Qualification Acquired', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('Institute', array('bold' => true, 'size' => 14));
            
            while ($row = $result->fetch_assoc()) 
            {
                $table->addRow();
                $table->addCell(6000)->addText($row['name'], array('size' => 10));
                $table->addCell(6000)->addText($row['qualification'], array('size' => 10));
                $table->addCell(6000)->addText($row['institute'], array('size' => 10));
            }
            $section->addTextBreak(1);   
        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM consultancy where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0 and isset($_POST['consultancyAndTesting'])) 
        {

            if($flag==0) {
                $section->addText($dep_name, array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 16),$center);
                $section->addTextBreak(1);
                $flag=1;
            }

            $section->addText('Consultancy and testing',array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 14));
            $section->addTextBreak(1);
            $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
            // Add table headers with some basic styling
            $table->addRow();
            $table->addCell(3000)->addText('Nature of service', array('bold' => true, 'size' => 14));
            $table->addCell(6000)->addText('Organization', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('Revenue Earned', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('Status', array('bold' => true, 'size' => 14));
            
            while ($row = $result->fetch_assoc()) 
            {
                $table->addRow();
                $table->addCell(6000)->addText($row['nature'], array('size' => 10));
                $table->addCell(6000)->addText($row['organization'], array('size' => 10));
                $table->addCell(6000)->addText($row['revenue'], array('size' => 10));
                $table->addCell(6000)->addText($row['status'], array('size' => 10));
            }
            $section->addTextBreak(1);   
            
        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM patents where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0 and isset($_POST['patentAquiredAndFiled'])) 
        {

            if($flag==0) {
                $section->addText($dep_name, array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 16),$center);
                $section->addTextBreak(1);
                $flag=1;
            }

            $section->addText('Patents acquired and filed',array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 14));
            $section->addTextBreak(1);
            $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
            // Add table headers with some basic styling
            $table->addRow();
            $table->addCell(3000)->addText('Name of Staff', array('bold' => true, 'size' => 14));
            $table->addCell(6000)->addText('Title', array('bold' => true, 'size' => 14));
            $table->addCell(3000)->addText('Year', array('bold' => true, 'size' => 14));
            
            while ($row = $result->fetch_assoc()) 
            {
                $table->addRow();
                $table->addCell(6000)->addText($row['staff'], array('size' => 10));
                $table->addCell(6000)->addText($row['title'], array('size' => 10));
                $table->addCell(6000)->addText($row['year'], array('size' => 10));
            }
            $section->addTextBreak(1);   

        } 

        // Fetch data from MySQL
        $sql1 = "SELECT * FROM student_achievements where entity='$dep_id'";
        $result = $conn->query($sql1);

        // Output data as a table in PDF
        if ($result->num_rows > 0 and isset($_POST['studentAchievements'])) 
        {

            if($flag==0) {
                $section->addText($dep_name, array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 16),$center);
                $section->addTextBreak(1);
                $flag=1;
            }

            $section->addText('Details of Faculty, who acquired Higher Qualification',array('bold' => true,'underline'=>'single','name'=>'TIMOTHYfont','size' => 14));
            $section->addTextBreak(1);
            $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
            // Add table headers with some basic styling
            $table->addRow();
            $table->addCell(3000)->addText('Name', array('bold' => true, 'size' => 14));
            $table->addCell(6000)->addText('Achievement', array('bold' => true, 'size' => 14));
            
            while ($row = $result->fetch_assoc()) 
            {
                $table->addRow();
                $table->addCell(6000)->addText($row['name'], array('size' => 10));
                $table->addCell(6000)->addText($row['achievement'], array('size' => 10));
            }
            $section->addTextBreak(1);   
        }
        $section->addPageBreak();
    }    
} 


// Close MySQL connection
$conn->close();

// Save the Word document
$filename = 'AnnualReport.docx';
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($filename);


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