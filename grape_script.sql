CREATE DATABASE `grape` /*!40100 DEFAULT CHARACTER SET latin1 */

CREATE TABLE `bebidas` (
   `id_bebida` int(11) NOT NULL,
   `nombre` varchar(45) NOT NULL,
   `precio` double NOT NULL,
   `descripcion` varchar(45) DEFAULT NULL,
   `id_tipo_bebida` int(11) NOT NULL,
   `marca` varchar(45) DEFAULT NULL,
   PRIMARY KEY (`id_bebida`),
   KEY `bebidas_fk1_idx` (`id_tipo_bebida`),
   CONSTRAINT `bebidas_fk1` FOREIGN KEY (`id_tipo_bebida`) REFERENCES `tipos_bebidas` (`id_tipo_bebida`) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1
 
 CREATE TABLE `pedidos` (
   `id_usuario` int(11) NOT NULL,
   `id_bebida` int(11) NOT NULL,
   `cantidad` int(11) NOT NULL,
   `fecha` datetime NOT NULL,
   PRIMARY KEY (`id_usuario`,`id_bebida`,`fecha`),
   KEY `pedidos_fk2_idx` (`id_bebida`)
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1
 
 CREATE TABLE `tipos_bebidas` (
   `id_tipo_bebida` int(11) NOT NULL,
   `nombre` varchar(45) NOT NULL,
   PRIMARY KEY (`id_tipo_bebida`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1
 
 CREATE TABLE `usuarios` (
   `id_usuario` int(11) NOT NULL,
   `nombre_usuario` varchar(45) NOT NULL,
   `contrasenia` varchar(45) NOT NULL,
   `nombre` varchar(45) DEFAULT NULL,
   `apellido` varchar(45) DEFAULT NULL,
   `fecha_nac` datetime DEFAULT NULL,
   `tipo_usuario` varchar(45) NOT NULL,
   PRIMARY KEY (`id_usuario`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1