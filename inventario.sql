-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2023 a las 04:20:05
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nombre`, `direccion`, `telefono`, `correo_electronico`) VALUES
(8326589, 'Ignacio Perozo', 'Cecilio Acosta', '04145634422', 'ignaciopero@gmail.com'),
(25251446, 'Maribel Anez', '5 de julio', '04121248811', 'maribelanez@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanicos`
--

CREATE TABLE `mecanicos` (
  `idmecanico` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mecanicos`
--

INSERT INTO `mecanicos` (`idmecanico`, `nombre`, `direccion`, `telefono`, `correo_electronico`) VALUES
(11456987, 'Gustavo Labarca', 'San Jacinto', '04269874521', 'labarcagus@gmail.com'),
(25636421, 'Diego Soto', 'La limpia', '04129614755', 'diegosoto@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id_repuesto` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `clasificacion` varchar(50) DEFAULT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id_repuesto`, `descripcion`, `marca`, `modelo`, `tipo`, `anio`, `clasificacion`, `id_vehiculo`, `imagen`) VALUES
(1, 'bobina', 'BERU', 'Bobina1', 'reforzada', 2022, 'motor', 1, 'bobina.jpg'),
(2, 'Filtro de aceite', 'MAPCO', 'FDA1', 'Blindado', 2016, 'Lubricante', 3, 'filtroaceite.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `contrasena` varchar(35) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `contrasena`, `nombre`, `direccion`, `telefono`, `correo_electronico`) VALUES
(7774198, 'hola', 'juan', 'miranda', '04121232267', 'juan@gmail.com'),
(30139486, '123456', 'Santiago', 'Maracaibo', '12345678', 'santiago@gmail.com'),
(98765432, 'jamon', 'candy', 'Lara', '04128791243', 'candy@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `color` varchar(50) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `clasificacion` varchar(50) DEFAULT NULL,
  `id_repuesto` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `descripcion`, `marca`, `modelo`, `color`, `tipo`, `anio`, `clasificacion`, `id_repuesto`, `imagen`) VALUES
(1, 'Cambio de bobina', 'Subaru', 'Impreza ', 'Azul', 'Berlina', 2004, 'utilitario', 1, 'subaru.jpg'),
(2, 'Cambio de filtro', 'Ford', 'fiesta', 'Gris claro', 'Hatchback', 2008, 'compacto', 1, 'fordfiesta.jpg'),
(3, 'Cambio de filtro', 'Dodge', 'neon z', 'Vinotinto', 'Berlina', 2000, 'utilitario', 2, 'neon.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  ADD PRIMARY KEY (`idmecanico`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id_repuesto`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `fk_vehiculos_repuestos` (`id_repuesto`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `repuestos_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_vehiculos_repuestos` FOREIGN KEY (`id_repuesto`) REFERENCES `repuestos` (`id_repuesto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
