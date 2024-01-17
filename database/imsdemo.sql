-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 04:35 PM
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
  `entity` varchar(120) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_services`
--

INSERT INTO `community_services` (`staff`, `title`, `entity`, `date`) VALUES
('John Doe', 'Architectural Workshop: Designing Spaces for All', 'arch@nitc', '2024-01-17'),
('Jane Smith', 'Community Heritage Preservation: Our Past for the Future', 'arch@nitc', '2024-02-01'),
('Alice Johnson', 'Art Exhibition: Celebrating Local Talent', 'arts@nitc', '2024-03-10'),
('Bob Williams', 'Community Theater Project: Bringing Stories to Life', 'arts@nitc', '2024-04-05'),
('Charlie Brown', 'Environmental Cleanup: Greening Our Neighborhood', 'bio@nitc', '2024-05-20'),
('David Lee', 'Health Awareness Campaign: Promoting Wellness Together', 'bio@nitc', '2024-06-15'),
('Eva Martinez', 'Career Guidance Seminar: Empowering Futures', 'ccd@nitc.ac.in', '2024-07-30'),
('Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'ccd@nitc.ac.in', '2024-08-25'),
('Grace Taylor', 'Chemistry Outreach Program: Inspiring Curiosity in Science', 'chem@nitc', '2024-09-09'),
('Harry Anderson', 'STEM Education Initiative: Building Tomorrow\'s Innovators', 'chem@nitc', '2024-10-14'),
('Ivy Rodriguez', 'Civil Engineering Outreach: Building Bridges to the Future', 'civil@nitc', '2025-01-08'),
('Jake White', 'Community Engagement in Arts: Fostering Creativity Together', 'civil@nitc', '2025-02-02'),
('Karen Young', 'Computer Science Education Drive: Nurturing Future Tech Leaders', 'cse@nitc', '2025-03-18'),
('Leo Miller', 'Community Sports Event: Promoting Active Lifestyles', 'cse@nitc', '2025-04-13'),
('Mia Davis', 'Electrical Engineering Outreach: Powering Community Connections', 'elect@nitc', '2025-05-28'),
('Noah Wilson', 'Community Education in Electronics: Empowering Minds', 'elect@nitc', '2025-06-23'),
('Olivia Moore', 'ECE Community Initiative: Connecting Through Technology', 'ece@nitc', '2025-07-08'),
('Peter Adams', 'Arts Appreciation Workshop: Unleashing Creative Expressions', 'ece@nitc', '2025-08-03'),
('Quincy Thomas', 'Education for All: Bridging Gaps in Learning', 'edu@nitc', '2025-09-18'),
('Rachel Clark', 'Empowering through Education: A Path to Brighter Futures', 'edu@nitc', '2025-10-13'),
('Samuel Turner', 'Electrical Engineering Outreach: Illuminating Minds Together', 'elect@nitc', '2025-11-28'),
('Sophia Harris', 'Environment Conservation Drive: Sustaining Our Ecosystem', 'elect@nitc', '2025-12-23'),
('Tom King', 'Materials Science Exhibition: Exploring Innovations', 'material@nitc', '2026-01-07'),
('Ursula Walker', 'Mathematics Outreach: Unraveling the Wonders of Numbers', 'math@nitc', '2026-02-01'),
('Vince Scott', 'Mechanical Engineering Workshop: Unveiling Engineering Marvels', 'mech@nitc', '2026-03-17'),
('Wendy Hall', 'Management Studies Seminar: Shaping Future Leaders', 'mgmt@nitc', '2026-04-12'),
('Xander Turner', 'Physical Education Day: Fostering Healthy Lifestyles', 'phedu@nitc', '2026-05-27'),
('Yvonne Baker', 'Physics Education Program: Exploring the World of Forces', 'physics@nitc', '2026-06-22');

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
('Adult Education Summit', 'Quincy Thomas', '2025-09-25', '2025-09-27', 'edu@nitc'),
('Architecture Summit 2024', 'John Doe', '2024-01-25', '2024-01-28', 'arch@nitc'),
('Art and Community Symposium', 'Alice Johnson', '2024-03-25', '2024-03-27', 'arts@nitc'),
('Arts and Culture Festival Symposium', 'Jake White', '2025-02-01', '2025-02-03', 'civil@nitc'),
('Arts and Music Education Conference', 'Peter Adams', '2025-08-10', '2025-08-12', 'ece@nitc'),
('Biodiversity Conservation Forum', 'Charlie Brown', '2024-06-01', '2024-06-03', 'bio@nitc'),
('Civil Engineering Innovation Summit', 'Ivy Rodriguez', '2025-01-15', '2025-01-18', 'civil@nitc'),
('Community Leadership Seminar', 'Wendy Hall', '2026-04-01', '2026-04-03', 'mgmt@nitc'),
('Community Library Conference', 'Rachel Clark', '2025-10-10', '2025-10-12', 'edu@nitc'),
('Computer Science Education Summit', 'Karen Young', '2025-03-25', '2025-03-27', 'cse@nitc'),
('Creative Expression Forum', 'Bob Williams', '2024-04-10', '2024-04-12', 'arts@nitc'),
('Digital Learning Conference', 'Frank Davis', '2024-08-20', '2024-08-22', 'ccd@nitc.ac.in'),
('ECE Robotics Symposium', 'Olivia Moore', '2025-07-25', '2025-07-27', 'ece@nitc'),
('Educational Development Summit', 'Eva Martinez', '2024-08-01', '2024-08-03', 'ccd@nitc.ac.in'),
('Electrical Engineering Innovation Summit', 'Mia Davis', '2025-06-01', '2025-06-03', 'elect@nitc'),
('Electrical Engineering Training Summit', 'Samuel Turner', '2025-11-25', '2025-11-27', 'elect@nitc'),
('Environmental Conservation Conference', 'Sophia Harris', '2025-12-10', '2025-12-12', 'elect@nitc'),
('Materials Science Innovation Summit', 'Tom King', '2026-01-15', '2026-01-18', 'material@nitc'),
('Mathematics Enrichment Conference', 'Ursula Walker', '2026-02-01', '2026-02-03', 'math@nitc'),
('Mechanical Engineering Outreach Summit', 'Vince Scott', '2026-03-15', '2026-03-18', 'mech@nitc'),
('Physical Education and Fitness Conference', 'Xander Turner', '2026-05-25', '2026-05-27', 'phedu@nitc'),
('Physics Education and Science Exploration Symposium', 'Yvonne Baker', '2026-06-10', '2026-06-12', 'physics@nitc'),
('Science Education Conference', 'Grace Taylor', '2024-09-15', '2024-09-18', 'chem@nitc'),
('STEM Education Symposium', 'Harry Anderson', '2024-10-01', '2024-10-03', 'chem@nitc'),
('Technology Access Conference', 'Leo Miller', '2025-04-10', '2025-04-12', 'cse@nitc'),
('Technology Fair and Expo', 'Noah Wilson', '2025-06-15', '2025-06-17', 'elect@nitc'),
('Urban Planning Conference', 'Jane Smith', '2024-02-10', '2024-02-12', 'arch@nitc'),
('Wellness and Health Conference', 'David Lee', '2024-06-15', '2024-06-17', 'bio@nitc');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE `consultancy` (
  `nature` varchar(80) NOT NULL,
  `organization` varchar(80) NOT NULL,
  `revenue` int(10) NOT NULL,
  `status` varchar(80) NOT NULL,
  `entity` varchar(120) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`nature`, `organization`, `revenue`, `status`, `entity`, `date`) VALUES
('Arts and Culture', 'Cultural Harmony Society', 70000, 'Active', 'material@nitc', '2024-10-14'),
('Science Education', 'Curious Minds Foundation', 70000, 'Active', 'physics@nitc', '2025-05-28'),
('Engineering Excellence', 'Engineering Marvels Institute', 80000, 'Active', 'mech@nitc', '2025-02-02'),
('Physical Fitness', 'FitLife Foundation', 75000, 'Active', 'phedu@nitc', '2025-04-13'),
('Environmental Conservation', 'Green Initiatives Organization', 50000, 'Active', 'arch@nitc', '2024-01-17'),
('Health and Wellness', 'Healthy Living Foundation', 55000, 'Active', 'chem@nitc', '2024-05-20'),
('Social Impact', 'Impactful Change Foundation', 75000, 'Active', 'edu@nitc', '2024-08-25'),
('Technology and Innovation', 'InnoTech Hub', 55000, 'Active', 'math@nitc', '2025-01-08'),
('STEM Education', 'Innovate for Tomorrow', 70000, 'Active', 'cse@nitc', '2024-06-15'),
('Leadership Development', 'Leadership Institute', 60000, 'Active', 'mgmt@nitc', '2025-03-18'),
('Community Development', 'Local Empowerment Network', 75000, 'Active', 'arts@nitc', '2024-02-01'),
('Community Services', 'ServeLocal NGO', 65000, 'Active', 'elect@nitc', '2024-09-09'),
('Digital Inclusion', 'TechConnect Foundation', 80000, 'Active', 'ccd@nitc.ac.in', '2024-04-05'),
('Education and Training', 'TechSkills Academy', 60000, 'Active', 'bio@nitc', '2024-03-10'),
('Youth Empowerment', 'YouthLeaders Organization', 60000, 'Active', 'ece@nitc', '2024-07-30');

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
('arch@nitc', 'Department of Architecture', 'department'),
('arham_m210695ca@nitc.ac.in', 'Arham', 'admin'),
('arts@nitc', 'Humanities', 'department'),
('bio@nitc', 'Department of Biotechnology', 'department'),
('ccd@nitc.ac.in', 'centre of ccd', 'centre'),
('chem@nitc', 'Department of Chemical Engineering', 'department'),
('chemistry@nitc', 'Chemistry', 'department'),
('civil@nitc', 'Department of Civil Engineering', 'department'),
('cse@nitc', 'Department of Computer Science and Engineering', 'department'),
('ece@nitc', 'Department of Electronics and Communication Engineering', 'department'),
('edu@nitc', 'Education', 'department'),
('elect@nitc', 'Department of Electrical Engineering', 'department'),
('material@nitc', 'Department of Materials Science and Engineering', 'department'),
('math@nitc', 'Mathematics', 'department'),
('mech@nitc', 'Department of Mechanical Engineering', 'department'),
('mgmt@nitc', 'Management Studies', 'department'),
('phedu@nitc', 'Physical Education', 'department'),
('physics@nitc', 'Department of Physics', 'department');

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
('David Wilson', 'Advancements in Biology Research', '2024-06-05', '2024-06-10', 'BioTech Innovations', 'bio@nitc'),
('Ethan Davis', 'Art and Culture Preservation', '2024-04-20', '2024-04-25', 'Creative Connections', 'arts@nitc'),
('Diana Turner', 'Biodiversity Conservation Initiatives', '2024-06-20', '2024-06-25', 'Nature Preservation Society', 'bio@nitc'),
('Emily Johnson', 'Community Development Best Practices', '2024-03-15', '2024-03-20', 'Local Empowerment Network', 'arts@nitc'),
('Sara Brown', 'Digital Literacy for Social Inclusion', '2024-08-01', '2024-08-05', 'TechConnect Foundation', 'ccd@nitc.ac.in'),
('John Smith', 'Environmental Conservation Strategies', '2024-01-20', '2024-01-25', 'Green Initiatives Organization', 'arch@nitc'),
('Alice Miller', 'Innovations in STEM Education', '2024-09-20', '2024-09-25', 'Future Innovators Society', 'cse@nitc'),
('Samuel Taylor', 'Online Learning Platforms for Education', '2024-08-20', '2024-08-25', 'EduTech Solutions', 'ccd@nitc.ac.in'),
('Alex Turner', 'Promoting Health and Wellness in Communities', '2024-09-05', '2024-09-10', 'Healthy Living Foundation', 'chem@nitc'),
('Jane Williams', 'Sustainable Architecture Innovations', '2024-02-05', '2024-02-10', 'EcoBuilders Association', 'arch@nitc');

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
  `entity` varchar(120) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_qualification`
--

INSERT INTO `faculty_qualification` (`name`, `qualification`, `institute`, `entity`, `date`) VALUES
('Dr. Alice Johnson', 'Ph.D. in Fine Arts', 'Creative Arts Academy', 'arts@nitc', '2024-03-10'),
('Dr. Charlie Brown', 'Ph.D. in Environmental Science', 'Green Earth University', 'bio@nitc', '2024-05-20'),
('Dr. Frank Davis', 'Masters in Digital Learning Technologies', 'TechEd University', 'ccd@nitc.ac.in', '2024-08-25'),
('Dr. Grace Taylor', 'Ph.D. in Chemistry', 'Chemical Sciences Institute', 'chem@nitc', '2024-09-09'),
('Dr. Jake White', 'Masters in Arts and Culture Studies', 'Cultural Heritage University', 'civil@nitc', '2025-02-02'),
('Dr. Jane Smith', 'Masters in Architectural Design', 'Urban Institute of Technology', 'arch@nitc', '2024-02-01'),
('Dr. Karen Young', 'Ph.D. in Computer Science', 'TechGenius Institute', 'cse@nitc', '2025-03-18'),
('Dr. Mia Davis', 'Ph.D. in Electrical Engineering', 'Electric Innovations University', 'elect@nitc', '2025-05-28'),
('Dr. Peter Adams', 'Masters in Arts Education', 'Creative Minds Academy', 'ece@nitc', '2025-08-03'),
('Dr. Quincy Thomas', 'Ph.D. in Education', 'Education Excellence Institute', 'edu@nitc', '2025-09-18'),
('Dr. Sophia Harris', 'Masters in Environmental Science', 'Environmental Research Center', 'elect@nitc', '2025-12-23'),
('Dr. Ursula Walker', 'Masters in Mathematics Education', 'Mathematics Excellence School', 'math@nitc', '2026-02-01'),
('Dr. Vince Scott', 'Ph.D. in Mechanical Engineering', 'Mechanical Innovations College', 'mech@nitc', '2026-03-17'),
('Dr. Yvonne Baker', 'Masters in Physics Education', 'Physics Education Center', 'physics@nitc', '2026-06-22'),
('Prof. Bob Williams', 'Masters in Performing Arts', 'National Theater School', 'arts@nitc', '2024-04-05'),
('Prof. David Lee', 'Masters in Public Health', 'Wellness Institute', 'bio@nitc', '2024-06-15'),
('Prof. Eva Martinez', 'Ph.D. in Education', 'Educational Excellence Center', 'ccd@nitc.ac.in', '2024-07-30'),
('Prof. Harry Anderson', 'Masters in STEM Education', 'STEM Innovators College', 'chem@nitc', '2024-10-14'),
('Prof. Ivy Rodriguez', 'Ph.D. in Civil Engineering', 'Engineering Excellence Institute', 'civil@nitc', '2025-01-08'),
('Prof. John Doe', 'Ph.D. in Architecture', 'Green University', 'arch@nitc', '2024-01-17'),
('Prof. Leo Miller', 'Masters in Technology Management', 'TechLeaders School', 'cse@nitc', '2025-04-13'),
('Prof. Noah Wilson', 'Masters in Technology and Society', 'TechInnovate College', 'elect@nitc', '2025-06-23'),
('Prof. Olivia Moore', 'Ph.D. in Electronics and Communication', 'Communication Technologies Institute', 'ece@nitc', '2025-07-08'),
('Prof. Rachel Clark', 'Masters in Library Science', 'Community Learning Center', 'edu@nitc', '2025-10-13'),
('Prof. Samuel Turner', 'Ph.D. in Electrical Engineering', 'TechMasters Institute', 'elect@nitc', '2025-11-28'),
('Prof. Tom King', 'Ph.D. in Materials Science', 'Materials Innovations Institute', 'material@nitc', '2026-01-07'),
('Prof. Wendy Hall', 'Masters in Management Studies', 'Management Excellence Institute', 'mgmt@nitc', '2026-04-12'),
('Prof. Xander Turner', 'Ph.D. in Physical Education', 'Fitness and Wellness University', 'phedu@nitc', '2026-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `other_services`
--

CREATE TABLE `other_services` (
  `staff` varchar(80) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `entity` varchar(120) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_services`
--

INSERT INTO `other_services` (`staff`, `title`, `entity`, `date`) VALUES
('John Doe', 'Architectural Consultation for Community Projects', 'arch@nitc', '2024-01-17'),
('Jane Smith', 'Urban Planning Workshop for Sustainable Living', 'arch@nitc', '2024-02-01'),
('Alice Johnson', 'Community Art Installation and Beautification', 'arts@nitc', '2024-03-10'),
('Bob Williams', 'Public Space Renovation and Creative Expression', 'arts@nitc', '2024-04-05'),
('Charlie Brown', 'Ecological Survey and Biodiversity Conservation', 'bio@nitc', '2024-05-20'),
('David Lee', 'Health and Wellness Program Implementation', 'bio@nitc', '2024-06-15'),
('Eva Martinez', 'Professional Development Workshops for Students', 'ccd@nitc.ac.in', '2024-07-30'),
('Frank Davis', 'Online Learning Platform Development', 'ccd@nitc.ac.in', '2024-08-25'),
('Grace Taylor', 'Science Education Outreach in Local Schools', 'chem@nitc', '2024-09-09'),
('Harry Anderson', 'STEM Mentorship Program for Students', 'chem@nitc', '2024-10-14'),
('Ivy Rodriguez', 'Civil Engineering Infrastructure Assessment', 'civil@nitc', '2025-01-08'),
('Jake White', 'Community Arts and Culture Festival Coordination', 'civil@nitc', '2025-02-02'),
('Karen Young', 'Computer Science Coding Bootcamp for Kids', 'cse@nitc', '2025-03-18'),
('Leo Miller', 'Community Technology Access Center Establishment', 'cse@nitc', '2025-04-13'),
('Mia Davis', 'Electrical Engineering Innovation Challenge', 'elect@nitc', '2025-05-28'),
('Noah Wilson', 'Community Technology Fair Organization', 'elect@nitc', '2025-06-23'),
('Olivia Moore', 'ECE Robotics Workshop for Local Schools', 'ece@nitc', '2025-07-08'),
('Peter Adams', 'Community Arts and Music Education Program', 'ece@nitc', '2025-08-03'),
('Quincy Thomas', 'Adult Education Program for Skill Enhancement', 'edu@nitc', '2025-09-18'),
('Rachel Clark', 'Community Library Setup and Book Donation Drive', 'edu@nitc', '2025-10-13'),
('Samuel Turner', 'Electrical Engineering Practical Training Sessions', 'elect@nitc', '2025-11-28'),
('Sophia Harris', 'Environmental Conservation and Cleanup Campaign', 'elect@nitc', '2025-12-23'),
('Tom King', 'Materials Science Innovation Showcase', 'material@nitc', '2026-01-07'),
('Ursula Walker', 'Mathematics Enrichment Program for Students', 'math@nitc', '2026-02-01'),
('Vince Scott', 'Mechanical Engineering Outreach for School Students', 'mech@nitc', '2026-03-17'),
('Wendy Hall', 'Management Studies Community Leadership Seminar', 'mgmt@nitc', '2026-04-12'),
('Xander Turner', 'Physical Education and Fitness Workshop', 'phedu@nitc', '2026-05-27'),
('Yvonne Baker', 'Physics Education and Science Exploration Camp', 'physics@nitc', '2026-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE `patents` (
  `staff` varchar(80) NOT NULL,
  `title` varchar(800) NOT NULL,
  `date` date DEFAULT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patents`
--

INSERT INTO `patents` (`staff`, `title`, `date`, `entity`) VALUES
('Prof. John Doe', 'Innovative Architectural Design', '2024-01-20', 'arch@nitc'),
('Dr. Jane Smith', 'Sustainable Urban Planning Method', '2024-02-05', 'arch@nitc'),
('Dr. Alice Johnson', 'Interactive Art Installation System', '2024-03-15', 'arts@nitc'),
('Prof. Bob Williams', 'Community Theater Engagement Platform', '2024-04-20', 'arts@nitc'),
('Dr. Charlie Brown', 'Biodiversity Conservation Algorithm', '2024-06-05', 'bio@nitc'),
('Prof. David Lee', 'Public Health Wellness Monitoring System', '2024-06-20', 'bio@nitc'),
('Prof. Eva Martinez', 'Education Enhancement Platform', '2024-08-01', 'ccd@nitc.ac.in'),
('Dr. Frank Davis', 'Digital Literacy Learning App', '2024-08-20', 'ccd@nitc.ac.in'),
('Dr. Grace Taylor', 'Chemical Analysis Method for Environmental Monitoring', '2024-09-05', 'chem@nitc'),
('Prof. Harry Anderson', 'STEM Education Interactive Toolkit', '2024-09-20', 'cse@nitc'),
('Prof. Ivy Rodriguez', 'Advanced Civil Engineering Materials', '2025-01-15', 'civil@nitc'),
('Dr. Jake White', 'Cultural Heritage Preservation System', '2025-02-01', 'civil@nitc'),
('Dr. Karen Young', 'Innovative Computer Science Algorithm', '2025-03-25', 'cse@nitc'),
('Prof. Leo Miller', 'Technology Access Center Development', '2025-04-10', 'cse@nitc'),
('Dr. Mia Davis', 'Electrical Energy Harvesting System', '2025-06-01', 'elect@nitc'),
('Prof. Noah Wilson', 'Community Technology Fair Platform', '2025-06-15', 'elect@nitc'),
('Prof. Olivia Moore', 'ECE Robotics Learning Kit', '2025-07-25', 'ece@nitc'),
('Dr. Peter Adams', 'Arts and Music Education Technology', '2025-08-10', 'ece@nitc'),
('Dr. Quincy Thomas', 'Innovative Education Methodology', '2025-09-25', 'edu@nitc'),
('Prof. Rachel Clark', 'Community Library Information System', '2025-10-10', 'edu@nitc'),
('Prof. Samuel Turner', 'Electrical Engineering Practical Training Simulator', '2025-11-25', 'elect@nitc'),
('Dr. Sophia Harris', 'Environmental Conservation Monitoring System', '2025-12-10', 'elect@nitc'),
('Prof. Tom King', 'Materials Science Innovation Showcase', '2026-01-15', 'material@nitc'),
('Dr. Ursula Walker', 'Mathematics Enrichment Learning App', '2026-02-01', 'math@nitc'),
('Dr. Vince Scott', 'Mechanical Engineering Innovative Device', '2026-03-15', 'mech@nitc'),
('Prof. Wendy Hall', 'Management Studies Leadership Development Platform', '2026-04-01', 'mgmt@nitc'),
('Prof. Xander Turner', 'Physical Education and Fitness App', '2026-05-25', 'phedu@nitc'),
('Dr. Yvonne Baker', 'Physics Education and Science Exploration Kit', '2026-06-10', 'physics@nitc');

-- --------------------------------------------------------

--
-- Table structure for table `student_achievements`
--

CREATE TABLE `student_achievements` (
  `name` varchar(80) NOT NULL,
  `achievement` varchar(800) NOT NULL,
  `entity` varchar(120) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_achievements`
--

INSERT INTO `student_achievements` (`name`, `achievement`, `entity`, `date`) VALUES
('Alice Johnson', 'First Place in Art Exhibition', 'arts@nitc', '2024-01-20'),
('Bob Williams', 'Best Actor in Theater Competition', 'arts@nitc', '2024-02-05'),
('Charlie Brown', 'Top Performer in Science Fair', 'bio@nitc', '2024-03-15'),
('David Lee', 'Health and Wellness Ambassador Award', 'bio@nitc', '2024-04-20'),
('Eva Martinez', 'Outstanding Academic Performance', 'ccd@nitc.ac.in', '2024-06-05'),
('Frank Davis', 'Digital Learning Innovation Award', 'ccd@nitc.ac.in', '2024-06-20'),
('Grace Taylor', 'First Prize in Chemistry Olympiad', 'chem@nitc', '2024-08-01'),
('Harry Anderson', 'STEM Education Excellence Award', 'chem@nitc', '2024-08-20'),
('Ivy Rodriguez', 'Best Civil Engineering Project', 'civil@nitc', '2024-09-05'),
('Jake White', 'Cultural Heritage Preservation Award', 'civil@nitc', '2024-09-20'),
('Karen Young', 'Top Performer in Coding Competition', 'cse@nitc', '2025-01-15'),
('Leo Miller', 'Innovative Technology Project Award', 'cse@nitc', '2025-02-01'),
('Mia Davis', 'Outstanding Electrical Engineering Project', 'elect@nitc', '2025-03-25'),
('Noah Wilson', 'Community Technology Fair Winner', 'elect@nitc', '2025-04-10'),
('Olivia Moore', 'First Place in ECE Robotics Challenge', 'ece@nitc', '2025-06-01'),
('Peter Adams', 'Excellence in Arts and Music Education', 'ece@nitc', '2025-06-15'),
('Quincy Thomas', 'Best Education Project', 'edu@nitc', '2025-07-25'),
('Rachel Clark', 'Community Library Outreach Award', 'edu@nitc', '2025-08-10'),
('Samuel Turner', 'Top Electrical Engineering Project', 'elect@nitc', '2025-09-25'),
('Sophia Harris', 'Environmental Conservation Leadership Award', 'elect@nitc', '2025-10-10'),
('Tom King', 'Innovation in Materials Science Project', 'material@nitc', '2025-11-25'),
('Ursula Walker', 'Mathematics Enrichment Achievement', 'math@nitc', '2025-12-10'),
('Vince Scott', 'Outstanding Mechanical Engineering Project', 'mech@nitc', '2026-01-15'),
('Wendy Hall', 'Management Studies Leadership Award', 'mgmt@nitc', '2026-02-01'),
('Xander Turner', 'Physical Education and Fitness Excellence Award', 'phedu@nitc', '2026-03-15'),
('Yvonne Baker', 'Physics Education and Science Exploration Award', 'physics@nitc', '2026-04-01');

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
