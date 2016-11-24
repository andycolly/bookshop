/*
Navicat MySQL Data Transfer

Source Server         : Andycolly Aspire
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : book_sc

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-05-31 12:38:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `isbn` char(17) NOT NULL,
  `author` char(80) DEFAULT NULL,
  `title` char(100) DEFAULT NULL,
  `catid` int(10) unsigned DEFAULT NULL,
  `price` float(4,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cover` text,
  PRIMARY KEY (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('978-7-9999-0001-0', 'JinWYP', '安卓', '2', '25.25', '安卓从入门到转行', 'Android.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0002-0', 'JinWYP', '大数据', '2', '32.24', '大数据从被忽悠到忽悠', 'BigData.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0003-0', 'JinWYP', 'C++', '2', '42.25', 'C++从入门到寻找指针', 'C.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0004-0', 'JinWYP', '需求管理', '2', '56.26', '需求管理从变更到住院', 'DemandControl.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0005-0', 'JinWYP', 'Erlang', '2', '35.27', 'Erlang从入不了门到出不了门', 'Erlang.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0006-0', 'JinWYP', '面相对象', '2', '86.49', '面相对象从入门到充气玩偶选购', 'FaceObj.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0007-0', 'JinWYP', 'FullStack', '2', '76.49', 'FullStack从单身狗到资深单身狗', 'FullStack.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0008-0', 'JinWYP', '黑客技术', '2', '42.56', '黑客技术从入门到入狱', 'Heck.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0009-0', 'JinWYP', 'Java', '2', '46.54', 'Java从入门到捡垃圾', 'Java.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0010-0', 'JinWYP', 'Linux', '2', '56.44', 'Linux从入门到mac选购', 'Linux.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0011-0', 'JinWYP', 'MySQL', '2', '87.93', 'MySQL从删库到跑路', 'MySQL.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0012-0', 'JinWYP', 'Python', '2', '45.78', 'Python从入门到购买游标卡尺', 'Python.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0013-0', '王爱军', '懵式数学', '1', '12.34', '阿三是神,燃起数学的火', 'Math.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0014-0', '人民教育出版社', '高中数学', '1', '23.45', '数学是火,点亮物理的灯', 'Math2.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0015-0', '人民教育出版社', '高中物理', '1', '34.56', '物理是灯,照亮化学的路', 'Physics.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0016-0', '人民教育出版社', '高中化学', '1', '45.67', '化学是路,通向生物的坑', 'Chemistry.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0017-0', '人民教育出版社', '高中生物', '1', '56.78', '生物是坑,埋葬了理科生', 'Biology.jpg');
INSERT INTO `books` VALUES ('978-7-9999-0018-0', '白学家', '白色相簿2', '3', '99.99', '第一次，有了喜欢的人。还得到了一生的挚友，两份喜悦相互重叠。这双重的喜悦又带来了更多更多的喜悦，本应已经得到了梦幻一般的幸福时光。然而，为什么，会变成这样。', 'WhiteAlbum2.jpg');

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `catid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` char(60) NOT NULL,
  `caticon` text,
  `iconcolor` char(7) DEFAULT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '理综学', 'mars', '#1AC3D6');
INSERT INTO `categories` VALUES ('2', '计算机科学', 'mars-double', '#1AC3D6');
INSERT INTO `categories` VALUES ('3', '白学', 'venus-double', '#FD4D4D');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `Orderid` int(10) NOT NULL AUTO_INCREMENT,
  `Uid` int(6) NOT NULL,
  `TotalPrices` float NOT NULL,
  `Time` char(11) NOT NULL,
  `State` int(1) NOT NULL COMMENT '0提交1付款2发货3完成4取消',
  PRIMARY KEY (`Orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('17', '2', '35.79', '1464277162', '0');
INSERT INTO `order` VALUES ('18', '2', '96.26', '1464277200', '1');
INSERT INTO `order` VALUES ('19', '2', '96.26', '1464277747', '2');
INSERT INTO `order` VALUES ('20', '2', '471.54', '1464278107', '3');
INSERT INTO `order` VALUES ('21', '2', '25.25', '1464669218', '0');

-- ----------------------------
-- Table structure for `order_item`
-- ----------------------------
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '没卵用',
  `Orderid` int(10) NOT NULL,
  `isbn` char(17) NOT NULL,
  `price` float NOT NULL,
  `count` int(4) NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_item
-- ----------------------------
INSERT INTO `order_item` VALUES ('1', '17', '978-7-9999-0013-0', '12.34', '1');
INSERT INTO `order_item` VALUES ('2', '17', '978-7-9999-0014-0', '23.45', '1');
INSERT INTO `order_item` VALUES ('3', '18', '978-7-9999-0013-0', '12.34', '4');
INSERT INTO `order_item` VALUES ('4', '18', '978-7-9999-0014-0', '23.45', '2');
INSERT INTO `order_item` VALUES ('5', '19', '978-7-9999-0013-0', '12.34', '4');
INSERT INTO `order_item` VALUES ('6', '19', '978-7-9999-0014-0', '23.45', '2');
INSERT INTO `order_item` VALUES ('7', '20', '978-7-9999-0013-0', '12.34', '2');
INSERT INTO `order_item` VALUES ('8', '20', '978-7-9999-0014-0', '23.45', '2');
INSERT INTO `order_item` VALUES ('9', '20', '978-7-9999-0018-0', '99.99', '4');
INSERT INTO `order_item` VALUES ('10', '21', '978-7-9999-0001-0', '25.25', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Uid` int(6) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `authority` int(1) NOT NULL DEFAULT '0' COMMENT '0 表示一般用户 1表示管理员',
  `address` text,
  `phone` char(11) DEFAULT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', null, null);
INSERT INTO `users` VALUES ('2', 'zhangsan', '202cb962ac59075b964b07152d234b70', '0', '地球56', '1234567895');
INSERT INTO `users` VALUES ('3', 'lisi', '250cf8b51c773f3f8dc8b4be867a9a02', '0', '火星', '10987654321');
