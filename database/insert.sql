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
(1, 'MARKATY', '21635445000118', 'Rua Industrial', '', '', 'Bairro Industrial', '49988002617', '4936770390', 'compras@mksuinos.com.br', '', '', 
'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3549.396272226444!2d-53.716460484404934!3d-27.17527941075249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94fbb64b7e09e6df%3A0x249bc8a4b72f9715!2sMarkaty%20Ind%C3%BAstria%20e%20Com%C3%A9rcio!5e0!3m2!1sen!2sbr!4v1611789516111!5m2!1sen!2sbr',
 'logo_markaty.png', 1, 1);

#ADICIONAR DADOS NA TABELA ADMIN
INSERT INTO `tb_admin` (`cod_admin`, `login`, `senha`, `nome`, `cod_empresa`) VALUES
(1, 'admin', 'madgjmpsvyaibehknqtwzdncfilorux', 'ADMINISTRADOR', 1);
