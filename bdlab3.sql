-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 28 2021 г., 17:02
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bdlab3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cheice`
--

CREATE TABLE `cheice` (
  `id_tema` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `cheice`
--

INSERT INTO `cheice` (`id_tema`, `id`, `name`, `sum`) VALUES
(0, 82, 'Films', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `ips`
--

CREATE TABLE `ips` (
  `id_tema` int(12) NOT NULL,
  `ip_id` int(12) NOT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `num`
--

CREATE TABLE `num` (
  `id_tema` int(11) NOT NULL,
  `numer` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `visits`
--

CREATE TABLE `visits` (
  `id_tema` int(11) NOT NULL,
  `visit_id` int(12) NOT NULL,
  `date` date NOT NULL,
  `hosts` int(12) NOT NULL,
  `views` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cheice`
--
ALTER TABLE `cheice`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ips`
--
ALTER TABLE `ips`
  ADD PRIMARY KEY (`ip_id`);

--
-- Индексы таблицы `num`
--
ALTER TABLE `num`
  ADD PRIMARY KEY (`id_tema`);

--
-- Индексы таблицы `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cheice`
--
ALTER TABLE `cheice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `ips`
--
ALTER TABLE `ips`
  MODIFY `ip_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `num`
--
ALTER TABLE `num`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `visits`
--
ALTER TABLE `visits`
  MODIFY `visit_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
