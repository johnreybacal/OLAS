-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 01:55 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olas`
--
CREATE DATABASE IF NOT EXISTS `olas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `olas`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `AuthorId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `author`
--

TRUNCATE TABLE `author`;
--
-- Dumping data for table `author`
--

INSERT INTO `author` (`AuthorId`, `Name`, `IsActive`) VALUES
(1, 'Bacal, Johnrey', 1),
(2, 'Bacal, Judel', 1),
(3, 'Bacal, Ning', 1),
(4, 'Ted Dekker', 0),
(5, 'Rowlings, J.K.', 1),
(6, 'Berry, Teddy', 1),
(7, 'Eddy', 0),
(8, 'Mercury, Freddie', 1),
(9, 'Tuvieron, Tovs', 1),
(10, 'Coelho, Paulo', 1),
(11, 'Day, Sylvia', 1),
(12, 'Mallery, Susan', 1),
(13, 'Alcot, Louisa May', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(13) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `PublisherId` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `SeriesId` int(11) DEFAULT NULL,
  `Edition` varchar(30) DEFAULT NULL,
  `DatePublished` date NOT NULL,
  `PlacePublished` varchar(100) NOT NULL,
  `Image` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `book`
--

TRUNCATE TABLE `book`;
--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `Title`, `PublisherId`, `SectionId`, `SeriesId`, `Edition`, `DatePublished`, `PlacePublished`, `Image`) VALUES
('9780000000001', 'The book of knowledge', 1, 2, 3, '1', '2018-08-26', 'Pasay', 'mama-_gumamela.png'),
('0786830239', 'Tales from Agrabah Aladdin and Jasmine', 1, 3, 3, '1', '2018-10-22', 'Manila', 'images.jpg'),
('9781368012287', 'Star Wars The Last Jedi', 1, 3, 1, '', '2018-10-02', 'Manila', 'default.png'),
('9780000000002', 'Librong Pilipino', 7, 1, 6, '', '2018-11-10', 'Pasig', 'default.png'),
('9780000000003', 'A research about thesis', 7, 1, 0, '', '2019-01-01', 'Manila', 'default.png'),
('9780747569404', 'Harry Potter and the Order of the Phoenix', 2, 3, 2, '', '2003-01-01', 'Manila', 'default.png'),
('9780621063099', 'Little Men', 1, 3, 0, '', '2018-01-24', 'Manila', 'little_men.jpg'),
('9780402199901', 'Little Women', 1, 3, 0, '', '2018-02-24', 'Manila', 'little_women.jpg'),
('0988941589', 'Good Wives', 1, 3, 0, '', '2018-03-24', 'Manila', 'good_wives.jpg'),
('9785386262884', 'Jo s Boys', 1, 3, 0, '', '2018-04-24', 'Manila', 'jo\'s_boys.jpg'),
('9784773012941', 'Veronika Decides to Die', 1, 3, 0, '', '2018-05-24', 'Manila', 'veronika_decides_to_die.jpg'),
('9786523504294', 'The Alchemist', 1, 3, 0, '', '2018-06-24', 'Manila', 'the_alchemist.jpg'),
('9780549538394', 'Bared To You', 1, 3, 0, '', '2018-07-24', 'Manila', 'bared_to_you.jpg'),
('9781573309400', 'Reflected ln You', 1, 3, 0, '', '2018-08-24', 'Manila', 'reflected_in_you.jpg'),
('9781017703597', 'Etwined Wlth You Women', 1, 3, 0, '', '2018-09-24', 'Manila', 'etwined_with_you.jpg'),
('9789740928522', 'Captivated By You', 1, 3, 0, '', '2018-10-24', 'Manila', 'captivated_by_you.jpg'),
('9786361262394', 'One With You', 1, 3, 0, '', '2018-11-24', 'Manila', 'one_with_you.jpg'),
('9788301119546', 'The Sheik 4nd the Runaway Princess', 1, 3, 0, '', '2018-12-24', 'Manila', 'the_sheik_and_the_runaway_princess.jpg'),
('9785149961931', 'The Sheik s Arranged Marriage', 1, 3, 0, '', '2018-12-25', 'Manila', 'the_Sheiks_arranged_marriage.jpg'),
('9784466056054', 'The Sheik 4nd The Bride Who Said No', 1, 3, 0, '', '2018-12-26', 'Manila', 'the_sheik_and_the_bride_who_said_no.jpg'),
('9785789552629', 'The Sheik 4nd the Virgin Princess', 1, 3, 0, '', '2018-12-27', 'Manila', 'the_sheik_and_the_virgin_princess.jpg'),
('9787663395858', 'The Sheik and the Princess Bride', 1, 3, 0, '', '2018-12-28', 'Manila', 'the_sheik_&_the_princess_bride.jpg'),
('9783159481968', 'The Sheiks Secret Bride', 1, 3, 0, '', '2018-12-29', 'Manila', 'the_sheiks_secret_bride.jpg'),
('9781305623415', 'Ten Years 0n', 1, 3, 0, '', '2018-12-30', 'Manila', 'ten_years_on.jpg'),
('9784088744759', 'Sorry Please Thank You', 1, 3, 0, '', '2018-12-31', 'Manila', 'sorry_please_thank_you.jpg'),
('9781852769611', 'The Girl You Left Behind', 1, 3, 0, '', '2018-12-31', 'Manila', 'the_girl_you_left_behind.jpg'),
('9787835384789', 'Pleasure of the Night', 1, 3, 0, '', '2019-01-01', 'Manila', 'pleasure_of_the_night.jpg'),
('9784411754257', 'Heat of the Night', 1, 3, 0, '', '2019-01-11', 'Manila', 'heat_of_the_night.jpg'),
('9784882477143', 'The Ship of Bride', 1, 3, 0, '', '2019-01-12', 'Manila', 'the_ship_of_bride.jpg'),
('9781882803378', 'The Last Letter from your Lover', 1, 3, 0, '', '2019-01-13', 'Manila', 'the_last_letter_from_your_lover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookauthor`
--

CREATE TABLE `bookauthor` (
  `ISBN` varchar(13) NOT NULL,
  `AuthorId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `bookauthor`
--

TRUNCATE TABLE `bookauthor`;
--
-- Dumping data for table `bookauthor`
--

INSERT INTO `bookauthor` (`ISBN`, `AuthorId`) VALUES
('9780000000001', 1),
('9780747569404', 5),
('0786830239', 1),
('9781368012287', 1),
('9780000000003', 1),
('9780000000003', 2),
('9780000000002', 3),
('9780621063099', 13),
('9780402199901', 13),
('9785386262884', 13),
('9784773012941', 10),
('9786523504294', 10),
('9780549538394', 11),
('9781573309400', 11),
('9781017703597', 11),
('9789740928522', 11),
('9786361262394', 11),
('9788301119546', 12),
('9785149961931', 12),
('9780000000001', 4);

-- --------------------------------------------------------

--
-- Table structure for table `bookcatalogue`
--

CREATE TABLE `bookcatalogue` (
  `AccessionNumber` int(11) NOT NULL,
  `CallNumber` varchar(20) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `DateAcquired` date NOT NULL,
  `AcquiredFrom` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `IsRoomUseOnly` tinyint(1) NOT NULL,
  `IsAvailable` tinyint(1) NOT NULL DEFAULT '1',
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `bookcatalogue`
--

TRUNCATE TABLE `bookcatalogue`;
--
-- Dumping data for table `bookcatalogue`
--

INSERT INTO `bookcatalogue` (`AccessionNumber`, `CallNumber`, `ISBN`, `DateAcquired`, `AcquiredFrom`, `Price`, `IsRoomUseOnly`, `IsAvailable`, `IsActive`) VALUES
(1, '112', '9780000000001', '2018-09-04', 'Johnrey Pogi', 500, 0, 1, 1),
(11, '123', '0786830239', '2018-10-26', 'dsfaa', 200, 1, 1, 1),
(10, 'asduhaud', '9780000000001', '2018-11-01', 'Jb', 0, 1, 1, 1),
(9, 'os91', '9780747569404', '2018-10-27', '', 0, 1, 1, 1),
(12, 'sdg', '0786830239', '2018-10-21', 'sdvsdf', 0, 1, 1, 1),
(13, '34', '9780747569404', '2018-10-22', 'dsfsff', 0, 1, 1, 1),
(14, '1', '9780747569404', '2018-11-01', 'National Bookstore', 400, 0, 1, 1),
(15, '12343', '9780747569404', '2018-10-02', 'q', 3, 0, 1, 1),
(16, '90', '9780747569404', '2018-11-01', 'National BookStroe', 100, 0, 1, 1),
(17, 'scsdvs', '9780747569404', '2018-10-23', 'wef', 12, 0, 1, 1),
(18, '000014', '9780747569404', '2018-10-23', 'wef', 120, 1, 1, 1),
(19, '4311', '9781368012287', '2018-10-25', 'jb', 100, 1, 1, 1),
(20, '1234323', '9780000000002', '2018-11-11', 'Johnrey', 800, 0, 1, 1),
(21, 'fdfgh', '9780747569404', '2018-11-13', '1', 1, 1, 1, 1),
(22, 'rock lee', '9780000000001', '2018-11-13', 'rock lee', 1, 1, 1, 1),
(23, '111ewfw', '0786830239', '2018-11-13', '12', 121, 1, 1, 1),
(24, 'safsdf', '9780747569404', '2018-11-13', '1', 1, 1, 1, 1),
(25, '12345tdffg', '9780747569404', '2018-11-13', '1', 1, 1, 1, 1),
(26, 'sdv ds fsfd ', '9780747569404', '2018-11-13', '1', 1, 1, 1, 1),
(27, 'asdfghjkhgfd', '9780000000001', '2018-11-13', 'rock lee', 1, 1, 1, 1),
(28, 'asdvc v vc', '9780000000001', '2018-11-13', 'rock lee', 1, 1, 1, 1),
(29, 'r3t4grd', '0786830239', '2018-11-19', 'edwsfdv', 4, 1, 1, 1),
(30, '123456hfthfgh', '9780000000003', '2019-01-31', 'nat', 100, 1, 1, 1),
(31, '000001', '9780621063099', '2019-02-03', 'Tikoy', 200, 0, 1, 1),
(32, '000002', '9780402199901', '2019-02-03', 'Acquirer', 200, 0, 1, 1),
(33, '000003', '0988941589', '2019-02-03', 'Acquirer', 200, 0, 1, 1),
(34, '000004', '9785386262884', '2019-02-03', 'Joy', 200, 0, 1, 1),
(35, '000005', '9784773012941', '2019-02-03', 'Veronica', 200, 0, 1, 1),
(36, '000006', '9786523504294', '2019-02-03', 'Paulo', 200, 0, 1, 1),
(37, '000007', '9780549538394', '2019-02-03', 'Sylvia', 300, 0, 1, 1),
(38, '000008', '9781573309400', '2019-02-03', 'Sylvia', 200, 0, 1, 1),
(39, '000009', '9781017703597', '2019-02-03', 'Sylvia', 200, 0, 1, 1),
(40, '000010', '9789740928522', '2019-02-03', 'Sylvia', 200, 0, 1, 1),
(41, '000011', '9786361262394', '2019-02-03', 'Sylvia', 250, 0, 1, 1),
(42, '000012', '9788301119546', '2019-02-03', 'Susan', 200, 0, 1, 1),
(43, '000013', '9785149961931', '2019-02-03', 'Susan', 250, 0, 1, 1),
(44, '23456ytrte', '9780000000002', '2019-02-04', 'Johnrey', 200, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookstatus`
--

CREATE TABLE `bookstatus` (
  `BookStatusId` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `bookstatus`
--

TRUNCATE TABLE `bookstatus`;
--
-- Dumping data for table `bookstatus`
--

INSERT INTO `bookstatus` (`BookStatusId`, `Name`) VALUES
(1, 'Issued'),
(2, 'Returned'),
(3, 'Damaged'),
(4, 'Lost');

-- --------------------------------------------------------

--
-- Table structure for table `booksubject`
--

CREATE TABLE `booksubject` (
  `ISBN` varchar(13) NOT NULL,
  `SubjectId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `booksubject`
--

TRUNCATE TABLE `booksubject`;
--
-- Dumping data for table `booksubject`
--

INSERT INTO `booksubject` (`ISBN`, `SubjectId`) VALUES
('9780000000001', 1),
('9780747569404', 1),
('0786830239', 11),
('9781368012287', 14),
('9780000000003', 14),
('9780000000002', 15),
('9780621063099', 11),
('9780402199901', 15),
('9785386262884', 15),
('9784773012941', 11),
('9786523504294', 1),
('9780549538394', 17),
('9781573309400', 14),
('9781017703597', 14),
('9789740928522', 14),
('9786361262394', 16),
('9788301119546', 15),
('9785149961931', 15);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `CollegeId` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `college`
--

TRUNCATE TABLE `college`;
--
-- Dumping data for table `college`
--

INSERT INTO `college` (`CollegeId`, `Name`, `IsActive`) VALUES
(1, 'COS', 1),
(2, 'CIT', 1),
(3, 'CAFA', 1),
(4, 'CLA', 1),
(5, 'CIE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseId` int(11) NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `course`
--

TRUNCATE TABLE `course`;
--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CollegeId`, `Name`, `IsActive`) VALUES
(1, 1, 'BSIT', 1),
(2, 1, 'BSCS', 1),
(5, 3, 'BTIT', 1),
(6, 4, 'BSIE', 1),
(7, 4, 'BSABM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `LibrarianId` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `librarian`
--

TRUNCATE TABLE `librarian`;
--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`LibrarianId`, `FirstName`, `LastName`, `Username`, `Password`) VALUES
(1, 'Johnrey', 'Bacal', 'admin', 'admin'),
(2, 'Circu', 'Lation', 'circu', 'circulation'),
(4, 'Tao', 'Manager', 'hr', 'hrhrhrhr');

-- --------------------------------------------------------

--
-- Table structure for table `librarianaccess`
--

CREATE TABLE `librarianaccess` (
  `LibrarianId` int(11) NOT NULL,
  `LibrarianRoleId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `librarianaccess`
--

TRUNCATE TABLE `librarianaccess`;
--
-- Dumping data for table `librarianaccess`
--

INSERT INTO `librarianaccess` (`LibrarianId`, `LibrarianRoleId`) VALUES
(1, 2),
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 2),
(2, 1),
(2, 5),
(4, 6),
(4, 4),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `librarianrole`
--

CREATE TABLE `librarianrole` (
  `LibrarianRoleId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `librarianrole`
--

TRUNCATE TABLE `librarianrole`;
--
-- Dumping data for table `librarianrole`
--

INSERT INTO `librarianrole` (`LibrarianRoleId`, `Name`, `Description`) VALUES
(1, 'Library', 'Access to library content'),
(2, 'Circulation', 'Access to library circulation'),
(3, 'Patron Management', 'Access to patron management'),
(4, 'Outside Researcher', 'Access to outside researcher'),
(5, 'University', 'Access to university'),
(6, 'Staff Management', 'Access to staff management');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanId` int(11) NOT NULL,
  `PatronId` int(11) NOT NULL,
  `AccessionNumber` int(11) NOT NULL,
  `DateBorrowed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateDue` datetime NOT NULL,
  `DateReturned` datetime DEFAULT NULL,
  `AmountPayed` int(11) DEFAULT NULL,
  `BookStatusId` int(11) NOT NULL,
  `IsRecalled` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `loan`
--

TRUNCATE TABLE `loan`;
--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanId`, `PatronId`, `AccessionNumber`, `DateBorrowed`, `DateDue`, `DateReturned`, `AmountPayed`, `BookStatusId`, `IsRecalled`) VALUES
(4, 1, 11, '2018-10-26 20:11:43', '2018-10-29 20:11:43', '2018-10-26 00:00:00', 0, 2, 0),
(5, 1, 1, '2018-10-26 20:21:23', '2018-10-29 20:21:23', '2018-10-31 00:00:00', 30, 2, 0),
(6, 1, 13, '2018-10-26 20:21:31', '2018-10-29 20:21:31', '2019-02-03 10:41:14', 1920, 2, 1),
(7, 1, 11, '2018-10-28 22:06:45', '2018-10-31 22:06:45', '2018-10-30 00:00:00', 200, 4, 0),
(8, 1, 16, '2019-01-18 14:10:33', '2019-01-21 14:10:33', '2019-02-03 10:40:03', 240, 2, 0),
(9, 3, 34, '2019-02-03 12:17:19', '2019-02-06 12:17:19', '2019-02-03 12:17:57', 0, 2, 0),
(10, 3, 12, '2019-02-04 21:47:17', '2019-02-07 21:47:17', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `marcimport`
--

CREATE TABLE `marcimport` (
  `MarcImportId` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `marcimport`
--

TRUNCATE TABLE `marcimport`;
--
-- Dumping data for table `marcimport`
--

INSERT INTO `marcimport` (`MarcImportId`, `ISBN`, `Title`) VALUES
(113, '1595540059', 'Showdown /'),
(149, '1', 'try'),
(115, '0849944996', 'The martyr\'s song /'),
(116, '0849943736', 'Obsessed /'),
(117, '0849917921', 'White /'),
(118, '0849917913', 'Red /'),
(119, '0849917905', 'Black /'),
(120, '0849943728', 'Thr3e /'),
(121, '084994371X', 'Blink /'),
(122, '0849943809', 'A man called Blessed /'),
(123, '0849942926', 'Thunder of heaven /'),
(124, '0849943124', 'Blessed child /'),
(125, '0849942918', 'When heaven weeps /'),
(126, '0849942411', 'Heaven\'s wager /'),
(127, '9780979590023', 'White :'),
(128, '0979590019', 'Red :'),
(129, '1595541578', 'House'),
(130, '1404102337', 'The promise :'),
(131, '0849963672', 'Black'),
(132, '1595541551', 'House /'),
(133, '9781595544704', 'Kiss /'),
(134, '9781595546036', 'Chosen /'),
(135, '9781595546043', 'Infidel /'),
(136, '1595540083', 'Sinner /'),
(137, '9781602852068', 'Adam /'),
(138, '1595543716', 'Renegade /'),
(139, '1595543724', 'Chaos /'),
(140, '0979590000', 'Black :'),
(141, '9781602552173', 'Rojo :'),
(142, '9781602552159', 'Negro :'),
(143, '9781595544711', 'Burn /'),
(144, '9781599951966', 'The bride collector /'),
(145, '9780307588272', 'Tea with Hezbollah :'),
(146, '9781599954189', 'A.D. 30 :'),
(147, '9781599953588', 'Mortal /'),
(148, '0824771567', 'Transformation groups on manifolds /'),
(150, '1595540059', 'Showdown /'),
(151, '0439139597', 'Harry Potter and the goblet of fire /');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MessageId` int(11) NOT NULL,
  `PatronId` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `message`
--

TRUNCATE TABLE `message`;
--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MessageId`, `PatronId`, `Title`, `Message`, `DateTime`) VALUES
(10, 1, 'Your book is being recalled by the library', 'Please immediately return the book: The house of us to the library. Thank you.', '2018-10-30 22:05:56'),
(11, 1, 'Recall cancelled', 'Please enjoy your book', '2018-10-30 22:05:56'),
(12, 1, 'Your book is being recalled by the library', 'Please immediately return the book: The house of us to the library. Thank you.', '2018-10-30 22:10:47'),
(13, 1, 'Recall cancelled', 'Please enjoy your book', '2018-10-31 22:59:41'),
(14, 1, 'Your book is being recalled by the library', 'Please immediately return the book: The house of us to the library. Thank you.', '2018-10-31 22:59:57'),
(15, 0, 'Book ', 'Please enjoy your book Thank you.', '2019-02-03 12:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `outsideresearcher`
--

CREATE TABLE `outsideresearcher` (
  `OutsideResearcherId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `DateTime` datetime NOT NULL,
  `AmountPayed` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `outsideresearcher`
--

TRUNCATE TABLE `outsideresearcher`;
--
-- Dumping data for table `outsideresearcher`
--

INSERT INTO `outsideresearcher` (`OutsideResearcherId`, `Name`, `DateTime`, `AmountPayed`) VALUES
(3, 'Johnrey', '2018-10-09 00:00:00', 100),
(2, 'Johnrey', '2018-10-29 00:00:00', 100);

-- --------------------------------------------------------

--
-- Table structure for table `outsideresearchersubject`
--

CREATE TABLE `outsideresearchersubject` (
  `OutsideResearcherId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `outsideresearchersubject`
--

TRUNCATE TABLE `outsideresearchersubject`;
--
-- Dumping data for table `outsideresearchersubject`
--

INSERT INTO `outsideresearchersubject` (`OutsideResearcherId`, `SubjectId`) VALUES
(2, 15),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patron`
--

CREATE TABLE `patron` (
  `PatronId` int(11) NOT NULL,
  `PatronTypeId` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `ExtensionName` varchar(20) DEFAULT NULL,
  `IdNumber` varchar(50) NOT NULL,
  `RFIDNo` int(11) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DateCreated` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `patron`
--

TRUNCATE TABLE `patron`;
--
-- Dumping data for table `patron`
--

INSERT INTO `patron` (`PatronId`, `PatronTypeId`, `FirstName`, `MiddleName`, `LastName`, `ExtensionName`, `IdNumber`, `RFIDNo`, `Password`, `ContactNumber`, `Email`, `DateCreated`) VALUES
(1, 1, 'Johnrey', 'Cumayas', 'Bacal', '', '15-037-017', 1, '12345678', '+639770110623', 'johnrey.bacal@yahoo.com', '2018-11-08'),
(3, 1, 'John Mark', 'Lumbria', 'Sena', 'Negro', '15-000-000', 12123123, 'westsidenigga', '+639999999999', 'nigga@yahoo.com', '2018-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `patrontype`
--

CREATE TABLE `patrontype` (
  `PatronTypeId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `NumberOfBooks` int(11) NOT NULL,
  `NumberOfDays` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `patrontype`
--

TRUNCATE TABLE `patrontype`;
--
-- Dumping data for table `patrontype`
--

INSERT INTO `patrontype` (`PatronTypeId`, `Name`, `NumberOfBooks`, `NumberOfDays`, `IsActive`) VALUES
(1, 'Student', 1, 1, 1),
(2, 'Faculty employee', 10, 7, 1),
(3, 'Admin', 20, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PublisherId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `publisher`
--

TRUNCATE TABLE `publisher`;
--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PublisherId`, `Name`, `IsActive`) VALUES
(1, 'JB Publishing', 1),
(2, 'BooksRUs', 1),
(4, 'Publisher', 1),
(5, 'Piso print', 1),
(6, 'Publiko', 1),
(7, 'Manga pub', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ReservationId` int(11) NOT NULL,
  `PatronId` int(11) NOT NULL,
  `AccessionNumber` int(11) NOT NULL,
  `DateReserved` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsDiscarded` tinyint(1) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `reservation`
--

TRUNCATE TABLE `reservation`;
--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationId`, `PatronId`, `AccessionNumber`, `DateReserved`, `IsDiscarded`, `IsActive`) VALUES
(14, 1, 1, '2018-10-28 22:04:15', 1, 0),
(11, 1, 10, '2018-10-26 19:21:47', 1, 0),
(7, 1, 13, '2018-10-17 13:56:45', 0, 0),
(6, 1, 11, '2018-10-17 13:56:44', 1, 0),
(13, 1, 1, '2018-10-26 19:24:40', 0, 0),
(15, 1, 11, '2018-10-28 22:04:16', 0, 0),
(16, 1, 1, '2018-10-28 22:05:39', 1, 0),
(17, 1, 1, '2018-10-30 11:21:01', 1, 0),
(18, 1, 1, '2018-10-31 22:47:44', 1, 0),
(19, 1, 1, '2018-11-01 18:06:24', 1, 0),
(20, 3, 34, '2019-02-03 12:14:01', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `SectionId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `section`
--

TRUNCATE TABLE `section`;
--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionId`, `Name`, `IsActive`) VALUES
(1, 'Filipinana', 1),
(2, 'Thesis', 1),
(3, 'Fiction', 1),
(10, 'Section', 1);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `SeriesId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `series`
--

TRUNCATE TABLE `series`;
--
-- Dumping data for table `series`
--

INSERT INTO `series` (`SeriesId`, `Name`, `IsActive`) VALUES
(1, 'Star wars Series', 1),
(2, 'Harry Potter Series', 1),
(3, 'Series', 1),
(4, 'Teleserye', 0),
(5, 'Serye', 1),
(6, 'ship series', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `subject`
--

TRUNCATE TABLE `subject`;
--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectId`, `Name`, `IsActive`) VALUES
(1, 'Web Development', 1),
(11, 'Mathematics', 1),
(14, 'Economics: Land Reform', 1),
(15, 'Retorika', 1),
(16, 'C++', 1),
(17, 'C#', 1),
(18, 'Anime', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjectcourse`
--

CREATE TABLE `subjectcourse` (
  `SubjectId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `subjectcourse`
--

TRUNCATE TABLE `subjectcourse`;
--
-- Dumping data for table `subjectcourse`
--

INSERT INTO `subjectcourse` (`SubjectId`, `CourseId`) VALUES
(1, 1),
(1, 2),
(15, 6),
(14, 2),
(11, 5),
(16, 1),
(17, 1),
(18, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`AuthorId`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `bookcatalogue`
--
ALTER TABLE `bookcatalogue`
  ADD PRIMARY KEY (`AccessionNumber`);

--
-- Indexes for table `bookstatus`
--
ALTER TABLE `bookstatus`
  ADD PRIMARY KEY (`BookStatusId`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`CollegeId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`LibrarianId`);

--
-- Indexes for table `librarianrole`
--
ALTER TABLE `librarianrole`
  ADD PRIMARY KEY (`LibrarianRoleId`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LoanId`);

--
-- Indexes for table `marcimport`
--
ALTER TABLE `marcimport`
  ADD PRIMARY KEY (`MarcImportId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageId`);

--
-- Indexes for table `outsideresearcher`
--
ALTER TABLE `outsideresearcher`
  ADD PRIMARY KEY (`OutsideResearcherId`);

--
-- Indexes for table `patron`
--
ALTER TABLE `patron`
  ADD PRIMARY KEY (`PatronId`);

--
-- Indexes for table `patrontype`
--
ALTER TABLE `patrontype`
  ADD PRIMARY KEY (`PatronTypeId`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PublisherId`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationId`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`SectionId`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`SeriesId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `AuthorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `bookcatalogue`
--
ALTER TABLE `bookcatalogue`
  MODIFY `AccessionNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `bookstatus`
--
ALTER TABLE `bookstatus`
  MODIFY `BookStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `CollegeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `LibrarianId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `librarianrole`
--
ALTER TABLE `librarianrole`
  MODIFY `LibrarianRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `marcimport`
--
ALTER TABLE `marcimport`
  MODIFY `MarcImportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `outsideresearcher`
--
ALTER TABLE `outsideresearcher`
  MODIFY `OutsideResearcherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patron`
--
ALTER TABLE `patron`
  MODIFY `PatronId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patrontype`
--
ALTER TABLE `patrontype`
  MODIFY `PatronTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `PublisherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `SeriesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
