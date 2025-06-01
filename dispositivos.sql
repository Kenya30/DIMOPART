-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-06-2025 a las 02:38:36
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dispositivos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre` varchar(60) NOT NULL,
  `contraseña` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `contraseña`) VALUES
('Kenia', '$2y$10$DFQD7aCRkyhNpejX8hmHHeWQUVwmCtH/iDntLIUpx8sfhbTyC2SOW'),
('Sol', '$2y$10$/4iT1Q.WYu97xRwltfXPsOlvfQHkMMI6U7eFM0f/Y7LM.U7um0u06'),
('Lazaro', '$2y$10$n.5dMwa71PCFv4IpZrIPm.eu832qlWtXn0gnNdXYZE9p8sddpAy5S'),
('Arianna', '$2y$10$wxKM7Zb4a0NsKTMq0mAyEObTGNyRrITFydSwjhHER6eAVvV/WSUUy'),
('Bryan ', '$2y$10$3952XMSUjV9HYuciCuuKxeGRi7oF5z2xvoALpkvSEeaTZN./pbVGS'),
('Soledad', '$2y$10$mj9If1EUBioC61/nmQz/tuerxeYM2mfepvpvVbmSQ4ExaaSsqwJBe'),
('Leonel', '$2y$10$0ranyL9lWQ7Fxw/PglQs7uvWnZqFq4NOiajzzAWIMCkm8LMHiM0wO'),
('ale', '$2y$10$Vskwi6vPZzgL9fZtHQPCseXSwJtlVRU0itF6U0im3y6orblP5qBRe'),
('pau', '$2y$10$CNu1U1W7o.RMHg1KIzwSEuc79c/O967bvSV4a1VNRMdybKYRu0Wb6'),
('Ivon Rodriguez', '$2y$10$WrElrxK02Wlr43nUrpuUbeUW6QIL2nzB8mmyQ4NMYrSZyGyDWUaCG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
