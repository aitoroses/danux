-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-03-2013 a las 00:47:38
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `semiems`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_acabados_perfiles`
--

CREATE TABLE `b_acabados_perfiles` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `b_acabados_perfiles`
--

INSERT INTO `b_acabados_perfiles` (`id`, `name`) VALUES
(1, 'Melamina Roble 22'),
(2, 'Melamina Blanco Liso'),
(3, 'Melamina haya'),
(4, 'Melamina Cerezo Real'),
(5, 'Wengue'),
(6, 'Roble Gris'),
(7, 'Melamina Roble Claro'),
(8, 'Anonizado Plata Batiente'),
(9, 'Anonizado Plata Plata Corredero Minimalista'),
(10, 'Anonizado Plata Corredero Clasico'),
(11, 'Rechapado Roble Minimalista'),
(12, 'Rechapado Cerezo Minimalista'),
(13, 'Rechapado Haya Minimalista'),
(14, 'Rechapado Roble Clasico'),
(15, 'Rechapado Cerezo Clasico'),
(16, 'Rechapado Haya Clasico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_acc`
--

CREATE TABLE `b_acc` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `desc` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `points` varchar(6) CHARACTER SET latin1 NOT NULL,
  `type` int(1) NOT NULL,
  `proveedor` int(5) NOT NULL,
  `ref` text CHARACTER SET latin1 NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=848 ;

--
-- Volcado de datos para la tabla `b_acc`
--

INSERT INTO `b_acc` (`id`, `desc`, `points`, `type`, `proveedor`, `ref`, `img`) VALUES
(36, 'Colunmas', '150', 1, 0, '', ''),
(37, 'Vigas', '69', 1, 0, '', ''),
(38, 'Interior en L esquina libre', '130', 1, 0, '', ''),
(39, 'Interior en L esquina con costado', '80', 1, 0, '', ''),
(40, 'Chaflán', '90', 1, 0, '', ''),
(41, 'Costado visto', '0', 1, 0, '', ''),
(775, 'barra De Extracción Total "halcon" 35 Cm', '17.68', 0, 1, '43351', ''),
(776, 'barra De Extracción Total "halcon" 38 Cm', '18.45', 0, 1, '43401', ''),
(777, 'barra De Extracción Total "halcon" 48 Cm', '20.96', 0, 1, '43501', ''),
(778, 'barra De Extracción Total "halcon" 77 Cm', '33.24', 0, 1, '43801', ''),
(779, 'cesta De Tela Adaptable Gacela Alto 14 / Ancho 35-45', '25.24', 0, 1, '23311', '23311_23421.jpg'),
(780, 'cesta De Tela Adaptable Gacela Alto 14 / Ancho 45-55', '27.3', 0, 1, '23411', '23311_23421.jpg'),
(781, 'cesta De Tela Adaptable Gacela Alto 14 / Ancho 55-65', '30.91', 0, 1, '23511', '23311_23421.jpg'),
(782, 'cesta De Tela Adaptable Gacela Alto 20 / Ancho 35-45', '27.82', 0, 1, '23321', '23311_23421.jpg'),
(783, 'cesta De Tela Adaptable Gacela Alto 20 / Ancho 55-65', '32.46', 0, 1, '23521', '23311_23421.jpg'),
(784, 'cesta De Tela Adaptable Gacela Alto 20/ Ancho 45-55', '30.4', 0, 1, '23421', '23311_23421.jpg'),
(785, 'colgador De Botas', '7.71', 0, 1, '66121', '66121.jpg'),
(786, 'corbatero-cinturonero  Fijo "vision" 30 Cm', '4.05', 0, 1, '12321', ''),
(787, 'corbatero-cinturonero  Fijo "vision" 39 Cm', '4.12', 0, 1, '12421', ''),
(788, 'corbatero-cinturonero Lateral Extraíble "camaleon"', '14.26', 0, 1, '11441', ''),
(789, 'elevador De Ropa "basic" 45-60', '22.5', 0, 1, '74000', '74000_74100.jpg'),
(790, 'elevador De Ropa "basic" 60-83', '23.25', 0, 1, '74100', '74000_74100.jpg'),
(791, 'empujamangas "toro" Der', '13.29', 0, 1, '21321d', '21321d_24321i.jpg'),
(792, 'empujamangas "toro" Iz', '13.29', 0, 1, '24321 I', '21321d_24321i.jpg'),
(793, 'espejo Extraíble  "lago De Sanabria"', '108.86', 0, 1, '90000', '90000.jpg'),
(794, 'pantalonero Bajo Balda Extraíble "do„ana" C/ Doble', '39.65', 0, 1, '37501', '37501.jpg'),
(795, 'pantalonero Bajo Balda Extraíble  Der "moncayo" ', '33.51', 0, 1, '35501d', '35501d_i.jpg'),
(796, 'pantalonero Bajo Balda Extraíble  Der "moncayo" ', '33.51', 0, 1, '35501d', '35501d_i.jpg'),
(797, 'pantalonero Bajo Balda Extraíble  Iz "moncayo" ', '33.51', 0, 1, '35501i', '35501d_i.jpg'),
(798, 'pantalonero Bajo Balda Extraíble  Iz "moncayo" ', '33.51', 0, 1, '35501i', '35501d_i.jpg'),
(799, 'pantalonero Doble Extraíble "milano"14b ', '27', 0, 1, '33141', '33141.jpg'),
(800, 'pantalonero Doble Extraíble "milano"14b ', '27', 0, 1, '33141', '33141.jpg'),
(801, 'pantalonero Doble Extraíble "milano"14b C/ Goma Antide ', '37.64', 0, 1, '33141g', '33141_33181g.jpg'),
(802, 'pantalonero Doble Extraíble "milano"14b C/ Goma Antide ', '37.64', 0, 1, '33141g', '33141_33181g.jpg'),
(803, 'pantalonero Doble Extraíble "milano"18b', '28.5', 0, 1, '33181', '33181.jpg'),
(804, 'pantalonero Doble Extraíble "milano"18b', '28.5', 0, 1, '33181', '33181.jpg'),
(805, 'pantalonero Doble Extraíble "milano"18b C/ Goma Antide ', '41.91', 0, 1, '33181g', '33141_33181g.jpg'),
(806, 'pantalonero Doble Extraíble "milano"18b C/ Goma Antide ', '41.91', 0, 1, '33181g', '33141_33181g.jpg'),
(807, 'pantalonero Extraíble  Lateral "bahia Mazarron" 12b', '78.15', 0, 1, '320401g', '320401g_320501g.jpg'),
(808, 'pantalonero Extraíble  Lateral "bahia Mazarron" 12b', '78.15', 0, 1, '320401g', '320401g_320501g.jpg'),
(809, 'pantalonero Extraíble  Lateral "bahia Mazarron" 15b', '82', 0, 1, '320501g', '320401g_320501g.jpg'),
(810, 'pantalonero Extraíble  Lateral "bahia Mazarron" 15b', '82', 0, 1, '320501g', '320401g_320501g.jpg'),
(811, 'pantalonero Tirador Extraíble "loija"  9 B F40antideslizante', '24.2', 0, 1, '31091g', '31091g.jpg'),
(812, 'pantalonero Tirador Extraíble "loija"  9 B F40antideslizante', '24.2', 0, 1, '31091g', '31091g.jpg'),
(813, 'pantalonero Tirador Extraíble "loija" 12 B F50 Antideslizante', '26.44', 0, 1, '31121g', '31091g.jpg'),
(814, 'pantalonero Tirador Extraíble "loija" 12 B F50 Antideslizante', '26.44', 0, 1, '31121g', '31091g.jpg'),
(815, 'pantalonero Tirador Extraíble "loija"11 B F50 Antideslizante', '25.45', 0, 1, '31111g', '31091g.jpg'),
(816, 'pantalonero Tirador Extraíble "loija"11 B F50 Antideslizante', '25.45', 0, 1, '31111g', '31091g.jpg'),
(817, 'pantalonero Tirador Extraíble "loija"14 B F55 Antideslizante', '33.58', 0, 1, '31141g', '31091g.jpg'),
(818, 'pantalonero Tirador Extraíble "loija"14 B F55 Antideslizante', '33.58', 0, 1, '31141g', '31091g.jpg'),
(819, 'percha Pantalonero  Doble "do„ana"', '1.63', 0, 1, '53371', ''),
(820, 'percha Pantalonero"moncayo"', '1.63', 0, 1, '53351', ''),
(821, 'tabla De Planchar Extraíble "basic"', '36', 0, 1, '80000', '80000.jpg'),
(822, 'zapatero Adaptable "fijo" 48-83 Cm', '6.07', 0, 1, '624883', '624883.jpg'),
(823, 'zapatero Adaptable "fijo" 83-113 Cm', '7.61', 0, 1, '628313', '624883.jpg'),
(824, 'zapatero De Filas "peñon De Ifach" 32x45', '10.71', 0, 1, '68021z', '68021z.jpg'),
(825, 'zapatero De Filas "peñon De Ifach" 32x45', '10.71', 0, 1, '68021z', '68021z.jpg'),
(826, 'zapatero De Filas "peñon De Ifach" 32x65', '13.3', 0, 1, '68031z', '68021z.jpg'),
(827, 'zapatero De Filas "peñon De Ifach" 32x65', '13.3', 0, 1, '68031z', '68021z.jpg'),
(828, 'zapatero De Filas "peñon De Ifach" 32x85', '16.1', 0, 1, '68041z', '68021z.jpg'),
(829, 'zapatero De Filas "peñon De Ifach" 32x85', '16.1', 0, 1, '68041z', '68021z.jpg'),
(830, 'zapatero De Filas "peñon De Ifach" 43x65', '17.5', 0, 1, '68131b', '68021z.jpg'),
(831, 'zapatero De Filas "peñon De Ifach" 43x65', '17.5', 0, 1, '68131b', '68021z.jpg'),
(832, 'zapatero De Filas "peñon De Ifach" 43x85', '21', 0, 1, '68141b ', '68021z.jpg'),
(833, 'zapatero De Filas "peñon De Ifach" 43x85', '21', 0, 1, '68141b ', '68021z.jpg'),
(834, 'zapatero De Filas "peñon De Ifach"43x45', '14.21', 0, 1, '68121b', '68021z.jpg'),
(835, 'zapatero De Filas "peñon De Ifach"43x45', '14.21', 0, 1, '68121b', '68021z.jpg'),
(836, 'zapatero Extraíble Adaptable "lago De Banyoles" 40-60 Cm', '39.2', 0, 1, '67401', '67401_67121.jpg'),
(837, 'zapatero Extraíble Adaptable "lago De Banyoles" 50-80 Cm', '41.49', 0, 1, '67501', '67401_67121.jpg'),
(838, 'zapatero Extraíble Adaptable "lago De Banyoles" 60-100 Cm', '44.93', 0, 1, '67601', '67401_67121.jpg'),
(839, 'zapatero Extraíble Adaptable "lago De Banyoles" 75-120', '49.91', 0, 1, '67121', '67401_67121.jpg'),
(840, 'zapatero Extraíble Adaptable Para Frente "lobo" 38-60 Cm', '23.12', 0, 1, '64401', '64401_64121.jpg'),
(841, 'zapatero Extraíble Adaptable Para Frente "lobo" 48-80 Cm', '24.18', 0, 1, '64501', '64401_64121.jpg'),
(842, 'zapatero Extraíble Adaptable Para Frente "lobo" 58-100 Cm', '26.09', 0, 1, '64601', '64401_64121.jpg'),
(843, 'zapatero Extraíble Adaptable Para Frente "lobo" 75-120 Cm', '30.81', 0, 1, '64121', '64401_64121.jpg'),
(844, 'zapatero Lateral "reno Excutive" 10 Bal', '103.6', 0, 1, '62551e', '62551e.jpg'),
(845, 'zapatero Lateral "reno Excutive" 6 Bal', '65.8', 0, 1, '62251e', '62251e.jpg'),
(846, 'zapatero Lateral "reno" 2 Baldas', '23.42', 0, 1, '62251', '62251_62551.jpg'),
(847, 'zapatero Lateral "reno" 4 Baldas', '36.01', 0, 1, '62551', '62251_62551.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_acc_proveedores`
--

CREATE TABLE `b_acc_proveedores` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `b_acc_proveedores`
--

INSERT INTO `b_acc_proveedores` (`id`, `nombre`) VALUES
(1, 'Loija');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_cat_mat_puertas`
--

CREATE TABLE `b_cat_mat_puertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(4) NOT NULL,
  `desc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `b_cat_mat_puertas`
--

INSERT INTO `b_cat_mat_puertas` (`id`, `type`, `desc`) VALUES
(1, 1, 'Cristales Porcelanicos'),
(2, 2, 'Gama Imaprint'),
(3, 3, 'Gama Duo'),
(4, 4, 'Gama Luxe'),
(5, 5, 'Maderas y Lacas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_cat_piezas_int`
--

CREATE TABLE `b_cat_piezas_int` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `desc` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `b_cat_piezas_int`
--

INSERT INTO `b_cat_piezas_int` (`id`, `desc`) VALUES
(1, 'traseras'),
(2, 'techos'),
(3, 'base'),
(4, 'balda_altillo'),
(5, 'costado_int'),
(6, 'costado_ext');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_doors`
--

CREATE TABLE `b_doors` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL,
  `image` text NOT NULL,
  `div` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `b_doors`
--

INSERT INTO `b_doors` (`id`, `desc`, `image`, `div`) VALUES
(1, '1', 'contenido/Bibliotecas/puertas', 1),
(2, '2,2', 'contenido/Bibliotecas/puertas', 2),
(3, '3,3,3', 'contenido/Bibliotecas/puertas', 3),
(4, '4,4,4,4', 'contenido/Bibliotecas/puertas', 4),
(5, '6,12,2,12,6', 'contenido/Bibliotecas/puertas', 5),
(6, '7/12,12,3', 'contenido/Bibliotecas/puertas', 3),
(7, '5/12,6,5/12', 'contenido/Bibliotecas/puertas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_handles`
--

CREATE TABLE `b_handles` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Tiradores` varchar(7) DEFAULT NULL,
  `Codigo` varchar(16) DEFAULT NULL,
  `Material` varchar(6) DEFAULT NULL,
  `Largura` varchar(3) DEFAULT NULL,
  `Desc` varchar(18) DEFAULT NULL,
  `Precio` int(2) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `b_handles`
--

INSERT INTO `b_handles` (`id`, `Tiradores`, `Codigo`, `Material`, `Largura`, `Desc`, `Precio`, `img`) VALUES
(1, 'Tipo 1', '1456-96-010', 'Metal', '105', 'Cromo Brillo', 10, 'Tira1.jpg'),
(2, 'Tipo 1', '1456-96-011', 'Metal', '105', 'Cromo Mate', 10, 'Tira1.jpg'),
(3, 'Tipo 2', '9391-046', 'Madera', '240', 'Negro', 10, 'Tira2.jpg'),
(4, 'Tipo 2', '9391-047', 'Madera', '240', 'Marron', 10, 'Tira2.jpg'),
(5, 'Tipo 3', '9390-046', 'Madera', '55', 'Negro', 10, 'Tira3.jpg'),
(6, 'Tipo 3', '9390-047', 'Madera', '55', 'Marron', 10, 'Tira3.jpg'),
(7, 'Tipo 4', '621-C-011', 'Metal', '18', 'Cromo Mate', 10, 'Tira4.jpg'),
(8, 'Tipo 5', '1428-160-011', 'Metal', '196', 'Cromo Mate', 10, 'Tira5.jpg'),
(9, 'Tipo 5', '1428-224-011', 'Metal', '259', 'Cromo Mate', 10, 'Tira5.jpg'),
(10, 'Tipo 6', '1447-224-011', 'Metal', '244', 'Cromo Mate', 10, 'Tira6.jpg'),
(11, 'Tipo 6', '1447-224-051', 'Metal', '244', 'Pintura Negro Mate', 10, 'Tira6.jpg'),
(12, 'Tipo 6', '1447-224-010', 'Metal', '244', 'Cromo Brillo', 10, 'Tira6.jpg'),
(13, 'Tipo 7', '1455-32-011', 'Metal', '50', 'Cromo Mate', 10, 'Tira7.jpg'),
(14, 'Tipo 8', '1403-320-AL15-PE', 'Metal', '336', 'Cromo Mate', 336, 'Tira8.jpg'),
(15, 'Tipo 8', '1403-320-AL15-PE', 'Metal', '624', 'Cromo Mate', 624, 'Tira8.jpg'),
(16, 'Tipo 8', '1403-320-AL15-PE', 'Metal', '100', 'Cromo Mate', 1008, 'Tira8.jpg'),
(17, 'Tipo 9', '1386-160-030MATT', 'Metal', '207', 'Bronce Mate', 10, 'Tira9.jpg'),
(18, 'Tipo 10', '1375-192-010', 'Metal', '220', 'Cromo Brillo', 10, 'Tira10.jpg'),
(19, 'Tipo 10', '1377-160-L83', 'Metal', '192', 'Haya S/B', 10, 'Tira10.jpg'),
(20, 'Tipo 11', '1434-192-0147', 'Metal', '236', 'Niquel Marron Mate', 10, 'Tira11.jpg'),
(21, 'Tipo 12', '601-B-011', 'Metal', '', 'Cromo Mate', 10, 'Tira12.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_mat_puertas`
--

CREATE TABLE `b_mat_puertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(4) NOT NULL,
  `ref` varchar(8) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=170 ;

--
-- Volcado de datos para la tabla `b_mat_puertas`
--

INSERT INTO `b_mat_puertas` (`id`, `type`, `ref`, `desc`, `image`) VALUES
(1, 1, 'SP001', 'Metropolix-Fumo', 'SP001-Metropolix-Fumo.jpg'),
(2, 1, 'SP002', 'Oxide-Perla', 'SP002-Oxide-Perla.jpg'),
(3, 1, 'SP003', 'Metropolix-Neve', 'SP003-Metropolix-Neve.jpg'),
(4, 1, 'SP004', 'Oxide-Nero', 'SP004-Oxide-Nero.jpg'),
(5, 1, 'SP005', 'Metropolix-Nero', 'SP005-Metropolix-Nero.jpg'),
(6, 1, 'SP006', 'Oxide-Moro', 'SP006-Oxide-Moro.jpg'),
(7, 1, 'SP007', 'Metropolix-Moro', 'SP007-Metropolix-Moro.jpg'),
(8, 1, 'SP008', 'Oxide-Avorio', 'SP008-Oxide-Avorio.jpg'),
(9, 1, 'SP009', 'Naturali-Travertino-Avorio', 'SP009-Naturali-Travertino-Avorio.jpg'),
(10, 1, 'SP010', 'Naturali-Crema-Marfil', 'SP010-Naturali-Crema-Marfil.jpg'),
(11, 1, 'SP011', 'Sketch-Avorio', 'SP011-Sketch-Avorio.jpg'),
(12, 1, 'SP012', 'Sketch-Negro', 'SP012-Sketch-Negro.jpg'),
(13, 1, 'SP013', 'Sketch-Tortora', 'SP013-Sketch-Tortora.jpg'),
(14, 1, 'SP014', 'Sketch-Moro', 'SP014-Sketch-Moro.jpg'),
(15, 1, 'SP015', 'Naturali-Ossidiana-Vena-Oscura', 'SP015-Naturali-Ossidiana-Vena-Oscura.jpg'),
(16, 1, 'SP016', 'Pan-de-Oro', 'SP016-Pan-de-Oro.jpg'),
(17, 1, 'SP017', 'Pan-de-Plata', 'SP017-Pan-de-Plata.jpg'),
(18, 2, '425C', '', '425C.jpg'),
(19, 2, '1014', '', '1014.jpg'),
(20, 2, '1164', '', '1164.jpg'),
(21, 2, '1342', '', '1342.jpg'),
(22, 2, '1435', '', '1435.jpg'),
(23, 2, '1586', '', '1586.jpg'),
(24, 2, '1601', '', '1601.jpg'),
(25, 2, '1603', '', '1603.jpg'),
(26, 2, '1604', '', '1604.jpg'),
(27, 2, '2001', '', '2001.jpg'),
(28, 2, '2230', '', '2230.jpg'),
(29, 2, '2232', '', '2232.jpg'),
(30, 2, '3004', '', '3004.jpg'),
(31, 2, '4006', '', '4006.jpg'),
(32, 2, '5002', '', '5002.jpg'),
(33, 2, '7035', '', '7035.jpg'),
(34, 2, '8017', '', '8017.jpg'),
(35, 2, '9006', '', '9006.jpg'),
(36, 2, 'blanco', '', 'blanco.jpg'),
(83, 3, 'SD001-78', 'WHITE-SR209', 'SD001-78E-WHITE-SR209.jpg'),
(84, 3, 'SD002-18', 'CREMA-EBRO', 'SD002-185-CREMA-EBRO.jpg'),
(85, 3, 'SD003-13', 'CAPUCHINO', 'SD003-13C-CAPUCHINO.jpg'),
(86, 3, 'SD004-17', 'ROJO', 'SD004-172-ROJO.jpg'),
(87, 3, 'SD005-16', 'BURDEOS', 'SD005-164-BURDEOS.jpg'),
(88, 3, 'SD006-14', 'TOFFE', 'SD006-14C-TOFFE.jpg'),
(89, 3, 'SD007-09', 'GRIS-TORMENTA', 'SD007-09F-GRIS-TORMENTA.jpg'),
(90, 3, 'SD008-88', 'GRIS-BIZOT', 'SD008-88D-GRIS-BIZOT.jpg'),
(91, 3, 'SD009-23', 'NEGRO', 'SD009-231-NEGRO.jpg'),
(92, 3, 'SD010-93', 'AZUL-KLEIN', 'SD010-93F-AZUL-KLEIN.jpg'),
(93, 3, 'SD011-52', 'F-EXPRESSO', 'SD011-52F-F-EXPRESSO.jpg'),
(94, 3, 'SD012-51', 'F-CAPRICCIO', 'SD012-51F-F-CAPRICCIO.jpg'),
(95, 3, 'SD013-53', 'F-NOIR', 'SD013-53F-F-NOIR.jpg'),
(96, 3, 'SD014-70', 'PERLA', 'SD014-70A-PERLA.jpg'),
(97, 3, 'SD015-28', 'BURBUJAS-POP', 'SD015-28F-BURBUJAS-POP.jpg'),
(98, 3, 'SD016-28', 'BURBUJAS-POP-(2)', 'SD016-28F-BURBUJAS-POP-(2).jpg'),
(99, 3, 'SD017-71', 'WHITE-GARDEN-(2)', 'SD017-71F-WHITE-GARDEN-(2).jpg'),
(100, 3, 'SD018-05', 'GARDEN-(2)', 'SD018-05F-GARDEN-(2).jpg'),
(101, 3, 'SD019-43', 'EOLO-copia-(2)', 'SD019-43G-EOLO-copia-(2).jpg'),
(102, 3, 'SD020-89', 'EOLO-AZABACHE-(2)', 'SD020-89G-EOLO-AZABACHE-(2).jpg'),
(103, 3, 'SD021-08', 'CLARO-TECH-(2)', 'SD021-08B-CLARO-TECH-(2).jpg'),
(104, 3, 'SD022-70', 'TESSUTO-(2)', 'SD022-70F-TESSUTO-(2).jpg'),
(105, 3, 'SD023-46', 'CB-BLANCO-(2)', 'SD023-46D-CB-BLANCO-(2).jpg'),
(106, 3, 'SD024-47', 'CB-NEGRO-(2)', 'SD024-47D-CB-NEGRO-(2).jpg'),
(107, 3, 'SD025-06', 'CEMENTO-(2)', 'SD025-06F-CEMENTO-(2).jpg'),
(108, 3, 'SD026-94', 'PIZARRA-(2)', 'SD026-94D-PIZARRA-(2).jpg'),
(109, 3, 'SD027-29', 'GRAY-CODE-(2)', 'SD027-29G-GRAY-CODE-(2).jpg'),
(110, 3, 'SD028-31', 'CUBOS-2D-(2)', 'SD028-31G-CUBOS-2D-(2).jpg'),
(111, 3, 'SD029-89', 'ALUMINIO-(2)', 'SD029-890-ALUMINIO-(2).jpg'),
(112, 3, 'SD030-73', 'HAYA-FANGIO-(2)', 'SD030-734-HAYA-FANGIO-(2).jpg'),
(113, 3, 'SD031-40', 'CEREZO-TIRON', 'SD031-408-CEREZO-TIRON.jpg'),
(114, 3, 'SD032-20', 'CEREZO-XACOBEO', 'SD032-20B-CEREZO-XACOBEO.jpg'),
(115, 3, 'SD033-24', 'PINO-GINEBRA', 'SD033-24G-PINO-GINEBRA.jpg'),
(116, 3, 'SD034-39', 'TEKA-ASTURIAS', 'SD034-39D-TEKA-ASTURIAS.jpg'),
(117, 3, 'SD035-91', 'ROBLE-RENOVALES', 'SD035-91B-ROBLE-RENOVALES.jpg'),
(118, 3, 'SD036-04', 'CALVADOS-OSCURO', 'SD036-044-CALVADOS-OSCURO.jpg'),
(119, 3, 'SD037-02', 'EBANO-LUXURI', 'SD037-02C-EBANO-LUXURI.jpg'),
(120, 3, 'SD038-57', 'SATIN-OLAVE', 'SD038-57F-SATIN-OLAVE.jpg'),
(121, 3, 'SD039-91', 'ROBLE-NATURAL', 'SD039-910-ROBLE-NATURAL.jpg'),
(122, 3, 'SD040-52', 'WENGE-L01', 'SD040-52A-WENGE-L01.jpg'),
(123, 3, 'SD041-00', 'ROBLE-BELLO', 'SD041-008-ROBLE-BELLO.jpg'),
(124, 3, 'SD042-78', 'SAPELLY-RAMEADO', 'SD042-780-SAPELLY-RAMEADO.jpg'),
(125, 3, 'SD044-17', 'PINO-CERVINO', 'SD044-17G-PINO-CERVINO.jpg'),
(126, 3, 'SD045-17', 'CEBRANO', 'SD045-17B-CEBRANO.jpg'),
(141, 4, 'SX001', 'Blanco', 'SX001-Blanco.jpg'),
(142, 4, 'SX002', 'Magnolia', 'SX002-Magnolia.jpg'),
(143, 4, 'SX003', 'Naranja', 'SX003-Naranja.jpg'),
(144, 4, 'SX004', 'Burdeos', 'SX004-Burdeos.jpg'),
(145, 4, 'SX005', 'Rojo', 'SX005-Rojo.jpg'),
(146, 4, 'SX006', 'Berenjena', 'SX006-Berenjena.jpg'),
(147, 4, 'SX007', 'Antracita', 'SX007-Antracita.jpg'),
(148, 4, 'SX008', 'Negro', 'SX008-Negro.jpg'),
(149, 4, 'SX009', 'Pistacho', 'SX009-Pistacho.jpg'),
(150, 4, 'SX010', 'Gris', 'SX010-Gris.jpg'),
(151, 4, 'SX011', 'Olivo', 'SX011-Olivo.jpg'),
(152, 4, 'SX012', 'Textil-Plata', 'SX012-Textil-Plata.jpg'),
(153, 4, 'SX013', 'Textil-Dorado', 'SX013-Textil-Dorado.jpg'),
(154, 4, 'SX014', 'Onda-Negro', 'SX014-Onda-Negro.jpg'),
(155, 5, 'SM001', 'Cerezo-Natural', 'SM001-Cerezo-Natural.jpg'),
(156, 5, 'SM002', 'Cerezo-Vej', 'SM002-Cerezo-Vej.jpg'),
(157, 5, 'SM003', 'Roble', 'SM003-Roble.jpg'),
(158, 5, 'SM004', 'Sapelly', 'SM004-Sapelly.jpg'),
(159, 5, 'SM011', 'Laca-Blanca', 'SM011-Laca-Blanca.jpg'),
(160, 5, 'SM012', 'Laca-Marfil', 'SM012-Laca-Marfil.jpg'),
(161, 5, 'SM013', 'Laca-Envejecida', 'SM013-Laca-Envejecida.jpg'),
(162, 5, 'SM014', 'Laca-Antracita', 'SM014-Laca-Antracita.jpg'),
(163, 5, 'SM015', 'Laca-Color', 'SM015-Laca-Color.jpg'),
(164, 5, 'SM005', 'Wenge', 'SP005-Wenge.jpg'),
(165, 5, 'SM006', 'Ceniza', 'SP006-Ceniza.jpg'),
(166, 5, 'SM007', 'Haya-Nat', 'SP007-Haya-Nat.jpg'),
(167, 5, 'SM008', 'Haya-Vap', 'SP008-Haya-Vap.jpg'),
(168, 5, 'SM009', 'Nogal-Nat', 'SP009-Nogal-Nat.jpg'),
(169, 5, 'SM010', 'Nogal-Vej', 'SP010-Nogal-Vej.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_modules`
--

CREATE TABLE `b_modules` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `width_max` float NOT NULL,
  `points` int(10) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `b_modules`
--

INSERT INTO `b_modules` (`id`, `width_max`, `points`, `image`) VALUES
(1, 2500, 0, 'contenido/Bibliotecas/modulos'),
(2, 2500, 0, 'contenido/Bibliotecas/modulos'),
(3, 2500, 0, 'contenido/Bibliotecas/modulos'),
(4, 2500, 0, 'contenido/Bibliotecas/modulos'),
(5, 2500, 0, 'contenido/Bibliotecas/modulos'),
(6, 2500, 0, 'contenido/Bibliotecas/modulos'),
(7, 2500, 0, 'contenido/Bibliotecas/modulos'),
(8, 2500, 0, 'contenido/Bibliotecas/modulos'),
(9, 2500, 0, 'contenido/Bibliotecas/modulos'),
(10, 2500, 0, 'contenido/Bibliotecas/modulos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_perfiles`
--

CREATE TABLE `b_perfiles` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `media` varchar(100) DEFAULT NULL,
  `tpuerta` int(1) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `b_perfiles`
--

INSERT INTO `b_perfiles` (`cat_id`, `name`, `parent`, `media`, `tpuerta`) VALUES
(1, 'Minimalista', 0, NULL, 0),
(2, 'Clasico', 0, NULL, 0),
(3, 'Lisas', 0, NULL, 1),
(4, 'Con Perfil', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `b_piezas_int`
--

CREATE TABLE `b_piezas_int` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ancho` float NOT NULL,
  `desc` varchar(30) NOT NULL,
  `precio` float NOT NULL,
  `tipo` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `b_piezas_int`
--

INSERT INTO `b_piezas_int` (`id`, `ancho`, `desc`, `precio`, `tipo`) VALUES
(1, 400, 'trasera de 10 mm', 16.28, 1),
(2, 500, 'trasera de 10 mm', 18.74, 1),
(3, 600, 'trasera de 10 mm', 21.21, 1),
(4, 700, 'trasera de 10 mm', 23.67, 1),
(5, 800, 'trasera de 10 mm', 26.13, 1),
(6, 900, 'trasera de 10 mm', 28.59, 1),
(7, 1000, 'trasera de 10 mm', 31.06, 1),
(8, 1100, 'trasera de 10 mm', 33.52, 1),
(9, 1200, 'trasera de 10 mm', 35.98, 1),
(10, 400, 'techo y rafix. sin pvc', 12.71, 2),
(11, 500, 'techo y rafix. sin pvc', 13.32, 2),
(12, 600, 'techo y rafix. sin pvc', 14.23, 2),
(13, 700, 'techo y rafix. sin pvc', 15.76, 2),
(14, 800, 'techo y rafix. sin pvc', 15.76, 2),
(15, 900, 'techo y rafix. sin pvc', 17.94, 2),
(16, 1000, 'techo y rafix. sin pvc', 18.75, 2),
(17, 1100, 'techo y rafix. sin pvc', 19.55, 2),
(18, 1200, 'techo y rafix. sin pvc', 20.36, 2),
(19, 400, 'base y rafix. sin pvc', 12.12, 3),
(20, 500, 'base y rafix. sin pvc', 12.73, 3),
(21, 600, 'base y rafix. sin pvc', 13.65, 3),
(22, 700, 'base y rafix. sin pvc', 15.17, 3),
(23, 800, 'base y rafix. sin pvc', 15.17, 3),
(24, 900, 'base y rafix. sin pvc', 17.05, 3),
(25, 1000, 'base y rafix. sin pvc', 17.86, 3),
(26, 1100, 'base y rafix. sin pvc', 18.91, 3),
(27, 1200, 'base y rafix. sin pvc', 18.91, 3),
(28, 400, 'balda altillo. rafix y pvc', 12.61, 4),
(29, 500, 'balda altillo. rafix y pvc', 13.31, 4),
(30, 600, 'balda altillo. rafix y pvc', 14.35, 4),
(31, 700, 'balda altillo. rafix y pvc', 16.1, 4),
(32, 800, 'balda altillo. rafix y pvc', 16.1, 4),
(33, 900, 'balda altillo. rafix y pvc', 18.39, 4),
(34, 1000, 'balda altillo. rafix y pvc', 19.32, 4),
(35, 1100, 'balda altillo. rafix y pvc', 20.52, 4),
(36, 1200, 'balda altillo. rafix y pvc', 20.52, 4),
(37, 0, 'costado_int', 32.91, 5),
(38, 0, 'costado_ext', 29.05, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `json`
--

CREATE TABLE `json` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `json` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `json`
--

INSERT INTO `json` (`id`, `json`, `date`) VALUES
(36, '{"data":{"id":36,"name":"aitor batientes","width":"3000","height":"1500","prof":"500","nmods":3,"doors":"5","typedoor":"1","paritypos":"1","handle":3,"tperfil":4,"perfil":"0","marco":162},"modules":[{"double":"0","ddouble":"0","width":600,"height":"1500","ref1":0,"ref2":0},{"double":"0","ddouble":"0","width":1200,"height":"1500","ref1":"8","ref2":0},{"double":"0","ddouble":"0","width":1200,"height":"1500","ref1":0,"ref2":0}],"doors":[{"type":"4","material":[0,0,"22",0]},{"type":"4","material":[0,0,0,"22"]},{"type":"1","material":[0]},{"type":"4","material":[0,0,0,"22"]},{"type":"1","material":[0]}],"accint":[780],"accext":[]}', '2013-03-19 23:06:11'),
(37, '{"data":{"id":37,"name":"","width":"","height":"","prof":"","nmods":"0","doors":"","typedoor":"3","paritypos":0,"handle":"0","tperfil":"0","perfil":"0","marco":"0"},"modules":[],"doors":[],"accint":[],"accext":[]}', '2013-03-19 23:06:23'),
(38, '{"data":{"id":38,"name":"","width":"","height":"","prof":"","nmods":"0","doors":"","typedoor":"3","paritypos":0,"handle":"0","tperfil":"0","perfil":"0","marco":"0"},"modules":[],"doors":[],"accint":[],"accext":[]}', '2013-03-19 23:06:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_acabados_materiales_perfiles`
--

CREATE TABLE `rel_acabados_materiales_perfiles` (
  `material` int(5) NOT NULL,
  `acabado` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_acabados_materiales_perfiles`
--

INSERT INTO `rel_acabados_materiales_perfiles` (`material`, `acabado`) VALUES
(121, 1),
(83, 2),
(112, 3),
(113, 4),
(117, 6),
(126, 7),
(157, 11),
(155, 12),
(156, 12),
(158, 13),
(157, 14),
(155, 15),
(156, 15),
(158, 16),
(164, 11),
(165, 11),
(168, 11),
(169, 11),
(166, 13),
(167, 13),
(164, 14),
(165, 14),
(168, 14),
(169, 14),
(166, 16),
(167, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'password', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `b_mat_puertas`
--
ALTER TABLE `b_mat_puertas`
  ADD CONSTRAINT `b_mat_puertas_ibfk_1` FOREIGN KEY (`type`) REFERENCES `b_cat_mat_puertas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `b_piezas_int`
--
ALTER TABLE `b_piezas_int`
  ADD CONSTRAINT `b_piezas_int_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `b_cat_piezas_int` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
