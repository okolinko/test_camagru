-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Мар 28 2019 г., 12:23
-- Версия сервера: 5.7.24
-- Версия PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `camagru`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `foto`
--

INSERT INTO `foto` (`id`, `name`, `user_id`, `img`) VALUES
(1, '123', 1, '1.jpg'),
(2, '221', 2, 'avatar.png'),
(3, '334', 1, '2.png'),
(4, 'image', 1, 'img-02.jpg'),
(5, 'image2', 1, 'img-03.jpg'),
(6, 'image3', 2, 'img-04.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `like_photo`
--

CREATE TABLE `like_photo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `like_photo`
--

INSERT INTO `like_photo` (`id`, `user_id`, `foto_id`, `status`) VALUES
(1, 1, 4, 0),
(2, 2, 1, 0),
(3, 2, 2, 0),
(4, 1, 1, 1),
(68, 0, 1, 1),
(69, 0, 2, 1),
(70, 0, 1, 1),
(71, 0, 2, 1),
(72, 0, 3, 1),
(73, 0, 4, 1),
(74, 0, 5, 1),
(75, 0, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `act_email` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `register`
--

INSERT INTO `register` (`id`, `user_name`, `password`, `admin`, `act_email`, `email`, `hash_email`) VALUES
(1, 'admin', 'cf09c171997917f5271ac2af9205e9d89333e127fcadfecf434399e9e127b645778bd0c36b8661f395af73b2b904d2f25287ec800e404c8e4118bc31521757de', 1, 1, 'lol@dsa.ds', '61547a0d'),
(2, 'Sania123', 'e58e7af344db4cedaae80b77b1743906453ea2e83b76a42d0d333ae3fc118f8051f20f3d7ea482c22a89477a6139a7c49ac70b8c58be8dc349f0c57b39fc1074', 0, 1, 'dfdjnj@dsgfd.com', 'b488b3e46596f7539dbe12892b582bcc4c3f1fa2cacdcb6e2880aa190914d191b752d3e35613f0f8f5d362596afd458421d79f856a940aa6e2021482471e8524');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `like_photo`
--
ALTER TABLE `like_photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT для таблицы `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT для таблицы `like_photo`
--
ALTER TABLE `like_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
