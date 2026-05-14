-- ============================================================
--  ipvgstoredb — Schema limpio para AWS RDS (MySQL 8.x)
--  Generado el 2026-05-14
--  Incluye todas las migraciones de Laravel consolidadas.
-- ============================================================

CREATE DATABASE IF NOT EXISTS `ipvgstoredb`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `ipvgstoredb`;

SET FOREIGN_KEY_CHECKS = 0;

-- ------------------------------------------------------------
-- 1. users  (+ password_reset_tokens + sessions)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id`                BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`              VARCHAR(255)    NOT NULL,
  `email`             VARCHAR(255)    NOT NULL,
  `email_verified_at` TIMESTAMP       NULL DEFAULT NULL,
  `password`          VARCHAR(255)    NOT NULL,
  `remember_token`    VARCHAR(100)    NULL DEFAULT NULL,
  `created_at`        TIMESTAMP       NULL DEFAULT NULL,
  `updated_at`        TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email`      VARCHAR(255) NOT NULL,
  `token`      VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP    NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `sessions` (
  `id`            VARCHAR(255)    NOT NULL,
  `user_id`       BIGINT UNSIGNED NULL DEFAULT NULL,
  `ip_address`    VARCHAR(45)     NULL DEFAULT NULL,
  `user_agent`    TEXT            NULL DEFAULT NULL,
  `payload`       LONGTEXT        NOT NULL,
  `last_activity` INT             NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index`       (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 2. cache  +  cache_locks
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `cache` (
  `key`        VARCHAR(255) NOT NULL,
  `value`      MEDIUMTEXT   NOT NULL,
  `expiration` INT          NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key`        VARCHAR(255) NOT NULL,
  `owner`      VARCHAR(255) NOT NULL,
  `expiration` INT          NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 3. jobs  +  job_batches  +  failed_jobs
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobs` (
  `id`           BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue`        VARCHAR(255)    NOT NULL,
  `payload`      LONGTEXT        NOT NULL,
  `attempts`     TINYINT UNSIGNED NOT NULL,
  `reserved_at`  INT UNSIGNED    NULL DEFAULT NULL,
  `available_at` INT UNSIGNED    NOT NULL,
  `created_at`   INT UNSIGNED    NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `job_batches` (
  `id`             VARCHAR(255) NOT NULL,
  `name`           VARCHAR(255) NOT NULL,
  `total_jobs`     INT          NOT NULL,
  `pending_jobs`   INT          NOT NULL,
  `failed_jobs`    INT          NOT NULL,
  `failed_job_ids` LONGTEXT     NOT NULL,
  `options`        MEDIUMTEXT   NULL DEFAULT NULL,
  `cancelled_at`   INT          NULL DEFAULT NULL,
  `created_at`     INT          NOT NULL,
  `finished_at`    INT          NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid`       VARCHAR(255)    NOT NULL,
  `connection` TEXT            NOT NULL,
  `queue`      TEXT            NOT NULL,
  `payload`    LONGTEXT        NOT NULL,
  `exception`  LONGTEXT        NOT NULL,
  `failed_at`  TIMESTAMP       NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 4. marcas
--    (pais y descripcion son nullable — alteraciones aplicadas)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcas` (
  `id`          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre`      VARCHAR(150)    NOT NULL,
  `pais`        VARCHAR(50)     NULL DEFAULT NULL,
  `descripcion` TEXT            NULL DEFAULT NULL,
  `created_at`  TIMESTAMP       NULL DEFAULT NULL,
  `updated_at`  TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 5. clientes
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `clientes` (
  `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre`     VARCHAR(150)    NOT NULL,
  `email`      VARCHAR(150)    NULL DEFAULT NULL,
  `telefono`   VARCHAR(50)     NULL DEFAULT NULL,
  `created_at` TIMESTAMP       NULL DEFAULT NULL,
  `updated_at` TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 6. modelos  (FK → marcas)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `modelos` (
  `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre`     VARCHAR(150)    NOT NULL,
  `marca_id`   BIGINT UNSIGNED NOT NULL,
  `anio`       INT             NULL DEFAULT NULL,
  `created_at` TIMESTAMP       NULL DEFAULT NULL,
  `updated_at` TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modelos_marca_id_foreign` (`marca_id`),
  CONSTRAINT `modelos_marca_id_foreign`
    FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 7. productos  (FK → marcas)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `productos` (
  `id`          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre`      VARCHAR(100)    NOT NULL,
  `descripcion` TEXT            NULL DEFAULT NULL,
  `stock`       INT             NOT NULL,
  `precio`      INT             NOT NULL,
  `created_at`  TIMESTAMP       NULL DEFAULT NULL,
  `updated_at`  TIMESTAMP       NULL DEFAULT NULL,
  `marca_id`    BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_marca_id_foreign` (`marca_id`),
  CONSTRAINT `productos_marca_id_foreign`
    FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 8. vehiculos  (FK → modelos)
--    (precio DECIMAL(15,2) — alteración aplicada)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `vehiculos` (
  `id`         BIGINT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `modelo_id`  BIGINT UNSIGNED  NOT NULL,
  `color`      VARCHAR(100)     NULL DEFAULT NULL,
  `precio`     DECIMAL(15, 2)   NULL DEFAULT NULL,
  `stock`      INT              NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP        NULL DEFAULT NULL,
  `updated_at` TIMESTAMP        NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehiculos_modelo_id_foreign` (`modelo_id`),
  CONSTRAINT `vehiculos_modelo_id_foreign`
    FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 9. ventas  (FK → vehiculos, clientes)
--    (total DECIMAL(15,2) — alteración aplicada)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ventas` (
  `id`          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehiculo_id` BIGINT UNSIGNED NOT NULL,
  `cliente_id`  BIGINT UNSIGNED NOT NULL,
  `fecha`       DATE            NULL DEFAULT NULL,
  `total`       DECIMAL(15, 2)  NULL DEFAULT NULL,
  `created_at`  TIMESTAMP       NULL DEFAULT NULL,
  `updated_at`  TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_vehiculo_id_foreign` (`vehiculo_id`),
  KEY `ventas_cliente_id_foreign`  (`cliente_id`),
  CONSTRAINT `ventas_vehiculo_id_foreign`
    FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `ventas_cliente_id_foreign`
    FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- 10. migrations  (tabla de control de Laravel)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `migrations` (
  `id`        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch`     INT          NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Registrar todas las migraciones como ejecutadas (batch 1)
INSERT INTO `migrations` (`migration`, `batch`) VALUES
  ('0001_01_01_000000_create_users_table',                    1),
  ('0001_01_01_000001_create_cache_table',                    1),
  ('0001_01_01_000002_create_jobs_table',                     1),
  ('2026_04_22_200000_create_marcas_table',                   1),
  ('2026_04_22_205746_create_productos_table',                1),
  ('2026_04_22_210000_create_clientes_table',                 1),
  ('2026_04_22_210001_create_modelos_table',                  1),
  ('2026_04_22_210002_create_vehiculos_table',                1),
  ('2026_04_22_210003_create_ventas_table',                   1),
  ('2026_04_22_210004_alter_marcas_pais_nullable',            1),
  ('2026_04_22_210005_alter_marcas_descripcion_nullable',     1),
  ('2026_04_22_210006_expand_decimal_ventas_vehiculos',       1);

SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
--  FIN DEL SCRIPT
-- ============================================================
