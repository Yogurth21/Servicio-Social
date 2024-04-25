

CREATE TABLE `alumnos` (
  `ID_Alumno` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Completo` varchar(250) NOT NULL,
  `Correo_Electronico` varchar(250) NOT NULL,
  `Telefono` varchar(250) NOT NULL,
  `Telefono_Emergencia` varchar(250) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Numero_Control` varchar(250) NOT NULL,
  `Dependencias` varchar(250) NOT NULL,
  PRIMARY KEY (`ID_Alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO alumnos VALUES ('6', 'Julian Mendoza Marquez', 'Julian123@gmail.com', '6331320703', '6331155454', '2002-06-05', '20750107', 'Tecnologico');
INSERT INTO alumnos VALUES ('7', 'Jose Adrian Aguilar Rojas', 'Adrian123@gmail.com', '6331320703', '6331155454', '2002-02-11', '20750117', 'Tecnologico');
INSERT INTO alumnos VALUES ('9', 'Vanessa Eileen Feliz', 'Vanessa123@gmail.com', '6331355015', '6331002159', '2003-08-13', '21750341', 'Tecnologico');
INSERT INTO alumnos VALUES ('10', 'Diego Figueroa Valenzuela', 'Diego123@gmail.com', '6341086768', '6331320703', '2002-09-18', '21750067', 'Tecnologico');
INSERT INTO alumnos VALUES ('11', 'Jesus Peralta Hoyos', 'Jesus123@gmail.com', '6251356155', '651656505', '2003-03-25', '217502156', 'Tecnologico');
INSERT INTO alumnos VALUES ('12', 'Jesus Alfredo Garcia Guerrero', 'Alfredo123@gmail.com', '6331312522', '6331155454', '2002-05-13', '20750105', 'Tecnologico');


CREATE TABLE `roles` (
  `ID_Cargo` int(11) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`ID_Cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO roles VALUES ('1', 'Administrador');
INSERT INTO roles VALUES ('2', 'Capturista');


CREATE TABLE `usuarios` (
  `ID_Admin` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Completo` varchar(250) NOT NULL,
  `Usuario` varchar(250) NOT NULL,
  `Numero_De_Control` varchar(250) NOT NULL,
  `Correo_Electronico` varchar(250) NOT NULL,
  `Telefono` varchar(250) NOT NULL,
  `Telefono_Emergencia` varchar(250) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Cargo` int(11) NOT NULL,
  `Foto` text NOT NULL,
  PRIMARY KEY (`ID_Admin`),
  KEY `Cargo` (`Cargo`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Cargo`) REFERENCES `roles` (`ID_Cargo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuarios VALUES ('1', 'Elizabeth Santillan Tarazón', 'Elizabeth', '34', 'Eli123@gmail.com', '6331136570', '6331155454', '1985-11-21', '1', '../uploads/Maestra Eli.jpg');
INSERT INTO usuarios VALUES ('18', 'Reyna Guadaluope Moran Rivera', 'Jane', '20750112', 'Jane123@gmail.com', '6334096027', '6334096027', '2002-08-22', '1', '');
INSERT INTO usuarios VALUES ('24', 'Julian Mendoza Marquez', 'Julian', '20750107', 'Julian123@gmail.com', '6331320703', '6331155454', '2002-06-05', '1', 'ImagenesPerfil/PruebaFotoPerfil.jpg');
