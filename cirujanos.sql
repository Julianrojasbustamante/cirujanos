/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `contenido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` mediumtext DEFAULT NULL,
  `disposicion` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `seccion` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `contenido_banner_texto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` int(11) NOT NULL,
  `texto` varchar(50) DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `contenido_banner_texto` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido_banner_texto` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `contenido_disposicion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `contenido_disposicion` DISABLE KEYS */;
INSERT IGNORE INTO `contenido_disposicion` (`id`, `nombre`) VALUES
	(1, 'Tamaño completo'),
	(2, 'Tamaño medio'),
	(3, 'Centrado'),
	(4, 'Imagen principal'),
	(5, 'Banner con texto ');
/*!40000 ALTER TABLE `contenido_disposicion` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `contenido_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `contenido_tipo` DISABLE KEYS */;
INSERT IGNORE INTO `contenido_tipo` (`id`, `nombre`) VALUES
	(1, 'Texto'),
	(2, 'Imagen'),
	(3, 'Video'),
	(4, 'I frame'),
	(5, 'Imagen principal'),
	(6, 'Planes'),
	(7, 'Servicios'),
	(8, 'Banner con texto');
/*!40000 ALTER TABLE `contenido_tipo` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT IGNORE INTO `estado` (`id`, `estado`) VALUES
	(1, 'Inactivo'),
	(2, 'Activo'),
	(3, 'Borrado');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `padre` int(11) DEFAULT NULL,
  `ruta` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT IGNORE INTO `menu` (`id`, `nombre`, `nivel`, `padre`, `ruta`, `estado`, `auditoria_creado`, `auditoria_usuario`, `auditoria_modificado`) VALUES
	(1, 'Inicio', 1, NULL, 'inicio', 2, '2020-07-14 21:00:27', 2, '2020-07-14 21:03:14'),
	(2, 'Nosotros', 1, NULL, 'nosotros', 2, '2020-07-14 21:03:25', 2, '2020-07-14 21:03:38'),
	(3, 'Técnicas Quirúrgicas', 1, NULL, 'tecnicas-quirurgicas', 2, '2020-07-14 21:04:19', 2, '2020-07-14 21:04:20'),
	(4, 'Técnicas no Quirúrgicas', 1, NULL, 'tecnicas-no-quirurgicas', 2, '2020-07-14 21:04:54', 2, '2020-07-14 21:04:56'),
	(5, 'Blog', 1, NULL, 'blog', 2, '2020-07-14 21:05:10', 2, '2020-07-14 21:05:14'),
	(6, 'Contáctenos', 1, NULL, 'contacto', 2, '2020-07-14 21:05:38', 2, '2020-07-14 21:17:19');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pie_pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `columna` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `titulo_hipervinculo` varchar(50) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `icono` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `pie_pagina` DISABLE KEYS */;
/*!40000 ALTER TABLE `pie_pagina` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pie_pagina_icono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icono` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `pie_pagina_icono` DISABLE KEYS */;
INSERT IGNORE INTO `pie_pagina_icono` (`id`, `icono`) VALUES
	(1, 'fa fa-phone'),
	(2, 'fa fa-map-marker'),
	(3, 'fa fa-envelope'),
	(4, 'fa fa-facebook'),
	(5, 'fab fa-whatsapp'),
	(6, 'fa fa-mobile'),
	(7, 'fab fa-instagram'),
	(8, 'fab fa-twitter');
/*!40000 ALTER TABLE `pie_pagina_icono` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pie_pagina_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `pie_pagina_tipo` DISABLE KEYS */;
INSERT IGNORE INTO `pie_pagina_tipo` (`id`, `tipo`) VALUES
	(1, 'Texto'),
	(2, 'Hipervínculo con icono'),
	(3, 'Icono con texto'),
	(4, 'Hipervínculo con texto');
/*!40000 ALTER TABLE `pie_pagina_tipo` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT IGNORE INTO `rol` (`id`, `rol`, `estado`) VALUES
	(1, 'Super administrador', 1),
	(2, 'Administrador web', 1);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icono` varchar(50) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `informacion` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `auditoria_creado` datetime DEFAULT NULL,
  `auditoria_usuario` int(11) DEFAULT NULL,
  `auditoria_modificado` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT IGNORE INTO `slider` (`id`, `slider`, `estado`, `auditoria_creado`, `auditoria_usuario`, `auditoria_modificado`) VALUES
	(1, 'imagen-principal-banner1.jpg', 2, '2020-07-14 21:24:43', NULL, '2020-07-15 10:14:49'),
	(2, 'imagen-principal-banner2.jpg', 2, '2020-07-14 21:25:01', 2, '2020-07-14 21:25:03');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena_fecha` datetime NOT NULL,
  `contrasena_intento` int(1) NOT NULL,
  `contrasena_llave` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rol` int(1) NOT NULL,
  `cargo` int(1) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `ingreso` datetime NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` int(2) NOT NULL,
  `actualizado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT IGNORE INTO `usuario` (`id`, `nombres`, `email`, `contrasena`, `contrasena_fecha`, `contrasena_intento`, `contrasena_llave`, `rol`, `cargo`, `avatar`, `estado`, `ingreso`, `creado`, `modificado`, `actualizado`) VALUES
	(1, 'Rafael Andrés Medina', 'julianrojas@inextgroup.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPe2GKB4Hhjmoe5FE4cup3ENEC3nper/ym', '2020-06-23 11:28:22', 3, '5886ef42fbaa73b08ce43d5127aeeabe', 1, 2, '1.png', 2, '2019-09-28 10:32:37', '2019-04-19 00:00:00', 1, '2020-06-23 11:28:25'),
	(2, 'Julián Rojas', 'julianrjs15@gmail.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPeTI0WQn/iqLrvjtpv9a62SKqdTq7l8Re', '2020-06-23 11:27:34', 4, '8949a3d0f9cc457732954137f3d8b56a', 1, 1, '21.jpg', 2, '2020-07-15 12:59:15', '2019-12-09 09:51:29', 21, '2020-07-15 12:59:15'),
	(3, 'Jonatan Camilo', 'Jonatanliscanox@gmail.com', '$2a$07$GSVs6pSNqiKLkHE6dOtZPelYlIQQPV/f2H6on4TRJk3qk4W6fxuS2', '0000-00-00 00:00:00', 1, '', 1, 0, 'usuario.jpg', 2, '0000-00-00 00:00:00', '2020-06-23 16:55:53', 21, '2020-07-14 20:57:55');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
