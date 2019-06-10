/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : supermercado

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 09/06/2019 20:10:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for produtos
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos`  (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_unidades_medida` int(2) NOT NULL COMMENT 'Relaciona-se com a taela unidades_medida1',
  `descricao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10, 2) NOT NULL,
  `id_status` tinyint(1) NOT NULL COMMENT 'Relacionae-se com a tabela status',
  `id_usuario_cadastro` int(11) NOT NULL COMMENT 'Relaciona-se com a tabela usuarios',
  `data_hora_cadastro` timestamp(0) NOT NULL,
  `id_usuario_alteracao` int(11) NULL DEFAULT NULL COMMENT 'Relaciona-se com a tabela usuarios',
  `data_hora_alteracao` timestamp(0) NULL DEFAULT NULL,
  `id_usuario_exclusao` int(11) NULL DEFAULT NULL COMMENT 'Relaciona-se com a tabela usuarios',
  `data_hora_exclusao` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_produto`) USING BTREE,
  INDEX `fk_id_unidade_medida_produtos`(`id_unidades_medida`) USING BTREE,
  INDEX `fk_id_status_produtos`(`id_status`) USING BTREE,
  INDEX `fk_id_usuario_cadastro_produtos`(`id_usuario_cadastro`) USING BTREE,
  INDEX `fk_id_usuario_alteracao_produtos`(`id_usuario_alteracao`) USING BTREE,
  INDEX `fk_id_usuario_exclusao_produtos`(`id_usuario_exclusao`) USING BTREE,
  CONSTRAINT `fk_id_status_produtos` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_unidade_medida_produtos` FOREIGN KEY (`id_unidades_medida`) REFERENCES `unidades_medida` (`id_unidades_medida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_usuario_alteracao_produtos` FOREIGN KEY (`id_usuario_alteracao`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_usuario_cadastro_produtos` FOREIGN KEY (`id_usuario_cadastro`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_usuario_exclusao_produtos` FOREIGN KEY (`id_usuario_exclusao`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO `produtos` VALUES (1, 'Sabonete', 2, 'Sabonete Douver', 24.99, 1, 1, '2019-06-09 16:11:17', NULL, NULL, NULL, NULL);
INSERT INTO `produtos` VALUES (2, 'teste 2', 3, 'teste descr', 23.36, 2, 1, '2019-06-09 19:20:56', NULL, '2019-06-09 19:33:16', NULL, NULL);
INSERT INTO `produtos` VALUES (7, 'teste 7', 1, 'teste descr', 23.36, 1, 1, '2019-06-09 18:37:04', NULL, NULL, NULL, NULL);
INSERT INTO `produtos` VALUES (8, 'teste 8', 1, 'teste descr', 23.36, 1, 1, '2019-06-09 18:39:11', NULL, NULL, NULL, NULL);
INSERT INTO `produtos` VALUES (9, 'teste 9', 1, 'teste descr', 23.36, 1, 1, '2019-06-09 18:39:18', NULL, NULL, NULL, NULL);
INSERT INTO `produtos` VALUES (10, 'teste 10', 1, 'teste descr', 23.36, 1, 1, '2019-06-09 18:40:14', NULL, NULL, NULL, NULL);
INSERT INTO `produtos` VALUES (11, 'teste 11', 1, 'teste 11 descricao', 12.36, 2, 1, '2019-06-09 18:41:07', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id_status` tinyint(1) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (0, 'inativo');
INSERT INTO `status` VALUES (1, 'ativo');
INSERT INTO `status` VALUES (2, 'excluído');

-- ----------------------------
-- Table structure for unidades_medida
-- ----------------------------
DROP TABLE IF EXISTS `unidades_medida`;
CREATE TABLE `unidades_medida`  (
  `id_unidades_medida` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sigla` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_status` tinyint(1) NOT NULL COMMENT 'Relaciona-se com a tabela status',
  PRIMARY KEY (`id_unidades_medida`) USING BTREE,
  INDEX `fk_id_status_unidades_medida`(`id_status`) USING BTREE,
  CONSTRAINT `fk_id_status_unidades_medida` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unidades_medida
-- ----------------------------
INSERT INTO `unidades_medida` VALUES (1, 'Quilograma', 'kg', 1);
INSERT INTO `unidades_medida` VALUES (2, 'Grama', 'g', 1);
INSERT INTO `unidades_medida` VALUES (3, 'Miligrama', 'mg', 1);
INSERT INTO `unidades_medida` VALUES (4, 'Unidade', 'un', 1);
INSERT INTO `unidades_medida` VALUES (5, 'Litro', 'l', 1);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `id_status` tinyint(1) NOT NULL COMMENT 'Relaciona-se com a tabela status',
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data_hora_cadastro` timestamp(0) NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  INDEX `fk_id_status_usuarios`(`id_status`) USING BTREE,
  CONSTRAINT `fk_id_status_usuarios` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, '56321302074', 'Willian Rodrigues', '1989-06-07', 1, 'willian', '10470c3b4b1fed12c3baac014be15fac67c6e815', '2019-06-08 11:37:55');

SET FOREIGN_KEY_CHECKS = 1;
