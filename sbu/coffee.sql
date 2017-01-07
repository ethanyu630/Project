-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 
-- 伺服器版本: 5.6.21
-- PHP 版本： 5.6.3
CREATE DATABASE `coffee`;
USE coffee;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- 資料表結構 `salemess`
--

CREATE TABLE IF NOT EXISTS `salemess` (
`編號` int(5) NOT NULL COMMENT '編號',
  `活動日期(起)` date NOT NULL COMMENT '活動日期(起)',
  `活動日期(終)` date NOT NULL COMMENT '活動日期(終)',
  `活動名稱` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '活動名稱',
  `內容` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '內容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `庫存貨品資料表(salegood)`
--

CREATE TABLE IF NOT EXISTS `庫存貨品資料表(salegood)` (
  `goid` int(6) NOT NULL COMMENT '貨品編號(XX為不同規格編號)',
  `gona` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '貨品編號',
  `gosze` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '貨品規格(量,重,尺寸)',
  `gogra` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '貨品圖檔名稱',
  `gopri` tinyint(4) NOT NULL COMMENT '貨品售價',
  `goye` tinyint(4) NOT NULL COMMENT '庫存數量',
  `gosa` tinyint(4) NOT NULL COMMENT '安全存量',
  `goinpa` tinyint(4) NOT NULL COMMENT '貨品進價'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `會員(memli)`
--

CREATE TABLE IF NOT EXISTS `會員(memli)` (
  `uid` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'id',
  `upas` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'pas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `會員基本資料表(membdata)`
--

CREATE TABLE IF NOT EXISTS `會員基本資料表(membdata)` (
  `uid` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '帳號',
  `Upas` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '密碼',
  `Una` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `uidnu` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '身分證號碼',
  `Uya` tinyint(4) NOT NULL COMMENT '年(出生)',
  `Umo` tinyint(4) NOT NULL COMMENT '月',
  `uda` tinyint(4) NOT NULL COMMENT '日',
  `ufri` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '暱稱',
  `Ucity` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '縣市(住址)',
  `Usec` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '鄉鎮市',
  `uaddr` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '地址',
  `Utel` int(10) NOT NULL COMMENT '電話(h)',
  `umote` int(10) NOT NULL COMMENT '行動電話',
  `uemai` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `產品名稱資料表(saleprod)`
--

CREATE TABLE IF NOT EXISTS `產品名稱資料表(saleprod)` (
  `sanu` tinyint(3) NOT NULL COMMENT '產品編號(00~99)',
  `acna` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `進貨商資料表(acepco)`
--

CREATE TABLE IF NOT EXISTS `進貨商資料表(acepco)` (
  `acid` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT '廠商編號(AA~ZZ)',
  `acna` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '廠商名稱',
  `worker` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT '承辦人名稱',
  `job` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '稱職',
  `actel` int(10) NOT NULL COMMENT '電話(0)',
  `acmob` int(10) NOT NULL COMMENT '行動電話',
  `acema` int(60) NOT NULL COMMENT 'email',
  `senday` tinyint(3) NOT NULL COMMENT '送貨天數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `銷售紀錄表`
--

CREATE TABLE IF NOT EXISTS `銷售紀錄表` (
`salesid` tinyint(4) NOT NULL COMMENT '編號',
  `saledate` date NOT NULL COMMENT '日期(系統日期)',
  `saorde` varchar(10) NOT NULL COMMENT '客戶帳號',
  `salegoid` varchar(6) NOT NULL COMMENT '貨物編號',
  `salenu` tinyint(4) NOT NULL COMMENT '貨物數量',
  `salepay` tinyint(4) NOT NULL COMMENT '購物金額',
  `salesend` varchar(20) NOT NULL COMMENT '出貨註記(n)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `salemess`
--
ALTER TABLE `salemess`
 ADD PRIMARY KEY (`編號`);

--
-- 資料表索引 `會員(memli)`
--
ALTER TABLE `會員(memli)`
 ADD PRIMARY KEY (`uid`);

--
-- 資料表索引 `會員基本資料表(membdata)`
--
ALTER TABLE `會員基本資料表(membdata)`
 ADD PRIMARY KEY (`uid`);

--
-- 資料表索引 `產品名稱資料表(saleprod)`
--
ALTER TABLE `產品名稱資料表(saleprod)`
 ADD PRIMARY KEY (`sanu`);

--
-- 資料表索引 `進貨商資料表(acepco)`
--
ALTER TABLE `進貨商資料表(acepco)`
 ADD PRIMARY KEY (`acid`);

--
-- 資料表索引 `銷售紀錄表`
--
ALTER TABLE `銷售紀錄表`
 ADD PRIMARY KEY (`salesid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `salemess`
--
ALTER TABLE `salemess`
MODIFY `編號` int(5) NOT NULL AUTO_INCREMENT COMMENT '編號';
--
-- 使用資料表 AUTO_INCREMENT `銷售紀錄表`
--
ALTER TABLE `銷售紀錄表`
MODIFY `salesid` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '編號';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
