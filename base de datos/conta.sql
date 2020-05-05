-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
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
INSERT IGNORE INTO `configuracion` (`id`, `nombre`, `dni`, `actividad_economica`, `email`, `telefono`, `imagen`) VALUES
	(1, 'tusolutionweb tutos', '', '', '', '', 'your_logo.png');
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
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `kind` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.empleado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT IGNORE INTO `empleado` (`id`, `dni`, `imagen`, `nombre`, `apellido`, `username`, `email`, `password`, `domicilio`, `localidad`, `telefono`, `celular`, `registro`, `status`, `kind`, `created_at`) VALUES
	(1, '543434', 'view/resources/images/1588531045_Adrian-icon.png', 'Adrian', 'Ramirez', 'admin', 'admin@admin.com', '67a74306b06d0c01624fe0d0249a570f4d093747', 'AV SAN ANDRES', 'colchester', '9544534', '923344534', '1', 1, 0, '0000-00-00 00:00:00'),
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
INSERT IGNORE INTO `empleado_permisos` (`idempleado_permiso`, `idempleado`, `idpermiso`) VALUES
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

-- Volcando estructura para tabla conta.fideicomisos_egresos
CREATE TABLE IF NOT EXISTS `fideicomisos_egresos` (
  `id` int(11) NOT NULL,
  `gasto_fide_egresos` int(11) DEFAULT NULL,
  `mes_id` int(11) DEFAULT NULL,
  `egreso` varchar(50) DEFAULT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `numfact` int(11) DEFAULT NULL,
  `foto1` varchar(50) DEFAULT NULL,
  `foto2` varchar(50) DEFAULT NULL,
  `foto3` varchar(50) DEFAULT NULL,
  `foto4` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gasto_fide_egresos` (`gasto_fide_egresos`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_name_fide_egresos` FOREIGN KEY (`gasto_fide_egresos`) REFERENCES `nombre_fideicomisos` (`id`),
  CONSTRAINT `FK2_mes_fide_egresos` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.fideicomisos_egresos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fideicomisos_egresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `fideicomisos_egresos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.fideicomiso_ingresos
CREATE TABLE IF NOT EXISTS `fideicomiso_ingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gasto_fide` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `ingresos` varchar(50) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `apartado` int(11) NOT NULL,
  `pagodoc` float NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gasto_fide` (`gasto_fide`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_name_fide` FOREIGN KEY (`gasto_fide`) REFERENCES `nombre_fideicomisos` (`id`),
  CONSTRAINT `FK2_mes_fide` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.fideicomiso_ingresos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fideicomiso_ingresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `fideicomiso_ingresos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.gasto
CREATE TABLE IF NOT EXISTS `gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gasto_code` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `personal` varchar(50) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `cantidad` float NOT NULL,
  `observaciones` varchar(50) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  `foto5` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gasto_code` (`gasto_code`),
  KEY `mes_id` (`mes_id`),
  CONSTRAINT `FK1_name_datos` FOREIGN KEY (`gasto_code`) REFERENCES `nombre_gasto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_mes` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.gasto: ~43 rows (aproximadamente)
/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
INSERT IGNORE INTO `gasto` (`id`, `gasto_code`, `mes_id`, `personal`, `concepto`, `cantidad`, `observaciones`, `fecha_carga`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`) VALUES
	(8, 57, 2, 'cheila', 'becas', 2, '1212asa', '2020-05-05 19:03:14', '', '', '', '', ''),
	(9, 58, 2, 'abril1', 'abril', 2, 'Un exelente Prodfesor', '2020-05-05 19:03:52', '', '', '', '', ''),
	(10, 52, 1, 'enere', 'enere', 0, 'enere', '2020-05-05 19:05:03', '', '', '', '', ''),
	(11, 56, 1, 'enere11', 'enere11', 0, 'enere11', '2020-05-05 19:05:35', '', '', '', '', ''),
	(13, 59, 2, '  pancho', '12123', 56, 'no lava', '2020-05-05 19:27:42', '', '', '', '', ''),
	(14, 59, 2, '  pancho', '12123', 2, 'no lava', '2020-05-05 19:32:42', '', '', '', '', ''),
	(15, 59, 2, '  pancho', '12123', 5, '3131', '2020-05-05 19:33:11', '', '', '', '', ''),
	(16, 67, 2, 'lalo', '12123', 5, '1212asa', '2020-05-05 19:34:31', '', '', '', '', ''),
	(17, 58, 2, 'alumnos', 'adeudos', 2, 'no estuduia', '2020-05-05 19:38:48', '', '', '', '', ''),
	(18, 58, 2, 'docentes', 'becas', 56, 'Un exelente Prodfesor', '2020-05-05 19:39:21', '', '', '', '', ''),
	(19, 58, 2, 'docentes', 'becas', 5, '3131', '2020-05-05 19:41:02', '', '', '', '', ''),
	(20, 62, 2, 'alumnos', 'adeudos', 12515, '1212asa', '2020-05-05 19:41:36', '', '', '', '', ''),
	(21, 62, 2, 'alumnos', 'adeudos', 15123, 'no lava', '2020-05-05 19:42:08', '', '', '', '', ''),
	(22, 62, 2, 'lalo', 'becas', 56, 'no estuduia', '2020-05-05 19:42:37', '', '', '', '', ''),
	(23, 62, 2, 'docentes', 'enere11', 56, '3131', '2020-05-05 19:43:04', '', '', '', '', ''),
	(24, 58, 2, 'Adauto Ortiz Romero-2', '12123', 56, 'note el cambio en la tabla', '2020-05-05 19:46:01', '', '', '', '', ''),
	(25, 55, 2, 'lalo', 'becas', 123, 'note el cambio en la tabla', '2020-05-05 19:46:16', '', '', '', '', ''),
	(26, 67, 2, '  pancho', '12123', 56, '3131', '2020-05-05 19:47:08', '', '', '', '', ''),
	(27, 66, 2, '  pancho', 'enere11', 15123, '3131', '2020-05-05 19:47:28', '', '', '', '', ''),
	(28, 61, 2, 'lalo', '12123', 56, '1212asa', '2020-05-05 19:48:40', '', '', '', '', ''),
	(29, 52, 1, 'Adauto Ortiz Romero-2', 'enere11', 5, '3131', '2020-05-05 19:49:32', '', '', '', '', ''),
	(30, 58, 2, 'alumnos', 'salario', 56, '3131', '2020-05-05 19:50:13', '', '', '', '', ''),
	(31, 59, 2, 'cheila', 'becas', 56, '3131', '2020-05-05 19:51:32', '', '', '', '', ''),
	(32, 59, 2, 'cheila', 'becas', 56, '3131', '2020-05-05 19:52:09', '', '', '', '', ''),
	(33, 62, 2, 'cheila', 'adeudos', 15123, 'no estuduia', '2020-05-05 19:52:21', '', '', '', '', ''),
	(34, 66, 2, 'docentes', 'adeudos', 15123, 'no estuduia', '2020-05-05 19:52:44', '', '', '', '', ''),
	(35, 66, 2, 'docentes', 'adeudos', 15123, 'no estuduia', '2020-05-05 19:52:54', '', '', '', '', ''),
	(36, 54, 2, 'docentes', 'enere11', 15123, 'Un exelente Prodfesor', '2020-05-05 19:55:22', '', '', '', '', ''),
	(37, 52, 1, 'cheila', 'enere11', 56, 'no estuduia', '2020-05-05 19:56:17', '', '', '', '', ''),
	(38, 60, 2, '  pancho', 'adeudos', 15123, 'note el cambio en la tabla', '2020-05-05 19:56:31', '', '', '', '', ''),
	(39, 66, 2, 'cheila', 'becas', 56, 'Un exelente Prodfesor', '2020-05-05 19:58:47', '', '', '', '', ''),
	(40, 56, 1, '  pancho', 'becas', 56, 'no estuduia', '2020-05-05 19:59:25', '', '', '', '', ''),
	(41, 56, 1, '  pancho', 'becas', 56, 'no estuduia', '2020-05-05 19:59:37', '', '', '', '', ''),
	(42, 56, 1, '  pancho', 'becas', 56, 'no estuduia', '2020-05-05 19:59:49', '', '', '', '', ''),
	(43, 56, 1, '  pancho', 'becas', 56, 'no estuduia', '2020-05-05 20:00:07', '', '', '', '', ''),
	(44, 56, 1, '  pancho', 'becas', 56, 'no estuduia', '2020-05-05 20:00:46', '', '', '', '', ''),
	(45, 56, 1, '  pancho', 'becas', 56, 'no estuduia', '2020-05-05 20:00:52', '', '', '', '', ''),
	(46, 66, 2, 'Adauto Ortiz Romero-2', 'becas', 56, 'note el cambio en la tabla', '2020-05-05 20:01:03', '', '', '', '', ''),
	(47, 66, 2, 'Adauto Ortiz Romero-2', 'becas', 56, 'note el cambio en la tabla', '2020-05-05 20:01:22', '', '', '', '', ''),
	(48, 66, 2, 'Adauto Ortiz Romero-2', 'becas', 56, 'note el cambio en la tabla', '2020-05-05 20:01:31', '', '', '', '', ''),
	(49, 58, 2, 'docentes', 'salario', 12515, 'no estuduia', '2020-05-05 20:01:45', '', '', '', '', ''),
	(50, 60, 2, 'cheila', 'adeudos', 56, 'no estuduia', '2020-05-05 20:02:04', '', '', '', '', ''),
	(51, 67, 2, 'docentes', 'becas', 56, 'no lava', '2020-05-05 20:02:31', '', '', '', '', '');
/*!40000 ALTER TABLE `gasto` ENABLE KEYS */;

-- Volcando estructura para tabla conta.meses
CREATE TABLE IF NOT EXISTS `meses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mes` varchar(50) DEFAULT NULL,
  `src_gasto` varchar(50) DEFAULT NULL,
  `src_ingresos` varchar(50) DEFAULT NULL,
  `src_egresos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.meses: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `meses` DISABLE KEYS */;
INSERT IGNORE INTO `meses` (`id`, `mes`, `src_gasto`, `src_ingresos`, `src_egresos`) VALUES
	(1, 'enero', './?view=gasto', './?view=enero_ingresos_fideicomiso', './?view=enero_egresos_fideicomiso'),
	(2, 'febrero', './?view=febrero_gasto', './?view=febrero_ingresos_fideicomiso', './?view=febrero_egresos_fideicomiso'),
	(3, 'marzo', './?view=marzo_gasto', './?view=marzo_ingresos_fideicomiso', './?view=marzo_egresos_fideicomiso'),
	(4, 'abril', './?view=abril_gasto', './?view=abril_ingresos_fideicomiso', './?view=abril_egresos_fideicomiso'),
	(5, 'mayo', './?view=mayo_gasto', './?view=mayo_ingresos_fideicomiso', './?view=mayo_egresos_fideicomiso'),
	(6, 'junio', './?view=junio_gasto', './?view=junio_ingresos_fideicomiso', './?view=junio_egresos_fideicomiso'),
	(7, 'julio', './?view=julio_gasto', './?view=julio_ingresos_fideicomiso', './?view=julio_egresos_fideicomiso'),
	(8, 'agosto', './?view=agosto_gasto', './?view=agosto_ingresos_fideicomiso', './?view=agosto_egresos_fideicomiso'),
	(9, 'septiembre', './?view=sept_gasto', './?view=sept_ingresos_fideicomiso', './?view=sept_egresos_fideicomiso'),
	(10, 'octubre', './?view=oct_gasto', './?view=oct_ingresos_fideicomiso', './?view=oct_egresos_fideicomiso'),
	(11, 'noviembre', './?view=nov_gasto', './?view=nov_ingresos_fideicomiso', './?view=nov_egresos_fideicomiso'),
	(12, 'diciembre', './?view=diciembre_gasto', './?view=diciembre_ingresos_fideicomiso', './?view=diciembre_egresos_fideicomiso');
/*!40000 ALTER TABLE `meses` ENABLE KEYS */;

-- Volcando estructura para tabla conta.nombre_fideicomisos
CREATE TABLE IF NOT EXISTS `nombre_fideicomisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `id_mes_nomfide` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mes_nomfide` (`id_mes_nomfide`),
  CONSTRAINT `FK1_mes_nomfide` FOREIGN KEY (`id_mes_nomfide`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.nombre_fideicomisos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `nombre_fideicomisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `nombre_fideicomisos` ENABLE KEYS */;

-- Volcando estructura para tabla conta.nombre_gasto
CREATE TABLE IF NOT EXISTS `nombre_gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `id_mes_nomg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mes_nomg` (`id_mes_nomg`),
  CONSTRAINT `FK1_nameg_mes` FOREIGN KEY (`id_mes_nomg`) REFERENCES `meses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.nombre_gasto: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `nombre_gasto` DISABLE KEYS */;
INSERT IGNORE INTO `nombre_gasto` (`id`, `nombre`, `id_mes_nomg`) VALUES
	(52, 'PRUEBA', 1),
	(54, 'Grupo Televisa', 2),
	(55, 'PRUEBA', 2),
	(56, 'caca', 1),
	(57, 'marzo', 3),
	(58, 'abril', 4),
	(59, 'may', 5),
	(60, 'junio', 6),
	(61, 'julio', 7),
	(62, 'agost', 8),
	(64, 'sept', 9),
	(66, 'octu', 10),
	(67, 'nov', 11),
	(68, 'dici', 12);
/*!40000 ALTER TABLE `nombre_gasto` ENABLE KEYS */;

-- Volcando estructura para tabla conta.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.permisos: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT IGNORE INTO `permisos` (`id`, `nombre`) VALUES
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
INSERT IGNORE INTO `reparaciones` (`id`, `fecha_repa`, `descripcion`, `idvehiculo`, `idtaller`, `fecha_carga`) VALUES
	(1, '2018-07-10', 'faros fallando', 1, 1, '2018-06-25 03:48:18');
/*!40000 ALTER TABLE `reparaciones` ENABLE KEYS */;

-- Volcando estructura para tabla conta.sector
CREATE TABLE IF NOT EXISTS `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla conta.sector: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sector` DISABLE KEYS */;
INSERT IGNORE INTO `sector` (`id`, `nombre`, `idempresa`, `fecha_carga`) VALUES
	(1, 'informatica', 1, '2018-06-25 03:46:32');
/*!40000 ALTER TABLE `sector` ENABLE KEYS */;

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
INSERT IGNORE INTO `seguro` (`id`, `nombre`, `poliza`, `vencimiento`, `fecha_carga`) VALUES
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

-- Volcando datos para la tabla conta.taller: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `taller` DISABLE KEYS */;
INSERT IGNORE INTO `taller` (`id`, `nombre`, `cuit`, `direccion`, `localidad`, `telefono`, `celular`, `estado`, `fecha_carga`) VALUES
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
INSERT IGNORE INTO `tarjeta` (`id`, `numero`, `vencimiento`, `idvehiculo`, `fecha_carga`) VALUES
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
INSERT IGNORE INTO `vehiculo` (`id`, `vehiculo_code`, `patente`, `marca`, `modelo`, `nro_chasis`, `nro_motor`, `vto_vtv`, `idseguro`, `color`, `estado`, `imagen`, `fecha_carga`) VALUES
	(1, '1', '1231', 'hyundai', '21332', 'xcdds23', 'xvcvrerx3', '2018-06-30', 1, 'black', 1, 'view/resources/images/1529891236_ahorcado.jpg', '2018-06-25 03:46:37');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
