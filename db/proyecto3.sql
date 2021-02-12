-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2019 a las 20:05:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE `author` (
  `Aid` int(30) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`Aid`, `Name`, `Surname`, `Country`) VALUES
(1, 'Adrian', 'Partida', 'España'),
(2, 'Eric', 'Olmo', 'España\r\n'),
(4, 'David', 'Feijoo', 'EspaÃ±a'),
(5, 'Joan', 'Delegado', 'EspaÃ±a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quote`
--

CREATE TABLE `quote` (
  `Qid` int(30) NOT NULL,
  `Quote` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `Likes` int(200) NOT NULL,
  `AuthorFK` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `quote`
--

INSERT INTO `quote` (`Qid`, `Quote`, `Date`, `Likes`, `AuthorFK`) VALUES
(3, 'Pues la verdad es que si', '2019-04-20', 11, 2),
(13, 'Ha quedado bien', '2019-04-23', 24, 1),
(14, 'Oh, alomejor no tanto', '2019-04-23', 31, 2),
(19, 'Esto se puede probar ya?', '2019-03-07', 41, 4),
(20, 'CÃ³mo se hace esto?', '2019-04-05', 50, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `User` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`User`, `Password`, `role`) VALUES
('adrian', '420224716211d6bb4c38943e71bb70da', 'Admin'),
('test', '8f7c776e5224b354569c4fa893253922', 'Standard');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Aid`);

--
-- Indices de la tabla `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`Qid`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `author`
--
ALTER TABLE `author`
  MODIFY `Aid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `quote`
--
ALTER TABLE `quote`
  MODIFY `Qid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
