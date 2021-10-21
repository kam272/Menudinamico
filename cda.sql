-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-10-2021 a las 16:18:57
-- Versión del servidor: 5.7.32-log
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE IF NOT EXISTS `actividades` (
  `id_actividad` int(11) NOT NULL,
  `nom_actividad` varchar(45) NOT NULL,
  `enlace` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `nom_actividad`, `enlace`) VALUES
(1, 'Ver usuarios', 'tablausuarios.php'),
(2, 'Modificar usuario', 'modificarusuario.php'),
(3, 'Agregar Usuario', 'agregarusuario.php'),
(4, 'Eliminar Usuario', 'eliminarusuario.php'),
(5, 'Cerrar sesión', 'cerrar.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestactividad`
--

DROP TABLE IF EXISTS `gestactividad`;
CREATE TABLE IF NOT EXISTS `gestactividad` (
  `idgestActividad` int(11) NOT NULL,
  `id_perfil` int(2) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  PRIMARY KEY (`idgestActividad`),
  KEY `id_actividadFK` (`id_actividad`),
  KEY `id_perfil2` (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gestactividad`
--

INSERT INTO `gestactividad` (`idgestActividad`, `id_perfil`, `id_actividad`) VALUES
(1001, 1, 1),
(1002, 1, 2),
(1003, 1, 3),
(1004, 1, 4),
(1005, 2, 1),
(1006, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Funcionario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `apellido` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `usuario` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `clave` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_perfil` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_perfil1` (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `clave`, `id_estado`, `id_perfil`) VALUES
(2, 'Felipe', 'Perez', 'pipe1', 'pipex', 1, 1),
(101, 'Cesar', 'Gomez', 'Ces123', 'qwer', 1, 1),
(202, 'valeria', 'GHG', 'val2', '123', 1, 2),
(301, 'camila', 'gonzalez', 'cam', 'abc', 1, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gestactividad`
--
ALTER TABLE `gestactividad`
  ADD CONSTRAINT `id_actividadFK` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_perfil2` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `id_perfil1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
