-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2017 a las 22:17:21
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_colegio`
--
CREATE DATABASE IF NOT EXISTS `base_colegio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `base_colegio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `NIE` int(11) NOT NULL,
  `Nombre_Alumno` text NOT NULL,
  `Apellido_Alumno` text NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Id_Genero` int(11) NOT NULL,
  `Nacionalidad` text NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Partida_Nacimiento` text NOT NULL,
  `Distancia` int(11) NOT NULL,
  `Id_Medio` int(11) NOT NULL,
  `Dirección` text NOT NULL,
  `Id_Municipio` int(11) NOT NULL,
  `Telefono` text NOT NULL,
  `Celular` text NOT NULL,
  `Email` text NOT NULL,
  `Id_Religion` int(11) NOT NULL,
  `Miembros_Familia` int(11) NOT NULL,
  `Trabaja` tinyint(1) NOT NULL,
  `Tiene_Hijos` tinyint(1) NOT NULL,
  `Convivencia` text NOT NULL,
  `Nombre_Padre` text NOT NULL,
  `Dui_Padre` text NOT NULL,
  `Telefono_Padre` text NOT NULL,
  `Trabajo_Padre` text NOT NULL,
  `Profesion_Padre` text NOT NULL,
  `Nombre_Madre` text NOT NULL,
  `Dui_Madre` text NOT NULL,
  `Telefono_Madre` text NOT NULL,
  `Trabajo_Madre` text NOT NULL,
  `Profesion_Madre` text NOT NULL,
  `Nombre_Responsable` text NOT NULL,
  `Dui_Responsable` text NOT NULL,
  `Telefono_Responsable` text NOT NULL,
  `Trabajo_Responsable` text NOT NULL,
  `Profesion_Responsable` text NOT NULL,
  `Enfermedades_Alergias` text NOT NULL,
  `Medicamentos` text NOT NULL,
  `Fecha_Admision` date NOT NULL,
  `observacion` text NOT NULL,
  `Foto` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Id_Departamento` int(11) NOT NULL,
  `Nombre_Departamento` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `Id_Docente` int(11) NOT NULL,
  `Nombre_Docente` text NOT NULL,
  `Apellido_Docente` text NOT NULL,
  `Especialidad` text NOT NULL,
  `DUI` text NOT NULL,
  `Escalafón` int(11) NOT NULL,
  `Foto` text NOT NULL,
  `Id_Religion` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `Id_Estado` int(11) NOT NULL,
  `Nombre_Estado` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `falta`
--

CREATE TABLE `falta` (
  `Id_Falta` int(11) NOT NULL,
  `Nombre_Falta` text NOT NULL,
  `Id_TipoFalta` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `falta_aplicada`
--

CREATE TABLE `falta_aplicada` (
  `Id_FaltaAplicada` int(11) NOT NULL,
  `Id_Docente` int(11) NOT NULL,
  `Id_Estudiante` int(11) NOT NULL,
  `Fecha_Falta` date NOT NULL,
  `Id_Falta` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Id_Genero` int(11) NOT NULL,
  `Nombre_Genero` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `Id_Grado` int(11) NOT NULL,
  `Nombre_Grado` text NOT NULL,
  `Id_Docente` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `Id_Horario` int(11) NOT NULL,
  `Id_Hora` int(11) NOT NULL,
  `Id_Grado` int(11) NOT NULL,
  `Id_Materia` int(11) NOT NULL,
  `Dia_Semana` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_clase`
--

CREATE TABLE `hora_clase` (
  `Id_Hora` int(11) NOT NULL,
  `desde` time NOT NULL,
  `hasta` time NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `Id_Materia` int(11) NOT NULL,
  `Nombre_Materia` text NOT NULL,
  `Id_Docente` int(11) NOT NULL,
  `Id_Grado` int(11) NOT NULL,
  `Eval_Mined` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_transporte`
--

CREATE TABLE `medio_transporte` (
  `Id_Medio` int(11) NOT NULL,
  `Nombre_Medio` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `Id_Municipio` int(11) NOT NULL,
  `Nombre_Municipio` text NOT NULL,
  `Id_Departamento` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `Id_Nota` int(11) NOT NULL,
  `Id_Tarea` int(11) NOT NULL,
  `Id_Alumno` int(11) NOT NULL,
  `Nota_Obtenida` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `Id_Observacion` int(11) NOT NULL,
  `Detalle_Observacion` text NOT NULL,
  `Id_Alumno` int(11) NOT NULL,
  `Fecha_Observacion` date NOT NULL,
  `Id_Docente` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `Id_Pago` int(11) NOT NULL,
  `Id_Alumno` int(11) NOT NULL,
  `Mes` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodo` (
  `Id_Periodo` int(11) NOT NULL,
  `desde` time NOT NULL,
  `hasta` time NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `religion`
--

CREATE TABLE `religion` (
  `Id_Religion` int(11) NOT NULL,
  `Nombre_Religion` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `Id_Tarea` int(11) NOT NULL,
  `Nombre_Tarea` text NOT NULL,
  `Descripcion_Tarea` text NOT NULL,
  `Id_Materia` int(11) NOT NULL,
  `ponderacion` int(11) NOT NULL,
  `Fecha_Entrega` date NOT NULL,
  `Id_Periodo` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_falta`
--

CREATE TABLE `tipo_falta` (
  `Id_TipoFalta` int(11) NOT NULL,
  `Tipo_Falta` text NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`NIE`),
  ADD KEY `Id_Genero` (`Id_Genero`),
  ADD KEY `Id_Estado` (`Id_Estado`),
  ADD KEY `Id_Medio` (`Id_Medio`),
  ADD KEY `Id_Municipio` (`Id_Municipio`),
  ADD KEY `Id_Religion` (`Id_Religion`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Id_Departamento`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`Id_Docente`),
  ADD KEY `Id_Religion` (`Id_Religion`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`Id_Estado`);

--
-- Indices de la tabla `falta`
--
ALTER TABLE `falta`
  ADD PRIMARY KEY (`Id_Falta`),
  ADD KEY `Id_TipoFalta` (`Id_TipoFalta`);

--
-- Indices de la tabla `falta_aplicada`
--
ALTER TABLE `falta_aplicada`
  ADD PRIMARY KEY (`Id_FaltaAplicada`),
  ADD KEY `Id_Docente` (`Id_Docente`),
  ADD KEY `Id_Estudiante` (`Id_Estudiante`),
  ADD KEY `Id_Falta` (`Id_Falta`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Id_Genero`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`Id_Grado`),
  ADD KEY `Id_Docente` (`Id_Docente`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`Id_Horario`),
  ADD KEY `Id_Hora` (`Id_Hora`),
  ADD KEY `Id_Grado` (`Id_Grado`),
  ADD KEY `Id_Materia` (`Id_Materia`);

--
-- Indices de la tabla `hora_clase`
--
ALTER TABLE `hora_clase`
  ADD PRIMARY KEY (`Id_Hora`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`Id_Materia`),
  ADD KEY `Id_Docente` (`Id_Docente`),
  ADD KEY `Id_Grado` (`Id_Grado`);

--
-- Indices de la tabla `medio_transporte`
--
ALTER TABLE `medio_transporte`
  ADD PRIMARY KEY (`Id_Medio`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`Id_Municipio`),
  ADD KEY `Id_Departamento` (`Id_Departamento`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`Id_Nota`),
  ADD KEY `Id_Tarea` (`Id_Tarea`),
  ADD KEY `Id_Alumno` (`Id_Alumno`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`Id_Observacion`),
  ADD KEY `Id_Alumno` (`Id_Alumno`),
  ADD KEY `Id_Docente` (`Id_Docente`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`Id_Pago`),
  ADD KEY `Id_Alumno` (`Id_Alumno`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`Id_Periodo`);

--
-- Indices de la tabla `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`Id_Religion`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`Id_Tarea`),
  ADD KEY `Id_Materia` (`Id_Materia`),
  ADD KEY `Id_Periodo` (`Id_Periodo`);

--
-- Indices de la tabla `tipo_falta`
--
ALTER TABLE `tipo_falta`
  ADD PRIMARY KEY (`Id_TipoFalta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `Id_Departamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `Id_Docente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `Id_Estado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `falta`
--
ALTER TABLE `falta`
  MODIFY `Id_Falta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `falta_aplicada`
--
ALTER TABLE `falta_aplicada`
  MODIFY `Id_FaltaAplicada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `Id_Genero` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `Id_Grado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `Id_Horario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hora_clase`
--
ALTER TABLE `hora_clase`
  MODIFY `Id_Hora` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `Id_Materia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medio_transporte`
--
ALTER TABLE `medio_transporte`
  MODIFY `Id_Medio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `Id_Municipio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `Id_Nota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `Id_Observacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `Id_Pago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodo`
  MODIFY `Id_Periodo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `religion`
--
ALTER TABLE `religion`
  MODIFY `Id_Religion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `Id_Tarea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_falta`
--
ALTER TABLE `tipo_falta`
  MODIFY `Id_TipoFalta` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`Id_Genero`) REFERENCES `genero` (`Id_Genero`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`NIE`) REFERENCES `observacion` (`Id_Alumno`),
  ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`Id_Religion`) REFERENCES `religion` (`Id_Religion`),
  ADD CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`Id_Medio`) REFERENCES `medio_transporte` (`Id_Medio`),
  ADD CONSTRAINT `alumno_ibfk_5` FOREIGN KEY (`Id_Municipio`) REFERENCES `municipio` (`Id_Municipio`),
  ADD CONSTRAINT `alumno_ibfk_6` FOREIGN KEY (`Id_Estado`) REFERENCES `estado_civil` (`Id_Estado`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`Id_Departamento`) REFERENCES `municipio` (`Id_Departamento`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`Id_Religion`) REFERENCES `religion` (`Id_Religion`);

--
-- Filtros para la tabla `falta`
--
ALTER TABLE `falta`
  ADD CONSTRAINT `falta_ibfk_1` FOREIGN KEY (`Id_Tipofalta`) REFERENCES `tipo_falta` (`Id_Tipofalta`);

--
-- Filtros para la tabla `falta_aplicada`
--
ALTER TABLE `falta_aplicada`
  ADD CONSTRAINT `falta_aplicada_ibfk_1` FOREIGN KEY (`Id_Falta`) REFERENCES `tipo_falta` (`Id_Tipofalta`),
  ADD CONSTRAINT `falta_aplicada_ibfk_2` FOREIGN KEY (`Id_Estudiante`) REFERENCES `alumno` (`NIE`),
  ADD CONSTRAINT `falta_aplicada_ibfk_3` FOREIGN KEY (`Id_Docente`) REFERENCES `docente` (`Id_Docente`);

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`Id_Docente`) REFERENCES `docente` (`Id_Docente`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`Id_Hora`) REFERENCES `hora_clase` (`Id_Hora`),
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`Id_Materia`) REFERENCES `materia` (`Id_Materia`),
  ADD CONSTRAINT `horario_ibfk_3` FOREIGN KEY (`Id_Grado`) REFERENCES `grado` (`Id_grado`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`Id_Docente`) REFERENCES `docente` (`Id_Docente`),
  ADD CONSTRAINT `materia_ibfk_2` FOREIGN KEY (`Id_Grado`) REFERENCES `grado` (`Id_grado`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`NIE`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`Id_Tarea`) REFERENCES `tarea` (`Id_Tarea`);

--
-- Filtros para la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD CONSTRAINT `observacion_ibfk_1` FOREIGN KEY (`Id_Docente`) REFERENCES `docente` (`Id_Docente`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`NIE`);

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`Id_Materia`) REFERENCES `materia` (`Id_Materia`),
  ADD CONSTRAINT `tarea_ibfk_2` FOREIGN KEY (`Id_Periodo`) REFERENCES `periodos` (`Id_Periodo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
