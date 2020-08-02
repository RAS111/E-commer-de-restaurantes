-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2020 a las 01:04:17
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
(8, 44);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id_detalle_pedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(30, 1, 0, 0, 0, 0, 1, 1, 'probando', 1, 31);

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
(19, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_forma_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Tarjeta'),
(3, 'Trasnferencia Bancaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `imagen` varchar(30) DEFAULT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Coca-Cola', 100, 2),
(2, 'Pepsi', 80, 2),
(3, 'aaa', 1, 2),
(4, 'aba', 1, 1),
(5, 'Coca-Cola', 100, 1),
(6, 'a', 1, 1),
(7, 'a', 1, 2),
(8, 'sprite', 123, 2),
(9, 'hola', 100, 2),
(14, 'Hamburguesa', 100, 5),
(15, 'Ravioles', 150, 1);

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
(2, 1, 8),
(8, 1, 14),
(9, 1, 15);

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
(15, 'Formapagos', 'formapagos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_envio` varchar(20) NOT NULL,
  `id_detalle_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_pedido_estado` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoestado`
--

CREATE TABLE `pedidoestado` (
  `id_pedido_estado` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 'probando');

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
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 3, 2),
(9, 4, 2),
(10, 5, 2),
(11, 8, 1),
(12, 9, 1),
(13, 10, 1),
(22, 1, 7),
(23, 2, 7),
(24, 3, 7),
(25, 8, 8),
(26, 9, 8),
(27, 7, 8),
(28, 11, 1),
(29, 12, 1),
(30, 13, 1),
(31, 14, 1),
(32, 15, 1);

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
(30, 'Carmen', 'Martinez', '', 22233, '2020-06-05', 1, 1),
(31, 'Maria', 'Hernandez', '', 22233, '2020-06-05', 1, 1),
(32, 'Carlos', 'Morinigo', 'Masculino', 33333, '2020-06-06', NULL, 1),
(33, 'Martin', 'Morinigo', 'Masculino', 33333, '2020-06-06', 1, 1),
(34, 'Mariano', 'Fernandez', 'Masculino', 22222, '2020-06-04', 1, 1),
(36, 'Carla', 'Monigico', 'Femenino', 222345, '2020-06-03', 1, 1),
(37, 'Jorge', 'Barrios', '', 12345678, '2020-06-17', 1, 1),
(38, 'Mariano', 'Garcia', '', 123456, '2020-06-17', 1, 1),
(39, 'hola', 'dasdasdas', '', 2147483647, '0000-00-00', 1, 1),
(40, 'Juan', 'Perez', '', 312312312, '0000-00-00', 1, 1),
(41, 'dasdas', 'dasdasdsa', '0', 2147483647, '0000-00-00', 1, 1),
(42, 'dasdas', 'dasdasdas', '', 312321312, '0000-00-00', 1, 1),
(43, 'Juan', 'Carlos', 'M', 22222222, '2020-07-15', 1, 1),
(44, 'Juana', 'Perez', 'M', 33333333, '2020-07-08', 2, 1);

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
(4, '1234', 3, 33);

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
(2, 1, 12, 1, 2),
(3, 1, 1, 1, 3),
(4, 1, 1, 1, 4);

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
(4, 'dasdasdas', '312341212412', 39),
(5, 'hoola', '3123123123123', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id_receta`, `nombre`, `id_menu`) VALUES
(1, 'Hamburguesa', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta_producto`
--

CREATE TABLE `receta_producto` (
  `id_receta_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_receta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta_producto`
--

INSERT INTO `receta_producto` (`id_receta_producto`, `cantidad`, `id_producto`, `id_receta`) VALUES
(1, 10, 2, 1);

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
(2, 'Gaseosas'),
(5, 'Minutas');

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
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `password`, `id_perfil`, `id_persona`) VALUES
(3, 'carmen2', '12345', 1, 31),
(4, 'pepe', '12345', 2, 30),
(5, 'mariano2', '12345', NULL, 38);

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
  ADD KEY `id_item` (`id_item`);

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
  ADD KEY `id_forma_pago` (`id_forma_pago`);

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
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_detalle_pedido` (`id_detalle_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_pedido_estado` (`id_pedido_estado`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `pedidoestado`
--
ALTER TABLE `pedidoestado`
  ADD PRIMARY KEY (`id_pedido_estado`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formapago`
--
ALTER TABLE `formapago`
  MODIFY `id_forma_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `menuestado`
--
ALTER TABLE `menuestado`
  MODIFY `id_menu_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidoestado`
--
ALTER TABLE `pedidoestado`
  MODIFY `id_pedido_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  MODIFY `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `personaestado`
--
ALTER TABLE `personaestado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona_contacto`
--
ALTER TABLE `persona_contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id_receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `receta_producto`
--
ALTER TABLE `receta_producto`
  MODIFY `id_receta_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_forma_pago`) REFERENCES `formapago` (`id_forma_pago`);

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
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_detalle_pedido`) REFERENCES `detallepedido` (`id_detalle_pedido`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  ADD CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`id_pedido_estado`) REFERENCES `pedidoestado` (`id_pedido_estado`),
  ADD CONSTRAINT `pedido_ibfk_5` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`);

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
