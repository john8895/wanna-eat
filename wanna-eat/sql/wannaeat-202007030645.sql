/*
MySQL Data Transfer
Source Host: localhost
Source Database: wannaeat
Target Host: localhost
Target Database: wannaeat
Date: 2020/7/3 �W�� 06:44:59
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for group_buy
-- ----------------------------
CREATE TABLE `group_buy` (
  `id` int(255) NOT NULL auto_increment,
  `store_name` varchar(255) NOT NULL,
  `store_phone` varchar(200) NOT NULL,
  `group_host` varchar(255) NOT NULL,
  `end_time` datetime NOT NULL,
  `remark` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
  `id` int(255) NOT NULL auto_increment,
  `store_name` varchar(255) NOT NULL,
  `store_phone` varchar(255) NOT NULL,
  `user_orders` varchar(255) default NULL,
  `host_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

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
INSERT INTO `group_buy` VALUES ('1', '炒飯超人', '04-88959987', '張學友', '2020-07-02 12:49:54', '老闆很凶會罵人');
INSERT INTO `group_buy` VALUES ('2', '炒飯超人', '04-88959987', '張學友', '2020-07-02 12:49:54', '老闆很凶會罵人');
INSERT INTO `group_buy` VALUES ('3', '唐奶奶炸雞舖', '04-21314568', '小白', '2020-07-02 12:49:54', '老闆很凶會罵人');
INSERT INTO `group_buy` VALUES ('4', '炒飯超人', '04-88959987', '張學友', '2020-07-02 12:49:54', '老闆很凶會罵人');
INSERT INTO `group_buy` VALUES ('5', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-02 10:30:00', '老闆很凶會罵人');
INSERT INTO `group_buy` VALUES ('6', '老村長佛腩湯', '04-88959987', '阿翰', '2020-07-02 10:30:00', '老闆很凶會罵人');
INSERT INTO `group_buy` VALUES ('7', '均一價便當', '04-88959987', '阿翰', '2020-07-02 10:25:00', '老闆很凶會罵人');
INSERT INTO `group_buy` VALUES ('8', '炒飯超人', '04-88959987', '阿翰', '2020-07-03 10:00:00', '老闆很凶會罵人');
INSERT INTO `group_buy` VALUES ('9', '臭豆腐', '04-12345678', '小白', '2020-07-03 14:00:00', '老闆很凶會罵人');
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
INSERT INTO `store` VALUES ('7', '麥當勞', '好吃 可以推薦', '04-12345678', './archive/5efdbad5dff76.jpg');
INSERT INTO `store` VALUES ('8', '燒臘店', '好吃 可以推薦', '04-88959987', './archive/5efb4e9ea385d.jpg');
INSERT INTO `store` VALUES ('15', '湯媽媽濃湯', '真心推薦 便宜好吃 老闆娘又漂亮！', '24889544', './archive/stores/5efb54e445f4d.webp');
INSERT INTO `users` VALUES ('1', 'abc', 'abc');
