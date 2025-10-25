-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2024 at 06:09 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ip`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmaster`
--

DROP TABLE IF EXISTS `adminmaster`;
CREATE TABLE IF NOT EXISTS `adminmaster` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` text NOT NULL,
  `ContactNo` text NOT NULL,
  `Email` text NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmaster`
--

INSERT INTO `adminmaster` (`AdminId`, `FullName`, `ContactNo`, `Email`, `UserName`, `Password`) VALUES
(1, 'Lakdawala Uzair Zahid', '8980235121', 'lakdawalauzair14@gmail.co.in', 'UzairLk', '123');

-- --------------------------------------------------------

--
-- Table structure for table `approvalcandidate`
--

DROP TABLE IF EXISTS `approvalcandidate`;
CREATE TABLE IF NOT EXISTS `approvalcandidate` (
  `ApprovalId` int(11) NOT NULL AUTO_INCREMENT,
  `IpId` int(11) NOT NULL,
  `CandidateId` int(11) NOT NULL,
  `ApprovalDate` date NOT NULL,
  PRIMARY KEY (`ApprovalId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidatemaster`
--

DROP TABLE IF EXISTS `candidatemaster`;
CREATE TABLE IF NOT EXISTS `candidatemaster` (
  `CandidateId` int(11) NOT NULL AUTO_INCREMENT,
  `InternId` int(11) NOT NULL,
  `IpId` int(11) NOT NULL,
  `ApplyDate` date NOT NULL,
  `Status` text NOT NULL,
  PRIMARY KEY (`CandidateId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidatemaster`
--

INSERT INTO `candidatemaster` (`CandidateId`, `InternId`, `IpId`, `ApplyDate`, `Status`) VALUES
(4, 1, 2, '2024-02-29', 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

DROP TABLE IF EXISTS `certification`;
CREATE TABLE IF NOT EXISTS `certification` (
  `CertificationId` int(11) NOT NULL AUTO_INCREMENT,
  `InternId` int(11) NOT NULL,
  `CourseName` text NOT NULL,
  `IssuerDate` date NOT NULL,
  `Organization` text NOT NULL,
  `Entra` text NOT NULL,
  PRIMARY KEY (`CertificationId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`CertificationId`, `InternId`, `CourseName`, `IssuerDate`, `Organization`, `Entra`) VALUES
(3, 1, 'ASP.NET', '2024-02-06', 'Microsoft', 'PHP - March 2023.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
CREATE TABLE IF NOT EXISTS `colleges` (
  `CollegeId` int(11) NOT NULL AUTO_INCREMENT,
  `CollegeName` text NOT NULL,
  `CourseId` int(11) NOT NULL,
  `Affilieted` text NOT NULL,
  PRIMARY KEY (`CollegeId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`CollegeId`, `CollegeName`, `CourseId`, `Affilieted`) VALUES
(3, 'IQRA BCA COLLEGE', 25, 'VNSGU'),
(4, 'MK COLLEGE', 28, 'VNSGU'),
(5, 'Narmada College', 31, 'VNSGU'),
(6, 'Iqra College', 27, 'Vidhyadeep College'),
(7, 'Parul College', 32, 'Varul Univaercity');

-- --------------------------------------------------------

--
-- Table structure for table `companymaster`
--

DROP TABLE IF EXISTS `companymaster`;
CREATE TABLE IF NOT EXISTS `companymaster` (
  `CompanyId` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` text NOT NULL,
  `FoundedDate` date NOT NULL,
  `Revenue` float NOT NULL,
  `AboutCompany` text NOT NULL,
  `CEO` text NOT NULL,
  `OwnerName` text NOT NULL,
  `Address` text NOT NULL,
  `ContactNo` text NOT NULL,
  `Email` text NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `Photo` text NOT NULL,
  PRIMARY KEY (`CompanyId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companymaster`
--

INSERT INTO `companymaster` (`CompanyId`, `CompanyName`, `FoundedDate`, `Revenue`, `AboutCompany`, `CEO`, `OwnerName`, `Address`, `ContactNo`, `Email`, `UserName`, `Password`, `Photo`) VALUES
(1, 'MICROSOFT', '2024-02-29', 2500000, '', 'BILL GATES', 'BILL GATES', 'BHARUCH', '9658745878', 'microsoft@gmail.com', 'microsoft', '123', 'microsoft.png');

-- --------------------------------------------------------

--
-- Table structure for table `companyreview`
--

DROP TABLE IF EXISTS `companyreview`;
CREATE TABLE IF NOT EXISTS `companyreview` (
  `ReviewId` int(11) NOT NULL AUTO_INCREMENT,
  `InternId` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Ratings` int(11) NOT NULL,
  `ReviewDate` datetime NOT NULL,
  PRIMARY KEY (`ReviewId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyreview`
--

INSERT INTO `companyreview` (`ReviewId`, `InternId`, `CompanyId`, `Comment`, `Ratings`, `ReviewDate`) VALUES
(4, 1, 1, 'Hello this is best company ever', 5, '2024-03-05 05:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `coursemaster`
--

DROP TABLE IF EXISTS `coursemaster`;
CREATE TABLE IF NOT EXISTS `coursemaster` (
  `CourseId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseName` text NOT NULL,
  `Stream` text NOT NULL,
  PRIMARY KEY (`CourseId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursemaster`
--

INSERT INTO `coursemaster` (`CourseId`, `CourseName`, `Stream`) VALUES
(25, 'BCA', 'Science'),
(27, 'BSc. Computer Science', 'Science'),
(28, 'Bachelor of Commerce', 'Commerce'),
(30, 'Bachelor of Arts', 'Arts'),
(31, 'BBA', 'Arts'),
(32, 'BTech', 'Science'),
(33, 'LLB', 'Arts'),
(34, 'LLM', 'Commerce'),
(35, 'BPharm', 'Arts'),
(36, 'Bachelor of Education', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `educationmaster`
--

DROP TABLE IF EXISTS `educationmaster`;
CREATE TABLE IF NOT EXISTS `educationmaster` (
  `EducationId` int(11) NOT NULL AUTO_INCREMENT,
  `InternId` int(11) NOT NULL,
  `CourseName` text NOT NULL,
  `Percentage` text NOT NULL,
  `EnomName` text NOT NULL,
  `Semester` text NOT NULL,
  PRIMARY KEY (`EducationId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educationmaster`
--

INSERT INTO `educationmaster` (`EducationId`, `InternId`, `CourseName`, `Percentage`, `EnomName`, `Semester`) VALUES
(2, 1, 'BCA', '78', 'Winter 2023', 'Sem 2');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedbackId` int(11) NOT NULL AUTO_INCREMENT,
  `IngternId` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `FeedbackDate` datetime NOT NULL,
  PRIMARY KEY (`FeedbackId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackId`, `IngternId`, `Comment`, `FeedbackDate`) VALUES
(1, 1, 'Hello', '2024-03-06 17:06:10'),
(2, 1, 'Hello this is best website', '2024-03-06 17:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

DROP TABLE IF EXISTS `inquiry`;
CREATE TABLE IF NOT EXISTS `inquiry` (
  `InquiryId` int(11) NOT NULL AUTO_INCREMENT,
  `InternId` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Status` text NOT NULL,
  `InquiryDate` date NOT NULL,
  `IPId` int(11) NOT NULL,
  PRIMARY KEY (`InquiryId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`InquiryId`, `InternId`, `Message`, `Status`, `InquiryDate`, `IPId`) VALUES
(2, 1, 'Hello its me again', 'UnRead', '2024-03-05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `internmaster`
--

DROP TABLE IF EXISTS `internmaster`;
CREATE TABLE IF NOT EXISTS `internmaster` (
  `InternId` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` text NOT NULL,
  `CourseId` int(11) NOT NULL,
  `Address` text NOT NULL,
  `Gender` text NOT NULL,
  `DOB` date NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `ContactNo` text NOT NULL,
  `Email` text NOT NULL,
  PRIMARY KEY (`InternId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internmaster`
--

INSERT INTO `internmaster` (`InternId`, `FullName`, `CourseId`, `Address`, `Gender`, `DOB`, `CollegeId`, `UserName`, `Password`, `ContactNo`, `Email`) VALUES
(1, 'UZAIR LAKDAWALA BHAI', 25, 'HUSENIYA SOCIETY', 'Male', '2024-02-28', 3, 'UZAIR', '1234', '9854785478', 'uzair@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `internprogram`
--

DROP TABLE IF EXISTS `internprogram`;
CREATE TABLE IF NOT EXISTS `internprogram` (
  `IpId` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyId` int(11) NOT NULL,
  `Title` text NOT NULL,
  `JobDescription` text NOT NULL,
  `Salary` text NOT NULL,
  `Requirement` text NOT NULL,
  `LastDate` date NOT NULL,
  `Category` text NOT NULL,
  PRIMARY KEY (`IpId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internprogram`
--

INSERT INTO `internprogram` (`IpId`, `CompanyId`, `Title`, `JobDescription`, `Salary`, `Requirement`, `LastDate`, `Category`) VALUES
(2, 1, 'PHP Developer', 'PHP Developer', '25,000 - 30,000', 'Core PHP', '2024-02-29', 'Web & Software Dev');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `NotificationId` int(11) NOT NULL AUTO_INCREMENT,
  `IpId` int(11) NOT NULL,
  `Message` text NOT NULL,
  `NotificationDateTime` datetime NOT NULL,
  PRIMARY KEY (`NotificationId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationId`, `IpId`, `Message`, `NotificationDateTime`) VALUES
(1, 2, 'Hello this is to announce that is good', '2024-03-05 04:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `personaldatail`
--

DROP TABLE IF EXISTS `personaldatail`;
CREATE TABLE IF NOT EXISTS `personaldatail` (
  `PId` int(11) NOT NULL AUTO_INCREMENT,
  `InternId` int(11) NOT NULL,
  `FatherName` text NOT NULL,
  `MotherName` text NOT NULL,
  `LanguageKnown` text NOT NULL,
  `Natianility` text NOT NULL,
  `Religion` text NOT NULL,
  `Cast` text NOT NULL,
  PRIMARY KEY (`PId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personaldatail`
--

INSERT INTO `personaldatail` (`PId`, `InternId`, `FatherName`, `MotherName`, `LanguageKnown`, `Natianility`, `Religion`, `Cast`) VALUES
(2, 1, 'KAYYAUM BHAI', 'MARYAM BEN ', 'Hindi, English', 'INDIAN', 'MUSLIM', 'SUNNI');

-- --------------------------------------------------------

--
-- Table structure for table `shortlistmaster`
--

DROP TABLE IF EXISTS `shortlistmaster`;
CREATE TABLE IF NOT EXISTS `shortlistmaster` (
  `ShortlistId` int(11) NOT NULL AUTO_INCREMENT,
  `CandidateId` int(11) NOT NULL,
  `ShortlistDate` date NOT NULL,
  `IpId` int(11) NOT NULL,
  PRIMARY KEY (`ShortlistId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortlistmaster`
--

INSERT INTO `shortlistmaster` (`ShortlistId`, `CandidateId`, `ShortlistDate`, `IpId`) VALUES
(1, 1, '2024-03-05', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
