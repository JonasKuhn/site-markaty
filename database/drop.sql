# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases V10.0.2                    #
# Target DBMS:           MySQL 5                                         #
# Project file:          databse_markaty.dez                             #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2020-11-04 20:47                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #

ALTER TABLE `tb_empresa` DROP FOREIGN KEY `tb_catalogo_tb_empresa`;

ALTER TABLE `tb_empresa` DROP FOREIGN KEY `tb_cidade_tb_empresa`;

ALTER TABLE `tb_admin` DROP FOREIGN KEY `tb_empresa_tb_admin`;

ALTER TABLE `tb_sobre` DROP FOREIGN KEY `tb_empresa_tb_sobre`;

ALTER TABLE `tb_produto` DROP FOREIGN KEY `tb_tipo_produto_tb_produto`;

ALTER TABLE `tb_banner` DROP FOREIGN KEY `tb_empresa_tb_banner`;

ALTER TABLE `tb_catalogo_produto` DROP FOREIGN KEY `tb_catalogo_tb_catalogo_produto`;

ALTER TABLE `tb_catalogo_produto` DROP FOREIGN KEY `tb_produto_tb_catalogo_produto`;

ALTER TABLE `tb_cidade` DROP FOREIGN KEY `tb_estado_tb_cidade`;

ALTER TABLE `tb_qualidade` DROP FOREIGN KEY `tb_empresa_tb_qualidade`;

ALTER TABLE `tb_produto_imagem` DROP FOREIGN KEY `tb_produto_tb_produto_imagem`;

ALTER TABLE `tb_produto_imagem` DROP FOREIGN KEY `tb_imagem_tb_produto_imagem`;

# ---------------------------------------------------------------------- #
# Drop table "tb_qualidade"                                              #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_qualidade` DROP PRIMARY KEY;

DROP TABLE `tb_qualidade`;

# ---------------------------------------------------------------------- #
# Drop table "tb_banner"                                                 #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_banner` DROP PRIMARY KEY;

DROP TABLE `tb_banner`;

# ---------------------------------------------------------------------- #
# Drop table "tb_sobre"                                                  #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_sobre` DROP PRIMARY KEY;

DROP TABLE `tb_sobre`;

# ---------------------------------------------------------------------- #
# Drop table "tb_admin"                                                  #
# ---------------------------------------------------------------------- #

# Drop constraints #

DROP TABLE `tb_admin`;

# ---------------------------------------------------------------------- #
# Drop table "tb_empresa"                                                #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_empresa` DROP PRIMARY KEY;

DROP TABLE `tb_empresa`;

# ---------------------------------------------------------------------- #
# Drop table "tb_produto_imagem"                                         #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_produto_imagem` DROP PRIMARY KEY;

DROP TABLE `tb_produto_imagem`;

# ---------------------------------------------------------------------- #
# Drop table "tb_cidade"                                                 #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_cidade` DROP PRIMARY KEY;

DROP TABLE `tb_cidade`;

# ---------------------------------------------------------------------- #
# Drop table "tb_catalogo_produto"                                       #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_catalogo_produto` DROP PRIMARY KEY;

DROP TABLE `tb_catalogo_produto`;

# ---------------------------------------------------------------------- #
# Drop table "tb_produto"                                                #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_produto` DROP PRIMARY KEY;

DROP TABLE `tb_produto`;

# ---------------------------------------------------------------------- #
# Drop table "tb_imagem"                                                 #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_imagem` DROP PRIMARY KEY;

DROP TABLE `tb_imagem`;

# ---------------------------------------------------------------------- #
# Drop table "tb_estado"                                                 #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_estado` DROP PRIMARY KEY;

DROP TABLE `tb_estado`;

# ---------------------------------------------------------------------- #
# Drop table "tb_tipo_produto"                                           #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_tipo_produto` DROP PRIMARY KEY;

DROP TABLE `tb_tipo_produto`;

# ---------------------------------------------------------------------- #
# Drop table "tb_catalogo"                                               #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `tb_catalogo` DROP PRIMARY KEY;

DROP TABLE `tb_catalogo`;
