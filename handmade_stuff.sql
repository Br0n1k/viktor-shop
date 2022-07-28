-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 28 2022 г., 19:26
-- Версия сервера: 5.6.29
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `handmade_stuff`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(3) NOT NULL,
  `login` varchar(24) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(2, 'ViktorTheAlmighty', '3e9e8ca6663a006fd5d02f7609a6ace4');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(2) NOT NULL,
  `name` varchar(12) NOT NULL,
  `ru_name` varchar(14) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `ru_name`, `description`) VALUES
(1, '99else', 'Остальное', 'Разные поделки не попавшие в предыдущие категории'),
(3, '1bantik', 'Банты', 'Банты красивые, ручная работа и все такое'),
(5, '2obruch', 'Обручи', 'Обручи-бобручи лол кек чебуречные');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(3) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `isfavorite` varchar(10) DEFAULT NULL,
  `name` varchar(24) NOT NULL,
  `ordertime` varchar(24) NOT NULL,
  `img` text NOT NULL,
  `img1` text,
  `img2` text,
  `img3` text,
  `img4` text,
  `description` text NOT NULL,
  `cost` varchar(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `category`, `isfavorite`, `name`, `ordertime`, `img`, `img1`, `img2`, `img3`, `img4`, `description`, `cost`) VALUES
(13, '1bantik', 'fav_2', 'Бант красивый 1', 'Пiд замовлення', '/images/goods/viber_2021-02-26_19-07-09-053/1629141308viber_2021-02-26_19-07-09-053.jpg', '', '/images/goods/viber_2021-02-26_19-07-09-053/1629142138viber_2021-02-26_19-07-09-053.jpg', '', '', 'бантик-бабантикбантик-бабантикбантик-бабантикбантик-бабантик', '50'),
(14, '1bantik', 'fav_1', 'Бант красивый 2', 'У наявностi', '/images/goods/viber_2021-02-26_19-07-08-965/1629141398viber_2021-02-26_19-07-08-965.jpg', '', '', '', '', 'бантик-бабантикбантик-бабантикбантик-бабантикбантик-бабантикбантик-бабантикбантик-бабантикбантик-бабантик', '55'),
(15, '1bantik', NULL, 'Бант аыва 3', 'Пiд замовлення', '/images/goods/viber_2021-07-21_20-15-47-059/1629141445viber_2021-07-21_20-15-47-059.jpg', '/images/goods/viber_2021-07-21_20-15-47-059/1629141445viber_2021-07-26_20-21-38-101.jpg', '/images/goods/viber_2021-07-21_20-15-47-059/1629141445viber_2021-07-26_20-21-37-504.jpg', '/images/goods/viber_2021-07-21_20-15-47-059/1629141445viber_2021-07-26_20-21-37-006.jpg', '/images/goods/viber_2021-07-21_20-15-47-059/1629141445viber_2021-07-26_20-21-38-101.jpg', 'вфывфывфвбантик-бабантикбантик-бабантикбантик-бабантикфывфыв', 'от 555'),
(16, '1bantik', 'fav_3', 'вфывфыв', 'Пiд замовлення', '/images/goods/viber_2021-07-26_20-21-37-006/1629141497viber_2021-07-26_20-21-37-006.jpg', '', '', '/images/goods/viber_2021-07-26_20-21-37-006/1629141497viber_2021-07-26_20-21-38-101.jpg', '', 'фафаппавапвпа', '444'),
(17, '2obruch', 'fav_4', 'бобруч 1', 'У наявностi', '/images/goods/viber_2021-02-26_19-07-09-053/1629141568viber_2021-02-26_19-07-09-053.jpg', '/images/goods/viber_2021-02-26_19-07-09-053/1629142158viber_2021-02-26_19-07-09-053.jpg', '', '', '', 'вфывфыв бобобобруууруруруч\r\nобобобруууруруруч\r\nобобобруууруруруч', 'от 75');

-- --------------------------------------------------------

--
-- Структура таблицы `variables`
--

CREATE TABLE IF NOT EXISTS `variables` (
  `id` int(3) NOT NULL,
  `title` varchar(20) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `variables`
--

INSERT INTO `variables` (`id`, `title`, `value`) VALUES
(1, 'slide1_title', 'Бантики-фигантики'),
(2, 'slide2_title', 'Обручи-бобручи'),
(3, 'slide3_title', 'Штучки-дрючки'),
(4, 'slide1_text', 'Налетай торопись топ бантики ЕУ'),
(5, 'slide2_text', 'Налетай торопись топ бобручи СНГ'),
(6, 'slide3_text', 'Налетай торопись штуки-дрюки\r\nтакие что любого надрючат'),
(7, 'viber_link', 'https://invite.viber.com/?g2=AQAasivCpxu2F0se8eaBd3UWuguC9lPZk66AnhGqiFfwpE3AjhniPW9hnHU1jqvf'),
(8, 'Instagram_link', '#'),
(9, 'facebook_link', '#'),
(10, 'vkontakte_link', '#');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
