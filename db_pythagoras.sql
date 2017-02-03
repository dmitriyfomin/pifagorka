-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 03 2017 г., 07:13
-- Версия сервера: 5.1.73
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_pythagoras`
--

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `subscr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subscr_email` varchar(50) NOT NULL,
  `subscr_name` varchar(20) NOT NULL,
  PRIMARY KEY (`subscr_id`),
  UNIQUE KEY `subscr_email` (`subscr_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`subscr_id`, `subscr_email`, `subscr_name`) VALUES
(1, 'dfcode@ya.ru', 'Дмитрий'),
(2, 'dfcode@yandex.kz', 'Дима'),
(3, 'dfcode@yandex.ru', 'Dmitry Fomin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
