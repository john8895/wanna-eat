/*
MySQL Data Transfer
Source Host: localhost
Source Database: wannaeat
Target Host: localhost
Target Database: wannaeat
Date: 2020/7/19 �U�� 01:03:52
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `field_id` varchar(255) default NULL,
  `order_meal` varchar(255) NOT NULL,
  `order_price` int(255) NOT NULL,
  `order_number` int(11) NOT NULL,
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
  `store_full_price` int(11) default '0',
  `store_cover` varchar(255) default NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

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
INSERT INTO `group_buy` VALUES ('200705170127', '湯媽媽濃湯', '24889544', '阿翰', '2020-07-05 17:31:00', '老闆很凶會罵人', '15');
INSERT INTO `group_buy` VALUES ('200705170211', '湯媽媽濃湯', '24889544', '阿翰', '2020-07-05 17:31:00', '老闆很凶會罵人', '15');
INSERT INTO `group_buy` VALUES ('200705170317', '湯媽媽濃湯', '24889544', '阿翰', '2020-07-05 17:31:00', '老闆很凶會罵人', '15');
INSERT INTO `group_buy` VALUES ('200705170401', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:33:00', '老闆很凶會罵人', '5');
INSERT INTO `group_buy` VALUES ('200706232819', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-06 23:58:00', '', '2');
INSERT INTO `group_buy` VALUES ('200705205930', '燒臘店', '04-88959987', '阿翰', '2020-07-05 21:29:00', '老闆很凶會罵人', '8');
INSERT INTO `group_buy` VALUES ('200705205940', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-05 21:40:00', '老闆很凶會罵人', '2');
INSERT INTO `group_buy` VALUES ('200705210005', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-05 21:40:00', '老闆很凶會罵人', '2');
INSERT INTO `group_buy` VALUES ('200705210016', '燒臘店', '04-88959987', '阿翰', '2020-07-05 21:35:00', '老闆很凶會罵人', '8');
INSERT INTO `group_buy` VALUES ('200706233535', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-06 00:05:00', '', '2');
INSERT INTO `group_buy` VALUES ('200707053835', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-07 06:08:00', '', '3');
INSERT INTO `group_buy` VALUES ('200707211900', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-07 21:50:00', '', '2');
INSERT INTO `group_buy` VALUES ('200708063015', '炒飯超人', '04-88959987', '阿翰', '2020-07-08 07:30:00', '', '4');
INSERT INTO `group_buy` VALUES ('200707211928', '炒飯超人', '04-88959987', '阿翰', '2020-07-06 21:19:00', '', '4');
INSERT INTO `group_buy` VALUES ('200707211949', '炒飯超人', '04-88959987', '阿翰', '2020-07-07 21:55:00', '', '4');
INSERT INTO `group_buy` VALUES ('200707225658', '麥當勞', '04-12345678', '阿翰', '2020-07-07 23:50:00', '', '7');
INSERT INTO `group_buy` VALUES ('200708224937', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-08 22:49:00', '', '2');
INSERT INTO `group_buy` VALUES ('200709062654', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-13 06:26:00', '', '3');
INSERT INTO `group_buy` VALUES ('200710065045', '麥當勞', '04-12345678', '阿翰', '2020-07-31 06:50:00', '', '7');
INSERT INTO `group_buy` VALUES ('200709193743', '燒臘店', '04-88959987', '阿翰', '2020-07-24 19:37:00', '', '8');
INSERT INTO `group_buy` VALUES ('200710211151', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-31 21:11:00', '', '3');
INSERT INTO `group_buy` VALUES ('200709193858', '炒飯超人', '04-88959987', '阿翰', '2020-07-31 19:38:00', '', '4');
INSERT INTO `group_buy` VALUES ('200709202925', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-24 20:29:00', '', '3');
INSERT INTO `group_buy` VALUES ('200710211454', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-31 21:14:00', '', '3');
INSERT INTO `group_buy` VALUES ('200718200347', '月湖歐式西餐廳', '04-21314568', '阿翰', '2020-07-31 20:03:00', '', '3');
INSERT INTO `hosts` VALUES ('1', '阿翰');
INSERT INTO `hosts` VALUES ('19', 'Jack');
INSERT INTO `hosts` VALUES ('3', '張學友');
INSERT INTO `hosts` VALUES ('10', '小胖');
INSERT INTO `hosts` VALUES ('20', '胖胖豬');
INSERT INTO `hosts` VALUES ('21', '小小');
INSERT INTO `hosts` VALUES ('22', '翰翰');
INSERT INTO `hosts` VALUES ('23', '美女');
INSERT INTO `orders` VALUES ('200709193546', '阿翰', '5f070c4279775', '腳尾飯', '100', '0', '');
INSERT INTO `orders` VALUES ('200705170317', '小白', '5f0196d92fcca', '排骨飯', '80', '0', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200705060544', '吳騎龍', '5f0185385bbfb', '123', '20', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '小白', '5f01977f3f02c', '排骨飯', '80', '0', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200705165130', '阿翰', '5f0197baa7cb2', '排餐', '100', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f019a273084e', '排餐', '10', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '阿油伯王', '5f019a37dec5a', '炸彈排骨麵', '500', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f01a514b1d3e', '伴手禮', '100', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f01a5516b5c7', '珍珠奶', '80', '0', '不加珍珠');
INSERT INTO `orders` VALUES ('200705193748', '小白', '5f01bb870c492', '排骨飯', '80', '0', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200705060544', '阿翰', '5f01bb9c56c4b', '排餐', '100', '0', '');
INSERT INTO `orders` VALUES ('200705210016', '阿翰', '5f01d2b04512c', '排餐', '100', '0', '');
INSERT INTO `orders` VALUES ('200705210016', '阿熊', '5f01d2c02ce0d', '菜菜子', '500', '0', '123');
INSERT INTO `orders` VALUES ('200706232825', '阿翰', '5f034326b8e55', '排餐', '3', '0', '');
INSERT INTO `orders` VALUES ('200707211910', '阿翰', '5f04950634def', '排餐', '10', '0', '');
INSERT INTO `orders` VALUES ('200707211910', '阿翰', '5f04965bbd15c', '伴手禮', '100', '0', '');
INSERT INTO `orders` VALUES ('200707211910', '吳騎龍', '5f0496647d990', '腳尾飯', '200', '0', '');
INSERT INTO `orders` VALUES ('200709062654', '媽媽米', '5f0648a863867', '排飯', '126', '4', '.');
INSERT INTO `orders` VALUES ('200709062654', 'Nick', '5f06effb1d87d', '排飯', '126', '1', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200709062654', '阿熊', '5f06f0067187b', '腳尾飯', '26', '4', '不要辣');
INSERT INTO `orders` VALUES ('200710065045', '阿熊', '5f0db846c4f1e', '腳尾飯', '121', '1', '');
INSERT INTO `orders` VALUES ('200709062654', 'Wang', '5f06f04d8a1b4', '綠茶包', '30', '7', '我不胖');
INSERT INTO `orders` VALUES ('200709062654', '吳騎龍', '5f06f07fb03e1', '酸辣湯湯', '20', '3', '1234');
INSERT INTO `orders` VALUES ('200709062654', '阿翰王', '5f06fd55454ed', '腳尾飯', '23', '1', '122');
INSERT INTO `orders` VALUES ('200709193743', '阿翰', '5f071658366cf', '排餐', '100', '0', '');
INSERT INTO `orders` VALUES ('200709193638', '阿翰', '5f072c766c05f', '排餐', '100', '1', '');
INSERT INTO `orders` VALUES ('200709193638', '阿翰', '5f072d008fac9', '腳尾飯', '100', '1', '123');
INSERT INTO `orders` VALUES ('200710065045', '阿翰', '5f0db83ee2720', '牛肉麵', '98', '1', '');
INSERT INTO `orders` VALUES ('200709062654', '陳政翰', '5f0dab6ea347e', '鐵板雞腿排便當', '75', '1', '');
INSERT INTO `orders` VALUES ('200709193858', '阿昌', '5f139d4a9973b', '雞排飯', '80', '1', '');
INSERT INTO `orders` VALUES ('200710065045', '吳騎龍', '5f0db8581659c', '伴手禮', '1', '1', '');
INSERT INTO `orders` VALUES ('200714225415', '阿翰v', '5f0dc7265fcc7', '排餐', '1', '3', '11');
INSERT INTO `orders` VALUES ('200714225415', '吳騎龍', '5f0dc73a8a2f9', '腳尾飯', '200', '2', '');
INSERT INTO `orders` VALUES ('200709193858', '阿翰', '5f12de88bd75f', '排餐', '200', '1', '');
INSERT INTO `orders` VALUES ('200709193858', '阿熊', '5f12e020929ad', '腳尾飯', '50', '1', '');
INSERT INTO `orders` VALUES ('200718200347', '阿翰', '5f12e8dfab0a6', '排餐', '50', '1', '');
INSERT INTO `orders` VALUES ('200718200347', '媽媽米', '5f12eb649c049', '伴手禮', '200', '1', '');
INSERT INTO `orders` VALUES ('200709193743', '媽媽米', '5f12f8de3ff44', '伴手禮', '300', '1', '');
INSERT INTO `orders` VALUES ('200710211454', '嗚嗚', '5f131825d5da0', '老奶奶', '200', '1', '');
INSERT INTO `store` VALUES ('3', '月湖歐式西餐廳', '招牌豐富商業套餐，含麵包、湯或沙拉、主菜及甜點、飲料。另主廚推薦各式套餐均含開胃菜、麵包、湯、沙拉、主菜及甜點、飲料。又師傅精製甜點，如德式乳酪蛋糕、提拉米蘇等也令人驚豔。', '04-21314568', '220', './archive/cover-5f0842c3c9170.jpeg', './archive/5f0842c3c92a4.jpg');
INSERT INTO `store` VALUES ('4', '炒飯超人', '送餐速度慢 十點前要訂', '04-88959987', '0', './archive/cover-5f0842b7cd104.jpeg', './archive/5efb58b708d93.jpg');
INSERT INTO `store` VALUES ('6', '均一價便當', '老闆算數不好 務必點清楚', '04-88959987', '110', './archive/cover-5f0842a36df17.jpeg', './archive/5f0842a36e021.jpg');
INSERT INTO `users` VALUES ('1', 'abc', 'abc');
