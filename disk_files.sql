/*
Navicat MySQL Data Transfer

Source Server         : hearaindisk
Source Server Version : 50128
Source Host           : localhost:3306
Source Database       : hearaindisk

Target Server Type    : MYSQL
Target Server Version : 50128
File Encoding         : 65001

Date: 2014-05-14 11:39:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for disk_files
-- ----------------------------
DROP TABLE IF EXISTS `disk_files`;
CREATE TABLE `disk_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_nickname` varchar(255) NOT NULL,
  `type` char(255) NOT NULL,
  `time` datetime NOT NULL,
  `public` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `file_size` double NOT NULL,
  `md5` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of disk_files
-- ----------------------------
INSERT INTO `disk_files` VALUES ('74', '5372e2bb4a9b8.jpg', '964849943.jpg', 'jpg', '2014-05-14 11:27:55', '0', 'admin', '82056', '9d14dfa9a01019ce28f6793c1c61d9c3');
INSERT INTO `disk_files` VALUES ('75', '5372e2bb62873.jpg', '9670164034572.jpg', 'jpg', '2014-05-14 11:27:55', '0', 'admin', '622723', 'c416b552f056678d948d3b9375672173');
INSERT INTO `disk_files` VALUES ('68', '5312e2bee0832.jpg', '50d15aba57cbe.jpg', 'jpg', '2014-03-02 15:50:22', '0', 'admin', '309238', 'b030f39cf1be003992d1b72cd90dd921');
INSERT INTO `disk_files` VALUES ('67', '5312e2bec9e49.jpg', '23.jpg', 'jpg', '2014-03-02 15:50:22', '0', 'admin', '317842', '15446d7d374399adbeac50ab91c852db');
INSERT INTO `disk_files` VALUES ('66', '5312e2beb24f3.jpg', '9c0515d25c18d098436499517e0f01b5.jpg', 'jpg', '2014-03-02 15:50:22', '0', 'admin', '198612', 'f8bb84be95f8c6d6db113ea53777aceb');
INSERT INTO `disk_files` VALUES ('69', '5324023b58806.doc', '人力资源社会保障部、教育部、财政部关于做好高校毕业生求职补贴发放工作的通知.doc', 'doc', '2014-03-15 15:33:15', '0', 'admin', '29184', 'f87e653cf25c062474a404a9f2e45513');
INSERT INTO `disk_files` VALUES ('58', '5312e0b33803b.mp3', '张卫健-真英雄.mp3', 'mp3', '2014-03-02 15:41:39', '0', 'admin', '10587512', '3a475dee9eeb7a8d251a84b2fecb1615');
INSERT INTO `disk_files` VALUES ('65', '5312e2be92e8e.jpg', '9c16fdfaaf51f3defce1c5ff94eef01f3b2979dd.jpg', 'jpg', '2014-03-02 15:50:22', '0', 'admin', '299337', '1c516435d47dd48dd2c2890bd0977e7c');
INSERT INTO `disk_files` VALUES ('60', '5312e1a7642c1.mp3', '徐千雅-跟你一辈子.mp3', 'mp3', '2014-03-02 15:45:43', '0', 'admin', '11386749', '48ae44d2840d88b61a0360ceb7bc3346');
INSERT INTO `disk_files` VALUES ('64', '5312e2be7fb72.jpg', '07bd3fef5cc46116acafd59a.jpg', 'jpg', '2014-03-02 15:50:22', '0', 'admin', '203358', 'd482e4f8d5ad9612ae9766c8a74cc0f5');
INSERT INTO `disk_files` VALUES ('62', '5312e1e85c09b.mp3', '小寺可南子-我是爱神.mp3', 'mp3', '2014-03-02 15:46:48', '0', 'admin', '2700852', '2128fc6269e64893ed02c13333d4e7ca');
INSERT INTO `disk_files` VALUES ('63', '5312e234e8d74.mp3', '小寺可南子-银の意志 金の翼.mp3', 'mp3', '2014-03-02 15:48:04', '0', 'admin', '4052845', '644421305f765919a98f7206b169ea38');
INSERT INTO `disk_files` VALUES ('72', '5372e2baea1a9.jpg', '4845745_145121355164_2.jpg', 'jpg', '2014-05-14 11:27:55', '0', 'admin', '242727', '3bc5535a617b42e53aa2137f21a400ff');
INSERT INTO `disk_files` VALUES ('73', '5372e2bb2d725.jpg', '060828381f30e924c90203a84c086e061c95f781.jpg', 'jpg', '2014-05-14 11:27:55', '0', 'admin', '401490', 'a834e29e9cd0c9b78c86eb9d1ac12164');
INSERT INTO `disk_files` VALUES ('70', '5324023b7d659.zip', '太湖学院计算机专业毕业设计任务书.zip', 'zip', '2014-03-15 15:33:15', '0', 'admin', '153085', '54ffe9d8471f62550f184310dd54014b');
INSERT INTO `disk_files` VALUES ('71', '536848945616e.txt', '新建文本文档.txt', 'txt', '2014-05-06 10:27:32', '0', 'admin', '160', '1fcad776776f7193070a9075f2716800');
INSERT INTO `disk_files` VALUES ('41', '52ff29acd069a.jpg', '9670164034572.jpg', 'jpg', '2014-02-15 16:47:40', '0', 'test6', '622723', 'c416b552f056678d948d3b9375672173');
INSERT INTO `disk_files` VALUES ('44', '52ff2e66b6245.jpg', '07bd3fef5cc46116acafd59a.jpg', 'jpg', '2014-02-15 17:07:50', '0', 'test7', '203358', 'd482e4f8d5ad9612ae9766c8a74cc0f5');
INSERT INTO `disk_files` VALUES ('45', '52ff2ef3200b5.txt', '新建文本文档.txt', 'txt', '2014-02-15 17:10:11', '0', 'test7', '160', '1fcad776776f7193070a9075f2716800');
INSERT INTO `disk_files` VALUES ('46', '52ff3916241ae.doc', '客所思外置声卡电音教程.doc', 'doc', '2014-02-15 17:53:26', '0', 'test7', '2585600', '042c80b6c404d2a7c7b9470a862c9219');
INSERT INTO `disk_files` VALUES ('47', '52ff391641281.doc', '人力资源社会保障部、教育部、财政部关于做好高校毕业生求职补贴发放工作的通知.doc', 'doc', '2014-02-15 17:53:26', '0', 'test7', '29184', 'f87e653cf25c062474a404a9f2e45513');
INSERT INTO `disk_files` VALUES ('48', '530039fa63e77.png', 'dummy.png', 'png', '2014-02-16 12:09:30', '0', 'test7', '6043', '07214301b934470e0b26ea78453a5c57');
