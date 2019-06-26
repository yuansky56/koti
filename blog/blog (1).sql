-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-06-26 05:27:23
-- 服务器版本： 5.6.17
-- PHP 版本： 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `aid` tinyint(3) UNSIGNED NOT NULL COMMENT '管理员主键',
  `aemail` varchar(20) NOT NULL COMMENT '管理员邮箱',
  `aword` varchar(32) NOT NULL COMMENT '管理员密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`aid`, `aemail`, `aword`) VALUES
(1, '757034203@qq.com', '9fc40ed9d72c1a07ec4881ffcdf56f90');

-- --------------------------------------------------------

--
-- 表的结构 `art`
--

CREATE TABLE `art` (
  `aid` int(10) UNSIGNED NOT NULL COMMENT '文章自增长主键',
  `atitle` varchar(50) NOT NULL COMMENT '文章标题',
  `acontent` mediumblob NOT NULL COMMENT '文章内容',
  `abstract` varchar(500) NOT NULL COMMENT '文章摘要',
  `afilename` varchar(40) DEFAULT NULL COMMENT '静态文件名',
  `ishot` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否热度文章',
  `atime` int(11) NOT NULL COMMENT '文章发布时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

--
-- 转存表中的数据 `art`
--

INSERT INTO `art` (`aid`, `atitle`, `acontent`, `abstract`, `afilename`, `ishot`, `atime`) VALUES
(9328, 'phpz', 0x266c743b702667743be998bfe890a8e5a4a7e698afe5a4a7266c743b2f702667743b, '阿萨大是大', './Public/Art/art_9328.html', 0, 1561502358),
(9329, 'phpz', 0x266c743b702667743be5a5a5e69cafe5a4a7e5b888266c743b2f702667743b, '奥术大师', './Public/Art/art_9329.html', 0, 1561502428),
(9330, '奥术大师', 0x266c743b702667743be998bfe890a8e5a4a7e698afe5a4a7266c743b2f702667743b, '阿达', './Public/Art/art_9330.html', 0, 1561502524),
(9331, '奥术大师', 0x266c743b702667743be69292e5a4a7e5a3b0e59cb0266c743b2f702667743b, '奥术大师', './Public/Art/art_9331.html', 0, 1561502577),
(9332, 'sdas', 0x266c743b702667743b617364617364266c743b2f702667743b, 'asdasd', './Public/Art/art_9332.html', 0, 1561502891),
(9333, 'asdasd1', 0x266c743b702667743b617364617364266c743b2f702667743b, 'asdasd', './Public/Art/art_9333.html', 0, 1561502933),
(9334, 'asdasd', 0x266c743b702667743b617364617364266c743b2f702667743b, 'asdasd', './Public/Art/art_9334.html', 0, 1561506106),
(9335, 'asdas', 0x266c743b702667743b617364617364266c743b2f702667743b, 'asdasd', './Public/Art/art_9335.html', 0, 1561506327),
(9336, 'sad', 0x266c743b702667743b6173647361266c743b2f702667743b, 'asd', './Public/Art/art_9336.html', 0, 1561506397),
(9337, 'asd', 0x266c743b702667743b617364266c743b2f702667743b, 'asdas', './Public/Art/art_9337.html', 0, 1561506450),
(9338, 'asdas', 0x266c743b702667743b6173646173266c743b2f702667743b, 'sadasd', './Public/Art/art_9338.html', 0, 1561506474),
(9339, 'asdas', 0x266c743b702667743b6173646173266c743b2f702667743b, 'sadas', './Public/Art/art_9339.html', 0, 1561506580),
(9340, 'safas', 0x266c743b702667743b617366266c743b2f702667743b, 'asfasf', './Public/Art/art_9340.html', 0, 1561506611),
(9341, 'asfas', 0x266c743b702667743b736164736164266c743b2f702667743b, 'asdasd', './Public/Art/art_9341.html', 0, 1561507192),
(9342, 'asdasd', 0x266c743b702667743b617364736164266c743b2f702667743b, 'asdsad', './Public/Art/art_9342.html', 0, 1561507265),
(9343, 'dsfsdf', 0x266c743b702667743b7364666473266c743b2f702667743b, 'sdfsdf', './Public/Art/art_9343.html', 0, 1561507298),
(9344, 'sadasd', 0x266c743b702667743be998bfe890a8e5a4a7e698afe5a4a7266c743b2f702667743b, '阿萨大是大', './Public/Art/art_9344.html', 0, 1561517408),
(9345, '奥术大师', 0x266c743b702667743be69292e68993e7ae97266c743b2f702667743b, '撒打算', './Public/Art/art_9345.html', 0, 1561517476);

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aemail` (`aemail`);

--
-- 表的索引 `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`aid`) USING BTREE,
  ADD UNIQUE KEY `afilename` (`afilename`),
  ADD KEY `ishot` (`ishot`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理员主键', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `art`
--
ALTER TABLE `art`
  MODIFY `aid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文章自增长主键', AUTO_INCREMENT=9346;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
