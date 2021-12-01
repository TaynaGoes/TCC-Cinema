/*
 Navicat Premium Data Transfer

 Source Server         : Connection
 Source Server Type    : MySQL
 Source Server Version : 80025
 Source Host           : localhost:3306
 Source Schema         : cinema

 Target Server Type    : MySQL
 Target Server Version : 80025
 File Encoding         : 65001

 Date: 30/11/2021 21:36:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrador
-- ----------------------------
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administrador
-- ----------------------------
INSERT INTO `administrador` VALUES (1, 'Julio Sperandio', '(18)991390762', 'juliosperandio@hotmail.com', '6816e239236f42deccdd84296350e18a');

-- ----------------------------
-- Table structure for categoria_filme
-- ----------------------------
DROP TABLE IF EXISTS `categoria_filme`;
CREATE TABLE `categoria_filme`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria_filme
-- ----------------------------
INSERT INTO `categoria_filme` VALUES (1, '醜い');
INSERT INTO `categoria_filme` VALUES (3, 'タイナ');
INSERT INTO `categoria_filme` VALUES (4, 'ジョアキン');

-- ----------------------------
-- Table structure for categoria_produto
-- ----------------------------
DROP TABLE IF EXISTS `categoria_produto`;
CREATE TABLE `categoria_produto`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria_produto
-- ----------------------------
INSERT INTO `categoria_produto` VALUES (1, 'コカ・コーラ');
INSERT INTO `categoria_produto` VALUES (2, 'サンドイッチ');
INSERT INTO `categoria_produto` VALUES (3, '飲み物');

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------

-- ----------------------------
-- Table structure for filme
-- ----------------------------
DROP TABLE IF EXISTS `filme`;
CREATE TABLE `filme`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` int NOT NULL,
  `resolucao` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `sinopse` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duracao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `legendado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `dublado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `ativo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `filme_categoria_fk`(`categoria`) USING BTREE,
  INDEX `filme_resolucao_fk`(`resolucao`) USING BTREE,
  CONSTRAINT `filme_categoria_fk` FOREIGN KEY (`categoria`) REFERENCES `categoria_filme` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `filme_resolucao_fk` FOREIGN KEY (`resolucao`) REFERENCES `resolucao` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of filme
-- ----------------------------
INSERT INTO `filme` VALUES (2, 3, 3, '現在', 'なると先輩が、一番のなかでがガイ', '23:59', 'Não', 'Não', 'Inativo', '901c2929bc0e16a5765a159135b4d3c9tapa.jpg');
INSERT INTO `filme` VALUES (3, 1, 3, '千と千尋の神隠し', 'Chihiro e seus pais estão se mudando para uma cidade diferente. A caminho da nova casa, o pai decide pegar um atalho. Eles se deparam com uma mesa repleta de comida, embora ninguém esteja por perto. Chihiro sente o perigo, mas seus pais começam a comer. Quando anoitece, eles se transformam em porcos. Agora, apenas Chihiro pode salvá-los.', '23:08', 'Sim', 'Sim', 'Ativo', '17e2c952c2477e6435881f3812e720074PcOE0F.jpg');
INSERT INTO `filme` VALUES (4, 4, 2, 'なると', 'なると先輩が、一番のなかでがガイ。', '23:11', 'Não', 'Não', 'Inativo', '32c104dd69ec73dcc97d5700ac73a59c7078_511790242290599_8966143366695529974_n.jpg');
INSERT INTO `filme` VALUES (5, 1, 1, '你好吗', 'なると先輩が、一番のなかでがガイ', '23:08', 'Sim', 'Sim', 'Ativo', '14226_513712422098381_3064907131408196296_n.jpg');
INSERT INTO `filme` VALUES (6, 4, 2, 'A revolta da mortadela', 'asdfasdfasdfa', '21:27', 'Não', 'Não', 'Ativo', '7b99dcef33ae0f7b01a09e3ea80947deIMG-20131128-WA0041.jpg');

-- ----------------------------
-- Table structure for produto
-- ----------------------------
DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `valor` decimal(11, 2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `produto_categoria_fk`(`categoria`) USING BTREE,
  CONSTRAINT `produto_categoria_fk` FOREIGN KEY (`categoria`) REFERENCES `categoria_produto` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produto
-- ----------------------------
INSERT INTO `produto` VALUES (2, 2, 'asdasdasd', 'asdasdasd', '381f515080141a0cf08520688ad04aa51957642_855004657864627_2340815970772485613_o.jpg', 17.00);
INSERT INTO `produto` VALUES (3, 3, 'SAFASFASFAS', 'ASDASDASDASD', '87f9471f4c53d9022a1fb1445509174e10501826_1443974265867629_4893393101511493604_n_(1).jpg', 14.50);
INSERT INTO `produto` VALUES (4, 1, 'Nadaila', 'Mortadela', '2e0c968242ea3ad0936ed0459a623550ah_nao_cara_anao.jpg', 95.58);

-- ----------------------------
-- Table structure for resolucao
-- ----------------------------
DROP TABLE IF EXISTS `resolucao`;
CREATE TABLE `resolucao`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resolucao
-- ----------------------------
INSERT INTO `resolucao` VALUES (1, '2D計画');
INSERT INTO `resolucao` VALUES (2, '3D了解');
INSERT INTO `resolucao` VALUES (3, '4K現在');

SET FOREIGN_KEY_CHECKS = 1;
