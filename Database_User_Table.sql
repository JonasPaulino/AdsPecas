/*CRIAÇÃO DO BANCO E USUARIO*/
CREATE DATABASE db_adspecas;
USE db_adspecas;
CREATE USER 'user_adspecas'@'localhost' IDENTIFIED BY 'ads123';
GRANT ALL PRIVILEGES ON * . * TO 'user_adspecas'@'localhost';
GRANT ALL PRIVILEGES ON `db_adspeca` . * TO 'user_adspecas'@'localhost';
FLUSH PRIVILEGES;

/*CRIAÇÃO DAS TABELAS*/
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `data_nascimento` varchar(30) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  `preco` decimal(12,2) DEFAULT NULL,
  `qtd_estoque` decimal(12,2) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `cpf_cnpj` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
);