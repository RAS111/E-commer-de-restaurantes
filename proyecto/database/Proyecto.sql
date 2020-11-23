-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2020 a las 22:23:32
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `id_barrio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`id_barrio`, `nombre`) VALUES
(1, 'Facundo Quiroga'),
(4, 'Fachini');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_persona`) VALUES
(1, 3),
(2, 4),
(3, 27),
(4, 34),
(5, 37),
(7, 43),
(8, 44),
(9, 58),
(10, 87);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_forma_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `numero`, `descripcion`, `fecha`, `id_proveedor`, `id_forma_pago`) VALUES
(1, 1, 'prueba', '2020-10-25', 3, 2),
(3, 2, 'probando', '2020-10-26', 3, 1),
(4, 3, 'asdd', '2020-10-26', 5, 2),
(5, 5, 'test', '2020-10-27', 3, 3),
(7, 7, 'probando', '2020-10-28', 3, 1),
(8, 8, '', '2020-11-05', 3, 1),
(9, 9, '', '2020-11-05', 3, 2),
(10, 11, '', '2020-11-05', 5, 1),
(11, 12, 'prueba', '2020-11-05', 3, 3),
(12, 13, 'test', '2020-11-05', 3, 1),
(13, 14, 'prueba', '2020-11-14', 3, 1),
(14, 15, 'prueba', '2020-11-16', 3, 1),
(15, 16, 'probando', '2020-11-17', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `id_detalle_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`id_detalle_compra`, `cantidad`, `precio`, `id_compra`, `id_producto`) VALUES
(1, 2, 100, 1, 2),
(6, 1, 80, 3, 2),
(12, 1, 100, 4, 3),
(13, 1, 100, 4, 4),
(14, 1, 120, 4, 6),
(16, 20, 120, 5, 6),
(17, 4, 100, 5, 12),
(19, 1, 80, 7, 2),
(20, 5, 80, 8, 2),
(21, 5, 80, 9, 2),
(25, 1, 80, 10, 2),
(42, 1, 100, 11, 3),
(60, 1, 100, 12, 4),
(61, 1, 80, 12, 2),
(63, 1, 80, 13, 2),
(64, 1, 80, 14, 2),
(71, 1, 80, 15, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id_detalle_pedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`id_detalle_pedido`, `cantidad`, `precio`, `id_item`, `id_pedido`) VALUES
(1, 1, 200, 25, 1),
(2, 11, 120, 20, 17),
(21, 15, 222, 1, 17),
(22, 10, 100, 1, 18),
(23, 1, 100, 1, 19),
(24, 1, 100, 1, 20),
(25, 1, 100, 1, 21),
(26, 1, 100, 1, 22),
(27, 1, 100, 1, 23),
(28, 1, 100, 1, 24),
(29, 1, 100, 1, 25),
(30, 1, 100, 1, 26),
(31, 1, 100, 1, 27),
(32, 2, 80, 2, 28),
(33, 1, 100, 20, 29),
(34, 1, 100, 1, 31),
(35, 1, 100, 1, 30),
(36, 1, 100, 1, 31),
(37, 1, 100, 1, 32),
(38, 1, 100, 1, 33),
(39, 1, 100, 1, 34),
(40, 1, 200, 25, 35),
(41, 1, 150, 15, 36),
(42, 1, 123, 8, 37),
(43, 1, 100, 1, 38),
(44, 1, 80, 2, 39),
(45, 1, 100, 1, 40),
(46, 1, 80, 2, 41),
(47, 2, 80, 2, 42),
(48, 1, 100, 1, 43),
(49, 1, 100, 1, 44),
(50, 1, 100, 1, 45),
(51, 1, 1, 4, 46),
(52, 1, 100, 1, 47),
(53, 1, 100, 1, 48),
(54, 1, 100, 1, 49),
(55, 1, 100, 1, 50),
(56, 1, 100, 5, 16),
(57, 1, 100, 1, 58),
(58, 1, 100, 1, 59),
(59, 2, 80, 2, 59),
(60, 2, 100, 1, 60),
(61, 5, 100, 20, 60),
(62, 1, 150, 15, 60),
(63, 1, 80, 2, 61),
(64, 1, 100, 1, 62),
(65, 1, 80, 2, 62),
(66, 1, 100, 1, 63),
(67, 1, 100, 1, 0),
(68, 1, 100, 1, 0),
(69, 1, 100, 1, 66),
(70, 1, 80, 2, 66),
(71, 1, 80, 2, 0),
(72, 1, 80, 2, 68),
(73, 1, 100, 14, 69),
(74, 1, 100, 4, 69),
(76, 1, 100, 3, 71),
(77, 1, 100, 3, 72),
(78, 1, 100, 3, 73),
(79, 1, 80, 2, 74),
(80, 5, 80, 2, 75),
(81, 2, 100, 4, 76),
(82, 2, 100, 4, 77),
(83, 1, 80, 2, 78),
(86, 1, 80, 2, 79),
(93, 1, 80, 2, 70),
(94, 1, 100, 4, 70),
(95, 2, 150, 34, 80),
(96, 2, 200, 35, 80),
(101, 1, 100, 3, 81),
(105, 1, 100, 4, 82),
(106, 5, 80, 2, 82),
(107, 1, 80, 2, 85);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id_domicilio` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `piso` int(11) DEFAULT NULL,
  `torre` int(11) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  `sector` int(11) DEFAULT NULL,
  `casa` int(11) NOT NULL,
  `manzana` int(11) DEFAULT NULL,
  `calle` varchar(100) NOT NULL,
  `id_barrio` int(11) DEFAULT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`id_domicilio`, `altura`, `piso`, `torre`, `departamento`, `sector`, `casa`, `manzana`, `calle`, `id_barrio`, `id_persona`) VALUES
(16, 1, 0, 0, 0, 0, 0, 0, 'Oliva', 1, 4),
(18, 1, 0, 0, 0, 0, 0, 0, 'hola', 1, 27),
(19, 200, 0, 0, 0, 0, 5, 0, 'corrientes', 1, 3),
(20, 123, 0, 0, 0, 0, 1, 5, 'hola', 1, 5),
(21, 123, 0, 0, 0, 0, 5, 1, 'ahora', 1, 23),
(22, 312312, 0, 0, 0, 0, 34, 1, 'dasdas', 1, 25),
(23, 1, 0, 0, 0, 0, 1, 1, 'dasdas', 4, 26),
(24, 1, 0, 0, 0, 0, 1, 1, 'dasdas', 1, 26),
(25, 1, 0, 0, 0, 0, 1, 1, 'dasdas', 1, 26),
(26, 1, 0, 0, 0, 0, 1, 1, 'dasdas', 1, 26),
(27, 1, 0, 0, 0, 0, 1, 1, 'dasdsa', 1, 28),
(28, 1, 0, 0, 0, 0, 1, 1, 'av. 25 de mayo', 1, 44),
(29, 1, 0, 0, 0, 0, 1, 1, 'prueba', 4, 33),
(30, 1, 0, 0, 0, 0, 1, 1, 'probando', 1, 31),
(31, 678, 0, 0, 0, 0, 35, 5, 'Corrientes', 4, 36),
(32, 123, 1, 1, 1, 1, 1, 1, 'test', 1, 58);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `id_persona`) VALUES
(1, 5),
(12, 23),
(14, 25),
(15, 26),
(16, 28),
(18, 36),
(19, 42),
(20, 57),
(21, 103);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_forma_pago` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_factura_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `fecha`, `numero`, `tipo`, `id_forma_pago`, `id_pedido`, `id_factura_estado`) VALUES
(22, '2020-10-11', 3, 'C', 1, 46, 2),
(23, '2020-10-01', 4, 'A', 1, 71, 2),
(24, '2020-10-01', 5, 'B', 1, 72, 1),
(25, '2020-10-01', 6, 'C', 1, 73, 1),
(26, '2020-10-01', 7, 'A', 1, 74, 1),
(27, '2020-10-01', 8, 'B', 1, 75, 1),
(29, '2020-10-01', 10, 'A', 1, 77, 1),
(47, '2020-10-11', 11, 'C', 1, 78, 1),
(56, '2020-10-23', 13, 'B', 1, 79, 1),
(57, '2020-10-29', 15, 'A', 1, 80, 1),
(58, '2020-10-31', 14, 'A', 1, 1, 1),
(59, '2020-11-06', 18, 'A', 1, 82, 1),
(60, '2020-11-12', 19, 'A', 1, 59, 2),
(61, '2020-11-12', 20, 'A', 1, 45, 2),
(62, '2020-11-12', 21, 'A', 1, 42, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaestado`
--

CREATE TABLE `facturaestado` (
  `id_factura_estado` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturaestado`
--

INSERT INTO `facturaestado` (`id_factura_estado`, `descripcion`) VALUES
(1, 'Finalizado'),
(2, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formapago`
--

CREATE TABLE `formapago` (
  `id_forma_pago` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formapago`
--

INSERT INTO `formapago` (`id_forma_pago`, `descripcion`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de Credito'),
(3, 'Trasnferencia Bancaria'),
(4, 'Tarjeta de Debito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `descripcion`, `id_item`) VALUES
(1, 'test', 1),
(2, '02112020220255_asd.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `id_rubro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id_item`, `nombre`, `precio`, `id_rubro`) VALUES
(1, 'Empanadas', 200, 2),
(2, 'Pepsi', 80, 2),
(3, '7up', 100, 2),
(4, 'Fanta', 100, 2),
(5, 'Coca-Cola', 100, 1),
(8, 'sprite', 123, 2),
(9, 'hola', 100, 2),
(14, 'Hamburguesa', 100, 5),
(15, 'Ravioles', 150, 1),
(17, 'Pan de hamburguesa', 120, 1),
(18, 'Medallon de carne paty', 150, 5),
(19, 'Queso cheddar', 50, 1),
(20, 'Hamburguesa Simple', 110, 1),
(24, 'Queso cheddar', 100, 1),
(25, 'Fideos ', 200, 1),
(26, 'probando', 200, 1),
(27, 'das', 100, 1),
(28, 'asda', 20, 2),
(29, 'dasdas', 10, 1),
(30, 'dasds', 10, 1),
(31, 'test', 500, 1),
(32, 'probando', 150, 1),
(33, 'test', 150, 1),
(34, 'Sprite', 150, 2),
(35, 'Quilmes', 200, 2),
(36, 'Coca cola', 100, 2),
(39, 'Coca cola', 100, 2),
(40, 'Sprite sin azucar', 100, 2),
(41, 'Coca cola sin azucar', 100, 2),
(42, 'test', 110, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_menu_estado` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `id_menu_estado`, `id_item`) VALUES
(1, 1, 1),
(8, 1, 14),
(9, 1, 15),
(11, 1, 20),
(12, 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menuestado`
--

CREATE TABLE `menuestado` (
  `id_menu_estado` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menuestado`
--

INSERT INTO `menuestado` (`id_menu_estado`, `descripcion`) VALUES
(1, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `directorio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES
(1, 'Empleados', 'empleados'),
(2, 'Usuarios', 'usuarios'),
(3, 'Clientes', 'clientes'),
(4, 'Ventas', 'ventas'),
(5, 'Compras', 'compras'),
(6, 'Seguridad', 'seguridad'),
(7, 'Estadisticas', 'estadisticas'),
(8, 'Menus', 'menus'),
(9, 'Productos', 'productos'),
(10, 'Proveedores', 'proveedores'),
(11, 'Perfiles', 'perfiles'),
(12, 'Modulos', 'modulos'),
(13, 'Barrios', 'barrios'),
(14, 'Rubros', 'rubros'),
(15, 'Formapagos', 'formapagos'),
(16, 'Pedidos', 'pedidos'),
(17, 'Notas de Credito', 'notas_de_creditos'),
(18, 'Aumentos', 'aumentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notadecredito`
--

CREATE TABLE `notadecredito` (
  `id_nota_de_credito` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(200) DEFAULT NULL,
  `observacion` varchar(200) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notadecredito`
--

INSERT INTO `notadecredito` (`id_nota_de_credito`, `fecha`, `motivo`, `observacion`, `id_usuario`, `id_factura`) VALUES
(1, '2020-11-02', 'Cambiar producto', 'se le envio un producto equivocado al cliente', 3, 58),
(3, '2020-11-03', 'Corregir datos en la factura', 'test', 3, 57),
(4, '2020-11-03', 'Diferencia del precio real y el importe cobrado', 'probando', 3, 56),
(6, '2020-11-06', 'Se emitio una factura por error', 'probando', 3, 59),
(9, '2020-11-17', 'Se emitio una factura por error', 'test', 3, 62),
(11, '2020-11-17', 'Se emitio una factura por error', 'test', 3, 61),
(12, '2020-11-20', 'Cambio de Producto', 'test', 3, 60),
(17, '2020-11-20', 'Cambio de Producto', 'test', 3, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoestado`
--

CREATE TABLE `pedidoestado` (
  `id_pedido_estado` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidoestado`
--

INSERT INTO `pedidoestado` (`id_pedido_estado`, `descripcion`) VALUES
(1, 'Pendiente'),
(2, 'En Proceso'),
(3, 'Enviado'),
(4, 'Para Facturar'),
(5, 'Finalizado'),
(6, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoss`
--

CREATE TABLE `pedidoss` (
  `id_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_envio` varchar(30) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_pedido_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidoss`
--

INSERT INTO `pedidoss` (`id_pedido`, `fecha`, `tipo_envio`, `id_cliente`, `id_pedido_estado`) VALUES
(1, '2020-09-09', 'Delivery', 1, 5),
(16, '2020-09-01', 'Delivery', 1, 1),
(17, '2020-09-01', 'Delivery', 1, 1),
(18, '2020-09-01', 'Delivery', 1, 1),
(19, '2020-09-01', 'Delivery', 1, 1),
(20, '2020-09-01', 'Delivery', 1, 1),
(21, '2020-09-01', 'Delivery', 1, 1),
(22, '2020-09-01', 'Delivery', 1, 1),
(23, '2020-09-01', 'Delivery', 1, 1),
(24, '2020-09-01', 'Local', 1, 1),
(25, '2020-09-01', 'Local', 1, 1),
(26, '2020-09-01', 'Local', 1, 1),
(27, '2020-09-08', 'Local', 1, 1),
(28, '2020-09-01', 'Local', 1, 1),
(29, '2020-09-01', 'Local', 1, 1),
(30, '2020-09-01', 'Local', 1, 1),
(31, '2020-09-01', 'Local', 1, 1),
(32, '2020-08-31', 'Retiro en local', 7, 1),
(36, '2020-09-01', 'Delivery', 4, 1),
(37, '2020-09-01', 'Delivery', 5, 1),
(38, '2020-09-01', 'Local', 8, 1),
(39, '2020-09-01', 'Local', 8, 1),
(40, '2020-09-01', 'Local', 9, 4),
(41, '2020-09-01', 'Local', 1, 4),
(42, '2020-09-02', 'Delivery', 7, 5),
(43, '2020-09-02', 'Delivery', 7, 1),
(44, '2020-09-02', 'Delivery', 7, 1),
(45, '2020-11-12', 'Retiro en local', 5, 6),
(46, '2020-09-02', 'Delivery', 2, 5),
(47, '2020-09-17', 'Delivery', 2, 1),
(48, '2020-09-03', 'Delivery', 4, 1),
(49, '2020-09-04', 'Delivery', 7, 1),
(50, '2020-09-04', 'Delivery', 7, 1),
(51, '2020-09-03', 'Retiro en local', 4, 1),
(52, '2020-09-03', 'Retiro en local', 4, 1),
(53, '2020-09-03', 'Retiro en local', 4, 1),
(54, '2020-09-02', 'Delivery', 2, 1),
(55, '2020-09-01', 'Delivery', 1, 1),
(56, '2020-09-01', 'Delivery', 1, 1),
(57, '2020-09-02', 'Retiro en local', 8, 1),
(58, '2020-09-02', 'Local', 5, 1),
(59, '2020-11-12', 'Delivery', 5, 6),
(60, '2020-09-29', 'Delivery', 5, 2),
(61, '2020-10-07', 'Retiro en local', 1, 1),
(62, '2020-10-14', 'Delivery', 5, 1),
(63, '2020-10-07', 'Delivery', 1, 1),
(66, '2020-10-15', 'Delivery', 7, 1),
(68, '2020-10-06', 'Retiro en local', 1, 1),
(69, '2020-10-06', 'Local', 1, 1),
(70, '2020-10-06', 'Retiro en local', 1, 3),
(71, '2020-10-01', 'Retiro en local', 1, 6),
(72, '2020-10-12', 'Retiro en local', 2, 5),
(73, '2020-10-12', 'Delivery', 4, 5),
(74, '2020-10-12', 'Local', 5, 5),
(75, '2020-10-12', 'Local', 9, 5),
(76, '2020-10-12', 'Retiro en local', 4, 5),
(77, '2020-10-12', 'Retiro en local', 2, 5),
(78, '2020-10-12', 'Retiro en local', 5, 5),
(79, '2020-10-01', 'Retiro en local', 5, 5),
(80, '2020-10-29', 'Local', 1, 5),
(81, '2020-11-02', 'Delivery', 3, 1),
(82, '2020-11-05', 'Local', 2, 5),
(83, '2020-11-15', 'Local', 1, 1),
(84, '2020-11-15', 'Local', 1, 1),
(85, '2020-11-15', 'Retiro en local', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'VENDEDOR'),
(3, 'COMPRADOR'),
(7, 'TEST'),
(8, 'probando'),
(9, 'test'),
(10, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_modulo`
--

CREATE TABLE `perfil_modulo` (
  `id_perfil_modulo` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_modulo`
--

INSERT INTO `perfil_modulo` (`id_perfil_modulo`, `id_modulo`, `id_perfil`) VALUES
(8, 3, 2),
(9, 4, 2),
(10, 5, 2),
(22, 1, 7),
(23, 2, 7),
(24, 3, 7),
(39, 12, 8),
(40, 13, 8),
(41, 14, 8),
(42, 15, 8),
(43, 5, 3),
(60, 2, 10),
(81, 1, 1),
(82, 2, 1),
(83, 3, 1),
(84, 4, 1),
(85, 5, 1),
(86, 6, 1),
(87, 7, 1),
(88, 8, 1),
(89, 9, 1),
(90, 10, 1),
(91, 11, 1),
(92, 12, 1),
(93, 13, 1),
(94, 14, 1),
(95, 15, 1),
(96, 16, 1),
(97, 17, 1),
(98, 18, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `numero_documento` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `sexo`, `numero_documento`, `fecha_nacimiento`, `id_tipo_documento`, `id_estado`) VALUES
(1, 'Carlos', 'Mendez', 'Masculino', 2132132, '2020-06-01', 1, 1),
(2, 'Mariano', 'Mendez', 'Masculino', 2222, '2020-06-02', 1, 1),
(3, 'Mariano', 'Perez', 'Masculino', 222234, '2020-06-02', 2, 1),
(4, 'Mariano', 'Rodriguez', 'Masculino', 22223, '2020-06-03', 1, 1),
(5, 'Mario', 'Rodriguez', 'Masculino', 222234, '2020-06-03', 1, 1),
(6, 'Moria', 'Casas', 'Femenino', 222234, '2020-06-01', 1, 1),
(7, 'Moria', 'Casas', 'Femenino', 222234, '2020-06-01', 1, 1),
(8, 'Moria', 'Casas', 'Femenino', 222234, '2020-06-01', 1, 1),
(9, 'Moria', 'Casas', 'Femenino', 222234, '2020-06-01', 1, 1),
(10, 'Moria', 'Casas', 'Femenino', 222234, '2020-06-01', 1, 1),
(11, 'Moria', 'Casan', 'Femenino', 22224, '2020-06-02', 1, 1),
(16, 'Moria', 'Casan', 'Femenino', 22224, '2020-06-02', 1, 1),
(17, 'Carla', 'Casan', 'Femenino', 22224, '2020-06-02', 1, 1),
(23, 'Carla', 'Martinez', 'Femenino', 22234, '2020-06-03', 1, 1),
(25, 'Carla', 'Martinez', 'Femenino', 123, '2020-06-03', NULL, 1),
(26, 'Carla', 'Martinez', 'Femenino', 0, '2020-06-03', NULL, 1),
(27, 'Mariano', 'Hermoza', 'Masculino', 22222, '2020-06-04', 1, 1),
(28, 'Carla', 'Perez', 'Femenino', 22234, '2020-06-03', 1, 1),
(30, 'Carmen', 'Martinez', 'Femenino', 22233, '2020-06-05', 1, 1),
(31, 'Maria', 'Hernandez', 'Femenino', 22233, '2020-06-05', 1, 1),
(32, 'Carlos', 'Morinigo', 'Masculino', 33333, '2020-06-06', NULL, 1),
(33, 'Martin', 'Morinigo', 'Masculino', 333335435, '2020-06-06', 1, 1),
(34, 'Mariano', 'Fernandez', 'Masculino', 22222, '2020-06-04', 1, 1),
(36, 'Carla', 'Monigico', 'Femenino', 222345, '2020-06-03', 1, 1),
(37, 'Jorge', 'Barrios', 'Masculino', 12345678, '2020-06-17', 1, 1),
(38, 'Mariano', 'Garcia', '', 123456, '2020-06-17', 1, 1),
(39, 'Hector ', 'PerÃ©z', 'Masculino', 2147483647, '2020-11-11', 1, 1),
(40, 'Juan', 'Perez', 'Masculino', 312312312, '2020-11-23', 1, 1),
(41, 'dasdas', 'dasdasdsa', '0', 2147483647, '0000-00-00', 1, 1),
(42, 'Mariano', 'Cremades', 'Masculino', 312321312, '2020-11-11', 1, 1),
(43, 'Juan', 'Carlos', 'Masculino', 22222222, '2020-07-15', 1, 1),
(44, 'Juana', 'Perez', 'Femenino', 33333333, '2020-07-08', 2, 1),
(45, 'aras', 'sanches', 'F', 15151515, '2019-08-05', 1, 1),
(46, 'dsadasd', 'dasdasdas', 'F', 131312312, '2020-09-17', 1, 1),
(47, 'dasdasdasdsadas', 'dasdasdasdasdasdas', 'F', 2147483647, '2020-09-02', 1, 1),
(48, 'tryetetyeye', 'eqweqweqweqw', 'F', 2147483647, '2020-09-23', 1, 1),
(49, 'popiuouioui', 'utyuytuty', 'F', 443242342, '2020-09-16', 1, 1),
(50, 'hfghfghfghf', 'gfdgdfgdf', 'M', 2147483647, '2020-09-24', 1, 1),
(51, 'cxzczxczx', 'vcbvcbcvb', 'F', 341212412, '2020-09-10', 1, 1),
(52, 'yrtyey', 'rqweqwewq', 'M', 2147483647, '2020-09-30', 2, 1),
(53, 'dasdasdasd', 'dasdasdas', 'F', 2147483647, '2020-09-02', 1, 1),
(54, 'mkow', 'poiytu', 'Otro', 2147483647, '2019-08-05', 2, 1),
(55, 'dasdas', 'dasdasd', 'F', 654645645, '2020-09-16', 1, 1),
(56, 'aaadasdas', 'dasdasdsad', 'F', 2147483647, '2020-08-31', 1, 1),
(57, 'dasdas', 'dasdasdasd', 'Otro', 2147483647, '2020-09-14', 1, 1),
(58, 'Jorge', 'Morales', 'Otro', 89789722, '2020-09-02', 2, 1),
(59, 'dasdasdasd', 'cxvncvn', '', 2147483647, '2020-09-01', 2, 1),
(60, 'kkkkkkkkkkkkkk', 'lllllllllllllll', '', 2147483647, '2020-09-02', 2, 1),
(61, 'uuuuuuuuuuuuuu', 'iiiiiiiiiiiii', '', 2147483647, '2020-09-01', 1, 1),
(62, 'ttttttttttttttttttttttttttttttttt', 'ttyyyyyyyyyyyyyyyyyyyy', '', 2147483647, '2020-09-01', 1, 1),
(63, 'eqweqweqw', 'xzczczx', '', 123455675, '2020-09-22', 1, 1),
(64, 'dasdasdsa', 'dasdasdasd', '', 0, '0000-00-00', 2, 1),
(65, '4tewrterwtew', 'tewrtwertewte', '', 2147483647, '2020-09-02', 2, 1),
(66, 'dasdasdasd', 'xbxcbcx', 'F', 2147483647, '2020-09-09', 1, 1),
(67, 'probando1', 'probando1', 'M', 2147483647, '2020-09-09', 1, 1),
(68, 'prueba', 'prueba', 'F', 2147483647, '2020-09-01', 1, 1),
(69, 'probando12', 'probando12', 'F', 2147483647, '2020-09-01', 1, 1),
(70, 'probando3', 'probando3', 'F', 2147483647, '2020-09-02', 1, 1),
(71, 'probando4', 'probando4', 'F', 2147483647, '2020-09-02', 1, 1),
(72, 'probando5', 'probando5', 'F', 2147483647, '2020-09-01', 1, 1),
(73, 'probando6', 'probando6', 'M', 135496529, '2020-08-31', 1, 1),
(74, 'probando6', 'probando6', 'F', 2147483647, '2020-09-01', 1, 1),
(75, 'probando7', 'probando7', 'F', 2147483647, '2020-09-08', 1, 1),
(76, 'probando8', 'probando8', 'F', 2147483647, '2020-09-01', 1, 1),
(77, 'probando9', 'probando9', 'Otro', 2147483647, '2020-09-01', 1, 1),
(78, 'probandoo', 'probandoo', 'F', 2147483647, '2020-08-31', 1, 1),
(79, 'probandooo', 'probandooo', 'M', 2147483647, '2020-09-07', 1, 1),
(80, 'aaaaa', 'aaaaa', 'F', 0, '2020-09-01', 1, 1),
(81, 'dasdas', 'dasdasdass', '', 2147483647, '2020-09-01', 1, 1),
(82, 'test', 'test', 'M', 2147483647, '0000-00-00', 1, 1),
(83, 'dasdas', 'dasdsadasd', 'F', 1231312312, '0000-00-00', 1, 1),
(84, 'hola', 'hola', 'M', 2147483647, '2020-09-01', 1, 1),
(85, 'hola', 'hola', '', 2147483647, '2020-09-01', 1, 1),
(86, 'Matias', 'Torales', 'Masculino', 2147483647, '2020-09-01', 1, 1),
(87, 'dasdsa', 'dasdasd', 'Femenino', 2147483647, '2020-11-22', 1, 1),
(88, 'dasdas', 'dasdasdas', '', 2147483647, '2020-11-21', 1, 1),
(89, 'dasdas', 'dasdasdas', 'Femenino', 2147483647, '2020-11-21', 1, 1),
(90, 'test', 'test', 'Femenino', 1412412412, '2020-11-22', 1, 1),
(91, 'test', 'test', 'Femenino', 2147483647, '2020-11-22', 1, 1),
(92, 'test', 'test', 'Otro', 2147483647, '2020-11-22', 2, 1),
(93, 'test', 'test', 'Femenino', 2147483647, '2020-11-22', 2, 1),
(94, 'test', 'tet', 'Otro', 2147483647, '2020-11-22', 2, 1),
(95, 'test', 'test', 'Otro', 2147483647, '2020-11-22', 1, 1),
(96, 'test', 'test', 'Otro', 541212421, '2020-11-22', 2, 1),
(97, 'test', 'test', 'Masculino', 513523513, '2020-11-22', 1, 1),
(98, 'test', 'test', 'Masculino', 333335435, '2020-11-22', 1, 1),
(99, 'test', 'test', 'Otro', 2147483647, '2020-11-22', 1, 1),
(100, 'test', 'test', 'Masculino', 2147483647, '2020-11-22', 1, 1),
(101, 'dasdas', 'dasdasd', 'Femenino', 2147483647, '2020-11-24', 1, 1),
(102, 'jorge', 'mendez', 'Femenino', 2147483647, '2020-11-23', 1, 1),
(103, 'dasdsa', 'dasdsa', 'Femenino', 312312312, '2020-11-23', 1, 1),
(104, 'dasdas', 'dasdasdsad', 'Masculino', 412412412, '2020-11-23', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaestado`
--

CREATE TABLE `personaestado` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personaestado`
--

INSERT INTO `personaestado` (`id_estado`, `descripcion`) VALUES
(1, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_contacto`
--

CREATE TABLE `persona_contacto` (
  `id_contacto` int(11) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `id_tipo_contacto` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_contacto`
--

INSERT INTO `persona_contacto` (`id_contacto`, `valor`, `id_tipo_contacto`, `id_persona`) VALUES
(1, '123321654', 1, 3),
(3, '123', 1, 31),
(4, '1234', 3, 33),
(5, '15165165165', 1, 5),
(7, '1231321', 3, 31),
(8, '2132132', 3, 5),
(9, 'mario@mario.com', 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `stock_actual` int(11) NOT NULL,
  `stock_maximo` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `stock_minimo`, `stock_actual`, `stock_maximo`, `id_item`) VALUES
(2, 1, 45, 1, 2),
(3, 10, 14, 1, 3),
(4, 10, 30, 100, 4),
(6, 1, 10, 100, 17),
(7, 1, 10, 1000, 18),
(12, 1, 10, 100, 24),
(19, 10, 50, 100, 32),
(20, 10, 50, 100, 33),
(21, 10, 48, 100, 34),
(22, 10, 48, 100, 35),
(24, 10, 55, 100, 39),
(25, 10, 50, 100, 40),
(26, 10, 55, 100, 41),
(27, 10, 50, 100, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `cuil` varchar(20) DEFAULT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `razon_social`, `cuil`, `id_persona`) VALUES
(3, 'Coca-Cola', '11111111111', 33),
(4, 'Quilmes', '312341212412', 39),
(5, 'hoola', '3123123123123', 40),
(6, 'asdasd', '4124124124242', 104);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id_receta`, `id_menu`) VALUES
(1, 1),
(18, 1),
(15, 8),
(16, 8),
(17, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_producto`
--

CREATE TABLE `receta_producto` (
  `id_receta_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_receta` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta_producto`
--

INSERT INTO `receta_producto` (`id_receta_producto`, `cantidad`, `id_producto`, `id_receta`, `id_menu`) VALUES
(2, 10, 2, 1, NULL),
(7, 12, 2, 16, NULL),
(9, 12, 4, 16, NULL),
(10, 12, 3, 17, NULL),
(11, 234, 3, NULL, NULL),
(12, 234, 3, NULL, NULL),
(13, 234, 3, NULL, NULL),
(14, 234, 3, NULL, NULL),
(17, 3, 2, NULL, 1),
(19, 1, 6, NULL, 11),
(22, 1, 4, NULL, 9),
(23, 2, 2, NULL, 8),
(24, 100, 20, NULL, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `id_rubro` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`id_rubro`, `nombre`) VALUES
(1, 'Pastas'),
(2, 'Bebidas'),
(5, 'Minutas'),
(6, 'Verduleria'),
(7, 'Fiambres y Quesos'),
(8, 'Test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontacto`
--

CREATE TABLE `tipocontacto` (
  `id_tipo_contacto` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipocontacto`
--

INSERT INTO `tipocontacto` (`id_tipo_contacto`, `descripcion`) VALUES
(1, 'Celular'),
(2, 'Email'),
(3, 'Telefono fijo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `id_tipo_documento` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`id_tipo_documento`, `descripcion`) VALUES
(1, 'DNI'),
(2, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_persona` int(11) NOT NULL,
  `imagen_perfil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `password`, `id_perfil`, `id_persona`, `imagen_perfil`) VALUES
(3, 'carmen2', '12345', 1, 31, '15092020194333_descarga3.jpg'),
(4, 'pepe', '12345', 2, 30, '15092020194005_sin_foto.jpg'),
(43, 'test', '12345', 7, 86, '11112020055717_'),
(57, 'dasdsad', '412412', 10, 101, '23112020070105_'),
(58, 'dasd', 'dsadasda', 10, 102, '23112020070603_');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`id_barrio`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_forma_pago` (`id_forma_pago`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`id_detalle_compra`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id_detalle_pedido`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id_domicilio`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_barrio` (`id_barrio`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_forma_pago` (`id_forma_pago`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_factura_estado` (`id_factura_estado`);

--
-- Indices de la tabla `facturaestado`
--
ALTER TABLE `facturaestado`
  ADD PRIMARY KEY (`id_factura_estado`);

--
-- Indices de la tabla `formapago`
--
ALTER TABLE `formapago`
  ADD PRIMARY KEY (`id_forma_pago`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_item` (`id_item`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_rubro` (`id_rubro`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_menu_estado` (`id_menu_estado`),
  ADD KEY `id_item` (`id_item`);

--
-- Indices de la tabla `menuestado`
--
ALTER TABLE `menuestado`
  ADD PRIMARY KEY (`id_menu_estado`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `notadecredito`
--
ALTER TABLE `notadecredito`
  ADD PRIMARY KEY (`id_nota_de_credito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `pedidoestado`
--
ALTER TABLE `pedidoestado`
  ADD PRIMARY KEY (`id_pedido_estado`);

--
-- Indices de la tabla `pedidoss`
--
ALTER TABLE `pedidoss`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_pedido_estado` (`id_pedido_estado`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  ADD PRIMARY KEY (`id_perfil_modulo`),
  ADD KEY `id_modulo` (`id_modulo`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_tipo_documento` (`id_tipo_documento`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `personaestado`
--
ALTER TABLE `personaestado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `persona_contacto`
--
ALTER TABLE `persona_contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `id_tipo_contacto` (`id_tipo_contacto`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_item` (`id_item`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indices de la tabla `receta_producto`
--
ALTER TABLE `receta_producto`
  ADD PRIMARY KEY (`id_receta_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_receta` (`id_receta`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`id_rubro`);

--
-- Indices de la tabla `tipocontacto`
--
ALTER TABLE `tipocontacto`
  ADD PRIMARY KEY (`id_tipo_contacto`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `facturaestado`
--
ALTER TABLE `facturaestado`
  MODIFY `id_factura_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formapago`
--
ALTER TABLE `formapago`
  MODIFY `id_forma_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `menuestado`
--
ALTER TABLE `menuestado`
  MODIFY `id_menu_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `notadecredito`
--
ALTER TABLE `notadecredito`
  MODIFY `id_nota_de_credito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pedidoestado`
--
ALTER TABLE `pedidoestado`
  MODIFY `id_pedido_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedidoss`
--
ALTER TABLE `pedidoss`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  MODIFY `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `personaestado`
--
ALTER TABLE `personaestado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona_contacto`
--
ALTER TABLE `persona_contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id_receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `receta_producto`
--
ALTER TABLE `receta_producto`
  MODIFY `id_receta_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipocontacto`
--
ALTER TABLE `tipocontacto`
  MODIFY `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`id_forma_pago`) REFERENCES `formapago` (`id_forma_pago`);

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`),
  ADD CONSTRAINT `detallecompra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`id_barrio`) REFERENCES `barrio` (`id_barrio`),
  ADD CONSTRAINT `domicilio_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_forma_pago`) REFERENCES `formapago` (`id_forma_pago`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidoss` (`id_pedido`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`id_factura_estado`) REFERENCES `facturaestado` (`id_factura_estado`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_rubro`) REFERENCES `rubro` (`id_rubro`);

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_menu_estado`) REFERENCES `menuestado` (`id_menu_estado`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Filtros para la tabla `notadecredito`
--
ALTER TABLE `notadecredito`
  ADD CONSTRAINT `notadecredito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `notadecredito_ibfk_2` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`);

--
-- Filtros para la tabla `pedidoss`
--
ALTER TABLE `pedidoss`
  ADD CONSTRAINT `pedidoss_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `pedidoss_ibfk_3` FOREIGN KEY (`id_pedido_estado`) REFERENCES `pedidoestado` (`id_pedido_estado`);

--
-- Filtros para la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  ADD CONSTRAINT `perfil_modulo_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`),
  ADD CONSTRAINT `perfil_modulo_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipodocumento` (`id_tipo_documento`),
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `personaestado` (`id_estado`);

--
-- Filtros para la tabla `persona_contacto`
--
ALTER TABLE `persona_contacto`
  ADD CONSTRAINT `persona_contacto_ibfk_1` FOREIGN KEY (`id_tipo_contacto`) REFERENCES `tipocontacto` (`id_tipo_contacto`),
  ADD CONSTRAINT `persona_contacto_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Filtros para la tabla `receta_producto`
--
ALTER TABLE `receta_producto`
  ADD CONSTRAINT `receta_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `receta_producto_ibfk_2` FOREIGN KEY (`id_receta`) REFERENCES `receta` (`id_receta`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
