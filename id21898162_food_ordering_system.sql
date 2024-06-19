-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2024 at 06:19 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21898162_food_ordering_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `fullname` varchar(255) NOT NULL COMMENT 'Fullname of Admin will be shown here',
  `username` varchar(255) NOT NULL COMMENT 'Unique Admin name will be shown here',
  `email` varchar(255) NOT NULL COMMENT 'email ID will be a Primary Key',
  `password` varchar(255) NOT NULL COMMENT 'Hash Algorithm will be used for Passwords',
  `Address` varchar(255) NOT NULL COMMENT 'Address of the Users',
  `datetime` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`fullname`, `username`, `email`, `password`, `Address`, `datetime`) VALUES
('Aditya M Patel', 'Admin', 'pateladitya130102@gmail.com', '$2y$10$O1/MWlnhh.MEvpW4ARANOuid1FommCLlRgahPTcvsPvJHD4KHvRDC', 'Aditya Bunglows, Gebi Lake View, Modasa', '2023-04-07 09:13:01.000000'),
('Dakshesh Prajapati', 'Admin Dax', 'prajapatidaxesh0001@gmail.com', '$2y$10$YMFtrbUVbo6yIMhftJ.b/ObZDbKDA/W3k6FFit.VVe1iQtGyEbg.G', 'D-4 Citycenter, Shampur, Modasa', '2023-04-07 12:04:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(3) NOT NULL COMMENT 'Category ID to handle primary functions.',
  `Category_Name` varchar(255) NOT NULL COMMENT 'To differentiate names of food category , IT is given a primary Key.',
  `Category_Image` varchar(255) NOT NULL COMMENT 'The Image of the Category.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Category_Image`) VALUES
(1, 'Pizza', ''),
(2, 'Garlic Bread', ''),
(3, 'Burger', ''),
(4, 'Pasta', ''),
(5, 'Spaghetti', ''),
(6, 'Hotdog', ''),
(7, 'Sandwich', ''),
(8, 'Quesadillas', ''),
(9, 'Tacos', ''),
(10, 'South Indian Food', ''),
(11, 'Beverages', ''),
(12, 'Dessert', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tbl`
--

CREATE TABLE `feedback_tbl` (
  `feedback_ID` int(255) NOT NULL COMMENT 'unique key of Feedback as feedback_ID',
  `email` varchar(255) NOT NULL COMMENT 'Only one Feedback would be given as it is a primary key',
  `username` varchar(255) NOT NULL COMMENT 'username will be unique',
  `feedback_type` varchar(255) NOT NULL COMMENT 'type of feedback the user would like to give',
  `feedback_msg` varchar(255) NOT NULL COMMENT 'Actual message that want to be given as Feedback',
  `suggestions` varchar(255) NOT NULL COMMENT 'suggestion regarding website or food that user want to convey',
  `feedback_dt` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_ordered`
--

CREATE TABLE `food_ordered` (
  `food_ord_id` int(11) NOT NULL COMMENT 'ID will be shown here',
  `food_item` varchar(255) NOT NULL COMMENT 'Name of food item',
  `food_qty` int(3) NOT NULL COMMENT 'Item quantity (no. of items)',
  `food_price` float NOT NULL COMMENT 'Price of food item',
  `food_ord_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_ordered`
--

INSERT INTO `food_ordered` (`food_ord_id`, `food_item`, `food_qty`, `food_price`, `food_ord_time`) VALUES
(1, 'Supreme Garlic Bread', 1, 100, '2023-06-03 03:33:13.287293'),
(1, 'Double Quarter Pounder', 2, 180, '2023-06-03 03:33:13.292262'),
(1, 'Paneer Mint Quesadillas', 1, 225, '2023-06-03 03:33:13.297805'),
(1, 'Idli', 3, 75, '2023-06-03 03:33:13.309564'),
(2, 'Supreme Garlic Bread', 2, 100, '2023-06-03 03:34:16.244695'),
(2, 'Cheese Deluxe', 3, 190, '2023-06-03 03:34:16.256464'),
(2, 'Paneer Tikka Masala Veg', 1, 200, '2023-06-03 03:34:16.261135'),
(2, 'Farm Villa Pizza', 3, 250, '2023-06-03 03:34:16.272660'),
(3, 'Supreme Garlic Bread', 3, 100, '2023-06-03 04:00:53.725604'),
(4, 'Farm Villa Pizza', 1, 250, '2023-06-03 04:10:14.124334'),
(4, 'Masala Galic Sticks', 2, 200, '2023-06-03 04:10:14.135634'),
(4, 'Milisto Cheese Salads', 5, 170, '2023-06-03 04:10:14.140104'),
(4, 'Moroccan Spice Pasta Veg', 2, 150, '2023-06-03 04:10:14.150496'),
(4, 'Veg Spaghetti Pesto', 2, 250, '2023-06-03 04:10:14.154935'),
(4, 'Mix Veggie Jumbo hotdog', 5, 150, '2023-06-03 04:10:14.159609'),
(4, 'Tangy Chatkas Sandwich', 6, 150, '2023-06-03 04:10:14.162478'),
(4, 'Green Cherry Quesadillas', 2, 150, '2023-06-03 04:10:14.165124'),
(4, 'Marinated Paneer Tacos', 5, 115, '2023-06-03 04:10:14.173566'),
(4, 'Dosa', 1, 150, '2023-06-03 04:10:14.181814'),
(4, 'Traditional Tea', 1, 55, '2023-06-03 04:10:14.187761'),
(4, 'Latte Coffee', 5, 60, '2023-06-03 04:10:14.190789'),
(4, 'Adiax Special Milkshake', 5, 200, '2023-06-03 04:10:14.195599'),
(4, 'Pomegranate Juice', 5, 135, '2023-06-03 04:10:14.200026'),
(4, 'Pulpy Milladis', 3, 255, '2023-06-03 04:10:14.202800'),
(5, 'Iced Tea Coffee', 3, 35, '2023-06-03 08:27:07.245405'),
(5, 'Chocolatey-Daxito', 1, 150, '2023-06-03 08:27:07.249783'),
(5, 'Jalapenos & Olives Pizza', 3, 125, '2023-06-03 08:27:07.253461'),
(5, 'Masala Papad Tacos', 2, 85, '2023-06-03 08:27:07.258807'),
(6, 'Oreo Milkshake', 1, 165, '2023-06-03 09:13:39.710331'),
(7, 'Milisto Cheese Salads', 1, 170, '2023-06-03 10:30:37.991551'),
(7, 'Mix Veggie Jumbo hotdog', 1, 150, '2023-06-03 10:30:37.995414'),
(7, 'Special Adiax Sandwich', 1, 150, '2023-06-03 10:30:37.999377'),
(7, 'thin fried Quesadillas', 1, 175, '2023-06-03 10:30:38.005169'),
(7, 'Masala Papad Tacos', 1, 85, '2023-06-03 10:30:38.011219'),
(7, 'Dosa', 1, 150, '2023-06-03 10:30:38.023467'),
(7, 'Idli', 2, 75, '2023-06-03 10:30:38.028948'),
(7, 'Mendu Vada', 1, 85, '2023-06-03 10:30:38.032640'),
(7, 'Uttapam', 1, 90, '2023-06-03 10:30:38.036235'),
(7, 'Blueberry Milkshake', 1, 170, '2023-06-03 10:30:38.045479'),
(7, 'Pulpy Milladis', 1, 255, '2023-06-03 10:30:38.050940'),
(8, 'Corn Stuffed Garlic Bread', 1, 150, '2023-06-03 13:00:10.012497'),
(8, 'Milisto Cheese Salads', 2, 170, '2023-06-03 13:00:10.019090'),
(9, 'Supreme Garlic Bread', 1, 100, '2023-06-03 13:01:06.088144'),
(9, 'Cheese Deluxe', 2, 190, '2023-06-03 13:01:06.100624'),
(12, 'Cheese Deluxe', 2, 190, '2023-06-03 13:11:36.878511'),
(13, 'Supreme Garlic Bread', 1, 100, '2023-06-03 13:30:25.469225'),
(13, 'Pulpy Milladis', 3, 255, '2023-06-03 13:30:25.473271'),
(14, 'Garden Special Pizza', 1, 235, '2023-06-03 13:37:21.305968'),
(14, 'Tangy Chatkas Sandwich', 2, 150, '2023-06-03 13:37:21.309742'),
(14, 'Marinated Paneer Tacos', 1, 115, '2023-06-03 13:37:21.313635'),
(15, 'Cheesy Garlic Bread', 2, 90, '2023-06-03 13:40:32.824812'),
(16, 'Supreme Garlic Bread', 1, 100, '2023-06-03 13:41:54.255735'),
(16, 'Jalapenos, Corns & Paneer', 2, 150, '2023-06-03 13:41:54.405027'),
(17, 'Paneer Tikka Butter Masala', 2, 299, '2023-06-03 13:53:06.439389'),
(17, 'Royal-Adiax', 1, 300, '2023-06-03 13:53:06.442903'),
(18, 'Corn Stuffed Garlic Bread', 2, 150, '2023-06-03 13:59:21.447335'),
(18, 'Chocolatey-Daxito', 2, 150, '2023-06-03 13:59:21.451133'),
(19, 'Masala Galic Sticks', 1, 200, '2023-06-03 14:02:34.605950'),
(19, 'Dosa', 2, 150, '2023-06-03 14:02:34.616958'),
(20, 'Paneer Stuffed Garlic Bread', 2, 165, '2023-06-03 14:04:16.591411'),
(20, 'Mexicana Pasta Veg', 1, 265, '2023-06-03 14:04:16.597550'),
(21, 'Cheesy Garlic Bread', 1, 90, '2023-06-03 14:05:30.692436'),
(21, 'Supreme Toasty Sandwich', 2, 130, '2023-06-03 14:05:30.697855'),
(22, 'Garden Special Pizza', 2, 235, '2023-06-03 14:58:06.977244'),
(22, 'Idli', 1, 75, '2023-06-03 14:58:06.983141'),
(23, 'Paneer Stuffed Garlic Bread', 1, 165, '2023-06-03 23:42:07.900005'),
(23, 'Coconut water', 1, 90, '2023-06-03 23:42:07.903335'),
(24, 'Corn Stuffed Garlic Bread', 1, 150, '2023-06-04 00:07:11.758215'),
(24, 'Oreo Milkshake', 2, 165, '2023-06-04 00:07:11.761485'),
(25, 'Corn Stuffed Garlic Bread', 1, 150, '2023-06-04 10:16:22.028782'),
(25, 'Cheese Duet', 1, 200, '2023-06-04 10:16:22.032277'),
(26, 'Farm Villa Pizza', 2, 250, '2023-06-04 10:17:56.867375'),
(27, 'Paneer Stuffed Garlic Bread', 1, 165, '2023-06-04 11:01:49.372911'),
(27, 'Paneer Tikka Butter Masala', 3, 299, '2023-06-04 11:01:49.376113'),
(27, 'Supreme Toasty Sandwich', 1, 130, '2023-06-04 11:01:49.379683'),
(28, 'Country Side Pizza', 1, 250, '2023-06-04 12:11:39.462746'),
(28, 'Cheese Duet', 1, 200, '2023-06-04 12:11:39.479745'),
(28, 'Pulpy Milladis', 2, 255, '2023-06-04 12:11:39.486723'),
(28, 'Blackberry-Coconut Mousse', 1, 95, '2023-06-04 12:11:39.506273'),
(29, 'Supreme Garlic Bread', 2, 100, '2023-06-05 08:21:21.633722'),
(30, 'Farm Villa Pizza', 2, 250, '2023-06-05 08:26:39.667831'),
(31, 'Farm Villa Pizza', 3, 250, '2023-06-05 08:27:50.259108'),
(32, 'Supreme Garlic Bread', 3, 100, '2023-06-05 08:29:22.000414'),
(36, 'Farm Villa Pizza', 3, 250, '2023-06-05 09:47:26.796838'),
(37, 'Tandoori Paneer Pizza', 2, 290, '2023-06-09 15:07:43.182004'),
(38, 'English Retreat Pizza', 3, 300, '2023-07-01 00:05:00.971196'),
(39, 'English Retreat Pizza', 3, 300, '2023-07-05 22:33:33.213600'),
(40, 'English Retreat Pizza', 3, 300, '2023-07-05 22:35:49.936824'),
(40, 'Triplets veggie', 2, 300, '2023-07-05 22:35:49.940601'),
(40, 'Paneer Tikka Masala Veg', 1, 200, '2023-07-05 22:35:49.946416'),
(40, 'Masala Galic Sticks', 1, 200, '2023-07-05 22:35:49.951802'),
(40, 'olio-spaghetti', 1, 290, '2023-07-05 22:35:49.956041'),
(40, 'Green Veg toasty hotdog', 1, 75, '2023-07-05 22:35:49.960005'),
(40, 'Special Adiax Sandwich', 1, 150, '2023-07-05 22:35:49.965369'),
(40, 'Tangy Spicy Quesadillas', 2, 200, '2023-07-05 22:35:49.971041'),
(40, 'Crunchy Tacos', 1, 90, '2023-07-05 22:35:49.975432'),
(40, 'Dosa', 2, 150, '2023-07-05 22:35:49.979811'),
(40, 'Idli', 2, 75, '2023-07-05 22:35:49.995418'),
(40, 'Mendu Vada', 1, 85, '2023-07-05 22:35:49.999160'),
(40, 'Uttapam', 1, 90, '2023-07-05 22:35:50.004536'),
(40, 'Cinnamon Tea', 1, 20, '2023-07-05 22:35:50.010667'),
(40, 'Flat White Coffee', 1, 65, '2023-07-05 22:35:50.014234'),
(40, 'Adiax Special Milkshake', 1, 200, '2023-07-05 22:35:50.017994'),
(40, 'Pomegranate Juice', 1, 135, '2023-07-05 22:35:50.022881'),
(40, 'Royal-Adiax', 1, 300, '2023-07-05 22:35:50.028283'),
(43, 'Pulpy Milladis', 4, 255, '2023-07-05 23:09:49.224713'),
(43, 'Crispy Krisnoors', 2, 130, '2023-07-05 23:09:49.238748'),
(44, 'Pulpy Milladis', 5, 255, '2023-07-05 23:16:31.099126'),
(49, 'Cheese Duet', 5, 200, '2023-07-05 23:37:34.472288'),
(50, 'Corn Stuffed Garlic Bread', 5, 150, '2023-07-05 23:38:50.737721'),
(51, 'Idli', 3, 75, '2023-07-05 23:40:50.695622'),
(52, 'Corn Stuffed Garlic Bread', 7, 150, '2023-07-05 23:41:46.034789'),
(53, 'Onions & Capsicum Pizza', 9, 185, '2023-07-05 23:43:34.996289'),
(54, 'Garlic Bread Sticks', 13, 125, '2023-07-05 23:44:57.376755'),
(55, 'Mendu Vada', 30, 85, '2023-07-05 23:46:06.555460'),
(56, 'Mix Veggie Jumbo hotdog', 1, 150, '2023-07-07 20:47:37.410828'),
(56, 'Big Adiax', 2, 150, '2023-07-07 20:47:37.416339'),
(57, 'Big Adiax', 1, 150, '2023-07-07 21:45:35.454189'),
(57, 'Tangy Chatkas Sandwich', 1, 150, '2023-07-07 21:45:35.534422'),
(57, 'Dosa', 6, 150, '2023-07-07 21:45:35.538171'),
(57, 'Mendu Vada', 7, 85, '2023-07-07 21:45:35.542310'),
(58, 'Tandoori Paneer Pizza', 7, 290, '2023-07-12 21:07:53.508118'),
(58, 'Parthico Burger', 1, 150, '2023-07-12 21:07:53.514951'),
(59, 'Pulpy Milladis', 2, 255, '2023-09-08 21:04:43.403445'),
(59, 'Milisto Cheese Salads', 1, 170, '2023-09-08 21:04:43.407351'),
(59, 'Cheezy-7 Pizza', 1, 255, '2023-09-08 21:04:43.410671'),
(60, 'Cheese Daxandro', 4, 110, '2023-12-29 22:06:59.993210'),
(60, 'Cheese Deluxe', 2, 190, '2023-12-29 22:06:59.998747'),
(61, 'Apple Juice', 3, 80, '2024-03-15 22:17:15.958686'),
(61, 'Cheezy-7 Pizza', 1, 255, '2024-03-15 22:17:15.963013'),
(61, 'Big Adiax', 1, 150, '2024-03-15 22:17:15.966790'),
(61, 'Masala Galic Sticks', 1, 200, '2024-03-15 22:17:15.971798'),
(61, 'Moroccan Spice Pasta Veg', 1, 150, '2024-03-15 22:17:15.976689'),
(61, 'Veg Spaghetti Pesto', 1, 250, '2024-03-15 22:17:15.979934'),
(61, 'Mix Veggie Jumbo hotdog', 1, 150, '2024-03-15 22:17:15.984424'),
(61, 'Supreme Toasty Sandwich', 1, 130, '2024-03-15 22:17:15.990952'),
(61, 'Green Cherry Quesadillas', 1, 150, '2024-03-15 22:17:16.000092'),
(61, 'Masala Papad Tacos', 1, 85, '2024-03-15 22:17:16.011043'),
(61, 'Dosa', 1, 150, '2024-03-15 22:17:16.018182'),
(61, 'Traditional Tea', 1, 55, '2024-03-15 22:17:16.023545'),
(61, 'Latte Coffee', 1, 60, '2024-03-15 22:17:16.031191'),
(61, 'Adiax Special Milkshake', 1, 200, '2024-03-15 22:17:16.035519'),
(61, 'Pomegranate Juice', 1, 135, '2024-03-15 22:17:16.039302'),
(61, 'Cranberry juice', 1, 150, '2024-03-15 22:17:16.044461'),
(61, 'Royal-Adiax', 1, 300, '2024-03-15 22:17:16.049505'),
(62, 'Big Adiax', 5, 150, '2024-03-16 16:50:44.855036'),
(63, 'Cheese Deluxe', 2, 190, '2024-03-16 18:00:51.947269'),
(63, 'Supreme Garlic Bread', 1, 100, '2024-03-16 18:00:51.950086'),
(64, 'Tangy Chatkas Sandwich', 2, 150, '2024-03-16 20:54:31.829127'),
(65, 'Paneer Tikka Butter Masala', 3, 299, '2024-03-30 00:40:59.287296'),
(65, 'Royal-Adiax', 2, 300, '2024-03-30 00:40:59.292265'),
(66, 'Supreme Garlic Bread', 1, 100, '2024-03-30 20:51:14.416146'),
(66, 'Paneer Tikka Masala Veg', 2, 200, '2024-03-30 20:51:14.417162'),
(67, 'Farm Villa Pizza', 2, 250, '2024-03-30 20:51:53.498055'),
(67, 'Idli', 3, 75, '2024-03-30 20:51:53.498828'),
(68, 'Cheese Deluxe', 4, 190, '2024-03-30 20:58:12.976522'),
(68, 'Supreme Toasty Sandwich', 3, 130, '2024-03-30 20:58:12.977295'),
(69, 'Dosa', 3, 150, '2024-03-30 21:09:55.260829'),
(69, 'Cranberry juice', 3, 150, '2024-03-30 21:09:55.261261'),
(70, 'Farm Villa Pizza', 5, 250, '2024-03-30 21:11:38.520593'),
(70, 'Paneer Tikka Garlic Bread', 1, 125, '2024-03-30 21:11:38.521271'),
(71, 'Supreme Garlic Bread', 2, 100, '2024-03-30 21:40:09.891538'),
(71, 'scotchy Apple-pie', 3, 200, '2024-03-30 21:40:09.892247'),
(72, 'Cheese Deluxe', 3, 190, '2024-03-30 21:47:08.462125'),
(72, 'Cheese Duet', 4, 200, '2024-03-30 21:47:08.462558'),
(73, 'Supreme Garlic Bread', 2, 100, '2024-03-30 21:51:21.082647'),
(73, 'Triplets veggie', 3, 300, '2024-03-30 21:51:21.083287'),
(74, 'salty tangy Tacos', 3, 75, '2024-03-30 22:03:11.067970'),
(74, 'Crispy Mozarella Sandwich', 2, 145, '2024-03-30 22:03:11.068592'),
(74, 'Pulpy Milladis', 3, 255, '2024-03-30 22:03:11.069143'),
(75, 'Cheese Deluxe', 3, 190, '2024-03-30 22:04:08.392202'),
(76, 'Special Spaghetti', 2, 275, '2024-03-30 22:06:15.543340'),
(77, 'Supreme Garlic Bread', 1, 100, '2024-03-30 22:12:19.504402'),
(78, 'Supreme Garlic Bread', 2, 100, '2024-03-30 22:13:04.079189'),
(78, 'Triplets veggie', 3, 300, '2024-03-30 22:13:04.079970'),
(79, 'Cheese Olives Quesadillas', 5, 190, '2024-03-30 22:23:36.390829'),
(80, 'Idli', 4, 75, '2024-03-30 22:24:43.719606'),
(81, 'Coconut water', 33, 90, '2024-03-30 22:28:33.204555'),
(82, 'Idli', 3, 75, '2024-03-30 22:31:30.499484'),
(82, 'Punjabi da Quesadillas', 1, 185, '2024-03-30 22:31:30.500087'),
(83, 'Idli', 3, 75, '2024-03-30 22:31:54.442542'),
(83, 'Punjabi da Quesadillas', 1, 185, '2024-03-30 22:31:54.443245'),
(84, 'Masala Galic Sticks', 3, 200, '2024-03-30 22:33:57.450544'),
(85, 'Idli', 1, 75, '2024-03-30 22:37:08.104188'),
(86, 'Supreme Garlic Bread', 1, 100, '2024-03-30 22:42:00.682812'),
(86, 'Tangy Chatkas Sandwich', 3, 150, '2024-03-30 22:42:00.683565'),
(87, 'Mix Salad hotdog', 1, 90, '2024-03-30 22:43:37.517233'),
(87, 'Cheese Deluxe', 3, 190, '2024-03-30 22:43:37.517988'),
(88, 'Supreme Garlic Bread', 1, 100, '2024-03-30 22:52:30.004813'),
(89, 'Traditional Tea', 2, 55, '2024-04-01 09:58:49.885613'),
(90, 'Creamy Tomato Pasta Veg', 2, 175, '2024-04-02 03:07:39.632441'),
(91, 'Supreme Garlic Bread', 2, 100, '2024-04-02 03:16:39.211052'),
(92, 'Garlic Bread Sticks', 2, 125, '2024-04-02 03:19:33.581236'),
(93, 'Paneer Tikka Butter Masala', 3, 299, '2024-04-02 03:24:13.235185'),
(94, 'Corn Stuffed Garlic Bread', 1, 150, '2024-04-02 03:29:57.556009'),
(95, 'Cheese Duet', 2, 200, '2024-04-02 03:33:34.799327'),
(96, 'Paneer Tikka Masala Veg', 1, 200, '2024-04-02 03:36:28.151485'),
(97, 'Cheese Deluxe', 2, 190, '2024-04-02 03:37:00.691260'),
(98, 'Supreme Garlic Bread', 4, 100, '2024-04-02 03:42:23.747918'),
(99, 'Cheesy Garlic Bread', 1, 90, '2024-04-02 03:42:39.009710'),
(100, 'Cheese Deluxe', 2, 190, '2024-04-02 03:43:42.868122'),
(101, 'Corn Stuffed Garlic Bread', 2, 150, '2024-04-02 03:50:29.375670'),
(102, 'Cheese Olives Quesadillas', 1, 190, '2024-04-02 03:52:52.013800'),
(103, 'Garlic Bread Sticks', 1, 125, '2024-04-02 03:54:30.972232'),
(104, 'Oreo Milkshake', 1, 165, '2024-04-02 03:58:03.544813'),
(105, 'Cheese Duet', 1, 200, '2024-04-02 04:12:20.504450'),
(106, 'Idli', 1, 75, '2024-04-02 04:13:40.647818'),
(107, 'Coconut water', 1, 90, '2024-04-02 04:14:55.997130'),
(108, 'Plain Garlic Bread', 1, 50, '2024-04-02 04:15:48.335482'),
(108, 'Paneer Tikka Masala Veg', 1, 200, '2024-04-02 04:15:48.336164'),
(109, 'Cheesy Garlic Bread', 1, 90, '2024-04-02 04:16:54.020754'),
(110, 'Corn Stuffed Garlic Bread', 3, 150, '2024-04-02 04:19:33.135131');

-- --------------------------------------------------------

--
-- Table structure for table `food_payment`
--

CREATE TABLE `food_payment` (
  `pay_ID` int(5) NOT NULL COMMENT 'ID of payment that is done',
  `username` varchar(255) NOT NULL COMMENT 'username will be shown here.',
  `email` varchar(255) NOT NULL COMMENT 'email will be shown here.',
  `pay_amount` float NOT NULL COMMENT 'Bill amount to be paid',
  `pay_datetime` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_payment`
--

INSERT INTO `food_payment` (`pay_ID`, `username`, `email`, `pay_amount`, `pay_datetime`) VALUES
(1, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 03:33:13.000000'),
(2, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 03:34:16.000000'),
(3, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 04:00:53.000000'),
(4, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 04:10:14.000000'),
(5, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 08:27:07.000000'),
(6, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 09:13:39.000000'),
(7, 'Nimishaben', 'nimisha220570@gmail.com', 0, '2023-06-03 10:30:37.000000'),
(8, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 13:00:09.000000'),
(9, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 13:01:06.000000'),
(12, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 13:11:36.000000'),
(13, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 13:30:25.000000'),
(14, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 13:37:21.000000'),
(15, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 13:40:32.000000'),
(16, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 13:41:54.000000'),
(17, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 13:53:06.000000'),
(18, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 13:59:21.000000'),
(19, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 14:02:34.000000'),
(20, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 14:04:16.000000'),
(21, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 14:05:30.000000'),
(22, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 14:58:06.000000'),
(23, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-03 23:42:07.000000'),
(24, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-04 00:07:11.000000'),
(25, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-04 10:16:22.000000'),
(26, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-04 10:17:56.000000'),
(27, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-04 11:01:49.000000'),
(28, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-04 12:11:39.000000'),
(29, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-05 08:21:21.000000'),
(30, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-05 08:26:39.000000'),
(31, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-05 08:27:50.000000'),
(32, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-05 08:29:21.000000'),
(33, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-05 08:30:51.000000'),
(34, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-05 08:34:21.000000'),
(35, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-05 09:43:01.000000'),
(36, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-05 09:47:26.000000'),
(37, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-06-09 15:07:43.000000'),
(38, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-01 00:05:00.000000'),
(39, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 22:33:33.000000'),
(40, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 22:35:49.000000'),
(41, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 22:56:25.000000'),
(42, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:00:25.000000'),
(43, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:09:49.000000'),
(44, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:16:31.000000'),
(45, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:20:53.000000'),
(46, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:27:43.000000'),
(47, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:29:59.000000'),
(48, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:31:52.000000'),
(49, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:37:34.000000'),
(50, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:38:50.000000'),
(51, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:40:50.000000'),
(52, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:41:46.000000'),
(53, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:43:34.000000'),
(54, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:44:57.000000'),
(55, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-05 23:46:06.000000'),
(56, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-07 20:47:37.000000'),
(57, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-07 21:45:35.000000'),
(58, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-07-12 21:07:53.000000'),
(59, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-09-08 21:04:43.000000'),
(60, 'Aditya Patel', 'pateladitya130102@gmail.com', 0, '2023-12-29 22:06:59.000000'),
(61, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-15 22:17:15.000000'),
(62, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-16 16:50:44.000000'),
(63, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-16 18:00:51.000000'),
(64, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-16 20:54:31.000000'),
(65, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 00:40:59.000000'),
(66, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 20:51:14.000000'),
(67, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 20:51:53.000000'),
(68, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 20:58:12.000000'),
(69, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 21:09:55.000000'),
(70, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 21:11:38.000000'),
(71, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 21:40:09.000000'),
(72, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 21:47:08.000000'),
(73, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 21:51:21.000000'),
(74, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:03:11.000000'),
(75, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:04:08.000000'),
(76, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:06:15.000000'),
(77, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:12:19.000000'),
(78, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:13:04.000000'),
(79, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:23:36.000000'),
(80, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:24:43.000000'),
(81, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:28:33.000000'),
(82, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:31:30.000000'),
(83, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:31:54.000000'),
(84, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:33:57.000000'),
(85, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:37:08.000000'),
(86, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:42:00.000000'),
(87, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:43:37.000000'),
(88, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-03-30 22:52:29.000000'),
(89, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-01 09:58:49.000000'),
(90, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:07:39.000000'),
(91, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:16:39.000000'),
(92, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:19:33.000000'),
(93, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:24:13.000000'),
(94, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:29:57.000000'),
(95, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:33:34.000000'),
(96, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:36:28.000000'),
(97, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:37:00.000000'),
(98, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:42:23.000000'),
(99, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:42:38.000000'),
(100, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:43:42.000000'),
(101, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:50:29.000000'),
(102, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:52:51.000000'),
(103, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:54:30.000000'),
(104, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 03:58:03.000000'),
(105, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 04:12:20.000000'),
(106, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 04:13:40.000000'),
(107, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 04:14:55.000000'),
(108, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 04:15:48.000000'),
(109, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 04:16:53.000000'),
(110, 'Aditya', 'pateladitya130102@gmail.com', 0, '2024-04-02 04:19:33.000000');

-- --------------------------------------------------------

--
-- Table structure for table `food_product`
--

CREATE TABLE `food_product` (
  `product_id` int(6) NOT NULL COMMENT 'It is the Id of Particular Product',
  `product_image` varchar(255) NOT NULL COMMENT 'Shows the image of a Product',
  `product_name` varchar(255) NOT NULL COMMENT 'Name of Product (food)',
  `product_type` varchar(255) NOT NULL COMMENT 'Type of Product or Category',
  `product_price` float NOT NULL COMMENT 'Price of product (food) in ₹(Rs)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_product`
--

INSERT INTO `food_product` (`product_id`, `product_image`, `product_name`, `product_type`, `product_price`) VALUES
(167, 'images/Big Adiax.png', 'Big Adiax', 'Burger', 150),
(168, 'images/Cheese Daxandro.png', 'Cheese Daxandro', 'Burger', 110),
(169, 'images/Cheese Deluxe.png', 'Cheese Deluxe', 'Burger', 190),
(170, 'images/Double Quarter Pounder.png', 'Double Quarter Pounder', 'Burger', 180),
(171, 'images/Parthico Burger.png', 'Parthico Burger', 'Burger', 150),
(172, 'images/Milisto Cheese Salads.png', 'Milisto Cheese Salads', 'Burger', 170),
(173, 'images/Cheese Duet.png', 'Cheese Duet', 'Burger', 200),
(174, 'images/Triplets veggie.png', 'Triplets veggie', 'Burger', 300),
(175, 'images/Farm Villa Pizza.jpeg', 'Farm Villa Pizza', 'Pizza', 250),
(176, 'images/Garden Special Pizza.png', 'Garden Special Pizza', 'Pizza', 235),
(177, 'images/Spring Fling Pizza.jpeg', 'Spring Fling Pizza', 'Pizza', 260),
(178, 'images/Burn To Hell Pizza.jpeg', 'Burn To Hell Pizza', 'Pizza', 255),
(179, 'images/Cheezy-7 Pizza.jpeg', 'Cheezy-7 Pizza', 'Pizza', 255),
(180, 'images/Korma Paneer Special Pizza.jpeg', 'Korma Paneer Special Pizza', 'Pizza', 275),
(181, 'images/Paneer Tikka Butter Masala.jpeg', 'Paneer Tikka Butter Masala', 'Pizza', 299),
(182, 'images/Pesto & Basil Special Pizza.jpeg', 'Pesto & Basil Special Pizza', 'Pizza', 280),
(183, 'images/Tandoori Paneer Pizza.jpeg', 'Tandoori Paneer Pizza', 'Pizza', 290),
(184, 'images/Gluten Free Margherita.png', 'Gluten Free Margherita', 'Pizza', 185),
(185, 'images/Capsicum & Paneer Pizza.jpeg', 'Capsicum & Paneer Pizza', 'Pizza', 125),
(186, 'images/Spicy Paprika Pizza.jpeg', 'Spicy Paprika Pizza', 'Pizza', 200),
(187, 'images/Country Side Pizza.jpg', 'Country Side Pizza', 'Pizza', 250),
(188, 'images/Jalapenos & Olives Pizza.jpeg', 'Jalapenos & Olives Pizza', 'Pizza', 125),
(189, 'images/Jalapenos, Corns & Paneer.jpeg', 'Jalapenos, Corns & Paneer', 'Pizza', 150),
(190, 'images/Loaded Pesto Pizza.jpeg', 'Loaded Pesto Pizza', 'Pizza', 165),
(191, 'images/Onions & Capsicum Pizza.jpeg', 'Onions & Capsicum Pizza', 'Pizza', 185),
(192, 'images/Garden Delight Pizza.jpeg', 'Garden Delight Pizza', 'Pizza', 185),
(193, 'images/Lovers Bite Pizza.jpeg', 'Lovers Bite Pizza', 'Pizza', 185),
(194, 'images/Veg Tamer Pizza.jpeg', 'Veg Tamer Pizza', 'Pizza', 295),
(195, 'images/Adiax Paneer Pizza.jpeg', 'Adiax Paneer Pizza', 'Pizza', 275),
(196, 'images/Cheese Lovers Pizza.jpeg', 'Cheese Lovers Pizza', 'Pizza', 300),
(197, 'images/Cheesy Macaroni Veg Pizza.jpeg', 'Cheesy Macaroni Veg Pizza', 'Pizza', 285),
(198, 'images/English Retreat Pizza.jpeg', 'English Retreat Pizza', 'Pizza', 300),
(199, 'images/Garlic-to-pizza Pizza.jpeg', 'Garlic-to-pizza Pizza', 'Pizza', 295),
(200, 'images/Hot Passion Pizza.jpeg', 'Hot Passion Pizza', 'Pizza', 315),
(201, 'images/Las Vegas Treat Pizza.jpeg', 'Las Vegas Treat Pizza', 'Pizza', 330),
(202, 'images/Peri Peri Veg Pizza.jpeg', 'Peri Peri Veg Pizza', 'Pizza', 350),
(204, 'images/Paneer Tikka Garlic Bread.jpeg', 'Paneer Tikka Garlic Bread', 'Garlic Bread', 125),
(205, 'images/Supreme Garlic Bread.jpeg', 'Supreme Garlic Bread', 'Garlic Bread', 100),
(206, 'images/Cheesy Garlic Bread.jpeg', 'Cheesy Garlic Bread', 'Garlic Bread', 90),
(207, 'images/Plain Garlic Bread.jpeg', 'Plain Garlic Bread', 'Garlic Bread', 50),
(208, 'images/Paneer Stuffed Garlic Bread.jpeg', 'Paneer Stuffed Garlic Bread', 'Garlic Bread', 165),
(209, 'images/Corn Stuffed Garlic Bread.jpeg', 'Corn Stuffed Garlic Bread', 'Garlic Bread', 150),
(210, 'images/Garlic Bread Sticks.jpeg', 'Garlic Bread Sticks', 'Garlic Bread', 125),
(211, 'images/Masala Galic Sticks.png', 'Masala Galic Sticks', 'Garlic Bread', 200),
(212, 'images/Moroccan Spice Pasta Veg.png', 'Moroccan Spice Pasta Veg', 'Pasta', 150),
(213, 'images/Cheesy Jalapeno Pasta Veg.png', 'Cheesy Jalapeno Pasta Veg', 'Pasta', 160),
(214, 'images/Creamy Tomato Pasta Veg.png', 'Creamy Tomato Pasta Veg', 'Pasta', 175),
(215, 'images/Paneer Tikka Masala Veg.png', 'Paneer Tikka Masala Veg', 'Pasta', 200),
(216, 'images/Italiano Pasta Veg.jpeg', 'Italiano Pasta Veg', 'Pasta', 180),
(217, 'images/Indiana Pasta Veg.jpeg', 'Indiana Pasta Veg', 'Pasta', 275),
(218, 'images/Macaroni & Cheese Veg.jpeg', 'Macaroni & Cheese Veg', 'Pasta', 250),
(219, 'images/Mexicana Pasta Veg.jpeg', 'Mexicana Pasta Veg', 'Pasta', 265),
(220, 'images/Veg Spaghetti Pesto.jpeg', 'Veg Spaghetti Pesto', 'Spaghetti', 250),
(221, 'images/Soupy Sour Spaghetti.jpg', 'Soupy Sour Spaghetti', 'Spaghetti', 260),
(222, 'images/Mix double fry Spaghetti.jpg', 'Mix double fry Spaghetti', 'Spaghetti', 250),
(223, 'images/Spaghetti with Nagli Papads.jpg', 'Spaghetti with Nagli Papads', 'Spaghetti', 275),
(224, 'images/olio-spaghetti.png', 'olio-spaghetti', 'Spaghetti', 290),
(225, 'images/Spaghetti with metaballs.png', 'Spaghetti with metaballs', 'Spaghetti', 300),
(226, 'images/Special Spaghetti.png', 'Special Spaghetti', 'Spaghetti', 275),
(227, 'images/Creamy Veg Spaghetti.jpeg', 'Creamy Veg Spaghetti', 'Spaghetti', 275),
(228, 'images/Green Veg toasty hotdog.png', 'Green Veg toasty hotdog', 'Hotdog', 75),
(229, 'images/Mix Salad hotdog.png', 'Mix Salad hotdog', 'Hotdog', 90),
(230, 'images/Paneer Tika hotdog.png', 'Paneer Tika hotdog', 'Hotdog', 100),
(231, 'images/Mix Veggie Jumbo hotdog.png', 'Mix Veggie Jumbo hotdog', 'Hotdog', 150),
(232, 'images/Special Adiax Sandwich.png', 'Special Adiax Sandwich', 'Sandwich', 150),
(233, 'images/Supreme Toasty Sandwich.png', 'Supreme Toasty Sandwich', 'Sandwich', 130),
(234, 'images/Tangy Chatkas Sandwich.png', 'Tangy Chatkas Sandwich', 'Sandwich', 150),
(235, 'images/Crispy Mozarella Sandwich.png', 'Crispy Mozarella Sandwich', 'Sandwich', 145),
(237, 'images/Cheese Chutney Sandwich.png', 'Cheese Chutney Sandwich', 'Sandwich', 125),
(238, 'images/Ghughra Cheese Grill.png', 'Ghughra Cheese Grill', 'Sandwich', 145),
(239, 'images/Paneer Grilled Sandwich.png', 'Paneer Grilled Sandwich', 'Sandwich', 160),
(240, 'images/Vej Jumbo Sandwich.png', 'Vej Jumbo Sandwich', 'Sandwich', 150),
(241, 'images/Green Cherry Quesadillas.jpg', 'Green Cherry Quesadillas', 'Quesadillas', 150),
(242, 'images/Mix Veg Quesadillas.jpg', 'Mix Veg Quesadillas', 'Quesadillas', 175),
(243, 'images/Cheese Olives Quesadillas.jpeg', 'Cheese Olives Quesadillas', 'Quesadillas', 190),
(244, 'images/Paneer Mint Quesadillas.jpg', 'Paneer Mint Quesadillas', 'Quesadillas', 225),
(245, 'images/Punjabi da Quesadillas.jpeg', 'Punjabi da Quesadillas', 'Quesadillas', 185),
(246, 'images/Tangy Spicy Quesadillas.jpg', 'Tangy Spicy Quesadillas', 'Quesadillas', 200),
(247, 'images/thin fried Quesadillas.jpg', 'thin fried Quesadillas', 'Quesadillas', 175),
(248, 'images/Cheesy Tandoor Quesadillas.jpg', 'Cheesy Tandoor Quesadillas', 'Quesadillas', 180),
(249, 'images/Adiax Crispy Veg Tacos.png', 'Adiax Crispy Veg Tacos', 'Tacos', 80),
(250, 'images/Crispy Paneer Tacos.png', 'Crispy Paneer Tacos', 'Tacos', 70),
(251, 'images/Crunchy Tacos.png', 'Crunchy Tacos', 'Tacos', 90),
(252, 'images/Paneer da pyaaza Tacos.png', 'Paneer da pyaaza Tacos', 'Tacos', 80),
(253, 'images/Marinated Paneer Tacos.png', 'Marinated Paneer Tacos', 'Tacos', 115),
(254, 'images/Masala Papad Tacos.png', 'Masala Papad Tacos', 'Tacos', 85),
(255, 'images/salty tangy Tacos.png', 'salty tangy Tacos', 'Tacos', 75),
(256, 'images/Soft like softy Tacos.png', 'Soft like softy Tacos', 'Tacos', 135),
(257, 'images/Dosa.png', 'Dosa', 'South Indian Food', 150),
(258, 'images/Idli.png', 'Idli', 'South Indian Food', 75),
(259, 'images/Mendu Vada.png', 'Mendu Vada', 'South Indian Food', 85),
(260, 'images/Uttapam.png', 'Uttapam', 'South Indian Food', 90),
(263, 'images/Cinnamon Tea.png', 'Cinnamon Tea', 'Tea', 20),
(264, 'images/Hibiscus Tea.png', 'Hibiscus Tea', 'Tea', 40),
(265, 'images/Traditional Tea.png', 'Traditional Tea', 'Tea', 55),
(266, 'images/Latte Cardimom Tea.png', 'Latte Cardimom Tea', 'Tea', 70),
(267, 'images/Packet Green Tea.png', 'Packet Green Tea', 'Tea', 30),
(268, 'images/Tadka Handi Tea.png', 'Tadka Handi Tea', 'Tea', 50),
(269, 'images/Taj-Elaichi Vali Chai.png', 'Taj-Elaichi Vali Chai', 'Tea', 40),
(270, 'images/Jagga ni Masaledar Chai.png', 'Jagga ni Masaledar Chai', 'Tea', 45),
(271, 'images/Cortado Coffee.png', 'Cortado Coffee', 'Coffee', 30),
(272, 'images/Mocha Coffee.jpg', 'Mocha Coffee', 'Coffee', 40),
(273, 'images/Adiax-Special Coffee.png', 'Adiax-Special Coffee', 'Coffee', 90),
(274, 'images/Latte Coffee.png', 'Latte Coffee', 'Coffee', 60),
(275, 'images/Americano Coffee.png', 'Americano Coffee', 'Coffee', 40),
(276, 'images/Cafe au Lait Coffee.png', 'Cafe au Lait Coffee', 'Coffee', 55),
(277, 'images/Adiax Chocolatey-Coffee.png', 'Adiax Chocolatey-Coffee', 'Coffee', 100),
(278, 'images/Cold Brew Coffee.png', 'Cold Brew Coffee', 'Coffee', 50),
(279, 'images/Macchiato Coffee.png', 'Macchiato Coffee', 'Coffee', 40),
(280, 'images/Iced Tea Coffee.png', 'Iced Tea Coffee', 'Coffee', 35),
(281, 'images/Decaf Coffee.png', 'Decaf Coffee', 'Coffee', 45),
(282, 'images/Flat White Coffee.png', 'Flat White Coffee', 'Coffee', 65),
(292, 'images/Adiax Special Milkshake.jpg', 'Adiax Special Milkshake', 'Milkshakes', 200),
(293, 'images/Strawberry Milkshake.jpg', 'Strawberry Milkshake', 'Milkshakes', 155),
(294, 'images/Oreo Milkshake.jpg', 'Oreo Milkshake', 'Milkshakes', 165),
(295, 'images/Choco-Caramel Milkshake.jpg', 'Choco-Caramel Milkshake', 'Milkshakes', 180),
(296, 'images/Choco Peanut Banana Shake.jpg', 'Choco Peanut Banana Shake', 'Milkshakes', 105),
(297, 'images/Irish Cream Milkshake.jpg', 'Irish Cream Milkshake', 'Milkshakes', 130),
(298, 'images/Autumn Glow Milkshake.jpg', 'Autumn Glow Milkshake', 'Milkshakes', 110),
(299, 'images/Pumpkin Pie Milkshake.jpg', 'Pumpkin Pie Milkshake', 'Milkshakes', 100),
(300, 'images/Choco-Nutella Milkshake.jpg', 'Choco-Nutella Milkshake', 'Milkshakes', 125),
(301, 'images/S Mores Milkshake.jpg', 'S Mores Milkshake', 'Milkshakes', 135),
(302, 'images/Blueberry Milkshake.jpg', 'Blueberry Milkshake', 'Milkshakes', 170),
(303, 'images/Vanilla Special Milkshake.png', 'Vanilla Special Milkshake', 'Milkshakes', 130),
(304, 'images/Apple Juice.png', 'Apple Juice', 'Juice', 80),
(305, 'images/Coconut water.png', 'Coconut water', 'Juice', 90),
(306, 'images/Cranberry juice.png', 'Cranberry juice', 'Juice', 150),
(307, 'images/grape juice.png', 'grape juice', 'Juice', 70),
(308, 'images/Kiwi Juice.jpg', 'Kiwi Juice', 'Juice', 130),
(309, 'images/Papaya Juice.png', 'Papaya Juice', 'Juice', 75),
(310, 'images/Pomegranate Juice.png', 'Pomegranate Juice', 'Juice', 135),
(311, 'images/Orange juice.png', 'Orange juice', 'Juice', 115),
(312, 'images/Royal-Adiax.jpg', 'Royal-Adiax', 'Dessert', 300),
(313, 'images/Pulpy-fruits Velvett.jpg', 'Pulpy-fruits Velvett', 'Dessert', 135),
(314, 'images/Chocolatey-Daxito.jpg', 'Chocolatey-Daxito', 'Dessert', 150),
(315, 'images/scotchy Apple-pie.jpg', 'scotchy Apple-pie', 'Dessert', 200),
(316, 'images/Chocolatey Parthico.jpg', 'Chocolatey Parthico', 'Dessert', 120),
(317, 'images/Frosted Jonio.jpg', 'Frosted Jonio', 'Dessert', 135),
(318, 'images/Pulpy Milladis.jpg', 'Pulpy Milladis', 'Dessert', 255),
(319, 'images/Chipsy Jagris.jpg', 'Chipsy Jagris', 'Dessert', 110),
(320, 'images/Crispy Krisnoors.jpg', 'Crispy Krisnoors', 'Dessert', 130),
(321, 'images/Blackberry-Coconut Mousse.jpg', 'Blackberry-Coconut Mousse', 'Dessert', 95),
(322, 'images/Cranberry choco Mousse.jpg', 'Cranberry choco Mousse', 'Dessert', 155),
(323, 'images/Adiax-special desserts.jpg', 'Adiax-special desserts', 'Dessert', 270),
(329, 'images/Delievery Agents.webp', 'Testname', 'Testtype', 365),
(330, 'images/MSCIT.jpg', 'MSCIT', 'demo', 35),
(333, 'images/Tea.png', 'Tea', 'Beverages', 0),
(334, 'images/Coffee.png', 'Coffee', 'Beverages', 0),
(335, 'images/Milkshakes.jpg', 'Milkshakes', 'Beverages', 0),
(337, 'images/Fruitjuices.png', 'Fruitjuices', 'Beverages', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `fullname` varchar(255) NOT NULL COMMENT 'Fullname of User will be shown here	',
  `username` varchar(255) NOT NULL COMMENT 'Unique User name will be shown here',
  `email` varchar(255) NOT NULL COMMENT '	email ID will be a Primary Key',
  `password` varchar(255) NOT NULL COMMENT 'Hash Algorithm will be used for Passwords',
  `Address` varchar(255) NOT NULL COMMENT 'Address of the Users',
  `datetime` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`fullname`, `username`, `email`, `password`, `Address`, `datetime`) VALUES
('Dakshesh R Prajapati', 'Dax', 'dax@gmail.com', '$2y$10$xFbKOHAVyVfKFZVDEdlFA.vDCDa350beh3wGR/CWIUiyAa1wkSVdW', 'D-4 Citycenter, Shampur, Modasa', '2023-04-07 11:14:19.000000'),
('demo', 'demo', 'demo@gmail.com', '$2y$10$YADGtPENldzgX.iDlBnEoOA8wL.uDS0g0c66g/VQH4Q8KHmG8sHSK', '', '2023-05-26 09:25:59.000000'),
('demoa', 'demoa', 'demoa@gmail.com', '$2y$10$1Zbe0lr/r84uWS1shZb3x.WFzm7JwFjQ4vQW0D6gSMwXRRw7hL4gu', '', '2023-05-26 09:32:18.000000'),
('Jagrat Piyush Jani', 'Jagrat', 'janijagrat4321@gmail.com', '$2y$10$x8dFFlCeVLMbhS3dJ0cGfeXzAScvg4Au2SkttZ0nTUCNSNhXtnb8e', 'Z-9, Advocate Society, Modasa', '2023-04-18 12:54:09.000000'),
('Mili H Patel', 'Milu', 'milu@gmail.com', '$2y$10$ynLHfttvkxKeJFw5e8ETPu0PC8TKBbnkC0xnR9GoHTQ42fyW3Pvya', '67-Milu Homes, Aditya Complex, Modasa', '2023-04-07 11:31:37.000000'),
('Nirav R Patel', 'Nirav', 'nirav@gmail.com', '$2y$10$PkFyUK1dcZuOXH5b6sCVOeKrnRV/DuHzwNEncrpLQ63QnOwm8Zyfy', 'A-3, Nirav Vyas, Modasa', '2023-04-18 12:35:54.000000'),
('Aditya M Patel', 'Aditya', 'pateladitya130102@gmail.com', '$2y$10$5XJYwRlMrUsjGDb7uYOULeAsQG2FkMgrAsUxjqqzxOj./KMxUGXbG', 'India', '2024-03-16 16:49:55.000000'),
('Krishna Vasudev Yadav', 'Shree Krishna', 'radheKrishna@gmail.com', '$2y$10$6MGCuC6KdjUTIFt9kK6o0uDdEJ/cNKS1y/2cOiHkRlOz862v7Otdq', 'Dwarika Temple, Dwarka.', '2023-04-07 11:29:32.000000'),
('Rahul', 'Rahul@123', 'Rahul@gmial.com', '$2y$10$zAsSnhgZzO8HvtIhcN3IQ.6u2/EjI6eNLgCHKRdwkVjjsKvxYIecq', '', '2023-07-12 20:54:59.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`,`Category_Name`);

--
-- Indexes for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `feedback_ID` (`feedback_ID`);

--
-- Indexes for table `food_payment`
--
ALTER TABLE `food_payment`
  ADD PRIMARY KEY (`pay_ID`);

--
-- Indexes for table `food_product`
--
ALTER TABLE `food_product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Category ID to handle primary functions.', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `food_payment`
--
ALTER TABLE `food_payment`
  MODIFY `pay_ID` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID of payment that is done', AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `food_product`
--
ALTER TABLE `food_product`
  MODIFY `product_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'It is the Id of Particular Product', AUTO_INCREMENT=338;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
