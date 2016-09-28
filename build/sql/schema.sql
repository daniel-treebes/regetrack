
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- baterias
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `baterias`;

CREATE TABLE `baterias`
(
    `idbaterias` INTEGER NOT NULL AUTO_INCREMENT,
    `idsucursal` INTEGER NOT NULL,
    `baterias_modelo` VARCHAR(255) NOT NULL,
    `baterias_marca` VARCHAR(45),
    `baterias_c` VARCHAR(45),
    `baterias_k` VARCHAR(45),
    `baterias_p` VARCHAR(45),
    `baterias_t` VARCHAR(45),
    `baterias_e` VARCHAR(45),
    `baterias_volts` INTEGER,
    `baterias_amperaje` INTEGER,
    `baterias_comprador` VARCHAR(255),
    `baterias_nombre` VARCHAR(255),
    `baterias_numserie` VARCHAR(255),
    `baterias_ciclosmant` INTEGER,
    `baterias_ciclosiniciales` INTEGER,
    PRIMARY KEY (`idbaterias`),
    INDEX `idsucursal` (`idsucursal`),
    CONSTRAINT `baterias_idsucursal`
        FOREIGN KEY (`idsucursal`)
        REFERENCES `sucursal` (`idsucursal`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

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
    INDEX `id` (`cg`),
    CONSTRAINT `bodegas_cg`
        FOREIGN KEY (`cg`)
        REFERENCES `cargadores` (`idcargadores`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cargadores
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cargadores`;

CREATE TABLE `cargadores`
(
    `idcargadores` INTEGER NOT NULL AUTO_INCREMENT,
    `idsucursal` INTEGER NOT NULL,
    `cargadores_modelo` VARCHAR(255) NOT NULL,
    `cargadores_marca` VARCHAR(255) NOT NULL,
    `cargadores_e` VARCHAR(45),
    `cargadores_volts` INTEGER,
    `cargadores_amperaje` INTEGER,
    `cargadores_comprador` VARCHAR(255),
    `cargadores_nombre` VARCHAR(255),
    `cargadores_numserie` VARCHAR(45),
    PRIMARY KEY (`idcargadores`),
    INDEX `idsucursal` (`idsucursal`),
    CONSTRAINT `cargadores_idsucursal`
        FOREIGN KEY (`idsucursal`)
        REFERENCES `sucursal` (`idsucursal`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

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
    PRIMARY KEY (`id`),
    INDEX `index2` (`bt`),
    CONSTRAINT `deshabilitabt_bt`
        FOREIGN KEY (`bt`)
        REFERENCES `baterias` (`idbaterias`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

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
    PRIMARY KEY (`id`),
    INDEX `index2` (`cg`),
    CONSTRAINT `deshabilitacg_cg`
        FOREIGN KEY (`cg`)
        REFERENCES `cargadores` (`idcargadores`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- deshabilitamc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `deshabilitamc`;

CREATE TABLE `deshabilitamc`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `idmontacargas` INTEGER NOT NULL,
    `motivo` TEXT NOT NULL,
    `fecha_entrada` DATETIME NOT NULL,
    `fecha_salida` DATETIME NOT NULL,
    `usuario_entrada` INTEGER,
    `usuario_salida` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `idmontacargas` (`idmontacargas`),
    INDEX `usuario_entrada` (`usuario_entrada`),
    INDEX `usuario_salida` (`usuario_salida`),
    CONSTRAINT `deshabilitamc_idmontacargas`
        FOREIGN KEY (`idmontacargas`)
        REFERENCES `montacargas` (`idmontacargas`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `deshabilitamc_usuario_entrada`
        FOREIGN KEY (`usuario_entrada`)
        REFERENCES `uc_users` (`id`),
    CONSTRAINT `deshabilitamc_usuario_salida`
        FOREIGN KEY (`usuario_salida`)
        REFERENCES `uc_users` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- empresa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa`
(
    `idempresa` INTEGER NOT NULL AUTO_INCREMENT,
    `idusuario` INTEGER NOT NULL,
    `empresa_nombre` VARCHAR(255) NOT NULL,
    `empresa_numsucursales` INTEGER NOT NULL,
    `empresa_suscripcioninicio` INTEGER NOT NULL,
    `empresa_suscripcionfin` INTEGER NOT NULL,
    PRIMARY KEY (`idempresa`),
    INDEX `Idusuario` (`idusuario`),
    CONSTRAINT `empresa_idusuario`
        FOREIGN KEY (`idusuario`)
        REFERENCES `uc_users` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- limbo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `limbo`;

CREATE TABLE `limbo`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `bt` INTEGER NOT NULL,
    `motivo` TEXT NOT NULL,
    `fecha_entrada` DATETIME NOT NULL,
    `fecha_salida` DATETIME NOT NULL,
    `usuario_entrada` INTEGER,
    `usuario_salida` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `index2` (`bt`),
    CONSTRAINT `deshabilitabt_bt0`
        FOREIGN KEY (`bt`)
        REFERENCES `baterias` (`idbaterias`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- montacargas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `montacargas`;

CREATE TABLE `montacargas`
(
    `idmontacargas` INTEGER NOT NULL AUTO_INCREMENT,
    `idsucursal` INTEGER NOT NULL,
    `montacargas_modelo` VARCHAR(45) NOT NULL,
    `montacargas_marca` VARCHAR(45) NOT NULL,
    `montacargas_c` VARCHAR(45),
    `montacargas_k` VARCHAR(45),
    `montacargas_p` VARCHAR(45),
    `montacargas_t` VARCHAR(45),
    `montacargas_e` VARCHAR(45),
    `montacargas_volts` INTEGER,
    `montacargas_amperaje` INTEGER,
    `montacargas_nombre` VARCHAR(255),
    `montacargas_numserie` VARCHAR(255),
    `montacargas_comprador` VARCHAR(45),
    `montacargas_ciclosmant` INTEGER,
    `montacargas_ciclosiniciales` INTEGER,
    PRIMARY KEY (`idmontacargas`),
    INDEX `idsucursal` (`idsucursal`),
    CONSTRAINT `montacargas_idsucursal`
        FOREIGN KEY (`idsucursal`)
        REFERENCES `sucursal` (`idsucursal`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sucursal
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sucursal`;

CREATE TABLE `sucursal`
(
    `idsucursal` INTEGER NOT NULL AUTO_INCREMENT,
    `idempresa` INTEGER,
    `sucursal_nombre` VARCHAR(255) NOT NULL,
    `sucursal_suscripcioninicio` INTEGER NOT NULL,
    `sucursal_suscripcionfin` INTEGER NOT NULL,
    PRIMARY KEY (`idsucursal`),
    INDEX `idempresa` (`idempresa`),
    CONSTRAINT `sucursal_idempresa`
        FOREIGN KEY (`idempresa`)
        REFERENCES `empresa` (`idempresa`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

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
    `idsucursal` INTEGER,
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
    PRIMARY KEY (`id`),
    INDEX `Idsucursal` (`idsucursal`),
    CONSTRAINT `idsucursal`
        FOREIGN KEY (`idsucursal`)
        REFERENCES `sucursal` (`idsucursal`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    PRIMARY KEY (`id`),
    INDEX `bg` (`bg`),
    INDEX `bt` (`bt`),
    INDEX `usuario_entrada` (`usuario_entrada`),
    INDEX `usuario_salida` (`usuario_salida`),
    INDEX `usuario_carga` (`usuario_carga`),
    INDEX `usuario_descanso` (`usuario_descanso`),
    CONSTRAINT `uso_baterias_bodega_bg`
        FOREIGN KEY (`bg`)
        REFERENCES `bodegas` (`id`),
    CONSTRAINT `uso_baterias_bodega_bt`
        FOREIGN KEY (`bt`)
        REFERENCES `baterias` (`idbaterias`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

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
    PRIMARY KEY (`id`),
    INDEX `mc` (`mc`),
    INDEX `bt` (`bt`),
    INDEX `usuario_entrada` (`usuario_entrada`),
    INDEX `usuario_salida` (`usuario_salida`),
    CONSTRAINT `uso_baterias_montacargas_bt`
        FOREIGN KEY (`bt`)
        REFERENCES `baterias` (`idbaterias`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `uso_baterias_montacargas_mc`
        FOREIGN KEY (`mc`)
        REFERENCES `montacargas` (`idmontacargas`),
    CONSTRAINT `uso_baterias_usuario_entrada`
        FOREIGN KEY (`usuario_entrada`)
        REFERENCES `uc_users` (`id`),
    CONSTRAINT `uso_baterias_usuario_salida`
        FOREIGN KEY (`usuario_salida`)
        REFERENCES `uc_users` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
