/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50556
Source Host           : localhost:3306
Source Database       : cmmb2

Target Server Type    : MYSQL
Target Server Version : 50556
File Encoding         : 65001

Date: 2018-03-16 21:36:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for announcement
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateupload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_type` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of announcement
-- ----------------------------
INSERT INTO `announcement` VALUES ('140', '2018-03-15 16:36:21', 'arlene', 'Office of the Student Affair and Service(OSAS)', 'Post 1', 'text', '2018-03-03', '2018-03-31');
INSERT INTO `announcement` VALUES ('142', '2018-03-15 18:39:07', 'gjaak', 'College of Hotel Management and Tourism (CHMT)', 'vid.mp4', 'video', '2018-03-03', '2018-03-31');
INSERT INTO `announcement` VALUES ('144', '2018-03-15 18:40:19', 'apple', 'College of Industrial Technology (CIT)', 'img.jpg', 'image', '2018-03-03', '2018-03-31');
INSERT INTO `announcement` VALUES ('146', '2018-03-15 16:36:36', 'apple', 'College of Business Management and Accountancy (CBMA)', 'Post 5', 'text', '2018-03-03', '2018-03-31');
INSERT INTO `announcement` VALUES ('147', '2018-03-15 16:36:40', 'apple', 'College of Arts and Sciences (CAS)', 'Post 6', 'text', '2018-03-04', '2018-03-31');
INSERT INTO `announcement` VALUES ('148', '2018-03-15 16:36:44', 'arlene', 'Registrar Office', 'Post 7', 'text', '2018-03-10', '2018-03-31');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'arlene', 'arlenekaye.aguila@gmail.com', '1f45f0bd8dcc7aa1b0e83b353b284b4a');
