-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 03:49 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fix_my_area`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminname` text NOT NULL,
  `adminpass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminname`, `adminpass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(100) NOT NULL,
  `title` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `image_1` text NOT NULL,
  `image_2` text NOT NULL,
  `image_3` text NOT NULL,
  `video` text NOT NULL,
  `area` varchar(50) NOT NULL,
  `ward_no` int(20) NOT NULL,
  `description` text NOT NULL,
  `admin_feedback` text NOT NULL,
  `is_fixed` int(11) NOT NULL DEFAULT '0',
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `title`, `date`, `author`, `category`, `image_1`, `image_2`, `image_3`, `video`, `area`, `ward_no`, `description`, `admin_feedback`, `is_fixed`, `latitude`, `longitude`) VALUES
(56, 'Open manhole', '0000-00-00 00:00:00', 'juwel', '', 'bike1.png', 'images (1).jpg', 'JDM070803bike2.jpg', 'Open manhole Cover Damages Car.mp4', 'My area', 14, '#Adress: Vegetable market,New Monsurabad,Chittagong.\r\nThere is an open manhole infront of the vegetable market that open produces accident.\r\nSo we feel the necessity to take step by the city corporation to close the manhole and save us from occuring any future accident.\r\n', 'feedback test', 1, 0, 0),
(57, 'Garbage on the road', '2016-12-01 07:01:16', 'Fahim', '', 'Garbage.jpg', '2005030915090301.jpg', 'Garbage--A-Palestinian-wo-012.jpg', '', 'My area', 42, '#Adress: Pathantuly,road no:02,Chittagong\r\nThe garbage on the road not only pollutes the air they also creats traffic jam as they take a lot of space from the road.\r\nWe feel the necessity of a dustbin where the citizen of the word can throw their waste into a proper area.', '', 0, 22.3503, 91.8117),
(58, 'Real', '0000-00-00 00:00:00', 'fahim', '', '31834507-Asphalt-broken-road-Stock-Photo.jpg', '15MN-ROAD_NEAR_BEND_658404f.jpg', 'images.jpg', 'Open manhole Cover Damages Car.mp4', 'My area', 44, 'About config.About config.About config.About config.About config.About config.About config.', '', 1, 0, 0),
(59, 'Aaa', '2016-12-01 07:03:02', 'Fahim', '', 'FB_IMG_1475546872333.jpg', 'FB_IMG_1475521835736.jpg', 'FB_IMG_1475585561225.jpg', '', '', 12, 'Css try', 'Hello MOrgan Freeman!', 0, 22.3778, 91.7809),
(61, 'wed', '0000-00-00 00:00:00', 'juwel', '', 'shutterstock-184547213-Converted-1400x600.png', 'Services-Page-Web-Design-Development.jpg', 'forex-web-website-design.jpg', '', '', 1, 'anything.............', '', 0, 0, 0),
(63, 'Aaa', '0000-00-00 00:00:00', 'juwel', '', 'shutterstock-184547213-Converted-1400x600.png', 'Services-Page-Web-Design-Development.jpg', 'shutterstock-184547213-Converted-1400x600.png', '', '', 1, 'anything.............', 'feed', 0, 0, 0),
(64, 'oop', '0000-00-00 00:00:00', 'juwel', '', 'shutterstock-184547213-Converted-1400x600.png', 'php training.png', 'forex-web-website-design.jpg', '', '', 1, 'anything.............', 'feed', 0, 0, 0),
(75, 'qqq', '0000-00-00 00:00:00', 'juwel', '', 'shutterstock-184547213-Converted-1400x600.png', 'Services-Page-Web-Design-Development.jpg', 'php training.png', '', '', 1, 'asd', '', 0, 0, 0),
(85, 'Manhole problem', '0000-00-00 00:00:00', 'juwel', '', 'bike1.png', '', '', '', 'GEC', 2, 'Problem Problem Problem Problem Problem Problem Problem Problem', '', 0, 0, 0),
(86, 'Road Side', '0000-00-00 00:00:00', 'juwel', '', '15MN-ROAD_NEAR_BEND_658404f.jpg', 'broken-road.jpg', '', '', 'Agrabad', 3, 'Problem Problem Problem Problem Problem Problem Problem Problem', '', 0, 0, 0),
(87, 'Water', '0000-00-00 00:00:00', 'juwel', '', 'Capture3.JPG', 'Capture2.JPG', '', '', '2 no gate', 1, 'Problem Problem Problem Problem Problem Problem Problem Problem', '', 0, 0, 0),
(88, 'Garbage', '0000-00-00 00:00:00', 'juwel', '', 'M_Id_78727_Road_Digging.jpg', 'dGarbage.jpg', '', '', 'Chawkbazar', 2, 'Problem Problem Problem Problem Problem Problem Problem Problem', '', 0, 0, 0),
(89, 'Dangerous Wire', '0000-00-00 00:00:00', 'juwel', '', '26_cable_Banabi_310116_003.jpg', 'VBK-COIMB_34507f.jpg', '', '', 'Bahaddarhat', 10, 'Problem Problem Problem Problem Problem Problem Problem Problem', '', 0, 0, 0),
(90, 'Water in the road', '0000-00-00 00:00:00', 'juwel', '', 'Capture2.JPG', 'Capture.JPG', '', '', 'Muradpur', 10, 'new problem new problem new problem new problem new problem new problem new problem ', '', 0, 0, 0),
(91, 'Wire ', '0000-00-00 00:00:00', 'juwel', '', 'VBK-COIMB_34507f.jpg', '26_cable_Banabi_310116_001.jpg', '', '', 'GEC', 12, 'new problem new problem new problem new problem new problem new problem new problem ', '', 0, 0, 0),
(92, 'Broken Road ', '0000-00-00 00:00:00', 'juwel', '', 'roadfail.jpg', '', '', '', '2 no gate', 12, 'Problem Problem Problem Problem Problem Problem Problem Problem', '', 0, 0, 0),
(93, 'Road problem', '0000-00-00 00:00:00', 'fahim', '', 'DAYTIME_STROOP_ROAD_web.JPG', '31834507-Asphalt-broken-road-Stock-Photo.jpg', '15MN-ROAD_NEAR_BEND_658404f.jpg', '', 'Cornelhat', 42, 'Problem in road. Problem in road. Problem in road. Problem in road. Problem in road. ', '', 0, 0, 0),
(94, 'Garbage ', '0000-00-00 00:00:00', 'fahim', '', 'Garbage--A-Palestinian-wo-012.jpg', '2005030915d090301.jpg', 'dGarbage.jpg', '', 'City gate', 42, 'Problem Problem Problem Problem Problem Problem Problem Problem', '', 0, 0, 0),
(95, 'Garbage', '0000-00-00 00:00:00', 'fahim', '', 'dGarbage.jpg', '2005030915d090301.jpg', 'Garbage--A-Palestinian-wo-012.jpg', '', 'Chawkbazar', 12, 'new problem new problem new problem new problem new problem new problem new problem ', '', 0, 0, 0),
(96, 'Road', '0000-00-00 00:00:00', 'fahim', '', 'DAYTIME_STROOP_ROAD_web.JPG', '31834507-Asphalt-broken-road-Stock-Photo.jpg', 'images.jpg', '', 'Agarabad', 12, 'Test', '', 0, 0, 0),
(97, 'test', '0000-00-00 00:00:00', 'fahim', '', '31834507-Asphalt-broken-road-Stock-Photo.jpg', 'broken-road.jpg', 'DAYTIME_STROOP_ROAD_web.JPG', '', 'Agrabad', 1, 'anything.............', '', 0, 0, 0),
(98, 'Dangerous Wire', '0000-00-00 00:00:00', 'fahim', '', 'VBK-COIMB_34507f.jpg', '', '', '', 'Agrabad', 12, 'anything.............', '', 0, 0, 0),
(99, 'test 2', '0000-00-00 00:00:00', 'fahim', '', 'VBK-COIMB_34507f.jpg', '', '', '', '2 no gate', 43, 'anything.............', '', 0, 0, 0),
(100, 'test 3', '0000-00-00 00:00:00', 'fahim', '', 'VBK-COIMB_34507f.jpg', '', '', '', 'Agrabad', 11, 'anything.............', '', 0, 0, 0),
(101, 'test 4', '0000-00-00 00:00:00', 'fahim', '', 'VBK-COIMB_34507f.jpg', '', '', '', '2 no gate', 12, 'anything.............', '', 0, 0, 0),
(102, 'test 5', '0000-00-00 00:00:00', 'fahim', '', 'VBK-COIMB_34507f.jpg', '', '', '', 'Agrabad', 24, 'anything.............', '', 0, 0, 0),
(103, 'test 5', '0000-00-00 00:00:00', 'fahim', '', 'VBK-COIMB_34507f.jpg', '', '', '', 'Agrabad', 24, 'anything.............', '', 0, 0, 0),
(104, 'REP', '2016-11-28 18:29:43', '', '', '', '', '', '', 'GEC', 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ', '', 0, 0, 0),
(105, 'Iiside', '2016-11-28 18:36:25', '', '', '', '', '', '', 'GEC', 12, '	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ', '', 0, 0, 0),
(106, 'Updated', '2016-11-29 05:09:02', '', '', '', '', '', '', '2 no gate', 2, '	', '', 0, 0, 0),
(107, 'Road block', '2016-11-29 05:23:36', ' ', 'Road', '', '', '', '', 'Muradpur', 3, '	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum ', '', 0, 0, 0),
(113, 'Development or Devastation', '2016-12-01 09:26:44', ' ', 'Road', '1480584404roaddamanage.jpg', '1480584404', '1480584404', '', 'Agrabad', 2, '		Commuting through Malibagh, Mouchak, Maghbazar, Banglamotor, Rajarbagh and Tejgaon areas becomes a nightmare owing, ironically, to a flyover getting constructed as a way of easing Dhaka''s severe traffic congestion. Potholes arising out of the digging for the construction are filled with rain water, posing a threat to safe movement by citizens. Construction materials are piled on waysides or on the roads for weeks. During the peak times of daily communication, between office hours from 9am to 5pm, traffic remains stationary for hours. People are properly outraged at their sufferings, apparently stemming from the authority''s lack of care for them. That is why news of development work aimed at ensuring the comfort of city dwellers almost always gives them a shudder.      ', '', 0, 22.3461, 91.8284);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `ward_no` int(20) NOT NULL,
  `user_nid` varchar(17) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_mobile` varchar(11) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `postoffice` varchar(10) NOT NULL,
  `thana` varchar(50) NOT NULL,
  `district` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userimage` text NOT NULL,
  `nidimage` text NOT NULL,
  `is_approved` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `ward_no`, `user_nid`, `user_pass`, `user_mobile`, `adress`, `postoffice`, `thana`, `district`, `gender`, `occupation`, `email`, `userimage`, `nidimage`, `is_approved`) VALUES
(4, 'Fahim', 42, '', 'fahim', '1819333514', '', '0', '', '', '', '', '', '', '', 0),
(5, 'juwel', 12, '', 'juwel', '1675711884', '', '0', '', '', '', '', '', '', '', 0),
(6, 'Peter', 12, '', '51dc30ddc473d43a6011e9ebba6ca770', '1122', '', '0', '', '', '', '', '', '', '', 0),
(7, 'Maruf', 20, '', 'd3fdc20281e755d3619d228e0ec3d552', '1682156287', '', '0', '', '', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
