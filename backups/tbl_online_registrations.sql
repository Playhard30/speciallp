/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : enrollmentlp

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-06 15:27:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_online_registrations`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_online_registrations`;
CREATE TABLE `tbl_online_registrations` (
  `or_id` int(11) NOT NULL AUTO_INCREMENT,
  `admit_type` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `flastname` varchar(50) NOT NULL,
  `ffirstname` varchar(50) NOT NULL,
  `fmiddlename` varchar(50) NOT NULL,
  `fage` varchar(5) DEFAULT NULL,
  `foccupation` varchar(50) DEFAULT NULL,
  `mlastname` varchar(50) NOT NULL,
  `mfirstname` varchar(50) NOT NULL,
  `mmiddlename` varchar(50) NOT NULL,
  `mage` varchar(5) DEFAULT NULL,
  `moccupation` varchar(50) DEFAULT NULL,
  `familyincome` varchar(50) NOT NULL,
  `nosiblings` int(11) NOT NULL,
  `glastname` varchar(50) NOT NULL,
  `gfirstname` varchar(50) NOT NULL,
  `gmiddlename` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `gaddress` varchar(100) NOT NULL,
  `elem` varchar(100) NOT NULL,
  `elemSY` varchar(50) NOT NULL,
  `elemAddress` varchar(100) NOT NULL,
  `hs` varchar(100) NOT NULL,
  `hsSY` varchar(50) NOT NULL,
  `hsAddress` varchar(100) NOT NULL,
  `lastschool` varchar(100) NOT NULL,
  `courseYear` varchar(50) NOT NULL,
  `lastSY` varchar(50) DEFAULT NULL,
  `lastAddress` varchar(100) NOT NULL,
  `acad_year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`or_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_online_registrations
-- ----------------------------
INSERT INTO `tbl_online_registrations` VALUES ('252', 'NEW STUDENT', '7', '1', '1', 'LASTNAME', 'FIRSTNAME', 'MIDDLENAME', 'ADDRESS', '0101-01-01', 'PLACE OF BIRTH', '1', 'RELIGION', 'CITEZENSHIP', 'CV', '09156571059', 'brimara@yahoo.com', 'fathername', 'N/fname', 'mname', '1', 'OCCU', 'LASTNAMEMOTHER', 'NAMEMOTHER', 'MIDDLENAMEMOTHER', '1', 'OCCUMOTHER', 'INCOME', '0', 'GUARDIAN', 'GFIRSNAME', 'GMIDDLENAME', 'RELATIONSHIP', 'GADRESSS', 'ELEM', '20212021', 'ELEMADRESS', 'HIGH', '20212021', 'HIGHADDRESS', 'LASTSCHOOLATTEND', 'LASTSCHOOLATTEND', 'LASTSCHOOLATTEND', 'LASTSCHOOLATTEND', '2018-2019', 'First Semester', 'APPROVED');
INSERT INTO `tbl_online_registrations` VALUES ('253', 'NEW STUDENT', '19', '1', '2', 'gerald', 'gerald', 'gerald', 'gerald', '0101-01-01', 'gerald', '1', 'gerald', 'gerald', 'gerald', 'gerald', 'GERALD@GERALD.COM', 'gerald', 'gerald', 'gerald', 'geral', 'gerald', 'gerald', 'gerald', 'gerald', 'geral', 'gerald', 'gerald', '0', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', 'gerald', '2018-2019', 'First Semester', 'Approved');
