/*
MySQL Data Transfer
Source Host: localhost
Source Database: wannaeat
Target Host: localhost
Target Database: wannaeat
Date: 2020/7/2 �U�� 01:10:33
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for group_buy
-- ----------------------------
CREATE TABLE `group_buy` (
  `group_id` int(255) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) NOT NULL,
  `store_phone` varchar(200) NOT NULL,
  `group_host` varchar(255) NOT NULL,
  `end_time` datetime NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hosts
-- ----------------------------
CREATE TABLE `hosts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `host_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
CREATE TABLE `orders` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) NOT NULL,
  `store_phone` varchar(255) NOT NULL,
  `user_orders` varchar(255) DEFAULT NULL,
  `host_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

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
INSERT INTO `group_buy` VALUES ('1', '湯媽媽炸雞店', '04-22114454', '張學友', '2020-07-02 12:49:54', null);
INSERT INTO `group_buy` VALUES ('2', '臭豆腐', '04-12345678', '阿翰', '2020-07-02 12:49:54', '老闆很凶會罵人');
INSERT INTO `hosts` VALUES ('1', '阿翰');
INSERT INTO `hosts` VALUES ('2', '小白');
INSERT INTO `hosts` VALUES ('3', '張學友');
INSERT INTO `orders` VALUES ('1', '炒飯超人', '04-88959987', '[{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60},{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60},{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60}]', '');
INSERT INTO `orders` VALUES ('2', '炒飯超人', '04-88959987', '[{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60},{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60},{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60},{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60},{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60},{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60}]', '');
INSERT INTO `orders` VALUES ('3', '臭豆腐', '04-12345678', '[{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60},{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60}]', '');
INSERT INTO `orders` VALUES ('4', '炒飯超人', '04-88959987', '[{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60},{\"name\":\"小毛\",\"meal\":\"雞排飯\",\"price\":60}]', '');
INSERT INTO `orders` VALUES ('5', '炒飯超人', '04-88959987', '[{\"name\":\"阿翰\",\"meal\":\"排骨飯\",\"price\":80}]', '');
INSERT INTO `orders` VALUES ('6', '炒飯超人', '04-88959987', '{\"name\":\"\",\"price\":null}', '');
INSERT INTO `store` VALUES ('2', '老村長佛腩湯', '老闆很凶會罵人', '04-88959987', './archive/5ef203b2d9455.jpg');
INSERT INTO `store` VALUES ('3', '唐奶奶炸雞舖', '老闆很凶會罵人', '04-21314568', './archive/5efb5a0fb305e.jpg');
INSERT INTO `store` VALUES ('4', '炒飯超人', '送餐速度慢 十點前要訂', '04-88959987', './archive/5efb58b708d93.jpg');
INSERT INTO `store` VALUES ('5', '臭豆腐', '下雨絕對不要訂', '04-12345678', './archive/5efb4eabcfc61.jpg');
INSERT INTO `store` VALUES ('6', '均一價便當', '老闆算數不好 務必點清楚', '04-88959987', './archive/5efb4e7bd935b.webp');
INSERT INTO `store` VALUES ('7', '麥當勞', '好吃 可以推薦', '04-12345678', '');
INSERT INTO `store` VALUES ('8', '燒臘店', '好吃 可以推薦', '04-88959987', './archive/5efb4e9ea385d.jpg');
INSERT INTO `store` VALUES ('15', '湯媽媽濃湯', '真心推薦 便宜好吃 老闆娘又漂亮！', '24889544', './archive/stores/5efb54e445f4d.webp');
INSERT INTO `users` VALUES ('1', 'abc', 'abc');
