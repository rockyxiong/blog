/*
Navicat MySQL Data Transfer

Source Server         : dev
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : laravel_blog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-08-14 21:35:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `blog_article`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章表主键',
  `art_title` varchar(100) DEFAULT NULL COMMENT '文章标题',
  `art_tag` varchar(100) DEFAULT NULL COMMENT '文章标签/关键词',
  `art_description` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `art_thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `art_content` text COMMENT '文章内容',
  `art_time` int(11) DEFAULT NULL COMMENT '时间',
  `art_editor` varchar(50) DEFAULT NULL COMMENT '作者',
  `art_view` int(11) DEFAULT '0' COMMENT '查看次数',
  `cate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='文章';

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('19', '詹姆斯晒图正式签续约合同 这一次又是自己宣布', '詹姆斯', '北京时间8月13日消息，勒布朗-詹姆斯在社交媒体上晒出自己在合同上签字的照片。《克利夫兰老实人报》跟进报道，多条线报显示，詹姆斯已正式完成与骑士队的续约事宜。', 'uploads/20160814212819974.jpeg', '<p><img src=\"/ueditor/php/upload/image/20160814/1471181280946699.jpeg\" title=\"1471181280946699.jpeg\" alt=\"20150605191612_SP2yH.thumb.700_0.jpeg\"/></p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体, simsun, sans-serif, Arial; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">北京时间8月13日消息，勒布朗-詹姆斯在社交媒体上晒出自己在合同上签字的照片。《克利夫兰老实人报》跟进报道，多条线报显示，詹姆斯已正式完成与骑士队的续约事宜。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体, simsun, sans-serif, Arial; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">　　这是一份为期3年总价值1亿美元的续约合同，其中第3年拥有球员选项。除此之外，合同中还包括15%的交易保证金。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体, simsun, sans-serif, Arial; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">　　骑士队夺冠游行结束后，整个夏天詹姆斯都不在克利夫兰，而是先后去了欧洲、夏威夷、拉斯维加斯等地，并住在洛杉矶。1天前，詹姆斯回到家乡；今天正式在合同上签字。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体, simsun, sans-serif, Arial; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">　　周五，詹姆斯通过《露天看台》视频栏目宣布与骑士队续约。仅仅1天后，詹姆斯再度自己官宣！在社交媒体上，詹姆斯晒出在合同上签字的照片，身旁的是其经纪人里奇-保罗。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体, simsun, sans-serif, Arial; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">　　詹姆斯还在推特上写道，“承诺！！@骑士队”</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体, simsun, sans-serif, Arial; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">　　在此之前，外界的猜测是，詹姆斯预计在下周的詹姆斯家庭基金会活动上对外宣布与骑士队正式续约。而现在，决定提前在新合同上签字。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体, simsun, sans-serif, Arial; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">　　对骑士队来说，现在剩下的就是搞定JR-史密斯的合同。JR周二在新泽西结婚后，目前正在欧洲享受蜜月游。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 26px 0px 0px; font-size: 14px; font-family: 宋体, simsun, sans-serif, Arial; line-height: 26px; white-space: normal; background-color: rgb(255, 255, 255);\">　　JR正寻求一份平均年薪1500万美元的合同，而骑士队的开价是900万美元。不过最新消息显示，双方在金钱方面的差距并不大。至于何时达成续约协议，目前并没有具体时间表。（jim）</p><p><br/></p>', '1471172565', '', '3', '5');
INSERT INTO `blog_article` VALUES ('20', ' 传奇！菲尔普斯23金完美谢幕 含热泪告别', '飞鱼”传奇 完美谢幕', '菲尔普斯游泳谢幕，传奇！菲尔普斯23金完美谢幕 眼含热泪告别', 'uploads/20160814211043832.jpg', '<p><br/></p><p><br/></p><figure class=\"article-a__figure\" style=\"text-align: center; margin: 25px 0px; clear: both;\"><img src=\"/ueditor/php/upload/image/20160814/1471180358223119.jpg\" style=\"border: 0px; display: block; margin: 0px auto; max-width: 100%;\"/><figcaption class=\"article-a__figcaption\" style=\"line-height: 20px; padding: 10px 10px 0px; font-size: 0.9em; margin: 5px auto 0px; display: inline-block;\">飞鱼告别</figcaption></figure><p><br/></p><p><br/></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px;\">　　<a href=\"http://2016.sina.com.cn/\" target=\"_blank\" style=\"text-decoration: none; outline: none; color: rgb(221, 0, 0);\">里约奥运会</a>4X100米混合泳接力比赛，是<a href=\"http://sports.sina.com.cn/star/michael_phelps/\" target=\"_blank\" style=\"text-decoration: none; outline: none; color: rgb(221, 0, 0);\">菲尔普斯</a>在奥运舞台的最后一战。此前他已亲口宣布自己熬不到下一个四年了，今天他用第23块金牌让自己的奥运生涯完美谢幕。</p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px;\">　　“我准备退役了，对此我感到高兴，我的心态比四年前更好了。我准备花更多的时间，陪伴我的孩子和未婚妻。再战四年？不，我不会再战四年了，如果退役需要签文件的话，那我愿意明天就签字。”飞鱼的表态让人心头一颤，毕竟在泳池中看不到他是一件需要适应的事</p><p><br/></p><p><img src=\"/ueditor/php/upload/image/20160814/1471180359140072.jpg\"/><br/></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;PingFang SC&quot;, &quot;Lantinghei SC&quot;, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans; line-height: 28px; white-space: normal;\">关于菲尔普斯，有太多报道介绍他的荣誉、他的天赋，你怎么赞美他都不为过：天才、海神、水中超人、金牌收割机……金牌数无法完全体现飞鱼的伟大，但却是衡量他的最直观准则。</p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;PingFang SC&quot;, &quot;Lantinghei SC&quot;, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans; line-height: 28px; white-space: normal;\">　　奥运的最后一战，菲尔普斯与队友们一起站在4X100米混合泳接力的赛场，当他在第三棒跳下泳池的时候，一定倾尽了全力。这100米是他职业生涯的凝结，菲尔普斯像往常一样，把持住了领先优势，最终没有遗憾，他与队友们一起拿到了奥运赛场上的最后一金！飞鱼激动落泪，他的未婚妻也抱着儿子在看台上留下了激动的眼泪。“在接力结束后我的感情，甚至比自己个人项目结束后还要激动，作为团队中的一员夺得这枚金牌是很荣耀的一件事，我有机会成为一支伟大接力队的一员，这样结束很光荣。”这是他最朴实又钟情的告白。</p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;PingFang SC&quot;, &quot;Lantinghei SC&quot;, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans; line-height: 28px; white-space: normal;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"http://n.sinaimg.cn/sports/transform/20160814/r9mJ-fxuxnak0215226.gif\"/><br/></p><p><br/></p>', '1471180495', 'rocky', '4', '2');
INSERT INTO `blog_article` VALUES ('21', '王宝强离婚', '王宝强 离婚 马蓉', '', 'uploads/20160814212216352.jpg', '<p><span style=\"color: rgb(102, 102, 102); font-family: &quot;Microsoft Yahei&quot;, Simsun; line-height: 24px; white-space: pre-wrap;\"> &nbsp; &nbsp; &nbsp; &nbsp; 王宝强微博发布离婚声明，表明妻子马蓉与经纪人存在婚外不正当两性关系，故决定解除与马蓉的婚姻关系，并解除宋喆的经纪人职务。</span><img src=\"/ueditor/php/upload/image/20160814/1471180809104257.jpg\" height=\"500\" width=\"333\"/></p><h2 style=\"margin: 0px 0px 6px; padding: 0px; font-size: 24px; font-weight: normal; line-height: 30px; float: left;\"><a href=\"http://slide.ent.sina.com.cn/star/slide_4_704_147684.html?img=1990109\" target=\"_blank\" id=\"entSlide_title\" style=\"text-decoration: none; outline: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(206, 0, 0);\">王宝强戛纳红毯热吻马蓉</a><span style=\"color: rgb(102, 102, 102); padding-left: 10px;\"><span id=\"entSlide_index\" style=\"color: rgb(204, 0, 0);\">1</span>/42</span></h2><p><a href=\"http://www.sinaimg.cn/dy/slidenews/4_img/2016_32/704_1990109_749261.jpg\" target=\"_blank\" id=\"entSlide_image\" style=\"text-decoration: none; outline: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); display: inline-block; width: 80px; height: 32px; text-align: center; line-height: 32px; border-radius: 4px; margin-left: 4px; color: rgb(0, 0, 0); background: rgb(233, 233, 233);\">查看原图</a><a href=\"http://slide.ent.sina.com.cn/star/slide_4_704_147684.html\" target=\"_blank\" style=\"text-decoration: none; outline: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); display: inline-block; width: 80px; height: 32px; text-align: center; line-height: 32px; border-radius: 4px; margin-left: 4px; color: rgb(0, 0, 0); background: rgb(233, 233, 233);\">图集模式</a></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 32px; font-family: &quot;Microsoft Yahei&quot;, Simsun; white-space: normal;\">新浪娱乐讯 14日凌晨，王宝强发表离婚声明，称妻子马蓉与经纪人存在婚外不正当两性关系。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 32px; font-family: &quot;Microsoft Yahei&quot;, Simsun; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 32px; font-family: &quot;Microsoft Yahei&quot;, Simsun; white-space: normal;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"http://n.sinaimg.cn/ent/transform/20160814/HQeF-fxuxnap3572056.jpg\" alt=\"王宝强发表离婚声明\" data-link=\"\"/><br/></p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 32px; font-family: &quot;Microsoft Yahei&quot;, Simsun; white-space: normal;\"><br/></p><p><br/></p>', '1471180875', 'rocky', '0', '3');

-- ----------------------------
-- Table structure for `blog_category`
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL COMMENT '分类名字',
  `cate_title` varchar(255) DEFAULT NULL COMMENT '分类标题',
  `cate_keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `cate_description` varchar(255) DEFAULT NULL COMMENT '描述',
  `cate_view` int(10) DEFAULT NULL,
  `cate_order` tinyint(4) DEFAULT NULL,
  `cate_pid` int(11) DEFAULT NULL COMMENT '父级',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='//分类';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '新闻', '新闻777', '呃呃呃', null, '2', '2', '0');
INSERT INTO `blog_category` VALUES ('2', '体育', '奥运会', '大结局', null, '4', '1', '0');
INSERT INTO `blog_category` VALUES ('3', '娱乐', '人人都有自己的娱乐圈', '快快快', null, '2', '3', '0');
INSERT INTO `blog_category` VALUES ('4', '热门新闻', '孙杨', '呃呃呃', null, '3', '2', '1');
INSERT INTO `blog_category` VALUES ('5', '腾讯体育', 'NBA', '总决赛', null, '4', '6', '2');
INSERT INTO `blog_category` VALUES ('6', '新浪娱乐', '娱乐等等', '呃呃呃', null, '3', '3', '3');
INSERT INTO `blog_category` VALUES ('18', '社会新闻', '公交车上应不应该让座', '', '', null, '6', '1');

-- ----------------------------
-- Table structure for `blog_config`
-- ----------------------------
DROP TABLE IF EXISTS `blog_config`;
CREATE TABLE `blog_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) DEFAULT NULL COMMENT '标题',
  `conf_name` varchar(50) DEFAULT NULL COMMENT '变量名字',
  `conf_order` int(11) DEFAULT NULL COMMENT '排序',
  `conf_tips` varchar(255) DEFAULT NULL COMMENT '描述',
  `conf_content` text COMMENT '变量值',
  `field_type` varchar(50) DEFAULT NULL COMMENT '字段类型',
  `field_value` varchar(255) DEFAULT NULL COMMENT '类型值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='配置';

-- ----------------------------
-- Records of blog_config
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_links`
-- ----------------------------
DROP TABLE IF EXISTS `blog_links`;
CREATE TABLE `blog_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `link_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '连接',
  `link_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='友情链接';

-- ----------------------------
-- Records of blog_links
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_navs`
-- ----------------------------
DROP TABLE IF EXISTS `blog_navs`;
CREATE TABLE `blog_navs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(50) DEFAULT NULL COMMENT '名称',
  `nav_alias` varchar(50) DEFAULT NULL COMMENT '别名',
  `nav_url` varchar(255) DEFAULT NULL COMMENT '地址',
  `nav_order` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='导航';

-- ----------------------------
-- Records of blog_navs
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_users`
-- ----------------------------
DROP TABLE IF EXISTS `blog_users`;
CREATE TABLE `blog_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL COMMENT '用户名',
  `user_pass` varchar(255) DEFAULT NULL COMMENT '用户密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='//管理员';

-- ----------------------------
-- Records of blog_users
-- ----------------------------
INSERT INTO `blog_users` VALUES ('1', 'admin', 'eyJpdiI6ImVjZmFxVXpoU2lyNmcxVmRVT2FVSkE9PSIsInZhbHVlIjoiV1ZneWFRbElHdDNvcXk3alpIYXZVUT09IiwibWFjIjoiOTVhOGRhMWNhMWMwOGE2M2YwOGU5NGI3ZTZkZDkwOWViOWQxNDc3ZjI0N2M1ZmVjZmI5ZGE3Nzg5ZGYwYjQyZSJ9');
