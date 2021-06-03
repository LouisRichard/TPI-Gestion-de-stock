/** Création de la base de données :  `gg110_tpi` **/
CREATE DATABASE IF NOT EXISTS `gg110_tpi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gg110_tpi`;


----------------------------------------------------------
/** Structure de la table `brands` **/
CREATE TABLE IF NOT EXISTS `brands` (
  `IDBrands` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`IDBrands`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/** Données de la table `brands` **/
INSERT INTO `brands` (`IDBrands`, `name`) VALUES
(1, 'Brother'),
(2, 'Xerox'),
(3, 'Canon'),
(4, 'HP'),
(5, 'Epson'),
(6, 'Konica Minolta');


----------------------------------------------------------
/** Structure de la table `consumables` **/
CREATE TABLE IF NOT EXISTS `consumables` (
  `IDConsumables` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `stock` int(11) NOT NULL,
  `FKConsumableTypes` int(11) NOT NULL,
  `FKBrand` int(11) NOT NULL,
  PRIMARY KEY (`IDConsumables`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/** Données de la table `consumables` **/
INSERT INTO `consumables` (`IDConsumables`, `name`, `stock`, `FKConsumableTypes`, `FKBrand`) VALUES
(1, 'TN324-BK', 3, 1, 6),
(2, 'TN324-C', 9, 1, 6),
(3, 'TN324-Y', 7, 1, 6),
(4, 'TN324-M', 21, 1, 6),
(5, 'TNP49-K', 23, 1, 6),
(6, 'TNP49-M', 17, 1, 6),
(7, 'TNP49-Y', 3, 1, 6),
(8, 'TNP49-C', 14, 1, 6),
(9, 'Paper XRT', 15, 3, 2),
(10, 'Paper XRT', 15, 3, 2),
(11, 'Paper XRT', 15, 3, 2),
(12, 'Paper XRT', 15, 3, 2),
(13, 'Paper XRT', 15, 3, 2),
(14, 'Paper XRT', 15, 3, 2),
(15, 'WX-103', 6, 4, 6),
(16, 'WB-P05', 9, 4, 6),
(17, 'DR311-K', 2, 2, 6),
(18, 'HP 5316', 10, 2, 4),
(21, 'ECX-Y', 7, 1, 5),
(22, 'WE-3750', 6, 4, 5);


----------------------------------------------------------
/** Doublure de structure pour la vue `consumablesInformations` **/
CREATE TABLE IF NOT EXISTS `consumablesInformations` (
`IDConsumables` int(11)
,`name` varchar(128)
,`stock` int(11)
,`type` varchar(128)
,`brand` varchar(128)
,`productName` varchar(128)
,`productType` varchar(128)
,`productBrands` varchar(128)
);


----------------------------------------------------------
/** Structure de la table `consumables_products` **/
CREATE TABLE IF NOT EXISTS `consumables_products` (
  `idConsumablesProducts` int(11) NOT NULL AUTO_INCREMENT,
  `FKConsumables` int(11) NOT NULL,
  `FKProducts` int(11) NOT NULL,
  PRIMARY KEY (`idConsumablesProducts`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/** Données de la table `consumables_products` **/
INSERT INTO `consumables_products` (`idConsumablesProducts`, `FKConsumables`, `FKProducts`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 8, 1),
(10, 14, 1),
(11, 14, 2),
(12, 15, 1),
(13, 16, 2),
(14, 17, 2),
(15, 18, 1),
(16, 19, 1),
(17, 20, 2),
(18, 21, 1),
(19, 21, 2),
(20, 22, 3);


----------------------------------------------------------
/** Structure de la table `consumables_users` **/
CREATE TABLE IF NOT EXISTS `consumables_users` (
  `idConsumablesUsers` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FKConsumables` int(11) NOT NULL,
  `FKUsers` int(11) NOT NULL,
  PRIMARY KEY (`idConsumablesUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/** Données de la table `consumables_users` **/
INSERT INTO `consumables_users` (`idConsumablesUsers`, `quantity`, `date`, `FKConsumables`, `FKUsers`) VALUES
(3, 4, '2021-05-25 12:20:26', 4, 1),
(4, 5, '2021-05-27 14:00:55', 4, 1),
(5, 3, '2021-05-27 14:01:00', 4, 1),
(6, 4, '2021-05-27 14:01:14', 4, 1),
(7, 5, '2021-05-27 14:41:37', 4, 1),
(8, 3, '2021-05-27 14:41:39', 4, 1),
(9, 4, '2021-05-27 14:41:46', 4, 1),
(10, 5, '2021-05-27 14:42:52', 4, 1),
(11, 3, '2021-05-27 14:43:34', 4, 1),
(12, 4, '2021-05-27 14:53:32', 4, 1),
(13, 5, '2021-05-28 09:44:41', 4, 1),
(14, 3, '2021-05-28 09:44:45', 4, 1),
(15, 21, '2021-05-31 09:56:26', 4, 5),
(16, 3, '2021-05-31 09:56:52', 7, 5),
(17, 6, '2021-06-01 12:12:08', 22, 1),
(18, 4, '2021-06-01 15:21:46', 1, 1),
(19, 6, '2021-06-01 15:21:52', 15, 1),
(20, 5, '2021-06-03 08:18:24', 1, 1),
(21, 3, '2021-06-03 08:18:30', 1, 1),
(22, 4, '2021-06-03 08:18:34', 3, 1),
(23, 7, '2021-06-03 08:18:39', 3, 1);


----------------------------------------------------------
/** Structure de la table `consumable_types` **/
CREATE TABLE IF NOT EXISTS `consumable_types` (
  `IDConsumableTypes` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`IDConsumableTypes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/** Données de la table `consumable_types` **/
INSERT INTO `consumable_types` (`IDConsumableTypes`, `name`) VALUES
(1, 'Toner'),
(2, 'Drum'),
(3, 'Papier'),
(4, 'Waste toner');


----------------------------------------------------------
/** Structure de la table `products` **/
CREATE TABLE IF NOT EXISTS `products` (
  `IDProducts` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `FKBrand` int(11) NOT NULL,
  `FKProductTypes` int(11) NOT NULL,
  PRIMARY KEY (`IDProducts`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/** Données de la table `products` **/
INSERT INTO `products` (`IDProducts`, `name`, `FKBrand`, `FKProductTypes`) VALUES
(1, 'C308', 6, 1),
(2, 'C3351', 6, 1),
(3, 'ET-3750', 5, 1);


----------------------------------------------------------
/** Structure de la table `product_types` **/
CREATE TABLE IF NOT EXISTS `product_types` (
  `IDProductTypes` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`IDProductTypes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/** Données de la table `product_types` **/
INSERT INTO `product_types` (`IDProductTypes`, `name`) VALUES
(1, 'Imprimante'),
(2, 'Plotter');


----------------------------------------------------------
/** Structure de la table `users` **/
CREATE TABLE IF NOT EXISTS `users` (
  `IDUsers` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `adminStatus` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/** Données de la table `users` **/
INSERT INTO `users` (`IDUsers`, `firstname`, `lastname`, `email`, `password`, `adminStatus`, `status`) VALUES
(1, 'Michael', 'Pedroletti', 'michael@pedroletti.ch', '$2y$10$H3rWZ0ugzp0.NJR4dD297uwT7Lv7uXVtDm3MAhMXdNsmz8.ySY8dm', 1, 1),
(3, 'Ernesto', 'Montemayor', 'ernesto@bati-technologie.ch', '$2y$10$f0tsa.HVZ1KlWonNW.1uQ.SSZctrGXG0pjq3bhcvcxqCi8D3AvdRW', 1, 1),
(4, 'Laurent', 'Ruchat', 'laurentruchat@bluewin.ch', '$2y$10$703Q1uqUYEZFg27.TLdky.J18fUllZjIvjMilWVnaLsWr6FJ5uz7S', 1, 1),
(5, 'Pascal', 'Benzonana', 'pascal.benzonana@cpnv.ch', '$2y$10$OXxqA836o0HwcbpRLDRkkOShvyQ3h3kvEZPPMtZKy01Ko3SU9yjgu', 0, 1),
(6, 'Pascal', 'Benzo', 'pba@cpnv.ch', '$2y$10$/lTLpJ47f53W2Ug27zF1QOQroJCGCtjVOzfMRf6wShtWY8koMXkve', 1, 1),
(7, 'Michael', 'Pedroletti', 'michael.pedroletti@cpnv.ch', '$2y$10$3M.wRdevNHME2SriA9wUNOoq78kwdeqE1jv4mbZTbKtnVdo9nYidm', 0, 1),
(8, 'Keanu', 'Trosset', 'keanu@trosset.ch', '$2y$10$GpRBHY7X/H9KO7dGu1IFYODN7CqzxY1CVefm3iiC.uRNWJ24a.f.O', 0, 1),
(10, 'Louis', 'Richard', 'louis@richard.ch', '$2y$10$Dvxlvk90XdCH/LG3z5FCC.EnmqJkcPQIY0C1bU0Oe5G/Mw0BCXy.q', 1, 1),
(11, 'Robert', 'Redford', 'rrd@cpnv.ch', '$2y$10$fFqv4BgVTW6lDb6niGKbOeUfNg1NRfvokHTShOk96SutVR2rmJ3PK', 0, 1),
(23, 'Jerome', 'Jaquemet', 'jerome@jaquemet.ch', '$2y$10$n1iDHxkHXvX08Tbx0p8SXeOws0yEcEOKGs3X/1H0AQqVzWbQYIBm6', 0, 1);


----------------------------------------------------------
/** Structure de la vue `consumablesInformations` **/
DROP TABLE IF EXISTS `consumablesInformations`;

CREATE ALGORITHM=UNDEFINED DEFINER=`gg110_michael`@`%` SQL SECURITY DEFINER VIEW `consumablesInformations`  AS  (select `consumables`.`IDConsumables` AS `IDConsumables`,`consumables`.`name` AS `name`,`consumables`.`stock` AS `stock`,`consumable_types`.`name` AS `type`,`brands`.`name` AS `brand`,`products`.`name` AS `productName`,`product_types`.`name` AS `productType`,`brandsProduct`.`name` AS `productBrands` from ((((((`consumables` join `brands` on((`consumables`.`FKBrand` = `brands`.`IDBrands`))) join `consumable_types` on((`consumables`.`FKConsumableTypes` = `consumable_types`.`IDConsumableTypes`))) join `consumables_products` on((`consumables`.`IDConsumables` = `consumables_products`.`FKConsumables`))) join `products` on((`consumables_products`.`FKProducts` = `products`.`IDProducts`))) join `product_types` on((`products`.`FKProductTypes` = `product_types`.`IDProductTypes`))) join `brands` `brandsProduct` on((`products`.`FKBrand` = `brandsProduct`.`IDBrands`)))) ;

