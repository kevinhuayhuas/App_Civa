-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
-----------------------------------------------
-------- SISTEMA DE ENCOMIENDAS CIVA ----------
-----------------------------------------------
--
-- Base de datos: `CIVA` ---------------------
--
create database IF NOT EXISTS `Civa` DEFAULT CHARACTER SET utf8mb4;
use Civa;
-- -----------------------------------------------------
-- Procedimientos
-- -----------------------------------------------------
DELIMITER $$

/*-- DROP PROCEDURE IF exists SP_LISTADOCLIENTESXCODIGO; 
 select*from receptor;
truncate table receptor;
DROP TABLE receptor;*/
-- --------------------------------------------------------
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_NombreCliente`()
SELECT concat(c.nombre,' ',c.apellido) as nombre
   FROM clientes c$$
-- ---------------------------------------------------------
-- Estructura de tabla para la tabla `usuarios` ---------
-- ------------------------------------------------------




CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL auto_increment ,
  `Dni` varchar(8)  NULL,
  `Nombre` varchar(100)  NULL,
  `Apellido` varchar(100)  NULL,
  `Cargo` enum('0','1')  NULL,
  `Usuario` varchar(100)  NULL,
  `Password1` varchar(100)  NULL,
  `Password2` varchar(100)  NULL,
  `Telefono` varchar(100)  NULL,
  `Correo` varchar(100)  NULL,
  `Direccion` varchar(100)  NULL,
  `Fecha_ingreso` date  NULL,
  `Estado` enum('0','1')  NULL,
   constraint usuarios primary key(idUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO usuarios ( `Dni`,`Nombre`,`Apellido`,`Cargo`, `Usuario`,`Password1`, `Password2`, `Telefono`, `Correo`, `Direccion`, `Fecha_ingreso`, `Estado`) VALUES
('47384958','Lucas', 'Martin','1','rpalma', '123','123', '945363745', 'palma@gmail.com', 'Av. los naturales', '2020-07-02', '1'),
('47384945','Jesus', 'Jireth','0', 'Rlucas', '123','123','98456374','lucas@gmail.com','Av. los pinos','2020-06-06','0'),
('47384987','Marco', 'Doren','0', 'Marco', '123','123','98456398','Marco@gmail.com','Av. los Girasoles','2020-06-08','0');
-------------------------------------------------------
-- ---------------------------------------------------
-- Estructura de tabla para la tabla `cliente`
-- ---------------------------------------------------
CREATE TABLE `cliente` (
  `idCliente` int(11) auto_increment not null,
  `TipoDocumento` varchar(100)   NOT NULL,
  `Documento` varchar(100)   NOT NULL,
  `Nombre` varchar(100)   NOT NULL,
  `Apellido` varchar(100)   NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Ruc` varchar(100) NOT NULL,
  `RazonSocial` varchar(100)   NOT NULL,
  `Correo` varchar(100)  NOT NULL,
  `Usuario` varchar(100)  NOT NULL,
  `Password1` varchar(100) NOT NULL,
  `Password2` varchar(100)  NOT NULL,
  `Fecha_ingreso` date   NOT NULL,
  `Estado` enum('0','1')  NOT NULL,
  constraint cliente primary key(idCliente)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
select*from usuarios

-- ---------------------------------------------------
-- Estructura de tabla para la tabla `receptor`
-- ---------------------------------------------------
CREATE TABLE `receptor` (
  `idReceptor` int not null auto_increment,
  `TipoDocumento` varchar(100) NOT NULL  ,
  `Documento` varchar(100)  NOT NULL ,
  `Nombre` varchar(100)  NOT  NULL,
  `Apellido` varchar(100)  NOT NULL,
  `Telefono` varchar(100)  NULL,
  `TipoEnvio` varchar(100)  NULL,
  `CodigoPostal` varchar(100)  NULL ,
  `Direccion` varchar(100)  NULL ,
  `Referencia` varchar(100)  NULL ,
  constraint receptor primary key(idReceptor)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into receptor( `TipoDocumento`,`Documento`,`Nombre`,`Apellido`,
  `Telefono`, `TipoEnvio`,`CodigoPostal`,`Direccion`,`Referencia`) values
  ('DNI','45363526','Marco','Moreno','956453423','en Oficina','540','Av.los durasno','Al costado de la panaderia rico pan'),
  ('DNI','45363524','Marco','Moreno','956453423','en Oficina','540','Av.los durasno','Al costado de la panaderia rico pan');


--
-- Estructura de tabla para la tabla `departamentod`
--

CREATE TABLE `departamentod` (
  `idDestino` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `departamentod`
--

INSERT INTO `departamentod` (`idDestino`, `nombre`) VALUES
(1, 'Tacna'),
(2, 'Lima'),
(3, 'Tarapoto'),
(4, 'Ica'),
(5, 'Trujillo'),
(6, 'Marcona'),
(7, 'Sullana'),
(8, 'Ayacucho'),
(9, 'Tumbes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentoo`
--

CREATE TABLE `departamentoo` (
  `idOrigen` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `departamentoo`
--

INSERT INTO `departamentoo` (`idOrigen`, `nombre`) VALUES
(1, 'Tacna'),
(2, 'Lima'),
(3, 'Tarapoto'),
(4, 'Ica'),
(5, 'Trujillo'),
(6, 'Marcona'),
(7, 'Sullana'),
(8, 'Ayacucho'),
(9, 'Tumbes');

-- --------------------------------------------------------
ALTER TABLE `departamentod`
  ADD PRIMARY KEY (`idDestino`);

--
-- Indices de la tabla `departamentoo`
--
ALTER TABLE `departamentoo`
  ADD PRIMARY KEY (`idOrigen`);
