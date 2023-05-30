-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 03:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern_builders_core`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `app_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `app_business` varchar(30) NOT NULL,
  `app_applicant` varchar(30) NOT NULL,
  `app_document` text NOT NULL,
  `app_certificate` text NOT NULL,
  `app_hired` datetime NOT NULL,
  `app_task` text NOT NULL,
  `app_school_hours` double NOT NULL,
  `app_hours` double NOT NULL,
  `app_status` varchar(20) NOT NULL,
  `app_created` datetime NOT NULL,
  `app_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`app_id`, `post_id`, `app_business`, `app_applicant`, `app_document`, `app_certificate`, `app_hired`, `app_task`, `app_school_hours`, `app_hours`, `app_status`, `app_created`, `app_updated`) VALUES
(2, 2, '20230522114429aRlPZcVd', '20230518183525FpDmFLtE', '20230524092103_sample resume.docx', '20230530085616_0-1.png', '2023-05-27 16:32:05', '<ul>\r\n<li>sample1</li>\r\n<li>sample2</li>\r\n<li>sample3</li>\r\n<li>sample4</li>\r\n<li>sample5</li>\r\n</ul>', 480, 416, 'hired', '2023-05-24 09:21:03', '2023-05-24 09:21:03'),
(3, 2, '20230522114429aRlPZcVd', '20230528060129RmoxmzNs', '20230528062232_sample resume.docx', '20230528080517_document.png', '0000-00-00 00:00:00', '', 0, 0, 'hired', '2023-05-28 06:22:33', '2023-05-28 06:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `business_profiles`
--

CREATE TABLE `business_profiles` (
  `bus_id` int(11) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `bus_name` varchar(100) NOT NULL,
  `bus_tags` text NOT NULL,
  `bus_intro` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `bus_created` datetime NOT NULL,
  `bus_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_profiles`
--

INSERT INTO `business_profiles` (`bus_id`, `user_code`, `bus_name`, `bus_tags`, `bus_intro`, `city_id`, `bus_created`, `bus_updated`) VALUES
(3, '20230522114429aRlPZcVd', 'KrazyApps PH', '', '<p>KrazyApps PH is a leading software development company specializing in creating innovative and user-friendly mobile applications. Our talented team of tech enthusiasts combines creativity with functionality to deliver cutting-edge solutions across various platforms. We prioritize customer satisfaction, forging long-term partnerships by providing tailored products that exceed expectations. With a focus on research and development, we stay ahead of emerging technologies, integrating AR, VR, and AI to create captivating experiences. Committed to excellence, KrazyApps PH is poised to lead the way in mobile app development.</p>', 4, '2023-05-22 11:44:29', '2023-05-22 11:44:29'),
(4, '20230530075506yggzdmZT', 'Software Xi', '', '<p>Software Xi is a leading software development company delivering innovative solutions for businesses. Our skilled team develops customized software to streamline operations, enhance productivity, and drive business growth. With expertise in web and mobile app development, cloud computing, and AI, we provide reliable and user-friendly solutions. Customer satisfaction is our priority, and we offer exceptional support throughout the development lifecycle. Partner with Software Xi to transform your ideas into reality and thrive in the digital landscape. Contact us today for a consultation.</p>', 44, '2023-05-30 07:55:06', '2023-05-30 07:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Account Manager'),
(2, 'Accountant'),
(3, 'Administrative Assistant'),
(4, 'Analyst'),
(5, 'Animator'),
(6, 'Architect'),
(7, 'Art Director'),
(8, 'Art Therapist'),
(9, 'Attorney'),
(10, 'Auditor'),
(11, 'Auto Mechanic'),
(12, 'Aerospace Engineer'),
(13, 'Agronomist'),
(14, 'Air Traffic Controller'),
(15, 'Archaeologist'),
(16, 'Architectural Drafter'),
(17, 'Bank Teller'),
(18, 'Barista'),
(19, 'Bartender'),
(20, 'Biologist'),
(21, 'Biomedical Engineer'),
(22, 'Brand Manager'),
(23, 'Business Analyst'),
(24, 'Business Consultant'),
(25, 'Business Development Manager'),
(26, 'Carpenter'),
(27, 'Chef'),
(28, 'Chemical Engineer'),
(29, 'Chiropractor'),
(30, 'Civil Engineer'),
(31, 'Cleaner'),
(32, 'Compliance Manager'),
(33, 'Compliance Officer'),
(34, 'Conservationist'),
(35, 'Content Writer'),
(36, 'Copywriter'),
(37, 'Court Reporter'),
(38, 'Cryptographer'),
(39, 'Customer Service Representative'),
(40, 'Cybersecurity Analyst'),
(41, 'Data Analyst'),
(42, 'Data Entry Clerk'),
(43, 'Data Scientist'),
(44, 'Database Administrator'),
(45, 'Dental Assistant'),
(46, 'Dental Hygienist'),
(47, 'Digital Marketing Specialist'),
(48, 'Digital Strategist'),
(49, 'Economist'),
(50, 'Electrician'),
(51, 'Electrical Technician'),
(52, 'Engineer'),
(53, 'Environmental Engineer'),
(54, 'Environmental Scientist'),
(55, 'Event Coordinator'),
(56, 'Event Planner'),
(57, 'Fashion Designer'),
(58, 'Fashion Stylist'),
(59, 'Financial Analyst'),
(60, 'Financial Controller'),
(61, 'Financial Planner'),
(62, 'Flight Attendant'),
(63, 'Forensic Scientist'),
(64, 'Foreign Language Instructor'),
(65, 'Fundraiser'),
(66, 'Game Developer'),
(67, 'Game Tester'),
(68, 'Geologist'),
(69, 'Graphic Designer'),
(70, 'Grant Writer'),
(71, 'Healthcare Administrator'),
(72, 'Home Inspector'),
(73, 'Human Resources Manager'),
(74, 'Industrial Designer'),
(75, 'IT Consultant'),
(76, 'Insurance Agent'),
(77, 'Interior Designer'),
(78, 'Interpreter'),
(79, 'IT Specialist'),
(80, 'Journalist'),
(81, 'Laboratory Technician'),
(82, 'Landscape Architect'),
(83, 'Lawyer'),
(84, 'Librarian'),
(85, 'Marketing Coordinator'),
(86, 'Marketing Manager'),
(87, 'Medical Assistant'),
(88, 'Musician'),
(89, 'Neurologist'),
(90, 'Nurse'),
(91, 'Occupational Therapist'),
(92, 'Occupational Health and Safety Specialist'),
(93, 'Operations Manager'),
(94, 'Patent Attorney'),
(95, 'Personal Trainer'),
(96, 'Pharmacist'),
(97, 'Photographer'),
(98, 'Physical Therapist'),
(99, 'Pilot'),
(100, 'Police Officer'),
(101, 'Product Manager'),
(102, 'Project Coordinator'),
(103, 'Project Manager'),
(104, 'Public Relations Manager'),
(105, 'Quality Assurance Analyst'),
(106, 'Receptionist'),
(107, 'Recruiter'),
(108, 'Registered Dietitian'),
(109, 'Research Scientist'),
(110, 'Risk Analyst'),
(111, 'Sales Manager'),
(112, 'Sales Representative'),
(113, 'Social Media Manager'),
(114, 'Social Worker'),
(115, 'Software Engineer'),
(116, 'Software Developer'),
(117, 'Supply Chain Manager'),
(118, 'Systems Administrator'),
(119, 'Tax Consultant'),
(120, 'Teacher'),
(121, 'Technical Writer'),
(122, 'Tour Guide'),
(123, 'Translator'),
(124, 'Truck Driver'),
(125, 'UX/UI Designer'),
(126, 'Veterinarian'),
(127, 'Video Editor'),
(128, 'Web Content Manager'),
(129, 'Web Designer'),
(130, 'Web Developer'),
(131, 'Welder'),
(132, 'Writer/Author'),
(133, 'Zoologist');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Alaminos'),
(2, 'Angeles'),
(3, 'Antipolo'),
(4, 'Bacolod'),
(5, 'Bacoor'),
(6, 'Baguio'),
(7, 'Bais'),
(8, 'Balanga'),
(9, 'Batac'),
(10, 'Batangas City'),
(11, 'Bayawan'),
(12, 'Baybay'),
(13, 'Bayugan'),
(14, 'Biñan'),
(15, 'Bislig'),
(16, 'Bocaue'),
(17, 'Bogo'),
(18, 'Borongan'),
(19, 'Butuan'),
(20, 'Cabadbaran'),
(21, 'Cabanatuan'),
(22, 'Cabuyao'),
(23, 'Cadiz'),
(24, 'Cagayan de Oro'),
(25, 'Calamba'),
(26, 'Calapan'),
(27, 'Calbayog'),
(28, 'Caloocan'),
(29, 'Calumpit'),
(30, 'Calbayog'),
(31, 'Camarines Norte'),
(32, 'Camarines Sur'),
(33, 'Canlaon'),
(34, 'Carcar'),
(35, 'Catbalogan'),
(36, 'Cauayan'),
(37, 'Cavite City'),
(38, 'Cebu City'),
(39, 'Cotabato City'),
(40, 'Dagupan'),
(41, 'Danao'),
(42, 'Dapitan'),
(43, 'Dasmariñas'),
(44, 'Davao City'),
(45, 'Digos'),
(46, 'Dipolog'),
(47, 'Dumaguete'),
(48, 'El Salvador'),
(49, 'Escalante'),
(50, 'Gapan'),
(51, 'General Santos'),
(52, 'Gingoog'),
(53, 'Guihulngan'),
(54, 'Himamaylan'),
(55, 'Ilagan'),
(56, 'Iligan'),
(57, 'Iloilo City'),
(58, 'Imus'),
(59, 'Iriga'),
(60, 'Isabela City'),
(61, 'Kabankalan'),
(62, 'Kidapawan'),
(63, 'Koronadal'),
(64, 'La Carlota'),
(65, 'Laoag'),
(66, 'Lapu-Lapu'),
(67, 'Las Piñas'),
(68, 'Legazpi'),
(69, 'Ligao'),
(70, 'Lipa'),
(71, 'Lucena'),
(72, 'Maasin'),
(73, 'Mabalacat'),
(74, 'Makati'),
(75, 'Malabon'),
(76, 'Malaybalay'),
(77, 'Malolos'),
(78, 'Mandaluyong'),
(79, 'Mandaue'),
(80, 'Manila'),
(81, 'Marawi'),
(82, 'Marikina'),
(83, 'Masbate City'),
(84, 'Mati'),
(85, 'Meycauayan'),
(86, 'Muñoz'),
(87, 'Muntinlupa'),
(88, 'Naga'),
(89, 'Navotas'),
(90, 'Olongapo'),
(91, 'Ormoc'),
(92, 'Oroquieta'),
(93, 'Ozamiz'),
(94, 'Pagadian'),
(95, 'Palayan'),
(96, 'Panabo'),
(97, 'Parañaque'),
(98, 'Pasay'),
(99, 'Pasig'),
(100, 'Passi'),
(101, 'Puerto Princesa'),
(102, 'Quezon City'),
(103, 'Roxas'),
(104, 'Sagay'),
(105, 'San Carlos (Negros Occidental)'),
(106, 'San Carlos (Pangasinan)'),
(107, 'San Fernando (La Union)'),
(108, 'San Fernando (Pampanga)'),
(109, 'San Jose (Antique)'),
(110, 'San Jose (Nueva Ecija)'),
(111, 'San Jose del Monte'),
(112, 'San Juan'),
(113, 'San Pablo'),
(114, 'San Pedro'),
(115, 'Santa Rosa'),
(116, 'Santiago'),
(117, 'Silay'),
(118, 'Sipalay'),
(119, 'Sorsogon City'),
(120, 'Surigao City'),
(121, 'Tabaco'),
(122, 'Tacloban'),
(123, 'Tacurong'),
(124, 'Tagaytay'),
(125, 'Tagbilaran'),
(126, 'Taguig');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`) VALUES
(1, '2GO Group Inc.'),
(2, 'ABS-CBN Broadcasting Corporation'),
(3, 'ABS-CBN Corporation'),
(4, 'ABS-CBN Film Productions Inc. (Star Cinema)'),
(5, 'AC Energy Philippines Inc.'),
(6, 'Aboitiz Construction Group'),
(7, 'Aboitiz Equity Ventures'),
(8, 'Aboitiz Equity Ventures Inc.'),
(9, 'Aboitiz InfraCapital Inc.'),
(10, 'Aboitiz Land Inc.'),
(11, 'Aboitiz Power Corporation'),
(12, 'Aboitiz Transport System Corporation (2GO Group)'),
(13, 'Alliance Global Group Inc.'),
(14, 'Alaska Milk Corporation'),
(15, 'Alsons Consolidated Resources Inc.'),
(16, 'Alternergy Philippine Holdings Corporation'),
(17, 'Alveo Land Corporation'),
(18, 'Ayala Corporation'),
(19, 'Ayala Foundation'),
(20, 'Ayala Land'),
(21, 'Ayala Malls'),
(22, 'Banco de Oro (BDO)'),
(23, 'Bank of the Philippine Islands (BPI)'),
(24, 'Bank of the Philippine Islands Capital Corporation'),
(25, 'Cemex Holdings Philippines Inc.'),
(26, 'Century Pacific Food Inc.'),
(27, 'Century Properties Group Inc.'),
(28, 'Cebu Holdings Inc.'),
(29, 'Cebu Pacific Air'),
(30, 'Century Properties Group Inc.'),
(31, 'Chemical Industries of the Philippines Inc.'),
(32, 'Cityland Development Corporation'),
(33, 'DMCI Holdings'),
(34, 'D.M. Consunji Inc. (DMCI)'),
(35, 'Dole Philippines Inc.'),
(36, 'DoubleDragon Properties Corp.'),
(37, 'Energy Development Corporation'),
(38, 'Energy Development Corporation (EDC)'),
(39, 'Filinvest Development Corporation'),
(40, 'First Gen Corporation'),
(41, 'Ginebra San Miguel Inc.'),
(42, 'GMA Network Inc.'),
(43, 'Globe Telecom'),
(44, 'Globe Telecom Inc.'),
(45, 'Holcim Philippines Inc.'),
(46, 'IBM Philippines Inc.'),
(47, 'International Container Terminal Services Inc. (ICTSI)'),
(48, 'JG Summit Holdings Inc.'),
(49, 'Jollibee Foods Corporation'),
(50, 'Land Bank of the Philippines'),
(51, 'LT Group Inc.'),
(52, 'Manila Electric Company Foundation'),
(53, 'Manila Water Company'),
(54, 'Maynilad Water Services Inc.'),
(55, 'Megawide Construction Corporation'),
(56, 'Megawide-GMR Construction Consortium'),
(57, 'Megaworld Corporation'),
(58, 'Metro Pacific Investments Corporation'),
(59, 'Metro Retail Stores Group Inc.'),
(60, 'Metropolitan Bank & Trust Company (Metrobank)'),
(61, 'Monde Nissin Corporation'),
(62, 'Nickel Asia Corporation'),
(63, 'Now Corporation'),
(64, 'Pacific Online Systems Corporation'),
(65, 'Pepsi-Cola Products Philippines Inc.'),
(66, 'Petron Corporation'),
(67, 'Philippine Airlines (PAL)'),
(68, 'Philippine Long Distance Telephone Company (PLDT)'),
(69, 'Philippine National Bank (PNB)'),
(70, 'Philippine Seven Corporation (7-Eleven)'),
(71, 'Pilipinas Shell Foundation Inc.'),
(72, 'Pilipinas Shell Petroleum Corporation'),
(73, 'PLDT Inc.'),
(74, 'Purefoods-Hormel Company Inc.'),
(75, 'Puregold Price Club'),
(76, 'Robinsons Land Corporation'),
(77, 'Roxas and Company Inc.'),
(78, 'San Miguel Brewery Inc.'),
(79, 'San Miguel Corporation'),
(80, 'San Miguel Food and Beverage Inc.'),
(81, 'San Miguel Pure Foods Company Inc.'),
(82, 'San Miguel Yamamura Packaging Corporation'),
(83, 'Security Bank'),
(84, 'Security Bank Corporation'),
(85, 'Semirara Mining and Power Corporation'),
(86, 'Shangri-La Plaza Corporation'),
(87, 'SM Investments Corporation'),
(88, 'SM Prime Holdings'),
(89, 'SM Retail Inc.'),
(90, 'Smart Communications Inc.'),
(91, 'SMC Global Power Holdings Corp.'),
(92, 'Solar Philippines'),
(93, 'St. Vincent Ferrer Seminary'),
(94, 'Sun Life of Canada Philippines Inc.'),
(95, 'Unilever Philippines Inc.'),
(96, 'Union Bank of the Philippines'),
(97, 'Universal Robina Corporation'),
(98, 'Vista Land & Lifescapes'),
(99, 'ZALORA Philippines Inc.');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua and Barbuda'),
(7, 'Argentina'),
(8, 'Armenia'),
(9, 'Australia'),
(10, 'Austria'),
(11, 'Azerbaijan'),
(12, 'Bahamas'),
(13, 'Bahrain'),
(14, 'Bangladesh'),
(15, 'Barbados'),
(16, 'Belarus'),
(17, 'Belgium'),
(18, 'Belize'),
(19, 'Benin'),
(20, 'Bhutan'),
(21, 'Bolivia'),
(22, 'Bosnia and Herzegovina'),
(23, 'Botswana'),
(24, 'Brazil'),
(25, 'Brunei'),
(26, 'Bulgaria'),
(27, 'Burkina Faso'),
(28, 'Burundi'),
(29, 'Cabo Verde'),
(30, 'Cambodia'),
(31, 'Cameroon'),
(32, 'Canada'),
(33, 'Central African Republic'),
(34, 'Chad'),
(35, 'Chile'),
(36, 'China'),
(37, 'Colombia'),
(38, 'Comoros'),
(39, 'Congo, Democratic Republic of the'),
(40, 'Congo, Republic of the'),
(41, 'Costa Rica'),
(42, 'Cote d\'Ivoire'),
(43, 'Croatia'),
(44, 'Cuba'),
(45, 'Cyprus'),
(46, 'Czech Republic'),
(47, 'Denmark'),
(48, 'Djibouti'),
(49, 'Dominica'),
(50, 'Dominican Republic'),
(51, 'East Timor (Timor-Leste)'),
(52, 'Ecuador'),
(53, 'Egypt'),
(54, 'El Salvador'),
(55, 'Equatorial Guinea'),
(56, 'Eritrea'),
(57, 'Estonia'),
(58, 'Eswatini'),
(59, 'Ethiopia'),
(60, 'Fiji'),
(61, 'Finland'),
(62, 'France'),
(63, 'Gabon'),
(64, 'Gambia'),
(65, 'Georgia'),
(66, 'Germany'),
(67, 'Ghana'),
(68, 'Greece'),
(69, 'Grenada'),
(70, 'Guatemala'),
(71, 'Guinea'),
(72, 'Guinea-Bissau'),
(73, 'Guyana'),
(74, 'Haiti'),
(75, 'Honduras'),
(76, 'Hungary'),
(77, 'Iceland'),
(78, 'India'),
(79, 'Indonesia'),
(80, 'Iran'),
(81, 'Iraq'),
(82, 'Ireland'),
(83, 'Israel'),
(84, 'Italy'),
(85, 'Jamaica'),
(86, 'Japan'),
(87, 'Jordan'),
(88, 'Kazakhstan'),
(89, 'Kenya'),
(90, 'Kiribati'),
(91, 'Korea, North'),
(92, 'Korea, South'),
(93, 'Kosovo'),
(94, 'Kuwait'),
(95, 'Kyrgyzstan'),
(96, 'Laos'),
(97, 'Latvia'),
(98, 'Lebanon'),
(99, 'Lesotho'),
(100, 'Liberia'),
(101, 'Libya'),
(102, 'Liechtenstein'),
(103, 'Lithuania'),
(104, 'Luxembourg'),
(105, 'Madagascar'),
(106, 'Malawi'),
(107, 'Malaysia'),
(108, 'Maldives'),
(109, 'Mali'),
(110, 'Malta'),
(111, 'Marshall Islands'),
(112, 'Mauritania'),
(113, 'Mauritius'),
(114, 'Mexico'),
(115, 'Micronesia'),
(116, 'Moldova'),
(117, 'Monaco'),
(118, 'Mongolia'),
(119, 'Montenegro'),
(120, 'Morocco'),
(121, 'Mozambique'),
(122, 'Myanmar (Burma)'),
(123, 'Namibia'),
(124, 'Nauru'),
(125, 'Nepal'),
(126, 'Netherlands'),
(127, 'New Zealand'),
(128, 'Nicaragua'),
(129, 'Niger'),
(130, 'Nigeria'),
(131, 'North Macedonia (formerly Macedonia)'),
(132, 'Norway'),
(133, 'Oman'),
(134, 'Pakistan'),
(135, 'Palau'),
(136, 'Panama'),
(137, 'Papua New Guinea'),
(138, 'Paraguay'),
(139, 'Peru'),
(140, 'Philippines'),
(141, 'Poland'),
(142, 'Portugal'),
(143, 'Qatar'),
(144, 'Romania'),
(145, 'Russia'),
(146, 'Rwanda'),
(147, 'Saint Kitts and Nevis'),
(148, 'Saint Lucia'),
(149, 'Saint Vincent and the Grenadines'),
(150, 'Samoa'),
(151, 'San Marino'),
(152, 'Sao Tome and Principe'),
(153, 'Saudi Arabia'),
(154, 'Senegal'),
(155, 'Serbia'),
(156, 'Seychelles'),
(157, 'Sierra Leone'),
(158, 'Singapore'),
(159, 'Slovakia'),
(160, 'Slovenia'),
(161, 'Solomon Islands'),
(162, 'Somalia'),
(163, 'South Africa'),
(164, 'South Sudan'),
(165, 'Spain'),
(166, 'Sri Lanka'),
(167, 'Sudan'),
(168, 'Suriname'),
(169, 'Sweden'),
(170, 'Switzerland'),
(171, 'Syria'),
(172, 'Taiwan'),
(173, 'Tajikistan'),
(174, 'Tanzania'),
(175, 'Thailand'),
(176, 'Togo'),
(177, 'Tonga'),
(178, 'Trinidad and Tobago'),
(179, 'Tunisia'),
(180, 'Turkey'),
(181, 'Turkmenistan'),
(182, 'Tuvalu'),
(183, 'Uganda'),
(184, 'Ukraine'),
(185, 'United Arab Emirates'),
(186, 'United Kingdom'),
(187, 'United States'),
(188, 'Uruguay'),
(189, 'Uzbekistan'),
(190, 'Vanuatu'),
(191, 'Vatican City'),
(192, 'Venezuela'),
(193, 'Vietnam'),
(194, 'Yemen'),
(195, 'Zambia'),
(196, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
(1, 'BS Accountancy'),
(2, 'BS Agriculture'),
(3, 'BS Agribusiness Management'),
(4, 'BS Agricultural Biotechnology'),
(5, 'BS Agricultural Engineering'),
(6, 'BS Agricultural Technology'),
(7, 'BS Applied Mathematics'),
(8, 'BS Applied Physics'),
(9, 'BS Applied Statistics'),
(10, 'BS Architecture'),
(11, 'BS Biology'),
(12, 'BS Biomedical Engineering'),
(13, 'BS Biotechnology'),
(14, 'BS Business Administration'),
(15, 'BS Chemical Engineering'),
(16, 'BS Chemistry'),
(17, 'BS Civil Engineering'),
(18, 'BS Communication Sciences'),
(19, 'BS Computer Engineering'),
(20, 'BS Computer Science'),
(21, 'BS Criminology'),
(22, 'BS Customs Administration'),
(23, 'BS Economics'),
(24, 'BS Education'),
(25, 'BS Electrical Engineering'),
(26, 'BS Electronics Engineering'),
(27, 'BS Environmental Science'),
(28, 'BS Fisheries'),
(29, 'BS Food Technology'),
(30, 'BS Forestry'),
(31, 'BS Geology'),
(32, 'BS Hotel and Restaurant Management'),
(33, 'BS Industrial Engineering'),
(34, 'BS Information Systems'),
(35, 'BS Information Technology'),
(36, 'BS Management Accounting'),
(37, 'BS Marine Biology'),
(38, 'BS Marine Engineering'),
(39, 'BS Marketing'),
(40, 'BS Mathematics'),
(41, 'BS Mechanical Engineering'),
(42, 'BS Medical Technology'),
(43, 'BS Mining Engineering'),
(44, 'BS Molecular Biology and Biotechnology'),
(45, 'BS Multimedia Arts and Sciences'),
(46, 'BS Nursing'),
(47, 'BS Nutrition and Dietetics'),
(48, 'BS Occupational Therapy'),
(49, 'BS Pharmacy'),
(50, 'BS Physical Therapy'),
(51, 'BS Physics'),
(52, 'BS Psychology'),
(53, 'BS Public Health'),
(54, 'BS Real Estate Management'),
(55, 'BS Social Work'),
(56, 'BS Sociology'),
(57, 'BS Statistics'),
(58, 'BS Tourism Management'),
(59, 'BS Veterinary Medicine'),
(60, 'BA Communication Arts'),
(61, 'BA English Language and Literature'),
(62, 'BA History'),
(63, 'BA International Studies'),
(64, 'BA Journalism'),
(65, 'BA Linguistics'),
(66, 'BA Music'),
(67, 'BA Philosophy'),
(68, 'BA Political Science'),
(69, 'BA Psychology'),
(70, 'BA Sociology'),
(71, 'BA Theater Arts');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `exp_id` int(11) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `exp_position` varchar(100) NOT NULL,
  `exp_company` varchar(100) NOT NULL,
  `exp_from` date NOT NULL,
  `exp_to` date NOT NULL,
  `exp_city` varchar(100) NOT NULL,
  `exp_job_desc` varchar(255) NOT NULL,
  `exp_created` datetime NOT NULL,
  `exp_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filters`
--

CREATE TABLE `filters` (
  `fitler_id` int(11) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `filter_category` varchar(255) NOT NULL,
  `filter_locations` varchar(255) NOT NULL,
  `filter_fulltime` varchar(7) NOT NULL,
  `filter_parttime` varchar(7) NOT NULL,
  `filter_office_based` varchar(7) NOT NULL,
  `filter_home_based` varchar(7) NOT NULL,
  `filter_salary` double NOT NULL,
  `filter_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` int(100) NOT NULL,
  `notif_type` text NOT NULL,
  `notif_text` text NOT NULL,
  `notif_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `notif_type`, `notif_text`, `notif_created`) VALUES
(1, 'create', 'new applicant - user', '2023-05-07 23:14:04'),
(2, 'create', 'new applicant - user', '2023-05-07 23:37:36'),
(3, 'create', 'new applicant - user', '2023-05-08 11:05:24'),
(4, 'create', 'new applicant - user', '2023-05-08 11:08:50'),
(5, 'create', 'new applicant - user', '2023-05-08 11:13:44'),
(6, 'create', 'new applicant - user', '2023-05-08 11:20:34'),
(7, 'auth', 'Login - kjohn0319@gmail.com', '2023-05-08 13:05:36'),
(8, 'auth', 'Login - kjohn0319@gmail.com', '2023-05-08 13:07:36'),
(9, 'create', 'new applicant - user', '2023-05-08 13:10:06'),
(10, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-08 13:12:59'),
(11, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-08 13:14:56'),
(12, 'auth', 'Logout - ', '2023-05-08 13:23:33'),
(13, 'auth', 'Logout - ', '2023-05-08 13:23:55'),
(14, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-08 13:24:03'),
(15, 'auth', 'Logout - keanemay2020@gmail.com', '2023-05-08 14:49:48'),
(16, 'auth', 'Logout - ', '2023-05-08 14:50:39'),
(17, 'create', 'new applicant - user', '2023-05-08 14:52:08'),
(18, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-08 14:53:00'),
(19, 'auth', 'Logout - keanemay2020@gmail.com', '2023-05-08 14:59:42'),
(20, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-16 19:54:38'),
(21, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-17 21:34:47'),
(22, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-17 21:41:50'),
(23, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-17 21:41:59'),
(24, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-17 21:52:47'),
(25, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-17 22:03:31'),
(26, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-18 11:11:17'),
(27, 'auth', 'Logout - keanemay2020@gmail.com', '2023-05-18 17:48:01'),
(28, 'create', 'new applicant - user', '2023-05-18 18:35:50'),
(29, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-18 18:46:12'),
(30, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-18 18:47:38'),
(31, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-22 07:30:47'),
(32, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-22 07:30:53'),
(33, 'auth', 'Logout - keanemays2020@gmail.com', '2023-05-22 08:55:18'),
(34, 'create', 'new business applicant - user', '2023-05-22 11:25:10'),
(35, 'create', 'new business applicant - user', '2023-05-22 11:36:27'),
(36, 'create', 'new business applicant - user', '2023-05-22 11:39:40'),
(37, 'create', 'new business applicant - user', '2023-05-22 11:41:26'),
(38, 'create', 'new business applicant - user', '2023-05-22 11:44:32'),
(39, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-22 12:06:14'),
(40, 'auth', 'Logout - ', '2023-05-22 13:49:52'),
(41, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-22 13:50:13'),
(42, 'auth', 'Logout - krazyappsph@gmail.com', '2023-05-22 13:55:54'),
(43, 'attempt', 'Login Attempt - krazyappsph@gmail.com', '2023-05-22 13:56:18'),
(44, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-22 13:56:23'),
(45, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-23 12:24:51'),
(46, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-24 01:17:31'),
(47, 'auth', 'Logout - krazyappsph@gmail.com', '2023-05-24 05:01:00'),
(48, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-24 05:01:11'),
(49, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-24 05:01:17'),
(50, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-24 05:01:26'),
(51, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-24 05:01:30'),
(52, 'auth', 'Login - keanemays2020@gmail.com', '2023-05-24 05:01:49'),
(53, 'auth', 'Logout - keanemays2020@gmail.com', '2023-05-24 05:17:35'),
(54, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-24 05:17:42'),
(55, 'auth', 'Logout - krazyappsph@gmail.com', '2023-05-24 05:24:40'),
(56, 'auth', 'Login - keanemays2020@gmail.com', '2023-05-24 05:25:33'),
(57, 'auth', 'Logout - keanemays2020@gmail.com', '2023-05-24 10:44:21'),
(58, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-24 10:48:47'),
(59, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-24 12:12:53'),
(60, 'attempt', 'Login Attempt - keanemay2020@gmail.com', '2023-05-24 12:12:57'),
(61, 'auth', 'Login - keanemays2020@gmail.com', '2023-05-24 12:13:05'),
(62, 'auth', 'Logout - keanemay2020@gmail.com', '2023-05-24 12:14:52'),
(63, 'attempt', 'Login Attempt - krazyappsph@gmail.com', '2023-05-24 12:16:46'),
(64, 'attempt', 'Login Attempt - krazyappsph@gmail.com', '2023-05-24 12:16:50'),
(65, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-24 12:17:00'),
(66, 'auth', 'Logout - krazyappsph@gmail.com', '2023-05-24 12:18:47'),
(67, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-24 12:18:56'),
(68, 'auth', 'Logout - krazyappsph@gmail.com', '2023-05-24 12:26:08'),
(69, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-27 10:27:44'),
(70, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-27 10:36:31'),
(71, 'auth', 'Logout - keanemay2020@gmail.com', '2023-05-28 05:12:37'),
(72, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-28 05:12:46'),
(73, 'attempt', 'Login Attempt - player.mir100@gmail.com', '2023-05-28 06:01:08'),
(74, 'create', 'new applicant - user', '2023-05-28 06:01:33'),
(75, 'auth', 'Login - player.mir100@gmail.com', '2023-05-28 06:05:59'),
(76, 'auth', 'Login - player.mir100@gmail.com', '2023-05-28 07:32:38'),
(77, 'auth', 'Logout - krazyappsph@gmail.com', '2023-05-28 08:13:48'),
(78, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-28 08:14:03'),
(79, 'auth', 'Logout - keanemay2020@gmail.com', '2023-05-28 08:14:14'),
(80, 'auth', 'Login - player.mir100@gmail.com', '2023-05-28 08:14:28'),
(81, 'auth', 'Logout - player.mir100@gmail.com', '2023-05-28 08:23:35'),
(82, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-28 08:23:43'),
(83, 'auth', 'Logout - keanemay2020@gmail.com', '2023-05-28 08:37:13'),
(84, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-28 08:37:20'),
(85, 'auth', 'Logout - krazyappsph@gmail.com', '2023-05-28 09:25:29'),
(86, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-28 09:40:26'),
(87, 'auth', 'Logout - keanemay2020@gmail.com', '2023-05-28 09:44:09'),
(88, 'create', 'new school applicant - user', '2023-05-29 23:47:04'),
(89, 'auth', 'Login - nonaki2293@introace.com', '2023-05-29 23:47:46'),
(90, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-30 04:32:22'),
(91, 'auth', 'Logout - nonaki2293@introace.com', '2023-05-30 06:02:43'),
(92, 'attempt', 'Login Attempt - kjohn0319@gmail.com', '2023-05-30 06:02:53'),
(93, 'auth', 'Login - kjohn0319@gmail.com', '2023-05-30 06:03:10'),
(94, 'auth', 'Logout - kjohn0319@gmail.com', '2023-05-30 07:02:58'),
(95, 'attempt', 'Login Attempt - nonaki2293@introace.com', '2023-05-30 07:03:15'),
(96, 'auth', 'Login - nonaki2293@introace.com', '2023-05-30 07:03:19'),
(97, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-30 07:34:56'),
(98, 'auth', 'Logout - nonaki2293@introace.com', '2023-05-30 07:52:22'),
(99, 'create', 'new business applicant - user', '2023-05-30 07:55:27'),
(100, 'auth', 'Login - tuzoloda@lyft.live', '2023-05-30 07:56:00'),
(101, 'auth', 'Logout - tuzoloda@lyft.live', '2023-05-30 08:03:55'),
(102, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-30 08:07:46'),
(103, 'auth', 'Logout - keanemay2020@gmail.com', '2023-05-30 08:14:54'),
(104, 'auth', 'Login - kjohn0319@gmail.com', '2023-05-30 08:15:04'),
(105, 'auth', 'Logout - kjohn0319@gmail.com', '2023-05-30 08:29:06'),
(106, 'create', 'new school applicant - user', '2023-05-30 08:34:21'),
(107, 'auth', 'Login - n36dlmm2yq@kzccv.com', '2023-05-30 08:34:54'),
(108, 'auth', 'Login - kjohn0319@gmail.com', '2023-05-30 08:39:42'),
(109, 'auth', 'Logout - n36dlmm2yq@kzccv.com', '2023-05-30 08:40:48'),
(110, 'attempt', 'Login Attempt - nonaki2293@introace.com', '2023-05-30 08:40:55'),
(111, 'auth', 'Login - nonaki2293@introace.com', '2023-05-30 08:40:59'),
(112, 'auth', 'Logout - kjohn0319@gmail.com', '2023-05-30 08:41:08'),
(113, 'auth', 'Login - keanemay2020@gmail.com', '2023-05-30 08:41:16'),
(114, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-30 08:42:05'),
(115, 'auth', 'Logout - krazyappsph@gmail.com', '2023-05-30 08:48:37'),
(116, 'auth', 'Login - krazyappsph@gmail.com', '2023-05-30 08:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `otp_id` int(11) NOT NULL,
  `otp_num` varchar(6) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `otp_status` int(1) NOT NULL,
  `otp_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`otp_id`, `otp_num`, `user_code`, `otp_status`, `otp_created`) VALUES
(1, '185455', 'RxjY-58694', 1, '2021-06-07 21:37:46'),
(2, '752824', 'uaPq-78416', 1, '2021-06-07 22:43:31'),
(3, '140204', 'fGkq-69729', 1, '2021-06-07 22:59:49'),
(4, '464207', '2023050723', 0, '2023-05-07 23:37:32'),
(5, '060966', '20230508112030ROXVUSGq', 0, '2023-05-08 11:05:20'),
(6, '465992', '20230508112030ROXVUSGq', 0, '2023-05-08 11:08:46'),
(7, '457317', '20230508112030ROXVUSGq', 0, '2023-05-08 11:13:40'),
(8, '679454', '20230508112030ROXVUSGq', 1, '2023-05-08 11:20:30'),
(9, '350880', '20230508131002STMPvhRA', 1, '2023-05-08 13:10:02'),
(10, '331031', '20230508145204EEpgJlNL', 1, '2023-05-08 14:52:04'),
(11, '511842', '20230508131002STMPvhRA', 0, '2023-05-17 22:07:25'),
(12, '721535', '20230508131002STMPvhRA', 1, '2023-05-17 22:08:36'),
(13, '965434', '20230518183525FpDmFLtE', 1, '2023-05-18 18:35:26'),
(14, '677177', '20230518183525FpDmFLtE', 1, '2023-05-18 18:40:39'),
(15, '859832', '20230518183525FpDmFLtE', 1, '2023-05-18 18:46:33'),
(16, '954472', '20230522112506RTKGnuKf', 1, '2023-05-22 11:25:06'),
(17, '619773', '20230522113624xMjgLxIn', 1, '2023-05-22 11:36:24'),
(18, '100050', '20230522113936kfGnQveU', 1, '2023-05-22 11:39:36'),
(19, '918140', '20230522114123wuAIKvfD', 1, '2023-05-22 11:41:23'),
(20, '211847', '20230522114429aRlPZcVd', 1, '2023-05-22 11:44:29'),
(21, '378542', '20230528060129RmoxmzNs', 1, '2023-05-28 06:01:29'),
(22, '535621', '20230529234643ZYyxiXxi', 1, '2023-05-29 23:46:43'),
(23, '380727', '20230530075506yggzdmZT', 1, '2023-05-30 07:55:06'),
(24, '643298', '20230530083357SxwzhFJD', 1, '2023-05-30 08:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `post_category` varchar(100) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_description` text NOT NULL,
  `post_salary_from` double NOT NULL,
  `post_salary_to` double NOT NULL,
  `post_type` varchar(20) NOT NULL,
  `post_based` varchar(20) NOT NULL,
  `city_id` int(11) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_status` varchar(20) NOT NULL,
  `post_views` int(11) NOT NULL,
  `post_created` datetime NOT NULL,
  `post_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_code`, `post_category`, `post_title`, `post_description`, `post_salary_from`, `post_salary_to`, `post_type`, `post_based`, `city_id`, `post_tags`, `post_status`, `post_views`, `post_created`, `post_updated`) VALUES
(2, '20230522114429aRlPZcVd', 'Administrative Assistant', 'asdadasdasdsadas asdasdasdasdasd', '<p>asdasdasdasd asdasdasdasd</p>\r\n<ul>\r\n<li>asdasd</li>\r\n<li>asdasdas</li>\r\n<li>asdasd</li>\r\n<li>asdasdas</li>\r\n<li>dfsdfsdfsdf</li>\r\n</ul>', 15000, 25000, 'Full-Time', 'Office-Based', 14, 'ActionScript,Ada,Adobe Audition,Adobe Lightroom', 'active', 8, '2023-05-24 01:59:38', '2023-05-24 05:24:28'),
(3, '20230522114429aRlPZcVd', 'Agronomist', 'sample title', '<p>Skills</p>\r\n<ul>\r\n<li>sample</li>\r\n<li>sample</li>\r\n<li>sample</li>\r\n<li>sample</li>\r\n</ul>', 15000, 25000, 'Full-Time', 'Office-Based', 11, 'Ada,Adobe Creative Cloud,PHP,SQL Server Management Studio', 'active', 1, '2023-05-24 02:53:03', '2023-05-24 02:53:03'),
(4, '20230522114429aRlPZcVd', 'Business Analyst', 'Out Company is actively seeking a skilled and experienced Business Analyst to join our dynamic team', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', 15000, 25000, 'Full-Time', 'Office-Based', 4, 'Ada,Adobe Lightroom,Analytical skills,ASP.NET MVC', 'active', 0, '2023-05-24 05:23:57', '2023-05-24 05:23:57'),
(5, '20230530075506yggzdmZT', 'Web Designer', 'Web Designer Full-Time', '<p>Job Description:</p>\r\n<p style=\"text-align: justify;\">We are seeking a talented and creative Web Designer to join our team at [Company Name]. As a Web Designer, you will be responsible for creating visually appealing and user-friendly websites that align with our clients\' needs and brand guidelines. Your primary focus will be on designing intuitive interfaces, implementing responsive design principles, and optimizing website performance.</p>\r\n<p style=\"text-align: justify;\">Responsibilities:</p>\r\n<ul>\r\n<li style=\"text-align: justify;\">Collaborate with clients and internal teams to understand project requirements and objectives.</li>\r\n<li style=\"text-align: justify;\">Create wireframes, prototypes, and visual designs for websites and web applications.</li>\r\n<li style=\"text-align: justify;\">Design and implement responsive layouts that provide an optimal user experience across devices.</li>\r\n<li style=\"text-align: justify;\">Develop and maintain design standards, guidelines, and best practices.</li>\r\n<li style=\"text-align: justify;\">Collaborate with developers to ensure seamless integration of design elements.</li>\r\n<li style=\"text-align: justify;\">Conduct usability testing and gather feedback to continuously improve designs.</li>\r\n<li style=\"text-align: justify;\">Stay updated with industry trends, emerging technologies, and design tools.</li>\r\n</ul>\r\n<p>Join our dynamic team and contribute to the creation of captivating web experiences. To apply, please submit your resume, portfolio, and any relevant work samples to [contact email/website]. We look forward to reviewing your application and discussing how your skills can enhance our design capabilities.</p>', 0, 10000, 'Full-Time', 'Office-Based', 44, 'HTML/CSS,JavaScript,Laravel,Play Framework', 'active', 2, '2023-05-30 08:03:14', '2023-05-30 08:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(11) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `profile_course` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `profile_country` varchar(255) NOT NULL,
  `profile_address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `profile_gender` varchar(6) NOT NULL,
  `profile_contact` varchar(10) NOT NULL,
  `profile_about_me` text NOT NULL,
  `profile_skills` text NOT NULL,
  `profile_verified` int(1) NOT NULL,
  `profile_created` datetime NOT NULL,
  `profile_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `user_code`, `profile_course`, `school_id`, `profile_country`, `profile_address`, `city_id`, `profile_gender`, `profile_contact`, `profile_about_me`, `profile_skills`, `profile_verified`, `profile_created`, `profile_updated`) VALUES
(2, '20230518183525FpDmFLtE', 'BS Information Technology', 65, 'Philippines', '1095, Datoc Compound', 45, 'Male', '9121610673', 'hello there we are the malevoelent i am your love a if you want to be as', ' php,Adobe Photoshop,HTML/CSS,PL/SQL', 1, '2023-05-18 18:47:30', '2023-05-18 18:47:30'),
(5, '20230528060129RmoxmzNs', 'BS Information Technology', 18, 'Philippines', 'Brgy 1-A, Matina', 44, 'Female', '9914347411', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'HTML/CSS,JavaScript,Laravel,PHP,SQL Server Management Studio', 0, '2023-05-28 06:05:43', '2023-05-28 06:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(1) NOT NULL,
  `project_name` text NOT NULL,
  `project_address` text NOT NULL,
  `project_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_address`, `project_created`) VALUES
(1, 'InternBuilders', 'Digos City', '2023-04-24 11:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `require_id` int(11) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `school_id` int(11) NOT NULL,
  `require_position` varchar(100) NOT NULL,
  `require_attachment1` text NOT NULL,
  `require_attachment2` text NOT NULL,
  `require_status` varchar(10) NOT NULL,
  `require_created` datetime NOT NULL,
  `require_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`require_id`, `user_code`, `school_id`, `require_position`, `require_attachment1`, `require_attachment2`, `require_status`, `require_created`, `require_updated`) VALUES
(1, '20230529234643ZYyxiXxi', 65, 'Faculty', '20230530053757_um.jpg', '20230530053757_um2.jpg', 'approved', '2023-05-30 05:37:57', '2023-05-30 05:37:57'),
(2, '20230530083357SxwzhFJD', 12, 'Faculty', '20230530083919_um2.jpg', '20230530083919_um.jpg', 'approved', '2023-05-30 08:39:19', '2023-05-30 08:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `school_created` datetime NOT NULL,
  `school_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `city_id`, `school_created`, `school_updated`) VALUES
(1, 'University of the Philippines', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(2, 'Ateneo de Manila University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(3, 'De La Salle University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(4, 'University of Santo Tomas', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(5, 'Far Eastern University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(6, 'University of the East', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(7, 'Adamson University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(8, 'Mapua University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(9, 'Polytechnic University of the Philippines', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(10, 'University of Makati', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(11, 'University of Asia and the Pacific', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(12, 'Asian Institute of Management', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(13, 'Philippine Normal University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(14, 'Philippine Christian University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(15, 'Central Philippine University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(16, 'Silliman University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(17, 'Xavier University - Ateneo de Cagayan', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(18, 'Mindanao State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(19, 'University of San Carlos', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(20, 'University of San Agustin', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(21, 'University of the Visayas', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(22, 'Cebu Institute of Technology - University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(23, 'University of Cebu', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(24, 'Holy Name University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(25, 'Angeles University Foundation', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(26, 'Holy Angel University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(27, 'Tarlac State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(28, 'Bulacan State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(29, 'Batangas State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(30, 'Pangasinan State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(31, 'Bicol University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(32, 'Catanduanes State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(33, 'Mariano Marcos State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(34, 'University of Northern Philippines', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(35, 'Don Mariano Marcos Memorial State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(36, 'Isabela State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(37, 'Nueva Vizcaya State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(38, 'University of Science and Technology of Southern Philippines', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(39, 'Western Mindanao State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(40, 'Zamboanga State College of Marine Sciences and Technology', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(41, 'University of Southern Mindanao', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(42, 'Cagayan State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(43, 'Mindanao University of Science and Technology', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(44, 'Camarines Norte State College', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(45, 'Central Luzon State University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(46, 'University of the Cordilleras', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(47, 'Mountain Province State Polytechnic College', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(48, 'Philippine Military Academy', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(49, 'Philippine Merchant Marine Academy', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(50, 'University of the Philippines Diliman', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(51, 'University of the Philippines Manila', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(52, 'University of the Philippines Los Baños', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(53, 'University of the Philippines Visayas', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(54, 'University of the Philippines Mindanao', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(55, 'University of the Philippines Open University', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(56, 'University of the Philippines Baguio', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(57, 'University of the Philippines Cebu', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(58, 'University of the Philippines Pampanga', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(59, 'University of the Philippines Tacloban', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(60, 'University of the Philippines Iloilo', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(61, 'University of the Philippines Visayas Tacloban College', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(62, 'University of the Philippines Visayas Cebu College', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(63, 'University of the Philippines Mindanao - School of Management', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(64, 'University of the Philippines System Cebu', 0, '2023-05-18 13:03:54', '2023-05-18 13:03:54'),
(65, 'University of Mindanao', 0, '2023-05-18 19:05:22', '2023-05-18 19:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `security_pins`
--

CREATE TABLE `security_pins` (
  `sec_id` int(11) NOT NULL,
  `sec_value` varchar(200) NOT NULL,
  `sec_type` text NOT NULL,
  `user_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`) VALUES
(1, 'ABAP'),
(2, 'ActionScript'),
(3, 'Ada'),
(4, 'Alice'),
(5, 'APL'),
(6, 'Assembly'),
(7, 'AutoIt'),
(8, 'Awk'),
(9, 'Befunge'),
(10, 'Brainfuck'),
(11, 'C'),
(12, 'C++'),
(13, 'C#'),
(14, 'Ceylon'),
(15, 'Chapel'),
(16, 'Chef'),
(17, 'Clipper'),
(18, 'Clojure'),
(19, 'COBOL'),
(20, 'COBOLScript'),
(21, 'CoffeeScript'),
(22, 'ColdFusion'),
(23, 'Common Lisp'),
(24, 'Crystal'),
(25, 'D'),
(26, 'Dart'),
(27, 'Delphi'),
(28, 'Dog'),
(29, 'Eiffel'),
(30, 'Elixir'),
(31, 'Elm'),
(32, 'Emojicode'),
(33, 'Erlang'),
(34, 'Factor'),
(35, 'F#'),
(36, 'Forth'),
(37, 'Fortran'),
(38, 'FoxPro'),
(39, 'GDScript'),
(40, 'Genie'),
(41, 'Go'),
(42, 'GraphQL'),
(43, 'Groovy'),
(44, 'Groovy++'),
(45, 'Hack'),
(46, 'Haskell'),
(47, 'HTML/CSS'),
(48, 'Icon'),
(49, 'IDL'),
(50, 'Inform'),
(51, 'Io'),
(52, 'J'),
(53, 'Java'),
(54, 'JavaScript'),
(55, 'JScript'),
(56, 'Julia'),
(57, 'Julia'),
(58, 'K'),
(59, 'Kotlin'),
(60, 'LabVIEW'),
(61, 'Ladder Logic'),
(62, 'Lasso'),
(63, 'LiveScript'),
(64, 'Logtalk'),
(65, 'LOLCODE'),
(66, 'Lua'),
(67, 'M4'),
(68, 'Maple'),
(69, 'Mathematica'),
(70, 'Max/MSP'),
(71, 'MIPS Assembly'),
(72, 'Monkey X'),
(73, 'Nim'),
(74, 'NQC'),
(75, 'NSIS'),
(76, 'Objective-C'),
(77, 'Objective-C++'),
(78, 'OCaml'),
(79, 'Oz'),
(80, 'PARI/GP'),
(81, 'Pascal'),
(82, 'Perl'),
(83, 'PHP'),
(84, 'Piet'),
(85, 'Pike'),
(86, 'PL/I'),
(87, 'PL/SQL'),
(88, 'PostScript'),
(89, 'PowerShell'),
(90, 'Processing'),
(91, 'Prolog'),
(92, 'Pure Data'),
(93, 'PureScript'),
(94, 'Python'),
(95, 'Q#'),
(96, 'R'),
(97, 'Racket'),
(98, 'REBOL'),
(99, 'Ring'),
(100, 'Ruby'),
(101, 'Rust'),
(102, 'SAS'),
(103, 'Scala'),
(104, 'Scheme'),
(105, 'Scratch'),
(106, 'SED'),
(107, 'Simula'),
(108, 'Slash'),
(109, 'Smalltalk'),
(110, 'Solidity'),
(111, 'Squirrel'),
(112, 'Standard ML'),
(113, 'Stata'),
(114, 'Swift'),
(115, 'Tcl'),
(116, 'Tcl/Tk'),
(117, 'T-SQL'),
(118, 'TypeScript'),
(119, 'VBScript'),
(120, 'Verilog'),
(121, 'VHDL'),
(122, 'Vim script'),
(123, 'Visual Basic'),
(124, 'Visual Basic .NET'),
(125, 'WebAssembly'),
(126, 'Whitespace'),
(127, 'Wolfram Language'),
(128, 'X10'),
(129, 'XQuery'),
(130, 'Xtend'),
(131, 'Yacc'),
(132, 'Z notation'),
(133, 'ZPL'),
(134, 'ASP.NET MVC'),
(135, 'Django'),
(136, 'Ruby on Rails'),
(137, 'Laravel'),
(138, 'Spring MVC'),
(139, 'Express.js)'),
(140, 'AngularJS'),
(141, 'Ember.js'),
(142, 'ASP.NET Core MVC'),
(143, 'CodeIgniter'),
(144, 'Play Framework'),
(145, 'Symfony'),
(146, 'Adobe Acrobat'),
(147, 'Adobe After Effects'),
(148, 'Adobe Audition'),
(149, 'Adobe Creative Cloud'),
(150, 'Adobe Dreamweaver'),
(151, 'Adobe Experience Manager'),
(152, 'Adobe Illustrator'),
(153, 'Adobe InDesign'),
(154, 'Adobe Lightroom'),
(155, 'Adobe Photoshop'),
(156, 'Adobe Premiere Pro'),
(157, 'Airtable'),
(158, 'Amazon Web Services (AWS)'),
(159, 'Android Studio'),
(160, 'Asana'),
(161, 'Atlassian Confluence'),
(162, 'Atlassian Trello'),
(163, 'AutoCAD'),
(164, 'Basecamp'),
(165, 'Bitbucket'),
(166, 'Buffer'),
(167, 'Canva'),
(168, 'Canva Pro'),
(169, 'Cisco Webex'),
(170, 'Dropbox'),
(171, 'Dropbox Paper'),
(172, 'Eclipse'),
(173, 'Evernote'),
(174, 'Final Cut Pro'),
(175, 'Figma'),
(176, 'Freshdesk'),
(177, 'GitLab'),
(178, 'Google Ads'),
(179, 'Google Analytics'),
(180, 'Google Cloud Platform (GCP)'),
(181, 'Google Docs'),
(182, 'Google Drive'),
(183, 'Google Hangouts'),
(184, 'Google Sheets'),
(185, 'Google Slides'),
(186, 'Google Tag Manager'),
(187, 'Google Workspace'),
(188, 'Harvest'),
(189, 'Hootsuite'),
(190, 'HubSpot'),
(191, 'HubSpot CRM'),
(192, 'HubSpot Marketing Hub'),
(193, 'InVision'),
(194, 'IntelliJ IDEA'),
(195, 'Jira'),
(196, 'Logic Pro'),
(197, 'Magento'),
(198, 'MailChimp'),
(199, 'Microsoft Azure'),
(200, 'Microsoft Office Suite'),
(201, 'Microsoft Outlook'),
(202, 'Microsoft Teams'),
(203, 'Monday.com'),
(204, 'Moz'),
(205, 'NetBeans'),
(206, 'Notion'),
(207, 'OBS Studio'),
(208, 'Oracle Database'),
(209, 'QuickBooks'),
(210, 'Salesforce'),
(211, 'Salesforce Commerce Cloud'),
(212, 'Salesforce Marketing Cloud'),
(213, 'Salesforce Service Cloud'),
(214, 'SEM Rush'),
(215, 'Shopify'),
(216, 'Sketch'),
(217, 'Slack'),
(218, 'Sprout Social'),
(219, 'SQL Server Management Studio'),
(220, 'Sublime Text'),
(221, 'Tableau'),
(222, 'Trello'),
(223, 'Visual Studio Code'),
(224, 'VMware'),
(225, 'WordPress'),
(226, 'WordPress SEO by Yoast'),
(227, 'WordPress WooCommerce'),
(228, 'Xcode'),
(229, 'Zendesk'),
(230, 'Zendesk Chat'),
(231, 'Zendesk Support'),
(232, 'Zoho CRM'),
(233, 'Zoho Projects'),
(234, 'Communication'),
(235, 'Teamwork'),
(236, 'Problem-solving'),
(237, 'Adaptability'),
(238, 'Time management'),
(239, 'Leadership'),
(240, 'Critical thinking'),
(241, 'Collaboration'),
(242, 'Decision-making'),
(243, 'Creativity'),
(244, 'Organization'),
(245, 'Flexibility'),
(246, 'Attention to detail'),
(247, 'Customer service'),
(248, 'Technical proficiency'),
(249, 'Analytical skills'),
(250, 'Initiative'),
(251, 'Conflict resolution'),
(252, 'Emotional intelligence'),
(253, 'Presentation skills'),
(254, 'Project management'),
(255, 'Negotiation'),
(256, 'Interpersonal skills'),
(257, 'Multitasking'),
(258, 'Self-motivation'),
(259, 'Networking'),
(260, 'Strategic planning'),
(261, 'Data analysis'),
(262, 'Problem analysis'),
(263, 'Sales skills'),
(264, 'Research skills'),
(265, 'Financial literacy'),
(266, 'Risk management'),
(267, 'Time tracking'),
(268, 'Active listening'),
(269, 'Adaptability'),
(270, 'Customer relationship management'),
(271, 'Marketing skills'),
(272, 'Team management'),
(273, 'Writing skills'),
(274, 'Public speaking'),
(275, 'Product knowledge'),
(276, 'Quality assurance'),
(277, 'Training and development'),
(278, 'Conflict management'),
(279, 'Innovation'),
(280, 'Technical troubleshooting'),
(281, 'Presentation design'),
(282, 'Digital literacy'),
(283, 'Cultural awareness');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_uid` int(10) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` int(5) NOT NULL,
  `user_status` int(1) NOT NULL,
  `user_verified` int(1) NOT NULL,
  `user_profile_img` text NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_created` datetime NOT NULL,
  `user_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_uid`, `user_code`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_type`, `user_status`, `user_verified`, `user_profile_img`, `school_id`, `user_created`, `user_updated`) VALUES
(1, '786z5sdfgz7856gdgds576', 'devmaster', '', 'kjohn0319@gmail.com', 'ea439fbdaa955099ec9ad4a96a3a81bd', 0, 0, 1, '', 0, '2022-08-04 00:00:00', '2022-10-05 16:09:15'),
(32, '20230518183525FpDmFLtE', 'Keane', 'May', 'keanemay2020@gmail.com', 'cfe80a7823a1db46774e9b6f2ba55685', 3, 0, 1, '20230519013015_profile_default.png', 0, '2023-05-18 18:35:25', '2023-05-24 12:14:26'),
(37, '20230522114429aRlPZcVd', 'KrazyApps PH', '', 'krazyappsph@gmail.com', 'ea439fbdaa955099ec9ad4a96a3a81bd', 2, 0, 1, '20230524110611_gusto ko lang naman mag FN.jpg', 0, '2023-05-22 11:44:29', '2023-05-24 11:06:11'),
(38, '20230528060129RmoxmzNs', 'Shaira', 'Mariz', 'player.mir100@gmail.com', 'cfe80a7823a1db46774e9b6f2ba55685', 3, 0, 1, '', 0, '2023-05-28 06:01:29', '2023-05-28 06:13:59'),
(39, '20230529234643ZYyxiXxi', 'Peter', 'Johnson', 'nonaki2293@introace.com', 'cfe80a7823a1db46774e9b6f2ba55685', 1, 0, 1, '', 65, '2023-05-29 23:46:43', '2023-05-29 23:46:43'),
(40, '20230530075506yggzdmZT', 'Software Xi', '', 'tuzoloda@lyft.live', 'cfe80a7823a1db46774e9b6f2ba55685', 2, 0, 1, '', 0, '2023-05-30 07:55:06', '2023-05-30 07:55:06'),
(41, '20230530083357SxwzhFJD', 'Peter', 'Simon', 'n36dlmm2yq@kzccv.com', 'cfe80a7823a1db46774e9b6f2ba55685', 1, 0, 1, '', 12, '2023-05-30 08:33:57', '2023-05-30 08:33:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `business_profiles`
--
ALTER TABLE `business_profiles`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`fitler_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`require_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `security_pins`
--
ALTER TABLE `security_pins`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `business_profiles`
--
ALTER TABLE `business_profiles`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `filters`
--
ALTER TABLE `filters`
  MODIFY `fitler_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `require_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `security_pins`
--
ALTER TABLE `security_pins`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
