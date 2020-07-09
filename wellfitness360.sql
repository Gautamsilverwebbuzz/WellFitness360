-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 03:17 PM
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
(4, '1 Year', 1, '2020-07-09 17:24:12', '2020-07-09 17:24:12');

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
(3, 'Test', 'test', 'backend/images/ShopImages/1591167588news1.jpg', 'https://www.justdial.com/Ahmedabad/Gym-Discovery-Sarkhej-Road/079PXX79-XX79-200217125129-N1V4_BZDET?xid=QWhtZWRhYmFkIEd5bXM=', 1, '2020-06-03 02:54:14', '2020-06-03 02:54:14', NULL);

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
(1, 'Test Event', '8gXZjJ11', '[\"4\"]', '2020-07-08', '2020-07-09', '<p>ewrew</p>', '1', '2020-07-08 18:04:56', '2020-07-08 18:36:10', NULL),
(2, 'Test event', 'Ya9vJP4o', '[\"4\",\"5\",\"9\"]', '2020-07-10', '2020-07-11', '<p>sdfsddsfdsfds</p>', '1', '2020-07-08 18:32:16', '2020-07-08 18:32:16', NULL),
(3, 'Yoga Event', 'bWSh3t7T', '[\"4\",\"5\",\"9\"]', '2020-07-08', '2020-07-09', '<p>dasdasdsadsadadsad</p>', '1', '2020-07-08 18:43:30', '2020-07-08 18:43:30', NULL),
(4, 'Yoga Event', 'bWSh3t7T', '[\"4\",\"5\",\"9\"]', '2020-07-08', '2020-07-09', '<p>dasdasdsadsadadsad</p>', '1', '2020-07-08 18:43:46', '2020-07-08 18:43:46', NULL),
(5, 'Testq', 'CDUi2VuS', '[\"4\",\"5\",\"9\"]', '2020-07-02', '2020-07-08', '<p>cdsfsd</p>', '1', '2020-07-08 19:04:04', '2020-07-08 19:04:04', NULL),
(6, 'Testq', 'CDUi2VuS', '[\"4\",\"5\",\"9\"]', '2020-07-02', '2020-07-08', '<p>cdsfsd</p>', '1', '2020-07-08 19:04:25', '2020-07-08 19:04:25', NULL),
(7, 'Testq', 'CDUi2VuS', '[\"4\",\"5\",\"9\"]', '2020-07-02', '2020-07-08', '<p>cdsfsd</p>', '1', '2020-07-08 19:04:36', '2020-07-08 19:04:36', NULL);

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
(2, 4, '10000', '5000', '15000', '2020-05-18 09:25:51', '2020-07-02 18:55:35', NULL),
(3, 4, '50001', '1100', '51101', '2020-06-03 12:21:06', '2020-06-03 12:21:39', NULL);

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
(1, 'Training & Nutrition', 3.64, 1, 1, '2020-07-09 18:00:57', '2020-07-09 18:10:47'),
(2, 'Training', 94.44, 1, 1, '2020-07-09 18:01:22', '2020-07-09 18:01:22'),
(3, 'Training & Nutrition', 3.64, 2, 1, '2020-07-09 18:01:46', '2020-07-09 18:01:46'),
(4, 'Training', 94.44, 2, 1, '2020-07-09 18:02:11', '2020-07-09 18:02:11');

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
(1, 'Aerial', 0, 1, '2020-05-14 13:20:16', '2020-05-14 13:20:16'),
(2, 'Acrobatics', 1, 1, '2020-05-14 13:20:57', '2020-05-14 13:20:57'),
(4, 'Hammock', 1, 1, '2020-05-14 13:21:52', '2020-05-14 13:21:52'),
(5, 'Kids', 1, 1, '2020-05-14 13:22:17', '2020-05-14 13:22:17'),
(6, 'Lycra', 1, 1, '2020-05-14 18:53:03', '2020-05-14 18:53:03'),
(7, 'Silks', 1, 1, '2020-05-14 18:53:03', '2020-05-14 18:53:03'),
(8, 'Yoga', 1, 1, '2020-05-14 18:53:27', '2020-05-14 18:53:27'),
(9, 'General', 1, 1, '2020-05-14 18:53:27', '2020-05-14 18:53:27'),
(10, 'Boxing / kickboxing', 0, 1, '2020-05-14 13:24:13', '2020-05-14 13:24:13'),
(11, 'Boxing', 10, 1, '2020-05-14 18:56:32', '2020-05-14 18:56:32'),
(12, 'Fundamentals', 10, 1, '2020-05-14 18:56:32', '2020-05-14 18:56:32'),
(13, 'Kickboxing', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(14, 'Power boxing', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(15, 'Power kickboxing', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(16, 'Sparring', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(17, 'Wrestling', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
(18, 'General', 10, 1, '2020-05-14 18:57:58', '2020-05-14 18:57:58'),
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
(35, 'Bodybuilding', 34, 1, '2020-05-14 13:44:41', '2020-05-14 13:44:41'),
(36, 'test', 7, 1, '2020-06-03 12:20:29', '2020-06-03 12:20:29'),
(43, 'Gautam', 0, 1, '2020-07-03 10:58:16', '2020-07-03 10:58:16');

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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = true ,0=false',
  `verified_token` longtext DEFAULT NULL,
  `remember_token` longtext DEFAULT NULL,
  `tranier_approved` enum('1','0') NOT NULL DEFAULT '0' COMMENT '"1 For approved","0 for unapproved"',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Active , 0=Pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `sur_name`, `email`, `gender`, `contact_no`, `password`, `auth_provider`, `facebook_id`, `facebook_token`, `google_id`, `google_token`, `profile_image`, `social_profile_image`, `email_verified_at`, `email_verified`, `verified_token`, `remember_token`, `tranier_approved`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Admin', NULL, 'admin@admin.com', '1', NULL, '$2y$10$qfC743J0Panr0qCBrZVwj.chmClfouNMmQrC1da.6XXr1UCRYVzWC', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'cnZGJRPgbh1vlZWJijqD7qPLZGuZ5bytRvNuxtom410o5c8YZx678LpoOl62UpIYQdZClzpQnUsS3aqKrw81puU7CLgBbYLAvuwh8aA3xGlSmEuOPRpbemlP', NULL, '0', 0, '2020-05-09 08:29:33', '2020-06-26 11:00:20', NULL),
(2, 2, 'Manoj', 'Prajapati', 'manoj1@silverwebbuzz.com', 'Male', '8785458754', '$2y$10$idB7frjqy9G3Pd821SyQ..b80Sqrg7GaebO8HdlZidxIFWGIFVNnG', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '0', 1, '2020-05-09 22:57:38', '2020-06-17 11:25:02', NULL),
(3, 2, 'Bhavin', 'Patel', 'bhavin@silverwebbuzz.com', 'Male', '7887884574', '$2y$10$KD2w8dXIaS.2zl3ZLoh83uY82ANdRJu18ObqX3kqy3TthI0lZ4Mdm', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '0', 1, '2020-05-10 02:23:43', '2020-07-02 16:11:17', NULL),
(4, 3, 'Gautam', 'Patel', 'gautam@silverwebbuzz.com', 'Male', '7845784578', '$2y$10$4gTw8J1g5v491IY8tTpVB.flhxLWw3pckinfqMQIT3zBkv5aWP9xq', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'RO54X1cNwh97dDAJNUITysautdEmUmpk782NVL7Z62OqWPqEGcg7Z4yHU1MPg5svCutpqMQHXa1OneUJ5GQzoF53l5dqmoWdtaYVapqaiVQRqjKfFwFjQwWp', '1', 1, '2020-05-12 05:52:50', '2020-07-09 10:18:17', NULL),
(5, 3, 'Sachin', 'Suthar', 'bgautamp.gp912@gmail.com', 'Female', '7845124578', '$2y$10$BoS3GuP27GmXZvcOH.UP7OxmwlBPLHX4OIK7I2DaiC3MWvxFbGQG6', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '1', 1, '2020-05-12 05:54:14', '2020-07-08 17:10:52', NULL),
(9, 3, 'Hiral', 'Suthar', 'hiral@silverwebbuzz.com', 'Male', '7875457854', '$2y$10$FSjiWi.g1jEEoo0A4PVxrORCF1yKxmbU68biRAxooMR.FZy.s8Zxe', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '1', 1, '2020-06-03 16:18:45', '2020-07-08 15:44:38', NULL),
(11, 2, 'Manoj', 'Prajapati', 'manoj@silverwebbuzz.com', 'Male', '7845784578', '$2y$10$QXBoSue.YR1atrovd/Bg..4w4iAAs7x0eaMyLMk/mu9jupaiWCIS6', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 07:13:54', 1, 'NwsVbcY4JbJKP2uwVeD6vl4xkoRCs3gmnKdA8J4OVWBLeydVNi5uvy5jhJOgYnrCmKA1xix8MJMCscVGLJXQ5W3e57cRsf03GMkmXoaSkzrtFoYZJDPDylw1', NULL, '0', 0, '2020-06-17 12:02:57', '2020-06-18 17:05:18', NULL),
(12, 2, 'Sachin', 'Suthar', 'sachin@silverwebbuzz.com', 'Male', '7046587954', '$2y$10$xXJju5MhLwpUv01o3KY7ne/Iys26rPojtMnix5DrJ1/FaiNV86Wwe', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '0', 1, '2020-07-09 17:08:52', '2020-07-09 17:09:18', '2020-07-09 17:09:18'),
(13, 3, 'Bhavin', 'Patel', 'bhavin78@silverwebbuzz.com', 'Male', '7845878979', '$2y$10$kPQRBdsyOzNAFUCd2u.kce6McL8LjKmktheaRVWD914/4p.5l1bnW', 'SITE_LOGIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '0', 1, '2020-07-09 17:10:08', '2020-07-09 17:10:08', NULL);

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
(1, '[\"3\",\"4\",\"9\",\"5\",\"2\"]', '2020-07-02 17:35:57', '2020-07-02 17:35:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `trainer_categories`
--
ALTER TABLE `trainer_categories`
  ADD PRIMARY KEY (`trainer_cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

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
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feesmanagement`
--
ALTER TABLE `feesmanagement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainer_categories`
--
ALTER TABLE `trainer_categories`
  MODIFY `trainer_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
