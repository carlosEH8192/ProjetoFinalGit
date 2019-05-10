/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.39-MariaDB : Database - alcidesmaya_tech
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alcidesmaya_tech` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `alcidesmaya_tech`;

/*Table structure for table `adm` */
DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `codigo` INT(2) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `senha` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `adm`(`codigo`,`username`,`senha`) VALUES(1, 'admDefault', 'adm');

/*Table structure for table `aluno` */
DROP TABLE IF EXISTS `aluno`;
CREATE TABLE `aluno` (
  `codigo` INT(10) NOT NULL AUTO_INCREMENT,
  `nome_completo` VARCHAR(80) DEFAULT NULL,
  `sexo` CHAR(1) NOT NULL,
  `telefone_celular` CHAR(11) DEFAULT NULL,
  `telefone_fixo` CHAR(10) DEFAULT NULL,
  `rg` CHAR(10) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `curso` */
DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `codigo` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `carga_horaria` INT(2) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `nome_turma` */
DROP TABLE IF EXISTS `nome_turma`;
CREATE TABLE `nome_turma` (
  `codigo` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `nota` */
DROP TABLE IF EXISTS `nota`;
CREATE TABLE `nota` (
  `codigo` INT(10) NOT NULL AUTO_INCREMENT,
  `atividade_nome` VARCHAR(30) DEFAULT NULL,
  `nota` FLOAT NOT NULL,
  `cod_aluno` INT(10) DEFAULT NULL,
  `cod_nome_turma` INT(10) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `I_nota_cod_aluno` (`cod_aluno`),
  KEY `I_nota_cod_nome_turma` (`cod_nome_turma`),
  CONSTRAINT `FK_notaAluno_cod_aluno` FOREIGN KEY (`cod_aluno`) REFERENCES `aluno` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_notaNomeTurma_cod_nome_turma` FOREIGN KEY (`cod_nome_turma`) REFERENCES `nome_turma` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `presenca` */
DROP TABLE IF EXISTS `presenca`;
CREATE TABLE `presenca` (
  `codigo` INT(10) NOT NULL AUTO_INCREMENT,
  `dia` CHAR(10) NOT NULL,
  `cod_aluno` INT(10) DEFAULT NULL,
  `cod_nome_turma` INT(10) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `I_presenca_cod_aluno` (`cod_aluno`),
  KEY `I_presenca_cod_nome_turma` (`cod_nome_turma`),
  CONSTRAINT `FK_presencaAluno_cod_aluno` FOREIGN KEY (`cod_aluno`) REFERENCES `aluno` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_presencaNomeTurma_cod_nome_turma` FOREIGN KEY (`cod_nome_turma`) REFERENCES `nome_turma` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `professor` */
DROP TABLE IF EXISTS `professor`;
CREATE TABLE `professor` (
  `codigo` INT(10) NOT NULL AUTO_INCREMENT,
  `nome_completo` VARCHAR(80) DEFAULT NULL,
  `sexo` CHAR(1) NOT NULL,
  `rg` VARCHAR(11) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `disciplina` VARCHAR(30) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `turma` */
DROP TABLE IF EXISTS `turma`;
CREATE TABLE `turma` (
  `codigo` INT(10) NOT NULL AUTO_INCREMENT,
  `cod_nome_turma` INT(10) DEFAULT NULL,
  `cod_aluno` INT(10) DEFAULT NULL,
  `cod_professor` INT(10) DEFAULT NULL,
  `cod_curso` INT(10) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `I_turma_cod_aluno` (`cod_aluno`),
  KEY `I_turma_cod_curso` (`cod_curso`),
  KEY `I_turma_cod_nome_turma` (`cod_nome_turma`),
  KEY `I_turma_cod_professor` (`cod_professor`),
  CONSTRAINT `FK_turmaAluno_cod_aluno` FOREIGN KEY (`cod_aluno`) REFERENCES `aluno` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_turmaCurso_cod_curso` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_turmaNomeTurma_cod_nome_turma` FOREIGN KEY (`cod_nome_turma`) REFERENCES `nome_turma` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_turmaProfessor_cod_professor` FOREIGN KEY (`cod_professor`) REFERENCES `professor` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;