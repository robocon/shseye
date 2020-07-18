/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50713
Source Host           : 127.0.0.1:3306
Source Database       : shseye

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2020-07-18 13:48:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for iop
-- ----------------------------
DROP TABLE IF EXISTS `iop`;
CREATE TABLE `iop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `iopDate` datetime DEFAULT NULL,
  `patientId` int(11) DEFAULT NULL,
  `left` varchar(255) DEFAULT NULL,
  `right` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of iop
-- ----------------------------

-- ----------------------------
-- Table structure for patients
-- ----------------------------
DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `yot` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `hn` varchar(255) DEFAULT NULL,
  `idcard` varchar(255) DEFAULT NULL,
  `congenital` varchar(255) DEFAULT NULL,
  `myopia` varchar(255) DEFAULT NULL,
  `family` varchar(255) DEFAULT NULL,
  `diag` varchar(255) DEFAULT NULL,
  `drugGlaucoma` varchar(255) DEFAULT NULL,
  `retinalDate` datetime DEFAULT NULL,
  `retinalImg` varchar(255) DEFAULT NULL,
  `ctvfDate` datetime DEFAULT NULL,
  `ctvfImg` varchar(255) DEFAULT NULL,
  `octDate` datetime DEFAULT NULL,
  `octImg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of patients
-- ----------------------------
