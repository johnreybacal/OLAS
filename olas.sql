-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 12:53 PM
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

DROP TABLE IF EXISTS `author`;
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
(1, 'Johnrey', 1),
(2, 'Judel Bacal', 1),
(3, 'Ning', 1),
(4, 'Abbie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `ISBN` varchar(13) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `PublisherId` int(11) NOT NULL,
  `SeriesId` int(11) DEFAULT NULL,
  `Edition` varchar(30) DEFAULT NULL,
  `DatePublished` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `book`
--

TRUNCATE TABLE `book`;
--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `Title`, `PublisherId`, `SeriesId`, `Edition`, `DatePublished`) VALUES
('1', 'Libro ni Kobi', 1, 1, '2', '2018-09-24'),
('2', 'Ikalawa2', 1, 1, '1', '2018-08-26'),
('3', 'asojas', 1, 1, '1', '2018-10-22'),
('', '', 0, 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `bookauthor`
--

DROP TABLE IF EXISTS `bookauthor`;
CREATE TABLE `bookauthor` (
  `ISBN` int(11) NOT NULL,
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
(3, 1),
(1, 1),
(2, 3),
(2, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookcatalogue`
--

DROP TABLE IF EXISTS `bookcatalogue`;
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
(1, '112', '2', '2018-09-04', 'Johnrey Pogi', 500, 0, 1, 1),
(11, '123', '3', '2018-10-26', 'dsfaa', 0, 1, 1, 1),
(10, 'asduhaud', '2', '2018-11-01', 'Abbie', 0, 1, 1, 1),
(9, 'os91', '1', '2018-10-27', '', 0, 1, 1, 1),
(12, 'sdg', '3', '2018-10-21', 'sdvsdf', 0, 1, 1, 1),
(13, '34', '1', '2018-10-22', 'dsfsff', 0, 1, 1, 1),
(14, '1', '2', '2018-11-01', 'q', 200, 0, 1, 1),
(15, '12343', '1', '2018-10-02', 'q', 3, 0, 1, 1),
(16, '90', '1', '2018-11-01', 'National BookStroe', 100, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookgenre`
--

DROP TABLE IF EXISTS `bookgenre`;
CREATE TABLE `bookgenre` (
  `ISBN` int(11) NOT NULL,
  `GenreId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `bookgenre`
--

TRUNCATE TABLE `bookgenre`;
--
-- Dumping data for table `bookgenre`
--

INSERT INTO `bookgenre` (`ISBN`, `GenreId`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookstatus`
--

DROP TABLE IF EXISTS `bookstatus`;
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

DROP TABLE IF EXISTS `booksubject`;
CREATE TABLE `booksubject` (
  `ISBN` int(11) NOT NULL,
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
(1, 11),
(2, 11),
(2, 1),
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
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
(4, 'CLA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
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
(6, 4, 'BSIE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `GenreId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `genre`
--

TRUNCATE TABLE `genre`;
--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GenreId`, `Name`, `IsActive`) VALUES
(1, 'Science', 1),
(2, 'Mathematics', 1),
(3, 'Fiction', 1),
(4, 'Sci Fi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

DROP TABLE IF EXISTS `librarian`;
CREATE TABLE `librarian` (
  `LibrarianId` int(11) NOT NULL,
  `LibrarianRoleId` int(11) NOT NULL,
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

INSERT INTO `librarian` (`LibrarianId`, `LibrarianRoleId`, `FirstName`, `LastName`, `Username`, `Password`) VALUES
(1, 1, 'Johnrey', 'Bacal', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `librarianrole`
--

DROP TABLE IF EXISTS `librarianrole`;
CREATE TABLE `librarianrole` (
  `LibrarianRoleId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `librarianrole`
--

TRUNCATE TABLE `librarianrole`;
--
-- Dumping data for table `librarianrole`
--

INSERT INTO `librarianrole` (`LibrarianRoleId`, `Name`, `IsActive`) VALUES
(1, 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE `loan` (
  `LoanId` int(11) NOT NULL,
  `MemberId` int(11) NOT NULL,
  `AccessionNumber` int(11) NOT NULL,
  `DateBorrowed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateDue` datetime NOT NULL,
  `DateReturned` datetime DEFAULT NULL,
  `AmountPayed` int(11) DEFAULT NULL,
  `BookStatusId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `loan`
--

TRUNCATE TABLE `loan`;
--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanId`, `MemberId`, `AccessionNumber`, `DateBorrowed`, `DateDue`, `DateReturned`, `AmountPayed`, `BookStatusId`) VALUES
(2, 1, 1, '2018-10-15 21:04:59', '2018-10-03 00:00:00', NULL, NULL, 1),
(3, 1, 1, '2018-10-15 21:40:19', '2018-10-16 00:00:00', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `outsideresearcher`
--

DROP TABLE IF EXISTS `outsideresearcher`;
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
(3, 'Johnrey', '2018-10-30 00:00:00', 100),
(2, 'Johnrey', '2018-10-29 00:00:00', 100);

-- --------------------------------------------------------

--
-- Table structure for table `outsideresearchersubject`
--

DROP TABLE IF EXISTS `outsideresearchersubject`;
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

DROP TABLE IF EXISTS `patron`;
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
  `Email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `patron`
--

TRUNCATE TABLE `patron`;
--
-- Dumping data for table `patron`
--

INSERT INTO `patron` (`PatronId`, `PatronTypeId`, `FirstName`, `MiddleName`, `LastName`, `ExtensionName`, `IdNumber`, `RFIDNo`, `Password`, `ContactNumber`, `Email`) VALUES
(1, 2, 'Johnrey', '', 'Bacal', NULL, '123', 0, '123', '12345', 'jaosj');

-- --------------------------------------------------------

--
-- Table structure for table `patrontype`
--

DROP TABLE IF EXISTS `patrontype`;
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
(2, 'Teacher', 10, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
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
(2, 'Abbie qt <3', 1),
(4, 'Publisher', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `ReservationId` int(11) NOT NULL,
  `MemberId` int(11) NOT NULL,
  `AccessionNumber` int(11) NOT NULL,
  `DateReserved` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsDiscarded` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `reservation`
--

TRUNCATE TABLE `reservation`;
--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationId`, `MemberId`, `AccessionNumber`, `DateReserved`, `IsDiscarded`) VALUES
(7, 1, 13, '2018-10-17 13:56:45', 0),
(6, 1, 11, '2018-10-17 13:56:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
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
(1, 'Abbiebebe Series', 1),
(2, 'Harry Potter Series', 1),
(3, 'Series', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
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
(14, 'Economics', 1),
(15, 'Retorika', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjectcourse`
--

DROP TABLE IF EXISTS `subjectcourse`;
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
(11, 5);

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
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GenreId`);

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
  MODIFY `AuthorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bookcatalogue`
--
ALTER TABLE `bookcatalogue`
  MODIFY `AccessionNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `bookstatus`
--
ALTER TABLE `bookstatus`
  MODIFY `BookStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `CollegeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `LibrarianId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `librarianrole`
--
ALTER TABLE `librarianrole`
  MODIFY `LibrarianRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `outsideresearcher`
--
ALTER TABLE `outsideresearcher`
  MODIFY `OutsideResearcherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patron`
--
ALTER TABLE `patron`
  MODIFY `PatronId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patrontype`
--
ALTER TABLE `patrontype`
  MODIFY `PatronTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `PublisherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `SeriesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
