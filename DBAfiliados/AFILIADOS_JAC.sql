-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-12-2018 a las 16:05:52
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
-- Base de datos: `AFILIADOS_JAC`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `COMITE`
--

CREATE TABLE `COMITE` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `COMITE`
--

INSERT INTO `COMITE` (`CODIGO`, `DESCRIPCION`) VALUES
(2, 'ComitÃ© de Convivencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GENERO`
--

CREATE TABLE `GENERO` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `GENERO`
--

INSERT INTO `GENERO` (`CODIGO`, `DESCRIPCION`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HOBBY`
--

CREATE TABLE `HOBBY` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `HOBBY`
--

INSERT INTO `HOBBY` (`CODIGO`, `DESCRIPCION`) VALUES
(2, 'Deporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `N_ACADEMICO`
--

CREATE TABLE `N_ACADEMICO` (
  `CODIGO` int(11) NOT NULL,
  `NIVEL` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `N_ACADEMICO`
--

INSERT INTO `N_ACADEMICO` (`CODIGO`, `NIVEL`) VALUES
(4, 'Preescolar'),
(5, 'Primaria'),
(6, 'Secundaria'),
(7, 'Bachiller'),
(8, 'Media Técnica'),
(9, 'Técnica'),
(10, 'Tecnología'),
(11, 'Profesional'),
(12, 'Especialización'),
(13, 'Maestría'),
(14, 'Doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OCUPACION`
--

CREATE TABLE `OCUPACION` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `OCUPACION`
--

INSERT INTO `OCUPACION` (`CODIGO`, `DESCRIPCION`) VALUES
(2, 'Profesor de MatemÃ¡ticas'),
(3, 'Desarrollador de Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERSONA`
--

CREATE TABLE `PERSONA` (
  `IDENTIFICACION` bigint(20) NOT NULL,
  `TIPO_ID` int(11) NOT NULL,
  `N_COMPLETO` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `COD_TPERSONA` int(11) DEFAULT NULL,
  `F_NACIMIENTO` date NOT NULL,
  `DIRECCION` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `EMAIL` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `COD_GENERO` int(11) DEFAULT NULL,
  `COD_SALUD` int(11) DEFAULT NULL,
  `COD_TSALUD` int(11) DEFAULT NULL,
  `COD_COMITE` int(11) DEFAULT NULL,
  `COD_NACADEMICO` int(11) DEFAULT NULL,
  `ID_FAMILIAR` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PERSONA`
--

INSERT INTO `PERSONA` (`IDENTIFICACION`, `TIPO_ID`, `N_COMPLETO`, `COD_TPERSONA`, `F_NACIMIENTO`, `DIRECCION`, `EMAIL`, `COD_GENERO`, `COD_SALUD`, `COD_TSALUD`, `COD_COMITE`, `COD_NACADEMICO`, `ID_FAMILIAR`) VALUES
(1036685232, 1, 'Juan David Aguirre Cordoba', 1, '1999-04-18', 'CALLE 64D#116-74', 'juan@correo.itm.edu.co', 1, 1, 1, 2, 10, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PER_HOBBY`
--

CREATE TABLE `PER_HOBBY` (
  `IDPERSONA` bigint(20) NOT NULL,
  `HOBBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PER_OCUPACION`
--

CREATE TABLE `PER_OCUPACION` (
  `IDPERSONA` bigint(20) NOT NULL,
  `OCUPACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SALUD`
--

CREATE TABLE `SALUD` (
  `CODIGO` int(11) NOT NULL,
  `ENTIDAD` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `SALUD`
--

INSERT INTO `SALUD` (`CODIGO`, `ENTIDAD`) VALUES
(1, 'Sura'),
(4, 'Colsanitas'),
(5, 'Coomeva'),
(7, 'SisbÃ©n'),
(8, 'Nueva EPS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TEL_PERSONA`
--

CREATE TABLE `TEL_PERSONA` (
  `IDPERSONA` bigint(20) NOT NULL,
  `TELEFONO` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_ID`
--

CREATE TABLE `TIPO_ID` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `TIPO_ID`
--

INSERT INTO `TIPO_ID` (`CODIGO`, `DESCRIPCION`) VALUES
(1, 'Cédula de Ciudadanía'),
(2, 'Tarjeta de Identidad'),
(3, 'Registro Civil'),
(4, 'Cédula de Extranjería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_PERSONA`
--

CREATE TABLE `TIPO_PERSONA` (
  `CODIGO` int(11) NOT NULL,
  `TIPO` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `TIPO_PERSONA`
--

INSERT INTO `TIPO_PERSONA` (`CODIGO`, `TIPO`) VALUES
(1, 'Afiliado'),
(2, 'Familiar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_SALUD`
--

CREATE TABLE `TIPO_SALUD` (
  `CODIGO` int(11) NOT NULL,
  `TIPO` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `TIPO_SALUD`
--

INSERT INTO `TIPO_SALUD` (`CODIGO`, `TIPO`) VALUES
(1, 'Cotizante'),
(2, 'Beneficiario'),
(3, 'Subsidiado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `COMITE`
--
ALTER TABLE `COMITE`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `GENERO`
--
ALTER TABLE `GENERO`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `HOBBY`
--
ALTER TABLE `HOBBY`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `N_ACADEMICO`
--
ALTER TABLE `N_ACADEMICO`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `OCUPACION`
--
ALTER TABLE `OCUPACION`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD PRIMARY KEY (`IDENTIFICACION`),
  ADD KEY `COD_COMITE` (`COD_COMITE`),
  ADD KEY `COD_TSALUD` (`COD_TSALUD`),
  ADD KEY `COD_TPERSONA` (`COD_TPERSONA`),
  ADD KEY `COD_SALUD` (`COD_SALUD`),
  ADD KEY `COD_GENERO` (`COD_GENERO`),
  ADD KEY `COD_NACADEMICO` (`COD_NACADEMICO`),
  ADD KEY `ID_FAMILIAR` (`ID_FAMILIAR`),
  ADD KEY `TIPO_ID` (`TIPO_ID`);

--
-- Indices de la tabla `PER_HOBBY`
--
ALTER TABLE `PER_HOBBY`
  ADD PRIMARY KEY (`IDPERSONA`,`HOBBY`),
  ADD KEY `IDPERSONA` (`IDPERSONA`),
  ADD KEY `HOBBY` (`HOBBY`);

--
-- Indices de la tabla `PER_OCUPACION`
--
ALTER TABLE `PER_OCUPACION`
  ADD PRIMARY KEY (`IDPERSONA`,`OCUPACION`),
  ADD KEY `IDPERSONA` (`IDPERSONA`),
  ADD KEY `OCUPACION` (`OCUPACION`);

--
-- Indices de la tabla `SALUD`
--
ALTER TABLE `SALUD`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `TEL_PERSONA`
--
ALTER TABLE `TEL_PERSONA`
  ADD PRIMARY KEY (`IDPERSONA`,`TELEFONO`),
  ADD KEY `IDPERSONA` (`IDPERSONA`);

--
-- Indices de la tabla `TIPO_ID`
--
ALTER TABLE `TIPO_ID`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `TIPO_PERSONA`
--
ALTER TABLE `TIPO_PERSONA`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `TIPO_SALUD`
--
ALTER TABLE `TIPO_SALUD`
  ADD PRIMARY KEY (`CODIGO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `COMITE`
--
ALTER TABLE `COMITE`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `GENERO`
--
ALTER TABLE `GENERO`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `HOBBY`
--
ALTER TABLE `HOBBY`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `N_ACADEMICO`
--
ALTER TABLE `N_ACADEMICO`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `OCUPACION`
--
ALTER TABLE `OCUPACION`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `SALUD`
--
ALTER TABLE `SALUD`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `TIPO_ID`
--
ALTER TABLE `TIPO_ID`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `TIPO_PERSONA`
--
ALTER TABLE `TIPO_PERSONA`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `TIPO_SALUD`
--
ALTER TABLE `TIPO_SALUD`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD CONSTRAINT `PERSONA_ibfk_2` FOREIGN KEY (`COD_COMITE`) REFERENCES `COMITE` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_3` FOREIGN KEY (`COD_GENERO`) REFERENCES `GENERO` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_4` FOREIGN KEY (`COD_NACADEMICO`) REFERENCES `N_ACADEMICO` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_5` FOREIGN KEY (`COD_SALUD`) REFERENCES `SALUD` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_6` FOREIGN KEY (`COD_TPERSONA`) REFERENCES `TIPO_PERSONA` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_7` FOREIGN KEY (`COD_TSALUD`) REFERENCES `TIPO_SALUD` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_8` FOREIGN KEY (`ID_FAMILIAR`) REFERENCES `PERSONA` (`IDENTIFICACION`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_9` FOREIGN KEY (`TIPO_ID`) REFERENCES `TIPO_ID` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PER_HOBBY`
--
ALTER TABLE `PER_HOBBY`
  ADD CONSTRAINT `PER_HOBBY_ibfk_1` FOREIGN KEY (`IDPERSONA`) REFERENCES `PERSONA` (`IDENTIFICACION`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PER_HOBBY_ibfk_2` FOREIGN KEY (`HOBBY`) REFERENCES `HOBBY` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PER_OCUPACION`
--
ALTER TABLE `PER_OCUPACION`
  ADD CONSTRAINT `PER_OCUPACION_ibfk_1` FOREIGN KEY (`IDPERSONA`) REFERENCES `PERSONA` (`IDENTIFICACION`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PER_OCUPACION_ibfk_2` FOREIGN KEY (`OCUPACION`) REFERENCES `OCUPACION` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `TEL_PERSONA`
--
ALTER TABLE `TEL_PERSONA`
  ADD CONSTRAINT `TEL_PERSONA_ibfk_1` FOREIGN KEY (`IDPERSONA`) REFERENCES `PERSONA` (`IDENTIFICACION`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
