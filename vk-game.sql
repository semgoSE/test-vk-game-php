-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 19 2021 г., 18:15
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vk-game`
--

-- --------------------------------------------------------

--
-- Структура таблицы `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `is_start` tinyint(1) NOT NULL,
  `is_end` tinyint(1) NOT NULL,
  `w_top` int(11) DEFAULT NULL,
  `w_left` int(11) DEFAULT NULL,
  `w_right` int(11) DEFAULT NULL,
  `w_bottom` int(11) DEFAULT NULL,
  `mode` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `room`
--

INSERT INTO `room` (`room_id`, `is_start`, `is_end`, `w_top`, `w_left`, `w_right`, `w_bottom`, `mode`) VALUES
(0, 1, 0, NULL, NULL, 1, NULL, 'empty'),
(1, 0, 0, NULL, 0, 2, 5, 'empty'),
(2, 0, 0, NULL, 1, 3, NULL, 'empty'),
(3, 0, 0, NULL, 2, 4, NULL, 'enemy'),
(4, 0, 0, NULL, 3, NULL, NULL, 'treasure'),
(5, 0, 0, 1, NULL, 6, NULL, 'empty'),
(6, 0, 0, NULL, 5, NULL, 7, 'empty'),
(7, 0, 0, 6, NULL, NULL, 8, 'empty'),
(8, 0, 0, 7, 9, 11, NULL, 'empty'),
(9, 0, 0, NULL, 10, 8, NULL, 'empty'),
(10, 0, 0, NULL, NULL, 9, NULL, 'enemy'),
(11, 0, 0, NULL, 8, 12, 14, 'empty'),
(12, 0, 0, 13, 11, NULL, NULL, 'empty'),
(13, 0, 0, NULL, NULL, NULL, 12, 'treasure'),
(14, 0, 1, 11, NULL, NULL, NULL, 'empty');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `player` text NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `player`, `count`) VALUES
(1, 'semgo', 11);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
