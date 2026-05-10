-- Float Platform - Banco de Dados
-- Wampserver / PHPMyAdmin

CREATE DATABASE IF NOT EXISTS float
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE float;

CREATE TABLE IF NOT EXISTS usuario (
    id          INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    nome        VARCHAR(50)     NOT NULL,
    email       VARCHAR(150)    NOT NULL UNIQUE,
    senha       VARCHAR(255)    NOT NULL,
    criado_em   DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;