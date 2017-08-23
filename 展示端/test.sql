-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 08 月 23 日 12:23
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `sqltest`
--

CREATE TABLE IF NOT EXISTS `sqltest` (
  `id` int(4) NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `age` int(4) NOT NULL,
  `sex` varchar(5) CHARACTER SET utf8 NOT NULL,
  `password` varchar(10) CHARACTER SET utf8 NOT NULL,
  `phone` int(4) NOT NULL,
  `money` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `sqltest`
--

INSERT INTO `sqltest` (`id`, `name`, `age`, `sex`, `password`, `phone`, `money`) VALUES
(1, 'WangSu', 19, 'Man', '99766a45', 87653204, 500000),
(2, 'Ziwen', 19, 'Man', '123456ziwe', 88786530, 1000000),
(3, '李总', 27, 'Woman', 'TAIZIUUU&', 0, 10000),
(4, '刘董', 30, 'Man', 'ILOVEXXX', 0, 90000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
