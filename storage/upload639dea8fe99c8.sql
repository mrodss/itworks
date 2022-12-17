-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `extrato`;
CREATE TABLE `extrato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valor` decimal(10,2) NOT NULL,
  `movimentacao` enum('CREDITO','DEBITO') NOT NULL,
  `dataRegistro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `extrato` (`id`, `valor`, `movimentacao`, `dataRegistro`) VALUES
(1,	10.99,	'CREDITO',	'2022-12-10 14:48:30'),
(2,	10.99,	'CREDITO',	'2022-12-10 14:50:06'),
(3,	10.99,	'CREDITO',	'2022-12-10 14:50:19'),
(4,	10.99,	'CREDITO',	'2022-12-10 14:52:50'),
(5,	10.99,	'CREDITO',	'2022-12-10 16:11:46'),
(6,	12.00,	'CREDITO',	'2022-12-10 19:10:10'),
(7,	12.00,	'CREDITO',	'2022-12-10 19:10:14'),
(8,	12.00,	'CREDITO',	'2022-12-10 19:10:53'),
(9,	12.00,	'CREDITO',	'2022-12-10 19:11:28'),
(10,	12.00,	'CREDITO',	'2022-12-10 19:11:54'),
(11,	12.00,	'CREDITO',	'2022-12-10 19:13:04'),
(12,	12.00,	'CREDITO',	'2022-12-10 19:13:34'),
(13,	12.00,	'CREDITO',	'2022-12-10 19:14:51'),
(14,	12.00,	'CREDITO',	'2022-12-10 19:14:59'),
(15,	78.00,	'CREDITO',	'2022-12-10 19:15:15'),
(16,	150.00,	'CREDITO',	'2022-12-10 19:16:31');

-- 2022-12-10 19:19:26
