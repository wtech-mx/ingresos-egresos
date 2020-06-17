-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.6-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para conta
CREATE DATABASE IF NOT EXISTS `conta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `conta`;

-- Volcando estructura para tabla conta.configuracion
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `dni` varchar(80) DEFAULT NULL,
  `actividad_economica` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.configuracion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` (`id`, `nombre`, `dni`, `actividad_economica`, `email`, `telefono`, `imagen`) VALUES
	(1, 'IPN', '', 'Finanzas', 'ipn@gmail.com', '5319672', 'view/resources/images/1590075913_esit_6.jpg');
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;

-- Volcando estructura para tabla conta.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.empleado: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` (`id`, `dni`, `imagen`, `nombre`, `apellido`, `username`, `email`, `password`, `domicilio`, `localidad`, `telefono`, `celular`, `registro`, `status`, `kind`, `created_at`) VALUES
	(1, '543434', 'view/resources/images/1590076039_esit_6.jpg', 'Ricardo', 'Espinosa', 'admin', 'ricardo@gmailcom', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'AV SAN ANDRES', 'colchester', '9544534', '923344534', '1', 1, 0, '0000-00-00 00:00:00'),
	(2, '456576', 'view/resources/images/default.png', 'Richard', 'Stallman', 'tusolutionweb', 'tusolutionweb@gmail.com', '67a74306b06d0c01624fe0d0249a570f4d093747', 'av san juan', 'silcon valley', '323445', '932344565', '3', 1, 0, '2018-06-25 03:44:17'),
	(3, '543434', 'view/resources/images/default.png', '2020', 'Ramirez', 'Admin', 'dinopiza@yahoo.com.mx', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'AV SAN ANDRES', 'CDMX', '+525513730772', '5513730772', 'Administrativo', 1, 0, '2020-04-28 06:15:09');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando estructura para tabla conta.empleado_permisos
CREATE TABLE IF NOT EXISTS `empleado_permisos` (
  `idempleado_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `idempleado` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  PRIMARY KEY (`idempleado_permiso`),
  KEY `idempleado` (`idempleado`),
  KEY `idpermiso` (`idpermiso`),
  CONSTRAINT `empleado_permisos_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`),
  CONSTRAINT `empleado_permisos_ibfk_2` FOREIGN KEY (`idpermiso`) REFERENCES `permisos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.empleado_permisos: ~23 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado_permisos` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `empleado_permisos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.excedentes_egresos
CREATE TABLE IF NOT EXISTS `excedentes_egresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `foto2` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exce_code` (`gasto_code`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_name_exce` FOREIGN KEY (`gasto_code`) REFERENCES `nombre_excedentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_mes_exce` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.excedentes_egresos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `excedentes_egresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `excedentes_egresos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.excedentes_ingresos
CREATE TABLE IF NOT EXISTS `excedentes_ingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gasto_code` int(11) NOT NULL DEFAULT 0,
  `porcentaje` int(11) NOT NULL DEFAULT 0,
  `porcentaje2` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL DEFAULT 0,
  `partida` varchar(50) NOT NULL,
  `servicios` int(11) NOT NULL DEFAULT 0,
  `concepto` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `monto` double NOT NULL,
  `estado` int(4) NOT NULL DEFAULT 0,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gasto_code` (`gasto_code`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_name_exce_ing` FOREIGN KEY (`gasto_code`) REFERENCES `nombre_excedentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_mes_exce_ing` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.excedentes_ingresos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `excedentes_ingresos` DISABLE KEYS */;
INSERT INTO `excedentes_ingresos` (`id`, `gasto_code`, `porcentaje`, `porcentaje2`, `mes_id`, `partida`, `servicios`, `concepto`, `area`, `monto`, `estado`, `fecha`) VALUES
	(55, 15, 1, 0, 1, 'partida-4', 1, 'taza', 'jkl', 900, 1, '2020-01-01'),
	(56, 15, 1, 0, 1, 'partida-5', 3, 'taza', 'limpieza', 500, 1, '2020-01-01'),
	(57, 15, 1, 0, 1, 'partida-5', 2, 'popo', 'cafeteria', 300, 1, '2020-01-01'),
	(58, 15, 2, 0, 1, 'partida-5', 1, 'taza', 'cafeteria', 600, 1, '2020-01-01'),
	(59, 15, 2, 0, 1, 'partida-5', 2, 'popo', 'cafeteria', 300, 1, '2020-01-01');
/*!40000 ALTER TABLE `excedentes_ingresos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.fideicomisos_egresos
CREATE TABLE IF NOT EXISTS `fideicomisos_egresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gasto_fide_egresos` int(11),
  `mes_id` int(11),
  `egreso` varchar(50),
  `bien` varchar(50),
  `proveedor` varchar(50),
  `numfact` int(11),
  `fecha_carga` date,
  `foto1` varchar(50),
  `foto2` varchar(50),
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gasto_fide_egresos` (`gasto_fide_egresos`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_name_fide_egresos` FOREIGN KEY (`gasto_fide_egresos`) REFERENCES `nombre_fideicomisos` (`id`),
  CONSTRAINT `FK2_mes_fide_egresos` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.fideicomisos_egresos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `fideicomisos_egresos` DISABLE KEYS */;
INSERT INTO `fideicomisos_egresos` (`id`, `gasto_fide_egresos`, `mes_id`, `egreso`, `bien`, `proveedor`, `numfact`, `fecha_carga`, `foto1`, `foto2`, `fecha`) VALUES
	(10, 43, 1, '200', 'gh', 'gf', 5515, '2020-05-21', NULL, NULL, '0000-00-00');
/*!40000 ALTER TABLE `fideicomisos_egresos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.fideicomiso_ingresos
CREATE TABLE IF NOT EXISTS `fideicomiso_ingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gasto_fide` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `ingresos` double NOT NULL DEFAULT 0,
  `servicio` int(11) NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `pagodoc` double NOT NULL DEFAULT 0,
  `foto1` varchar(250) NOT NULL DEFAULT '',
  `foto2` varchar(250) NOT NULL DEFAULT '',
  `fecha_carga` date NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gasto_fide` (`gasto_fide`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_name_fide` FOREIGN KEY (`gasto_fide`) REFERENCES `nombre_fideicomisos` (`id`),
  CONSTRAINT `FK2_mes_fide` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.fideicomiso_ingresos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `fideicomiso_ingresos` DISABLE KEYS */;
INSERT INTO `fideicomiso_ingresos` (`id`, `gasto_fide`, `mes_id`, `ingresos`, `servicio`, `total`, `pagodoc`, `foto1`, `foto2`, `fecha_carga`, `fecha`) VALUES
	(36, 42, 1, 200, 1, 170, 0, '2020-05-21', 'view/resources/images/gastosCorriente/1590077783_', '0000-00-00', '0000-00-00'),
	(37, 42, 1, 2000, 1, 1700, 0, '2020-05-21', 'view/resources/images/gastosCorriente/1590077851_', '0000-00-00', '0000-00-00'),
	(38, 42, 1, 5000, 2, 0, 0, '2020-05-21', 'view/resources/images/gastosCorriente/1590077930_', '0000-00-00', '0000-00-00'),
	(39, 42, 1, 2750, 2, 1558.3333333333, 779.16666666667, '2020-05-21', 'view/resources/images/gastosCorriente/1590078010_', '0000-00-00', '0000-00-00');
/*!40000 ALTER TABLE `fideicomiso_ingresos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.gasto
CREATE TABLE IF NOT EXISTS `gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gasto_code` int(11) NOT NULL,
  `gasto_code2` varchar(100) NOT NULL DEFAULT '',
  `mes_id` int(11) NOT NULL,
  `personal` varchar(50) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `cantidad` double NOT NULL DEFAULT 0,
  `observaciones` varchar(50) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `foto1` varchar(500) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `fecha` year(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gasto_code` (`gasto_code`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_name_datos` FOREIGN KEY (`gasto_code`) REFERENCES `nombre_gasto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_mes` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=324 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.gasto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
INSERT INTO `gasto` (`id`, `gasto_code`, `gasto_code2`, `mes_id`, `personal`, `concepto`, `cantidad`, `observaciones`, `fecha_carga`, `foto1`, `foto2`, `fecha`) VALUES
	(321, 11, '', 1, 'charls', 'taza', 1000, 'Observaciones', '2020-05-22 00:00:00', 'view/resources/images/gastosCorriente/1592247822_', 'view/resources/images/gastosCorriente/1592247822_cotizacion.pdf', '2020'),
	(322, 12, '', 1, 'hhh', 'taza', 101, 'Observaciones', '2020-05-29 00:00:00', 'view/resources/images/gastosCorriente/1590077724_', 'view/resources/images/gastosCorriente/1590077724_', '2020'),
	(323, 11, '', 1, 'charls', 'papel', 3000, 'Observaciones', '2020-06-16 00:00:00', 'view/resources/images/gastosCorriente/1592262950_', 'view/resources/images/gastosCorriente/1592262950_Ty Comunnity.pdf', '2020');
/*!40000 ALTER TABLE `gasto` ENABLE KEYS */;

-- Volcando estructura para tabla conta.general_excedentes
CREATE TABLE IF NOT EXISTS `general_excedentes` (
  `id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `productos` varchar(50) DEFAULT NULL,
  `derechos` varchar(50) DEFAULT NULL,
  `aprovechamiento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.general_excedentes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `general_excedentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `general_excedentes` ENABLE KEYS */;

-- Volcando estructura para tabla conta.general_gasto
CREATE TABLE IF NOT EXISTS `general_gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `general_id` int(11) NOT NULL DEFAULT 0,
  `mes_id` int(11) NOT NULL DEFAULT 0,
  `acumulado` int(11) NOT NULL,
  `cantidadGeneral` int(11) NOT NULL,
  `obvservaciones` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `general_id` (`general_id`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_name_gasto_general` FOREIGN KEY (`general_id`) REFERENCES `nombre_gasto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_mes_general_gasto` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.general_gasto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `general_gasto` DISABLE KEYS */;
/*!40000 ALTER TABLE `general_gasto` ENABLE KEYS */;

-- Volcando estructura para tabla conta.general_presupuesto
CREATE TABLE IF NOT EXISTS `general_presupuesto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adquisicion` double NOT NULL DEFAULT 0,
  `restringida` double NOT NULL DEFAULT 0,
  `consolidada` double NOT NULL DEFAULT 0,
  `fecha` year(4) NOT NULL DEFAULT 0000,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.general_presupuesto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `general_presupuesto` DISABLE KEYS */;
/*!40000 ALTER TABLE `general_presupuesto` ENABLE KEYS */;

-- Volcando estructura para tabla conta.meses
CREATE TABLE IF NOT EXISTS `meses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mes` varchar(50) DEFAULT NULL,
  `src_gasto` varchar(50) DEFAULT NULL,
  `src_ingresos` varchar(50) DEFAULT NULL,
  `src_egresos` varchar(50) DEFAULT NULL,
  `src_exce_egresos` varchar(50) DEFAULT NULL,
  `src_exce_ingreso` varchar(50) DEFAULT NULL,
  `src_presupuesto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.meses: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `meses` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `meses` ENABLE KEYS */;

-- Volcando estructura para tabla conta.nombre_excedentes
CREATE TABLE IF NOT EXISTS `nombre_excedentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_mes_exc` int(11) NOT NULL,
  `id_ingresos` int(11) NOT NULL DEFAULT 0,
  `estado` int(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `id_mes_exc` (`id_mes_exc`),
  CONSTRAINT `FK1_name_exce_mes` FOREIGN KEY (`id_mes_exc`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.nombre_excedentes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `nombre_excedentes` DISABLE KEYS */;
INSERT INTO `nombre_excedentes` (`id`, `nombre`, `id_mes_exc`, `id_ingresos`, `estado`) VALUES
	(15, '2020', 1, 1, 0),
	(16, '2020', 1, 0, 0);
/*!40000 ALTER TABLE `nombre_excedentes` ENABLE KEYS */;

-- Volcando estructura para tabla conta.nombre_fideicomisos
CREATE TABLE IF NOT EXISTS `nombre_fideicomisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ingresos` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(50) NOT NULL,
  `id_mes_nomfide` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mes_nomfide` (`id_mes_nomfide`),
  CONSTRAINT `FK1_mes_nomfide` FOREIGN KEY (`id_mes_nomfide`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.nombre_fideicomisos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `nombre_fideicomisos` DISABLE KEYS */;
INSERT INTO `nombre_fideicomisos` (`id`, `id_ingresos`, `nombre`, `id_mes_nomfide`) VALUES
	(42, 1, '2020', 1),
	(43, 0, '2020', 1);
/*!40000 ALTER TABLE `nombre_fideicomisos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.nombre_gasto
CREATE TABLE IF NOT EXISTS `nombre_gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `id_mes_nomg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mes_nomg` (`id_mes_nomg`),
  CONSTRAINT `FK1_nameg_mes` FOREIGN KEY (`id_mes_nomg`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.nombre_gasto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `nombre_gasto` DISABLE KEYS */;
INSERT INTO `nombre_gasto` (`id`, `nombre`, `id_mes_nomg`) VALUES
	(11, '2020', 1),
	(12, '2020', 6);
/*!40000 ALTER TABLE `nombre_gasto` ENABLE KEYS */;

-- Volcando estructura para tabla conta.nombre_presupuesto
CREATE TABLE IF NOT EXISTS `nombre_presupuesto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_mes_pre` int(11) NOT NULL DEFAULT 0,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mes_pre` (`id_mes_pre`),
  CONSTRAINT `FK1__name_pre_mes` FOREIGN KEY (`id_mes_pre`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.nombre_presupuesto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `nombre_presupuesto` DISABLE KEYS */;
INSERT INTO `nombre_presupuesto` (`id`, `nombre`, `id_mes_pre`, `fecha`) VALUES
	(15, '2020', 1, '0000-00-00'),
	(16, '2020', 2, '0000-00-00');
/*!40000 ALTER TABLE `nombre_presupuesto` ENABLE KEYS */;

-- Volcando estructura para tabla conta.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.permisos: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.presupuesto
CREATE TABLE IF NOT EXISTS `presupuesto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gasto_code` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `monto` double NOT NULL,
  `partida` int(11) NOT NULL DEFAULT 0,
  `utilizado` double NOT NULL,
  `utilizar` double NOT NULL,
  `utilizar2` double NOT NULL,
  `utilizar3` double NOT NULL,
  `fecha` year(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gasto_code` (`gasto_code`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_presupuesto_nombre` FOREIGN KEY (`gasto_code`) REFERENCES `nombre_presupuesto` (`id`),
  CONSTRAINT `FK_presupuesto_meses` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.presupuesto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `presupuesto` DISABLE KEYS */;
INSERT INTO `presupuesto` (`id`, `gasto_code`, `mes_id`, `monto`, `partida`, `utilizado`, `utilizar`, `utilizar2`, `utilizar3`, `fecha`) VALUES
	(16, 15, 1, 1000, 1, 300, 700, 0, 0, '2020'),
	(18, 16, 1, 1000, 2, 300, 700, 700, 0, '2020'),
	(19, 15, 1, 1000, 3, 600, 0, 0, 400, '2020');
/*!40000 ALTER TABLE `presupuesto` ENABLE KEYS */;

-- Volcando estructura para tabla conta.reparaciones
CREATE TABLE IF NOT EXISTS `reparaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_repa` date NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.reparaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reparaciones` DISABLE KEYS */;
INSERT INTO `reparaciones` (`id`, `fecha_repa`, `descripcion`, `idvehiculo`, `idtaller`, `fecha_carga`) VALUES
	(1, '2018-07-10', 'faros fallando', 1, 1, '2018-06-25 03:48:18');
/*!40000 ALTER TABLE `reparaciones` ENABLE KEYS */;

-- Volcando estructura para tabla conta.seguro
CREATE TABLE IF NOT EXISTS `seguro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `poliza` varchar(25) NOT NULL,
  `vencimiento` date NOT NULL,
  `fecha_carga` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.seguro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `seguro` DISABLE KEYS */;
INSERT INTO `seguro` (`id`, `nombre`, `poliza`, `vencimiento`, `fecha_carga`) VALUES
	(1, 'informatica', '12', '2018-06-27', '2018-06-25 03:45:37');
/*!40000 ALTER TABLE `seguro` ENABLE KEYS */;

-- Volcando estructura para tabla conta.taller
CREATE TABLE IF NOT EXISTS `taller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `cuit` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.taller: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `taller` DISABLE KEYS */;
INSERT INTO `taller` (`id`, `nombre`, `cuit`, `direccion`, `localidad`, `telefono`, `celular`, `estado`, `fecha_carga`) VALUES
	(1, 'electronica', '22', 'av san andres', 'sillcon valley', '324354', '943546534', 1, '2018-06-25 03:45:04');
/*!40000 ALTER TABLE `taller` ENABLE KEYS */;

-- Volcando estructura para tabla conta.tarjeta
CREATE TABLE IF NOT EXISTS `tarjeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL,
  `vencimiento` date NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.tarjeta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tarjeta` DISABLE KEYS */;
INSERT INTO `tarjeta` (`id`, `numero`, `vencimiento`, `idvehiculo`, `fecha_carga`) VALUES
	(1, 'vcx346', '2018-07-10', 1, '2018-06-25 03:47:49');
/*!40000 ALTER TABLE `tarjeta` ENABLE KEYS */;

-- Volcando estructura para tabla conta.vehiculo
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `fecha_carga` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.vehiculo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` (`id`, `vehiculo_code`, `patente`, `marca`, `modelo`, `nro_chasis`, `nro_motor`, `vto_vtv`, `idseguro`, `color`, `estado`, `imagen`, `fecha_carga`) VALUES
	(1, '1', '1231', 'hyundai', '21332', 'xcdds23', 'xvcvrerx3', '2018-06-30', 1, 'black', 1, 'view/resources/images/1529891236_ahorcado.jpg', '2018-06-25 03:46:37');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
