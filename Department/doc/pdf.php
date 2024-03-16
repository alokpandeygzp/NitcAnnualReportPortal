<?php
// Connect to MySQL database (replace with your database credentials)
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "imsdemo";
$conn = mysqli_connect('localhost', 'imsdemouser', '1msDem0PWD1234', 'imsdemo');

// Create Word document using PHPWord library (install it via composer)	

require 'vendor/autoload.php';
\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
$center = $phpWord->addParagraphStyle('p2Style', array('align'=>'center','marginTop' => 1));


$imagePath = 'https://nivahika.nitc.ac.in/asset/reportlogo.jpg'; // Replace with the actual path to your image file
$section->addImage($imagePath, array('width' => 460, 'height' => 90));
$section->addTextBreak(1);


// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$dep_id=$_GET['user'];
$sdate=$_POST['startDate'];
$edate=$_POST['endDate'];

if($sdate == "" || $edate == "")
{	
	$section->addText('Annual Report',array('bold' => true,'underline'=>'single','size' => 16),$center);	
	$text = $section->addTextRun(array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT));
	$text->addText("Dated:".date("d/m/Y"));
}
else
{
	$section->addText('Report From '.$sdate.' to '.$edate,array('bold' => true,'underline'=>'single','size' => 16),$center);
	$text = $section->addTextRun(array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT));
	$text->addText("Dated:".date("d/m/Y"));
}

if($sdate=="")
{
	$month = date("m");
	if($month<4)
	{
		$year = date("Y",strtotime("-1 year"));
		$sdate = $year."-04-01";
	}
	else
	{
		$year = date("Y");
		$sdate = $year."-04-01";
	}
}

if($edate=="")
{	
	$month = date("m");
	if($month>3)
	{
		$year = date("Y",strtotime("+1 year"));
		$edate = $year."-03-31";
	}
	else
	{
		$year = date("Y");
		$edate = $year."-03-31";
	}
}  

$section->addTextBreak(1);
$sql = "SELECT * FROM entity where id='$dep_id'";
$res = $conn->query($sql);

if ($res->num_rows > 0) 
{
    while($row_main = $res->fetch_assoc()) 
    {
	
        $dep_name = $row_main['name'];
	$role = $row_main['role'];
        $sql = "SELECT * from roles where name='$role'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	$section->addText($row['full_name'],array('bold' => true,'underline'=>'single','size' => 16),$center);
        $section->addTextBreak(1);

         // Fetch data from MySQL
         $sql1 = "SELECT * FROM student_achievements where entity='$role' and date between '$sdate' and '$edate' order by date";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['studentAchievements'])) 
         {
             $section->addText('Student Achievements',array('bold' => true,'underline'=>'single','size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of Student', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Course', array('bold' => true, 'size' => 12));
             $table->addCell(2500)->addText('Semester', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Roll No', array('bold' => true, 'size' => 12));
             $table->addCell(4000)->addText('Achievement', array('bold' => true, 'size' => 12));
             $table->addCell(2500)->addText('Date', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
             {
	         $row['name']= html_entity_decode($row['name'], ENT_QUOTES, 'UTF-8');
 	         $row['achievement']= html_entity_decode($row['achievement'], ENT_QUOTES, 'UTF-8');
		 
                 $table->addRow();
                 $table->addCell(3000)->addText($row['name'], array('size' => 10));
                 $table->addCell(2000)->addText($row['course'], array('size' => 10));
                 $table->addCell(2500)->addText($row['semester'], array('size' => 10));
                 $table->addCell(2000)->addText($row['rollno'], array('size' => 10));
                 $table->addCell(4000)->addText($row['achievement'], array('size' => 10));
                 $table->addCell(2500)->addText($row['date'], array('size' => 10));
             }
             $section->addTextBreak(1);   
         }
         
         $sql1 = "SELECT * FROM faculty_qualification where entity='$role' and date between '$sdate' and '$edate' order by date";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['facultyHigherQualification'])) 
         {
             $section->addText('Details of Faculty, who acquired Higher Qualification',array('bold' => true,'underline'=>'single','size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of Faculty', array('bold' => true, 'size' => 12));
             $table->addCell(6000)->addText('Qualification Acquired', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Institute', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Date', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
             {
                $row['name']= html_entity_decode($row['name'], ENT_QUOTES, 'UTF-8');
                $row['qualification']= html_entity_decode($row['qualification'], ENT_QUOTES, 'UTF-8');
                $row['institute']= html_entity_decode($row['institute'], ENT_QUOTES, 'UTF-8');
                 $table->addRow();
                 $table->addCell(3000)->addText($row['name'], array('size' => 10));
                 $table->addCell(6000)->addText($row['qualification'], array('size' => 10));
                 $table->addCell(2000)->addText($row['institute'], array('size' => 10));
                 $table->addCell(2000)->addText($row['date'], array('size' => 10));
             }
             $section->addTextBreak(1);   
         } 
 
        // Fetch data from MySQL
        $sql1 = "SELECT * FROM community_services where entity='$role' and date between '$sdate' and '$edate' order by date";
        $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['communityServices'])) 
         {
             $section->addText('Community Services',array('bold' => true,'underline'=>'single','size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
 
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of Staff', array('bold' => true, 'size' => 12));
             $table->addCell(6300)->addText('Community Services', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Date', array('bold' => true, 'size' => 12));
 
             while ($row = $result->fetch_assoc()) 
	    {
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
		 $row['staff']= html_entity_decode($row['staff'], ENT_QUOTES, 'UTF-8');
                 $table->addRow();
                 $table->addCell(3000)->addText($row['staff'], array('size' => 10));
                 $table->addCell(6300)->addText($row['title'], array('size' => 10));
                 $table->addCell(2000)->addText($row['date'], array('size' => 10));
             }
             $section->addTextBreak(1);
         } 
 
        
         // Fetch data from MySQL
         $sql1 = "SELECT * FROM conferences where entity='$role' and start between '$sdate' and '$edate' and  end  between '$sdate' and '$edate' order by start";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['conferencesConducted'])) 
         {
             $section->addText('Conferences/Summer/Winter School/Short term Courses/ Workshops Conducted',array('bold' => true,'underline'=>'single','size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(6000)->addText('Title', array('bold' => true, 'size' => 12));
             $table->addCell(6000)->addText('Coordinators', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('Start Date', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('End Date', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
	     {
		 
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
		 $row['name']= html_entity_decode($row['name'], ENT_QUOTES, 'UTF-8');
                 $table->addRow();
                 $table->addCell(6000)->addText($row['title'], array('size' => 10));
                 $table->addCell(6000)->addText($row['name'], array('size' => 10));
                 $table->addCell(3000)->addText($row['start'], array('size' => 10));
                 $table->addCell(3000)->addText($row['end'], array('size' => 10));
             
             }
             $section->addTextBreak(1);    
         } 
 
	  // Fetch data from MySQL
         $sql1 = "SELECT * FROM conferences_attened where entity='$role' and start between '$sdate' and '$edate' and  end  between '$sdate' and '$edate' order by start";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['conferencesAttended'])) 
         {
             $section->addText('Conferences/Summer/Winter School/Short term Courses/ Workshops Attended',array('bold' => true,'underline'=>'single','size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(6000)->addText('Title', array('bold' => true, 'size' => 12));
             $table->addCell(6000)->addText('Faculty', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('Start Date', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('End Date', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
	     {
		 
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
		 $row['name']= html_entity_decode($row['name'], ENT_QUOTES, 'UTF-8');
                 $table->addRow();
                 $table->addCell(6000)->addText($row['title'], array('size' => 10));
                 $table->addCell(6000)->addText($row['name'], array('size' => 10));
                 $table->addCell(3000)->addText($row['start'], array('size' => 10));
                 $table->addCell(3000)->addText($row['end'], array('size' => 10));
             
             }
             $section->addTextBreak(1);    
         } 
 
         // Fetch data from MySQL
         $sql1 = "SELECT * FROM expert_lectures where entity='$role' and start between '$sdate' and '$edate' and  end  between '$sdate' and '$edate' order by start";
         $result = $conn->query($sql1);
 		
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['expertLectures'])) 
         {
             $section->addText('Expert lecturers delivered in Conferences/Seminar/workshops',array('bold' => true,'underline'=>'single','size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of Speaker', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('Title of Programme', array('bold' => true, 'size' => 12));
             $table->addCell(2200)->addText('Start Date', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('End Date', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('Organization', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
	     {
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
		 $row['staff']= html_entity_decode($row['staff'], ENT_QUOTES, 'UTF-8');
		 $row['organization']= html_entity_decode($row['organization'], ENT_QUOTES, 'UTF-8');
		 $table->addRow();
                 $table->addCell(3000)->addText($row['staff'], array('size' => 10));
                 $table->addCell(3000)->addText($row['title'], array('size' => 10));
                 $table->addCell(2200)->addText($row['start'], array('size' => 10));
                 $table->addCell(2000)->addText($row['end'], array('size' => 10));
                 $table->addCell(3000)->addText($row['organization'], array('size' => 10));    
             }
             $section->addTextBreak(1);        
         } 
 
         // Fetch data from MySQL
         $sql1 = "SELECT * FROM expert_lecturesinvited where entity='$role' and start between '$sdate' and '$edate' and  end  between '$sdate' and '$edate' order by start";
         $result = $conn->query($sql1);
 		
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['expertinvited'])) 
         {
             $section->addText('Expert lecturers invited in Conferences/Seminar/workshops',array('bold' => true,'underline'=>'single','size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of Speaker', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('Title of Programme', array('bold' => true, 'size' => 12));
             $table->addCell(2200)->addText('Start Date', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('End Date', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
	     {
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
		 $row['staff']= html_entity_decode($row['staff'], ENT_QUOTES, 'UTF-8');
		 $row['organization']= html_entity_decode($row['organization'], ENT_QUOTES, 'UTF-8');
		 $table->addRow();
                 $table->addCell(3000)->addText($row['staff'], array('size' => 10));
                 $table->addCell(3000)->addText($row['title'], array('size' => 10));
                 $table->addCell(2200)->addText($row['start'], array('size' => 10));
                 $table->addCell(2000)->addText($row['end'], array('size' => 10));
             }
             $section->addTextBreak(1);        
         } 
 
         // Fetch data from MySQL
         $sql1 = "SELECT * FROM consultancy where entity='$role' and date between '$sdate' and '$edate' order by date";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['consultancyAndTesting'])) 
         {
             $section->addText('Consultancy and testing',array('bold' => true,'underline'=>'single','size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Nature of Service', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Organization', array('bold' => true, 'size' => 12));
             $table->addCell(1500)->addText('Revenue Earned', array('bold' => true, 'size' => 12));
             $table->addCell(1500)->addText('Status', array('bold' => true, 'size' => 12));
             $table->addCell(1500)->addText('Date', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
             {
		 $row['nature']= html_entity_decode($row['nature'], ENT_QUOTES, 'UTF-8');
		 $row['organization']= html_entity_decode($row['organization'], ENT_QUOTES, 'UTF-8');
		 $table->addRow();
                 $table->addCell(3000)->addText($row['nature'], array('size' => 10));
                 $table->addCell(2000)->addText($row['organization'], array('size' => 10));
                 $table->addCell(1500)->addText($row['revenue'], array('size' => 10));
                 $table->addCell(1500)->addText($row['status'], array('size' => 10));
                 $table->addCell(1500)->addText($row['date'], array('size' => 10));
             }
             $section->addTextBreak(1);   
             
         } 
 
         // Fetch data from MySQL
         $sql1 = "SELECT * FROM patents where entity='$role' and date between '$sdate' and '$edate' order by date";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['patentAquiredAndFiled'])) 
         {
             $section->addText('Patents acquired and filed',array('bold' => true,'underline'=>'single', 'size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of Staff', array('bold' => true, 'size' => 12));
             $table->addCell(6000)->addText('Description of Patent', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Date', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
             {
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
		 $row['staff']= html_entity_decode($row['staff'], ENT_QUOTES, 'UTF-8');
                 $table->addRow();
                 $table->addCell(3000)->addText($row['staff'], array('size' => 10));
                 $table->addCell(6000)->addText($row['title'], array('size' => 10));
                 $table->addCell(2000)->addText($row['date'], array('size' => 10));
             }
             $section->addTextBreak(1);   
 
         } 
 	 
	 
	 $sql = "SELECT * from roles where name='$role'";
	 $rs = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($rs);
	 $full = $row['full_name'];
                    
         $sql = "SELECT count(id) FROM journal where entity='$role'";
	 $rs = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($rs);
	 $journal = $row['count(id)'];
                   
	 $sql = "SELECT count(id) FROM internationalconference  where entity='$role'";
	 $rs = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($rs);
	 $ic = $row['count(id)'];
                    
	 $sql = "SELECT count(id) FROM nationalconference  where entity='$role'";
	 $rs = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($rs);
	 $nc = $row['count(id)'];
                    
	 $sql = "SELECT count(id) FROM patents where entity='$role'";
	 $rs = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($rs);
	 $patent = $row['count(id)'];
                    
         // Output data as a table in PDF
         if (isset($_POST['publications']) && ($journal!=0 || $patent!=0 || $ic!=0 || $nc!=0)) 
         {
	      
             $section->addText('Publications/Patents',array('bold' => true,'underline'=>'single', 'size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(2000)->addText('Department', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Journal', array('bold' => true, 'size' => 12));
             $table->addCell(2500)->addText('International Conference', array('bold' => true, 'size' => 12));
             $table->addCell(2500)->addText('National Conferences/Workshops', array('bold' => true, 'size' => 12));
             $table->addCell(1500)->addText('Patent', array('bold' => true, 'size' => 12));
             
                 $table->addRow();
		 $table->addCell(2000)->addText($full, array('size' => 10));
                 $table->addCell(2000)->addText($journal, array('size' => 10));
                 $table->addCell(2500)->addText($ic, array('size' => 10));
                 $table->addCell(2500)->addText($nc, array('size' => 10));
                 $table->addCell(1500)->addText($patent, array('size' => 10));
             
             $section->addTextBreak(1);   
             
         } 
 	 
	 // Fetch data from MySQL
         $sql1 = "SELECT * FROM journal where entity='$role'  ";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['journal'])) 
         {
             $section->addText('Journal Papers Published',array('bold' => true,'underline'=>'single', 'size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of the Author', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('Title of the Paper', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Name of Journal', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('VOL, Year, P.P.', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
             {
                 $table->addRow();
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
                 $row['author']= html_entity_decode($row['author'], ENT_QUOTES, 'UTF-8');
                 $row['journal']= html_entity_decode($row['journal'], ENT_QUOTES, 'UTF-8');
                 $row['vol_pp']= html_entity_decode($row['vol_pp'], ENT_QUOTES, 'UTF-8');
                 $table->addCell(3000)->addText($row['author'], array('size' => 10));
                 $table->addCell(3000)->addText($row['title'], array('size' => 10));
                 $table->addCell(2000)->addText($row['journal'], array('size' => 10));
                 $table->addCell(2000)->addText($row['vol_pp'], array('size' => 10));
             }
             $section->addTextBreak(1);   
             
         } 

	
	 // Fetch data from MySQL
         $sql1 = "SELECT * FROM internationalconference where entity='$role'";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['internatioanlconference'])) 
         {
             $section->addText('International Conferences Publications',array('bold' => true,'underline'=>'single', 'size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of the Author', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Title of the Paper', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('Name of International Conference', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('VOL, Year, P.P.', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
             {
                 $table->addRow();
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
                 $row['author']= html_entity_decode($row['author'], ENT_QUOTES, 'UTF-8');
                 $row['conf_name']= html_entity_decode($row['conf_name'], ENT_QUOTES, 'UTF-8');
                 $row['vol_pp']= html_entity_decode($row['vol_pp'], ENT_QUOTES, 'UTF-8');
                 $table->addCell(3000)->addText($row['author'], array('size' => 10));
                 $table->addCell(2000)->addText($row['title'], array('size' => 10));
                 $table->addCell(3000)->addText($row['conf_name'], array('size' => 10));
                 $table->addCell(2000)->addText($row['vol_pp'], array('size' => 10));
             }
             $section->addTextBreak(1);   
             
         } 
		
	// Fetch data from MySQL
         $sql1 = "SELECT * FROM nationalconference where entity='$role'";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['nationalconference'])) 
         {
             $section->addText('National Conferences/Workshops Publications',array('bold' => true,'underline'=>'single', 'size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of the Author', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Title of the Paper', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('Name of National Conference', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('VOL, Year, P.P.', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
             {
                 $table->addRow();
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
                 $row['author']= html_entity_decode($row['author'], ENT_QUOTES, 'UTF-8');
                 $row['conf_name']= html_entity_decode($row['conf_name'], ENT_QUOTES, 'UTF-8');
                 $row['vol_pp']= html_entity_decode($row['vol_pp'], ENT_QUOTES, 'UTF-8');
                 $table->addCell(3000)->addText($row['author'], array('size' => 10));
                 $table->addCell(2000)->addText($row['title'], array('size' => 10));
                 $table->addCell(3000)->addText($row['conf_name'], array('size' => 10));
                 $table->addCell(2000)->addText($row['vol_pp'], array('size' => 10));
             }
             $section->addTextBreak(1);   
             
         } 

	// Fetch data from MySQL
         $sql1 = "SELECT * FROM workshop  where entity='$role'";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['workshop'])) 
         {
             $section->addText('National Conferences/Workshops Publications',array('bold' => true,'underline'=>'single', 'size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(3000)->addText('Name of the Author', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Title of the Paper', array('bold' => true, 'size' => 12));
             $table->addCell(3000)->addText('Name of National Conference', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('VOL, Year, P.P.', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
             {
                 $table->addRow();
		 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
                 $row['author']= html_entity_decode($row['author'], ENT_QUOTES, 'UTF-8');
                 $row['conf_name']= html_entity_decode($row['conf_name'], ENT_QUOTES, 'UTF-8');
                 $row['vol_pp']= html_entity_decode($row['vol_pp'], ENT_QUOTES, 'UTF-8');
                 $table->addCell(3000)->addText($row['author'], array('size' => 10));
                 $table->addCell(2000)->addText($row['title'], array('size' => 10));
                 $table->addCell(3000)->addText($row['conf_name'], array('size' => 10));
                 $table->addCell(2000)->addText($row['vol_pp'], array('size' => 10));
             }
             $section->addTextBreak(1);   
             
         } 

	
	   // Fetch data from MySQL
         $sql1 = "SELECT * FROM funded where entity='$role' and  start between '$sdate' and '$edate' order by start";
         $result = $conn->query($sql1);
 
         // Output data as a table in PDF
         if ($result->num_rows > 0 and isset($_POST['fund'])) 
         {
             $section->addText('Funded Reserach Projects',array('bold' => true,'underline'=>'single', 'size' => 14));
             $section->addTextBreak(1);
             $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
             // Add table headers with some basic styling
             $table->addRow();
             $table->addCell(2000)->addText('Title of the Project', array('bold' => true, 'size' => 12));
             $table->addCell(1500)->addText('Funding Agency', array('bold' => true, 'size' => 12));
             $table->addCell(1000)->addText('Amount (in lakh)', array('bold' => true, 'size' => 12));
             $table->addCell(1500)->addText('Date', array('bold' => true, 'size' => 12));
             $table->addCell(1500)->addText('Status', array('bold' => true, 'size' => 12));
             $table->addCell(2000)->addText('Principal Investigator & Co-PIs', array('bold' => true, 'size' => 12));
             
             while ($row = $result->fetch_assoc()) 
             {
                 $table->addRow();
                 $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
                 $row['agent']= html_entity_decode($row['agent'], ENT_QUOTES, 'UTF-8');
                 $row['principal']= html_entity_decode($row['principal'], ENT_QUOTES, 'UTF-8');
                 $table->addCell(2000)->addText($row['title'], array('size' => 10));
                 $table->addCell(1500)->addText($row['agent'], array('size' => 10));
                 $table->addCell(1000)->addText($row['amount'], array('size' => 10));
                 $table->addCell(1500)->addText($row['start'], array('size' => 10));
                 $table->addCell(1500)->addText($row['status'], array('size' => 10));
                 $table->addCell(2000)->addText($row['principal'], array('size' => 10));
             }
             $section->addTextBreak(1);   
             
         }
         
          // Fetch data from MySQL
          $sql1 = "SELECT * FROM other_services where entity='$role' and date between '$sdate' and '$edate' order by date";
          $result = $conn->query($sql1);
  
          // Output data as a table in PDF
          if ($result->num_rows > 0 and isset($_POST['otherServices'])) 
          {
              $section->addText('Other Academic and Administrative Services',array('bold' => true,'underline'=>'single','size' => 14));
              $section->addTextBreak(1);
              $table = $section->addTable(array('borderSize' => 1, 'afterSpacing' =>100, 'Spacing'=> 100, 'cellMargin'=>100  ));
              // Add table headers with some basic styling
              $table->addRow();
              $table->addCell(3000)->addText('Name of Staff', array('bold' => true, 'size' => 12));
              $table->addCell(6300)->addText('Acadmemic and Administrative Services', array('bold' => true, 'size' => 12));
              $table->addCell(2000)->addText('Date', array('bold' => true, 'size' => 12));
  
              while ($row = $result->fetch_assoc()) 
              {
          
          	  $row['title']= html_entity_decode($row['title'], ENT_QUOTES, 'UTF-8');
          	  $row['staff']= html_entity_decode($row['staff'], ENT_QUOTES, 'UTF-8');
                  $table->addRow();
                  $table->addCell(3000)->addText($row['staff'], array('size' => 10));
                  $table->addCell(6300)->addText($row['title'], array('size' => 10));
                  $table->addCell(2000)->addText($row['date'], array('size' => 10));
              }
              $section->addTextBreak(1);
          } 
        
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
