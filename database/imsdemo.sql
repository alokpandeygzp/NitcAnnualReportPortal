-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2024 at 08:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `Id` int(100) NOT NULL,
  `staff` varchar(80) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `entity` varchar(120) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_services`
--

INSERT INTO `community_services` (`Id`, `staff`, `title`, `entity`, `date`) VALUES
(1, 'John Doe', 'Architectural Workshop: Designing Spaces for All', 'arch@nitc', '2024-01-17'),
(2, 'Jane Smith', 'Community Heritage Preservation: Our Past for the Future', 'arch@nitc', '2024-02-01'),
(3, 'Alice Johnson', 'Art Exhibition: Celebrating Local Talent', 'arts@nitc', '2024-03-10'),
(4, 'Bob Williams', 'Community Theater Project: Bringing Stories to Life', 'arts@nitc', '2024-04-05'),
(5, 'Charlie Brown', 'Environmental Cleanup: Greening Our Neighborhood', 'bio@nitc', '2024-05-20'),
(6, 'David Lee', 'Health Awareness Campaign: Promoting Wellness Together', 'bio@nitc', '2024-06-15'),
(7, 'Eva Martinez', 'Career Guidance Seminar: Empowering Futures', 'ccd@nitc.ac.in', '2024-07-30'),
(8, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'ccd@nitc.ac.in', '2024-08-25'),
(9, 'Grace Taylor', 'Chemistry Outreach Program: Inspiring Curiosity in Science', 'chem@nitc', '2024-09-09'),
(10, 'Harry Anderson', "STEM Education Initiative: Building Tomorrow's Innovators", 'cse@nitc', '2024-10-14'),
(11, 'Ivy Rodriguez', 'Civil Engineering Outreach: Building Bridges to the Future', 'civil@nitc', '2025-01-08'),
(12, 'Jake White', 'Community Engagement in Arts: Fostering Creativity Together', 'civil@nitc', '2025-02-02'),
(13, 'Karen Young', 'Computer Science Education Drive: Nurturing Future Tech Leaders', 'cse@nitc', '2025-03-18'),
(14, 'Leo Miller', 'Community Sports Event: Promoting Active Lifestyles', 'cse@nitc', '2025-04-13'),
(15, 'Mia Davis', 'Electrical Engineering Outreach: Powering Community Connections', 'elect@nitc', '2025-05-28'),
(16, 'Noah Wilson', 'Community Education in Electronics: Empowering Minds', 'elect@nitc', '2025-06-23'),
(17, 'Olivia Moore', 'ECE Community Initiative: Connecting Through Technology', 'ece@nitc', '2025-07-08'),
(18, 'Peter Adams', 'Arts Appreciation Workshop: Unleashing Creative Expressions', 'ece@nitc', '2025-08-03'),
(19, 'Quincy Thomas', 'Education for All: Bridging Gaps in Learning', 'edu@nitc', '2025-09-18'),
(20, 'Rachel Clark', 'Empowering through Education: A Path to Brighter Futures', 'edu@nitc', '2025-10-13'),
(21, 'Samuel Turner', 'Electrical Engineering Outreach: Illuminating Minds Together', 'elect@nitc', '2025-11-28'),
(22, 'Sophia Harris', 'Environment Conservation Drive: Sustaining Our Ecosystem', 'elect@nitc', '2025-12-23'),
(23, 'Tom King', 'Materials Science Exhibition: Exploring Innovations', 'material@nitc', '2026-01-07'),
(24, 'Ursula Walker', 'Mathematics Outreach: Unraveling the Wonders of Numbers', 'math@nitc', '2026-02-01'),
(25, 'Vince Scott', 'Mechanical Engineering Workshop: Unveiling Engineering Marvels', 'mech@nitc', '2026-03-17'),
(26, 'Wendy Hall', 'Management Studies Seminar: Shaping Future Leaders', 'mgmt@nitc', '2026-04-12'),
(27, 'Xander Turner', 'Physical Education Day: Fostering Healthy Lifestyles', 'phedu@nitc', '2026-05-27'),
(28, 'Yvonne Baker', 'Physics Education Program: Exploring the World of Forces', 'physics@nitc', '2026-06-22'),
(32, 'ABHISHEK KUMAR', 'Architectural Workshop: Designing Spaces for All', 'arch@nitc', '2024-01-03'),
(33, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(34, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(35, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(36, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(37, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(38, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(39, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(40, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(41, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(42, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(43, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(44, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(45, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(46, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(47, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(48, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),
(49, 'Frank Davis', 'Digital Literacy Workshop: Connecting Communities Online', 'cse@nitc.ac.in', '2024-08-25'),

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `Id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `name` varchar(80) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`Id`, `title`, `name`, `start`, `end`, `entity`) VALUES
(1, 'Adult Education Summit', 'Quincy Thomas', '2025-09-25', '2025-09-27', 'edu@nitc'),
(2, 'Architecture Summit 2024', 'John Doe', '2024-01-25', '2024-01-28', 'arch@nitc'),
(3, 'Art and Community Symposium', 'Alice Johnson', '2024-03-25', '2024-03-27', 'arts@nitc'),
(4, 'Arts and Culture Festival Symposium', 'Jake White', '2025-02-01', '2025-02-03', 'civil@nitc'),
(5, 'Arts and Music Education Conference', 'Peter Adams', '2025-08-10', '2025-08-12', 'ece@nitc'),
(6, 'Biodiversity Conservation Forum', 'Charlie Brown', '2024-06-01', '2024-06-03', 'bio@nitc'),
(7, 'Civil Engineering Innovation Summit', 'Ivy Rodriguez', '2025-01-15', '2025-01-18', 'civil@nitc'),
(8, 'Community Leadership Seminar', 'Wendy Hall', '2026-04-01', '2026-04-03', 'mgmt@nitc'),
(9, 'Community Library Conference', 'Rachel Clark', '2025-10-10', '2025-10-12', 'edu@nitc'),
(10, 'Computer Science Education Summit', 'Karen Young', '2025-03-25', '2025-03-27', 'cse@nitc'),
(11, 'Creative Expression Forum', 'Bob Williams', '2024-04-10', '2024-04-12', 'arts@nitc'),
(12, 'Digital Learning Conference', 'Frank Davis', '2024-08-20', '2024-08-22', 'ccd@nitc.ac.in'),
(13, 'ECE Robotics Symposium', 'Olivia Moore', '2025-07-25', '2025-07-27', 'ece@nitc'),
(14, 'Educational Development Summit', 'Eva Martinez', '2024-08-01', '2024-08-03', 'ccd@nitc.ac.in'),
(15, 'Electrical Engineering Innovation Summit', 'Mia Davis', '2025-06-01', '2025-06-03', 'elect@nitc'),
(16, 'Electrical Engineering Training Summit', 'Samuel Turner', '2025-11-25', '2025-11-27', 'elect@nitc'),
(17, 'Environmental Conservation Conference', 'Sophia Harris', '2025-12-10', '2025-12-12', 'elect@nitc'),
(18, 'Materials Science Innovation Summit', 'Tom King', '2026-01-15', '2026-01-18', 'material@nitc'),
(19, 'Mathematics Enrichment Conference', 'Ursula Walker', '2026-02-01', '2026-02-03', 'math@nitc'),
(20, 'Mechanical Engineering Outreach Summit', 'Vince Scott', '2026-03-15', '2026-03-18', 'mech@nitc'),
(21, 'Physical Education and Fitness Conference', 'Xander Turner', '2026-05-25', '2026-05-27', 'phedu@nitc'),
(22, 'Physics Education and Science Exploration Symposium', 'Yvonne Baker', '2026-06-10', '2026-06-12', 'physics@nitc'),
(23, 'Science Education Conference', 'Grace Taylor', '2024-09-15', '2024-09-18', 'chem@nitc'),
(24, 'STEM Education Symposium', 'Harry Anderson', '2024-10-01', '2024-10-03', 'chem@nitc'),
(25, 'Technology Access Conference', 'Leo Miller', '2025-04-10', '2025-04-12', 'cse@nitc'),
(26, 'Technology Fair and Expo', 'Noah Wilson', '2025-06-15', '2025-06-17', 'elect@nitc'),
(27, 'Urban Planning Conference', 'Jane Smith', '2024-02-10', '2024-02-12', 'arch@nitc'),
(28, 'Wellness and Health Conference', 'David Lee', '2024-06-15', '2024-06-17', 'bio@nitc');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE `consultancy` (
  `Id` int(11) NOT NULL,
  `nature` varchar(80) NOT NULL,
  `organization` varchar(80) NOT NULL,
  `revenue` int(10) NOT NULL,
  `status` varchar(80) NOT NULL,
  `entity` varchar(120) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`Id`, `nature`, `organization`, `revenue`, `status`, `entity`, `date`) VALUES
(1, 'Arts and Culture', 'Cultural Harmony Society', 70000, 'Active', 'material@nitc', '2024-10-14'),
(2, 'Science Education', 'Curious Minds Foundation', 70000, 'Active', 'physics@nitc', '2025-05-28'),
(3, 'Engineering Excellence', 'Engineering Marvels Institute', 80000, 'Active', 'mech@nitc', '2025-02-02'),
(4, 'Physical Fitness', 'FitLife Foundation', 75000, 'Active', 'phedu@nitc', '2025-04-13'),
(5, 'Environmental Conservation', 'Green Initiatives Organization', 40000, 'In Progress', 'arch@nitc', '2024-01-17'),
(6, 'Health and Wellness', 'Healthy Living Foundation', 55000, 'Active', 'chem@nitc', '2024-05-20'),
(7, 'Social Impact', 'Impactful Change Foundation', 75000, 'Active', 'edu@nitc', '2024-08-25'),
(8, 'Technology and Innovation', 'InnoTech Hub', 55000, 'Active', 'math@nitc', '2025-01-08'),
(9, 'STEM Education', 'Innovate for Tomorrow', 70000, 'Active', 'cse@nitc', '2024-06-15'),
(10, 'Leadership Development', 'Leadership Institute', 60000, 'Active', 'mgmt@nitc', '2025-03-18'),
(11, 'Community Development', 'Local Empowerment Network', 75000, 'Active', 'arts@nitc', '2024-02-01'),
(12, 'Community Services', 'ServeLocal NGO', 65000, 'Active', 'elect@nitc', '2024-09-09'),
(13, 'Digital Inclusion', 'TechConnect Foundation', 80000, 'Active', 'ccd@nitc.ac.in', '2024-04-05'),
(14, 'Education and Training', 'TechSkills Academy', 60000, 'Active', 'bio@nitc', '2024-03-10'),
(15, 'Youth Empowerment', 'YouthLeaders Organization', 60000, 'Active', 'ece@nitc', '2024-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `id` varchar(80) NOT NULL,
  `name` varchar(120) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`id`, `name`, `role`) VALUES
('alok_m210701ca@nitc.ac.in', 'alok pandey', 'admin'),
('arch@nitc', 'Department of Architecture', 'department'),
('arham_m210695ca@nitc.ac.in', 'Arham', 'admin'),
('arts@nitc', 'Humanities', 'department'),
('bio@nitc', 'Department of Biotechnology', 'department'),
('ccd@nitc.ac.in', 'centre of ccd', 'centre'),
('chem@nitc', 'Department of Chemical Engineering', 'department'),
('chemistry@nitc', 'Chemistry', 'department'),
('civil@nitc', 'Department of Civil Engineering', 'department'),
('cse@nitc', 'Department of Computer Science and Engineering', 'department'),
('dikshant_m210670ca@nitc.ac.in', 'Dikshant Bisht', 'admin'),
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
  `entity` varchar(120) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert_lectures`
--

INSERT INTO `expert_lectures` (`staff`, `title`, `start`, `end`, `organization`, `entity`, `Id`) VALUES
('David Wilson', 'Advancements in Biology Research', '2024-06-05', '2024-06-10', 'BioTech Innovations', 'bio@nitc', 1),
('Ethan Davis', 'Art and Culture Preservation', '2024-04-20', '2024-04-25', 'Creative Connections', 'arts@nitc', 2),
('Diana Turner', 'Biodiversity Conservation Initiatives', '2024-06-20', '2024-06-25', 'Nature Preservation Society', 'bio@nitc', 3),
('Emily Johnson', 'Community Development Best Practices', '2024-03-15', '2024-03-20', 'Local Empowerment Network', 'arts@nitc', 4),
('Sara Brown', 'Digital Literacy for Social Inclusion', '2024-08-01', '2024-08-05', 'TechConnect Foundation', 'ccd@nitc.ac.in', 5),
('John Smith', 'Environmental Conservation Strategies', '2024-01-20', '2024-01-25', 'Green Initiatives Organization', 'arch@nitc', 6),
('Alice Miller', 'Innovations in STEM Education', '2024-09-20', '2024-09-25', 'Future Innovators Society', 'cse@nitc', 7),
('Samuel Taylor', 'Online Learning Platforms for Education', '2024-08-20', '2024-08-25', 'EduTech Solutions', 'ccd@nitc.ac.in', 8),
('Alex Turner', 'Promoting Health and Wellness in Communities', '2024-09-05', '2024-09-10', 'Healthy Living Foundation', 'chem@nitc', 9),
('Jane Williams', 'Sustainable Architecture Innovations', '2024-02-05', '2024-02-10', 'EcoBuilders Association', 'arch@nitc', 10);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Name` varchar(35) DEFAULT NULL,
  `Email` varchar(41) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `date` date DEFAULT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_qualification`
--

INSERT INTO `faculty_qualification` (`name`, `qualification`, `institute`, `entity`, `date`, `Id`) VALUES
('Dr. Alice Johnson', 'Ph.D. in Fine Arts', 'Creative Arts Academy', 'arts@nitc', '2024-03-10', 1),
('Dr. Charlie Brown', 'Ph.D. in Environmental Science', 'Green Earth University', 'bio@nitc', '2024-05-20', 2),
('Dr. Frank Davis', 'Masters in Digital Learning Technologies', 'TechEd University', 'ccd@nitc.ac.in', '2024-08-25', 3),
('Dr. Grace Taylor', 'Ph.D. in Chemistry', 'Chemical Sciences Institute', 'chem@nitc', '2024-09-09', 4),
('Dr. Jake White', 'Masters in Arts and Culture Studies', 'Cultural Heritage University', 'civil@nitc', '2025-02-02', 5),
('Dr. Jane Smith', 'Masters in Architectural Design', 'Urban Institute of Technology', 'arch@nitc', '2024-02-01', 6),
('Dr. Karen Young', 'Ph.D. in Computer Science', 'TechGenius Institute', 'cse@nitc', '2025-03-18', 7),
('Dr. Mia Davis', 'Ph.D. in Electrical Engineering', 'Electric Innovations University', 'elect@nitc', '2025-05-28', 8),
('Dr. Peter Adams', 'Masters in Arts Education', 'Creative Minds Academy', 'ece@nitc', '2025-08-03', 9),
('Dr. Quincy Thomas', 'Ph.D. in Education', 'Education Excellence Institute', 'edu@nitc', '2025-09-18', 10),
('Dr. Sophia Harris', 'Masters in Environmental Science', 'Environmental Research Center', 'elect@nitc', '2025-12-23', 11),
('Dr. Ursula Walker', 'Masters in Mathematics Education', 'Mathematics Excellence School', 'math@nitc', '2026-02-01', 12),
('Dr. Vince Scott', 'Ph.D. in Mechanical Engineering', 'Mechanical Innovations College', 'mech@nitc', '2026-03-17', 13),
('Dr. Yvonne Baker', 'Masters in Physics Education', 'Physics Education Center', 'physics@nitc', '2026-06-22', 14),
('Prof. Bob Williams', 'Masters in Performing Arts', 'National Theater School', 'arts@nitc', '2024-04-05', 15),
('Prof. David Lee', 'Masters in Public Health', 'Wellness Institute', 'bio@nitc', '2024-06-15', 16),
('Prof. Eva Martinez', 'Ph.D. in Education', 'Educational Excellence Center', 'ccd@nitc.ac.in', '2024-07-30', 17),
('Prof. Harry Anderson', 'Masters in STEM Education', 'STEM Innovators College', 'chem@nitc', '2024-10-14', 18),
('Prof. Ivy Rodriguez', 'Ph.D. in Civil Engineering', 'Engineering Excellence Institute', 'civil@nitc', '2025-01-08', 19),
('Prof. John Doe', 'Ph.D. in Architecture', 'Green University', 'arch@nitc', '2024-01-17', 20),
('Prof. Leo Miller', 'Masters in Technology Management', 'TechLeaders School', 'cse@nitc', '2025-04-13', 21),
('Prof. Noah Wilson', 'Masters in Technology and Society', 'TechInnovate College', 'elect@nitc', '2025-06-23', 22),
('Prof. Olivia Moore', 'Ph.D. in Electronics and Communication', 'Communication Technologies Institute', 'ece@nitc', '2025-07-08', 23),
('Prof. Rachel Clark', 'Masters in Library Science', 'Community Learning Center', 'edu@nitc', '2025-10-13', 24),
('Prof. Samuel Turner', 'Ph.D. in Electrical Engineering', 'TechMasters Institute', 'elect@nitc', '2025-11-28', 25),
('Prof. Tom King', 'Ph.D. in Materials Science', 'Materials Innovations Institute', 'material@nitc', '2026-01-07', 26),
('Prof. Wendy Hall', 'Masters in Management Studies', 'Management Excellence Institute', 'mgmt@nitc', '2026-04-12', 27),
('Prof. Xander Turner', 'Ph.D. in Physical Education', 'Fitness and Wellness University', 'phedu@nitc', '2026-05-27', 28);

-- --------------------------------------------------------

--
-- Table structure for table `other_services`
--

CREATE TABLE `other_services` (
  `staff` varchar(80) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `entity` varchar(120) NOT NULL,
  `date` date DEFAULT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_services`
--

INSERT INTO `other_services` (`staff`, `title`, `entity`, `date`, `Id`) VALUES
('John Doe', 'Architectural Consultation for Community Projects', 'arch@nitc', '2024-01-17', 1),
('Jane Smith', 'Urban Planning Workshop for Sustainable Living', 'arch@nitc', '2024-02-01', 2),
('Alice Johnson', 'Community Art Installation and Beautification', 'arts@nitc', '2024-03-10', 3),
('Bob Williams', 'Public Space Renovation and Creative Expression', 'arts@nitc', '2024-04-05', 4),
('Charlie Brown', 'Ecological Survey and Biodiversity Conservation', 'bio@nitc', '2024-05-20', 5),
('David Lee', 'Health and Wellness Program Implementation', 'bio@nitc', '2024-06-15', 6),
('Eva Martinez', 'Professional Development Workshops for Students', 'ccd@nitc.ac.in', '2024-07-30', 7),
('Frank Davis', 'Online Learning Platform Development', 'ccd@nitc.ac.in', '2024-08-25', 8),
('Grace Taylor', 'Science Education Outreach in Local Schools', 'chem@nitc', '2024-09-09', 9),
('Harry Anderson', 'STEM Mentorship Program for Students', 'chem@nitc', '2024-10-14', 10),
('Ivy Rodriguez', 'Civil Engineering Infrastructure Assessment', 'civil@nitc', '2025-01-08', 11),
('Jake White', 'Community Arts and Culture Festival Coordination', 'civil@nitc', '2025-02-02', 12),
('Karen Young', 'Computer Science Coding Bootcamp for Kids', 'cse@nitc', '2025-03-18', 13),
('Leo Miller', 'Community Technology Access Center Establishment', 'cse@nitc', '2025-04-13', 14),
('Mia Davis', 'Electrical Engineering Innovation Challenge', 'elect@nitc', '2025-05-28', 15),
('Noah Wilson', 'Community Technology Fair Organization', 'elect@nitc', '2025-06-23', 16),
('Olivia Moore', 'ECE Robotics Workshop for Local Schools', 'ece@nitc', '2025-07-08', 17),
('Peter Adams', 'Community Arts and Music Education Program', 'ece@nitc', '2025-08-03', 18),
('Quincy Thomas', 'Adult Education Program for Skill Enhancement', 'edu@nitc', '2025-09-18', 19),
('Rachel Clark', 'Community Library Setup and Book Donation Drive', 'edu@nitc', '2025-10-13', 20),
('Samuel Turner', 'Electrical Engineering Practical Training Sessions', 'elect@nitc', '2025-11-28', 21),
('Sophia Harris', 'Environmental Conservation and Cleanup Campaign', 'elect@nitc', '2025-12-23', 22),
('Tom King', 'Materials Science Innovation Showcase', 'material@nitc', '2026-01-07', 23),
('Ursula Walker', 'Mathematics Enrichment Program for Students', 'math@nitc', '2026-02-01', 24),
('Vince Scott', 'Mechanical Engineering Outreach for School Students', 'mech@nitc', '2026-03-17', 25),
('Wendy Hall', 'Management Studies Community Leadership Seminar', 'mgmt@nitc', '2026-04-12', 26),
('Xander Turner', 'Physical Education and Fitness Workshop', 'phedu@nitc', '2026-05-27', 27),
('Yvonne Baker', 'Physics Education and Science Exploration Camp', 'physics@nitc', '2026-06-22', 28);

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE `patents` (
  `Id` int(11) NOT NULL,
  `staff` varchar(80) NOT NULL,
  `title` varchar(800) NOT NULL,
  `date` date DEFAULT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patents`
--

INSERT INTO `patents` (`Id`, `staff`, `title`, `date`, `entity`) VALUES
(1, 'Prof. John Doe', 'Innovative Architectural Design', '2024-01-20', 'arch@nitc'),
(2, 'Dr. Jane Smith', 'Sustainable Urban Planning Method', '2024-02-05', 'arch@nitc'),
(3, 'Dr. Alice Johnson', 'Interactive Art Installation System', '2024-03-15', 'arts@nitc'),
(4, 'Prof. Bob Williams', 'Community Theater Engagement Platform', '2024-04-20', 'arts@nitc'),
(5, 'Dr. Charlie Brown', 'Biodiversity Conservation Algorithm', '2024-06-05', 'bio@nitc'),
(6, 'Prof. David Lee', 'Public Health Wellness Monitoring System', '2024-06-20', 'bio@nitc'),
(7, 'Prof. Eva Martinez', 'Education Enhancement Platform', '2024-08-01', 'ccd@nitc.ac.in'),
(8, 'Dr. Frank Davis', 'Digital Literacy Learning App', '2024-08-20', 'ccd@nitc.ac.in'),
(9, 'Dr. Grace Taylor', 'Chemical Analysis Method for Environmental Monitoring', '2024-09-05', 'chem@nitc'),
(10, 'Prof. Harry Anderson', 'STEM Education Interactive Toolkit', '2024-09-20', 'cse@nitc'),
(11, 'Prof. Ivy Rodriguez', 'Advanced Civil Engineering Materials', '2025-01-15', 'civil@nitc'),
(12, 'Dr. Jake White', 'Cultural Heritage Preservation System', '2025-02-01', 'civil@nitc'),
(13, 'Dr. Karen Young', 'Innovative Computer Science Algorithm', '2025-03-25', 'cse@nitc'),
(14, 'Prof. Leo Miller', 'Technology Access Center Development', '2025-04-10', 'cse@nitc'),
(15, 'Dr. Mia Davis', 'Electrical Energy Harvesting System', '2025-06-01', 'elect@nitc'),
(16, 'Prof. Noah Wilson', 'Community Technology Fair Platform', '2025-06-15', 'elect@nitc'),
(17, 'Prof. Olivia Moore', 'ECE Robotics Learning Kit', '2025-07-25', 'ece@nitc'),
(18, 'Dr. Peter Adams', 'Arts and Music Education Technology', '2025-08-10', 'ece@nitc'),
(19, 'Dr. Quincy Thomas', 'Innovative Education Methodology', '2025-09-25', 'edu@nitc'),
(20, 'Prof. Rachel Clark', 'Community Library Information System', '2025-10-10', 'edu@nitc'),
(21, 'Prof. Samuel Turner', 'Electrical Engineering Practical Training Simulator', '2025-11-25', 'elect@nitc'),
(22, 'Dr. Sophia Harris', 'Environmental Conservation Monitoring System', '2025-12-10', 'elect@nitc'),
(23, 'Prof. Tom King', 'Materials Science Innovation Showcase', '2026-01-15', 'material@nitc'),
(24, 'Dr. Ursula Walker', 'Mathematics Enrichment Learning App', '2026-02-01', 'math@nitc'),
(25, 'Dr. Vince Scott', 'Mechanical Engineering Innovative Device', '2026-03-15', 'mech@nitc'),
(26, 'Prof. Wendy Hall', 'Management Studies Leadership Development Platform', '2026-04-01', 'mgmt@nitc'),
(27, 'Prof. Xander Turner', 'Physical Education and Fitness App', '2026-05-25', 'phedu@nitc'),
(28, 'Dr. Yvonne Baker', 'Physics Education and Science Exploration Kit', '2026-06-10', 'physics@nitc');

-- --------------------------------------------------------

--
-- Table structure for table `student_achievements`
--

CREATE TABLE `student_achievements` (
  `Id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `achievement` varchar(800) NOT NULL,
  `entity` varchar(120) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_achievements`
--

INSERT INTO `student_achievements` (`Id`, `name`, `achievement`, `entity`, `date`) VALUES
(1, 'Alice Johnson', 'First Place in Art Exhibition', 'arts@nitc', '2024-01-20'),
(2, 'Bob Williams', 'Best Actor in Theater Competition', 'arts@nitc', '2024-02-05'),
(3, 'Charlie Brown', 'Top Performer in Science Fair', 'bio@nitc', '2024-03-15'),
(4, 'David Lee', 'Health and Wellness Ambassador Award', 'bio@nitc', '2024-04-20'),
(5, 'Eva Martinez', 'Outstanding Academic Performance', 'ccd@nitc.ac.in', '2024-06-05'),
(6, 'Frank Davis', 'Digital Learning Innovation Award', 'ccd@nitc.ac.in', '2024-06-20'),
(7, 'Grace Taylor', 'First Prize in Chemistry Olympiad', 'chem@nitc', '2024-08-01'),
(8, 'Harry Anderson', 'STEM Education Excellence Award', 'chem@nitc', '2024-08-20'),
(9, 'Ivy Rodriguez', 'Best Civil Engineering Project', 'civil@nitc', '2024-09-05'),
(10, 'Jake White', 'Cultural Heritage Preservation Award', 'civil@nitc', '2024-09-20'),
(11, 'Karen Young', 'Top Performer in Coding Competition', 'cse@nitc', '2025-01-15'),
(12, 'Leo Miller', 'Innovative Technology Project Award', 'cse@nitc', '2025-02-01'),
(13, 'Mia Davis', 'Outstanding Electrical Engineering Project', 'elect@nitc', '2025-03-25'),
(14, 'Noah Wilson', 'Community Technology Fair Winner', 'elect@nitc', '2025-04-10'),
(15, 'Olivia Moore', 'First Place in ECE Robotics Challenge', 'ece@nitc', '2025-06-01'),
(16, 'Peter Adams', 'Excellence in Arts and Music Education', 'ece@nitc', '2025-06-15'),
(17, 'Quincy Thomas', 'Best Education Project', 'edu@nitc', '2025-07-25'),
(18, 'Rachel Clark', 'Community Library Outreach Award', 'edu@nitc', '2025-08-10'),
(19, 'Samuel Turner', 'Top Electrical Engineering Project', 'elect@nitc', '2025-09-25'),
(20, 'Sophia Harris', 'Environmental Conservation Leadership Award', 'elect@nitc', '2025-10-10'),
(21, 'Tom King', 'Innovation in Materials Science Project', 'material@nitc', '2025-11-25'),
(22, 'Ursula Walker', 'Mathematics Enrichment Achievement', 'math@nitc', '2025-12-10'),
(23, 'Vince Scott', 'Outstanding Mechanical Engineering Project', 'mech@nitc', '2026-01-15'),
(24, 'Wendy Hall', 'Management Studies Leadership Award', 'mgmt@nitc', '2026-02-01'),
(25, 'Xander Turner', 'Physical Education and Fitness Excellence Award', 'phedu@nitc', '2026-03-15'),
(26, 'Yvonne Baker', 'Physics Education and Science Exploration Award', 'physics@nitc', '2026-04-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_services`
--
ALTER TABLE `community_services`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert_lectures`
--
ALTER TABLE `expert_lectures`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `faculty_qualification`
--
ALTER TABLE `faculty_qualification`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `other_services`
--
ALTER TABLE `other_services`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `patents`
--
ALTER TABLE `patents`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `student_achievements`
--
ALTER TABLE `student_achievements`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_services`
--
ALTER TABLE `community_services`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `consultancy`
--
ALTER TABLE `consultancy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `expert_lectures`
--
ALTER TABLE `expert_lectures`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faculty_qualification`
--
ALTER TABLE `faculty_qualification`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `other_services`
--
ALTER TABLE `other_services`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `patents`
--
ALTER TABLE `patents`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_achievements`
--
ALTER TABLE `student_achievements`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
