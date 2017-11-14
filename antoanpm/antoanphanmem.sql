-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2017 at 11:03 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antoanphanmem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `mail`) VALUES
('antoanpm', '123456', 'quangat333@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `user_id` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `user_id`) VALUES
(1, 'Programming', '2'),
(2, 'Dev chat', '2'),
(3, 'Uncategorized', '2');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `user_id` varchar(550) COLLATE utf8_vietnamese_ci NOT NULL,
  `derc` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `category_id` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `content` text COLLATE utf8_vietnamese_ci,
  `status` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `category_id`, `title`, `content`, `status`) VALUES
(1, '0', '1', 'Explore the MIT-IBM Watson AI Lab', 'IBM plans to make a 10-year, $240 million investment to create the MIT–IBM Watson AI Lab in partnership with MIT. The lab will carry out fundamental artificial intelligence research and seek to propel scientific breakthroughs to unlock the potential of AI.\nThe collaboration is designed to advance intelligent hardware, software, and algorithms related to deep learning and other areas, increase augmented intelligence’s impact on industries, such as health care and cybersecurity, and explore the economic and ethical implications of smart machines on society.\nIt will be organized into four pillars of research:\nAlgorithms – developing advanced algorithms to expand capabilities in machine learning and reasoning which involves creating AI systems that move beyond specialized tasks to tackling more complex problems and benefiting from robust, continuous learning\nPhysics – investigating new AI hardware materials, devices, and architectures that will support future analog computational approaches to AI model training and deployment, as well as the intersection of quantum computing and machine learning; this will involve using AI to help characterize and improve quantum devices\nApplication to industries – developing new applications of AI for professional use, including fields such as health care and cybersecurity\nAdvancing shared prosperity – exploring how AI can deliver economic and societal benefits to a broader range of people, nations, and enterprises\nHere are some thoughts from participating data scientists', '1'),
(2, '0', '1', 'Running Cloud Foundry on Containers', 'Cornelius elaborates on his Cloud Foundry Summit session, describing how he and SUSE are extending Bosh to create container images. The tool they use is called “Fissile,” and it is publicly available from Github.', '1'),
(3, '0', '2', 'Whats new in Java EE 8', 'The much-anticipated release of Java™ EE 8 is nearly upon us. This first release of the Java enterprise platform since June 2013 is half of a two-part release culminating with Java EE 9. Oracle has strategically repositioned Java EE, emphasizing technologies that support cloud computing, microservices, and reactive programming. Reactive programming is now woven into the fabric of many Java EE APIs, and the JSON interchange format underpins the core platform. We’ll take a whistle-stop tour of the main features found in Java EE 8. Highlights include API updates and introductions, and new support for HTTP/2, reactive programming, and JSON. Get started with the Java EE specifications and upgrades that will surely shape enterprise Java programming for years to come.', '1'),
(4, '0', '2', 'Realtime là gì ?', 'Như chúng ta đều đã biết thì realtime (thời gian thực) là một cụm từ không có gì xa lạ đối với các website nữa, nhất là trong thời đại công nghệ web phát triển như vũ bão hiện nay. Realtime ám chỉ răng việc phần mềm (ở đây mình nói tới chủ yếu là website) có thể phản hồi và tương tác người dùng một cách tức thì mà người dùng không cần chờ đợi lâu hoặc refresh lại ứng dụng hoặc trình duyệt. Chúng ta có thể nhìn thấy realtime ở khắp mọi nơi: thực tế nhất chính là qua các ứng dụng nhắn tin, hoặc bảng tin newsfeed trên Facebook. Vấn đề quan trọng là: làm sao để biến ứng dụng của chúng ta thành realtime ?', '1'),
(5, '0', '3', 'Làm thế nào để thay đổi cuộc đời bạn?', 'Bắt đầu với một câu tuyên bố đơn giản: Bạn muốn trở thành gì?\r\n\r\nBạn có hi vọng một ngày nào đó trở thành một nhà văn, nhạc sĩ, nhà thiết kế, lập trình viên, phiên dịch viên, một họa sĩ Manga, một doanh nhân hay một chuyên gia về lĩnh vực nào đó?\r\n\r\nLàm thế nào để đạt được điều đó? Bạn sẽ viết ý định của bạn vào một mảnh giấy, đặt nó trong một cái chai và thả nó ra biển với hi vọng nó sẽ trở thành sự thật? Không. Vũ trụ sẽ không khiến nó xảy ra, mà chính là bạn.\r\n\r\nBạn có từng đặt cho mình một mục tiêu lớn để hoàn thành vào cuối năm hoặc trong ba tháng? Chắc chắn rồi, nhưng điều đó không khiến bạn hoàn thành. Thực tế, nếu bạn nghĩ lại về hầu hết các ví dụ trong cuộc sống của bạn sẽ thấy việc đặt ra các mục tiêu lớn dài hạn có lẽ không hiệu quả. Bao nhiêu lần chiến lược này đã thành công?', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `level` int(3) NOT NULL,
  `username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `level`, `username`, `password`, `email`) VALUES
(1, 'quangdn', 3, 'quanghoilanman', '123456', 'quangat333@gmail.com'),
(2, 'abc', 2, '123456', '123456', '123456'),
(3, 'qhlm', 3, 'hihi', 'haha', 'qhlm@gmail.com'),
(0, 'qhlmqhlm', 3, 'quangdn', '123456', 'quangat333@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
