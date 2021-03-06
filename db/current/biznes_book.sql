-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 07 2017 г., 19:58
-- Версия сервера: 5.7.17
-- Версия PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `biznes_book`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `ac_id` int(11) NOT NULL,
  `unique_id` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`ac_id`, `unique_id`, `description`) VALUES
(1, 'h0f18334gdh12', 'main'),
(2, '231329bfdpb1p2', 'credit'),
(3, 'p92831dg1dbvd2p1', 'universal'),
(4, 'sad3xr43q4fq4fq', 'main'),
(5, '4qfxdx4f4qx4qf', 'credit'),
(6, '4qfxf4q4fxw', 'deposit');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `ca_id` int(11) NOT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`ca_id`, `name`) VALUES
(1, 'alcohol'),
(2, 'drugs'),
(3, 'music'),
(4, 'toys'),
(5, 'guns'),
(6, 'books');

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `tr_id` int(11) NOT NULL,
  `account_id` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `us_id` int(11) NOT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`us_id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.ad', 'adminpass'),
(2, 'test', 'test@test.te', 'testpass'),
(3, 'other', 'other@other.ot', 'otherpass');

-- --------------------------------------------------------

--
-- Структура таблицы `users_accounts`
--

CREATE TABLE `users_accounts` (
  `us_ac_id` int(11) NOT NULL,
  `user_id` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users_accounts`
--

INSERT INTO `users_accounts` (`us_ac_id`, `user_id`, `account_id`) VALUES
(1, '1', '4'),
(2, '1', '2'),
(3, '3', '1'),
(4, '2', '3'),
(5, '3', '5'),
(6, '2', '6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ac_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ca_id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tr_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`);

--
-- Индексы таблицы `users_accounts`
--
ALTER TABLE `users_accounts`
  ADD PRIMARY KEY (`us_ac_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users_accounts`
--
ALTER TABLE `users_accounts`
  MODIFY `us_ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
