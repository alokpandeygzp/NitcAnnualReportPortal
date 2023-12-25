-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 03:13 PM
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
('Dr. M. Surya Prakash', 'Worked as a Reviewer for National Conference on “Advances in  Computing, Communication, Signals, Energy and Technology” held at  College of Engineering Vadakara, from 26th May, 2021 to 27th May,  2021.  • Worked as a Reviewer for “The Journal of Institute of the Engineers”,  2021-22.', ''),
('Dr. V. Sakthivel', 'Appointed as Examiner for the PhD Thesis Evaluation of VIT Vellore,  Tamilnadu in October 2021.  • 2. Appointed as Observer for the Joint CSIR-UGC NET Exam,  June 2021 Phase II conducted by NTA, Ministry of Education, India. • 3. Appointed as Observer for the NEET UG Exam, August 2021  conducted by NTA, Ministry of Education, India. • 4. Secretary of Faculty Association of NIT Calicut (From June 2021 to till  date).', ''),
('B. Bhuvan', '1. Reviewer, IEEE Sensors Journal • 2. Reviewer, Swadeshi Microprocessor challenge 2021 • 3. Member, External review panel for Embedded Systems &  VLSI, NPOL', ''),
('DR. SD Madhu Kumar', 'final sem project mca', ''),
('cse1', 's1', 'CSED'),
('cse2', 's2', 'CSED');

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
('3D Graphics, Mr. Abhishek  Rhisheekesan, Founder and  CEO at aiRender Technology Pvt Ltd.', 'G Abhilash (IEEE SP  Society SB Chapter)', '0000-00-00', NULL, ''),
('Self Sponsored Five-Day  Online Short Term Training  Program (STTP) on “VLSI  Architectures for Digital  Signal Processing Systems”  under Diamond Jubilee  Celebrations of NITC', 'Dr. Ashutosh Mishra, Dr.  M. Surya Prakash', '0000-00-00', NULL, ''),
('Student Development  Training Programme on “AIIoT for Real Time  Applications”', 'Raghu C V and  Karthikeyan V (EED)', '0000-00-00', NULL, '');

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
('Consultancy', 'PhyTunes Inc, USA', 0, 'Ongoing', '');

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
('Dr. M. Surya  Prakash', 'International  Conference on  Advances in Signal  Processing and  Communications', '0000-00-00', NULL, 'Narasaraopet Engg.  College, A. P.', ''),
('Sudeep P V', 'KTU sponsored  Faculty Development  Program (FDP) on  \"Deep Learning for  Signal', '0000-00-00', NULL, 'Sahrudaya College of  Engineering and  Technology, Kerala', ''),
('Sudeep P V', 'KTU sponsored  Faculty Development  Program (FDP) on \"Recent developments  in Ma', '0000-00-00', NULL, 'Toc H Institute of  Science and  Technology, Kerala', ''),
('Sudhish N  George', 'Recent Trends in  Moving Object  Detection', '0000-00-00', NULL, 'Navodaya Institute of  Technology, Raichur', ''),
('Sudhish N  George', 'Recent Trends in  Moving Object Detection', '0000-00-00', NULL, 'K. S. School of  Engineering and  Management,  Bangalore', '');

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
('Jaikumar M G', 'PhD', 'IIT Madras', '');

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
('Dr. M. Surya Prakash', '(1st April, 2021 to 6th August, 2021) • Time-table In-Charge for ECED (jointly with Dr. Bindiya T. S.). • Faculty Incharge for Electronic Circuits Lab of ECED. • Faculty Advisor for the 2019-23 batch of ECE students (Jointly with  Dr. Praveen Sankaran, Dr. Suja K. J. and Dr. Gopikrishna S.). • Committee Member for Disposal/Write-Off of unserviceable items of  ECED. • Committee Member for preparation of Self-Assessment Report  (SAR) for M. Tech Telecommunications specialization. • Member of the General Arrangements Committee for National Board  of Accreditation Work for Telecommunications Specialization. (7th  August, 2021 to 31st March, 2022) • Time-table In-Charge for ECED (jointly with Dr. Bindiya T. S.). • Faculty Incharge for Electronic Circuits Lab of ECED. • Faculty Advisor for the 2019-23 batch of ECE students (Jointly with  Dr. Praveen Sankaran, Dr. Suja K. J. and Dr. Gopikrishna S.).', ''),
('Dr. Lalit Kumar', '• Faculty Advisor for the 2020-24 ECE_Batch-20 • Committee member of CCAR • Exam Vigilance Committee • Coordination of Interview & Document Verification', ''),
('Dr. V. Sakthivel', 'Official for the online admission process of JoSSA/CSAB at NIT  Calicut for 2021-22 (UG Admissions) • SPCOM Lab Faculty-in-charge • Member in ECED Exam Vigilance committee • Convener, NITC Sports Council • Coordinator of B. Tech Major Project Evaluation Committee  (Communication/SP) • DC member in EED and CSED. • Member in the committee of coordination of online interview and  document verification (ECED).', ''),
('Dr Ameer P.M.', '• Program coordinator - MTech Telecommunication • Lab In charge - Communication Lab', '');

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
('Vinay Joseph (coinventor)', 'US-2022141789-A1, Delivery time windows  for low latency communications', '2022 (filed)', ''),
('Vinay Joseph (co-inventor)', 'US-2022085932-A1, Sounding reference  signals and channel state information  reference signals enhancements for  coordinated multipoint communications', '2021 (filed)', ''),
('Vinay Joseph (co-inventor)', 'US-2022046565-A1, Reference timing  delivery to user equipment with propagation  delay compensation', '2021 (filed)', ''),
('Vinay Joseph (co-inventor)', 'US-2021367718-A1, Autonomous reference  signal transmission configuration', '2021 (filed)', '');

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
('Anjali Sara Markose', 'Winner of Synopsys Inno Champ 2022 (Female Category)', ''),
('Sakhineti Praveena', 'a student of the B19 batch of ECE received the prestigious  Micron’s URAM Scholarship with a scholarship amount of  Rs 1,00,000.', ''),
('Diyea Robin', 'a student of B 18 Batch won the Carolyn Leighton  Scholarship 2021 which includes a one-year WITI  membership and an opportunity to attend the 2021 WITI  Global Summit. She also bagged the second position in the  elocution competition conducted in association with the  Azadi Ka Amruth Mahotsav.', ''),
('Polamuri Ushaswini', 'won the first prize and runner up respectively in InnoChamp 22, the annual innovation  challenge conducted by Synopsys Inc', ''),
('Veena Narayanan', 'Research Scholar (P180043EC) received Special Mention  Award for her paper presented at the IEEE International  Conference on Advanced Communication Technologies and  Signal Processing 2021 (ACTS 2021) NIT Rourkela', '');

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
