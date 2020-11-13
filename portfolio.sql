-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2020 at 11:05 AM
-- Server version: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` tinytext,
  `description` text,
  `prewiev` text,
  `create_time` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `description`, `prewiev`, `create_time`) VALUES
(59, 'test', 'test album', 'uploads/16002443372.jpg', '2020-09-16 11:18:57'),
(60, 'different', 'different images', 'uploads/16002446125.png', '2020-09-16 11:23:32'),
(61, 'cars', 'фотографии автомобилей', 'uploads/160024495088cba54b6301d790-main.jpg', '2020-09-16 11:29:10'),
(62, 'girls', 'Фотографии девушек', 'uploads/16002450363.jpg', '2020-09-16 11:30:36'),
(63, 'Городские пейзажи', 'Фотографии городов', 'uploads/16002503481_25_12_07_6_29_05.jpg', '2020-09-16 12:59:08'),
(64, 'haze', 'туманные фото', 'uploads/1600255173IMG_0742.jpg', '2020-09-16 14:19:33'),
(65, '123', '', 'uploads/16002554549.jpg', '2020-09-16 14:24:14'),
(66, '222', '', 'uploads/16002554634.jpg', '2020-09-16 14:24:23'),
(67, '333', '', 'uploads/16002554706.jpeg', '2020-09-16 14:24:30'),
(68, '444', '', 'uploads/16002554757.jpg', '2020-09-16 14:24:35'),
(69, '555', '', 'uploads/16002554828.jpg', '2020-09-16 14:24:42'),
(70, '556', '', 'uploads/16002554899.jpg', '2020-09-16 14:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `text` text NOT NULL,
  `album_id` int(11) NOT NULL,
  `public_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `text`, `album_id`, `public_id`) VALUES
(13, 'Mazim', 'This is firs comment', 61, 1),
(14, 'orman', 'hello this is comment from rom', 61, 1),
(16, 'марс ', 'этоо комментарий к альбому\n', 59, 1),
(18, 'оододло', 'одлодождлождлодлождлождлод длождлододлождлождлодлодлодлод ждлождлодлоджлождлождлождло длождлождлождлождлождлод длождлождлоджлождлод джлоджлодлоджлоджлоджло джлождлоджлодлождло джлодлождлождлоджлодло ждождлодлождлождлодло длождлождлоджлождло длоджлодлождлодло джлождлождлождлождло длождлождлождлождлождло длождлождлождлождло длождлождлождожд ждлоджлождлождлождло длождлождлощшощшодщозщодлодш длоджлождлощшодлоюьтдлождожщш длождлождлощодл ждлождложщшодложшодлодшодлтьдло длошодлощшодлдлождощо длождшодло', 61, 1),
(19, 'Automan', 'this is comment from car album!', 61, 1),
(20, 'BMW', 'bmw is my favorite car', 61, 1),
(21, 'test', 'this is test comment', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `content`) VALUES
(0, '<script>alert(\"Hello\")</script>');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `path` tinytext NOT NULL,
  `album_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `path`, `album_id`) VALUES
(74, 'uploads/fotos/160024438620190602-IMG_9421.jpg', 59),
(75, 'uploads/fotos/160024438620190602-IMG_9422.jpg', 59),
(76, 'uploads/fotos/1600244386IMG_6453.jpg', 59),
(78, 'uploads/fotos/1600244442IMG_3091.jpg', 59),
(79, 'uploads/fotos/1600244442IMG_3207.jpg', 59),
(80, 'uploads/fotos/1600244442IMG_3639.jpg', 59),
(81, 'uploads/fotos/1600244442IMG_5577.jpg', 59),
(82, 'uploads/fotos/1600244442IMG_5644.jpg', 59),
(83, 'uploads/fotos/16002446981_1175034499file2.jpg', 60),
(84, 'uploads/fotos/16002446989b5ZbCmb6l4.jpg', 60),
(85, 'uploads/fotos/160024469801856083.jpg', 60),
(86, 'uploads/fotos/16002446981358800452_2104769225.jpg', 60),
(87, 'uploads/fotos/1600244698l1048756080.jpg', 60),
(88, 'uploads/fotos/1600244698bf3739264f.jpg', 60),
(89, 'uploads/fotos/1600244698part3_bg.jpg', 60),
(90, 'uploads/fotos/1600244698rojl63lse2r0.jpg', 60),
(91, 'uploads/fotos/1600244698Заключительная раздача Wallpapers от FedExe ® (41).jpg', 60),
(92, 'uploads/fotos/1600244993002-63.jpg', 61),
(93, 'uploads/fotos/160024499388cbee625abb03d0-main.jpg', 61),
(94, 'uploads/fotos/16002449932376147f.jpg', 61),
(95, 'uploads/fotos/160024499328042010407.jpg', 61),
(96, 'uploads/fotos/1600244993autowp.ru_1.jpg', 61),
(97, 'uploads/fotos/1600244993bmw-850-[1280x800]-[28180001].jpg', 61),
(98, 'uploads/fotos/160024510022623.jpg', 62),
(99, 'uploads/fotos/1600245100101362.jpg', 62),
(100, 'uploads/fotos/16002451008763370_440c00f4d5_o.jpg', 62),
(101, 'uploads/fotos/1600245100ab6999c_9.jpg', 62),
(102, 'uploads/fotos/1600245100army01.jpg', 62),
(103, 'uploads/fotos/1600245100frt44fp-007.jpg', 62),
(104, 'uploads/fotos/1600245100kak-mnogo-devuwek-krasivih-14-foto-18_3.jpg', 62),
(105, 'uploads/fotos/16002504319_29_08_08_12_27_08.JPG', 63),
(106, 'uploads/fotos/160025043127353.jpg', 63),
(107, 'uploads/fotos/16002504311349272417_podborka_48.jpg', 63),
(108, 'uploads/fotos/1600250431Photo-0120.jpg', 63),
(109, 'uploads/fotos/1600250431IMG_7969.jpg', 63),
(110, 'uploads/fotos/1600250431Заключительная раздача Wallpapers от FedExe ®.jpg', 63),
(111, 'uploads/fotos/1600250431IMG_8074.jpg', 63),
(112, 'uploads/fotos/1600255282IMG_0719.jpg', 64),
(113, 'uploads/fotos/1600255282IMG_0722.jpg', 64),
(114, 'uploads/fotos/1600255282IMG_0737.jpg', 64),
(115, 'uploads/fotos/1600255282IMG_0752.jpg', 64),
(116, 'uploads/fotos/1600255282IMG_0753.jpg', 64),
(117, 'uploads/fotos/1600255282IMG_0770.jpg', 64),
(118, 'uploads/fotos/1600255282IMG_0801.jpg', 64),
(119, 'uploads/fotos/1600255282IMG_0827.jpg', 64);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `log` tinytext,
  `pass` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `log`, `pass`) VALUES
(2, 'admin', '$2y$10$oHZNIWGztgwcSmpq0XM6B.fdFW4ycQJ9icvOXKVX77dZYXyWmjBEq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
