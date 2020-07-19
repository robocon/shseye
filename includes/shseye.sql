/*
Navicat MySQL Data Transfer

Source Server         : LocalPort80
Source Server Version : 50560
Source Host           : localhost:3306
Source Database       : shseye

Target Server Type    : MYSQL
Target Server Version : 50560
File Encoding         : 65001

Date: 2020-07-19 14:48:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for iop
-- ----------------------------
DROP TABLE IF EXISTS `iop`;
CREATE TABLE `iop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `iopDate` date DEFAULT NULL,
  `patientId` int(11) DEFAULT NULL,
  `treatmentId` int(11) DEFAULT NULL,
  `left` varchar(255) DEFAULT NULL,
  `right` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

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
  `age` int(11) DEFAULT NULL,
  `congenital` varchar(255) DEFAULT NULL,
  `myopia` varchar(255) DEFAULT NULL,
  `family` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for treatment
-- ----------------------------
DROP TABLE IF EXISTS `treatment`;
CREATE TABLE `treatment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patientId` int(11) DEFAULT NULL,
  `dateTreatment` datetime DEFAULT NULL,
  `diag` varchar(255) DEFAULT NULL,
  `drugGlaucoma` varchar(255) DEFAULT NULL,
  `retinalDate` date DEFAULT NULL,
  `retinalImg` varchar(255) DEFAULT NULL,
  `ctvfDate` date DEFAULT NULL,
  `ctvfImg` varchar(255) DEFAULT NULL,
  `octDate` date DEFAULT NULL,
  `octImg` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
