-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2020 a las 04:39:19
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `dni` varchar(80) DEFAULT NULL,
  `actividad_economica` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `dni`, `actividad_economica`, `email`, `telefono`, `imagen`) VALUES
(1, 'tusolutionweb tutos', '', '', '', '', 'your_logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `registro` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `kind` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `dni`, `imagen`, `nombre`, `apellido`, `username`, `email`, `password`, `domicilio`, `localidad`, `telefono`, `celular`, `registro`, `status`, `kind`, `created_at`) VALUES
(1, '543434', 'view/resources/images/1588531045_Adrian-icon.png', 'Adrian', 'Ramirez', 'admin', 'admin@admin.com', '67a74306b06d0c01624fe0d0249a570f4d093747', 'AV SAN ANDRES', 'colchester', '9544534', '923344534', '1', 1, 0, '0000-00-00 00:00:00'),
(2, '456576', 'view/resources/images/default.png', 'Richard', 'Stallman', 'tusolutionweb', 'tusolutionweb@gmail.com', '67a74306b06d0c01624fe0d0249a570f4d093747', 'av san juan', 'silcon valley', '323445', '932344565', '3', 1, 0, '2018-06-25 03:44:17'),
(3, '543434', 'view/resources/images/default.png', '2020', 'Ramirez', 'Admin', 'dinopiza@yahoo.com.mx', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'AV SAN ANDRES', 'CDMX', '+525513730772', '5513730772', 'Administrativo', 1, 0, '2020-04-28 06:15:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_permisos`
--

CREATE TABLE `empleado_permisos` (
  `idempleado_permiso` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado_permisos`
--

INSERT INTO `empleado_permisos` (`idempleado_permiso`, `idempleado`, `idpermiso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(23, 3, 1),
(24, 2, 1),
(25, 2, 2),
(26, 2, 3),
(27, 2, 4),
(28, 2, 5),
(29, 2, 6),
(30, 2, 7),
(31, 2, 8),
(32, 2, 9),
(33, 2, 10),
(34, 2, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excedentes_egresos`
--

CREATE TABLE `excedentes_egresos` (
  `id` int(11) NOT NULL,
  `gasto_code` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `egreso` varchar(50) NOT NULL,
  `servicios` int(11) NOT NULL DEFAULT 0,
  `bien` varchar(50) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `factura` varchar(50) NOT NULL,
  `fecha_carga` date NOT NULL,
  `fecha` date NOT NULL,
  `foto1` varchar(250) NOT NULL,
  `foto2` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `excedentes_egresos`
--

INSERT INTO `excedentes_egresos` (`id`, `gasto_code`, `mes_id`, `egreso`, `servicios`, `bien`, `proveedor`, `factura`, `fecha_carga`, `fecha`, `foto1`, `foto2`) VALUES
(1, 5, 1, 'fsdf', 0, 'sdf', 'sdf', '1014', '2020-05-13', '2020-01-01', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excedentes_ingresos`
--

CREATE TABLE `excedentes_ingresos` (
  `id` int(11) NOT NULL,
  `gasto_code` int(11) NOT NULL DEFAULT 0,
  `porcentaje` int(11) NOT NULL DEFAULT 0,
  `mes_id` int(11) NOT NULL DEFAULT 0,
  `partida` varchar(50) NOT NULL,
  `servicios` int(11) NOT NULL DEFAULT 0,
  `concepto` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `monto` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `excedentes_ingresos`
--

INSERT INTO `excedentes_ingresos` (`id`, `gasto_code`, `porcentaje`, `mes_id`, `partida`, `servicios`, `concepto`, `area`, `monto`, `fecha`) VALUES
(1, 1, 1, 1, 'jh', 0, 'hj', 'hj', 3000, '2020-01-01'),
(4, 1, 2, 1, 'b', 0, 'taza2', 'ee', 300, '2020-01-01'),
(5, 1, 1, 1, 'qq', 0, 'popo', 'ee', 900, '2020-01-01'),
(6, 1, 1, 1, 'vg', 2, 'taza2', 'ee', 300, '2020-01-01'),
(7, 1, 1, 1, 'uyu', 1, 'ghj', 'jkl', 2525, '2020-01-01'),
(8, 1, 2, 1, 'vg', 2, 'gdfg', 'dgffd', 858, '2020-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fideicomisos_egresos`
--

CREATE TABLE `fideicomisos_egresos` (
  `id` int(11) NOT NULL,
  `gasto_fide_egresos` int(11),
  `mes_id` int(11),
  `egreso` varchar(50),
  `bien` varchar(50),
  `proveedor` varchar(50),
  `numfact` int(11),
  `fecha_carga` date,
  `foto1` varchar(50),
  `foto2` varchar(50),
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fideicomisos_egresos`
--

INSERT INTO `fideicomisos_egresos` (`id`, `gasto_fide_egresos`, `mes_id`, `egreso`, `bien`, `proveedor`, `numfact`, `fecha_carga`, `foto1`, `foto2`, `fecha`) VALUES
(6, 24, 1, '100', 'taza2', 'dd', 222, '2020-05-10', '', '', '2020-01-01'),
(7, 3, 1, '225', 'Egreso', 'dd', 33, '2020-05-10', NULL, NULL, '2020-01-01'),
(8, 3, 1, '100', 'Egresos', 'dd', 66, '2020-05-10', NULL, NULL, '2020-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fideicomiso_ingresos`
--

CREATE TABLE `fideicomiso_ingresos` (
  `id` int(11) NOT NULL,
  `gasto_fide` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `ingresos` double NOT NULL DEFAULT 0,
  `servicio` int(11) NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `pagodoc` double NOT NULL DEFAULT 0,
  `foto1` varchar(250) NOT NULL DEFAULT '',
  `foto2` varchar(250) NOT NULL DEFAULT '',
  `fecha_carga` date NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fideicomiso_ingresos`
--

INSERT INTO `fideicomiso_ingresos` (`id`, `gasto_fide`, `mes_id`, `ingresos`, `servicio`, `total`, `pagodoc`, `foto1`, `foto2`, `fecha_carga`, `fecha`) VALUES
(6, 22, 1, 1000, 3, 0, 0, '', '', '2020-05-09', '0000-00-00'),
(7, 22, 1, 5000, 2, 2833.3333333333, 1416.6666666667, '', '', '2020-05-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE `gasto` (
  `id` int(11) NOT NULL,
  `gasto_code` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `personal` varchar(50) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `cantidad` double NOT NULL DEFAULT 0,
  `observaciones` varchar(50) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`id`, `gasto_code`, `mes_id`, `personal`, `concepto`, `cantidad`, `observaciones`, `fecha_carga`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `fecha`) VALUES
(10, 1, 1, 'charls', 'papel', 200, 'ff', '2020-05-08 00:00:00', 'view/resources/images/gastosCorriente/gastoCorriente.jpg', '', '', '', '', '2020-01-01'),
(16, 1, 1, 'charls', 'taza', 200, 'Observacionesv', '2020-05-08 00:00:00', 'view/resources/images/gastosCorriente/gastoCorriente.jpg', '', '', '', '', '2020-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general_excedentes`
--

CREATE TABLE `general_excedentes` (
  `id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `productos` varchar(50) DEFAULT NULL,
  `derechos` varchar(50) DEFAULT NULL,
  `aprovechamiento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general_gasto`
--

CREATE TABLE `general_gasto` (
  `id` int(11) NOT NULL,
  `general_id` int(11) NOT NULL DEFAULT 0,
  `mes_id` int(11) NOT NULL DEFAULT 0,
  `acumulado` int(11) NOT NULL,
  `cantidadGeneral` int(11) NOT NULL,
  `obvservaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id` int(11) NOT NULL,
  `mes` varchar(50) DEFAULT NULL,
  `src_gasto` varchar(50) DEFAULT NULL,
  `src_ingresos` varchar(50) DEFAULT NULL,
  `src_egresos` varchar(50) DEFAULT NULL,
  `src_exce_egresos` varchar(50) DEFAULT NULL,
  `src_exce_ingreso` varchar(50) DEFAULT NULL,
  `src_presupuesto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id`, `mes`, `src_gasto`, `src_ingresos`, `src_egresos`, `src_exce_egresos`, `src_exce_ingreso`, `src_presupuesto`) VALUES
(1, 'Enero', './?view=gasto', './?view=enero_ingresos_fideicomiso', './?view=enero_egresos_fideicomiso', './?view=enero_egresos_exce', './?view=enero_ingresos_exce', './?view=enero_presupuesto'),
(2, 'Febrero', './?view=febrero_gasto', './?view=febrero_ingresos_fideicomiso', './?view=febrero_egresos_fideicomiso', './?view=febrero_egresos_exce', './?view=febrero_ingresos_exce', './?view=febrero_presupuesto'),
(3, 'Marzo', './?view=marzo_gasto', './?view=marzo_ingresos_fideicomiso', './?view=marzo_egresos_fideicomiso', './?view=marzo_egresos_exce', './?view=marzo_ingresos_exce', './?view=marzo_presupuesto'),
(4, 'Abril', './?view=abril_gasto', './?view=abril_ingresos_fideicomiso', './?view=abril_egresos_fideicomiso', './?view=abril_egresos_exce', './?view=abril_ingresos_exce', './?view=abril_presupuesto'),
(5, 'Mayo', './?view=mayo_gasto', './?view=mayo_ingresos_fideicomiso', './?view=mayo_egresos_fideicomiso', './?view=mayo_egresos_exce', './?view=mayo_ingresos_exce', './?view=mayo_presupuesto'),
(6, 'Junio', './?view=junio_gasto', './?view=junio_ingresos_fideicomiso', './?view=junio_egresos_fideicomiso', './?view=junio_egresos_exce', './?view=junio_ingresos_exce', './?view=junio_presupuesto'),
(7, 'Julio', './?view=julio_gasto', './?view=julio_ingresos_fideicomiso', './?view=julio_egresos_fideicomiso', './?view=julio_egresos_exce', './?view=julio_ingresos_exce', './?view=julio_presupuesto'),
(8, 'Agosto', './?view=agosto_gasto', './?view=agosto_ingresos_fideicomiso', './?view=agosto_egresos_fideicomiso', './?view=agosto_egresos_exce', './?view=agosto_ingresos_exce', './?view=agosto_presupuesto'),
(9, 'Septiembre', './?view=sept_gasto', './?view=sept_ingresos_fideicomiso', './?view=sept_egresos_fideicomiso', './?view=sept_egresos_exce', './?view=sept_ingresos_exce', './?view=sept_presupuesto'),
(10, 'Octubre', './?view=oct_gasto', './?view=oct_ingresos_fideicomiso', './?view=oct_egresos_fideicomiso', './?view=oct_egresos_exce', './?view=oct_ingresos_exce', './?view=oct_presupuesto'),
(11, 'Noviembre', './?view=nov_gasto', './?view=nov_ingresos_fideicomiso', './?view=nov_egresos_fideicomiso', './?view=nov_egresos_exce', './?view=nov_ingresos_exce', './?view=nov_presupuesto'),
(12, 'Diciembre', './?view=diciembre_gasto', './?view=diciembre_ingresos_fideicomiso', './?view=diciembre_egresos_fideicomiso', './?view=diciembre_egresos_exce', './?view=diciembre_ingresos_exce', './?view=diciembre_presupuesto'),
(13, 'General', './?view=general_gasto', './?view=general_fideicomiso', './?view=general_egresos_fideicomiso', './?view=general_egresos_exce', './?view=general_ingresos_exce', './?view=general_presupuesto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_excedentes`
--

CREATE TABLE `nombre_excedentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_mes_exc` int(11) NOT NULL,
  `id_ingresos` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nombre_excedentes`
--

INSERT INTO `nombre_excedentes` (`id`, `nombre`, `id_mes_exc`, `id_ingresos`) VALUES
(1, '2020', 1, 1),
(3, '2121', 1, 1),
(4, '2020', 1, 1),
(5, '2020', 1, 0),
(6, '2121', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_fideicomisos`
--

CREATE TABLE `nombre_fideicomisos` (
  `id` int(11) NOT NULL,
  `id_ingresos` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(50) NOT NULL,
  `id_mes_nomfide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nombre_fideicomisos`
--

INSERT INTO `nombre_fideicomisos` (`id`, `id_ingresos`, `nombre`, `id_mes_nomfide`) VALUES
(3, 0, 'Enero', 1),
(4, 0, '2021', 1),
(22, 1, '2020', 1),
(24, 0, '2020', 12),
(25, 0, '200', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_gasto`
--

CREATE TABLE `nombre_gasto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `id_mes_nomg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nombre_gasto`
--

INSERT INTO `nombre_gasto` (`id`, `nombre`, `id_mes_nomg`) VALUES
(1, '2020', 1),
(4, '2021', 1),
(5, 'Escuderia', 2),
(6, '2020', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_presupuesto`
--

CREATE TABLE `nombre_presupuesto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_mes_pre` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nombre_presupuesto`
--

INSERT INTO `nombre_presupuesto` (`id`, `nombre`, `id_mes_pre`) VALUES
(1, '2020', 1),
(2, '2020', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`) VALUES
(1, 'Dashboard'),
(2, 'Empleados'),
(3, 'Taller'),
(4, 'Seguro'),
(5, 'Empresa'),
(6, 'Sector'),
(7, 'Vehiculo'),
(8, 'Tarjeta'),
(9, 'Reparaciones'),
(10, 'Gasto'),
(11, 'Configuracion'),
(12, 'Fideicomiso'),
(13, 'Exedentes'),
(14, 'Presupuesto-general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `id` int(11) NOT NULL,
  `gasto_code` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `monto` double NOT NULL,
  `partida` int(11) NOT NULL DEFAULT 0,
  `utilizado` double NOT NULL,
  `utilizar` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`id`, `gasto_code`, `mes_id`, `monto`, `partida`, `utilizado`, `utilizar`, `fecha`) VALUES
(1, 1, 1, 300, 1, 100, 200, '2020-01-01'),
(2, 1, 1, 500, 2, 200, 300, '2020-01-01'),
(3, 1, 1, 800, 3, 600, 200, '2020-01-01'),
(4, 2, 2, 600, 1, 500, 50, '2020-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `id` int(11) NOT NULL,
  `fecha_repa` date NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`id`, `fecha_repa`, `descripcion`, `idvehiculo`, `idtaller`, `fecha_carga`) VALUES
(1, '2018-07-10', 'faros fallando', 1, 1, '2018-06-25 03:48:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguro`
--

CREATE TABLE `seguro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `poliza` varchar(25) NOT NULL,
  `vencimiento` date NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguro`
--

INSERT INTO `seguro` (`id`, `nombre`, `poliza`, `vencimiento`, `fecha_carga`) VALUES
(1, 'informatica', '12', '2018-06-27', '2018-06-25 03:45:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cuit` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id`, `nombre`, `cuit`, `direccion`, `localidad`, `telefono`, `celular`, `estado`, `fecha_carga`) VALUES
(1, 'electronica', '22', 'av san andres', 'sillcon valley', '324354', '943546534', 1, '2018-06-25 03:45:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `vencimiento` date NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`id`, `numero`, `vencimiento`, `idvehiculo`, `fecha_carga`) VALUES
(1, 'vcx346', '2018-07-10', 1, '2018-06-25 03:47:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `vehiculo_code` varchar(100) NOT NULL,
  `patente` varchar(40) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `nro_chasis` varchar(30) NOT NULL,
  `nro_motor` varchar(30) NOT NULL,
  `vto_vtv` date NOT NULL,
  `idseguro` int(11) NOT NULL,
  `color` varchar(30) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `vehiculo_code`, `patente`, `marca`, `modelo`, `nro_chasis`, `nro_motor`, `vto_vtv`, `idseguro`, `color`, `estado`, `imagen`, `fecha_carga`) VALUES
(1, '1', '1231', 'hyundai', '21332', 'xcdds23', 'xvcvrerx3', '2018-06-30', 1, 'black', 1, 'view/resources/images/1529891236_ahorcado.jpg', '2018-06-25 03:46:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  ADD PRIMARY KEY (`idempleado_permiso`),
  ADD KEY `idempleado` (`idempleado`),
  ADD KEY `idpermiso` (`idpermiso`);

--
-- Indices de la tabla `excedentes_egresos`
--
ALTER TABLE `excedentes_egresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exce_code` (`gasto_code`),
  ADD KEY `mes_id` (`mes_id`);

--
-- Indices de la tabla `excedentes_ingresos`
--
ALTER TABLE `excedentes_ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gasto_code` (`gasto_code`),
  ADD KEY `mes_id` (`mes_id`);

--
-- Indices de la tabla `fideicomisos_egresos`
--
ALTER TABLE `fideicomisos_egresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gasto_fide_egresos` (`gasto_fide_egresos`),
  ADD KEY `mes_id` (`mes_id`);

--
-- Indices de la tabla `fideicomiso_ingresos`
--
ALTER TABLE `fideicomiso_ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gasto_fide` (`gasto_fide`),
  ADD KEY `mes_id` (`mes_id`);

--
-- Indices de la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gasto_code` (`gasto_code`),
  ADD KEY `mes_id` (`mes_id`);

--
-- Indices de la tabla `general_gasto`
--
ALTER TABLE `general_gasto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_id` (`general_id`),
  ADD KEY `mes_id` (`mes_id`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nombre_excedentes`
--
ALTER TABLE `nombre_excedentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mes_exc` (`id_mes_exc`);

--
-- Indices de la tabla `nombre_fideicomisos`
--
ALTER TABLE `nombre_fideicomisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mes_nomfide` (`id_mes_nomfide`);

--
-- Indices de la tabla `nombre_gasto`
--
ALTER TABLE `nombre_gasto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mes_nomg` (`id_mes_nomg`);

--
-- Indices de la tabla `nombre_presupuesto`
--
ALTER TABLE `nombre_presupuesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mes_pre` (`id_mes_pre`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gasto_code` (`gasto_code`),
  ADD KEY `mes_id` (`mes_id`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguro`
--
ALTER TABLE `seguro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  MODIFY `idempleado_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `excedentes_egresos`
--
ALTER TABLE `excedentes_egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `excedentes_ingresos`
--
ALTER TABLE `excedentes_ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fideicomisos_egresos`
--
ALTER TABLE `fideicomisos_egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fideicomiso_ingresos`
--
ALTER TABLE `fideicomiso_ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `gasto`
--
ALTER TABLE `gasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `general_gasto`
--
ALTER TABLE `general_gasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `nombre_excedentes`
--
ALTER TABLE `nombre_excedentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nombre_fideicomisos`
--
ALTER TABLE `nombre_fideicomisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `nombre_gasto`
--
ALTER TABLE `nombre_gasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nombre_presupuesto`
--
ALTER TABLE `nombre_presupuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `seguro`
--
ALTER TABLE `seguro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  ADD CONSTRAINT `empleado_permisos_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `empleado_permisos_ibfk_2` FOREIGN KEY (`idpermiso`) REFERENCES `permisos` (`id`);

--
-- Filtros para la tabla `excedentes_egresos`
--
ALTER TABLE `excedentes_egresos`
  ADD CONSTRAINT `FK1_name_exce` FOREIGN KEY (`gasto_code`) REFERENCES `nombre_excedentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK2_mes_exce` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `excedentes_ingresos`
--
ALTER TABLE `excedentes_ingresos`
  ADD CONSTRAINT `FK1_name_exce_ing` FOREIGN KEY (`gasto_code`) REFERENCES `nombre_excedentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK2_mes_exce_ing` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `fideicomisos_egresos`
--
ALTER TABLE `fideicomisos_egresos`
  ADD CONSTRAINT `FK1_name_fide_egresos` FOREIGN KEY (`gasto_fide_egresos`) REFERENCES `nombre_fideicomisos` (`id`),
  ADD CONSTRAINT `FK2_mes_fide_egresos` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `fideicomiso_ingresos`
--
ALTER TABLE `fideicomiso_ingresos`
  ADD CONSTRAINT `FK1_name_fide` FOREIGN KEY (`gasto_fide`) REFERENCES `nombre_fideicomisos` (`id`),
  ADD CONSTRAINT `FK2_mes_fide` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD CONSTRAINT `FK1_name_datos` FOREIGN KEY (`gasto_code`) REFERENCES `nombre_gasto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK2_mes` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `general_gasto`
--
ALTER TABLE `general_gasto`
  ADD CONSTRAINT `FK1_name_gasto_general` FOREIGN KEY (`general_id`) REFERENCES `nombre_gasto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK2_mes_general_gasto` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `nombre_excedentes`
--
ALTER TABLE `nombre_excedentes`
  ADD CONSTRAINT `FK1_name_exce_mes` FOREIGN KEY (`id_mes_exc`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `nombre_fideicomisos`
--
ALTER TABLE `nombre_fideicomisos`
  ADD CONSTRAINT `FK1_mes_nomfide` FOREIGN KEY (`id_mes_nomfide`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `nombre_gasto`
--
ALTER TABLE `nombre_gasto`
  ADD CONSTRAINT `FK1_nameg_mes` FOREIGN KEY (`id_mes_nomg`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `nombre_presupuesto`
--
ALTER TABLE `nombre_presupuesto`
  ADD CONSTRAINT `FK1__name_pre_mes` FOREIGN KEY (`id_mes_pre`) REFERENCES `meses` (`id`);

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD CONSTRAINT `FK1_presupuesto_nombre` FOREIGN KEY (`gasto_code`) REFERENCES `nombre_presupuesto` (`id`),
  ADD CONSTRAINT `FK_presupuesto_meses` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
