#ADICIONAR DADOS NAS TABELAS

#ADICIONAR DADOS NA TABELA ESTADO
INSERT INTO `tb_estado` (`cod_estado`, `nome_estado`, `uf`) VALUES
(1, 'Santa Catarina', 'SC');

#ADICIONAR DADOS NA TABELA CIDADE
INSERT INTO `tb_cidade` (`cod_cidade`, `nome_cidade`, `cep`, `cod_estado`) VALUES
(1, 'Itapiranga', '89896000', 1);

#ADICIONAR DADOS NA TABELA CATALOGO
INSERT INTO `tb_catalogo` (`cod_catalogo`, `nome`, `descricao`) VALUES
(1, 'Catálogo de Produtos', 'Trabalhamos com estruturas e equipamentos industriais');

#ADICIONAR DADOS NA TABELA EMPRESA
INSERT INTO `tb_empresa` (`cod_empresa`, `nome_fantasia`, `cnpj`, `logradouro`, `nr`, `complemento`, `bairro`, `tel_whatsapp`, `tel_fixo`, `email`, `instagram`, `facebook`, `maps`, `logomarca`, `cod_catalogo`, `cod_cidade`) VALUES
(1, 'MARKATY', '21635445000118', 'Rua Industrial', '32', 'PAVILHAO 3', 'Bairro Industrial', '49999711289', '4936770390', 'juridico@ludwigcontabilidade.com.br', 'insta', 'face', 'maps', 'logo.png', 1, 1);

#ADICIONAR DADOS NA TABELA SOBRE
INSERT INTO `tb_sobre` (`cod_sobre`, `titulo`, `descricao`, `img_sobre`, `video`, `cod_empresa`) VALUES
(1, 'TITULO PARA O SOBRE', 'descricao', 'sobre.png', 'link.mp4', 1);

#ADICIONAR DADOS NA TABELA BANNER
INSERT INTO `tb_banner` (`cod_banner`, `img_banner`, `fl_ativo`, `titulo`, `descricao`, `cod_empresa`) VALUES
(1, 'banner1.png', TRUE, 'titulo banner', 'descricao banner', 1);

#ADICIONAR DADOS NA TABELA QUALIDADE
INSERT INTO `tb_qualidade` (`cod_qualidade`, `nome`, `descricao`, `cod_empresa`) VALUES
(1, 'VALOR', 'Algo relacionado aos valores da empresa', 1);

#ADICIONAR DADOS NA TABELA ADMIN
INSERT INTO `tb_admin` (`cod_admin`, `login`, `senha`, `nome`, `cod_empresa`) VALUES
(1, 'admin', 'md5md5md5', 'ADMINISTRADOR', 1);

#ADICIONAR DADOS NA TABELA TIPO PRODUTO
INSERT INTO `tb_tipo_produto` (`cod_tipo_produto`, `descricao`) VALUES
(1, 'Suínos'),
(2, 'Aves');

#ADICIONAR DADOS NA TABELA PRODUTO
INSERT INTO `tb_produto` (`cod_produto`, `nome`, `descricao`, `fl_ativo`, `cod_tipo_produto`) VALUES
(1, 'Produto 1', 'alguma descricao sobre o Produto 1', TRUE, 1),
(2, 'Produto 2', 'alguma descricao sobre o Produto 2', TRUE, 2);

#ADICIONAR DADOS NA TABELA CATALOGO PRODUTO
INSERT INTO `tb_catalogo_produto` (`cod_catalogo_produto`, `cod_catalogo`, `cod_produto`) VALUES
(1, 1, 1),
(2, 1, 2);

#ADICIONAR DADOS NA TABELA IMAGEM
INSERT INTO `tb_imagem` (`cod_imagem`, `nome`) VALUES
(1, 'imagem1.png'),
(2, 'imagem2.png');

#ADICIONAR DADOS NA TABELA PRODUTO IMAGEM
INSERT INTO `tb_produto_imagem` (`cod_produto_imagem`, `cod_produto`, `cod_imagem`) VALUES
(1, 1, 1),
(2, 2, 2);