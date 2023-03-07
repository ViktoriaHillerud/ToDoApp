-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `lägenhet`;
CREATE TABLE `lägenhet` (
  `rumsnr` varchar(50) NOT NULL,
  `kvm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `datum` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cleaning_done` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rumsnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `lägenhet` (`rumsnr`, `kvm`, `datum`, `cleaning_done`) VALUES
('28',	'30',	'21-12-24',	1),
('34b',	'25',	'21-12-23',	1),
('43k',	'43',	'21-20-23',	1),
('45a',	'23',	'21-12-23',	0),
('48',	'25',	'21-21-21',	0),
('60',	'45',	'21-21-21',	0),
('67',	'34',	'21-21-21',	1);
-- 2022-11-13 22:11:35
