####### SELECIONAR TODOS OS DADOS DA EMPRESA #######
DELIMITER $$
CREATE PROCEDURE sel_empresa()
BEGIN
	SELECT e.*
	FROM tb_empresa as e, tb_cidade as ci, tb_estado as es
	WHERE e.cod_cidade = ci.cod_cidade
	AND ci.cod_estado = es.cod_estado
	ORDER BY e.cod_empresa ASC;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS SOBRE #######
DELIMITER $$
CREATE PROCEDURE sel_sobre()
BEGIN
	SELECT s.*
	FROM tb_sobre as s, tb_empresa as e
	WHERE s.cod_empresa = e.cod_empresa
	ORDER BY s.cod_empresa ASC;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS BANNER #######
DELIMITER $$
CREATE PROCEDURE sel_banner()
BEGIN
	SELECT b.*
	FROM tb_banner as b, tb_empresa as e
	WHERE b.cod_empresa = e.cod_empresa
	ORDER BY b.cod_empresa ASC;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS QUALIDADE #######
DELIMITER $$
CREATE PROCEDURE sel_qualidade()
BEGIN
	SELECT q.*
	FROM tb_qualidade as q, tb_empresa as e
	WHERE q.cod_empresa = e.cod_empresa
	ORDER BY q.cod_empresa ASC;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS CATALOGO #######
DELIMITER $$
CREATE PROCEDURE sel_catalogo()
BEGIN
	SELECT c.*
	FROM tb_catalogo as c, tb_empresa as e
	WHERE c.cod_catalogo = e.cod_catalogo
	ORDER BY c.cod_catalogo ASC;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS ADMIN #######
DELIMITER $$
CREATE PROCEDURE sel_admin()
BEGIN
	SELECT *
	FROM tb_admin as a, tb_empresa as e
	WHERE a.cod_empresa = e.cod_empresa
    AND a.cod_admin > 1
	ORDER BY a.cod_empresa ASC;
END$$
DELIMITER ;