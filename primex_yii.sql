-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2011 at 07:30 PM
-- Server version: 5.1.40
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `primex_yii`
--

-- --------------------------------------------------------

--
-- Table structure for table `yiinka_news`
--

CREATE TABLE IF NOT EXISTS `yiinka_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `yiinka_news`
--

INSERT INTO `yiinka_news` (`id`, `title`, `text`, `date`, `visible`, `photo`) VALUES
(1, 'услуги ЖКХ с января подорожают на 10-20%', '<p>\r\n	Тарифы на услуги ЖКХ в Москве с 1 января 2011 года вырастут в среднем на 10-20%, сообщил РИА &quot;Новости&quot; источник в городской администрации, соответствующее постановление подписал мэр Сергей Собянин.</p>\r\n', '2010-12-06', 1, ''),
(2, 'В.Путин поручил разобраться с высокими ценами на авиаперевозки', '<p>\r\n	Глава российского правительства Владимир Путин поручил Минфину и Минтрансу разобраться в причинах высоких цен на авиабилеты внутри РФ, сообщает РИА &laquo;Новости&raquo;.</p>\r\n', '2010-12-10', 1, ''),
(3, 'Путин поставил "Единой России" задачу', 'Премьер-министр России Владимир Путин на встрече с членами партии "Единая Россия" призвал их при формировании политики думать не о результатах выборов, а о людях, избегать пустых инициатив и популистских предложений. При этом глава правительства отметил, что региональные стратегии "Единой России"', '2010-12-06', 0, ''),
(9, 'sdfsdf', '<p>\r\n	sdfsdfsdf</p>\r\n', '2011-01-08', 1, 'photo_9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `yiinka_pages`
--

CREATE TABLE IF NOT EXISTS `yiinka_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `number` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `yiinka_pages`
--

INSERT INTO `yiinka_pages` (`id`, `title`, `content`, `meta_title`, `keywords`, `description`, `parent`, `number`, `url`, `visible`) VALUES
(1, 'О компании', '<p><strong>Это текст о компании</strong></p>', 'О компании', 'О компании', 'Описание страницы о компании', 0, 0, 'about', 1),
(2, 'Услуги', '<p>это текст об услугах</p>', 'Услуги', 'Услуги', 'Услуги', 0, 2, 'services', 0),
(3, 'Цены', '<p>это текст о стоимости</p>', 'Цены', 'Цены', 'Это описание страницы цены', 0, 3, 'cost', 0),
(4, 'Контакты', 'это текст контактов', 'Контакты', 'Контакты', 'Контакты', 0, 4, 'contacts', 1),
(7, 'Вакансии', '<p>\r\n	контент</p>\r\n', 'Вакансии', 'Вакансии', 'Вакансии', 4, 1, 'vacancy', 1),
(9, '234234', '', '', '', '', 0, 0, 'wer', 1),
(11, 'werwerwer', '', '', '', '', 0, 0, 'werwer', 1),
(12, 'werwer', '', '', '', '', 0, 0, 'werwerwer', 1),
(13, 'sdfsdf', '', '', '', '', 0, 0, 'sdf', 1),
(14, 'sdfsdfsdf', '', '', '', '', 0, 0, 'sdfsdf', 1),
(17, '123', '', '', '', '', 0, 0, '123', 1),
(18, '321', '', '', '', '', 0, 0, '321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yiinka_test`
--

CREATE TABLE IF NOT EXISTS `yiinka_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `yiinka_test`
--

INSERT INTO `yiinka_test` (`id`, `text`, `title`) VALUES
(1, 'text1', 'title1'),
(2, 'text2', 'title2');

-- --------------------------------------------------------

--
-- Table structure for table `yiinka_users`
--

CREATE TABLE IF NOT EXISTS `yiinka_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `salt` varchar(32) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `mode` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `yiinka_users`
--

INSERT INTO `yiinka_users` (`id`, `name`, `password`, `email`, `visible`, `salt`, `role`, `mode`) VALUES
(31, 'admin', '10d27b606b26be23da1d485f7a1f48e9', 'lunoxot@mail.ru', 1, 'axmocn87kd5qmwopihp5wskgu25oyxp8', 1, 1),
(30, '123', '5e106659a57111b5083844df7a38b494', '312@312.ru', 0, 'i2vu8qckrijuuoxqq3ju33ta4hpnjoo0', 0, 0);
