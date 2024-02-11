SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Coupons`;
CREATE TABLE `Coupons`
(
    `ID`         int(11) NOT NULL AUTO_INCREMENT,
    `Percentage` int(11) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

INSERT INTO `Coupons` (`ID`, `Percentage`)
VALUES (1, 10),
       (2, 25),
       (3, 30),
       (4, 50);

DROP TABLE IF EXISTS `Products`;
CREATE TABLE `Products`
(
    `ID`    int(11)      NOT NULL AUTO_INCREMENT,
    `Name`  varchar(255) NOT NULL,
    `Price` float        NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;

INSERT INTO `Products` (`ID`, `Name`, `Price`)
VALUES (1, 'Super Mario Galaxy', 60),
       (2, 'The Legend of Zelda: Twilight Princess', 50);
