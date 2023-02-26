/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : 127.0.0.1:3306
 Source Schema         : esqueleto

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 26/02/2023 16:03:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cantidades
-- ----------------------------
DROP TABLE IF EXISTS `cantidades`;
CREATE TABLE `cantidades`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NULL DEFAULT NULL,
  `id_sucursal` int(11) NULL DEFAULT NULL,
  `sto_cantidad` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cantidades
-- ----------------------------

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NULL DEFAULT NULL,
  `cat_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cat_padres` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `cat_imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cat_estado` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categorias
-- ----------------------------

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_direccion` int(11) NOT NULL,
  `cli_tipo` int(11) NULL DEFAULT NULL,
  `cli_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cli_nomfanta` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cli_mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cli_giro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cli_rut` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cli_telefono` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cli_estado` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `empresas_id_mail_unique`(`cli_mail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of clientes
-- ----------------------------

-- ----------------------------
-- Table structure for comunas
-- ----------------------------
DROP TABLE IF EXISTS `comunas`;
CREATE TABLE `comunas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_region` int(11) NOT NULL,
  `com_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 266 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of comunas
-- ----------------------------
INSERT INTO `comunas` VALUES (1, 1, 'Santiago');
INSERT INTO `comunas` VALUES (2, 1, 'San Miguel');
INSERT INTO `comunas` VALUES (3, 8, 'Rancagua');
INSERT INTO `comunas` VALUES (4, 8, 'Codegua');
INSERT INTO `comunas` VALUES (5, 8, 'Coinco');
INSERT INTO `comunas` VALUES (6, 8, 'Coltauco');
INSERT INTO `comunas` VALUES (7, 8, 'Doñihue');
INSERT INTO `comunas` VALUES (8, 8, 'Graneros');
INSERT INTO `comunas` VALUES (9, 8, 'Las Cabras');
INSERT INTO `comunas` VALUES (10, 8, 'Machalí');
INSERT INTO `comunas` VALUES (11, 8, 'Malloa');
INSERT INTO `comunas` VALUES (12, 8, 'Mostazal');
INSERT INTO `comunas` VALUES (13, 8, 'Olivar');
INSERT INTO `comunas` VALUES (14, 8, 'Peumo');
INSERT INTO `comunas` VALUES (15, 8, 'Pichidegua');
INSERT INTO `comunas` VALUES (16, 8, 'Quinta de Tilcoco');
INSERT INTO `comunas` VALUES (17, 8, 'Rengo, \"Requínoa\"');
INSERT INTO `comunas` VALUES (18, 8, 'San Vicente');
INSERT INTO `comunas` VALUES (19, 8, 'Pichilemu');
INSERT INTO `comunas` VALUES (20, 8, 'La Estrella');
INSERT INTO `comunas` VALUES (21, 8, 'Litueche');
INSERT INTO `comunas` VALUES (22, 8, 'Marchihue');
INSERT INTO `comunas` VALUES (23, 8, 'Navidad');
INSERT INTO `comunas` VALUES (24, 8, 'Paredones');
INSERT INTO `comunas` VALUES (25, 8, 'San Fernando');
INSERT INTO `comunas` VALUES (26, 8, 'Chépica');
INSERT INTO `comunas` VALUES (27, 8, 'Chimbarongo');
INSERT INTO `comunas` VALUES (28, 8, 'Lolol');
INSERT INTO `comunas` VALUES (29, 8, 'Nancagua');
INSERT INTO `comunas` VALUES (30, 8, 'Palmilla');
INSERT INTO `comunas` VALUES (31, 8, 'Peralillo');
INSERT INTO `comunas` VALUES (32, 8, 'Placilla');
INSERT INTO `comunas` VALUES (33, 8, 'Pumanque');
INSERT INTO `comunas` VALUES (34, 8, 'Santa Cruz');
INSERT INTO `comunas` VALUES (35, 9, 'Talca');
INSERT INTO `comunas` VALUES (36, 9, 'Constitución');
INSERT INTO `comunas` VALUES (37, 9, 'Curepto');
INSERT INTO `comunas` VALUES (38, 9, 'Empedrado');
INSERT INTO `comunas` VALUES (39, 9, 'Maule');
INSERT INTO `comunas` VALUES (40, 9, 'Pelarco');
INSERT INTO `comunas` VALUES (41, 9, 'Pencahue');
INSERT INTO `comunas` VALUES (42, 9, 'Río Claro');
INSERT INTO `comunas` VALUES (43, 9, 'San Clemente');
INSERT INTO `comunas` VALUES (44, 9, 'San Rafael');
INSERT INTO `comunas` VALUES (45, 9, 'Cauquenes');
INSERT INTO `comunas` VALUES (46, 9, 'Chanco');
INSERT INTO `comunas` VALUES (47, 9, 'Pelluhue');
INSERT INTO `comunas` VALUES (48, 9, 'Curicó');
INSERT INTO `comunas` VALUES (49, 9, 'Hualañé');
INSERT INTO `comunas` VALUES (50, 9, 'Licantén');
INSERT INTO `comunas` VALUES (51, 9, 'Molina');
INSERT INTO `comunas` VALUES (52, 9, 'Rauco');
INSERT INTO `comunas` VALUES (53, 9, 'Romeral');
INSERT INTO `comunas` VALUES (54, 9, 'Sagrada Familia');
INSERT INTO `comunas` VALUES (55, 9, 'Teno');
INSERT INTO `comunas` VALUES (56, 9, 'Vichuquén');
INSERT INTO `comunas` VALUES (57, 9, 'Linares');
INSERT INTO `comunas` VALUES (58, 9, 'Colbún');
INSERT INTO `comunas` VALUES (59, 9, 'Longaví');
INSERT INTO `comunas` VALUES (60, 9, 'Parral');
INSERT INTO `comunas` VALUES (61, 9, 'Retiro');
INSERT INTO `comunas` VALUES (62, 9, 'San Javier');
INSERT INTO `comunas` VALUES (63, 9, 'Villa Alegre');
INSERT INTO `comunas` VALUES (64, 9, 'Yerbas Buenas');
INSERT INTO `comunas` VALUES (65, 16, 'Cobquecura');
INSERT INTO `comunas` VALUES (66, 16, 'Coelemu');
INSERT INTO `comunas` VALUES (67, 16, 'Ninhue');
INSERT INTO `comunas` VALUES (68, 16, 'Portezuelo\"');
INSERT INTO `comunas` VALUES (69, 16, 'Quirihue');
INSERT INTO `comunas` VALUES (70, 16, 'Ránquil');
INSERT INTO `comunas` VALUES (71, 16, 'Treguaco');
INSERT INTO `comunas` VALUES (72, 16, 'Bulnes');
INSERT INTO `comunas` VALUES (73, 16, 'Chillán Viejo');
INSERT INTO `comunas` VALUES (74, 16, 'Chillán');
INSERT INTO `comunas` VALUES (75, 16, 'El Carmen');
INSERT INTO `comunas` VALUES (76, 16, 'Pemuco');
INSERT INTO `comunas` VALUES (77, 16, 'Pinto');
INSERT INTO `comunas` VALUES (78, 16, 'Quillón');
INSERT INTO `comunas` VALUES (79, 16, 'San Ignacio');
INSERT INTO `comunas` VALUES (80, 16, 'Yungay');
INSERT INTO `comunas` VALUES (81, 16, 'Coihueco');
INSERT INTO `comunas` VALUES (82, 16, 'Ñiquén');
INSERT INTO `comunas` VALUES (83, 16, 'San Carlos');
INSERT INTO `comunas` VALUES (84, 16, 'San Fabián');
INSERT INTO `comunas` VALUES (85, 16, 'San Nicolás');
INSERT INTO `comunas` VALUES (86, 10, 'Concepción');
INSERT INTO `comunas` VALUES (87, 10, 'Coronel');
INSERT INTO `comunas` VALUES (88, 10, 'Chiguayante');
INSERT INTO `comunas` VALUES (89, 10, 'Florida');
INSERT INTO `comunas` VALUES (90, 10, 'Hualqui');
INSERT INTO `comunas` VALUES (91, 10, 'Lota');
INSERT INTO `comunas` VALUES (92, 10, 'Penco');
INSERT INTO `comunas` VALUES (93, 10, 'San Pedro de la Paz');
INSERT INTO `comunas` VALUES (94, 10, 'Santa Juana');
INSERT INTO `comunas` VALUES (95, 10, 'Talcahuano');
INSERT INTO `comunas` VALUES (96, 10, 'Tomé');
INSERT INTO `comunas` VALUES (97, 10, 'Hualpén');
INSERT INTO `comunas` VALUES (98, 10, 'Lebu');
INSERT INTO `comunas` VALUES (99, 10, 'Arauco');
INSERT INTO `comunas` VALUES (100, 10, 'Cañete');
INSERT INTO `comunas` VALUES (101, 10, 'Contulmo');
INSERT INTO `comunas` VALUES (102, 10, 'Curanilahue');
INSERT INTO `comunas` VALUES (103, 10, 'Los Álamos');
INSERT INTO `comunas` VALUES (104, 10, 'Tirúa');
INSERT INTO `comunas` VALUES (105, 10, 'Los Ángeles');
INSERT INTO `comunas` VALUES (106, 10, 'Antuco');
INSERT INTO `comunas` VALUES (107, 10, 'Cabrero');
INSERT INTO `comunas` VALUES (108, 10, 'Laja');
INSERT INTO `comunas` VALUES (109, 10, 'Mulchén');
INSERT INTO `comunas` VALUES (110, 10, 'Nacimiento');
INSERT INTO `comunas` VALUES (111, 10, 'Negrete');
INSERT INTO `comunas` VALUES (112, 10, 'Quilaco');
INSERT INTO `comunas` VALUES (113, 10, 'Quilleco');
INSERT INTO `comunas` VALUES (114, 10, 'San Rosendo');
INSERT INTO `comunas` VALUES (115, 10, 'Santa Bárbara');
INSERT INTO `comunas` VALUES (116, 10, 'Tucapel');
INSERT INTO `comunas` VALUES (117, 10, 'Yumbel');
INSERT INTO `comunas` VALUES (118, 10, 'Alto Biobío');
INSERT INTO `comunas` VALUES (119, 11, 'Temuco');
INSERT INTO `comunas` VALUES (120, 11, 'Carahue');
INSERT INTO `comunas` VALUES (121, 11, 'Cunco');
INSERT INTO `comunas` VALUES (122, 11, 'Curarrehue');
INSERT INTO `comunas` VALUES (123, 11, 'Freire');
INSERT INTO `comunas` VALUES (124, 11, 'Galvarino');
INSERT INTO `comunas` VALUES (125, 11, 'Gorbea');
INSERT INTO `comunas` VALUES (126, 11, 'Lautaro');
INSERT INTO `comunas` VALUES (127, 11, 'Loncoche');
INSERT INTO `comunas` VALUES (128, 11, 'Melipeuco');
INSERT INTO `comunas` VALUES (129, 11, 'Nueva Imperial');
INSERT INTO `comunas` VALUES (130, 11, 'Padre las Casas');
INSERT INTO `comunas` VALUES (131, 11, 'Perquenco');
INSERT INTO `comunas` VALUES (132, 11, 'Pitrufquén');
INSERT INTO `comunas` VALUES (133, 11, 'Pucón');
INSERT INTO `comunas` VALUES (134, 11, 'Saavedra');
INSERT INTO `comunas` VALUES (135, 11, 'Teodoro Schmidt');
INSERT INTO `comunas` VALUES (136, 11, 'Toltén');
INSERT INTO `comunas` VALUES (137, 11, 'Vilcún');
INSERT INTO `comunas` VALUES (138, 11, 'Villarrica');
INSERT INTO `comunas` VALUES (139, 11, 'Cholchol');
INSERT INTO `comunas` VALUES (140, 11, 'Angol');
INSERT INTO `comunas` VALUES (141, 11, 'Collipulli');
INSERT INTO `comunas` VALUES (142, 11, 'Curacautín');
INSERT INTO `comunas` VALUES (143, 11, 'Ercilla');
INSERT INTO `comunas` VALUES (144, 11, 'Lonquimay');
INSERT INTO `comunas` VALUES (145, 11, 'Los Sauces');
INSERT INTO `comunas` VALUES (146, 11, 'Lumaco');
INSERT INTO `comunas` VALUES (147, 11, 'Purén');
INSERT INTO `comunas` VALUES (148, 11, 'Renaico');
INSERT INTO `comunas` VALUES (149, 11, 'Traiguén');
INSERT INTO `comunas` VALUES (150, 11, 'Victoria');
INSERT INTO `comunas` VALUES (151, 12, 'Valdivia');
INSERT INTO `comunas` VALUES (152, 12, 'Corral');
INSERT INTO `comunas` VALUES (153, 12, 'Lanco');
INSERT INTO `comunas` VALUES (154, 12, 'Los Lagos');
INSERT INTO `comunas` VALUES (155, 12, 'Máfil');
INSERT INTO `comunas` VALUES (156, 12, 'Mariquina');
INSERT INTO `comunas` VALUES (157, 12, 'Paillaco');
INSERT INTO `comunas` VALUES (158, 12, 'Panguipulli');
INSERT INTO `comunas` VALUES (159, 12, 'La Unión');
INSERT INTO `comunas` VALUES (160, 12, 'Futrono');
INSERT INTO `comunas` VALUES (161, 12, 'Lago Ranco');
INSERT INTO `comunas` VALUES (162, 12, 'Río Bueno');
INSERT INTO `comunas` VALUES (163, 13, 'Puerto Montt');
INSERT INTO `comunas` VALUES (164, 13, 'Calbuco');
INSERT INTO `comunas` VALUES (165, 13, 'Cochamó');
INSERT INTO `comunas` VALUES (166, 13, 'Fresia');
INSERT INTO `comunas` VALUES (167, 13, 'Frutillar');
INSERT INTO `comunas` VALUES (168, 13, 'Los Muermos');
INSERT INTO `comunas` VALUES (169, 13, 'Llanquihue');
INSERT INTO `comunas` VALUES (170, 13, 'Maullín');
INSERT INTO `comunas` VALUES (171, 13, 'Puerto Varas');
INSERT INTO `comunas` VALUES (172, 13, 'Castro');
INSERT INTO `comunas` VALUES (173, 13, 'Ancud');
INSERT INTO `comunas` VALUES (174, 13, 'Chonchi');
INSERT INTO `comunas` VALUES (175, 13, 'Curaco de Vélez');
INSERT INTO `comunas` VALUES (176, 13, 'Dalcahue');
INSERT INTO `comunas` VALUES (177, 13, 'Puqueldón');
INSERT INTO `comunas` VALUES (178, 13, 'Queilén');
INSERT INTO `comunas` VALUES (179, 13, 'Quellón');
INSERT INTO `comunas` VALUES (180, 13, 'Quemchi');
INSERT INTO `comunas` VALUES (181, 13, 'Quinchao');
INSERT INTO `comunas` VALUES (182, 13, 'Osorno');
INSERT INTO `comunas` VALUES (183, 13, 'Puerto Octay');
INSERT INTO `comunas` VALUES (184, 13, 'Purranque');
INSERT INTO `comunas` VALUES (185, 13, 'Puyehue');
INSERT INTO `comunas` VALUES (186, 13, 'Río Negro');
INSERT INTO `comunas` VALUES (187, 13, 'San Juan de la Costa');
INSERT INTO `comunas` VALUES (188, 13, 'San Pablo');
INSERT INTO `comunas` VALUES (189, 13, 'Chaitén');
INSERT INTO `comunas` VALUES (190, 13, 'Futaleufú');
INSERT INTO `comunas` VALUES (191, 13, 'Hualaihué');
INSERT INTO `comunas` VALUES (192, 13, 'Palena');
INSERT INTO `comunas` VALUES (193, 14, 'Lago Verde');
INSERT INTO `comunas` VALUES (194, 14, 'Aisén');
INSERT INTO `comunas` VALUES (195, 14, 'Cisnes');
INSERT INTO `comunas` VALUES (196, 14, 'Guaitecas');
INSERT INTO `comunas` VALUES (197, 14, 'Cochrane');
INSERT INTO `comunas` VALUES (198, 14, 'O’Higgins');
INSERT INTO `comunas` VALUES (199, 14, 'Tortel');
INSERT INTO `comunas` VALUES (200, 14, 'Chile Chico');
INSERT INTO `comunas` VALUES (201, 14, 'Río Ibáñez');
INSERT INTO `comunas` VALUES (202, 14, 'Coihaique');
INSERT INTO `comunas` VALUES (203, 15, 'Punta Arenas');
INSERT INTO `comunas` VALUES (204, 15, 'Laguna Blanca');
INSERT INTO `comunas` VALUES (205, 15, 'Río Verde');
INSERT INTO `comunas` VALUES (206, 15, 'San Gregorio');
INSERT INTO `comunas` VALUES (207, 15, 'Cabo de Hornos (Ex Navarino)');
INSERT INTO `comunas` VALUES (208, 15, 'Antártica');
INSERT INTO `comunas` VALUES (209, 15, 'Porvenir');
INSERT INTO `comunas` VALUES (210, 15, 'Primavera');
INSERT INTO `comunas` VALUES (211, 15, 'Timaukel');
INSERT INTO `comunas` VALUES (212, 15, 'Natales');
INSERT INTO `comunas` VALUES (213, 15, 'Torres del Paine');
INSERT INTO `comunas` VALUES (214, 1, 'Cerrillos');
INSERT INTO `comunas` VALUES (215, 1, 'Cerro Navia');
INSERT INTO `comunas` VALUES (216, 1, 'Conchalí');
INSERT INTO `comunas` VALUES (217, 1, 'El Bosque');
INSERT INTO `comunas` VALUES (218, 1, 'Estación Central');
INSERT INTO `comunas` VALUES (219, 1, 'Huechuraba');
INSERT INTO `comunas` VALUES (220, 1, 'Independencia');
INSERT INTO `comunas` VALUES (221, 1, 'La Cisterna');
INSERT INTO `comunas` VALUES (222, 1, 'La Florida');
INSERT INTO `comunas` VALUES (223, 1, 'La Granja');
INSERT INTO `comunas` VALUES (224, 1, 'La Pintana');
INSERT INTO `comunas` VALUES (225, 1, 'La Reina');
INSERT INTO `comunas` VALUES (226, 1, 'Las Condes');
INSERT INTO `comunas` VALUES (227, 1, 'Lo Barnechea');
INSERT INTO `comunas` VALUES (228, 1, 'Lo Espejo');
INSERT INTO `comunas` VALUES (229, 1, 'Lo Prado');
INSERT INTO `comunas` VALUES (230, 1, 'Macul');
INSERT INTO `comunas` VALUES (231, 1, 'Maipú');
INSERT INTO `comunas` VALUES (232, 1, 'Ñuñoa');
INSERT INTO `comunas` VALUES (233, 1, 'Pedro Aguirre Cerda');
INSERT INTO `comunas` VALUES (234, 1, 'Peñalolén');
INSERT INTO `comunas` VALUES (235, 1, 'Providencia');
INSERT INTO `comunas` VALUES (236, 1, 'Pudahuel');
INSERT INTO `comunas` VALUES (237, 1, 'Quilicura');
INSERT INTO `comunas` VALUES (238, 1, 'Quinta Normal');
INSERT INTO `comunas` VALUES (239, 1, 'Recoleta');
INSERT INTO `comunas` VALUES (240, 1, 'Renca');
INSERT INTO `comunas` VALUES (242, 1, 'San Joaquín');
INSERT INTO `comunas` VALUES (244, 1, 'San Ramón');
INSERT INTO `comunas` VALUES (245, 1, 'Vitacura');
INSERT INTO `comunas` VALUES (246, 1, 'Puente Alto');
INSERT INTO `comunas` VALUES (247, 1, 'Pirque');
INSERT INTO `comunas` VALUES (248, 1, 'San José de Maipo');
INSERT INTO `comunas` VALUES (249, 1, 'Colina');
INSERT INTO `comunas` VALUES (250, 1, 'Lampa');
INSERT INTO `comunas` VALUES (251, 1, 'Tiltil');
INSERT INTO `comunas` VALUES (252, 1, 'San Bernardo');
INSERT INTO `comunas` VALUES (253, 1, 'Buin');
INSERT INTO `comunas` VALUES (254, 1, 'Calera de Tango');
INSERT INTO `comunas` VALUES (255, 1, 'Paine');
INSERT INTO `comunas` VALUES (256, 1, 'Melipilla');
INSERT INTO `comunas` VALUES (257, 1, 'Alhué');
INSERT INTO `comunas` VALUES (258, 1, 'Curacaví');
INSERT INTO `comunas` VALUES (259, 1, 'María Pinto');
INSERT INTO `comunas` VALUES (260, 1, 'San Pedro');
INSERT INTO `comunas` VALUES (261, 1, 'Talagante');
INSERT INTO `comunas` VALUES (262, 1, 'El Monte');
INSERT INTO `comunas` VALUES (263, 1, 'Isla de Maipo');
INSERT INTO `comunas` VALUES (264, 1, 'Padre Hurtado');
INSERT INTO `comunas` VALUES (265, 1, 'Peñaflor');

-- ----------------------------
-- Table structure for direcciones
-- ----------------------------
DROP TABLE IF EXISTS `direcciones`;
CREATE TABLE `direcciones`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_comuna` int(11) NOT NULL,
  `dir_calle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dir_numero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dir_depto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dir_estado` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52301 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of direcciones
-- ----------------------------
INSERT INTO `direcciones` VALUES (1, 1, 'falsa', '1234', '', 1, NULL, '2022-11-17 11:00:08');
INSERT INTO `direcciones` VALUES (2, 1, 'false', '1234', '', 1, '2022-09-20 16:41:08', '2022-09-20 16:41:08');
INSERT INTO `direcciones` VALUES (3, 1, 'Varas Mena', '980', NULL, 1, '2022-09-22 12:34:38', '2022-09-22 12:34:38');
INSERT INTO `direcciones` VALUES (4, 1, 'Varas Mena', '980', NULL, 1, '2022-09-22 12:36:24', '2022-09-22 12:36:24');
INSERT INTO `direcciones` VALUES (5, 1, 'adasd', '123', NULL, 1, '2022-09-22 12:39:44', '2022-09-22 12:39:44');
INSERT INTO `direcciones` VALUES (6, 1, 'Falsete', '123', NULL, 1, '2022-10-12 16:52:21', '2022-10-12 16:52:21');
INSERT INTO `direcciones` VALUES (7, 1, 'false', '123', '77', 1, '2022-10-12 16:56:19', '2022-10-12 16:56:19');
INSERT INTO `direcciones` VALUES (8, 1, 'Street', '24234', '', 1, '2022-10-12 19:43:19', '2022-10-12 19:43:19');
INSERT INTO `direcciones` VALUES (9, 1, 'calle falsa', '1234', '', 1, '2022-11-03 11:59:52', '2022-11-03 11:59:52');
INSERT INTO `direcciones` VALUES (48, 1, 'Varas mena 980', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (49, 1, 'Varas mena 980', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (50, 1, 'VARAS MENA 980', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (51, 1, 'AV GENERICA', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (52, 1, 'Av. del Parque #5275, Oficina 103', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (53, 1, 'Generico', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (61, 1, 'AVENIDA APOQUINDO 5400 PISO 15', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (63, 1, 'MONASTERIO LA ESPERANZA 130 LT1A 5B', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (64, 1, 'Arturo Prat 527', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (65, 1, 'Joaquin Montero 3000', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (66, 1, 'Santa Beatriz 111 of.904', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (70, 1, 'GRAN AVENIDA J. M. CARRERA #5018 OF.:308', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (77, 1, 'Fanor Velasco 85 oficina 201', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (78, 1, 'SAN IGNACIO DE LOYOLA 1538', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (79, 1, 'Av.Del Parque 4680A Of.208', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (80, 1, 'AVENIDA NORTE 48', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (81, 1, 'AV. LA DEHESA 1822 OF. 711', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (82, 1, 'Compañia 1429 of 2310', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (83, 1, 'AV ALESSANDRI 1601 RAUNQUEN', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (89, 1, 'JUANA DE ARCO 2012 OFICINA 13', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (90, 1, 'Ricardo Lyon 222 Ofi. 1404', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (94, 1, 'Roosevelt 1608', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (95, 1, 'AVENIDA DEL PARQUE 5275', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (96, 1, 'Pedro Pablo Muñoz  675', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (97, 1, 'huerfanos 1052 piso 4', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (101, 1, 'Calle San Pablo 3284', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (106, 1, '18 SEPTIEMBRE 106', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (109, 1, 'Cerro Colorado 5858 Of. 211', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (119, 1, 'Los Militares 5620 - 515', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (121, 1, 'Francisco Bilbao 1129 Oficina 702, piso 7.', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (124, 1, 'AVENIDA DEL PARQUE 4160 OF 401 TORRE A', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (125, 1, 'PASAJE UNION 040 GABRILEA MISTRAL', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (126, 1, 'VILLA LOS TRONCOS 47', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (184, 1, 'RICARDO LYON 815', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (185, 1, 'JORGE HIRMAS 2665', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (187, 1, 'lago peñuela 520', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (188, 1, 'Los Conquistadores 2440', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (194, 1, 'AV NUEVA PROVIDENCIA #1881 Of. 1011', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (196, 1, 'Avda. Libertador Bernardo O Higgins 580 Of. 403', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (205, 1, 'Av. Miraflores 9153', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (207, 1, 'CESPEDES Y GONZALEZ 1611', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (209, 1, 'AVENIDA ALESSANDRI 1513 CASA 53', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (210, 1, 'AVENIDA PAJARITOS 3195  1411', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (211, 1, 'Cayocupil 406', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (217, 1, 'AVENIDA EL ABRA 82-A EL ESFUEZO', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (219, 1, 'Varas mena 981', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (220, 1, 'El corcolen 0543', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (222, 1, 'AVENIDA DEL CONDOR 590', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (224, 1, 'MIGUEL ANSORENA 191 2', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (225, 1, 'general pedro lagos 694', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (233, 1, 'San Bernardo 555', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (241, 1, 'Escriva de Balaguer 9423', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (248, 1, 'villa don rodrigo', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (250, 1, 'Los diaguitas 1124', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (257, 1, 'alcerreca 1166', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (264, 1, 'AV.KENNEDY N 90001,', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (265, 1, 'av el peñon 02385', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (267, 1, 'Providecia 1100 local 9', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (270, 1, 'Ecuador 85, local 1.', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (274, 1, 'Octavio Leiva Opazo', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (277, 1, 'av vicuña Mackenna poniente 7255', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (278, 1, 'Avenida del Valle Norte 857, Piso 3, Ciudad Empresarial.', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (279, 1, 'Las Bellotas 199, Of 62', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (280, 1, 'Av. Las Torres 074, Casa 5.', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (283, 1, 'Av. Cuarta terraza 5001 local 9', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (284, 1, 'irarrazaval 2401 nivel -1', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (289, 1, 'llanos de apuré 680', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (294, 1, 'presidente riesco 5330 local 107 nivel 1', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (299, 1, 'Yungay 614', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (303, 1, 'Sebastopol 552', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (304, 1, 'Avenida Santa María 0844', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (305, 1, 'matura 557', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (307, 1, 'vicuña mackenna 431', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (308, 1, 'Manuel correa 118', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (311, 1, 'La Concepción 322 Piso 7', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (312, 1, 'Población Villa Valle verde pasaje el alerce 11a', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (313, 1, 'San Alfonso 120', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (315, 1, 'Dirección 123', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (316, 1, 'Egaña 153', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (318, 1, 'Av Alemania 4839', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (320, 1, 'AVDA PACIFICO 1789', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (321, 1, 'Gran Avenida, Jose Miguel Carrera, 5018, of, 208', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (322, 1, 'Almirante Riveros 0630 Block 4 L1', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (324, 1, 'Av.Teniente Cruz 570 8 pudahuel', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (326, 1, 'Av maipu 390', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (328, 1, 'Avenida Amsterdam 873', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (330, 1, 'Severo cofre', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (331, 1, 'Balmaceda 0255', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (333, 1, 'Guardia Vieja 522', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (334, 1, 'Carelmapu 2133', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (335, 1, 'Chiloé 4443', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (336, 1, '1 Norte 841', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (337, 1, 'Avenida del Parque #5275 of.103 (ciudad empresarial)', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (338, 1, 'santiago', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (342, 1, 'Santiago', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (343, 1, 'FREIRE 247 LOCAL 2', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (345, 1, 'Av Ortuzar 314 local 4', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (346, 1, 'San bernardo', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (348, 1, 'Eduardo Matte 1726', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (349, 1, 'miguel de unamuno 02332', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (351, 1, '21 DE MAYO 1460', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (356, 1, 'Presidente ibañez 590', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (362, 1, 'AVENIDA PORTALES 2087 LT 2 LOS HEROES', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (363, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (365, 1, 'CERRÓ ACAHAY 821 VILLA TIERRA VIVA', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (370, 1, 'TABANCURA 1278', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (374, 1, 'EL ESFUERZO 886, BELLOTO NORTE', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (377, 1, 'PRIMERA AVENIDA 301', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (378, 1, 'GALLEGUILLOS LORCA 1235', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (379, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (381, 1, 'NAHUELCO 1221', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (382, 1, 'ANDELIEN 571', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (383, 1, 'EL JUNCAL 110', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (384, 1, 'EL OVEJERO 0584', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (385, 1, 'PUCON', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (386, 1, 'PASAJE ISLA PICTON 4495', '1', NULL, 1, '2022-11-03 17:46:12', '2022-11-03 17:46:12');
INSERT INTO `direcciones` VALUES (391, 1, 'BARROS ARANA 1068 1802 MALL DEL CENTRO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (392, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (393, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (394, 1, 'AVENIDA TOME 0764', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (395, 1, 'LASTRA 1347', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (397, 1, 'CAMINO NOS LOS MORROS 565  3 CENTRO COMERCIAL', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (398, 1, 'MORANDE 675', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (401, 1, 'CHINQUIHUE ALTO 1   CHINQUIHUE ALTO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (402, 1, 'LO OVALLE 0854 C', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (403, 1, 'PEDRO MONTT 199   EL LLANO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (404, 1, 'Los Claveles 3647', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (405, 1, 'Avenida Nueva Providencia 2214  58 Providencia', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (406, 1, 'Baquedano 239  715', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (407, 1, 'NUEVA DE LYON 145', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (408, 1, 'Los Leones 1215', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (409, 1, 'PAISAJE DEL MAULE 457   DONA IGNACIA III', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (410, 1, 'TOCORNAL 8250   EL PINO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (411, 1, 'SANTA ROSA 1620', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (412, 1, 'MONASTERIO LA ESPERANZA 130 LT1A 5B', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (413, 1, 'LAS ARAUCARIAS 025', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (414, 1, 'FRANCISCO DE VILLAGRA 77', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (415, 1, 'LOS HALCONES 1283', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (416, 1, 'Avenida Pajaritos 3195  1420 OF. 1420-1419-1418', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (417, 1, 'LAS LAVANDULAS 10587', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (418, 1, 'AV. LA DEHESA 1822  516 OFICINA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (419, 1, 'PAICAVI 2272', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (420, 1, 'CALLAO 3037', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (421, 1, 'ANGELMO 2187', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (422, 1, 'MAC-IVER 225  401 B', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (423, 1, 'AVDA EL PARQUE 4680_A  208 CIUDAD EMPRESARIAL', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (424, 1, 'ANDES 4718', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (425, 1, 'ANDES 4720', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (426, 1, 'PASAJE LOS ALACALUFES 1067   CONVICOOP', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (427, 1, 'Huerfanos 1055  503', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (428, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (429, 1, 'BASTERRICA                35     B', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (430, 1, 'AV SANTA ISABEL 0292   PROVIDENCIA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (431, 1, 'ANTONIA LOPEZ DE BELLO 743  544A', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (432, 1, 'NAPOLEON 3565   202', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (433, 1, 'PAPUDO 2949   VALPARAISO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (434, 1, 'BERNARDO OHIGGINS 4050  1018', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (435, 1, 'PASAJE 1 725   14 DE ENERO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (436, 1, '4 NORTE 48', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (437, 1, 'PEDRO DE VALDIVIA 291  301', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (438, 1, 'SARGENTO JOSE BDO. CUEVAS 483  31', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (439, 1, 'PASAJE DILLU 297   VILLA DELSOL', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (440, 1, 'VARAS MENA 980', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (441, 1, 'CANAL BEAGLE 9781   GREGORIO SEPULVEDA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (442, 1, 'PADRE HURTADO CENTRAL  673', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (443, 1, 'EL DIRECTOR 6000  208', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (444, 1, 'AVENIDA APOQUINDO 4900  44', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (445, 1, 'ANTILLANCA SUR 603 PAR-11 L-20 LOTEO INDUS.LO BOZA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (446, 1, 'COLON 352 OF 320 STUDIOFFICE COLON', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (447, 1, 'AV. LO OVALLE 2499   santa Adriana', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (448, 1, 'GUARDIA VIEJA 202  403', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (449, 1, 'NUEVA LAS CONDES 12253  84', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (450, 1, 'JORGE MONCKEBERG 2693', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (451, 1, 'AV. VICUNA MACKENNA698DP 1216', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (452, 1, 'Moneda 812  706', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (453, 1, 'ESPERANZA 1315', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (454, 1, 'AV.LIBERTADOR B.OHIGGINS 335  5D', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (455, 1, 'Perez Valenzuela 1232', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (456, 1, 'A VARAS 687 OF 1206 ED TORRE SINERGIA  12 1206', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (457, 1, 'AV .CUATRO ESQUINAS 368', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (458, 1, 'GUARDIA VIEJA 202 OF 403 4P', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (459, 1, 'AVDA.ESTADIO 665   EL PENON', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (460, 1, 'SAZIE 2779', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (461, 1, 'AV. RODOLFO WAGENKNECHT 1448', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (462, 1, 'PEDRO DE VALDIVIA 701   RALCO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (463, 1, 'PAN.NORTE PIEDRA COLGADA LOTE88   FUNDO LOS ANGELES', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (464, 1, 'ARTURO PRAT 183 A', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (465, 1, 'JORGE PARRA GAJARDO 553 POB. OHIGGINS', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (466, 1, 'VOLCAN CORCOVADO #5582 DEPTO. #L401', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (467, 1, 'LAS HUALTATAS 8341', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (468, 1, 'RAMON FREIRE 1163', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (470, 1, 'VARAS MENA 981', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (475, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (476, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16734, 1, 'AHUMADA 254 OFICINA 806', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16745, 1, 'GABRIELA 11, ARAUCANÍA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16747, 1, 'SUECIA #0142, OFICINA 202.', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16748, 1, 'DIAGONAL LA ESTRELLA 8548', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16749, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16750, 1, '7 NORTE 469 L7', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16751, 1, 'SIMON BOLÍVAR 4149', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16752, 1, 'VARAS MENA 980', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16753, 1, 'TINGUIRITA 10129 LA FLORIDA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16754, 1, 'TINGUIRITA 10129 LA FLORIDA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16755, 1, 'MELINKA FRENTE AL 540', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16756, 1, 'LA FORTUNA 520', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16757, 1, 'AVENIDA ERRAZURIZ 427', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16758, 1, 'AV LONQUEN 17001 PARCELA 13', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16759, 1, 'AV. LA CANTERA 2375', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16760, 1, 'AVENIDA LOS CARRERA 2757,', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16761, 1, 'SAN CARLOITOS S/N', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16762, 1, 'AGUAS CLARAS 310', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16768, 1, 'VTA REGIÓN', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16769, 1, 'Ethel dunn 1', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16770, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16771, 1, 'DON GUILLERMO 2434, VILLA MAGISTERIO, IQUIQUE', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16773, 1, 'PROVIDENCIA 1208 OF. 1603', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16775, 1, 'ITALIA 1664', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16776, 1, 'BRASIL 660', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16779, 1, 'GENERAL MACKENNA 137 LOCAL 1', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16780, 1, 'SANFUENTES 792 POZO ALMONTE.', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16781, 1, 'PASAJE LA HERRERIA 776 HACIENDA ÑUBLE 2 - SECTOR PARQUE LANT', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16782, 1, 'PINTOR CICARELLI 522', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16784, 1, 'RIACHUELO 1030', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16785, 1, 'PICARTE 731', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16786, 1, 'TEMUCO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16787, 1, 'AVDA. VICENTE HUIDOBRO 7221   PORTAL DE SAN PEDRO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16788, 1, 'ARTURO PRAT 116  102', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16789, 1, 'AV. MANUEL MONTT 037  404', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16790, 1, 'PASAJE ECUADOR 2784', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16791, 1, 'AVDA. 5 DE ABRIL 231', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16792, 1, 'LOS CORRALES 1362   ESTANCIA LIAY', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16793, 1, 'JOSE SILVA ORMENO 137', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16794, 1, 'VICUNA MACKENNA 84', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16795, 1, 'AVDA CARRETERA S/N   QUINCHAMALI', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16796, 1, 'SALVADOR ALLENDE 501', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16797, 1, 'MANUEL MONTT 1593', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16798, 1, 'LOS FARDOS 311   LOS SEMBRADORES', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16799, 1, 'ALHUE 2607   DAVILA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16800, 1, 'HERMOGENES PEREZ DE ARCE 0303   VILLA LOS HEROES', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16801, 1, 'ABATE MOLINA 135', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16802, 1, 'COLCHAGUA 591   CENTRO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16803, 1, 'ESTADIO 398  502-C 502-C', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16804, 1, 'ORTUZAR 738', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16805, 1, 'SERGIO AGUILERA DRAGO 100   LOS CASTANOS', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16806, 1, 'LOS PIMIENTOS 387   SINDEMPART', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16807, 1, 'CHACABUCO 854   LOS SAUCES', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16808, 1, 'LOS JUNCOS                8846                VILLA LA CISTERNA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16809, 1, 'HNO FERNANDO DE LA FUENTE 1435   POBLACION MEXICO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16810, 1, 'JOSE ANGEL ORTUZAR 583', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16812, 1, 'LOS PALTOS 5003', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16813, 1, 'PINTADO 576 (LAS DUNAS)', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16814, 1, 'CARDENAL CARLOS SUBIDO GABADA 47745', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16815, 1, 'BAQUEDANO 239 OF 316', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16816, 1, 'LA CORAZA 4825', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16817, 1, 'camino rosario quinta 2731   apalta  st 4-A', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16818, 1, 'T.SCHMIDT 157   SAN CAMILO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16819, 1, 'B. O\'HIGGINS 718   VILLANUEVA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16820, 1, 'JUVENAL HERNANDEZ JAQUE 665', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16821, 1, 'AVENIDA LA FORIDA 9326', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16822, 1, 'ESMERALDA 2441 2451', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16823, 1, 'LAGO RANCO 2151 BARRIO SAN ANTONIO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16824, 1, 'LOS PERALES PONIENTE 0665', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16825, 1, 'Calle Uno Nro 24 Población Antuhue 3', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16826, 1, 'JORGE MONTT 778', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16827, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16828, 1, 'GINEBRA 3581', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16829, 1, 'lincoyan 569 Depto 205', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16830, 1, 'ENRIQUE MATURANA 1743', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16831, 1, 'AV.CENTRAL NÚMERO 1286 PLACILLA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16833, 1, 'TOMÁS EDISON 0513', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16835, 1, 'NINHUE 3756', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16836, 1, 'SECTOR EL MANZANO KM5 CA 0 EL MANZANO SAN NICOLAS', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16837, 1, 'AVENIDA SANTA ROSA 8097-A', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16838, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16841, 1, 'AVENIDA 28 DE MARZO 1074', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16842, 1, 'SEPTIMA AVENIDA 1253', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16843, 1, 'CALLE QUINHUE 1505', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16844, 1, 'CALLE QUINHUE 1505', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16845, 1, 'ROMA 1076 VILLA ITALIA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16846, 1, 'OROMPELLO 808', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16847, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16848, 1, 'ARTURO PRAT 650 OF 605', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16849, 1, '20 DE AGOSTO 852, PB. CASUTO,', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16850, 1, 'EL CONDOR 2140 LOCAL 2,. CHILE.', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16851, 1, 'CAMINO CAIVICO KM12', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16852, 1, 'MONTT 222 PATIO MONTT LOCAL H', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16853, 1, 'PILOTO PARDO # 209', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16854, 1, 'QUENCHI 5880', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16855, 1, 'AVENIDA DIEGO DE ALMAGRO 1919', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16857, 1, '21 DE MAYO 288', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16860, 1, 'CAMPO DE MARTE 1725', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16861, 1, 'LOS TULIPANES 13', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16863, 1, 'San Alberto #340.', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (16864, 1, 'MANUEL RODRÍGUEZ 1435', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17070, 1, 'CERRO LA CAMPANA 1143', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17071, 1, 'PÍO NONO 450', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17078, 1, 'EL CANELO ESQ. PJE ATARDE S/N EL CANELO', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17080, 1, 'PERALILLO PARCELA 48', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17081, 1, 'ARIZTIA 281', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17082, 1, 'CAM PUBLICO LT 150', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17084, 1, 'RECABARREN 03241', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17087, 1, 'SAN VICENTE 971', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17088, 1, 'RAMÓN BARROS LUCO 103', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17089, 1, 'GENERAL MACKENNA 46-B', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17090, 1, 'SECTOR LEON COLGADO S/N', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17091, 1, 'AV .CARRERA 1890 VILLA TODO LOS SANTOS', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17092, 1, 'DIRECCIÓN KM 3, 5', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17093, 1, 'SANTA MARIA 0220 PISO 2', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17094, 1, 'CASTRO 5078', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17095, 1, 'ALMAGRO 610', '1', NULL, 1, '2022-11-03 17:46:13', '2022-11-03 17:46:13');
INSERT INTO `direcciones` VALUES (17096, 1, 'BULNES #590', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17100, 1, 'ARTURO GODOY 303', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17101, 1, 'ARTURO GODOY 303', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17102, 1, 'ARTURO GODOY 303', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17103, 1, 'O\'HIGGINS 302', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17104, 1, '23 ORIENTE 2 1/2 NORTE #1353', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17108, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17109, 1, 'PASAJE QUILLAGUA 3851 11 LOS PRESIDENTES', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17111, 1, 'CALLE 2 3649A', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17112, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17113, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17115, 1, 'VILLA RICARDO LAGOS EL PROGRESO 30', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17116, 1, 'IGNACIO CARRERA PINTO S/N RAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17117, 1, 'AHUMADA 312 OF 206', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17128, 1, 'SANTA MARTA 446', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17129, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17130, 1, 'LO BOZA FRENTE AL 107', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17131, 1, 'LAS TORRES 07', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17132, 1, 'CONTITUCION 846', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17133, 1, 'FRANCISCO POBLETE 0846', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17134, 1, 'SANTA ISABEL 41', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17135, 1, 'PATRIA Nº 1804 LOCAL A', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17136, 1, 'DIRECCIÓN AMUNATEGUI 540', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17137, 1, 'EJÉRCITO 31 POBLACIÓN CENTENARIO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17138, 1, 'LOS CARDENALES S/N PUEBLO SECO,', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17139, 1, 'ARTURO GODOY 303', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17140, 1, 'AVENIDA PROVIDENCIA 2529', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17141, 1, 'Saavedra 768 victoria, Dpto 2', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17142, 1, 'BERNA 1 ORIENTE 2370', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17143, 1, 'HERMANOS CLARK 175', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17144, 1, 'ARAUCO 920 B', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17145, 1, 'SANTAGO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17146, 1, 'AVDA LUIS DAMANN 963', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17147, 1, 'CLAUDIO ARRAU 9262', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17148, 1, 'SERRANO #258', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17149, 1, 'IRARRAZAVAL 698', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17150, 1, 'AVENIDA OHIGGINS 272', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17153, 1, 'AV LAS CONDES 9434', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17154, 1, 'EL LAZO 868', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17155, 1, 'Sucursal Chilexpress PUREN', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17157, 1, 'CAMINO A LAMPA 103 A2', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17158, 1, 'CAMINO A LAMPA PARCELA 103 A2', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17159, 1, 'PASAJE ISLA QUENAC 249 PUDAHUEL SUR', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17160, 1, 'asunción 2889', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17161, 1, 'MAC IVER 1120', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17162, 1, 'ZÚÑIGA 196.', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17163, 1, 'PEDRO MONTT 2156,', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17164, 1, 'AMÉRICA VESPUCIO 33 LOCAL 303', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17165, 1, 'LA CONSTITUCION 1591', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17166, 1, 'DIRECCION: SARGENTO ALDEA 1016', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17167, 1, 'VICUÑA MACKENA PONIENTE 7255 OFINICA 816', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17169, 1, 'EL VOLCAN 04507', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17170, 1, 'GUILLERMO MATTA 2698', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17171, 1, '21 DE MAYO 288', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17172, 1, '21 DE MAYO #1357', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17173, 1, '21 DE MAYO 1349', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17176, 1, 'INES RIVAS 0514', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17177, 1, 'BALMACEDA511', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17178, 1, '21 DE MAYO 1472-B', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17179, 1, 'MIGUEL AGUIRRE 292', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17180, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17181, 1, 'ESMERALDA 1074 of 301', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17182, 1, 'HUERFANOS 1055, L1061,', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17183, 1, 'PDTE ERRAZURIZ 567 B', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17184, 1, 'BOLONIA 2330', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17185, 1, 'FRANCISCO NOGUERA 217', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17186, 1, 'TAULEMU S/N', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17187, 1, 'MAIHUE 555', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17188, 1, 'SANTA RAQUEL 8700', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17190, 1, 'AMUNATEGUI 77', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17191, 1, 'BALNEARIO COVADONGA #S/N', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17192, 1, 'SITIO   NÚMERO 3 SOCAVON CENTRO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17193, 1, 'AVDA BERNARDO OHIGGINS 2B    403', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17194, 1, 'AV BAQUEDANO 892', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17195, 1, 'ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17196, 1, 'SUCRE 2216', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17197, 1, '21 DE MAYO 1289', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17198, 1, 'AV LAS TORRES 1 PASAJE 4 5369', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17200, 1, 'PASAJE MUJERES CHILENAS 2889', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17201, 1, 'DIAGONAL O\'HIGGINS 983', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17204, 1, 'Sucursal Chilexpress Salamanca', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17205, 1, 'SEDE COMUNITARIA S/N', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17206, 1, 'SALVADOR ALLENDE 208', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17207, 1, 'ALONSO DE LA FUENTE 01440 VILLA  PABLO NERUDA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17208, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17209, 1, 'LOS PALTOS 1334', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17225, 1, 'AV: INDEPENDENCIA #372', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17226, 1, 'VILLA SAN ISIDRO PASAJE LAS AMAPOLAS 0343', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17227, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17228, 1, 'DIAGONAL PARAGUAY 481 OF 78', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17229, 1, 'AV. PAJARITOS 1751, LOCAL P12,', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17230, 1, 'SARGENTO ALDEA 1263', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17231, 1, 'QUINTEROS 0658', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17232, 1, 'CONSTITUCIÓN 818 - C', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17233, 1, 'AV. BALMACEDA # 2216', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17234, 1, 'MAIPÓN 999', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17235, 1, 'SERRANO S/N', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17236, 1, 'ALEXIS SÁNCHEZ 2958', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17237, 1, 'TAMARA1624@GMAIL.COM', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17238, 1, 'CARTAGENA 4280', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17239, 1, 'ADOLFO NOVOA 1064, BLOCK 2  LOCAL 2', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17240, 1, 'ADOLFO NOVOA 45', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17241, 1, 'CHILEXPRESS PLACILLA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17243, 1, 'SAUZAL 732', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17244, 1, 'LUIS ARANEDA #1030', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17248, 1, 'EL MAICILLO CASA 1', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17249, 1, 'LA MANGA 2 S/N', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17250, 1, 'INDEPENDENCIA 482', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17251, 1, '21 DE MAYO 2182', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17252, 1, 'INDEPENDENCIA 966', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17253, 1, 'PARCELA 25 PERALILLO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17254, 1, 'ESMERALDA 2675', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17255, 1, '21 DE MAYO 1735', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17256, 1, 'NUEVA PROVIDENCIA 2260 LOCAL 98', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17257, 1, 'ESMERALDA 2675', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17258, 1, 'PARCELA 97', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17259, 1, 'COLON 321', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17260, 1, 'ARLEGUI 263 EDIFICIO GALA OFICINA 705', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17261, 1, 'BOLIVAR 1324', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17262, 1, 'ESMERALDA 2675', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17263, 1, 'ESMERALDA 2675', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17264, 1, 'OFICINA CHILEXPRESS LUTUECHE', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17265, 1, 'LIBERTAD 175-B', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17266, 1, 'PASAJE SAN CRISTÓBAL 0147', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17267, 1, 'PILOTO PARDO S,/N', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17268, 1, 'VILLA RENACER, PASAJE 6, CASA 101', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17269, 1, 'CHILEXPRESS OFICINA LITUECHE', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17270, 1, 'ARTURO PRAT #119', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17271, 1, 'LAS MADRESELVAS #032', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17272, 1, 'LUIS LAZARINI.7860', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17273, 1, 'BERNARDO OHIGGINS 786', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17274, 1, 'MAIPON 636', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17275, 1, 'GENERAL MACKENNA 46 -C', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17276, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17277, 1, 'SUCURAL DE CHILEXRPRESS TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17278, 1, 'CALLE MAIPÚ 698 LOCAL 5', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17279, 1, 'COMBARBALA 010', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17280, 1, 'CAMINO LAS RASTRAS, KM. 5, FUNDO LA HIGUERA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17281, 1, 'RIO GOMEZ MANZANA 21 #25 PICHI PELLUCO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17282, 1, 'STA ROSA 8043', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17283, 1, 'AV. CONCHA Y TORRO #3854, LOCAL 1061', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17284, 1, '14 DE FEBRERO 2065 OF 606 EDIFICIO ESTUDIO 14', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17285, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17286, 1, 'PEDRO MONTT 27, EL LLANO,', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17287, 1, 'DIRECCIÓN ESPOLETO 238 VILLA SAN FRANCISCO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17288, 1, 'CHILEXPRES ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17289, 1, 'COPAYAPU 4814', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17290, 1, 'COPAYAPU 4814', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17291, 1, '15 Y MEDIO NORTE 4081, SECTOR VALLES DEL COUNTRY,', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17302, 1, 'CHILEXPRESS SUCURSAL COQUIMBO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17303, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17316, 1, 'MANUEL BULNES 968', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17326, 1, '21 DE MAYO 1977-A', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17327, 1, '21 DE MAYO 1505', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17338, 1, 'LOS QUELTEHUES 268 BARRIO LOS CASTAÑOS LABRANZA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17339, 1, 'CHILEXPRESS SUCURSAL TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17340, 1, 'MARIO ALISTER VALENZUELA CASA NUMERO 071', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17341, 1, 'CHILEXPRESS LOS VILOS', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17342, 1, 'CAREN MAPUL 14703', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17343, 1, 'AVDA. RICARDO VICUÑA 1755 VILLA GALILEA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17344, 1, 'AVDA. RICARDO VICUÑA 1747 VILLA GALILEA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17345, 1, 'SUCURSAL CHILEXPRESS IQUIQUE SUR', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17346, 1, 'CHILEXPRESS IQUIQUE SUR', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17347, 1, 'CHILEXPRESS IQUIQUE SUR', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17348, 1, 'CHILE EXPRÉS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17349, 1, 'TRISTAN MATTA 1690', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17350, 1, 'MANZANO 308', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17351, 1, 'ENRIQUE MAC IVER 184', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17352, 1, 'ESPOLETO 238 VILLA SAN FRANCISCO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17353, 1, 'LOURDES 1784 BOSQUE SAN FRANCISCO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17354, 1, 'MARÍA AUXILIADORA 775', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17355, 1, 'BASCUÑÁN SANTA MARÍA 880', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17356, 1, 'TOESCA 2802 DPTO 713', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17357, 1, '21 DE MAYO 2083', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17358, 1, 'TENIENTE CRUZ 27 DEPTO 525', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17359, 1, 'TENIENTE CRUZ 27 DEPTO 525', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17361, 1, 'LOS ROBLES 921 LA FORESTA', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17362, 1, 'BERNARDO O\'HIGGINS 1054', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17363, 1, 'AULEN 257', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17364, 1, 'THOMPSON 485', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17365, 1, 'LASTARRIAS, PASAJE 18 NRO 3960', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17366, 1, 'CALLE MARIQUINA N°184', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17367, 1, 'POBLACIÓN EL MIRADOR, PASAJE ANTOFAGASTA 436', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17369, 1, 'SAN FRANCISCO PC 2 LT F', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17370, 1, 'SUCURSAL CHILEXPRESS RANCAGUA CAMPOS', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17371, 1, 'BELLA VISTA 245', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17372, 1, 'RUTA H50 CAMINO ROSARIO A QTA TILCOCO 1809, ROSARIO,', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17374, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17375, 1, 'GILBERTO FUENZALIDA 203 LOCAL 14', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17376, 1, 'PORTAL DE LA TARDE 1364', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17377, 1, 'SUCURSAL DE CHILEXPRESS: CHILLAN CINCO DE ABRIL 632', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17378, 1, 'SUCURSAL DE CHILEXPRES ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17379, 1, 'SUCURSAL CHILEXPRESS AV. DIEGO PORTALES  2380, ARICA.', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17381, 1, 'NUEVA DE LYON 45 LOCAL 34B', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17382, 1, 'POBLACIÓN ELEUTERIO RAMIREZ. PASAJE CINCO CASA 21', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17383, 1, 'PLAZUELA SAN FRANCISCO 260, DEPARTAMENTO 14', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17384, 1, 'CALLE ALEXIS SANCHEZ 2958', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17386, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17387, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17388, 1, 'SUCURSAL DE CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17389, 1, 'MARÍA AUXILIADORA #775', '1', NULL, 1, '2022-11-03 17:46:14', '2022-11-03 17:46:14');
INSERT INTO `direcciones` VALUES (17390, 1, 'SAN ANTONIO 12B', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17391, 1, 'ESMERALDA 1129', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17392, 1, 'LOS TULIPEROS 1428 INVICA PLACILLA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17393, 1, 'PLAZUELA SAN FRANCISCO 260, DEPARTAMENTO 14', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17395, 1, 'SUCURSAL CHILEXPRESS LANCO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17396, 1, 'DIRECCIÓN EG MERINO 561', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17398, 1, 'ANDALICAN 1072', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17399, 1, 'INDEPENDENCIA 432', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17400, 1, 'SANTA ANA 235', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17401, 1, 'SUCURSAL CHILEXPRESS CHAITEN (DIEGO PORTALES 54)', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17402, 1, 'AVDA CERRO PARANAL 210 DEPTO 52 EDIFICIO PETROHUE', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17403, 1, 'SUCURSAL CHILEXPRESS TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17407, 1, 'MONEDA 720 LOCAL 83', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17408, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS,', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17409, 1, 'SUCURSAL CHILEXPRESS LOS MUERMOS', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17410, 1, 'MAPOCHO 3270', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17411, 1, 'AVENIDA CENTRAL 22, PLACILLA,', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17412, 1, 'SUCURSAL CHILEXPRESS SAN FELIPE', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17413, 1, 'AVENIDA LA ESTRELLA 1083', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17414, 1, 'AVENIDA LA ESTRELLA 1083', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17415, 1, 'AVENIDA LA ESTRELLA 1083', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17418, 1, 'CALLE ONCE 169 POB, LICKANANTAY OFICINA 5', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17419, 1, 'CALLE CURICÓ 80, LOCAL 1', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17420, 1, 'AVDA. MINERO ARMANDO CHAVEZ ROMERO 1880', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17421, 1, 'SAN ALFONSO 54', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17423, 1, 'SN. FRANCISCO 1 HIJUELA 2', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17424, 1, 'URETACOX 1002', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17425, 1, 'AV VIDELA 127', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17426, 1, 'MANUEL VERBAL 1545 TORRE A DEPTO 1701', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17427, 1, 'CALLE LOS INMIGRANTES 726', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17428, 1, 'AV CAUPOLICAN 657', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17429, 1, 'DIVINO MAESTRO 7545', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17432, 1, 'TUCAPEL PONCE 495', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17433, 1, 'SUCURSAL CHILEXPRESS SAN JAVIER', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17434, 1, 'SUCURSAL CHILEXPRES DE DIEGO PORTALES', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17435, 1, 'SUCURSAL CHILEXPRESS OVALLE (MIGUEL AGUIRRE 280)', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17436, 1, 'RICARDO KREBS #6451', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17437, 1, 'CAUPOLICAN 544 LOCAL 36', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17438, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17441, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17442, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17443, 1, 'DEIMOS 5335', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17444, 1, 'JUAN ANTONIO COLOMA 410', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17445, 1, 'GUACOLDA 50', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17447, 1, 'SUCURSAL CHILEXPRESS RANCAGUA AVENIDA ESPAÑA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17448, 1, 'HERMANOS CARRERAS  516', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17449, 1, 'AV ESPAÑA 443 LOCAL 1', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17450, 1, 'LAS VIOLETAS 251', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17451, 1, 'SUCURSAL CHILEXPRESS DE TRAIGUEN', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17452, 1, 'AVDA URUGUAY 534', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17453, 1, 'OHIGGINS  981', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17454, 1, 'BULNES 184', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17456, 1, 'MANUEL ANTONIO TOCORNAL 743', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17457, 1, 'CAMINO INTERNACIONAL 2196', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17459, 1, 'LOS TUMBOS 2861', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17461, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17462, 1, 'PASAJE ARTURO PRATT #483', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17463, 1, 'PASAJE ARTURO PRATT #483', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17464, 1, 'AVENIDA ESPAÑA 443LOCAL 1', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17465, 1, 'SERRANO 78', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17466, 1, 'INDEPENDENCIA 432 CASA 4', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17467, 1, 'CARLOS RICHTER 388', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17468, 1, 'JUAN MIRANDA 1051', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17470, 1, 'PJE CALLE CALLE 580 PARQUE PILMAIQUEN', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17471, 1, 'COMERCIO 321', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17472, 1, 'PEDRO MONTT 325', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17473, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17474, 1, 'TRES DE JULIO 6785', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17475, 1, 'RIO IMPERIAL 669 VALLE GRANDE', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17476, 1, 'ALDUNATE 1601', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17477, 1, 'LUIS CRUZ MARTÍNEZ 1385', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17478, 1, 'Leon prado 536', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17479, 1, 'CATEDRAL 4501', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17480, 1, 'AV. LOS CERRILLOS 1080', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17481, 1, 'THOMPSON 1002', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17482, 1, 'CAMINO INTERNACIONAL 2130', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17484, 1, 'PARCELA 50 LOTE 3 PERALILLO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17485, 1, 'CALLE 7 DE FEBRERO NÚMERO 16 VILLA LA POSADA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17486, 1, 'SUCURSAL CHILEXPRESS EN COLLIPULLI', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17488, 1, 'VARAS MENA 965', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17489, 1, 'AVENIDA ESPAÑA 430', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17494, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17495, 1, 'SUCURSAL CHILEXPRESS CRUZ DEL SUR', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17496, 1, 'AVENIDA MAIPU 85', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17501, 1, 'SUCURSAL CHILEXPRESS  CRUZ DEL SUR', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17508, 1, 'SARGENTO ALDEA 2282-B', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17509, 1, 'SUCURSAL CHILEXPRESS TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17511, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17514, 1, 'PASAJE PEDRO DE VALDIVIA 3650 VILLA SANTA MARIA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17517, 1, 'OFICINA CHILEXPRESS SALAMANCA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17518, 1, 'CHILEPREX PUERTO CISNES', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17519, 1, 'ARTESANOS 637', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17520, 1, 'RECOLETA 124', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17521, 1, 'TENDERINI 55 LOCAL 21', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17522, 1, 'MODENA 720 LOCAL 51', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17530, 1, '2 PONIENTE #1474 VICENTE PEREZ ROSALE', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17531, 1, 'RUIZ DE GAMBOA 1620 V P ROSAL', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17537, 1, 'SANTA VICTORIA 360 DPTO 305', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17541, 1, 'AVENIDA JOSE MANUEL INFANTE #783', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17542, 1, 'ALMAGRO 625', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17545, 1, 'JULIO ECHEVERRÍA 100', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17550, 1, 'SUCURSAL CHILEXPRESS ARICA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17551, 1, 'CHILEEXPRESS PITRUFQUEN', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17552, 1, 'MIRAMAR 67', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17555, 1, 'AVENIDA SANTA MARÍA 2141 LOCAL 32', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17557, 1, 'MANUEL GUTIERREZ 2429 B', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17558, 1, 'MANUEL GUTIERREZ 2429-B', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17561, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17563, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17567, 1, 'SUCURSAL CHILEXPRESS CAUQUENES', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17568, 1, 'LOS RAULIES 161  VILLA SAN ISIDRO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17569, 1, 'ALEMANIA 3340', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17574, 1, 'QUINO 098 VILLA HUEQUÉN', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17583, 1, 'RETIRO EN TIENDAS', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17586, 1, 'AVENIDA 10 DE JULIO 542 LOCAL 3', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17587, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17588, 1, 'DIRECCION GABRIELA MISTRAL 1262', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17589, 1, 'SUCURSAL CHILEXPRESS LOS MUERMOS: SAN MARTÍN #200', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17590, 1, 'DIRECCION BALMACEDA 310', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17593, 1, 'SUCURSAL CHILEXPRESS SAN FELIPE', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17594, 1, 'SUCURSAL CHILEXPRESS TEMUCO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17601, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17602, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17603, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17604, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17605, 1, 'PEDRO DE ATACAMA 175 RENACA ALTO COMUNA VIÑA DEL MAR', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17606, 1, 'AVENIDA LYNCH 829', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17608, 1, 'SANTA ESTER 820', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17609, 1, 'TRES NORTE 1769', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17610, 1, 'MONUMENTO 97', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17611, 1, 'CALLE ARTURO PRAT N 84. SAN JOSÉ DE LA MARIQUINA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17612, 1, 'CHILEXPRESS QUINTA NORMAL SUCURSAL MAPOCHO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17622, 1, 'CONDOR 1080 LOCAL 2', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17623, 1, 'GENERAL SAN MARTIN 098', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17624, 1, 'HOEVEL 4486 QUINTA NORMAL', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17625, 1, 'CALLE CHORRILLOS 1360 B', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17627, 1, 'SERGIO VALDOVINOS1158', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17628, 1, 'SUCURSAL CHILEXPRESS RANCAGUA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17629, 1, 'OBISPO RAIMUNDO VALENZUELA #0204', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17632, 1, 'PASAJE CARIBE 650', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17633, 1, 'PLAZUELA SAN FRANCISCO 260, DEPARTAMENTO 14', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17634, 1, 'PAULA PINEDA 643, CASABLANCA, VALPARAÍSO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17636, 1, 'SUCURSAL CHILEXPRESS, SAN FELIPE', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17637, 1, 'SUCURSAL CHILE EXPRESS MARIQUINA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17638, 1, 'AVDA PEDRO AGUIRRE CERDA 5302', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17639, 1, 'SAN MARTIN 98', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17640, 1, 'PASAJE CARDON 4609 VILLA DEL SOL', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17644, 1, 'SUCURSAL CHILEXPRESS COMBARBALA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17645, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17646, 1, 'AV. CONSISTORIAL 3491 LOCAL 7', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17647, 1, 'MIGUEL GALLO 516', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17648, 1, 'MULATO GIL 0669', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17651, 1, 'CHILEXPRESS LINARES', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17652, 1, 'SAN RENÉ 4120', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17654, 1, 'INDEPENDENCIA 463', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17656, 1, 'PEDRO ANGULO NOVOA N° 1025 CHIGUAYANTE - CONCEPCIÓN', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17657, 1, 'MANUEL RODRIGUEZ N° 870 CHIGUAYANTE - CONCEPCIÓN', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17658, 1, 'MANUEL RODRIGUEZ N° 870 CHIGUAYANTE - CONCEPCIÓN', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17660, 1, 'ARTURO GODOY 303', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17661, 1, 'SUCURSAL CHILEEXPRES SANTIAGO CENTRO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17662, 1, 'RETIRAR EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17664, 1, '21 DE MAYO #1743', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17665, 1, 'CALLE MARIQUINA 1280, VALDIVIA, MARIQUINA , LOS RIOS', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17666, 1, 'FRANKFORT 5374', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17669, 1, 'CHILEXPRESS COMBARBALA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17671, 1, '.', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17672, 1, 'CHACABUCO 3298', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17677, 1, 'Av. Beaucheff 1021', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17680, 1, 'LUNES 76', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17681, 1, 'CHILEXPRESS COMBARBALA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17682, 1, 'SUCURSAL CHILEXPRESS MARIQUINA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17683, 1, 'GRAN AVENIDA 5667', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17684, 1, 'SUCURSAL CHILEXPRESS, SAN FELIPE', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17685, 1, 'RECREO 250, ESTACION CENTRAL, DPTO 301', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17687, 1, 'AVDA SALVADOR ALLENDE 690', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17689, 1, 'SUCURSAL CHILE EXPRÉS DE COMUNA MARIQUINA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17691, 1, 'VILLA DON OSCAR PJE.LUISA SEPULVEDA #916', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17692, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17693, 1, 'PASAJE CERRO LA PARVA 1868', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17694, 1, 'MIGUEL GALLO 785', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17695, 1, 'CHACABUCO 180 D', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17696, 1, 'CHILEXPRESS SUCURSAL TALCA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17697, 1, 'MACKENA 771 LOCALIDAD BALMACEDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17698, 1, 'AVDA SALVADOR ALLENDE 690', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17699, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17700, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17701, 1, 'PLAZUELA SAN FRANCISCO 260, DEPARTAMENTO 14', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17702, 1, 'AV.LAS TORRES 4719', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17703, 1, 'AVENIDA LAS INDUSTRIAS 4646, SAN JOAQUIN, SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17704, 1, 'LOS MILITARES 5620 OF 1018', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17705, 1, 'BRASILERA 0253, REGIÓN DE MAGALLANES', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17706, 1, 'OROMPELLO 1123-C', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17707, 1, 'CONSTITUCION 857', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17710, 1, 'RIO CALLE CALLE 1713 CONCHALI  CIUDAD SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17711, 1, 'RIO CALLE CALLE 1713 CONCHALI  CIUDAD SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17712, 1, 'DIRECCIÓN FONTT 641', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17714, 1, 'EL TENIENTE 530', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17715, 1, 'DIRECCIÓN SERRANO 1217 TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17716, 1, 'AVENIDA PADRE ALBERTO HURTADO #497', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17717, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17719, 1, 'AN GUILLERMO 0652 VILLA SAN GUILLERMO 2', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17720, 1, 'CHILE EXPRESS RIO BUENO', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17721, 1, 'CALLE LA ESCUELA 70', '1', NULL, 1, '2022-11-03 17:46:15', '2022-11-03 17:46:15');
INSERT INTO `direcciones` VALUES (17723, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17724, 1, 'SUCURSAL CHILEEXPRESS  OVALLE MIGUEL AGUIRRE 280', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17725, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17726, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17729, 1, 'LORD COCHRANE 417 SANTIAGO CENTRO', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17732, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17733, 1, 'OFICINA CHILEXPRESS PANGUIPULLI', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17735, 1, 'MICHIMALONGO 17', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17736, 1, 'TOESCA 2831', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17737, 1, 'CALLE CONCEPCION #401', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17738, 1, 'CAMINO A CAHUIL 679', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17739, 1, 'BULNES 1199', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17741, 1, 'ALCALDE FDO.CASTILLO V. #9001 DEPTO. #LOC.4', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17742, 1, 'Estacion los vientos 267 casa 8 Condominio araucarias', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17746, 1, 'SAN LUIS DE MACUL 571 LOCAL 3', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17748, 1, 'GALVARINO RIVEROS 468 QUELLÓN- CHILOÉ', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17750, 1, 'FONTT 641', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17751, 1, 'ADOLFO NOVOA 45', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17752, 1, 'ESMERALDA #545, LOS ANDES', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17753, 1, 'FERIA MODELO LOCAL L 18', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17754, 1, 'LASTRA 685', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17755, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17756, 1, 'MONTT 565', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17757, 1, 'CALLE AV IGNACIO SILVA 274', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17758, 1, 'CALLE AV IGNACIO SILVA 274', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17759, 1, 'SUCURSAL CHILEXPRESS ANCUD', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17760, 1, 'SUCURSAL CHILEEXPRESS  OVALLE (MIGUEL AGUIRRE - 280 - LOCAL)', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17761, 1, 'SUCURSAL CHILEEXPRESS  OVALLE MIGUEL AGUIRRE - 280 - LOCAL 1', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17762, 1, 'SUCURSAL CHILEXPRESS LITUECHE', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17763, 1, 'PEDRO DE VALDIVIA 451', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17764, 1, 'CHILEXPRESS DE ANCUD', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17765, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17766, 1, 'MANUTARA 9875', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17774, 1, 'GUALDA 120', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17775, 1, 'chilexpress salamanca', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17776, 1, 'SANTA BEATRIZ 111 - 904, PROVIDENCIA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17777, 1, 'RETIRO EN TIENDA CARLA JORQUERA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17778, 1, 'HOSPITAL MANO DERECHA , FROILAN 1379', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17779, 1, 'AV. SALVADOR ALLENDE 526', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17780, 1, 'THOMPSON 1028', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17781, 1, 'MERCADO RENGO LOCAL B6', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17782, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17783, 1, 'ANTOFAGASTA.', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17785, 1, 'RETIRO EN TIENDA CARLA JORQUERA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17786, 1, 'RETIRO EN TIENDA CARLA JORQUERA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17787, 1, 'RETIRO EN TIENDA CARLA JORQUERA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17788, 1, 'MARÍA AUXILIADORA 775', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17789, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17790, 1, 'CALLE VALPARAÍSO 232', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17791, 1, 'SUCURSAL CHILEXPRESS MALL TOBALABA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17792, 1, 'CIRO BOETTO 127', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17794, 1, 'HÉCTOR ZAMORANO 510', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17799, 1, '20 SUR # 261', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17800, 1, 'JOSE MANUEL BALMACEDA #4387 DEPTO. #C', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17802, 1, 'TRINIDAD RAMIREZ 0252 CASA D', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17803, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17804, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17806, 1, 'SUCURSAL DE CHILEXPRESS VILLARRICA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17807, 1, 'CHILEXPRESS AGENTE AUTORIZADO CON DIRECCIÓN  AV. SIMPSON 100', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17810, 1, 'CERRO ROBLE # 1023 CHILLAN', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17811, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17812, 1, 'SUCURSAL CHILEXPRESS  HORNOPIRÉN', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17813, 1, 'AVDA CERRO PARANAL 210 DEPTO 52 EDIFICIO PETROHUE', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17814, 1, 'JOSÉ MIGUEL CARRERA#2 PARADERO E, POBLACIÓN LA UNIDAD FOREST', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17819, 1, 'INDEPENDENCIA 120, CAIMANES, LOS VILOS', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17820, 1, 'ESMERALDA 88, CAIMANES', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17823, 1, 'SAN MARTIN 870 DEPTO 1121', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17824, 1, 'HUÉRFANOS 1373 OF 806', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17826, 1, 'CURICO NRO. 396', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17827, 1, 'PASAJE LA PLATA N° 8102, POBLACIÓN PEÑA BLANCA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17828, 1, 'PAILLACAR 6853, CONDOMINIO STA ROSA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17829, 1, 'AVENIDA EDUARDO FREY MONTALVA 8571', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17830, 1, 'BELLAVISTA 0349', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17831, 1, 'CAMINO ACAÑITAS KM 2 LOS MUERMOS', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17832, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17834, 1, 'SAN MARTÍN 113 ESQUINA BUIN', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17835, 1, 'CHILEXPRESS PICK UP ALMACÉN ROSA ESTER RAMÓN VENEGAS 3191', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17837, 1, 'WENCESLAO QUIROZ TAPIA 149 VILLA CAMPO LINDO COMUNA MELIPILL', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17839, 1, 'SUCURSAL CHILEXPRESS: SALAMANCA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17840, 1, 'PASAJE 6 CASA 83 JARDINES DE ANDALIEN', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17841, 1, 'BARROS ARANA 544', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17842, 1, 'DOMICILIO TUNGA SUR LOTE 131', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17843, 1, 'SUCURSAL DE CHILEXPRESS PICHILEMU', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17845, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17846, 1, 'HILE EXPRESS SUCURSAL MELIPILLA CALLE SAN MIGUEL', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17847, 1, 'CHILEXPRESS HUALAÑE', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17853, 1, '12 DE MAYO 0220', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17854, 1, 'CALLE LAS CAMELIAS 1149', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17858, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17859, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17861, 1, 'PEDRO DE VALDIVIA 100, PANGUIPULLI', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17863, 1, 'SUCURSAL CHILEXPRESS ANGOL', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17864, 1, 'ARIZTIA PONIENTE 363', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17865, 1, 'SUCURSAL CHILEXPRESS DE LOS VILOS', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17866, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17867, 1, 'SUCURSAL CHILEXPRESS SAN JAVIER', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17868, 1, 'LOS NARANJOS 6985', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17869, 1, 'LOMAS DE PUTAGAN 57', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17870, 1, 'CALLE LA FLORIDA 1177, COMUNA SAN ESTEBAN, CIUDAD, LOS ANDES', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17872, 1, 'ALBERTO LARRAGUIBEL #2688', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17877, 1, 'LOS TALABERAS 782, RANCAGUA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17878, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17886, 1, 'CALLE 14 DE FEBRERO 2532, OF. 1', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17887, 1, 'CALLE ARAUCO 347', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17888, 1, 'CAMINO A CAHUIL 3215 A', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17889, 1, 'CAMINO A CAHUIL 3215 A', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17890, 1, 'SUCURSAL CHILEXPRESS IQUIQUE', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17892, 1, 'SUCURSAL CHILEXPRES LITUECHE', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17893, 1, 'AV JOSE MARIA CARO 3005 DPTO 102-K', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17894, 1, 'JOSÉ JOAQUÍN PÉREZ 8830 BLOQUE 7 DEPTO 14', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17896, 1, 'EL MIRADOR 331', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17897, 1, 'CHILEXPRES VILLARRICA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17898, 1, 'SITIO 18 SANTA SARA DE BATUCO', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17899, 1, 'EJERCITO # 2977', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17900, 1, 'CHILEXPRES, CALLE MARIQUINA 1280, SAN JOSE DE LA MAQUINA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17905, 1, 'CHILEXPRES HORNOPIREN', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17907, 1, 'PARIS 750', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17908, 1, 'SAN JOSE DE LA MAQUINA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17909, 1, 'AVENIDA HUMERES 548', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17910, 1, 'COQUIMBO 1454', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17911, 1, 'PASAJE SANTIAGO DE AZOCAR 477 VILLA CAMPO LINDO', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17912, 1, 'CHILEXPRESS IQUIQUE PLAZUELA LOS HEROES', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17920, 1, 'SAN MANUEL KM3 CAMINO A CODIGUA/MELIPILLA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17921, 1, 'SANTA RAQUEL 10831, LA FLORIDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17924, 1, 'CLODOMIRO CORNUY 840  REGIÓN DE LOS RÍOS', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17926, 1, 'SAN JOSÉ 67', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17932, 1, 'SUCURSAL CHILEXPRESS CALDERA ATACAMA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17933, 1, 'PASAJE LOS BOLDOS 1935 VILLA MELGARES', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17934, 1, 'VIOLA DON MARTÍN PASAJE LOS ABEDULES 1561', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17938, 1, 'IQUIQUE 3043', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17941, 1, 'SALVADOR SANFUENTES 2647 LOCAL 214 COMUNA SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17944, 1, 'CONDELL 570', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17945, 1, 'CHILEXPRESS COLBÚN', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17951, 1, 'SUCURSAL DE CHILEXPRESS EN SANTA CRUZ', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17952, 1, 'JACARANDÃ SUR 18335 LOCAL 17', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17953, 1, 'LUIS CRUZ MARTÍNEZ NÚMERO 96', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17954, 1, 'AVENIDA LAS NACIONES 01341. BARRIO LAS ENCINAS', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17958, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17959, 1, 'CAMILO HENRIQUEZ 1756', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17962, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17963, 1, 'PJE MEDINA 21 CASA 2 CERRO MONJAS VALPARAÍSO', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17965, 1, '10 DE JULIO 568.', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17966, 1, 'MAPOCHO 5295 - QUINTA NORMAL', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17970, 1, 'RECOLETA 102', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17972, 1, 'AV. PEDRO AGUIRRE CERDA 8773', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17973, 1, 'HUASCO 6862, CLARA ESTRELLA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17975, 1, 'CHILEXPRES CURAUMA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17976, 1, 'RAMÓN RABAL TUCAPEL#175, CURANILAHUE.', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17977, 1, 'OFICINA DE CHILEXPRES DE VALPARAÍSO EN LA AVENIDA PEDRO MONT', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17978, 1, 'INDEPENDENCIA 297', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17979, 1, 'AV VIAL RECABARREN 0896', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17981, 1, '(AGENCIA CHILEXPRESS)  LOS VILOS AVENIDA CAUPOLICAN 498', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17982, 1, 'AV. VICENTE MÉNDEZ 07', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17984, 1, 'LOS VILOS (AGENCIA CHILEXPRESS)', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17986, 1, 'RETIRO EN TIENDA.', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17988, 1, 'LOS CORRALES 89A SECTOR EL PRINCIPAL', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17989, 1, 'SILVA CHAVEZ 1264', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17990, 1, 'CALLE BULLES 588', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17991, 1, 'TORREBLANCA 2381', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17992, 1, 'CHILEXPRESS SUCURSAL SALAMANCA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17993, 1, 'ARTURO PRAT 031 POBLACIÓN  EL GUINDAL', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17994, 1, 'CHILEEXPRES ANTOFAGASTA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17995, 1, 'CHILEEXPRÉS ANTOFAGASTA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17996, 1, 'SUCURSAL CHILEEXPRESS ANTARES', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (17999, 1, 'DOMINGO AMUNATEGUI 83 POBL. GENERAL DEL CANTO', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18000, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18001, 1, 'ROLEVANCIA649@GMAIL.COM', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18002, 1, 'RETIRAMOS DESDE TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18003, 1, 'SUCURSAL DE CURANILAHUE, REGIÓN DEL BIOBÍO', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18006, 1, 'SUCURSAL CHILEXPRESS SALAMANCA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18007, 1, 'BALMACEDA 984 FUTRONO REGIÓN DE LOS RIOS', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18008, 1, 'SIGLO XXI 2800', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18010, 1, 'LOS LIRIOS 2941', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18011, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18012, 1, '(AGENCIA CHILEXPRESS)', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18013, 1, 'CALLE LAS CHACRILLAS 1336', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18014, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18015, 1, 'MANUEL MONTT 26', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18016, 1, 'MARTÍNEZ DE ROZAS 5060', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18017, 1, 'oficina chilexpress lampa (Arturo prat 1200 local 7)', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18018, 1, 'AV LIBERTAD 309, LOCAL 2, VIÑA DEL MAR', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18019, 1, 'DIEGO PORTALES 58', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18020, 1, 'PASAJE FRANSISCO VIVEROS 97 , VILLA LAS ACACIAS SAN FELIPE,', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18021, 1, 'LA RETIRAREMOS EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18022, 1, 'VOLCÁN LLAIMA 196 VILLA CORDILLERA SAN FELIPE, V REGIÓN .', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18025, 1, 'SUCURSAL CHILEXPRESS IQUIQUE', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18026, 1, 'O BISPO LABE 960', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18027, 1, 'SANTO DOMINGO 641', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18028, 1, 'DOMINICA 411 DEPA 1506', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18031, 1, 'EMILIANO FIGUEROA 1311', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18032, 1, 'CHILE XPRESS COELEMU RECIBE: KATHERINE CARTES ZAPATA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18033, 1, 'CLAUDE DEBUSSY 1067 VILLA AMANECER, OVALLE CUARTA REGION', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18034, 1, '21 DE MAYO 1336', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18035, 1, 'ECHAURREN 119 LLOLLEO', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18036, 1, 'SUCURSAL CHILEXPRESS ANTOFAGASTA PARQUE AGPIA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18041, 1, 'FRUTILLAR (CHILEXPRESS)', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18043, 1, 'SAN JAVIER CHILEXPRESS', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18045, 1, 'PEDRO DE VALDIVIA  170 C', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18046, 1, 'SUCURSAL CHILEXPRESS SAN JAVIER', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18047, 1, 'AV. MARIGEN 9877', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18048, 1, 'OBRIEN 3', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18050, 1, 'CONRADO ARAYA 451', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18051, 1, 'ARTURO PRAT 755', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18052, 1, 'MIRAFLORES 169 PISO 4', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18053, 1, 'AV. CENTRAL 610 BOCA SUR', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18054, 1, 'SUCURSAL DE CHILEXPRES ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18055, 1, 'FLOR DE AZAHAR 0317 VILLA SANTA BLANCA', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18056, 1, 'PASAJE LAS TORTOLAS 436 VILLA LAHUEN ALERCE SUR', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18057, 1, 'BOMBERO OSSA 1010.OF 1020', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18058, 1, 'Chile Xpress sucursal de bueras', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18059, 1, 'SAN MARCOS 965, LOCAL 6, EL TABO, V REGION', '1', NULL, 1, '2022-11-03 17:46:16', '2022-11-03 17:46:16');
INSERT INTO `direcciones` VALUES (18061, 1, 'OFICINA CHILEXPRESS PICHIDEGUA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18064, 1, 'CALLE TOESCA 0614 POBLACION PEDRO AGUIRRE', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18071, 1, 'HUASCO 6862', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18076, 1, 'RETIRA EN TIENDO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18078, 1, 'CIENFUEGOS CON ESMERALDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18080, 1, 'CHILEXPRESS copiapo atacama', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18082, 1, 'CHILEXPRESS DE MARIA ELENA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18083, 1, 'V LETELIER 1373 DP 204', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18084, 1, 'CHILEXPRESS, SAN FELIPE.', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18086, 1, 'TRES NORTE 1769', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18087, 1, 'CHILEEXPRES OFICINA CAUQUENES', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18088, 1, 'RANCAGUA SUCURSAL CHILEXPRESS DE CAMPOS 299', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18090, 1, 'BARROS ARANA #653 DEPTO 902', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18091, 1, 'POBLACIÓN NUEVA CABILDO, PASAJE SANTA TERESA #1410.', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18098, 1, 'CHILEXPRESS CALLE PACÍFICO 1795 - PUERTO MONTT', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18101, 1, 'CALLE IGNACIO DOMEYKO #1133', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18102, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18105, 1, 'CALLE CINCO 406 POBLACIÓN ARGENTINA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18107, 1, 'BALMACEDA 447', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18108, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18109, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18110, 1, 'CAMPOS 299', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18114, 1, 'AGENCIA CHILE EXPRESS  EL CARMEN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18115, 1, 'AGENCIA DE CHILEXPRESS  EL CARMEN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18117, 1, 'GRAHAM BELL 1210 CASA J', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18119, 1, 'CALLE LAS ARAUCARIAS 1361 VILLA ANGEL CUSTODIO FLORES LA LIG', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18120, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18121, 1, 'ANGOL 715', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18125, 1, 'SUCURSAL CHILEXPRESS DE ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18127, 1, 'LOS BOLDOS 1360, VILLA PRUDENCIO MORA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18128, 1, 'LEONCIO CERDA VILLAGRA 1129 , VILLA DON ALFONSO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18129, 1, 'LAS TORRES 128 CASA 57 CONDOMINIO PIEDRA ROJA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18131, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18132, 1, 'SUCURSAL CHILEXPRESS COMBARBALA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18133, 1, 'CHILEXPRESS REQUINOA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18135, 1, 'CHILEXPRES,EL CARMEN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18136, 1, 'PAPA JUAN PABLO 1 NÚMERO 1326', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18137, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18138, 1, 'ESMERALDA  # 2006  B', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18139, 1, 'AVENIDA LOS PUELCHES 1553, CHILLAN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18140, 1, 'SUCURSAL CHILEXPRESS SAN FELIPE', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18141, 1, 'LOS NOGALES 3030', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18144, 1, 'GRANADEROS 2124 LOCAL 1', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18145, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18146, 1, 'ANÍBAL ZAÑARTU 7951', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18147, 1, 'SUCURSAL CHILEXPRESS CAUQUENES.', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18148, 1, 'CONSTITUCION  790', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18149, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18150, 1, 'SUCURSAL CHILEXPRESS ANDACOLLO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18152, 1, 'AVENIDA SAN JOSE 213', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18153, 1, 'HOEVEL 4515', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18154, 1, 'CHILEEXPRES COLBUN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18155, 1, 'JOSÉ MIGUEL CARRERA PC44, LOTE F5, NOVICIADO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18156, 1, 'SUCURSAL PLAZA LOS HEROES CONCEPCION 2955 CHILEXPRES IQUIQUE', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18157, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18162, 1, 'CHILEXPRESS HUALAÑE', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18164, 1, 'SARGENTO CANDELARIA 1927', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18165, 1, 'ALMIRANTE LATORRE 10625', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18166, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18168, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18173, 1, 'CHILE EXPRESS DE AVENIDA ESPAÑA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18175, 1, 'CHILEEXPRESS CAUQUENES', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18177, 1, 'OFICINA DE CHILEXPRESS LAS CABRAS', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18178, 1, 'LAGUNA NORTE 7195', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18179, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18181, 1, 'CHILE EXPRESS AGENCIA EL CARMEN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18182, 1, 'PATRONATO 337 LOCAL 2', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18183, 1, 'AV LAS AMÉRICAS #4162', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18185, 1, 'SUCURSAL CHILEXPRESS ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18186, 1, 'AVENIDA LAS TORRES #551', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18191, 1, 'RÍO MAULE 1367 VILLA VERDE', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18192, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18193, 1, 'SUCURSAL CHILEXPRESS DE SAN FELIPE', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18196, 1, 'MÁXIMO LIRA 501, INTERIOR TERMINAL PESQUERO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18197, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18198, 1, 'CHILEEXPRES EL CARMEN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18199, 1, 'LOS MANANTIALES 2099, LA PINTANA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18200, 1, 'MATILDE SALAMANCA  N° 144', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18201, 1, 'MATILDE SALAMANCA  N° 144', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18202, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18203, 1, 'SANTIAGO CONCHA 1399 DPTO 305', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18209, 1, 'CHILEXPRES EN ILLAPEL', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18210, 1, 'CARLOS ACHARÁN 1364', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18211, 1, 'AV OSSA 077', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18212, 1, 'CHORRILLOS 1056', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18213, 1, 'CALLE LLULLAILLACO 2601 DEPTO 108 B', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18214, 1, 'AV CONCHA Y TORO 4089 VILLORRIO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18215, 1, 'VARGAS BUSTOS 555', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18216, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18217, 1, 'JOSÉ MIGUEL CARRERA 256', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18218, 1, 'AV FRANCIA 667', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18221, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18222, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18223, 1, 'SAN GUMERCINDO 548', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18224, 1, 'SUCURSAL CHILEEXPRESS REQUINOA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18225, 1, 'REAL AUDIENCIA 1671', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18227, 1, 'LOS TAMARUGOS 121', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18228, 1, 'LOS TAMARUGOS 121', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18229, 1, 'RETIRAR EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18231, 1, 'RETIRAR EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18232, 1, 'RIVAS VICUÑA 865', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18233, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18238, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18239, 1, 'LOS JUNCOS 1088, VILLA CARDENAL SAMORE', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18240, 1, 'SANDALO NORTE 3420', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18241, 1, 'SANDALO NORTE 3420', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18242, 1, 'LAS HORTENSIAS # 2489 DPTO. 402', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18243, 1, 'FLOR DEL INCA # 5566', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18244, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18245, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18247, 1, 'MERINO JARPA 562', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18248, 1, 'SUCURSAL CHILEXPRESS LOS VILOS', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18249, 1, 'BOLIVIA #2298', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18251, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18252, 1, 'LOS DURAZNOS 356 ESTACIÓN CENTRAL', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18253, 1, 'FRAKLIN 1042', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18254, 1, 'CHILEEXPRES MAIPU 5 ABRIL AL LADO DE LA UDLA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18255, 1, 'SUÁREZ MUJICA 1975', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18256, 1, 'CHILEXPRESS COLBUN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18257, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18258, 1, 'OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18259, 1, 'VOLCAN PUYEHUE 90', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18260, 1, 'AV LAS TORRES 5890 VILLA ALMENDRAL PEÑALOLÉN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18261, 1, 'Balmaceda 855', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18262, 1, 'CENTENARIO 80, LOCAL 46', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18263, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18264, 1, 'SUCURSAL DE CHILEXPRESS AVENIDA BRASIL, VALPARAISO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18265, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18266, 1, 'AV. SANTA ROSA 10493 LOCAL 27', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18267, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18268, 1, 'CHILEEXPRES TRAIGUEN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18270, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18274, 1, 'ELICURA LOCAL D7', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18275, 1, 'EL ROSAL 4913 MAIPÚ', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18276, 1, 'CALLE ESMERALDA 1145 _ARICA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18279, 1, 'PASAJE EL PRADO UNO 04499 VILLA EL PRADO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18280, 1, 'PASAJE EL PRADO UNO 04499 VILLA EL PRADO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18281, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18282, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18283, 1, 'CALLE QUILAPÁN 53', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18284, 1, 'DELICIAS NORTE 329', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18285, 1, 'PASAJE BULNES #968', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18286, 1, 'RAMON FREIRE 403', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18288, 1, 'SUCURSAL CHILEXPRESS ILLAPEL.', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18289, 1, 'LIRA 601 SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18291, 1, 'LOS MAYAS 652', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18292, 1, 'PASAJE LA LENGA 1534 A', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18293, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18294, 1, 'VALLE DE PUTAENDO 819', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18295, 1, 'CALLE 34, 1622, PEÑALOLEN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18297, 1, 'LAGO DE LUGANO 18551', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18299, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18300, 1, 'SUCURSAL CHILEXPRESS YUMBEL OHIGGINS 700,', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18301, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18304, 1, 'SANTA MARTA #203', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18305, 1, 'MONUMENTO 97', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18306, 1, 'SUCURSAL DE CHILEXPRESS COLBÚN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18307, 1, 'JOSÉ LUIS COO 0157 LOCAL 15', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18308, 1, 'ARIZTIA ORIENTE 270 LOCAL 4 B', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18309, 1, 'AVDA HUMERES 780 LOCAL B', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18310, 1, 'APPNET: PUERTO WILLIAMS 773', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18311, 1, 'EDISON 4298', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18312, 1, 'CHILEXPREES EL CARMEN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18313, 1, 'CHILE EXPRESS OFICINA EL CARMEN', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18314, 1, 'ADELA MARTINES 504, COMUNA RECOLETA, CIUDAD SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18315, 1, 'CALLE MACKENNA 832', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18316, 1, 'POBLACION 28 DE MARZO CASA 79', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18317, 1, 'AVENIDA LA RIRAL 4064 LOCAL 11', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18318, 1, 'PJE PUNTA TAMAS 571', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18319, 1, 'PASAJE LOS AMAZÓNICOS # 1000', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18320, 1, 'CHILE EXPRESS CAUQUENES', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18321, 1, 'HERNÁN FUENZALIDA 2420 LOCAL 129-128', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18322, 1, 'CALLE DOS 3601', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18323, 1, 'CALLE 7- 4433', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18324, 1, 'GRAN AVENIDA JOSE MIGUEL CARRERA 9145', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18325, 1, 'GRAN AVENIDA JOSE MIGUEL CARRERA 9255', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18326, 1, 'CHILEEXPRESS RANCAGUA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18327, 1, 'AV. OSSA 075', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18328, 1, 'CHILEXPRESS TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18329, 1, 'CHILEXPRESS TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18330, 1, 'AGENCIA CHILEXPRESS TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18331, 1, '2420 LOCAL 129-128', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18332, 1, 'PASAJE MARTA BRUNET 472 POBLACIÓN LOS NOTROS', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18333, 1, 'SUCURSAL CHILEXPRESS LOS ANGELES', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18334, 1, 'BRASIL 1074 LOCAL 174', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18335, 1, 'HUMERES 686', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18336, 1, 'ARTURO PRAT 748', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18337, 1, 'ERRAZURIZ 203', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18338, 1, 'RETIRAR EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18340, 1, 'José santos ossa 2416', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18341, 1, 'CHILE EXPRESS  ARICA DIEGO PORTALES', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18343, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18344, 1, 'MAYECURA 1177 DEPTO 205', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18348, 1, 'SUCURSAL CHILEXPRESS CAUQUENES', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18349, 1, 'GRAN AVENIDA 13694, L 36, SAN BERNARDO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18351, 1, 'BRASILIA 2195, PADRE HURTADO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18352, 1, 'AV ADELA MARTINEZ #500 RECOLETA SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18353, 1, 'ADELA MARTINEZ 496, COMUNA RECOLETA.', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18354, 1, 'PLAZA SARGENTO ALDEA LOCAL 118', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18356, 1, 'JULIO FOSSA CALDERÓN 190, VIÑA DEL MAR', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18357, 1, 'TEODORO SCHMIDT 1590 VILLA CONAVICOOP', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18358, 1, 'BERNARDO OHIGGINS 37', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18359, 1, 'CAPITÁN CARLOS CONDELL N° 3150', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18360, 1, 'CAPITÁN CARLOS CONDELL N° 3150', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18362, 1, 'CAPITÁN CARLOS CONDELL N° 3150', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18363, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:17', '2022-11-03 17:46:17');
INSERT INTO `direcciones` VALUES (18365, 1, 'AVENIDA RECOLETA 3564', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18366, 1, 'RECOLETA 3564', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18367, 1, 'LAS VIOLETAS 565 DEPERTAMENTO A-14 VILLA PARINACOTA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18370, 1, 'SUCURSAL PUERTO CISNES', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18371, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18373, 1, '12 NORTE 685, VIÑA DEL MAR', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18374, 1, 'JAIME BARRIENTOS #1426', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18375, 1, 'LOS BOLSOS 923 VILLA BICENTENARIO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18378, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18379, 1, 'SUCURSAL CHILEXPRES CONCEPCIÓN COLO COLO #430', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18381, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18383, 1, 'VALDIVIA 0744 POBLACIÒN SAN GREGORIO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18384, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18385, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18386, 1, 'TOME 1017, VILLA HUMBERTO DIAS, PUENTE ALTO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18388, 1, 'OFICINA A1 ALCALDE 509', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18389, 1, 'CALLE ANIBAL PINTO 1401', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18390, 1, 'MARIN 123', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18391, 1, 'BRISAS DE MAIPO 0579, LA CISTERNA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18392, 1, 'OFICINA CHILEXPRESS CAÑETE', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18394, 1, 'CHILEXPRES TALCA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18395, 1, 'LOS MIMBRES 11572', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18396, 1, 'LOS MIMBRES 11572', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18397, 1, 'LOS MIMBRES 11572', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18398, 1, 'LA VILLA TRECE DE MAYO, PASAJE LOS LEONES 0692, RANCAGUA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18399, 1, '14 DE FEBRERO 3000', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18400, 1, 'JOSE SANTOS OSSA 2517', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18401, 1, 'JOSE SANTOS OSSA 2517', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18402, 1, 'MERCED #380 DEPARTAMENTO 55 O LOCAL G.', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18405, 1, 'GLORIAS NAVALES 1842.- VILLA ARTURO PRAT 2', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18406, 1, 'CHILEXPRESS DESPACHO DOMICILIO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18407, 1, 'OFICINA CHILEXPRESS SIMÓN CARVALLO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18409, 1, 'CHILEXPRESS A LA OFICINA DE TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18411, 1, 'SANTO DOMINGO 5116', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18412, 1, 'OROSTEGUI 1642', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18414, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18415, 1, 'HUAMACHUCO #10178A', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18417, 1, 'KALLFUTRAY 02460', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18418, 1, 'OFICINA CHILEXPRESS SAN ANTONIO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18419, 1, 'CALLE EL TAMARUGO 609 VILLA LA ARAUCARIA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18420, 1, 'HAYDN 6297 SAN JOAQUIN', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18421, 1, 'PASAJE JAIME ARCE CASTRO 1144', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18422, 1, 'SUCURSAL CHILEXPRESS EL CARMEN', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18424, 1, 'BANDERA 648 STGO CENTRO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18425, 1, 'SUCURSAL TALCA DE CHILEEXPRESS', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18426, 1, 'SAN ALFONSO 717', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18427, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18428, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18429, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18430, 1, 'PASAJE ESMERALDA 3047', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18431, 1, 'CHILEXPRESS DIRECCIÓN : SUCURSAL CODEGUA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18433, 1, 'OFICINA CHILEXPRESS CAUQUENES', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18434, 1, 'SAN PABLO 1723', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18435, 1, 'MATILDE SALAMANCA N°144 SALAMANCA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18436, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18437, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18438, 1, 'SANTIAGO BUERAS 1035 CURIMON SAN FELIPE', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18441, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18442, 1, 'AVENIDA LAS REJAS SUR 1196', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18443, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18446, 1, 'SUCURSAL CHILEXPRESS HUASCO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18447, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18448, 1, 'FANOR VELASCO 27', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18449, 1, 'AVDA. RECOLETA 2746', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18450, 1, 'PASAJE LOS PATRIOTAS 2975 MAIPU, REGIÓN METROPOLITANA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18452, 1, 'DOMICILIO CHORRILLOS 0266 SAN FELIPE.', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18454, 1, 'CERRO LA PARVA 99I OFICINA 136', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18455, 1, 'SUCURSAL CHILEXPRES IQUIQUE PLAZUELA LOS HEROES', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18456, 1, 'CHILEXPRESS LONCOHE', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18457, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18458, 1, 'COMERCIO 0348 SAN BERNARDO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18467, 1, 'PROVIDENCIA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18468, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18469, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18470, 1, 'SIN DIERECCION', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18471, 1, 'CALLE ALBERTO VALENZUELA LLANOS 1136 H, VILLA MIRASOL.', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18473, 1, '.', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18474, 1, 'CARNOT 930, SAN MIGUEL', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18475, 1, 'MELIPILLA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18477, 1, 'BILBAO 218', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18478, 1, 'JOSÉ MIGUEL INFANTE NRO 4628', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18479, 1, 'FERNANDO MARQUEZ DE LA PLATA, 2221, SAN FELIPE', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18480, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18482, 1, 'LAGO TODOS LOS SANTOS 609', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18483, 1, 'ZAÑARTU 95, LOCAL 114', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18484, 1, '.', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18485, 1, 'VILLA DOÑA ISABEL PJE AGUA MARINA 1171', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18486, 1, 'CALLE NUEVA 10807-A  VILLA GEORGIA - LA FLORIDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18488, 1, 'RAMON SUBERCASEAUX 1268 OF 309', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18489, 1, '.', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18490, 1, 'SANTA CLARA 5729, SAN MIGUEL', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18492, 1, 'JON KENEDI 12927, LA PINTANA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18493, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18494, 1, 'EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18495, 1, 'ANÍBAL ZAÑARTU 7951', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18496, 1, 'ANÍBAL ZAÑARTU 7951', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18497, 1, 'ESMERALDA 2675', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18498, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18499, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18501, 1, 'ARQUITECTO HÉCTOR MARDONES  5120 VILLA PARQUE VERSALLES', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18505, 1, 'SANTA FE 618, SAN MIGUEL', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18513, 1, 'CHILEXPRESS RENGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18514, 1, 'RETIRAR EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18515, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18517, 1, 'CHILEXPRESS LITUECHE', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18518, 1, 'SUCURSAL CHILE EXPREX IRARRAZAVAL ÑUÑOA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18519, 1, 'NUEVA MUNICIPAL #804', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18520, 1, 'SAN PABLO 943 LOCAL 37 Y 41 SANTIAGO CENTRO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18522, 1, 'LORETO 1506 VILLA EL LITORAL ROJO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18523, 1, 'LORETO 1506 VILLA EL LITORAL ROJO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18524, 1, 'TRALMAHUE 216', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18525, 1, 'TRALMAHUE 216', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18526, 1, 'CERRO COLORADO  5812 OF 22. LAS CONDES.', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18527, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18528, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18529, 1, 'CAUPOLICAN  N  262', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18530, 1, 'ANGEL PARRA 499 A', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18533, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18535, 1, 'AV. PADRE HURTADO #4398', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18537, 1, 'CHILEXPRESS LAMPA CALLE ISMAEL CARMONA CON ARTURO PRAT', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18538, 1, 'LOS AROMOS N°631', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18539, 1, 'PUEBLO SECO CALLE LOS COPIHUES 775', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18540, 1, 'CHILEXPRESS ES DE LA CIUDAD DE ANCUD', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18541, 1, 'RAFAEL RIESCO BERNALES 674', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18542, 1, 'AV CERRO PARANAL 515 DEPTO 45 GEA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18543, 1, 'OSVALDO SILVA CASTELLÓN 206 DEPTO 201', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18544, 1, 'LT 4S 36 SAN JOSE DE PATAGUAS', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18545, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18546, 1, 'SUCURSAL CHILEXPRESS CURACAUTIN', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18547, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18548, 1, 'TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18549, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18550, 1, 'RIO TURBIO 158, COQUIMBO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18551, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18552, 1, 'ESCRITOR PEDRO PADRO 52,PUDAHUEL', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18554, 1, 'VARAS MENA 981', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18555, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18559, 1, 'SEXTA AVENIDA 1124', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18564, 1, 'JUVENAL HERNÁNDEZ JAQUE N°493', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18565, 1, 'JUVENAL HERNÁNDEZ JAQUE N°493', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18566, 1, 'LA BANDERA 9275', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18567, 1, 'CHILOÉ 2736, SAN MIGUEL', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18572, 1, 'RETIRO EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18573, 1, 'COSCA #10056', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18574, 1, 'AVENIDA PORTUGAL 333, TORRE 23, DPTO 183', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18579, 1, 'DIRECCIÓN COLON 8348 LOCAL B', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18580, 1, 'INDUSTRIA 8362', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18581, 1, 'COLON 8332', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18582, 1, 'COLON 8348 LOCAL A', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18583, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18587, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18589, 1, 'CALLE SANTIAGO TORRES 79', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18590, 1, 'DIEGO PORTALES 1159 TEMUCO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18591, 1, 'YUNGAY 1470, SAN FELIPE', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18592, 1, 'CHILEXPRESS TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18593, 1, 'CHILEXPRESS TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18594, 1, 'TOPATER #2244, VILLA CASPANA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18595, 1, 'CHILEEXPRES LLAY-LLAY', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18598, 1, 'CALLE HERMANOS CARRRA 1250', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18599, 1, 'CARRERA 440', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18600, 1, 'CARDENAL CARO 868', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18601, 1, 'PASAJE MANQUIHUITA 810', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18602, 1, 'SUCURSAL CHILEXPRESS LANCO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18603, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18604, 1, 'POBLACION NUEVA TRAPICHE, PASAJE CANTARITO DE GREDA 2896', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18606, 1, 'MONSEÑOR EDWARDS # 1176', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18607, 1, 'RETIRAR EN TIENDA.', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18608, 1, 'PJE DIAMANTE 1268 VILLA VALLE HERMOSO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18609, 1, 'LA CAÑA SIN NUMERO, LOL', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18610, 1, 'CALLE SEIS NORTE 2802', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18611, 1, 'SUCURSAL CHILEXPRESS EL CARMEN', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18612, 1, 'AVDA RICA AVENTURA 11878', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18613, 1, 'EL ALMENDRAL 1056, CALERA DE TANGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18614, 1, 'PEDRO ALFONSO 265,POBLA ARIZTIA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18616, 1, 'DIRECCIÓN SANTIAGO 602 LANCO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18617, 1, 'AVENIDA SIERRA NEVADA 10980 C DEL NORTE/LT E 5', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18618, 1, 'CHILEXPRESS SAN FERNANDO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18620, 1, 'CHILEXPRES DE RECOLETA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18622, 1, 'GROENLANDIA #2213', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18623, 1, 'AVENIDA LOS PAJARITOS 1759 LOCAL  P45 GALERÍA PADRE HURTADO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18624, 1, 'LAGO YALDAD 2041', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18626, 1, 'VICTORIA 741', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18627, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18628, 1, 'SAN DIEGO 965', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18629, 1, 'SAN FRANCISCO 2290', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18630, 1, 'VENTURA LAVALLE 557', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18632, 1, 'RIO LIMARI 580', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18633, 1, 'GUILLER,MO MELLA, NUMERO 24, VILLA SAN JOSE REQUINOA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18634, 1, 'AV. LIBERTADOR BERNARDO O\' HIGGINS 3750', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18635, 1, 'AV. LIBERTADOR BERNARDO O HIGGINS 3750', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18637, 1, 'ÑUÑOA, SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18638, 1, 'BALMACEDA 837', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18639, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18641, 1, 'RETIRO EN SUCURSAL DE SUNMI CHILE', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18643, 1, 'AVENIDA LOS CARRERAS 399', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18645, 1, '5 D ABRIL 5890', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18646, 1, 'LAS BALADAS 599', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18647, 1, 'CHILEEXPRESS SUCURSAL LA LIGUA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18648, 1, 'AV. PARAGUAY 832', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18649, 1, 'AV. PARAGUAY 832', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18650, 1, 'PASAJE SAN CRISTÓBAL 0147, VILLA LAS PALMERAS', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18651, 1, 'GRAN AVENIDA #13044', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18653, 1, 'MANUEL BARROS BORGOÑO 100 OF 905', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18654, 1, 'DOCTOR MANUEL BARROS BORGOÑO 100 OF 905', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18655, 1, 'HERNAN OLGUIN 0440', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18656, 1, '3 ORIENTE 3437', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18657, 1, 'SAN ANSELMO 480 CASA 55', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18658, 1, 'SAN VICENTE 620, DPTO 11, LA CISTERNA', '1', NULL, 1, '2022-11-03 17:46:18', '2022-11-03 17:46:18');
INSERT INTO `direcciones` VALUES (18659, 1, 'JUAN XXII , 12498, LA PINTANA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18660, 1, 'COQUIMBO 1454', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18661, 1, 'CALLE NUEVA IMPERIAL  # 4277', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18663, 1, 'CHILE EXPRESS SUCURSAL PRINCIPAL CENTRO DE PUERTO MONTT', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18664, 1, 'MARÍA VARGAS CALDERÓN 817', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18665, 1, 'CALLE 12 3639, SECTOR LA TORTUGA , TARAPACA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18666, 1, 'LOS OLIVOS 821 POBL. 25 DE FEBRERO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18667, 1, 'RETIRA EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18668, 1, 'CHILEXPRESS ANDRÉS BELLO 694  QUILPUE, VALPARAISO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18669, 1, 'CHILE EXPRESS  ANTONIO VARAS PUERTO MONTT (CENTRO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18671, 1, 'LAGO DE LUGANO 18555', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18673, 1, 'DIAZ GANA 1314', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18674, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18675, 1, 'EL PRINCIPAL, CAMINO LA ESCUELA 47 A-3', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18676, 1, 'LOS CARRERA 825', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18677, 1, 'OHIGGINS # 122 CARAHUE NOVENA REGIÓN', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18678, 1, 'PLUTARCO #1407 LOS PORTALES COMUNA MAIPU CIUDAD SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18679, 1, 'YO IRIA A RETIRAR LOS PRODUCTOS EN TIENDA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18680, 1, 'VALENTÍN LETELIER 525 VILLARRICA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18681, 1, 'HOLANDA 3168', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18684, 1, 'DESPACHO BULNES 76', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18685, 1, 'CALLE JUAN SOLDADO 2315  DPTO D-22', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18688, 1, 'DIAZ GANA 900 DEP 111 A 4 ANTOFAGASTA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18689, 1, '.LA BRUJULA 1294, PUENTE ALTO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18691, 1, 'SAN FRANCISCO 1117, SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18692, 1, 'SAN JOSÉ DE LA MARIQUINA ( REGIÓN DE LOS RÍOS )', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18693, 1, 'SUCURSAL CHILEXPRESS TOCOPILLA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18694, 1, 'SUCURSAL CHILEXPRESS ARICA 21 DE MAYO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18695, 1, 'SAN ANTONIO 1379', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18715, 1, 'AV. ZAPADORES 129', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18716, 1, 'RAÚL MONTT 724', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18773, 1, 'Rio De Janeiro', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18863, 1, 'SAN ISIDRO 951 R 176', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18864, 1, 'CALLE C- N 2047', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18865, 1, 'CALLEUQUE BC 6 LT 2', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18866, 1, 'VIAL RECABARREN 325 A', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18878, 1, 'NA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (18926, 1, 'BERNARDO OHIGGINS 631 DEPTO. 13', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (19912, 1, 'PRUEBA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (19922, 1, 'varas mena 980', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20160, 1, 'Varas mena 980', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20185, 1, 'Vicuña Mackena 698, Depto 1216', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20238, 1, 'J. J. PRIETO 5644 SAN MIGUEL', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20242, 1, 'AVENIDA APOQUINDO 5851', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20246, 1, 'EPUFALQUEN S/N', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20249, 1, 'ROSA ZUNIGA 210 LO MIRANDA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20250, 1, 'AMERICO VESUCIO 1737 900', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20255, 1, 'PJ J MARTINEZ C 272 RUCAHUE', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20257, 1, 'C  ALESANDRI 2148', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20260, 1, 'AV. DEL VALLE 787 DEPTO. 202', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20261, 1, 'FRONTT 011', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20263, 1, 'ROSAS 1138- 1142- 1148 21', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20271, 1, 'AV. ISIDORO DUBORNAIS 179 LOC 32 EL QUISXO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20272, 1, 'ISIDORO DUBORNAIS', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20273, 1, 'ISIDORO BUBORNAIS 167', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20277, 1, 'AV LOS PAJARITOS 3195 OF 1208', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20280, 1, 'LT 115 LOS LIBERTADORES', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20285, 1, 'MARACAIBO 979', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20292, 1, 'CAMPANARIO 2398', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20298, 1, 'AVDA PINTO 032', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20321, 1, 'PJE BALMACEDA 881 VILLA NORTE', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20322, 1, 'AVENIDA CENTRAL 3820', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20325, 1, 'PATRICIA 9139', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20330, 1, 'APOQUINDO 6410 2112', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20336, 1, 'TERCERA TRANVERSAL 5436', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20341, 1, 'SERRANO 73 515', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20342, 1, 'LOS NOGALES 100 LOS ESPINOS', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20347, 1, 'VICUÑA MACKENNA 698', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20353, 1, 'CALLE LAS ROSAS 2515 SECTOR MONTAQA GARAY', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20357, 1, 'AV IRRAZAVL 5595 LC 11', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20367, 1, 'CALLE DE LA GLORIETA 1666 CHALETS LO INFANTE', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20377, 1, 'CAUPPOLICAN 1113', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20403, 1, 'NATANIEL COX 620', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20404, 1, 'LIBERTAD 648 DP A 409 STGO MAYOR A 409', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20412, 1, 'CLAUDIO ARRAU 7982 3 LAS CASAS IV', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20419, 1, 'Gernan Riesco 2175 depto 204 A', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20422, 1, 'PBR MARCO FUENZALIDA 461 CONJ DE VALDIVIA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20425, 1, '4 ORIENTE 01455 FRANCISCO COLOANE', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20428, 1, 'SITIO 11,PREDIO LOS LAURELES,', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20431, 1, 'LOCARNO 0158', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20435, 1, 'PARQUE TENIENTE MERINO S/N PUESTO 10', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20449, 1, 'SN LUIS 540 BLOCJ A DP 13 V PARINACOTA A 13 DPTO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20458, 1, 'SANTA ELENA 323A', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20461, 1, 'PEDRO NOLASCO VIDAL 1147 BULNES', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20465, 1, 'CERRO COLORADO 5858 OF. 111', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20467, 1, 'OSORNO 838 MALQUINAS CONCHA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20475, 1, 'ALCANTARA 0101', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20495, 1, 'CIRCUNVALACION 198 LA REINA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20497, 1, 'HERBOSO 792', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20499, 1, 'C DE NA BARCA 345 OLIVO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20504, 1, 'TUCAPEL N° 2812', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20509, 1, 'FRANCISCO JAVIER KRUGGER 2119 VILLASECA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20512, 1, 'AV. LAS PARCELAS 3134', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20522, 1, 'SILVA CHAVEZ 250 B', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20523, 1, 'VARIANTE NAHUELTORO KM 2.5, RUTA N 425', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20527, 1, 'AV. HUMERES 471/B CABILDO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (20532, 1, 'FERNANDEZ CONCHA 255', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37690, 1, 'VARIANTE NAHUELTORO KM 2.5, RUTA N-425', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37695, 1, 'MANUTARA 10548', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37704, 1, 'SAN ALFONSO 242 L 223', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37715, 1, 'CERRO CANTILLANA 14590 LAS HORTENSIAS III', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37717, 1, 'AVDA. SCHLEYER 590 LT A 2', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37718, 1, 'AV. MANQUEHUE SUR 31 148', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37721, 1, 'ORTUZAR 615 B', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37732, 1, 'SECTOR LOS BOLDOS 1682 X TREHUACO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37741, 1, 'PLAZA DE ARMAS 596', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37743, 1, 'NA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37760, 1, 'LAS DELICIAS 405', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37768, 1, 'ABDÓN YARRA #960', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37769, 1, 'KEMELIE RAKIZUAM 8729 VILLA BICENTENARIO 2', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37775, 1, 'MANSO  DE VELASCO 4102', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37778, 1, 'SECTOR BASE S/N', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37780, 1, 'CALLE ARTURO PRAT N°650', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37782, 1, 'YERBAS BUENAS 499', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37797, 1, 'NEVADA 2223 VILLA CORDILLERA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37810, 1, 'RANCAGUA 0225', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37891, 1, 'AV. CAMILO ENRIQUEZ 3692 MP 125', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37892, 1, 'AV, LARRAIN 5862 3070 MP', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37893, 1, 'ZURICH SUR 1082', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37895, 1, 'RESBALON 1626', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37937, 1, 'LT 5 PUENTE COLORADO CURICO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37939, 1, 'TRAIGUEN 5920 PRAT B', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37951, 1, 'ROMERO 2806 - 2850 LIBERTAD 22 - 26 A', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37952, 1, 'DAVILA BAEZA 700  LOCAL B 89', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37967, 1, 'MONUMENTO 1976 LCF MAIPU', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37981, 1, 'TARAPACA 588', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (37996, 1, 'MARIA ANGELICA 9578 LOMAS DE MANUTARA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38009, 1, 'ANDRES SABELLA 2616', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38025, 1, 'SALVADOR SAN FUENTE AL 3043 M 69', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38027, 1, 'AVENIDA LOS CONQUISTADORE 1640 305B', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38030, 1, 'APOQUINDO 6091 LC 2', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38033, 1, 'RIO TOLTEN 1335', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38034, 1, 'CAM LOS REFUGIOS 17770 ST-32 A FALDA LARGA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38038, 1, 'AV. SIERRA NEVADA 10980', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38065, 1, 'OBISPO  JAVIER VÁSQUEZ 3981', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38067, 1, 'PREDIO SAN ANTONIO S/N', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38082, 1, 'MARIANO SÁNCHEZ FONTECILLA 310, OF 201', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38086, 1, 'CERRO ACAHAY 821', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38098, 1, '0', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38118, 1, 'AV. GENERAL SAN MARTIN 0177', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38127, 1, 'FRANKLIN 742', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38131, 1, 'ISIDORO DEL SOLAR 97', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38133, 1, 'CARACOL LO OVALLE LOCAL 1 DE 12', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38139, 1, 'SAN MIGUEL 3380', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38147, 1, 'JOSÉ MANUEL INFANTE 1763', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38151, 1, 'LO MARCOLETA 0402', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38378, 1, 'ANTONIA LOPEZ DE BELLO 064', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38396, 1, 'CERRO EL PLOMO 5680 PISO 10', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38397, 1, 'SOTOMAYOR 565', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38402, 1, 'PASEO LAS PALMAS 2209, LOCAL 028', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38414, 1, 'AV. CRISTOBAL COLON 6809', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38416, 1, 'SAN VICENTE 314', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38435, 1, 'LOS MOLINEROS 1720', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38440, 1, 'YUNGAI', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38455, 1, 'VARAS MENA 980', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38456, 1, 'VARAS MENA 980', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38483, 1, 'NUEVA SAN MARTIN 803', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38500, 1, 'AVENIDA CERRO EL PLOMO 5420', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38504, 1, 'SALAR DE PUNTA NEGRA 562', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38510, 1, 'CERRILLOS POBRES S/N', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38549, 1, 'SEPTIMA AVENIDA 1339', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38557, 1, 'AVENIDA PAJARITOS 5011', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38560, 1, 'LA FLORIDA 9801', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (38575, 1, 'GABRIELA ORIENTE 1760', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (39240, 1, 'PEDRO AGUIRRE CERDA 0990', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (39266, 1, 'OSSA 1130', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50122, 1, '1 PONIENTE 1258, OF 1108', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50129, 1, 'VARAS MENA 980', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50139, 1, 'AV EL VALLE 5959', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50153, 1, 'PASAJE LOS HELECHOS 482', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50171, 1, 'Gran Avenida J.M. Carrera 5998/Ciudad del Nino', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50172, 1, 'CRESCENTE ERRAZURIZ 2241', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50173, 1, 'NU?OA', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50174, 1, 'MONEDA 1137  56', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50175, 1, 'PEREZ VALENZUELA 1620', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50176, 1, '', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50177, 1, 'COMPLEJO ADUANERO COURIER BODEGA 14', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50178, 1, 'CAPITAN MANUEL AVALOS PRADO # 1860 A.M.B', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50179, 1, 'AV LAS CONDES 8416 DEPTO 5', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50180, 1, 'Caupolic?n 9401', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50181, 1, 'AHUMADA # 251    SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50182, 1, 'Enrique Foster Sur N? 20, Piso 6', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50183, 1, 'CARMEN MENA 981', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50192, 1, 'MONEDA 812, OF 601', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50233, 1, 'EBARISTO MOLINA 4932', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50236, 1, 'BALMACEDA 1160', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50276, 1, 'LUIS TORRES RIOSECO 205', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50323, 1, 'SIN DIRECCION', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50327, 1, 'SANTA LICIA 270', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50334, 1, 'AVDA. MANUEL BALMACEDA 4423 4423', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50335, 1, 'LOS AROMOS 1709', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50367, 1, 'Avenida Apoquindo 3885, Piso 18', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50426, 1, 'SANTIAGO', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50568, 1, 'REPÚBLICA DE ISRAEL 1203', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50595, 1, 'CHACABUCO 192', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50619, 1, 'AV. VITACURA 4135', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50752, 1, 'S/N', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50753, 1, 'GENERAL SAN MARTIN 397', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50795, 1, 'MANUEL RODRIGUEZ S/N', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50796, 1, 'oficina chilexpress', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50830, 1, 'MONSEÑOR NUNCIO SOTERO SANZ DE VILLALBA 100, 401.', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50855, 1, 'MANUEL LARRAIN 538', '1', NULL, 1, '2022-11-03 17:46:19', '2022-11-03 17:46:19');
INSERT INTO `direcciones` VALUES (50888, 1, 'VARAS MENA 980', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (50906, 1, 'TOME 010', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (50907, 1, 'CAMILO HENRIQUEZ 3308', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (50928, 1, 'ANTONIO PASTRANA 188', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (50929, 1, 'SUEZIA 0142, OF 202', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (50935, 1, 'LAS TRANQUERAS 457', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (50938, 1, 'MANZANA 6 S/N', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (50957, 1, 'CURIÑANCA 1088', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (50967, 1, 'HUILCO BAJO PARCELA 3, S/N', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (50977, 1, 'AVENIDA EL SALTO 4875', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51014, 1, 'generica 2', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51047, 1, 'AV. GENERAL SAN MARTÍN N° 8400', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51048, 1, 'Caletera Poniente Gral. San Martín #8400 (Dentro de Complejo Megaflex).', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51110, 1, 'CRUCE RAUQUEN S/N KM. 185', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51129, 1, 'SANTA MARIA 2141, LOCAL 121', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51133, 1, 'VICTOR MANUEL 2317', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51179, 1, 'SAN ALFONSO 241', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51218, 1, 'LOS PINGUINOS Nº4435', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51249, 1, 'AV. EDUARDO FREI MONTLVA 3092', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51271, 1, 'VICUNA MACKENNA 6843', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51272, 1, 'AV. EDUARDO FREI MONTLVA 3092', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51293, 1, 'VILLAGRA 70', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51304, 1, 'DIEGO PORTALES 5065', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51306, 1, 'LAS VIOLETAS 565', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51323, 1, 'FEDERICO PUGA 408', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51327, 1, 'SANTA ROSA 10340', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51357, 1, 'CAMINO YALDAD SN', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51359, 1, 'BALMACEDA 664', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51361, 1, 'SOTOMAYOR 169 OF 3', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51372, 1, 'VILLAGRA 70', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51373, 1, 'J. FCO. RICAS 9645', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51398, 1, 'QUEMA DEL BUEY HJ2', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51400, 1, 'EL ESCUDO  8676', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51404, 1, 'CALLE IGNACIO CARRERA PINTO 09', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51434, 1, 'MADRID 811', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51499, 1, '15 ORIENTE 714', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51544, 1, 'JOSE JOAQUIN AGUIRRE 217 LOTE 3', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51547, 1, 'SALESIANOS 798', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51646, 1, 'VICUÑA MACKENNA 625', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51715, 1, 'PJE PEATONAL QUIQUE 386', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51732, 1, '5  DE ABRIL 231', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51770, 1, 'SANTA CECILIA 1125', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51782, 1, 'LAS CODORNICES 1703', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51794, 1, 'PASAJE 2 NORTE 03879', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51795, 1, 'AV. SIMON BOLIVAR NRO 085, VALLE LLUTA KM 1 ARICA', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51796, 1, 'AV. SIMON BOLÍVAR 107, VALLE LLUTA. KM 1', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (51813, 1, 'MANUEL MONTT 1020', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (52014, 1, 'PEDRO AGUIRRE CERDA 6013', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (52053, 1, 'CARLOS ANTUNEZ 2462', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (52066, 1, 'HUELEN 1620', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (52084, 1, 'LORD COCHRANE 136 2409', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (52111, 1, 'AVENIDA EL MONTIJO 1615', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (52238, 1, 'AV BARROS LUCO 1471', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (52240, 1, 'EUSEBIO LILLO 492', '1', NULL, 1, '2022-11-03 17:46:20', '2022-11-03 17:46:20');
INSERT INTO `direcciones` VALUES (52241, 226, 'Avenida Presidente Kennedy, PISO 5', '5454', NULL, 1, '2022-11-22 13:01:39', '2022-11-22 13:01:39');
INSERT INTO `direcciones` VALUES (52242, 1, 'test', '00', '', 1, '2022-11-22 13:04:34', '2022-11-22 13:04:34');
INSERT INTO `direcciones` VALUES (52243, 238, 'Balmaceda', '2610', '2306', 1, '2022-12-22 12:41:59', '2022-12-22 12:41:59');
INSERT INTO `direcciones` VALUES (52244, 238, 'Balmaceda', '2610', '2306', 1, '2022-12-22 12:54:48', '2022-12-22 12:54:48');
INSERT INTO `direcciones` VALUES (52245, 1, 'balmaceda', '155', '2306', 1, '2022-12-22 15:58:00', '2022-12-22 15:58:00');
INSERT INTO `direcciones` VALUES (52246, 2, 'varas mena', '99', '2', 1, '2022-12-22 16:03:56', '2022-12-22 16:03:56');
INSERT INTO `direcciones` VALUES (52247, 2, 'varas mena', '12', '555', 1, '2022-12-22 16:35:36', '2022-12-22 16:35:36');
INSERT INTO `direcciones` VALUES (52248, 1, 'balmaceda', '2610', '2306', 1, '2022-12-22 18:04:40', '2022-12-22 18:04:40');
INSERT INTO `direcciones` VALUES (52249, 0, '', '0', '', 1, '2022-12-23 13:02:03', '2022-12-23 13:02:03');
INSERT INTO `direcciones` VALUES (52250, 0, '', '0', '', 1, '2022-12-23 13:14:56', '2022-12-23 13:14:56');
INSERT INTO `direcciones` VALUES (52251, 238, 'balmaceda', '2610', '2306', 1, '2022-12-23 13:59:35', '2022-12-23 13:59:35');
INSERT INTO `direcciones` VALUES (52252, 1, 'balmaceda', '2603', '2306', 1, '2022-12-23 14:05:40', '2022-12-23 14:05:40');
INSERT INTO `direcciones` VALUES (52253, 0, '', '0', '', 1, '2022-12-23 15:56:47', '2022-12-23 15:56:47');
INSERT INTO `direcciones` VALUES (52254, 1, 'falsa', '123', '', 1, '2022-12-28 17:41:20', '2022-12-28 17:41:20');
INSERT INTO `direcciones` VALUES (52255, 1, 'falsa', '123', '', 1, '2022-12-28 17:41:28', '2022-12-28 17:41:28');
INSERT INTO `direcciones` VALUES (52256, 1, 'falsa', '123', '', 1, '2022-12-28 17:43:14', '2022-12-28 17:43:14');
INSERT INTO `direcciones` VALUES (52257, 0, '', '0', '', 1, '2022-12-29 11:10:59', '2022-12-29 11:10:59');
INSERT INTO `direcciones` VALUES (52258, 0, '', '0', '', 1, '2022-12-29 11:15:25', '2022-12-29 11:15:25');
INSERT INTO `direcciones` VALUES (52259, 0, '', '0', '', 1, '2022-12-29 11:17:10', '2022-12-29 11:17:10');
INSERT INTO `direcciones` VALUES (52260, 0, '', '0', '', 1, '2022-12-29 11:19:07', '2022-12-29 11:19:07');
INSERT INTO `direcciones` VALUES (52261, 0, '', '0', '', 1, '2022-12-29 11:23:49', '2022-12-29 11:23:49');
INSERT INTO `direcciones` VALUES (52262, 0, '', '0', '', 1, '2022-12-29 11:25:40', '2022-12-29 11:25:40');
INSERT INTO `direcciones` VALUES (52263, 0, '', '0', '', 1, '2022-12-29 11:27:00', '2022-12-29 11:27:00');
INSERT INTO `direcciones` VALUES (52264, 0, '', '0', '', 1, '2022-12-29 11:28:47', '2022-12-29 11:28:47');
INSERT INTO `direcciones` VALUES (52265, 0, '', '0', '', 1, '2022-12-29 11:43:44', '2022-12-29 11:43:44');
INSERT INTO `direcciones` VALUES (52266, 0, '', '0', '', 1, '2022-12-29 11:45:43', '2022-12-29 11:45:43');
INSERT INTO `direcciones` VALUES (52267, 0, '', '0', '', 1, '2022-12-29 11:48:16', '2022-12-29 11:48:16');
INSERT INTO `direcciones` VALUES (52268, 0, '', '0', '', 1, '2022-12-29 12:16:11', '2022-12-29 12:16:11');
INSERT INTO `direcciones` VALUES (52269, 0, '', '0', '', 1, '2022-12-29 12:22:21', '2022-12-29 12:22:21');
INSERT INTO `direcciones` VALUES (52270, 0, '', '0', '', 1, '2022-12-29 12:24:08', '2022-12-29 12:24:08');
INSERT INTO `direcciones` VALUES (52271, 0, '', '0', '', 1, '2022-12-29 12:27:34', '2022-12-29 12:27:34');
INSERT INTO `direcciones` VALUES (52272, 0, '', '0', '', 1, '2022-12-29 12:31:55', '2022-12-29 12:31:55');
INSERT INTO `direcciones` VALUES (52273, 0, '', '0', '', 1, '2022-12-29 12:46:22', '2022-12-29 12:46:22');
INSERT INTO `direcciones` VALUES (52274, 0, '', '0', '', 1, '2022-12-29 12:48:26', '2022-12-29 12:48:26');
INSERT INTO `direcciones` VALUES (52275, 0, '', '0', '', 1, '2022-12-29 12:50:49', '2022-12-29 12:50:49');
INSERT INTO `direcciones` VALUES (52276, 0, '', '0', '', 1, '2022-12-29 12:51:30', '2022-12-29 12:51:30');
INSERT INTO `direcciones` VALUES (52277, 0, '', '0', '', 1, '2022-12-29 12:53:56', '2022-12-29 12:53:56');
INSERT INTO `direcciones` VALUES (52278, 0, '', '0', '', 1, '2022-12-29 12:55:15', '2022-12-29 12:55:15');
INSERT INTO `direcciones` VALUES (52279, 0, '', '0', '', 1, '2022-12-29 12:56:03', '2022-12-29 12:56:03');
INSERT INTO `direcciones` VALUES (52280, 0, '', '0', '', 1, '2022-12-29 12:58:58', '2022-12-29 12:58:58');
INSERT INTO `direcciones` VALUES (52281, 0, '', '0', '', 1, '2022-12-29 13:04:41', '2022-12-29 13:04:41');
INSERT INTO `direcciones` VALUES (52282, 0, '', '0', '', 1, '2022-12-29 13:07:57', '2022-12-29 13:07:57');
INSERT INTO `direcciones` VALUES (52283, 0, '', '0', '', 1, '2022-12-29 13:16:08', '2022-12-29 13:16:08');
INSERT INTO `direcciones` VALUES (52284, 0, '', '0', '', 1, '2022-12-29 13:24:09', '2022-12-29 13:24:09');
INSERT INTO `direcciones` VALUES (52285, 0, '', '0', '', 1, '2022-12-29 13:31:42', '2022-12-29 13:31:42');
INSERT INTO `direcciones` VALUES (52286, 0, '', '0', '', 1, '2022-12-29 16:34:30', '2022-12-29 16:34:30');
INSERT INTO `direcciones` VALUES (52287, 0, '', '0', '', 1, '2023-01-04 09:44:40', '2023-01-04 09:44:40');
INSERT INTO `direcciones` VALUES (52288, 0, '', '0', '', 1, '2023-01-04 10:25:23', '2023-01-04 10:25:23');
INSERT INTO `direcciones` VALUES (52289, 0, '', '0', '', 1, '2023-01-11 10:10:08', '2023-01-11 10:10:08');
INSERT INTO `direcciones` VALUES (52290, 0, '', '0', '', 1, '2023-01-11 13:11:47', '2023-01-11 13:11:47');
INSERT INTO `direcciones` VALUES (52291, 0, '', '0', '', 1, '2023-01-11 13:23:36', '2023-01-11 13:23:36');
INSERT INTO `direcciones` VALUES (52292, 0, '', '0', '', 1, '2023-01-11 13:31:57', '2023-01-11 13:31:57');
INSERT INTO `direcciones` VALUES (52293, 0, '', '0', '', 1, '2023-01-11 13:34:52', '2023-01-11 13:34:52');
INSERT INTO `direcciones` VALUES (52294, 0, '', '0', '', 1, '2023-01-11 13:38:54', '2023-01-11 13:38:54');
INSERT INTO `direcciones` VALUES (52295, 0, '', '0', '', 1, '2023-01-11 13:40:38', '2023-01-11 13:40:38');
INSERT INTO `direcciones` VALUES (52296, 0, '', '0', '', 1, '2023-01-11 13:49:19', '2023-01-11 13:49:19');
INSERT INTO `direcciones` VALUES (52297, 0, '', '0', '', 1, '2023-01-11 13:51:58', '2023-01-11 13:51:58');
INSERT INTO `direcciones` VALUES (52298, 0, '', '0', '', 1, '2023-01-11 13:56:01', '2023-01-11 13:56:01');
INSERT INTO `direcciones` VALUES (52299, 0, '', '0', '', 1, '2023-01-11 16:01:14', '2023-01-11 16:01:14');
INSERT INTO `direcciones` VALUES (52300, 0, '', '0', '', 1, '2023-01-13 15:40:43', '2023-01-13 15:40:43');

-- ----------------------------
-- Table structure for empresaclientes
-- ----------------------------
DROP TABLE IF EXISTS `empresaclientes`;
CREATE TABLE `empresaclientes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NULL DEFAULT NULL,
  `id_cliente` int(11) NULL DEFAULT NULL,
  `ecli_estado` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of empresaclientes
-- ----------------------------

-- ----------------------------
-- Table structure for empresas
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_padre` int(11) NULL DEFAULT NULL,
  `id_direccion` int(11) NULL DEFAULT NULL,
  `emp_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `emp_telefono` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `emp_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `emp_rut` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `emp_giro` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `emp_mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `emp_estado` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `emp_tipo` int(11) NULL DEFAULT NULL,
  `emp_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of empresas
-- ----------------------------
INSERT INTO `empresas` VALUES (9, 0, 1, 'APPNET', '+5891233', 'test', '00000000-0', 'informacion', 'app@cl.cl', 1, NULL, '2022-12-02 12:11:15', 0, 'https://s3.sa-east-1.amazonaws.com/acortes-test.cl/admin/empresas/logos/mAw3zjsOP2BP5OMDsUsR5hZl7OnoCcrHBYWOl2ln.png');
INSERT INTO `empresas` VALUES (12, 0, 6, 'Empresa Prueba', '+56988822255', 'prueba', '00000000-2', 'pruebas', 'prueba@prueba.cl', 0, '2022-10-12 16:52:21', '2023-02-26 12:17:10', 1, NULL);
INSERT INTO `empresas` VALUES (13, 9, 52241, 'JOHNSON Y JOHNSON DE CHILE S.A.', '+56224291400', 'Sofía Campodónico', '93745000-1', 'Comercial', 'test@its.jnj.com', 0, '2022-11-22 13:01:40', '2023-02-26 12:17:14', 1, 'https://s3.sa-east-1.amazonaws.com/acortes-test.cl/admin/empresas/logos/P76V0nNZEpM9EoYVsJ2WEPRXrf4ZbJlm4NLsVq57.png');

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NULL DEFAULT NULL,
  `log_accion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL,
  `log_ruta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of logs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for modulos
-- ----------------------------
DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_permiso` int(11) NULL DEFAULT NULL,
  `mod_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mod_accion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mod_estado` int(11) NULL DEFAULT 1,
  `mod_order` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 116 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of modulos
-- ----------------------------
INSERT INTO `modulos` VALUES (3, 7, 'Detalle', 'usuarios.show', 1, 2);
INSERT INTO `modulos` VALUES (5, 7, 'Deshabilitar', 'usuarios.delete', 1, 3);
INSERT INTO `modulos` VALUES (8, 9, 'Detalle', 'categorias.show\r\n', 1, 2);
INSERT INTO `modulos` VALUES (9, 9, 'Deshabilitar', 'categorias.delete\r\n', 1, 3);
INSERT INTO `modulos` VALUES (12, 13, 'Detalle', 'empresas.show', 1, 2);
INSERT INTO `modulos` VALUES (13, 13, 'Deshabilitar', 'empresas.delete', 1, 3);
INSERT INTO `modulos` VALUES (16, 8, 'Detalle', 'productos.show', 1, 2);
INSERT INTO `modulos` VALUES (17, 8, 'Deshabilitar', 'productos.delete', 1, 3);
INSERT INTO `modulos` VALUES (20, 12, 'Detalle', 'clientes.show', 1, 2);
INSERT INTO `modulos` VALUES (21, 12, 'Deshabilitar', 'clientes.delete', 1, 3);
INSERT INTO `modulos` VALUES (30, 7, 'Habilitar', 'usuarios.enable\r\n', 1, 4);
INSERT INTO `modulos` VALUES (31, 13, 'Habilitar', 'empresas.enable\r\n', 1, 4);
INSERT INTO `modulos` VALUES (32, 12, 'Habilitar', 'clientes.enable\r\n', 1, 4);
INSERT INTO `modulos` VALUES (33, 8, 'Habilitar ', 'productos.enable\r\n', 1, 4);
INSERT INTO `modulos` VALUES (34, 9, 'Habilitar ', 'categorias.enable\r\n', 1, 4);
INSERT INTO `modulos` VALUES (38, 7, 'Usuarios', 'usuarios.index\r\n', 1, 0);
INSERT INTO `modulos` VALUES (39, 13, 'Empresas', 'empresas.index', 1, 0);
INSERT INTO `modulos` VALUES (40, 12, 'Clientes', 'clientes.index', 1, 0);
INSERT INTO `modulos` VALUES (41, 8, 'Productos', 'productos.index', 1, 0);
INSERT INTO `modulos` VALUES (44, 7, 'Crear/Editar', 'usuarios.store', 1, 1);
INSERT INTO `modulos` VALUES (45, 13, 'Crear/Editar ', 'empresas.store', 1, 1);
INSERT INTO `modulos` VALUES (46, 8, 'Crear/Editar ', 'productos.store', 1, 1);
INSERT INTO `modulos` VALUES (47, 12, 'Crear/Editar ', 'clientes.store', 1, 1);
INSERT INTO `modulos` VALUES (50, 9, 'Crear/Editar ', 'categorias.store', 1, 1);
INSERT INTO `modulos` VALUES (52, 15, 'Crear/Editar', 'roles.store', 1, 1);
INSERT INTO `modulos` VALUES (53, 15, 'Roles', 'roles.index', 1, 0);
INSERT INTO `modulos` VALUES (54, 15, 'Deshabilitar', 'roles.delete', 1, 3);
INSERT INTO `modulos` VALUES (55, 15, 'Habilitar', 'roles.enable', 1, 4);
INSERT INTO `modulos` VALUES (56, 15, 'Detalle', 'roles.show', 1, 2);
INSERT INTO `modulos` VALUES (59, 2, 'inicio', NULL, 1, NULL);
INSERT INTO `modulos` VALUES (60, 1, 'Mi Empresa', NULL, 1, NULL);
INSERT INTO `modulos` VALUES (63, 19, 'Cotizaciones', 'cotizaciones.index', 1, 0);
INSERT INTO `modulos` VALUES (64, 19, 'Crear/Editar', 'cotizaciones.store', 1, 8);
INSERT INTO `modulos` VALUES (66, 13, 'Cotizacion', 'empresas.cotizacion', 1, 5);
INSERT INTO `modulos` VALUES (76, 9, 'Familia/Sub-Familia', 'categorias.index', 1, 0);
INSERT INTO `modulos` VALUES (109, 30, 'Eliminar', 'landing.delete', 1, NULL);
INSERT INTO `modulos` VALUES (110, 22, 'Detalle', 'ventas.show', 1, 1);
INSERT INTO `modulos` VALUES (111, 32, 'Sucursales', 'sucursales.index', 1, 0);
INSERT INTO `modulos` VALUES (112, 32, 'Crear / Editar', 'sucursales.store', 1, 1);
INSERT INTO `modulos` VALUES (113, 32, 'Detalle', 'sucursales.show', 1, 2);
INSERT INTO `modulos` VALUES (114, 32, 'Deshabilitar', 'sucursales.delete', 1, 3);
INSERT INTO `modulos` VALUES (115, 32, 'Enable', 'sucursales.enable', 1, 4);

-- ----------------------------
-- Table structure for paises
-- ----------------------------
DROP TABLE IF EXISTS `paises`;
CREATE TABLE `paises`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pai_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pai_nomcorto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of paises
-- ----------------------------
INSERT INTO `paises` VALUES (1, 'Chile', NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permisos
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `per_padre` int(11) NOT NULL,
  `per_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `per_accion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `per_icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `per_mostrar` int(11) NULL DEFAULT NULL,
  `per_order` int(11) NULL DEFAULT NULL,
  `per_estado` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES (1, 1, 'Mi Empresa', '', 'mdi mdi-briefcase', 3, 1, 1);
INSERT INTO `permisos` VALUES (2, 2, 'Inicio', 'dashboard', 'mdi mdi-home', 3, 0, 1);
INSERT INTO `permisos` VALUES (3, 0, 'Maestro', '#', 'mdi mdi-cube', 1, 2, 1);
INSERT INTO `permisos` VALUES (6, 0, 'Inventario', '#', 'mdi mdi-store', 1, 99, 1);
INSERT INTO `permisos` VALUES (7, 17, 'Usuarios', 'usuarios', 'mdi mdi-account-multiple', 1, 5, 1);
INSERT INTO `permisos` VALUES (8, 3, 'Productos / Servicios', 'productos', 'mdi mdi-buffer', 1, 7, 1);
INSERT INTO `permisos` VALUES (9, 3, 'Categoria/ Sub Categoria', 'categorias', 'mdi mdi-tag', 1, 6, 1);
INSERT INTO `permisos` VALUES (11, 3, 'Bodegas', 'bodegas', 'mdi mdi-apps', 0, 99, 1);
INSERT INTO `permisos` VALUES (12, 3, 'Clientes', 'clientes', 'mdi mdi-briefcase', 1, 2, 1);
INSERT INTO `permisos` VALUES (13, 18, 'Empresas', 'empresas', 'mdi mdi-domain', 1, 3, 1);
INSERT INTO `permisos` VALUES (15, 17, 'Roles', 'roles', 'mdi mdi-bank', 1, 99, 1);
INSERT INTO `permisos` VALUES (16, 0, 'Api', 'Api', ' ', 0, NULL, 1);
INSERT INTO `permisos` VALUES (17, 0, 'Administracion', '#', 'mdi mdi-book', 1, 98, 1);
INSERT INTO `permisos` VALUES (18, 0, 'Configuracion', '#', 'mdi mdi-coffee', 1, 99, 1);
INSERT INTO `permisos` VALUES (31, 0, 'Sucursales', '#', '', 1, 0, 1);
INSERT INTO `permisos` VALUES (32, 3, 'Sucursales', 'sucursales', 'mdi mdi-store', 1, 3, 1);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pro_tipo` int(11) NOT NULL,
  `pro_descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pro_neto` int(11) NULL DEFAULT NULL,
  `pro_bruto` int(11) NULL DEFAULT NULL,
  `pro_exento` int(11) NOT NULL,
  `pro_pesable` int(11) NOT NULL,
  `pro_uni_medida` int(11) NOT NULL,
  `pro_sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pro_int_esp` int(11) NULL DEFAULT NULL,
  `pro_imagen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `pro_codbarra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pro_costo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_categoria` int(11) NULL DEFAULT NULL,
  `pro_estado` int(11) NULL DEFAULT 1,
  `id_empresa` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos
-- ----------------------------

-- ----------------------------
-- Table structure for regiones
-- ----------------------------
DROP TABLE IF EXISTS `regiones`;
CREATE TABLE `regiones`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reg_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reg_numero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reg_nomcorto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of regiones
-- ----------------------------
INSERT INTO `regiones` VALUES (1, 'Metropolitana de Santiago', '13', NULL, 1);
INSERT INTO `regiones` VALUES (2, 'Tarapaca', '', NULL, 1);
INSERT INTO `regiones` VALUES (3, 'Antofagasta', '', NULL, 1);
INSERT INTO `regiones` VALUES (4, 'Atacama', '', NULL, 1);
INSERT INTO `regiones` VALUES (5, 'Coquimbo', '', NULL, 1);
INSERT INTO `regiones` VALUES (6, 'Valparaiso', '', NULL, 1);
INSERT INTO `regiones` VALUES (8, 'Libertador General Bernardo O\'Higgins', '', NULL, 1);
INSERT INTO `regiones` VALUES (9, 'Maule', '', NULL, 1);
INSERT INTO `regiones` VALUES (10, 'Biobío', '', NULL, 1);
INSERT INTO `regiones` VALUES (11, 'La Araucanía', '', NULL, 1);
INSERT INTO `regiones` VALUES (12, 'Los Ríos', '', NULL, 1);
INSERT INTO `regiones` VALUES (13, 'Los Lagos', '', NULL, 1);
INSERT INTO `regiones` VALUES (14, 'Aisén del General Carlos Ibáñez del Campo', '', NULL, 1);
INSERT INTO `regiones` VALUES (15, 'Magallanes y de la Antártica Chilena', '', NULL, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_empresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rol_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rol_estado` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, '9', 'administrador', 1, NULL, NULL);

-- ----------------------------
-- Table structure for rolmodulos
-- ----------------------------
DROP TABLE IF EXISTS `rolmodulos`;
CREATE TABLE `rolmodulos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NULL DEFAULT NULL,
  `id_modulo` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 949 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rolmodulos
-- ----------------------------
INSERT INTO `rolmodulos` VALUES (1, 2, 10, '2022-09-08 20:58:30', '2022-09-08 20:58:30');
INSERT INTO `rolmodulos` VALUES (2, 2, 11, '2022-09-08 20:58:30', '2022-09-08 20:58:30');
INSERT INTO `rolmodulos` VALUES (3, 2, 12, '2022-09-08 20:58:30', '2022-09-08 20:58:30');
INSERT INTO `rolmodulos` VALUES (4, 2, 13, '2022-09-08 20:58:30', '2022-09-08 20:58:30');
INSERT INTO `rolmodulos` VALUES (266, 9, 14, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (267, 9, 15, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (268, 9, 16, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (269, 9, 17, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (270, 9, 33, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (271, 9, 41, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (272, 9, 46, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (273, 9, 6, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (274, 9, 7, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (275, 9, 8, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (276, 9, 9, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (277, 9, 34, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (278, 9, 50, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (279, 9, 22, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (280, 9, 23, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (281, 9, 24, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (282, 9, 25, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (283, 9, 35, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (284, 9, 42, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (285, 9, 48, '2022-09-23 13:43:00', '2022-09-23 13:43:00');
INSERT INTO `rolmodulos` VALUES (443, 8, 2, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (444, 8, 3, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (445, 8, 4, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (446, 8, 5, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (447, 8, 30, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (448, 8, 38, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (449, 8, 44, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (450, 8, 73, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (451, 8, 6, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (452, 8, 7, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (453, 8, 8, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (454, 8, 9, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (455, 8, 34, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (456, 8, 50, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (457, 8, 22, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (458, 8, 23, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (459, 8, 24, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (460, 8, 25, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (461, 8, 35, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (462, 8, 42, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (463, 8, 48, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (464, 8, 52, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (465, 8, 53, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (466, 8, 54, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (467, 8, 55, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (468, 8, 56, '2022-10-13 16:41:43', '2022-10-13 16:41:43');
INSERT INTO `rolmodulos` VALUES (469, 8, 76, NULL, NULL);
INSERT INTO `rolmodulos` VALUES (470, 8, 39, NULL, NULL);
INSERT INTO `rolmodulos` VALUES (843, 10, 38, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (844, 10, 44, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (845, 10, 3, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (846, 10, 5, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (847, 10, 30, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (848, 10, 76, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (849, 10, 50, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (850, 10, 8, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (851, 10, 9, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (852, 10, 34, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (853, 10, 41, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (854, 10, 46, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (855, 10, 16, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (856, 10, 17, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (857, 10, 33, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (858, 10, 42, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (859, 10, 48, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (860, 10, 24, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (861, 10, 25, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (862, 10, 35, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (863, 10, 43, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (864, 10, 49, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (865, 10, 28, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (866, 10, 29, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (867, 10, 36, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (868, 10, 53, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (869, 10, 52, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (870, 10, 56, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (871, 10, 54, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (872, 10, 55, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (873, 10, 59, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (874, 10, 60, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (875, 10, 105, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (876, 10, 106, '2022-12-20 10:18:18', '2022-12-20 10:18:18');
INSERT INTO `rolmodulos` VALUES (885, 1, 60, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (886, 1, 59, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (887, 1, 38, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (888, 1, 44, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (889, 1, 3, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (890, 1, 5, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (891, 1, 30, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (892, 1, 41, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (893, 1, 46, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (894, 1, 16, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (895, 1, 17, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (896, 1, 33, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (897, 1, 76, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (898, 1, 50, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (899, 1, 8, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (900, 1, 9, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (901, 1, 34, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (902, 1, 40, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (903, 1, 47, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (904, 1, 20, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (905, 1, 21, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (906, 1, 32, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (907, 1, 53, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (908, 1, 52, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (909, 1, 56, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (910, 1, 54, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (911, 1, 55, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (912, 1, 111, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (913, 1, 112, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (914, 1, 113, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (915, 1, 114, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (916, 1, 115, '2023-02-26 12:26:04', '2023-02-26 12:26:04');
INSERT INTO `rolmodulos` VALUES (917, 7, 60, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (918, 7, 59, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (919, 7, 38, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (920, 7, 44, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (921, 7, 3, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (922, 7, 5, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (923, 7, 30, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (924, 7, 41, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (925, 7, 46, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (926, 7, 16, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (927, 7, 17, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (928, 7, 33, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (929, 7, 76, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (930, 7, 50, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (931, 7, 8, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (932, 7, 9, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (933, 7, 34, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (934, 7, 40, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (935, 7, 47, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (936, 7, 20, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (937, 7, 21, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (938, 7, 32, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (939, 7, 53, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (940, 7, 52, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (941, 7, 56, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (942, 7, 54, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (943, 7, 55, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (944, 7, 111, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (945, 7, 112, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (946, 7, 113, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (947, 7, 114, '2023-02-26 12:26:18', '2023-02-26 12:26:18');
INSERT INTO `rolmodulos` VALUES (948, 7, 115, '2023-02-26 12:26:18', '2023-02-26 12:26:18');

-- ----------------------------
-- Table structure for sucursales
-- ----------------------------
DROP TABLE IF EXISTS `sucursales`;
CREATE TABLE `sucursales`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NULL DEFAULT NULL,
  `id_direccion` int(11) NULL DEFAULT NULL,
  `suc_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `suc_numero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `suc_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `suc_estado` int(11) NULL DEFAULT 1,
  `suc_tipo` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sucursales
-- ----------------------------

-- ----------------------------
-- Table structure for unimedidas
-- ----------------------------
DROP TABLE IF EXISTS `unimedidas`;
CREATE TABLE `unimedidas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ',
  `unid_nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `unid_nombre_corto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NULL DEFAULT NULL,
  `unid_estado` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of unimedidas
-- ----------------------------

-- ----------------------------
-- Table structure for usuarioempresas
-- ----------------------------
DROP TABLE IF EXISTS `usuarioempresas`;
CREATE TABLE `usuarioempresas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_empresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usm_estado` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarioempresas
-- ----------------------------
INSERT INTO `usuarioempresas` VALUES (1, 1, '9', 1, NULL, '2023-02-25 00:35:31');
INSERT INTO `usuarioempresas` VALUES (4, 9, '9', 1, '2022-09-20 16:41:09', '2022-09-20 16:41:09');
INSERT INTO `usuarioempresas` VALUES (5, 10, '12', 1, '2022-10-12 16:56:21', '2022-10-12 16:56:21');
INSERT INTO `usuarioempresas` VALUES (6, 11, '12', 1, '2022-10-12 19:43:20', '2022-10-12 19:43:20');
INSERT INTO `usuarioempresas` VALUES (7, 12, '9', 1, '2022-11-03 11:59:54', '2022-11-03 11:59:54');
INSERT INTO `usuarioempresas` VALUES (8, 13, '13', 1, '2022-11-22 13:04:35', '2022-11-22 13:04:35');

-- ----------------------------
-- Table structure for usuarioroles
-- ----------------------------
DROP TABLE IF EXISTS `usuarioroles`;
CREATE TABLE `usuarioroles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NULL DEFAULT NULL,
  `id_rol` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarioroles
-- ----------------------------
INSERT INTO `usuarioroles` VALUES (1, 1, 1);
INSERT INTO `usuarioroles` VALUES (4, 9, 7);
INSERT INTO `usuarioroles` VALUES (5, 10, 9);
INSERT INTO `usuarioroles` VALUES (6, 11, 10);
INSERT INTO `usuarioroles` VALUES (7, 12, 7);
INSERT INTO `usuarioroles` VALUES (8, 13, 10);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usu_rut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usu_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usu_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usu_segnombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usu_appaterno` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usu_apmaterno` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usu_telefono` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usu_imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `usu_estado` int(11) NULL DEFAULT 1,
  `usu_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `usuarios_id_mail_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, '16527240-4', 'correo@mail.cl', 'admin', 'antonio', '', 'cortes', '', '$2y$10$AbQmH5BpUqCdeNk.F9TDFusBbEcyYCgPZpQz6pqTIMpIHK0hqJuhK', '1', '+5691235468', 'http://127.0.0.1:8000/storage/imagenes/usuarios/VOPsaPhNh2E0v99anttDqG7wrLkYIY4ByC2AevY3.jpg', NULL, 1, '4|xJLYVezVWwHkz2wt98zJjtevjZeNsvoUG9ut2vNJ', '2022-07-13 14:36:17', '2023-02-25 00:35:31', 'DJ2wadK2UrhOXh8C63FGPaxEQWdLA6NPHBoqvvB4SWR7m8vdpwYhaLwzMZlr');
INSERT INTO `usuarios` VALUES (9, '00000000-0', 'demo@appnet.cl', NULL, 'appnetstore', '', 'sunmi', '', '$2y$10$ZVxUV9xAOAuxKAqM/chtE.xN2ZQmKLj/JZA.s1cM.t6ZqAGiGaxvq', '2', '+56912085622', 'https://s3.sa-east-1.amazonaws.com/acortes-test.cl/admin/usuarios/GXpU2yRn2SnFw6CkuVRMpE1KKQNYqRBKaxjSvvhQ.png', NULL, 1, '6|nR1Cv62b2RDhXVIDiAwFyEm1TxDg1o5siPCCCgxJ', '2022-09-20 16:41:09', '2022-09-20 16:42:32', 'isKllqxyr394oL1CzFa5Cnu6rXnqfs4T0XbXmJe1wS8lFqCkNLngPMJYx9el');
INSERT INTO `usuarios` VALUES (10, '0000000-0', 'test@mail.cl', NULL, 'admin', '', 'prueba', '', '$2y$10$96Ano8o5qkUh.66s2Z0AP.sPNgAuBBenOJntUNggIcR0EUSm8m982', '7', '+5691235468', 'https://s3.sa-east-1.amazonaws.com/acortes-test.cl/admin/usuarios/BvBehv0OiP9gqKWewenVou5ESvgZnbOsTqGAxqAr.jpg', NULL, 1, '7|kl94ZVKMPUozSSu7wDXpW4HSP0hPkh8gPrNLT1lU', '2022-10-12 16:56:21', '2022-10-12 19:37:31', NULL);
INSERT INTO `usuarios` VALUES (11, '42995594-7', 'trabaja@mail.cl', NULL, 'empleado', '', 'trabajador', '', '$2y$10$/CFIix9v/LCh/xZ80b.zPulwnyNUrnrf6xk/uNGJPjGUcCL93GwwS', '8', '+998748236', 'https://s3.sa-east-1.amazonaws.com/acortes-test.cl/admin/usuarios/NEfX2GSMh97K5onqOdbXU2JagxYTQVxJbnQxJp6M.jpg', NULL, 0, '8|UnzxqM7FocHt0H7kSIJKljGjdKH7tKCciwpm2zk8', '2022-10-12 19:43:20', '2022-10-12 19:46:56', NULL);
INSERT INTO `usuarios` VALUES (12, '16542402-6', 'francisco@appnet.cl', NULL, 'Francisco', '', 'Castro', '', '$2y$10$wyVh6b7psE8WD/bmlT8fyu7e62kwpmQ5alF5kSYdz1ij44C0T/6gq', '9', '+5691235468', 'https://s3.sa-east-1.amazonaws.com/acortes-test.cl/admin/usuarios/rhdIzHmeTqgXAFIx1rUGMFrxl8398VQRv3NsTtmK.jpg', NULL, 1, '9|03KvmuOFU7TUAFHNwbTA6hUb7ht85SHiCCxCNK7v', '2022-11-03 11:59:54', '2022-11-03 12:00:49', 'XUGMZL6dBl8jOTwaOD1xayMz17jGs6khdALVKFRZwfa5uv47UzkR4tokcktO');
INSERT INTO `usuarios` VALUES (13, '28170565-2', 'test@jnj.cl', 'jnj', 'prueba', 'prueba', 'prueba', 'prueba', '$2y$10$G2od0oiRcep2yCz/CEwYuOfv3QjsaSBfb99x8rLVssnHYkpHu5FB.', '52242', '+5691235468', 'https://s3.sa-east-1.amazonaws.com/acortes-test.cl/admin/usuarios/euyoqCYdPfkRszT8ee0aCnbzOAZ9yrZO18TCgiWc.png', NULL, 1, '10|Jdvbfuw5WOtyOOSDRC7pzD1o8KCYIJQaE3B5GZtU', '2022-11-22 13:04:35', '2022-11-22 13:06:00', 'Oufh6PIAYp74nejTb21XnRn2nhOQXEUOVjigppRi9WQo8yvxQd7XNETRfkqR');

SET FOREIGN_KEY_CHECKS = 1;
