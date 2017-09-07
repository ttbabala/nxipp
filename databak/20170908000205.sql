/*
MySQL Database Backup Tools
Server:127.0.0.1:3306
Database:nxipp
Data:2017-09-08 00:02:05
*/
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `aid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `article_author` varchar(60) NOT NULL DEFAULT '系统管理员' COMMENT '文章作者',
  `article_pid` int(7) NOT NULL COMMENT '发布者ID',
  `article_keywords` char(200) NOT NULL DEFAULT '',
  `article_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '文章发布的时间',
  `article_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新的时间',
  `article_content` longtext CHARACTER SET utf16le NOT NULL COMMENT '文章内容',
  `article_title` char(60) NOT NULL COMMENT '文章标题',
  `article_excerpt` char(120) NOT NULL COMMENT '文章摘要',
  `article_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1代表可见，0代表不可见',
  `article_comment` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1代表开启评论，0代表不开启评论',
  `cid` int(3) NOT NULL DEFAULT '0' COMMENT '所属分类id',
  `article_photo` varchar(150) NOT NULL DEFAULT '',
  `comment_count` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` (`aid`,`article_author`,`article_pid`,`article_keywords`,`article_date`,`article_date_gmt`,`article_content`,`article_title`,`article_excerpt`,`article_status`,`article_comment`,`cid`,`article_photo`,`comment_count`) VALUES ('3','admin','1','测试，文章','2017-08-14 22:27:40','2017-08-30 11:17:07','<p>这是一篇修改后的测试文章，大家拭目以待吧！！！！</p>','修改后的测试文章','测试文章','1','1','36','http://localhost/nxipp/public/uploads/article/20170830/cacc72a15a707a226a654493e9e11241.jpg','20');
INSERT INTO `article` (`aid`,`article_author`,`article_pid`,`article_keywords`,`article_date`,`article_date_gmt`,`article_content`,`article_title`,`article_excerpt`,`article_status`,`article_comment`,`cid`,`article_photo`,`comment_count`) VALUES ('6','sdfs','1','sdfs','2017-08-15 18:05:05','2017-08-30 11:19:02','<p>asdfsafsafsfsafsdafsfsfdsfdsfsdfsfsfasfsdfssafafdsafsafsa</p>','sdfsdf','sdfsdfsdf','1','1','41','http://localhost/nxipp/public/uploads/article/20170830/c3d632d6b9c825504dc89389527bb8cf.jpg','20');
INSERT INTO `article` (`aid`,`article_author`,`article_pid`,`article_keywords`,`article_date`,`article_date_gmt`,`article_content`,`article_title`,`article_excerpt`,`article_status`,`article_comment`,`cid`,`article_photo`,`comment_count`) VALUES ('42','sdfsf','1','sfdaf','2017-08-31 17:30:37','2017-08-31 17:38:12','<p>asfdafsgsfdsafsf</p>','sfsfsf','sdfsf','1','1','30','http://localhost/nxipp/public/uploads/article/20170831/1ca2ef1e77b48de181f07c4cd822771a.gif','20');
INSERT INTO `article` (`aid`,`article_author`,`article_pid`,`article_keywords`,`article_date`,`article_date_gmt`,`article_content`,`article_title`,`article_excerpt`,`article_status`,`article_comment`,`cid`,`article_photo`,`comment_count`) VALUES ('48','dsfsfsf','1','sdfsdfs','2017-08-31 19:27:49','2017-08-31 19:27:49','<p><img src="/nxipp/upload/image/20170831/1504178776122438.gif" title="1504178776122438.gif" alt="timg.gif"/>sdfsfsfsfsfsd</p><p>sdfsdfsdfdsfsdfs</p><p><img src="/nxipp/upload/image/20170831/1504178856121913.jpg" title="1504178856121913.jpg" alt="u=1744987414,2392832020&amp;fm=26&amp;gp=0.jpg"/>dfs</p><p><img src="/nxipp/upload/image/20170831/1504178862976348.jpg" title="1504178862976348.jpg" alt="u=2884761700,4268854800&amp;fm=26&amp;gp=0.jpg"/></p>','dsfdsfsd','sfsafdsfsfsa','1','1','36','http://localhost/nxipp/public/uploads/article/20170831/b1d609f8dce079ddd8ea7e5ba6db9d13.jpg','20');

-- ----------------------------
-- Table structure for auth_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of auth_group
-- ----------------------------
INSERT INTO `auth_group` (`id`,`title`,`status`,`rules`) VALUES ('1','超级管理员','1','2,1,3,4,5,6,39');
INSERT INTO `auth_group` (`id`,`title`,`status`,`rules`) VALUES ('2','普通管理员','1','1,3');

-- ----------------------------
-- Table structure for auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_access`;
CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of auth_group_access
-- ----------------------------
INSERT INTO `auth_group_access` (`uid`,`group_id`) VALUES ('1','1');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('2','User-userlist','用户管理首页','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('1','Index-index','后台管理首页','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('3','Article-articleList','作品管理首页','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('4','Cats-index','作品分类管理首页','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('5','System-index','系统设置','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('6','Notice-index','公告管理首页','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('38','Article-addArticle','添加作品','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('36','User-delUser','删除用户','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('37','User-editUser','编辑用户','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('34','User-addUser','添加用户','1','1','');
INSERT INTO `auth_rule` (`id`,`name`,`title`,`type`,`status`,`condition`) VALUES ('39','Article-editArticle','编辑作品','1','1','');

-- ----------------------------
-- Table structure for cats
-- ----------------------------
DROP TABLE IF EXISTS `cats`;
CREATE TABLE `cats` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL DEFAULT '0' COMMENT '父ID',
  `isshow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否首页显示  0:隐藏 1:显示',
  `catname` varchar(20) NOT NULL COMMENT '分类名称',
  `catsort` int(11) NOT NULL DEFAULT '0' COMMENT '排序号',
  `catflag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '删除标志   1:有效 -1：删除',
  `isfloor` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否首页显示楼层/分页    0:不显示 1:显示',
  `img` varchar(255) DEFAULT NULL COMMENT '分类图片',
  PRIMARY KEY (`catid`),
  KEY `parentId` (`parentid`,`isshow`,`catflag`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='作品分类表';
-- ----------------------------
-- Records of cats
-- ----------------------------
INSERT INTO `cats` (`catid`,`parentid`,`isshow`,`catname`,`catsort`,`catflag`,`isfloor`,`img`) VALUES ('1','0','0','原创新闻作品','0','1','0','');
INSERT INTO `cats` (`catid`,`parentid`,`isshow`,`catname`,`catsort`,`catflag`,`isfloor`,`img`) VALUES ('2','0','0','原创广告作品','0','1','0','');
INSERT INTO `cats` (`catid`,`parentid`,`isshow`,`catname`,`catsort`,`catflag`,`isfloor`,`img`) VALUES ('30','1','1','文字作品','1','1','0','');
INSERT INTO `cats` (`catid`,`parentid`,`isshow`,`catname`,`catsort`,`catflag`,`isfloor`,`img`) VALUES ('36','2','0','文字作品','0','1','0','');
INSERT INTO `cats` (`catid`,`parentid`,`isshow`,`catname`,`catsort`,`catflag`,`isfloor`,`img`) VALUES ('41','2','1','图片作品','0','1','0','');

-- ----------------------------
-- Table structure for columns
-- ----------------------------
DROP TABLE IF EXISTS `columns`;
CREATE TABLE `columns` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT '模块ID',
  `name` varchar(60) NOT NULL COMMENT '模块名称',
  `controllerName` varchar(30) NOT NULL COMMENT '控制器名称',
  `functionName` char(200) DEFAULT NULL,
  `sort` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='后台模块表';
-- ----------------------------
-- Records of columns
-- ----------------------------
INSERT INTO `columns` (`id`,`name`,`controllerName`,`functionName`,`sort`) VALUES ('1','系统设置','System','index','1');
INSERT INTO `columns` (`id`,`name`,`controllerName`,`functionName`,`sort`) VALUES ('2','公告管理','Notice','index','1');
INSERT INTO `columns` (`id`,`name`,`controllerName`,`functionName`,`sort`) VALUES ('3','用户列表','User','userList,addUser,editUser,delUser','1');
INSERT INTO `columns` (`id`,`name`,`controllerName`,`functionName`,`sort`) VALUES ('5','作品列表','Article','articleList,addArticle,editArticle,delArticle','1');
INSERT INTO `columns` (`id`,`name`,`controllerName`,`functionName`,`sort`) VALUES ('6','作品分类','Cats','index','2');
INSERT INTO `columns` (`id`,`name`,`controllerName`,`functionName`,`sort`) VALUES ('7','模块列表','Columns','index','2');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `cid` int(10) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `aid` bigint(20) unsigned NOT NULL COMMENT '文章id',
  `ctext` varchar(400) NOT NULL COMMENT '评论内容',
  `mid` int(7) NOT NULL COMMENT '评论会员id',
  `mip` varchar(16) NOT NULL,
  `date` datetime NOT NULL COMMENT '评论发布时间',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为可见，0为不可见',
  `review` tinyint(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`cid`),
  KEY `aid` (`aid`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` (`cid`,`aid`,`ctext`,`mid`,`mip`,`date`,`isshow`,`review`) VALUES ('2','3','大牛！赞赞赞','13','127.0.0.1','2017-08-28 14:20:07','1','1');

-- ----------------------------
-- Table structure for fliterip
-- ----------------------------
DROP TABLE IF EXISTS `fliterip`;
CREATE TABLE `fliterip` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为启用，2为停用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of fliterip
-- ----------------------------

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `mid` int(7) NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `headpic` char(200) DEFAULT NULL COMMENT '会员头像',
  `mname` varchar(32) NOT NULL COMMENT '会员用户名',
  `pass` varchar(60) NOT NULL COMMENT '会员密码',
  `email` varchar(40) NOT NULL COMMENT '会员email',
  `register_time` datetime NOT NULL COMMENT '注册时间',
  `gmt_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `gmt_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为正常，0为锁定',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` (`mid`,`headpic`,`mname`,`pass`,`email`,`register_time`,`gmt_time`,`gmt_ip`,`status`) VALUES ('12','http://localhost/nxipp/public/uploads/headpic/20170831/94a855136202c2751656ee465accf361.jpg','zhangxuefeng','c9cf1af4b8c675e336c38652ec8eb776','xuefeng@216.com','2017-08-27 17:22:20','2017-08-29 00:37:50','127.0.0.1','1');
INSERT INTO `members` (`mid`,`headpic`,`mname`,`pass`,`email`,`register_time`,`gmt_time`,`gmt_ip`,`status`) VALUES ('13','http://localhost/nxipp/public/uploads/headpic/20170829/9886884dbbacc2876cea5eda9e6ed7f4.jpg','wanglu','4f529938968a28a665a534f0d9a48cbc','wanglu@126.com','2017-08-29 17:22:59','2017-08-30 00:38:19','127.0.0.1','1');

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '公告id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `excerpt` char(120) NOT NULL COMMENT '公告摘要',
  `content` longtext NOT NULL COMMENT '内容',
  `createtime` datetime NOT NULL COMMENT '创建时间',
  `updatetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comments` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否开启评论，1为开启，0为关闭',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示，1为显示，0为隐藏',
  `author` varchar(40) NOT NULL COMMENT '发布者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` (`id`,`title`,`excerpt`,`content`,`createtime`,`updatetime`,`comments`,`isshow`,`author`) VALUES ('1','这是第一个公告的例子','公告的摘要公告的摘要','<p>公告的例子公告的例子公告的例子公告的例子公告的例子公告的例子公告的例子公告的例子</p>','2017-08-18 14:29:28','2017-08-18 15:19:42','1','1','admin');

-- ----------------------------
-- Table structure for power
-- ----------------------------
DROP TABLE IF EXISTS `power`;
CREATE TABLE `power` (
  `id` int(1) NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `name` varchar(40) NOT NULL COMMENT '角色名称',
  `controllerModel` varchar(30) NOT NULL DEFAULT 'all' COMMENT '控制模块ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='角色表';
-- ----------------------------
-- Records of power
-- ----------------------------
INSERT INTO `power` (`id`,`name`,`controllerModel`) VALUES ('3','超级管理员','1,2,3,4,5,6,7');
INSERT INTO `power` (`id`,`name`,`controllerModel`) VALUES ('4','普通管理员','2,5,6,7');
INSERT INTO `power` (`id`,`name`,`controllerModel`) VALUES ('5','高级管理员','2,3,5,6,7');

-- ----------------------------
-- Table structure for reply_comments
-- ----------------------------
DROP TABLE IF EXISTS `reply_comments`;
CREATE TABLE `reply_comments` (
  `rid` int(12) NOT NULL AUTO_INCREMENT COMMENT '评论回复条目id',
  `cid` int(10) NOT NULL COMMENT '评论id',
  `fromUserid` int(7) NOT NULL COMMENT '回复评论的会员id',
  `fromUserip` varchar(16) NOT NULL COMMENT '回复评论的会员ip',
  `toUserid` int(7) NOT NULL COMMENT '回复目标会员id',
  `reply_text` varchar(400) NOT NULL DEFAULT '',
  `toUserip` varchar(16) NOT NULL COMMENT '回复目标会员ip',
  `replyTime` datetime NOT NULL COMMENT '回复时间',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为可见，0为不可见',
  `review` tinyint(1) NOT NULL DEFAULT '2' COMMENT '2为待审核，1为通过，0为未通过',
  PRIMARY KEY (`rid`),
  KEY `cid` (`cid`),
  KEY `fmid` (`fromUserid`),
  KEY `tmid` (`toUserid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of reply_comments
-- ----------------------------
INSERT INTO `reply_comments` (`rid`,`cid`,`fromUserid`,`fromUserip`,`toUserid`,`reply_text`,`toUserip`,`replyTime`,`isshow`,`review`) VALUES ('2','2','14','54.21.451.12','12','承让！承让！','214.21.25.129','2017-08-30 15:34:24','1','1');

-- ----------------------------
-- Table structure for senwords
-- ----------------------------
DROP TABLE IF EXISTS `senwords`;
CREATE TABLE `senwords` (
  `id` int(1) NOT NULL DEFAULT '0',
  `words` longtext NOT NULL COMMENT '敏感词汇内容，以|分割',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为启用，2为停用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of senwords
-- ----------------------------

-- ----------------------------
-- Table structure for system
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `webname` varchar(80) NOT NULL COMMENT '网站名称',
  `com` varchar(40) DEFAULT NULL COMMENT '域名',
  `opencomments` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为开启，0为关闭',
  `senswords` longtext NOT NULL COMMENT '屏蔽词汇',
  `filterips` longtext COMMENT 'ip过滤',
  `huandengimg` longtext COMMENT '幻灯片图像存放地址',
  `link` longtext COMMENT '友情链接网址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of system
-- ----------------------------
INSERT INTO `system` (`id`,`webname`,`com`,`opencomments`,`senswords`,`filterips`,`huandengimg`,`link`) VALUES ('19','nxapp','nxipp.com','1','阳痿|早泄','124.23.14.51','http://localhost/nxipp/public/uploads/huandeng/20170905/35432bef3e9b060feea2ccb459971729.jpg,http://localhost/nxipp/public/uploads/huandeng/20170906/7218951181c92739d16158d64f457a57.gif,http://localhost/nxipp/public/uploads/huandeng/20170906/97dad1cb6ae6d9fc33f67c1f049a56f5.jpg,http://localhost/nxipp/public/uploads/huandeng/20170907/184a0f9a6b64c1a204dc557ca1cdfced.gif,http://localhost/nxipp/public/uploads/huandeng/20170906/e0235e68475e4f6f287953e18a561e01.jpg','www.nxipp.com,http://localhost/nxipp/public/uploads/logo/20170907/06da3cb98300cb88bcf0f612801f934f.jpg|null,null|www.ifeng.com,http://localhost/nxipp/public/uploads/logo/20170907/81a7359e86c7e95dd70a501a4cc129a4.gif|www.aod.com,http://localhost/nxipp/public/uploads/logo/20170907/e41dd326f9edee8a1d6f7316d7b376e0.jpg');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) NOT NULL,
  `upass` varchar(60) NOT NULL,
  `uemail` varchar(40) NOT NULL,
  `create_time` datetime NOT NULL,
  `last_logintime` datetime DEFAULT NULL,
  `last_ip` varchar(16) DEFAULT NULL,
  `authorization` tinyint(1) NOT NULL DEFAULT '3' COMMENT '3为普通管理员；2为高级管理员；1为超级管理员',
  `ustatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为用户状态正常；0为状态锁定',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` (`id`,`uname`,`upass`,`uemail`,`create_time`,`last_logintime`,`last_ip`,`authorization`,`ustatus`) VALUES ('1','zhangsan','$2a$08$6QhjUxpKHRH71K2opmLbmuW2fS97wkHatJQUtKnBtyId7ZZsUFGLi','zhangsan@126.com','0000-00-00 00:00:00','2017-09-07 22:11:49','127.0.0.1','1','1');
INSERT INTO `user` (`id`,`uname`,`upass`,`uemail`,`create_time`,`last_logintime`,`last_ip`,`authorization`,`ustatus`) VALUES ('71','wangwu','$2a$08$cAR46saEuyRYJvy4AgvhGO9tK08vjQUEdrxBQA41PUvz9S0GxSxA6','wangwang@126.com','2017-08-12 12:33:02','2017-09-05 12:12:04','127.0.0.1','2','1');

