-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 02:00 PM
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
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `AdmissionId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `DateTime` datetime NOT NULL,
  `IsOutsider` tinyint(1) NOT NULL,
  `School` varchar(100) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `AmountPayed` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `admission`
--

TRUNCATE TABLE `admission`;
-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `AuthorId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `author`
--

TRUNCATE TABLE `author`;
--
-- Dumping data for table `author`
--

INSERT INTO `author` (`AuthorId`, `Name`) VALUES
(1, 'Johnrey Bacal'),
(2, 'Judel');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

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
('1', 'Libro', 1, 1, NULL, '2018-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `bookauthor`
--

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
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bookcatalogue`
--

CREATE TABLE `bookcatalogue` (
  `AccessionNumber` int(11) NOT NULL,
  `CallNumber` varchar(20) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `DateAcquired` date NOT NULL,
  `AcquiredFrom` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `bookcatalogue`
--

TRUNCATE TABLE `bookcatalogue`;
--
-- Dumping data for table `bookcatalogue`
--

INSERT INTO `bookcatalogue` (`AccessionNumber`, `CallNumber`, `ISBN`, `Status`, `DateAcquired`, `AcquiredFrom`) VALUES
(1, '1', '1', 'In', '2018-09-04', 'Johnrey');

-- --------------------------------------------------------

--
-- Table structure for table `bookgenre`
--

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
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booksubject`
--

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
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `CollegeId` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `college`
--

TRUNCATE TABLE `college`;
--
-- Dumping data for table `college`
--

INSERT INTO `college` (`CollegeId`, `Name`) VALUES
(1, 'COS');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseId` int(11) NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `course`
--

TRUNCATE TABLE `course`;
--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CollegeId`, `Name`) VALUES
(1, 1, 'BSIT'),
(2, 1, 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GenreId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `genre`
--

TRUNCATE TABLE `genre`;
--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GenreId`, `Name`) VALUES
(1, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

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

CREATE TABLE `librarianrole` (
  `LibrarianRoleId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `librarianrole`
--

TRUNCATE TABLE `librarianrole`;
--
-- Dumping data for table `librarianrole`
--

INSERT INTO `librarianrole` (`LibrarianRoleId`, `Name`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanId` int(11) NOT NULL,
  `MemberId` int(11) NOT NULL,
  `AccessionNumber` int(11) NOT NULL,
  `DateBorrowed` datetime NOT NULL,
  `DateDue` datetime NOT NULL,
  `DateReturned` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `loan`
--

TRUNCATE TABLE `loan`;
-- --------------------------------------------------------

--
-- Table structure for table `loanhistory`
--

CREATE TABLE `loanhistory` (
  `LoanHistoryId` int(11) NOT NULL,
  `LoanId` int(11) NOT NULL,
  `AmountPayed` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `loanhistory`
--

TRUNCATE TABLE `loanhistory`;
-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberId` int(11) NOT NULL,
  `MemberTypeId` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `member`
--

TRUNCATE TABLE `member`;
-- --------------------------------------------------------

--
-- Table structure for table `membertype`
--

CREATE TABLE `membertype` (
  `MemberTypeId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `NumberOfBooks` int(11) NOT NULL,
  `NumberOfDays` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `membertype`
--

TRUNCATE TABLE `membertype`;
-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PublisherId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `publisher`
--

TRUNCATE TABLE `publisher`;
--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PublisherId`, `Name`) VALUES
(1, 'JBP');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ReservationId` int(11) NOT NULL,
  `MemberId` int(11) NOT NULL,
  `AccessionNumber` int(11) NOT NULL,
  `DateReserved` datetime NOT NULL,
  `IsDiscarded` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `reservation`
--

TRUNCATE TABLE `reservation`;
-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `SeriesId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `series`
--

TRUNCATE TABLE `series`;
--
-- Dumping data for table `series`
--

INSERT INTO `series` (`SeriesId`, `Name`) VALUES
(1, 'Thesis Series');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `subject`
--

TRUNCATE TABLE `subject`;
--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectId`, `Name`) VALUES
(1, 'Web Development');

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
(1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`AdmissionId`);

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
-- Indexes for table `loanhistory`
--
ALTER TABLE `loanhistory`
  ADD PRIMARY KEY (`LoanHistoryId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemberId`);

--
-- Indexes for table `membertype`
--
ALTER TABLE `membertype`
  ADD PRIMARY KEY (`MemberTypeId`);

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
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `AdmissionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `AuthorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bookcatalogue`
--
ALTER TABLE `bookcatalogue`
  MODIFY `AccessionNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `CollegeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `LoanId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loanhistory`
--
ALTER TABLE `loanhistory`
  MODIFY `LoanHistoryId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MemberId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membertype`
--
ALTER TABLE `membertype`
  MODIFY `MemberTypeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `PublisherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `SeriesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
