/*
MySQL Data Transfer
Source Host: localhost
Source Database: wannaeat
Target Host: localhost
Target Database: wannaeat
Date: 2020/7/5 �U�� 09:23:02
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
  `remark` varchar(255) default NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hosts
-- ----------------------------
CREATE TABLE `hosts` (
  `id` int(255) NOT NULL auto_increment,
  `host_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `field_id` varchar(255) default NULL,
  `order_meal` varchar(255) NOT NULL,
  `order_price` int(255) NOT NULL,
  `order_remark` varchar(255) default NULL,
  UNIQUE KEY `orders_field_id_uindex` (`field_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for store
-- ----------------------------
CREATE TABLE `store` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `group_buy` VALUES ('200705165130', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:18:00', '老闆很凶會罵人', '3');
INSERT INTO `group_buy` VALUES ('200705164910', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:18:00', '老闆很凶會罵人', '3');
INSERT INTO `group_buy` VALUES ('200705165056', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:18:00', '老闆很凶會罵人', '3');
INSERT INTO `group_buy` VALUES ('200704181010', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-05 18:40:00', '老闆很凶會罵人', '2');
INSERT INTO `group_buy` VALUES ('200704204035', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-06 21:10:00', '老闆很凶會罵人', '3');
INSERT INTO `group_buy` VALUES ('200705060544', '麥當勞', '04-12345678', '阿翰', '2020-07-06 06:35:00', '老闆很凶會罵人', '7');
INSERT INTO `group_buy` VALUES ('200705161237', '麥當勞', '04-12345678', '阿翰', '2020-07-05 16:23:00', '老闆很凶會罵人', '7');
INSERT INTO `group_buy` VALUES ('200705163043', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:00:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200705163156', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:00:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200705163205', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:02:00', '老闆很凶會罵人', '3');
INSERT INTO `group_buy` VALUES ('200705163307', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:02:00', '老闆很凶會罵人', '3');
INSERT INTO `group_buy` VALUES ('200705164453', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:14:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200705164506', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:15:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200705164621', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:15:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200705164627', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:16:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200705164726', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:16:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200705164802', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:16:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200705164809', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:18:00', '老闆很凶會罵人', '3');
INSERT INTO `group_buy` VALUES ('200704175058', '炒飯超人', '04-88959987', '阿翰', '2020-07-04 18:20:00', '老闆很凶會罵人', '4');
INSERT INTO `group_buy` VALUES ('200704175106', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-04 18:21:00', '老闆很凶會罵人', '2');
INSERT INTO `group_buy` VALUES ('200704175116', '湯媽媽濃湯', '24889544', '張學友', '2020-07-04 18:21:00', '老闆很凶會罵人', '15');
INSERT INTO `group_buy` VALUES ('200705165140', '炒飯超人', '04-88959987', '阿翰', '2020-07-05 17:21:00', '老闆很凶會罵人', '4');
INSERT INTO `group_buy` VALUES ('200705165245', '炒飯超人', '04-88959987', '阿翰', '2020-07-05 17:21:00', '老闆很凶會罵人', '4');
INSERT INTO `group_buy` VALUES ('200705165340', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:23:00', '老闆很凶會罵人', '3');
INSERT INTO `group_buy` VALUES ('200705165543', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:25:00', '老闆很凶會罵人', '3');
INSERT INTO `group_buy` VALUES ('200705165614', '燒臘店', '04-88959987', '阿翰', '2020-07-05 17:26:00', '老闆很凶會罵人', '8');
INSERT INTO `group_buy` VALUES ('200705170019', '燒臘店', '04-88959987', '阿翰', '2020-07-05 17:26:00', '老闆很凶會罵人', '8');
INSERT INTO `group_buy` VALUES ('200705170042', '燒臘店', '04-88959987', '阿翰', '2020-07-05 17:30:00', '老闆很凶會罵人', '8');
INSERT INTO `group_buy` VALUES ('200705170127', '湯媽媽濃湯', '24889544', '阿翰', '2020-07-05 17:31:00', '老闆很凶會罵人', '15');
INSERT INTO `group_buy` VALUES ('200705170211', '湯媽媽濃湯', '24889544', '阿翰', '2020-07-05 17:31:00', '老闆很凶會罵人', '15');
INSERT INTO `group_buy` VALUES ('200705170317', '湯媽媽濃湯', '24889544', '阿翰', '2020-07-05 17:31:00', '老闆很凶會罵人', '15');
INSERT INTO `group_buy` VALUES ('200705170401', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:33:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200705193748', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-08 20:07:00', '老闆很凶會罵人', '2');
INSERT INTO `group_buy` VALUES ('200705205930', '燒臘店', '04-88959987', '阿翰', '2020-07-05 21:29:00', '老闆很凶會罵人', '8');
INSERT INTO `group_buy` VALUES ('200705205940', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-05 21:40:00', '老闆很凶會罵人', '2');
INSERT INTO `group_buy` VALUES ('200705210005', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-05 21:40:00', '老闆很凶會罵人', '2');
INSERT INTO `group_buy` VALUES ('200705210016', '燒臘店', '04-88959987', '阿翰', '2020-07-05 21:35:00', '老闆很凶會罵人', '8');
INSERT INTO `hosts` VALUES ('1', '阿翰');
INSERT INTO `hosts` VALUES ('2', '小白');
INSERT INTO `hosts` VALUES ('3', '張學友');
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
INSERT INTO `store` VALUES ('2', '老村長佛腩湯', '老闆很凶會罵人', '04-88959987', './archive/5f01bfcadbe89.jpg');
INSERT INTO `store` VALUES ('3', '唐奶奶炸雞舖', '老闆很凶會罵人', '04-21314568', './archive/5efb5a0fb305e.jpg');
INSERT INTO `store` VALUES ('4', '炒飯超人', '送餐速度慢 十點前要訂', '04-88959987', './archive/5efb58b708d93.jpg');
INSERT INTO `store` VALUES ('5', '臭豆腐', '下雨絕對不要訂', '04-12345678', './archive/5efb4eabcfc61.jpg');
INSERT INTO `store` VALUES ('6', '均一價便當', '老闆算數不好 務必點清楚', '04-88959987', './archive/5efb4e7bd935b.webp');
INSERT INTO `store` VALUES ('7', '麥當勞', '好吃 可以推薦', '04-12345678', './archive/5efdbad5dff76.jpg');
INSERT INTO `store` VALUES ('8', '燒臘店', '好吃 可以推薦', '04-88959987', './archive/5efb4e9ea385d.jpg');
INSERT INTO `store` VALUES ('15', '湯媽媽濃湯', '真心推薦 便宜好吃 老闆娘又漂亮！', '24889544', './archive/5f004bef93cfe.jpg');
INSERT INTO `store` VALUES ('17', '烏龜熱吵店', '送餐速度烏龜慢，可接受才來', '04-88757788', './archive/stores/5f01bc6126149.jpg');
INSERT INTO `users` VALUES ('1', 'abc', 'abc');
