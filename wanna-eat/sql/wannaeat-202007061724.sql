/*
MySQL Data Transfer
Source Host: localhost
Source Database: wannaeat
Target Host: localhost
Target Database: wannaeat
Date: 2020/7/6 �U�� 05:23:23
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for group_buy
-- ----------------------------
CREATE TABLE `group_buy` (
  `id` varchar(255) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_phone` varchar(200) NOT NULL,
  `group_host` varchar(255) NOT NULL,
  `end_time` datetime NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hosts
-- ----------------------------
CREATE TABLE `hosts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `host_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `field_id` varchar(255) DEFAULT NULL,
  `order_meal` varchar(255) NOT NULL,
  `order_price` int(255) NOT NULL,
  `order_remark` varchar(255) DEFAULT NULL,
  UNIQUE KEY `orders_field_id_uindex` (`field_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for store
-- ----------------------------
CREATE TABLE `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `group_buy` VALUES ('200706123740', '對面涼麵', '04-12345678', '小幫手', '2020-07-09 13:07:00', '測試..', '20');
INSERT INTO `group_buy` VALUES ('200706103011', '對面涼麵', '04-12345678', '阿翰', '2020-07-06 11:00:00', '測試..', '20');
INSERT INTO `hosts` VALUES ('1', '小幫手');
INSERT INTO `hosts` VALUES ('2', '小白');
INSERT INTO `hosts` VALUES ('3', '張學友');
INSERT INTO `hosts` VALUES ('4', '匿名');
INSERT INTO `orders` VALUES ('200705170317', '小白', '5f0196d92fcca', '排骨飯', '80', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200705060544', '吳騎龍', '5f0185385bbfb', '123', '20', '');
INSERT INTO `orders` VALUES ('200705170401', '小白', '5f01977f3f02c', '排骨飯', '80', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200705165130', '阿翰', '5f0197baa7cb2', '排餐', '100', '');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f019a273084e', '排餐', '10', '');
INSERT INTO `orders` VALUES ('200705170401', '阿油伯王', '5f019a37dec5a', '炸彈排骨麵', '500', '');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f01a514b1d3e', '伴手禮', '100', '');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f01a5516b5c7', '珍珠奶', '80', '不加珍珠');
INSERT INTO `orders` VALUES ('200705193748', '小白', '5f01bb870c492', '排骨飯', '80', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200705060544', '阿翰', '5f01bb9c56c4b', '排餐', '100', '');
INSERT INTO `orders` VALUES ('200705210016', '阿翰', '5f01d2b04512c', '排餐', '100', '');
INSERT INTO `orders` VALUES ('200705210016', '阿熊', '5f01d2c02ce0d', '菜菜子', '500', '123');
INSERT INTO `orders` VALUES ('200704204035', '阿熊', '5f0272b4220fb', '伴手禮', '100', '');
INSERT INTO `orders` VALUES ('200704204035', '一原', '5f0272bfd74e8', '排餐', '200', '不要辣');
INSERT INTO `orders` VALUES ('200706083128', '吳騎龍', '5f02741a54ae5', '排飯', '20', '');
INSERT INTO `orders` VALUES ('200706103011', '阿熊', '5f02aa3808336', '伴手禮', '100', '123');
INSERT INTO `orders` VALUES ('200706123740', '阿熊', '5f02aab02360d', '腳尾', '120', '');
INSERT INTO `orders` VALUES ('200706123740', '阿翰', '5f02aabd76e8a', '魯排飯', '80', '');
INSERT INTO `orders` VALUES ('200706123740', '一原', '5f02aacc254c7', '排餐', '120', '');
INSERT INTO `orders` VALUES ('200706123740', '媽媽米', '5f02aad80b555', '排飯', '150', '');
INSERT INTO `orders` VALUES ('200706123740', '張學友', '5f02aaedd7cee', '雞排飯', '220', '');
INSERT INTO `orders` VALUES ('200706123740', '孫耀威', '5f02aafe9d7e1', '炸薯條', '60', '');
INSERT INTO `orders` VALUES ('200706123740', '孫翠鳳', '5f02ab1e10f89', '歌仔戲兒童餐', '230', '要附玩具');
INSERT INTO `orders` VALUES ('200706123740', 'Shin Liu', '5f02b57e3f7d4', '珍珠奶茶', '10', '不要珍珠');
INSERT INTO `orders` VALUES ('200706123740', 'Shinmmm', '5f02b58ce0cde', '魯排飯', '11', '不要珍珠');
INSERT INTO `orders` VALUES ('200706123740', 'Shin', '5f02b5ad7a75e', '魯排飯', '80', '不要珍珠');
INSERT INTO `orders` VALUES ('200706123740', 'Shin nnn', '5f02b5bfb88d0', '珍珠奶 茶', '20', '不要珍珠');
INSERT INTO `store` VALUES ('19', '50嵐', '..', '04-12345678', './archive/stores/5f0288cc8589a.jpg');
INSERT INTO `store` VALUES ('20', '對面涼麵', '..', '04-12345678', './archive/stores/5f0288f490a73.jpg');
INSERT INTO `store` VALUES ('18', '黑排飯', '.', '04-12345678', './archive/stores/5f028874585eb.jpg');
INSERT INTO `store` VALUES ('21', '八方雲集', '就..八方', '04-22490558', './archive/stores/5f028976a691e.jpg');
INSERT INTO `store` VALUES ('22', '測試店家', '', '04-12345678', './archive/stores/5f02abe05876c.jpg');
INSERT INTO `users` VALUES ('1', 'abc', 'abc');
INSERT INTO `users` VALUES ('2', 'atteipo', 'atteipo');
