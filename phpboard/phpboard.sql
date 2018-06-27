-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Oct 16, 2008, 12:37 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `phpboard`
--

-- --------------------------------------------------------

--
-- 資料表格式： `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `passwd` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `admin`
--

INSERT INTO `admin` (`username`, `passwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- 資料表格式： `board`
--

CREATE TABLE IF NOT EXISTS `board` (
  `boardid` int(11) unsigned NOT NULL auto_increment,
  `boardname` varchar(50) collate utf8_unicode_ci default NULL,
  `boardsex` enum('男','女') collate utf8_unicode_ci default '男',
  `boardsubject` varchar(100) collate utf8_unicode_ci default NULL,
  `boardtime` datetime default NULL,
  `boardmail` varchar(100) collate utf8_unicode_ci default NULL,
  `boardweb` varchar(100) collate utf8_unicode_ci default NULL,
  `boardcontent` text collate utf8_unicode_ci,
  PRIMARY KEY  (`boardid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- 列出以下資料庫的數據： `board`
--

INSERT INTO `board` (`boardid`, `boardname`, `boardsex`, `boardsubject`, `boardtime`, `boardmail`, `boardweb`, `boardcontent`) VALUES
(1, '茶米', '男', '這是第一則留言', '2008-10-16 11:25:30', 'david@e-happy.com.tw', 'http://www.e-happy.com.tw', '這是茶米的第一則留言！'),
(2, 'Lily', '女', '好棒喔，真不錯。', '2008-10-16 11:27:30', 'lily@e-happy.com.tw', '', '我也很喜歡這個留言版！'),
(3, '路人甲', '男', '我也來加油', '2008-10-16 11:36:51', '', 'http://www.e-happy.com.tw', '路過，我也來加油喔！\r\n灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水灌水。'),
(4, '路人乙', '男', '我也要學！', '2008-10-16 11:38:23', '', '', '請問這個程式很難嗎？\r\n我也好想學喔！'),
(5, '學員A', '女', '好漂亮的留言版', '2008-10-16 11:39:47', '', '', '這個留言版好漂亮喔！'),
(6, '學員B', '女', '這是我第一次留言', '2008-10-16 11:40:25', '', '', '這是我第一次留言，\r\n希望大家多多指教。'),
(7, '茶米', '男', '感謝大家的測試！', '2008-10-16 11:47:12', 'david@e-happy.com.tw', 'http://www.e-happy.com.tw', '感謝大家的測試！\r\n也希望大家多多棒場。');
