# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases V10.0.2                    #
# Target DBMS:           MySQL 5                                         #
# Project file:          databse_markaty.dez                             #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2020-11-10 20:31                                #
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

# Remove autoinc for PK drop #

ALTER TABLE `tb_qualidade` MODIFY `cod_qualidade` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_qualidade` DROP PRIMARY KEY;

DROP TABLE `tb_qualidade`;

# ---------------------------------------------------------------------- #
# Drop table "tb_banner"                                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_banner` MODIFY `cod_banner` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_banner` DROP PRIMARY KEY;

DROP TABLE `tb_banner`;

# ---------------------------------------------------------------------- #
# Drop table "tb_sobre"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_sobre` MODIFY `cod_sobre` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_sobre` DROP PRIMARY KEY;

DROP TABLE `tb_sobre`;

# ---------------------------------------------------------------------- #
# Drop table "tb_admin"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_admin` MODIFY `cod_admin` INTEGER NOT NULL;

# Drop constraints #

DROP TABLE `tb_admin`;

# ---------------------------------------------------------------------- #
# Drop table "tb_empresa"                                                #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_empresa` MODIFY `cod_empresa` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_empresa` DROP PRIMARY KEY;

DROP TABLE `tb_empresa`;

# ---------------------------------------------------------------------- #
# Drop table "tb_produto_imagem"                                         #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_produto_imagem` MODIFY `cod_produto_imagem` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_produto_imagem` DROP PRIMARY KEY;

DROP TABLE `tb_produto_imagem`;

# ---------------------------------------------------------------------- #
# Drop table "tb_cidade"                                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_cidade` MODIFY `cod_cidade` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_cidade` DROP PRIMARY KEY;

DROP TABLE `tb_cidade`;

# ---------------------------------------------------------------------- #
# Drop table "tb_catalogo_produto"                                       #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_catalogo_produto` MODIFY `cod_catalogo_produto` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_catalogo_produto` DROP PRIMARY KEY;

DROP TABLE `tb_catalogo_produto`;

# ---------------------------------------------------------------------- #
# Drop table "tb_produto"                                                #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_produto` MODIFY `cod_produto` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_produto` DROP PRIMARY KEY;

DROP TABLE `tb_produto`;

# ---------------------------------------------------------------------- #
# Drop table "tb_imagem"                                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_imagem` MODIFY `cod_imagem` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_imagem` DROP PRIMARY KEY;

DROP TABLE `tb_imagem`;

# ---------------------------------------------------------------------- #
# Drop table "tb_estado"                                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_estado` MODIFY `cod_estado` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_estado` DROP PRIMARY KEY;

DROP TABLE `tb_estado`;

# ---------------------------------------------------------------------- #
# Drop table "tb_tipo_produto"                                           #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_tipo_produto` MODIFY `cod_tipo_produto` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_tipo_produto` DROP PRIMARY KEY;

DROP TABLE `tb_tipo_produto`;

# ---------------------------------------------------------------------- #
# Drop table "tb_catalogo"                                               #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tb_catalogo` MODIFY `cod_catalogo` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tb_catalogo` DROP PRIMARY KEY;

DROP TABLE `tb_catalogo`;

drop procedure sel_empresa;
drop procedure sel_empresa_especifica;
drop procedure update_empresa;
drop procedure sel_sobre;
drop procedure insere_sobre;
drop procedure sel_sobre_especifico;
drop procedure update_sobre;
drop procedure sel_banner;
drop procedure sel_banner_especifico;
drop procedure insere_banner;
drop procedure update_banner;
drop procedure sel_qualidade;
drop procedure sel_qualidade_especifico;
drop procedure insere_qualidade;
drop procedure update_qualidade;
drop procedure sel_catalogo;
drop procedure insere_catalogo;
drop procedure sel_catalogo_especifico;
drop procedure update_catalogo;
drop procedure sel_produto;
drop procedure insere_produto;
drop procedure insere_imagem;
drop procedure sel_produto_nome;
drop procedure sel_produto_especifico;
drop procedure sel_imagens_produto_nome;
drop procedure sel_imagens_produto_cod;
drop procedure update_produto;
drop procedure sel_imagens_cod;
drop procedure sel_tipo_produto;
drop procedure insere_tipo_produto;
drop procedure sel_tipo_produto_especifico;
drop procedure update_tipo_produto;
drop procedure sel_admin;
drop procedure sel_admin_especifico;
drop procedure insere_admin;
drop procedure update_admin;
drop procedure sel_cidade_cod;