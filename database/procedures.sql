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

####### SELECIONAR TODOS OS DADOS DA EMPRESA ESPECIFICA #######
DELIMITER $$
CREATE PROCEDURE sel_empresa_especifica(cod_empresa INT)
BEGIN
	SELECT *
	FROM tb_empresa as e, tb_cidade as ci, tb_estado as es
	WHERE e.cod_cidade = ci.cod_cidade
	AND ci.cod_estado = es.cod_estado
    AND e.cod_empresa = cod_empresa;
END$$
DELIMITER ;

####### ATUALIZAR TODOS OS DADOS DA EMPRESA #######
DELIMITER $$
CREATE PROCEDURE update_empresa (cod_empresa INT,nome_fantasia VARCHAR(100),cnpj VARCHAR(18),logradouro VARCHAR(100),nr NUMERIC(4),complemento VARCHAR(150),bairro VARCHAR(150),
    tel_whatsapp VARCHAR(15),tel_fixo VARCHAR(15),email TEXT,instagram TEXT,facebook TEXT,maps TEXT,logomarca TEXT,cod_catalogo INTEGER,cod_cidade INTEGER)
BEGIN
    IF ((cod_empresa != '') AND (nome_fantasia != '') AND (cnpj != '') AND (logradouro != '') AND (nr != '') AND (complemento != '')
    AND (bairro != '') AND (tel_whatsapp != '') AND (tel_fixo != '') AND (email != '') AND (instagram != '') AND (facebook != '') AND (maps != '') 
    AND (logomarca != '') AND (cod_catalogo != '') AND (cod_cidade != '')) THEN
		UPDATE tb_empresa
		SET nome_fantasia=nome_fantasia,cnpj=cnpj,logradouro=logradouro,
		nr=nr,complemento=complemento,bairro=bairro,tel_whatsapp=tel_whatsapp,tel_fixo=tel_fixo,
		email=email,instagram=instagram,facebook=facebook,maps=maps,logomarca=logomarca,
		cod_catalogo=cod_catalogo,cod_cidade=cod_cidade WHERE cod_empresa = cod_empresa;
    ELSE
        SELECT 'Preencha todos os campos.';
    END IF;
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

####### INSERE OS DADOS SOBRE #######
DELIMITER $$
CREATE PROCEDURE insere_sobre(titulo TEXT, descricao TEXT, img_sobre TEXT,video TEXT,cod_empresa INT)
BEGIN
	IF ((titulo != '') AND (descricao != '') AND (cod_empresa != '')) THEN
		INSERT INTO tb_sobre(titulo, descricao, img_sobre, video, cod_empresa) 
        VALUES (titulo, descricao, img_sobre, video, cod_empresa);
    ELSE
		select 'Preencha todos os campos.';
    END IF;
END $$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS SOBRE ESPECIFICO #######
DELIMITER $$
CREATE PROCEDURE sel_sobre_especifico(cod_sobre INT)
BEGIN
	SELECT s.*
	FROM tb_sobre as s, tb_empresa as e
	WHERE s.cod_empresa = e.cod_empresa
    AND s.cod_sobre = cod_sobre;
END$$
DELIMITER ;

####### ATUALIZAR TODOS OS DADOS SOBRE#######
DELIMITER $$
CREATE PROCEDURE update_sobre (cod_sobre INT, titulo TEXT,descricao TEXT,img_sobre TEXT,video TEXT,cod_empresa INTEGER)
BEGIN
    IF ((cod_sobre != '') AND (titulo != '') AND (descricao != '') AND (img_sobre != '') AND (video != '') AND (cod_empresa != '')) THEN
		UPDATE tb_sobre SET titulo=titulo,descricao=descricao,img_sobre=img_sobre,video=video,cod_empresa=cod_empresa 
        WHERE cod_sobre=cod_sobre;
    ELSE
        SELECT 'Preencha todos os campos.';
    END IF;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS BANNER #######
DELIMITER $$
CREATE PROCEDURE sel_banner(titulo TEXT, descricao TEXT, img_sobre TEXT,video TEXT,cod_empresa INT)
BEGIN
	SELECT b.*
	FROM tb_banner as b, tb_empresa as e
	WHERE b.cod_empresa = e.cod_empresa
	ORDER BY b.cod_empresa ASC;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS BANNER ESPECÍFICO #######
DELIMITER $$
CREATE PROCEDURE sel_banner_especifico(cod_banner INT)
BEGIN
	SELECT b.*
	FROM tb_banner as b, tb_empresa as e
	WHERE b.cod_empresa = e.cod_empresa
    AND b.cod_banner = cod_banner;
END$$
DELIMITER ;

####### INSERIR NOVO BANNER ######################
DELIMITER $$
CREATE PROCEDURE insere_banner(titulo VARCHAR(150), descricao TEXT, fl_ativo BOOLEAN, img_banner TEXT,cod_empresa INT)
BEGIN
	IF ((titulo != '') AND (descricao != '') AND (fl_ativo != '') AND (img_banner != '') AND (cod_empresa != '')) THEN
		INSERT INTO tb_banner (titulo, descricao, fl_ativo, img_banner, cod_empresa) 
		VALUES (titulo,descricao,fl_ativo,img_banner,cod_empresa);
	ELSE
		select 'Preencha todos os campos.';
    END IF;
END$$
DELIMITER ;

####### ATUALIZAR TODOS OS DADOS BANNER#######
DELIMITER $$
CREATE PROCEDURE update_banner(cod_banner INT, titulo VARCHAR(150), descricao TEXT, fl_ativo bool, img_banner TEXT, cod_empresa INT)
BEGIN
    IF ((cod_banner != '') AND (titulo != '') AND (descricao != '') AND (fl_ativo != '') AND (img_banner != '') AND (cod_empresa != '')) THEN
		UPDATE tb_banner as b SET b.titulo=titulo, b.descricao=descricao, b.fl_ativo=fl_ativo, b.img_banner=img_banner, b.cod_empresa=cod_empresa 
        WHERE b.cod_banner=cod_banner;
    ELSE
        SELECT 'Preencha todos os campos.';
    END IF;
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

####### SELECIONAR TODOS OS DADOS QUALIDADE ESPECÍFICO #######
DELIMITER $$
CREATE PROCEDURE sel_qualidade_especifico(cod_qualidade INT)
BEGIN
	SELECT q.*
	FROM tb_qualidade as q, tb_empresa as e
	WHERE q.cod_empresa = e.cod_empresa
	AND q.cod_qualidade = cod_qualidade;
END$$
DELIMITER ;

####### INSERE TODOS OS DADOS QUALIDADE #######
DELIMITER $$
CREATE PROCEDURE insere_qualidade(nome VARCHAR(100), descricao TEXT, cod_empresa INT)
BEGIN
	IF ((nome != '') AND (descricao != '')) THEN
		INSERT INTO tb_qualidade(nome, descricao, cod_empresa) VALUES (nome, descricao, cod_empresa);
    ELSE
		SELECT 'Preencha todos os campos.';
    END IF;
END$$
DELIMITER ;

####### ATUALIZA TODOS OS DADOS QUALIDADE #######
DELIMITER $$
CREATE PROCEDURE update_qualidade(cod_qualidade INT, nome VARCHAR(100), descricao TEXT, cod_empresa INT)
BEGIN
	IF ((nome != '') AND (descricao != '')) THEN
		UPDATE tb_qualidade SET nome=nome, descricao=descricao, cod_empresa=cod_empresa 
        WHERE cod_qualidade = cod_qualidade;
    ELSE
		SELECT 'Preencha todos os campos.';
    END IF;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS CATALOGO #######
DELIMITER $$
CREATE PROCEDURE sel_catalogo()
BEGIN
	SELECT *
	FROM tb_catalogo 
	ORDER BY cod_catalogo ASC;
END$$
DELIMITER ;

####### INSERE TODOS OS DADOS CATALOGO #######
DELIMITER $$
CREATE PROCEDURE insere_catalogo(nome VARCHAR(150), descricao TEXT)
BEGIN
	IF ((nome != '') AND (descricao != '')) THEN
		INSERT INTO tb_catalogo(nome, descricao) VALUES (nome, descricao);
    ELSE
		SELECT 'Preencha todos os campos.';
    END IF;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS CATALOGO ESPECIFICO #######
DELIMITER $$
CREATE PROCEDURE sel_catalogo_especifico(cod_catalogo INT)
BEGIN
	SELECT *
	FROM tb_catalogo 
    WHERE cod_catalogo = cod_catalogo;
END$$
DELIMITER ;

####### ATUALIZA TODOS OS DADOS DO CATALOGO #######
DELIMITER $$
CREATE PROCEDURE update_catalogo(cod_catalogo INT, nome VARCHAR(150), descricao TEXT, cod_empresa INT)
BEGIN
	IF ((cod_catalogo != '') AND (nome != '') AND (descricao != '') AND (cod_empresa != '')) THEN
		UPDATE tb_catalogo as c, tb_empresa as e SET
        c.nome = nome, c.descricao = descricao 
        WHERE c.cod_catalogo = cod_catalogo
        AND e.cod_empresa = cod_empresa;
    ELSE
		SELECT 'Preencha todos os campos.';
    END IF;
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
	ORDER BY a.cod_empresa ASC;
END$$
DELIMITER ;

####### SELECIONAR TODOS OS DADOS ADMIN ESPECIFICO #######
DELIMITER $$
CREATE PROCEDURE sel_admin_especifico(cod_admin INT)
BEGIN
	SELECT a.*
	FROM tb_admin as a, tb_empresa as e
	WHERE a.cod_empresa = e.cod_empresa
    AND a.cod_admin = cod_admin;
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
    AND e.cod_empresa = cod_empresa
    INTO aux_admin;
    
    SELECT a.cod_admin FROM tb_admin as a
    WHERE a.login = login
    INTO aux_admin_login; 
    
	IF (aux_admin_login = '') THEN
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

####### ATUALIZA TODOS OS DADOS ADMIN #######
DELIMITER $$
CREATE PROCEDURE update_admin(login VARCHAR(100), senha TEXT, nome VARCHAR(100), cod_admin INT)
BEGIN
	IF((login != '') AND (senha != '') AND (nome != '') AND (cod_admin != ''))THEN
		UPDATE tb_admin SET login=login,senha=senha,nome=nome
		WHERE cod_admin = cod_admin;
	ELSE
		select 'Preencha todos os campos.';
    END IF;
END$$
DELIMITER ;
