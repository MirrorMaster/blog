-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-31 02:26:25
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bai_blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `b_adm_in`
--

CREATE TABLE IF NOT EXISTS `b_adm_in` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` char(32) COLLATE utf8_bin NOT NULL,
  `type` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `last_login_ip` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `last_login_time` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `create_time` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `b_adm_in`
--

INSERT INTO `b_adm_in` (`id`, `username`, `password`, `type`, `status`, `last_login_ip`, `last_login_time`, `create_time`, `email`) VALUES
(11, 'admin', '10d1ceb78a4a3b3a59f3692ee9510f76', 1, 1, '127.0.0.1', '1472602431', '1472034858', '1029227712@qq.com'),
(14, 'z', 'f6fd323051812175fe70c588b30c2857', 1, 1, '0', '0', '1472053817', '1028227712@qq.com'),
(15, 'ss', '10d1ceb78a4a3b3a59f3692ee9510f76', 1, 1, '0.0.0.0', '1472135481', '1472055379', '1928227712@qq.com'),
(16, 'aaa', 'f6fd323051812175fe70c588b30c2857', 1, 1, '0', '0', '1472055681', '10202@qq.cc'),
(20, 'user', '10d1ceb78a4a3b3a59f3692ee9510f76', 1, 1, '0.0.0.0', '1472114262', '1472105331', '1028227712@qq.com'),
(21, 'lock', '10d1ceb78a4a3b3a59f3692ee9510f76', 0, 0, '0', '0', '1472114227', '1028227712@qq.com'),
(22, 'zz', '10d1ceb78a4a3b3a59f3692ee9510f76', 0, 1, '0.0.0.0', '1472131891', '1472131882', '1028227712@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `b_con_t_en_t`
--

CREATE TABLE IF NOT EXISTS `b_con_t_en_t` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_bin NOT NULL,
  `create_time` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `b_con_t_en_t`
--

INSERT INTO `b_con_t_en_t` (`id`, `content`, `create_time`) VALUES
(31, '啊啊啊', '1472295570'),
(32, '啊啊啊', '1472295575'),
(33, '啊啊啊', '1472295588'),
(34, '啊啊啊', '1472295590'),
(35, '的', '1472296604'),
(36, '的', '1472304738');

-- --------------------------------------------------------

--
-- 表的结构 `b_essay`
--

CREATE TABLE IF NOT EXISTS `b_essay` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) COLLATE utf8_bin NOT NULL,
  `small_title` varchar(20) COLLATE utf8_bin NOT NULL,
  `thumb` varchar(50) COLLATE utf8_bin NOT NULL,
  `keywords` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` varchar(50) COLLATE utf8_bin NOT NULL,
  `ok` int(1) NOT NULL DEFAULT '0',
  `create_time` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `update_time` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `count` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `b_essay`
--

INSERT INTO `b_essay` (`id`, `title`, `small_title`, `thumb`, `keywords`, `description`, `ok`, `create_time`, `update_time`, `count`) VALUES
(31, '修改文章', '测试', '/blog/upload/2016/08/27/57c1728ba6189.jpg', 'php', '测试', 0, '1472295570', '1472297283', 0),
(32, '测试文章', '测试', '/blog/upload/2016/08/27/57c1728ba6189.jpg', 'php', '测试', 1, '1472295575', '1472295575', 3),
(33, '测试文章', '测试', '/blog/upload/2016/08/27/57c1728ba6189.jpg', 'php', '测试', 1, '1472295588', '1472295588', 1),
(34, '测试文章', '测试', '/blog/upload/2016/08/27/57c1728ba6189.jpg', 'php', '测试', 1, '1472295590', '1472295590', 1),
(35, '修改文章123', '阿萨德', '0', 'php', '的', 0, '1472296604', '1472297321', 8),
(36, '的', '的', '0', 'php', '的', 0, '1472304738', '1472304738', 1);

-- --------------------------------------------------------

--
-- 表的结构 `b_k_ey`
--

CREATE TABLE IF NOT EXISTS `b_k_ey` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `create_name` varchar(5) NOT NULL,
  `create_time` varchar(10) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `b_k_ey`
--

INSERT INTO `b_k_ey` (`id`, `name`, `create_name`, `create_time`, `status`) VALUES
(15, 'js', 'admin', '1472097817', 0),
(16, 'php', 'admin', '1472114247', 1);

-- --------------------------------------------------------

--
-- 表的结构 `b_m_enu`
--

CREATE TABLE IF NOT EXISTS `b_m_enu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `c` varchar(20) CHARACTER SET latin1 NOT NULL,
  `f` varchar(20) CHARACTER SET latin1 NOT NULL,
  `type` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `icon` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `b_m_enu`
--

INSERT INTO `b_m_enu` (`id`, `name`, `c`, `f`, `type`, `status`, `icon`) VALUES
(6, '用户管理', 'user', 'sel', 1, 1, 'user'),
(12, '前端关键字', 'key', 'index', 1, 1, 'link'),
(17, '数据库备份', 'cron', 'index', 0, 1, 'floppy-disk'),
(18, '后台菜单', 'menu', 'index', 1, 1, 'list'),
(19, '站点配置', 'site', 'index', 0, 1, 'pencil'),
(20, '文章管理', 'essay', 'index', 1, 1, 'book'),
(22, '推荐位管理', 'essay', 'position', 1, 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
