-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: sql311.infinityfree.com
-- Время создания: Май 23 2024 г., 13:40
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `if0_36580558_wp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id`, `id_subject`, `date`) VALUES
(1, 1, '2024-05-29 00:09:00'),
(2, 2, '2024-05-29 00:10:00'),
(3, 3, '2024-05-30 00:11:00'),
(4, 4, '2024-05-31 00:12:00'),
(5, 5, '2024-06-01 00:08:00'),
(6, 0, '2021-12-17 09:00:00'),
(7, 2, '2024-03-01 12:12:00'),
(8, 2, '2024-05-29 11:30:00'),
(9, 5, '2024-05-30 09:00:00'),
(10, 5, '2024-05-30 09:00:00'),
(11, 0, '2024-05-23 20:33:00'),
(12, 0, '2024-05-23 20:33:00'),
(13, 4, '2024-05-30 20:39:00');

-- --------------------------------------------------------

--
-- Структура таблицы `specialities`
--

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specialities`
--

INSERT INTO `specialities` (`id`, `code`, `title`) VALUES
(1, '09.67.44', 'Астрофизика'),
(2, '09.67.412', 'Программирование'),
(3, '12.51.64', 'Литературные науки'),
(4, '12.42.51', 'Русское литероведчество'),
(5, '12.52.12', 'Информатика в промышленности');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `title`) VALUES
(1, 'Импортность'),
(2, 'Математические науки'),
(3, 'Языковая культура'),
(4, 'Практическое программирование'),
(5, 'Пайка');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects_to_specialities`
--

CREATE TABLE `subjects_to_specialities` (
  `id` int(11) NOT NULL,
  `id_speciality` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subjects_to_specialities`
--

INSERT INTO `subjects_to_specialities` (`id`, `id_speciality`, `id_subject`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 2, 4),
(8, 3, 3),
(9, 4, 1),
(10, 4, 3),
(11, 5, 1),
(12, 5, 2),
(13, 5, 4),
(14, 5, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects_to_specialities`
--
ALTER TABLE `subjects_to_specialities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `subjects_to_specialities`
--
ALTER TABLE `subjects_to_specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
