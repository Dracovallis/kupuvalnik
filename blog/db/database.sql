-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2016 at 06:14 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `name` varchar(100) NOT NULL,
  `id` int(255) NOT NULL,
  `image_link` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`, `id`, `image_link`) VALUES
('алкохол / дрога / детски свят', 1, 'https://cdn3.iconfinder.com/data/icons/metro-contact/512/smile-512.png'),
('за дома / градината / мазата', 2, 'https://cdn4.iconfinder.com/data/icons/basic-ui-elements/700/09_home-512.png'),
('авто / мото / авио / каруци', 3, 'https://cdn3.iconfinder.com/data/icons/car-wheels/154/moto-auto-wheel-tuning-512.png'),
('електроника и машини', 4, 'http://www.itab.se/Global/Local%20web%20pages/ITAB%20NL/Electronics%20icon.png'),
('оръжия', 5, 'https://cdn3.iconfinder.com/data/icons/hotel-10-1/48/458-512.png'),
('хоби', 6, 'http://image.flaticon.com/icons/svg/64/64457.svg'),
('други', 7, 'http://icons.iconarchive.com/icons/icons8/windows-8/256/Messaging-Question-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `price` varchar(10000) NOT NULL,
  `image_link` mediumtext NOT NULL,
  `category` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `date`, `user_id`, `price`, `image_link`, `category`) VALUES
(28, 'Продаван пияница', 'В добро състояние и настроение! Зъбната фасада е ненарушена!', '2016-08-31 21:17:12', 12, '1', 'http://vignette1.wikia.nocookie.net/uncyclopedia/images/a/a9/Drunk-guy.gif/revision/latest?cb=20070606222735', ' 1 '),
(29, 'Мръсен маркуч', 'Продавам стилистично сплетен мръсен маркуч! АНТИКА! \r\nОТ БАНЯТА НА БОРИС ТРИ!', '2016-08-31 21:19:54', 12, '5123', 'https://img.ifcdn.com/images/694141e280a211d054eb8325bf08e8a72feb4b37043a95795041f9a4d086cb6b_1.jpg', ' 2 '),
(30, 'Каруца с кон!', 'Чисто нова каруца с употребяван кон! \r\n\r\nКонят (Equus ferus caballus)е един от двата съвременни подвида на Дивия кон (Equus ferus). Представлява опитомен еднокопитен бозайник представител на семейство Коне. Предците на съвременните коне еволюират преди около 45 – 55 милиона години от дребен многопръст тревопасен бозайник "Хиракотерий“, който е бил с ръст само 14 см и тегло 5 кг, до едър еднокопитен представител днес. Одомашняването от хората започва преди около 6000 години, а до 3000 г. пр. Хр. конят се разпространява в различни краища на Земята. Представителите на днешния опитомен подвид са предци на дивия кон, който свободно е обитавал първичните си местообитания. Самият термин див кон е неточен, но се използва за да отдиференцира конете от вида, които никога не са били одомашнявани. Такъв например е Конят на Пржевалски, който е вторият подвид на дивия кон.\r\n\r\nДълголетната връзка на коня с човека е наложила използването на редица думи и термини, които да опишат отделните възрастови и полови категории, размери на тялото, неговия цвят, анатомични особености, маркиране, породи, движения и поведение.\r\n\r\nАнатомията на коня е следствие от редица еволюционни приспособления възникнали с цел развиване на скорост за избягване от хищници. Имат силно развито чувство за баланс и отбрана. В тази връзка конят е развил и една от необичайните си черти – спи еднакво добре както изправен, така и легнал, благодарения на уникалната си способност за „заключва“ сухожилията на краката си. Сънят на коня има само 2 фази – SWS (кратък дълбок сън) и REM (бързо движение за очите).\r\n\r\nБременността при кобилите продължава 11 месеца, а малкото конче се изправя на крака и започва да следва майка си минути след раждането. Обучението на младите коне започва на около две годишна до четири годишна възраст. Пълното развитие на тялото достига на около петгодишна възраст, а продължителността на живота е около 25 – 30 години.\r\n\r\nВ световен мащаб, конете играят голяма роля в човешките култури в продължение на хилядолетия. Те се използват за развлекателни и спортни дейности, както и за работни цели. Конете са използвани многократно по време на война, благодарение на което оборудването, техниките на езда и водене, както и методите за контрол са се усъвършенствали значително. Много продукти се получават от коне, в това число месо, мляко, кожа, коса, кости, и различни фармацевтични продукти, извлечени от урината на бременни кобили. Хората гледат опитомени коне, осигурявайки им храна, вода и подслон, както и внимание от специалисти, като ветеринарни лекари и ковачи.', '2016-08-31 21:34:46', 13, '50', 'http://i.pik.bg/news/541/660_22227d9b401ecbaa281f81424d61a0f0.jpg', ' 3 '),
(31, 'Подарявам шамари (3 бр)', 'Разполагам с 3 неупотребявани шамара! Само сега безплатно! При поръчка до 01.09.2016 получавате безплатен РИТНИК!', '2016-08-31 21:38:10', 13, '0', 'https://i.ytimg.com/vi/7AXB8nGq5jc/maxresdefault.jpg', ' 5 '),
(32, 'масажна маска', 'Цвят: черен\r\nСъстояние: с леки следи от употреба\r\nМатерия: мека', '2016-08-31 21:44:01', 13, '33', 'https://img0.etsystatic.com/014/1/7603176/il_570xN.433295722_flp9.jpg', ' 6 '),
(33, 'Аниматор', 'С дългогодишен опит.', '2016-08-31 21:46:29', 13, '666', 'http://www.bdcwire.com/wp-content/uploads/2014/10/american-horror-story-freak-show.jpg', ' 7 '),
(34, 'Ластик от гащи', 'Продавам 2 броя ластици от гащи, запазени, гъвкави и готови за употреба. Моля само сериозни оферти!', '2016-08-31 21:54:58', 14, '5', 'http://i.telegraph.co.uk/multimedia/archive/01430/rubber_1430412c.jpg', ' 7 '),
(35, 'Бъбреци', 'Два бъбрека търсят своя нов дом! Ако желаете да им дадете втори шанс да преработват литри алкохол, звъннете сега!', '2016-08-31 22:16:52', 14, '10050', 'https://simplybeingwell.files.wordpress.com/2011/05/dscn1817.jpg', ' 7 '),
(36, 'Дискографията на Азис', 'Продавам дискографията на Азис! Всеки CD e с автограв! Всяко касетка е с червило! Очаквам сериозни обаждания!', '2016-08-31 22:34:32', 2, '69', 'http://img2-ak.lst.fm/i/u/770x0/d7a7338a55cf4fe99ad590cb07baaf6c.jpg', ' 6 '),
(37, 'Билет за Глория + ескорт', 'Търся си компания за предстоящия концерт на Глория. Билетите от мен!', '2016-08-31 23:06:52', 17, '0', 'http://www.kliuki.bg/wp-content/uploads//2015/08/gloria.jpg', ' 6 '),
(38, 'Nqkva obqva', 'ala bala', '2016-09-01 10:25:27', 12, '123', 'http://i.telegraph.co.uk/multimedia/archive/03589/Wellcome_Image_Awa_3589699k.jpg', ' 4 ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(100) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `address` varchar(10000) CHARACTER SET utf16 DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `full_name`, `address`, `phone_number`, `email`) VALUES
(1, 'admin', '$2y$10$QlKthcuYhn.XP/gy5A/OZeQdOzIznqxqOf/qBrSAnGpoW4labIL0W', 'Admin Adminov Adminski', 'Rockefeller Conglomerate, Inc.\r\nC/O Kennedy & Smith Accounting Corporation\r\n1001 Bishop Street, Davis Tower 1550\r\nDallas-Fort Worth, Texas 81142', '0887 916 123', 'admina_e_pi4@kradeno.bg'),
(2, 'nakov', '$2y$10$XViubT.zSoBtskZmKl6kdOX8Yq7T7tLrcrLn/5dkAqbgjVACeFUGe', 'Svetlin Nakov', 'ул. Тинтява 15-17, етаж 2, 1113 Sofia, Bulgaria', '0887 111 222', 'nakov@softuni.bg'),
(9, 'pedobear', '$2y$10$mT9aKMWzUqSZmP7yjm0VCu8ndSwM.qwf7pzZqz/ywuYF8d7ZLSxI.', 'pedo bear', 'somewhere over the rainbow. A', '123/ 456-789', 'ursa-pedo@incognito.com'),
(12, 'Krusta', '$2y$10$LBL6R9zlskW.IC5.5jplbuMSqOgjqSTh8rG2LHKZwqEMV4NnBuLyG', 'Кръста Кръстев Кръстев', 'Зона Б-5, на поляната пред Министерството на Културата', '0887 123 123', 'krusta@kradeno.bg'),
(13, 'Martinik', '$2y$10$5pL5SjHzSvlBVPg2SNz7GODgEZ//dEajeAMf1KGD3iKgIpKynjTWO', 'Мартин Николов', 'На поляната зад Министерството на културата', '0887 123 123', 'martinik@kradeno.bg'),
(14, 'Groba', '$2y$10$YncaEQQMtjkQyvGNPPftfOzdu6F7vpsywnnL8YzpKVuYI00BUftAe', 'Гергин Празняров', 'Мездра, ул. Доколенкова 5', '0877 111 222', 'cepqvi@chep.hu'),
(16, 'kaka_pena', '$2y$10$ZOtfny6zUvfuHBw7Oxl91uWsgiuJLDcy4iU0HSIDwhdqEyzFdPWwK', 'Пена Христова', 'Перник, ул. Караджа', '0899 838 838', 'penahristova@mail.bg'),
(17, 'simkata', '$2y$10$PTmlS4ERDdTi9wrxSuWg2.lf6ZcaZzihaqOZ1vxlp9WhPKRIalUkS', 'Симеон Шейтанов', 'GameBar, SoftUni', '123 123', 'simo@softuni.bg'),
(18, 'alabala', '$2y$10$pA0BA7pAwXePl312ue/kVuLrCVLlSNZL2wQuHSa.HjIYXslTSRlf6', 'Ala bal', 'asdasd', '999123', 'K.@MAIL.BG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_posts_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_users_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
