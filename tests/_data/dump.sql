-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2016 at 01:04 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mava_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `mava_project`
--

CREATE TABLE IF NOT EXISTS `mava_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workspace_id` int(11) DEFAULT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `due_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_idx` (`workspace_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mava_project`
--

INSERT INTO `mava_project` (`id`, `workspace_id`, `title`, `description`, `due_date`) VALUES
(1, 1, 'saepe', 'Magni rerum consequatur laudantium nisi quo e', '2016-04-13 09:25:09'),
(2, 3, 'doloremque', 'Dignissimos et dolorem doloremque quam quia. ', '2016-04-13 02:49:26'),
(3, 3, 'beatae', 'Quae sit veniam vel eos officiis et est nisi.', '2016-04-03 07:43:18'),
(4, 1, 'minus', 'Porro voluptatibus enim quia reprehenderit ma', '2016-04-05 19:41:54'),
(5, 2, 'asperiores', 'Omnis inventore mollitia unde id in id. Moles', '2016-03-27 07:56:09'),
(6, 2, 'quos', 'Accusantium quidem ut eius a corrupti totam p', '2016-02-27 16:41:38'),
(7, 2, 'accusantium', 'Ad est et et cum eius voluptas numquam. Occae', '2016-03-02 00:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `mava_task`
--

CREATE TABLE IF NOT EXISTS `mava_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `due_date` datetime NOT NULL,
  `attachment` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_task_1_idx` (`project_id`),
  KEY `fk_task_2_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `mava_task`
--

INSERT INTO `mava_task` (`id`, `project_id`, `user_id`, `title`, `description`, `due_date`, `attachment`) VALUES
(1, 1, 6, 'modi', 'Voluptatem at qui eaque nihil. Eos fugit natus quaerat quibusdam alias. Accusamus aut dolores perspiciatis itaque doloribus qui. Eligendi quae recusandae facere quo.', '2016-03-23 21:40:12', 1),
(2, 7, 9, 'ex', 'Nisi fuga dolores aut velit illo. Sint voluptas a aperiam voluptas aut qui neque. Eos fugit nostrum non et et et fugit. Excepturi enim velit qui nam nesciunt non dolore quis.', '2016-03-18 13:28:39', 1),
(3, 7, 6, 'dolorem', 'Similique tenetur aut sit aliquam provident et. Eveniet consequatur sit impedit sint nam. Sit est magnam ut.', '2016-02-28 20:33:15', 0),
(4, 7, 2, 'quas', 'In reprehenderit reiciendis accusamus facilis quia et. Deleniti qui nostrum doloremque minima aut molestiae. Est consequatur numquam tempore similique ut debitis consequatur facere.', '2016-03-26 23:28:26', 0),
(5, 7, 9, 'rerum', 'Nulla voluptatem aperiam ipsa eius repellat. Reiciendis voluptas doloremque esse dolor. Illo placeat harum voluptatem at enim. Voluptas ut dolorem voluptates deserunt.', '2016-05-11 15:33:22', 0),
(6, 6, 9, 'delectus', 'Cupiditate aut consequatur aut ullam qui. Voluptatem aut cum vitae nostrum non. Non omnis aut quos ut ad est quidem eum. Voluptates laboriosam ea porro blanditiis eos enim non aut.', '2016-05-17 10:14:18', 0),
(7, 5, 5, 'nisi', 'Magni nihil voluptatem magnam. Impedit recusandae omnis consequatur ut repellendus. Nihil reprehenderit non ut rem esse magnam iure.', '2016-02-26 20:04:48', 0),
(8, 2, 10, 'et', 'Voluptas et aut sunt reiciendis. Voluptas molestiae eum et eos fugiat.\nConsequuntur nostrum culpa in quod. Quae dignissimos sunt atque aut unde. Accusamus sint hic ut atque expedita ratione minima.', '2016-04-20 09:32:05', 0),
(9, 6, 4, 'ratione', 'Ullam tempore autem sapiente id consequuntur. Dolore qui in et quasi incidunt rerum ex. Aut itaque nesciunt sit quidem fugit sapiente ullam.', '2016-05-04 19:52:20', 0),
(10, 2, 5, 'dolores', 'Et necessitatibus quasi qui sit rem consequatur. Incidunt et sunt tempora sunt aliquam mollitia id repudiandae. Doloremque placeat ut esse. Aut ratione cumque commodi.', '2016-04-25 23:41:05', 1),
(11, 6, 1, 'quia', 'Sed aut quia culpa vero tenetur vel quasi. Rerum quo ut accusantium omnis quibusdam.', '2016-04-03 14:29:34', 0),
(12, 7, 10, 'laborum', 'Ut odio et id consequatur. Quia porro minus voluptates. Est officiis est repudiandae est atque. Inventore sed ipsum omnis maiores esse.', '2016-03-14 04:59:27', 1),
(13, 6, 6, 'quasi', 'Repudiandae laborum dolor quasi totam qui ipsam iusto. Inventore molestias amet aut qui nihil. Fuga velit iure consequuntur qui provident et accusamus.', '2016-04-01 03:18:28', 1),
(14, 7, 4, 'ducimus', 'Ad labore quos saepe quia quia unde quos error. Saepe eos et ab velit.', '2016-04-14 00:58:05', 0),
(15, 4, 1, 'ut', 'Vero voluptates fugit officiis explicabo. Libero sit ducimus minima. Suscipit id tempore voluptatibus recusandae et deleniti tenetur.', '2016-02-19 01:28:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mava_user`
--

CREATE TABLE IF NOT EXISTS `mava_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DE0BAD992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_DE0BAD9A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mava_user`
--

INSERT INTO `mava_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'eMoen', 'emoen', 'Gordon93@yahoo.com', 'gordon93@yahoo.com', 0, 'i2lfyzcpdeog8s0wwwko0g8g844c4g0', 'H>?R4Usi|L@vHTJVry', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(2, 'fFadel', 'ffadel', 'rDooley@gmail.com', 'rdooley@gmail.com', 0, 'g6i0h3c7km8kcww40ckoswcgogcsgsw', 'Qsrunw0{:0&,`vGW', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(3, 'Letha.Koepp', 'letha.koepp', 'Marquis.Conroy@gmail.com', 'marquis.conroy@gmail.com', 0, '6t37irilm4g0kc4s04co8oc0c0gokwo', '0G|$7[}Ag', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(4, 'Jackeline78', 'jackeline78', 'oBins@Ledner.com', 'obins@ledner.com', 0, 'gjvaj8awuhskwgk0gokkwc8wcwwkow4', '<*d,-R"(?w4v9bOW&VH', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(5, 'Verna58', 'verna58', 'Spencer.Lemke@yahoo.com', 'spencer.lemke@yahoo.com', 0, 'brt8psjobq0c88wg0w0c4c4ss4sgo44', 'bOWS%hSz_rQk&|X+*KrK', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(6, 'Braun.Larue', 'braun.larue', 'Ethelyn92@yahoo.com', 'ethelyn92@yahoo.com', 0, 'f6k5bpvph4gsws0s8sowgckc44k4oks', 'V7\\ert=[]g]', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(7, 'Dorthy.Hermann', 'dorthy.hermann', 'dMarvin@hotmail.com', 'dmarvin@hotmail.com', 0, 'bq7vnsiyaq88c8ccgg48c8wc00so8wg', '_OD''+j', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(8, 'Bergnaum.Franz', 'bergnaum.franz', 'Jaskolski.Odell@Ruecker.com', 'jaskolski.odell@ruecker.com', 0, 'pqecxthtu1w444wkk0k84cgsoc84g0s', 'Vb~6E/`WM', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(9, 'Torphy.Louie', 'torphy.louie', 'Runolfsdottir.Jayne@Wuckert.info', 'runolfsdottir.jayne@wuckert.info', 0, '6cmuzgmkp3k848cs4kwsowo4kogwwok', 'o=T!xnR', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(10, 'Roberts.Reagan', 'roberts.reagan', 'Coralie24@yahoo.com', 'coralie24@yahoo.com', 0, '1bi9joaf09foo4gc4wkw8w4o0sg4cgk', 'kw%cM,1}Z', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mava_workspace`
--

CREATE TABLE IF NOT EXISTS `mava_workspace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mava_workspace`
--

INSERT INTO `mava_workspace` (`id`, `name`, `description`) VALUES
(1, 'accusantium', 'Atque possimus aut dolores quis totam incidunt ducimus aperiam. Est quia assumenda minima sunt. Similique ut culpa natus consequatur reiciendis sit. Nihil ut porro amet laborum iure molestiae et.'),
(2, 'ea', 'Voluptatem laudantium perferendis eveniet quam vero fuga. Omnis temporibus maxime sint suscipit laudantium. Magni non voluptas fuga non autem non non. Et neque itaque ex quaerat.'),
(3, 'sed', 'Ex beatae reprehenderit exercitationem corrupti dolorem reprehenderit ut ducimus. Molestiae consequatur sint consequatur est qui doloremque.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mava_project`
--
ALTER TABLE `mava_project`
  ADD CONSTRAINT `FK_D2E46CB382D40A1F` FOREIGN KEY (`workspace_id`) REFERENCES `mava_workspace` (`id`);

--
-- Constraints for table `mava_task`
--
ALTER TABLE `mava_task`
  ADD CONSTRAINT `FK_D20DB7B5166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `mava_project` (`id`),
  ADD CONSTRAINT `FK_D20DB7B5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `mava_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
