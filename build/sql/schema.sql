
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- baterias
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `baterias`;

CREATE TABLE `baterias`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `tipo` INTEGER NOT NULL,
    `num_serie` VARCHAR(255) NOT NULL,
    `ciclos_mant` INTEGER DEFAULT 120 NOT NULL,
    `ciclos_iniciales` INTEGER(255) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- bateriastipos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bateriastipos`;

CREATE TABLE `bateriastipos`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `volts` INTEGER NOT NULL,
    `ah` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- bodegas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bodegas`;

CREATE TABLE `bodegas`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    `cg` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `id` (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- cargadores
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cargadores`;

CREATE TABLE `cargadores`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    `tipo` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- deshabilitabt
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `deshabilitabt`;

CREATE TABLE `deshabilitabt`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `bt` INTEGER NOT NULL,
    `motivo` TEXT NOT NULL,
    `fecha_entrada` DATETIME NOT NULL,
    `fecha_salida` DATETIME NOT NULL,
    `usuario_entrada` INTEGER,
    `usuario_salida` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- deshabilitacg
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `deshabilitacg`;

CREATE TABLE `deshabilitacg`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `cg` INTEGER NOT NULL,
    `motivo` TEXT NOT NULL,
    `fecha_entrada` DATETIME NOT NULL,
    `fecha_salida` DATETIME NOT NULL,
    `usuario_entrada` INTEGER,
    `usuario_salida` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- deshabilitamc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `deshabilitamc`;

CREATE TABLE `deshabilitamc`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mc` INTEGER NOT NULL,
    `motivo` TEXT NOT NULL,
    `fecha_entrada` DATETIME NOT NULL,
    `fecha_salida` DATETIME NOT NULL,
    `usuario_entrada` INTEGER,
    `usuario_salida` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- montacargas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `montacargas`;

CREATE TABLE `montacargas`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,
    `modelo` VARCHAR(45) NOT NULL,
    `tipo` VARCHAR(45) NOT NULL,
    `ciclos_mant` INTEGER,
    `ciclos_iniciales` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- uc_configuration
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uc_configuration`;

CREATE TABLE `uc_configuration`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(150) NOT NULL,
    `value` VARCHAR(150) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- uc_pages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uc_pages`;

CREATE TABLE `uc_pages`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `page` VARCHAR(150) NOT NULL,
    `private` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- uc_permission_page_matches
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uc_permission_page_matches`;

CREATE TABLE `uc_permission_page_matches`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `permission_id` INTEGER NOT NULL,
    `page_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- uc_permissions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uc_permissions`;

CREATE TABLE `uc_permissions`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(150) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- uc_user_permission_matches
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uc_user_permission_matches`;

CREATE TABLE `uc_user_permission_matches`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL,
    `permission_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- uc_users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uc_users`;

CREATE TABLE `uc_users`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(50) NOT NULL,
    `display_name` VARCHAR(50) NOT NULL,
    `password` VARCHAR(225) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `activation_token` VARCHAR(225) NOT NULL,
    `last_activation_request` INTEGER NOT NULL,
    `lost_password_request` TINYINT(1) NOT NULL,
    `active` TINYINT(1) NOT NULL,
    `title` VARCHAR(150) NOT NULL,
    `sign_up_stamp` INTEGER NOT NULL,
    `last_sign_in_stamp` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- uso_baterias_bodega
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uso_baterias_bodega`;

CREATE TABLE `uso_baterias_bodega`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `bg` INTEGER NOT NULL,
    `bt` INTEGER NOT NULL,
    `fecha_entrada` DATETIME,
    `fecha_carga` DATETIME NOT NULL,
    `fecha_descanso` DATETIME NOT NULL,
    `fecha_salida` DATETIME,
    `usuario_entrada` INTEGER,
    `usuario_carga` INTEGER,
    `usuario_descanso` INTEGER,
    `usuario_salida` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- uso_baterias_montacargas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uso_baterias_montacargas`;

CREATE TABLE `uso_baterias_montacargas`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mc` INTEGER NOT NULL,
    `bt` INTEGER NOT NULL,
    `fecha_entrada` DATETIME NOT NULL,
    `fecha_salida` DATETIME NOT NULL,
    `usuario_entrada` INTEGER,
    `usuario_salida` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
