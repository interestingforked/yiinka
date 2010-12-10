-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2010 at 06:36 PM
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yiinka_news`
--

INSERT INTO `yiinka_news` (`id`, `title`, `text`, `date`, `visible`) VALUES
(1, 'услуги ЖКХ с января подорожают на 10-20%', 'Тарифы на услуги ЖКХ в Москве с 1 января 2011 года вырастут в среднем на 10-20%, сообщил РИА "Новости" источник в городской администрации, соответствующее постановление подписал мэр Сергей Собянин.', '2010-12-06', 1),
(2, 'В.Путин поручил разобраться с высокими ценами на авиаперевозки', 'Глава российского правительства Владимир Путин поручил Минфину и Минтрансу разобраться в причинах высоких цен на авиабилеты внутри РФ, сообщает РИА «Новости».', '2010-12-06', 1),
(3, 'Путин поставил "Единой России" задачу', 'Премьер-министр России Владимир Путин на встрече с членами партии "Единая Россия" призвал их при формировании политики думать не о результатах выборов, а о людях, избегать пустых инициатив и популистских предложений. При этом глава правительства отметил, что региональные стратегии "Единой России"', '2010-12-06', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `yiinka_pages`
--

INSERT INTO `yiinka_pages` (`id`, `title`, `content`, `meta_title`, `keywords`, `description`, `parent`, `number`, `url`, `visible`) VALUES
(1, 'О компании', 'Это текст о компании', 'О компании', 'О компании', 'О компании', 0, 0, 'about', 1),
(2, 'Услуги', 'это текст об услугах', 'Услуги', 'Услуги', 'Услуги', 0, 2, 'services', 1),
(3, 'Цены', 'это текст о стоимости', 'Цены', 'Цены', 'Цены', 0, 3, 'cost', 1),
(4, 'Контакты', 'это текст контактов', 'Контакты', 'Контакты', 'Контакты', 0, 4, 'contacts', 1),
(7, 'Вакансии', 'контент', 'Вакансии', 'Вакансии', 'Вакансии', 4, 1, 'vacancy', 1);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `yiinka_users`
--

INSERT INTO `yiinka_users` (`id`, `name`, `password`, `email`, `visible`, `salt`, `role`) VALUES
(31, 'admin', '10d27b606b26be23da1d485f7a1f48e9', 'lunoxot@mail.ru', 1, 'axmocn87kd5qmwopihp5wskgu25oyxp8', 1),
(30, '123', '5e106659a57111b5083844df7a38b494', '312', 0, 'i2vu8qckrijuuoxqq3ju33ta4hpnjoo0', 0);
