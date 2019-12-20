-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 20 2019 г., 10:02
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `arenda`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `ID` int(11) NOT NULL,
  `Рег_номер` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Марка` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`ID`, `Рег_номер`, `Марка`) VALUES
(1, 'ф156ры05', 'LADA'),
(2, 'к546пк777', 'Mitsubishi'),
(3, 'д336ил123', 'Chevrolet'),
(4, 'п456др30', 'Mazda'),
(5, 'р111ип45', 'Daewoo'),
(6, 'к117ай79', 'Lifan'),
(7, 'с700ры83', 'Opel'),
(8, 'у564аз173', 'УАЗ'),
(9, 'к541ек82', 'ГАЗ'),
(10, 'о510мс95', 'FIAT'),
(11, 'н888вм23', 'Mercedes-Benz'),
(12, 'н450ко30', 'Daihatsu'),
(13, 'к058ве30', 'Ford');

-- --------------------------------------------------------

--
-- Структура таблицы `carcass`
--

CREATE TABLE `carcass` (
  `ID` int(11) NOT NULL,
  `Тип_кузова` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `carcass`
--

INSERT INTO `carcass` (`ID`, `Тип_кузова`) VALUES
(1, 'Купе'),
(2, 'Универсал'),
(3, 'Купе'),
(4, 'Кроссовер'),
(5, 'Хетчбэк'),
(6, 'Хэтчбэк'),
(7, 'Внедорожник'),
(8, 'Минивэн'),
(9, 'Пикап'),
(10, 'Фургон'),
(11, 'Кабриолет'),
(12, 'Универсал'),
(13, 'Хетчбэк');

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `ID` int(11) NOT NULL,
  `Цвет` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`ID`, `Цвет`) VALUES
(1, 'Жёлтый'),
(2, 'Серый'),
(3, 'Жёлтый'),
(4, 'Черный'),
(5, 'Красный'),
(6, 'Золотой'),
(7, 'Фиолетовый'),
(8, 'Серый'),
(9, 'Белый'),
(10, 'Белый'),
(11, 'Красный'),
(12, 'Серый'),
(13, 'Серый');

-- --------------------------------------------------------

--
-- Структура таблицы `contract`
--

CREATE TABLE `contract` (
  `ID_contract` int(11) NOT NULL,
  `Рег_номер` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ВУ` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Дата` date NOT NULL,
  `Длительность` int(11) NOT NULL,
  `Стоимость` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `contract`
--

INSERT INTO `contract` (`ID_contract`, `Рег_номер`, `ВУ`, `Дата`, `Длительность`, `Стоимость`) VALUES
(1, 'ф156ры05', '2838228228', '2001-07-13', 2, '600'),
(2, 'ф156ры05', '3015765534', '2005-04-01', 1, '2500'),
(3, 'д336ил123', '5469781325', '2001-04-01', 15, '22500'),
(4, 'р111ип45', '9876543211', '2005-06-23', 7, '3500'),
(5, 'ф156ры05', '9945613256', '2002-11-09', 2, '600'),
(6, 'п456др30', '2266265456', '2003-12-13', 15, '15000'),
(7, 'к546пк777', '6786456987', '2001-11-13', 10, '9000'),
(8, 'р111ип45', '1234655322', '2003-04-12', 20, '10000'),
(9, 'к541ек82', '1215958573', '2004-06-15', 30, '18900'),
(10, 'у564аз173', '9849825627', '2005-07-22', 2, '1100'),
(11, 'с700ры83', '4125748249', '2004-08-14', 7, '5950'),
(12, 'к117ай79', '7984561326', '2005-09-03', 14, '8400'),
(13, 'о510мс95', '1122334455', '2004-01-18', 30, '23400'),
(14, 'н888вм23', '7564235485', '2003-09-05', 3, '5100'),
(15, 'к058ве30', '6543219845', '2003-08-15', 5, '1900'),
(16, 'н450ко30', '1122334455', '2002-10-14', 15, '6000'),
(28, 'к058ве30', '9911566623', '2001-10-25', 30, '11400');

-- --------------------------------------------------------

--
-- Структура таблицы `gearbox`
--

CREATE TABLE `gearbox` (
  `ID` int(11) NOT NULL,
  `КПП` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gearbox`
--

INSERT INTO `gearbox` (`ID`, `КПП`) VALUES
(1, 'МКПП'),
(2, 'АКПП'),
(3, 'АКПП'),
(4, 'АКПП'),
(5, 'МКПП'),
(6, 'МКПП'),
(7, 'МКПП'),
(8, 'МКПП'),
(9, 'МКПП'),
(10, 'МКПП'),
(11, 'АКПП'),
(12, 'АКПП'),
(13, 'МКПП');

-- --------------------------------------------------------

--
-- Структура таблицы `model`
--

CREATE TABLE `model` (
  `ID` int(11) NOT NULL,
  `Модель` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `model`
--

INSERT INTO `model` (`ID`, `Модель`) VALUES
(1, '2108'),
(2, 'Galant VII'),
(3, 'Camaro'),
(4, 'CX-3'),
(5, 'Matiz'),
(6, 'Smily'),
(7, 'Frontera'),
(8, '452 Буханка'),
(9, 'ГАЗель 3302'),
(10, 'Ducato'),
(11, 'SLK-класс'),
(12, 'Pyzar'),
(13, 'Scorpio');

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE `price` (
  `ID` int(11) NOT NULL,
  `Стоимость` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`ID`, `Стоимость`) VALUES
(1, '300'),
(2, '900'),
(3, '1500'),
(4, '1000'),
(5, '500'),
(6, '600'),
(7, '850'),
(8, '550'),
(9, '630'),
(10, '780'),
(11, '1700'),
(12, '400'),
(13, '380');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Имя` text NOT NULL,
  `Фамилия` text NOT NULL,
  `Отчество` text NOT NULL,
  `ВУ` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Номер_телефона` text NOT NULL,
  `Хэш` text NOT NULL,
  `Администратор` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Имя`, `Фамилия`, `Отчество`, `ВУ`, `Номер_телефона`, `Хэш`, `Администратор`) VALUES
('Акакий', 'Акаков', 'Акакиевич', '1122334455', '89776655441', '$2y$10$zE.bnTdTPldjAp4gdK45Yuda3ix0iMVDZ99STV3uslcm/f43mLB8u', 0),
('Михаил', 'Затруднительный', 'Алёшевич', '1215958573', '89610543354', '$2y$10$upw8diU19MC05GUYgd.htep1gHz.aZO8uFjyQC0Ota63/vueIl0Ry', 0),
('Николай', 'Чумоченко', 'Почемучевич', '1234655322', '89996451928', '$2y$10$zW9IJf4Q.W0DibHcE7LHkenQdDpm6XnNmBfuC0ICirMJhsHSgenBK', 0),
('Иван', 'Иванов', 'Иванович', '2266265456', '89880627311', '$2y$10$beDBu69aeMeqS..MlySwVu6JIlpXgCxpbqLyblh474CdtO/1VhKHa', 0),
('Васян', 'Пупкин', 'Паштетович', '2838228228', '89573645972', '$2y$10$QnvWjtmhDXzn0wKxOSReXu5YcPHPf2h2Xa6z2Z7ymI65n2yss9qxG', 0),
('Дмитрий', 'Морозов', 'Васянович', '3015765534', '89398235892', '$2y$10$CES5sCkU.FGF9pQWWuDXVekvxOBYPDbbrBIe/qgJb//eui7EIyh5q', 0),
('Любовь', 'Досвидантесь', 'Олегофреновна', '4125748249', '89654123548', '$2y$10$tdfMbbwABg00/WloPl8FvO1kCaiwORwmy0OmYCIBkvXqUBb7vXhY6', 0),
('Владислав', 'Алегафф', 'Алегавич', '5469781325', '89608556750', '$2y$10$XNfpO3hWaIRQzI3OVubeh.XbKgi94SMvcOAVSfDYTME5V.lL2UZKa', 0),
('Аркадий', 'Паровозов', 'Дмитриевич', '6543219845', '89651468136', '$2y$10$TSKq.OcmHhz7pPDy35J0JOHylznrv.cslHm2IwzreVOltU4RlWuva', 0),
('Антон', 'Чехов', 'Павлович', '6786456987', '89608600952', '$2y$10$Dic6yf3u83BbvVTp9vAC/urTgzh0qgwXb0mQLO8eWJ/ByEGxoa8Su', 0),
('Анастасия', 'Чумоченко', 'Петровна', '7564235485', '89995312647', '$2y$10$OZ/p2g.nMab9Kgps7IXIRezX56UPhcPxquTVWVA6MCmH0o/3xBHbe', 0),
('Наталья', 'Баромина', 'Викторовна', '7984561326', '89651321564', '$2y$10$7CY6nx7yp.X0LeHfnUh6Se4QTXhlXCVxGRquTdlX/xCqURimFnx8u', 0),
('Виктория', 'Степанюк', 'Андреевна', '9849825627', '89532564136', '$2y$10$3hLiRE7Aha97OC6T0dRElOhvRQpUCaq2SgQ7s08vHpYZtEg4Lvcqq', 0),
('Анатолий', 'Лада', 'Седанович', '9876543211', '89965042390', '$2y$10$FJ0ofyUq9955XVjj1xd2MO7VpQr/IT73S.AfExfvw0IOwd6zd3Bpu', 0),
('Владимир', 'Крупкин', 'Владимирович', '9911566623', '89275654123', '$2y$10$3KgcstLmXrl3dxT1fSrw7O/pPlW5h6vEflSFSyQK/xXWIMnOZGAWm', 1),
('Алимен', 'Плати', 'Налогович', '9945613256', '89673325434', '$2y$10$pm05jcY.5FpZTVzeSWUDkOTXkaF8m4Dkt7v9hdizHMRacko8wwM.C', 0),
('Валера', 'Валерон', 'Валерович', '9955651115', '89965412332', '$2y$10$slkKmuCco4FBCX.0Xb9fPusCKBBLZgg/h3H8Do8wOpNgh6CLasg/y', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Рег.номер` (`Рег_номер`) USING BTREE;

--
-- Индексы таблицы `carcass`
--
ALTER TABLE `carcass`
  ADD KEY `ID_авто` (`ID`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD KEY `ID_авто` (`ID`);

--
-- Индексы таблицы `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ID_contract`),
  ADD KEY `ВУ` (`ВУ`) USING BTREE,
  ADD KEY `Рег.номер` (`Рег_номер`) USING BTREE;

--
-- Индексы таблицы `gearbox`
--
ALTER TABLE `gearbox`
  ADD KEY `ID_авто` (`ID`);

--
-- Индексы таблицы `model`
--
ALTER TABLE `model`
  ADD KEY `ID_авто` (`ID`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD KEY `ID` (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ВУ`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `contract`
--
ALTER TABLE `contract`
  MODIFY `ID_contract` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `carcass`
--
ALTER TABLE `carcass`
  ADD CONSTRAINT `carcass_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `auto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `auto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`Рег_номер`) REFERENCES `auto` (`рег_номер`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`ВУ`) REFERENCES `users` (`ву`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gearbox`
--
ALTER TABLE `gearbox`
  ADD CONSTRAINT `gearbox_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `auto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `auto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `auto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
