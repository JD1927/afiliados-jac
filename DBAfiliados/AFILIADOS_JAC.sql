-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2019 a las 04:22:19
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `afiliados_jac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comite`
--

CREATE TABLE `comite` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`CODIGO`, `DESCRIPCION`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobby`
--

CREATE TABLE `hobby` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `n_academico`
--

CREATE TABLE `n_academico` (
  `CODIGO` int(11) NOT NULL,
  `NIVEL` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `n_academico`
--

INSERT INTO `n_academico` (`CODIGO`, `NIVEL`) VALUES
(1, 'Preescolar'),
(2, 'Primaria'),
(3, 'Secundaria'),
(4, 'Bachiller'),
(5, 'Media Tecnica'),
(6, 'Tecnica'),
(7, 'Tecnologia'),
(8, 'Profesional'),
(9, 'Especializacion'),
(10, 'Maestria'),
(11, 'Doctorado'),
(12, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacion`
--

CREATE TABLE `ocupacion` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `per_hobby`
--

CREATE TABLE `per_hobby` (
  `IDPERSONA` bigint(20) NOT NULL,
  `HOBBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `per_ocupacion`
--

CREATE TABLE `per_ocupacion` (
  `IDPERSONA` bigint(20) NOT NULL,
  `OCUPACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salud`
--

CREATE TABLE `salud` (
  `CODIGO` int(11) NOT NULL,
  `ENTIDAD` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tel_persona`
--

CREATE TABLE `tel_persona` (
  `IDPERSONA` bigint(20) NOT NULL,
  `TELEFONO` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_id`
--

CREATE TABLE `tipo_id` (
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_id`
--

INSERT INTO `tipo_id` (`CODIGO`, `DESCRIPCION`) VALUES
(1, 'Registro Civil'),
(2, 'Tarjeta de Identidad'),
(3, 'Cedula de Ciudadania'),
(4, 'Cedula de Extranjeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `CODIGO` int(11) NOT NULL,
  `TIPO` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`CODIGO`, `TIPO`) VALUES
(1, 'Afiliado'),
(2, 'Familiar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_salud`
--

CREATE TABLE `tipo_salud` (
  `CODIGO` int(11) NOT NULL,
  `TIPO` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_salud`
--

INSERT INTO `tipo_salud` (`CODIGO`, `TIPO`) VALUES
(1, 'Cotizante'),
(2, 'Beneficiario'),
(3, 'Subsidiado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comite`
--
ALTER TABLE `comite`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `n_academico`
--
ALTER TABLE `n_academico`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
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
-- Indices de la tabla `per_hobby`
--
ALTER TABLE `per_hobby`
  ADD PRIMARY KEY (`IDPERSONA`,`HOBBY`),
  ADD KEY `IDPERSONA` (`IDPERSONA`),
  ADD KEY `HOBBY` (`HOBBY`);

--
-- Indices de la tabla `per_ocupacion`
--
ALTER TABLE `per_ocupacion`
  ADD PRIMARY KEY (`IDPERSONA`,`OCUPACION`),
  ADD KEY `IDPERSONA` (`IDPERSONA`),
  ADD KEY `OCUPACION` (`OCUPACION`);

--
-- Indices de la tabla `salud`
--
ALTER TABLE `salud`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `tel_persona`
--
ALTER TABLE `tel_persona`
  ADD PRIMARY KEY (`IDPERSONA`,`TELEFONO`),
  ADD KEY `IDPERSONA` (`IDPERSONA`);

--
-- Indices de la tabla `tipo_id`
--
ALTER TABLE `tipo_id`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `tipo_salud`
--
ALTER TABLE `tipo_salud`
  ADD PRIMARY KEY (`CODIGO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comite`
--
ALTER TABLE `comite`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hobby`
--
ALTER TABLE `hobby`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `n_academico`
--
ALTER TABLE `n_academico`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salud`
--
ALTER TABLE `salud`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_id`
--
ALTER TABLE `tipo_id`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_salud`
--
ALTER TABLE `tipo_salud`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `PERSONA_ibfk_2` FOREIGN KEY (`COD_COMITE`) REFERENCES `comite` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_3` FOREIGN KEY (`COD_GENERO`) REFERENCES `genero` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_4` FOREIGN KEY (`COD_NACADEMICO`) REFERENCES `n_academico` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_5` FOREIGN KEY (`COD_SALUD`) REFERENCES `salud` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_6` FOREIGN KEY (`COD_TPERSONA`) REFERENCES `tipo_persona` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_7` FOREIGN KEY (`COD_TSALUD`) REFERENCES `tipo_salud` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_8` FOREIGN KEY (`ID_FAMILIAR`) REFERENCES `persona` (`IDENTIFICACION`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERSONA_ibfk_9` FOREIGN KEY (`TIPO_ID`) REFERENCES `tipo_id` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `per_hobby`
--
ALTER TABLE `per_hobby`
  ADD CONSTRAINT `PER_HOBBY_ibfk_1` FOREIGN KEY (`IDPERSONA`) REFERENCES `persona` (`IDENTIFICACION`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PER_HOBBY_ibfk_2` FOREIGN KEY (`HOBBY`) REFERENCES `hobby` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `per_ocupacion`
--
ALTER TABLE `per_ocupacion`
  ADD CONSTRAINT `PER_OCUPACION_ibfk_1` FOREIGN KEY (`IDPERSONA`) REFERENCES `persona` (`IDENTIFICACION`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PER_OCUPACION_ibfk_2` FOREIGN KEY (`OCUPACION`) REFERENCES `ocupacion` (`CODIGO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tel_persona`
--
ALTER TABLE `tel_persona`
  ADD CONSTRAINT `TEL_PERSONA_ibfk_1` FOREIGN KEY (`IDPERSONA`) REFERENCES `persona` (`IDENTIFICACION`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
