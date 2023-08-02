CREATE DATABASE  IF NOT EXISTS `crud_livraria`;
USE `crud_livraria`;

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE `fornecedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` varchar(200) NOT NULL,
  `cnpj` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `livrarias`;
CREATE TABLE `livrarias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_fantasia` varchar(100) NOT NULL,
  `razao_social` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` varchar(200) NOT NULL,
  `cnpj` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `livros`;
CREATE TABLE `livros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `qtd_paginas` varchar(45) DEFAULT NULL,
  `autor` varchar(45) DEFAULT NULL,
  `ano_publicacao` varchar(200) NOT NULL,
  `genero` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;