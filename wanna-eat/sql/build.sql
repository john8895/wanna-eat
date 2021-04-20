/*
MySQL Data Transfer
Source Host: localhost
Source Database: wannaeat
Target Host: localhost
Target Database: wannaeat
Date: 4/20/2021 1:26:18 PM
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
  `store_tags` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hosts
-- ----------------------------
CREATE TABLE `hosts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `host_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `field_id` varchar(255) DEFAULT NULL,
  `order_meal` varchar(255) NOT NULL,
  `order_price` int(255) NOT NULL,
  `order_number` int(11) NOT NULL,
  `order_remark` varchar(255) DEFAULT NULL,
  `order_paymentStatus` tinyint(3) DEFAULT '0',
  UNIQUE KEY `orders_field_id_uindex` (`field_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for store
-- ----------------------------
CREATE TABLE `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `store_tag` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `store_full_price` int(11) DEFAULT '0',
  `store_cover` varchar(255) DEFAULT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `group_buy` VALUES ('200705165130', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:18:00', '老闆很凶會罵人', '3', null);
INSERT INTO `group_buy` VALUES ('200705164910', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:18:00', '老闆很凶會罵人', '3', null);
INSERT INTO `group_buy` VALUES ('200705165056', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:18:00', '老闆很凶會罵人', '3', null);
INSERT INTO `group_buy` VALUES ('200704181010', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-05 18:40:00', '老闆很凶會罵人', '2', null);
INSERT INTO `group_buy` VALUES ('200704204035', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-06 21:10:00', '老闆很凶會罵人', '3', null);
INSERT INTO `group_buy` VALUES ('200705060544', '麥當勞', '04-12345678', '阿翰', '2020-07-06 06:35:00', '老闆很凶會罵人', '7', null);
INSERT INTO `group_buy` VALUES ('200705161237', '麥當勞', '04-12345678', '阿翰', '2020-07-05 16:23:00', '老闆很凶會罵人', '7', null);
INSERT INTO `group_buy` VALUES ('200705163043', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:00:00', '老闆很凶會罵人', '5', null);
INSERT INTO `group_buy` VALUES ('200705163156', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:00:00', '老闆很凶會罵人', '5', null);
INSERT INTO `group_buy` VALUES ('200705163205', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:02:00', '老闆很凶會罵人', '3', null);
INSERT INTO `group_buy` VALUES ('200705163307', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:02:00', '老闆很凶會罵人', '3', null);
INSERT INTO `group_buy` VALUES ('201221094303', '月湖歐式西餐廳', '04-21314568', '胖胖豬', '2020-12-22 09:43:00', '', '3', '麵,飯');
INSERT INTO `group_buy` VALUES ('200705164506', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:15:00', '老闆很凶會罵人', '5', null);
INSERT INTO `group_buy` VALUES ('200705164621', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:15:00', '老闆很凶會罵人', '5', null);
INSERT INTO `group_buy` VALUES ('200705164627', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:16:00', '老闆很凶會罵人', '5', null);
INSERT INTO `group_buy` VALUES ('200705164726', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:16:00', '老闆很凶會罵人', '5', null);
INSERT INTO `group_buy` VALUES ('200705164802', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:16:00', '老闆很凶會罵人', '5', null);
INSERT INTO `group_buy` VALUES ('200705164809', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:18:00', '老闆很凶會罵人', '3', null);
INSERT INTO `group_buy` VALUES ('200704175058', '炒飯超人', '04-88959987', '阿翰', '2020-07-04 18:20:00', '老闆很凶會罵人', '4', null);
INSERT INTO `group_buy` VALUES ('200704175106', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-04 18:21:00', '老闆很凶會罵人', '2', null);
INSERT INTO `group_buy` VALUES ('200704175116', '湯媽媽濃湯', '24889544', '張學友', '2020-07-04 18:21:00', '老闆很凶會罵人', '15', null);
INSERT INTO `group_buy` VALUES ('200705165140', '炒飯超人', '04-88959987', '阿翰', '2020-07-05 17:21:00', '老闆很凶會罵人', '4', null);
INSERT INTO `group_buy` VALUES ('200705165245', '炒飯超人', '04-88959987', '阿翰', '2020-07-05 17:21:00', '老闆很凶會罵人', '4', null);
INSERT INTO `group_buy` VALUES ('200705165340', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:23:00', '老闆很凶會罵人', '3', null);
INSERT INTO `group_buy` VALUES ('200705165543', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-05 17:25:00', '老闆很凶會罵人', '3', null);
INSERT INTO `group_buy` VALUES ('200705165614', '燒臘店', '04-88959987', '阿翰', '2020-07-05 17:26:00', '老闆很凶會罵人', '8', null);
INSERT INTO `group_buy` VALUES ('200705170019', '燒臘店', '04-88959987', '阿翰', '2020-07-05 17:26:00', '老闆很凶會罵人', '8', null);
INSERT INTO `group_buy` VALUES ('200705170127', '湯媽媽濃湯', '24889544', '阿翰', '2020-07-05 17:31:00', '老闆很凶會罵人', '15', null);
INSERT INTO `group_buy` VALUES ('200705170211', '湯媽媽濃湯', '24889544', '阿翰', '2020-07-05 17:31:00', '老闆很凶會罵人', '15', null);
INSERT INTO `group_buy` VALUES ('200705170317', '湯媽媽濃湯', '24889544', '阿翰', '2020-07-05 17:31:00', '老闆很凶會罵人', '15', null);
INSERT INTO `group_buy` VALUES ('200705170401', '臭豆腐', '04-12345678', '阿翰', '2020-07-05 17:33:00', '老闆很凶會罵人', '5', null);
INSERT INTO `group_buy` VALUES ('200706232819', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-06 23:58:00', '', '2', null);
INSERT INTO `group_buy` VALUES ('200705205930', '燒臘店', '04-88959987', '阿翰', '2020-07-05 21:29:00', '老闆很凶會罵人', '8', null);
INSERT INTO `group_buy` VALUES ('200705205940', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-05 21:40:00', '老闆很凶會罵人', '2', null);
INSERT INTO `group_buy` VALUES ('200705210005', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-05 21:40:00', '老闆很凶會罵人', '2', null);
INSERT INTO `group_buy` VALUES ('200705210016', '燒臘店', '04-88959987', '阿翰', '2020-07-05 21:35:00', '老闆很凶會罵人', '8', null);
INSERT INTO `group_buy` VALUES ('200706233535', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-06 00:05:00', '', '2', null);
INSERT INTO `group_buy` VALUES ('200707053835', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-07 06:08:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('200707211900', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-07 21:50:00', '', '2', null);
INSERT INTO `group_buy` VALUES ('200708063015', '炒飯超人', '04-88959987', '阿翰', '2020-07-08 07:30:00', '', '4', null);
INSERT INTO `group_buy` VALUES ('200707211928', '炒飯超人', '04-88959987', '阿翰', '2020-07-06 21:19:00', '', '4', null);
INSERT INTO `group_buy` VALUES ('200707211949', '炒飯超人', '04-88959987', '阿翰', '2020-07-07 21:55:00', '', '4', null);
INSERT INTO `group_buy` VALUES ('200707225658', '麥當勞', '04-12345678', '阿翰', '2020-07-07 23:50:00', '', '7', null);
INSERT INTO `group_buy` VALUES ('200708224937', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-08 22:49:00', '', '2', null);
INSERT INTO `group_buy` VALUES ('200709062654', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-13 06:26:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('201103103559', '唐奶奶炸雞舖', '04-21314568', '老虎', '2020-11-05 10:35:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('200710211151', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-31 21:11:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('200709193858', '炒飯超人', '04-88959987', '阿翰', '2020-07-31 19:38:00', '', '4', null);
INSERT INTO `group_buy` VALUES ('200709202925', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-24 20:29:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('200710211454', '唐奶奶炸雞舖', '04-21314568', '阿翰', '2020-07-31 21:14:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('200718200347', '月湖歐式西餐廳', '04-21314568', '阿翰', '2020-07-31 20:03:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('200720124842', '人力資源', '24889544', '阿翰', '2020-07-22 12:48:00', '', '22', null);
INSERT INTO `group_buy` VALUES ('201201100012', '麵,飯', '04-21314568', '老虎', '2020-12-01 10:00:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('201201100107', '麵,飯', '04-21314568', '老虎', '2020-12-01 10:01:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('201214092700', '麵,飯', '04-21314568', '小V', '2020-12-14 10:26:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('201214115121', '麵,飯', '04-21314568', 'Jack', '2020-12-14 12:51:00', '', '3', null);
INSERT INTO `group_buy` VALUES ('201214115406', '麵,飯', '04-22301838', '小V', '2020-12-14 12:54:00', '', '23', null);
INSERT INTO `group_buy` VALUES ('201214135523', '米糕,排骨酥麵', '04-2247-1010', '老虎', '2020-12-14 13:55:00', '', '22', null);
INSERT INTO `group_buy` VALUES ('201216100127', '米糕,排骨酥麵', '04-2247-1010', '阿翰', '2020-12-17 10:01:00', '', '22', null);
INSERT INTO `group_buy` VALUES ('201216101731', '月湖歐式西餐廳', '04-21314568', '小小', '2020-12-16 10:17:00', '', '3', '麵,飯');
INSERT INTO `group_buy` VALUES ('201217120910', '炒飯超人', '04-88959987', '胖胖豬', '0000-00-00 00:00:00', '', '4', '麵,飯');
INSERT INTO `group_buy` VALUES ('201217125112', '月湖歐式西餐廳', '04-21314568', '胖胖豬', '0000-00-00 00:00:00', '', '3', '麵,飯');
INSERT INTO `group_buy` VALUES ('201217125340', '炒飯超人', '04-88959987', '胖胖豬', '0000-00-00 00:00:00', '', '4', '麵,飯');
INSERT INTO `group_buy` VALUES ('201217125417', '月湖歐式西餐廳', '04-21314568', '小小', '0000-00-00 00:00:00', '', '3', '麵,飯');
INSERT INTO `group_buy` VALUES ('201217130345', '炒飯超人', '04-88959987', '胖胖豬', '0000-00-00 00:00:00', '', '4', '麵,飯');
INSERT INTO `group_buy` VALUES ('201217130834', '月湖歐式西餐廳', '04-21314568', '小小', '2020-11-17 13:08:27', '', '3', '麵,飯');
INSERT INTO `group_buy` VALUES ('201218090513', '月湖歐式西餐廳', '04-21314568', '美女', '2020-11-18 09:05:06', '', '3', '麵,飯');
INSERT INTO `group_buy` VALUES ('201218090937', '月湖歐式西餐廳', '04-21314568', 'Jack', '2020-11-18 09:09:31', '', '3', '麵,飯');
INSERT INTO `group_buy` VALUES ('201218091032', '月湖歐式西餐廳', '04-21314568', '翰翰', '2020-12-19 09:10:00', '', '3', '麵,飯');
INSERT INTO `group_buy` VALUES ('201221115127', '炒飯超人', '04-88959987', '老虎', '2020-12-22 11:51:00', '', '4', '麵,飯');
INSERT INTO `group_buy` VALUES ('201228125337', '炒飯超人', '04-88959987', '胖胖豬', '2020-12-29 12:53:00', '', '4', '麵,飯');
INSERT INTO `group_buy` VALUES ('210104090913', '月湖歐式西餐廳', '04-21314568', 'Jack', '2021-01-05 09:09:00', '', '3', '麵,飯');
INSERT INTO `hosts` VALUES ('1', '阿翰');
INSERT INTO `hosts` VALUES ('19', 'Jack');
INSERT INTO `hosts` VALUES ('3', '張學友');
INSERT INTO `hosts` VALUES ('20', '胖胖豬');
INSERT INTO `hosts` VALUES ('21', '小小');
INSERT INTO `hosts` VALUES ('22', '翰翰');
INSERT INTO `hosts` VALUES ('23', '美女');
INSERT INTO `orders` VALUES ('200709193546', '阿翰', '5f070c4279775', '腳尾飯', '100', '0', '', '0');
INSERT INTO `orders` VALUES ('200705170317', '小白', '5f0196d92fcca', '排骨飯', '80', '0', '排骨大辣 炒飯不辣', '0');
INSERT INTO `orders` VALUES ('200705060544', '吳騎龍', '5f0185385bbfb', '123', '20', '0', '', '0');
INSERT INTO `orders` VALUES ('200705170401', '小白', '5f01977f3f02c', '排骨飯', '80', '0', '排骨大辣 炒飯不辣', '0');
INSERT INTO `orders` VALUES ('200705165130', '阿翰', '5f0197baa7cb2', '排餐', '100', '0', '', '1');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f019a273084e', '排餐', '10', '0', '', '0');
INSERT INTO `orders` VALUES ('200705170401', '阿油伯王', '5f019a37dec5a', '炸彈排骨麵', '500', '0', '', '0');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f01a514b1d3e', '伴手禮', '100', '0', '', '0');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f01a5516b5c7', '珍珠奶', '80', '0', '不加珍珠', '0');
INSERT INTO `orders` VALUES ('200705193748', '小白', '5f01bb870c492', '排骨飯', '80', '0', '排骨大辣 炒飯不辣', '0');
INSERT INTO `orders` VALUES ('200705060544', '阿翰', '5f01bb9c56c4b', '排餐', '100', '0', '', '0');
INSERT INTO `orders` VALUES ('200705210016', '阿翰', '5f01d2b04512c', '排餐', '100', '0', '', '0');
INSERT INTO `orders` VALUES ('200705210016', '阿熊', '5f01d2c02ce0d', '菜菜子', '500', '0', '123', '0');
INSERT INTO `orders` VALUES ('200706232825', '阿翰', '5f034326b8e55', '排餐', '3', '0', '', '0');
INSERT INTO `orders` VALUES ('200707211910', '阿翰', '5f04950634def', '排餐', '10', '0', '', '0');
INSERT INTO `orders` VALUES ('200707211910', '阿翰', '5f04965bbd15c', '伴手禮', '100', '0', '', '0');
INSERT INTO `orders` VALUES ('200707211910', '吳騎龍', '5f0496647d990', '腳尾飯', '200', '0', '', '0');
INSERT INTO `orders` VALUES ('200709062654', '媽媽米', '5f0648a863867', '排飯', '126', '4', '.', '0');
INSERT INTO `orders` VALUES ('200709062654', 'Nick', '5f06effb1d87d', '排飯', '126', '1', '排骨大辣 炒飯不辣', '0');
INSERT INTO `orders` VALUES ('200709062654', '阿熊', '5f06f0067187b', '腳尾飯', '26', '4', '不要辣', '0');
INSERT INTO `orders` VALUES ('200710065045', '阿熊', '5f0db846c4f1e', '腳尾飯', '121', '1', '', '0');
INSERT INTO `orders` VALUES ('200709062654', 'Wang', '5f06f04d8a1b4', '綠茶包', '30', '7', '我不胖', '0');
INSERT INTO `orders` VALUES ('200709062654', '吳騎龍', '5f06f07fb03e1', '酸辣湯湯', '20', '3', '1234', '0');
INSERT INTO `orders` VALUES ('200709062654', '阿翰王', '5f06fd55454ed', '腳尾飯', '23', '1', '122', '0');
INSERT INTO `orders` VALUES ('200709193743', '阿翰', '5f071658366cf', '排餐', '100', '0', '', '0');
INSERT INTO `orders` VALUES ('200709193638', '阿翰', '5f072c766c05f', '排餐', '100', '1', '', '0');
INSERT INTO `orders` VALUES ('200709193638', '阿翰', '5f072d008fac9', '腳尾飯', '100', '1', '123', '0');
INSERT INTO `orders` VALUES ('200710065045', '阿翰', '5f0db83ee2720', '牛肉麵', '98', '1', '', '0');
INSERT INTO `orders` VALUES ('200709062654', '陳政翰', '5f0dab6ea347e', '鐵板雞腿排便當', '75', '1', '', '0');
INSERT INTO `orders` VALUES ('200709193858', '阿昌', '5f139d4a9973b', '雞排飯', '80', '1', '', '0');
INSERT INTO `orders` VALUES ('200710065045', '吳騎龍', '5f0db8581659c', '伴手禮', '1', '1', '', '0');
INSERT INTO `orders` VALUES ('200714225415', '阿翰v', '5f0dc7265fcc7', '排餐', '1', '3', '11', '0');
INSERT INTO `orders` VALUES ('200714225415', '吳騎龍', '5f0dc73a8a2f9', '腳尾飯', '200', '2', '', '0');
INSERT INTO `orders` VALUES ('200709193858', '阿翰', '5f12de88bd75f', '排餐', '200', '1', '', '0');
INSERT INTO `orders` VALUES ('200709193858', '阿熊', '5f12e020929ad', '腳尾飯', '50', '1', '', '0');
INSERT INTO `orders` VALUES ('200718200347', '阿翰', '5f12e8dfab0a6', '排餐', '50', '1', '', '0');
INSERT INTO `orders` VALUES ('200718200347', '媽媽米', '5f12eb649c049', '伴手禮', '200', '1', '', '0');
INSERT INTO `orders` VALUES ('200709193743', '媽媽米', '5f12f8de3ff44', '伴手禮', '300', '1', '', '0');
INSERT INTO `orders` VALUES ('200710211454', '嗚嗚', '5f131825d5da0', '老奶奶', '200', '1', '', '0');
INSERT INTO `orders` VALUES ('200710211151', '阿熊', '5f1522b3601f9', '排飯', '100', '1', '', '0');
INSERT INTO `orders` VALUES ('200710211151', '媽媽米', '5f1522b9a6520', '伴手禮', '20', '1', '', '0');
INSERT INTO `orders` VALUES ('200710211151', '阿熊', '5f1522c0047a5', '腳尾飯', '50', '1', '', '0');
INSERT INTO `orders` VALUES ('201214092700', '阿熊', '5fd6bf788c42b', '排飯', '100', '1', '', '0');
INSERT INTO `orders` VALUES ('201221115127', '砂礫', '733ab61bfcafa', '酸辣湯', '40', '1', '湯兩倍', '0');
INSERT INTO `orders` VALUES ('201221115127', '砂礫', '9500cf4c6560e', '酸辣湯', '40', '1', '湯兩倍', '0');
INSERT INTO `orders` VALUES ('201221115127', '阿華', '504b7b53982f1', '炸香腸飯', '90', '1', '', '0');
INSERT INTO `orders` VALUES ('201221115127', '阿漢', '1575cc4b1b88a', '酸辣湯', '40', '1', '加水餃', '0');
INSERT INTO `orders` VALUES ('201221115127', '阿HAN', 'd40fe213d86a8', '酸辣湯', '40', '1', '不要湯', '0');
INSERT INTO `orders` VALUES ('201221115127', 'R漢', '5625eb14f05c4', '酸辣湯', '40', '1', '不要辣', '0');
INSERT INTO `orders` VALUES ('201221115127', 'r漢', 'cc3cfa751b665', '酸辣湯', '40', '1', '不要酸', '0');
INSERT INTO `orders` VALUES ('201221115127', 'RHAN', '2a6205acfaba6', '酸辣湯', '60', '1', '', '0');
INSERT INTO `orders` VALUES ('201228125337', '阿翰', 'c61ca785b0be7', '雞腿排', '70', '1', '', '0');
INSERT INTO `orders` VALUES ('201229125337', '阿翰', '70d33a035b58b', '滷排骨', '75', '1', '', '0');
INSERT INTO `orders` VALUES ('201228125337', '阿翰', '607176f2b89cd', '雞腿排', '70', '1', '不辣', '0');
INSERT INTO `orders` VALUES ('201221115127', '阿翰', '67af8fee791c7', '雞排', '80', '1', '', '0');
INSERT INTO `store` VALUES ('3', '月湖歐式西餐廳', '麵,飯', '招牌豐富商業套餐，含麵包、湯或沙拉、主菜及甜點、飲料。另主廚推薦各式套餐均含開胃菜、麵包、湯、沙拉、主菜及甜點、飲料。又師傅精製甜點，如德式乳酪蛋糕、提拉米蘇等也令人驚豔。', '04-21314568', '220', './archive/cover-5f0842c3c9170.jpeg', './archive/5f0842c3c92a4.jpg');
INSERT INTO `store` VALUES ('4', '炒飯超人', '麵,飯', '送餐速度慢 十點前要訂', '04-88959987', '0', './archive/cover-5f0842b7cd104.jpeg', './archive/5efb58b708d93.jpg');
INSERT INTO `store` VALUES ('6', '均一價便當', '麵,飯', '老闆算數不好 務必點清楚', '04-88959987', '110', './archive/cover-5f0842a36df17.jpeg', './archive/5f0842a36e021.jpg');
INSERT INTO `store` VALUES ('22', '一品記', '米糕,排骨酥麵', '', '04-2247-1010', '0', './archive/stores/cover-5f152217e22eb.jpg', './archive/stores/5f152217e23b6.jpg');
INSERT INTO `store` VALUES ('23', '徐家莊麵館', '麵,飯', '406台中市北屯區北平路三段135號', '04-22301838', '0', '', './archive/5fa0fbfc04509.png');
INSERT INTO `users` VALUES ('1', 'abc', 'abc');
