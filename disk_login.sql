/*
Navicat MySQL Data Transfer

Source Server         : hearaindisk
Source Server Version : 50128
Source Host           : localhost:3306
Source Database       : hearaindisk

Target Server Type    : MYSQL
Target Server Version : 50128
File Encoding         : 65001

Date: 2014-05-14 11:39:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for disk_login
-- ----------------------------
DROP TABLE IF EXISTS `disk_login`;
CREATE TABLE `disk_login` (
  `user_name` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of disk_login
-- ----------------------------
INSERT INTO `disk_login` VALUES ('admin', '123456');
INSERT INTO `disk_login` VALUES ('test', '111');
INSERT INTO `disk_login` VALUES ('test1', '1234');
INSERT INTO `disk_login` VALUES ('test2', '123');
INSERT INTO `disk_login` VALUES ('test3', '123');
INSERT INTO `disk_login` VALUES ('test5', '123');
INSERT INTO `disk_login` VALUES ('test6', '123');
INSERT INTO `disk_login` VALUES ('test7', '123');
