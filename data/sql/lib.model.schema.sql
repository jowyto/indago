
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- formato
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `formato`;

CREATE TABLE `formato`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `formato` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- compresion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `compresion`;

CREATE TABLE `compresion`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `compresion` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dataset
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dataset`;

CREATE TABLE `dataset`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `dataset` VARCHAR(255) NOT NULL,
    `url` TEXT NOT NULL,
    `descripcion` TEXT,
    `tags` TEXT,
    `formato_id` INTEGER,
    `compresion_id` INTEGER,
    `cabeceras` TEXT,
    `created_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `dataset_FI_1` (`formato_id`),
    INDEX `dataset_FI_2` (`compresion_id`),
    CONSTRAINT `dataset_FK_1`
        FOREIGN KEY (`formato_id`)
        REFERENCES `formato` (`id`),
    CONSTRAINT `dataset_FK_2`
        FOREIGN KEY (`compresion_id`)
        REFERENCES `compresion` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
