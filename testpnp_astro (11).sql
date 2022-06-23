-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2021 at 05:04 AM
-- Server version: 10.1.48-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testpnp_astro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'admin' COMMENT 'for folderchange',
  `email` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `level` int(10) NOT NULL COMMENT '1=superadmin ,2 = subadmin',
  `status` varchar(255) NOT NULL DEFAULT '0',
  `onlinestatus` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `type`, `email`, `mobile`, `image`, `password`, `timestamp`, `level`, `status`, `onlinestatus`) VALUES
(1, 'viraj admin', 'admin', 'admin@gmail.com', 1234567891, '1.png', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-10-16 05:36:52', 1, '1', 0),
(2, 'sub adminraj', 'admin', 'subadmin@gmail.com', 1234567891, '2.png', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-12-30 06:48:44', 2, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advt_id` int(11) NOT NULL,
  `advt_title` varchar(255) NOT NULL,
  `advt_image` varchar(255) NOT NULL,
  `advt_href` varchar(255) NOT NULL DEFAULT '#',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advt_id`, `advt_title`, `advt_image`, `advt_href`, `timestamp`) VALUES
(3, 'Free astro Service ', 'advt5.jpg', 'https://www.astrosage.com/', '2021-01-09 07:11:15'),
(4, 'Advt 2', 'advt2.jpg', 'https://www.astrosage.com/', '2021-01-09 07:11:46'),
(5, 'astro', 'advt4.jpg', 'https://www.astrosage.com/', '2021-01-11 06:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `astrologers`
--

CREATE TABLE `astrologers` (
  `astro_id` int(11) NOT NULL,
  `astro_name` varchar(255) NOT NULL,
  `astro_email` varchar(255) NOT NULL,
  `astro_password` varchar(255) NOT NULL,
  `astro_description` longtext NOT NULL,
  `astro_language` varchar(255) NOT NULL,
  `astro_cat` varchar(255) NOT NULL,
  `astro_experience` varchar(255) NOT NULL,
  `astro_calling_rate` varchar(255) NOT NULL,
  `astro_chat_rate` varchar(255) NOT NULL,
  `astro_askreport_rate` varchar(255) NOT NULL,
  `astro_image` varchar(255) NOT NULL,
  `astro_mobile` varchar(255) NOT NULL,
  `alter_number` int(11) NOT NULL,
  `ratting` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `ac_number` varchar(255) NOT NULL,
  `ac_type` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `ac_name` varchar(255) NOT NULL,
  `pancard` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `monthly_income` varchar(255) NOT NULL,
  `short_bio` varchar(255) NOT NULL,
  `long_bio` varchar(255) NOT NULL,
  `astro_approved_status` int(11) NOT NULL COMMENT '0=not approved ,1 = approved ,2 = blocked',
  `astro_verification_status` int(11) NOT NULL,
  `astro_online_status` int(11) NOT NULL,
  `astro_online_chat_status` int(11) NOT NULL DEFAULT '0',
  `astro_chat_watting_time` varchar(225) NOT NULL,
  `astro_chat_time` varchar(255) NOT NULL,
  `astro_online_call_status` int(11) NOT NULL DEFAULT '0',
  `astro_call_watting_time` varchar(255) NOT NULL,
  `astro_call_time` varchar(255) NOT NULL,
  `percentage_deduction` float NOT NULL DEFAULT '10',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `astrologers`
--

INSERT INTO `astrologers` (`astro_id`, `astro_name`, `astro_email`, `astro_password`, `astro_description`, `astro_language`, `astro_cat`, `astro_experience`, `astro_calling_rate`, `astro_chat_rate`, `astro_askreport_rate`, `astro_image`, `astro_mobile`, `alter_number`, `ratting`, `gender`, `skill`, `dob`, `address`, `city`, `state`, `country`, `pincode`, `ac_number`, `ac_type`, `ifsc`, `ac_name`, `pancard`, `aadhar`, `site_name`, `monthly_income`, `short_bio`, `long_bio`, `astro_approved_status`, `astro_verification_status`, `astro_online_status`, `astro_online_chat_status`, `astro_chat_watting_time`, `astro_chat_time`, `astro_online_call_status`, `astro_call_watting_time`, `astro_call_time`, `percentage_deduction`, `timestamp`) VALUES
(58, 'Chetan Ji', 'test3@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '<p>He has been in this field for last 22 years and specialises in Kundali. His family has also been serving in this field from 1975 and still going on. Astrology blends science and intuition, magic and mathematics, cycles and symbols. It focuses on planets and their seasons, and planets are real. .Your astrology chart or your horoscope is your personal map, calculated using the date and time you were born from the perspective of your birth location.&nbsp;<br />\r\n&nbsp;</p>\r\n', 'Hindi', '5,1,2,6,10', '22', '35', '25', '350', 'WhatsAppImage2021-01-22at1.18.32PM.jpeg', '9876543213', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '0', '', 0, '', '', 10, '2021-01-27 06:36:43'),
(57, 'Vibhor Ji', 'test2@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '<p>15 Years of Astrology Experience, from ujjain, &nbsp;having dedicated Ashram for puja, having Cows, Trees According to Horoscopes Nakshatra at ashram, established Narmadeshwar Shivling At Ashram.&nbsp;</p>\r\n', 'Hindi', '5,2,6,7,10', '15', '30', '20', '280', 'bbbb.png', '9876543212', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '0', '', 0, '', '', 10, '2021-01-27 06:34:44'),
(51, 'Krishna Shastri', 'astrologer2@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '<p>About me, i am Krishna shastri my qualification is b.a shastri jyotish ratnakar vaidik jyotish Bhaskar. Bhagwat aacharya, from sampurnanand vishwavidyalaya Varanasi u. P., I have total work experience 7 years 11 month like kundli analysis, hast Rekha, vastu tips, bhagwat Katha, stone suggestion, Vedic yagya anushthan . My self work:- Rameshwaram jyotish sansthan .an us than like- Krishna ji and Radha Rani sarkar<br />\r\nMahamrityunjay anushthan, sampurn grah Shanti, all manglik karyakram and vaidik anushthan yagya,</p>\r\n', 'Hindi, English', '5,2,7,10', '8', '20', '10', '500', 'WhatsAppImage2021-01-18at4.01.55PM.jpeg', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '0', '', 0, '', '', 10, '2021-01-27 06:02:25'),
(34, 'Acharya  Patel Ji', 'astrologer@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '<p>M.A.jyotirvigyan &amp; research scholar with experience (jyotish/vastu ) of 15 years.writer of three astrology research books.</p>\r\n', 'Hindi, English', '5,2', '20', '15', '450', '1000', 'aaaa.png', '7223062525', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '', '', 0, '', '', 10, '2021-01-27 06:06:14'),
(54, 'sanjana Ji', 'atro@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 'Hindi, English, Marathi, Sindhi', '5,2,6,10', '10', '40', '30', '1000', 'WhatsAppImage2021-01-21at6.33.24PM.jpeg', '1234567891', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '0', '', 0, '', '', 10, '2021-01-27 06:15:43'),
(55, 'Pradeep Ji', 'test@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '<p>???????. ??? ??????&nbsp;?? &nbsp;???? 71 ???? ?? ????? ????? ??? ????? ???? ?? &nbsp;, &nbsp;?????? ???????? ?????? ?? ?????? ?? ????? ??.?. ??? ?????? ???? ??? ??. ?. ???? ?? ??? ??????? ??????? ?? ?????? ?? ????? ???? ??????? ?? ??????? ???? ?? ??? ?? ??????? ?? ??????? ????? ????? ?? ????? ?? ?? ???? ???? ???????? ?? ?????? ????? ???? 30 ?????? ?? ???? ??? ?? ?? ??? ???. ????? ??? ????? ????? ??????????? ????? ?????? ?? ???? 2014 ??? ??????? ???????? ?? ??? ???? 2018 ??? ????????????? ?? ????? ??????? ?? ??? ????? ?? ???????? ???? ??????? &nbsp;, &nbsp;??????? &nbsp;, ??????? ??? &nbsp;, ??????? ??? &nbsp;, ??? ?? ????? ? ???? ?? ?????? ?? ?????? ???? ???? ?? ?? ?? ?????????? ???????? ?? ?????? ?? ??? ???. ???? ???????? ???? ?? ???? ????? ?? ???????? ?? ?????? ???? ???? ???? ?? ??? ?????? ???? ?? &nbsp;.&nbsp;</p>\r\n', 'Hindi, English', '5,2,10', '10', '20', '10', '250', '11111.png', '9876543210', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 1, 1, '0', '', 1, ' ', ' ', 10, '2021-01-27 06:21:05'),
(56, 'Deepak Ji', 'test1@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '<p>??????? ????&nbsp;?? ???? 16 ?????? ?? ?????? remedial astrology ?????? ????????? ??? ????? ?????? ?? ??????? ?? ????? ?? ??? ???<br />\r\n???? ??????? ??? ?? ???? ??????? ?? ???? ?? ?? ?? ???? ?? ?? ???? ??????? ?? ???? ?? ?? ?????? ?? ????? ?? ???? ?? ???? ?? ????? ?????? ?? ???? ???<br />\r\n???? ?? ?? ?? ???? ?? ?????? ?? ??????? ?? ??????, ????????? ??? ?????? ?? ????? ???? ???<br />\r\n??? ?????? ???????? ???? ??????? ????? ?? ???? ??? ???? ?? ??? ?? ???, ??? ?? ????, ??? ?? ???? ???? ??? ??????? ?? ?? ??????? ??<br />\r\n?? ??????? ?? ?????? ?? ??? ????? ??? ?????? ?? ??? ?????? ?? &nbsp;ya office ?? ?????? ?? ???? ?? ?????? ???????? ????????? ?????&nbsp;<br />\r\n???????? ?????? ?? ??????? ?? ???? ?? ???? ??? ????? ?????? ???? ?? ????? ?????? ?? ?? ???? ???? ??<br />\r\n?????? ?? ??????? ?? ????? ???? ?? ?? ???? ?? ?????? ??????? ?? ??? ?? ?? ???? ?? ??????? ??? ??????? ?? ?? ?????????? ?? ??????? ???? ??? ?????? ?? ????? ???? ??? ?? ??? ?? ??? ?? ??? ??? ?? ??? ???? ??? ????? ?? ??? ??? ?? ???? ??? ?? ???? ?? ???? vibration ?? ??????? ????? ?? ????? ???? ?? ????? ?? ???? ??? ?? ?? ???? ?? ???? ??? ?? ?? ???? ????? ??? ??? ???? ?? ????? ??????? ??? ?? ?? ???? ???????????? ??? ???? ???? ??? ??????? ??? ?????? ?????? ?????? ?? ?????? ??&nbsp;<br />\r\n??? ???? ???????? ????? ??? ???? ?? ??? ?? ?? vibration ?? ??????? ??? ???? ??? ?? ???? ???? ???? ?? ????? ???? ???? ??????? ?? ????? ??? ?? ???? ??????? ?????? ???? ??? ????? ?? ??????? ?????<br />\r\n??????? ?????? ????? ???? ??????? ?????<br />\r\n???? ??? ??? ?? ??? ?? ??????? ?? ?????? ?? ????? ???? ???? ?? ???? ?? ?? ????? ?? ???? ?? ????? ?? ?? ?????? ?? ????? 16 ?????? ?? ???? ? ??? ???</p>\r\n', 'Hindi, English', '5,2,10,11', '16', '40', '20', '400', 'WhatsAppImage2021-01-22at5.55.03AM.jpeg', '9876543211', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '0', '', 0, '', '', 10, '2021-01-27 06:30:20'),
(50, 'Nitin Ji', 'abh@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '<p>About me - I am Nitin&nbsp;,my qualification is ma , MPhil , and PhD running in jyotirvigyan From maharishi panini Sanskrit Evam vedic university Ujjain , I have total work experience 11 year and 8 month like kundli analysis , hasthrekha , Ankganit , vaastu , stone suggestion , kundli Sakti jagran , yoga trainer , an us than like - Ganesh , baghlamukhi , Kali , bherav and all grah shanti jaap .</p>\r\n', 'Hindi, English', '2,10', '12', '10', '8', '250', 'WhatsAppImage2021-01-18at4.01.54PM.jpeg', '1234567891', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '0', '', 0, '', '', 10, '2021-01-27 05:57:38'),
(59, 'Shailja Ji', 'test4@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '<p>Vastu consultant from indore with experience of 4 years. completed vastu &nbsp;ratna diploma from Shree maharshi collage of vedic astrology, Udaipur.</p>\r\n', 'Hindi, English', '2', '4', '40', '20', '280', 'WhatsAppImage2021-01-27at1.55.10AM.jpeg', '9876543214', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '0', '', 0, '', '', 10, '2021-01-27 06:39:46'),
(60, 'Vipat Ji', 'test5@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '<p>Based in MP, Astrologer Vipat Ji has been an eminent personality in the field of astrology for the past 12 years. Following the legacy of his late father and a celebrated astrologer Pt. Vishwanath Vipat who worked in the field for 60 long years, Vinayak ji has established himself as an expert in the areas of horoscope reading like career problems, marriage, Vaastu and many more. He also specializes in the field of Gemology.&nbsp;<br />\r\nMr. Vipat who has a degree in both Engineering and Management, as a matter of fact has been working as an engineer for the past 30 years, and has worked at institutions like IIM Indore, IIT Indore, IISER Pune, Symbiosis Indore to name a few, apart from being a brilliant astrologer. Currently, he holds a prominent position in the Akhil Bhartiya Jyotish Vastu Association of India. He is expanding in the field of astrology and keeps up with the changing times and the need of the hour. His readings and calculations are unbelievably accurate and he has provided very impactful and satisfactory solutions to his customers. His study is a perfect blend of horoscope science &amp; technology, that&#39;s why his motto is- &quot;Think logically, implement astrologially&quot;</p>\r\n', 'Hindi, English', '5,2,10', '12', '35', '20', '350', 'WhatsAppImage2021-01-27at3.49.31AM.jpeg', '9876543215', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '0', '', 0, '', '', 10, '2021-01-27 06:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `astrologers_multiplecategories`
--

CREATE TABLE `astrologers_multiplecategories` (
  `multiple_id` int(11) NOT NULL,
  `astrologer_id_m` int(255) NOT NULL,
  `astrologer_cat_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `astrologers_multiplecategories`
--

INSERT INTO `astrologers_multiplecategories` (`multiple_id`, `astrologer_id_m`, `astrologer_cat_id`) VALUES
(47, 44, 5),
(57, 43, 8),
(56, 43, 5),
(104, 34, 5),
(61, 33, 5),
(41, 32, 2),
(40, 32, 5),
(63, 31, 1),
(62, 31, 5),
(48, 44, 6),
(49, 45, 7),
(53, 46, 7),
(52, 46, 5),
(58, 47, 5),
(59, 48, 1),
(60, 49, 5),
(110, 50, 10),
(109, 50, 2),
(66, 51, 5),
(67, 51, 2),
(68, 51, 7),
(69, 51, 10),
(70, 52, 5),
(71, 52, 2),
(72, 53, 5),
(102, 54, 10),
(101, 54, 6),
(100, 54, 2),
(99, 54, 5),
(77, 55, 5),
(78, 55, 2),
(79, 55, 10),
(80, 56, 5),
(81, 56, 2),
(82, 56, 10),
(83, 56, 11),
(84, 57, 5),
(85, 57, 2),
(86, 57, 6),
(87, 57, 7),
(88, 57, 10),
(89, 58, 5),
(90, 58, 1),
(91, 58, 2),
(92, 58, 6),
(93, 58, 10),
(94, 59, 2),
(95, 60, 5),
(96, 60, 2),
(97, 60, 10),
(105, 34, 1),
(106, 34, 2),
(111, 94, 5),
(112, 94, 1),
(113, 94, 2),
(114, 94, 10);

-- --------------------------------------------------------

--
-- Table structure for table `astro_admin_team`
--

CREATE TABLE `astro_admin_team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_image` varchar(255) NOT NULL,
  `team_post` varchar(255) NOT NULL,
  `team_approved_status` varchar(255) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `astro_admin_team`
--

INSERT INTO `astro_admin_team` (`team_id`, `team_name`, `team_image`, `team_post`, `team_approved_status`, `timestamp`) VALUES
(3, 'RAJESH', 'ast1.jpg', 'Head of Sales', '1', '2021-01-07 07:10:56'),
(4, 'SURESH', 'ast3.jpg', 'head of account', '1', '2021-01-07 07:11:24'),
(5, 'Naina', 'ast2.jpg', 'Astrologer', '1', '2021-01-08 12:27:54'),
(6, 'Neelam', 'ast4.jpg', 'Pandit', '1', '2021-01-08 12:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` longtext NOT NULL,
  `long_description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `published_by` varchar(255) NOT NULL,
  `blog_approval_status` int(11) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `short_description`, `long_description`, `image`, `published_by`, `blog_approval_status`, `timestamp`) VALUES
(1, 'PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET', 'Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet. Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'blog1.png', '1', 1, '2021-01-05 12:55:37'),
(2, 'TRANSIT OF THE SUN INTO SAGITTARIUS SIGN ON 15 DEC', 'Get A Chance to Fulfill Your Long Pending Wishes', 'Get A Chance to Fulfill Your Long Pending Wishes Get A Chance to Fulfill Your Long Pending Wishes Get A Chance to Fulfill Your Long Pending Wishes', 'blog2.png', '2', 1, '2021-01-07 12:56:05'),
(3, 'PISCES HOROSCOPE 2021', 'NewYear 2021will begin on an average note. Since your sign lord Jupiter is transitting with Saturn', 'NewYear 2021will begin on an average note. Since your sign lord Jupiter is transitting with Saturn NewYear 2021will begin on an average note. Since your sign lord Jupiter is transitting with Saturn', 'blog3.png', '1', 1, '2021-01-07 12:56:30'),
(4, 'PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET', 'PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET ', 'PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET', 's1.png', '1', 1, '2021-01-07 13:09:05'),
(13, 'Sign Up for Free to consult best astrologers in India', 'Sign Up for Free to consult\r\nbest astrologers in India Sign Up for Free to consult\r\nbest astrologers in India Sign Up for Free to consult\r\nbest astrologers in India', 'Sign Up for Free to consult\r\nbest astrologers in India Sign Up for Free to consult\r\nbest astrologers in India Sign Up for Free to consult\r\nbest astrologers in India', 'Astrology-report.png', '1', 1, '2021-01-14 13:26:05'),
(14, 'Rudrabhishek Puja', 'Rudrabhishek Puja is performed to invoke the blessings of Lord Rudra, the most ferocious form of Lord Shiv', 'Rudrabhishek Puja is a very powerful pooja of Lord Shiv. Lord Ram did Rudrabhishekam in Rameswaram to Shiv lingam to get the blessings of Lord Shiv. This puja helps in having a strong mind, good health and getting rid of evil effects. Rudrabhishek Puja is a very powerful pooja of Lord Shiv. Lord Ram did Rudrabhishekam in Rameswaram to Shiv lingam to get the blessings of Lord Shiv. This puja helps in having a strong mind, good health and getting rid of evil effects. Rudrabhishek Puja is a very powerful pooja of Lord Shiv. Lord Ram did Rudrabhishekam in Rameswaram to Shiv lingam to get the blessings of Lord Shiv. This puja helps in having a strong mind, good health and getting rid of evil effects.', 'rud.png', '1', 1, '2021-01-16 05:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `blogcomment`
--

CREATE TABLE `blogcomment` (
  `comment_id` int(11) NOT NULL,
  `comment_blog_id` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_mobile` int(255) NOT NULL,
  `comment_comment` varchar(255) NOT NULL,
  `comment_status` int(11) NOT NULL DEFAULT '0',
  `comment_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogcomment`
--

INSERT INTO `blogcomment` (`comment_id`, `comment_blog_id`, `comment_name`, `comment_email`, `comment_mobile`, `comment_comment`, `comment_status`, `comment_timestamp`) VALUES
(1, 1, 'rajesh', 'raj@gmail.com', 1234567891, 'best post best website', 1, '2021-01-11 06:15:57'),
(2, 2, 'suresh', 'sur@gmail.com', 1234567891, 'The actor, director and producer, son to well-known stunt choreographer of Bollywood, rried to one of the most vivacious, bubbly, live-wire actress, is none other than our dashing Ajay Devgan, originally named Vishal Devgan !', 1, '2021-01-11 06:15:57'),
(3, 3, 'tare', 'rare@gmail.com', 1234567891, 'The actor, director and producer, son to well-known stunt choreographer of Bollywood, rried to one of the most vivacious, bubbly, live-wire actress, is none other than our dashing Ajay Devgan, originally named Vishal Devgan !', 1, '2021-01-11 06:17:01'),
(4, 4, 'tanvis', 'tan@gmail.com', 1234567891, 'The actor, director and producer, son to well-known stunt choreographer of Bollywood, rried to one of the most vivacious, bubbly, live-wire actress, is none other than our dashing Ajay Devgan, originally named Vishal Devgan !', 1, '2021-01-11 06:17:01'),
(5, 2, 'test', 'tet@gmail.com', 1234567891, ' working', 1, '2021-01-11 06:54:09'),
(6, 1, 'ddfs', 'dsfsdf@gmail.com', 1234567891, 'dfsdf', 1, '2021-01-11 07:28:00'),
(7, 3, '3 blog id name', '3dsfsdf@gmail.com', 1234567891, '3 blog id name', 1, '2021-01-11 07:30:04'),
(8, 4, 'hhth', 'dsfsdf@gmail.com', 1234567891, 'best', 1, '2021-01-14 13:08:31'),
(9, 3, 'safs sdf', 'testing123@gmail.com', 33232, 'tdjd', 1, '2021-01-21 12:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `category_astrologer`
--

CREATE TABLE `category_astrologer` (
  `cat_astr_id` int(11) NOT NULL,
  `cat_astr_title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_astrologer`
--

INSERT INTO `category_astrologer` (`cat_astr_id`, `cat_astr_title`, `timestamp`) VALUES
(5, 'VEDIC', '2021-01-02 05:38:18'),
(1, 'TAROT', '2021-01-01 07:06:18'),
(2, 'VASTU', '2021-01-01 10:21:18'),
(6, 'COUNSELLOR', '2021-01-09 10:58:39'),
(7, 'GEMOLOGY', '2021-01-09 10:58:48'),
(8, 'PALMIRIST', '2021-01-09 10:59:06'),
(9, 'NADI', '2021-01-16 05:50:26'),
(10, 'HAND READING', '2021-01-18 13:17:18'),
(11, 'FACE READING', '2021-01-18 13:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `cat_pro_id` int(11) NOT NULL,
  `cat_pro_title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`cat_pro_id`, `cat_pro_title`, `timestamp`) VALUES
(1, 'GEMSTONE', '2021-01-01 07:00:24'),
(2, 'YANTRA', '2021-01-01 07:00:24'),
(4, 'PENDAL', '2021-01-01 08:51:34'),
(5, 'Book', '2021-01-16 05:37:42'),
(6, 'WORKSHOP DVD', '2021-01-16 05:38:18'),
(7, 'PUJA ACCESSORIES', '2021-01-16 05:39:15'),
(8, 'RELIGION SPIRITUAL GEMSTONE', '2021-01-16 05:39:53'),
(9, 'FENG SHUI PRODUCT', '2021-01-16 05:40:12'),
(10, 'LUCKY STONE', '2021-01-16 05:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `comment_rating_astrologer`
--

CREATE TABLE `comment_rating_astrologer` (
  `cr_id` int(11) NOT NULL,
  `cr_user_id` int(11) NOT NULL,
  `cr_astro_id` int(11) NOT NULL,
  `cr_comment` longtext NOT NULL,
  `cr_rating` varchar(255) NOT NULL,
  `cr_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=notapproved,1=approved',
  `cr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_rating_astrologer`
--

INSERT INTO `comment_rating_astrologer` (`cr_id`, `cr_user_id`, `cr_astro_id`, `cr_comment`, `cr_rating`, `cr_status`, `cr_timestamp`) VALUES
(1, 7, 34, 'dsfsd', '2', 0, '2021-02-09 06:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `contentmanagement`
--

CREATE TABLE `contentmanagement` (
  `cm_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contentmanagement`
--

INSERT INTO `contentmanagement` (`cm_id`, `title`, `description`, `timestamp`) VALUES
(1, 'About AstroVed Vakta\r\n', '<p>Astroved Vakta is an Indian organization established by Mr. Onkar Prasad and Mr. Mayank Sharma, our mission is to enrich the lives of every person we come in contact with by providing excellence in all types of astrology and remedial rituals. No wonder the entire team of staff members and astrologers serve as a large, extended family in the Astroved Vakta. The organization&rsquo;s fundamental philosophy rests firmly on the belief that no true success can be accomplished unless there is complete and concerted involvement of the entire staff in all its endeavors.</p>\r\n\r\n<p>Remedial services include fire prayers (hawan), temple and Poojas service, products made from energy (Products composed of five elements, Pancha Loka, energized in power rituals), and customized packages and programs that let&#39;s focus on improving key areas of life such as health, finance, yog shanti, relationships, education, Dosha&rsquo;s etc., to fulfill your needs and bring more positivity in your life.</p>\r\n\r\n<p>We strive to serve customers with the best service level, gaining high satisfaction and experience. Come and join us for a healthy, happy and hustle free life.</p>\r\n', '2020-12-31 12:41:01'),
(2, 'Terms & Condition', '<h2>Lorem ipsum dolor sit amet</h2>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Ad consequuntur, hic aspernatur? Iste accusantium perferendis eligendi est ad sunt dolore enim quas possimus quos ratione voluptate eius corrupti ab nulla ducimus dolor, nesciunt consectetur, molestiae rerum laboriosam nobis maxime beatae necessitatibus earum? Ratione maiores tenetur cupiditate accusamus at harum? Provident.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sunt laudantium distinctio, itaque aliquam vero. Consequuntur possimus nulla neque itaque reprehenderit?</p>\r\n\r\n<h2>Lorem ipsum dolor sit amet</h2>\r\n\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, quo.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius distinctio nihil quia cumque fugit odio dignissimos asperiores, deserunt expedita. Ipsa, quam! Est accusantium ipsam quisquam velit enim ex mollitia adipisci. Quam perspiciatis excepturi accusantium mollitia saepe amet id at doloremque molestias iste, earum autem porro molestiae unde ipsa ullam nihil?</p>\r\n\r\n<h2>Lorem ipsum dolor sit amet</h2>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam minus libero blanditiis tempora dignissimos eius explicabo voluptate itaque deserunt perferendis amet quisquam accusamus, hic quod sint beatae iure consectetur officiis?</p>\r\n', '2020-12-31 12:59:15'),
(3, 'Privacy And policy', '<h2>Lorem ipsum dolor sit amet consectetur adipisicing</h2>\r\n\r\n<p><em><strong>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat quam modi aliquam velit iusto atque nihil libero voluptatibus tempora itaque. Totam eum expedita illo ea repellendus officiis:</strong></em></p>\r\n\r\n<ol>\r\n	<li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit eligendi facere quasi in, eveniet voluptates odio reiciendis vel repellat perspiciatis.</li>\r\n	<li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum assumenda beatae quos mollitia delectus, rem, labore. Eveniet corporis dolore perferendis magni molestiae numquam exercitationem? Ipsam.</li>\r\n	<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia odit commodi assumenda dolore ab. Magnam adipisci eveniet quasi, possimus.</li>\r\n	<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure obcaecati eos accusamus veniam, esse, placeat expedita officia numquam distinctio, suscipit saepe cupiditate.</li>\r\n</ol>\r\n\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Totam velit perferendis est officia tempora dignissimos earum commodi, sed voluptate, quibusdam hic nihil repellendus repellat maxime esse consectetur. Asperiores repellat magni placeat sapiente, tenetur accusamus voluptas aperiam ullam deleniti architecto optio pariatur sint necessitatibus maxime cum sequi nulla quae nostrum provident.</p>\r\n', '2021-01-13 06:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `coupan`
--

CREATE TABLE `coupan` (
  `cpn_id` int(11) NOT NULL,
  `cpn_name` varchar(255) NOT NULL,
  `cpn_code` varchar(255) NOT NULL,
  `cpn_amount` varchar(255) NOT NULL,
  `cpn_startdate` date NOT NULL,
  `cpn_enddate` date NOT NULL,
  `cpn_disc_min_amound` varchar(255) NOT NULL,
  `cpn_description` longtext NOT NULL,
  `cpn_status` int(11) NOT NULL DEFAULT '1' COMMENT '0=expired,1=running,2=future',
  `cpn_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupan`
--

INSERT INTO `coupan` (`cpn_id`, `cpn_name`, `cpn_code`, `cpn_amount`, `cpn_startdate`, `cpn_enddate`, `cpn_disc_min_amound`, `cpn_description`, `cpn_status`, `cpn_timestamp`) VALUES
(2, 'sunday', 'sunday', '101', '2021-01-02', '2021-02-18', '500', 'FSDFSDF', 0, '2021-02-01 12:53:38'),
(3, 'Feby101', 'febsunday101', '101', '2021-03-01', '2021-04-23', '500', 'dfsdf', 0, '2021-02-01 13:26:51'),
(4, 'CRAZY', 'MAR20', '20', '2021-02-17', '2021-02-24', '501', 'MARCH', 0, '2021-02-02 08:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enq_id` int(11) NOT NULL,
  `enq_name` varchar(255) NOT NULL,
  `enq_email` varchar(255) NOT NULL,
  `enq_mobilenumber` varchar(15) NOT NULL,
  `enq_relatedto` varchar(255) NOT NULL,
  `enq_message` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=not read ,1 = read',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enq_id`, `enq_name`, `enq_email`, `enq_mobilenumber`, `enq_relatedto`, `enq_message`, `status`, `timestamp`) VALUES
(29, 'fsdfs', 'sdfsdf@gmail.com', '1234567891', 'marrige related query', 'dfdsfsdf', 0, '2021-01-08 11:42:46'),
(34, 'fsdfs', 'sdfsdf@gmail.com', '1234567891', 'career related query', 'dfsdfsdf', 0, '2021-01-09 09:13:38'),
(30, 'mukesh', 'admin@gmail.com', '09696969695', 'Free Kundli', 'Free Kundli', 0, '2021-01-08 12:03:54'),
(31, 'mukesh', 'admin@gmail.com', '09696969695', 'Free Kundli', 'Free Kundli', 0, '2021-01-08 12:04:44'),
(32, 'mukesh', 'admin@gmail.com', '09696969695', 'Free Kundli', 'Free Kundli', 0, '2021-01-08 12:06:37'),
(33, 'mukesh', 'admin@gmail.com', '09696969695', 'Free Kundli', 'Free Kundli', 0, '2021-01-08 12:07:32'),
(35, 'zdsfsd', 'ssds@dfgdfggsadsd.f', '2343242343', 'Choose your query', 'sdadsa', 0, '2021-01-21 12:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_freekundali`
--

CREATE TABLE `enquiry_freekundali` (
  `fkun_id` int(11) NOT NULL,
  `fkun_name` varchar(255) NOT NULL,
  `fkun_mobile` varchar(255) NOT NULL,
  `fkun_gender` varchar(255) NOT NULL,
  `fkun_dob` date NOT NULL,
  `fkun_birth_time` time NOT NULL,
  `fkun_birth_place` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_freekundali`
--

INSERT INTO `enquiry_freekundali` (`fkun_id`, `fkun_name`, `fkun_mobile`, `fkun_gender`, `fkun_dob`, `fkun_birth_time`, `fkun_birth_place`, `status`, `timestamp`) VALUES
(3, 'sunitaaaaaa', '1234567891', 'female', '2021-01-27', '05:37:00', 'indore', '1', '2021-01-09 09:03:32'),
(4, 'rajesh pm', '1234567891', 'female', '2021-01-19', '12:38:00', 'indore', '0', '2021-01-09 09:05:03'),
(6, 'rajesh', '1234567891', 'female', '2021-01-21', '02:50:00', 'indore', '0', '2021-01-09 09:16:58'),
(7, 'uyrty', '7667658966', 'male', '2013-06-12', '05:57:00', 'rttr', '0', '2021-01-21 12:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`, `timestamp`) VALUES
(1, 'Why you should make an FAQ page', 'An FAQ page is a time-saving customer service tactic that provides the most commonly asked questions and answers for current or potential customers. ', '2021-01-21 13:25:43'),
(2, 'What is a FAQ page?', 'FAQ stands for “Frequently Asked Questions.” An FAQ is a list of commonly asked questions and answers on a website about topics such as hours, shipping and handling, product information, and return policies.', '2021-01-21 13:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `festival`
--

CREATE TABLE `festival` (
  `festival_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `festival`
--

INSERT INTO `festival` (`festival_id`, `title`, `description`, `date`, `timestamp`) VALUES
(2, 'WIN A PLAYSTATION 5', ' sdds', '2020-12-23', '2020-12-30 13:11:04'),
(4, 'fdsf', ' sdfsdf', '2021-01-27', '2020-12-31 04:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_cat_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_cat_id`, `image`, `timestamp`) VALUES
(19, 1, '10.jpg', '2020-12-25 05:28:43'),
(18, 1, '7.jpg', '2020-12-25 05:28:30'),
(16, 2, 'banner-img.png', '2020-12-24 13:36:07'),
(17, 1, 'preview.jpg', '2020-12-24 13:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `getintouch`
--

CREATE TABLE `getintouch` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `extramatter` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `getintouch`
--

INSERT INTO `getintouch` (`id`, `address`, `contactno`, `email`, `extramatter`) VALUES
(1, 'TEST next to airport', '8719806419', 'testinfo@nirbhaysinghpatelcollege.com', '<p><strong>Dynamic extra matter for get in touch</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `horoscopeyearly`
--

CREATE TABLE `horoscopeyearly` (
  `horoscope_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `hindi_name` varchar(255) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 NOT NULL,
  `lucky_colour` varchar(255) NOT NULL,
  `lucky_number` varchar(255) NOT NULL,
  `lucky_flower` varchar(255) NOT NULL,
  `yearofbirth` varchar(255) NOT NULL,
  `daterange` varchar(255) NOT NULL,
  `profession` longtext NOT NULL,
  `luck` longtext NOT NULL,
  `emotion` longtext NOT NULL,
  `health` longtext NOT NULL,
  `love` longtext NOT NULL,
  `travel` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horoscopeyearly`
--

INSERT INTO `horoscopeyearly` (`horoscope_id`, `name`, `english_name`, `hindi_name`, `description`, `lucky_colour`, `lucky_number`, `lucky_flower`, `yearofbirth`, `daterange`, `profession`, `luck`, `emotion`, `health`, `love`, `travel`, `image`, `main_image`, `timestamp`) VALUES
(1, '2021', 'Aries', 'Mesha Raashi', '<p>इस सप्ताि कागजो पर हिना सोचेसमझेिस्ताक्षर न करेंिरना धोखा िो सकता िैं. थोडी कहिनाई के िाद सफलता हमलेगी . व्यापार अच्छा चलेगा अचानक धन लाभ की संभािना रिेगी. रोमांस तथा नौकरी मेंलाभ की संभािना रिेगी .</p>\r\n', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', '01/Feb/2021-07/Feb/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.\r\n\r\nYou are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'aaries.png', '2aries.png', '2020-12-31 10:26:48'),
(2, '2021', 'Taurus', 'Vrishabha Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'Jan/2021 - Dec/2021', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.\r\n\r\nYou are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'ttaurus.png', '2Taurus.jpg', '2020-12-31 10:41:43'),
(3, '2021', 'Gemini', 'Mithuna Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'test2 white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.\r\n\r\nYou are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'ggemini.png', '2Gemini.jpg', '2020-12-31 10:44:23'),
(4, '2021', 'Cancer', 'Kark Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.  You are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'ccancer.png', '2Cancer.jpg', '2020-12-31 10:44:36'),
(5, '2021', 'Leo', 'Simha Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.  You are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'lleo.png', '2leo.jpg', '2020-12-31 10:44:53'),
(6, '2021', 'Virgo', 'Kanya Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.  You are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'vvirgo.png', '2virgo.jpg', '2020-12-31 10:45:01'),
(7, '2021', 'Libra', 'Tula Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.  You are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'llibra.png', '2Libra.jpg', '2020-12-31 10:45:14'),
(8, '2021', 'Scorpio', 'Vrischika Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.  You are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'sscorpio.png', '2Scorpio.jpg', '2020-12-31 10:45:23'),
(9, '2021', 'Sagittarius', 'Dhanura Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.  You are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'ssagittarius.png', '2sagittarius.jpg', '2020-12-31 10:45:34'),
(10, '2021', 'Capricorn', 'Makara Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.  You are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'ccapricorn.png', '2Capricorn.jpg', '2020-12-31 10:45:41'),
(11, '2021', 'Aquarius', 'Kumba Raashi', '', '', '', '', '', '', '', '', '', '', '', '', 'aaquarius.png', '2Aquarius.jpg', '2020-12-31 10:48:31'),
(12, '2021', 'Pisces', 'Meena Raashi', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'white, yellow, green', '1, 4', 'tulip, morning glory, peach blossom', '1913, 1925, 1937, 1949, 1961, 1973, 1985, 1997, 2009, 2021', 'Jan/2021 - Dec/2021', 'At the beginning of the year, the Sun, who is the king of the Zodiac, seems to be ruling your sign. The u', 'This year will be positive for your professional life. Your career could touch a new height. You should be happily ready to accept the changes that come i', 'pe. The year 2021 shows no major financial hurdles. You will be able to pay back your debts. Clearance of the old dues will also happen leaving you relieved. Expect a good hike in salary this year. It will bring the desired profits and this will lift your spirits. The time will also be good for making investments in the second half and expecting better results than ever.  You are generally on a stable financial platform and will ', 'says your Scorpio 2021 health horoscope. Body aches will no longer trouble you. A good diet and some light exercise are really starting to pay off. Those who have been suffering from physical ailments will see that their symptoms subside and they are feeling well again.', 'r 2021 can fulfill your desire to go to foreign land. It can be for further studies, work or small trip. You may face arguments or cheating from close friend. So be careful in this regard. You Key Mantra is to avoid trusting people blindly. You will feel more than happy.', 'he year is excellent for your health. You will be able to enjoy and perform good work. You will experience a positive change in your health this year, says your Scorpio 2021 health hor', 'ppisces.png', '2pisces.jpg', '2020-12-31 10:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `language_astrologer`
--

CREATE TABLE `language_astrologer` (
  `la_id` int(11) NOT NULL,
  `la_title` varchar(255) NOT NULL,
  `la_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language_astrologer`
--

INSERT INTO `language_astrologer` (`la_id`, `la_title`, `la_timestamp`) VALUES
(1, 'English', '2021-01-07 07:20:10'),
(2, 'Hindi', '2021-01-07 07:20:10'),
(3, 'Marathii', '2021-01-07 07:20:31'),
(4, 'Tamil', '2021-01-07 08:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `matchmaking`
--

CREATE TABLE `matchmaking` (
  `mm_id` int(11) NOT NULL,
  `mm_name_first` varchar(255) NOT NULL,
  `mm_gender_first` varchar(255) NOT NULL,
  `mm_countrycode_first` varchar(255) NOT NULL,
  `mm_mobile_first` varchar(255) NOT NULL,
  `mm_dob_first` date NOT NULL,
  `mm_maritalstatus_first` varchar(255) NOT NULL,
  `mm_birthhour_first` varchar(255) NOT NULL,
  `mm_birthmin_first` varchar(255) NOT NULL,
  `mm_email_first` varchar(255) NOT NULL,
  `mm_language_first` varchar(255) NOT NULL,
  `mm_birthplace_first` varchar(255) NOT NULL,
  `mm_name_sec` varchar(255) NOT NULL,
  `mm_gender_sec` varchar(255) NOT NULL,
  `mm_countrycode_sec` varchar(255) NOT NULL,
  `mm_mobile_sec` varchar(255) NOT NULL,
  `mm_dob_sec` date NOT NULL,
  `mm_maritalstatus_sec` varchar(255) NOT NULL,
  `mm_birthhour_sec` varchar(255) NOT NULL,
  `mm_birthmin_sec` varchar(255) NOT NULL,
  `mm_email_sec` varchar(255) NOT NULL,
  `mm_language_sec` varchar(255) NOT NULL,
  `mm_birthplace_sec` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matchmaking`
--

INSERT INTO `matchmaking` (`mm_id`, `mm_name_first`, `mm_gender_first`, `mm_countrycode_first`, `mm_mobile_first`, `mm_dob_first`, `mm_maritalstatus_first`, `mm_birthhour_first`, `mm_birthmin_first`, `mm_email_first`, `mm_language_first`, `mm_birthplace_first`, `mm_name_sec`, `mm_gender_sec`, `mm_countrycode_sec`, `mm_mobile_sec`, `mm_dob_sec`, `mm_maritalstatus_sec`, `mm_birthhour_sec`, `mm_birthmin_sec`, `mm_email_sec`, `mm_language_sec`, `mm_birthplace_sec`, `timestamp`) VALUES
(1, 'fsdf', 'male', '1441', '01234567891', '0000-00-00', 'Never Married', '17', '19', 'viraj@gmail.com', 'english', 'indore', 'dsfsdf', 'male', '376', '01234567891', '0000-00-00', 'Never Married', '16', '17', 'khjsdkf@gmail.com', 'english', 'indore', '2021-01-09 12:36:44'),
(2, 'naman', 'male', '91', '2345678', '1997-06-11', 'Never Married', '09', '13', 'divya94@gmail.com', 'hindi', 'dewas', 'priya', 'female', '91', '345454', '1997-06-21', 'Never Married', '11', '15', 'divya94@mailinator.com', 'hindi', 'indore', '2021-01-21 11:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `mmbanner`
--

CREATE TABLE `mmbanner` (
  `mmb_id` int(11) NOT NULL,
  `mmb_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmbanner`
--

INSERT INTO `mmbanner` (`mmb_id`, `mmb_title`, `image`) VALUES
(2, 's1', 's1.png'),
(3, 's2', 's2.png'),
(4, 's3', 's3.png');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `description`, `image`, `timestamp`) VALUES
(2, 'test', 'sdfds', '11.jpg', '2020-12-31 06:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nfc_id` int(11) NOT NULL,
  `nfc_title` varchar(255) NOT NULL,
  `nfc_detail` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nfc_id`, `nfc_title`, `nfc_detail`, `timestamp`) VALUES
(1, 'Free Astro Camp in indore', 'Free astro camp in indore', '2021-01-09 10:18:03'),
(2, 'Free camp Tarot', 'Free camp Tarot', '2021-01-13 10:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `onlinepuja`
--

CREATE TABLE `onlinepuja` (
  `op_id` int(11) NOT NULL,
  `op_title` varchar(255) NOT NULL,
  `op_description` longtext NOT NULL,
  `op_image` varchar(255) NOT NULL,
  `op_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlinepuja`
--

INSERT INTO `onlinepuja` (`op_id`, `op_title`, `op_description`, `op_image`, `op_timestamp`) VALUES
(1, 'Pitra Dosh Pujan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint aecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint aecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.', 'pitrodosh.jpg', '2021-01-12 05:07:22'),
(2, 'Nagvali Pujan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint aecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint aecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'nagvalipuja.png', '2021-01-12 05:07:39'),
(3, 'kalsarp Yog Nirvan Pujan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint aecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint aecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.', 'kalsapyog.jpg', '2021-01-12 05:07:59'),
(4, '2dfsdf', '2Etc pujaEtc puja Etc puja Etc puja', '2pisces.jpg', '2021-01-12 07:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `discount_amount` varchar(255) NOT NULL DEFAULT '0',
  `product_id` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `pay_by` varchar(255) NOT NULL,
  `payfor` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `unique_id`, `user_id`, `total_amt`, `discount_amount`, `product_id`, `txn_id`, `payment_status`, `pay_by`, `payfor`, `currency_code`, `timestamp`) VALUES
(142, '8601553b667e8f', 7, 900, '', '9', '', 'Success', 'Wallet', '', '', '2021-01-30 12:40:22'),
(143, '86015591e80fec', 7, 2700, '', '21,10,11', '', 'Success', 'Wallet', '', '', '2021-01-30 13:03:26'),
(144, '860178dc135b88', 7, 500, '', '', '', 'Success', 'Wallet', 'REPORT GENERATION', '', '2021-02-01 05:12:33'),
(145, '860193b9b49c75', 7, 900, '', '21', '', 'Success', 'Wallet', '', '', '2021-02-02 11:46:35'),
(146, '8601bb54341fce', 7, 1800, '', '13,22', '', '', '', '', '', '2021-02-04 08:50:18'),
(147, '8601bb565653fc', 7, 1800, '', '13,22', '', 'Success', 'Wallet', '', '', '2021-02-04 08:50:45'),
(148, '8601bb577b1aa6', 7, 1800, '', '24', '', '', '', '', '', '2021-02-04 08:51:20'),
(149, '8601bb5dd91cb3', 7, 2700, '', '24', '', 'Success', 'Wallet', '', '', '2021-02-04 08:52:45'),
(150, '8601bb628b15ab', 7, 1800, '', '24', '', 'Success', 'Wallet', '', '', '2021-02-04 08:54:00'),
(151, '8601bb6a7bf2f6', 7, 2700, '', '24', '', 'Success', 'Wallet', '', '', '2021-02-04 08:56:07'),
(152, '8601bb72bb2145', 7, 1800, '', '24', '', 'Success', 'Wallet', '', '', '2021-02-04 08:58:19'),
(153, '8601bb75ec19ea', 7, 900, '', '24', '', 'Success', 'Wallet', '', '', '2021-02-04 08:59:10'),
(154, '8601bb85a86b6f', 7, 1699, '', '27', '', 'Success', 'Wallet', '', '', '2021-02-04 09:03:22'),
(155, '8601bbad998945', 7, 799, '', '24', '', 'Success', 'Wallet', '', '', '2021-02-04 09:14:01'),
(156, '8601bbb54aa134', 7, 900, '', '24', '', 'Success', 'Wallet', '', '', '2021-02-04 09:16:04'),
(157, '8601bbe587bc1c', 7, 1800, '', '32', '3PK652272K716723J', 'Success', 'PayPal', '', 'USD', '2021-02-04 09:29:03'),
(158, '8601bc3fb418a0', 7, 2599, ' 101', '32,24', '', 'Success', 'Wallet', '', '', '2021-02-04 09:52:59'),
(159, '86020cb8ecb241', 17, 1000, '0', '', '', 'Success', 'Wallet', 'REPORT GENERATION', '', '2021-02-08 05:26:38'),
(160, '8602108f0a95c6', 17, 100, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 09:48:32'),
(161, '86021092e87ba6', 17, 100, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 09:49:34'),
(162, '860210d44ca969', 17, 340, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 10:07:00'),
(163, '860210df926b70', 17, 340, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 10:10:01'),
(164, '860210eee7137b', 17, 55, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 10:14:06'),
(165, '86021123b8aaba', 17, 10, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 10:28:11'),
(166, '860211534452f3', 17, 200, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 10:40:52'),
(167, '860211570ca579', 17, 150, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 10:41:52'),
(168, '860212a3ea1700', 17, 200, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 12:10:38'),
(169, '86021335fe9215', 7, 150, '0', '', '', 'Success', 'Wallet', 'Calling Astrologer', '', '2021-02-08 12:49:35'),
(170, '860221ab9de6e4', 7, 350, '0', '', '', 'Success', 'Wallet', 'REPORT GENERATION', '', '2021-02-09 05:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission_id` int(11) NOT NULL,
  `admins_id` int(11) NOT NULL DEFAULT '0',
  `per_description` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_id`, `admins_id`, `per_description`, `timestamp`) VALUES
(1, 1, '', '2021-01-05 09:41:36'),
(2, 2, '', '2021-01-05 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `predectionmatter`
--

CREATE TABLE `predectionmatter` (
  `pm_id` int(11) NOT NULL,
  `pm_title` varchar(255) NOT NULL,
  `pm_description` longtext NOT NULL,
  `pm_image` varchar(255) NOT NULL,
  `pm_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predectionmatter`
--

INSERT INTO `predectionmatter` (`pm_id`, `pm_title`, `pm_description`, `pm_image`, `pm_timestamp`) VALUES
(1, 'Future Prediction2', 'Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'match1.png', '2021-01-14 05:46:33'),
(2, 'Health Prediction ', 'Health Prediction  Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'health.png', '2021-01-14 05:47:30'),
(3, 'Daily Horoscope', 'Daily Horoscope   Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'dailyhoroscope.png', '2021-01-14 05:47:30'),
(4, 'Stone Prediction', 'Stone Prediction Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'stone.png', '2021-01-14 05:48:57'),
(5, 'Career Prediction', 'Career Prediction Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'career.png', '2021-01-14 05:48:57'),
(6, 'Havan Pooja', 'Havan Pooja Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'havan.png', '2021-01-14 05:50:12'),
(7, 'Book Yantra', 'Book Yantra Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'yantra.png', '2021-01-14 05:50:12'),
(8, 'Pitar dosha', 'Pitar dosha Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.', 'pt.png', '2021-01-14 05:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `prediction`
--

CREATE TABLE `prediction` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_gender` varchar(255) NOT NULL,
  `p_country` varchar(255) NOT NULL,
  `p_mobile` varchar(255) NOT NULL,
  `p_dob` varchar(255) NOT NULL,
  `p_maritalstatus` varchar(255) NOT NULL,
  `p_birthhour` varchar(255) NOT NULL,
  `p_mirthminite` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_language` varchar(255) NOT NULL,
  `p_placeofbirth` varchar(255) NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=no ,1 = read',
  `p_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prediction`
--

INSERT INTO `prediction` (`p_id`, `p_name`, `p_gender`, `p_country`, `p_mobile`, `p_dob`, `p_maritalstatus`, `p_birthhour`, `p_mirthminite`, `p_email`, `p_language`, `p_placeofbirth`, `p_status`, `p_timestamp`) VALUES
(1, 'rajesh', 'male', '376', '01234567891', '02/12/1890', 'Never Married', '17', '16', 'dsfsf@gmail.com', 'hindi', 'INDORE', 1, '2021-01-12 04:50:55'),
(2, 'Divya', 'female', '91', '9827625374', '1994-03-18', 'Never Married', '05', '45', 'divya94@mailinator.com', 'hindi', '', 0, '2021-01-21 11:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pr_id` int(11) NOT NULL,
  `pr_title` longtext NOT NULL,
  `pr_description` longtext NOT NULL,
  `pr_image` varchar(255) NOT NULL,
  `pr_category` int(255) NOT NULL,
  `pr_originalprice` decimal(10,0) NOT NULL,
  `pr_discount` decimal(10,0) NOT NULL,
  `pr_finalprice` decimal(10,0) NOT NULL,
  `pr_rating` varchar(255) NOT NULL,
  `pr_modifieddate` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pr_id`, `pr_title`, `pr_description`, `pr_image`, `pr_category`, `pr_originalprice`, `pr_discount`, `pr_finalprice`, `pr_rating`, `pr_modifieddate`, `timestamp`) VALUES
(27, 'YING YANG POWER PLATE - WEST', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBINATION OF YIN YANG &nbsp;POWER PLATE &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 108 &nbsp;PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nTHE ILL - EFFECTS OF SOUTH &nbsp;DISHA CURES AUTOMATICALLY<br />\r\nTHIS IS ALSO USED TO PROTECT FROM NEGATIVE ENERGY AND ENERGY BALANCING FOR PROSPERITY<br />\r\n<strong>WHERE TO USE : &nbsp;SOUTH DIRECTION</strong></p>\r\n', 'YINGYANGPOWERPLATE(WEST).png', 2, '1000', '10', '900', '', '', '2021-01-29 17:01:58'),
(28, 'YING YANG POWER PLATE - EAST', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBINATION OF YIN YANG &nbsp;POWER PLATE &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 108 &nbsp;PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nTHE ILL - EFFECTS OF EAST &nbsp;DISHA CURES AUTOMATICALLY<br />\r\nTHIS IS ALSO USED TO PROTECT FROM NEGATIVE ENERGY AND ENERGY BALANCING FOR PROSPERITY<br />\r\n<strong>WHERE TO USE : &nbsp;EAST DIRECTION</strong></p>\r\n', 'YINGYANGPOWERPLATE(EAST).png', 2, '1000', '10', '900', '', '', '2021-01-29 17:04:10'),
(24, 'SURYA NARAYAN', '<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF SURYA NARAYAN YANTRA AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOAL POWER OF 432 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nUNIQUE PRODUCTS WHERE DIRECT SUNLIGHT IS ABSENT<br />\r\nTHE PERSONS LIVING WHERE SURYA IS PLACED ARE ABLE TO WORK MORE EFFICIENTLY IN A BETTER FRIENDLY ATMOSPHERE<br />\r\nPROVIDES PEACE AND BETTER ENVIRONMENT<br />\r\n<strong>WHERE TO USE : &nbsp;AT EAST DIRECTION&nbsp;</strong></p>\r\n', 'SURYANARAYAN.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:59:11'),
(25, 'YING YANG POWER PLATE - WEST', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBINATION OF YIN YANG &nbsp;POWER PLATE &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 108 &nbsp;PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nTHE ILL - EFFECTS OF WEST &nbsp;DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE AIR ELEMENTOF THE NORTH WEST ALSO TO CURE ILL EFFECT OF WEST<br />\r\nTHIS IS ALSO USED TO PROTECT FROM NEGATIVE ENERGY AND ENERGY BALANCING FOR PROSPERITY<br />\r\n<strong>WHERE TO USE : &nbsp;WEST DIRECTION</strong></p>\r\n', 'YINGYANGPOWERPLATE(WEST).png', 2, '1000', '10', '900', '', '', '2021-01-29 16:59:54'),
(26, 'ROUND STAR HELIX', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF ROUND STAR FOR NORTH EAST HELIX &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 432 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nIT BOOSTS ENERGY / Remove the Fear and Anxiety<br />\r\nBALANCE THE WATER ELEMENT OF THE NORTH-EAST &amp; ALSO &nbsp;TO CURE ILL EFFECT OF NORTH EAST<br />\r\nTHE PYRAMIDS INSIDE PROTECTS YOUR FAMILY FROM NEGATIVE ENERGY<br />\r\n<strong>WHERE TO USE : CUT / EXTENTION / ELEMENT PRESENT OTHER THAN WATER ( NORTH-EAST DIRACTION )</strong></p>\r\n</blockquote>\r\n', 'ROUNDSTARHELIX.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:01:54'),
(22, 'NAVGRAH  POWER  PLATE', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF NAV GRAH &nbsp;POWER &nbsp;PLATE &nbsp;AND &nbsp;VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT &nbsp;HAS &nbsp;COMBINED &nbsp;STRENGTH &nbsp;OF &nbsp;81 &nbsp;PYRAMIDS &nbsp;&amp; &nbsp;9 &nbsp;GRAH &nbsp;RATNA &nbsp;STONE<br />\r\nATTRACT GOOD FORTUNE AND FINANCIAL OPPORTUNITIES<br />\r\nENHANCES OVER ALL POSITIVE ENERGY<br />\r\nDEVELOP MENTAL ABILITIES / FULFIL DESIRES / ATTRACT MONEY<br />\r\nTHIS WILL ENHANCE OVERALL EFFECT OF NINE PLANETS AND REMOVE &nbsp;ALL YOUR VASTU DOSH<br />\r\n<strong>WHERE TO USE : &nbsp;TEMPLE / NEAR &nbsp;BY &nbsp;YOUR &nbsp;SITTING &nbsp;PLACE&nbsp;</strong><br />\r\n&nbsp;</p>\r\n', 'NAVGRAHPOWERPLATE.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:54:35'),
(23, 'YING YANG POWER PLATE - NORTH', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBINATION OF YIN YANG &nbsp;POWER PLATE &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 108 &nbsp;PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nTHE ILL - EFFECTS OF NORTH &nbsp;DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE &nbsp;WATER &nbsp;ELEMENTOF THE NORTH &nbsp;AND ALSO TO CURE ILL EFFECT OF NORTH<br />\r\nTHIS IS ALSO USED TO REMOVE TENTIONS AND STRESS FROM FAMILY<br />\r\nTHIS IS ALSO USED TO PROTECT FROM NEGATIVE ENERGY AND ENERGY BALANCING FOR PROSPERITY<br />\r\n<strong>WHERE TO USE : &nbsp;NORTH DIRECTION</strong></p>\r\n', 'YINGYANGPOWERPLATE(NORTH).png', 2, '1000', '10', '900', '', '', '2021-01-29 16:57:42'),
(21, 'BASIC MASTER BLASTER', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nPOWERFUL &nbsp;,PROVEN, INSTANT &amp; PEAK PERFORMANCE FOR ALL TYPES OF PREMISES AND PROBLEMS ( TOTAL POWER OF 432 PYRAMIDS )<br />\r\nIT CAN BE INSTALLED UNDERGROUND, OVER HEAD, ON ANY SURFACE WITH EASE, IN ANY DIRECTION<br />\r\nIT HAS COMBINED STRENGTH OF 432 PYRAMIDS AND CRSYTAL BEADS FITTED INSIDE&nbsp;<br />\r\nEXCELLENT FOR VASTU, MEDITATION, REIKI, HOLISTIC REMEDIES, PYRAMID THERAPY<br />\r\nA UNIQUE HOUSEHOLD PYRAMID FOR TOTAL SOLUTION OF ALL VAASTU DEFECTS / NEGATIVE ENERGY&nbsp;<br />\r\n<strong>WHERE TO USE : AT ANY VASTU DOSHA ZONES</strong></p>\r\n</blockquote>\r\n', 'BASICMASTERBLASTER.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:54:22'),
(20, 'SWASTIKA  POWER  PLATE', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF SWASTIKA &nbsp;POWER &nbsp;PLATE &nbsp;AND &nbsp;VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 108 &nbsp;PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nIT IS AN AUSPICIOUS SYMBOL FOR FORTUNE AND WELLNESS<br />\r\nTHE PYRAMIDS INSIDE PROTECTS YOUR FAMILY FROM NEGATIVE ENERGY<br />\r\nIT ENHANCES POSITIVE ENERGY<br />\r\nA UNIQUE &nbsp;VASTU TOOL FOR REMOVE OVERALL VASTU DOSHA<br />\r\n<strong>WHERE TO USE : ENTRANCE &nbsp;OF &nbsp;HOME / OFFICE / SHOP / BUILDING / TEMPLE OR AT ANY VASTU &nbsp;DOSHA ZONES</strong></p>\r\n', 'SWASTIKAPOWERPLATE.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:50:08'),
(9, 'Ganpati', '<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nDUAL POWER OF LORD GANAPATI AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET &nbsp;( TOTAL POWER OF 108 PYRAMIDS WITH CRYSTAL BEADS FITTED INSIDE )<br />\r\nTHIS DUAL POWER MAINTAINS PEACE AND PROSPERITY STRONGLY IN OUR LIVES<br />\r\nIT &nbsp;ENHANCES POSITIVE ENERGY / VIBRATIONS&nbsp;<br />\r\nATTRACTS GOOD FORTUNE AND FINANCIAL OPPORTUNITIES</p>\r\n\r\n<p><strong>WHERE TO USE : POOJA ROOMS, AT MAIN DOOR&nbsp;</strong></p>\r\n', 'ganpati.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:25:24'),
(10, 'All In One', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA.</strong><br />\r\nUNIQUE COMBINATION OF ALL IN ONE AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 108 PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nSPECIALLY &nbsp;DESIGNED &nbsp;FOR &nbsp;TOILETS &nbsp;AT WRONG &nbsp;PLACE<br />\r\nPROTECTS &nbsp;FROM RADIATIONS AND &nbsp; OTHER NEGATIVE ENERGIES<br />\r\n<strong>WHERE TO USE : &nbsp;TOILETS / AT ANY VASTU DOSHA ZONES</strong></p>\r\n', 'AllInOne.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:28:10'),
(11, 'SWASTIK', '<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF SWASTIKA AND &nbsp;VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMIDS( TOTAL 108 PYRAMIDS WITH CRYSTAL BEADS FITTED INSIDE )<br />\r\nSWASTIK &nbsp;IS AN AUSPICIOUS SYMBOL FOR FORTUNE AND WELLNESS<br />\r\nTHE PYRAMIDS INSIDE PROTECTS YOUR FAMILY FROM NEGATIVE ENERGY<br />\r\nIT ENHANCES POSITIVE ENERGY<br />\r\n<strong>WHERE TO USE : ENTRANCE OF HOME / OFFICE / SHOP / BUILDINGS&nbsp;</strong></p>\r\n', 'swastik.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:32:40'),
(12, 'OM', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF OM AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF OM AND 108 PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nDEVELOP MENTAL ABILITIES / FULFILL DESIRES / ATTRACT MONEY<br />\r\nPROTECTS FROM ALL NEGATIVE ENERGIES<br />\r\nATTRACTS GOOD FORTUNE AND FINANCIAL OPPORTUNITIES<br />\r\n<strong>WHERE TO USE : TEMPLE / POOJA ROOM / NEAR YOUR MAIN DOOR OR AT ANY VASTU DOSHA ZONES</strong></p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', 'Om.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:34:08'),
(13, 'KALASH', '<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF AUSPICIOUS KALASH AND &nbsp;VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL 108 PYRAMIDS WITH CRYSTAL BEADS FITTED INSIDE )<br />\r\nIT ENHANCES POSITIVE ENERGY<br />\r\nIT ATTRACTS MONEY AND PROSPERITY<br />\r\nIT IS PLACED NEAR THE ENTRANCE OF THE MAIN DOOR AS A WELCOME SIGN<br />\r\n<strong>WHERE TO USE : ENTRANCE OF HOME / OFFICE</strong></p>\r\n', 'kalash.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:39:10'),
(14, 'GOLDEN POWER PLATE', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nIT HAS COMBINED STRENGTH OF &nbsp;432 GOLDEN &nbsp;PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nULTIMATE PRODUCT FOR OVERALL VASTU DOSHA NIVARAN&nbsp;<br />\r\nBEST ITEM FOR REIKI , HEALING AND MEDITATION.<br />\r\nATTRACT GOOD FORTUNE AND FINANCIAL OPPORTUNITIES<br />\r\nPYRAMIDS EFFECTIVELY NEUTRALIZES GEOPATHIC STRESS<br />\r\nDEVELOP MENTAL ABILITIES / FULFIL DESIRES / ATTRACT MONEY<br />\r\nPURIFY WATER / GIVE LIFE TO NATURE &nbsp;/ &nbsp;IMPROVES HEALTH<br />\r\n<strong>WHERE TO USE : &nbsp;NORTH / NORTH EAST / EAST OR AT ANY VASTU DOSHA ZONES</strong></p>\r\n', 'GOLDENPOWERPLATE.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:39:36'),
(15, 'LAXMI CHARAN PADUKA', '<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF LAXMI PADUKA AND &nbsp;VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS WITH &nbsp;CRYSTAL BEADS FITTED INSIDE )<br />\r\nIT ENHANCES POSITIVE ENERGY<br />\r\nTHIS YANTRA REPRESENTS GODESS LAXMI&#39;S FOOTPRINTS<br />\r\nIT ATTRACTS MONEY AND PROSPERITY<br />\r\n<strong>WHERE TO USE : ENTRANCE OF HOME / OFFICE / FACTORY</strong></p>\r\n', 'laxmicharanpaduka.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:41:23'),
(16, 'POWER PLATE TRANSPARENT', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nIT HAS COMBINED STRENGTH OF 108 &nbsp;PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nBRINGS HARMONY IN YOUR PERSONAL LIFFE<br />\r\nATTRACT GOOD FORTUNE AND FINANCIAL OPPORTUNITIES<br />\r\nPYRAMIDS EFFECTIVELY NEUTRALIZES GEOPATHIC STRESS<br />\r\nDEVELOP MENTAL ABILITIES / FULFIL DESIRES / ATTRACT MONEY<br />\r\nPURIFY WATER / GIVE LIFE TO NATURE &nbsp;/ &nbsp;IMPROVES HEALTH<br />\r\n<strong>WHERE TO USE : &nbsp;NORTH / NORTH EAST / EAST OR AT ANY VASTU DOSHA ZONES&nbsp;</strong><br />\r\n&nbsp;</p>\r\n', 'POWERPLATETRANSPARENT.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:42:42'),
(17, 'COPPER STAR', '<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nCOMBO OF COPPER STAR WITH MOTI AND &nbsp;VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL; BEADS FITTED INSIDE )<br />\r\nTHE COPPER STAR CURE THE ILL EFFECT OF VASTU DOSHA AT NORTH AND NORTH EAST<br />\r\nTHE STONES ON TOP PROTECTS YOUR FAMILY FROM NEGATIVE ENERGY / ENHANCE POSITIVE VIBRATIONS<br />\r\nTOTAL 108 PYRAMIDS &nbsp;BOOSTS ENERGY<br />\r\nTHIS IS ALSO USED TO REMOVE TENTIONS AND STRESS FROM FAMILY<br />\r\n<strong>WHERE TO USE : NORTH &nbsp;/ NORTH EAST DIRECTION</strong></p>\r\n', 'COPPERSTAR.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:44:11'),
(18, 'SURYA  DEVTA', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF SURYA DEVTA &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 108 &nbsp;PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nUNIQUE PRODUCT WHERE DIRECT SUNLIGHT IS ABSENT<br />\r\nTHE PERSONS LIVING WHERE SURYA IS PLACED ARE ABLE TO WORK MORE EFFICIENTLY IN A BETTER FRIENDLY ATMOSPHERE<br />\r\nPROVIDES PEACE AND BETTER ENVIRONMENT<br />\r\nATTRACTS GOOD FORTUNE AND FINANCIAL OPPORTUNITIES<br />\r\n<strong>WHERE TO USE : &nbsp;AT EAST DIRECTION&nbsp;</strong><br />\r\n&nbsp;</p>\r\n', 'SURYADEVTA.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:46:03'),
(19, 'SUBH LABH', '<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong></p>\r\n\r\n<p>COMBO OF SHUBH PLATE AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET &nbsp; &nbsp; ( TOTAL POWER OF 108 PYRAMIDS AND CRSYTAL BEADS FITTED INSIDE )<br />\r\nSHUBH, AN AUSPICIOUS SYMBOL BRINGS GOOD LUCK<br />\r\nTOTAL 108 PYRAMIDS &nbsp;BOOSTS ENERGY<br />\r\nBY OVERCOMING NEGATIVE ENERGY<br />\r\n<strong>WHERE TO USE : MAIN DOOR / BOTH SIDES OF POOJA GHAR &nbsp;/ TEMPLE</strong><br />\r\n&nbsp;</p>\r\n', 'SUBHLABH.png', 2, '1000', '10', '900', '', '', '2021-01-29 16:46:31'),
(29, 'CHAKRA STONE', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF SEVEN CHAKRA STONES AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID OF 4 SETS ( TOTAL POWER OF 432 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nTOTAL 432 PYRAMIDS &nbsp;BOOSTS POSITIVE ENERGY AND CREATES PLEASENT ATMOSPHERE<br />\r\nENHANCE LUCK, POWER, BRINGS PROSPERITY REMOVE THE FEAR AND ANXIETY<br />\r\nFOR HEALING, REIKI AND MEDITATION<br />\r\nBRINGS HARMONY BETWEEN THE MIND, THE BODY AND THE SOUL<br />\r\n<strong>WHERE TO USE : HOME / OFFICE / NEAR BY YOUR SITTING PLACE</strong></p>\r\n</blockquote>\r\n', 'CHAKRASTONE.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:05:03'),
(30, 'PYRA PROTECTOR', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nIT HAS COMBINED STRENGTH OF 81 PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nBRINGS HARMONY IN YOUR PERSONAL LIFE<br />\r\nATTRACT GOOD FORTUNE AND FINANCIAL OPPORTUNITIES<br />\r\nPYRAMIDS EFFECTIVELY NEUTRALIZES GEOPATHIC STRESS<br />\r\nDEVELOP MENTAL ABILITIES / FULFIL DESIRES / ATTRACT MONEY<br />\r\nTHIS IS ALSO USED TO PROTECT FROM NEGATIVE ENERGY AND ENERGY BALANCING FOR PROSPERITY<br />\r\n<strong>WHERE TO USE : &nbsp;Pocket / Near By your Sitting Place</strong></p>\r\n', 'PYRAPROTECTOR.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:08:13'),
(31, 'SEVEN CHAKRA GENERATOR', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF SEVEN CHAKRA GENERATOR AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\n7 CHAKRA STONES HELPS TO BALANCE, ALIGN AND CLEANSE YOUR 7 CHAKRAS<br />\r\nTHE 108 PYRAMIDS INSIDE ENHANCE POWER OF 7 CHAKRAS &quot;100&quot; TIMES<br />\r\nBRINGS HARMONY BETWEEN THE MIND, THE BODY AND THE SOUL<br />\r\n<strong>WHERE TO USE : HOME / OFFICE / NEAR BY YOUR SITTING PLACE</strong></p>\r\n</blockquote>\r\n', 'SEVENCHAKRAGENERATOR.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:08:18'),
(32, 'BRASS OM', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF BRASS OM AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nOM IS AN AUSPICIOUS SYMBOL FOR FORTUNE AND WELLNESS<br />\r\nDEVELOP MENTAL ABILITIES / FULFILL DESIRES / ATTRACT MONEY<br />\r\nPROTECTS FROM ALL NEGATIVE ENERGIES<br />\r\nATTRACTS GOOD FORTUNE AND FINANCIAL OPPORTUNITIES<br />\r\n<strong>WHERE TO USE : TEMPLE / POOJA ROOM / NEAR YOUR MAIN DOOR OR AT ANY VASTU DOSHA ZONES</strong></p>\r\n</blockquote>\r\n', 'BRASSOM.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:11:23'),
(33, 'SWASTIK  POWER PLATE - YELLOW  - SW & NE ', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBINATION OF YELLOW POWER PLATE / SWASTIK AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 432 PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nTHE ILL - EFFECTS OF SOUTH WEST &amp; NORTH EAST DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE EARTH / WATER &nbsp;ELEMENTOF THE WEST AND ALSO TO CURE ILL EFFECT OF SOUTH WEST AND NORTH EAST&nbsp;<br />\r\n<strong>WHERE TO USE - SOUTH WEST &amp; NORTH EAST</strong></p>\r\n', 'SWASTIKPOWERPLATE-YELLOW(SW&NE).png', 2, '1000', '10', '900', '', '', '2021-01-29 17:12:01'),
(34, 'ZINC STAR WITH SWASTIK', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF ZINC STAR WITH SWASTIK AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nTHE ZINC STAR MAINLY ATTRACTS GOOD LUCK AND PROSPERITY<br />\r\nTHIS IS ALSO USED TO REMOVE TENTIONS AND STRESS FROM FAMILY<br />\r\nA UNIQUE &nbsp;VASTU TOOL FOR REMOVE&nbsp;<br />\r\n<strong>WHERE TO USE : BRAHMASTHAN / POOJA ROOM / NEAR YOUR MAIN DOOR / AT ANY VASTU DOSHA ZONE</strong></p>\r\n</blockquote>\r\n', 'ZINCSTARWITHSWASTIK.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:14:32'),
(35, 'SWASTIK POWER PLATE - BLUE -  WEST ', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBINATION OF BLUE POWER PLATE / SWASTIK AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 432 PYRAMIDS &amp; CRYSTAL BEADS FITTED INSIDE<br />\r\nTHE ILL - EFFECTS OF WEST DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE AIR ELEMENTOF THE WEST AND ALSO CURE ILL EFFECT OF WEST<br />\r\n<strong>WHERE TO USE - WEST</strong></p>\r\n', 'SWASTIKPOWERPLATE-BLUE(WEST).png', 2, '1000', '10', '900', '', '', '2021-01-29 17:14:55'),
(36, 'BRASS STAR WITH SWASTIK ', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF BRASS STAR WITH SWASTIK AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nTHE BRASS STAR MAINLY ATTRACTS GOOD LUCK AND PROSPERITY<br />\r\nTHIS IS ALSO USED TO REMOVE TENTIONS AND STRESS IN FAMILY<br />\r\nSTRENGTHENS THE CONCENTRATION AND HEALTH OF YOUR CHILDREN<br />\r\n<strong>WHERE TO USE : BRAHMASTHAN / POOJA ROOM / NEAR YOUR MAIN DOOR / AT ANY VASTU DOSHA ZONE</strong></p>\r\n</blockquote>\r\n', 'BRASSSTARWITHSWASTIK.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:16:25'),
(37, 'SWASTIK POWER PLATE - GREEN - NORTH ', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF WHITE SUPER POWER PLATE SWASTIK AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 972 PYRAMIDS&nbsp;<br />\r\nA UNIQUE &nbsp;VASTU TOOL FOR REMOVE OVERALL VASTU DOSHA<br />\r\nTHIS IS ALSO USED TO REMOVE TENTIONS AND STRESS FROM FAMILY<br />\r\nENHANCES OVER ALL POSITIVE ENERGY<br />\r\n<strong>WHERE TO USE - &nbsp;NORTH&nbsp;</strong></p>\r\n', 'SWASTIKPOWERPLATE-GREEN(NORTH).png', 2, '1000', '10', '900', '', '', '2021-01-29 17:17:12'),
(38, 'ZINC HELIX', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nCOMBO OF ZINC NORTH EAST HELIX WITH MOTI AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nTHE ILL - EFFECTS OF NORTH EAST DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE WATER &nbsp;ELEMENT OF THE &nbsp;NORTH-EAST AND ALSO TO CURE ILL EFFECT OF NORTH EAST&nbsp;<br />\r\nZINC HELIX IS ONE OF THE BEST REMEDY FOR NORTH EAST CORNER<br />\r\n<strong>WHERE TO USE : CUT / EXTENSION / ELEMENT PRESENT OTHER THAN WATER &nbsp;( NORTH EAST DIRECTION )</strong></p>\r\n</blockquote>\r\n', 'ZINCHELIX.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:18:59'),
(39, 'SWASTIK  POWER PLATE - RED - SOUTH ', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBINATION OF RED POWER PLATE / SWASTIK AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 432 &nbsp;PYRAMIDS &amp; CRYSTAL BEAD FITTED INSIDE&nbsp;<br />\r\nTHE ILL - EFFECTS OF SOUTH &nbsp;DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE &nbsp;FIRE ELEMENTOF THE SOUTH AND ALSO TO CURE ILL EFFECT OF SOUTH<br />\r\n<strong>WHERE TO USE - SOUTH</strong></p>\r\n', 'SWASTIKPOWERPLATE-RED(SOUTH).png', 2, '1000', '10', '900', '', '', '2021-01-29 17:19:37'),
(40, 'BRASS HELIX', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF BRASS NORTH WEST HELIX AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nTHE ILL - EFFECTS OF NORTH WEST DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE WATER / EARTH ELEMENT OF THE NORTH-WEST AND ALSO TO CURE ILL EFFECT OF NORTH WEST<br />\r\n<strong>WHERE TO USE : CUT / EXTENSION / ELEMENT PRESENT OTHER THAN WATER &amp; EARTH ( NORTH WEST DIRECTION )</strong></p>\r\n</blockquote>\r\n', 'BRASSHELIX.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:21:15'),
(41, 'COPPER LOTUS SWASTIK YANTRA', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF COPPER LOTUS SWASTIK YANTRA &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nSWASTIK IS AN AUSPICIOUS SYMBOL FOR FORTUNE AND WELLNESS<br />\r\nIT HAS COMBINED STRENGTH OF 432 &nbsp;PYRAMIDS &amp; CRYSTAL BEAD FITTED INSIDE&nbsp;<br />\r\nENHANCES OVER ALL POSITIVE ENERGY<br />\r\nTHIS IS ALSO USED TO REMOVE TENTIONS AND STRESS FROM FAMILY<br />\r\nA UNIQUE &nbsp;VASTU TOOL FOR REMOVE OVERALL VASTU DOSHA<br />\r\nBRAHMASTHAN VASTU DOSH NIVARAN / CORRECTION<br />\r\n<strong>WHERE TO USE - BRAHMASTHAN / EAST</strong></p>\r\n', 'COPPERLOTUSSWASTIKYANTRA.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:21:42'),
(42, 'GOLDEN SUPER POWER PLATE', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF GOLDEN SUPER POWER PLATE AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 972 PYRAMIDS &nbsp;&amp; CRYSTAL BEADS FITTED INSIDE&nbsp;<br />\r\nA UNIQUE &nbsp;VASTU TOOL FOR REMOVE OVERALL VASTU DOSHA<br />\r\nTHIS IS ALSO USED TO REMOVE TENTIONS AND STRESS FROM FAMILY<br />\r\nENHANCES OVER ALL POSITIVE ENERGY<br />\r\nBRAHMASTHAN VASTU DOSH NIVARAN / CORRECTION<br />\r\n<strong>WHERE TO USE - BRAHMASTHAN / NORTH EAST / NORTH / EAST</strong></p>\r\n', 'GOLDENSUPERPOWERPLATE.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:23:56'),
(43, 'WHITE SUPER POWER PLATE', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF WHITE SUPER POWER PLATE AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 972 PYRAMIDS &nbsp;&amp; CRSTAL BEADS FITTED INSIDE&nbsp;<br />\r\nA UNIQUE &nbsp;VASTU TOOL FOR REMOVE OVERALL VASTU DOSHA<br />\r\nTHIS IS ALSO USED TO REMOVE TENTIONS AND STRESS FROM FAMILY<br />\r\nENHANCES OVER ALL POSITIVE ENERGY<br />\r\nBRAHMASTHAN VASTU DOSH NIVARAN / CORRECTION<br />\r\n<strong>WHERE TO USE - BRAHMASTHAN / NORTH EAST / NORTH / EAST</strong></p>\r\n', 'WHITESUPERPOWERPLATE.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:26:47'),
(44, 'BHAUM YANTRA', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF BHAUM YANTRA &nbsp;With Munga AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET<br />\r\nIT HAS COMBINED STRENGTH OF 432 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE&nbsp;<br />\r\nTHE ILL - EFFECTS OF SOUTH &nbsp;DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE &nbsp;FIRE ELEMENTOF THE SOUTH AND ALSO TO CURE ILL EFFECT OF SOUTH<br />\r\n<strong>WHERE TO USE : AT SOUTH DIRECTION</strong></p>\r\n', 'BHAUMYANTRA.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:31:24'),
(45, 'LEAD HELIX', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF LEAD &nbsp;HELIX &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( COMBINED STRENGHT OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nTHE ILL - EFFECTS OF SOUTH WEST DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE &nbsp;EARTH ELEMENTOF THE SOUTH-WEST AND ALSO TO CURE ILL EFFECT OF SOUTH WEST&nbsp;<br />\r\n<strong>WHERE TO USE : AT SOUTH WEST CORNER</strong></p>\r\n', 'LEADHELIX.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:35:44'),
(46, 'COPPER HELIX', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF COPPER SOUTH EAST HELIX AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nTHE ILL - EFFECTS OF SOUTH EAST DISHA CURES AUTOMATICALLY<br />\r\nHELIX IS ONE OF AN EXQUISITE REMEDY DESIGNED SPECIALLY TO &nbsp;ACTIVATE AND BALANCE THE FIRE<br />\r\n<strong>WHERE TO USE : CUT / EXTENSION / ELEMENT PRESENT OTHER THAN FIRE &nbsp;( SOUTH EAST DIRECTION )</strong></p>\r\n</blockquote>\r\n', 'COPPERHELIX.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:37:15'),
(47, 'MINI MASTER BLASTER', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nPOWERFUL &nbsp;AND PROVEN, INSTANT &amp; PEAK PERFORMANCE FOR ALL TYPES OF PREMISES AND PROBLEMS ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nIT CAN BE INSTALLED UNDERGROUND, OVER HEAD, ON ANY SURFACE WITH EASE, IN ANY DIRECTION<br />\r\nIT HAS COMBINED STRENGTH OF 108 &nbsp;PYRAMIDS<br />\r\nEXCELLENT FOR VASTU, MEDITATION, REIKI, HOLISTIC REMEDIES, PYRAMID THERAPY<br />\r\nA UNIQUE HOUSEHOLD PYRAMID FOR TOTAL SOLUTION OF ALL VAASTU DEFECTS / NEGATIVE ENERGY&nbsp;<br />\r\n<strong>WHERE TO USE : AT ANY VASTU DOSHA ZONES&nbsp;</strong></p>\r\n', 'MINIMASTERBLASTER.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:37:53'),
(48, 'BRASS SWASTIK PLATE ', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF BRASS (5) SWASTIK PLATE YANTRA AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 432 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nENHANCES OVER ALL POSITIVE ENERGY<br />\r\nIT HAS COMBINED STRENGTH OF 432 &nbsp;PYRAMIDS<br />\r\nBRAHMASTHAN VASTU DOSH NIVARAN / CORRECTION<br />\r\n<strong>WHERE TO USE : BRAHMASTHAN &nbsp; / North East / East</strong></p>\r\n', 'BRASSSWASTIKPLATE.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:40:45'),
(49, 'BRASS  SPIRAL BLOCK', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF BRASS &nbsp;SPIRAL BLOCK &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nTHE ILL - EFFECTS OF NORTH WEST DISHA CURES AUTOMATICALLY<br />\r\nBALANCE THE WATER / EARTH ELEMENTOF THE NORTH-WEST AND ALSO TO CURE ILL EFFECT OF NORTH WEST&nbsp;<br />\r\n<strong>WHERE TO USE : CUT / EXTENSION / ELEMENT PRESENT OTHER THAN WATER &amp; EARTH ( NORTH WEST DIRECTION )</strong><br />\r\n&nbsp;</p>\r\n</blockquote>\r\n', 'BRASSSPIRALBLOCK.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:41:06'),
(50, 'COPPER LOTUS SWASTIK', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF COPPER LOTUS FLOWER PLATE SWASTIK YANTRA WITH NAVGRAH STONES AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 432 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nENHANCES OVER ALL POSITIVE ENERGY<br />\r\nIT HAS COMBINED STRENGTH OF 432 &nbsp;PYRAMIDS<br />\r\nTHIS WILL ENHANCE OVERALL EFFECT OF NINE PLANETS AND REMOVE &nbsp;ALL YOUR VASTU DOSH<br />\r\n<strong>WHERE TO USE : BRAHMASTHAN &nbsp; / North East / East</strong></p>\r\n', 'COPPERLOTUSSWASTIK.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:43:34'),
(51, 'COPPER SPIRAL BLOCK', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF COPPER SPIRAL BLOCK &nbsp;AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nTHE ILL - EFFECTS OF SOUTH EAST DISHA CURES AUTOMATICALLY<br />\r\nHELIX IS ONE OF AN EXQUISITE REMEDY DESIGNED SPECIALLY TO ACTIVATE AND BALANCE THE FIRE ELEMENT&nbsp;<br />\r\n<strong>WHERE TO USE : CUT / EXTENSION / ELEMENT &nbsp;PRESENT OTHER THAN FIRE &nbsp;( SOUTH EAST DIRECTION )</strong></p>\r\n</blockquote>\r\n', 'COPPERSPIRALBLOCK.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:43:52'),
(52, 'COPPER VASTU PURUSH', '<p><strong>A UNIQUE COMBINATION OF PYRA (PYRAMIDS) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF COPPER VASTU PURUSH YANTRA AND VSP ULTIMATE 3 LAYER ABS POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INSIDE )<br />\r\nIT RECTIFIES OVERALL VASTU DOSH NIVARAN<br />\r\nIT HELPS IN LIVING A HEALTHY AND A LONG LIFE AND PLEASENT ATMOSPHERE SORROUNDING TO US&nbsp;<br />\r\n<strong>WHERE TO USE : AT SOUTH WEST DIRECTION</strong></p>\r\n', 'COPPERVASTUPURUSH.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:45:52'),
(53, 'LEAD SPIRAL BLOCK ', '<blockquote>\r\n<p><strong>A UNIQUE COMBINATION OF PYRA ( PYRAMIDS ) &amp; TRADITIONAL VASTU YANTRA</strong><br />\r\nUNIQUE COMBO OF LEAD SPIRAL BLOCK &nbsp;AND VSP ULTIMATE 3 LAYER ABS &nbsp; &nbsp;POLYMER FIBRE PYRAMID SET ( TOTAL POWER OF 108 PYRAMIDS AND CRYSTAL BEADS FITTED INsIDE )<br />\r\nTHE ILL - EFFECTS OF SOUTH WEST DISHA CURES AUTOMATICALLY<br />\r\n<strong>WHERE TO USE : Cut / Extention / Element Presnet Other Than FIRE &nbsp;( South WEST Direction )</strong><br />\r\n&nbsp;</p>\r\n</blockquote>\r\n', 'LEADSPIRALBLOCK.png', 2, '1000', '10', '900', '', '', '2021-01-29 17:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `reportsendtoastro`
--

CREATE TABLE `reportsendtoastro` (
  `rp_id` int(11) NOT NULL,
  `rp_user_id` int(11) NOT NULL,
  `rp_astro_id` int(11) NOT NULL,
  `rp_amountpaid` varchar(255) NOT NULL,
  `rp_type` varchar(255) NOT NULL,
  `rp_description` longtext NOT NULL,
  `rp_attachment` varchar(255) DEFAULT NULL,
  `rp_sendsolution` longtext,
  `rp_solution_attachment` varchar(255) DEFAULT NULL,
  `rp_problem_solve_status` int(11) NOT NULL DEFAULT '0',
  `rp_solvedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `rp_astrologer_pay_status` int(11) NOT NULL,
  `rp_astrologer_pay_tranjectionid` varchar(255) NOT NULL,
  `rp_astrologer_pay_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rp_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportsendtoastro`
--

INSERT INTO `reportsendtoastro` (`rp_id`, `rp_user_id`, `rp_astro_id`, `rp_amountpaid`, `rp_type`, `rp_description`, `rp_attachment`, `rp_sendsolution`, `rp_solution_attachment`, `rp_problem_solve_status`, `rp_solvedate`, `rp_astrologer_pay_status`, `rp_astrologer_pay_tranjectionid`, `rp_astrologer_pay_date`, `rp_timestamp`) VALUES
(79, 7, 34, '1000', 'Child Name Report', 'dsfsf', '860129544b6b587.jpg', NULL, NULL, 0, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '2021-01-28 10:43:16'),
(80, 7, 58, '350', 'Education Report', 'dfghf', '8601548bad7020star.jpg', NULL, NULL, 0, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '2021-01-30 11:53:30'),
(81, 6, 58, '350', 'Education Report', 'adfdf', '860154a045581estar.jpg', NULL, NULL, 0, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '2021-01-30 11:59:00'),
(82, 7, 51, '500', 'Education Report', 'sd', '860178dc135b88advt1.jpg', NULL, NULL, 0, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '2021-02-01 05:12:33'),
(83, 17, 34, '1000', 'Education Report', 'fsdfsd', '86020cb8ecb241advt1.jpg', NULL, NULL, 0, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '2021-02-08 05:26:38'),
(84, 7, 58, '350', 'Yearly Report', 'dfsd', '860221ab9de6e4advt1.jpg', NULL, NULL, 0, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '2021-02-09 05:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `request_amount_astrologer`
--

CREATE TABLE `request_amount_astrologer` (
  `ara_id` int(11) NOT NULL,
  `ara_astro_id` int(11) NOT NULL,
  `ara_amount` float NOT NULL,
  `ara_request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ara_paid_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ara_status` int(11) NOT NULL DEFAULT '0',
  `ara_detail_payment` longtext NOT NULL,
  `ara_imageofpayment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_amount_astrologer`
--

INSERT INTO `request_amount_astrologer` (`ara_id`, `ara_astro_id`, `ara_amount`, `ara_request_date`, `ara_paid_date`, `ara_status`, `ara_detail_payment`, `ara_imageofpayment`) VALUES
(22, 34, 900, '2021-02-09 13:17:32', '2021-02-09 13:17:32', 1, '12-120-2020\r\n120', ''),
(23, 34, 235, '2021-02-09 13:18:44', '0000-00-00 00:00:00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `href` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '0=free ,1 = paid',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `title`, `name`, `description`, `href`, `image`, `type`, `timestamp`) VALUES
(8, 'Online Puja Services', 'Online Puja Services', 'Online Puja services for you and your family on auspicious occasions in the inner sanctum of the templeLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'pujaservicedetail', 'onlinepuja.png', 1, '2021-01-07 10:38:59'),
(9, 'Free kundali', 'Free kundali', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'snipppp.PNG', 0, '2021-01-07 10:39:46'),
(12, 'Matrimonial Astrology', 'Matrimonial Astrology', 'We at Astrology promise to make your marriage the heavenly bond that it is supposed to be. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'matrimonial.png', 1, '2021-01-07 10:41:11'),
(1, 'Education', 'Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet', 'Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet', '', 'education-img-01.png', 1, '2021-01-08 06:48:13'),
(2, 'Family & children', 'Family & children', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'sr-fm-img.png', 1, '2021-01-08 06:48:52'),
(3, 'Custum Report', 'Cuostum Report', 'orem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'Astrology-report.png', 1, '2021-01-08 06:49:44'),
(4, 'Business', 'Business', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'business-services-img.png', 1, '2021-01-08 06:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `statuscheck`
--

CREATE TABLE `statuscheck` (
  `sc_id` int(11) NOT NULL,
  `sc_astro_id` int(11) NOT NULL,
  `sc_login_date` datetime NOT NULL,
  `sc_logout_date` datetime NOT NULL,
  `sc_login_status` int(11) NOT NULL,
  `sc_login_ip` varchar(255) NOT NULL,
  `sc_lastping` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuscheck`
--

INSERT INTO `statuscheck` (`sc_id`, `sc_astro_id`, `sc_login_date`, `sc_logout_date`, `sc_login_status`, `sc_login_ip`, `sc_lastping`) VALUES
(18, 55, '2021-02-09 10:36:52', '0000-00-00 00:00:00', 1, '', '2021-02-09 05:06:55'),
(19, 34, '2021-02-09 12:19:37', '2021-02-09 14:42:08', 0, '', '2021-02-09 09:12:08'),
(20, 34, '2021-02-09 13:43:31', '2021-02-09 17:17:25', 0, '', '2021-02-09 11:47:25'),
(21, 34, '2021-02-09 14:44:18', '2021-02-09 15:26:55', 0, '', '2021-02-09 09:56:55'),
(22, 34, '2021-02-09 15:27:05', '2021-02-09 16:29:06', 0, '', '2021-02-09 10:59:06'),
(23, 34, '2021-02-09 16:33:28', '2021-02-09 16:51:19', 0, '', '2021-02-09 11:21:19'),
(24, 34, '2021-02-09 16:52:29', '2021-02-09 17:25:50', 0, '', '2021-02-09 11:55:50'),
(25, 34, '2021-02-09 17:26:00', '2021-02-09 18:51:51', 0, '', '2021-02-09 13:21:51'),
(26, 34, '2021-02-09 17:43:07', '0000-00-00 00:00:00', 1, '', '2021-02-09 12:13:09'),
(27, 34, '2021-02-09 18:40:38', '2021-02-09 18:50:30', 0, '', '2021-02-09 13:20:30'),
(28, 34, '2021-02-09 18:52:13', '0000-00-00 00:00:00', 1, '', '2021-02-09 13:28:26'),
(29, 34, '2021-02-10 10:30:45', '2021-02-10 10:31:11', 0, '', '2021-02-10 05:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `name`, `description`, `image`, `location`, `timestamp`) VALUES
(4, 'neha', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'ast2.jpg', 'Indore', '2021-01-07 11:55:18'),
(5, 'rajesh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'ast3.jpg', 'Punjab', '2021-01-07 11:56:56'),
(6, 'Vijay', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'ast1.jpg', 'Pune', '2021-01-07 12:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL DEFAULT 'pagesuser',
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_timeofbirth` time NOT NULL,
  `user_placeofbirth` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_maritalstatus` varchar(255) NOT NULL,
  `user_occupation` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT '1',
  `user_email_verified` int(11) NOT NULL,
  `user_sms_verified` int(11) NOT NULL,
  `user_approval_status` int(11) NOT NULL,
  `user_online_status` int(11) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `registerby` varchar(255) NOT NULL,
  `user_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `folder_name`, `user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_image`, `user_mobile`, `user_gender`, `user_dob`, `user_timeofbirth`, `user_placeofbirth`, `user_state`, `user_country`, `user_maritalstatus`, `user_occupation`, `user_level`, `user_email_verified`, `user_sms_verified`, `user_approval_status`, `user_online_status`, `oauth_provider`, `oauth_uid`, `registerby`, `user_timestamp`) VALUES
(7, 'pagesuser', 'user rajesh', 'user', 'user@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '7.png', '9009436798', 'male', '2021-01-19', '16:03:00', 'indoreeeeee', 'mpeeeeeeee', 'indiaeeeeee', 'Married', 'jobeeeeeeee', 1, 1, 1, 1, 0, '', '', '', '2021-01-12 11:37:29'),
(17, 'pagesuser', 'Astro', 'Ved Vakta', 'astrovedvakta@gmail.com', '', 'https://lh3.googleusercontent.com/-S6QoM-MWq2U/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucmTWzddELvyLc4pPKCq1XIZAUfPPA/s96-c/photo.jpg', '', 'male', '2021-03-09', '15:04:00', 'indore', 'mp', 'indiaeeeeee', 'Married', 'job', 1, 0, 1, 1, 0, 'google', '111638131789783390628', 'google', '2021-02-09 12:27:01'),
(18, 'pagesuser', 'test', 'test', 'viraj@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '9009436798', 'male', '2021-02-09', '17:05:00', 'indore', 'mp', 'india', 'Married', 'Un Employed', 1, 0, 1, 0, 0, '', '', '', '2021-02-08 13:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_call_detail_history_user`
--

CREATE TABLE `user_call_detail_history_user` (
  `uch_id` int(11) NOT NULL,
  `uch_user_id` int(11) NOT NULL,
  `uch_astro_id` int(11) NOT NULL,
  `uch_totaltime` varchar(255) NOT NULL DEFAULT '0',
  `uch_call_start_time` datetime NOT NULL,
  `uch_call_end_time` datetime NOT NULL,
  `uch_astro_call_rate` int(11) NOT NULL,
  `uch_status` int(11) NOT NULL DEFAULT '5' COMMENT '5=null,0=callfail,1=callsuccess',
  `uch_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_call_detail_history_user`
--

INSERT INTO `user_call_detail_history_user` (`uch_id`, `uch_user_id`, `uch_astro_id`, `uch_totaltime`, `uch_call_start_time`, `uch_call_end_time`, `uch_astro_call_rate`, `uch_status`, `uch_timestamp`) VALUES
(15, 17, 34, '1', '2021-02-08 15:58:11', '2021-02-08 15:58:11', 15, 1, '2021-02-08 10:28:11'),
(16, 17, 55, '10', '2021-02-08 16:10:52', '2021-02-08 16:10:52', 20, 1, '2021-02-08 10:40:52'),
(17, 17, 34, '10', '2021-02-08 16:11:52', '2021-02-08 16:11:52', 15, 1, '2021-02-08 10:41:52'),
(18, 17, 55, '10', '2021-02-08 17:40:38', '2021-02-08 17:40:38', 20, 1, '2021-02-08 12:10:38'),
(19, 7, 34, '10', '2021-02-08 18:19:35', '2021-02-08 18:19:35', 15, 1, '2021-02-08 12:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_chat_detail_history`
--

CREATE TABLE `user_chat_detail_history` (
  `ucth_id` int(11) NOT NULL,
  `ucth_user_id` int(11) NOT NULL,
  `ucth_astro_id` int(11) NOT NULL,
  `ucth_totaltime` varchar(255) NOT NULL DEFAULT '0',
  `ucth_chat_starttime` datetime NOT NULL,
  `ucth_chat_endtime` datetime NOT NULL,
  `ucth_astro_chatrate` varchar(255) NOT NULL,
  `ucth_status` int(11) NOT NULL COMMENT '5=null,0=fail,1=success',
  `ucth_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_chat_detail_history`
--

INSERT INTO `user_chat_detail_history` (`ucth_id`, `ucth_user_id`, `ucth_astro_id`, `ucth_totaltime`, `ucth_chat_starttime`, `ucth_chat_endtime`, `ucth_astro_chatrate`, `ucth_status`, `ucth_timestamp`) VALUES
(1, 17, 55, '0', '2021-02-08 12:03:25', '2021-02-08 12:03:25', '10', 1, '2021-02-08 06:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_amt` float NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `unique_id`, `user_id`, `wallet_amt`, `txn_id`, `payment_status`, `currency_code`, `timestamp`) VALUES
(7, '8601246327d120', 7, 79033, '33S28470JY0566832', 'Success', 'USD', '2021-02-09 05:16:41'),
(8, '', 16, 5, '', 'Success', 'USD', '2021-02-06 08:20:47'),
(9, '86020cae617b2f', 17, 19450, '6WK74626V4763664D', 'Success', 'USD', '2021-02-08 12:10:38'),
(10, '860224b299a35b', 18, 2000, '1V097529D1243122W', 'Success', 'USD', '2021-02-09 08:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_admin`
--

CREATE TABLE `wallet_admin` (
  `wad_id` int(11) NOT NULL,
  `wad_adminid` int(11) NOT NULL,
  `wad_amt` float NOT NULL,
  `wad_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_admin`
--

INSERT INTO `wallet_admin` (`wad_id`, `wad_adminid`, `wad_amt`, `wad_timestamp`) VALUES
(1, 1, 36, '2021-01-23 10:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_astrologer`
--

CREATE TABLE `wallet_astrologer` (
  `wa_id` int(11) NOT NULL,
  `wa_astrologer_id` int(11) NOT NULL,
  `wa_wallet_amount` varchar(255) NOT NULL,
  `wa_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_astrologer`
--

INSERT INTO `wallet_astrologer` (`wa_id`, `wa_astrologer_id`, `wa_wallet_amount`, `wa_timestamp`) VALUES
(3, 34, '235', '2021-01-28 05:14:49'),
(4, 55, '180', '2021-02-08 12:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history_admin`
--

CREATE TABLE `wallet_history_admin` (
  `wlla_id` int(11) NOT NULL,
  `wlla_recevedby_id` int(11) NOT NULL COMMENT 'id from product ,calling,chat',
  `wlla_receved_for` varchar(255) NOT NULL COMMENT 'payment,product etc',
  `wlla_amount` varchar(255) NOT NULL,
  `wlla_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_history_admin`
--

INSERT INTO `wallet_history_admin` (`wlla_id`, `wlla_recevedby_id`, `wlla_receved_for`, `wlla_amount`, `wlla_timestamp`) VALUES
(20, 77, 'payreport', '1', '2021-01-28 05:14:49'),
(21, 18, 'callingastrologer', '20', '2021-02-08 12:10:38'),
(22, 19, 'callingastrologer', '15', '2021-02-08 12:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history_astrologer`
--

CREATE TABLE `wallet_history_astrologer` (
  `wha_id` int(11) NOT NULL,
  `wha_astro_id` int(11) NOT NULL,
  `wha_id_all` int(11) NOT NULL,
  `wha_recevedfor` varchar(255) NOT NULL,
  `wha_rec_amt_before_deduction` varchar(255) NOT NULL,
  `wha_rec_amt_after_deduction` varchar(255) NOT NULL,
  `wha_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_history_astrologer`
--

INSERT INTO `wallet_history_astrologer` (`wha_id`, `wha_astro_id`, `wha_id_all`, `wha_recevedfor`, `wha_rec_amt_before_deduction`, `wha_rec_amt_after_deduction`, `wha_timestamp`) VALUES
(26, 34, 77, 'payreport', '1000', '900', '2021-01-28 05:14:49'),
(27, 55, 18, 'callingastrologer', '200', '180', '2021-02-08 12:10:38'),
(28, 34, 19, 'callingastrologer', '150', '135', '2021-02-08 12:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_recharge_history`
--

CREATE TABLE `wallet_recharge_history` (
  `wrh_id` int(11) NOT NULL,
  `wrh_user_id` int(11) NOT NULL,
  `wrh_amount` varchar(255) NOT NULL,
  `wrh_txn_id` varchar(255) NOT NULL,
  `wrh_payment_status` varchar(255) NOT NULL,
  `wrh_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_recharge_history`
--

INSERT INTO `wallet_recharge_history` (`wrh_id`, `wrh_user_id`, `wrh_amount`, `wrh_txn_id`, `wrh_payment_status`, `wrh_timestamp`) VALUES
(9, 7, '100000.00', '57S00713Y79310746', 'Success', '2021-01-28 05:04:53'),
(10, 7, '5000.00', '33S28470JY0566832', 'Success', '2021-01-28 05:06:35'),
(11, 17, '20000.00', '6WK74626V4763664D', 'Success', '2021-02-08 05:24:52'),
(12, 18, '2000.00', '1V097529D1243122W', 'Success', '2021-02-09 08:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `websiteinformation`
--

CREATE TABLE `websiteinformation` (
  `info_id` int(11) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `matter` longtext NOT NULL,
  `about` longtext NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `google_link` varchar(255) NOT NULL,
  `yahoo_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `tollfreenumber` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `logo1` varchar(255) NOT NULL,
  `logo2` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websiteinformation`
--

INSERT INTO `websiteinformation` (`info_id`, `website_name`, `title`, `matter`, `about`, `phone`, `email`, `address`, `latitude`, `longitude`, `facebook_link`, `google_link`, `yahoo_link`, `twitter_link`, `tollfreenumber`, `copyright`, `logo1`, `logo2`, `favicon`, `timestamp`) VALUES
(1, 'AstroVed Vakta', 'AstroVed Vakta', '<p>AstroVed Vakta</p>\r\n', '<p>Astroved Vakta is an Indian organization established by Mr. Onkar Prasad and Mr. Mayank Sharma, our mission is to enrich the lives of every person we come in contact with by providing excellence in all types of astrology and remedial rituals. No wonder the entire team of staff members and astrologers serve as a large, extended family in the Astroved Vakta. The organization&rsquo;s fundamental philosophy rests firmly on the belief that no true success can be accomplished unless there is complete and concerted involvement of the entire staff in all its endeavors.</p>\r\n\r\n<p>Remedial services include fire prayers (hawan), temple and Poojas service, products made from energy (Products composed of five elements, Pancha Loka, energized in power rituals), and customized packages and programs that let&#39;s focus on improving key areas of life such as health, finance, yog shanti, relationships, education, Dosha&rsquo;s etc., to fulfill your needs and bring more positivity in your life.</p>\r\n\r\n<p>We strive to serve customers with the best service level, gaining high satisfaction and experience. Come and join us for a healthy, happy and hustle free life.</p>\r\n', '+91 9873501510', 'info@astrovedvakta.com', 'Indore', '1321321', '456545645654', '#', '#', '#', '#', '+ 1800 336 3366', '© Copyright 2021 by Horoscope. All right Reserved', 'logo_01.png', 'logo_02.png', 'favicon.ico', '2020-12-30 09:30:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advt_id`);

--
-- Indexes for table `astrologers`
--
ALTER TABLE `astrologers`
  ADD PRIMARY KEY (`astro_id`);

--
-- Indexes for table `astrologers_multiplecategories`
--
ALTER TABLE `astrologers_multiplecategories`
  ADD PRIMARY KEY (`multiple_id`);

--
-- Indexes for table `astro_admin_team`
--
ALTER TABLE `astro_admin_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blogcomment`
--
ALTER TABLE `blogcomment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `category_astrologer`
--
ALTER TABLE `category_astrologer`
  ADD PRIMARY KEY (`cat_astr_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`cat_pro_id`);

--
-- Indexes for table `comment_rating_astrologer`
--
ALTER TABLE `comment_rating_astrologer`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `contentmanagement`
--
ALTER TABLE `contentmanagement`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `coupan`
--
ALTER TABLE `coupan`
  ADD PRIMARY KEY (`cpn_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `enquiry_freekundali`
--
ALTER TABLE `enquiry_freekundali`
  ADD PRIMARY KEY (`fkun_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`festival_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `getintouch`
--
ALTER TABLE `getintouch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horoscopeyearly`
--
ALTER TABLE `horoscopeyearly`
  ADD PRIMARY KEY (`horoscope_id`);

--
-- Indexes for table `language_astrologer`
--
ALTER TABLE `language_astrologer`
  ADD PRIMARY KEY (`la_id`);

--
-- Indexes for table `matchmaking`
--
ALTER TABLE `matchmaking`
  ADD PRIMARY KEY (`mm_id`);

--
-- Indexes for table `mmbanner`
--
ALTER TABLE `mmbanner`
  ADD PRIMARY KEY (`mmb_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nfc_id`);

--
-- Indexes for table `onlinepuja`
--
ALTER TABLE `onlinepuja`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `predectionmatter`
--
ALTER TABLE `predectionmatter`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `prediction`
--
ALTER TABLE `prediction`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `reportsendtoastro`
--
ALTER TABLE `reportsendtoastro`
  ADD PRIMARY KEY (`rp_id`);

--
-- Indexes for table `request_amount_astrologer`
--
ALTER TABLE `request_amount_astrologer`
  ADD PRIMARY KEY (`ara_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `statuscheck`
--
ALTER TABLE `statuscheck`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_call_detail_history_user`
--
ALTER TABLE `user_call_detail_history_user`
  ADD PRIMARY KEY (`uch_id`);

--
-- Indexes for table `user_chat_detail_history`
--
ALTER TABLE `user_chat_detail_history`
  ADD PRIMARY KEY (`ucth_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `wallet_admin`
--
ALTER TABLE `wallet_admin`
  ADD PRIMARY KEY (`wad_id`);

--
-- Indexes for table `wallet_astrologer`
--
ALTER TABLE `wallet_astrologer`
  ADD PRIMARY KEY (`wa_id`);

--
-- Indexes for table `wallet_history_admin`
--
ALTER TABLE `wallet_history_admin`
  ADD PRIMARY KEY (`wlla_id`);

--
-- Indexes for table `wallet_history_astrologer`
--
ALTER TABLE `wallet_history_astrologer`
  ADD PRIMARY KEY (`wha_id`);

--
-- Indexes for table `wallet_recharge_history`
--
ALTER TABLE `wallet_recharge_history`
  ADD PRIMARY KEY (`wrh_id`);

--
-- Indexes for table `websiteinformation`
--
ALTER TABLE `websiteinformation`
  ADD PRIMARY KEY (`info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `astrologers`
--
ALTER TABLE `astrologers`
  MODIFY `astro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `astrologers_multiplecategories`
--
ALTER TABLE `astrologers_multiplecategories`
  MODIFY `multiple_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `astro_admin_team`
--
ALTER TABLE `astro_admin_team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blogcomment`
--
ALTER TABLE `blogcomment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_astrologer`
--
ALTER TABLE `category_astrologer`
  MODIFY `cat_astr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `cat_pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment_rating_astrologer`
--
ALTER TABLE `comment_rating_astrologer`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contentmanagement`
--
ALTER TABLE `contentmanagement`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupan`
--
ALTER TABLE `coupan`
  MODIFY `cpn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `enquiry_freekundali`
--
ALTER TABLE `enquiry_freekundali`
  MODIFY `fkun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `festival`
--
ALTER TABLE `festival`
  MODIFY `festival_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `getintouch`
--
ALTER TABLE `getintouch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `horoscopeyearly`
--
ALTER TABLE `horoscopeyearly`
  MODIFY `horoscope_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `language_astrologer`
--
ALTER TABLE `language_astrologer`
  MODIFY `la_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matchmaking`
--
ALTER TABLE `matchmaking`
  MODIFY `mm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mmbanner`
--
ALTER TABLE `mmbanner`
  MODIFY `mmb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nfc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `onlinepuja`
--
ALTER TABLE `onlinepuja`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `predectionmatter`
--
ALTER TABLE `predectionmatter`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prediction`
--
ALTER TABLE `prediction`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `reportsendtoastro`
--
ALTER TABLE `reportsendtoastro`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `request_amount_astrologer`
--
ALTER TABLE `request_amount_astrologer`
  MODIFY `ara_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `statuscheck`
--
ALTER TABLE `statuscheck`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_call_detail_history_user`
--
ALTER TABLE `user_call_detail_history_user`
  MODIFY `uch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_chat_detail_history`
--
ALTER TABLE `user_chat_detail_history`
  MODIFY `ucth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wallet_admin`
--
ALTER TABLE `wallet_admin`
  MODIFY `wad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet_astrologer`
--
ALTER TABLE `wallet_astrologer`
  MODIFY `wa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallet_history_admin`
--
ALTER TABLE `wallet_history_admin`
  MODIFY `wlla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wallet_history_astrologer`
--
ALTER TABLE `wallet_history_astrologer`
  MODIFY `wha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `wallet_recharge_history`
--
ALTER TABLE `wallet_recharge_history`
  MODIFY `wrh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `websiteinformation`
--
ALTER TABLE `websiteinformation`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
