-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2024 at 05:38 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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
  `AdminId` int NOT NULL AUTO_INCREMENT,
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
(1, 'Lakdawala Uzair', '8980235120', 'lakdawalauzair03@gmail.com', 'Admin', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `candidatemaster`
--

DROP TABLE IF EXISTS `candidatemaster`;
CREATE TABLE IF NOT EXISTS `candidatemaster` (
  `CandidateId` int NOT NULL AUTO_INCREMENT,
  `InternId` int NOT NULL,
  `IpId` int NOT NULL,
  `ApplyDate` date NOT NULL,
  `Status` text NOT NULL,
  PRIMARY KEY (`CandidateId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidatemaster`
--

INSERT INTO `candidatemaster` (`CandidateId`, `InternId`, `IpId`, `ApplyDate`, `Status`) VALUES
(1, 1, 1, '2024-03-18', 'Intern'),
(2, 1, 6, '2024-03-18', 'Intern'),
(3, 2, 2, '2024-03-18', 'Intern'),
(4, 2, 14, '2024-03-18', 'Intern'),
(5, 3, 25, '2024-03-18', 'Intern'),
(6, 3, 27, '2024-03-18', 'Intern'),
(7, 4, 18, '2024-03-18', 'Intern'),
(8, 4, 26, '2024-03-18', 'Intern'),
(9, 5, 7, '2024-03-18', 'Intern'),
(10, 5, 40, '2024-03-18', 'Intern'),
(11, 6, 31, '2024-03-18', 'Intern'),
(12, 6, 32, '2024-03-18', 'Intern'),
(13, 7, 4, '2024-03-18', 'Intern'),
(14, 7, 16, '2024-03-18', 'Intern'),
(15, 8, 5, '2024-03-18', 'Intern'),
(16, 8, 11, '2024-03-18', 'Intern'),
(17, 9, 33, '2024-03-18', 'Intern'),
(18, 9, 39, '2024-03-18', 'Intern'),
(19, 10, 9, '2024-03-18', 'Intern'),
(20, 10, 22, '2024-03-18', 'Intern'),
(21, 11, 1, '2024-03-19', 'Intern'),
(22, 11, 6, '2024-03-19', 'Intern'),
(23, 12, 2, '2024-03-19', 'Intern'),
(24, 12, 14, '2024-03-19', 'Intern'),
(25, 13, 25, '2024-03-19', 'Intern'),
(26, 13, 27, '2024-03-19', 'Intern'),
(27, 14, 18, '2024-03-19', 'Intern'),
(28, 14, 26, '2024-03-19', 'Intern'),
(29, 15, 7, '2024-03-19', 'Intern'),
(30, 15, 40, '2024-03-19', 'Intern'),
(31, 16, 31, '2024-03-19', 'Intern'),
(32, 16, 32, '2024-03-19', 'Intern'),
(33, 17, 4, '2024-03-19', 'Intern'),
(34, 17, 16, '2024-03-19', 'Intern'),
(35, 18, 5, '2024-03-19', 'Intern'),
(36, 18, 11, '2024-03-19', 'Intern'),
(37, 19, 33, '2024-03-19', 'Intern'),
(38, 19, 39, '2024-03-19', 'Intern'),
(39, 20, 9, '2024-03-19', 'Intern'),
(40, 20, 22, '2024-03-19', 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

DROP TABLE IF EXISTS `certification`;
CREATE TABLE IF NOT EXISTS `certification` (
  `CertificationId` int NOT NULL AUTO_INCREMENT,
  `InternId` int NOT NULL,
  `CourseName` text NOT NULL,
  `IssuerDate` date NOT NULL,
  `Organization` text NOT NULL,
  `Entra` text NOT NULL,
  PRIMARY KEY (`CertificationId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`CertificationId`, `InternId`, `CourseName`, `IssuerDate`, `Organization`, `Entra`) VALUES
(1, 1, 'PHP', '2024-01-02', 'ACCENTURE', 'accenture.pdf'),
(2, 2, 'TALLY', '2024-02-08', 'ADP', 'adp.pdf'),
(3, 3, 'ECONOMICS', '2024-01-15', 'CAPGEMINI', 'capgemini.pdf'),
(4, 4, 'NURSING', '2024-01-18', 'DELOITTE', 'deloitte.pdf'),
(5, 5, 'FINANCIAL ACCOUNING', '2024-02-15', 'EY', 'ey.pdf'),
(6, 6, 'CRIMINAL', '2024-03-01', 'GANPACT', 'ganpact.pdf'),
(7, 7, 'PAEDIATRICS', '2024-02-22', 'IBM', 'ibm.pdf'),
(8, 8, 'CS EXECUTIVE', '2024-03-03', 'INFOSYS', 'infosys.pdf'),
(9, 9, 'GEOGRAPHY', '2024-01-27', 'INTEL', 'intel.pdf'),
(10, 10, 'ANATOMY', '2024-02-26', 'INTUIT', 'intuit.pdf'),
(11, 11, 'ASP.NET', '2024-02-28', 'MACY\'S', 'macy\'s.pdf'),
(12, 12, 'INSURANCE', '2024-01-04', 'MICROSOFT', 'microsoft.pdf'),
(13, 13, 'HISTORY', '2024-02-07', 'NATIONWIDE', 'nationwide.pdf'),
(14, 14, 'MICROBIALOGY', '2024-03-20', 'RELIANCE', 'reliance.pdf'),
(15, 15, 'MANAGEMENT', '2024-01-19', 'SAP', 'sap.pdf'),
(16, 16, 'BANKING', '2024-01-31', 'TCS', 'tcs.pdf'),
(17, 17, 'ORTHOPEDICS', '2024-01-04', 'THOMSON', 'thomson.pdf'),
(18, 18, 'PHP', '2024-02-22', 'UNICEF', 'unicef.pdf'),
(19, 19, 'AUDITING', '2024-02-25', 'UNIDO', 'unido.pdf'),
(20, 20, 'MARKETING', '2024-03-12', 'USAA', 'usaa.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
CREATE TABLE IF NOT EXISTS `colleges` (
  `CollegeId` int NOT NULL AUTO_INCREMENT,
  `CollegeName` text NOT NULL,
  `CourseId` int NOT NULL,
  `Affilieted` text NOT NULL,
  PRIMARY KEY (`CollegeId`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`CollegeId`, `CollegeName`, `CourseId`, `Affilieted`) VALUES
(1, 'IQRA BCA COLLEGE', 1, 'VEER NARMAD SOUTH GUJARAT UNIVERSITY'),
(2, 'M.K COLLEGE', 2, 'PARUL UNIVERSITY'),
(3, 'NARMADA COLLEGE', 3, 'P P SAVANI UNIVERSITY'),
(4, 'VALLABH VIDYANAGAR COLLEGE', 4, 'SARDAR PATEL UNIVERSITY'),
(5, 'M.S COLLEGE', 5, 'VIDHYADEEP UNIVERSITY'),
(6, 'M.K COLLEGE', 6, 'VEER NARMAD SOUTH GUJARAT UNIVERSITY'),
(7, 'GMERS MEDICAL COLLEGE', 7, 'SAURASTRA UNIVERSITY'),
(8, 'M.S COLLEGE', 8, 'PARUL UNIVERSITY'),
(9, 'VALLABH VIDYANAGAR COLLEGE', 9, 'P P SAVANI UNIVERSITY'),
(10, 'GMERS MEDICAL COLLEGE', 10, 'SAURASTRA UNIVERSITY'),
(11, 'M.K COLLEGE', 1, 'SARDAR PATEL UNIVERSITY'),
(12, 'NARMADA COLLEGE', 2, 'VIDHYADEEP UNIVERSITY'),
(13, 'VALLABH VIDYANAGAR COLLEGE', 3, 'VEER NARMAD SOUTH GUJARAT UNIVERSITY'),
(14, 'IQRA BCA COLLEGE', 4, 'PARUL UNIVERSITY'),
(15, 'VALLABH VIDYANAGAR COLLEGE', 5, 'P P SAVANI UNIVERSITY'),
(16, 'NARMADA COLLEGE', 6, 'SARDAR PATEL UNIVERSITY'),
(17, 'M.K COLLEGE', 8, 'VIDHYADEEP UNIVERSITY'),
(18, 'M.S COLLEGE', 9, 'VEER NARMAD SOUTH GUJARAT UNIVERSITY'),
(19, 'IQRA BCA COLLEGE', 5, 'PARUL UNIVERSITY'),
(20, 'NARMADA COLLEGE', 1, 'P P SAVANI UNIVERSITY'),
(21, 'VALLABH VIDYANAGAR COLLEGE', 2, 'SARDAR PATEL UNIVERSITY'),
(22, 'M.S COLLEGE', 3, 'VIDHYADEEP UNIVERSITY'),
(23, 'M.K COLLEGE', 4, 'VEER NARMAD SOUTH GUJARAT UNIVERSITY'),
(24, 'NARMADA COLLEGE', 5, 'PARUL UNIVERSITY'),
(25, 'VALLABH VIDYANAGAR COLLEGE', 1, 'P P SAVANI UNIVERSITY'),
(26, 'NARMADA COLLEGE', 8, 'SARDAR PATEL UNIVERSITY'),
(27, 'M.S COLLEGE', 2, 'VIDHYADEEP UNIVERSITY'),
(28, 'M.K COLLEGE', 3, 'VEER NARMAD SOUTH GUJARAT UNIVERSITY'),
(29, 'NARMADA COLLEGE', 4, 'PARUL UNIVERSITY'),
(30, 'VALLABH VIDYANAGAR COLLEGE', 8, 'P P SAVANI UNIVERSITY');

-- --------------------------------------------------------

--
-- Table structure for table `companymaster`
--

DROP TABLE IF EXISTS `companymaster`;
CREATE TABLE IF NOT EXISTS `companymaster` (
  `CompanyId` int NOT NULL AUTO_INCREMENT,
  `CompanyName` text NOT NULL,
  `FoundedDate` date NOT NULL,
  `Revenue` text NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companymaster`
--

INSERT INTO `companymaster` (`CompanyId`, `CompanyName`, `FoundedDate`, `Revenue`, `AboutCompany`, `CEO`, `OwnerName`, `Address`, `ContactNo`, `Email`, `UserName`, `Password`, `Photo`) VALUES
(1, 'ACCENTURE', '1989-03-02', '1B', 'Accenture plc is an Irish-American professional services company based in Dublin, specializing in information technology services and consulting.', 'Julie Sweet', 'Julie Sweet', 'Headquarters at 1 Grand Canal Square, Dublin', '9017828926', 'accenture@gmail.com', 'ACCENTURE', '8926', 'Accenture.png'),
(2, 'ADP', '1949-03-10', '24M', 'Automatic Data Processing, Inc. is an American provider of human resources management software and services, headquartered in Roseland, New Jersey.', 'Maria Black', 'Maria Black', 'Roseland, New Jersey, United States', '8945619054', 'adp@gmail.com', 'ADP', '9054', 'Adp.png'),
(3, 'CAPGEMINI', '1967-10-01', '65M', 'Capgemini SE is a French multinational information technology services and consulting company, headquartered in Paris, France.', 'Aiman Ezzat', 'Aiman Ezzat', 'Grenoble, Paris - France', '7089960499', 'capgemini@gmail.com', 'CAPGEMINI', '0499', 'Capgemini.png'),
(4, 'DALOITTE', '2005-08-19', '36K', 'Deloitte uses strictly necessary cookies and similar technologies to operate this website and to provide you with a more personalized user experience. ', 'Bharat Ramchandani', 'Bharat Ramchandani', '31, Nutan Bharat Society, Alkapuri, Vadodara', '6523303776', 'deloitte@gmail.com', 'DALOITTE', '3776', 'Deloitte.png'),
(5, 'GANPACT', '1997-05-05', '1M', 'Genpact is a professional services firm legally domiciled in Bermuda with its headquarters in New York City, New York. ', 'NV Tyagarajan', 'NV Tyagarajan', 'New York, United States', '7924089451', 'ganpact@gmail.com', 'GANPACT', '9451', 'Ganpact.png'),
(6, 'IBM', '1911-06-16', '80M', 'The International Business Machines Corporation, nicknamed Big Blue, is an American multinational technology company headquartered in Armonk, New York and present in over 175 countries.', 'Arvind Krishna', 'Arvind Krishna', 'Armonk, New York, United States', '7342932160', 'ibm@gmail.com', 'IBM', '2160', 'Ibm.png'),
(7, 'INFOSYS', '1981-07-19', '57M', 'Infosys Limited is an Indian multinational information technology company that provides business consulting, information technology and outsourcing services.', 'Salil Parekh', 'Salil Parekh', 'Bengaluru', '9824719190', 'infosys@gmail.com', 'INFOSYS', '9190', 'Infosys.png'),
(8, 'EY', '2001-11-30', '70K', 'EY helps clients create long-term value for all stakeholders. Enabled by data and technology, our services and solutions provide trust through assurance and help clients transform, grow and operate.', 'Vellayan Subbiah', 'Vellayan Subbiah', '22nd Floor, B Wing, Privilon, Ambli BRT Road, Ahmdabad', '7966083800', 'ey@gmail.com', 'EY', '3800', 'Ey.png'),
(9, 'INTEL', '2010-01-05', '245K', 'Intel Corporation is an American multinational corporation and technology company headquartered in Santa Clara, California, and incorporated in Delaware.', 'Patrick P. Gelsinger', 'Patrick P. Gelsinger', 'Santa Clara, California, United States', '8070299277', 'intel@gmail.com', 'INTEL', '9277', 'Intel.png'),
(10, 'INTUIT', '1993-04-05', '60M', 'Intuit Inc. is an American multinational business software company that specializes in financial software. ', 'Sasan K. Goodarzi', 'Sasan K. Goodarzi', 'Mountain View, California, United States', '7049560103', 'intuit@gmail.com', 'INTUIT', '0103', 'Intuit.png'),
(11, 'MICROSOFT', '2003-07-17', '48M', 'Microsoft Corporation is an American multinational corporation and technology company headquartered in Redmond, Washington.', 'Amy Hood', 'Amy Hood', 'Redmond, Washington, United States', '8079929788', 'microsoft@gmail.com', 'MICROSOFT', '9788', 'Microsoft.png'),
(12, 'NATIONWIDE', '1986-08-20', '16M', 'Nationwide Building Society is a British mutual financial institution, the seventh largest cooperative financial institution and the largest building society in the world with over 16 million members.', 'Debbie Crosbie', 'Debbie Crosbie', 'Swindon, United Kingdom', '7930656789', 'nationwide@gmail.com', 'NATIONWIDE', '6789', 'Nationwide.png'),
(13, 'RELIANCE', '1949-07-09', '81B', 'Reliance Industries Limited is an Indian multinational conglomerate headquartered in Mumbai.', 'Mukesh Ambani', 'Mukesh Ambani', 'Mumbai', '9077389414', 'reliance@gmail.com', 'RELIANCE', '9414', 'Reliance.png'),
(14, 'SAP', '1971-04-01', '64M', 'SAP SE is a German multinational software company based in Walldorf, Baden-WÃ¼rttemberg.', 'Klaus Tschira', 'Klaus Tschira', 'Walldorf, Germany', ' 8000490029', 'sap@gmail.com', 'SAP', '0029', 'Sap.png'),
(15, 'THOMSON', '2000-07-22', '27K', 'Thompson Company is a cigar and cigar accessories retailer located in Tampa, Florida. Thompson Cigar is the oldest mail order cigar company in the United States.', 'Scandinavian', 'Scandinavian', 'United Kingdom', '7900054890', 'thomson@gmail.com', 'THOMSON', '4890', 'Thomson.png'),
(16, 'UNIDO', '1959-07-09', '53K', 'The United Nations Industrial Development Organization is a specialized agency of the United Nations that assists countries in economic and industrial development.', 'Mark Tommy', 'Mark Tommy', 'Vienna, Austria', '9128072019', 'unido@gmail.com', 'UNIDO', '2019', 'Unido.png'),
(17, 'USAA', '1967-02-01', '13B', 'The United Services Automobile Association is an American financial services company providing insurance and banking products exclusively to members of the military, veterans, and their families.', 'James M. Zortman', 'James M. Zortman', 'San Antonio, Texas, United States', '8205318722', 'usaa@gmail.com', 'USAA', '8722', 'Usaa.png'),
(18, 'ADIDAS', '1949-08-18', '70B', 'Adidas AG is a German athletic apparel and footwear corporation headquartered in Herzogenaurach, Bavaria, Germany.', 'BjÃ¸rn Gulden', 'BjÃ¸rn Gulden', 'Herzogenaurach, Germany', '8301203300', 'adidas@gmail.com', 'ADIDAS', '3300', 'Adidas.png'),
(19, 'AMAZON', '1994-07-05', '120M', 'Amazon.com, Inc., doing business as Amazon, is an American multinational corporation and technology company focusing on e-commerce, cloud computing, online advertising, digital streaming, and artificial intelligence.', 'Andy Jassy', 'Andy Jassy', 'Seattle, Washington, United States', '9819941995', 'amazon@gmail.com', 'AMAZON', '1995', 'Amazon.png'),
(20, 'BNY MELLON', '1981-03-05', '890K', 'The Bank of New York Mellon Corporation, commonly known as BNY Mellon, is an American banking and financial services corporation headquartered in New York City.', 'Robin Vince', 'Robin Vince', 'New York, United States', '8009718047', 'bnymellon@gmail.com', 'BNY MELLON', '8047', 'Bny Mellon.png'),
(21, 'CAPITAL ONE', '1994-03-01', '89M', 'Capital OneÂ® offers a broad array of financial products and services to consumers, small businesses and commercial clients in the U.S., Canada and the UK.', 'John McLane', 'John McLane', 'McLean, Virginia, United States', '8508002021', 'capitalone@gmail.com', 'CAPITAL ONE', '2021', 'CapitalOne.png'),
(22, 'GOLDMAN SACHS', '1979-06-16', '80K', 'The Goldman Sachs Group, Inc. is a leading global investment banking, securities and investment management firm that provides a wide range of financial ...', 'David M. Solomon', 'David M. Solomon', 'Mansitoglen, USA', '8900189200', 'goldmansachs@gmail.com', 'GOLDMAN SACHS', '9200', 'Goldman Sachs.png'),
(23, 'GOOGLE', '1998-09-04', '45B', 'Google LLC is an American multinational corporation and technology company focusing on online advertising.', 'Sundar Pichai', 'Sundar Pichai', 'Menlo Park, California, United States', '8040901998', 'google@gmail.com', 'GOOGLE', '1998', 'Google.png'),
(24, 'GRUBHUB', '2004-06-25', '77M', 'Grubhub Inc. is an American online and mobile prepared food ordering and delivery platform based in Chicago, Illinois. Founded in 2004, it is a subsidiary of the Dutch company Just Eat Takeaway since 2021.', 'Matt Maloney', 'Matt Maloney', 'Chicago, Illinois, United States', '9210978090', 'grubhub@gmail.com', 'GRUBHUB', '8090', 'Grubhub.png'),
(25, 'PUMA', '1948-09-30', '42B', 'Puma SE is a German multinational corporation that designs and manufactures athletic and casual footwear, apparel, and accessories, headquartered in Herzogenaurach, Bavaria, Germany.', 'Rudolf Dassler', 'Rudolf Dassler', 'Herzogenaurach, Germany', '8701027862', 'puma@gmail.com', 'PUMA', '7862', 'Puma.png'),
(26, 'VISA', '1957-09-16', '25M', 'Visa Inc. is an American multinational payment card services corporation headquartered in San Francisco, California.', 'Dee Hock', 'Dee Hock', 'San Francisco, California, United States', '8667659644', 'visa@gmail.com', 'VISA', '9644', 'Visa.png'),
(27, 'HUBLOT', '2010-11-30', '49M', 'Hublot is a Swiss luxury watchmaker founded in 1980 by Italian Carlo Crocco.', 'Ricardo Guadalupe', 'Ricardo Guadalupe', 'Geneva, Switzerland', '8702901256', 'hublot@gmail.com', 'HUBLOT', '1256', 'Hublot.png'),
(28, 'NIKE', '1964-01-24', '800M', 'Nike, Inc. is an American athletic footwear and apparel corporation headquartered near Beaverton, Oregon, United States.', 'Bill Bowerman', 'Bill Bowerman', 'Beaverton, Oregon, United States', '8101026453', 'nike@gmail.com', 'NIKE', '6453', 'Nike.png'),
(29, 'REEBOK', '1993-05-20', '90M', 'Reebok International Limited is an American fitness footwear and clothing brand that is a part of Authentic Brands Group.', 'Todd Krinsky', 'Todd Krinsky', 'Boston, Massachusetts, United States', '9821001895', 'reebok@gmail.com', 'REEBOK', '1895', 'Reebok.png'),
(30, 'ROLEX', '2006-11-08', '90B', 'Rolex watches are crafted from the finest raw materials and assembled with scrupulous attention to detail. Discover the Rolex collection on rolex.com.', 'Hans Wilsdorf', 'Hans Wilsdorf', 'Geneva, Switzerland', '8019051919', 'rolex@gmail.com', 'ROLEX', '1919', 'Rolex.png'),
(31, 'BARCLAYS', '1907-11-17', '99B', 'Barclays plc is a British multinational universal bank, headquartered in London, England. Barclays operates as two divisions, Barclays UK and Barclays International, supported by a service company, Barclays Execution Services.', 'C. S. Venkatakrishnan', 'C. S. Venkatakrishnan', 'City of London, United Kingdom', '7018961985', 'barclays@gmail.com', 'BARCLAYS', '1985', 'Barclays.png'),
(32, 'CFI', '2014-01-01', '20M', 'Corporate Finance Institute is an online training and education platform for finance and investment professionals, providing courses and certifications in financial modeling, valuation, and other corporate finance topics.', 'Mc Jordan', 'Mc Jordan', 'Vancouver, Canada', '9178267890', 'cfi@gmail.com', 'CFI', '7890', 'Cfi.png'),
(33, 'FEDEX', '1971-05-05', '700K', 'FedEx Corporation, formerly Federal Express Corporation and later FDX Corporation, is an American multinational conglomerate holding company focused on transportation, e-commerce and business services based in Memphis, Tennessee.', 'Frederick W. Smith', 'Frederick W. Smith', 'Memphis, Tennessee, United States', '8102096161', 'fedex@gmail.com', 'FEDEX', '6161', 'Fedex.png'),
(34, 'HUBSPOT', '1977-08-27', '100M', 'HubSpot, Inc. is an American developer and marketer of software products for inbound marketing, sales, and customer service.', 'Yamini Rangan', 'Yamini Rangan', 'Cambridge, Massachusetts, United States', '9988707021', 'hubspot@gmail.com', 'HUBSPOT', '7021', 'Hubspot.png'),
(35, 'INSPERITY', '1986-05-14', '50M', 'Insperity, Inc., previously known as Administaff, Inc., is a professional employer organization headquartered in Kingwood, an area of Houston.', 'Paul J. Sarvadi', 'Paul J. Sarvadi', 'Houston, Texas, United States', '8872190901', 'insperity@gmail.com', 'INSPERITY', '0901', 'Insperity.png'),
(36, 'ONBOARD', '2003-11-20', '1.80M', 'OnBoard is board management software that reduces complexity so boards and leadership teams can work smarter, move faster, and achieve more.', 'Raj Rathva', 'Raj Rathva', 'Massachusetts, United States', '9017809025', 'onboard@gmail.com', 'ONBOARD', '9025', 'Onboard.png'),
(37, 'PASSAGEWAYS', '1952-08-08', '9.20B', 'Passageways LLC operates as a SaaS provider of collaboration solutions for boards and employees. ', 'Manav Randhava', 'Manav Randhava', 'Texas, United States', '8090011367', 'passageways@gmail.com', 'PASSAGEWAYS', '1367', 'Passageways.png'),
(38, 'SHIPWAY', '1965-04-10', '81M', 'Shipway Auto-pilotâ€‹. Automate your order assignment & increase delivery %; Configure orders according to SKUs, weight range, invoice value, nearest warehouse ...', 'Abhirnav Oberoi', 'Abhirnav Oberoi', 'Calgory, Canada', '8980217891', 'shipway@gmail.com', 'SHIPWAY', '7891', 'Shipway.png'),
(39, 'SYDLE', '1970-03-13', '28M', 'SYDLE embraces digital transformation. SYDLE ONE combines solutions for Process Automation, Content Management, CRM, Service Desk & more. Try it out.', 'Rokky Been K', 'Rokky Been K', 'Latin America', '7048101250', 'sydle@gmail.com', 'SYDLE', '1250', 'Sydle.png'),
(40, 'WHATFIX', '2009-03-05', '55M', 'Whatfix is a SaaS based digital adoption platform that provides organizations with a no-code editor to create in-app guidance and self-help support on any application that looks 100% native.', 'San Jose', 'San Jose', 'California and Bengaluru', '9450041000', 'whatfix@gmail.com', 'WHATFIX', '1000', 'Whatfix.png');

-- --------------------------------------------------------

--
-- Table structure for table `companyreview`
--

DROP TABLE IF EXISTS `companyreview`;
CREATE TABLE IF NOT EXISTS `companyreview` (
  `ReviewId` int NOT NULL AUTO_INCREMENT,
  `InternId` int NOT NULL,
  `CompanyId` int NOT NULL,
  `Comment` text NOT NULL,
  `Ratings` int NOT NULL,
  `ReviewDate` datetime NOT NULL,
  PRIMARY KEY (`ReviewId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyreview`
--

INSERT INTO `companyreview` (`ReviewId`, `InternId`, `CompanyId`, `Comment`, `Ratings`, `ReviewDate`) VALUES
(1, 1, 1, 'Good company to work If you work ACCENTURE.', 5, '2024-03-18 07:51:38'),
(2, 1, 6, 'Good company to work If you work IBM.', 4, '2024-03-18 07:54:45'),
(3, 2, 2, 'Good company to work If you work ADP.', 5, '2024-03-18 08:01:47'),
(4, 2, 14, 'Good company to work If you work SAP.', 4, '2024-03-18 08:03:25'),
(5, 3, 25, 'Good company to work If you work PUMA.', 4, '2024-03-18 08:05:30'),
(6, 3, 27, 'Good company to work If you work HUBLOT.', 5, '2024-03-18 08:07:20'),
(7, 4, 18, 'Good company to work If you work ADIDAS.', 4, '2024-03-18 08:09:01'),
(8, 4, 26, 'Good company to work If you work VISA.', 5, '2024-03-18 08:13:17'),
(9, 5, 7, 'Good company to work If you work INFOSYS.', 4, '2024-03-18 08:15:27'),
(10, 5, 40, 'Good company to work If you work WHATFIX.', 5, '2024-03-18 08:17:48'),
(11, 6, 31, 'Good company to work If you work BARCLAYS.', 5, '2024-03-18 10:40:38'),
(12, 6, 32, 'Good company to work If you work CFI.', 4, '2024-03-18 10:41:56'),
(13, 7, 4, 'Good company to work If you work DELOITTE.', 5, '2024-03-18 10:43:47'),
(14, 7, 16, 'Good company to work If you work UNIDO.', 5, '2024-03-18 10:45:10'),
(15, 8, 5, 'Good company to work If you work GANPACT.', 4, '2024-03-18 10:47:09'),
(16, 8, 11, 'Good company to work If you work MICROSOFT.', 5, '2024-03-18 10:49:22'),
(17, 9, 33, 'Good company to work If you work FEDEX', 5, '2024-03-18 10:51:13'),
(18, 9, 39, 'Good company to work If you work SYDLE.', 4, '2024-03-18 10:53:11'),
(19, 10, 9, 'Good company to work If you work INTEL.', 5, '2024-03-18 10:56:00'),
(20, 10, 22, 'Good company to work If you work GOLDMAN SACHS.', 3, '2024-03-18 10:57:38'),
(21, 11, 1, 'Good company to work If you work ACCENTURE.', 5, '2024-03-19 11:38:10'),
(22, 11, 6, 'Good company to work If you work IBM.', 4, '2024-03-19 11:39:23'),
(23, 12, 2, 'Good company to work If you work ADP.', 5, '2024-03-19 11:40:55'),
(24, 12, 14, 'Good company to work If you work SAP.', 4, '2024-03-19 11:42:04'),
(25, 13, 25, 'Good company to work If you work PUMA.', 5, '2024-03-19 11:44:01'),
(26, 13, 27, 'Good company to work If you work HUBLOT.', 4, '2024-03-19 11:45:06'),
(27, 14, 18, 'Good company to work If you work ADIDAS.', 5, '2024-03-19 11:47:07'),
(28, 14, 26, 'Good company to work If you work VISA.', 4, '2024-03-19 11:48:18'),
(29, 15, 7, 'Good company to work If you work INFOSYS.', 5, '2024-03-19 11:50:02'),
(30, 15, 40, 'Good company to work If you work WHATFIX.', 4, '2024-03-19 11:51:19'),
(31, 16, 31, 'Good company to work If you work BARCLAYS.', 5, '2024-03-19 11:55:52'),
(32, 16, 32, 'Good company to work If you work CFI.', 4, '2024-03-19 11:57:47'),
(33, 17, 4, 'Good company to work If you work DELOITTE.', 5, '2024-03-19 11:59:33'),
(34, 17, 16, 'Good company to work If you work UNIDO.', 4, '2024-03-19 12:00:33'),
(35, 18, 5, 'Good company to work If you work GANPACT.', 5, '2024-03-19 12:03:34'),
(36, 18, 11, 'Good company to work If you work MICROSOFT.', 4, '2024-03-19 12:04:53'),
(37, 19, 33, 'Good company to work If you work FEDEX.', 5, '2024-03-19 12:06:41'),
(38, 19, 39, 'Good company to work If you work SYDLE.', 4, '2024-03-19 12:08:08'),
(39, 20, 9, 'Good company to work If you work INTEL.', 5, '2024-03-19 12:09:33'),
(40, 20, 22, 'Good company to work If you work GOLDMAN SACHS.', 4, '2024-03-19 12:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `coursemaster`
--

DROP TABLE IF EXISTS `coursemaster`;
CREATE TABLE IF NOT EXISTS `coursemaster` (
  `CourseId` int NOT NULL AUTO_INCREMENT,
  `CourseName` text NOT NULL,
  `Stream` text NOT NULL,
  PRIMARY KEY (`CourseId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursemaster`
--

INSERT INTO `coursemaster` (`CourseId`, `CourseName`, `Stream`) VALUES
(1, 'BCA', 'Computer Science'),
(2, 'BCOM', 'Commerce'),
(3, 'BA', 'Arts'),
(4, 'BSC', 'Science'),
(5, 'BBA', 'Commerce'),
(6, 'LAW', 'Arts'),
(7, 'MBBS', 'Science'),
(8, 'C.S', 'Commerce'),
(9, 'B.ED', 'Arts'),
(10, 'BHMS', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `educationmaster`
--

DROP TABLE IF EXISTS `educationmaster`;
CREATE TABLE IF NOT EXISTS `educationmaster` (
  `EducationId` int NOT NULL AUTO_INCREMENT,
  `InternId` int NOT NULL,
  `CourseName` text NOT NULL,
  `Percentage` text NOT NULL,
  `ExamName` text NOT NULL,
  `Semester` text NOT NULL,
  PRIMARY KEY (`EducationId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educationmaster`
--

INSERT INTO `educationmaster` (`EducationId`, `InternId`, `CourseName`, `Percentage`, `ExamName`, `Semester`) VALUES
(1, 1, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '78', 'WINTER', 'SEM - 6'),
(2, 2, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '65', 'SUMMER', 'SEM - 6'),
(3, 3, '10th S.S.C BOARD -- 12th ARTS H.S.C BOARD', '81', 'SUMMER', 'SEM - 6'),
(4, 4, '10th S.S.C BOARD -- 12th SCIENCE H.S.C BOARD', '87', 'MONSOON', 'SEM - 6'),
(5, 5, '10th S.S.C BOARD -- 12th ARTS H.S.C BOARD', '56', 'WINTER', 'SEM - 6'),
(6, 6, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '60', 'SUMMER', 'SEM - 6'),
(7, 7, '10th S.S.C BOARD -- 12th SCIENCE H.S.C BOARD', '95', 'MONSOON', 'SEM - 6'),
(8, 8, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '54', 'WINTER', 'SEM - 6'),
(9, 9, '10th S.S.C BOARD -- 12th ARTS H.S.C BOARD', '79', 'MONSOON', 'SEM - 6'),
(10, 10, '10th S.S.C BOARD -- 12th SCIENCE H.S.C BOARD', '63', 'WINTER', 'SEM - 6'),
(11, 11, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '81', 'SUMMER', 'SEM - 6'),
(12, 12, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '72', 'SUMMER', 'SEM - 6'),
(13, 13, '10th S.S.C BOARD -- 12th ARTS H.S.C BOARD', '63', 'WINTER', 'SEM - 6'),
(14, 14, '10th S.S.C BOARD -- 12th SCIENCE H.S.C BOARD', '88', 'MONSOON', 'SEM - 6'),
(15, 15, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '61', 'SUMMER', 'SEM - 6'),
(16, 16, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '85', 'WINTER', 'SEM - 6'),
(17, 17, '10th S.S.C BOARD -- 12th SCIENCE H.S.C BOARD', '92', 'SUMMER', 'SEM - 6'),
(18, 18, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '59', 'MONSOON', 'SEM - 6'),
(19, 19, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '77', 'SUMMER', 'SEM - 6'),
(20, 20, '10th S.S.C BOARD -- 12th COMMERCE H.S.C BOARD', '52', 'WINTER', 'SEM - 6');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedbackId` int NOT NULL AUTO_INCREMENT,
  `InternId` int NOT NULL,
  `Comment` text NOT NULL,
  `FeedbackDate` datetime NOT NULL,
  PRIMARY KEY (`FeedbackId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackId`, `InternId`, `Comment`, `FeedbackDate`) VALUES
(1, 1, 'I feel glad to get such a huge amount of knowledge and got to learn so many things which are new for me and give such a wonderful experience for my whole upcoming life.. thank u and i fell pleasure to be the part of this company.', '2024-03-18 19:59:39'),
(2, 2, 'Good place to learn and explore various technologies and also good faculty to help out for any help needed.', '2024-03-18 20:02:47'),
(3, 3, 'I learn lots of new things in this internship. This will very useful for me. They teach all things in easy way and easy to understand.', '2024-03-18 20:06:16'),
(4, 4, 'I got various ideas on technology which worked here.I can do a project as my own.The teaching skills is very good for gaining knowledge as soon.', '2024-03-18 20:09:42'),
(5, 5, 'It was very useful in career point of view. Environment was very friendly and i have learn various concepts related to my field.', '2024-03-18 20:16:05'),
(6, 6, 'I feel glad to get such a huge amount of knowledge and got to learn so many things which are new for me and give such a wonderful experience for my whole upcoming life.. thank u and i fell pleasure to be the part of this company.', '2024-03-18 22:41:13'),
(7, 7, 'Good place to learn and explore various technologies and also good faculty to help out for any help needed.', '2024-03-18 22:44:33'),
(8, 8, 'I learn lots of new things in this internship. This will very useful for me. They teach all things in easy way and easy to understand.', '2024-03-18 22:47:41'),
(9, 9, 'I got various ideas on technology which worked here.I can do a project as my own.The teaching skills is very good for gaining knowledge as soon.', '2024-03-18 22:52:05'),
(10, 10, 'It was very useful in career point of view. Environment was very friendly and i have learn various concepts related to my field.', '2024-03-18 22:56:24'),
(11, 11, 'I feel glad to get such a huge amount of knowledge and got to learn so many things which are new for me and give such a wonderful experience for my whole upcoming life.. thank u and i fell pleasure to be the part of this company.', '2024-03-19 11:38:30'),
(12, 12, 'Good place to learn and explore various technologies and also good faculty to help out for any help needed.', '2024-03-19 11:41:28'),
(13, 13, 'I learn lots of new things in this internship. This will very useful for me. They teach all things in easy way and easy to understand.', '2024-03-19 11:44:33'),
(14, 14, 'I got various ideas on technology which worked here.I can do a project as my own.The teaching skills is very good for gaining knowledge as soon.', '2024-03-19 11:47:44'),
(15, 15, 'It was very useful in career point of view. Environment was very friendly and i have learn various concepts related to my field.', '2024-03-19 11:50:37'),
(16, 16, 'I feel glad to get such a huge amount of knowledge and got to learn so many things which are new for me and give such a wonderful experience for my whole upcoming life.. thank u and i fell pleasure to be the part of this company.', '2024-03-19 11:56:26'),
(17, 17, 'Good place to learn and explore various technologies and also good faculty to help out for any help needed.', '2024-03-19 12:00:01'),
(18, 18, 'I learn lots of new things in this internship. This will very useful for me. They teach all things in easy way and easy to understand.', '2024-03-19 12:04:01'),
(19, 19, 'I got various ideas on technology which worked here.I can do a project as my own.The teaching skills is very good for gaining knowledge as soon.', '2024-03-19 12:07:16'),
(20, 20, 'It was very useful in career point of view. Environment was very friendly and i have learn various concepts related to my field.', '2024-03-19 12:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

DROP TABLE IF EXISTS `inquiry`;
CREATE TABLE IF NOT EXISTS `inquiry` (
  `InquiryId` int NOT NULL AUTO_INCREMENT,
  `InternId` int NOT NULL,
  `Message` text NOT NULL,
  `Status` text NOT NULL,
  `InquiryDate` date NOT NULL,
  `IpId` int NOT NULL,
  PRIMARY KEY (`InquiryId`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`InquiryId`, `InternId`, `Message`, `Status`, `InquiryDate`, `IpId`) VALUES
(1, 1, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 1),
(2, 1, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 6),
(3, 2, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 2),
(4, 2, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 14),
(5, 3, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 25),
(6, 3, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 27),
(7, 4, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 18),
(8, 4, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 26),
(9, 5, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 7),
(10, 5, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 40),
(11, 6, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 31),
(12, 6, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 32),
(13, 7, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 4),
(14, 7, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 16),
(15, 8, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 5),
(16, 8, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 11),
(17, 9, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 33),
(18, 9, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 39),
(19, 10, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 9),
(20, 10, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-18', 22),
(21, 11, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 1),
(22, 11, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 6),
(23, 12, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 2),
(24, 12, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 14),
(25, 13, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 25),
(26, 13, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 27),
(27, 14, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 18),
(28, 14, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 26),
(29, 15, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 7),
(30, 15, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 40),
(31, 16, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 31),
(32, 16, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 32),
(33, 17, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 4),
(34, 17, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 16),
(35, 18, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 5),
(36, 19, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 33),
(37, 19, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 39),
(38, 20, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 9),
(39, 20, 'A inquires possibilities for an internship or position within a specific organization.', 'UnRead', '2024-03-19', 22);

-- --------------------------------------------------------

--
-- Table structure for table `internmaster`
--

DROP TABLE IF EXISTS `internmaster`;
CREATE TABLE IF NOT EXISTS `internmaster` (
  `InternId` int NOT NULL AUTO_INCREMENT,
  `FullName` text NOT NULL,
  `CourseId` int NOT NULL,
  `Address` text NOT NULL,
  `Gender` text NOT NULL,
  `DOB` date NOT NULL,
  `CollegeId` int NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `ContactNo` text NOT NULL,
  `Email` text NOT NULL,
  PRIMARY KEY (`InternId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internmaster`
--

INSERT INTO `internmaster` (`InternId`, `FullName`, `CourseId`, `Address`, `Gender`, `DOB`, `CollegeId`, `UserName`, `Password`, `ContactNo`, `Email`) VALUES
(1, 'UZAIR LAKDAWALA', 1, 'E/6, SHAMAPARK SOCIETY, BHARUCH', 'Male', '2004-05-14', 1, 'UZAIR_LKD', '1454', '8980235120', 'lakdawalauzair14@gmail.com'),
(2, 'ARKAN PATHAN', 2, 'SAYMA PARK, BHARUCH', 'Male', '2003-06-11', 12, 'ARKAN', '7862', '7862927940', 'pathanarkan@gmail.com'),
(3, 'TUFEL MALEK', 3, 'MALEKWAD MAHOLLA, BHARUCH', 'Male', '2003-10-16', 28, 'MTUFEL', '16103', '9924753867', 'mtufel21@gmail.com'),
(4, 'KAIF VAZA', 4, 'RAJPALDI, BHARUCH', 'Male', '2004-07-09', 29, 'V_KAIF', '9704', '9737608529', 'kaifvaza@gmail.com'),
(5, 'SAMIR PATEL', 5, 'VAGRA, BHARUCH', 'Male', '2003-03-05', 5, 'S_PATEL', '5303', '7041691495', 'spatel@gmail.com'),
(6, 'RIYAZ SAIYED', 6, 'HUSENIYA SOCIETY, BHARUCH', 'Male', '1998-07-07', 6, 'RIYAZ', '7798', '7016922385', 'saiyedriyaz@gmail.com'),
(7, 'ZAKWAN LAKDAWALA', 7, 'HUSENIYA SOCIETY - 2, BHARUCH', 'Male', '2000-11-09', 7, 'ZAKI', '9110', '8980927776', 'zakilakdawala@gmail.com'),
(8, 'FAIZ SHAIKH', 8, 'DIAMOND FLATE, BAWAREHAN, BHARUCH', 'Male', '2004-01-22', 26, 'FAIZ_SHAIKH', '2214', '9998765100', 'faizshaikh@gmail.com'),
(9, 'MOHSHINA PATEL', 9, 'SOHEL PARK, BHARUCH', 'Female', '1998-03-27', 9, 'MOHSHINA', '27398', '6354601702', 'patelmohshina@gmail.com'),
(10, 'AAKIB PATHAN', 10, 'SAKTINATH, ICICI BANK, BHARUCH', 'Male', '2002-12-06', 10, 'A_PATHAN', '6122', '8128814325', 'pathanaakib@gmail.com'),
(11, 'FAHAD PATEL', 1, 'AMAAN PARK, BHARUCH', 'Male', '2003-08-02', 20, 'FAHAD', '2803', '7096507898', 'fahadsamadpatel@gmail.com'),
(12, 'FAIZAN KAPADIYA', 2, 'ROSHAN PARK, BHARUCH', 'Male', '2001-11-01', 21, 'FAIZU', '1901', '9586747818', 'faizankapadiya@gmail.com'),
(13, 'HAZMINA PATEL', 3, 'NESNAL SOCIETY, BHARUCH', 'Female', '2002-02-20', 22, 'HAZZU', '2022', '9998810101', 'hazzu198@gmail.com'),
(14, 'FAHIMA MUNSHI', 4, 'MUSLIM SOCIETY, BHARUCH', 'Female', '2004-07-09', 23, 'FAHI_P', '9704', '9902351790', 'patelfahi@gmail.com'),
(15, 'MUNIRA PATEL', 5, 'KHURSHID PARK, BHARUCH', 'Female', '2003-12-01', 24, 'MUNNU', '1123', '6902618401', 'munirapatel@gmail.com'),
(16, 'SHIBA SHAIKH', 6, 'MONA PARK, BHARUCH', 'Female', '2004-01-15', 16, 'SHIBA', '1514', '8430912670', 'shibafatema@gmail.com'),
(17, 'AFIFA SHAIKH', 7, 'GANSMANDAI, BHARUCH', 'Female', '2004-08-03', 7, 'AFFU', '3804', '9077793666', 'affi345@gmail.com'),
(18, 'FATIMA SAIYED', 1, 'BAWAREHAN, BHARUCH', 'Female', '2003-06-11', 11, 'FATIMA', '1163', '7041692923', 'fatimasaiyed@gmail.com'),
(19, 'ZAKIYA PATEL', 2, 'AHMEDNAGAR, BHARUCH', 'Female', '2003-02-06', 21, 'ZAKIYA', '6202', '7893560101', 'zakiyapatel03@gmail.com'),
(20, 'ABUHURERA SHAIKH', 5, 'AKSHA COMPLEX, BHARUCH', 'Male', '2004-10-22', 24, 'ABU_HURERA', '22104', '9316745233', 'abuhurera402@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `internprogram`
--

DROP TABLE IF EXISTS `internprogram`;
CREATE TABLE IF NOT EXISTS `internprogram` (
  `IpId` int NOT NULL AUTO_INCREMENT,
  `CompanyId` int NOT NULL,
  `Title` text NOT NULL,
  `JobDescription` text NOT NULL,
  `Salary` text NOT NULL,
  `Requirement` text NOT NULL,
  `LastDate` date NOT NULL,
  `Category` text NOT NULL,
  PRIMARY KEY (`IpId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internprogram`
--

INSERT INTO `internprogram` (`IpId`, `CompanyId`, `Title`, `JobDescription`, `Salary`, `Requirement`, `LastDate`, `Category`) VALUES
(1, 1, 'PHP Developer', 'PHP Developer On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '25,000 - 30,000', 'Core PHP', '2024-04-06', 'Web & Software Dev'),
(2, 2, 'Tally', 'Tally On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '20,000 - 25,000', 'Accountant', '2024-04-10', 'Accounting & Consulting'),
(3, 3, 'Economics', 'Economics On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 20,000', 'Marketing Management', '2024-04-25', 'Sales & Marketing'),
(4, 4, 'Nursing', 'Nursing On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '10,000 - 15,000', 'Human Resources', '2024-04-30', 'Education & Training'),
(5, 5, 'Financial Accounting', 'Financial Accounting On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '30,000 - 35,000', 'Business Law', '2024-04-25', 'Sales & Marketing'),
(6, 6, 'Criminal', 'Criminal On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '10,000 - 15,000', 'Cyber Crime', '2024-04-06', 'Web & Software Dev'),
(7, 7, 'Paediatrics', 'Paediatrics On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '40,000 - 45,000', 'Endocrinology', '2024-04-22', 'Digital Marketing'),
(8, 8, 'CS Executive', 'CS Executive On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '30,000 - 35,000', 'Financial and strategic', '2024-04-10', 'Accounting & Consulting'),
(9, 9, 'Geography', 'Geography On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '20,000 - 25,000', 'Physical geography', '2024-04-30', 'Education & Training'),
(10, 10, 'ASP.NET', 'ASP.NET On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '10,000 - 15,000', 'React Native', '2024-04-06', 'Web & Software Dev'),
(11, 11, 'Insurance', 'Insurance On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '25,000 - 30,000', 'Financial Mathematics', '2024-04-25', 'Sales & Marketing'),
(12, 12, 'History', 'History On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 20,000', 'Historiography', '2024-04-30', 'Education & Training'),
(13, 13, 'Microbialogy', 'Microbialogy On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '25,000 - 30,000', 'Immunology', '2024-04-25', 'Sales & Marketing'),
(14, 14, 'Management', 'Management On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '40,000 - 50,000', 'International business', '2024-04-10', 'Accounting & Consulting'),
(15, 15, 'Banking', 'Banking On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '30,000 - 35,000', 'Income Tax Theory Law and Practice', '2024-04-10', 'Accounting & Consulting'),
(16, 16, 'Orthopedics', 'Orthopedics On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '20,000 - 25,000', 'Traumatology or General Orthopaedics', '2024-04-30', 'Education & Training'),
(17, 17, 'Android Developer', 'Android Developer On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 25,000', 'Flutter Developer', '2024-04-06', 'Web & Software Dev'),
(18, 18, 'Anatomy', 'Anatomy On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '35,000 - 40,000', 'Respiratory system', '2024-04-20', 'Data Science & Analitycs'),
(19, 19, 'Auditing', 'Auditing On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '25,000 - 35,000', 'Strategic cost management', '2024-04-10', 'Accounting & Consulting'),
(20, 20, 'Marketing', 'Marketing On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 20,000', 'Digital marketing', '2024-04-25', 'Sales & Marketing'),
(21, 21, 'Digital Marketing', 'Digital Marketing On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '30,000 - 35,000', 'Analyzing and Marketing Strategies', '2024-04-06', 'Web & Software Dev'),
(22, 22, 'Art Teacher', 'Art Teacher On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 20,000', 'BFA or BVA', '2024-04-30', 'Education & Training'),
(23, 23, 'Lab Assistant', 'Lab Assistant On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '25,000 - 30,000', 'Chemistry', '2024-04-20', 'Data Science & Analitycs'),
(24, 24, 'Software Engineer', 'Software Engineer On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '10,000 - 15,000', 'Web Designing, SEO ', '2024-04-13', 'Graphics & Design'),
(25, 25, 'Content Marketing', 'Content Marketing On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 20,000', 'Utilize CRM and analytical tools', '2024-04-27', 'Writing & Translations'),
(26, 26, 'Field Officer', 'Field Officer On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '20,000 - 25,000', 'Agriculture (preferably from district Sangrur)', '2024-04-20', 'Data Science & Analitycs'),
(27, 27, 'Consumer Stream', 'Consumer Stream On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '40,000 - 45,000', 'Data Management enterprise solutions', '2024-04-27', 'Writing & Translations'),
(28, 28, 'Online Tutor', 'Online Tutor On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 20,000', 'Tuition teacher must be efficient in explaining the lessons properly', '2024-04-27', 'Writing & Translations'),
(29, 29, 'Customer Relationship Management', 'CRM On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '20,000 - 30,000', 'Analytical bent of mind', '2024-04-27', 'Writing & Translations'),
(30, 30, 'Certified management accountant', 'CMA On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 20,000', 'Ind AS, management consultancy, GST', '2024-04-27', 'Writing & Translations'),
(31, 31, 'Junior Associate', 'Junior Associate On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '30,000 - 35,000', 'Should be well-versed in the law and procedure', '2024-04-20', 'Data Science & Analitycs'),
(32, 32, 'Research and case analysis', 'Research and case analysis On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 20,000', 'Currently pursuing a degree', '2024-04-20', 'Data Science & Analitycs'),
(33, 33, 'Occupational', 'Health care leadership On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '10,000 - 15,000', 'Health care leadership', '2024-04-13', 'Graphics & Design'),
(34, 34, 'Wealth Management', 'Wealth Management On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '20,000 - 25,000', 'Financial Planning', '2024-04-22', 'Digital Marketing'),
(35, 35, 'Addiction Worker', 'Addiction Worker On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '30,000 - 35,000', 'Mental Health', '2024-04-13', 'Graphics & Design'),
(36, 36, 'Logistics', 'Logistics On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '10,000 - 15,000', 'SCM', '2024-04-22', 'Digital Marketing'),
(37, 37, 'Business Management', 'Business Management On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '20,000 - 25,000', 'Human Resources', '2024-04-13', 'Graphics & Design'),
(38, 38, 'Forensic Identification', 'Forensic Identification On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '15,000 - 20,000', 'Information Analysis', '2024-04-22', 'Digital Marketing'),
(39, 39, 'Technology in chemical', 'Technology in chemical On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '40,000 - 45,000', 'Manages Techniques', '2024-04-13', 'Graphics & Design'),
(40, 40, 'Associated', 'Associated On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.', '25,000 - 30,000', 'Quality Assurance', '2024-04-22', 'Digital Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `NotificationId` int NOT NULL AUTO_INCREMENT,
  `IpId` int NOT NULL,
  `Message` text NOT NULL,
  `NotificationDateTime` datetime NOT NULL,
  PRIMARY KEY (`NotificationId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationId`, `IpId`, `Message`, `NotificationDateTime`) VALUES
(1, 1, 'Congratulations, You are the selecting ACCENTURE Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-20 08:09:04'),
(2, 14, 'Congratulations, You are the selecting SAP Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-20 08:14:29'),
(3, 25, 'Congratulations, You are the selecting PUMA Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-20 08:17:16'),
(4, 26, 'Congratulations, You are the selecting VISA Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-20 08:19:17'),
(5, 7, 'Congratulations, You are the selecting INFOSYS Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-20 08:21:32'),
(6, 32, 'Congratulations, You are the selecting CFI Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:39:37'),
(7, 4, 'Congratulations, You are the selecting DALOITTE Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:41:00'),
(8, 11, 'Congratulations, You are the selecting MICROSOFT Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:42:33'),
(9, 33, 'Congratulations, You are the selecting FEDEX Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:45:16'),
(10, 22, 'Congratulations, You are the selecting GOLDMAN SACHS Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:46:08'),
(11, 6, 'Congratulations, You are the selecting IBM Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:49:16'),
(12, 2, 'Congratulations, You are the selecting ADP Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:50:15'),
(13, 27, 'Congratulations, You are the selecting HUBLOT Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:53:15'),
(14, 18, 'Congratulations, You are the selecting ADIDAS Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:54:14'),
(15, 40, 'Congratulations, You are the selecting WHATFIX Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:57:18'),
(16, 31, 'Congratulations, You are the selecting BARCLAYS Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 10:58:36'),
(17, 16, 'Congratulations, You are the selecting UNIDO Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 11:01:19'),
(18, 5, 'Congratulations, You are the selecting GANPACT Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 11:02:02'),
(19, 39, 'Congratulations, You are the selecting SYDLE Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 11:04:46'),
(20, 9, 'Congratulations, You are the selecting INTEL Company. We are Hiring & You will be interviewed on 10-6-2024 so you will have to visit our company.', '2024-03-21 11:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `personaldatail`
--

DROP TABLE IF EXISTS `personaldatail`;
CREATE TABLE IF NOT EXISTS `personaldatail` (
  `PId` int NOT NULL AUTO_INCREMENT,
  `InternId` int NOT NULL,
  `FatherName` text NOT NULL,
  `MotherName` text NOT NULL,
  `LanguageKnown` text NOT NULL,
  `Natianility` text NOT NULL,
  `Religion` text NOT NULL,
  `Cast` text NOT NULL,
  PRIMARY KEY (`PId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personaldatail`
--

INSERT INTO `personaldatail` (`PId`, `InternId`, `FatherName`, `MotherName`, `LanguageKnown`, `Natianility`, `Religion`, `Cast`) VALUES
(1, 1, 'ZAHID ANWAR', 'SHAHIN ZAHID', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(2, 2, 'AZAZ PATHAN', 'AASHIYA AZAZ', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(3, 3, 'RASHID MALEK', 'RUMANA RASHID', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(4, 4, 'VAHID VAZA', 'AAMENA VAHID', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(5, 5, 'MOHMMED PATEL', 'RUKSANA MOHMMED', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(6, 6, 'GYASUDDIN SAIYED', 'SADEKA GYASUDDIN', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(7, 7, 'SHAHID LAKDAWALA', 'SABANA SHAHID', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(8, 8, 'JAVID SHAIKH', 'HAMIDA JAVID', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(9, 9, 'ZAKIR PATEL', 'SUHANA ZAKIR', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(10, 10, 'ALTAF PATHAN', 'TANNU ALTAF', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(11, 11, 'SAMAD PATEL', 'RAFEA PATEL', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(12, 12, 'ABRAR KAPADIYA', 'SAMIRA ABRAR', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(13, 13, 'ABDUL PATEL', 'AAKEFA ABDUL', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(14, 14, 'AAKIB MUNSHI', 'RIZWANA AAKIB', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(15, 15, 'A.MAJID PATEL', 'AAYESHA A.MAJID', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(16, 16, 'JALAL SHAIKH', 'MUBINA JALAL', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(17, 17, 'HAMID SHAIKH', 'HALIMA HAMID', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(18, 18, 'MUNIR SAIYED', 'NAJIMA MUNIR', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(19, 19, 'SAJID PATEL', 'SUMAIYA SAJID', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI'),
(20, 20, 'IRFAN SHAIKH', 'ASMA IRFAN', 'HINDI, ENGLISH', 'INDIAN', 'MUSLIM', 'SUNNI');

-- --------------------------------------------------------

--
-- Table structure for table `shortlistmaster`
--

DROP TABLE IF EXISTS `shortlistmaster`;
CREATE TABLE IF NOT EXISTS `shortlistmaster` (
  `ShortlistId` int NOT NULL AUTO_INCREMENT,
  `CandidateId` int NOT NULL,
  `ShortlistDate` date NOT NULL,
  `IpId` int NOT NULL,
  PRIMARY KEY (`ShortlistId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortlistmaster`
--

INSERT INTO `shortlistmaster` (`ShortlistId`, `CandidateId`, `ShortlistDate`, `IpId`) VALUES
(1, 1, '2024-03-20', 1),
(2, 2, '2024-03-20', 14),
(3, 3, '2024-03-20', 25),
(4, 4, '2024-03-20', 26),
(5, 5, '2024-03-20', 7),
(6, 6, '2024-03-21', 32),
(7, 7, '2024-03-21', 4),
(8, 8, '2024-03-21', 11),
(9, 9, '2024-03-21', 33),
(10, 10, '2024-03-21', 22),
(11, 11, '2024-03-21', 6),
(12, 12, '2024-03-21', 2),
(13, 13, '2024-03-21', 27),
(14, 14, '2024-03-21', 18),
(15, 15, '2024-03-21', 40),
(16, 16, '2024-03-21', 31),
(17, 17, '2024-03-21', 16),
(18, 18, '2024-03-21', 5),
(19, 19, '2024-03-21', 39),
(20, 20, '2024-03-21', 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
