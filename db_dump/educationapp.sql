-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 11:42 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educationapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_assignments`
--

CREATE TABLE `ad_assignments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 -> New, 1 -> Pending, 2 -> Compelted',
  `start_date` varchar(150) NOT NULL,
  `end_date` varchar(150) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_assignments`
--

INSERT INTO `ad_assignments` (`id`, `student_id`, `course`, `status`, `start_date`, `end_date`, `assigned_by`, `created_on`) VALUES
(4, 1, 9, 0, '03/07/2019 3:44 PM', '03/14/2019 3:44 PM', 1, '2019-03-07 15:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `ad_course`
--

CREATE TABLE `ad_course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `course_lang` varchar(200) NOT NULL,
  `icon_file` varchar(200) NOT NULL,
  `course_desc` longtext NOT NULL,
  `lesson_no` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `publish_status` int(11) DEFAULT '0' COMMENT '0->Pending, 1->Draft, 2->Published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_course`
--

INSERT INTO `ad_course` (`id`, `course_name`, `course_lang`, `icon_file`, `course_desc`, `lesson_no`, `created_on`, `updated_on`, `updated_by`, `publish_status`) VALUES
(1, 'Heavy Vehicle Driving', '{\"english\":\"1\",\"arabic\":\"1\",\"urdu\":\"0\",\"pashto\":\"0\",\"malayalam\":\"1\"}', 'content/uploads/course/154781082828418.jpg', '<p><b><i><u></u><u>This lessons</u> </i></b><i>is for heavy vehicle drivers.</i><b><i><u></u></i></b><br></p><br><br><br><br>', 6, '2019-01-14 16:06:39', NULL, 1, 0),
(2, 'Right hand driving lessons', '{\"english\":\"1\",\"arabic\":\"1\",\"urdu\":\"0\",\"pashto\":\"0\",\"malayalam\":\"0\"}', 'content/uploads/course/154746301422071.jpg', '<p>This course is intended for right hand drivers.<br></p>', 18, '2019-01-14 16:20:14', NULL, 1, 0),
(3, 'Left hand driving', '{\"english\":\"1\",\"arabic\":\"0\",\"urdu\":\"0\",\"pashto\":\"0\",\"malayalam\":\"0\"}', 'content/uploads/course/154781094229202.png', '', 8, '2019-01-14 16:27:17', NULL, 1, 2),
(6, 'Security Driver Test - New', '{\"english\":\"1\",\"arabic\":\"0\",\"urdu\":\"1\",\"pashto\":\"0\",\"malayalam\":\"1\"}', 'content/uploads/course/154752657731949.jpg', '<p><i>Introduction:</i></p><p>Drivers willing to do security driving can join this course.<br></p><br>', 5, '2019-01-15 09:59:37', NULL, 1, 0),
(7, 'Speed Test Lessons', '{\"english\":\"1\",\"arabic\":\"0\",\"urdu\":\"1\",\"pashto\":\"0\",\"malayalam\":\"1\"}', 'content/uploads/course/154754805221891.jpg', '', 10, '2019-01-15 15:57:32', NULL, 1, 2),
(9, 'Left Hand Driving - Expert Course', '{\"english\":\"1\",\"arabic\":\"0\",\"urdu\":\"0\",\"pashto\":\"0\",\"malayalam\":\"0\"}', 'content/uploads/course/155021275315786.jpg', 'This course is for all left-hand drivers who are experts. Some addition lines for description. Yes of course.', 8, '2019-01-19 14:54:20', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ad_lessons`
--

CREATE TABLE `ad_lessons` (
  `id` int(11) NOT NULL,
  `lesson_name` varchar(255) NOT NULL,
  `lesson_order` int(11) NOT NULL,
  `icon_file` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `language` varchar(50) DEFAULT NULL,
  `publish_status` int(11) DEFAULT '0' COMMENT '0->Pending, 1->Draft, 2->Published ',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_lessons`
--

INSERT INTO `ad_lessons` (`id`, `lesson_name`, `lesson_order`, `icon_file`, `course_id`, `language`, `publish_status`, `created_on`, `updated_on`, `updated_by`) VALUES
(2, 'Introduction', 1, 'content/uploads/lessons/154833124221808.jpg', 9, 'english', 2, '2019-01-24 11:49:51', NULL, 1),
(3, 'Course Overview', 2, 'content/uploads/lessons/154832285614613.jpg', 9, 'english', 2, '2019-01-24 15:10:56', NULL, 1),
(4, 'Left Hand Driving - An Introduction', 3, 'content/uploads/lessons/15483229653431.jpg', 9, 'english', 2, '2019-01-24 15:12:45', NULL, 1),
(5, 'ഇടതു കൈ കൊണ്ടുപോകൽ - ഒരു ആമുഖം', 3, 'content/uploads/lessons/15483247133005.jpg', 9, 'malayalam', 2, '2019-01-24 15:41:53', NULL, 1),
(6, 'കോഴ്സ് അവലോകനം', 2, 'content/uploads/lessons/15483247632858.jpg', 9, 'malayalam', 2, '2019-01-24 15:42:43', NULL, 1),
(7, 'ആമുഖം', 1, 'content/uploads/lessons/15483247944772.jpg', 9, 'malayalam', 2, '2019-01-24 15:43:14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ad_quiz`
--

CREATE TABLE `ad_quiz` (
  `quiz_id` int(11) NOT NULL,
  `lessonid` int(11) NOT NULL,
  `quiz_type` varchar(20) DEFAULT NULL,
  `question` mediumtext,
  `trueorfalse` varchar(20) DEFAULT NULL,
  `mediatype` varchar(20) DEFAULT NULL,
  `upload_media` mediumtext,
  `right_answer` mediumtext,
  `drag_drop` mediumtext,
  `reorder` mediumtext,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `publish_status` int(11) NOT NULL DEFAULT '0' COMMENT '	0->Pending, 1->Draft, 2->Published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_quiz`
--

INSERT INTO `ad_quiz` (`quiz_id`, `lessonid`, `quiz_type`, `question`, `trueorfalse`, `mediatype`, `upload_media`, `right_answer`, `drag_drop`, `reorder`, `created_on`, `created_by`, `updated_on`, `updated_by`, `publish_status`) VALUES
(2, 2, 'true_or_false', 'Driving automation helps newbie drivers drive fast?', 'true', NULL, NULL, NULL, NULL, NULL, '2019-03-05 00:00:00', 1, NULL, 1, 0),
(3, 2, 'true_or_false', 'Driving relaxation course helps learners know the basics of relaxation during driving.', 'true', NULL, NULL, NULL, NULL, NULL, '2019-03-05 00:00:00', 1, NULL, 1, 0),
(4, 2, 'true_or_false', 'Does piano music relax mind?', 'false', NULL, NULL, NULL, NULL, NULL, '2019-03-05 00:00:00', 1, NULL, 1, 0),
(5, 2, 'true_or_false', 'You should hold your steering wheel at 90-degree angle?', 'true', NULL, NULL, NULL, NULL, NULL, '2019-03-05 00:00:00', 1, NULL, 1, 0),
(6, 2, 'right_answer', 'Which car is best for driving?', NULL, 'image', 'content/uploads/quiz/image/15517003199744.jpg', '{\"a\":{\"question\":\"Maruthi Alto\",\"answer\":\"yes\"},\"b\":{\"question\":\"Suzuki Baleno\",\"answer\":\"no\"},\"c\":{\"question\":\"Scorpio\",\"answer\":\"no\"},\"d\":{\"question\":\"Lamborghini\",\"answer\":\"no\"}}', NULL, NULL, '2019-03-05 00:00:00', 1, NULL, 1, 0),
(7, 2, 'right_answer', 'What are the main objectives of this course introduction?', NULL, 'image', 'content/uploads/quiz/image/2155176416220691.jpg', '{\"a\":{\"question\":\"Course introduction one\",\"answer\":\"no\"},\"b\":{\"question\":\"Descriptions for testing\",\"answer\":\"no\"},\"c\":{\"question\":\"Course overview developments\",\"answer\":\"yes\"},\"d\":{\"question\":\"Steering wheels resolutions\",\"answer\":\"no\"}}', NULL, NULL, '2019-03-05 00:00:00', 1, NULL, 1, 0),
(8, 2, 'drag_and_drop', NULL, NULL, NULL, NULL, NULL, '{\"question_one\":{\"question\":\"Four wheeler has :\",\"matching_answer\":\"4 Wheels\"},\"question_two\":{\"question\":\"Bike has :\",\"matching_answer\":\"2 Wheels\"},\"question_three\":{\"question\":\"Cycle has:\",\"matching_answer\":\"2 Wheels run by chain\"}}', NULL, '2019-03-05 11:34:27', 1, NULL, 1, 0),
(9, 3, 'reorder', NULL, NULL, NULL, NULL, NULL, NULL, '{\"1\":\"Before crossing see left and right\",\"2\":\"Wait for traffic signal to turn green\",\"3\":\"Make sure there is no vehicle speeding both sides\",\"4\":\"Now you can cross the road\"}', '2019-03-05 12:12:52', 1, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ad_slides`
--

CREATE TABLE `ad_slides` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `slide_title` varchar(150) NOT NULL,
  `slide_mode` varchar(50) NOT NULL,
  `slide_file` varchar(255) NOT NULL,
  `slide_description` longtext NOT NULL,
  `slide_duration` varchar(15) NOT NULL,
  `slide_order` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->Pending, 1->Draft, 2->Published '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_slides`
--

INSERT INTO `ad_slides` (`id`, `lesson_id`, `slide_title`, `slide_mode`, `slide_file`, `slide_description`, `slide_duration`, `slide_order`, `created_by`, `created_on`, `updated_by`, `updated_on`, `publish_status`) VALUES
(1, 2, 'Driving Automation', 'video', 'content/uploads/slide/video/155133424026827.mp4', 'Driving Automation Introduction This is an example of driving automation tutorial. Lot more of description goes here.', '00.01', 1, 1, '2019-02-12 16:55:14', NULL, '0000-00-00 00:00:00', 0),
(2, 2, 'Parallel Parking', 'video', 'content/uploads/slide/video/Vy80RENjZGxxTTNDOHN5VkRJSGlJUT0915500369748074.mp4', 'Parallel Parking: Introduction This is a sample introduction slide for parallel parking.', '01:12', 2, 1, '2019-02-13 11:19:34', NULL, '0000-00-00 00:00:00', 0),
(3, 2, 'Piano - Driving Relaxation', 'audio', 'content/uploads/slide/audio/2155003715622394.mp3', 'Piano - Introduction Piano introduction course.', '04:00', 3, 1, '2019-02-13 11:22:36', NULL, '0000-00-00 00:00:00', 0),
(4, 2, 'How to hold your steering wheel', 'image', 'content/uploads/slide/image/2155133492010408.jpg', 'Steering Wheels:\r\n\r\nHow to hold your steering wheel. This is a sample course.', '00:00', 4, 1, '2019-02-28 11:52:00', NULL, '2019-02-28 11:52:00', 0),
(5, 3, 'Introduction to course overview', 'image', 'content/uploads/slide/image/3155176130419019.jpg', 'Introduction to course overview,  This is a text summary for testing.', '01:18', 1, 1, '2019-03-05 10:18:24', NULL, '2019-03-05 10:18:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ad_staff`
--

CREATE TABLE `ad_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `role` int(11) NOT NULL,
  `remember_me` int(11) NOT NULL,
  `remember_token` varchar(210) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_staff`
--

INSERT INTO `ad_staff` (`id`, `name`, `email`, `password`, `contact_number`, `role`, `remember_me`, `remember_token`, `created_time`) VALUES
(1, 'Admin', 'admin@educationapp.com', '$2y$10$uqfwk0rM.IDQwA.Kwwv0JOfH1VVRKWgqe6ojJq0Q0QnE7iThih8Y6', '9876543210', 0, 0, '', '2018-11-28 11:19:53'),
(2, 'Faculty', 'faculty@educationapp.com', '$2y$10$uqfwk0rM.IDQwA.Kwwv0JOfH1VVRKWgqe6ojJq0Q0QnE7iThih8Y6', '784596310', 1, 0, '', '2018-12-20 10:24:41'),
(4, 'Jino Mukesh', 'jino@test.com', '$2y$10$6IntcRCdOy/n6azc9r8uSuIp3cBw/ggnQrMR.RXNzg6UkOk6OGnya', '7845129630', 0, 0, '', '2019-01-02 10:21:24'),
(7, 'Mukesh MB', 'mukesh@test.com', '$2y$10$WWXTFhDTsR7fEuDA4UjJU.mKVrGbSZW4kpEPCXvrCIS9qxcuH4En.', '875421854112', 0, 0, '', '2019-01-02 10:31:37'),
(9, 'Syam', 'syam@educationapp.com', '$2y$10$dRWSfrcdgIzVlyd1APwFle6BGPJoHDAwdGfVCfn0FXBUhaQ.cNsMS', '7845129630', 1, 0, '', '2019-01-05 10:32:08'),
(10, 'Soumya JH', 'soumya@gmail.com', '$2y$10$LqOaT4pGSp0romnv8SVWIeFftFzgNCwcIVKCV.xfM3kHRxjz77nEC', '9876543210', 0, 0, '', '2019-01-18 12:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `ad_student`
--

CREATE TABLE `ad_student` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `student_idno` varchar(100) DEFAULT NULL,
  `emirates_idno` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `role` int(11) NOT NULL,
  `remember_me` int(11) NOT NULL,
  `remember_token` varchar(210) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_student`
--

INSERT INTO `ad_student` (`id`, `name`, `student_idno`, `emirates_idno`, `email`, `password`, `contact_number`, `role`, `remember_me`, `remember_token`, `created_time`) VALUES
(1, 'Student', '859-6895-256895', '258-9586-986542', 'student@educationapp.com', '$2y$10$uqfwk0rM.IDQwA.Kwwv0JOfH1VVRKWgqe6ojJq0Q0QnE7iThih8Y6', '784521058', 0, 0, '', '2018-12-20 11:14:26'),
(2, 'Ram Thilak', '', '', 'ramthilak@gmail.com', '$2y$10$CejlB2gNAJdu7/ruWqIHS.W3lnEkqNO3Jg3RPR9dxYM9vazi0wKVu', '8526391', 0, 0, '', '2019-01-05 10:45:09'),
(3, 'Aishwariya', '', '', 'aishwariya@gmail.com', '$2y$10$06wqMdz.5BXEuu9EU0kow.XncC9JkS9in0e1ADg2iwfPjbjnhfMn2', '741852096', 0, 0, '', '2019-01-05 10:46:55'),
(4, 'Shaemin', '859-6895-256895', '258-9586-986542', 'shaemin@educationapp.com', '$2y$10$8IoYiPBRc2ICQSonqxIxs./xsk84.SbiGVgNFqieu4Aenk73FBaHG', '7896543210', 0, 0, '', '2019-03-06 12:05:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_assignments`
--
ALTER TABLE `ad_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_course`
--
ALTER TABLE `ad_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_lessons`
--
ALTER TABLE `ad_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_quiz`
--
ALTER TABLE `ad_quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `ad_slides`
--
ALTER TABLE `ad_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_staff`
--
ALTER TABLE `ad_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_student`
--
ALTER TABLE `ad_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_assignments`
--
ALTER TABLE `ad_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ad_course`
--
ALTER TABLE `ad_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ad_lessons`
--
ALTER TABLE `ad_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ad_quiz`
--
ALTER TABLE `ad_quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ad_slides`
--
ALTER TABLE `ad_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ad_staff`
--
ALTER TABLE `ad_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ad_student`
--
ALTER TABLE `ad_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
