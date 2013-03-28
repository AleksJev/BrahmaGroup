-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Хост: 80.255.226.36:3306
-- Время создания: Мар 28 2013 г., 00:11
-- Версия сервера: 5.6.10-log
-- Версия PHP: 5.4.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `brahma`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `info` varchar(50) NOT NULL DEFAULT 'category info',
  `position` tinyint(4) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `visible` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `info`, `position`, `parent`, `visible`) VALUES
(1, 'Category 1', 'category info 1', 10, 0, 1),
(3, 'Category 3', 'category info 3', 30, 0, 1),
(11, 'Category 3.1', 'Lorem Ipsum is simply dummy text of the printing a', 20, 3, 1),
(13, 'Category 4', 'Aliquam erat volutpat.', 40, 0, 1),
(14, 'Category 5', 'Proin ut enim tortor. Ut tristique adipiscing lect', 50, 0, 1),
(16, 'Category 3.2', 'Proin neque risus, feugiat in volutpat vitae, ultr', 30, 3, 1),
(20, 'Some category', 'Change', 40, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) NOT NULL,
  `password` char(41) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'user', 'pass');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
