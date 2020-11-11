# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases V10.0.2                    #
# Target DBMS:           MySQL 5                                         #
# Project file:          databse_markaty.dez                             #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2020-11-10 20:31                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Add tables                                                             #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "tb_catalogo"                                                #
# ---------------------------------------------------------------------- #

#CREATE DATABASE database_markaty;

#USE database_markaty;

CREATE TABLE `tb_catalogo` (
    `cod_catalogo` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(150) NOT NULL,
    `descricao` TEXT,
    CONSTRAINT `PK_tb_catalogo` PRIMARY KEY (`cod_catalogo`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_tipo_produto"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_tipo_produto` (
    `cod_tipo_produto` INTEGER NOT NULL AUTO_INCREMENT,
    `descricao` TEXT,
    CONSTRAINT `PK_tb_tipo_produto` PRIMARY KEY (`cod_tipo_produto`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_estado"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_estado` (
    `cod_estado` INTEGER NOT NULL AUTO_INCREMENT,
    `nome_estado` VARCHAR(150) NOT NULL,
    `uf` VARCHAR(2) NOT NULL,
    CONSTRAINT `PK_tb_estado` PRIMARY KEY (`cod_estado`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_imagem"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_imagem` (
    `cod_imagem` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` TEXT NOT NULL,
    CONSTRAINT `PK_tb_imagem` PRIMARY KEY (`cod_imagem`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_produto"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_produto` (
    `cod_produto` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(150),
    `descricao` TEXT,
    `fl_ativo` BOOL NOT NULL,
    `cod_tipo_produto` INTEGER,
    CONSTRAINT `PK_tb_produto` PRIMARY KEY (`cod_produto`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_catalogo_produto"                                        #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_catalogo_produto` (
    `cod_catalogo_produto` INTEGER NOT NULL AUTO_INCREMENT,
    `cod_catalogo` INTEGER,
    `cod_produto` INTEGER,
    CONSTRAINT `PK_tb_catalogo_produto` PRIMARY KEY (`cod_catalogo_produto`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_cidade"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_cidade` (
    `cod_cidade` INTEGER NOT NULL AUTO_INCREMENT,
    `nome_cidade` VARCHAR(150) NOT NULL,
    `cep` NUMERIC,
    `cod_estado` INTEGER,
    CONSTRAINT `PK_tb_cidade` PRIMARY KEY (`cod_cidade`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_produto_imagem"                                          #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_produto_imagem` (
    `cod_produto_imagem` INTEGER NOT NULL AUTO_INCREMENT,
    `cod_produto` INTEGER,
    `cod_imagem` INTEGER,
    CONSTRAINT `PK_tb_produto_imagem` PRIMARY KEY (`cod_produto_imagem`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_empresa"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_empresa` (
    `cod_empresa` INTEGER NOT NULL AUTO_INCREMENT,
    `nome_fantasia` VARCHAR(100) NOT NULL,
    `cnpj` VARCHAR(18) NOT NULL,
    `logradouro` VARCHAR(100) NOT NULL,
    `nr` NUMERIC(4),
    `complemento` VARCHAR(150),
    `bairro` VARCHAR(150),
    `tel_whatsapp` VARCHAR(11),
    `tel_fixo` VARCHAR(11),
    `email` TEXT,
    `instagram` TEXT,
    `facebook` TEXT,
    `maps` TEXT,
    `logomarca` TEXT,
    `cod_catalogo` INTEGER,
    `cod_cidade` INTEGER,
    CONSTRAINT `PK_tb_empresa` PRIMARY KEY (`cod_empresa`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_admin"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_admin` (
    `cod_admin` INTEGER NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(100) NOT NULL,
    `senha` TEXT NOT NULL,
    `nome` VARCHAR(100) NOT NULL,
    `cod_empresa` INTEGER,
    PRIMARY KEY (`cod_admin`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_sobre"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_sobre` (
    `cod_sobre` INTEGER NOT NULL AUTO_INCREMENT,
    `titulo` TEXT,
    `descricao` TEXT,
    `img_sobre` TEXT,
    `video` TEXT,
    `cod_empresa` INTEGER,
    CONSTRAINT `PK_tb_sobre` PRIMARY KEY (`cod_sobre`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_banner"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_banner` (
    `cod_banner` INTEGER NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(150),
    `descricao` TEXT,
    `fl_ativo` BOOL NOT NULL,
    `img_banner` TEXT NOT NULL,
    `cod_empresa` INTEGER,
    CONSTRAINT `PK_tb_banner` PRIMARY KEY (`cod_banner`)
);

# ---------------------------------------------------------------------- #
# Add table "tb_qualidade"                                               #
# ---------------------------------------------------------------------- #

CREATE TABLE `tb_qualidade` (
    `cod_qualidade` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(100) NOT NULL,
    `descricao` TEXT NOT NULL,
    `cod_empresa` INTEGER,
    CONSTRAINT `PK_tb_qualidade` PRIMARY KEY (`cod_qualidade`)
);

# ---------------------------------------------------------------------- #
# Add foreign key constraints                                            #
# ---------------------------------------------------------------------- #

ALTER TABLE `tb_empresa` ADD CONSTRAINT `tb_catalogo_tb_empresa` 
    FOREIGN KEY (`cod_catalogo`) REFERENCES `tb_catalogo` (`cod_catalogo`);

ALTER TABLE `tb_empresa` ADD CONSTRAINT `tb_cidade_tb_empresa` 
    FOREIGN KEY (`cod_cidade`) REFERENCES `tb_cidade` (`cod_cidade`);

ALTER TABLE `tb_admin` ADD CONSTRAINT `tb_empresa_tb_admin` 
    FOREIGN KEY (`cod_empresa`) REFERENCES `tb_empresa` (`cod_empresa`);

ALTER TABLE `tb_sobre` ADD CONSTRAINT `tb_empresa_tb_sobre` 
    FOREIGN KEY (`cod_empresa`) REFERENCES `tb_empresa` (`cod_empresa`);

ALTER TABLE `tb_produto` ADD CONSTRAINT `tb_tipo_produto_tb_produto` 
    FOREIGN KEY (`cod_tipo_produto`) REFERENCES `tb_tipo_produto` (`cod_tipo_produto`);

ALTER TABLE `tb_banner` ADD CONSTRAINT `tb_empresa_tb_banner` 
    FOREIGN KEY (`cod_empresa`) REFERENCES `tb_empresa` (`cod_empresa`);

ALTER TABLE `tb_catalogo_produto` ADD CONSTRAINT `tb_catalogo_tb_catalogo_produto` 
    FOREIGN KEY (`cod_catalogo`) REFERENCES `tb_catalogo` (`cod_catalogo`);

ALTER TABLE `tb_catalogo_produto` ADD CONSTRAINT `tb_produto_tb_catalogo_produto` 
    FOREIGN KEY (`cod_produto`) REFERENCES `tb_produto` (`cod_produto`);

ALTER TABLE `tb_cidade` ADD CONSTRAINT `tb_estado_tb_cidade` 
    FOREIGN KEY (`cod_estado`) REFERENCES `tb_estado` (`cod_estado`);

ALTER TABLE `tb_qualidade` ADD CONSTRAINT `tb_empresa_tb_qualidade` 
    FOREIGN KEY (`cod_empresa`) REFERENCES `tb_empresa` (`cod_empresa`);

ALTER TABLE `tb_produto_imagem` ADD CONSTRAINT `tb_produto_tb_produto_imagem` 
    FOREIGN KEY (`cod_produto`) REFERENCES `tb_produto` (`cod_produto`);

ALTER TABLE `tb_produto_imagem` ADD CONSTRAINT `tb_imagem_tb_produto_imagem` 
    FOREIGN KEY (`cod_imagem`) REFERENCES `tb_imagem` (`cod_imagem`);
