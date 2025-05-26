-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 26 2025 г., 15:35
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kursovaya`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gamemode`
--

CREATE TABLE `gamemode` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `control_time` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `gamemode`
--

INSERT INTO `gamemode` (`id`, `name`, `control_time`) VALUES
(1, 'Пуля', '1+0'),
(2, 'Пуля', '2+1'),
(3, 'Блиц', '3+0'),
(4, 'Блиц', '3+2'),
(5, 'Рапид', '10+0'),
(6, 'Рапид', '10+5'),
(7, 'Рапид', '15+10'),
(8, 'Классика', '30+0'),
(9, 'Классика', '60+0'),
(10, 'Классика', '60+30');

-- --------------------------------------------------------

--
-- Структура таблицы `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` varchar(85) NOT NULL,
  `img` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `level`
--

INSERT INTO `level` (`id`, `name`, `img`) VALUES
(1, 'Муниципальный уровень', 'mc.jpg'),
(2, 'Региональный уровень', 'reg.jpg'),
(3, 'Межрегиональный уровень ', 'mgreg.jpg'),
(4, 'Всероссийский уровень', 'all.jpg'),
(5, 'Международный уровень', 'mgnac.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `planning`
--

CREATE TABLE `planning` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `organizer` varchar(85) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `gamemode_id` int(11) NOT NULL,
  `imageFile` varchar(255) NOT NULL,
  `quantity_rounds` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `planning`
--

INSERT INTO `planning` (`id`, `content`, `organizer`, `user_id`, `gamemode_id`, `imageFile`, `quantity_rounds`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ghjn ,', NULL, 2, 7, '181128-fabiano-caruana-chess-cs-249p-2662196.jpg', 9, NULL, '2025-05-10 12:28:31', 1),
(2, 'ррсчаам', 'Чемпики', 2, 9, 'a6fcb62445d9930e4241215e18feee45.jpg', 9, NULL, '2025-05-09 12:06:43', 2),
(3, 'хочу провести', 'Чемпики', 2, 6, 'a6fcb62445d9930e4241215e18feee45.jpg', 9, NULL, '2025-05-09 12:06:28', 2),
(4, 'Чисто для проверка', '', 3, 1, 'Лого.png', 9, '2025-05-09 18:18:50', '2025-05-10 12:37:07', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'Республика Адыгея'),
(2, 'Республика Алтай'),
(3, 'Республика Башкортостан'),
(4, 'Республика Бурятия'),
(5, 'Республика Дагестан'),
(6, 'Донецкая Народная Республика'),
(7, 'Республика Ингушетия'),
(8, 'Кабардино-Балкарская Республика'),
(9, 'Республика Калмыкия'),
(10, 'Карачаево-Черкесская Республика'),
(11, 'Республика Карелия'),
(12, 'Республика Коми'),
(13, 'Республика Крым'),
(14, 'Луганская Народная Республика'),
(15, 'Республика Марий Эл'),
(16, 'Республика Мордовия'),
(17, 'Республика Саха (Якутия)'),
(18, 'Республика Северная Осетия — Алания'),
(19, 'Республика Татарстан'),
(20, 'Республика Тыва'),
(21, 'Удмуртская Республика'),
(22, 'Республика Хакасия'),
(23, 'Чеченская Республика'),
(24, 'Чувашская Республика — Чувашия'),
(25, 'Алтайский край'),
(26, 'Забайкальский край'),
(27, 'Камчатский край'),
(28, 'Краснодарский край'),
(31, 'Красноярский край'),
(32, 'Пермский край'),
(33, 'Приморский край'),
(34, 'Ставропольский край'),
(35, 'Амурская область'),
(36, 'Архангельская область'),
(37, 'Астраханская область'),
(38, 'Белгородская область'),
(39, 'Брянская область'),
(40, 'Владимирская область'),
(41, 'Хабаровский край'),
(42, 'Волгоградская область'),
(43, 'Воронежская область'),
(44, 'Запорожская область'),
(45, 'Ивановская область'),
(46, 'Иркутская область'),
(47, 'Калининградская область'),
(48, 'Калужская область'),
(49, 'Кемеровская область — Кузбасс'),
(50, 'Кировская область'),
(51, 'Костромская область'),
(52, 'Курганская область'),
(53, 'Курская область'),
(54, 'Ленинградская область'),
(55, 'Липецкая область'),
(56, 'Магаданская область'),
(57, 'Московская область'),
(58, 'Мурманская область'),
(59, 'Нижегородская область'),
(60, 'Новгородская область'),
(61, 'Новосибирская область'),
(62, 'Омская область'),
(63, 'Оренбургская область'),
(64, 'Орловская область'),
(65, 'Пензенская область'),
(66, 'Псковская область'),
(67, 'Ростовская область'),
(68, 'Рязанская область'),
(69, 'Самарская область'),
(70, 'Саратовская область'),
(71, 'Сахалинская область'),
(72, 'Саратовская область'),
(73, 'Свердловская область'),
(74, 'Смоленская область'),
(75, 'Тамбовская область'),
(76, 'Тверская область'),
(77, 'Томская область'),
(78, 'Тульская область'),
(79, 'Тюменская область'),
(80, 'Ульяновская область'),
(81, 'Херсонская область'),
(82, 'Челябинская область'),
(83, 'Ярославская область'),
(84, 'Москва'),
(85, 'Санкт-Петербург	'),
(86, 'Севастополь'),
(87, 'Еврейская АО	'),
(88, 'Ханты-Мансийский АО — Югра'),
(89, 'Ненецкий АО'),
(90, 'Чукотский АО'),
(91, 'Ямало-Ненецкий АО');

-- --------------------------------------------------------

--
-- Структура таблицы `reg_to_tournament`
--

CREATE TABLE `reg_to_tournament` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reg_to_tournament`
--

INSERT INTO `reg_to_tournament` (`id`, `tournament_id`, `user_id`, `registration_date`) VALUES
(0, 5, 4, '0000-00-00'),
(0, 5, 3, '0000-00-00'),
(0, 5, 6, '0000-00-00'),
(0, 5, 8, '2025-05-10'),
(0, 5, 9, '2025-05-11');

-- --------------------------------------------------------

--
-- Структура таблицы `tournament`
--

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL,
  `img` varchar(60) NOT NULL,
  `name` varchar(90) NOT NULL,
  `description` varchar(255) NOT NULL,
  `gamemode_id` int(11) NOT NULL,
  `location` varchar(90) NOT NULL,
  `quantity_rounds` int(11) NOT NULL,
  `status` varchar(60) NOT NULL,
  `level_id` int(11) NOT NULL,
  `registration_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tournament`
--

INSERT INTO `tournament` (`id`, `img`, `name`, `description`, `gamemode_id`, `location`, `quantity_rounds`, `status`, `level_id`, `registration_date`) VALUES
(3, 'pacxa.jpg', 'Пасхальный турнир', 'Пасхальный турнир! Всем по куличику!', 4, 'ул. Пушкина 44', 7, 'Завершен', 2, NULL),
(4, '9may.jpg', 'Шахматные баталии', 'Все бьются до конца!!!', 8, 'Парк Победы', 9, 'Завершен', 4, NULL),
(5, '1june.jpg', 'День защиты детей', 'Турнир, посвященный детям!', 9, 'г. Курган ул. Пушкина 47', 7, 'Запланирован', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(90) NOT NULL,
  `email` varchar(60) NOT NULL,
  `elo` int(11) DEFAULT 1000,
  `password` varchar(64) NOT NULL,
  `role` int(2) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `email`, `elo`, `password`, `role`, `region_id`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'Дмитрий', 'Лакаев', 'dimalakaev@gmail.com', NULL, '$2y$13$35hKuK9uMCfHEbCyJBr/nOHVcBFOy0VkyaI1U.7NBV/3L4H1wN7Vu', 1, 52, '2025-04-18 21:01:23', '2025-04-18 21:01:23'),
(3, 'Clash_Royale322', 'Денис', 'Семенов', 'cash@gmail.com', 1234, '$2y$13$iJwWtwF6RgEYGRZH5xHYmemQKrfTUF/sXgI4CzQTJoiD7EaCpV73C', NULL, 52, '2025-04-27 19:14:49', '2025-04-29 18:54:57'),
(4, 'dima17778', 'Дима', 'Лакаев', 'dimalakaev@gmail.com', NULL, '$2y$13$E7VwomD7N9qRWzIlfNXAg.BO9/IdiCecrRzr2NiSQ//4EPb6IHWxS', NULL, 52, '2025-05-03 10:56:11', '2025-05-03 10:56:11'),
(5, 'Alexey322', 'Aлексей', 'Пухов', 'pa@gmail.com', NULL, '$2y$13$6aAVj02DYCUZpIWlNAkV3.iajwp2vOiWQiIY2vaZnXcVEzVvc0pSC', NULL, 52, '2025-05-03 18:46:16', '2025-05-03 18:46:16'),
(6, 'nikitos1k', 'Никита', 'Пахарьков', 'nikitos1k@gmail.com', NULL, '$2y$13$HccxYZ1iz2jwc.tFuUSq/.BhcOQcpr047Dh7fy71Q/yi2mCluumQ.', NULL, 52, '2025-05-03 18:50:50', '2025-05-03 18:50:50'),
(7, 'iamlegend567', 'Кира', 'Накамура', 'kn@gmail.com', NULL, '$2y$13$jTGi.jwXd8JunO947UV1FOA8LuT1Wi3FJm.NJVS/Zvn7lPa8rElt.', NULL, 55, '2025-05-03 19:02:20', '2025-05-03 19:02:20'),
(8, 'Yula', 'Юлия', 'Чеботина', 'yula@gmail.com', NULL, '$2y$13$EjOD/jVqvgvREZbNa7aJI.XJ/hXt97a0/xAOcFgUc3f71GrKcTqRS', NULL, 1, '2025-05-10 11:30:19', '2025-05-10 11:30:19'),
(9, 'ChessMaster52', 'Сергей', 'Познафиренко', 'pozno@gmail.com', NULL, '$2y$13$NGDTGET.UIxxSC9WZz2kfeT4Av3f3bzgC6lzhIlnZQH8x9WJJq4JC', NULL, 10, '2025-05-11 16:25:57', '2025-05-11 16:25:57');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gamemode`
--
ALTER TABLE `gamemode`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizer_id` (`user_id`,`gamemode_id`),
  ADD KEY `gamemode_id` (`gamemode_id`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reg_to_tournament`
--
ALTER TABLE `reg_to_tournament`
  ADD KEY `tournament_id` (`tournament_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gamemode_id` (`gamemode_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gamemode`
--
ALTER TABLE `gamemode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT для таблицы `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planning_ibfk_3` FOREIGN KEY (`gamemode_id`) REFERENCES `gamemode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reg_to_tournament`
--
ALTER TABLE `reg_to_tournament`
  ADD CONSTRAINT `reg_to_tournament_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reg_to_tournament_ibfk_2` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `tournament_ibfk_1` FOREIGN KEY (`gamemode_id`) REFERENCES `gamemode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tournament_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
