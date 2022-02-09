-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 03:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulletin`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(4) NOT NULL,
  `title` varchar(32) NOT NULL,
  `body` varchar(200) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `title`, `body`, `pass`, `time`) VALUES
(59, 'no password', 'asdwvdsADC', '', '2022-02-04 19:11:58'),
(62, 'caocaocaocao', 'caaaaaaaaaaaa', 'b59c67bf196a4758191e42f76670ceba', '2022-02-04 19:12:30'),
(63, 'qwdsdasdaszxczv', 'sdvxcsdgwgvsdasda', 'b59c67bf196a4758191e42f76670ceba', '2022-02-04 19:12:43'),
(64, 'qwsdvsdgsdgsgsdfssd', 'sdfgasfbsfbstjchdgfgsergv', 'b59c67bf196a4758191e42f76670ceba', '2022-02-04 19:12:55'),
(65, 'qweqefvwsebe egerger', 'efwefwefwefwegebwerb', 'b59c67bf196a4758191e42f76670ceba', '2022-02-04 19:13:22'),
(66, 'fafasdasfbfsvsdvs', 'sfbasfvasdvsdvs', 'b59c67bf196a4758191e42f76670ceba', '2022-02-04 19:13:33'),
(68, 'qwqwwqwqwqw11', 'asasaasasasasaaa', '', '2022-02-04 19:42:05'),
(69, 'sndnjdsjfk  kkj', 'oljndknaolskf', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 08:49:28'),
(71, 'dfdnasiasdin', 'knfkajnklkadlks', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 08:50:08'),
(72, 'kjansakdjsndkja', 'ajsndasjldnajks', '', '2022-02-05 08:50:14'),
(73, 'halohalohalohalo', 'assesesesesese', '', '2022-02-05 08:50:37'),
(74, 'ljlljljljljljllj', 'skdaskasdkjsnanjs', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 08:50:53'),
(75, 'tititialsndlaksdnasd,l', 'lsnk cajsnfvakjn akjsn', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 08:51:11'),
(76, 'kdasjdnkjankjsdn', 'aljsdowiejndfaao', '', '2022-02-05 08:51:19'),
(77, 'asdakjhskdjahksdakjshd', 'diweufwivuhib', '', '2022-02-05 08:51:37'),
(78, 'oajsdnkabsdkasd', 'alksjdlasjdlkja', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 08:51:46'),
(79, 'asdfdbsgdva', 'gsdfsergsd', '', '2022-02-05 08:51:59'),
(80, '12eqdwasdsfgws', 'asdasdaddaads', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 08:52:10'),
(81, 'qwdascscasc', 'ascascasdvav', '', '0000-00-00 00:00:00'),
(82, 'cascjhabshjcbvaskvb', 'kjndv ksndkvvdk', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:04:01'),
(83, 'jnackbaikdjbvascouh', 'kjaskcjnjnasjkc', '', '2022-02-05 13:04:12'),
(84, 'vcaksjnckkjanc', 'naskajlkwfnovsldn', '', '2022-02-05 13:07:44'),
(85, 'k.janskjavnvokjand', 'kjnvdo;ilhenfdvka', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:07:51'),
(86, 'an clmalkfnalsn', 'lkamslaknvoalidvn', '', '2022-02-05 13:07:56'),
(87, 'lnsdljfnisevdljn', 'laksmlandlj', '', '2022-02-05 13:08:02'),
(88, 'kas,nckjvandvlkan', 'lancv;oqliheav;ln', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:08:07'),
(89, 'ka,nmckvjandl kan', 'laksnlafgjnbwsl', '', '2022-02-05 13:08:12'),
(90, ',ndvksjdnvlsjnv', 'la.nmdvlsndbln', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:08:19'),
(91, 'a,sndvlsdn.vlkndv', 'anmslanslkaslmsd', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:08:29'),
(92, 'qqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqq', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:08:43'),
(93, 'wwwwwwwwwwwwwww', 'wwwwwwwwwwwwww', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:08:55'),
(94, ',nmvlnsdljnf', 'lakmslaksdmalks', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:09:02'),
(95, 'lanslajsnljansljan', 'laksd;kasmlfka', '', '2022-02-05 13:09:08'),
(96, 'laksmdlaksmlkasmdlk', 'jlnjnjnkjnslvnsl', '', '2022-02-05 13:09:19'),
(97, 'kasndlasndlaks', 'ansofjdvoij', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:09:27'),
(98, 'asndlansdlanslklk', 'p;kafovlnaoljanson', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:09:46'),
(99, 'lakscovihniuheafalskjalj', 'lkajsdkja9oavndiuha', '', '2022-02-05 13:09:54'),
(100, 'ask,janc;kljanlckan', 'lnvksjdnfolajsnailskn', 'b59c67bf196a4758191e42f76670ceba', '2022-02-05 13:24:02'),
(101, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:24:24'),
(104, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:24:33'),
(105, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:24:36'),
(106, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:24:41'),
(107, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:24:44'),
(108, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:24:47'),
(109, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:24:50'),
(110, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:24:53'),
(111, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:24:58'),
(112, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:25:03'),
(113, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:25:07'),
(114, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:25:09'),
(115, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:25:13'),
(116, 'kndkjanskjlansdkjasd', 'kndkjanskjlansdkjasd', '', '2022-02-05 13:25:17'),
(128, 'asdasbasdgsd', 'sdfgehdbsdgegs', '', '2022-02-08 09:58:27'),
(129, 'sdfsgfgzdsfdsd', 'gsgsdfgergf', '', '2022-02-08 09:58:34'),
(130, 'sdsdfdsdfbbs', 'sgddnrdgsdfs', '', '2022-02-08 09:58:41'),
(131, 'dfsdgdfbsdfs', 'sdfsdfsfsdfs', '', '2022-02-08 09:58:48'),
(132, 'sdfsgrbxbssd', 'xbdfxdgssdfb', '', '2022-02-08 09:58:56'),
(133, 'afvzcvdbfsfv', 'sdfsdfnsdh', '', '2022-02-08 13:43:30'),
(134, 'halo', 'halo', '', '0000-00-00 00:00:00'),
(135, 'qweqweqweqwe', 'qweqweqweqeq', '', '2022-02-08 14:08:35'),
(136, 'asdasdaasd', 'asdafasdas', '', '2022-02-08 14:09:04'),
(137, 'asfdvasdasd', 'asfsvasvasd', '', '2022-02-08 14:09:10'),
(139, 'message me boi', 'test from file', '', '2022-02-08 14:53:06'),
(140, 'message me boi', 'edit         test from file', 'b59c67bf196a4758191e42f76670ceba', '2022-02-08 14:54:43'),
(141, 'asdasfcasc', 'ascafasfaf', '', '2022-02-08 14:59:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
