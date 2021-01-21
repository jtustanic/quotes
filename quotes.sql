-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 04:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `user_id`, `quote_id`) VALUES
(23, 2, 3),
(24, 15, 4),
(25, 2, 13),
(26, 15, 19),
(27, 15, 16),
(28, 2, 21),
(29, 19, 4),
(30, 19, 15),
(31, 19, 22),
(32, 1, 15),
(33, 1, 18),
(34, 21, 23),
(35, 21, 26),
(36, 21, 15);

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quote` varchar(1000) NOT NULL,
  `autor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `user_id`, `quote`, `autor`) VALUES
(4, 1, 'One of the lessons that I grew up with was to always stay true to yourself and never let what somebody else says distract you from your goals. And so when I hear about negative and false attacks, I really don\'t invest any energy in them, because I know who I am.', 'Michelle Obama'),
(9, 0, '“There\'s nothing like deep breaths after laughing that hard. Nothing in the world like a sore stomach for the right reasons.”', 'Stephen Chbosky'),
(10, 0, '“They say a person needs just three things to be truly happy in this world: someone to love, something to do, and something to hope for.”', 'Tom Bodett'),
(11, 0, '“Anyone who falls in love is searching for the missing pieces of themselves. So anyone who\'s in love gets sad when they think of their lover. It\'s like stepping back inside a room you have fond memories of, one you haven\'t seen in a long time.”', 'Haruki Murakami'),
(12, 0, '“And once the storm is over, you won’t remember how you made it through, how you managed to survive. You won’t even be sure, whether the storm is really over. But one thing is certain. When you come out of the storm, you won’t be the same person who walked in. That’s what this storm’s all about.”', 'Haruki Murakami'),
(13, 0, '“It is not true that people stop pursuing dreams because they grow old, they grow old because they stop pursuing dreams.”', 'Gabriel García Márquez'),
(15, 0, '“Watch carefully\r\nthe magic that occurs\r\nwhen you give a person\r\nenough comfort\r\nto just be themselves.”', 'Atticus'),
(16, 0, '“She was a beautiful dreamer. The kind of girl, who kept her head in the clouds, loved above the stars and left regret beneath the earth she walked on.”', 'RM Drake'),
(17, 0, '“From\r\nthe moment\r\nI saw her\r\nI knew\r\nthis one\r\nwas worth\r\nthe\r\nbroken\r\nheart.”', 'Atticus'),
(18, 0, '“She was broken from moment to moment, watching her world collide she felt lost inside herself. She fell apart for a passion that flamed beneath her. She waited and died a hundred times, it dripped from her pores. The moment she let go, she soared over the stillness like the star she was born to be.”', 'RM Drake'),
(19, 0, '“you tell me to quiet down cause my opinions make me less beautiful but i was not made with a fire in my belly so i could be put out i was not made with a lightness on my tongue so i could be easy to swallow i was made heavy half blade and half silk difficult to forget and not easy for the mind to follow”', 'Rupi Kaur'),
(20, 2, '“how you love yourself is\r\nhow you teach others\r\nto love you”', 'Rupi Kaur'),
(21, 15, '\r\n“We are made of all those who have built and broken us.”', 'Atticus'),
(23, 15, '“you might not have been my first love\r\nbut you were the love that made\r\nall other loves seem\r\nirrelevant”', 'Rupi Kaur'),
(24, 2, '\"Deep within us — no matter who we are — there lives a feeling of wanting to be lovable, of wanting to be the kind of person that others like to be with. And the greatest thing we can do is to let people know that they are loved and capable of loving.\" ', 'Fred Rogers'),
(25, 1, '\"Maybe you do not need the whole world to love you, you know. Maybe you just need one person.\"', 'The Muppets'),
(26, 1, '\"Everybody wants to be famous, but nobody wants to do the work. I live by that. You grind hard so you can play hard. At the end of the day, you put all the work in, and eventually it will pay off. It could be in a year, it could be in 30 years. Eventually, your hard work will pay off.\"', 'Michael Hart'),
(27, 20, '\"To define is to limit.\"', 'Oscar Wilde'),
(28, 21, 'Life does not give us a purpose. We give life purpose.', 'The Flash'),
(29, 21, 'Our fate lives within us, you only have to be brave enough to see it.', 'Merida (Brave)'),
(30, 21, 'Oh yes, the past can hurt. But, you can either run from it or learn from it.', 'The Lion King'),
(33, 1, 'Sve ima svoj početak i kraj, i jedino što ima smisla je uživati kad ti je dobro, stisnuti zube kad ti je teško. Biti svjestan da će i jedno i drugo proći kao što sve na ovom svijetu prođe. I opet se vrati. U nekom drugom obliku.', 'Bekim Sejranović');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `surname`) VALUES
(1, 'Hana', '123Hana', 'Hana', 'Anić'),
(19, 'aaaaaa', '1', 'M', 'S'),
(20, 'MagdaLena', 'dvaputadva', 'Magdalena', 'Mikić'),
(21, 'Iva', '99', 'Iva', 'M'),
(22, 'Nika', '5', 'Nika', 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
