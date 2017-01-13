--
-- Base de datos: `cetis_157`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `capacidad` int(2) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id_aula`, `nombre`, `capacidad`, `tipo`) VALUES
(1, 'PruebaAula', 60, 'Taller'),
(2, 'Inglés', 30, 'General'),
(4, 'Asesoría Académica', 10, 'General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id_domicilio` int(11) NOT NULL,
  `id_maestro` int(4) NOT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`id_domicilio`, `id_maestro`, `calle`, `numero`, `colonia`, `localidad`, `estado`) VALUES
(3, 3, 'Conocida', 35, 'Centro', 'Colima', 'Colima'),
(4, 4, 'Av. Felipe Sevilla del Río', 1344, 'Diezmo', 'Villa de Álvarez', 'Colima'),
(5, 5, 'Francisco y Madero', 83, 'Tulipanes', 'Colima', 'Colima'),
(6, 6, 'Francisco y Madero', 83, 'Tulipanes', 'Colima', 'Colima'),
(7, 7, 'centro', 1, 'Centro', 'Colima', 'Colima'),
(8, 8, 'Ole', 2, 'San josé', 'Villa de alvarez', 'Colima'),
(9, 9, 'Flores', 4, 'Jose', 'Colima', 'Colima'),
(10, 10, 'Centro', 5, 'Centro', 'Tecoman', 'Colima'),
(11, 11, 'Micho', 29, 'Centro', 'Ixtlahuacan', 'Colima'),
(12, 12, 'Villa', 37, 'Jazmin', 'Manzanillo', 'Colima'),
(13, 13, 'Michoacan', 34, 'Centro', 'Ixtlahuacan', 'Colima'),
(14, 14, 'Santiago', 3, 'Chile', 'Colima', 'Colima'),
(15, 15, 'Hola', 9, 'Seb', 'Colima', 'Colima'),
(16, 16, 'Puerta', 12, 'Hierro', 'Villa de alvarez', 'Colima'),
(17, 17, 'Eliseo', 39, 'Horlando', 'Colima', 'Colima'),
(18, 18, 'Siempre viva', 69, 'Jazmines', 'Comala', 'Colima'),
(19, 19, 'Sevilla', 89, 'Centro', 'Colima', 'Colima'),
(20, 20, 'Benito', 49, 'Los Andares', 'Amería', 'Colima'),
(21, 21, 'Venustiano Carranza', 982, 'Vista hermosa', 'Colima', 'Colima'),
(22, 22, 'Michoacán', 94, 'Centro', 'Comala', 'Colima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(2) NOT NULL,
  `semestre` int(1) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `cantidad_alumno` int(2) DEFAULT NULL,
  `carrera` varchar(35) NOT NULL,
  `ciclo_escolar` varchar(80) NOT NULL,
  `periodo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `semestre`, `nombre`, `cantidad_alumno`, `carrera`, `ciclo_escolar`, `periodo`) VALUES
(2, 0, 'PruebaGrupo', 30, '', '', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id_maestro` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_paterno` varchar(30) NOT NULL,
  `apellido_materno` varchar(30) NOT NULL,
  `rfc` varchar(15) NOT NULL,
  `disponibilidad` varchar(20) NOT NULL,
  `hora` int(2) DEFAULT NULL,
  `asignatura` varchar(20) DEFAULT NULL,
  `clave_presupuestal_1` varchar(20) NOT NULL,
  `clave_presupuestal_2` varchar(20) NOT NULL DEFAULT '',
  `clave_presupuestal_3` varchar(20) NOT NULL DEFAULT '',
  `sexo` varchar(15) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` int(30) DEFAULT NULL,
  `funcion` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`id_maestro`, `nombre`, `apellido_paterno`, `apellido_materno`, `rfc`, `disponibilidad`, `hora`, `asignatura`, `clave_presupuestal_1`, `clave_presupuestal_2`, `clave_presupuestal_3`, `sexo`, `curp`, `email`, `telefono`, `funcion`, `tipo`, `horario_inicio`, `horario_final`) VALUES
(3, 'Fulanito', 'Nepomuceno', 'Ríos', 'FNRI161118HCM', 'Por asignatura', NULL, 'Compactas', 'clavepresupuestal1', 'clavepresupuestal2', 'clavepresupuestal3', 'Masculino', 'FNRI161118HCMCOL02', 'virtual_full@gmail.com', 2147483647, 'Administrativo -> Secretari@', 'Base', '08:00:00', '13:00:00'),
(4, 'Efraín', 'Ramírez', 'Santillan', 'ERAS781024EGE', 'Por hora', 20, NULL, 'clavepresupuestal1', '', '', 'Masculino', 'ERAS781024HCMZLL65', 'e.ramirez@gmail.com', 2147483647, 'Docente', 'Base', '07:00:00', '03:00:00'),
(5, 'Felipe de Jesús', 'Macias', 'Pérez', 'MAPF851010EIA', 'Por hora', 40, NULL, 'clavepresupuestal1', '', '', 'Masculino', 'MAPF851010HCMZOO24', 'macias.perez@gmail.com', 2147483647, 'Docente', 'Base', '07:00:00', '13:00:00'),
(6, 'Felipe de Jesús', 'Macias', 'Pérez', 'MAPF851010EIA', 'Por hora', 40, NULL, 'clavepresupuestal1', '', '', 'Masculino', 'MAPF851010HCMZOO24', 'macias.perez@gmail.com', 2147483647, 'Docente', 'Base', '07:00:00', '13:00:00'),
(7, 'Jorge', 'Martinez', 'Perez', 'JMPE161114HCM', 'Por asignatura', NULL, 'Compactas', 'Sin clave presupuest', '', '', 'Masculino', 'JMPE161114HCMCOL02', 'jorge@hotmail.com', 1234567896, 'Docente', 'Temporal', '06:00:00', '09:00:00'),
(8, 'Joel', 'Lizardi', 'Alvarado', 'JLAL201293HCM', 'Por hora', 2, NULL, 'Sin clave presupuest', '', '', 'Masculino', 'JLAL201293HCMCOL02', 'joel@gmail.com', 2147483647, 'Con descarga', 'Base', '06:00:00', '11:00:00'),
(9, 'Osvaldo', 'Rodriguez', 'Leal', 'ORLE121280HCM', 'Por hora', 2, NULL, 'Sin clave presupuest', '', '', 'Masculino', 'ORLE121280HCMCOL03', 'osv.@gmail.com', 2147483647, 'Técnico Docente', 'Temporal', '09:00:00', '11:00:00'),
(10, 'Elisa', 'Mariano', 'Galvan', 'EMGA121212HCM', 'Por asignatura', NULL, 'Compactas', 'Sin clave presupuest', '', '', 'Masculino', 'EMGA121212HCMCOL02', 'eli@gmail.com', 2147483647, 'Docente', 'Base', '07:00:00', '12:00:00'),
(11, 'Jesus Andres', 'Mariano ', 'Galvan', 'JAMG300380HCM', 'Por hora', 3, NULL, 'Sin clave presupuest', '', '', 'Masculino', 'JAMG300380HCMCOL02', 'jes@gmail.com', 2147483647, 'Administrativo -> Secretari@', 'Base', '07:00:00', '16:00:00'),
(12, 'Silvia', 'Ruelas', 'Manzano', 'SIRM230970HCM', 'Por asignatura', NULL, 'Completas', 'Sin clave presupuest', '', '', 'Masculino', 'SIRM230970HCMCOL02', 'sil@hotmail.com', 2147483647, 'Con descarga', 'Base', '10:00:00', '16:00:00'),
(13, 'Ana', 'Mariano', 'Lopez', 'ANML102620HCM', 'Por asignatura', NULL, 'Completas', 'Sin clave presupuest', '', '', 'Femenino', 'ANML102620HCMCOL02', 'ana@gmail.com', 2147483647, 'Administrativo -> Contador', 'Base', '06:00:00', '16:00:00'),
(14, 'Perla', 'Lopez', 'Origin', 'PLOR092990HCM', 'Por hora', 5, NULL, 'Sin clave presupuest', '', '', 'Femenino', 'PLOR092990HCMCOL02', 'per@gmail.com', 2147483647, 'Con descarga', 'Base', '06:00:00', '16:00:00'),
(15, 'Ameria', 'Galvan', 'Perez', 'AMGP274082HCM', 'Por hora', 10, NULL, 'Sin clave presupuest', '', '', 'Masculino', 'AMGP274082HCMCOL02', 'am@hotmail.com', 2147483647, 'Docente', 'Temporal', '06:00:00', '16:00:00'),
(16, 'Ismael', 'Sanchez', 'Leon', 'ISLE028374HCM', 'Por asignatura', NULL, 'Completas', 'Sin clave presupuest', '', '', 'Masculino', 'ISLE028374HCMCOL02', 'ism@gmail.com', 2147483647, 'Técnico Docente', 'Temporal', '06:00:00', '09:00:00'),
(17, 'Brenda', 'Chavez', 'Vergara', 'BCVE092909HCM', 'Por hora', 2, NULL, 'Sin clave presupuest', '', '', 'Femenino', 'BCVE092909HCMCOL02', 'bren.@yahoo.com', 2147483647, 'Administrativo -> Contador', 'Base', '09:00:00', '16:00:00'),
(18, 'Sabrina', 'Orlando', 'Juarez', 'SOJU932027HCM', 'Por asignatura', NULL, 'Completas', 'Sin clave presupuest', '', '', 'Femenino', 'SOJU932027HCMCOL02', 'sabrina@gmail.com', 2147483647, 'Técnico Docente', 'Base', '06:00:00', '12:00:00'),
(19, 'Toti', 'Hernandez', 'Gonzales', 'THGO038499HCM', 'Por asignatura', NULL, 'Completas', 'Sin clave presupuest', '', '', 'Masculino', 'THGO038499HCMCOL02', 'pedro@yahoo.com', 2147483647, 'Administrativo -> Algún otro', 'Temporal', '06:00:00', '16:00:00'),
(20, 'María', 'González', 'Jazmín', 'MGJA748264HCM', 'Por hora', 2, NULL, 'Sin clave presupuest', '', '', 'Femenino', 'MGJA748264HCMCOL02', 'maria@gmail.com', 2147483647, 'Técnico Docente', 'Temporal', '01:00:00', '03:00:00'),
(21, 'Mayra', 'León', 'Ortega', 'MLOR746284HCM', 'Por asignatura', NULL, 'Compactas', 'Sin clave presupuest', '', '', 'Femenino', 'MLOR746284HCMCOL02', 'mayra@gmail.com', 2147483647, 'Con descarga', 'Base', '09:00:00', '11:00:00'),
(22, 'Polinesio', 'Huerta', 'Nuñez', 'PHNU748293HCM', 'Por asignatura', NULL, 'Completas', 'Sin clave presupuest', '', '', 'Masculino', 'PHNU748293HCMCOL02', 'poli@hotmail.com', 2147483647, 'Técnico Docente', 'Temporal', '08:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `hora` int(2) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre`, `hora`, `tipo`) VALUES
(1, 'PruebaMateria', NULL, NULL),
(2, NULL, NULL, NULL),
(3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_profesiografico`
--

CREATE TABLE `perfil_profesiografico` (
  `id_perfil` int(11) NOT NULL,
  `id_maestro` int(4) NOT NULL,
  `nivel_academico` varchar(100) NOT NULL,
  `carrera` varchar(300) NOT NULL,
  `especialidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_profesiografico`
--

INSERT INTO `perfil_profesiografico` (`id_perfil`, `id_maestro`, `nivel_academico`, `carrera`, `especialidad`) VALUES
(3, 3, 'Licenciado(a)', 'Administración de Empresas', 'Gestión'),
(4, 4, 'Licenciado(a)', 'Matemáticas Avanzadas', 'Matemáticas'),
(5, 6, 'Licenciado(a)', 'Matemáticas', 'Matemáticas Avanzadas'),
(6, 7, 'Licenciado(a)', 'Cibernética', 'Sistemas'),
(7, 8, 'Maestría', 'Sistemas Computacionales', 'Computacion'),
(8, 9, 'Técnico Superior Universitario', 'Civil', 'Civil'),
(9, 10, 'Maestría', 'Arquitecto', 'Dibujo'),
(10, 11, 'Licenciado(a)', 'Topográfico', 'Topografia'),
(11, 12, 'Licenciado(a)', 'Ciencias de la Informática', 'Informatica'),
(12, 13, 'Bachiller', 'Actuaría', 'Ciencias'),
(13, 14, 'Bachiller', 'Ciencias Matemáticas', 'Ciencias'),
(14, 15, 'Técnico Superior Universitario', 'Electromecánica', 'mecánica'),
(15, 16, 'Doctor(a)', 'Electrónica', 'Mecanica'),
(16, 17, 'Licenciado(a)', 'Contaduría', 'Contabilidad'),
(17, 18, 'Técnico Superior Universitario', 'Electrónica', 'Electronica'),
(18, 19, 'Bachiller', 'Agronomía', 'Agronomía'),
(19, 20, 'Licenciado(a)', 'Industrial Mecánico', 'Mecánica'),
(20, 21, 'Maestría', 'Electromecánica', 'Mecánica'),
(21, 22, 'Licenciado(a)', 'Telemática', 'Telemática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'prueba', '4c882dcb24bcb1bc225391a602feca7c'),
(2, 'Administrador', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id_domicilio`),
  ADD KEY `id_maestro` (`id_maestro`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id_maestro`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `perfil_profesiografico`
--
ALTER TABLE `perfil_profesiografico`
  ADD PRIMARY KEY (`id_perfil`),
  ADD KEY `id_maestro` (`id_maestro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id_maestro` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `perfil_profesiografico`
--
ALTER TABLE `perfil_profesiografico`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`id_maestro`) REFERENCES `maestro` (`id_maestro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil_profesiografico`
--
ALTER TABLE `perfil_profesiografico`
  ADD CONSTRAINT `perfil_profesiografico_ibfk_1` FOREIGN KEY (`id_maestro`) REFERENCES `maestro` (`id_maestro`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
