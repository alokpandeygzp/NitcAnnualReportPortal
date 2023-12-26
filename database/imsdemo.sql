-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2023 at 12:49 PM
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
  `staff` varchar(80) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_services`
--

INSERT INTO `community_services` (`staff`, `title`, `entity`) VALUES
('John Doe', 'Engaged in a year-long Community Outreach Program at the local shelter, providing assistance to homeless individuals and organizing various skill development workshops. The program aimed to create a positive impact on the community by addressing social issues and promoting inclusivity.', ''),
('Jane Doe', 'Led an Environmental Cleanup Campaign in collaboration with local volunteers. The initiative focused on cleaning up public spaces, raising awareness about environmental conservation, and encouraging community participation in sustainable practices.', 'CED'),
('Alice Smith', 'Initiated and coordinated a Tutoring Program for underprivileged students in collaboration with local schools. The program aimed to provide educational support and mentorship to students facing socio-economic challenges.', 'CSED'),
('Bob Johnson', 'Organized a Health and Wellness Workshop, bringing together healthcare professionals and community members. The workshop included informative sessions on healthy living, fitness activities, and free health check-ups for participants.', 'ECED'),
('Charlie Brown', 'Led a Community Garden Project, establishing a communal green space for residents. The project aimed to promote sustainable living, community bonding, and provide fresh produce to local families in need.', 'EEED'),
('David Wilson', 'Coordinated a STEM Education Program for kids, introducing young minds to science, technology, engineering, and mathematics. The program included interactive workshops, experiments, and educational activities to foster interest in STEM fields.', 'MED'),
('Emma White', 'Collaborated with medical professionals to organize a Medical Camp in rural areas, providing free healthcare services to underserved communities. The camp focused on preventive care, health screenings, and medical consultations.', ''),
('Frank Miller', 'Provided Educational Support for orphans through mentoring and educational resources. The initiative aimed to empower orphaned children with educational opportunities, skill development, and emotional support.', 'CED'),
('Grace Davis', 'Coordinated an Environmental Awareness Drive, conducting awareness campaigns, tree plantation events, and workshops on sustainable living. The drive aimed to instill a sense of responsibility towards the environment among community members.', 'CSED'),
('Henry Clark', 'Organized a Youth Leadership Training program to empower young individuals with leadership skills and personal development. The program included workshops, seminars, and mentoring sessions for youth empowerment.', 'ECED');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`title`, `name`, `start`, `end`, `entity`) VALUES
('Computer Science Symposium', 'Alice Smith', '2023-03-25', '2023-03-27', 'CSED'),
('Electronics and Communication Summit', 'Bob Johnson', '2023-04-30', '2023-05-02', 'ECED'),
('George Harris', 'Innovation in Civil Engineering', '2023-08-20', '2023-08-22', 'CED'),
('Helen Turner', 'International Women in Science Conference', '2023-07-15', '2023-07-17', ''),
('International Engineering Summit 2023', 'John Doe', '2023-01-15', '2023-01-18', ''),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`nature`, `organization`, `revenue`, `status`, `entity`) VALUES
('Nathan Wilson', 'Advanced Robotics Consultancy', 18000, 'In Progress', 'ECED'),
('Larry White', 'Blockchain Technology Consultancy', 25000, 'In Progress', 'CED'),
('Software Development Consultancy', 'CodeCrafters Ltd.', 25000, 'Completed', 'CSED'),
('Mia Adams', 'Data Science Solutions Consultancy', 22000, 'Completed', 'CSED'),
('Electronics Prototyping Services', 'ElectroTech Innovations', 18000, 'In Progress', 'ECED'),
('Kelly Thompson', 'Energy Efficiency Consultancy', 18000, 'Completed', ''),
('Structural Engineering Consultancy', 'Engineering Solutions Inc.', 15000, 'Completed', ''),
('Power System Analysis Consultancy', 'PowerGrid Solutions', 22000, 'Completed', 'EEED'),
('Mechanical Design and Testing', 'Precision Engineering Solutions', 30000, 'In Progress', 'MED'),
('IT Advisory Services', 'Tech Innovate Consulting', 20000, 'In Progress', 'CED');

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `id` varchar(80) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`id`, `name`) VALUES
('', 'Department of Admin(showing entries with no entities)'),
('CED', 'Department of Civil Engineering'),
('CSED', 'Department of Computer Science'),
('ECED', 'Department of Electronics and Communication'),
('EEED', 'Department of Electrical Engineering'),
('MED', 'Department of Mechanical Engineering');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert_lectures`
--

INSERT INTO `expert_lectures` (`staff`, `title`, `start`, `end`, `organization`, `entity`) VALUES
('John Doe', 'Advancements in Structural Engineering', '2023-01-25', '2023-01-26', 'Institute of Structural Engineers', ''),
('Rachel Wilson', 'Cutting-edge Developments in Electronics', '2023-11-30', '2023-12-01', 'Electronics Innovation Forum', 'ECED'),
('Bob Johnson', 'Emerging Technologies in Electronics', '2023-05-05', '2023-05-06', 'ElectroTech Innovations', 'ECED'),
('Quincy Adams', 'Frontiers in Computer Science', '2023-10-30', '2023-10-31', 'Computer Science Association', 'CSED'),
('Olivia Turner', 'Future of Artificial Intelligence', '2023-08-20', '2023-08-21', 'AI Futures Forum', ''),
('Jane Doe', 'Innovations in IT', '2023-02-28', '2023-03-01', 'Tech Innovate Consulting', 'CED'),
('David Wilson', 'Innovations in Mechanical Engineering', '2023-07-15', '2023-07-16', 'Mechanical Engineering Society', 'MED'),
('Alice Smith', 'Recent Trends in Machine Learning', '2023-03-30', '2023-03-31', 'AI Research Institute', 'CSED'),
('Philip Harris', 'Smart Cities and Urban Planning', '2023-09-25', '2023-09-26', 'Urban Development Council', 'CED'),
('Charlie Brown', 'Sustainable Energy Solutions', '2023-06-10', '2023-06-11', 'Renewable Energy Association', 'EEED');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_qualification`
--

CREATE TABLE `faculty_qualification` (
  `name` varchar(80) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `institute` varchar(80) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_qualification`
--

INSERT INTO `faculty_qualification` (`name`, `qualification`, `institute`, `entity`) VALUES
('Alice Smith', 'Ph.D. in Electrical Engineering', 'ElectroTech Institute', 'CSED'),
('Bob Johnson', 'Ph.D. in Electronics and Communication', 'Institute of Electronics', 'ECED'),
('Charlie Brown', 'Ph.D. in Electrical Engineering', 'Renewable Energy University', 'EEED'),
('David Wilson', 'Ph.D. in Mechanical Engineering', 'Mechanical Excellence Institute', 'MED'),
('Emma White', 'MBA in Administration', 'Business Leaders School', ''),
('Frank Miller', 'Masters in Civil Engineering', 'Civil Engineers Academy', 'CED'),
('Grace Davis', 'Masters in Computer Science', 'Tech Masters Institute', 'CSED'),
('Henry Clark', 'Masters in Electronics Engineering', 'Electronics Innovators School', 'ECED'),
('Jane Doe', 'Ph.D. in Computer Science', 'Tech Innovate University', 'CED'),
('John Doe', 'Ph.D. in Civil Engineering', 'University of Excellence', '');

-- --------------------------------------------------------

--
-- Table structure for table `other_services`
--

CREATE TABLE `other_services` (
  `staff` varchar(80) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_services`
--

INSERT INTO `other_services` (`staff`, `title`, `entity`) VALUES
('John Doe', 'Organized Blood Donation Camp for the community', ''),
('Jane Doe', 'Coordinated Cultural Fest - \"Expressions\"', 'CED'),
('Alice Smith', 'Initiated Coding Bootcamp for students', 'CSED'),
('Bob Johnson', 'Hosted Hackathon - \"Code Challenge 2023\"', 'ECED'),
('Charlie Brown', 'Conducted Energy Conservation Workshop', 'EEED'),
('David Wilson', 'Facilitated Mechanical Design Seminar', 'MED'),
('Kelly Thompson', 'Provided Career Guidance Sessions', ''),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patents`
--

INSERT INTO `patents` (`staff`, `title`, `year`, `entity`) VALUES
('John Doe', 'Smart Bridge Monitoring System', '2023', ''),
('Jane Doe', 'Automated Code Review System', '2023', 'CED'),
('Alice Smith', 'Wireless Energy Transmission Technology', '2023', 'CSED'),
('Bob Johnson', 'Flexible OLED Display Technology', '2023', 'ECED'),
('Charlie Brown', 'Hybrid Renewable Energy System', '2023', 'EEED'),
('David Wilson', 'Advanced Gearless Transmission System', '2023', 'MED'),
('Kelly Thompson', 'Innovative Solar Panel Design', '2023', ''),
('Larry White', 'Blockchain-based Urban Planning System', '2023', 'CED'),
('Mia Adams', 'Intelligent Traffic Control System', '2023', 'CSED'),
('Nathan Wilson', 'Autonomous Drone Delivery Mechanism', '2023', 'ECED');

-- --------------------------------------------------------

--
-- Table structure for table `student_achievements`
--

CREATE TABLE `student_achievements` (
  `name` varchar(80) NOT NULL,
  `achievement` varchar(800) NOT NULL,
  `entity` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_achievements`
--

INSERT INTO `student_achievements` (`name`, `achievement`, `entity`) VALUES
('John Doe', 'Recipient of Outstanding Research Paper Award', ''),
('Jane Doe', 'Winner of Inter-College Coding Competition', 'CED'),
('Alice Smith', 'Published Research Paper in Top Computer Science Journal', 'CSED'),
('Bob Johnson', 'First Prize in Electronics Project Expo', 'ECED'),
('Charlie Brown', 'Champion of Energy Conservation Challenge', 'EEED'),
('David Wilson', 'Excellence in Mechanical Engineering Design Competition', 'MED'),
('Nora Turner', 'Best Poster Presentation Award', ''),
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
