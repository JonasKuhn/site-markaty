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

####### SELECIONAR TODOS OS DADOS PRODUTO #######
DELIMITER $$
CREATE PROCEDURE sel_produto()
BEGIN
	SELECT p.*, tp.descricao, i.nome as img_nome, c.nome as nome_tipo_item
	FROM tb_produto as p, tb_empresa as e, tb_catalogo as c, tb_catalogo_produto as cp, tb_produto_imagem as pi, tb_imagem as i, tb_tipo_produto as tp
	WHERE p.cod_produto = cp.cod_produto
    AND cp.cod_catalogo = c.cod_catalogo
    AND c.cod_catalogo = e.cod_catalogo
    AND tp.cod_tipo_produto = p.cod_tipo_produto
    AND p.cod_produto = pi.cod_produto
    AND pi.cod_imagem = i.cod_imagem
	ORDER BY p.cod_produto ASC;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS TIPO PRODUTO #######
DELIMITER $$
CREATE PROCEDURE sel_tipo_produto()
BEGIN
	SELECT tp.*
	FROM tb_tipo_produto as tp, tb_produto as p
	WHERE tp.cod_tipo_produto = p.cod_tipo_produto
	ORDER BY tp.cod_tipo_produto ASC;
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

####### INSERIR DADOS ADMIN #######
DELIMITER $$
CREATE PROCEDURE insere_admin(login VARCHAR(100), senha TEXT, nome VARCHAR(100), cod_empresa INT)
BEGIN
	DECLARE aux_admin INT;
    DECLARE aux_admin_login INT;
    SET aux_admin = 0;
    SET aux_admin_login = 0;
    
    SELECT e.cod_empresa FROM tb_empresa as e
    WHERE e.cod_empresa = cod_empresa
    INTO aux_admin;
    
    SELECT a.cod_admin FROM tb_admin as a
    WHERE a.login = login
    INTO aux_admin_login; 
    
	IF (aux_admin_login = null) THEN
		IF ((aux_admin != 0) AND (aux_admin != '') ) THEN
			IF((login != '') AND (senha != '') AND (nome != '') AND (cod_empresa != ''))THEN
				INSERT INTO tb_admin(login,senha,nome,cod_empresa) 
				VALUES (login,senha,nome,cod_empresa);
			ELSE
				select 'Preencha todos os campos.';
			END IF;
		ELSE
			select 'Código da empresa incorreto.';
		END IF;
    ELSE
		select 'Login já existente.';
    END IF;
END $$
DELIMITER ;