-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2021 a las 21:21:50
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programador`
--

CREATE TABLE `programador` (
  `NUM_IDENTIFICACION` int(11) NOT NULL,
  `DSC_NOMBRE` varchar(25) NOT NULL,
  `DSC_APELLIDOS` varchar(50) NOT NULL,
  `DSC_TELEFONO` varchar(10) NOT NULL,
  `DSC_EMAIL` varchar(30) NOT NULL,
  `IDE_PROVINCIA` int(11) NOT NULL,
  `DSC_DIRECCION` text NOT NULL,
  `IND_GENERO` varchar(2) NOT NULL,
  `DSC_ARCHIVO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programador`
--

INSERT INTO `programador` (`NUM_IDENTIFICACION`, `DSC_NOMBRE`, `DSC_APELLIDOS`, `DSC_TELEFONO`, `DSC_EMAIL`, `IDE_PROVINCIA`, `DSC_DIRECCION`, `IND_GENERO`, `DSC_ARCHIVO`) VALUES
(302850381, 'Mario', 'Vindas', '88233844', 'mariovindas150@hotmail.com', 7, 'Limón, Costa Rica', 'h', '../Resources/archivos/302850381_CV_Mario.pdf'),
(702850381, 'Fabricio', 'Vindas Hernandez', '63261312', 'fabriciomario01@gmail.com', 3, 'El Molino, Cartago ', 'h', '../Resources/archivos/702850381_CV_Fabricio.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programador_lenguajes`
--

CREATE TABLE `programador_lenguajes` (
  `NUM_IDE` int(11) NOT NULL,
  `NUM_IDENTIFICACION` int(11) NOT NULL,
  `DSC_LENGUAJE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programador_lenguajes`
--

INSERT INTO `programador_lenguajes` (`NUM_IDE`, `NUM_IDENTIFICACION`, `DSC_LENGUAJE`) VALUES
(62, 702850381, 'Java'),
(63, 702850381, 'C++'),
(64, 702850381, 'C#'),
(65, 702850381, 'Python'),
(66, 702850381, 'PHP'),
(67, 302850381, 'Java'),
(68, 302850381, 'C++'),
(69, 302850381, 'C#'),
(70, 302850381, 'Python'),
(71, 302850381, 'PHP');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `programador`
--
ALTER TABLE `programador`
  ADD PRIMARY KEY (`NUM_IDENTIFICACION`);

--
-- Indices de la tabla `programador_lenguajes`
--
ALTER TABLE `programador_lenguajes`
  ADD PRIMARY KEY (`NUM_IDE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `programador_lenguajes`
--
ALTER TABLE `programador_lenguajes`
  MODIFY `NUM_IDE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
