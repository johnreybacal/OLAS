-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 06:18 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `AdmissionId` int(11) NOT NULL,
  `PatronId` int(11) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`AdmissionId`, `PatronId`, `DateTime`) VALUES
(1, 1, '2019-04-07 12:56:03'),
(2, 2, '2019-04-07 12:57:39'),
(3, 2, '2019-04-07 12:58:13'),
(4, 4, '2019-04-07 12:59:02'),
(5, 4, '2019-04-07 13:04:05'),
(6, 4, '2019-04-07 13:05:48'),
(7, 3, '2019-04-07 13:46:54'),
(8, 3, '2019-04-07 13:47:16');

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
-- Dumping data for table `author`
--

INSERT INTO `author` (`AuthorId`, `Name`, `IsActive`) VALUES
(1, 'Wilson, Erica', 1),
(2, 'Rydberg Terry', 1),
(3, 'Rubin Mira', 1),
(4, 'Conger Joan E.', 1),
(5, 'Jury David', 1),
(6, 'White Jessica C.', 1),
(7, 'Brownie Barbara', 1),
(8, 'White, Jessica Christine', 1),
(9, 'Ambrose, Gavin', 1),
(10, 'Harris, Paul', 1),
(11, 'Ambrose Gavin', 1),
(12, 'Harris Paul', 1),
(13, 'Brown, Nancy', 1),
(14, 'MacVeigh, Jeremy', 1),
(15, 'Stone, Herbert', 1),
(16, 'Neilsen, Suzanne S.', 1),
(17, 'Drummond Karen Eich', 1),
(18, 'Rani, Sangeeta', 1),
(19, 'Trontz, Jennifer McKnight', 1),
(20, 'Campos Javier', 1),
(21, 'Seatzu Carla', 1),
(22, 'Xie Xiaolan', 1),
(23, 'Heragu, Sunderesh S.', 1),
(24, 'Greene, Jack', 1),
(25, 'Topmkins James A.', 1),
(26, 'White John A.', 1),
(27, 'Bozer Yabuz A.', 1),
(28, 'Tanchoco J.M.A.', 1),
(29, 'Giudice Fabio', 1),
(30, 'Kamrani Ali K. ., et al', 1),
(31, 'Davim Paulo J.', 1),
(32, 'Alexander J.A.P.', 1),
(33, 'Bolljanovic Vukota Ph.D.', 1),
(34, 'Beeley Peter', 1),
(35, 'Rudy Mohler', 1),
(36, 'Mohler, Rudy', 1),
(37, 'Simpson Colin D.', 1),
(38, 'Roth Laszlo, Wynbenga George L.', 1),
(39, 'Todd Robert H., Allen Dell K., Alting Leo', 1),
(40, 'Joseph-Armstrong Helen', 1),
(41, 'Cole Julie, Sharon Czachor', 1),
(42, 'Jouaneh M.', 1),
(43, 'Kumar Senthil R.', 1),
(44, 'Meigh-Andrews Chris', 1),
(45, 'Brazell Derek. Davies Jo', 1),
(46, 'Steane Jamie', 1),
(47, 'Dorosz Chris, Watson J.R.', 1),
(48, 'Purves, Barry', 1),
(49, 'Georgenes, Chris', 1),
(50, 'Hoskins, Stephen', 1),
(51, 'Veblen, Sarah', 1),
(52, 'Turney, Joanne', 1),
(53, 'Mullins, Willow G.', 1),
(54, 'Kleinert Eric', 1),
(55, 'Chorafas Dimitris N.', 1),
(56, 'Groth David, McBee Jim, Barnett David', 1),
(57, 'Grami Ali', 1),
(58, 'Buckley Alastair', 1),
(59, 'Northrop Robert B.', 1),
(60, 'Gibilisco Stan', 1),
(61, 'Schultz Mitchel E.', 1),
(62, 'Clark David P., Pazdernik Nanette J.', 1),
(63, 'Clark David P.', 1),
(64, 'Theodore Louis', 1),
(65, 'Prikryl R.', 1),
(66, 'Sharma Deepak', 1),
(67, 'Gkikas Nikolaos', 1),
(68, 'Pauwelussen Joop P.', 1),
(69, 'Reddi Vijay Janapa', 1),
(70, 'Jeong Hong', 1),
(71, 'Hart Daniel W.', 1),
(72, 'Worobiec Tony', 1),
(73, 'Prakel David', 1),
(74, 'Fox Anna, Caruana Natasha', 1),
(75, 'Toland Tony, Hartman Annesa', 1),
(76, 'Althouse, Andrew D.', 1),
(77, 'Sun Da-Wen', 1),
(78, 'Eismann, Katrin', 1),
(79, 'Toland Toni, Hartman Annesa', 1),
(80, 'Salkeld, Richard', 1),
(81, 'Short, Maria', 1),
(82, 'Turbiano, Franca', 1),
(83, 'Roaf, Sue', 1),
(84, 'Colwell Sarah, Baker Tony', 1),
(85, 'Yudelson, Jerry', 1),
(86, 'Pearce Annie R., Ahn Yong Han, HanmiGlobal', 1),
(87, 'Kibert, Charles J.', 1),
(88, 'Wilkinson Sara, Dixon Tim', 1),
(89, 'Rohinton Emmanuel, Baker Keith', 1),
(90, 'Attmann, Osman', 1),
(91, 'Adrover, Elvin Perez', 1),
(92, 'Dekker, Ted,', 1),
(94, 'Rowling, J. K.', 1),
(95, 'Turns, Stephen R.', 1),
(96, 'Barrett Steven F, Kridner Jason', 1),
(97, 'De Silva, Clarence W.', 1),
(98, 'Astakhov, Viktor P.', 1),
(99, 'Boyes, William E.', 1),
(100, 'Krar Steve, Gill Arthur, Smid Peter, Wanner Paul', 1),
(101, 'Logachev Ivan Nikolayevich, Logachev Konstantin Ivanovich', 1),
(102, 'Zhang Boming, Yan Zheng', 1),
(103, 'Soni, K. M.', 1),
(104, 'DeCarlo Raymond A.', 1),
(105, 'Alexander Charles K., Sadiku Matthew N.O.', 1),
(106, 'Kuffel E.', 1),
(107, 'Petruzella Frank D.', 1),
(108, 'Olenewa Jorge L.', 1),
(109, 'Hand Augie', 1),
(110, 'Toliyat Hamid A., et al', 1),
(111, 'Zorbas Dino', 1),
(112, 'Black and Veatch', 1),
(113, 'Floyd Thomas L.', 1),
(114, 'Dhillon B.S.', 1),
(115, 'Kirk Fanklyn W., et al', 1),
(116, 'Gupta A.K., et al', 1),
(117, 'Dr. Harris Aaron', 1),
(118, 'Roth Ruth A.', 1),
(119, 'Davison Gerald, Neale John', 1),
(120, 'Jay James, et al', 1),
(121, 'Blaker J. Warren, Resenblum William M.', 1),
(122, 'Irwin Peter, Denoon Roy, Scott David', 1),
(123, 'McCormac Jack, et al ', 1),
(124, 'Mouton Yves', 1),
(125, 'Gilmore Charles M.', 1),
(126, 'White Frank M.', 1),
(127, 'Sarkar Jayanta', 1),
(128, 'Garber Nicholas J., Hoel Lester A.', 1),
(129, 'Christensen Thomas H.', 1),
(130, 'Sonka Milan, et al', 1),
(131, 'Aghayere Abi O., Limbrunner George F.', 1),
(132, 'Potts Keith, Ankrah Nii', 1),
(133, 'Watson Donald, Crosbie Michael J.', 1),
(134, 'Kiessling, Puschmann, Schmieder, Schneider', 1),
(135, 'Webb Walter Loring', 1),
(136, 'Profillidis V. A.', 1),
(137, 'Bonnett Clifford F.', 1),
(138, 'Adams Katherine, et al', 1),
(139, 'National Association of City Transportation Officials', 1),
(140, 'Delaney Joseph ', 1),
(141, 'Ritz George J., Levy Sidney M.', 1),
(142, 'Greenhalgh Brian', 1),
(143, 'Daly Tim', 1),
(144, 'Ching Francis D.K., Binggeli Corky', 1),
(145, 'Ching Francis D. K., et al', 1),
(146, 'Aicher Otl', 1),
(147, 'Ozmon Howard', 1),
(148, 'Coppola Damon P.', 1),
(149, 'Myers David G., Twenge Jean M.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(13) NOT NULL,
  `CallNumber` varchar(20) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `PublisherId` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `SeriesId` int(11) DEFAULT NULL,
  `Edition` varchar(30) DEFAULT NULL,
  `DatePublished` date NOT NULL,
  `PlacePublished` varchar(100) NOT NULL,
  `Summary` text NOT NULL,
  `Extent` varchar(20) NOT NULL,
  `OtherDetails` varchar(20) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `Image` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `CallNumber`, `Title`, `PublisherId`, `SectionId`, `SeriesId`, `Edition`, `DatePublished`, `PlacePublished`, `Summary`, `Extent`, `OtherDetails`, `Size`, `Image`) VALUES
('0684152967', 'TT 751 W53 1977', 'Ask Erica', 1, 11, 0, '', '1977-01-01', 'New York', 'About the ABCs of needlework...', 'Good', '', '1 inch', 'ask.jpg'),
('1305263642', 'Z 253.532 A34 R92 20', 'Exploring Adobe InDesign Creative Cloud', 2, 14, 0, '', '2015-01-01', 'Canada', '', 'New', '', '2 inch', 'adobecreativecloud.jpg'),
('9780415661775', 'Z 253.532 A34 R83 20', 'Interactive Indesign CC', 3, 14, 0, '', '2014-01-01', 'Burlington, MA', '', 'New', '', '2.5 inch', 'inindcc.jpg'),
('1591581141', 'Z 692 C65 C67 2004', 'Collaborative Electronic Resource Management', 4, 14, 0, '', '2004-01-01', 'Westport, Conn', '', 'New', '', '1 inch', 'collab.jpg'),
('9782888931638', 'Z 252.5 R4 J87 2011', 'Letterpress: The Allure of the Handmade', 8, 14, 0, 'Second Edition', '2011-01-01', 'Mies, Switzerland', '', 'New', '', '1 inch', 'lph2.jpg'),
('9781454703297', 'Z 252.5 L48 W48 2013', 'Letterpress now: A DIY Guide to New & Old Printing Methods', 7, 14, 0, 'First Edtion', '2013-01-01', 'Asheville', '', 'New', '', '1 inch', '51HSo-eLYYL.jpg'),
('9782940496532', 'Z 246 A55 2014', 'Print and Finish', 9, 14, 2, 'Second Edition', '2014-01-01', 'USA', '', 'New', '', '1 inch', 'pf.jpg'),
('9788183569248', 'TX 911.3 T46 B76 201', 'The Growth Strategies of Hotel Industry', 10, 14, 0, 'First Edtion', '2011-01-01', 'New Delhi', '', 'New', '', '1 inch', 'default.png'),
('1418049652', 'TX 725 A1 N46 2009', 'International Cuisine', 11, 14, 0, 'First Edtion', '2009-01-01', 'Clifton Park, NY', '', 'New', '', '2 inch', 'ic.jpg'),
('9780123820860', 'TX 546 S76 2012', 'Sensory Evaluation Practices', 12, 14, 3, 'Fourth Edition', '2012-01-01', 'USA', '', 'New', '', '2 inch', 'SEP.jpg'),
('9781441914774', 'TX 545 F54 2014', 'Food Analysis', 13, 14, 4, 'Fourth Edition', '2014-01-01', 'New York', '', 'New', '', '2.5 inch', 'fa.jpg'),
('97811842973', 'TX 353 D78 2014', 'Nutrition for Foodservice and Culinary Professionals', 14, 14, 0, 'Eighth Edition', '2014-01-01', 'New Jersey', '', 'New', '', '1 inch', 'lemon.jpg'),
('9789351118442', 'TX 301 R36 2016', 'Housing and Home Management', 15, 14, 0, 'First Edition', '2016-01-01', 'New Delhi', '', 'New', '', '1.5 inch', 'hahm.jpg'),
('978159474617', 'TX 145 T76 2010', 'Home Economics Vintage Advice and Practical Science for the 21st-Century Household', 16, 14, 0, '', '2010-01-01', 'Philadelphia', '', 'New', '', '1 inch', 'he21.jpg'),
('9781466561557', 'TS 183 F67 2014', 'Formal Methods in Manufacturing', 17, 14, 0, 'First Edition', '2014-01-01', 'Boca Raton, FL', '', 'New', '', '1 inch', '9781466561557.jpg'),
('9781498732895', 'TS 177 H47 2016', 'Facilities Desgin', 17, 14, 0, 'Fourth Edition', '2016-01-01', 'Boca Raton, FL', '', 'New', '', '3 inch', 'facdesign.jpg'),
('9781466257993', 'TS 177 G74 2011', 'Plant Design, Facility Layout, Floor Planning', 19, 14, 0, 'First Edtion', '2011-01-01', 'Charleston, SC', '', 'New', '', '1 inch', 'greene.jpg'),
('9780470444047', 'TS 177 F32 2010', 'Facilities Planning', 20, 14, 0, 'Fourth Edition', '2010-01-01', 'Hoboken,NJ', '', 'New', '', '2 inch', 'facplan.jpg'),
('0849327229', 'TS 171.4 G48 2006', 'Product Design for the Environment: A Life Cycle Approach', 17, 14, 0, 'First Edition', '2006-01-01', 'Boca Raton, FL', '', 'New', '', '2 inch', 'proddd.jpg'),
('9781439808320', 'TS 170 M84 2013', 'Methods and Product Desig: New Strategies in Reengineering', 17, 14, 5, 'First Edition', '2013-01-01', 'Boca Raton, FL', '', 'New', '', '1 inch', '9781439808320.jpg'),
('9781848212121', 'TS 155.7 S85 2010', 'Sustainable Manufacturing', 20, 14, 7, 'First Edition', '2010-01-01', 'Hoboken,NJ', '', 'New', '', '1 inch', 'sus.jpg'),
('9781472533890', 'TR 660 A54 2015', 'Perspectives on Place', 9, 14, 0, 'First Edtion', '2015-01-01', ' USA', '', 'New', '', '1 inch', 'jap.jpg'),
('9780831134921', 'TS 250 B81 2014', 'Sheet Metal Forming Processes and Die Design', 21, 14, 0, 'Second Edition', '2014-01-01', 'South Norwalk', '', 'New', '', '1.5 inch', 'SHEEEEET.jpg'),
('9780750645676', 'TS 230 B44 2001', 'Foundry Technology', 22, 14, 0, 'Second Edition', '2001-01-01', 'Woburn', '', 'New', '', '3 inch', 'foundry.jpg'),
('9780831110217', 'TS 227 M56 1983', 'Practical Welding Technology', 21, 14, 0, 'First Edition', '1983-01-01', 'New York', '', 'New', '', '1 inch', 'pwt.jpg'),
('9780968686027', 'TS 211 S56 2008', 'Introduction to Robotics', 24, 14, 0, 'First Edition', '2008-01-01', 'London', '', 'New', '', '2 inch', 'rob.jpg'),
('9781118134153', 'TS 195.4 R68 2012', 'The Packaging: Designers Book of Patterns', 20, 14, 0, 'Fourth Edition', '2012-01-01', 'Hoboken,NJ', '', 'New', '', '2 inch', 'pattern.jpg'),
('0831130504', 'TS 183 T58 1994', 'Fundamental Principles of Manufacturing Processes', 21, 14, 0, 'First Edition', '1994-01-01', 'New York', '', 'New', '', '1 inch', 'fun.jpg'),
('9781609012403', 'TT 520 A73 2013', 'Draping for Apparel Design', 9, 14, 0, 'Third Edition', '2013-01-01', 'USA', '', 'New', '', '3 inch', 'draping.jpg'),
('9781609019259', 'TT 515 C65 2014', 'Professional Sewing Techniques for Designers', 9, 14, 0, '', '2014-01-01', 'New York', '', 'New', '', '2 inch', 'professional_sewing_tech_for_designers.jpg'),
('9780857857675', 'Z 246 B83 2015', 'Transforming Type: New Direction in Kinetic Typography', 9, 14, 0, 'First Edition', '2015-01-01', 'New York', '', 'New', '', '1 inch', 'tt.jpg'),
('2940361207', 'Z 244 J87 2006', 'Letterpress: New Applications for Traditional Skills', 5, 14, 0, 'First Edition', '2006-01-01', 'Switzerland', '', 'New', '', '1.5 inch', 'lpsssdsds.jpg'),
('1111569010', 'TT 163.12 J67 2013', 'Fundamentals of Mechatronics', 2, 14, 0, 'First Edition', '2013-01-01', 'Stanfford', '', 'New', '', '1.5 inch', 'MECH.jpg'),
('9781466566491', 'TS 1770 153 K86 2014', 'Textiles for Industrial Applications', 17, 14, 0, 'First Edition', '2014-01-01', 'Boca Raton, FL', '', 'New', '', '1.5 inch', 'fab.jpg'),
('9780857851789', 'N 6494 V53 M44 2015', 'A History of Video Art', 9, 14, 0, 'Second Edition', '2015-01-01', 'New York', '', 'New', '', '1 inch', 'va.jpg'),
('9781408171790', 'NC 997 B62 2014', 'Understanding Illustration', 9, 14, 0, 'First Edition', '2014-01-01', 'New York', '', 'New', '', '1 inch', 'ui.jpg'),
('9782940496112', 'NK 1520 S74 2014', 'The Principles & Processes of Interactive Design', 9, 14, 0, 'First Edition', '2014-01-01', 'New York', '', 'New', '', '1 inch', 'principles_int_design.jpg'),
('9781563678592', 'N 7432.7 D67 2011 ', 'Designing with Color: Concepts and Applications', 25, 14, 0, 'First Edition', '2011-01-01', 'New York', '', 'New', '', '2 inch', 'designing_color.jpg'),
('9781472521903', 'TR 897.6 P87 2014', 'Stop-motion Animation: Frame by Frame Film-making with Puppets and Models', 9, 14, 0, 'Second Edition', '2014-01-01', 'New York', '', 'New', '', '1 inch', 'stop_motion.jpg'),
('9780240525914', 'TR 897.72 F53 G36 20', 'How To Cheat in Adobe Flash CC', 3, 14, 0, 'First Edtion', '2014-01-01', 'New York', '', 'New', '', '2 inch', 'cheat_AdobeFCC.jpg'),
('9781408173794', 'TS 171.8 H67 2013 c.', '3D Printing for Artists, Designers and Makers', 9, 14, 0, 'First Edition', '2013-01-01', 'New York', '', 'New', '', '1 inch', '3D_printing.jpg'),
('9781589236080', 'TT 520 V43 2012', 'The Complete Photo Guide to Perfect Fitting', 26, 14, 0, 'First Edition', '2012-01-01', 'Minneapolis', '', 'New', '', '1 inch', 'perfect_fit.jpg'),
('9781845205928', 'TT 820 T92 2009', 'The Culture of Knitting', 27, 14, 0, 'First Edition', '2009-01-01', 'New York', '', 'New', '', '1 inch', 'culture_knitting.jpg'),
('9781845204396', 'TT 849.5 M85 2009', 'Felt', 28, 14, 0, '', '2009-01-01', 'New York', '', 'New', '', '1 inch', 'FELT.jpg'),
('9780071770187', 'TK 7018 K56 2013', 'Troubleshooting and Repairing Major Appliances', 29, 14, 0, 'Third Edition', '2013-01-01', 'USA', '', 'New', '', '4 inch', 'major.jpg'),
('9781439834534', 'TK 5105.8813 C492 20', 'Cloud Computing Strategies', 17, 14, 0, 'First Edition', '2011-01-01', 'Boca Raton, FL', '', 'New', '', '1.5 inch', 'cloud.jpg'),
('0782129587', 'TK 5103.12 G76 2001', 'Cabling: The Complete Guide to Network Wiring', 30, 14, 0, 'Second Edition', '2001-01-01', 'San Francisco', '', 'New', '', '3 inch', 'cabling.jpg'),
('9780124076822', 'TK 5103.7 G73 2015', 'Introduction to Digital Communications', 31, 14, 0, 'First Edition', '2015-01-01', 'New York', '', 'New', '', '2.5 inch', 'ali.jpg'),
('9780857094254', 'TK 7871.89 L53 2013', 'Organic Light Emitting Diode (OLEDs): Materials, Devices and Applications', 32, 14, 8, 'First Edition', '2013-01-01', 'Cambridge', '', 'New', '', '3 inch', 'oled.jpg'),
('9781466596771', 'TK 7870 N66 2014', 'Introduction to Instrumentation and Measurements', 17, 14, 0, 'Third Edition', '2014-01-01', 'Boca Raton, FL', '', 'New', '', '3 inch', 'robert.jpg'),
('9780071827782', 'TK 7866 G53 2014', 'Beginners Guide to Reading Schematics', 29, 14, 0, 'Third Edition', '2014-01-01', 'New York', '', 'New', '', '1 inch', 'schematics.jpg'),
('9781259215986', 'TK 7816 G75 2016', 'Grobs Basic Electronics', 29, 14, 0, 'Twelfth Edition', '2016-01-01', 'New York', '', 'New', '', '2.5 inch', 'mych.jpg'),
('9780123850157', 'TP 248.2 C52 2016', 'Biotechnology', 31, 14, 0, 'Second Edition', '2016-01-01', 'New York', '', 'New', '', '3 inch', 'bio.jpg'),
('9780071831314', 'TP 155 T52 2014', 'Chemical Engineering: The Essential Reference', 29, 14, 0, 'First Edition', '2014-01-01', 'USA', '', 'New', '', '1 inch', 'chem.jpg'),
('9781862392915', 'TN 950 N28 2010', 'Natural Stone Resources for Historical Monuments', 33, 14, 9, 'First Edition', '2010-01-01', 'London', '', 'New', '', '1 inch', 'rocks.jpg'),
('9788189922658', 'TN 870.5 S53 2014', 'Petroleum Science and Engineering', 34, 14, 0, 'First Edition', '2014-01-01', 'New Delhi', '', 'New', '', '1 inch', 'pet.jpg'),
('9878143989425', 'TL 250 A98 2013', 'Automotive Ergonomics: Driver-Vehicle Interaction', 17, 14, 0, 'First Edition', '2013-01-01', 'Boca Raton, FL', '', 'New', '', '1 inch', 'default.png'),
('9780081000366', 'TL 243 P39 2015 ', 'Essentials of Vehicle Dynamics', 35, 14, 0, 'First Edition', '2015-01-01', 'New York', '', 'New', '', '1 inch', 'vec.jpg'),
('9781608456376', 'TK 7895 M5 R43 2013', 'Resilient Architecture Design for Voltage Variation', 36, 14, 10, 'First Edition', '2013-01-01', 'California', '', 'New', '', '1 inch', 'vijay.jpg'),
('9781118659182', 'TK 7885.7 J46 2014', 'Architectures for Computer Vision: From Algorithm to Chip with Verilog', 20, 14, 0, 'First Edition', '2014-01-01', 'Singapore', '', 'New', '', '1 inch', 'arccyhy.jpg'),
('9780071289306', 'TK 7881.15 H35 2011', 'Power Electronics', 29, 14, 0, 'First Edition', '2011-01-01', 'New York', '', 'New', '', '1 inch', 'powerrr.jpg'),
('1446302637', 'TR 179 W67 2013', 'The Complete Guide to Photographic Composition', 37, 14, 0, 'First Edition', '2013-01-01', 'UK', '', 'New', '', '1 inch', 'phh.jpg'),
('9782940373857', 'TR 146 P73 2009', 'Working in Black and White', 38, 14, 11, 'First Edition', '2009-01-01', 'Lausanne', '', 'New', '', '1 inch', 'bnw.jpg'),
('9782940411665', 'TR 15 F69 2012', 'Behind the Image: Research in Photography', 9, 14, 12, 'First Edition', '2019-01-01', 'New York', '', 'New', '', '1 inch', 'behinds.jpg'),
('1133597106', 'TR 267.5 A3 T65 2013', 'Exploring Adobe Photoshop CS6', 11, 14, 0, '', '2013-01-01', 'New York', '', 'New', '', '1 inch', 'cs6.jpg'),
('9781619601994', 'TP 492 A43 2014', 'Modern Refrigeration and Airconditioning', 39, 14, 0, '19th Edition', '2014-01-01', 'USA', '', 'New', '', '3 inch', 'ref.jpg'),
('9780124114791', 'TP 370 E44 2014', 'Emerging Technologies for Food Processing', 35, 14, 13, 'First Edition', '2014-01-01', 'Amsterdam', '', 'New', '', '2 inch', 'dawen.jpg'),
('9782940411054', 'TR 591 P73 2009', 'Exposure', 40, 14, 0, 'First Edition', '2009-01-01', 'Switzerland', '', 'New', '', '1 inch', 'expo.jpg'),
('9782940411955', 'TR 590 P73 2013', 'Lighting', 40, 14, 14, 'First Edition', '2013-01-01', 'Switzerland', '', 'New', '', '1 inch', 'light.jpg'),
('0789723182', 'TR 310 E35 2001', 'Photoshop: Restoration and Retouching', 41, 14, 0, 'First Edition', '2001-01-01', 'Indianapolis', '', 'New', '', '1.5 inch', 'restoration.jpg'),
('9781133693253', 'TR 267 A3 T65 2013', 'Exploring Adobe Illustrator CS6', 11, 14, 0, 'First Edition', '2013-01-01', 'New York', '', 'New', '', '1 inch', 'illust_cs6.jpg'),
('9782940411894', 'TR 187 S35 2014', 'reading Photographs: An Introduction to the Theory and Meaning of Images', 9, 14, 16, 'First Edition', '2014-01-01', 'New York', '', 'New', '', '1 inch', 'rreading_photo.jpg'),
('9782940411405', 'TR 183 S56 2011', 'Context and Narrative', 40, 14, 17, 'First Edition', '2011-01-01', 'Switzerland', '', 'New', '', '1 inch', 'context.jpg'),
('9780415615280', 'TH 4860 D47 2013', 'Design and Construction of High-Performance Homes: Building Envelopes, Renewable Energies and Integr', 42, 14, 0, 'First Edition', '2013-01-01', 'New York', '', 'New', '', '1.5 inch', 'design_and_construction.jpg'),
('9780415526777', 'TH 4860 R62 2013', 'Ecohouse: A Design Guide', 42, 14, 0, 'Fourth Edition', '2013-01-01', 'New York', '', 'New', '', '2 inch', 'ecohouse.jpg'),
('9781848062344', 'TH 1092 C65 2013', 'Fire Performance of External Thermal Insulation for Walls of Multistorey Buildings', 43, 14, 0, 'Third Edition', '2013-01-01', 'Garston, Watford', '', 'New', '', '1 inch', 'fire_prevention.jpg'),
('9780071546010', 'TH 880 Y635 2009', 'Green Building Through Integrated Design', 29, 14, 18, 'First Edition', '2009-01-01', 'New York', '', 'New', '', '1 inch', 'download.jpg'),
('9780415690911', 'TH 880 P43 2012', 'Sustainable Buildings and Infrastructure: Paths to Future', 42, 14, 0, 'First Edition', '2012-01-01', 'New York', '', 'New', '', '2 inch', 'sustainable_building.jpg'),
('9780470114216', 'TH 880 K53 2008', 'Sustainable Construction: Green Building Design and Delivery', 20, 14, 19, 'Second Edition', '2008-01-01', 'Hoboken,NJ', '', 'New', '', '2 inch', 'sustainable_construction.jpg'),
('9781119055570', 'TH 2401 G74 2016', 'Green Roof Retrofit: Building Urban Resilience', 14, 14, 20, 'First Edition', '2016-01-01', 'UK', '', 'New', '', '1 inch', 'green_roof.jpg'),
('9780415684064', 'TH 880 E48 2012', 'Carbon Management in the Built Environment', 42, 14, 0, 'First Edition', '2012-01-01', 'New York', '', 'New', '', '1 inch', 'carbon_management.jpg'),
('9780071625012', 'TH 880 A88 2010', 'Green Architecture: Advanced Technologies and Materials', 29, 14, 18, 'First Edition', '2010-01-01', 'New York', '', 'New', '', '2 inch', 'green_archi.jpg'),
('1595540059', 'PS3554.E43', 'Showdown /', 47, 3, 0, '', '0000-00-00', 'Nashville, Tenn. :', '', 'x, 366 p. ;', '', '24 cm.', 'default.png'),
('9780073380193', 'TJ 254.5 T88 2012', 'An Introduction to Combustion: Concepts and Applications', 29, 14, 0, 'Third Edition', '2012-01-01', 'New York', '', 'New', '', '2 inch', 'combustion.jpg'),
('9780615654386', 'TJ 223 P76 A37 2012', 'Introduction to PLCs: A Beginner\'s Guide to Programmable Logic Controllers', 44, 14, 0, 'First Edition', '2012-01-01', 'California', '', 'New', '', '1 inch', 'intro_plc.jpg'),
('9781627051378', 'TJ 223 P76 B34 2013', 'Bad to the Bone: Crafting Electronic Systems with BeagleBone and BeagleBone Black', 49, 14, 21, 'First Edition', '2013-01-01', 'San Rafael, California', '', 'New', '', '1.5 inch', 'badtothebone.jpg'),
('0849307759', 'TJ 163.12 M41 2008 c', 'Mechatronic Systems: Devices, Design, Control, Operation and Monitoring', 50, 14, 22, 'First Edition', '2008-01-01', 'Boca Raton, FL', '', 'New', '', '2 inch', 'mechatronic_systems.jpg'),
('9781420082111', 'TJ 163.12 D44 2010', 'Mechatronics: A Foundation Course ', 50, 14, 0, 'First Edition', '2010-01-01', 'Boca Raton, FL', '', 'New', '', '2 inch', 'mechatronics_a_foundation_course.jpg'),
('9781466584341', 'TJ 1260 A87 2014', 'Drills: Science and Technology of Advanced Operations', 50, 14, 23, 'First Edition', '2014-01-01', 'Boca Raton, FL', '', 'New', '', '2 inch', 'drills.jpg'),
('0872632075', 'TJ 1187 L69 1986', 'Low-cost Jigs, Fixtures and Gages for Limited Production', 51, 14, 0, 'First Edition', '1986-01-01', 'Dearborn, Michigan', '', 'New', '', '1 inch', 'low_cost_jigs.jpg'),
('9780831131340', 'TJ 1185 G49 2002', 'Machine Tool Technology Basics', 21, 14, 0, 'First Edition', '2002-01-01', 'New York', '', 'New', '', '1 inch', 'machine_tool_basics.jpg'),
('9781482222166', 'TH 7692 L64 2014', 'Industrial Air Quality and Ventilation: Controlling Dust Emissions', 50, 14, 0, 'First Edition', '2014-01-01', 'Boca Raton, FL', '', 'New', '', '1 inch', 'controlling_dust_emissions.jpg'),
('9789814253338', 'TK 454.2 Z48 2011', 'Advanced Electric Power Network Analysis', 2, 14, 0, 'First Edition', '2011-01-01', 'Singapore', '', 'New', '', '1 inch', 'power_net_analysis.jpg'),
('9789350141427', 'TK 454.2 S66 2015', 'Circuit Analysis and Synthesis', 52, 14, 0, 'First Edition', '2015-01-01', 'New Delhi', '', 'New', '', '1 inch', 'circ_analysis.jpg'),
('0130431346', 'TK 454 D42 1995', 'Linear Circuit Analysis: A Time Domain and Phasor Approach', 53, 14, 0, 'First Edition', '1995-01-01', 'New Jersey', '', 'New', '', '1 inch', 'linear_circ_analysis.jpg'),
('9780078028229', 'TK 454 A45 2017', 'Fundamentals of Electric Circuits', 29, 14, 0, 'Sixth Edition', '2017-01-01', 'New York', '', 'New', '', '1.5 inch', 'fundamentals.jpg'),
('9782940411771', 'TK 179 P73 2012', 'Composition', 40, 14, 24, 'Second Edition', '2012-01-01', 'Switzerland', '', 'New', '', '1 inch', 'composition.jpg'),
('9780080242125', 'TK 153 K8 1984', 'High Voltage Engineering: Fundamentals', 54, 14, 25, 'First Edition', '1984-01-01', 'New York', '', 'New', '', '1.5 inch', 'high_voltage.jpg'),
('9781259060779', 'TK 146 P44 2014', 'Electricity for the Trades', 29, 14, 0, 'Second Edition', '2014-01-01', 'New York', '', 'New', '', '1 inch', 'electricity4traDES.jpg'),
('9781305958531', 'TK 5103.2 O44 2014', 'Guide to Wireless Communication', 2, 14, 0, 'Fourth Edition', '2014-01-01', 'Singapore', '', 'New', '', '1.5 inch', 'sirkit.jpg'),
('9780071763950', 'TK 2514 H25 2011', 'Electric Motor Maintenance and Troubleshooting', 29, 14, 0, 'Second Edition', '2011-01-01', 'New York', '', 'New', '', '1 inch', 'ee.jpg'),
('9780849370274', 'TK 2313 E44 2013', 'Electric Machines: Modeling, Condition Monitoring, and Fault Diagnosis', 50, 14, 0, 'First Edition', '2013-01-01', 'Boca Raton, FL', '', '', '', '', 'em.jpg'),
('9781133628514', 'TK 2000 Z67 2015', 'Electric Machines: Principles, Applications, and Control Schematics', 2, 14, 0, 'Second Edition', '2015-01-01', 'Singapore', '', 'New', '', '1 inch', 'machineeeee.jpg'),
('8123905580', 'TK 1191 P64 2005', 'Power Plant Engineering', 55, 14, 0, 'First Edition', '2005-01-01', 'New Delhi', '', 'New', '', '2 inch', 'ppe.jpg'),
('9781292075983', 'TK 786.8 D5 F53 2015', 'Digital Fundamentals', 56, 14, 0, '11th Edition', '2015-01-01', 'New York', '', 'New', '', '1.5 inch', 'per.jpg'),
('9781498781633', 'TA 168 D52 2017', 'Engineering Systems Reliability, Safety and Maintenance: An Integrated Approach', 50, 14, 0, 'First Edition', '2017-01-01', 'Boca Raton, FL', '', 'New', '', '1 inch', 'Dhillon.jpg'),
('9780826934307', 'TA 165 K5 2010', 'Instrumentation', 57, 14, 0, 'Fifth Edition', '2010-01-01', 'Illinois', '', 'New', '', '2 inch', 'INSSS.jpg'),
('9781938549304', 'T 59.5 G87 2017', 'Industrial Automation and Robotics', 58, 14, 0, 'First Edition', '2017-01-01', 'Virginia', '', 'New', '', '2 inch', 'gupoo.jpg'),
('9382226659', 'S 21 H37 2013 ', 'Energy, Irrigation and Water Supply ', 59, 14, 0, 'First Edition', '2013-01-01', 'New Delhi', '', 'New', '', '1 inch', 'eene.jpg'),
('9781133960508', 'RM 216 T68 2014', 'Nutrition and Diet Therapy', 2, 14, 0, '11th Edition', '2014-01-01', 'Singapore', '', 'New', '', '1 inch', 'dieta.jpg'),
('9781118859094', 'RC 454 A24 2016', 'Abnormal Psychology: The Science and Treatment of Psychological Disorders', 20, 14, 0, '13th Edition', '2014-01-01', 'USA', '', 'New', '', '1 inch', 'ABNOY.jpg'),
('0387231803', 'QR 115 J3 2005', 'Modern Food Microbiology', 13, 14, 4, '7th Edition', '2005-01-01', 'USA', '', 'New', '', '2 inch', 'ff.jpg'),
('9789832559431', 'QC 355.2 B53 2016', 'Optics: An Introduction for Students of Engineering', 56, 14, 0, 'First Edition', '2016-01-01', 'India', '', 'New', '', '', 'op.jpg'),
('9780415714594', 'TA 654.5 178 2013', 'Wind Tunnel Testing of High-Rise Buildings: An Output of CTBUH Wind Engineering Working Group', 50, 14, 0, 'First Edition', '2013-01-01', 'New York', '', 'New', '', '0.5 inches', 'wind_tunnel.jpg'),
('9780470496619', 'TA 545 M17 2013', 'Surveying', 20, 14, 0, 'Sixth Edition', '2013-01-01', 'USA', '', 'New', '', '1 inch', 'surveying.jpg'),
('9781848212244', 'TA 455 P58 O65 2011', 'Organic Materials for Sustainable Construction', 20, 14, 0, 'First Edition', '2011-01-01', 'USA', '', 'New', '', '1.5 inch', 'organic_mats.jpg'),
('9781111988609', 'TA 403 J52 2015', 'Materials Science and Engineering Properties', 2, 14, 0, 'First Edition', '2015-01-01', 'Singapore', '', 'New', '', '1 inch', 'materials_science.jpg'),
('9780073398273', 'TA 357 W48 2016', 'Fluid Mechanics', 29, 14, 0, 'Eighth Edition', '2016-01-01', 'New York', '', 'New', '', '1.5 inch', 'fluid_mech.jpg'),
('9781482208795', 'TA 345 S31 2015', 'Computer Aided Design: A Conceptual Approach', 50, 14, 0, 'First Edition', '2015-01-01', 'Boca Raton, FL', '', 'New', '', '2 inch', 'comp_design.jpg'),
('9781133605157', 'TE 145 G35 2015', 'Traffic and Highway Engineering', 2, 14, 0, 'Fifth Edition', '2015-01-01', 'SIngapore', '', 'New', '', '2.5 inches', 'highway_engineeriong.jpg'),
('978140175173', 'TD 791 S65 2011 vol.', 'Solid Waste Technology and Management', 20, 14, 0, 'First Edition', '2011-01-01', 'New York', '', 'New', '', '1 inch', 'solid_waste_tech.jpg'),
('9781133593607', 'TA 1637 S66 2015', 'Image Processing, Analysis, and Machine Vision', 60, 14, 0, 'Fourth Edition', '2015-01-01', 'Toronto', '', 'New', '', '1.5 inch', 'image_process.jpg'),
('9780132859295', 'TA 83.2 L44 2014', 'Reinforced Concrete Design', 56, 14, 0, 'Eighth Edition', '2014-01-01', 'London', '', 'New', '', '0.5 inches', 'concrete_design.jpg'),
('9780415629126', 'TA 682.26 T68 2013', 'Construction Cost Management: Learning from Case Studies', 50, 14, 0, 'Second Edition', '2013-01-01', 'New York', '', 'New', '', '1 inch', 'construction_cost.jpg'),
('9780071432061', 'TH 151 T55 2005 c. 4', 'Time Saver Standards for Architectural Design: Technical Data for Professional Practice', 29, 14, 0, 'Eighth Edition', '2005-01-01', 'New York', '', 'New', '', '1.5 inch', 'acrshi_design.jpg'),
('9783895783227', 'TF 857 K54 2009', 'Contact Lines for Electric Railways: Planning, Design, Implementation, Maintenance', 61, 14, 0, 'Second Edition', '2009-01-01', 'Germany', '', 'New', '', '2 inch', 'contact_lines.jpg'),
('48540856R0028', 'TF 200 W4 1900', 'Railroad Construction - Theory and Practice - A Textbook for the Use of Students in Colleges and Tec', 20, 14, 0, 'First Edition', '2013-01-01', 'London', '', 'New', '', '1.5 inch', 'default.png'),
('9781409464631', 'TF 145 P76 2014', 'Railway Management and Engineering', 50, 14, 0, 'Fourth Edition', '2014-01-01', 'London', '', 'New', '', '1 inch', 'railway_managemnt.jpg'),
('9781860945151', 'TF 145 B66 2005', 'Practical Railway Engineering  ', 62, 14, 0, 'Second Edition', '2005-01-01', 'London', '', 'New', '', '1 inch', 'practical_railway.jpg'),
('9781848062733', 'TD 899 C5885 A33 201', 'Dealing with Difficult Demolition Wastes: A Guide', 43, 14, 0, 'First Edition', '2013-01-01', 'Berkshire', '', 'New', '', '0.25 inches', 'demolition_waste.jpg'),
('9781610915656', 'TE 301 N38 2014', 'Urban Bikeway Design Guide/National Association of City Transportation Officials', 63, 14, 0, 'Second Edition', '2014-01-01', 'Washington', '', 'New', '', '0.5 inches', 'bikeway_design.jpg'),
('9781466575042', 'TH 483 D33 2014', 'Construction Program Management', 50, 14, 26, 'First Edition', '2014-01-01', 'New York', '', 'New', '', '0.5 inches', 'construction_management.jpg'),
('9780071801379', 'TH 438 R54 2013', 'Total Construction: Project Management', 29, 14, 0, 'Second Edition', '2013-01-01', 'USA', '', 'New', '', '1 inch', 'total_const.jpg'),
('9780415509862', 'TH 435 G66 2013', 'Introduction to Estimating for Construction', 50, 14, 0, 'First Edition', '2013-01-01', 'New York', '', 'New', '', '0.5 inches', 'estimating_const.jpg'),
('9782940496068', 'TH 267 D35 2014', 'The Fundamentals of Digital Photography', 9, 14, 27, 'First Edition', '2014-01-01', 'New York', '', 'New', '', '0.5 inches', 'digital_photo.jpg'),
('9781118090718', 'NA 2850 C45 2012', 'Interior Design Illustrated', 20, 14, 0, 'Third Edition', '2012-01-01', 'London', '', 'New', '', '1 inch', 'int_design_illust.jpg'),
('9780470402573', 'NA 200 C49 2011', 'A Global History of Architecture', 20, 14, 0, 'Second Edition', '2011-01-01', 'London', '', 'New', '', '2 inch', 'archi_history.jpg'),
('9783433031193', 'N 68 A43 2015', 'Analogous and Digital', 64, 14, 0, 'Second Edition', '2015-01-01', 'Berlin', '', 'New', '', '0.5 inches', 'analogius_and_digital.jpg'),
('9780132540742', 'LB 14.7 O96 2012', 'Philosophical Foundations of Education', 56, 14, 0, 'Ninth Edition', '2012-01-01', 'Indianapolis', '', 'New', '', '1 inch', 'foundations_of_educ.jpg'),
('9780128014776', 'HV 553 C69 2015', 'Introduction to International Disaster Management', 22, 14, 0, 'Third Edition', '2015-01-01', 'London', '', 'New', '', '1.5 inch', 'int_disaster_managemnt.jpg'),
('9781259251139', 'HM 251 M89 2017', 'Social Psychology', 29, 14, 0, 'Twelfth Edition', '2017-01-01', 'New York', '', 'New', '', '1.5 inch', 'social_psych.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookauthor`
--

CREATE TABLE `bookauthor` (
  `ISBN` varchar(13) NOT NULL,
  `AuthorId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookauthor`
--

INSERT INTO `bookauthor` (`ISBN`, `AuthorId`) VALUES
('0684152967', 1),
('1305263642', 2),
('9780415661775', 3),
('1591581141', 4),
('9782888931638', 5),
('9781454703297', 8),
('9782940496532', 12),
('9782940496532', 11),
('9788183569248', 13),
('1418049652', 14),
('9780123820860', 15),
('9781441914774', 16),
('97811842973', 17),
('9789351118442', 18),
('978159474617', 19),
('9781466561557', 22),
('9781466561557', 21),
('9781466561557', 20),
('9781498732895', 23),
('9781466257993', 24),
('9780470444047', 28),
('9780470444047', 27),
('9780470444047', 26),
('9780470444047', 25),
('0849327229', 29),
('9781439808320', 30),
('9781848212121', 31),
('9781472533890', 32),
('9780831134921', 33),
('9780750645676', 34),
('9780831110217', 36),
('9780831110217', 35),
('9780968686027', 37),
('9781118134153', 38),
('0831130504', 39),
('9781609012403', 40),
('9781609019259', 41),
('9780857857675', 7),
('2940361207', 5),
('1111569010', 42),
('9781466566491', 43),
('9780857851789', 44),
('9781408171790', 45),
('9782940496112', 46),
('9781563678592', 47),
('9781472521903', 48),
('9780240525914', 49),
('9781408173794', 50),
('9781589236080', 51),
('9781845205928', 52),
('9781845204396', 53),
('9780071770187', 54),
('9781439834534', 55),
('0782129587', 56),
('9780124076822', 57),
('9780857094254', 58),
('9781466596771', 59),
('9780071827782', 60),
('9781259215986', 61),
('9780123850157', 63),
('9780071831314', 64),
('9781862392915', 65),
('9788189922658', 66),
('9878143989425', 67),
('9780081000366', 68),
('9781608456376', 69),
('9781118659182', 70),
('9780071289306', 71),
('1446302637', 72),
('9782940373857', 73),
('9782940411665', 74),
('1133597106', 75),
('9781619601994', 76),
('9780124114791', 77),
('9782940411054', 73),
('9782940411955', 73),
('0789723182', 78),
('9781133693253', 79),
('9782940411894', 80),
('9782940411405', 81),
('9780415615280', 82),
('9780415526777', 83),
('9781848062344', 84),
('9780071546010', 85),
('9780415690911', 86),
('9780470114216', 87),
('9781119055570', 88),
('9780415684064', 89),
('9780071625012', 90),
('1595540059', 92),
('9780073380193', 95),
('9780615654386', 91),
('9781627051378', 96),
('0849307759', 97),
('9781420082111', 97),
('9781466584341', 98),
('0872632075', 99),
('9780831131340', 100),
('9781482222166', 101),
('9789814253338', 102),
('9789350141427', 103),
('0130431346', 104),
('9780078028229', 105),
('9782940411771', 73),
('9780080242125', 106),
('9781259060779', 107),
('9781305958531', 108),
('9780071763950', 109),
('9780849370274', 110),
('9781133628514', 111),
('8123905580', 112),
('9781292075983', 113),
('9781498781633', 114),
('9780826934307', 115),
('9781938549304', 116),
('9382226659', 117),
('9781133960508', 118),
('9781118859094', 119),
('0387231803', 120),
('9789832559431', 121),
('9780415714594', 122),
('9780470496619', 123),
('9781848212244', 124),
('9781111988609', 125),
('9780073398273', 126),
('9781482208795', 127),
('9781133605157', 128),
('978140175173', 129),
('9781133593607', 130),
('9780132859295', 131),
('9780415629126', 132),
('9780071432061', 133),
('9783895783227', 134),
('48540856R0028', 135),
('9781409464631', 136),
('9781860945151', 137),
('9781848062733', 138),
('9781610915656', 139),
('9781466575042', 140),
('9780071801379', 141),
('9780415509862', 142),
('9782940496068', 143),
('9781118090718', 144),
('9780470402573', 145),
('9783433031193', 146),
('9780132540742', 147),
('9780128014776', 148),
('9781259251139', 149);

-- --------------------------------------------------------

--
-- Table structure for table `bookcatalogue`
--

CREATE TABLE `bookcatalogue` (
  `AccessionNumber` varchar(7) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `DateAcquired` date NOT NULL,
  `AcquiredFrom` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Notes` text NOT NULL,
  `IsRoomUseOnly` tinyint(1) NOT NULL,
  `IsAvailable` tinyint(1) NOT NULL DEFAULT '1',
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcatalogue`
--

INSERT INTO `bookcatalogue` (`AccessionNumber`, `ISBN`, `DateAcquired`, `AcquiredFrom`, `Price`, `Notes`, `IsRoomUseOnly`, `IsAvailable`, `IsActive`) VALUES
('0000001', '0684152967', '2019-03-05', 'TUP Library', 0, '', 1, 1, 1),
('0000002', '1305263642', '2017-07-14', 'Sew Enterprises', 7000, '', 1, 1, 1),
('0000003', '9780415661775', '2016-09-27', 'New Century Books and General Mrchandise', 2750, '', 1, 1, 1),
('0000004', '1591581141', '2017-09-25', 'Sew Enterprises', 3250, '', 1, 1, 1),
('0000005', '9782888931638', '2017-09-25', 'Sew Enterprises', 4995, '', 1, 1, 1),
('0000006', '9781454703297', '2019-03-05', 'TUP Library', 0, '', 1, 1, 1),
('0000007', '9782940496532', '2017-07-14', 'Sew Enterprises', 4298, '', 1, 1, 1),
('0000008', '9788183569248', '2017-09-25', 'Sew Enterprises', 1800, '', 1, 1, 1),
('0000009', '1418049652', '2014-08-19', 'SERV Enterprises', 8349, '', 1, 1, 1),
('0000010', '9780123820860', '2016-09-27', 'New Century Books and General Merchandise', 5100, '', 1, 1, 1),
('0000011', '9781441914774', '2015-04-21', 'SERV Enterprises', 4500, '', 1, 1, 1),
('0000012', '97811842973', '2015-04-21', 'SERV Enterprises', 4125, '', 1, 1, 1),
('0000013', '9789351118442', '2017-09-25', 'Sew Enterprises', 3900, '', 1, 1, 1),
('0000014', '978159474617', '2017-07-14', 'Sew Enterprises', 1906, '', 1, 1, 1),
('0000015', '9781466561557', '2017-07-14', 'Sew Enterprises', 18413, '', 1, 1, 1),
('0000016', '9781498732895', '2017-07-14', 'Sew Enterprises', 12783, '', 1, 1, 1),
('0000017', '9781466257993', '2017-07-14', 'Sew Enterprises', 3678, '', 1, 1, 1),
('0000018', '9780470444047', '2017-07-14', 'Sew Enterprises', 18413, '', 1, 1, 1),
('0000019', '0849327229', '2006-09-19', 'J.De Jesus', 0, '', 1, 1, 1),
('0000020', '9781439808320', '2017-07-14', 'Sew Enterprises', 4627, '', 1, 1, 1),
('0000021', '9781848212121', '2017-07-14', 'Sew Enterprises', 11052, '', 1, 1, 1),
('0000022', '9781472533890', '2017-07-14', 'Sew Enterprises', 5405, '', 1, 1, 1),
('0000023', '9780831134921', '2017-07-14', 'Sew Enterprises', 6110, '', 1, 1, 1),
('0000024', '9780750645676', '2017-07-14', 'Sew Enterprises', 13502, '', 1, 1, 1),
('0000025', '9780831110217', '2017-07-14', 'Sew Enterprises', 4421, '', 1, 1, 1),
('0000026', '9780968686027', '2017-07-14', 'Sew Enterprises', 13999, '', 1, 1, 1),
('0000027', '9781118134153', '2017-07-14', 'Sew Enterprises', 8484, '', 1, 1, 1),
('0000028', '0831130504', '2017-07-14', 'Sew Enterprises', 4231, '', 1, 1, 1),
('0000029', '9781609012403', '2017-07-14', 'Sew Enterprises', 7988, '', 1, 1, 1),
('0000030', '9781609019259', '2017-07-14', 'Sew Enterprises', 5155, '', 1, 1, 1),
('0000031', '9780857857675', '2019-03-06', 'Sew Enterprises', 8590, '', 1, 1, 1),
('0000032', '2940361207', '2017-07-14', 'Sew Enterprises', 5771, '', 1, 1, 1),
('0000033', '1111569010', '2019-03-06', 'Sew Enterprises', 19280, '', 1, 1, 1),
('0000034', '9781466566491', '2017-07-14', 'Sew Enterprises', 8590, '', 1, 1, 1),
('0000035', '9780857851789', '2017-07-14', 'Sew Enterprises', 4906, '', 1, 1, 1),
('0000036', '9781408171790', '2019-03-05', 'TUP Library', 0, '', 1, 1, 1),
('0000037', '9782940496112', '2019-03-06', 'TUP Library', 0, '', 1, 1, 1),
('0000038', '9781563678592', '2019-03-06', 'TUP Library', 0, '', 1, 1, 1),
('0000039', '9781472521903', '2017-07-14', 'Sew Enterprises', 4624, '', 1, 1, 1),
('0000040', '9780240525914', '2016-09-27', 'New Century General Merchandise', 2750, '', 1, 1, 1),
('0000041', '9781408173794', '2016-09-27', 'New Century Books and General Merchandise', 2990, '', 1, 1, 1),
('0000042', '9781589236080', '2017-07-14', 'Sew Enterprises', 5167, '', 1, 1, 1),
('0000043', '9781845205928', '2017-09-25', 'SERV Enterprises', 2900, '', 1, 1, 1),
('0000044', '9781845204396', '2017-09-25', 'SERV Enterprises', 3124, '', 1, 1, 1),
('0000045', '9780071770187', '2017-07-14', 'Sew Enterprises', 6115, '', 1, 1, 1),
('0000046', '9781439834534', '2011-12-14', 'SERV Enterprises', 4450, '', 1, 1, 1),
('0000047', '0782129587', '2017-07-14', 'Sew Enterprises', 7883, '', 1, 1, 1),
('0000048', '9780124076822', '2017-07-14', 'Sew Enterprises', 12228, '', 1, 1, 1),
('0000049', '9780857094254', '2017-07-14', 'Sew Enterprises', 30702, '', 1, 1, 1),
('0000050', '9781466596771', '2017-07-14', 'Sew Enterprises', 12610, '', 1, 1, 1),
('0000051', '9780071827782', '2017-07-14', 'Sew Enterprises', 2356, '', 1, 1, 1),
('0000052', '9781259215986', '2017-07-14', 'Sew Enterprises', 19150, '', 1, 1, 1),
('0000053', '9780123850157', '2017-07-14', 'Sew Enterprises', 11667, '', 1, 1, 1),
('0000054', '9780071831314', '2017-09-25', 'Sew Enterprises', 8665, '', 1, 1, 1),
('0000055', '9781862392915', '2017-07-14', 'Sew Enterprises', 7074, '', 1, 1, 1),
('0000056', '9788189922658', '2017-07-14', 'Sew Enterprises', 2495, '', 1, 1, 1),
('0000057', '9878143989425', '2017-07-14', 'Sew Enterprises', 13114, '', 1, 1, 1),
('0000058', '9780081000366', '2017-07-14', 'Sew Enterprises', 9211, '', 1, 1, 1),
('0000059', '9781608456376', '2017-09-25', 'Sew Enterprises', 3800, '', 1, 1, 1),
('0000060', '9781118659182', '2017-09-25', 'Sew Enterprises', 8230, '', 1, 1, 1),
('0000061', '9780071289306', '2017-07-14', 'Sew Enterprises', 4545, '', 1, 1, 1),
('0000062', '1446302637', '2017-07-14', 'Sew Enterprises', 0, '', 1, 1, 1),
('0000063', '9782940373857', '2017-07-14', 'TUP Library', 0, '', 1, 1, 1),
('0000064', '9782940411665', '2017-07-14', 'Sew Enterprises', 3377, '', 1, 1, 1),
('0000065', '1133597106', '2017-07-14', 'Sew Enterprises', 8264, '', 1, 1, 1),
('0000066', '9781619601994', '2017-07-14', 'Sew Enterprises', 15960, '', 1, 1, 1),
('0000067', '9780124114791', '2017-07-14', 'Sew Enterprises', 16452, '', 1, 1, 1),
('0000068', '9782940411054', '2019-03-07', 'TUP Library', 0, '', 1, 1, 1),
('0000069', '9782940411955', '2019-03-07', 'TUP Library', 0, '', 1, 1, 1),
('0000070', '0789723182', '2017-07-14', 'Sew Enterprises', 4295, '', 1, 1, 1),
('0000071', '9781133693253', '2017-07-14', 'Sew Enterprises', 7153, '', 1, 1, 1),
('0000072', '9782940411894', '2019-03-07', 'TUP Library', 0, '', 1, 1, 1),
('0000073', '9782940411405', '2019-03-07', 'TUP Library', 0, '', 1, 1, 1),
('0000074', '9780415615280', '2017-07-14', 'Sew Enterprises', 14157, '', 1, 1, 1),
('0000075', '9780415526777', '2017-07-14', 'Sew Enterprises', 5834, '', 1, 1, 1),
('0000076', '9781848062344', '2017-07-14', 'Sew Enterprises', 5551, '', 1, 1, 1),
('0000077', '9780071546010', '2011-02-14', 'SERV Enterprises', 4550, '', 1, 1, 1),
('0000078', '9780415690911', '2017-07-14', 'Sew Enterprises', 7976, '', 1, 1, 1),
('0000079', '9780470114216', '2009-09-09', 'A-Z Direct Marketing Incorporated', 4392, '', 1, 1, 1),
('0000080', '9781119055570', '2017-07-14', 'Sew Enterprises', 8590, '', 1, 1, 1),
('0000081', '9780415684064', '2017-07-14', 'Sew Enterprises', 9709, '', 1, 1, 1),
('0000082', '9780071625012', '2012-05-14', 'Emerald Headway Distributors, Incorporated', 4130, '', 1, 1, 1),
('0000083', '1595540059', '2019-03-09', 'TUP Library', 0, '', 1, 1, 1),
('0000084', '9780073380193', '2017-07-14', 'Sew Enterprises', 27011, '', 1, 1, 1),
('0000085', '9780073380193', '2017-07-14', 'Sew Enterprises', 2450, '', 1, 1, 1),
('0000086', '9780615654386', '2017-07-14', 'Sew Enterprises', 2450, '', 1, 1, 1),
('0000087', '9781627051378', '2017-07-25', 'Sew Enterprises', 4525, '', 1, 1, 1),
('0000088', '0849307759', '2016-09-27', 'New Century Books and General Merchandise', 9350, '', 1, 1, 1),
('0000089', '9781420082111', '2017-07-14', 'Sew Enterprises', 12274, '', 1, 1, 1),
('0000090', '9781466584341', '2017-07-14', 'Sew Enterprises', 18236, '', 1, 1, 1),
('0000091', '0872632075', '2017-07-14', 'Sew Enterprises', 6016, '', 1, 1, 1),
('0000092', '0872632075', '2015-04-21', 'SERV Enterprises', 3120, '', 1, 1, 1),
('`000009', '9780831131340', '2017-07-14', 'Sew Enterprises', 6392, '', 1, 1, 1),
('0000093', '9781482222166', '2017-07-14', 'Sew Enterprises', 18643, '', 1, 1, 1),
('0000094', '9789814253338', '2017-07-14', 'Sew Enterprises', 9576, '', 1, 1, 1),
('0000095', '9789350141427', '2017-09-25', 'Sew Enterprises', 1750, '', 1, 1, 1),
('0000096', '0130431346', '2017-07-14', 'Sew Enterprises', 12275, '', 1, 1, 1),
('0000097', '9780078028229', '2017-07-14', 'Sew Enterprises', 19641, '', 1, 1, 1),
('0000098', '9782940411771', '2019-03-18', 'TUP Library', 0, '', 1, 1, 1),
('0000099', '9780080242125', '2016-09-27', 'New Century Books and General Merchandise', 1790, '', 1, 1, 1),
('0000100', '9781259060779', '2017-07-14', 'Sew Enterprises', 15934, '', 1, 1, 1),
('0000101', '9781305958531', '2017-07-14', 'Sew Enterprises', 16860, '', 1, 1, 1),
('0000102', '9780071763950', '2017-07-14', 'Sew Enterprises', 4906, '', 1, 1, 1),
('0000103', '9780849370274', '2017-07-14', 'Sew Enterprises', 17584, '', 1, 1, 1),
('0000104', '9781133628514', '2017-07-14', 'Sew Enterprises', 11669, '', 1, 1, 1),
('0000105', '8123905580', '2016-09-27', 'New Century Books and General Merchandise', 2990, '', 1, 1, 1),
('0000106', '9781292075983', '2017-07-14', 'Sew Enterprises', 4421, '', 1, 1, 1),
('0000107', '9781498781633', '2017-07-14', 'Sew Enterprises', 15105, '', 1, 1, 1),
('0000108', '9780826934307', '2017-07-14', 'Sew Enterprises', 23026, '', 1, 1, 1),
('0000109', '9781938549304', '2017-07-14', 'Sew Enterprises', 12044, '', 1, 1, 1),
('0000110', '9382226659', '2016-09-27', 'New Century Books and General Merchandise', 4990, '', 1, 1, 1),
('0000111', '9781133960508', '2017-09-27', 'New Century Books and General Merchandise', 6990, '', 1, 1, 1),
('0000112', '9781118859094', '2017-07-14', 'Sew Enterprises', 12069, '', 1, 1, 1),
('0000113', '0387231803', '2016-09-27', 'New Century Books and General Merchandise', 6790, '', 1, 1, 1),
('0000114', '9789832559431', '2017-07-14', 'Sew Enterprises', 14002, '', 1, 1, 1),
('0000115', '9780415714594', '2017-07-14', 'Sew Enterprises', 3560, '', 1, 1, 1),
('0000116', '9780470496619', '2017-07-14', 'Sew Enterprises', 15961, '', 1, 1, 1),
('0000117', '9781848212244', '2019-03-18', 'New Century Books and General Merchandise', 13650, '', 1, 1, 1),
('0000118', '9781111988609', '2017-07-14', 'Sew Enterprises', 16985, '', 1, 1, 1),
('0000119', '9780073398273', '2017-07-14', 'Sew Enterprises', 6245, '', 1, 1, 1),
('0000120', '9781482208795', '2017-07-14', 'Sew Enterprises', 14480, '', 1, 1, 1),
('0000121', '9781133605157', '2017-07-14', 'Sew Enterprises', 20752, '', 1, 1, 1),
('0000122', '978140175173', '2016-09-27', 'New Century Books and General Merchandise', 17640, '', 1, 1, 1),
('0000123', '9781133593607', '2017-07-14', 'Sew Enterprises', 18413, '', 1, 1, 1),
('0000124', '9780132859295', '2016-09-27', 'New Century Books and General Merchandise', 14990, '', 1, 1, 1),
('0000125', '9780415629126', '2017-07-14', 'Sew Enterprises', 10929, '', 1, 1, 1),
('0000126', '9780071432061', '2016-09-27', 'New Century Books and General Merchandise', 8590, '', 1, 1, 1),
('0000127', '9783895783227', '2017-07-14', 'Sew Enterprises', 8483, '', 1, 1, 1),
('0000128', '48540856R0028', '2017-07-14', 'Sew Enterprises', 2449, '', 1, 1, 1),
('0000129', '9781409464631', '2017-07-14', 'Sew Enterprises', 15354, '', 1, 1, 1),
('0000130', '9781860945151', '2017-07-14', 'Sew Enterprises', 7982, '', 1, 1, 1),
('0000131', '9781848062733', '2017-07-14', 'Sew Enterprises', 6014, '', 1, 1, 1),
('0000132', '9781610915656', '2017-07-14', 'Sew Enterprises', 4703, '', 1, 1, 1),
('0000133', '9781466575042', '2017-07-14', 'Sew Enterprises', 7901, '', 1, 1, 1),
('0000134', '9780071801379', '2017-07-14', 'Sew Enterprises', 9209, '', 1, 1, 1),
('0000135', '9780415509862', '2017-07-14', 'Sew Enterprises', 17067, '', 1, 1, 1),
('0000136', '9782940496068', '2017-07-14', 'Sew Enterprises', 8709, '', 1, 1, 1),
('0000137', '9781118090718', '2017-07-14', 'Sew Enterprises', 5173, '', 1, 1, 1),
('0000138', '9780470402573', '2013-01-18', 'Emerald Headway Distributors Incorporated', 3950, '', 1, 1, 1),
('0000139', '9783433031193', '2017-09-25', 'Sew Enterprises', 2900, '', 1, 1, 1),
('0000140', '9780132540742', '2017-07-14', 'Sew Enterprises', 10836, '', 1, 1, 1),
('0000141', '9780128014776', '2017-07-14', 'Sew Enterprises', 9457, '', 1, 1, 1),
('0000142', '9781259251139', '2017-07-14', 'Sew Enterprises', 8436, '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookstatus`
--

CREATE TABLE `bookstatus` (
  `BookStatusId` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Dumping data for table `booksubject`
--

INSERT INTO `booksubject` (`ISBN`, `SubjectId`) VALUES
('0684152967', 19),
('1305263642', 32),
('9780415661775', 33),
('1591581141', 31),
('9782888931638', 29),
('9781454703297', 26),
('9781454703297', 25),
('9781454703297', 24),
('9782888931638', 28),
('9782888931638', 27),
('1591581141', 30),
('9780415661775', 32),
('9782940496532', 27),
('9788183569248', 34),
('1418049652', 35),
('9780123820860', 36),
('9781441914774', 37),
('97811842973', 38),
('9789351118442', 39),
('978159474617', 39),
('9781466561557', 40),
('9781498732895', 41),
('9781466257993', 42),
('9780470444047', 43),
('0849327229', 44),
('9781439808320', 45),
('9781848212121', 46),
('9781472533890', 47),
('9780831134921', 48),
('9780750645676', 49),
('9780831110217', 50),
('9780968686027', 51),
('9781118134153', 52),
('0831130504', 53),
('9781609012403', 54),
('9781609019259', 55),
('9780857857675', 56),
('2940361207', 57),
('1111569010', 58),
('9781466566491', 59),
('9780857851789', 60),
('9781408171790', 61),
('9782940496112', 62),
('9781563678592', 63),
('9781472521903', 64),
('9780240525914', 65),
('9781408173794', 66),
('9781589236080', 67),
('9781845205928', 68),
('9781845204396', 69),
('9780071770187', 70),
('9781439834534', 71),
('0782129587', 72),
('9780124076822', 73),
('9780857094254', 74),
('9781466596771', 75),
('9780071827782', 76),
('9781259215986', 22),
('9780123850157', 77),
('9780071831314', 78),
('9781862392915', 79),
('9788189922658', 80),
('9878143989425', 81),
('9780081000366', 82),
('9781608456376', 83),
('9781118659182', 84),
('9780071289306', 85),
('1446302637', 86),
('9782940373857', 87),
('9782940411665', 88),
('1133597106', 89),
('9781619601994', 90),
('9780124114791', 91),
('9782940411054', 92),
('9782940411955', 92),
('9782940411955', 93),
('0789723182', 89),
('0789723182', 94),
('9781133693253', 95),
('9782940411894', 96),
('9782940411405', 92),
('9782940411405', 97),
('9780415615280', 98),
('9780415526777', 98),
('9781848062344', 99),
('9780071546010', 100),
('9780415690911', 101),
('9780470114216', 102),
('9781119055570', 103),
('9780415684064', 101),
('9780415684064', 104),
('9780071625012', 101),
('1595540059', 61),
('9780073380193', 106),
('9780615654386', 105),
('9781627051378', 107),
('9781627051378', 108),
('0849307759', 58),
('9781420082111', 58),
('9781466584341', 109),
('0872632075', 111),
('0872632075', 110),
('9780831131340', 112),
('9781482222166', 113),
('9781482222166', 114),
('9789814253338', 115),
('9789350141427', 116),
('0130431346', 116),
('9780078028229', 116),
('9782940411771', 86),
('9780080242125', 117),
('9781259060779', 117),
('9781305958531', 118),
('9780071763950', 119),
('9780849370274', 120),
('9781133628514', 120),
('8123905580', 121),
('9781292075983', 122),
('9781498781633', 123),
('9780826934307', 124),
('9781938549304', 125),
('9382226659', 126),
('9781133960508', 127),
('9781118859094', 128),
('0387231803', 129),
('9789832559431', 130),
('9780415714594', 131),
('9780470496619', 132),
('9781848212244', 133),
('9781111988609', 134),
('9780073398273', 135),
('9781482208795', 136),
('9781133605157', 137),
('978140175173', 138),
('9781133593607', 139),
('9780132859295', 140),
('9780415629126', 141),
('9780071432061', 142),
('9783895783227', 143),
('48540856R0028', 144),
('9781409464631', 145),
('9781860945151', 145),
('9781848062733', 146),
('9781610915656', 147),
('9781466575042', 148),
('9780071801379', 149),
('9780415509862', 150),
('9782940496068', 92),
('9781118090718', 151),
('9780470402573', 152),
('9783433031193', 153),
('9780132540742', 154),
('9780128014776', 155),
('9781259251139', 156);

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
-- Dumping data for table `college`
--

INSERT INTO `college` (`CollegeId`, `Name`, `IsActive`) VALUES
(1, 'COS', 1),
(2, 'CIT', 1),
(3, 'CAFA', 1),
(4, 'CLA', 1),
(5, 'CIE', 1),
(6, 'COE', 1);

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
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CollegeId`, `Name`, `IsActive`) VALUES
(1, 1, 'BS-IT', 1),
(2, 1, 'BS-CS', 1),
(5, 3, 'BT-IT', 1),
(6, 4, 'BS-IE', 1),
(7, 4, 'BS-ABM', 1),
(8, 3, 'BT-GAPT', 1),
(9, 2, 'BT-NFT', 1),
(10, 2, 'BS-HRM', 1),
(11, 2, 'BS-FT', 1),
(12, 2, 'BT-Mechatronics', 1),
(13, 2, 'BT-AFT', 1),
(14, 2, 'BT-AET', 1),
(15, 2, 'BT-CET', 1),
(16, 2, 'BT- CoET', 1),
(17, 2, 'BT- EET', 1),
(18, 2, 'BT-ECET', 1),
(19, 2, 'BT-EsET', 1),
(20, 2, 'BT-FET', 1),
(21, 2, 'BT-ICET', 1),
(22, 2, 'BT-MET', 1),
(23, 2, 'BT-PPET', 1),
(24, 2, 'BT-RACET', 1),
(25, 2, 'BT-TDET', 1),
(26, 2, 'BT-WET', 1),
(27, 2, 'BT-RET', 1),
(28, 6, 'BS-CE', 1),
(29, 6, 'BS-ECE', 1),
(30, 6, 'BS-EE', 1),
(31, 6, 'BS-ME', 1),
(32, 1, 'BS-IS', 1),
(33, 1, 'BAS-LT', 1),
(34, 1, 'BS-ES', 1),
(35, 3, 'GT/MT/MDT', 1),
(36, 3, 'PDDT', 1),
(37, 3, 'BFA', 1),
(38, 3, 'BSA', 1),
(39, 5, 'BSIE', 1);

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
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`LibrarianId`, `FirstName`, `LastName`, `Username`, `Password`) VALUES
(1, 'Johnrey', 'Bacal', 'admin', 'admin'),
(2, 'John Mark', 'Sena', 'sena', 'sena'),
(3, 'Nathaniel', 'Piquero', 'nath', 'nath'),
(4, 'Circu', 'Lation', 'circu', 'circulation'),
(5, 'Tao', 'Manager', 'hr', 'hrhrhrhr');

-- --------------------------------------------------------

--
-- Table structure for table `librarianaccess`
--

CREATE TABLE `librarianaccess` (
  `LibrarianId` int(11) NOT NULL,
  `LibrarianRoleId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(4, 2),
(4, 1),
(4, 5),
(5, 6),
(5, 4),
(5, 3);

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

-- --------------------------------------------------------

--
-- Table structure for table `marcimport`
--

CREATE TABLE `marcimport` (
  `MarcImportId` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `CallNumber` varchar(50) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Series` varchar(100) NOT NULL,
  `Publisher` varchar(100) NOT NULL,
  `YearPublished` varchar(10) NOT NULL,
  `PlaceOfPublication` varchar(100) NOT NULL,
  `Extent` varchar(100) NOT NULL,
  `Other` varchar(100) NOT NULL,
  `Size` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marcimport`
--

INSERT INTO `marcimport` (`MarcImportId`, `ISBN`, `Title`, `CallNumber`, `Author`, `Series`, `Publisher`, `YearPublished`, `PlaceOfPublication`, `Extent`, `Other`, `Size`) VALUES
(157, '0439139597', 'Harry Potter and the goblet of fire /', 'PZ7.R79835', 'Rowling, J. K.', '', 'Arthur A. Levine Books,', 'c2000.', 'New York :', 'xi, 734 p. :', 'ill. ;', '24 cm.');

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

-- --------------------------------------------------------

--
-- Table structure for table `outsideresearchersubject`
--

CREATE TABLE `outsideresearchersubject` (
  `OutsideResearcherId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Dumping data for table `patron`
--

INSERT INTO `patron` (`PatronId`, `PatronTypeId`, `FirstName`, `MiddleName`, `LastName`, `ExtensionName`, `IdNumber`, `RFIDNo`, `Password`, `ContactNumber`, `Email`, `DateCreated`) VALUES
(1, 1, 'Johnrey', 'Cumayas', 'Bacal', 'PhD', '15-037-017', 1, '12345678', '+639977011062', 'johnrey.bacal@yahoo.com', '2018-11-08'),
(2, 1, 'John Mark', 'Lumbria', 'Sena', '', '15-037-027', 12123123, '12345678', '+639966367165', 'johnmarksena@gmail.com', '2018-11-09'),
(3, 1, 'Nathaniel Cornelius', 'Alano', 'Piquero', '', '15-037-032', 15037032, '12345678', '+639925847682', 'ncpiquero@gmail.com', '2018-11-09'),
(4, 1, 'Erica Charlene', 'Requina', 'Laconico', '', '16-211-067', 16211067, '12345678', '+639277706965', 'kirikaaragaki92@gmail.com', '2019-03-05'),
(5, 1, 'Leiko Angelli', 'Lainez', 'Danganan', '', '16-211-149', 16211149, '12345678', '+639667128527', 'danganan0430@gmail.com', '2019-03-05');

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
-- Dumping data for table `patrontype`
--

INSERT INTO `patrontype` (`PatronTypeId`, `Name`, `NumberOfBooks`, `NumberOfDays`, `IsActive`) VALUES
(1, 'Student', 1, 1, 1),
(2, 'Faculty Employee', 10, 7, 1),
(3, 'Admin', 20, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `PenaltyId` int(11) NOT NULL,
  `PatronId` int(11) NOT NULL,
  `LoanId` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PublisherId`, `Name`, `IsActive`) VALUES
(1, 'Charles Scribners Sons', 1),
(2, 'Cengage Learning', 1),
(3, 'Focal Press', 1),
(4, 'Libraries Unlimited', 1),
(5, 'Rotovision', 1),
(6, 'Lark', 1),
(7, 'Lark Crafts', 1),
(8, 'Roto Vision', 1),
(9, 'Bloomsbury', 1),
(10, 'Discovery Publication House', 1),
(11, 'Delmar, Cengage Learning', 1),
(12, 'Academic Press', 1),
(13, 'Springer', 1),
(14, 'Wiley', 1),
(15, 'Random Publications', 1),
(16, 'Quirck Books', 1),
(17, 'CRC Press', 1),
(18, 'Charlestone', 1),
(19, 'CreateSpace Independent Publishing Platform', 1),
(20, 'John Wiley&Sons Inc.', 1),
(21, 'Industrial Press', 1),
(22, 'Butterworth Heinemann', 1),
(23, 'London Logic Design Publishing', 1),
(24, 'Logic Design Publishing', 1),
(25, 'Fairchild Books', 1),
(26, 'Creative Publishing International', 1),
(27, 'Berg Publishers', 1),
(28, 'Berg', 1),
(29, 'The McGraw-Hill Companies', 1),
(30, 'SYBEX', 1),
(31, 'Elsivier', 0),
(32, 'Woodhead Publishing Limited', 1),
(33, 'The Geological Society', 1),
(34, 'Venus Books', 1),
(35, 'Elsevier', 1),
(36, 'Morgan & Claypool Publishers ', 1),
(37, 'David & Charles', 1),
(38, 'ABA Publication', 1),
(39, 'The Goodheart-Wilcox Company Inc.', 1),
(40, 'AVA Publishing', 1),
(41, 'Que Publishing', 1),
(42, 'Routledge', 1),
(43, 'IHS BRE Publications', 1),
(44, 'Elvin Perez Adrover', 1),
(45, 'WestBow Press,', 1),
(46, 'WestBow Press,', 1),
(47, 'WestBow Press,', 1),
(48, 'Arthur A. Levine Books,', 1),
(49, 'Morgan & Claypool', 1),
(50, 'Taylor&Francis Group', 1),
(51, 'Society of Manufacturing Engineers', 1),
(52, 'S. K. Kataria and Sons', 1),
(53, 'Prentice Hall', 1),
(54, 'Pergamon Press', 1),
(55, 'CBS Publishers ', 1),
(56, 'Pearson', 1),
(57, 'American Technical Publishers', 1),
(58, 'Mercury Learning and Information', 1),
(59, 'Random Exports ', 1),
(60, 'Thompson Learning', 1),
(61, 'Publicis Publishing', 1),
(62, 'Imperial College Press', 1),
(63, 'Island Press', 1),
(64, 'Ernst & Sohn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ReservationId` int(11) NOT NULL,
  `PatronId` int(11) NOT NULL,
  `AccessionNumber` int(11) NOT NULL,
  `DateReserved` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Expiration` varchar(30) NOT NULL,
  `IsDiscarded` tinyint(1) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationId`, `PatronId`, `AccessionNumber`, `DateReserved`, `Expiration`, `IsDiscarded`, `IsActive`) VALUES
(1, 1, 1, '2019-03-06 00:34:42', '2019-03-05 05:34:42pm', 1, 0),
(2, 1, 2, '2019-03-06 00:40:11', '2019-03-05 17:40:11', 1, 0),
(3, 1, 3, '2019-03-06 00:56:53', '2019-03-06 00:56:53', 1, 0),
(4, 1, 4, '2019-03-06 01:03:40', '2019-03-07 01:03:40', 0, 0),
(5, 1, 5, '2019-03-06 01:25:20', '2019-03-07 01:25:20', 1, 0),
(6, 1, 6, '2019-03-06 01:39:40', '2019-03-07 01:39:40', 0, 0),
(7, 1, 7, '2019-03-06 02:18:48', '2019-03-07 02:18:48', 0, 0),
(8, 1, 8, '2019-03-06 03:41:18', '2019-03-07 03:41:18', 0, 0),
(9, 1, 9, '2019-03-06 04:22:28', '2019-03-06 05:49:11', 1, 0),
(10, 3, 10, '2019-03-06 05:13:03', '2019-03-07 05:13:03', 1, 0);

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
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionId`, `Name`, `IsActive`) VALUES
(1, 'Filipinana', 1),
(2, 'Thesis', 1),
(3, 'Fiction', 1),
(10, 'Section', 0),
(11, 'Handcrafts', 1),
(12, 'Multimedia', 1),
(13, 'Electronics', 1),
(14, 'New Arrival', 1);

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
-- Dumping data for table `series`
--

INSERT INTO `series` (`SeriesId`, `Name`, `IsActive`) VALUES
(1, 'Typography', 1),
(2, 'Basics design', 1),
(3, 'Food Science and Technology, International Series', 1),
(4, 'Food Science Text Series', 1),
(5, 'Engineering and Management Innovation', 1),
(6, 'Control Systems, Roboptics and Manufacturing Series', 1),
(7, 'Control Systems, Robotics and Manufacturing Series', 1),
(8, 'Woodhead Publishing Series in Electronic and Optical Materials: No.36', 1),
(9, 'Geological Society Special Publication: No.333', 1),
(10, 'Synthesis Lectures in Computer Architecture: #22', 1),
(11, 'Basics Photography: 06', 1),
(12, 'Basics Creative Photography: 03', 1),
(13, 'Food Science and Technology International Series', 1),
(14, 'Basics Photography: 02', 1),
(15, 'basics Photography: 07', 1),
(16, 'Basics Creative Photography', 1),
(17, 'Basics Creative Photography: 02', 1),
(18, 'McGraw Hills GreenSource Series', 1),
(19, 'Wiley Book of Sustainable Design', 1),
(20, 'Innovation in the Built Environment', 1),
(21, 'Synthesis Lectures on Digital Circuits and Systems', 1),
(22, 'Mechanical Engineering Series', 1),
(23, 'Manufacturing Design and Technology', 1),
(24, 'Basics Photography 01', 1),
(25, 'Applied Electricity and Electronics', 1),
(26, 'Best Practices and Advances in Program Management Series ', 1),
(27, 'Fundamentals of Educational Planning', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--

CREATE TABLE `studentcourse` (
  `PatronId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentcourse`
--

INSERT INTO `studentcourse` (`PatronId`, `CourseId`) VALUES
(1, 1),
(2, 1),
(3, 36),
(4, 1),
(5, 1);

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
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectId`, `Name`, `IsActive`) VALUES
(1, 'Web Development', 1),
(11, 'Mathematics', 1),
(14, 'Economics: Land Reform', 1),
(15, 'Retorika', 1),
(16, 'C++', 1),
(17, 'C#', 1),
(18, 'Anime', 1),
(19, 'Economics', 1),
(20, 'Multimedia', 1),
(21, 'Web Design', 1),
(22, 'Electronics', 1),
(23, 'Printing', 1),
(24, 'Printmaking', 1),
(25, 'CRAFTS & HOBBIES', 1),
(26, 'Letterpress printing', 1),
(27, 'Graphic Design-Typography', 1),
(28, 'Letterpress Printing-Specimens', 1),
(29, 'Printing-Style Manual', 1),
(30, 'Electronic Information resources-management', 1),
(31, 'Libraries-Special collections-Electronic information resources', 1),
(32, 'Adobe inDesign (Electronic resource)', 1),
(33, 'Desktop Publishing', 1),
(34, 'Hotels-Planning', 1),
(35, 'International Cooking', 1),
(36, 'Food-Sensory Evaluation', 1),
(37, 'Food Analysis', 1),
(38, 'Food Service', 1),
(39, 'Home Economics', 1),
(40, 'Manufacturing Processes-Mathematical Models', 1),
(41, 'Plant Layout', 1),
(42, 'Floor Plan', 1),
(43, 'Factories-Design and Construction', 1),
(44, 'Environmental Engineering', 1),
(45, 'Business and Economics', 1),
(46, 'Production Management-Environmental Aspects', 1),
(47, 'Landscape Photography', 1),
(48, 'Sheet-Metal Work', 1),
(49, 'Founding', 1),
(50, 'Welding', 1),
(51, 'Robotics', 1),
(52, 'Packaging Design', 1),
(53, 'Manufacturing Processes', 1),
(54, 'Dressmaking-Pattern Design', 1),
(55, 'Dressmaking', 1),
(56, 'Typography', 1),
(57, 'Letterpress-Printing', 1),
(58, 'Mechatronics', 1),
(59, 'Industrial Fabrics', 1),
(60, 'Video Art-History', 1),
(61, 'Graphic Arts', 1),
(62, 'Commercial Art-Data Processing', 1),
(63, 'Color in Design', 1),
(64, 'Stop-motion Animation Films', 1),
(65, 'Adobe Flash CC', 1),
(66, 'Three-dimensional printing', 1),
(67, 'Dressmaking-Pattern Design-Pictorial Works', 1),
(68, 'Knitting', 1),
(69, 'Felt Work', 1),
(70, 'Troubleshooting and Repairs', 1),
(71, 'Web Services', 1),
(72, 'Networking-Cabling', 1),
(73, 'Digital Communications', 1),
(74, 'Operational Amplifiers', 1),
(75, 'Electronic Measurements', 1),
(76, 'Electronics-Charts Diagrams etc.', 1),
(77, 'Biotechnology', 1),
(78, 'Chemical Engineering', 1),
(79, 'Historical Monuments', 1),
(80, 'Petroleum Engineering', 1),
(81, 'Automobiles-Design and Construction', 1),
(82, 'Automobile-Dynamics', 1),
(83, 'Electric Power System Stability', 1),
(84, 'Verilog (Computer Hardware Description Language)', 1),
(85, 'Power Electronics', 1),
(86, 'Composition (Photography)', 1),
(87, 'Black and White Photography', 1),
(88, 'Photography Digital Techniques', 1),
(89, 'Adobe Photoshop', 1),
(90, 'Refrigeration and Airconditioning', 1),
(91, 'Food Industry and Trade-Technological innovations', 1),
(92, 'Photography', 1),
(93, 'Photography-Lighting', 1),
(94, 'Photography-Retouching', 1),
(95, 'Adobe Illustrator', 1),
(96, 'Photographic Criticism', 1),
(97, 'Photography-Philosophy', 1),
(98, 'Ecological Houses-Design and Construction', 1),
(99, 'Exterior Insulation and Finish System, Fire Prevention', 1),
(100, 'Sustainable Buildings-Design and Constuction', 1),
(101, 'Sustainable Construction ', 1),
(102, 'Sustainable Buildings-Design and Construction', 1),
(103, 'Roofs, Sustainable Construction', 1),
(104, 'Sustainable Buildings', 1),
(105, 'Programmable Controllers', 1),
(106, 'Combustion Engineering', 1),
(107, 'BeagleBone (Computer)', 1),
(108, 'Microcontroller', 1),
(109, 'Drilling and Boring Machinery', 1),
(110, 'Jigs and Fixtures', 1),
(111, 'Gages', 1),
(112, 'Machine Tools', 1),
(113, 'Factories Heating and Ventilation', 1),
(114, 'Dust Control', 1),
(115, 'Electric Network', 1),
(116, 'Electric Circuit Analysis', 1),
(117, 'Electrical Engineering', 1),
(118, 'wireless communication systems', 1),
(119, 'Electric motors-Maintenance and Repair', 1),
(120, 'Electric Machinery-Reliability', 1),
(121, 'Electric power-plants-Design and Constructuion', 1),
(122, 'Digital Electronics', 1),
(123, 'Engineering Systems', 1),
(124, 'Engineering Instruments', 1),
(125, 'Robotics, Industrial', 1),
(126, 'Irrigation-Management', 1),
(127, 'Diet Therapy', 1),
(128, 'Psychology', 1),
(129, 'Food Microbiology', 1),
(130, 'optics ', 1),
(131, 'Tall Buildings Aerodynamics', 1),
(132, 'Surveying', 1),
(133, 'Building Materials', 1),
(134, 'Materials Science-Textbooks', 1),
(135, 'Fluid Mechanics', 1),
(136, 'Computer Aided Design', 1),
(137, 'Highway Engineering', 1),
(138, 'Refuse and Refuse Disposal', 1),
(139, 'Image Processing', 1),
(140, 'Reinforced Concrete', 1),
(141, 'Construction Industry Costs', 1),
(142, 'Architectural Design-Handbooks', 1),
(143, 'Electric Railroads-Design and Construction', 1),
(144, 'Railroads-Design and Construction', 1),
(145, 'Railroad Engineering', 1),
(146, 'Demolition Wastes', 1),
(147, 'Traffic Engineering - United States', 1),
(148, 'Construction Industry Management', 1),
(149, 'Construction Projects-Management', 1),
(150, 'Building Estimates', 1),
(151, 'Interior Architecture', 1),
(152, 'Architecture-History', 1),
(153, 'Art-Philosophy', 1),
(154, 'Education-Philosophy-History', 1),
(155, 'Disaster Relief-International Cooperation', 1),
(156, 'Social Psychology', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjectcourse`
--

CREATE TABLE `subjectcourse` (
  `SubjectId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(18, 1),
(19, 6),
(20, 1),
(21, 1),
(22, 5),
(23, 8),
(24, 8),
(25, 8),
(26, 8),
(27, 8),
(28, 8),
(29, 8),
(30, 5),
(31, 5),
(32, 1),
(33, 1),
(34, 10),
(35, 9),
(35, 10),
(35, 11),
(36, 9),
(36, 10),
(36, 11),
(37, 9),
(37, 10),
(37, 11),
(38, 9),
(38, 10),
(38, 11),
(39, 9),
(39, 10),
(39, 11),
(40, 20),
(40, 21),
(41, 38),
(42, 38),
(43, 15),
(44, 34),
(45, 14),
(45, 22),
(46, 34),
(47, 35),
(47, 36),
(47, 37),
(48, 12),
(48, 22),
(48, 26),
(48, 31),
(49, 12),
(49, 22),
(49, 26),
(50, 26),
(51, 1),
(51, 2),
(51, 5),
(51, 12),
(52, 38),
(53, 22),
(53, 31),
(54, 13),
(55, 13),
(56, 8),
(57, 8),
(57, 37),
(58, 12),
(58, 22),
(58, 31),
(59, 13),
(60, 8),
(60, 37),
(61, 8),
(61, 37),
(62, 8),
(62, 37),
(63, 8),
(63, 37),
(64, 8),
(64, 37),
(65, 8),
(65, 35),
(65, 37),
(66, 5),
(66, 8),
(67, 13),
(68, 13),
(69, 13),
(70, 5),
(70, 17),
(70, 18),
(70, 19),
(71, 1),
(71, 2),
(71, 5),
(71, 29),
(72, 1),
(72, 2),
(72, 5),
(72, 18),
(72, 19),
(73, 1),
(73, 2),
(73, 5),
(73, 16),
(73, 18),
(73, 19),
(74, 1),
(74, 2),
(74, 5),
(74, 16),
(74, 18),
(74, 19),
(75, 1),
(75, 2),
(75, 5),
(75, 12),
(75, 16),
(75, 17),
(75, 18),
(75, 19),
(75, 21),
(76, 1),
(76, 2),
(76, 5),
(76, 12),
(76, 16),
(76, 18),
(76, 19),
(77, 34),
(78, 33),
(78, 34),
(79, 33),
(79, 34),
(80, 33),
(80, 34),
(81, 14),
(82, 14),
(83, 1),
(83, 5),
(83, 16),
(83, 18),
(83, 19),
(83, 21),
(83, 29),
(84, 1),
(84, 5),
(84, 16),
(84, 17),
(84, 18),
(84, 19),
(85, 1),
(85, 2),
(85, 5),
(85, 16),
(85, 18),
(85, 19),
(86, 8),
(86, 35),
(86, 37),
(87, 8),
(87, 35),
(87, 37),
(88, 8),
(88, 35),
(88, 37),
(89, 1),
(89, 2),
(89, 8),
(89, 35),
(89, 37),
(90, 24),
(91, 9),
(91, 11),
(91, 13),
(92, 8),
(92, 35),
(92, 37),
(93, 8),
(93, 35),
(93, 37),
(94, 8),
(94, 35),
(94, 37),
(95, 8),
(95, 35),
(95, 37),
(96, 8),
(96, 35),
(96, 37),
(97, 8),
(97, 35),
(97, 37),
(98, 38),
(99, 34),
(99, 38),
(100, 15),
(100, 28),
(100, 34),
(101, 15),
(101, 28),
(101, 38),
(102, 15),
(102, 16),
(102, 28),
(102, 38),
(103, 15),
(103, 28),
(103, 38),
(104, 15),
(104, 28),
(104, 34),
(104, 38),
(105, 1),
(105, 2),
(105, 5),
(105, 12),
(105, 16),
(105, 18),
(105, 19),
(105, 29),
(106, 34),
(107, 1),
(107, 2),
(107, 5),
(107, 16),
(107, 17),
(107, 18),
(107, 19),
(108, 1),
(108, 2),
(108, 5),
(108, 12),
(108, 16),
(108, 28),
(108, 29),
(108, 30),
(109, 22),
(109, 26),
(110, 22),
(111, 22),
(111, 31),
(112, 22),
(112, 31),
(113, 15),
(113, 34),
(114, 15),
(114, 21),
(114, 33),
(114, 34),
(115, 5),
(115, 15),
(115, 16),
(115, 17),
(115, 18),
(115, 19),
(115, 29),
(116, 5),
(116, 16),
(116, 17),
(116, 18),
(116, 19),
(116, 29),
(116, 30),
(117, 5),
(117, 16),
(117, 17),
(117, 18),
(117, 19),
(117, 29),
(117, 30),
(118, 1),
(118, 2),
(118, 5),
(118, 16),
(118, 17),
(118, 18),
(118, 19),
(118, 29),
(118, 30),
(119, 17),
(119, 30),
(120, 12),
(120, 14),
(120, 22),
(120, 23),
(121, 23),
(122, 1),
(122, 2),
(122, 5),
(122, 16),
(122, 17),
(122, 18),
(122, 19),
(122, 29),
(122, 30),
(123, 28),
(123, 29),
(123, 30),
(123, 31),
(124, 28),
(124, 29),
(124, 30),
(124, 31),
(125, 5),
(125, 12),
(125, 16),
(125, 18),
(125, 19),
(126, 33),
(126, 34),
(127, 9),
(127, 10),
(128, 6),
(128, 39),
(129, 9),
(129, 10),
(130, 14),
(130, 15),
(130, 16),
(130, 17),
(130, 18),
(130, 19),
(130, 20),
(130, 21),
(130, 22),
(130, 23),
(130, 24),
(130, 25),
(130, 26),
(130, 27),
(130, 28),
(130, 29),
(130, 30),
(130, 31),
(131, 15),
(131, 28),
(131, 38),
(132, 15),
(132, 28),
(133, 15),
(133, 28),
(134, 15),
(134, 28),
(135, 22),
(135, 31),
(136, 1),
(136, 2),
(136, 5),
(136, 16),
(136, 19),
(136, 32),
(137, 27),
(138, 33),
(138, 34),
(139, 8),
(139, 35),
(139, 37),
(140, 15),
(140, 28),
(141, 15),
(141, 28),
(142, 38),
(143, 27),
(144, 27),
(145, 27),
(146, 15),
(146, 28),
(147, 27),
(148, 15),
(148, 28),
(149, 15),
(149, 28),
(150, 15),
(150, 28),
(151, 38),
(152, 38),
(153, 8),
(153, 35),
(153, 37),
(153, 38),
(154, 6),
(154, 39),
(155, 34),
(156, 6),
(156, 39);

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
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`PenaltyId`);

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
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `AdmissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `AuthorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `bookstatus`
--
ALTER TABLE `bookstatus`
  MODIFY `BookStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `CollegeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `LibrarianId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `librarianrole`
--
ALTER TABLE `librarianrole`
  MODIFY `LibrarianRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `marcimport`
--
ALTER TABLE `marcimport`
  MODIFY `MarcImportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `outsideresearcher`
--
ALTER TABLE `outsideresearcher`
  MODIFY `OutsideResearcherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patron`
--
ALTER TABLE `patron`
  MODIFY `PatronId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patrontype`
--
ALTER TABLE `patrontype`
  MODIFY `PatronTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `PenaltyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `PublisherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `SeriesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
