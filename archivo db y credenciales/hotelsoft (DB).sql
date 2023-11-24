-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2023 at 10:26 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clientes`
--

CREATE TABLE `Clientes` (
  `idCliente` int NOT NULL,
  `Usuarios_idUsuario` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Clientes`
--

INSERT INTO `Clientes` (`idCliente`, `Usuarios_idUsuario`) VALUES
(9, 55555),
(13, 78963),
(5, 233132),
(6, 987456),
(15, 110338949),
(7, 1003262180),
(12, 1043454532),
(11, 1102036520),
(21, 1102566566),
(4, 1102805930),
(3, 1102882802),
(20, 1103497511),
(2, 1103739218),
(16, 1103739619),
(14, 1104255827),
(17, 1111111111),
(10, 1354654156),
(19, 9999999999);

-- --------------------------------------------------------

--
-- Table structure for table `estadoHabitaciones`
--

CREATE TABLE `estadoHabitaciones` (
  `idEstado` int NOT NULL,
  `nombreEstado` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estadoHabitaciones`
--

INSERT INTO `estadoHabitaciones` (`idEstado`, `nombreEstado`) VALUES
(0, 'Deshabilitada'),
(1, 'Disponible'),
(2, 'Mantenimiento');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `idEstado` int NOT NULL,
  `nombreEstado` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`idEstado`, `nombreEstado`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `Habitaciones`
--

CREATE TABLE `Habitaciones` (
  `idHabitacion` int NOT NULL,
  `numHabitacion` int NOT NULL,
  `tipoHabitacion` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` int NOT NULL,
  `precioHabitacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Habitaciones`
--

INSERT INTO `Habitaciones` (`idHabitacion`, `numHabitacion`, `tipoHabitacion`, `estado`, `precioHabitacion`) VALUES
(1, 1, 'Doble', 1, 500000),
(2, 65, 'Suite', 1, 250000),
(3, 80, 'Doble', 1, 120000),
(4, 105, 'Individual', 1, 500000),
(5, 106, 'Suite', 1, 523000),
(6, 107, 'Suite', 1, 500000),
(7, 108, 'Doble', 1, 500000),
(8, 109, 'Individual', 1, 100000),
(9, 110, 'Individual', 1, 2000000),
(10, 2, 'Individual', 1, 100000),
(11, 111, 'Doble', 1, 700000),
(12, 112, 'Suite', 1, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `Habitaciones_has_Reservas`
--

CREATE TABLE `Habitaciones_has_Reservas` (
  `Habitaciones_idHabitacion` int NOT NULL,
  `Reservas_idReserva` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Habitaciones_has_Reservas`
--

INSERT INTO `Habitaciones_has_Reservas` (`Habitaciones_idHabitacion`, `Reservas_idReserva`) VALUES
(1, 25),
(4, 26),
(1, 27),
(2, 28),
(6, 29),
(6, 30),
(10, 31),
(9, 32),
(10, 33),
(7, 34),
(4, 35),
(4, 36),
(3, 37),
(10, 38),
(10, 39),
(1, 40),
(2, 41);

-- --------------------------------------------------------

--
-- Table structure for table `Reservas`
--

CREATE TABLE `Reservas` (
  `idReserva` int NOT NULL,
  `fechaEntrada` date NOT NULL,
  `fechasalida` date NOT NULL,
  `estadoReserva` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'activo',
  `precioTotal` int NOT NULL,
  `Clientes_idClientes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reservas`
--

INSERT INTO `Reservas` (`idReserva`, `fechaEntrada`, `fechasalida`, `estadoReserva`, `precioTotal`, `Clientes_idClientes`) VALUES
(25, '2023-11-12', '2023-11-14', 'activo', 500000, 11),
(26, '2023-11-14', '2023-11-16', 'activo', 1000000, 13),
(27, '2023-12-20', '2024-01-02', 'activo', 6500000, 13),
(28, '2023-11-14', '2023-11-15', 'activo', 250000, 13),
(29, '2023-12-08', '2023-12-09', 'activo', 500000, 11),
(30, '2023-11-15', '2023-11-17', 'activo', 1000000, 11),
(31, '2023-12-14', '2023-12-21', 'activo', 700000, 13),
(32, '2023-11-14', '2023-11-15', 'activo', 900000, 11),
(33, '2023-11-14', '2023-11-15', 'activo', 100000, 15),
(34, '2023-11-30', '2023-12-01', 'activo', 500000, 11),
(35, '2023-11-22', '2023-11-23', 'activo', 500000, 9),
(36, '2023-11-27', '2023-12-02', 'activo', 2500000, 17),
(37, '2023-11-30', '2023-12-01', 'activo', 120000, 7),
(38, '2023-11-15', '2023-11-16', 'activo', 100000, 11),
(39, '2023-11-24', '2023-11-30', 'activo', 600000, 20),
(40, '2023-11-19', '2023-12-01', 'activo', 6000000, 21),
(41, '2023-11-18', '2023-11-20', 'activo', 500000, 21);

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `idRol` int NOT NULL,
  `nombreRol` varchar(45) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`idRol`, `nombreRol`) VALUES
(1, 'globaladmin'),
(2, 'cliente'),
(3, 'recepcionista'),
(4, 'admin'),
(19, 'portero');

-- --------------------------------------------------------

--
-- Table structure for table `Roles_has_seccionesWEB`
--

CREATE TABLE `Roles_has_seccionesWEB` (
  `Roles_idRol` int NOT NULL,
  `seccionesWEB_idseccionWEB` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Roles_has_seccionesWEB`
--

INSERT INTO `Roles_has_seccionesWEB` (`Roles_idRol`, `seccionesWEB_idseccionWEB`) VALUES
(1, 1),
(3, 1),
(4, 1),
(19, 1),
(1, 2),
(3, 2),
(4, 2),
(19, 2),
(1, 3),
(3, 3),
(4, 3),
(19, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(3, 7),
(4, 7),
(19, 7),
(1, 8),
(3, 8),
(4, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(4, 12),
(1, 13),
(4, 13),
(1, 14),
(4, 14),
(1, 16),
(4, 16),
(2, 17),
(2, 18),
(1, 19),
(3, 19),
(4, 19);

-- --------------------------------------------------------

--
-- Table structure for table `seccionesWEB`
--

CREATE TABLE `seccionesWEB` (
  `idseccionWEB` int NOT NULL,
  `nombreSeccion` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `icono` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccionSeccion` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `desplegable` int NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  `seccionesWEB_idseccionWEB` int DEFAULT NULL,
  `orden` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seccionesWEB`
--

INSERT INTO `seccionesWEB` (`idseccionWEB`, `nombreSeccion`, `icono`, `direccionSeccion`, `desplegable`, `estado`, `seccionesWEB_idseccionWEB`, `orden`) VALUES
(1, 'Inicio', 'fas fa-home', 'menus/inicio.php', 0, 1, NULL, 1),
(2, 'Reservas', 'far fa-calendar-alt', 'menus/reserva.php', 0, 1, NULL, 2),
(3, 'Verificación de Entrada', 'fas fa-sign-in-alt', 'menus/verificacionentrada.php', 0, 1, NULL, 3),
(4, 'Punto de Ventas', 'fas fa-shopping-cart', '#', 1, 0, NULL, 5),
(5, 'Vender Productos', 'far fa-circle', '#', 0, 0, 4, 6),
(6, 'Catalogo de Productos', 'far fa-circle', '#', 0, 0, 4, 7),
(7, 'Verificación de Salida', 'fas fa-sign-out-alt', 'menus/verificacionsalida.php', 0, 1, NULL, 8),
(8, 'Clientes', 'fas fa-users', 'menus/clientes.php', 0, 1, NULL, 9),
(9, 'Reportes', 'fa fa-file', '#', 1, 0, NULL, 10),
(10, 'Reporte Diario', 'far fa-circle', 'menus/reportesdiario.php', 0, 0, 9, 11),
(11, 'Reporte Mensual', 'far fa-circle', 'menus/reportesmensual.php', 0, 0, 9, 12),
(12, 'Empleados', 'fas fa-user-cog', 'menus/empleados.php', 0, 1, NULL, 13),
(13, 'Configuración', 'fas fa-cogs', '#', 1, 1, NULL, 15),
(14, 'Roles y permisos', 'fa fa-key', 'menus/rolesypermisos.php', 0, 1, 13, 16),
(16, 'Habitaciones', 'fa-solid fa-bed', 'menus/confihabitaciones.php', 0, 1, 13, 17),
(17, 'Reservar', 'fas fa-sign-in-alt', 'menus/reservar.php', 0, 1, NULL, 4),
(18, 'Mis Reservas', 'far fa-calendar-alt', 'menus/vermisreservas.php', 0, 1, NULL, 19),
(19, 'Reservar(recepcionista)', 'fas fa-sign-in-alt', 'menus/reservarRecepcionista.php', 0, 1, NULL, 14);

-- --------------------------------------------------------

--
-- Table structure for table `Tipo_Identificacion`
--

CREATE TABLE `Tipo_Identificacion` (
  `idTipo_Identificacion` int NOT NULL,
  `nombreTipoId` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Tipo_Identificacion`
--

INSERT INTO `Tipo_Identificacion` (`idTipo_Identificacion`, `nombreTipoId`) VALUES
(1, 'Cedula'),
(2, 'Tarjeta de Identidad'),
(3, 'Cedula Extranjeria'),
(4, 'Visa'),
(5, 'Pasaporte');

-- --------------------------------------------------------

--
-- Table structure for table `Usuarios`
--

CREATE TABLE `Usuarios` (
  `idUsuario` bigint NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `correoelectronico` varchar(99) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `TipoIdentificacion_idTipoIdentificacion` int NOT NULL,
  `Roles_idRoles` int NOT NULL DEFAULT '2',
  `estado` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Usuarios`
--

INSERT INTO `Usuarios` (`idUsuario`, `contrasena`, `nombre`, `apellido`, `correoelectronico`, `telefono`, `TipoIdentificacion_idTipoIdentificacion`, `Roles_idRoles`, `estado`) VALUES
(55555, '$2y$10$OfIVHJJM2LJgOPNafhOHs.j.r2pPixdAt7luwK7R4QxNy204EGTf6', 'Roberto', 'Carlos', 'robertocarloss@gmail.com', '600666666', 1, 2, 1),
(78963, '$2y$10$zKTBdPV6ae7e1xB9mD6uQeUfBXCUv3QCoMSjl66d.jkLinynha/qG', 'pepe', 'cajas', 'pepeguama@gmail.com', '3054219801', 1, 2, 1),
(233132, '$2y$10$nW1Ik8t8AgEFo4Mu35KYOusP7zV/gYvCdQkrfkWyKcoWLf12KO8QW', 'guamapepe', 'guzman', 'yoyo@gmail.com', '88565321', 5, 2, 1),
(464576, '$2y$10$2LrazdSrlBUToqFDoKA01uMOsTW3qEBRR40l8lQ2fHZn4MEcmN6yy', 'Sebastián Alfonso', 'Sierra Torres', 'sebalfonsos1@gmail.com', '3017465577', 4, 3, 1),
(534534, '$2y$10$Qq3g22oq00MrckT8QwICVulFJrxn8VysF1R.0FvrFkkp4ysm1GMlO', 'Juan', 'Carlos', 'recepcionista@gmail.com', '3008856214', 1, 3, 1),
(987456, '$2y$10$KFj.tv1QD2BOO1SqyH4yAevPz/.rkkjjC/TjSfBKBxHp9eWZw0Beq', 'Delfina', 'Socorro', 'delfina@gmail.com', '2235421122', 1, 2, 1),
(1254555, '$2y$10$WzqClZTCs9hPjazu/oTe4..2paT5agDUK7slVXLqBwCI.bHW8P7Yy', 'Prueba', 'Barrios', 'empleado@gmail.com', '325498654', 1, 4, 1),
(110338949, '$2y$10$8bPt0Px/aBdo2tASTnUDd.M.Udp3OQxLiTHdc6J3fXn6HiRHAy9DW', 'Breiner Steven ', 'Tete Vergara', 'steven@tete.com', '32093029', 1, 2, 1),
(1003262180, '$2y$10$D61fcfa3yy7OldQPR8r1x.Pa/Z3.wavWL7saeeiTBOIH3TQSzLJum', 'daniel ', 'Rivero', 'daniel@gmail.com', '3041201032', 1, 2, 1),
(1043454532, '$2y$10$4SZS/Pi0RucxL612C2WJP.btFuJFit3P7dkn7MJKn26QtupHOfShG', 'Sebastian', 'Rodriguez Cantillo', 'sebaz21@gmail.com', '30244443453', 1, 2, 1),
(1102036520, '$2y$10$imwYzDRYH9Cux.kfGUVuke4WM6ZFnbp12fxlv7OxDMWuor1A4/q1q', 'Maria Lucia', 'Sierra Torres', 'marialucia@gmail.com', '3015020102', 2, 2, 1),
(1102566566, '$2y$10$SQNR3k3dUuDJGwhUPup5betYxAgG6bk8DFuWBu0.3M3C/3stVFjAq', 'Sabastian', 'Rodriguez', 'sebastian@rodriguez.com', '3203203200', 1, 2, 1),
(1102576843, '$2y$10$Ur5d5Ud2ov.w0DySaasGxOC9l9jdkkAZC7vyrMSBBMftwkkog3OM2', 'Luis Miguel', 'Acuña Rodríguez', 'luis.acuna@cecar.edu.co', '3217092779', 1, 1, 1),
(1102805930, '$2y$10$6.3PG9SlDUH2c/H7l9Zje.lyBmaw2IeWwObXzOq5k.qlPEEVDZTTC', 'jeronimo', 'cajas', 'jeronimo.cajas@cecar.edu.co', '3054219801', 1, 2, 1),
(1102882801, '$2y$10$dY9MyWSONIyCF8.ohFZdNu2kxhMEMJHlnXhafLyw411vmoNrT1duK', 'Cristian', 'Brieva', 'brieva14@hotmail.com', '3113109807', 1, 1, 1),
(1102882802, '$2y$10$1zQtNRPLeu5UbtTtW40MTuQwlcxOSFR29S0YMPI/uTkfkstpZ.D.O', 'Karen ', 'Liseth', 'brieva149@hotmail.com', '3113109807', 1, 2, 1),
(1103497511, '$2y$10$wUAVq5epAZcDqecSW.CmXO.8ayviQEAJi3IzzYleMLPk6ddcNh4ky', 'Santiago', 'Segrera Rojas', 'santiago.segrera@cecar.edu.co', '3043651711', 1, 2, 1),
(1103739218, '$2y$10$CBmrofz6KsOgvJxJfGv4YuA.nRhqewvr1pDFjBln2.2yZQRC06edC', 'Lucia Carolina', 'Arroyo Figueroa', 'elecaf24@gmail.com', '3022663858', 1, 2, 1),
(1103739610, '$2y$10$PZRtGHr7PbvXkbThwhOyO.BLFgPeNxLXlOCiTVLMcb0F0lHQLRSoS', 'Sebastián Alfonso', 'Sierra Torres', 'sebalfonsos@gmail.com', '3017465577', 1, 1, 1),
(1103739619, '$2y$10$DwAtRCO3BXZGPvUjh7FYhOq8FPG7bj.IGjSlW7CuMR5SpgCClglQq', 'Sebastián Alfonso', 'Sierra Torres', 'sebalfonsos33@gmail.com', '3017465577', 2, 2, 1),
(1104255827, '$2y$10$6bZn7w0vF20jLtp2wrRb4e1JjrgKkvl5Xgpck2c.1r7zk2fzklw8K', 'Aura Maritza', 'De la ossa mendoza', 'auradelaossa21@gmail.com', '3024209987', 1, 2, 1),
(1111111111, '$2y$10$YjG8sPnhu03yHbFdUjN1X.qIdtx0OAp6Rx1UQuM3nZkbzfHgWQbim', 'Cliente', 'Prueba', 'clienteprueba@gmail.com', '3000000000', 1, 2, 1),
(1354654156, '$2y$10$irx25wH9isH..i8mNaq08OZEQfwUgHDPJYQMRy2ITSxf0mD3odmK.', 'cesar', 'villamizar', 'cesar@gmail.com', '65465465', 1, 2, 1),
(8888888888, '$2y$10$ZlM87nP41AG85zFnEBG8N.unqtKObGyAxEUSne3TPDGatBgfI./RO', 'Empleados', 'Prueba1', 'empleadoprueba1@gmail.com', '3000000000', 5, 19, 1),
(9999999999, '$2y$10$i.lgaS/RgN9.v.hc18aMSO7TXz.MdjJxqFIUMTcpHeHktKs..CYmS', 'Cliente', 'Prueba2', 'clienteprueba2@gmail.com', '3000010000', 2, 2, 1);

--
-- Triggers `Usuarios`
--
DELIMITER $$
CREATE TRIGGER `CrearClienteDespuesDeInsertar` AFTER INSERT ON `Usuarios` FOR EACH ROW BEGIN
    -- Verificar si el nuevo usuario tiene el rol "cliente"
    IF NEW.Roles_idRoles = '2' THEN
        -- Insertar el nuevo usuario en la tabla de clientes
        INSERT INTO Clientes (Usuarios_idUsuario)
        VALUES (NEW.idUsuario);
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_Clientes_Usuarios1_idx` (`Usuarios_idUsuario`);

--
-- Indexes for table `estadoHabitaciones`
--
ALTER TABLE `estadoHabitaciones`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indexes for table `Habitaciones`
--
ALTER TABLE `Habitaciones`
  ADD PRIMARY KEY (`idHabitacion`),
  ADD KEY `estado` (`estado`);

--
-- Indexes for table `Habitaciones_has_Reservas`
--
ALTER TABLE `Habitaciones_has_Reservas`
  ADD PRIMARY KEY (`Habitaciones_idHabitacion`,`Reservas_idReserva`),
  ADD KEY `fk_Habitaciones_has_Reservas_Reservas1_idx` (`Reservas_idReserva`),
  ADD KEY `fk_Habitaciones_has_Reservas_Habitaciones1_idx` (`Habitaciones_idHabitacion`);

--
-- Indexes for table `Reservas`
--
ALTER TABLE `Reservas`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `fk_Reservas_Clientes1_idx` (`Clientes_idClientes`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `Roles_has_seccionesWEB`
--
ALTER TABLE `Roles_has_seccionesWEB`
  ADD PRIMARY KEY (`Roles_idRol`,`seccionesWEB_idseccionWEB`),
  ADD KEY `fk_Roles_has_seccionesWEB_seccionesWEB1_idx` (`seccionesWEB_idseccionWEB`),
  ADD KEY `fk_Roles_has_seccionesWEB_Roles1_idx` (`Roles_idRol`);

--
-- Indexes for table `seccionesWEB`
--
ALTER TABLE `seccionesWEB`
  ADD PRIMARY KEY (`idseccionWEB`),
  ADD KEY `fk_seccionesWEB_seccionesWEB1_idx` (`seccionesWEB_idseccionWEB`);

--
-- Indexes for table `Tipo_Identificacion`
--
ALTER TABLE `Tipo_Identificacion`
  ADD PRIMARY KEY (`idTipo_Identificacion`);

--
-- Indexes for table `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuarios_Tipo Identificacion1_idx` (`TipoIdentificacion_idTipoIdentificacion`),
  ADD KEY `fk_Usuarios_Roles1_idx` (`Roles_idRoles`),
  ADD KEY `fk_Usuarios_Estado Usuarios` (`estado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `idCliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Habitaciones`
--
ALTER TABLE `Habitaciones`
  MODIFY `idHabitacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Reservas`
--
ALTER TABLE `Reservas`
  MODIFY `idReserva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `seccionesWEB`
--
ALTER TABLE `seccionesWEB`
  MODIFY `idseccionWEB` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Clientes`
--
ALTER TABLE `Clientes`
  ADD CONSTRAINT `Clientes_ibfk_1` FOREIGN KEY (`Usuarios_idUsuario`) REFERENCES `Usuarios` (`idUsuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Habitaciones`
--
ALTER TABLE `Habitaciones`
  ADD CONSTRAINT `Habitaciones_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estadoHabitaciones` (`idEstado`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Habitaciones_has_Reservas`
--
ALTER TABLE `Habitaciones_has_Reservas`
  ADD CONSTRAINT `fk_Habitaciones_has_Reservas_Habitaciones1` FOREIGN KEY (`Habitaciones_idHabitacion`) REFERENCES `Habitaciones` (`idHabitacion`),
  ADD CONSTRAINT `fk_Habitaciones_has_Reservas_Reservas1` FOREIGN KEY (`Reservas_idReserva`) REFERENCES `Reservas` (`idReserva`);

--
-- Constraints for table `Reservas`
--
ALTER TABLE `Reservas`
  ADD CONSTRAINT `fk_Reservas_Clientes1` FOREIGN KEY (`Clientes_idClientes`) REFERENCES `Clientes` (`idCliente`);

--
-- Constraints for table `Roles_has_seccionesWEB`
--
ALTER TABLE `Roles_has_seccionesWEB`
  ADD CONSTRAINT `fk_Roles_has_seccionesWEB_Roles1` FOREIGN KEY (`Roles_idRol`) REFERENCES `Roles` (`idRol`) ON DELETE RESTRICT,
  ADD CONSTRAINT `fk_Roles_has_seccionesWEB_seccionesWEB1` FOREIGN KEY (`seccionesWEB_idseccionWEB`) REFERENCES `seccionesWEB` (`idseccionWEB`);

--
-- Constraints for table `seccionesWEB`
--
ALTER TABLE `seccionesWEB`
  ADD CONSTRAINT `fk_seccionesWEB_seccionesWEB1` FOREIGN KEY (`seccionesWEB_idseccionWEB`) REFERENCES `seccionesWEB` (`idseccionWEB`);

--
-- Constraints for table `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `fk_Usuarios_Estado Usuarios` FOREIGN KEY (`estado`) REFERENCES `estados` (`idEstado`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_Usuarios_Roles1` FOREIGN KEY (`Roles_idRoles`) REFERENCES `Roles` (`idRol`) ON DELETE RESTRICT,
  ADD CONSTRAINT `fk_Usuarios_Tipo Identificacion1` FOREIGN KEY (`TipoIdentificacion_idTipoIdentificacion`) REFERENCES `Tipo_Identificacion` (`idTipo_Identificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
