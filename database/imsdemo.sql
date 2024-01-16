-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 08:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imsdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `community_services`
--

CREATE TABLE `community_services` (
  `staff` varchar(80) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_services`
--

INSERT INTO `community_services` (`staff`, `title`, `entity`) VALUES
('Jane Doe', 'Led an Environmental Cleanup Campaign in collaboration with local volunteers. The initiative focused on cleaning up public spaces, raising awareness about environmental conservation, and encouraging community participation in sustainable practices.', 'CED'),
('Alice Smith', 'Initiated and coordinated a Tutoring Program for underprivileged students in collaboration with local schools. The program aimed to provide educational support and mentorship to students facing socio-economic challenges.', 'CSED'),
('Bob Johnson', 'Organized a Health and Wellness Workshop, bringing together healthcare professionals and community members. The workshop included informative sessions on healthy living, fitness activities, and free health check-ups for participants.', 'ECED'),
('Charlie Brown', 'Led a Community Garden Project, establishing a communal green space for residents. The project aimed to promote sustainable living, community bonding, and provide fresh produce to local families in need.', 'EEED'),
('David Wilson', 'Coordinated a STEM Education Program for kids, introducing young minds to science, technology, engineering, and mathematics. The program included interactive workshops, experiments, and educational activities to foster interest in STEM fields.', 'MED'),
('Frank Miller', 'Provided Educational Support for orphans through mentoring and educational resources. The initiative aimed to empower orphaned children with educational opportunities, skill development, and emotional support.', 'CED'),
('Grace Davis', 'Coordinated an Environmental Awareness Drive, conducting awareness campaigns, tree plantation events, and workshops on sustainable living. The drive aimed to instill a sense of responsibility towards the environment among community members.', 'CSED'),
('Henry Clark', 'Organized a Youth Leadership Training program to empower young individuals with leadership skills and personal development. The program included workshops, seminars, and mentoring sessions for youth empowerment.', 'ECED'),
('vvvv', 'ddd', 'CSED');

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `title` varchar(200) NOT NULL,
  `name` varchar(80) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`title`, `name`, `start`, `end`, `entity`) VALUES
('Computer Science Symposium', 'Alice Smith', '2023-03-25', '2023-03-27', 'CSED'),
('eco symposium', 'iintekhwab arham', '2024-01-11', '2024-01-23', 'CSED'),
('Electronics and Communication Summit', 'Bob Johnson', '2023-04-30', '2023-05-02', 'ECED'),
('George Harris', 'Innovation in Civil Engineering', '2023-08-20', '2023-08-22', 'CED'),
('Isabel Martinez', 'AI and Future of Technology', '2023-09-25', '2023-09-27', 'CSED'),
('Jake Robinson', 'Advancements in Electronics', '2023-10-30', '2023-11-01', 'ECED'),
('Mechanical Engineering Expo', 'David Wilson', '2023-06-10', '2023-06-12', 'MED'),
('Renewable Energy Forum', 'Charlie Brown', '2023-05-05', '2023-05-07', 'EEED'),
('Tech Innovators Conference', 'Jane Doe', '2023-02-20', '2023-02-22', 'CED');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE `consultancy` (
  `nature` varchar(80) NOT NULL,
  `organization` varchar(80) NOT NULL,
  `revenue` int(10) NOT NULL,
  `status` varchar(80) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`nature`, `organization`, `revenue`, `status`, `entity`) VALUES
('Nathan Wilson', 'Advanced Robotics Consultancy', 18000, 'In Progress', 'ECED'),
('Larry White', 'Blockchain Technology Consultancy', 25000, 'In Progress', 'CED'),
('Software Development Consultancy', 'CodeCrafters Ltd.', 25000, 'Completed', 'CSED'),
('Mia Adams', 'Data Science Solutions Consultancy', 22000, 'Completed', 'CSED'),
('Electronics Prototyping Services', 'ElectroTech Innovations', 18000, 'In Progress', 'ECED'),
('Power System Analysis Consultancy', 'PowerGrid Solutions', 22000, 'Completed', 'EEED'),
('Mechanical Design and Testing', 'Precision Engineering Solutions', 30000, 'In Progress', 'MED'),
('IT Advisory Services', 'Tech Innovate Consulting', 20000, 'In Progress', 'CED');

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `id` varchar(80) NOT NULL,
  `name` varchar(120) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`id`, `name`, `role`) VALUES
('alok@', 'alok pandey', 'admin'),
('arham_m210695ca@nitc.ac.in', 'Arham', 'admin'),
('ccd@nitc.ac.in', 'centre of ccd', 'centre'),
('CED', 'Department of Civil Engineering', 'department'),
('CSED', 'Department of Computer Science', 'department'),
('ECED', 'Department of Electronics and Communication', 'department'),
('EEED', 'Department of Electrical Engineering', 'department'),
('MED', 'Department of Mechanical Engineering', 'department');

-- --------------------------------------------------------

--
-- Table structure for table `expert_lectures`
--

CREATE TABLE `expert_lectures` (
  `staff` varchar(80) NOT NULL,
  `title` varchar(80) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `organization` varchar(80) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expert_lectures`
--

INSERT INTO `expert_lectures` (`staff`, `title`, `start`, `end`, `organization`, `entity`) VALUES
('Rachel Wilson', 'Cutting-edge Developments in Electronics', '2023-11-30', '2023-12-01', 'Electronics Innovation Forum', 'ECED'),
('Bob Johnson', 'Emerging Technologies in Electronics', '2023-05-05', '2023-05-06', 'ElectroTech Innovations', 'ECED'),
('Quincy Adams', 'Frontiers in Computer Science', '2023-10-30', '2023-10-31', 'Computer Science Association', 'CSED'),
('Jane Doe', 'Innovations in IT', '2023-02-28', '2023-03-01', 'Tech Innovate Consulting', 'CED'),
('David Wilson', 'Innovations in Mechanical Engineering', '2023-07-15', '2023-07-16', 'Mechanical Engineering Society', 'MED'),
('Alice Smith', 'Recent Trends in Machine Learning', '2023-03-30', '2023-03-31', 'AI Research Institute', 'CSED'),
('Philip Harris', 'Smart Cities and Urban Planning', '2023-09-25', '2023-09-26', 'Urban Development Council', 'CED'),
('Charlie Brown', 'Sustainable Energy Solutions', '2023-06-10', '2023-06-11', 'Renewable Energy Association', 'EEED');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Name` varchar(35) DEFAULT NULL,
  `Email` varchar(41) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Name`, `Email`) VALUES
('PRASAD KRISHNA', 'Administration'),
('Ms. Liss Annie Tom', 'arch@nitc'),
('Navya K M', 'arch@nitc'),
('BIMAL P', 'arch@nitc'),
('Ms. Aiswarya S Raj', 'arch@nitc'),
('Vivek Kumar Chenna', 'arch@nitc'),
('SHYNI.ANILKUMAR', 'arch@nitc'),
('MOHAMMED FIROZ C', 'arch@nitc'),
('Samiksha Srichandan', 'arch@nitc'),
('Ms. Dhrishya V', 'arch@nitc'),
('KIRUTHIGA K', 'arch@nitc'),
('Dr. Junaid Nabi', 'arch@nitc'),
('ABHISHEK KUMAR', 'arch@nitc'),
('Mr. Sampreet Inteti', 'arch@nitc'),
('NASEER M A', 'arch@nitc'),
('Niranjana Sajan', 'arch@nitc'),
('Ms. Navya Ann Thomas', 'arch@nitc'),
('SANIL KUMAR', 'arch@nitc'),
('Ms. Sabna M', 'arch@nitc'),
('Ms. Richu Regina S Felix', 'arch@nitc'),
('KASTURBA A K', 'arch@nitc'),
('AMRITHA P K', 'arch@nitc'),
('CHITHRA K', 'arch@nitc'),
('ANJANA BHAGYANATHAN', 'arch@nitc'),
('Ms. Azna Parveen Palakka Palliyali', 'arch@nitc'),
('Kuladeep Kumar Sadevi', 'arch@nitc'),
('A. Manoj', 'arch@nitc'),
('DEEPTHI BENDI', 'arch@nitc'),
('Ms. Harsha Hareendran', 'arch@nitc'),
('Praniti Panda', 'arch@nitc'),
('Jayasree T K', 'arch@nitc'),
('ANIL KUMAR P P', 'arch@nitc'),
('Kiriti Sahoo', 'arch@nitc'),
('Susanta Banerjee', 'arch@nitc'),
('RITESH RANJAN', 'arch@nitc'),
('Mr. Kiranjee Gandham', 'arch@nitc'),
('MD. ANAUL KABIR', 'bio@nitc'),
('TOM SKARIA', 'bio@nitc'),
('Shabina Ashraf', 'bio@nitc'),
('SAKET CHANDRA', 'bio@nitc'),
('A SANTHIAGU', 'bio@nitc'),
('RAVINDRA KUMAR', 'bio@nitc'),
('ILANILA I P', 'bio@nitc'),
('RAJASEKHARA REDDY KATREDDY', 'bio@nitc'),
('RAJANIKANT G KRISHNAMURTHY', 'bio@nitc'),
('Indumathi Sathisaran', 'bio@nitc'),
('BAIJU G NAIR', 'bio@nitc'),
('PREM RAJ P', 'bio@nitc'),
('CECIL ANTONY F', 'bio@nitc'),
('K Gopal Shankar', 'bio@nitc'),
('SURESH P S', 'bio@nitc'),
('SUCHITHRA T V', 'bio@nitc'),
('RATHINASAMY K', 'bio@nitc'),
('Bharathi Ganesan R', 'chem@nitc'),
('S BHUVANESHWARI', 'chem@nitc'),
('K HARIBABU', 'chem@nitc'),
('ASHISH SOREN', 'chem@nitc'),
('VINEESH RAVI', 'chem@nitc'),
('Debashish Panda', 'chem@nitc'),
('Divij Kishal', 'chem@nitc'),
('PANNEERSELVAM RANGANATHAN', 'chem@nitc'),
('MALLADI V PAVAN KUMAR', 'chem@nitc'),
('NOEL JACOB KALEEKKAL', 'chem@nitc'),
('Shivanandkumar Veesam', 'chem@nitc'),
('APARNA K', 'chem@nitc'),
('VAKAMALLA TEJASWI SREERAM KUMAR', 'chem@nitc'),
('SIVASUBRAMANIAN V', 'chem@nitc'),
('P SWAPNA REDDY', 'chem@nitc'),
('SUSMITA DAS', 'chem@nitc'),
('SUDEV DAS', 'chem@nitc'),
('Ahammed Sherief K Y', 'chem@nitc'),
('SUBHASIS MANDAL', 'chem@nitc'),
('Ranjith P M', 'chem@nitc'),
('M YOGESH KUMAR', 'chem@nitc'),
('PRAVEEN KUMAR G', 'chem@nitc'),
('CHANDRA SHEKAR BESTHA', 'chem@nitc'),
('DHANYA RAM V', 'chem@nitc'),
('SHINY JOSEPH', 'chem@nitc'),
('Aniruddha Sanyal', 'chem@nitc'),
('LITY ALEN VARGHESE', 'chem@nitc'),
('FATHIMA FASMIN', 'chem@nitc'),
('JANARDHAN BANOTHU', 'chemistry@nitc'),
('CHINNA AYYA SWAMY P', 'chemistry@nitc'),
('PARAMESWARAN PATTIYIL', 'chemistry@nitc'),
('ANUJ A VARGEESE', 'chemistry@nitc'),
('MINI MOL MENAMPARAMBATH', 'chemistry@nitc'),
('SUJITH A', 'chemistry@nitc'),
('SUNI VASUDEVAN', 'chemistry@nitc'),
('RAJU DEY', 'chemistry@nitc'),
('MAUSUMI CHATTOPADHYAYA', 'chemistry@nitc'),
('MUNIYANDI SANKARALINGAM', 'chemistry@nitc'),
('UNNIKRISHNAN G', 'chemistry@nitc'),
('LISA SREEJITH', 'chemistry@nitc'),
('LAKSHMI C', 'chemistry@nitc'),
('Sudha Das Khan', 'civil@nitc'),
('SANTOSH G THAMPI', 'civil@nitc'),
('Nishant Mukund Pawar', 'civil@nitc'),
('Sruthi T K', 'civil@nitc'),
('SEETHALAKSHMI P', 'civil@nitc'),
('MOHAMMED AMEEN A M', 'civil@nitc'),
('MADHAVAN K', 'civil@nitc'),
('RENJITHA MARY VARGHESE', 'civil@nitc'),
('CHANDRAKARAN S', 'civil@nitc'),
('Ranjith K', 'civil@nitc'),
('AJEESH S S', 'civil@nitc'),
('ANANTHA SINGH T S', 'civil@nitc'),
('ANIL KUMAR DASH', 'civil@nitc'),
('PRATEEK NEGI', 'civil@nitc'),
('Resmi S R', 'civil@nitc'),
('GEORGE K VARGHESE', 'civil@nitc'),
('SUDHAKUMAR J', 'civil@nitc'),
('HARIKRISHNA M', 'civil@nitc'),
('SANKAR N', 'civil@nitc'),
('Gopinath C', 'civil@nitc'),
('Prethiv Kumar R', 'civil@nitc'),
('CHITHRA N R', 'civil@nitc'),
('Pandu N', 'civil@nitc'),
('PRAMADA S K', 'civil@nitc'),
('Dr. Blessen', 'civil@nitc'),
('MINI REMANAN', 'civil@nitc'),
('SATHISH KUMAR D', 'civil@nitc'),
('HILLOL CHAKRAVARTY', 'civil@nitc'),
('T M MADHAVAN PILLAI', 'civil@nitc'),
('MUHAMED SAFEER PANDIKKADAVATH', 'civil@nitc'),
('ASWATHY E V', 'civil@nitc'),
('PRAVEEN NAGARAJAN', 'civil@nitc'),
('SAJITH A S', 'civil@nitc'),
('SHARAN KUMAR', 'civil@nitc'),
('SHASHIKALA A P', 'civil@nitc'),
('Sanjay Singh', 'civil@nitc'),
('Munavar Fairooz C', 'civil@nitc'),
('V AGILAN', 'civil@nitc'),
('K KRISHNA MURTHY', 'civil@nitc'),
('ROBIN DAVIS P', 'civil@nitc'),
('REESHA BHARAT K', 'civil@nitc'),
('JAYACHANDRAN K', 'civil@nitc'),
('M V L R ANJANEYULU', 'civil@nitc'),
('E Muthukumar', 'civil@nitc'),
('M ABDUL AKBAR', 'civil@nitc'),
('ARUNKUMAR R', 'civil@nitc'),
('Rohan Bhasker', 'civil@nitc'),
('Bhaskar S', 'civil@nitc'),
('Ganaraj K', 'civil@nitc'),
('Gaurav Misuriya', 'civil@nitc'),
('BAYYA RADHIKA', 'civil@nitc'),
('Anil Kumar', 'civil@nitc'),
('Amrutha Varma A', 'civil@nitc'),
('KODI RANGA SWAMY', 'civil@nitc'),
('VIKAS POONIA', 'civil@nitc'),
('KONDALRAJ R', 'civil@nitc'),
('ANAND K V', 'civil@nitc'),
('YOGESHWAR VIJAYKUMAR NAVANDAR', 'civil@nitc'),
('M SIVAKUMAR', 'civil@nitc'),
('ANJANA BHASI', 'civil@nitc'),
('Ms. Aiswarya K', 'cse@nitc'),
('Manjanna B', 'cse@nitc'),
('M PRABU', 'cse@nitc'),
('Santosh Kumar Behera', 'cse@nitc'),
('N SALEENA', 'cse@nitc'),
('Dr. Arif Ali A P', 'cse@nitc'),
('MANJUSHA K', 'cse@nitc'),
('Amit Praseed', 'cse@nitc'),
('Chandramani Chaudhary', 'cse@nitc'),
('VINOD P', 'cse@nitc'),
('Ms. Manisha N L', 'cse@nitc'),
('ABDUL NAZEER K A', 'cse@nitc'),
('SUMESH T A', 'cse@nitc'),
('JAYARAJ P B', 'cse@nitc'),
('HIRAN V NATH', 'cse@nitc'),
('Joe Cheri Ross', 'cse@nitc'),
('VASUDEVAN A R', 'cse@nitc'),
('RENJITH P', 'cse@nitc'),
('ANU MARY CHACKO', 'cse@nitc'),
('S SHEERAZUDDIN', 'cse@nitc'),
('Saira Shamsudheen K S', 'cse@nitc'),
('LIJIYA A', 'cse@nitc'),
('PINAPATI ANIL', 'cse@nitc'),
('POURNAMI P N', 'cse@nitc'),
('Nimmy Maria Jose', 'cse@nitc'),
('SAIDALAVI KALADY', 'cse@nitc'),
('Ms. Linsa V U', 'cse@nitc'),
('SUBHASREE M', 'cse@nitc'),
('Nirmal Kumar Boran', 'cse@nitc'),
('MADHU KUMAR S D', 'cse@nitc'),
('SUBASHINI R', 'cse@nitc'),
('RAJU HAZARI', 'cse@nitc'),
('JAY PRAKASH', 'cse@nitc'),
('A SUDARSHAN CHAKRAVARTHY', 'cse@nitc'),
('Ms. Harsha Aravind M', 'cse@nitc'),
('GOPA KUMAR G', 'cse@nitc'),
('MURALIKRISHNAN K', 'cse@nitc'),
('SRINIVASA T M', 'cse@nitc'),
('Venkatarami Reddy Chintapalli', 'cse@nitc'),
('PRIYA CHANDRAN', 'cse@nitc'),
('VENI T', 'cse@nitc'),
('PRANESH DAS', 'cse@nitc'),
('JIMMY JOSE', 'cse@nitc'),
('ARUN RAJ KUMAR P', 'cse@nitc'),
('Ashwin Jacob', 'cse@nitc'),
('Anu Maria Sebastin', 'cse@nitc'),
('Ms. Jithin Mathews', 'cse@nitc'),
('SREENU NAIK BHUKYA', 'cse@nitc'),
('VINEETH KUMAR.P', 'cse@nitc'),
('ANAND BABU N B', 'cse@nitc'),
('Chandrasekharan Praveen', 'edu@nitc'),
('Paul P I', 'edu@nitc'),
('Maneesha N', 'edu@nitc'),
('Bibin Mathew', 'edu@nitc'),
('JAGADANAND G', 'elect@nitc'),
('ANANTHAKRISHNAN P', 'elect@nitc'),
('SALY GEORGE', 'elect@nitc'),
('Surabhi K C', 'elect@nitc'),
('MIJA S J', 'elect@nitc'),
('T K SUNIL KUMAR', 'elect@nitc'),
('ASHOK S', 'elect@nitc'),
('KANAGALAKSHMI S', 'elect@nitc'),
('MITHUN MUTHIAH SAKTHIVEL', 'elect@nitc'),
('Ms. Akhila A L', 'elect@nitc'),
('HEMARANI.P', 'elect@nitc'),
('M Raghuram', 'elect@nitc'),
('Vivek Mohan', 'elect@nitc'),
('SANJAY M', 'elect@nitc'),
('Athira B P', 'elect@nitc'),
('Dr. Jerome Moses Monsingh', 'elect@nitc'),
('NASIRUL HAQUE', 'elect@nitc'),
('HARISH SUDHAKARAN NAIR', 'elect@nitc'),
('Keerthana K', 'elect@nitc'),
('Hithu Anand', 'elect@nitc'),
('Ponraj P', 'elect@nitc'),
('K V Vidyanandan', 'elect@nitc'),
('SURESH KUMAR K S', 'elect@nitc'),
('Sathiya S', 'elect@nitc'),
('PREETHA P', 'elect@nitc'),
('RAKESH R WARIER', 'elect@nitc'),
('Narendran A', 'elect@nitc'),
('RIJIL RAMCHAND', 'elect@nitc'),
('Kapil Chauhan', 'elect@nitc'),
('K M ARUN NEELIMEGHAM', 'elect@nitc'),
('Jithin Sukumaran', 'elect@nitc'),
('S KUMARAVEL', 'elect@nitc'),
('Mr. Mathews Thomas', 'elect@nitc'),
('DEEPAK M', 'elect@nitc'),
('Suman M', 'elect@nitc'),
('V KARTHIKEYAN', 'elect@nitc'),
('Dr. Athira Raju', 'elect@nitc'),
('Sini S', 'elect@nitc'),
('Haseena B A', 'elect@nitc'),
('SHIHABUDHEEN K V', 'elect@nitc'),
('Ashiq Muhammed P E', 'elect@nitc'),
('NIKHIL SASIDHARAN', 'elect@nitc'),
('Devesh Shukla', 'elect@nitc'),
('Nimal Madhu M', 'elect@nitc'),
('Dr.  Ganesh Moorthy J', 'elect@nitc'),
('Rahul Radhakrishnan', 'elect@nitc'),
('SHREELAKSHMI M P', 'elect@nitc'),
('SUNITHA K', 'elect@nitc'),
('SUNITHA R', 'elect@nitc'),
('SUKRITI TIWARI', 'elect@nitc'),
('SUBHA D PUTHANKATTIL', 'elect@nitc'),
('GOPAKUMAR PATHIRIKKAT', 'elect@nitc'),
('MUKTI BARAI', 'elect@nitc'),
('SUBHASH K M', 'elect@nitc'),
('SINDHU T K', 'elect@nitc'),
('Dr. Haseena K A', 'elect@nitc'),
('Ranjith Ravindranathan Nair', 'elect@nitc'),
('Jithin S', 'elect@nitc'),
('Ms. Sabisha Sureshbabu', 'elect@nitc'),
('ANGSHUDEEP MAJUMDAR', 'elect@nitc'),
('S.N.Deepa', 'elect@nitc'),
('JEEVAMMA JACOB', 'elect@nitc'),
('Anu Wilfred', 'elect@nitc'),
('Dr. Anjana K G', 'elect@nitc'),
('Ms. Divya P', 'elect@nitc'),
('Janesh N M', 'elect@nitc'),
('SURYA PRAKASH MATCHA', 'ece@nitc'),
('Ms. Steffy maria Joseph', 'ece@nitc'),
('VINAY JOSEPH', 'ece@nitc'),
('Ms. Anusha P', 'ece@nitc'),
('ABHISHEK MONDAL', 'ece@nitc'),
('NUJOOM SAGEER KARAT', 'ece@nitc'),
('AMEER P M', 'ece@nitc'),
('DEBJANI GOSWAMI', 'ece@nitc'),
('ANUP APREM', 'ece@nitc'),
('Arjunan M S', 'ece@nitc'),
('VENU ANAND', 'ece@nitc'),
('Sanjay Viswanath', 'ece@nitc'),
('ABHILASH G', 'ece@nitc'),
('SATHI DEVI P S', 'ece@nitc'),
('BABU A V', 'ece@nitc'),
('AKHIL P T', 'ece@nitc'),
('BINI A A', 'ece@nitc'),
('V SAKTHIVEL', 'ece@nitc'),
('Jagadeesh V K', 'ece@nitc'),
('Sruthi G S', 'ece@nitc'),
('C. PERIASAMY', 'ece@nitc'),
('SUDHISH N GEORGE', 'ece@nitc'),
('DHANARAJ K J', 'ece@nitc'),
('JAIKUMAR M G', 'ece@nitc'),
('BINDIYA T S', 'ece@nitc'),
('SURESH R', 'ece@nitc'),
('SUJA K J', 'ece@nitc'),
('LYLA B DAS', 'ece@nitc'),
('DEEPTHI P P', 'ece@nitc'),
('Dr. Najlah C P', 'ece@nitc'),
('LINTU RAJAN', 'ece@nitc'),
('ASHUTOSH MISHRA', 'ece@nitc'),
('RAKESH R T', 'ece@nitc'),
('SAMEER S M', 'ece@nitc'),
('PRAVEEN SANKARAN', 'ece@nitc'),
('SUDEEP P V', 'ece@nitc'),
('Nisanth A', 'ece@nitc'),
('Anjitha V', 'ece@nitc'),
('GANGIREDDY NARENDRA KUMAR REDDY', 'ece@nitc'),
('ASWATHI R NAIR', 'ece@nitc'),
('RAGHU C V', 'ece@nitc'),
('SAIKAT CHANDRA BAKSHI', 'ece@nitc'),
('JAYAKUMAR E P', 'ece@nitc'),
('B BHUVAN', 'ece@nitc'),
('C K Ambili', 'ece@nitc'),
('CHANDAN YADAV', 'ece@nitc'),
('LALIT KUMAR', 'ece@nitc'),
('SREELEKHA G', 'ece@nitc'),
('GOPI KRISHNA SARAMEKALA', 'ece@nitc'),
('Manisha Prafulla Parlewar', 'ece@nitc'),
('SRINIVASARAO CHINTAGUNTA', 'ece@nitc'),
('WAQUAR  AHMAD', 'ece@nitc'),
('Jobin Francis', 'ece@nitc'),
('JAILSINGH BHOOKYA', 'ece@nitc'),
('CHITHIRA P R', 'ece@nitc'),
('Gaurav Siddharth', 'ece@nitc'),
('Nikhil Kumar C.S.', 'ece@nitc'),
('PREETI NAVANEETH', 'arts@nitc'),
('SUNITHA S', 'arts@nitc'),
('Vrinda Varma', 'arts@nitc'),
('REJU GEORGE MATHEW', 'arts@nitc'),
('T K SURESH BABU', 'arts@nitc'),
('J RAJESH', 'mgmt@nitc'),
('ALTHAF S', 'mgmt@nitc'),
('MUHAMMAD SHAFI K', 'mgmt@nitc'),
('Dr. Nidhi Yadav', 'mgmt@nitc'),
('Ms. C Krishna Priya', 'mgmt@nitc'),
('Bency Antony', 'mgmt@nitc'),
('SREEJITH S S', 'mgmt@nitc'),
('Rahul A Nair', 'mgmt@nitc'),
('Ms. Sreerekha S', 'mgmt@nitc'),
('Gopika P G', 'mgmt@nitc'),
('Elizabeth Eldho', 'mgmt@nitc'),
('ARJUN ANIL KUMAR', 'mgmt@nitc'),
('S Ramamoorthy', 'mgmt@nitc'),
('Dr. Malabika Biswas', 'mgmt@nitc'),
('NITHYA M', 'mgmt@nitc'),
('Sivadasan T M', 'mgmt@nitc'),
('MANJU MAHIPALAN', 'mgmt@nitc'),
('Sreekanth V K', 'mgmt@nitc'),
('S Saravana Kumar', 'mgmt@nitc'),
('Ameen Omar Shareef', 'mgmt@nitc'),
('K Neethu Tilakan', 'mgmt@nitc'),
('VINOD ERKKARA MADHAVAN', 'material@nitc'),
('C N SHYAM KUMAR', 'material@nitc'),
('SAJITH V', 'material@nitc'),
('Dr. Harish S', 'material@nitc'),
('Arpita Srivastava', 'material@nitc'),
('Devadas Bhat P', 'material@nitc'),
('HANAS T', 'material@nitc'),
('Dr. Lakshmi V Nair', 'material@nitc'),
('Jeetu S Babu', 'material@nitc'),
('APARNA ZAGABATHUNI', 'material@nitc'),
('T Suresh Kumar Telagathot', 'material@nitc'),
('SONEY VARGHESE', 'material@nitc'),
('Dr. Dinoop Lal S', 'material@nitc'),
('Haritha H', 'material@nitc'),
('Praseetha K P', 'material@nitc'),
('C B SOBHAN', 'material@nitc'),
('SHIJO THOMAS', 'material@nitc'),
('N SANDHYARANI', 'material@nitc'),
('SUNIL JACOB JOHN', 'math@nitc'),
('SEKHAR GHOSH', 'math@nitc'),
('LINEESH M C', 'math@nitc'),
('Chiranjit Ray', 'math@nitc'),
('Gokulraj S', 'math@nitc'),
('Mr. Murugan D', 'math@nitc'),
('TAMAL PRAMANICK', 'math@nitc'),
('CHITHRA A V', 'math@nitc'),
('Aswin G S', 'math@nitc'),
('SATYANANDA PANDA', 'math@nitc'),
('Muhammed Navas T', 'math@nitc'),
('VIBHUTI ARORA', 'math@nitc'),
('Dr. Manidipa Pal', 'math@nitc'),
('Dr. R Ashok', 'math@nitc'),
('Dr. Nazim Khan', 'math@nitc'),
('SURESH KUMAR NADUPURI', 'math@nitc'),
('SUSHAMA C M', 'math@nitc'),
('Muhammed Saeed K', 'math@nitc'),
('Saudamini Nayak', 'math@nitc'),
('SUNIL MATHEW', 'math@nitc'),
('ASHISH AWASTHI', 'math@nitc'),
('R VIJAYAKUMAR', 'math@nitc'),
('Nazia Urus', 'math@nitc'),
('MAHESH KUMAR', 'math@nitc'),
('Barkha', 'math@nitc'),
('Dr. Brinda R K', 'math@nitc'),
('Athira T M', 'math@nitc'),
('NAZIM KHAN', 'math@nitc'),
('SUDHANSU SEKHAR ROUT', 'math@nitc'),
('Ms. Maryam Mohiuddin', 'math@nitc'),
('DEEPESH K P', 'math@nitc'),
('Praveen M', 'math@nitc'),
('Abhay Kumar Chaturvedi', 'math@nitc'),
('Sunil Das', 'math@nitc'),
('SANJAY P K', 'math@nitc'),
('KRISHNAN PARAMASIVAM', 'math@nitc'),
('JACOB M J', 'math@nitc'),
('NEETU GARG', 'math@nitc'),
('R ASHOK', 'math@nitc'),
('Geethika Sebastian', 'math@nitc'),
('M S SUNITHA', 'math@nitc'),
('Palpandi K', 'math@nitc'),
('JAYADEEP U B', 'mech@nitc'),
('Arindam Bhattacharjee', 'mech@nitc'),
('Pranesh Dutta', 'mech@nitc'),
('Anoop K P', 'mech@nitc'),
('Nitinkumar Dahyabhai Banker', 'mech@nitc'),
('Soumya Mukherjee', 'mech@nitc'),
('SREENATH A M', 'mech@nitc'),
('SANDIP RUDHA BUDHE', 'mech@nitc'),
('ROHINIKUMAR B', 'mech@nitc'),
('A V S S H SRAVAN KUMAR', 'mech@nitc'),
('P K RAJENDRA KUMAR', 'mech@nitc'),
('Pradeepmon T G', 'mech@nitc'),
('R PRABHU SEKAR', 'mech@nitc'),
('Vijaya Kumar K', 'mech@nitc'),
('Dr. Manuel Thomas', 'mech@nitc'),
('Mr. Rama Kurthi Veera Babu', 'mech@nitc'),
('R SRIDHARAN', 'mech@nitc'),
('BASIL KURIACHEN', 'mech@nitc'),
('JAGADEESHA T', 'mech@nitc'),
('K SEKAR', 'mech@nitc'),
('ASHESH SAHA', 'mech@nitc'),
('SALEEL ISMAIL', 'mech@nitc'),
('MOKALLA SRINIVAS', 'mech@nitc'),
('SUDHEER A P', 'mech@nitc'),
('VINEESH K P', 'mech@nitc'),
('NIDHI BARANWAL', 'mech@nitc'),
('MURALI K P', 'mech@nitc'),
('JOY M L', 'mech@nitc'),
('A SHAIJA', 'mech@nitc'),
('ARUN S', 'mech@nitc'),
('JOSEPH M A', 'mech@nitc'),
('RATNA KUMAR K', 'mech@nitc'),
('DEEPAK LAWRENCE K', 'mech@nitc'),
('Sharu B K', 'mech@nitc'),
('SUMER BHARAT DIRBUDE', 'mech@nitc'),
('Dr. Sasikumar A', 'mech@nitc'),
('Johns Joseph', 'mech@nitc'),
('Jogendra Jangre', 'mech@nitc'),
('P V MANU', 'mech@nitc'),
('Mirzaul Karim Hussain', 'mech@nitc'),
('T J SARVOTHTHAMA JOTHI', 'mech@nitc'),
('JOSE MATHEW', 'mech@nitc'),
('George Rapheal', 'mech@nitc'),
('DEVENDRA KUMAR YADAV', 'mech@nitc'),
('Subrata Bhowmik', 'mech@nitc'),
('VINAY V PANICKER', 'mech@nitc'),
('S Sachin', 'mech@nitc'),
('Mohammed Rashad K', 'mech@nitc'),
('Subramani N', 'mech@nitc'),
('Alok Kumar Samanta', 'mech@nitc'),
('Pranay Vinayak Likhar', 'mech@nitc'),
('JINU PAUL', 'mech@nitc'),
('SANJEEV KUMAR MANJHI', 'mech@nitc'),
('Sai Saketha Chandra Athkuri', 'mech@nitc'),
('Allen Anilkumar', 'mech@nitc'),
('AMIT KUMAR RAI', 'mech@nitc'),
('SAJAN T JOHN', 'mech@nitc'),
('VIKASH KUMAR', 'mech@nitc'),
('MADHUSUDANAN PILLAI V', 'mech@nitc'),
('NARAYANAN M D', 'mech@nitc'),
('Savio Sebastian K', 'mech@nitc'),
('G VARAPRASAD', 'mech@nitc'),
('Dr.Gautam Kumar', 'mech@nitc'),
('Jithin M', 'mech@nitc'),
('Shebeer A Rahim', 'mech@nitc'),
('Amit Kumar Singh', 'mech@nitc'),
('SIMON PETER', 'mech@nitc'),
('JACOB KOSHY MULAMOOTIL', 'mech@nitc'),
('Muhammed Niyas M', 'mech@nitc'),
('GANGADHARA KIRAN KUMAR LACHIREDDI', 'mech@nitc'),
('ILANGO M', 'mech@nitc'),
('Arun Babu Kizhakkiniyakathu', 'mech@nitc'),
('MANU R', 'mech@nitc'),
('BIJU T KUZHIVELI', 'mech@nitc'),
('VIJAYARAJ K', 'mech@nitc'),
('T RADHA RAMANAN', 'mech@nitc'),
('DHANISH P B', 'mech@nitc'),
('SUJITH KUMAR C S', 'mech@nitc'),
('Sangeeth K', 'mech@nitc'),
('VINOD KUMAR SHARMA', 'mech@nitc'),
('ARUN P', 'mech@nitc'),
('SUNIL M S', 'phedu@nitc'),
('RAM AJOR MAURYA', 'physics@nitc'),
('GOUTAM KUMAR CHANDRA', 'physics@nitc'),
('ANOOP VARGHESE', 'physics@nitc'),
('P N BALA SUBRAMANIAN', 'physics@nitc'),
('NATESAN YOGESH', 'physics@nitc'),
('AJI A ANAPPARA', 'physics@nitc'),
('SHAREEF M', 'physics@nitc'),
('RAVI VARMA MUNDAKKARA KOVILAKAM', 'physics@nitc'),
('MADHAVAN UNNI P K', 'physics@nitc'),
('Dr. P Muhammed Shafi', 'physics@nitc'),
('Rajesh Mondal', 'physics@nitc'),
('Haris M K', 'physics@nitc'),
('SAURABH GUPTA', 'physics@nitc'),
('MANEESH CHANDRAN', 'physics@nitc'),
('RAMAN NAMBOODIRI C K', 'physics@nitc'),
('ANIRBAN SARKAR', 'physics@nitc'),
('SUCHAND SANGEETH C S', 'physics@nitc'),
('BISWAJIT MANDAL', 'physics@nitc'),
('CHANDRASEKHARAN K', 'physics@nitc'),
('SREERAJ T P', 'physics@nitc'),
('VARI SIVAJI REDDY', 'physics@nitc'),
('ASWATHI G', 'physics@nitc'),
('RAGHU CHATANATHODY', 'physics@nitc'),
('SUBRAMANYAN NAMBOODIRI VARANAKKOTTU', 'physics@nitc'),
('SAYANI CHATTERJEE', 'physics@nitc'),
('PREDEEP P', 'physics@nitc');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_qualification`
--

CREATE TABLE `faculty_qualification` (
  `name` varchar(80) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `institute` varchar(80) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_qualification`
--

INSERT INTO `faculty_qualification` (`name`, `qualification`, `institute`, `entity`) VALUES
('Alice Smith', 'Ph.D. in Electrical Engineering', 'ElectroTech Institute', 'CSED'),
('Bob Johnson', 'Ph.D. in Electronics and Communication', 'Institute of Electronics', 'ECED'),
('Charlie Brown', 'Ph.D. in Electrical Engineering', 'Renewable Energy University', 'EEED'),
('David Wilson', 'Ph.D. in Mechanical Engineering', 'Mechanical Excellence Institute', 'MED'),
('Frank Miller', 'Masters in Civil Engineering', 'Civil Engineers Academy', 'CED'),
('Henry Clark', 'Masters in Electronics Engineering', 'Electronics Innovators School', 'ECED'),
('Jane Doe', 'Ph.D. in Computer Science', 'Tech Innovate University', 'CED');

-- --------------------------------------------------------

--
-- Table structure for table `other_services`
--

CREATE TABLE `other_services` (
  `staff` varchar(80) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_services`
--

INSERT INTO `other_services` (`staff`, `title`, `entity`) VALUES
('Jane Doe', 'Coordinated Cultural Fest - \"Expressions\"', 'CED'),
('Alice Smith', 'Initiated Coding Bootcamp for students', 'CSED'),
('Bob Johnson', 'Hosted Hackathon - \"Code Challenge 2023\"', 'ECED'),
('Charlie Brown', 'Conducted Energy Conservation Workshop', 'EEED'),
('David Wilson', 'Facilitated Mechanical Design Seminar', 'MED'),
('Larry White', 'Organized Civil Engineering Expo', 'CED'),
('Mia Adams', 'Supported Computer Science Symposium', 'CSED'),
('Nathan Wilson', 'Promoted Electronics and Communication Summit', 'ECED');

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE `patents` (
  `staff` varchar(80) NOT NULL,
  `title` varchar(800) NOT NULL,
  `year` varchar(80) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patents`
--

INSERT INTO `patents` (`staff`, `title`, `year`, `entity`) VALUES
('Jane Doe', 'Automated Code Review System', '2023', 'CED'),
('Alice Smith', 'Wireless Energy Transmission Technology', '2023', 'CSED'),
('Bob Johnson', 'Flexible OLED Display Technology', '2023', 'ECED'),
('Charlie Brown', 'Hybrid Renewable Energy System', '2023', 'EEED'),
('David Wilson', 'Advanced Gearless Transmission System', '2023', 'MED'),
('Larry White', 'Blockchain-based Urban Planning System', '2023', 'CED'),
('Mia Adams', 'Intelligent Traffic Control System', '2023', 'CSED'),
('Nathan Wilson', 'Autonomous Drone Delivery Mechanism', '2023', 'ECED'),
('bnbnbn', 'Δ', '2222 ', 'CSED');

-- --------------------------------------------------------

--
-- Table structure for table `student_achievements`
--

CREATE TABLE `student_achievements` (
  `name` varchar(80) NOT NULL,
  `achievement` varchar(800) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_achievements`
--

INSERT INTO `student_achievements` (`name`, `achievement`, `entity`) VALUES
('Jane Doe', 'Winner of Inter-College Coding Competition', 'CED'),
('Alice Smith', 'Published Research Paper in Top Computer Science Journal', 'CSED'),
('Bob Johnson', 'First Prize in Electronics Project Expo', 'ECED'),
('Charlie Brown', 'Champion of Energy Conservation Challenge', 'EEED'),
('David Wilson', 'Excellence in Mechanical Engineering Design Competition', 'MED'),
('Oscar Harris', 'Entrepreneurship Challenge Winner', 'CED'),
('Pamela Robinson', 'Data Science Hackathon Champion', 'CSED'),
('Quentin Adams', 'Outstanding Achievement in Robotics Competition', 'ECED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_services`
--
ALTER TABLE `community_services`
  ADD UNIQUE KEY `title` (`title`) USING HASH;

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD UNIQUE KEY `organization` (`organization`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert_lectures`
--
ALTER TABLE `expert_lectures`
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `faculty_qualification`
--
ALTER TABLE `faculty_qualification`
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `other_services`
--
ALTER TABLE `other_services`
  ADD UNIQUE KEY `title` (`title`) USING HASH;

--
-- Indexes for table `patents`
--
ALTER TABLE `patents`
  ADD UNIQUE KEY `title` (`title`) USING HASH;

--
-- Indexes for table `student_achievements`
--
ALTER TABLE `student_achievements`
  ADD UNIQUE KEY `achievement` (`achievement`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
