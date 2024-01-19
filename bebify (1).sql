-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2024 a las 16:56:50
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bebify`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE PROCEDURE `agregarCarrito` (IN `idc` INT, IN `idp` INT, IN `cantidad` INT)  NO SQL
BEGIN
    DECLARE existing_record_count INT;

    -- Verificar si ya existe un registro con la combinación de IdCliente e IdProducto
    SELECT COUNT(*) INTO existing_record_count
    FROM carritos
    WHERE IdCliente = idc AND IdProducto = idp;

    -- Si existe, actualizar la cantidad; de lo contrario, insertar un nuevo registro
    IF existing_record_count > 0 THEN
        UPDATE carritos
        SET Cantidad = Cantidad + cantidad
        WHERE IdCliente = idc AND IdProducto = idp;
    ELSE
        INSERT INTO carritos (IdCliente, IdProducto, Cantidad, Estatus)
        VALUES (idc, idp, cantidad, 1);
    END IF;
END$$

CREATE PROCEDURE `banner` ()  NO SQL
SELECT * FROM banner b WHERE b.Estatus=true and  b.IdBanner=1$$

CREATE PROCEDURE `busqueda` (IN `idcat` INT, IN `marca` VARCHAR(50), IN `producto` VARCHAR(100), IN `limite` INT, IN `pmin` INT, IN `pmax` INT, IN `idm` INT)  NO SQL
SELECT * 
FROM productos p 
WHERE p.Estatus = 1 
  AND p.Marca LIKE CONCAT('%', marca, '%') 
  AND p.Nombre LIKE CONCAT('%', producto, '%') 
LIMIT limite$$

CREATE PROCEDURE `BusquedaAvanzada` (IN `idcat` INT, IN `marca` VARCHAR(255), IN `producto` VARCHAR(255), IN `idm` INT, IN `pmin` DECIMAL(10,2), IN `pmax` DECIMAL(10,2), IN `limite` INT)  BEGIN
    IF idm IS NULL THEN
        -- Caso cuando idm es NULL
        SELECT 
            p.IdProducto,
            p.SKU,
            p.Marca,
            p.Nombre,
            p.Imagen,
            p.Descripcion,
            p.Estatus,
            p.IdSubcategoria,
            p.EsPaquete,
            p.PiezasPaquete,
            NULL as Precio 
        FROM productos p 
        INNER JOIN subcategorias s ON s.IdSubCategoria = p.IdSubcategoria 
        INNER JOIN categoria c ON c.IdCategoria = s.IdCategoria 
        WHERE 
            (p.Estatus = 1 OR p.Estatus = 2) AND
            (c.IdCategoria LIKE idcat OR idcat IS NULL) AND
            (p.Marca LIKE CONCAT('%', marca, '%') OR marca IS NULL) AND
            (p.Nombre LIKE CONCAT('%', producto, '%') OR producto IS NULL)
        LIMIT limite;
    ELSE
        -- Caso cuando idm no es NULL
        SELECT 
            p.IdProducto,
            p.SKU,
            p.Marca,
            p.Nombre,
            p.Imagen,
            p.Descripcion,
            p.Estatus,
            p.IdSubcategoria,
            p.EsPaquete,
            p.PiezasPaquete,
            pp.Precio 
        FROM productos p 
        INNER JOIN precioproductomembresia pp ON pp.IdProducto = p.IdProducto
        INNER JOIN subcategorias s ON s.IdSubCategoria = p.IdSubcategoria 
        INNER JOIN categoria c ON c.IdCategoria = s.IdCategoria 
        WHERE 
            (p.Estatus = 1 OR p.Estatus = 2) AND
            (pp.Precio BETWEEN pmin AND pmax OR pmin IS NULL OR pmax IS NULL) AND
            (c.IdCategoria LIKE idcat OR idcat IS NULL) AND
            (p.Marca LIKE CONCAT('%', marca, '%') OR marca IS NULL) AND
            (p.Nombre LIKE CONCAT('%', producto, '%') OR producto IS NULL) AND
            (pp.IdMembresia = idm)
        LIMIT limite;
    END IF;
END$$

CREATE PROCEDURE `categorias` ()  NO SQL
SELECT * from categoria c WHERE c.Estatus=true$$

CREATE PROCEDURE `giros` ()  NO SQL
select * from giroempresa where Estatus=true$$

CREATE PROCEDURE `login` (IN `correo` VARCHAR(150))  READS SQL DATA
SELECT u.IdUsuario,u.Contrasena,r.IdRol,e.TipoCosto from usuarios u inner join rolusuario r on u.IdRol=r.IdRol inner join personas p on p.IdPersona=u.IdPersona inner join empresas e on p.IdEmpresa=e.IdEmpresa  WHERE u.Correo=correo$$

CREATE PROCEDURE `precioProducto` (IN `membresia` INT, IN `pro` INT)  NO SQL
select pm.Precio from precioproductomembresia pm WHERE pm.IdMembresia=membresia and pm.IdProducto=pro$$

CREATE PROCEDURE `productoid` (IN `idp` INT, IN `idm` INT)  NO SQL
select p.IdProducto,p.SKU,p.Marca,p.Nombre,p.Imagen,p.Descripcion,p.Estatus,p.IdSubcategoria,p.EsPaquete,p.PiezasPaquete,c.Categoria,s.SubCategoria,pm.Precio from productos p INNER JOIN subcategorias s on s.IdCategoria=p.IdSubcategoria INNER JOIN categoria c on s.IdCategoria=c.IdCategoria inner join precioproductomembresia pm on p.IdProducto=pm.IdProducto WHERE p.Estatus=true and p.IdProducto=idp and c.Estatus=true and s.Estatus=true and pm.IdMembresia=idm$$

CREATE PROCEDURE `productosmasvendidos` (IN `p_idmembresia` INT)  BEGIN
    IF p_idmembresia IS NOT NULL THEN
        -- If idmembresia is provided, include pricing information
        SELECT
            p.IdProducto, p.SKU, p.Marca, p.Nombre, p.Imagen, p.Descripcion,
            p.Estatus, p.IdSubcategoria, p.EsPaquete, p.PiezasPaquete,
            c.Categoria, s.SubCategoria, pm.Precio
        FROM
            productos p
            INNER JOIN subcategorias s ON s.IdSubCategoria = p.IdSubcategoria
            INNER JOIN categoria c ON s.IdCategoria = c.IdCategoria
            INNER JOIN precioproductomembresia pm ON p.IdProducto = pm.IdProducto
        WHERE
            p.Estatus = true AND pm.IdMembresia = p_idmembresia
        LIMIT 6;
    ELSE
        -- If idmembresia is not provided, exclude pricing information
        SELECT
            p.IdProducto, p.SKU, p.Marca, p.Nombre, p.Imagen, p.Descripcion,
            p.Estatus, p.IdSubcategoria, p.EsPaquete, p.PiezasPaquete,
            c.Categoria, s.SubCategoria,null as Precio
        FROM
            productos p
            INNER JOIN subcategorias s ON s.IdSubCategoria = p.IdSubcategoria
            INNER JOIN categoria c ON s.IdCategoria = c.IdCategoria
        WHERE
            p.Estatus = true
        LIMIT 6;
    END IF;
END$$

CREATE PROCEDURE `rangoPrecios` (IN `idmembresia` INT)  NO SQL
SELECT MIN(pm.Precio)as min_price,MAX(pm.Precio)as max_price FROM productos p INNER JOIN precioproductomembresia pm on p.IdProducto=pm.IdProducto WHERE p.Estatus=1 and pm.IdMembresia=idmembresia$$

CREATE PROCEDURE `registro` (IN `nombre1` VARCHAR(255), IN `nombre2` VARCHAR(255), IN `tel1` VARCHAR(20), IN `tel2` VARCHAR(20), IN `dir1` VARCHAR(255), IN `dir2` VARCHAR(255), IN `com1` TEXT, IN `com2` TEXT, IN `archivoCSF` VARCHAR(255), IN `credito` INT, IN `giro` INT, IN `sucursales` INT, IN `ticket` INT, IN `mesas` INT, IN `empleados` INT, IN `nombre` VARCHAR(255), IN `apellidos` VARCHAR(255), IN `telefono` VARCHAR(20), IN `correo` VARCHAR(255), IN `contrasena` VARCHAR(255))  BEGIN
    DECLARE referencias_id INT;
    DECLARE creditoempresa_id INT;
    DECLARE empresas_id INT;
    DECLARE personas_id INT;
    DECLARE facturacion_id INT;

    -- Insertar en referenciasempresas
    INSERT INTO `referenciasempresas` 
    (`IdReferencia`, `nombreRef1`, `nombreRef2`, `telefonoRef1`, `telefonoRef2`, `direccionRef1`,
     `direccionRef2`, `comentarioRef1`, `comentarioRef2`) 
    VALUES 
     (NULL, nombre1, nombre2, tel1, tel2, dir1, dir2, com1, com2);

    SET referencias_id = LAST_INSERT_ID();
    
    INSERT INTO `facturacionempresas` (`IdFacturacion`, `RFC`, `CodigoPostal`, `Regimen`, `Calle`, `NumeroInterior`, `NumeroExterior`, `Colonia`, `Localidad`, `Municipio`, `Estado`, `UsoCFDI`, `Id_Facturama`, `ArchivoCSF`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, archivoCSF);
    
    SET facturacion_id = LAST_INSERT_ID();

    -- Insertar en creditoempresa
    INSERT INTO `creditoempresa` (`IdCreditoEmpresa`, `DiasCredito`, `MontoCredito`, `MontoAdeudado`, `Estatus`) 
    VALUES 
     (NULL, 7, credito, '0', false);

    SET creditoempresa_id = LAST_INSERT_ID();

    -- Insertar en empresas
    INSERT INTO `empresas` 
    (`IdEmpresa`, `IdGiroEmpresa`, `TipoCosto`, `NoSucursales`, `TicketPromedio`, `NumeroMesas`, `NumeroEmpleados`,
     `Nombre`, `IdCreditoEmpresa`, `IdFacturacion`, `IdReferencia`) 
    VALUES 
     (NULL, giro, NULL, sucursales, ticket, mesas, empleados, nombre, creditoempresa_id, facturacion_id, referencias_id);

    SET empresas_id = LAST_INSERT_ID();

    -- Insertar en personas
    INSERT INTO `personas` 
    (`IdPersona`, `Nombre`, `Apellidos`, `Telefono`, `IdEmpresa`) 
    VALUES 
    (NULL, nombre, apellidos, telefono, empresas_id);

    SET personas_id = LAST_INSERT_ID();

    -- Insertar en usuarios
    INSERT INTO `usuarios` 
    (`IdUsuario`, `Correo`, `Contrasena`, `FechaRegistro`, `IdRol`, `Estatus`, `IdPersona`)
     VALUES 
    (NULL, correo, contrasena, CURDATE(), 3, 1, personas_id);

END$$

CREATE PROCEDURE `sesiones` (IN `idu` INT)  NO SQL
SELECT u.IdRol,u.IdUsuario,p.Nombre,p.Apellidos,e.TipoCosto,c.Estatus as EstatusCredito, u.Correo FROM usuarios u INNER JOIN personas p on u.IdPersona=p.IdPersona INNER JOIN empresas e on e.IdEmpresa=p.IdEmpresa INNER join creditoempresa c on c.IdCreditoEmpresa = e.IdCreditoEmpresa WHERE u.IdUsuario=idu$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `IdAlmacen` int(11) NOT NULL,
  `Almacen` int(50) NOT NULL,
  `Direccion` int(50) NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `IdBanner` int(11) NOT NULL,
  `Banner` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Url` longtext COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`IdBanner`, `Banner`, `Url`, `Estatus`) VALUES
(1, 'OFERTA DEL MES - 65% en tu primer compra', 'http://localhost/be/buscador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `IdCarrito` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`IdCarrito`, `IdCliente`, `IdProducto`, `Cantidad`, `Estatus`) VALUES
(14, 32, 1, 3, 1),
(15, 32, 2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `Categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `Categoria`, `Estatus`) VALUES
(1, 'Aguas', 1),
(2, 'Cervezas', 1),
(3, 'Destilados', 0),
(4, 'Refrescos', 1),
(5, 'Vinos', 1),
(6, 'Otras Bebidas', 1),
(7, 'Otros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprasproductos`
--

CREATE TABLE `comprasproductos` (
  `IdCompraProducto` int(11) NOT NULL,
  `Fecha` date DEFAULT curdate(),
  `Folio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `IdAlmacen` int(11) NOT NULL,
  `IdProveedor` int(11) NOT NULL,
  `MontoCompra` decimal(10,0) NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costosenvio`
--

CREATE TABLE `costosenvio` (
  `IdCostoEnvio` int(11) NOT NULL,
  `Desde` double NOT NULL,
  `Hasta` double NOT NULL,
  `Precio` double NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `costosenvio`
--

INSERT INTO `costosenvio` (`IdCostoEnvio`, `Desde`, `Hasta`, `Precio`, `Estatus`) VALUES
(1, 0, 1000, 150, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditoempresa`
--

CREATE TABLE `creditoempresa` (
  `IdCreditoEmpresa` int(11) NOT NULL,
  `DiasCredito` int(11) NOT NULL DEFAULT 7,
  `MontoCredito` double NOT NULL,
  `MontoAdeudado` double NOT NULL DEFAULT 0,
  `Estatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `creditoempresa`
--

INSERT INTO `creditoempresa` (`IdCreditoEmpresa`, `DiasCredito`, `MontoCredito`, `MontoAdeudado`, `Estatus`) VALUES
(1, 7, 1000000, 0, 0),
(2, 7, 1000000, 0, 0),
(3, 7, 1000000, 0, 0),
(4, 7, 9, 0, 0),
(5, 7, 9, 0, 0),
(6, 7, 9, 0, 0),
(7, 7, 15000, 0, 0),
(8, 7, 18500, 0, 0),
(9, 7, 16000, 0, 0),
(10, 7, 15500, 0, 0),
(11, 7, 14500, 0, 0),
(12, 7, 14500, 0, 0),
(13, 7, 18000, 0, 0),
(14, 7, 18000, 0, 0),
(15, 7, 18000, 0, 0),
(16, 7, 15500, 0, 0),
(17, 7, 15500, 0, 0),
(18, 7, 13000, 0, 0),
(19, 7, 13000, 0, 0),
(20, 7, 14500, 0, 0),
(21, 7, 14500, 0, 0),
(22, 7, 14000, 0, 0),
(23, 7, 14000, 0, 0),
(24, 7, 17500, 0, 0),
(25, 7, 500, 0, 0),
(26, 7, 500, 0, 0),
(27, 7, 500, 0, 0),
(28, 7, 500, 0, 0),
(29, 7, 5000, 0, 1),
(30, 7, 11500, 0, 0),
(31, 7, 11500, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `IdDescuento` int(11) NOT NULL,
  `Codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `Monto` decimal(10,0) NOT NULL,
  `FechaCanje` date NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `Disponibles` int(11) NOT NULL,
  `Usados` int(11) NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `IdEmpresa` int(11) NOT NULL,
  `IdGiroEmpresa` int(11) NOT NULL,
  `TipoCosto` int(1) DEFAULT NULL,
  `NoSucursales` int(11) NOT NULL,
  `TicketPromedio` int(11) NOT NULL,
  `NumeroMesas` int(11) NOT NULL,
  `NumeroEmpleados` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `IdCreditoEmpresa` int(11) NOT NULL,
  `IdFacturacion` int(11) NOT NULL,
  `IdReferencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`IdEmpresa`, `IdGiroEmpresa`, `TipoCosto`, `NoSucursales`, `TicketPromedio`, `NumeroMesas`, `NumeroEmpleados`, `Nombre`, `IdCreditoEmpresa`, `IdFacturacion`, `IdReferencia`) VALUES
(1, 5, 3, 1, 2, 3, 4, 'administradorr', 1, 1, 1),
(7, 1, NULL, 2, 77777, 3, 4, 'JJ', 10, 6, 16),
(8, 1, NULL, 2, 77777, 3, 4, 'JJ', 11, 7, 17),
(9, 1, NULL, 2, 77777, 3, 4, 'JJ', 12, 8, 18),
(10, 1, NULL, 2, 77777, 3, 4, 'JJ', 13, 9, 19),
(11, 1, NULL, 2, 77777, 3, 4, 'JJ', 14, 10, 20),
(12, 1, NULL, 2, 77777, 3, 4, 'JJ', 15, 11, 21),
(13, 1, NULL, 1, 2000, 2, 4, 'JESUS ALEXIS PARRA SANTIAGO', 16, 12, 22),
(14, 1, NULL, 1, 2000, 2, 4, 'JESUS ALEXIS PARRA SANTIAGO', 17, 13, 23),
(15, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 18, 14, 24),
(16, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 19, 15, 25),
(17, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 20, 16, 26),
(18, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 21, 17, 27),
(19, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 22, 18, 28),
(20, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 23, 19, 29),
(21, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 24, 20, 30),
(22, 1, NULL, 1, 2000, 1, 2, 'CRESENCIA PORTILLA SANCHEZ', 25, 21, 31),
(23, 1, NULL, 1, 2000, 1, 2, 'CRESENCIA PORTILLA SANCHEZ', 26, 22, 32),
(24, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 27, 23, 33),
(25, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 28, 24, 34),
(26, 1, 1, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 29, 25, 35),
(27, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 30, 26, 36),
(28, 1, NULL, 1, 2000, 1, 2, 'JESUS ALEXIS PARRA SANTIAGO', 31, 27, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacionempresas`
--

CREATE TABLE `facturacionempresas` (
  `IdFacturacion` int(11) NOT NULL,
  `RFC` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CodigoPostal` int(10) DEFAULT NULL,
  `Regimen` int(3) DEFAULT NULL,
  `Calle` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NumeroInterior` int(11) DEFAULT NULL,
  `NumeroExterior` int(11) DEFAULT NULL,
  `Colonia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Localidad` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Municipio` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `UsoCFDI` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Id_Facturama` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ArchivoCSF` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facturacionempresas`
--

INSERT INTO `facturacionempresas` (`IdFacturacion`, `RFC`, `CodigoPostal`, `Regimen`, `Calle`, `NumeroInterior`, `NumeroExterior`, `Colonia`, `Localidad`, `Municipio`, `Estado`, `UsoCFDI`, `Id_Facturama`, `ArchivoCSF`) VALUES
(1, 'rfc', 0, 0, 'calle', 0, 0, 'colonia', 'localidad', 'municipio', 'estado', '01', 'facturama', 'csf'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ejemplo'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/384139mapa mental cannabis.pdf'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/148381acuse_jesus alexis parra santiago.pdf'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/224877acuse_jesus alexis parra santiago.pdf'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/224906cuadro (4) (2).pdf'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/413763acuse_jesus alexis parra santiago.pdf'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/734772acuse_jesus alexis parra santiago.pdf'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/459886acuse_jesus alexis parra santiago.pdf'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/646376acuse_jesus alexis parra santiago.pdf'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/71338acuse_jesus alexis parra santiago.pdf'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/237853apd5_install_en_revg.pdf'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/979136apd5_install_en_revg.pdf'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/355987apd5_install_en_revg.pdf'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/385138apd5_install_en_revg.pdf'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/221907apd5_install_en_revg.pdf'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/270316apd5_install_en_revg.pdf'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/456805apd5_install_en_revg.pdf'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/919006apd5_install_en_revg.pdf'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/92733apd5_install_en_revg.pdf'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/43365apd5_install_en_revg.pdf'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/589160apd5_install_en_revg.pdf'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/665404apd5_install_en_revg.pdf'),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/672148apd5_install_en_revg.pdf'),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/835874apd5_install_en_revg.pdf'),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/132595apd5_install_en_revg.pdf'),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'plataforma/documentos/csf/27239apd5_install_en_revg.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `IdFactura` int(11) NOT NULL,
  `ArchivoXML` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ArchivoPDF` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `UIDFactura` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firmaspedidos`
--

CREATE TABLE `firmaspedidos` (
  `IdFirma` int(11) NOT NULL,
  `IdPedido` int(11) NOT NULL,
  `Firma` longtext COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giroempresa`
--

CREATE TABLE `giroempresa` (
  `IdGiroEmpresa` int(11) NOT NULL,
  `Giro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `giroempresa`
--

INSERT INTO `giroempresa` (`IdGiroEmpresa`, `Giro`, `Estatus`) VALUES
(1, 'Bar', 1),
(2, 'Hotel', 1),
(3, 'Cafeteria', 1),
(4, 'Restaurante', 1),
(5, 'Otros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresias`
--

CREATE TABLE `membresias` (
  `IdMembresia` int(11) NOT NULL,
  `Membresia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `membresias`
--

INSERT INTO `membresias` (`IdMembresia`, `Membresia`, `Estatus`) VALUES
(1, 'Oro', 1),
(2, 'Premium', 1),
(3, 'Platino', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `IdPago` int(11) NOT NULL,
  `FechaAutorizado` date NOT NULL,
  `FechaPago` date DEFAULT curdate(),
  `Estatus` int(1) NOT NULL DEFAULT 0,
  `IdFactura` int(11) NOT NULL,
  `ArchivoPago` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `IdPedido` int(11) NOT NULL,
  `Fecha` date DEFAULT curdate(),
  `Folio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdSucursal` int(11) NOT NULL,
  `Total` decimal(10,0) NOT NULL,
  `Comentarios` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `CostoEnvio` decimal(10,0) NOT NULL,
  `Descuento` decimal(10,0) NOT NULL,
  `FechaAutorizado` date NOT NULL,
  `FechaEntegado` date NOT NULL,
  `IdPago` int(11) NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `IdPersona` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `IdEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`IdPersona`, `Nombre`, `Apellidos`, `Telefono`, `IdEmpresa`) VALUES
(1, 'Persona', 'Apellidos', '0', 1),
(8, 'JJ', 'PARRA SANTIAGO', '2322150309', 7),
(9, 'JJ', 'PARRA SANTIAGO', '2322150309', 8),
(10, 'JJ', 'PARRA SANTIAGO', '2322150309', 9),
(11, 'JJ', 'PARRA SANTIAGO', '2322150309', 10),
(12, 'JJ', 'PARRA SANTIAGO', '2322150309', 11),
(16, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322150309', 15),
(17, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322150309', 16),
(18, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322150309', 17),
(19, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322150309', 18),
(20, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322150309', 19),
(21, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322150309', 20),
(22, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322150309', 21),
(23, 'CRESENCIA PORTILLA SANCHEZ', 'PARRA SANTIAGO', '2322102116', 22),
(24, 'CRESENCIA PORTILLA SANCHEZ', 'PARRA SANTIAGO', '2322102116', 23),
(25, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322102116', 24),
(26, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322102116', 25),
(27, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322102116', 26),
(28, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322102116', 27),
(29, 'JESUS ALEXIS PARRA SANTIAGO', 'PARRA SANTIAGO', '2322102116', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precioproductomembresia`
--

CREATE TABLE `precioproductomembresia` (
  `IdPrecioProducto` int(11) NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdMembresia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `precioproductomembresia`
--

INSERT INTO `precioproductomembresia` (`IdPrecioProducto`, `Precio`, `IdProducto`, `IdMembresia`) VALUES
(1, '250', 1, 1),
(3, '350', 1, 3),
(5, '20', 1, 2),
(6, '12', 2, 1),
(7, '122', 2, 2),
(8, '250', 3, 1),
(9, '22', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `SKU` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(11) NOT NULL,
  `IdSubcategoria` int(11) NOT NULL,
  `EsPaquete` tinyint(1) NOT NULL,
  `PiezasPaquete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `SKU`, `Marca`, `Nombre`, `Imagen`, `Descripcion`, `Estatus`, `IdSubcategoria`, `EsPaquete`, `PiezasPaquete`) VALUES
(1, '193178', 'Peñafiel', 'AGUA MINERAL PEÑAFIEL 600 ML.', 'documentos/productos/193178.jpg', 'AGUA MINERAL PEÑAFIEL 600 ML.', 1, 1, 0, 0),
(2, '8988', 'Topochico', 'Agua mineral Topo Chico 600 ml', 'documentos/productos/topo.png', 'Agua mineral Topo Chico 600 ml', 1, 1, 0, 0),
(3, '89899', 'Ciel', 'Agua mineral ciel', 'documentos/productos/ciel.jpg', 'Agua minearl ciel', 1, 1, 0, 0),
(4, 'iu8778', 'Tehuacan', 'Agua Mineral Tehuacan Brillante 600ml\r\n', 'documentos/productos/th.jpg', 'Agua Mineral Tehuacan Brillante 600ml\r\n', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoscomprados`
--

CREATE TABLE `productoscomprados` (
  `IdProductosComprados` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Costo` decimal(10,0) NOT NULL,
  `Estatus` int(1) NOT NULL,
  `IdCompraProducto` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `IdProveedor` int(11) NOT NULL,
  `Proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `RazonSocial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Encargado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `CondicionesPago` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Operacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ArchivoListaPrecios` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Comentarios` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referenciasempresas`
--

CREATE TABLE `referenciasempresas` (
  `IdReferencia` int(11) NOT NULL,
  `nombreRef1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreRef2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoRef1` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoRef2` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direccionRef1` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccionRef2` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `comentarioRef1` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `comentarioRef2` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `referenciasempresas`
--

INSERT INTO `referenciasempresas` (`IdReferencia`, `nombreRef1`, `nombreRef2`, `telefonoRef1`, `telefonoRef2`, `direccionRef1`, `direccionRef2`, `comentarioRef1`, `comentarioRef2`) VALUES
(1, 'refnom1', 'refnom2', 'telref1', 'telref2', 'dir1', 'dir2', 'com1', 'com2'),
(2, 'admin', 'admin', 'admin', 'admin', 'hg', 'gh', 'gh', 'gf'),
(3, '1', '2', '3', '4', '5', '6', '7', '8'),
(4, '1', '2', '3', '4', '5', '6', '7', '8'),
(5, 'f', '', '', '', '', '', '', ''),
(6, 'ffd', '', '', '', '', '', '', ''),
(7, 'ffd', '', '', '', '', '', '', ''),
(8, '1', '2', '3', '4', '5', '6', '7', '8'),
(9, '1', '2', '3', '4', '5', '6', '7', '8'),
(10, '1', '2', '3', '4', '5', '6', '7', '8'),
(11, '1', '2', '3', '4', '5', '6', '7', '8'),
(12, '1', '2', '3', '4', '5', '6', '7', '8'),
(13, 'ref1', 'ref2', '2321021162', '2321021162', 'dir1', 'dir2', 'com1', 'com2'),
(14, 'ref1', 'ref2', '2321021162', '2321021162', 'dir1', 'dir2', 'com1', 'com2'),
(15, 'ref1', 'ref2', '2321021162', '2321021162', 'dir1', 'dir2', 'com1', 'com2'),
(16, 'ref1', 'ref2', '2321021162', '2321021162', 'dir1', 'dir2', 'com1', 'com2'),
(17, 'ref1', 'ref2', '2321021162', '2321021162', 'dir1', 'dir2', 'com1', 'com2'),
(18, 'ref1', 'ref2', '2321021162', '2321021162', 'dir1', 'dir2', 'com1', 'com2'),
(19, 'ref1', 'ref2', '2321021162', '2321021162', 'dir1', 'dir2', 'com1', 'com2'),
(20, 'ref1', 'ref2', '2321021162', '2321021162', 'dir1', 'dir2', 'com1', 'com2'),
(21, 'ref1', 'ref2', '2321021162', '2321021162', 'dir1', 'dir2', 'com1', 'com2'),
(22, 'ref1', 'ref2', '2322150309', '21021162', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(23, 'ref1', 'ref2', '2322150309', '21021162', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(24, 'ref1', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(25, 'ref1', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(26, 'ref1', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(27, 'ref1', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(28, 'ref1', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(29, 'ref1', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(30, 'ref1', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(31, '', '', '', '', '', '', '', ''),
(32, '', '', '', '', '', '', '', ''),
(33, 'ref2', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(34, 'ref2', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(35, 'ref2', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(36, 'ref2', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2'),
(37, 'ref2', 'ref2', '2322102116', '2322150309', 'Jose vasconcelos 546', 'Jose vasconcelos 546', 'com1', 'com2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolusuario`
--

CREATE TABLE `rolusuario` (
  `IdRol` int(11) NOT NULL,
  `Descripcion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rolusuario`
--

INSERT INTO `rolusuario` (`IdRol`, `Descripcion`, `Estatus`) VALUES
(1, 'Administrador', 1),
(2, 'Repartidor', 1),
(3, 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `IdSubCategoria` int(11) NOT NULL,
  `SubCategoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` int(1) NOT NULL,
  `CodigoSAT` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`IdSubCategoria`, `SubCategoria`, `Estatus`, `CodigoSAT`, `IdCategoria`) VALUES
(1, 'Agua Mineral', 1, '50202310', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `IdSucursal` int(11) NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Encargado` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Latitud` float NOT NULL,
  `Longitud` float NOT NULL,
  `Estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`IdSucursal`, `Nombre`, `Encargado`, `Telefono`, `Correo`, `Direccion`, `Latitud`, `Longitud`, `Estatus`) VALUES
(1, 'Sucursal puebla', 'El jefecito', '2321021162', 'admin@admin.com', 'ignacio allende', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursalesempresas`
--

CREATE TABLE `sucursalesempresas` (
  `IdSucursalEmpresa` int(11) NOT NULL,
  `IdEmpresa` int(11) NOT NULL,
  `IdSucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursalesempresas`
--

INSERT INTO `sucursalesempresas` (`IdSucursalEmpresa`, `IdEmpresa`, `IdSucursal`) VALUES
(1, 26, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `FechaRegistro` date DEFAULT curdate(),
  `IdRol` int(11) NOT NULL,
  `Estatus` int(1) NOT NULL,
  `IdPersona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Correo`, `Contrasena`, `FechaRegistro`, `IdRol`, `Estatus`, `IdPersona`) VALUES
(1, 'admin@admin.com', '$2y$10$0Bu6TPAtbeci/OSHJ71syub.xasVFRcnXRlOv1WwvRLoRvhm6C25e', '2023-12-30', 1, 3, 1),
(32, 'parrasantiago.ja@gmail.com', '$2y$10$dc9RB4OToYja3Lc2voe8uuSAue07ICfhPJCqq.bONzsGBU4vbg0K2', '2024-01-05', 3, 1, 27);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`IdAlmacen`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`IdBanner`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`IdCarrito`),
  ADD UNIQUE KEY `IdCliente` (`IdCliente`,`IdProducto`),
  ADD KEY `idp` (`IdProducto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `comprasproductos`
--
ALTER TABLE `comprasproductos`
  ADD PRIMARY KEY (`IdCompraProducto`),
  ADD KEY `proveedor_comprasproductos` (`IdProveedor`),
  ADD KEY `almacen_comprasproductos` (`IdAlmacen`);

--
-- Indices de la tabla `costosenvio`
--
ALTER TABLE `costosenvio`
  ADD PRIMARY KEY (`IdCostoEnvio`);

--
-- Indices de la tabla `creditoempresa`
--
ALTER TABLE `creditoempresa`
  ADD PRIMARY KEY (`IdCreditoEmpresa`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`IdDescuento`),
  ADD KEY `clientes_descuentos` (`IdCliente`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`IdEmpresa`),
  ADD UNIQUE KEY `IdCreditoEmpresa` (`IdCreditoEmpresa`),
  ADD UNIQUE KEY `IdFacturacion` (`IdFacturacion`),
  ADD KEY `giroempresas` (`IdGiroEmpresa`),
  ADD KEY `referenciaempresas` (`IdReferencia`);

--
-- Indices de la tabla `facturacionempresas`
--
ALTER TABLE `facturacionempresas`
  ADD PRIMARY KEY (`IdFacturacion`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`IdFactura`);

--
-- Indices de la tabla `firmaspedidos`
--
ALTER TABLE `firmaspedidos`
  ADD PRIMARY KEY (`IdFirma`),
  ADD KEY `pedidos_firmas` (`IdPedido`);

--
-- Indices de la tabla `giroempresa`
--
ALTER TABLE `giroempresa`
  ADD PRIMARY KEY (`IdGiroEmpresa`);

--
-- Indices de la tabla `membresias`
--
ALTER TABLE `membresias`
  ADD PRIMARY KEY (`IdMembresia`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`IdPago`),
  ADD KEY `IdFactura` (`IdFactura`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`IdPedido`),
  ADD KEY `sucursal_pedidos` (`IdSucursal`),
  ADD KEY `pagos_pedidos` (`IdPago`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`IdPersona`),
  ADD UNIQUE KEY `IdEmpresa` (`IdEmpresa`);

--
-- Indices de la tabla `precioproductomembresia`
--
ALTER TABLE `precioproductomembresia`
  ADD PRIMARY KEY (`IdPrecioProducto`),
  ADD UNIQUE KEY `IdProducto` (`IdProducto`,`IdMembresia`),
  ADD KEY `precio_membresia` (`IdMembresia`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdSubcategoria` (`IdSubcategoria`);

--
-- Indices de la tabla `productoscomprados`
--
ALTER TABLE `productoscomprados`
  ADD PRIMARY KEY (`IdProductosComprados`),
  ADD KEY `comprasp_productoscomprados` (`IdCompraProducto`),
  ADD KEY `producto_productoscomprados` (`IdProducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`IdProveedor`);

--
-- Indices de la tabla `referenciasempresas`
--
ALTER TABLE `referenciasempresas`
  ADD PRIMARY KEY (`IdReferencia`);

--
-- Indices de la tabla `rolusuario`
--
ALTER TABLE `rolusuario`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`IdSubCategoria`),
  ADD KEY `categorias_subcategorias` (`IdCategoria`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`IdSucursal`);

--
-- Indices de la tabla `sucursalesempresas`
--
ALTER TABLE `sucursalesempresas`
  ADD PRIMARY KEY (`IdSucursalEmpresa`),
  ADD KEY `empresa_sucursalesempresa` (`IdEmpresa`),
  ADD KEY `sucursal_sucursalesempresa` (`IdSucursal`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD UNIQUE KEY `IdPersona` (`IdPersona`),
  ADD KEY `roles` (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `IdAlmacen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `IdBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `IdCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comprasproductos`
--
ALTER TABLE `comprasproductos`
  MODIFY `IdCompraProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `costosenvio`
--
ALTER TABLE `costosenvio`
  MODIFY `IdCostoEnvio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `creditoempresa`
--
ALTER TABLE `creditoempresa`
  MODIFY `IdCreditoEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `IdDescuento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `facturacionempresas`
--
ALTER TABLE `facturacionempresas`
  MODIFY `IdFacturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `IdFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `firmaspedidos`
--
ALTER TABLE `firmaspedidos`
  MODIFY `IdFirma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `giroempresa`
--
ALTER TABLE `giroempresa`
  MODIFY `IdGiroEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `membresias`
--
ALTER TABLE `membresias`
  MODIFY `IdMembresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `IdPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `IdPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `precioproductomembresia`
--
ALTER TABLE `precioproductomembresia`
  MODIFY `IdPrecioProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productoscomprados`
--
ALTER TABLE `productoscomprados`
  MODIFY `IdProductosComprados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referenciasempresas`
--
ALTER TABLE `referenciasempresas`
  MODIFY `IdReferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `rolusuario`
--
ALTER TABLE `rolusuario`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `IdSubCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `IdSucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sucursalesempresas`
--
ALTER TABLE `sucursalesempresas`
  MODIFY `IdSucursalEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `idp` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_carrito` FOREIGN KEY (`IdCliente`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comprasproductos`
--
ALTER TABLE `comprasproductos`
  ADD CONSTRAINT `almacen_comprasproductos` FOREIGN KEY (`IdAlmacen`) REFERENCES `almacen` (`IdAlmacen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proveedor_comprasproductos` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedores` (`IdProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD CONSTRAINT `clientes_descuentos` FOREIGN KEY (`IdCliente`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `creditoempresas` FOREIGN KEY (`IdCreditoEmpresa`) REFERENCES `creditoempresa` (`IdCreditoEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturacionempresas` FOREIGN KEY (`IdFacturacion`) REFERENCES `facturacionempresas` (`IdFacturacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giroempresas` FOREIGN KEY (`IdGiroEmpresa`) REFERENCES `giroempresa` (`IdGiroEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referenciaempresas` FOREIGN KEY (`IdReferencia`) REFERENCES `referenciasempresas` (`IdReferencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `firmaspedidos`
--
ALTER TABLE `firmaspedidos`
  ADD CONSTRAINT `pedidos_firmas` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`IdFactura`) REFERENCES `facturas` (`IdFactura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pagos_pedidos` FOREIGN KEY (`IdPago`) REFERENCES `pagos` (`IdPago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sucursal_pedidos` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursales` (`IdSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `empresas` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresas` (`IdEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `precioproductomembresia`
--
ALTER TABLE `precioproductomembresia`
  ADD CONSTRAINT `precio_membresia` FOREIGN KEY (`IdMembresia`) REFERENCES `membresias` (`IdMembresia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `precio_producto` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`IdSubcategoria`) REFERENCES `subcategorias` (`IdSubCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productoscomprados`
--
ALTER TABLE `productoscomprados`
  ADD CONSTRAINT `comprasp_productoscomprados` FOREIGN KEY (`IdCompraProducto`) REFERENCES `comprasproductos` (`IdCompraProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_productoscomprados` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `categorias_subcategorias` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursalesempresas`
--
ALTER TABLE `sucursalesempresas`
  ADD CONSTRAINT `empresa_sucursalesempresa` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresas` (`IdEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sucursal_sucursalesempresa` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursales` (`IdSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `personas` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles` FOREIGN KEY (`IdRol`) REFERENCES `rolusuario` (`IdRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
