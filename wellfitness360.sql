-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 02:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wellfitness360`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Image` longtext DEFAULT NULL,
  `ShortDescription` longtext DEFAULT NULL,
  `LongDescription` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`ID`, `Title`, `Image`, `ShortDescription`, `LongDescription`, `created_at`, `updated_at`) VALUES
(1, 'WellFitness360', 'backend/images/CMSPages/1589538567Screenshot_1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-05-15 13:03:58', '2020-05-15 10:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tag` varchar(150) NOT NULL,
  `blogimage` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `url_alias` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `tag`, `blogimage`, `status`, `url_alias`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Take programs tailored to your fitness level', '<p>Lorem ipsum</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br />\r\n&nbsp;</p>', 'Blog', 'backend/images/BlogImages/1595222651blog2.jpg', '1', 'take-programs-fitness-level', '2020-07-15 11:38:11', '2020-07-20 11:03:47', NULL),
(2, 'Take programs tailored to', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<h3>Lorem ipsum</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<h3>Lorem ipsum</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>', 'Training', 'backend/images/BlogImages/1595222521blog1.jpg', '1', 'take-programs-fitness-level-1', '2020-07-20 10:52:01', '2020-07-20 11:03:57', NULL),
(3, 'Take programs tailored to your fitness level', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<h3>Lorem ipsum</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<h3>Lorem ipsum</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>', 'Yoga', 'backend/images/BlogImages/1595222569blog2.jpg', '1', 'take-programs-fitness-level-2', '2020-07-20 10:52:49', '2020-07-20 11:04:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `cat_Name` varchar(150) NOT NULL,
  `cat_description` varchar(255) DEFAULT NULL,
  `cat_image` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 for Active,0 for inactive',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `cat_Name`, `cat_description`, `cat_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Workouts', 'Find Your perfrect workout programs 123', 'backend/images/CategoriesImage/1594115832person.png', '1', '2020-07-07 15:27:12', '2020-07-08 15:52:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ContactNumber` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `Address` text CHARACTER SET latin1 DEFAULT NULL,
  `Telephone` text CHARACTER SET latin1 DEFAULT NULL,
  `Website` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Description` longtext CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`ID`, `Email`, `ContactNumber`, `Address`, `Telephone`, `Website`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'wellfil360@gmail.com', '7845784578', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '(784) 545-4784', 'www.wellfit360.com', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-05-15 10:15:34', '2020-05-15 10:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

CREATE TABLE `durations` (
  `id` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Acive, 0=InActive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`id`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, '3 Months', 1, '2020-07-09 17:23:54', '2020-07-09 17:23:54'),
(2, '6 Months', 1, '2020-07-09 17:23:54', '2020-07-09 17:23:54'),
(3, '9 Months', 1, '2020-07-09 17:24:12', '2020-07-09 17:24:12'),
(4, '1 Year', 0, '2020-07-09 17:24:12', '2020-07-09 17:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `e-shop`
--

CREATE TABLE `e-shop` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` longtext DEFAULT NULL,
  `Image` longtext DEFAULT NULL,
  `Shop_URL` text DEFAULT NULL,
  `Status` tinyint(1) DEFAULT 1,
  `Created_At` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_At` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `e-shop`
--

INSERT INTO `e-shop` (`ID`, `Name`, `Description`, `Image`, `Shop_URL`, `Status`, `Created_At`, `Updated_At`, `deleted_at`) VALUES
(1, 'Gym Discovery', 'Ahad Sports Club, Lokhandvala Road, Navi Fatehvadi Village, Sarkhej Road, Ahmedabad - 380055 (Map)', 'backend/images/ShopImages/1589785068download.jpg', 'https://www.justdial.com/Ahmedabad/Gym-Discovery-Sarkhej-Road/079PXX79-XX79-200217125129-N1V4_BZDET?xid=QWhtZWRhYmFkIEd5bXM=', 1, '2020-05-18 12:27:48', '2020-05-18 12:27:48', NULL),
(2, 'MR Fitness', '1st Floor, The Address Complex, Vijay Cross Road, Navrangpura, Ahmedabad - 380009, Near By Honda Showroom', 'backend/images/ShopImages/1591178168news1.jpg', 'https://www.justdial.com/Ahmedabad/MR-Fitness-Near-By-Honda-Showroom-Navrangpura/079PXX79-XX79-181229152058-F4W8_BZDET?xid=QWhtZWRhYmFkIEd5bXM=', 1, '2020-05-18 12:28:52', '2020-05-18 12:28:52', NULL),
(3, 'Test', 'test', 'backend/images/ShopImages/1591167588news1.jpg', 'https://www.justdial.com/Ahmedabad/Gym-Discovery-Sarkhej-Road/079PXX79-XX79-200217125129-N1V4_BZDET?xid=QWhtZWRhYmFkIEd5bXM=', 1, '2020-06-03 02:54:14', '2020-06-03 02:54:14', NULL),
(4, 'Test qwe', 'test', 'backend/images/ShopImages/1595419177person.png', 'https://www.google.co.in/', 1, '2020-07-22 17:29:37', '2020-07-22 17:29:37', '2020-07-22 17:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `ID` int(11) NOT NULL,
  `Event_name` varchar(255) NOT NULL,
  `Event_code` varchar(255) NOT NULL,
  `Trainer_id` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `Event_desc` text DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`ID`, `Event_name`, `Event_code`, `Trainer_id`, `start_date`, `end_date`, `Event_desc`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Yoga Event', '7qBf4wQw', '[\"4\",\"5\"]', '2020-07-09', '2020-07-11', '<p>Tetststse</p>', '1', '2020-07-10 11:49:25', '2020-07-10 12:00:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feesmanagement`
--

CREATE TABLE `feesmanagement` (
  `ID` int(11) NOT NULL,
  `TrainerID` int(11) NOT NULL,
  `TrainerFee` varchar(50) NOT NULL,
  `AdminFee` varchar(50) NOT NULL,
  `TotalAmount` varchar(50) NOT NULL,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feesmanagement`
--

INSERT INTO `feesmanagement` (`ID`, `TrainerID`, `TrainerFee`, `AdminFee`, `TotalAmount`, `Created_at`, `Updated_at`, `deleted_at`) VALUES
(2, 4, '10000', '5000', '15000', '2020-05-18 09:25:51', '2020-07-22 17:35:08', '2020-07-22 17:35:08'),
(3, 4, '50001', '11000', '61001', '2020-06-03 12:21:06', '2020-07-22 17:35:02', NULL),
(4, 4, '1500', '1500', '3000', '2020-07-22 17:33:15', '2020-07-22 17:33:15', NULL),
(5, 4, '1500', '1500', '3000', '2020-07-22 17:34:25', '2020-07-22 17:34:25', NULL),
(6, 5, '1500', '500', '2000', '2020-07-22 17:34:52', '2020-07-22 17:34:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:Active 0:Inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`, `display_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user_management', 'user management [admin]', 1, '2020-05-11 04:56:16', '2020-05-14 13:57:47'),
(2, 'module', 'create module', 1, '2020-05-11 06:29:01', '2020-05-11 06:29:01'),
(3, 'rolespermission', 'assign roles and permission', 1, '2020-05-11 06:29:31', '2020-05-11 06:29:31'),
(4, 'categories_management', 'categories management', 1, '2020-05-14 13:52:54', '2020-05-14 13:52:54'),
(5, 'trainer_management', 'trainer management [admin]', 1, '2020-05-14 13:56:16', '2020-05-14 13:57:00'),
(6, 'cms_pages', 'cms page ( about-as, contact-us etc...)', 1, '2020-05-15 05:28:37', '2020-05-15 05:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` longtext DEFAULT NULL,
  `permission` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:Active 0:InActive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `created_by`, `role_name`, `description`, `permission`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Admin', '[\"all_user_management\",\"all_module\",\"all_rolespermission\",\"all_categories_management\",\"all_trainer_management\",\"all_cms_pages\"]', 1, '2020-05-11 04:57:01', '2020-05-15 05:29:15'),
(2, 1, 'user', 'User', NULL, 1, '2020-05-11 05:01:22', '2020-05-11 05:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `permission` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 = Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `description`, `permission`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, 1, '2020-02-25 15:00:09', '2020-02-25 15:00:09'),
(2, 'user', NULL, NULL, 1, '2020-02-25 15:00:25', '2020-05-08 15:06:39'),
(3, 'trainer', NULL, NULL, 1, '2020-02-25 15:00:25', '2020-05-08 15:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `ID` int(11) NOT NULL,
  `Email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `PhoneNumber` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `SiteName` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `SiteLogo` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Favicon` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `StripApiKey` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `StripSercetKey` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `PaypalApiKey` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `PaypalSercetKey` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Copyright` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `Email`, `PhoneNumber`, `SiteName`, `SiteLogo`, `Favicon`, `StripApiKey`, `StripSercetKey`, `PaypalApiKey`, `PaypalSercetKey`, `Copyright`, `created_at`, `updated_at`) VALUES
(1, 'tesdsdst@test.com', '123789', 'WellFit3600', 'backend/images/siteImages/1593696254person.png', 'backend/images/siteImages/1593696254person.png', 'gyugj', 'ewtryu', 'asdsas', 'dskfhsfuihi', '©2020 All Copyright Reserved.', '2020-07-02 18:54:23', '2020-07-02 18:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `ID` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `Sub_cat_name` varchar(150) NOT NULL,
  `Sub_cat_description` varchar(255) NOT NULL,
  `Sub_cat_image` varchar(255) NOT NULL,
  `workout_time` varchar(255) NOT NULL,
  `what_will_do` text NOT NULL,
  `equipment` varchar(255) NOT NULL,
  `workout_from` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '"1 for Active","2 For Inactive"',
  `package` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`ID`, `cat_id`, `Sub_cat_name`, `Sub_cat_description`, `Sub_cat_image`, `workout_time`, `what_will_do`, `equipment`, `workout_from`, `status`, `package`, `video`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 'Training', 'Test', 'backend/images/SubCategoriesImage/1594362713person.png', '15 Minutes', '<p>Test</p>', 'None,Full Gym211', 'Workout from home', '1', 'paid', '', '2020-07-10 12:01:53', '2020-07-10 12:01:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `id` tinyint(4) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Amount` float(10,2) NOT NULL,
  `Duration_id` int(11) NOT NULL,
  `Status` tinyint(1) DEFAULT 0 COMMENT '0 = InActive , 1 = Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`id`, `Title`, `Amount`, `Duration_id`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'Training & Nutrition', 3.64, 1, 1, '2020-07-09 18:00:57', '2020-07-09 18:49:07'),
(2, 'Training', 94.44, 1, 1, '2020-07-09 18:01:22', '2020-07-09 18:01:22'),
(3, 'Training & Nutrition', 3.64, 2, 1, '2020-07-09 18:01:46', '2020-07-09 18:01:46'),
(4, 'Training', 94.44, 2, 1, '2020-07-09 18:02:11', '2020-07-22 17:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_availability`
--

CREATE TABLE `trainer_availability` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer_availability`
--

INSERT INTO `trainer_availability` (`id`, `trainer_id`, `cat_id`, `start_time`, `end_time`, `duration`, `price`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 2, '2:00', '02:30', '30', '15000', '2020-08-04', '2020-08-04 10:31:03', '2020-08-04 17:51:15', NULL),
(2, 4, 1, '3:00', '03:45', '45', '15000', '2020-08-04', '2020-08-04 11:30:22', '2020-08-04 11:30:37', NULL),
(3, 4, 2, '4:00', '04:15', '15', '1500', '2020-08-05', '2020-08-04 18:05:38', '2020-08-04 18:05:38', NULL),
(4, 4, 2, '2:00', '02:45', '45', '1400', '2020-08-11', '2020-08-11 11:12:03', '2020-08-11 11:12:03', NULL),
(5, 4, 2, '05:00', '05:15', '15', '1500', '2020-08-14', '2020-08-14 11:20:07', '2020-08-14 11:20:07', NULL),
(6, 4, 2, '05:00', '05:15', '15', '5000', '2020-08-14', '2020-08-25 11:58:31', '2020-08-25 12:06:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainer_categories`
--

CREATE TABLE `trainer_categories` (
  `trainer_cat_id` int(11) NOT NULL,
  `trainer_cat_name` varchar(50) NOT NULL,
  `par_cat_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 = Inactive , 1 = Active	',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainer_categories`
--

INSERT INTO `trainer_categories` (`trainer_cat_id`, `trainer_cat_name`, `par_cat_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aerial', 0, 1, '2020-05-14 13:20:16', '2020-08-25 11:35:10'),
(2, 'Acrobatics', 1, 1, '2020-05-14 13:20:57', '2020-05-14 13:20:57'),
(4, 'Hammock', 1, 1, '2020-05-14 13:21:52', '2020-05-14 13:21:52'),
(5, 'Kids', 1, 1, '2020-05-14 13:22:17', '2020-05-14 13:22:17'),
(6, 'Lycra', 1, 1, '2020-05-14 18:53:03', '2020-05-14 18:53:03'),
(7, 'Silks', 1, 1, '2020-05-14 18:53:03', '2020-05-14 18:53:03'),
(8, 'Yoga', 1, 1, '2020-05-14 18:53:27', '2020-05-14 18:53:27'),
(10, 'Boxing / kickboxing', 0, 1, '2020-05-14 13:24:13', '2020-05-14 13:24:13'),
(11, 'Boxing', 10, 1, '2020-05-14 18:56:32', '2020-05-14 18:56:32'),
(12, 'Fundamentals', 10, 1, '2020-05-14 18:56:32', '2020-05-14 18:56:32'),
(13, 'Kickboxing', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(14, 'Power boxing', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(15, 'Power kickboxing', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(16, 'Sparring', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(17, 'Wrestling', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(19, 'Gym classes', 0, 1, '2020-05-14 13:37:48', '2020-05-14 13:37:48'),
(20, 'Aquatics', 19, 1, '2020-05-14 13:38:19', '2020-05-14 13:38:19'),
(21, 'Boot camp', 19, 1, '2020-05-14 13:38:48', '2020-05-14 13:38:48'),
(22, 'Weight training', 0, 1, '2020-05-14 13:39:39', '2020-05-14 13:39:39'),
(23, 'Arms', 22, 1, '2020-05-14 13:39:55', '2020-05-14 13:39:55'),
(24, 'Bodybuilding', 22, 1, '2020-05-14 13:40:13', '2020-05-14 13:40:13'),
(25, 'Butt / legs', 22, 1, '2020-05-14 13:40:44', '2020-05-14 13:41:06'),
(26, 'Chest / back / shoulders', 22, 1, '2020-05-14 13:41:26', '2020-05-14 13:41:26'),
(27, 'Competition', 22, 1, '2020-05-14 13:41:45', '2020-05-14 13:41:45'),
(28, 'Core', 22, 1, '2020-05-14 13:42:08', '2020-05-14 13:42:08'),
(29, 'Full body', 22, 1, '2020-05-14 13:42:33', '2020-05-14 13:42:33'),
(30, 'Yoga', 0, 1, '2020-05-14 13:42:49', '2020-05-14 13:42:49'),
(31, 'Anusara', 30, 1, '2020-05-14 13:43:06', '2020-05-14 13:43:06'),
(32, 'Ashtanga', 30, 1, '2020-05-14 13:43:25', '2020-05-14 13:43:25'),
(33, 'Bikram', 30, 1, '2020-05-14 13:43:45', '2020-05-14 13:43:45'),
(34, 'Personal training', 0, 1, '2020-05-14 13:44:20', '2020-05-14 13:44:20'),
(35, 'Bodybuilding', 34, 1, '2020-05-14 13:44:41', '2020-05-14 13:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_price_management`
--

CREATE TABLE `trainer_price_management` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `skils` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer_price_management`
--

INSERT INTO `trainer_price_management` (`id`, `user_id`, `title`, `skils`, `price`, `duration`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 4, 'Yoga', '10', 15000, 'Monthly', '2020-07-24 18:08:25', '2020-07-24 18:13:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainer_setting`
--

CREATE TABLE `trainer_setting` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `Facebook_url` varchar(255) DEFAULT NULL,
  `Instgram_url` varchar(255) DEFAULT NULL,
  `Contactno` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer_setting`
--

INSERT INTO `trainer_setting` (`id`, `trainer_id`, `Facebook_url`, `Instgram_url`, `Contactno`, `created_at`, `updated_at`) VALUES
(1, 4, '', '', '1234567890', '2020-07-23 15:31:18', '2020-08-25 18:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `sur_name` varchar(50) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `auth_provider` varchar(15) NOT NULL DEFAULT 'SITE_LOGIN',
  `facebook_id` text DEFAULT NULL,
  `facebook_token` longtext DEFAULT NULL,
  `google_id` text DEFAULT NULL,
  `google_token` longtext DEFAULT NULL,
  `profile_image` longtext DEFAULT NULL,
  `social_profile_image` longtext DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = true ,0=false',
  `user_token` varchar(255) DEFAULT NULL,
  `verified_token` longtext DEFAULT NULL,
  `remember_token` longtext DEFAULT NULL,
  `tranier_approved` enum('1','0') NOT NULL DEFAULT '0' COMMENT '"1 For approved","0 for unapproved"',
  `trainer_skils` varchar(255) DEFAULT NULL,
  `certifiaction_photo` varchar(255) DEFAULT NULL,
  `id_passport_photo` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `goals` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Active , 0=Pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `sur_name`, `email`, `gender`, `contact_no`, `password`, `auth_provider`, `facebook_id`, `facebook_token`, `google_id`, `google_token`, `profile_image`, `social_profile_image`, `email_verified`, `user_token`, `verified_token`, `remember_token`, `tranier_approved`, `trainer_skils`, `certifiaction_photo`, `id_passport_photo`, `age`, `height`, `weight`, `level`, `biography`, `goals`, `experience`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Admin', NULL, 'admin@admin.com', '1', NULL, '$2y$10$ix5TRm60.oQ6A2O/hXU3e.HAA3NWGzo3mXR2toGQee21O2.8yE5X2', 'SITE_LOGIN', NULL, NULL, NULL, NULL, '', NULL, 1, NULL, 'cnZGJRPgbh1vlZWJijqD7qPLZGuZ5bytRvNuxtom410o5c8YZx678LpoOl62UpIYQdZClzpQnUsS3aqKrw81puU7CLgBbYLAvuwh8aA3xGlSmEuOPRpbemlP', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-05-09 08:29:33', '2020-07-16 10:53:03', NULL),
(2, 3, 'Manoj', 'Prajapati', 'manoj1@silverwebbuzz.com', 'Male', '8785458754', '$2y$10$VxrxXVS97ciVxWxlT.jj.u4w/nMIvRZxFiv3Nyj1jGMAS7hqSRfrq', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Advance', NULL, NULL, NULL, 1, '2020-05-09 22:57:38', '2020-06-17 11:25:02', NULL),
(3, 2, 'Bhavin', 'Patel', 'bhavin@silverwebbuzz.com', 'Male', '7887884574', '$2y$10$KD2w8dXIaS.2zl3ZLoh83uY82ANdRJu18ObqX3kqy3TthI0lZ4Mdm', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Advance', NULL, NULL, NULL, 1, '2020-05-10 02:23:43', '2020-07-02 16:11:17', NULL),
(4, 3, 'Gautam', 'Patel', 'gautam@silverwebbuzz.com', 'Male', '7845784578', '$2y$10$VxrxXVS97ciVxWxlT.jj.u4w/nMIvRZxFiv3Nyj1jGMAS7hqSRfrq', 'SITE_LOGIN', NULL, NULL, NULL, NULL, 'profile/1595480497pexels-photo-210019.jpeg', NULL, 1, NULL, NULL, 'J81bV6p8BfaYPbG8JyBLGXYCOdWCKn4uO2Bo7rED7YK9OC5TB5KGKUxdMjL3W75Mx0ZZ9HB5kZfli1atC2NDGAdPMlg6UQQCE5lnW4HMYDlavDcJF3EKBq0M', '1', '[\"1\",\"2\",\"4\",\"5\",\"6\",\"7\",\"8\",\"10\",\"19\",\"22\",\"30\"]', NULL, NULL, 20, '5ft3inch', '28', 'Intermediate', '<p>dsfds</p>', '<p>fds</p>', '<ol>\r\n	<li>fdsfds</li>\r\n	<li>fdsf</li>\r\n	<li>fds</li>\r\n	<li>fds</li>\r\n	<li>fsd</li>\r\n</ol>', 1, '2020-05-12 05:52:50', '2020-08-25 18:01:42', NULL),
(5, 3, 'Sachin', 'Suthar', 'bgautamp.gp912@gmail.com', 'Female', '7845124578', '$2y$10$VxrxXVS97ciVxWxlT.jj.u4w/nMIvRZxFiv3Nyj1jGMAS7hqSRfrq', 'SITE_LOGIN', NULL, NULL, NULL, NULL, 'trainer/Images/1595932103person.png', NULL, 1, NULL, NULL, 'uGXeOsqLtE84G84KXp4iKO7SlN8EYVec818lX5YJvgaJpCGYVwwfw894Zy1kGdk98PyRkYUsWKJL1NA7GOjwEABSPiITKwihkRnLy3r1DFJsusZ7jbDnfrcd', '1', '[\"2\",\"4\"]', NULL, NULL, 28, '1', '29', 'Beginner', '<p>ads</p>', '<p>das</p>', '<p>dasd</p>', 1, '2020-05-12 05:54:14', '2020-07-28 15:58:23', NULL),
(9, 3, 'Hiral', 'Suthar', 'hiral@silverwebbuzz.com', 'Male', '7875457854', '$2y$10$VxrxXVS97ciVxWxlT.jj.u4w/nMIvRZxFiv3Nyj1jGMAS7hqSRfrq', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Advance', NULL, NULL, NULL, 1, '2020-06-03 16:18:45', '2020-07-08 15:44:38', NULL),
(11, 2, 'Manoj', 'Prajapati', 'manoj@silverwebbuzz.com', 'Male', '7845784578', '$2y$10$VxrxXVS97ciVxWxlT.jj.u4w/nMIvRZxFiv3Nyj1jGMAS7hqSRfrq', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'NwsVbcY4JbJKP2uwVeD6vl4xkoRCs3gmnKdA8J4OVWBLeydVNi5uvy5jhJOgYnrCmKA1xix8MJMCscVGLJXQ5W3e57cRsf03GMkmXoaSkzrtFoYZJDPDylw1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Beginner', NULL, NULL, NULL, 0, '2020-06-17 12:02:57', '2020-06-18 17:05:18', NULL),
(12, 2, 'Sachin', 'Suthar', 'sachin@silverwebbuzz.com', 'Male', '7046587954', '$2y$10$xXJju5MhLwpUv01o3KY7ne/Iys26rPojtMnix5DrJ1/FaiNV86Wwe', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Intermediate', NULL, NULL, NULL, 1, '2020-07-09 17:08:52', '2020-07-09 17:09:18', '2020-07-09 17:09:18'),
(13, 3, 'Bhavin', 'Patel', 'bhavin78@silverwebbuzz.com', 'Male', '7845878979', '$2y$10$kPQRBdsyOzNAFUCd2u.kce6McL8LjKmktheaRVWD914/4p.5l1bnW', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Advance', NULL, NULL, NULL, 1, '2020-07-09 17:10:08', '2020-08-11 16:48:09', NULL),
(14, 2, 'Test', 'test', 'testt@gmail.com', 'Male', '7879787897', '$2y$10$tnTjQ5KbTui.HUYrONAb/OqviKGdEtK1FeXNg7XwM71YtMrhpC1JO', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'pWgocZqWOhVaUdyP8roEhQbpzo1qJJyPY2mDoL9QBoopYx3wbXFSUCSOJoB6e0Xy26jdL1JoEXhTcre928BzXvp3nV18LSv4tkSGt1yS5SeQB9eEjqEImGdV', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Intermediate', NULL, NULL, NULL, 0, '2020-07-10 12:30:28', '2020-07-10 12:30:28', NULL),
(16, 2, 'Gautam', '', 'gautam@gmail.com', NULL, NULL, '$2y$10$7uZuLnAbX/2Wej0fEjD3nutPyF34JH7XCctv4gOcs5o2K6AkEf8Ga', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Beginner', NULL, NULL, NULL, 1, '2020-07-23 17:30:32', '2020-07-23 17:30:32', NULL),
(17, 3, 'Bhavin', '', 'bhavin@gmail.com', NULL, NULL, '$2y$10$Yyf2olh9NiwAB64E7Gcz/.vKURZNjNQuwpxoUy0/C/PLfoC9PdSIu', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', NULL, 'trainer/Images/1595507023person.png', 'trainer/Images/1595507023pexels-photo-210019.jpeg', NULL, NULL, NULL, 'Intermediate', NULL, NULL, NULL, 1, '2020-07-23 17:53:43', '2020-07-23 17:53:43', NULL),
(20, 2, 'testt', 'testset', 'eree@gmail.com', NULL, NULL, '$2y$10$2ISfRV/EkxWg7pT88uLLoOaAp9KPAqssjvEzV/Y.QloEgYI6mtMFe', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'b0pPiaLrtxOidlHEt8pQ', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Beginner', NULL, NULL, NULL, 1, '2020-08-13 10:33:38', '2020-08-13 10:33:38', NULL),
(21, 3, 'testset', 'sfsdfd', 'adsds@gmail.com', 'Male', NULL, '$2y$10$V9P5pnhCVfsDsgFuo4v7mOXmkMw7NADyXsL8Vfgj4DdSM5BtSRJP.', 'SITE_LOGIN', NULL, NULL, NULL, NULL, '', NULL, 1, 'sdPpujJMp4NWnUrLAQDs', NULL, NULL, '0', NULL, 'trainer/Images/1597296190person.png', 'trainer/Images/1597296190pexels-photo-210019.jpeg', 28, '5ft8inch', '60', 'Intermidate', NULL, NULL, NULL, 1, '2020-08-13 10:53:10', '2020-08-17 10:22:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_chat_trainer`
--

CREATE TABLE `user_chat_trainer` (
  `id` bigint(20) NOT NULL,
  `property_content_id` bigint(20) DEFAULT NULL,
  `from_user` bigint(20) NOT NULL,
  `to_user` bigint(20) NOT NULL,
  `message` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = unread, 1 = Read',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_chat_trainer`
--

INSERT INTO `user_chat_trainer` (`id`, `property_content_id`, `from_user`, `to_user`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 2, 'hello panos', 1, '2020-07-06 07:34:19', '2020-08-25 18:23:31'),
(2, 2, 4, 2, 'hello, how can I help you?', 1, '2020-07-06 07:34:40', '2020-08-25 18:23:31'),
(3, 2, 4, 5, 'hello, how can I help you?', 1, '2020-07-27 07:34:40', '2020-07-28 15:57:43'),
(4, NULL, 5, 4, 'Hii', 1, '2020-07-27 03:16:30', '2020-08-25 18:13:11'),
(5, NULL, 4, 5, 'Hi', 1, '2020-07-27 03:28:04', '2020-07-28 15:57:43'),
(6, NULL, 5, 4, 'How are you\r\n', 1, '2020-07-27 03:28:04', '2020-08-25 18:13:11'),
(7, NULL, 4, 5, 'Hi', 1, '2020-07-27 03:56:38', '2020-07-28 15:57:43'),
(8, NULL, 4, 5, 'How can i help', 1, '2020-07-27 04:00:29', '2020-07-28 15:57:43'),
(9, NULL, 4, 5, 'Yes', 1, '2020-07-27 04:01:24', '2020-07-28 15:57:43'),
(10, NULL, 5, 4, 'I have workout for yoga', 1, '2020-07-27 04:02:47', '2020-08-25 18:13:11'),
(11, NULL, 5, 4, 'Hi', 1, '2020-07-27 05:22:08', '2020-08-25 18:13:11'),
(12, NULL, 4, 5, 'Hii', 1, '2020-07-27 05:29:18', '2020-07-28 15:57:43'),
(13, NULL, 4, 5, 'Hi', 1, '2020-07-27 05:32:12', '2020-07-28 15:57:43'),
(14, NULL, 5, 4, 'dsadsadsa', 1, '2020-07-27 05:33:13', '2020-08-25 18:13:11'),
(15, NULL, 4, 5, 'Hi', 1, '2020-07-27 05:40:44', '2020-07-28 15:57:43'),
(16, NULL, 4, 5, 'How are you', 1, '2020-07-27 05:41:13', '2020-07-28 15:57:43'),
(17, NULL, 5, 4, 'I am fine and you', 1, '2020-07-27 05:41:23', '2020-08-25 18:13:11'),
(18, NULL, 4, 5, 'Good', 1, '2020-07-27 05:41:32', '2020-07-28 15:57:43'),
(19, NULL, 4, 5, 'Hii', 1, '2020-07-28 10:46:25', '2020-07-28 15:57:43'),
(20, NULL, 4, 5, 'How are you', 1, '2020-07-28 11:00:13', '2020-07-28 15:57:43'),
(21, NULL, 5, 4, 'Hii', 1, '2020-07-28 11:13:24', '2020-08-25 18:13:11'),
(22, NULL, 4, 5, 'How are you', 1, '2020-07-28 11:26:11', '2020-07-28 15:57:43'),
(23, NULL, 5, 4, 'Hiiiii', 1, '2020-07-28 11:26:36', '2020-08-25 18:13:11'),
(24, NULL, 4, 5, 'fdsydsuyfgdsdsdsfs', 1, '2020-07-28 11:29:25', '2020-07-28 15:57:43'),
(25, NULL, 4, 5, 'fdsfdsdsfsffsfdsf', 1, '2020-07-28 11:30:34', '2020-07-28 15:57:43'),
(26, NULL, 5, 4, 'sadasdadsa', 1, '2020-07-28 11:30:39', '2020-08-25 18:13:11'),
(27, NULL, 4, 5, 'werewrwewer', 1, '2020-07-28 11:30:47', '2020-07-28 15:57:43'),
(28, NULL, 5, 4, 'qweqweqeqw', 1, '2020-07-28 11:30:49', '2020-08-25 18:13:11'),
(29, NULL, 4, 5, '1312323123123', 1, '2020-07-28 11:30:58', '2020-07-28 15:57:43'),
(30, NULL, 5, 4, 'adsddadadsa', 1, '2020-07-28 11:31:00', '2020-08-25 18:13:11'),
(31, NULL, 4, 5, 'sadsa', 1, '2020-07-28 11:46:55', '2020-07-28 15:57:43'),
(32, NULL, 4, 5, 'fdg', 1, '2020-07-28 11:48:12', '2020-07-28 15:57:43'),
(33, NULL, 4, 5, 'sdfsds', 1, '2020-07-28 11:49:21', '2020-07-28 15:57:43'),
(34, NULL, 4, 5, 'dfsfd', 1, '2020-07-28 11:51:21', '2020-07-28 15:57:43'),
(35, NULL, 5, 4, 'sdfdsf', 1, '2020-07-28 11:51:46', '2020-08-25 18:13:11'),
(36, NULL, 4, 5, 'Hii', 1, '2020-07-28 12:30:15', '2020-07-28 15:57:43'),
(37, NULL, 4, 5, 'sdfsdfds', 1, '2020-07-28 02:47:03', '2020-07-28 15:57:43'),
(38, NULL, 4, 5, 'adssa', 1, '2020-07-28 02:48:31', '2020-07-28 15:57:43'),
(39, NULL, 5, 4, 'qweqwqw', 1, '2020-07-28 02:48:41', '2020-08-25 18:13:11'),
(40, NULL, 5, 4, 'asdsdasa', 1, '2020-07-28 02:49:07', '2020-08-25 18:13:11'),
(41, NULL, 4, 5, 'qweqw', 1, '2020-07-28 02:49:14', '2020-07-28 15:57:43'),
(42, NULL, 5, 4, 'asdsa', 1, '2020-07-28 02:49:15', '2020-08-25 18:13:11'),
(43, NULL, 4, 5, 'asdsad', 1, '2020-07-28 03:09:56', '2020-07-28 15:57:43'),
(44, NULL, 5, 4, 'asddsadsad', 1, '2020-07-28 03:09:59', '2020-08-25 18:13:11'),
(45, NULL, 4, 5, 'asd', 1, '2020-07-28 03:10:11', '2020-07-28 15:57:43'),
(46, NULL, 4, 2, 'sfdsfs', 1, '2020-07-28 03:12:01', '2020-08-25 18:23:31'),
(47, NULL, 4, 5, 'Hiii', 1, '2020-08-13 09:41:15', '2020-08-13 09:41:15'),
(48, NULL, 4, 2, 'Hii', 1, '2020-08-13 09:41:34', '2020-08-25 18:23:31'),
(49, NULL, 4, 5, 'Hii', 1, '2020-08-13 09:41:53', '2020-08-13 09:41:53'),
(50, NULL, 4, 2, 'Hii', 1, '2020-08-13 09:42:25', '2020-08-25 18:23:31'),
(51, NULL, 4, 2, 'How are you', 1, '2020-08-25 06:00:10', '2020-08-25 18:23:31'),
(52, NULL, 4, 5, 'Hiii', 1, '2020-08-25 06:00:17', '2020-08-25 06:00:17'),
(53, NULL, 2, 4, 'dsfdssfsd', 1, '2020-08-25 06:11:09', '2020-08-25 18:25:50'),
(54, NULL, 2, 4, 'hijih', 1, '2020-08-25 06:12:04', '2020-08-25 18:25:50'),
(55, NULL, 4, 2, 'sadsa', 1, '2020-08-25 06:12:14', '2020-08-25 18:23:31'),
(56, NULL, 2, 4, 'sadd', 1, '2020-08-25 06:12:19', '2020-08-25 18:25:50'),
(57, NULL, 4, 2, 'dfg', 1, '2020-08-25 06:13:14', '2020-08-25 18:23:31'),
(58, NULL, 2, 4, 'dsfdssdf', 1, '2020-08-25 06:13:31', '2020-08-25 18:25:50'),
(59, NULL, 4, 2, 'asdsad', 1, '2020-08-25 06:13:52', '2020-08-25 18:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_trainer_activity`
--

CREATE TABLE `user_trainer_activity` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_trainer_activity`
--

INSERT INTO `user_trainer_activity` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '[\"3\",\"4\",\"5\"]', '2020-07-02 17:35:57', '2020-07-02 17:35:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e-shop`
--
ALTER TABLE `e-shop`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feesmanagement`
--
ALTER TABLE `feesmanagement`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TrainerID` (`TrainerID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_availability`
--
ALTER TABLE `trainer_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_categories`
--
ALTER TABLE `trainer_categories`
  ADD PRIMARY KEY (`trainer_cat_id`);

--
-- Indexes for table `trainer_price_management`
--
ALTER TABLE `trainer_price_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_setting`
--
ALTER TABLE `trainer_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_chat_trainer`
--
ALTER TABLE `user_chat_trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_trainer_activity`
--
ALTER TABLE `user_trainer_activity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `e-shop`
--
ALTER TABLE `e-shop`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feesmanagement`
--
ALTER TABLE `feesmanagement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainer_availability`
--
ALTER TABLE `trainer_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainer_categories`
--
ALTER TABLE `trainer_categories`
  MODIFY `trainer_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `trainer_price_management`
--
ALTER TABLE `trainer_price_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainer_setting`
--
ALTER TABLE `trainer_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_chat_trainer`
--
ALTER TABLE `user_chat_trainer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_trainer_activity`
--
ALTER TABLE `user_trainer_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
