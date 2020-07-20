/*
MySQL Data Transfer
Source Host: localhost
Source Database: wannaeat
Target Host: localhost
Target Database: wannaeat
Date: 2020/7/21 �W�� 06:41:10
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
  `order_paymentStatus` tinyint(1) default '0',
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

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
INSERT INTO `group_buy` VALUES ('200719162755', '月湖歐式西餐廳', '04-21314568', '小V', '2020-07-19 16:27:00', '', '3');
INSERT INTO `group_buy` VALUES ('200719162811', '炒飯超人', '04-88959987', '小V', '2020-07-19 16:28:00', '', '4');
INSERT INTO `group_buy` VALUES ('200719170956', '均一價便當', '04-88959987', '小V', '2020-07-19 17:09:00', '', '6');
INSERT INTO `group_buy` VALUES ('200707211900', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-07 21:50:00', '', '2');
INSERT INTO `group_buy` VALUES ('200708063015', '炒飯超人', '04-88959987', '阿翰', '2020-07-08 07:30:00', '', '4');
INSERT INTO `group_buy` VALUES ('200707211928', '炒飯超人', '04-88959987', '阿翰', '2020-07-06 21:19:00', '', '4');
INSERT INTO `group_buy` VALUES ('200707211949', '炒飯超人', '04-88959987', '阿翰', '2020-07-07 21:55:00', '', '4');
INSERT INTO `group_buy` VALUES ('200707225658', '麥當勞', '04-12345678', '阿翰', '2020-07-07 23:50:00', '', '7');
INSERT INTO `group_buy` VALUES ('200708224937', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-08 22:49:00', '', '2');
INSERT INTO `group_buy` VALUES ('200719171540', '炒飯超人', '04-88959987', '小V', '2020-07-19 18:15:00', '', '4');
INSERT INTO `group_buy` VALUES ('200719171618', '月湖歐式西餐廳', '04-21314568', '老虎', '2020-07-19 20:16:00', '', '3');
INSERT INTO `group_buy` VALUES ('200719200854', '均一價便當', '04-88959987', '老虎', '2020-07-19 19:08:00', '', '6');
INSERT INTO `group_buy` VALUES ('200719201023', '均一價便當', '04-88959987', '小V', '2020-07-19 19:10:00', '', '6');
INSERT INTO `group_buy` VALUES ('200719202350', '月湖歐式西餐廳', '04-21314568', '小V', '2020-07-19 21:23:00', '', '3');
INSERT INTO `group_buy` VALUES ('200719214821', '月湖歐式西餐廳', '04-21314568', '阿翰', '2020-07-20 21:48:00', '', '3');
INSERT INTO `hosts` VALUES ('1', '阿翰');
INSERT INTO `hosts` VALUES ('19', 'Jack');
INSERT INTO `hosts` VALUES ('3', '張學友');
INSERT INTO `hosts` VALUES ('10', '小胖');
INSERT INTO `hosts` VALUES ('20', '胖胖豬');
INSERT INTO `hosts` VALUES ('21', '小小');
INSERT INTO `hosts` VALUES ('23', '美女');
INSERT INTO `orders` VALUES ('200709193546', '阿翰', '5f070c4279775', '0', '腳尾飯', '100', '0', '');
INSERT INTO `orders` VALUES ('200705170317', '小白', '5f0196d92fcca', '0', '排骨飯', '80', '0', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200705060544', '吳騎龍', '5f0185385bbfb', '0', '123', '20', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '小白', '5f01977f3f02c', '0', '排骨飯', '80', '0', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200705165130', '阿翰', '5f0197baa7cb2', '0', '排餐', '100', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f019a273084e', '0', '排餐', '10', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '阿油伯王', '5f019a37dec5a', '0', '炸彈排骨麵', '500', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f01a514b1d3e', '0', '伴手禮', '100', '0', '');
INSERT INTO `orders` VALUES ('200705170401', '阿翰', '5f01a5516b5c7', '0', '珍珠奶', '80', '0', '不加珍珠');
INSERT INTO `orders` VALUES ('200705193748', '小白', '5f01bb870c492', '0', '排骨飯', '80', '0', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200705060544', '阿翰', '5f01bb9c56c4b', '0', '排餐', '100', '0', '');
INSERT INTO `orders` VALUES ('200705210016', '阿翰', '5f01d2b04512c', '0', '排餐', '100', '0', '');
INSERT INTO `orders` VALUES ('200705210016', '阿熊', '5f01d2c02ce0d', '0', '菜菜子', '500', '0', '123');
INSERT INTO `orders` VALUES ('200706232825', '阿翰', '5f034326b8e55', '0', '排餐', '3', '0', '');
INSERT INTO `orders` VALUES ('200707211910', '阿翰', '5f04950634def', '0', '排餐', '10', '0', '');
INSERT INTO `orders` VALUES ('200707211910', '阿翰', '5f04965bbd15c', '0', '伴手禮', '100', '0', '');
INSERT INTO `orders` VALUES ('200707211910', '吳騎龍', '5f0496647d990', '0', '腳尾飯', '200', '0', '');
INSERT INTO `orders` VALUES ('200709062654', '媽媽米', '5f0648a863867', '0', '排飯', '126', '4', '.');
INSERT INTO `orders` VALUES ('200709062654', 'Nick', '5f06effb1d87d', '0', '排飯', '126', '1', '排骨大辣 炒飯不辣');
INSERT INTO `orders` VALUES ('200709062654', '阿熊', '5f06f0067187b', '0', '腳尾飯', '26', '4', '不要辣');
INSERT INTO `orders` VALUES ('200710065045', '阿熊', '5f0db846c4f1e', '0', '腳尾飯', '121', '1', '');
INSERT INTO `orders` VALUES ('200709062654', 'Wang', '5f06f04d8a1b4', '0', '綠茶包', '30', '7', '我不胖');
INSERT INTO `orders` VALUES ('200709062654', '吳騎龍', '5f06f07fb03e1', '0', '酸辣湯湯', '20', '3', '1234');
INSERT INTO `orders` VALUES ('200709062654', '阿翰王', '5f06fd55454ed', '0', '腳尾飯', '23', '1', '122');
INSERT INTO `orders` VALUES ('200709193743', '阿翰', '5f071658366cf', '0', '排餐', '100', '0', '');
INSERT INTO `orders` VALUES ('200709193638', '阿翰', '5f072c766c05f', '0', '排餐', '100', '1', '');
INSERT INTO `orders` VALUES ('200709193638', '阿翰', '5f072d008fac9', '0', '腳尾飯', '100', '1', '123');
INSERT INTO `orders` VALUES ('200710065045', '阿翰', '5f0db83ee2720', '0', '牛肉麵', '98', '1', '');
INSERT INTO `orders` VALUES ('200709062654', '陳政翰', '5f0dab6ea347e', '0', '鐵板雞腿排便當', '75', '1', '');
INSERT INTO `orders` VALUES ('200709193858', '媽媽米', '5f13f132db2bd', '0', '伴手禮', '100', '1', '');
INSERT INTO `orders` VALUES ('200710065045', '吳騎龍', '5f0db8581659c', '0', '伴手禮', '1', '1', '');
INSERT INTO `orders` VALUES ('200714225415', '阿翰v', '5f0dc7265fcc7', '0', '排餐', '1', '3', '11');
INSERT INTO `orders` VALUES ('200714225415', '吳騎龍', '5f0dc73a8a2f9', '0', '腳尾飯', '200', '2', '');
INSERT INTO `orders` VALUES ('200709193858', '阿翰', '5f12de88bd75f', '0', '排餐', '200', '1', '');
INSERT INTO `orders` VALUES ('200709193858', '阿翰', '5f13f116ba281', '0', '排餐', '100', '1', '');
INSERT INTO `orders` VALUES ('200718200347', '阿翰', '5f12e8dfab0a6', '0', '排餐', '50', '1', '');
INSERT INTO `orders` VALUES ('200719214821', '吳騎龍', '5f1456c9aef74', '1', '腳尾飯', '100', '3', '1');
INSERT INTO `orders` VALUES ('200709193743', '媽媽米', '5f12f8de3ff44', '0', '伴手禮', '300', '1', '');
INSERT INTO `orders` VALUES ('200710211454', '嗚嗚', '5f131825d5da0', '0', '老奶奶', '200', '1', '');
INSERT INTO `orders` VALUES ('200709193858', '媽媽米', '5f13f13d3f133', '0', '排飯0', '10', '1', '');
INSERT INTO `orders` VALUES ('200719214821', '阿翰', '5f14580e48868', '0', '腳尾飯', '100', '2', '');
INSERT INTO `orders` VALUES ('200719214821', '媽媽米', '5f14582e3b775', '0', '腳尾飯', '100', '4', '');
INSERT INTO `orders` VALUES ('200719214821', '媽媽米', '5f15a0e946e46', '0', '伴手禮', '10', '1', '');
INSERT INTO `orders` VALUES ('200719214821', '吳騎龍', '5f15a10fd7c04', '0', '排飯', '58', '1', '');
INSERT INTO `store` VALUES ('24', '50嵐 (北平店)', '', '04-2299-3093', '0', './archive/stores/cover-5f1452c067d01.png', './archive/stores/5f1452c067e73.jpg');
INSERT INTO `store` VALUES ('3', '月湖歐式西餐廳', '招牌豐富商業套餐，含麵包、湯或沙拉、主菜及甜點、飲料。另主廚推薦各式套餐均含開胃菜、麵包、湯、沙拉、主菜及甜點、飲料。又師傅精製甜點，如德式乳酪蛋糕、提拉米蘇等也令人驚豔。', '04-21314568', '200', './archive/cover-5f0842c3c9170.jpeg', './archive/5f0842c3c92a4.jpg');
INSERT INTO `store` VALUES ('4', '炒飯超人', '送餐速度慢 十點前要訂', '04-88959987', '0', './archive/cover-5f0842b7cd104.jpeg', './archive/5efb58b708d93.jpg');
INSERT INTO `store` VALUES ('23', '八方雲集台中昌平店', '鍋貼,水餃,酸辣湯,玉米濃湯,菜肉抄手,紅油抄手,非基改,豆漿,黑豆漿,無糖豆漿,韓式辣味水餃,咖哩水餃,古早味乾麵,特調乾麵,麻醬乾麵,醡醬乾麵,黑芝麻乾麵,生鮮水餃，菜單為示意用，有正確版請幫忙上傳，請幫忙補外送金額', '04-2249-0558', '0', './archive/stores/cover-5f14526fddc26.jpg', './archive/stores/5f14526fdddf5.jpg');
INSERT INTO `store` VALUES ('6', '均一價便當', '老闆算數不好 務必點清楚', '04-88959987', '110', './archive/cover-5f144ef2eb465.jpeg', './archive/5f144ef2eb577.jpg');
INSERT INTO `store` VALUES ('22', '嚴發鐵板便當', '', '', '0', './archive/stores/cover-5f144ae050cea.jpeg', './archive/stores/5f144ae050f4f.jpg');
INSERT INTO `users` VALUES ('1', 'abc', 'abc');
