-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2018 a las 07:03:15
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_asr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_caract_categoria`
--

CREATE TABLE `t_caract_categoria` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `nombre_in` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_caract_categoria`
--

INSERT INTO `t_caract_categoria` (`id`, `nombre_es`, `nombre_in`, `categoria`) VALUES
(5, 'sdf', 'Awareness level 10 hours', 11),
(6, 'Nivel de Primera Respuesta en Aguas Rápidas \"OPS\" 	32 Horas', 'First Response Level in Fast Waters \"OPS\" 32 Hours', 11),
(8, 'Técnico para recate en Aguas Rápidas Nivel Avanzado	36 horas', ' Technician for recate in Fast Waters Advanced Level 36 hours', 11),
(9, 'Recuperación en Aguas Rápidas Nivel Especialista	27 horas', ' Recovery in Fast Waters Specialist Level 27 hours', 11),
(10, 'Técnico de Rescate en Aguas Claras Nivel 1	 32 horas', ' Rescue Technician in Clear Water Level 1 32 hours', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_caract_curso`
--

CREATE TABLE `t_caract_curso` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(100) COLLATE utf8_bin NOT NULL,
  `nombre_in` varchar(100) COLLATE utf8_bin NOT NULL,
  `descri_es` varchar(300) COLLATE utf8_bin NOT NULL,
  `descri_in` varchar(300) COLLATE utf8_bin NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_caract_curso`
--

INSERT INTO `t_caract_curso` (`id`, `nombre_es`, `nombre_in`, `descri_es`, `descri_in`, `curso`) VALUES
(3, 'Duración', 'Duration', '2 días, 1 noche', '2 days, 1 night', 12),
(4, 'Precio', 'Price', '$ 125.00', '$ 125.00', 12),
(5, 'Datos', 'Data', 'Las fechas de este curso varían, póngase en contacto con nosotros para saber cuándo el próximo curso está programado', 'Las fechas de este curso varían, póngase en contacto con nosotros para saber cuándo el próximo curso está programado', 12),
(8, 'sdf', 'dfgb', 'fg', 's', 12),
(9, 'fecha inicio', 'fecha inicio', 'Iniciamos el lunes', 'Iniciamos el lunes', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categoria`
--

CREATE TABLE `t_categoria` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombre_in` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `img` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_categoria`
--

INSERT INTO `t_categoria` (`id`, `nombre_es`, `nombre_in`, `img`) VALUES
(8, 'WFA(Primeros)', 'WFA(First aid)', './public/images/imgCategorias/Prime.jpg'),
(9, 'CPR ', 'CPR ', './public/images/imgCategorias/rcp.jpg'),
(10, 'TRR(Cuerda)', 'TRR(Rope)', './public/images/imgCategorias/cuerd.jpg'),
(11, 'WRT/SRT(Agua)', 'WRT/SRT(water)', './public/images/imgCategorias/Agua.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_comentario`
--

CREATE TABLE `t_comentario` (
  `id` int(11) NOT NULL,
  `comentario` text COLLATE utf8_bin,
  `persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_comentario`
--

INSERT INTO `t_comentario` (`id`, `comentario`, `persona`) VALUES
(10, 'werwerwer', 16),
(12, 'afgsdf', 17),
(13, 'Mi primer comentario', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_curso`
--

CREATE TABLE `t_curso` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombre_in` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descripcion_es` text COLLATE utf8_bin,
  `descripcion_in` text COLLATE utf8_bin,
  `resumen_es` text COLLATE utf8_bin,
  `resumen_in` text COLLATE utf8_bin,
  `pre_requisitos_es` text COLLATE utf8_bin,
  `pre_requisitos_in` text COLLATE utf8_bin,
  `activo` tinyint(4) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `pais` varchar(150) COLLATE utf8_bin NOT NULL,
  `instructor` int(11) NOT NULL,
  `latitud` decimal(17,14) NOT NULL,
  `longitud` decimal(16,14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_curso`
--

INSERT INTO `t_curso` (`id`, `nombre_es`, `nombre_in`, `descripcion_es`, `descripcion_in`, `resumen_es`, `resumen_in`, `pre_requisitos_es`, `pre_requisitos_in`, `activo`, `categoria`, `nivel`, `pais`, `instructor`, `latitud`, `longitud`) VALUES
(12, 'Primer Respuesta en Aguas Nivel Básico2', 'First Response in Water Basic Level', 'El Curso de Concientización: Rescate en Agua está diseñado para cualquier que responda, quien en el desempeño de sus funciones, pueda ser el primero en escena en un incidente de agua. Este curso no proporciona a los estudiantes las habilidades para realizar rescates, sino cómo responder a situaciones de rescate acuático.', 'The Awareness Course: Water Rescue is designed for anyone who responds, who in the performance of their duties, can be the first on the scene in a water incident. This course does not provide students with the skills to perform rescues, but rather how to respond to water rescue situations.', '* Presenta a los estudiantes problemas de rescate acuático\r\n<br>\r\n* Enseña los procedimientos necesarios para responder a una inundación repentina, \r\ndesastres a grande escala y situaciones en temporada de inundaciones.', '* Presents students with water rescue problems\r\n<br>\r\n* Teach the necessary procedures to respond to a flash flood,\r\nlarge-scale disasters and situations in flood season.', 'No hay requisitos previos para Concientizar en Rescate de Agua', 'There are no prerequisites to Raise Water Rescience', 1, 11, 7, '1', 16, '17.38806439505228', '-90.01084076636474'),
(13, 'Segundo Curso', 'Segundo Curso in', 'Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol', 'Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol', 'Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol', 'Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol', 'Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol', 'Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol Esta es la descripcopn en espanol', 1, 8, 7, '1', 16, '10.25869118746834', '-84.10955570825035');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_detalle_curso`
--

CREATE TABLE `t_detalle_curso` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombre_in` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `detalle_es` text COLLATE utf8_bin,
  `detalle_in` text COLLATE utf8_bin,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_detalle_involucrados`
--

CREATE TABLE `t_detalle_involucrados` (
  `id` int(11) NOT NULL,
  `descripcion_es` text COLLATE utf8_bin,
  `descripcion_in` text COLLATE utf8_bin,
  `persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_empresa`
--

CREATE TABLE `t_empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `mision_es` text COLLATE utf8_bin,
  `mision_in` text COLLATE utf8_bin,
  `vision_es` text COLLATE utf8_bin,
  `vision_in` text COLLATE utf8_bin,
  `numero` varchar(100) COLLATE utf8_bin NOT NULL,
  `correo` varchar(100) COLLATE utf8_bin NOT NULL,
  `historia_es` text COLLATE utf8_bin,
  `historia_in` text COLLATE utf8_bin,
  `experiencia_es` text COLLATE utf8_bin,
  `experiencia_in` text COLLATE utf8_bin,
  `horario_atencion_es` text COLLATE utf8_bin,
  `horario_atencion_in` text COLLATE utf8_bin,
  `logo_es` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `logo_in` varchar(300) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_empresa`
--

INSERT INTO `t_empresa` (`id`, `nombre`, `mision_es`, `mision_in`, `vision_es`, `vision_in`, `numero`, `correo`, `historia_es`, `historia_in`, `experiencia_es`, `experiencia_in`, `horario_atencion_es`, `horario_atencion_in`, `logo_es`, `logo_in`) VALUES
(2, 'AVENTURA SEGURIDAD Y RESCATE', 'Es proveer la mejor educación de seguridad y rescate disponible para organizaciones o individuos que buscan soluciones efectivas y prácticas para las situaciones de emergencia urbana/salvaje más comunes. A través de instrucción excepcionalmente atractiva y estimulante, aspiramos a proporcionar a todos los participantes una experiencia educativa sin precedentes, entrenándolos para las verdaderas emergencias que pueden enfrentar. ASR-AC ha estado en el negocio por más de 16 años en American Central proporcionando la más reciente información de rescate, capacitación, enfoque práctico y pruebas de equipos para los sectores públicos y privados.', 'It is to provide the best safety and rescue education available to organizations or individuals seeking effective and practical solutions for the most common urban / wild emergency situations. Through exceptionally engaging and stimulating instruction, we aim to provide all participants with an unprecedented educational experience, training them for the true emergencies they may face. ASR-AC has been in business for over 16 years at American Central providing the latest rescue information, training, hands-on approach and equipment testing for the public and private sectors.', 'Nuestra asociación se dedica a todos los aspectos de Conservación Ecológica, Preservación y Protección de los recursos naturales en América Central. La Asociación ha desarrollado un código de conducta para aplicarlo como una Regla / Parte 80 de la Ley Marítima de 1994. Esta Ley ayudará a iniciar el apoyo de las Agencias Gubernamentales para mejorar los altos estándares de conservación ambiental.\r\nComo instructores al aire libre, guías y proveedores de servicios de salud, nuestra experiencia combinada en medicina, rescate y aventura aumentará su oportunidad de aprender más sobre los ríos, el océano y los entornos montañosos que nos rodean a todos. Creemos en un objetivo común, ya sea mejorando las habilidades individuales, desafíos o manteniendo una habilidad necesaria. Estamos aquí para animarle, con el más alto nivel de seguridad y apoyo.', 'Our association is dedicated to all aspects of Ecological Conservation, Preservation and Protection of natural resources in Central America. The Association has developed a code of conduct to apply as a Rule / Part 80 of the Maritime Law of 1994. This Law will help initiate the support of Government Agencies to improve the high standards of environmental conservation.\r\nAs outdoor instructors, guides and health service providers, our combined experience in medicine, rescue and adventure will increase your opportunity to learn more about the rivers, the ocean and the mountainous environments that surround us all. We believe in a common goal, either improving individual skills, challenges or maintaining a necessary skill. We are here to encourage you, with the highest level of security and support.', '85692248', 'aventurasr17@gmail.com', 'ASR. A.C. La historia comenzó en Costa Rica y Panamá proporcionando cursos de Rescate en Aguas Rápidas al sector turístico, desde su inicio hemos crecido por demanda popular, para incluir el rescate técnico de cuerda y la medicina natural en un ambiente tropical. Nuestro enfoque entonces fue dirigido a aquellos que estaban trabajando en y alrededor de ambientes remotos con agua en movimiento. Este progreso se conoce hoy como evaluación y entrenamiento en el nivel de cumplimiento NFPA 1006 para el personal de rescate en Aguas Rápidas. Hoy nuestro enfoque ha ampliado su aplicación para incluir el nivel de conformidad NFPA 1670 dirigido a los \"estándares de operación\" del Organismo para el rescate técnico en América Central.', 'ASR. A.C. The story began in Costa Rica and Panama providing Fast Water Rescue courses to the tourism sector, since its inception we have grown by popular demand, to include technical rope rescue and natural medicine in a tropical environment. Our focus was then directed to those who were working in and around remote environments with moving water. This progress is now known as evaluation and training at the NFPA 1006 compliance level for rescue personnel in Fast Waters. Today our approach has expanded its application to include NFPA 1670 compliance level directed to the Agency\'s \"operating standards\" for the technical rescue in Central America.', 'Rescue 3 International ofrece excelentes cursos de Rescate en Aguas Rapidas y rescate técnico de cuerdas.\r\nRescue 3 es conocido por proporcionar currículo dinámico para el desarrollo constante de nuevas e innovadoras técnicas de rescate, para mejorar las viejas técnicas y para trabajar con los fabricantes para desarrollar equipos para satisfacer las necesidades de los rescatistas. El plan de estudios de Rescue 3 cumple con el estándar NFPA (National Fire and Protection Agency) para el salvamento técnico de agua y cuerdas, conocido como NFPA 1670 y 1006.<br>\r\nProporcionando a los estudiantes experiencia práctica en el mundo real, los cursos de Rescue 3 son intensivos, activos y divertidos.\r\nLos cursos ofrecen a los estudiantes las habilidades y conocimientos para evitar que se conviertan en víctimas, así como maneras seguras y efectivas de realizar rescates. Los estudiantes serán comprometidos y energizados por las manos sobre la naturaleza de los entrenamientos y saldrán preparados para las emergencias en Aguas Rapidas.', 'Rescue 3 International offers excellent courses in Fast Water Rescue and technical rope rescue.\r\nRescue 3 is known for providing dynamic curriculum for the constant development of new and innovative rescue techniques, to improve old techniques and to work with manufacturers to develop equipment to meet the needs of rescuers. The curriculum of Rescue 3 complies with the NFPA (National Fire and Protection Agency) standard for the technical rescue of water and ropes, known as NFPA 1670 and 1006.\r\n\r\nProviding students with hands-on experience in the real world, Rescue 3 courses are intensive, active and fun.\r\nThe courses offer students the skills and knowledge to prevent them from becoming victims, as well as safe and effective ways to perform rescues. The students will be committed and energized by hands on the nature of the training and will be prepared for emergencies in Aguas Rapidas.', 'De lunes a viernes de 9:00am a 4:00 pm', 'Monday through Friday from 9:00 a.m. to 4:00 p.m.', './public/images/imgEmpresa/logos/logoEs11.jpg', './public/images/imgEmpresa/logos/logoIn1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_empresa_asociada`
--

CREATE TABLE `t_empresa_asociada` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descripcion_es` text COLLATE utf8_bin,
  `descripcion_in` text COLLATE utf8_bin,
  `enlace` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `img` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_empresa_asociada`
--

INSERT INTO `t_empresa_asociada` (`id`, `nombre`, `descripcion_es`, `descripcion_in`, `enlace`, `img`) VALUES
(6, 'OIJ', 'Descripción en español.', 'Descripción en inglés.', 'https://www.poder-judicial.go.cr/oij/', './public/images/imgEmpresaAsociada/oij.jpg'),
(7, 'INA', 'Descripción en Español de la empresa asociada INA.', 'Descripción en Inglés de la empresa asociada en INA.', 'http://www.ina.ac.cr/', './public/images/imgEmpresaAsociada/ina1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_estado_matricula`
--

CREATE TABLE `t_estado_matricula` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombre_in` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_estado_matricula`
--

INSERT INTO `t_estado_matricula` (`id`, `nombre_es`, `nombre_in`) VALUES
(6, 'Matriculado', 'Registered'),
(7, 'Finalizado', 'Finalized');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_expediente_general`
--

CREATE TABLE `t_expediente_general` (
  `id` int(11) NOT NULL,
  `fecha_matriculado` date DEFAULT NULL,
  `fecha_finalizado` date DEFAULT NULL,
  `detalle` text COLLATE utf8_bin,
  `persona` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `titulo` varchar(300) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_expediente_general`
--

INSERT INTO `t_expediente_general` (`id`, `fecha_matriculado`, `fecha_finalizado`, `detalle`, `persona`, `curso`, `estado`, `titulo`) VALUES
(3, '2018-06-06', '2018-05-30', 'Con nuevo formato de fechas', 16, 12, 6, ''),
(5, '2018-05-09', '2018-05-24', 'Con input de tipo file', 17, 12, 6, './public/archivos/titulos/Documentación_APROASUR_-_copia.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_expediente_retiro_titulo`
--

CREATE TABLE `t_expediente_retiro_titulo` (
  `id` int(11) NOT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `medio_retiro` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `detalle` text COLLATE utf8_bin,
  `persona_origen` int(11) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_expediente_retiro_titulo`
--

INSERT INTO `t_expediente_retiro_titulo` (`id`, `fecha_retiro`, `medio_retiro`, `detalle`, `persona_origen`, `curso`) VALUES
(1, '2018-05-16', 'fff2', 'Retiro de titulo con materialize', 16, 12),
(3, '2018-05-08', 'Correo electronico', 'detalle de la entrega prueba', 17, 13),
(4, '2018-05-08', 'sdf', 'sdfv', 17, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_img`
--

CREATE TABLE `t_img` (
  `id` int(11) NOT NULL,
  `ruta` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `desc_es` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `desc_in` varchar(200) COLLATE utf8_bin NOT NULL,
  `titulo_es` varchar(150) COLLATE utf8_bin NOT NULL,
  `titulo_in` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_img`
--

INSERT INTO `t_img` (`id`, `ruta`, `desc_es`, `desc_in`, `titulo_es`, `titulo_in`) VALUES
(6, './public/images/imgCarousel/Agu.JPG', 'Nos preocupamos por mantener un ambiente familiar eees', 'Nos preocupamos por mantener un ambiente familiar iin', 'Compañerismo es', 'Compañerismo in'),
(8, './public/images/imgCarousel/22.jpg', 'Conocimientos amplios en CPR  que le permitirán responder en las situaciones más difíciles', 'Conocimientos amplios en CPR  que le permitirán responder en las situaciones más difíciles', 'CPR', 'CPR'),
(10, './public/images/imgCarousel/american_whitewater_overboard-620x413.jpg', 'Rescates de gran dificultad que permiten exponer a las personas a ambientes que <br> simulen posibles eventos reales', 'Rescues of great difficulty that allow exposing people to environments <br>that simulate possible real events', 'Rescates en el agua', ' Rescues in the water'),
(11, './public/images/imgCarousel/c2.png', 'Rescate con cuerdas que simulen posibles rescates difíciles en los cuales sea necesario este tipo de intervención ', '\r\nRescue with ropes that simulate possible difficult rescues in which this type of intervention is necessary', 'Rescate con cuerdas', ' Rescue with ropes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_img_empresa`
--

CREATE TABLE `t_img_empresa` (
  `empresa` int(11) NOT NULL,
  `img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_info_general_empresa`
--

CREATE TABLE `t_info_general_empresa` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombre_in` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descripcion_es` text COLLATE utf8_bin,
  `descripcion_in` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_info_general_empresa`
--

INSERT INTO `t_info_general_empresa` (`id`, `nombre_es`, `nombre_in`, `descripcion_es`, `descripcion_in`) VALUES
(5, 'Cómo organizar un curso de entrenamiento de rescate en su área', 'How to organize a rescue training course in your area', 'Además de ponerse en contacto con Aventura Seguridad y Rescate  para la disponibilidad de nuestros cursos, puede organizar su propio curso de formación.\r\nSi no puede asistir a un curso de formación que ofrecemos y tiene un mínimo de 10 participantes, no debe dudar en programar un curso específico para su grupo.\r\nTodo lo que necesitas hacer es ponerte en contacto con nosotros  y haremos todo lo posible para programar un curso para su grupo en el momento que mejor funcione para usted.', 'In addition to getting in touch with Adventure Security and Rescue for the availability of our courses, you can organize your own training course.\r\nIf you can not attend a training course that we offer and have a minimum of 10 participants, you should not hesitate to schedule a specific course for your group.\r\nAll you need to do is get in touch with us and we will do everything possible to schedule a course for your group at the time that works best for you.'),
(7, 'Práctica y Recertificación', 'Practice and Recertification', 'Al finalizar el curso de entrenamiento de Rescue 3, los estudiantes deben practicar y mantener sus habilidades de rescate. Los cursos de nivel de Operaciones y Técnicos deben ser recertificados cada tres años para mantenerse al día con los nuevos desarrollos del programa y habilidades. Los estudiantes que recertifican son elegibles para un 50% de descuento en el curso.', 'At the end of the Rescue 3 training course, students must practice and maintain their rescue skills. The Operations and Technical level courses must be recertified every three years to keep up with the new program developments and skills. Students who recertify are eligible for a 50% discount on the course.'),
(8, 'Negativa de Servicio', 'Service Refusal', 'Un instructor puede rechazar el entrenamiento a cualquier persona si él o ella siente que la participación en el curso presentaría un riesgo de la seguridad, físico o financiero a cualquier persona en el curso o a sí mismo.', 'An instructor may refuse training to anyone if he or she feels that participation in the course would present a safety, physical or financial risk to any person in the course or to himself.'),
(9, 'Tarifa de cancelación', 'Cancellation fee', 'Si Aventura Seguridad y Rescate cancela un curso de Rescue 3 International o cualquier curso de Primeros Auxilios, un reembolso completo de todas las tasas de matrícula que se hayan pagado, será devuelto dentro de un mes de la fecha de cancelación.', 'If Aventura Seguridad y Rescate cancels a Rescue 3 International course or any First Aid course, a full refund of all tuition fees paid will be returned within one month of the cancellation date.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_logros`
--

CREATE TABLE `t_logros` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombre_in` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descripcion_es` text COLLATE utf8_bin,
  `descripcion_in` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_logros`
--

INSERT INTO `t_logros` (`id`, `nombre_es`, `nombre_in`, `descripcion_es`, `descripcion_in`) VALUES
(4, 'Certificación internacional 1', 'International certification 1', 'La certificación internacional 1 es lo mas importante para poder garantizar la calidad de nuestras capacitaciones', 'The international certification 1 is the most important thing to be able to guarantee the quality of our trainings');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_nivel`
--

CREATE TABLE `t_nivel` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombre_in` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_nivel`
--

INSERT INTO `t_nivel` (`id`, `nombre_es`, `nombre_in`) VALUES
(7, 'Nivel de Conciencia', 'Conscience level');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pais`
--

CREATE TABLE `t_pais` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_pais`
--

INSERT INTO `t_pais` (`id`, `nombre`) VALUES
(1, 'Costa Rica'),
(2, 'Nicaragua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_palabras`
--

CREATE TABLE `t_palabras` (
  `id` int(11) NOT NULL,
  `palabra_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `vista` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `valor_es` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `valor_in` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_palabras`
--

INSERT INTO `t_palabras` (`id`, `palabra_key`, `vista`, `valor_es`, `valor_in`) VALUES
(1, 'titulo involucrados', 'inicio', 'Involucrados', 'Involved'),
(2, 'desc involucrados', 'inicio', 'Personal altamente calificado le atenderá en todo momento.', '\r\nHighly qualified personnel will attend you at all times.'),
(3, 'titulo cursos', 'inicio', 'Cursos', 'Courses'),
(4, 'desc cursos', 'inicio', 'Amplia gama de categorías que se ajustan a sus necesidades.', '\r\nWide range of categories that fit your needs.'),
(5, 'btn lista de cursos', 'inicio', 'Lista de cursos', 'List of courses'),
(6, 'btn comentar', 'inicio', 'Comentar', 'Comment'),
(7, 'titulo clientes', 'inicio', 'Clientes', 'Clients'),
(8, 'desc clientes', 'inicio', 'Nuestros clientes nos recomiendan por sus experiencias con nuestros paquetes', '\r\nOur clients recommend us for their experiences with our packages'),
(9, 'titulo sobre nosotros', 'inicio', 'Sobre Nosotros', 'About us'),
(10, 'btn sobre nosotros', 'inicio', 'Ver más', 'See more'),
(11, 'titulo correo', 'inicio', 'Escríbenos y pronto nos pondremos en contacto', 'Write to us and soon we will get in touch'),
(12, 'btn correo', 'inicio', 'Enviar', 'Submit'),
(13, 'contactenos de seccion sobre nosotros', 'inicio', 'Información para contactarnos', 'Information to contact us'),
(14, 'horario de seccion sobre nosotros', 'inicio', 'Lunes a Viernes de 8am a 6pm', 'Monday to Friday from 8am to 6pm'),
(15, 'mision de seccion sobre nosotros', 'inicio', 'Misión', 'Mission'),
(16, 'titulo vista', 'list cursos', 'Cursos', 'Courses'),
(17, 'desc vista', 'list cursos', 'Nuestra amplia gama de cursos se ajustan a sus necesidades,<br>cumpliendo con altos estándares de calidad ', 'Our wide range of courses are tailored to your needs,<br>meeting high quality standards'),
(18, 'btn ver curso', 'list cursos', 'Ver', 'See'),
(19, 'categoria', 'list cursos', 'Categoría', 'Category'),
(20, 'nivel', 'list cursos', 'Nivel', 'Level'),
(21, 'pais', 'list cursos', 'País', 'Country'),
(22, 'instructor', 'list cursos', 'Instructor', 'Instructor'),
(23, 'titulo vista', 'mapa', 'Cursos3', 'Courses'),
(24, 'desc vista', 'mapa', 'Ubique el curso que desea en el mapa de forma sencilla,<br>para ver mas detalles del curso, presione sobre la ventana que se muestra sobre el mapa.', 'Locate the course you want on the map in a simple way,<br> to see more details of the course, click on the window that appears on the map.'),
(25, 'titulo vista', 'condiciones', 'Condiciones', 'Terms'),
(26, 'titulo vista', 'sobre nosotros', 'Sobre nosotros', 'About us'),
(27, 'mision', 'sobre nosotros', 'Misión', 'Mission'),
(28, 'vision', 'sobre nosotros', 'Visión', 'Vision'),
(29, 'historia', 'sobre nosotros', 'Historia', '\r\nHistory'),
(30, 'experiencia', 'sobre nosotros', 'Experiencia', 'Experience'),
(31, 'contactenos', 'sobre nosotros', 'Contáctenos', 'Contact us'),
(32, 'correo', 'sobre nosotros', 'Correo', 'Mail'),
(33, 'telefono', 'sobre nosotros', 'Teléfono', 'Phone'),
(34, 'horario', 'sobre nosotros', 'Nuestro horario', 'Our schedule'),
(35, 'titulo vista', 'sesion', 'Iniciar Sesión', 'Log in'),
(36, 'desc vista', 'sesion', 'Ingresa el correo y la contraseña para iniciar sesión.', 'Enter the email and password to log in.'),
(37, 'btn ingresar', 'sesion', 'Ingresar', 'Enter'),
(38, 'menu cursos', 'all', 'Cursos', 'Courses'),
(39, 'submenu cursos', 'all', 'Lista de Cursos', 'List of Courses'),
(40, 'submenu mapa', 'all', 'Cursos en Mapa', 'Courses on Map'),
(41, 'menu sobre nosotros', 'all', 'Sobre Nosotros', 'About us'),
(42, 'menu condiciones', 'all', 'Condiciones', 'Terms'),
(43, 'menu sesion', 'all', 'Sesión', 'Session'),
(44, 'menu idioma', 'all', 'Idioma', 'Language'),
(45, 'submenu cerrar sesion', 'all', 'Cerrar Sesión', 'logout'),
(46, 'submenu mi perfil', 'all', 'Mi perfil', 'My profile'),
(47, 'submenu idioma es', 'all', 'Español', 'Spanish'),
(48, 'submenu idioma in', 'all', 'Inglés', 'English'),
(49, 'titulo vista', 'detalle de un curso', 'Detalle del Curso', 'Course Detail'),
(50, 'desc vista', 'detalle de un curso', 'A continuación se muestra el detalle del curso seleccionado', 'Below is the detail of the selected course'),
(51, 'btn listado', 'detalle de un curso', 'Lista de Cursos', 'List of Courses'),
(52, 'categoria', 'detalle de un curso', 'Categoría', 'Category'),
(53, 'nivel', 'detalle de un curso', 'Nivel', 'Level'),
(54, 'pais', 'detalle de un curso', 'País', 'Country'),
(55, 'instructor', 'detalle de un curso', 'Instructor', 'Instructor'),
(56, 'prerrequisitos', 'detalle de un curso', 'Prerrequisitos', 'Prerequisites'),
(57, 'descripcion', 'detalle de un curso', 'Descripción', 'Description'),
(58, 'correo de seccion sobre nosotros', 'inicio', 'Correo', 'E-mail'),
(59, 'telefono', 'inicio', 'Teléfono', 'Phone'),
(60, 'titulo mapa', 'inicio', 'Ubica nuestros cursos en el mapa', 'Locate our courses on the map'),
(62, 'descripcion de seccion sobre nosotros', 'inicio', 'Acerquese a los profesionales, le aconsejamos para que obtenga los beneficios deseados', '\r\nApproach the professionals, we advise you to obtain the desired benefits'),
(63, 'menu search', 'all', 'Buscar', 'search'),
(64, 'menu home', 'all', 'Inicio', 'Home'),
(65, 'menu galeria', 'all', 'Galería', 'Gallery'),
(66, 'menu contact', 'all', 'Contáctenos', 'Contact');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `primer_apellido` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cedula` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `rol` int(11) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `img` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `numero` varchar(100) COLLATE utf8_bin NOT NULL,
  `correo` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `cedula`, `activo`, `rol`, `fecha_nac`, `pais`, `pass`, `img`, `numero`, `correo`) VALUES
(16, 'Felipe', 'Nájera', 'Gómez', '208900554', 1, 2, '2018-03-09', 'Costa Rica', 'felipe123', './public/images/imgUser/felipe.jpeg', '51047796', 'felipe@gmail.com'),
(17, 'Hellen', 'Hernandez', 'Nájera', '2342341234', 1, 2, '2018-12-31', 'Costa Rica', 'hellen123', './public/images/imgUser/hellen.jpeg', '23423', 'hellen@gmail.com'),
(18, 'Gustavo', 'Nájera', 'Nájera prueba', '304900550', 1, 3, '1995-10-20', 'Costa Rica', 'tavo123', './public/images/imgUser/instructor2.jpg', '65894436', 'tavo95@gmail.com'),
(19, 'Administrador', 'adm', 'adm', '305890645', 1, 1, '2018-06-13', 'Costa Rica', 'adm123', '', '65498876', 'adm@gmail.com'),
(20, 'Gustavo', 'Najera', '304900550', 'sdf', 0, 1, '2018-05-16', 'Cota Rica', 'dvg', './public/images/imgUser/Agua.JPG', 'sd', 'sdf@dfg.com'),
(21, 'Gustavo', 'Nájera', 'Nájera', '304900550', 1, 2, '1995-10-20', 'Costa Rica', 'tav123', './public/images/imgUser/angel.jpg', '61074493', 'tavo95@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_rol`
--

CREATE TABLE `t_rol` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombre_in` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_rol`
--

INSERT INTO `t_rol` (`id`, `nombre_es`, `nombre_in`) VALUES
(1, 'Adm', 'Adm'),
(2, 'Instructor', 'Instructor'),
(3, 'estudiante', 'estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_caract_categoria`
--
ALTER TABLE `t_caract_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_caract_cat_ibfk_1` (`categoria`);

--
-- Indices de la tabla `t_caract_curso`
--
ALTER TABLE `t_caract_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_curso` (`curso`);

--
-- Indices de la tabla `t_categoria`
--
ALTER TABLE `t_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_comentario`
--
ALTER TABLE `t_comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona` (`persona`);

--
-- Indices de la tabla `t_curso`
--
ALTER TABLE `t_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `nivel` (`nivel`);

--
-- Indices de la tabla `t_detalle_curso`
--
ALTER TABLE `t_detalle_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_detalle_curso` (`curso`);

--
-- Indices de la tabla `t_detalle_involucrados`
--
ALTER TABLE `t_detalle_involucrados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona` (`persona`);

--
-- Indices de la tabla `t_empresa`
--
ALTER TABLE `t_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_empresa_asociada`
--
ALTER TABLE `t_empresa_asociada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_estado_matricula`
--
ALTER TABLE `t_estado_matricula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_expediente_general`
--
ALTER TABLE `t_expediente_general`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona` (`persona`),
  ADD KEY `curso` (`curso`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `t_expediente_retiro_titulo`
--
ALTER TABLE `t_expediente_retiro_titulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_origen` (`persona_origen`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `t_img`
--
ALTER TABLE `t_img`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_img_empresa`
--
ALTER TABLE `t_img_empresa`
  ADD KEY `empresa` (`empresa`),
  ADD KEY `img` (`img`);

--
-- Indices de la tabla `t_info_general_empresa`
--
ALTER TABLE `t_info_general_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_logros`
--
ALTER TABLE `t_logros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_nivel`
--
ALTER TABLE `t_nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_pais`
--
ALTER TABLE `t_pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_palabras`
--
ALTER TABLE `t_palabras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `t_rol`
--
ALTER TABLE `t_rol`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_caract_categoria`
--
ALTER TABLE `t_caract_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `t_caract_curso`
--
ALTER TABLE `t_caract_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `t_categoria`
--
ALTER TABLE `t_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `t_comentario`
--
ALTER TABLE `t_comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `t_curso`
--
ALTER TABLE `t_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `t_detalle_curso`
--
ALTER TABLE `t_detalle_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_detalle_involucrados`
--
ALTER TABLE `t_detalle_involucrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `t_empresa`
--
ALTER TABLE `t_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `t_empresa_asociada`
--
ALTER TABLE `t_empresa_asociada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `t_estado_matricula`
--
ALTER TABLE `t_estado_matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `t_expediente_general`
--
ALTER TABLE `t_expediente_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `t_expediente_retiro_titulo`
--
ALTER TABLE `t_expediente_retiro_titulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `t_img`
--
ALTER TABLE `t_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `t_info_general_empresa`
--
ALTER TABLE `t_info_general_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `t_logros`
--
ALTER TABLE `t_logros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `t_nivel`
--
ALTER TABLE `t_nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `t_pais`
--
ALTER TABLE `t_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `t_palabras`
--
ALTER TABLE `t_palabras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `t_rol`
--
ALTER TABLE `t_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_caract_categoria`
--
ALTER TABLE `t_caract_categoria`
  ADD CONSTRAINT `t_caract_cat_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `t_categoria` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `t_caract_curso`
--
ALTER TABLE `t_caract_curso`
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`curso`) REFERENCES `t_curso` (`id`);

--
-- Filtros para la tabla `t_comentario`
--
ALTER TABLE `t_comentario`
  ADD CONSTRAINT `t_comentario_ibfk_1` FOREIGN KEY (`persona`) REFERENCES `t_persona` (`id`);

--
-- Filtros para la tabla `t_curso`
--
ALTER TABLE `t_curso`
  ADD CONSTRAINT `t_curso_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `t_categoria` (`id`),
  ADD CONSTRAINT `t_curso_ibfk_3` FOREIGN KEY (`nivel`) REFERENCES `t_nivel` (`id`);

--
-- Filtros para la tabla `t_detalle_curso`
--
ALTER TABLE `t_detalle_curso`
  ADD CONSTRAINT `fk_t_detalle_curso` FOREIGN KEY (`curso`) REFERENCES `t_detalle_curso` (`id`);

--
-- Filtros para la tabla `t_detalle_involucrados`
--
ALTER TABLE `t_detalle_involucrados`
  ADD CONSTRAINT `t_detalle_involucrados_ibfk_1` FOREIGN KEY (`persona`) REFERENCES `t_persona` (`id`);

--
-- Filtros para la tabla `t_expediente_general`
--
ALTER TABLE `t_expediente_general`
  ADD CONSTRAINT `t_expediente_general_ibfk_1` FOREIGN KEY (`persona`) REFERENCES `t_persona` (`id`),
  ADD CONSTRAINT `t_expediente_general_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `t_curso` (`id`),
  ADD CONSTRAINT `t_expediente_general_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `t_estado_matricula` (`id`);

--
-- Filtros para la tabla `t_expediente_retiro_titulo`
--
ALTER TABLE `t_expediente_retiro_titulo`
  ADD CONSTRAINT `t_expediente_retiro_titulo_ibfk_1` FOREIGN KEY (`persona_origen`) REFERENCES `t_persona` (`id`),
  ADD CONSTRAINT `t_expediente_retiro_titulo_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `t_curso` (`id`);

--
-- Filtros para la tabla `t_img_empresa`
--
ALTER TABLE `t_img_empresa`
  ADD CONSTRAINT `t_img_empresa_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `t_empresa` (`id`),
  ADD CONSTRAINT `t_img_empresa_ibfk_2` FOREIGN KEY (`img`) REFERENCES `t_img` (`id`);

--
-- Filtros para la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD CONSTRAINT `t_persona_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `t_rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
