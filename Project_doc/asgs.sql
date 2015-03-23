-- phpMyAdmin SQL Dump
-- version 2.6.2-pl1
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Dec 06, 2005, 01:48 AM
-- 伺服器版本: 4.1.12
-- PHP 版本: 5.0.4
-- 
-- 資料庫: `asgs`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `account`
-- 

CREATE TABLE `account` (
  `id` char(20) NOT NULL default '',
  `password` char(20) NOT NULL default '',
  `power` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `account`
-- 

INSERT INTO `account` VALUES ('s4598000', '1234', 1);
INSERT INTO `account` VALUES ('s4598001', '1234', 1);
INSERT INTO `account` VALUES ('teacher1', '1234', 2);
INSERT INTO `account` VALUES ('teacher2', '1234', 2);
INSERT INTO `account` VALUES ('teacher3', '1234', 2);
INSERT INTO `account` VALUES ('s4598002', '1234', 1);
INSERT INTO `account` VALUES ('admin', 'orz', 3);

-- --------------------------------------------------------

-- 
-- 資料表格式： `course`
-- 

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL default '0',
  `course_name` varchar(30) character set big5 NOT NULL default '',
  `course_doc` text character set big5 NOT NULL,
  PRIMARY KEY  (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `course`
-- 

INSERT INTO `course` VALUES (0, '影像處理', '影像處理');
INSERT INTO `course` VALUES (1, 'oop', 'oop');
INSERT INTO `course` VALUES (2, 'se', 'se');
INSERT INTO `course` VALUES (3, '無線網路', '無線網路');

-- --------------------------------------------------------

-- 
-- 資料表格式： `course_member`
-- 

CREATE TABLE `course_member` (
  `course_id` int(11) NOT NULL default '0',
  `member_id` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`course_id`,`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `course_member`
-- 

INSERT INTO `course_member` VALUES (0, 's4598000');
INSERT INTO `course_member` VALUES (0, 's4598001');
INSERT INTO `course_member` VALUES (0, 's4598002');
INSERT INTO `course_member` VALUES (0, 'teacher1');
INSERT INTO `course_member` VALUES (1, 's4598000');
INSERT INTO `course_member` VALUES (1, 's4598001');
INSERT INTO `course_member` VALUES (1, 'teacher2');
INSERT INTO `course_member` VALUES (2, 's4598001');
INSERT INTO `course_member` VALUES (2, 'teacher3');

-- --------------------------------------------------------

-- 
-- 資料表格式： `hw`
-- 

CREATE TABLE `hw` (
  `hw_id` int(11) NOT NULL default '0',
  `course_id` int(11) NOT NULL default '0',
  `hw_name` varchar(20) character set big5 NOT NULL default '',
  `hw_doc` text character set big5 NOT NULL,
  `deadline` int(11) NOT NULL default '0',
  PRIMARY KEY  (`hw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `hw`
-- 

INSERT INTO `hw` VALUES (1, 0, 'hw2', 'exprience', 978192000);
INSERT INTO `hw` VALUES (2, 1, 'hw1', 'C++', 978192000);
INSERT INTO `hw` VALUES (4, 2, 'hw1', 'srs', 0);
INSERT INTO `hw` VALUES (5, 2, 'hw2', 'hw2', 0);
INSERT INTO `hw` VALUES (6, 0, '數字辨識', '辨識課程', 1112630400);
INSERT INTO `hw` VALUES (7, 0, '作業五', '作業五', 1115308800);
INSERT INTO `hw` VALUES (8, 0, '作業7', '作業七', 1135958400);
INSERT INTO `hw` VALUES (9, 0, '作業十', '作業十', 1136044800);
INSERT INTO `hw` VALUES (10, 0, 'hw11', 'hw11', 1112803200);
INSERT INTO `hw` VALUES (11, 0, '測試5', '測試5', 1141401600);
INSERT INTO `hw` VALUES (12, 3, 'hw1', 'test', 1135958400);

-- --------------------------------------------------------

-- 
-- 資料表格式： `hw_info`
-- 

CREATE TABLE `hw_info` (
  `hw_id` int(11) NOT NULL default '0',
  `member_id` varchar(20) NOT NULL default '',
  `filename` varchar(50) character set big5 NOT NULL default '',
  `grade` int(11) NOT NULL default '-1',
  `due_doc` text character set big5 NOT NULL,
  `up_time` int(11) NOT NULL default '0',
  PRIMARY KEY  (`hw_id`,`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `hw_info`
-- 

INSERT INTO `hw_info` VALUES (1, 's4598000', 'test3.cpp', -1, 'test3', 0);
INSERT INTO `hw_info` VALUES (2, 's4598000', 'test4.cpp', -1, 'test4', 0);
INSERT INTO `hw_info` VALUES (4, 's4598001', 'yg.htm', -1, 'test', 0);

-- --------------------------------------------------------

-- 
-- 資料表格式： `student_information`
-- 

CREATE TABLE `student_information` (
  `id` varchar(20) NOT NULL default '',
  `name` varchar(20) character set big5 NOT NULL default '',
  `class` varchar(20) character set big5 NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `student_information`
-- 

INSERT INTO `student_information` VALUES ('s4598000', 'Jordan', '1A');
INSERT INTO `student_information` VALUES ('s4598001', 'Mary', '2C');
INSERT INTO `student_information` VALUES ('s4598002', '王同學', '2A');

-- --------------------------------------------------------

-- 
-- 資料表格式： `teacher_information`
-- 

CREATE TABLE `teacher_information` (
  `id` varchar(20) NOT NULL default '',
  `name` varchar(20) character set big5 NOT NULL default '',
  `position` text character set big5 NOT NULL,
  `background` text character set big5 NOT NULL,
  `reserach` text character set big5 NOT NULL,
  `office` varchar(20) character set big5 NOT NULL default '',
  `website` varchar(50) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `teacher_information`
-- 

INSERT INTO `teacher_information` VALUES ('teacher1', 'Mark', 'professor', 'National Taiwan university', 'Software testing', 'D313', 'http://', 'xxx@xxx.com.edu.tw');
INSERT INTO `teacher_information` VALUES ('teacher2', 'Jenny', 'associate professor', 'National Taiwan university', 'Data mining', 'F312', 'http://', 'xxx@xxx.com.edu.tw');
INSERT INTO `teacher_information` VALUES ('teacher3', '張老師', '副教授', '台灣大學', '軟體工程', 'F100', 'http://xxx.com', 'xxx@ntut.edu.tw');
