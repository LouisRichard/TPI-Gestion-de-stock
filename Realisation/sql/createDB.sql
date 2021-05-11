/**== TABLES USERS ==**/
CREATE TABLE `gg110_tpi`.`users` (
    `IDUsers` INT NOT NULL AUTO_INCREMENT ,
    `firstname` VARCHAR(256) NOT NULL ,
    `lastname` VARCHAR(256) NOT NULL ,
    `email` VARCHAR(256) NOT NULL ,
    `password` VARCHAR(256) NOT NULL ,
    `adminStatus` BOOLEAN NOT NULL DEFAULT FALSE ,
    `status` BOOLEAN NOT NULL DEFAULT TRUE ,
    PRIMARY KEY (`IDUsers`))
    ENGINE = InnoDB;

/**== TABLES CONSUMABLES ==**/
CREATE TABLE `gg110_tpi`.`consumables` (
    `IDConsumables` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(256) NOT NULL ,
    `stock` INT NOT NULL ,
    `FKConsumableTypes` INT NOT NULL ,
    `FKBrand` INT NOT NULL ,
    `FKConsumablesProducts` INT NOT NULL ,
    PRIMARY KEY (`IDConsumables`))
    ENGINE = InnoDB;

/**== TABLES CONSUMABLE_TYPES ==**/
CREATE TABLE `gg110_tpi`.`consumable_types` (
    `IDConsumableTypes` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(256) NOT NULL ,
    PRIMARY KEY (`IDConsumableTypes`))
    ENGINE = InnoDB;

/**== TABLES CONSUMABLES_PRODUCTS ==**/
CREATE TABLE `gg110_tpi`.`consumables_products` (
    `idConsumablesProducts` INT NOT NULL AUTO_INCREMENT ,
    `FKConsumables` INT NOT NULL ,
    `FKProducts` INT NOT NULL ,
    PRIMARY KEY (`idConsumablesProducts`))
    ENGINE = InnoDB;

/**== TABLES BRANDS ==**/
CREATE TABLE `gg110_tpi`.`brands` (
    `IDBrands` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(256) NOT NULL ,
    PRIMARY KEY (`IDBrands`))
    ENGINE = InnoDB;

/**== TABLES PRODUCTS ==**/
CREATE TABLE `gg110_tpi`.`products` (
    `IDProducts` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(256) NOT NULL ,
    `FKBrand` INT NOT NULL ,
    `FKProductTypes` INT NOT NULL ,
    `FKConsumablesProducts` INT NOT NULL ,
    PRIMARY KEY (`IDProducts`))
    ENGINE = InnoDB;

/**== TABLES PRODUCT_TYPES ==**/
CREATE TABLE `gg110_tpi`.`product_types` (
    `IDProductTypes` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(256) NOT NULL ,
    PRIMARY KEY (`IDProductTypes`))
    ENGINE = InnoDB;

/**== TABLES CONSUMABLES_USERS ==**/
CREATE TABLE `gg110_tpi`.`consumables_users` (
    `idConsumablesUsers` INT NOT NULL AUTO_INCREMENT ,
    `quantity` INT NOT NULL ,
    `date` DATE NOT NULL ,
    `FKConsumables` INT NOT NULL ,
    `FKUsers` INT NOT NULL ,
    PRIMARY KEY (`idConsumablesUsers`))
    ENGINE = InnoDB;