CREATE DATABASE IF NOT EXISTS `basefarmacia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `basefarmacia`;
CREATE TABLE IF NOT EXISTS `farmaco` (
`codFar` int(5) NOT NULL AUTO_INCREMENT,
`nomFar` varchar(15) NOT NULL,
`labFar` varchar(30) NOT NULL,
`stoFar` int(7) NOT NULL,
`preFar` int(7) NOT NULL,
`obsFar` varchar(250) NOT NULL,
PRIMARY KEY (`codFar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `farmaco` (`codFar`, `nomFar`, `labFar`, `stoFar`, `preFar`, `obsFar`) VALUES
(1, 'Aspirina', 'Bayer', 18, 5435, 'Observacion1'),
(2, 'Tapsin', 'Chile', 28, 3290, 'Observacion2');
CREATE TABLE IF NOT EXISTS `laboratorio` (
`codLab` int(5) NOT NULL AUTO_INCREMENT,
`nomLab` varchar(70) NOT NULL,
PRIMARY KEY (`codLab`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
INSERT INTO `laboratorio` (`codLab`, `nomLab`) VALUES
(1, 'Bayer'),
(2, 'Chile'),
(3, 'Ferre'),
(4, 'Pharma');