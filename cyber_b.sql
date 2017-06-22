-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2017 г., 11:14
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cyber_b`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bets`
--

CREATE TABLE IF NOT EXISTS `bets` (
  `id` int(11) NOT NULL,
  `comp_id` int(5) NOT NULL,
  `team_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Структура таблицы `competition`
--

CREATE TABLE IF NOT EXISTS `competition` (
  `id` int(11) NOT NULL,
  `date_begin` datetime NOT NULL,
  `game_id` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `competition`
--

INSERT INTO `competition` (`id`, `date_begin`, `game_id`) VALUES
(1, '2017-06-22 11:30:00', 1),
(2, '2017-06-22 13:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `game_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `abbr` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`game_id`, `name`, `abbr`) VALUES
(1, 'Counter-Strike: Global Offensive', 'CSGO'),
(2, 'Dota 2', 'Dota2'),
(3, 'Overwatch', 'OW'),
(4, 'World of Tanks', 'WoT');

-- --------------------------------------------------------

--
-- Структура таблицы `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `id_comp` int(11) NOT NULL,
  `id_first_team` int(11) NOT NULL,
  `id_second_team` int(11) NOT NULL,
  `first_coef` float NOT NULL,
  `second_coef` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `matches`
--

INSERT INTO `matches` (`id_comp`, `id_first_team`, `id_second_team`, `first_coef`, `second_coef`) VALUES
(1, 1, 4, 1.75, 1.45);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `game_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teams`
--

INSERT INTO `teams` (`team_id`, `name`, `logo`, `game_id`) VALUES
(1, 'Natus Vincere.G2A', 'navi.png', 1),
(2, 'Natus Vincere', 'navi.png', 2),
(3, 'Natus Vincere WoT', 'navi.png', 4),
(4, 'Virtus Pro', 'VP.png', 1),
(5, 'Virtus Pro', 'VP.png', 2),
(6, 'Space Soldiers', 'spaceS.png', 1),
(7, 'Astralis', 'astralis.png', 1),
(8, 'Cloud9', 'cloud9.png', 1),
(9, 'Cloud9', 'cloud9.png', 2),
(10, 'Fnatic', 'fnatic.png', 1),
(11, 'Fnatic.Dota2', 'fnatic.png', 2),
(12, 'Gambit', 'gambit.png', 1),
(13, 'Gambit Esports', 'gambit.png', 2),
(14, 'Gambit Gaming', 'gambit.png', 4),
(15, 'Kinguin', 'kinguin.png', 1),
(16, 'Kinguin Esports', 'kinguin.png', 3),
(17, 'Cloud9 OW', 'cloud9.png', 3),
(18, 'Newbee', 'newbee.png', 2),
(19, 'Penta', 'penta.png', 1),
(20, 'Penta 5', 'penta.png', 2),
(21, 'Penta', 'penta.png', 3),
(22, 'Secret', 'secret.png', 2),
(23, 'Team Secret', 'secret.png', 1),
(24, 'Team Secret', 'secret.png', 3),
(25, 'Team Secret', 'secret.png', 4),
(26, 'North', 'north.png', 1),
(27, 'North.A', 'north.png', 4),
(28, 'North', 'north.png', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tournament`
--

CREATE TABLE IF NOT EXISTS `tournament` (
  `id_comp` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tournament`
--

INSERT INTO `tournament` (`id_comp`, `name`) VALUES
(1, 'Adrenaline Cyber League');

-- --------------------------------------------------------

--
-- Структура таблицы `tournament_teams`
--

CREATE TABLE IF NOT EXISTS `tournament_teams` (
  `id` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `id_comp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(200) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `ref` int(10) NOT NULL,
  `bank` int(30) NOT NULL,
  `role_id` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `e-mail`, `name`, `birthday`, `ref`, `bank`, `role_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'cyber-b@admin.com', 'Админ', '2017-06-21', 1, 3000000, 1),
(2, 'sayrus383', '8b28db37794e9bcc826397f00ee33428', 'sayrus383@mail.ru', 'Исмаил', '1999-03-12', 2, 350000, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comp_id` (`comp_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Индексы таблицы `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id_comp`),
  ADD KEY `id_first_team` (`id_first_team`),
  ADD KEY `id_second_team` (`id_second_team`),
  ADD KEY `id_comp` (`id_comp`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Индексы таблицы `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Индексы таблицы `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id_comp`),
  ADD KEY `id_comp` (`id_comp`);

--
-- Индексы таблицы `tournament_teams`
--
ALTER TABLE `tournament_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_team` (`id_team`),
  ADD KEY `id_comp` (`id_comp`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bets`
--
ALTER TABLE `bets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `matches`
--
ALTER TABLE `matches`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tournament_teams`
--
ALTER TABLE `tournament_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bets`
--
ALTER TABLE `bets`
  ADD CONSTRAINT `bets_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bets_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `competition` (`id`),
  ADD CONSTRAINT `bets_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`);

--
-- Ограничения внешнего ключа таблицы `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);

--
-- Ограничения внешнего ключа таблицы `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_3` FOREIGN KEY (`id_comp`) REFERENCES `competition` (`id`),
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`id_first_team`) REFERENCES `teams` (`team_id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`id_second_team`) REFERENCES `teams` (`team_id`);

--
-- Ограничения внешнего ключа таблицы `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);

--
-- Ограничения внешнего ключа таблицы `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `tournament_ibfk_1` FOREIGN KEY (`id_comp`) REFERENCES `competition` (`id`);

--
-- Ограничения внешнего ключа таблицы `tournament_teams`
--
ALTER TABLE `tournament_teams`
  ADD CONSTRAINT `tournament_teams_ibfk_2` FOREIGN KEY (`id_comp`) REFERENCES `competition` (`id`),
  ADD CONSTRAINT `tournament_teams_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `teams` (`team_id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
