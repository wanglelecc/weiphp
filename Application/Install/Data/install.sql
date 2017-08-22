/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : weishop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-20 09:36:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wp_action`
-- ----------------------------
DROP TABLE IF EXISTS `wp_action`;
CREATE TABLE `wp_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '行为唯一标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '行为说明',
  `remark` char(140) NOT NULL DEFAULT '' COMMENT '行为描述',
  `rule` text COMMENT '行为规则',
  `log` text COMMENT '日志规则',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='系统行为表';

-- ----------------------------
-- Records of wp_action
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_action_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_action_log`;
CREATE TABLE `wp_action_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `action_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '行为id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '触发行为的表',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '触发行为的数据id',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '日志备注',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  PRIMARY KEY (`id`),
  KEY `action_ip_ix` (`action_ip`) USING BTREE,
  KEY `action_id_ix` (`action_id`) USING BTREE,
  KEY `user_id_ix` (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行为日志表';

-- ----------------------------
-- Records of wp_action_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_addon_category`
-- ----------------------------
DROP TABLE IF EXISTS `wp_addon_category`;
CREATE TABLE `wp_addon_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `icon` int(10) unsigned DEFAULT NULL COMMENT '分类图标',
  `title` varchar(255) DEFAULT NULL COMMENT '分类名',
  `sort` int(10) DEFAULT '0' COMMENT '排序号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='插件分类表';

-- ----------------------------
-- Records of wp_addon_category
-- ----------------------------
INSERT INTO `wp_addon_category` VALUES ('1', null, '奖励功能', '4');
INSERT INTO `wp_addon_category` VALUES ('2', null, '互动功能', '3');
INSERT INTO `wp_addon_category` VALUES ('7', '0', '高级功能', '10');
INSERT INTO `wp_addon_category` VALUES ('4', null, '公众号管理', '20');
INSERT INTO `wp_addon_category` VALUES ('8', '0', '用户管理', '1');

-- ----------------------------
-- Table structure for `wp_addons`
-- ----------------------------
DROP TABLE IF EXISTS `wp_addons`;
CREATE TABLE `wp_addons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  `type` tinyint(1) DEFAULT '0' COMMENT '插件类型 0 普通插件 1 微信插件 2 易信插件',
  `cate_id` int(11) DEFAULT NULL,
  `is_show` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`) USING BTREE,
  KEY `sti` (`status`,`is_show`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8 COMMENT='微信插件表';

-- ----------------------------
-- Records of wp_addons
-- ----------------------------
INSERT INTO `wp_addons` VALUES ('18', 'Wecome', '欢迎语', '用户关注公众号时发送的欢迎信息，支持文本，图片，图文的信息', '1', '{\"type\":\"1\",\"title\":\"\",\"description\":\"欢迎关注，请<a href=\"[follow]\">绑定帐号</a>后体验更多功能\",\"pic_url\":\"\",\"url\":\"\"}', '地下凡星', '0.1', '1389620372', '0', '0', '4', '1');
INSERT INTO `wp_addons` VALUES ('19', 'UserCenter', '微信用户中心', '实现3G首页、微信登录，微信用户绑定，微信用户信息初始化等基本功能', '1', '{\"score\":\"100\",\"experience\":\"100\",\"need_bind\":\"1\",\"bind_start\":\"0\",\"jumpurl\":\"\"}', '地下凡星', '0.1', '1390660425', '1', '0', '8', '1');
INSERT INTO `wp_addons` VALUES ('56', 'CustomMenu', '自定义菜单', '自定义菜单能够帮助公众号丰富界面，让用户更好更快地理解公众号的功能', '1', 'null', '凡星', '0.1', '1398264735', '1', '0', '4', '1');
INSERT INTO `wp_addons` VALUES ('111', 'ConfigureAccount', '帐号配置', '配置共众帐号的信息', '1', 'null', 'manx', '0.1', '1430730412', '1', '0', '4', '0');
INSERT INTO `wp_addons` VALUES ('101', 'CardVouchers', '微信卡券', '在微信平台创建卡券后，可配置到这里生成素材提供用户领取，它既支持电视台自己公众号发布的卡券，也支持由商家公众号发布的卡券', '1', 'null', '凡星', '0.1', '1421981659', '1', '0', '1', '1');
INSERT INTO `wp_addons` VALUES ('39', 'WeiSite', '微官网', '微官网', '1', 'null', '凡星', '0.1', '1395326578', '0', '0', '7', '1');
INSERT INTO `wp_addons` VALUES ('42', 'Leaflets', '微信宣传页', '微信公众号二维码推广页面，用作推广或者制作广告易拉宝，可以发布到QQ群微博博客论坛等等...', '1', '{\"random\":\"1\"}', '凡星', '0.1', '1396056935', '0', '0', '4', '1');
INSERT INTO `wp_addons` VALUES ('48', 'CustomReply', '自定义回复', '这是一个临时描述', '1', 'null', '凡星', '0.1', '1396578089', '1', '0', '4', '1');
INSERT INTO `wp_addons` VALUES ('50', 'Survey', '微调研', '这是一个临时描述', '1', 'null', '凡星', '0.1', '1396883644', '1', '0', '2', '1');
INSERT INTO `wp_addons` VALUES ('91', 'Invite', '微邀约', '微邀约用于邀约朋友一起消费优惠券,一起参加活动', '1', 'null', '无名', '0.1', '1418047849', '1', '0', '2', '1');
INSERT INTO `wp_addons` VALUES ('93', 'Game', '互动游戏', '互动游管理中心，用于微游戏接入，管理绑定等', '1', 'null', '凡星', '0.1', '1418526180', '0', '0', '2', '0');
INSERT INTO `wp_addons` VALUES ('97', 'Ask', '微抢答', '用于电视互动答题', '1', '{\"random\":\"1\"}', '凡星', '0.1', '1420680633', '1', '0', '2', '1');
INSERT INTO `wp_addons` VALUES ('100', 'Forms', '通用表单', '管理员可以轻松地增加一个表单用于收集用户的信息，如活动报名、调查反馈、预约填单等', '1', 'null', '凡星', '0.1', '1421981648', '1', '0', '2', '1');
INSERT INTO `wp_addons` VALUES ('106', 'RedBag', '微信红包', '实现微信红包的金额设置，红包领取，红包素材下载等', '1', 'null', '凡星', '0.1', '1427683711', '1', '0', '1', '1');
INSERT INTO `wp_addons` VALUES ('107', 'Guess', '竞猜', '节目竞猜 有奖竞猜 竞猜项目配置', '1', 'null', '无名', '0.1', '1428648367', '1', '0', '2', '1');
INSERT INTO `wp_addons` VALUES ('108', 'WishCard', '微贺卡', 'Diy贺卡 自定贺卡内容 发给好友 后台编辑', '1', 'null', '凡星', '0.1', '1429344990', '1', '0', '2', '1');
INSERT INTO `wp_addons` VALUES ('110', 'RealPrize', '实物奖励', '实物奖励设置', '1', 'null', 'aManx', '0.1', '1429514311', '1', '0', '1', '1');
INSERT INTO `wp_addons` VALUES ('126', 'DeveloperTool', '开发者工具箱', '开发者可以用来调试，监控运营系统的参数', '1', 'null', '凡星', '0.1', '1438830685', '1', '0', '7', '1');
INSERT INTO `wp_addons` VALUES ('128', 'BusinessCard', '微名片', '', '1', '{\"random\":\"1\"}', '凡星', '0.1', '1438914856', '1', '0', '7', '1');
INSERT INTO `wp_addons` VALUES ('130', 'AutoReply', '自动回复', 'WeiPHP基础功能，能实现配置关键词，用户回复此关键词后自动回复对应的文件，图文，图片信息', '1', 'null', '凡星', '0.1', '1439194276', '1', '0', '4', '1');
INSERT INTO `wp_addons` VALUES ('133', 'Payment', '支付通', '微信支付,财付通,支付宝', '1', '{\"isopen\":\"1\",\"isopenwx\":\"1\",\"isopenzfb\":\"0\",\"isopencftwap\":\"0\",\"isopencft\":\"0\",\"isopenyl\":\"0\",\"isopenload\":\"1\"}', '拉帮姐派(陌路生人)', '0.1', '1439364373', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('134', 'Vote', '投票', '支持文本和图片两类的投票功能', '1', '{\"random\":\"1\"}', '凡星', '0.1', '1439433311', '1', '0', '2', '1');
INSERT INTO `wp_addons` VALUES ('137', 'Comment', '评论互动', '可放到手机界面里进行评论，显示支持弹屏方式', '1', '{\"min_time\":\"30\",\"limit\":\"15\"}', '凡星', '0.1', '1441593187', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('140', 'NoAnswer', '没回答的回复', '当用户提供的内容或者关键词系统无关识别回复时，自动把当前配置的内容回复给用户', '1', '{\"random\":\"1\"}', '凡星', '0.1', '1442905427', '0', '0', '4', '1');
INSERT INTO `wp_addons` VALUES ('141', 'Servicer', '工作授权', '关注公众号后，扫描授权二维码，获取工作权限', '1', 'null', 'jacy', '0.1', '1443079386', '1', '0', '8', '1');
INSERT INTO `wp_addons` VALUES ('142', 'Coupon', '优惠券', '配合粉丝圈子，打造粉丝互动的运营激励基础', '1', 'null', '凡星', '0.1', '1443094791', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('144', 'Card', '会员卡', '提供会员卡基本功能：会员卡制作、会员管理、通知发布、优惠券发布等功能，用户可在此基础上扩展自己的具体业务需求，如积分、充值、签到等', '1', '{\"background\":\"1\",\"title\":\"\\u65f6\\u5c1a\\u7f8e\\u5bb9\\u7f8e\\u53d1\\u5e97VIP\\u4f1a\\u5458\\u5361\",\"length\":\"80001\",\"instruction\":\"1\\u3001\\u606d\\u559c\\u60a8\\u6210\\u4e3a\\u65f6\\u5c1a\\u7f8e\\u5bb9\\u7f8e\\u53d1\\u5e97VIP\\u4f1a\\u5458;\\r\\n2\\u3001\\u7ed3\\u5e10\\u65f6\\u8bf7\\u51fa\\u793a\\u6b64\\u5361\\uff0c\\u51ed\\u6b64\\u5361\\u53ef\\u4eab\\u53d7\\u4f1a\\u5458\\u4f18\\u60e0;\\r\\n3\\u3001\\u6b64\\u5361\\u6700\\u7ec8\\u89e3\\u91ca\\u6743\\u5f52\\u65f6\\u5c1a\\u7f8e\\u5bb9\\u7f8e\\u53d1\\u5e97\\u6240\\u6709\",\"address\":\"\",\"phone\":\"\",\"url\":\"\",\"background_custom\":null}', '凡星', '0.1', '1443144735', '0', '0', '1', '1');
INSERT INTO `wp_addons` VALUES ('145', 'SingIn', '签到', '粉丝每天签到可以获得积分。', '1', '{\"random\":\"1\",\"score\":\"1\",\"score1\":\"1\",\"score2\":\"2\",\"hour\":\"0\",\"minute\":\"0\",\"continue_day\":\"3\",\"continue_score\":\"5\",\"share_score\":\"1\",\"share_limit\":\"1\",\"notstart\":\"\\u4eb2\\uff0c\\u4f60\\u8d77\\u5f97\\u592a\\u65e9\\u4e86,\\u7b7e\\u5230\\u4ece[\\u5f00\\u59cb\\u65f6\\u95f4]\\u5f00\\u59cb,\\u73b0\\u5728\\u624d[\\u5f53\\u524d\\u65f6\\u95f4]\\uff01\",\"done\":\"\\u4eb2\\uff0c\\u4eca\\u5929\\u5df2\\u7ecf\\u7b7e\\u5230\\u8fc7\\u4e86\\uff0c\\u8bf7\\u660e\\u5929\\u518d\\u6765\\u54e6\\uff0c\\u8c22\\u8c22\\uff01\",\"reply\":\"\\u606d\\u559c\\u60a8,\\u7b7e\\u5230\\u6210\\u529f\\r\\n\\r\\n\\u672c\\u6b21\\u7b7e\\u5230\\u83b7\\u5f97[\\u672c\\u6b21\\u79ef\\u5206]\\u79ef\\u5206\\r\\n\\r\\n\\u5f53\\u524d\\u603b\\u79ef\\u5206[\\u79ef\\u5206\\u4f59\\u989d]\\r\\n\\r\\n[\\u7b7e\\u5230\\u65f6\\u95f4]\\r\\n\\r\\n\\u60a8\\u4eca\\u5929\\u662f\\u7b2c[\\u6392\\u540d]\\u4f4d\\u7b7e\\u5230\\r\\n\\r\\n\\u7b7e\\u5230\\u6392\\u884c\\u699c\\uff1a\\r\\n\\r\\n[\\u6392\\u884c\\u699c]\",\"content\":\"\"}', '淡然', '1.11', '1444304566', '1', '0', '2', '1');
INSERT INTO `wp_addons` VALUES ('146', 'Reserve', '微预约', '微预约是商家利用微营销平台实现在线预约的一种服务，可以运用于汽车、房产、酒店、医疗、餐饮等一系列行业，给用户的出行办事、购物、消费带来了极大的便利！且操作简单， 响应速度非常快，受到业界的一致好评！', '1', 'null', '凡星', '0.1', '1444909657', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('151', 'Sms', '短信服务', '短信服务，短信验证，短信发送', '1', '{\"random\":\"1\"}', 'jacy', '0.1', '1446103430', '0', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('152', 'Exam', '微考试', '主要功能有试卷管理，题目录入管理，考生信息和考分汇总管理。', '1', 'null', '凡星', '0.1', '1447383107', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('153', 'Test', '微测试', '主要功能有问卷管理，题目录入管理，用户信息和得分汇总管理。', '1', 'null', '凡星', '0.1', '1447383593', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('162', 'Weiba', '微社区', '打造公众号粉丝之间沟通的社区，为粉丝运营提供更多服务', '1', '{\"random\":\"1\"}', '凡星', '0.1', '1463801487', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('163', 'QrAdmin', '扫码管理', '在服务号的情况下，可以自主创建一个二维码，并可指定扫码后用户自动分配到哪个用户组，绑定哪些标签', '1', 'null', '凡星', '0.1', '1463999217', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('156', 'Draw', '比赛抽奖', '功能主要有奖品设置，抽奖配置和抽奖统计', '1', 'null', '凡星', '0.1', '1447389122', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('164', 'PublicBind', '一键绑定公众号', '', '1', '{\"random\":\"1\"}', '凡星', '0.1', '1465981270', '0', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('165', 'Cms', '微信小程序CMS', '微信小程序CMS内容管理系统', '1', 'null', '凡星', '0.1', '1495787007', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('166', 'Feedback', '用户反馈', '', '1', 'null', '凡星', '0.1', '1495787298', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('167', 'WeiUserCenter', '小程序用户中心', '这是一个临时描述', '1', 'null', 'sky', '0.1', '1498703881', '1', '0', null, '1');
INSERT INTO `wp_addons` VALUES ('168', 'WeiPicture', '小程序图库', '这是一个临时描述', '1', 'null', 'sky', '0.1', '1498718384', '1', '0', null, '1');

-- ----------------------------
-- Table structure for `wp_admin_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_admin_log`;
CREATE TABLE `wp_admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT NULL COMMENT '用户ID',
  `ip` varchar(30) DEFAULT NULL COMMENT '用户IP地址',
  `content` text CHARACTER SET utf8mb4 COMMENT '日志内容',
  `mod` varchar(50) DEFAULT NULL COMMENT '应用名',
  `cTime` int(10) DEFAULT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=434 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_admin_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_analysis`
-- ----------------------------
DROP TABLE IF EXISTS `wp_analysis`;
CREATE TABLE `wp_analysis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `sports_id` int(10) DEFAULT NULL COMMENT 'sports_id',
  `type` varchar(30) DEFAULT NULL COMMENT 'type',
  `time` varchar(50) DEFAULT NULL COMMENT 'time',
  `total_count` int(10) DEFAULT '0' COMMENT 'total_count',
  `follow_count` int(10) DEFAULT '0' COMMENT 'follow_count',
  `aver_count` int(10) DEFAULT '0' COMMENT 'aver_count',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_analysis
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_api`
-- ----------------------------
DROP TABLE IF EXISTS `wp_api`;
CREATE TABLE `wp_api` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(100) NOT NULL COMMENT '接口名称',
  `mod` varchar(100) DEFAULT NULL COMMENT '所属模型',
  `method` char(50) DEFAULT 'POST' COMMENT '请求类型',
  `return_type` char(50) DEFAULT 'JSON' COMMENT '返回值格式',
  `type` char(50) DEFAULT 'select' COMMENT '接口类型',
  `request_count` int(10) DEFAULT '0' COMMENT '请求次数',
  `url` varchar(100) NOT NULL COMMENT '接口地址',
  `page` tinyint(2) DEFAULT '0' COMMENT '是否有分页',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_api
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_api_access_token`
-- ----------------------------
DROP TABLE IF EXISTS `wp_api_access_token`;
CREATE TABLE `wp_api_access_token` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `appid` varchar(32) DEFAULT NULL COMMENT 'appid',
  `secret` varchar(50) DEFAULT NULL COMMENT 'secret',
  `access_token` varchar(100) DEFAULT NULL COMMENT 'access_token',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_api_access_token
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_api_param`
-- ----------------------------
DROP TABLE IF EXISTS `wp_api_param`;
CREATE TABLE `wp_api_param` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(100) NOT NULL COMMENT '名称',
  `name` varchar(50) NOT NULL COMMENT '字段',
  `is_must` tinyint(2) DEFAULT '0' COMMENT '是否必填',
  `type` varchar(30) DEFAULT NULL COMMENT '格式',
  `remark` text COMMENT '描述',
  `extra` char(10) DEFAULT 'asc' COMMENT '扩展字段',
  `param_type` char(10) DEFAULT NULL COMMENT '参数类型',
  `api_id` int(10) DEFAULT NULL COMMENT 'api表关联ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_api_param
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_apps`
-- ----------------------------
DROP TABLE IF EXISTS `wp_apps`;
CREATE TABLE `wp_apps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT NULL COMMENT '用户ID',
  `public_name` varchar(50) DEFAULT NULL COMMENT '公众号名称',
  `public_id` varchar(100) DEFAULT NULL COMMENT '公众号原始id',
  `headface_url` varchar(255) DEFAULT NULL COMMENT '公众号头像',
  `area` varchar(50) DEFAULT NULL COMMENT '地区',
  `addon_config` text COMMENT '插件配置',
  `addon_status` text COMMENT '插件状态',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `type` char(10) DEFAULT NULL COMMENT '类型',
  `appid` varchar(255) DEFAULT NULL COMMENT 'AppID',
  `secret` varchar(255) DEFAULT NULL COMMENT 'AppSecret',
  `encodingaeskey` varchar(255) DEFAULT NULL COMMENT 'EncodingAESKey',
  `tips_url` varchar(255) DEFAULT NULL COMMENT '提示关注公众号的文章地址',
  `is_bind` tinyint(2) DEFAULT '0' COMMENT '是否为微信开放平台绑定账号',
  `check_file` int(10) DEFAULT NULL COMMENT '域名授权验证文件',
  `app_type` tinyint(2) DEFAULT '0' COMMENT '类型',
  `mch_id` varchar(32) DEFAULT NULL COMMENT '商户号',
  `partner_key` varchar(100) DEFAULT NULL COMMENT 'API密钥',
  `cert_pem` int(10) unsigned DEFAULT NULL COMMENT '微信支付证书cert',
  `key_pem` int(10) unsigned DEFAULT NULL COMMENT '微信支付证书key',
  PRIMARY KEY (`id`),
  KEY `token` (`token`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_apps
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_apps_auth`
-- ----------------------------
DROP TABLE IF EXISTS `wp_apps_auth`;
CREATE TABLE `wp_apps_auth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type_0` tinyint(1) DEFAULT '0' COMMENT '普通订阅号的开关',
  `type_1` tinyint(1) DEFAULT '0' COMMENT '微信认证订阅号的开关',
  `type_2` tinyint(1) DEFAULT '0' COMMENT '普通服务号的开关',
  `type_3` tinyint(1) DEFAULT '0' COMMENT '微信认证服务号的开关',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_apps_auth
-- ----------------------------
INSERT INTO `wp_apps_auth` VALUES ('1', 'GET_ACCESS_TOKEN', '基础支持-获取access_token', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('2', 'GET_WECHAT_IP', '基础支持-获取微信服务器IP地址', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('3', 'GET_MSG', '接收消息-验证消息真实性、接收普通消息、接收事件推送、接收语音识别结果', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('4', 'SEND_REPLY_MSG', '发送消息-被动回复消息', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('5', 'SEND_CUSTOM_MSG', '发送消息-客服接口', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('6', 'SEND_GROUP_MSG', '发送消息-群发接口', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('7', 'SEND_NOTICE', '发送消息-模板消息接口（发送业务通知）', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('8', 'USER_GROUP', '用户管理-用户分组管理', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('9', 'USER_REMARK', '用户管理-设置用户备注名', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('10', 'USER_BASE_INFO', '用户管理-获取用户基本信息', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('11', 'USER_LIST', '用户管理-获取用户列表', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('12', 'USER_LOCATION', '用户管理-获取用户地理位置', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('13', 'USER_OAUTH', '用户管理-网页授权获取用户openid/用户基本信息', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('14', 'QRCODE', '推广支持-生成带参数二维码', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('15', 'LONG_URL', '推广支持-长链接转短链接口', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('16', 'MENU', '界面丰富-自定义菜单', '0', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('17', 'MATERIAL', '素材管理-素材管理接口', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('18', 'SEMANTIC', '智能接口-语义理解接口', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('19', 'CUSTOM_SERVICE', '多客服-获取多客服消息记录、客服管理', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('20', 'PAYMENT', '微信支付接口', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('21', 'SHOP', '微信小店接口', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('22', 'CARD', '微信卡券接口', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('23', 'DEVICE', '微信设备功能接口', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('24', 'JSSKD_BASE', '微信JS-SDK-基础接口', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('25', 'JSSKD_SHARE', '微信JS-SDK-分享接口', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('26', 'JSSKD_IMG', '微信JS-SDK-图像接口', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('27', 'JSSKD_AUDIO', '微信JS-SDK-音频接口', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('28', 'JSSKD_SEMANTIC', '微信JS-SDK-智能接口（网页语音识别）', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('29', 'JSSKD_DEVICE', '微信JS-SDK-设备信息', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('30', 'JSSKD_LOCATION', '微信JS-SDK-地理位置', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('31', 'JSSKD_MENU', '微信JS-SDK-界面操作', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('32', 'JSSKD_SCAN', '微信JS-SDK-微信扫一扫', '1', '1', '1', '1');
INSERT INTO `wp_apps_auth` VALUES ('33', 'JSSKD_SHOP', '微信JS-SDK-微信小店', '0', '0', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('34', 'JSSKD_CARD', '微信JS-SDK-微信卡券', '0', '1', '0', '1');
INSERT INTO `wp_apps_auth` VALUES ('35', 'JSSKD_PAYMENT', '微信JS-SDK-微信支付', '0', '0', '0', '1');

-- ----------------------------
-- Table structure for `wp_apps_check`
-- ----------------------------
DROP TABLE IF EXISTS `wp_apps_check`;
CREATE TABLE `wp_apps_check` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `na` varchar(50) NOT NULL,
  `msg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_apps_check
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_apps_follow`
-- ----------------------------
DROP TABLE IF EXISTS `wp_apps_follow`;
CREATE TABLE `wp_apps_follow` (
  `openid` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `has_subscribe` tinyint(1) DEFAULT '0',
  `syc_status` tinyint(1) DEFAULT '2' COMMENT '0 开始同步中 1 更新用户信息中 2 完成同步',
  `remark` varchar(100) DEFAULT NULL,
  UNIQUE KEY `openid` (`openid`,`token`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_apps_follow
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_apps_group`
-- ----------------------------
DROP TABLE IF EXISTS `wp_apps_group`;
CREATE TABLE `wp_apps_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(50) DEFAULT NULL COMMENT '等级名',
  `addon_status` text COMMENT '插件权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_apps_group
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_apps_link`
-- ----------------------------
DROP TABLE IF EXISTS `wp_apps_link`;
CREATE TABLE `wp_apps_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT NULL COMMENT '管理员UID',
  `mp_id` int(10) unsigned DEFAULT NULL COMMENT '公众号ID',
  `is_creator` tinyint(2) DEFAULT '0' COMMENT '是否为创建者',
  `addon_status` text COMMENT '插件权限',
  PRIMARY KEY (`id`),
  UNIQUE KEY `um` (`uid`,`mp_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_apps_link
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_area`
-- ----------------------------
DROP TABLE IF EXISTS `wp_area`;
CREATE TABLE `wp_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(50) DEFAULT NULL COMMENT '地区名',
  `pid` int(10) DEFAULT NULL COMMENT '上级编号',
  `sort` int(10) DEFAULT '0' COMMENT '排序号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=659 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_area
-- ----------------------------
INSERT INTO `wp_area` VALUES ('1', '中国', '0', '0');
INSERT INTO `wp_area` VALUES ('2', '四川', '1', '0');
INSERT INTO `wp_area` VALUES ('3', '重庆', '1', '1');
INSERT INTO `wp_area` VALUES ('4', '陕西', '1', '2');
INSERT INTO `wp_area` VALUES ('5', '甘肃', '1', '3');
INSERT INTO `wp_area` VALUES ('6', '青海', '1', '4');
INSERT INTO `wp_area` VALUES ('7', '宁夏', '1', '5');
INSERT INTO `wp_area` VALUES ('8', '云南', '1', '6');
INSERT INTO `wp_area` VALUES ('9', '澳门', '1', '7');
INSERT INTO `wp_area` VALUES ('10', '贵州', '1', '8');
INSERT INTO `wp_area` VALUES ('11', '香港', '1', '9');
INSERT INTO `wp_area` VALUES ('12', '辽宁', '1', '10');
INSERT INTO `wp_area` VALUES ('13', '吉林', '1', '11');
INSERT INTO `wp_area` VALUES ('14', '黑龙江', '1', '12');
INSERT INTO `wp_area` VALUES ('15', '海南', '1', '13');
INSERT INTO `wp_area` VALUES ('16', '广东', '1', '14');
INSERT INTO `wp_area` VALUES ('17', '广西', '1', '15');
INSERT INTO `wp_area` VALUES ('18', '湖北', '1', '16');
INSERT INTO `wp_area` VALUES ('19', '湖南', '1', '17');
INSERT INTO `wp_area` VALUES ('20', '河南', '1', '18');
INSERT INTO `wp_area` VALUES ('21', '台湾', '1', '19');
INSERT INTO `wp_area` VALUES ('22', '北京', '1', '20');
INSERT INTO `wp_area` VALUES ('23', '河北', '1', '21');
INSERT INTO `wp_area` VALUES ('24', '天津', '1', '22');
INSERT INTO `wp_area` VALUES ('25', '内蒙古', '1', '23');
INSERT INTO `wp_area` VALUES ('26', '山西', '1', '24');
INSERT INTO `wp_area` VALUES ('27', '浙江', '1', '25');
INSERT INTO `wp_area` VALUES ('28', '江苏', '1', '26');
INSERT INTO `wp_area` VALUES ('29', '上海', '1', '27');
INSERT INTO `wp_area` VALUES ('30', '山东', '1', '28');
INSERT INTO `wp_area` VALUES ('31', '江西', '1', '29');
INSERT INTO `wp_area` VALUES ('32', '福建', '1', '30');
INSERT INTO `wp_area` VALUES ('33', '安徽', '1', '31');
INSERT INTO `wp_area` VALUES ('34', '西藏', '1', '32');
INSERT INTO `wp_area` VALUES ('35', '新疆', '1', '33');
INSERT INTO `wp_area` VALUES ('308', '沈阳', '12', '130');
INSERT INTO `wp_area` VALUES ('307', '葫芦岛', '12', '129');
INSERT INTO `wp_area` VALUES ('306', '铁岭', '12', '128');
INSERT INTO `wp_area` VALUES ('305', '朝阳', '12', '127');
INSERT INTO `wp_area` VALUES ('304', '辽阳', '12', '126');
INSERT INTO `wp_area` VALUES ('303', '盘锦', '12', '125');
INSERT INTO `wp_area` VALUES ('302', 'None', '11', '124');
INSERT INTO `wp_area` VALUES ('301', '安顺', '10', '123');
INSERT INTO `wp_area` VALUES ('300', '六盘水', '10', '122');
INSERT INTO `wp_area` VALUES ('299', '遵义', '10', '121');
INSERT INTO `wp_area` VALUES ('298', '贵阳', '10', '120');
INSERT INTO `wp_area` VALUES ('297', '黔西南', '10', '119');
INSERT INTO `wp_area` VALUES ('296', '铜仁', '10', '118');
INSERT INTO `wp_area` VALUES ('295', '黔南', '10', '117');
INSERT INTO `wp_area` VALUES ('294', '黔东南', '10', '116');
INSERT INTO `wp_area` VALUES ('293', '毕节', '10', '115');
INSERT INTO `wp_area` VALUES ('292', 'None', '9', '114');
INSERT INTO `wp_area` VALUES ('291', '普洱', '8', '113');
INSERT INTO `wp_area` VALUES ('290', '临沧', '8', '112');
INSERT INTO `wp_area` VALUES ('289', '昭通', '8', '111');
INSERT INTO `wp_area` VALUES ('288', '丽江', '8', '110');
INSERT INTO `wp_area` VALUES ('287', '玉溪', '8', '109');
INSERT INTO `wp_area` VALUES ('286', '保山', '8', '108');
INSERT INTO `wp_area` VALUES ('285', '曲靖', '8', '107');
INSERT INTO `wp_area` VALUES ('284', '昆明', '8', '106');
INSERT INTO `wp_area` VALUES ('283', '迪庆', '8', '105');
INSERT INTO `wp_area` VALUES ('282', '大理', '8', '104');
INSERT INTO `wp_area` VALUES ('281', '西双版纳', '8', '103');
INSERT INTO `wp_area` VALUES ('280', '德宏', '8', '102');
INSERT INTO `wp_area` VALUES ('279', '怒江', '8', '101');
INSERT INTO `wp_area` VALUES ('278', '楚雄', '8', '100');
INSERT INTO `wp_area` VALUES ('277', '文山', '8', '99');
INSERT INTO `wp_area` VALUES ('276', '红河', '8', '98');
INSERT INTO `wp_area` VALUES ('275', '固原', '7', '97');
INSERT INTO `wp_area` VALUES ('274', '中卫', '7', '96');
INSERT INTO `wp_area` VALUES ('273', '石嘴山', '7', '95');
INSERT INTO `wp_area` VALUES ('272', '吴忠', '7', '94');
INSERT INTO `wp_area` VALUES ('271', '银川', '7', '93');
INSERT INTO `wp_area` VALUES ('270', '西宁', '6', '92');
INSERT INTO `wp_area` VALUES ('269', '海西', '6', '91');
INSERT INTO `wp_area` VALUES ('268', '黄南', '6', '90');
INSERT INTO `wp_area` VALUES ('267', '海北', '6', '89');
INSERT INTO `wp_area` VALUES ('266', '海东', '6', '88');
INSERT INTO `wp_area` VALUES ('265', '玉树', '6', '87');
INSERT INTO `wp_area` VALUES ('264', '果洛', '6', '86');
INSERT INTO `wp_area` VALUES ('263', '海南', '6', '85');
INSERT INTO `wp_area` VALUES ('262', '平凉', '5', '84');
INSERT INTO `wp_area` VALUES ('261', '酒泉', '5', '83');
INSERT INTO `wp_area` VALUES ('260', '武威', '5', '82');
INSERT INTO `wp_area` VALUES ('259', '张掖', '5', '81');
INSERT INTO `wp_area` VALUES ('258', '白银', '5', '80');
INSERT INTO `wp_area` VALUES ('257', '天水', '5', '79');
INSERT INTO `wp_area` VALUES ('256', '嘉峪关', '5', '78');
INSERT INTO `wp_area` VALUES ('255', '金昌', '5', '77');
INSERT INTO `wp_area` VALUES ('254', '兰州', '5', '76');
INSERT INTO `wp_area` VALUES ('253', '临夏', '5', '75');
INSERT INTO `wp_area` VALUES ('252', '甘南', '5', '74');
INSERT INTO `wp_area` VALUES ('251', '陇南', '5', '73');
INSERT INTO `wp_area` VALUES ('250', '庆阳', '5', '72');
INSERT INTO `wp_area` VALUES ('249', '定西', '5', '71');
INSERT INTO `wp_area` VALUES ('248', '榆林', '4', '70');
INSERT INTO `wp_area` VALUES ('247', '安康', '4', '69');
INSERT INTO `wp_area` VALUES ('246', '延安', '4', '68');
INSERT INTO `wp_area` VALUES ('245', '汉中', '4', '67');
INSERT INTO `wp_area` VALUES ('244', '咸阳', '4', '66');
INSERT INTO `wp_area` VALUES ('243', '渭南', '4', '65');
INSERT INTO `wp_area` VALUES ('242', '铜川', '4', '64');
INSERT INTO `wp_area` VALUES ('241', '宝鸡', '4', '63');
INSERT INTO `wp_area` VALUES ('240', '西安', '4', '62');
INSERT INTO `wp_area` VALUES ('239', '商洛', '4', '61');
INSERT INTO `wp_area` VALUES ('238', '开县', '3', '60');
INSERT INTO `wp_area` VALUES ('237', '云阳', '3', '59');
INSERT INTO `wp_area` VALUES ('236', '奉节', '3', '58');
INSERT INTO `wp_area` VALUES ('235', '巫山', '3', '57');
INSERT INTO `wp_area` VALUES ('234', '丰都', '3', '56');
INSERT INTO `wp_area` VALUES ('233', '垫江', '3', '55');
INSERT INTO `wp_area` VALUES ('232', '武隆', '3', '54');
INSERT INTO `wp_area` VALUES ('231', '忠县', '3', '53');
INSERT INTO `wp_area` VALUES ('230', '渝北', '3', '52');
INSERT INTO `wp_area` VALUES ('229', '巴南', '3', '51');
INSERT INTO `wp_area` VALUES ('228', '万盛', '3', '50');
INSERT INTO `wp_area` VALUES ('227', '双桥', '3', '49');
INSERT INTO `wp_area` VALUES ('226', '巫溪', '3', '48');
INSERT INTO `wp_area` VALUES ('225', '黔江', '3', '47');
INSERT INTO `wp_area` VALUES ('224', '南岸', '3', '46');
INSERT INTO `wp_area` VALUES ('223', '北碚', '3', '45');
INSERT INTO `wp_area` VALUES ('222', '沙坪坝', '3', '44');
INSERT INTO `wp_area` VALUES ('221', '九龙坡', '3', '43');
INSERT INTO `wp_area` VALUES ('220', '大渡口', '3', '42');
INSERT INTO `wp_area` VALUES ('219', '江北', '3', '41');
INSERT INTO `wp_area` VALUES ('218', '涪陵', '3', '40');
INSERT INTO `wp_area` VALUES ('217', '渝中', '3', '39');
INSERT INTO `wp_area` VALUES ('216', '万州', '3', '38');
INSERT INTO `wp_area` VALUES ('215', '秀山', '3', '37');
INSERT INTO `wp_area` VALUES ('214', '石柱', '3', '36');
INSERT INTO `wp_area` VALUES ('213', '城口', '3', '35');
INSERT INTO `wp_area` VALUES ('212', '梁平', '3', '34');
INSERT INTO `wp_area` VALUES ('211', '潼南', '3', '33');
INSERT INTO `wp_area` VALUES ('210', '綦江', '3', '32');
INSERT INTO `wp_area` VALUES ('209', '长寿', '3', '31');
INSERT INTO `wp_area` VALUES ('208', '璧山', '3', '30');
INSERT INTO `wp_area` VALUES ('207', '荣昌', '3', '29');
INSERT INTO `wp_area` VALUES ('206', '大足', '3', '28');
INSERT INTO `wp_area` VALUES ('205', '铜梁', '3', '27');
INSERT INTO `wp_area` VALUES ('204', '南川', '3', '26');
INSERT INTO `wp_area` VALUES ('203', '江津', '3', '25');
INSERT INTO `wp_area` VALUES ('202', '永川', '3', '24');
INSERT INTO `wp_area` VALUES ('201', '合川', '3', '23');
INSERT INTO `wp_area` VALUES ('200', '彭水', '3', '22');
INSERT INTO `wp_area` VALUES ('199', '酉阳', '3', '21');
INSERT INTO `wp_area` VALUES ('198', '阿坝', '2', '20');
INSERT INTO `wp_area` VALUES ('197', '甘孜', '2', '19');
INSERT INTO `wp_area` VALUES ('196', '雅安', '2', '18');
INSERT INTO `wp_area` VALUES ('195', '巴中', '2', '17');
INSERT INTO `wp_area` VALUES ('194', '广安', '2', '16');
INSERT INTO `wp_area` VALUES ('193', '达州', '2', '15');
INSERT INTO `wp_area` VALUES ('192', '眉山', '2', '14');
INSERT INTO `wp_area` VALUES ('191', '宜宾', '2', '13');
INSERT INTO `wp_area` VALUES ('190', '南充', '2', '12');
INSERT INTO `wp_area` VALUES ('189', '内江', '2', '11');
INSERT INTO `wp_area` VALUES ('188', '乐山', '2', '10');
INSERT INTO `wp_area` VALUES ('187', '广元', '2', '9');
INSERT INTO `wp_area` VALUES ('186', '遂宁', '2', '8');
INSERT INTO `wp_area` VALUES ('185', '德阳', '2', '7');
INSERT INTO `wp_area` VALUES ('184', '绵阳', '2', '6');
INSERT INTO `wp_area` VALUES ('183', '攀枝花', '2', '5');
INSERT INTO `wp_area` VALUES ('182', '泸州', '2', '4');
INSERT INTO `wp_area` VALUES ('181', '自贡', '2', '3');
INSERT INTO `wp_area` VALUES ('180', '成都', '2', '2');
INSERT INTO `wp_area` VALUES ('179', '资阳', '2', '1');
INSERT INTO `wp_area` VALUES ('178', '凉山', '2', '0');
INSERT INTO `wp_area` VALUES ('309', '鞍山', '12', '131');
INSERT INTO `wp_area` VALUES ('310', '大连', '12', '132');
INSERT INTO `wp_area` VALUES ('311', '本溪', '12', '133');
INSERT INTO `wp_area` VALUES ('312', '抚顺', '12', '134');
INSERT INTO `wp_area` VALUES ('313', '锦州', '12', '135');
INSERT INTO `wp_area` VALUES ('314', '丹东', '12', '136');
INSERT INTO `wp_area` VALUES ('315', '阜新', '12', '137');
INSERT INTO `wp_area` VALUES ('316', '营口', '12', '138');
INSERT INTO `wp_area` VALUES ('317', '延边', '13', '139');
INSERT INTO `wp_area` VALUES ('318', '长春', '13', '140');
INSERT INTO `wp_area` VALUES ('319', '四平', '13', '141');
INSERT INTO `wp_area` VALUES ('320', '吉林', '13', '142');
INSERT INTO `wp_area` VALUES ('321', '通化', '13', '143');
INSERT INTO `wp_area` VALUES ('322', '辽源', '13', '144');
INSERT INTO `wp_area` VALUES ('323', '松原', '13', '145');
INSERT INTO `wp_area` VALUES ('324', '白山', '13', '146');
INSERT INTO `wp_area` VALUES ('325', '白城', '13', '147');
INSERT INTO `wp_area` VALUES ('326', '黑河', '14', '148');
INSERT INTO `wp_area` VALUES ('327', '牡丹江', '14', '149');
INSERT INTO `wp_area` VALUES ('328', '绥化', '14', '150');
INSERT INTO `wp_area` VALUES ('329', '哈尔滨', '14', '151');
INSERT INTO `wp_area` VALUES ('330', '大兴安岭', '14', '152');
INSERT INTO `wp_area` VALUES ('331', '鸡西', '14', '153');
INSERT INTO `wp_area` VALUES ('332', '齐齐哈尔', '14', '154');
INSERT INTO `wp_area` VALUES ('333', '双鸭山', '14', '155');
INSERT INTO `wp_area` VALUES ('334', '鹤岗', '14', '156');
INSERT INTO `wp_area` VALUES ('335', '伊春', '14', '157');
INSERT INTO `wp_area` VALUES ('336', '大庆', '14', '158');
INSERT INTO `wp_area` VALUES ('337', '七台河', '14', '159');
INSERT INTO `wp_area` VALUES ('338', '佳木斯', '14', '160');
INSERT INTO `wp_area` VALUES ('339', '乐东', '15', '161');
INSERT INTO `wp_area` VALUES ('340', '昌江', '15', '162');
INSERT INTO `wp_area` VALUES ('341', '白沙', '15', '163');
INSERT INTO `wp_area` VALUES ('342', '西沙', '15', '164');
INSERT INTO `wp_area` VALUES ('343', '琼中', '15', '165');
INSERT INTO `wp_area` VALUES ('344', '保亭', '15', '166');
INSERT INTO `wp_area` VALUES ('345', '陵水', '15', '167');
INSERT INTO `wp_area` VALUES ('346', '中沙', '15', '168');
INSERT INTO `wp_area` VALUES ('347', '南沙', '15', '169');
INSERT INTO `wp_area` VALUES ('348', '海口', '15', '170');
INSERT INTO `wp_area` VALUES ('349', '三亚', '15', '171');
INSERT INTO `wp_area` VALUES ('350', '五指山', '15', '172');
INSERT INTO `wp_area` VALUES ('351', '儋州', '15', '173');
INSERT INTO `wp_area` VALUES ('352', '琼海', '15', '174');
INSERT INTO `wp_area` VALUES ('353', '文昌', '15', '175');
INSERT INTO `wp_area` VALUES ('354', '东方', '15', '176');
INSERT INTO `wp_area` VALUES ('355', '万宁', '15', '177');
INSERT INTO `wp_area` VALUES ('356', '定安', '15', '178');
INSERT INTO `wp_area` VALUES ('357', '屯昌', '15', '179');
INSERT INTO `wp_area` VALUES ('358', '澄迈', '15', '180');
INSERT INTO `wp_area` VALUES ('359', '临高', '15', '181');
INSERT INTO `wp_area` VALUES ('360', '揭阳', '16', '182');
INSERT INTO `wp_area` VALUES ('361', '中山', '16', '183');
INSERT INTO `wp_area` VALUES ('362', '广州', '16', '184');
INSERT INTO `wp_area` VALUES ('363', '深圳', '16', '185');
INSERT INTO `wp_area` VALUES ('364', '韶关', '16', '186');
INSERT INTO `wp_area` VALUES ('365', '汕头', '16', '187');
INSERT INTO `wp_area` VALUES ('366', '珠海', '16', '188');
INSERT INTO `wp_area` VALUES ('367', '江门', '16', '189');
INSERT INTO `wp_area` VALUES ('368', '佛山', '16', '190');
INSERT INTO `wp_area` VALUES ('369', '茂名', '16', '191');
INSERT INTO `wp_area` VALUES ('370', '湛江', '16', '192');
INSERT INTO `wp_area` VALUES ('371', '惠州', '16', '193');
INSERT INTO `wp_area` VALUES ('372', '肇庆', '16', '194');
INSERT INTO `wp_area` VALUES ('373', '汕尾', '16', '195');
INSERT INTO `wp_area` VALUES ('374', '梅州', '16', '196');
INSERT INTO `wp_area` VALUES ('375', '阳江', '16', '197');
INSERT INTO `wp_area` VALUES ('376', '河源', '16', '198');
INSERT INTO `wp_area` VALUES ('377', '东莞', '16', '199');
INSERT INTO `wp_area` VALUES ('378', '清远', '16', '200');
INSERT INTO `wp_area` VALUES ('379', '潮州', '16', '201');
INSERT INTO `wp_area` VALUES ('380', '云浮', '16', '202');
INSERT INTO `wp_area` VALUES ('381', '贺州', '17', '203');
INSERT INTO `wp_area` VALUES ('382', '百色', '17', '204');
INSERT INTO `wp_area` VALUES ('383', '来宾', '17', '205');
INSERT INTO `wp_area` VALUES ('384', '河池', '17', '206');
INSERT INTO `wp_area` VALUES ('385', '崇左', '17', '207');
INSERT INTO `wp_area` VALUES ('386', '南宁', '17', '208');
INSERT INTO `wp_area` VALUES ('387', '桂林', '17', '209');
INSERT INTO `wp_area` VALUES ('388', '柳州', '17', '210');
INSERT INTO `wp_area` VALUES ('389', '北海', '17', '211');
INSERT INTO `wp_area` VALUES ('390', '梧州', '17', '212');
INSERT INTO `wp_area` VALUES ('391', '钦州', '17', '213');
INSERT INTO `wp_area` VALUES ('392', '防城港', '17', '214');
INSERT INTO `wp_area` VALUES ('393', '玉林', '17', '215');
INSERT INTO `wp_area` VALUES ('394', '贵港', '17', '216');
INSERT INTO `wp_area` VALUES ('395', '黄冈', '18', '217');
INSERT INTO `wp_area` VALUES ('396', '荆州', '18', '218');
INSERT INTO `wp_area` VALUES ('397', '随州', '18', '219');
INSERT INTO `wp_area` VALUES ('398', '咸宁', '18', '220');
INSERT INTO `wp_area` VALUES ('399', '神农架', '18', '221');
INSERT INTO `wp_area` VALUES ('400', '恩施', '18', '222');
INSERT INTO `wp_area` VALUES ('401', '武汉', '18', '223');
INSERT INTO `wp_area` VALUES ('402', '十堰', '18', '224');
INSERT INTO `wp_area` VALUES ('403', '黄石', '18', '225');
INSERT INTO `wp_area` VALUES ('404', '宜昌', '18', '226');
INSERT INTO `wp_area` VALUES ('405', '鄂州', '18', '227');
INSERT INTO `wp_area` VALUES ('406', '襄樊', '18', '228');
INSERT INTO `wp_area` VALUES ('407', '孝感', '18', '229');
INSERT INTO `wp_area` VALUES ('408', '荆门', '18', '230');
INSERT INTO `wp_area` VALUES ('409', '潜江', '18', '231');
INSERT INTO `wp_area` VALUES ('410', '仙桃', '18', '232');
INSERT INTO `wp_area` VALUES ('411', '天门', '18', '233');
INSERT INTO `wp_area` VALUES ('412', '永州', '19', '234');
INSERT INTO `wp_area` VALUES ('413', '郴州', '19', '235');
INSERT INTO `wp_area` VALUES ('414', '娄底', '19', '236');
INSERT INTO `wp_area` VALUES ('415', '怀化', '19', '237');
INSERT INTO `wp_area` VALUES ('416', '湘西', '19', '238');
INSERT INTO `wp_area` VALUES ('417', '长沙', '19', '239');
INSERT INTO `wp_area` VALUES ('418', '湘潭', '19', '240');
INSERT INTO `wp_area` VALUES ('419', '株洲', '19', '241');
INSERT INTO `wp_area` VALUES ('420', '邵阳', '19', '242');
INSERT INTO `wp_area` VALUES ('421', '衡阳', '19', '243');
INSERT INTO `wp_area` VALUES ('422', '常德', '19', '244');
INSERT INTO `wp_area` VALUES ('423', '岳阳', '19', '245');
INSERT INTO `wp_area` VALUES ('424', '益阳', '19', '246');
INSERT INTO `wp_area` VALUES ('425', '张家界', '19', '247');
INSERT INTO `wp_area` VALUES ('426', '漯河', '20', '248');
INSERT INTO `wp_area` VALUES ('427', '许昌', '20', '249');
INSERT INTO `wp_area` VALUES ('428', '南阳', '20', '250');
INSERT INTO `wp_area` VALUES ('429', '三门峡', '20', '251');
INSERT INTO `wp_area` VALUES ('430', '信阳', '20', '252');
INSERT INTO `wp_area` VALUES ('431', '商丘', '20', '253');
INSERT INTO `wp_area` VALUES ('432', '驻马店', '20', '254');
INSERT INTO `wp_area` VALUES ('433', '周口', '20', '255');
INSERT INTO `wp_area` VALUES ('434', '济源', '20', '256');
INSERT INTO `wp_area` VALUES ('435', '郑州', '20', '257');
INSERT INTO `wp_area` VALUES ('436', '洛阳', '20', '258');
INSERT INTO `wp_area` VALUES ('437', '开封', '20', '259');
INSERT INTO `wp_area` VALUES ('438', '安阳', '20', '260');
INSERT INTO `wp_area` VALUES ('439', '平顶山', '20', '261');
INSERT INTO `wp_area` VALUES ('440', '新乡', '20', '262');
INSERT INTO `wp_area` VALUES ('441', '鹤壁', '20', '263');
INSERT INTO `wp_area` VALUES ('442', '濮阳', '20', '264');
INSERT INTO `wp_area` VALUES ('443', '焦作', '20', '265');
INSERT INTO `wp_area` VALUES ('444', '屏东县', '21', '266');
INSERT INTO `wp_area` VALUES ('445', '澎湖县', '21', '267');
INSERT INTO `wp_area` VALUES ('446', '台东县', '21', '268');
INSERT INTO `wp_area` VALUES ('447', '花莲县', '21', '269');
INSERT INTO `wp_area` VALUES ('448', '台北市', '21', '270');
INSERT INTO `wp_area` VALUES ('449', '基隆市', '21', '271');
INSERT INTO `wp_area` VALUES ('450', '高雄市', '21', '272');
INSERT INTO `wp_area` VALUES ('451', '台南市', '21', '273');
INSERT INTO `wp_area` VALUES ('452', '台中市', '21', '274');
INSERT INTO `wp_area` VALUES ('453', '嘉义市', '21', '275');
INSERT INTO `wp_area` VALUES ('454', '新竹市', '21', '276');
INSERT INTO `wp_area` VALUES ('455', '宜兰县', '21', '277');
INSERT INTO `wp_area` VALUES ('456', '台北县', '21', '278');
INSERT INTO `wp_area` VALUES ('457', '新竹县', '21', '279');
INSERT INTO `wp_area` VALUES ('458', '桃园县', '21', '280');
INSERT INTO `wp_area` VALUES ('459', '台中县', '21', '281');
INSERT INTO `wp_area` VALUES ('460', '苗栗县', '21', '282');
INSERT INTO `wp_area` VALUES ('461', '南投县', '21', '283');
INSERT INTO `wp_area` VALUES ('462', '彰化县', '21', '284');
INSERT INTO `wp_area` VALUES ('463', '嘉义县', '21', '285');
INSERT INTO `wp_area` VALUES ('464', '云林县', '21', '286');
INSERT INTO `wp_area` VALUES ('465', '高雄县', '21', '287');
INSERT INTO `wp_area` VALUES ('466', '台南县', '21', '288');
INSERT INTO `wp_area` VALUES ('467', '房山', '22', '289');
INSERT INTO `wp_area` VALUES ('468', '大兴', '22', '290');
INSERT INTO `wp_area` VALUES ('469', '顺义', '22', '291');
INSERT INTO `wp_area` VALUES ('470', '通州', '22', '292');
INSERT INTO `wp_area` VALUES ('471', '昌平', '22', '293');
INSERT INTO `wp_area` VALUES ('472', '密云', '22', '294');
INSERT INTO `wp_area` VALUES ('473', '平谷', '22', '295');
INSERT INTO `wp_area` VALUES ('474', '延庆', '22', '296');
INSERT INTO `wp_area` VALUES ('475', '东城', '22', '297');
INSERT INTO `wp_area` VALUES ('476', '怀柔', '22', '298');
INSERT INTO `wp_area` VALUES ('477', '崇文', '22', '299');
INSERT INTO `wp_area` VALUES ('478', '西城', '22', '300');
INSERT INTO `wp_area` VALUES ('479', '朝阳', '22', '301');
INSERT INTO `wp_area` VALUES ('480', '宣武', '22', '302');
INSERT INTO `wp_area` VALUES ('481', '石景山', '22', '303');
INSERT INTO `wp_area` VALUES ('482', '丰台', '22', '304');
INSERT INTO `wp_area` VALUES ('483', '门头沟', '22', '305');
INSERT INTO `wp_area` VALUES ('484', '海淀', '22', '306');
INSERT INTO `wp_area` VALUES ('485', '衡水', '23', '307');
INSERT INTO `wp_area` VALUES ('486', '廊坊', '23', '308');
INSERT INTO `wp_area` VALUES ('487', '石家庄', '23', '309');
INSERT INTO `wp_area` VALUES ('488', '秦皇岛', '23', '310');
INSERT INTO `wp_area` VALUES ('489', '唐山', '23', '311');
INSERT INTO `wp_area` VALUES ('490', '邢台', '23', '312');
INSERT INTO `wp_area` VALUES ('491', '邯郸', '23', '313');
INSERT INTO `wp_area` VALUES ('492', '张家口', '23', '314');
INSERT INTO `wp_area` VALUES ('493', '保定', '23', '315');
INSERT INTO `wp_area` VALUES ('494', '沧州', '23', '316');
INSERT INTO `wp_area` VALUES ('495', '承德', '23', '317');
INSERT INTO `wp_area` VALUES ('496', '西青', '24', '318');
INSERT INTO `wp_area` VALUES ('497', '东丽', '24', '319');
INSERT INTO `wp_area` VALUES ('498', '北辰', '24', '320');
INSERT INTO `wp_area` VALUES ('499', '津南', '24', '321');
INSERT INTO `wp_area` VALUES ('500', '宁河', '24', '322');
INSERT INTO `wp_area` VALUES ('501', '武清', '24', '323');
INSERT INTO `wp_area` VALUES ('502', '静海', '24', '324');
INSERT INTO `wp_area` VALUES ('503', '宝坻', '24', '325');
INSERT INTO `wp_area` VALUES ('504', '和平', '24', '326');
INSERT INTO `wp_area` VALUES ('505', '河西', '24', '327');
INSERT INTO `wp_area` VALUES ('506', '河东', '24', '328');
INSERT INTO `wp_area` VALUES ('507', '河北', '24', '329');
INSERT INTO `wp_area` VALUES ('508', '南开', '24', '330');
INSERT INTO `wp_area` VALUES ('509', '塘沽', '24', '331');
INSERT INTO `wp_area` VALUES ('510', '红桥', '24', '332');
INSERT INTO `wp_area` VALUES ('511', '大港', '24', '333');
INSERT INTO `wp_area` VALUES ('512', '汉沽', '24', '334');
INSERT INTO `wp_area` VALUES ('513', '蓟县', '24', '335');
INSERT INTO `wp_area` VALUES ('514', '锡林郭勒', '25', '336');
INSERT INTO `wp_area` VALUES ('515', '兴安', '25', '337');
INSERT INTO `wp_area` VALUES ('516', '阿拉善', '25', '338');
INSERT INTO `wp_area` VALUES ('517', '呼和浩特', '25', '339');
INSERT INTO `wp_area` VALUES ('518', '乌海', '25', '340');
INSERT INTO `wp_area` VALUES ('519', '包头', '25', '341');
INSERT INTO `wp_area` VALUES ('520', '通辽', '25', '342');
INSERT INTO `wp_area` VALUES ('521', '赤峰', '25', '343');
INSERT INTO `wp_area` VALUES ('522', '呼伦贝尔', '25', '344');
INSERT INTO `wp_area` VALUES ('523', '鄂尔多斯', '25', '345');
INSERT INTO `wp_area` VALUES ('524', '乌兰察布', '25', '346');
INSERT INTO `wp_area` VALUES ('525', '巴彦淖尔', '25', '347');
INSERT INTO `wp_area` VALUES ('526', '吕梁', '26', '348');
INSERT INTO `wp_area` VALUES ('527', '临汾', '26', '349');
INSERT INTO `wp_area` VALUES ('528', '太原', '26', '350');
INSERT INTO `wp_area` VALUES ('529', '阳泉', '26', '351');
INSERT INTO `wp_area` VALUES ('530', '大同', '26', '352');
INSERT INTO `wp_area` VALUES ('531', '晋城', '26', '353');
INSERT INTO `wp_area` VALUES ('532', '长治', '26', '354');
INSERT INTO `wp_area` VALUES ('533', '晋中', '26', '355');
INSERT INTO `wp_area` VALUES ('534', '朔州', '26', '356');
INSERT INTO `wp_area` VALUES ('535', '忻州', '26', '357');
INSERT INTO `wp_area` VALUES ('536', '运城', '26', '358');
INSERT INTO `wp_area` VALUES ('537', '丽水', '27', '359');
INSERT INTO `wp_area` VALUES ('538', '台州', '27', '360');
INSERT INTO `wp_area` VALUES ('539', '杭州', '27', '361');
INSERT INTO `wp_area` VALUES ('540', '温州', '27', '362');
INSERT INTO `wp_area` VALUES ('541', '宁波', '27', '363');
INSERT INTO `wp_area` VALUES ('542', '湖州', '27', '364');
INSERT INTO `wp_area` VALUES ('543', '嘉兴', '27', '365');
INSERT INTO `wp_area` VALUES ('544', '金华', '27', '366');
INSERT INTO `wp_area` VALUES ('545', '绍兴', '27', '367');
INSERT INTO `wp_area` VALUES ('546', '舟山', '27', '368');
INSERT INTO `wp_area` VALUES ('547', '衢州', '27', '369');
INSERT INTO `wp_area` VALUES ('548', '镇江', '28', '370');
INSERT INTO `wp_area` VALUES ('549', '扬州', '28', '371');
INSERT INTO `wp_area` VALUES ('550', '宿迁', '28', '372');
INSERT INTO `wp_area` VALUES ('551', '泰州', '28', '373');
INSERT INTO `wp_area` VALUES ('552', '南京', '28', '374');
INSERT INTO `wp_area` VALUES ('553', '徐州', '28', '375');
INSERT INTO `wp_area` VALUES ('554', '无锡', '28', '376');
INSERT INTO `wp_area` VALUES ('555', '苏州', '28', '377');
INSERT INTO `wp_area` VALUES ('556', '常州', '28', '378');
INSERT INTO `wp_area` VALUES ('557', '连云港', '28', '379');
INSERT INTO `wp_area` VALUES ('558', '南通', '28', '380');
INSERT INTO `wp_area` VALUES ('559', '盐城', '28', '381');
INSERT INTO `wp_area` VALUES ('560', '淮安', '28', '382');
INSERT INTO `wp_area` VALUES ('561', '杨浦', '29', '383');
INSERT INTO `wp_area` VALUES ('562', '南汇', '29', '384');
INSERT INTO `wp_area` VALUES ('563', '宝山', '29', '385');
INSERT INTO `wp_area` VALUES ('564', '闵行', '29', '386');
INSERT INTO `wp_area` VALUES ('565', '浦东新', '29', '387');
INSERT INTO `wp_area` VALUES ('566', '嘉定', '29', '388');
INSERT INTO `wp_area` VALUES ('567', '松江', '29', '389');
INSERT INTO `wp_area` VALUES ('568', '金山', '29', '390');
INSERT INTO `wp_area` VALUES ('569', '崇明', '29', '391');
INSERT INTO `wp_area` VALUES ('570', '奉贤', '29', '392');
INSERT INTO `wp_area` VALUES ('571', '青浦', '29', '393');
INSERT INTO `wp_area` VALUES ('572', '黄浦', '29', '394');
INSERT INTO `wp_area` VALUES ('573', '卢湾', '29', '395');
INSERT INTO `wp_area` VALUES ('574', '长宁', '29', '396');
INSERT INTO `wp_area` VALUES ('575', '徐汇', '29', '397');
INSERT INTO `wp_area` VALUES ('576', '普陀', '29', '398');
INSERT INTO `wp_area` VALUES ('577', '静安', '29', '399');
INSERT INTO `wp_area` VALUES ('578', '虹口', '29', '400');
INSERT INTO `wp_area` VALUES ('579', '闸北', '29', '401');
INSERT INTO `wp_area` VALUES ('580', '日照', '30', '402');
INSERT INTO `wp_area` VALUES ('581', '威海', '30', '403');
INSERT INTO `wp_area` VALUES ('582', '临沂', '30', '404');
INSERT INTO `wp_area` VALUES ('583', '莱芜', '30', '405');
INSERT INTO `wp_area` VALUES ('584', '聊城', '30', '406');
INSERT INTO `wp_area` VALUES ('585', '德州', '30', '407');
INSERT INTO `wp_area` VALUES ('586', '菏泽', '30', '408');
INSERT INTO `wp_area` VALUES ('587', '滨州', '30', '409');
INSERT INTO `wp_area` VALUES ('588', '济南', '30', '410');
INSERT INTO `wp_area` VALUES ('589', '淄博', '30', '411');
INSERT INTO `wp_area` VALUES ('590', '青岛', '30', '412');
INSERT INTO `wp_area` VALUES ('591', '东营', '30', '413');
INSERT INTO `wp_area` VALUES ('592', '枣庄', '30', '414');
INSERT INTO `wp_area` VALUES ('593', '潍坊', '30', '415');
INSERT INTO `wp_area` VALUES ('594', '烟台', '30', '416');
INSERT INTO `wp_area` VALUES ('595', '泰安', '30', '417');
INSERT INTO `wp_area` VALUES ('596', '济宁', '30', '418');
INSERT INTO `wp_area` VALUES ('597', '上饶', '31', '419');
INSERT INTO `wp_area` VALUES ('598', '抚州', '31', '420');
INSERT INTO `wp_area` VALUES ('599', '南昌', '31', '421');
INSERT INTO `wp_area` VALUES ('600', '萍乡', '31', '422');
INSERT INTO `wp_area` VALUES ('601', '景德镇', '31', '423');
INSERT INTO `wp_area` VALUES ('602', '新余', '31', '424');
INSERT INTO `wp_area` VALUES ('603', '九江', '31', '425');
INSERT INTO `wp_area` VALUES ('604', '赣州', '31', '426');
INSERT INTO `wp_area` VALUES ('605', '鹰潭', '31', '427');
INSERT INTO `wp_area` VALUES ('606', '宜春', '31', '428');
INSERT INTO `wp_area` VALUES ('607', '吉安', '31', '429');
INSERT INTO `wp_area` VALUES ('608', '福州', '32', '430');
INSERT INTO `wp_area` VALUES ('609', '莆田', '32', '431');
INSERT INTO `wp_area` VALUES ('610', '厦门', '32', '432');
INSERT INTO `wp_area` VALUES ('611', '泉州', '32', '433');
INSERT INTO `wp_area` VALUES ('612', '三明', '32', '434');
INSERT INTO `wp_area` VALUES ('613', '南平', '32', '435');
INSERT INTO `wp_area` VALUES ('614', '漳州', '32', '436');
INSERT INTO `wp_area` VALUES ('615', '宁德', '32', '437');
INSERT INTO `wp_area` VALUES ('616', '龙岩', '32', '438');
INSERT INTO `wp_area` VALUES ('617', '滁州', '33', '439');
INSERT INTO `wp_area` VALUES ('618', '黄山', '33', '440');
INSERT INTO `wp_area` VALUES ('619', '宿州', '33', '441');
INSERT INTO `wp_area` VALUES ('620', '阜阳', '33', '442');
INSERT INTO `wp_area` VALUES ('621', '六安', '33', '443');
INSERT INTO `wp_area` VALUES ('622', '巢湖', '33', '444');
INSERT INTO `wp_area` VALUES ('623', '池州', '33', '445');
INSERT INTO `wp_area` VALUES ('624', '亳州', '33', '446');
INSERT INTO `wp_area` VALUES ('625', '宣城', '33', '447');
INSERT INTO `wp_area` VALUES ('626', '合肥', '33', '448');
INSERT INTO `wp_area` VALUES ('627', '蚌埠', '33', '449');
INSERT INTO `wp_area` VALUES ('628', '芜湖', '33', '450');
INSERT INTO `wp_area` VALUES ('629', '马鞍山', '33', '451');
INSERT INTO `wp_area` VALUES ('630', '淮南', '33', '452');
INSERT INTO `wp_area` VALUES ('631', '铜陵', '33', '453');
INSERT INTO `wp_area` VALUES ('632', '淮北', '33', '454');
INSERT INTO `wp_area` VALUES ('633', '安庆', '33', '455');
INSERT INTO `wp_area` VALUES ('634', '那曲', '34', '456');
INSERT INTO `wp_area` VALUES ('635', '阿里', '34', '457');
INSERT INTO `wp_area` VALUES ('636', '林芝', '34', '458');
INSERT INTO `wp_area` VALUES ('637', '昌都', '34', '459');
INSERT INTO `wp_area` VALUES ('638', '山南', '34', '460');
INSERT INTO `wp_area` VALUES ('639', '日喀则', '34', '461');
INSERT INTO `wp_area` VALUES ('640', '拉萨', '34', '462');
INSERT INTO `wp_area` VALUES ('641', '博尔塔拉', '35', '463');
INSERT INTO `wp_area` VALUES ('642', '吐鲁番', '35', '464');
INSERT INTO `wp_area` VALUES ('643', '哈密', '35', '465');
INSERT INTO `wp_area` VALUES ('644', '昌吉', '35', '466');
INSERT INTO `wp_area` VALUES ('645', '和田', '35', '467');
INSERT INTO `wp_area` VALUES ('646', '喀什', '35', '468');
INSERT INTO `wp_area` VALUES ('647', '克孜勒苏', '35', '469');
INSERT INTO `wp_area` VALUES ('648', '巴音郭楞', '35', '470');
INSERT INTO `wp_area` VALUES ('649', '阿克苏', '35', '471');
INSERT INTO `wp_area` VALUES ('650', '伊犁', '35', '472');
INSERT INTO `wp_area` VALUES ('651', '塔城', '35', '473');
INSERT INTO `wp_area` VALUES ('652', '乌鲁木齐', '35', '474');
INSERT INTO `wp_area` VALUES ('653', '阿勒泰', '35', '475');
INSERT INTO `wp_area` VALUES ('654', '克拉玛依', '35', '476');
INSERT INTO `wp_area` VALUES ('655', '石河子', '35', '477');
INSERT INTO `wp_area` VALUES ('656', '图木舒克', '35', '478');
INSERT INTO `wp_area` VALUES ('657', '阿拉尔', '35', '479');
INSERT INTO `wp_area` VALUES ('658', '五家渠', '35', '480');

-- ----------------------------
-- Table structure for `wp_article_style`
-- ----------------------------
DROP TABLE IF EXISTS `wp_article_style`;
CREATE TABLE `wp_article_style` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `group_id` int(10) DEFAULT '0' COMMENT '分组样式',
  `style` text COMMENT '样式内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_article_style
-- ----------------------------
INSERT INTO `wp_article_style` VALUES ('1', '1', '<section style=\"border: 0px none; padding: 0px; box-sizing: border-box; margin: 0px; font-family: 微软雅黑;\"><section class=\"main\" style=\"border: none rgb(0,187,236); margin: 0.8em 5% 0.3em; box-sizing: border-box; padding: 0px;\"><section class=\"main2 wxqq-color wxqq-bordertopcolor wxqq-borderleftcolor wxqq-borderrightcolor wxqq-borderbottomcolor\" data-brushtype=\"text\" style=\"color: rgb(0,187,236); font-size: 20px; letter-spacing: 3px; padding: 9px 4px 14px; text-align: center; margin: 0px auto; border: 4px solid rgb(0,187,236); border-top-left-radius: 8px; border-top-right-radius: 8px; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; box-sizing: border-box;\">理念<span class=\"main3 wxqq-color\" data-brushtype=\"text\" style=\"display: block; font-size: 10px; line-height: 12px; border-color: rgb(0,187,236); color: inherit; box-sizing: border-box; padding: 0px; margin: 0px;\">PHILOSOPHY</span></section><section class=\"main4 wxqq-bordertopcolor wxqq-borderbottomcolor\" style=\"width: 0px; margin-right: auto; margin-left: auto; border-top-width: 0.6em; border-top-style: solid; border-bottom-color: rgb(0,187,236); border-top-color: rgb(0,187,236); height: 10px; color: inherit; border-left-width: 0.7em !important; border-left-style: solid !important; border-left-color: transparent !important; border-right-width: 0.7em !important; border-right-style: solid !important; border-right-color: transparent !important; box-sizing: border-box; padding: 0px;\" data-width=\"0px\"></section></section></section>');
INSERT INTO `wp_article_style` VALUES ('2', '3', '<section label=\"Copyright © 2015 playhudong All Rights Reserved.\" style=\"\r\nmargin:1em auto;\r\npadding: 1em 2em;\r\nborder-style: none;\" id=\"shifu_c_001\"><span style=\"\r\nfloat: left;\r\nmargin-left: 19px;\r\nmargin-top: -9px;\r\noverflow: hidden;\r\ndisplay:block;\"><img style=\"\r\nvertical-align: top;\r\ndisplay:inline-block;\" src=\"http://1251001145.cdn.myqcloud.com/1251001145/style/images/card-3.gif\"><section class=\"color\" style=\"\r\nmin-height: 30px;\r\ncolor: #fff;\r\ndisplay: inline-block;\r\ntext-align: center;\r\nbackground: #999999;\r\nfont-size: 15px;\r\npadding: 7px 5px;\r\nmin-width: 30px;\"><span style=\"font-size:15px;\"> 01 </span></section></span><section style=\"\r\npadding: 16px;\r\npadding-top: 28px;\r\nborder: 2px solid #999999;\r\nwidth: 100%;\r\nfont-size: 14px;\r\nline-height: 1.4;\"><span>星期一天气晴我离开你／不带任何行李／除了一本陪我放逐的日记／今天天晴／心情很低／突然决定离开你</span></section></section>');
INSERT INTO `wp_article_style` VALUES ('3', '1', '<section><section class=\"wxqq-borderleftcolor wxqq-borderRightcolor wxqq-bordertopcolor wxqq-borderbottomcolor\" style=\"border:5px solid #A50003;padding:5px;width:100%;\"><section class=\"wxqq-borderleftcolor wxqq-borderRightcolor wxqq-bordertopcolor wxqq-borderbottomcolor\" style=\"border:1px solid #A50003;padding:15px 20px;\"><p style=\"color:#A50003;text-align:center;border-bottom:1px solid #A50003\"><span class=\"wxqq-color\" data-brushtype=\"text\" style=\"font-size:48px\">情人节快乐</span></p><section data-style=\"color:#A50003;text-align:center;font-size:18px\" style=\"color:#A50003;text-align:center;width:96%;margin-left:5px;\"><p class=\"wxqq-color\" style=\"color:#A50003;text-align:center;font-size:18px\">happy valentine\'s day<span style=\"color:inherit; font-size:24px; line-height:1.6em; text-align:right; text-indent:2em\"></span><span style=\"color:rgb(227, 108, 9); font-size:24px; line-height:1.6em; text-align:right; text-indent:2em\"></span></p><section style=\"width:100%;\"><section><section><p style=\"color:#000;text-align:left;\">我们没有秘密，整天花前月下，别人以为我们不懂爱情，我们乐呵呵地笑大人们都太傻。</p></section></section></section></section></section></section></section>');
INSERT INTO `wp_article_style` VALUES ('4', '4', '<p><img src=\"http://www.wxbj.cn//ys/gz/gx2.gif\"></p>');
INSERT INTO `wp_article_style` VALUES ('5', '5', '<section class=\"tn-Powered-by-XIUMI\" style=\"margin-top: 0.5em; margin-bottom: 0.5em; border: none rgb(142, 201, 101); font-size: 14px; font-family: inherit; font-weight: inherit; text-decoration: inherit; color: rgb(142, 201, 101);\"><img data-src=\"http://mmbiz.qpic.cn/mmbiz/4HiaqFGEibVwaxcmNMU5abRHm7bkZ9icUxC3DrlItWpOnXSjEpZXIeIr2K0923xw43aKw8oibucqm8wkMYZvmibqDkg/0?wx_fmt=png\" class=\"tn-Powered-by-XIUMI\" data-type=\"png\" data-ratio=\"0.8055555555555556\" data-w=\"36\" _width=\"2.6em\" src=\"https://mmbiz.qlogo.cn/mmbiz/4HiaqFGEibVwaxcmNMU5abRHm7bkZ9icUxC3DrlItWpOnXSjEpZXIeIr2K0923xw43aKw8oibucqm8wkMYZvmibqDkg/640?wx_fmt=png\" style=\"float: right; width: 2.6em !important; visibility: visible !important; background-color: rgb(142, 201, 101);\"><section class=\"tn-Powered-by-XIUMI\" style=\"clear: both;\"></section><section class=\"tn-Powered-by-XIUMI\" style=\"padding-right: 10px; padding-left: 10px; text-align: center;\"><section class=\"tn-Powered-by-XIUMI\" style=\"text-align: left;\">炎热的夏季，应该吃点什么好呢！我们为您打造7月盛夏美食狂欢季，清暑解渴的热带水果之王【芒果下午茶】，海鲜盛宴上的【生蚝狂欢】，肉食者的天堂【澳洲之夜】，呼朋唤友，户外聚餐的最佳攻略【夏季BBQ】，消暑瘦身利器【迷你冬瓜盅】，清淡亦或重口味，总有一款是你所爱！</section></section><img data-src=\"http://mmbiz.qpic.cn/mmbiz/4HiaqFGEibVwaxcmNMU5abRHm7bkZ9icUxCkEmrfLmAXYYOXO0q4RGYsQqfzhO6SOdoFCTqYqwlS87ovGrQjCYmWw/0?wx_fmt=png\" class=\"tn-Powered-by-XIUMI\" data-type=\"png\" data-ratio=\"0.8055555555555556\" data-w=\"36\" _width=\"2.6em\" src=\"https://mmbiz.qlogo.cn/mmbiz/4HiaqFGEibVwaxcmNMU5abRHm7bkZ9icUxCkEmrfLmAXYYOXO0q4RGYsQqfzhO6SOdoFCTqYqwlS87ovGrQjCYmWw/640?wx_fmt=png\" style=\"width: 2.6em !important; visibility: visible !important; background-color: rgb(142, 201, 101);\"><p><br></p></section>');
INSERT INTO `wp_article_style` VALUES ('8', '6', '<blockquote class=\"wxqq-borderTopColor wxqq-borderRightColor wxqq-borderBottomColor wxqq-borderLeftColor\" style=\"border: 3px dotted rgb(230, 37, 191); padding: 10px; margin: 10px 0px; font-weight: normal; border-top-left-radius: 5px !important; border-top-right-radius: 5px !important; border-bottom-right-radius: 5px !important; border-bottom-left-radius: 5px !important;\"><h3 style=\"color:rgb(89,89,89);font-size:14px;margin:0;\"><span class=\"wxqq-bg\" style=\"background-color: rgb(230, 37, 191); color: rgb(255, 255, 255); padding: 2px 5px; font-size: 14px; margin-right: 15px; border-top-left-radius: 5px !important; border-top-right-radius: 5px !important; border-bottom-right-radius: 5px !important; border-bottom-left-radius: 5px !important;\">微信编辑器</span>微信号：<span class=\"wxqq-bg\" style=\"background-color: rgb(230, 37, 191); color: rgb(255, 255, 255); padding: 2px 5px; font-size: 14px; border-top-left-radius: 5px !important; border-top-right-radius: 5px !important; border-bottom-right-radius: 5px !important; border-bottom-left-radius: 5px !important;\">wxbj.cn</span></h3><p style=\"margin:10px 0 5px 0;\">微信公众号简介，欢迎使用微信在线图文排版编辑器助手！</p></blockquote>');
INSERT INTO `wp_article_style` VALUES ('9', '8', '<p><img src=\"http://www.wxbj.cn/ys/gz/yw1.gif\"></p>');
INSERT INTO `wp_article_style` VALUES ('7', '7', '<p><img src=\"https://mmbiz.qlogo.cn/mmbiz/cZV2hRpuAPhuxibIOsThcH7HF1lpQ0Yvkvh88U3ia9AbTPJSmriawnJ7W7S5iblSlSianbHLGO6IvD0N4g2y2JEFRoA/0/mmbizgif\"></p>');

-- ----------------------------
-- Table structure for `wp_article_style_group`
-- ----------------------------
DROP TABLE IF EXISTS `wp_article_style_group`;
CREATE TABLE `wp_article_style_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `group_name` varchar(255) DEFAULT NULL COMMENT '分组名称',
  `desc` text COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_article_style_group
-- ----------------------------
INSERT INTO `wp_article_style_group` VALUES ('1', '标题', '标题样式');
INSERT INTO `wp_article_style_group` VALUES ('3', '卡片', '类卡片样式');
INSERT INTO `wp_article_style_group` VALUES ('4', '关注', '引导关注公众号的样式');
INSERT INTO `wp_article_style_group` VALUES ('5', '内容', '内容样式');
INSERT INTO `wp_article_style_group` VALUES ('6', '互推', '互推公众号的样式');
INSERT INTO `wp_article_style_group` VALUES ('7', '分割', '分割样式');
INSERT INTO `wp_article_style_group` VALUES ('8', '原文引导', '原文引导样式');

-- ----------------------------
-- Table structure for `wp_ask`
-- ----------------------------
DROP TABLE IF EXISTS `wp_ask`;
CREATE TABLE `wp_ask` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(100) NOT NULL COMMENT '关键词',
  `keyword_type` tinyint(2) DEFAULT NULL COMMENT '关键词类型',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `intro` text COMMENT '封面简介',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `cover` int(10) unsigned DEFAULT NULL COMMENT '封面图片',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `finish_tip` text COMMENT '结束语',
  `content` text COMMENT '活动介绍',
  `shop_address` text COMMENT '商家地址',
  `appids` text COMMENT '提示关注的公众号',
  `finish_button` text COMMENT '成功抢答完后显示的按钮',
  `card_id` varchar(255) DEFAULT NULL COMMENT '卡券ID',
  `appsecre` varchar(255) DEFAULT NULL COMMENT '卡券对应的appsecre',
  `template` varchar(255) DEFAULT 'default' COMMENT '素材模板',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_ask
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_ask_answer`
-- ----------------------------
DROP TABLE IF EXISTS `wp_ask_answer`;
CREATE TABLE `wp_ask_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `answer` text COMMENT '回答内容',
  `openid` varchar(255) DEFAULT NULL COMMENT 'OpenId',
  `uid` int(10) DEFAULT NULL COMMENT '用户UID',
  `question_id` int(10) unsigned DEFAULT NULL COMMENT 'question_id',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `ask_id` int(10) unsigned DEFAULT NULL COMMENT 'ask_id',
  `is_correct` tinyint(2) DEFAULT '1' COMMENT '是否回答正确',
  `times` int(4) DEFAULT '0' COMMENT '次数',
  PRIMARY KEY (`id`),
  KEY `ask_id_uid` (`ask_id`,`uid`) USING BTREE,
  KEY `question_uid` (`uid`,`question_id`,`times`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_ask_answer
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_ask_question`
-- ----------------------------
DROP TABLE IF EXISTS `wp_ask_question`;
CREATE TABLE `wp_ask_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `intro` text COMMENT '问题描述',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `is_must` tinyint(2) DEFAULT '1' COMMENT '是否必填',
  `extra` text NOT NULL COMMENT '参数',
  `type` char(50) NOT NULL DEFAULT 'radio' COMMENT '问题类型',
  `ask_id` int(10) unsigned DEFAULT NULL COMMENT 'ask_id',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序号',
  `answer` varchar(255) NOT NULL COMMENT '正确答案',
  `is_last` tinyint(2) DEFAULT '0' COMMENT '是否最后一题',
  `wait_time` int(10) DEFAULT '0' COMMENT '等待时间',
  `percent` int(10) DEFAULT '100' COMMENT '抢中概率',
  `answer_time` int(10) DEFAULT NULL COMMENT '答题时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_ask_question
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `wp_attachment`;
CREATE TABLE `wp_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT '0' COMMENT '用户ID',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '附件显示名',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '附件类型',
  `source` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '资源ID',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联记录ID',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `size` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '附件大小',
  `dir` int(12) unsigned NOT NULL DEFAULT '0' COMMENT '上级目录ID',
  `sort` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `idx_record_status` (`record_id`,`status`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='附件表';

-- ----------------------------
-- Records of wp_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_auth_extend`
-- ----------------------------
DROP TABLE IF EXISTS `wp_auth_extend`;
CREATE TABLE `wp_auth_extend` (
  `group_id` mediumint(10) unsigned NOT NULL COMMENT '用户id',
  `extend_id` mediumint(8) unsigned NOT NULL COMMENT '扩展表中数据的id',
  `type` tinyint(1) unsigned NOT NULL COMMENT '扩展类型标识 1:栏目分类权限;2:模型权限',
  UNIQUE KEY `group_extend_type` (`group_id`,`extend_id`,`type`) USING BTREE,
  KEY `uid` (`group_id`) USING BTREE,
  KEY `group_id` (`extend_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组与分类的对应关系表';

-- ----------------------------
-- Records of wp_auth_extend
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `wp_auth_group`;
CREATE TABLE `wp_auth_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(30) DEFAULT NULL COMMENT '分组名称',
  `icon` int(10) unsigned DEFAULT NULL COMMENT '图标',
  `description` text COMMENT '描述信息',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态',
  `type` tinyint(2) DEFAULT '1' COMMENT '类型',
  `rules` text COMMENT '权限',
  `manager_id` int(10) DEFAULT '0' COMMENT '管理员ID',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `is_default` tinyint(1) DEFAULT '0' COMMENT '是否默认自动加入',
  `qr_code` varchar(255) DEFAULT NULL COMMENT '微信二维码',
  `wechat_group_id` int(10) DEFAULT '-1' COMMENT '微信端的分组ID',
  `wechat_group_name` varchar(100) DEFAULT NULL COMMENT '微信端的分组名',
  `wechat_group_count` int(10) DEFAULT NULL COMMENT '微信端用户数',
  `is_del` tinyint(1) DEFAULT '0' COMMENT '是否已删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_auth_group
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `wp_auth_group_access`;
CREATE TABLE `wp_auth_group_access` (
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_auth_group_access
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `wp_auth_rule`;
CREATE TABLE `wp_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  `group` char(30) DEFAULT '默认分组',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=281 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_auto_reply`
-- ----------------------------
DROP TABLE IF EXISTS `wp_auto_reply`;
CREATE TABLE `wp_auto_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(255) NOT NULL COMMENT '关键词',
  `msg_type` char(50) DEFAULT 'text' COMMENT '消息类型',
  `content` text COMMENT '文本内容',
  `group_id` int(10) DEFAULT NULL COMMENT '图文',
  `image_id` int(10) unsigned DEFAULT NULL COMMENT '上传图片',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(50) DEFAULT NULL COMMENT 'Token',
  `image_material` int(10) DEFAULT NULL COMMENT '素材图片id',
  `voice_id` int(10) DEFAULT NULL COMMENT '语音素材id',
  `video_id` int(10) DEFAULT NULL COMMENT '视频素材id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_auto_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_business_card`
-- ----------------------------
DROP TABLE IF EXISTS `wp_business_card`;
CREATE TABLE `wp_business_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT NULL COMMENT '用户ID',
  `truename` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '真实姓名',
  `position` varchar(50) DEFAULT NULL COMMENT '职位头衔',
  `mobile` varchar(30) DEFAULT NULL COMMENT '手机',
  `company` varchar(100) DEFAULT NULL COMMENT '公司名称',
  `department` varchar(50) DEFAULT NULL COMMENT '所属部门',
  `service` text COMMENT '产品服务',
  `company_url` varchar(255) DEFAULT NULL COMMENT '公司网址',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `telephone` varchar(30) DEFAULT NULL COMMENT '座机',
  `Email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `wechat` varchar(50) DEFAULT NULL COMMENT '微信号',
  `qq` varchar(30) DEFAULT NULL COMMENT 'QQ号',
  `weibo` varchar(255) DEFAULT NULL COMMENT '微博',
  `tag` varchar(255) DEFAULT NULL COMMENT '人物标签',
  `wishing` varchar(100) DEFAULT NULL COMMENT '希望结交',
  `interest` varchar(255) DEFAULT NULL COMMENT '兴趣',
  `personal_url` varchar(255) DEFAULT NULL COMMENT '个人主页',
  `intro` text COMMENT '个人介绍',
  `headface` int(10) unsigned DEFAULT NULL COMMENT '头像',
  `permission` char(50) DEFAULT '1' COMMENT '权限设置',
  `template` varchar(50) DEFAULT NULL COMMENT '选择的模板',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_business_card
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_business_card_collect`
-- ----------------------------
DROP TABLE IF EXISTS `wp_business_card_collect`;
CREATE TABLE `wp_business_card_collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `from_uid` int(10) DEFAULT NULL COMMENT '收藏人ID',
  `to_uid` int(10) DEFAULT NULL COMMENT '被收藏人的ID',
  `cTime` int(10) DEFAULT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_business_card_collect
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_business_card_column`
-- ----------------------------
DROP TABLE IF EXISTS `wp_business_card_column`;
CREATE TABLE `wp_business_card_column` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `type` char(10) DEFAULT '0' COMMENT '栏目类型',
  `cate_id` varchar(100) DEFAULT '0' COMMENT '分类',
  `title` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  `url` varchar(255) DEFAULT NULL COMMENT '跳转url',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  `business_card_id` int(10) DEFAULT NULL COMMENT '名片id',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_business_card_column
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_buy_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_buy_log`;
CREATE TABLE `wp_buy_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pay` float DEFAULT NULL COMMENT '消费金额',
  `sn_id` int(10) DEFAULT NULL COMMENT '优惠卷',
  `pay_type` char(10) DEFAULT NULL COMMENT '支付方式',
  `branch_id` int(10) DEFAULT '0' COMMENT '消费门店',
  `member_id` int(10) DEFAULT NULL COMMENT '会员卡id',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_buy_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_coupons`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_coupons`;
CREATE TABLE `wp_card_coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `give_type` tinyint(2) DEFAULT NULL COMMENT '发放方式',
  `title` varchar(255) NOT NULL COMMENT '优惠券标题',
  `end_date` int(10) DEFAULT NULL COMMENT '结束时间',
  `start_date` int(10) NOT NULL COMMENT '开始时间',
  `content` text NOT NULL COMMENT '使用说明',
  `cTime` int(10) DEFAULT NULL COMMENT '发布时间',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_coupons
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_custom`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_custom`;
CREATE TABLE `wp_card_custom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(50) DEFAULT NULL COMMENT 'Token',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `score` int(10) DEFAULT '0' COMMENT '积分数',
  `coupon_id` int(10) DEFAULT NULL COMMENT '商城优惠券',
  `is_show` tinyint(2) DEFAULT '0' COMMENT '是否在会员卡界面展示',
  `start_time` int(10) DEFAULT NULL COMMENT '节日时间',
  `end_time` int(10) DEFAULT NULL COMMENT '赠送时间',
  `title` varchar(100) DEFAULT NULL COMMENT '活动名称',
  `type` tinyint(2) DEFAULT '0' COMMENT '活动策略',
  `content` text COMMENT '活动说明',
  `member` int(10) DEFAULT NULL COMMENT '适用人群',
  `is_birthday` tinyint(2) DEFAULT '0' COMMENT '节日类型',
  `before_day` tinyint(2) DEFAULT '1' COMMENT '生日前',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_custom
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_level`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_level`;
CREATE TABLE `wp_card_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `level` varchar(255) DEFAULT NULL COMMENT '会员等级',
  `score` int(10) DEFAULT NULL COMMENT '累计积分',
  `recharge` int(10) DEFAULT NULL COMMENT '累计充值',
  `discount` int(10) DEFAULT NULL COMMENT '折扣率',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_level
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_marketing`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_marketing`;
CREATE TABLE `wp_card_marketing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '活动名称',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '结束时间',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态',
  `type` char(50) DEFAULT NULL COMMENT '活动类型',
  `give_type` char(10) DEFAULT NULL COMMENT '赠送类型',
  `give` int(10) DEFAULT NULL COMMENT '赠送数据',
  `condition` int(10) DEFAULT NULL COMMENT '赠送条件',
  `branch_id` int(10) DEFAULT NULL COMMENT '充值门店',
  `grade` int(10) DEFAULT NULL COMMENT '适用人群',
  `exchange_count` int(10) DEFAULT NULL COMMENT '兑换次数',
  `open_give_rule` tinyint(2) DEFAULT '0' COMMENT '启用赠送规则',
  `enjoy_power` tinyint(2) DEFAULT '0' COMMENT '消费享受权限',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_marketing
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_member`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_member`;
CREATE TABLE `wp_card_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `number` varchar(50) DEFAULT NULL COMMENT '卡号',
  `cTime` int(10) DEFAULT NULL COMMENT '加入时间',
  `phone` varchar(30) DEFAULT NULL COMMENT '手机号',
  `username` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '姓名',
  `uid` int(10) DEFAULT NULL COMMENT '用户UID',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `recharge` int(10) DEFAULT '0' COMMENT '余额',
  `status` tinyint(2) DEFAULT '1' COMMENT '会员状态',
  `birthday` int(10) DEFAULT NULL COMMENT '生日',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `level` int(10) DEFAULT '0' COMMENT '会员卡等级',
  `sex` int(10) DEFAULT NULL COMMENT '性别',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_member
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_notice`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_notice`;
CREATE TABLE `wp_card_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cTime` int(10) DEFAULT NULL COMMENT '发布时间',
  `content` text NOT NULL COMMENT '通知内容',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `img` int(10) unsigned DEFAULT NULL COMMENT '通知图片',
  `grade` varchar(100) DEFAULT '0' COMMENT '适用人群',
  `to_uid` int(10) DEFAULT '0' COMMENT '指定用户',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_privilege`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_privilege`;
CREATE TABLE `wp_card_privilege` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '特权标题',
  `grade` varchar(100) DEFAULT NULL COMMENT '适用人群',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '结束时间',
  `intro` text COMMENT '使用说明',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `enable` tinyint(2) DEFAULT '1' COMMENT '是否启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_privilege
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_recharge`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_recharge`;
CREATE TABLE `wp_card_recharge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(50) DEFAULT NULL COMMENT 'Token',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `goods_ids` text COMMENT '指定商品ID串',
  `is_all_goods` tinyint(2) DEFAULT '0' COMMENT '适用的活动商品',
  `is_mult` tinyint(2) DEFAULT '0' COMMENT '多级优惠',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '过期时间',
  `title` varchar(100) DEFAULT NULL COMMENT '活动名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_recharge
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_recharge_condition`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_recharge_condition`;
CREATE TABLE `wp_card_recharge_condition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `money_param` decimal(11,2) DEFAULT NULL COMMENT '现金参数',
  `money` tinyint(2) DEFAULT NULL COMMENT '现在开关',
  `reward_id` int(10) DEFAULT NULL COMMENT '活动ID',
  `sort` int(10) DEFAULT '0' COMMENT '排序号',
  `condition` decimal(11,2) DEFAULT NULL COMMENT '条件',
  `score` tinyint(2) DEFAULT '0' COMMENT '积分开关',
  `score_param` int(10) DEFAULT NULL COMMENT '积分参数',
  `shop_coupon` tinyint(2) DEFAULT '0' COMMENT '优惠券开关',
  `shop_coupon_param` int(10) DEFAULT NULL COMMENT '优惠券ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_recharge_condition
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_reward`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_reward`;
CREATE TABLE `wp_card_reward` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(50) DEFAULT NULL COMMENT 'Token',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '过期时间',
  `title` varchar(100) DEFAULT NULL COMMENT '活动名称',
  `type` tinyint(2) DEFAULT '0' COMMENT '活动策略',
  `score` int(10) DEFAULT '0' COMMENT '积分数',
  `coupon_id` int(10) DEFAULT NULL COMMENT '商城优惠券',
  `is_show` tinyint(2) DEFAULT '0' COMMENT '是否在用户领卡界面展示',
  `content` text COMMENT '活动说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_reward
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_score`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_score`;
CREATE TABLE `wp_card_score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(50) DEFAULT NULL COMMENT 'Token',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `num_limit` int(10) DEFAULT '0' COMMENT '兑换次数限制',
  `coupon_id` int(10) DEFAULT NULL COMMENT '商城优惠券',
  `score_limit` int(10) DEFAULT '0' COMMENT '所需积分',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '过期时间',
  `title` varchar(100) DEFAULT NULL COMMENT '活动名称',
  `member` varchar(100) DEFAULT '0' COMMENT '适用人群',
  `coupon_type` int(10) DEFAULT '0' COMMENT '优惠券类型',
  `cover_id` int(10) unsigned DEFAULT NULL COMMENT '活动图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_score
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_card_vouchers`
-- ----------------------------
DROP TABLE IF EXISTS `wp_card_vouchers`;
CREATE TABLE `wp_card_vouchers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content` text COMMENT '活动介绍',
  `code` text COMMENT '卡券code码',
  `appsecre` varchar(255) DEFAULT NULL COMMENT '开通卡券的商家公众号密钥',
  `openid` text COMMENT 'OpenID',
  `card_id` varchar(100) DEFAULT NULL COMMENT '卡券ID',
  `balance` varchar(30) DEFAULT NULL COMMENT '红包余额',
  `cover` int(10) unsigned DEFAULT NULL COMMENT '素材封面',
  `background` int(10) unsigned DEFAULT NULL COMMENT '背景图',
  `title` varchar(255) DEFAULT '卡券' COMMENT '卡券标题',
  `button_color` varchar(255) DEFAULT '#0dbd02' COMMENT '领取按钮颜色',
  `head_bg_color` varchar(255) DEFAULT '#35a2dd' COMMENT '头部背景颜色',
  `shop_logo` int(10) unsigned DEFAULT NULL COMMENT '商家LOGO',
  `shop_name` varchar(255) DEFAULT NULL COMMENT '商家名称',
  `more_button` text COMMENT '添加更多按钮',
  `template` varchar(255) DEFAULT 'default' COMMENT '素材模板',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `token` varchar(50) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_card_vouchers
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_channel`
-- ----------------------------
DROP TABLE IF EXISTS `wp_channel`;
CREATE TABLE `wp_channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '频道ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级频道ID',
  `title` char(30) NOT NULL COMMENT '频道标题',
  `url` char(100) NOT NULL COMMENT '频道连接',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '导航排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `target` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_channel
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_city`
-- ----------------------------
DROP TABLE IF EXISTS `wp_city`;
CREATE TABLE `wp_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(30) NOT NULL,
  `manager_uids` text,
  `cTime` int(11) DEFAULT NULL,
  `logo` int(11) DEFAULT NULL COMMENT '城市分站LOGO',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_city
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_cms`
-- ----------------------------
DROP TABLE IF EXISTS `wp_cms`;
CREATE TABLE `wp_cms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `img` int(10) unsigned DEFAULT NULL COMMENT '封面图',
  `content` text COMMENT '正文内容',
  `cTime` int(10) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_cms
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_comment`
-- ----------------------------
DROP TABLE IF EXISTS `wp_comment`;
CREATE TABLE `wp_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `aim_table` varchar(30) DEFAULT NULL COMMENT '评论关联数据表',
  `aim_id` int(10) DEFAULT NULL COMMENT '评论关联ID',
  `cTime` int(10) DEFAULT NULL COMMENT '评论时间',
  `follow_id` int(10) DEFAULT NULL COMMENT 'follow_id',
  `content` text COMMENT '评论内容',
  `is_audit` tinyint(2) DEFAULT '0' COMMENT '是否审核',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_common_category`
-- ----------------------------
DROP TABLE IF EXISTS `wp_common_category`;
CREATE TABLE `wp_common_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(255) DEFAULT NULL COMMENT '分类标识',
  `title` varchar(255) NOT NULL COMMENT '分类标题',
  `icon` int(10) unsigned DEFAULT NULL COMMENT '分类图标',
  `pid` int(10) unsigned DEFAULT '0' COMMENT '上一级分类',
  `path` varchar(255) DEFAULT NULL COMMENT '分类路径',
  `module` varchar(255) DEFAULT NULL COMMENT '分类所属功能',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序号',
  `is_show` tinyint(2) DEFAULT '1' COMMENT '是否显示',
  `intro` varchar(255) DEFAULT NULL COMMENT '分类描述',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `code` varchar(255) DEFAULT NULL COMMENT '分类扩展编号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_common_category
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_common_category_group`
-- ----------------------------
DROP TABLE IF EXISTS `wp_common_category_group`;
CREATE TABLE `wp_common_category_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) NOT NULL COMMENT '分组标识',
  `title` varchar(255) NOT NULL COMMENT '分组标题',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `level` tinyint(1) unsigned DEFAULT '3' COMMENT '最多级数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_common_category_group
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_config`
-- ----------------------------
DROP TABLE IF EXISTS `wp_config`;
CREATE TABLE `wp_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='系统配置表';

-- ----------------------------
-- Records of wp_config
-- ----------------------------
INSERT INTO `wp_config` VALUES ('1', 'WEB_SITE_TITLE', '1', '网站标题', '1', '', '网站标题前台显示标题', '1378898976', '1430825115', '1', 'weiphp4.0', '0');
INSERT INTO `wp_config` VALUES ('2', 'WEB_SITE_DESCRIPTION', '2', '网站描述', '1', '', '网站搜索引擎描述', '1378898976', '1379235841', '1', 'WeiPHP4.0，为移动应用提供后端运营管理的CMS系统', '9');
INSERT INTO `wp_config` VALUES ('3', 'WEB_SITE_KEYWORD', '2', '网站关键字', '1', '', '网站搜索引擎关键字', '1378898976', '1381390100', '1', 'weiphp,微信开源开发框架,小程序开发框架', '8');
INSERT INTO `wp_config` VALUES ('4', 'WEB_SITE_CLOSE', '4', '关闭站点', '1', '0:关闭\r\n1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', '1378898976', '1406859591', '1', '1', '1');
INSERT INTO `wp_config` VALUES ('9', 'CONFIG_TYPE_LIST', '3', '配置类型列表', '6', '', '主要用于数据解析和页面表单的生成', '1378898976', '1379235348', '1', '0:数字\r\n1:字符\r\n2:文本\r\n3:数组\r\n4:枚举', '2');
INSERT INTO `wp_config` VALUES ('10', 'WEB_SITE_ICP', '1', '网站备案号', '1', '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', '1378900335', '1379235859', '1', '', '9');
INSERT INTO `wp_config` VALUES ('11', 'DOCUMENT_POSITION', '3', '文档推荐位', '2', '', '文档推荐位，推荐到多个位置KEY值相加即可', '1379053380', '1379235329', '1', '1:列表页推荐\r\n2:频道页推荐\r\n4:网站首页推荐', '3');
INSERT INTO `wp_config` VALUES ('12', 'DOCUMENT_DISPLAY', '3', '文档可见性', '2', '', '文章可见性仅影响前台显示，后台不收影响', '1379056370', '1379235322', '1', '0:所有人可见\r\n1:仅注册会员可见\r\n2:仅管理员可见', '4');
INSERT INTO `wp_config` VALUES ('13', 'COLOR_STYLE', '4', '后台色系', '1', 'default_color:默认\r\nblue_color:紫罗兰', '后台颜色风格', '1379122533', '1379235904', '1', 'default_color', '10');
INSERT INTO `wp_config` VALUES ('20', 'CONFIG_GROUP_LIST', '3', '配置分组', '6', '', '配置分组', '1379228036', '1495853761', '1', '1:基本\r\n3:用户\r\n6:开发\r\n99:高级', '4');
INSERT INTO `wp_config` VALUES ('21', 'HOOKS_TYPE', '3', '钩子的类型', '0', '', '类型 1-用于扩展显示内容，2-用于扩展业务处理', '1379313397', '1379313407', '1', '1:视图\r\n2:控制器', '6');
INSERT INTO `wp_config` VALUES ('22', 'AUTH_CONFIG', '3', 'Auth配置', '0', '', '自定义Auth.class.php类配置', '1379409310', '1379409564', '1', 'AUTH_ON:1\r\nAUTH_TYPE:2', '8');
INSERT INTO `wp_config` VALUES ('23', 'OPEN_DRAFTBOX', '4', '是否开启草稿功能', '0', '0:关闭草稿功能\r\n1:开启草稿功能\r\n', '新增文章时的草稿功能配置', '1379484332', '1379484591', '1', '1', '1');
INSERT INTO `wp_config` VALUES ('24', 'DRAFT_AOTOSAVE_INTERVAL', '0', '自动保存草稿时间', '0', '', '自动保存草稿的时间间隔，单位：秒', '1379484574', '1386143323', '1', '60', '2');
INSERT INTO `wp_config` VALUES ('25', 'LIST_ROWS', '0', '后台每页记录数', '0', '', '后台数据每页显示记录数', '1379503896', '1391938052', '1', '20', '10');
INSERT INTO `wp_config` VALUES ('26', 'USER_ALLOW_REGISTER', '4', '是否允许用户注册', '3', '0:关闭注册\r\n1:允许注册', '是否开放用户注册', '1379504487', '1379504580', '1', '1', '0');
INSERT INTO `wp_config` VALUES ('27', 'CODEMIRROR_THEME', '4', '预览插件的CodeMirror主题', '0', '3024-day:3024 day\r\n3024-night:3024 night\r\nambiance:ambiance\r\nbase16-dark:base16 dark\r\nbase16-light:base16 light\r\nblackboard:blackboard\r\ncobalt:cobalt\r\neclipse:eclipse\r\nelegant:elegant\r\nerlang-dark:erlang-dark\r\nlesser-dark:lesser-dark\r\nmidnight:midnight', '详情见CodeMirror官网', '1379814385', '1384740813', '1', 'ambiance', '3');
INSERT INTO `wp_config` VALUES ('70', 'REQUEST_LOG', '4', '接口日志开关', '0', '', '', '1495277169', '1495277169', '1', '1', '0');
INSERT INTO `wp_config` VALUES ('71', 'DEBUG_LOG', '4', '调试日志', '0', '', '', '1495277582', '1495277582', '1', '0:关闭\r\n1:开启', '0');
INSERT INTO `wp_config` VALUES ('32', 'DEVELOP_MODE', '4', '开启开发者模式', '6', '0:关闭\r\n1:开启', '是否开启开发者模式', '1383105995', '1383291877', '1', '1', '0');
INSERT INTO `wp_config` VALUES ('33', 'ALLOW_VISIT', '3', '不受限控制器方法', '0', '', '', '1386644047', '1386644741', '1', '0:article/draftbox\r\n1:article/mydocument\r\n2:Category/tree\r\n3:Index/verify\r\n4:file/upload\r\n5:file/download\r\n6:user/updatePassword\r\n7:user/updateNickname\r\n8:user/submitPassword\r\n9:user/submitNickname', '0');
INSERT INTO `wp_config` VALUES ('34', 'DENY_VISIT', '3', '超管专限控制器方法', '0', '', '仅超级管理员可访问的控制器方法', '1386644141', '1386644659', '1', '0:Addons/addhook\r\n1:Addons/edithook\r\n2:Addons/delhook\r\n3:Addons/updateHook\r\n4:Admin/getMenus\r\n5:Admin/recordList\r\n6:AuthManager/updateRules\r\n7:AuthManager/tree', '0');
INSERT INTO `wp_config` VALUES ('35', 'REPLY_LIST_ROWS', '0', '回复列表每页条数', '0', '', '', '1386645376', '1387178083', '1', '20', '0');
INSERT INTO `wp_config` VALUES ('36', 'ADMIN_ALLOW_IP', '2', '后台允许访问IP', '99', '', '多个用逗号分隔，如果不配置表示不限制IP访问', '1387165454', '1387165553', '1', '', '12');
INSERT INTO `wp_config` VALUES ('37', 'SHOW_PAGE_TRACE', '4', '是否显示页面Trace', '6', '0:关闭\r\n1:开启', '是否显示页面Trace信息', '1387165685', '1387165685', '1', '0', '1');
INSERT INTO `wp_config` VALUES ('38', 'WEB_SITE_VERIFY', '4', '登录验证码', '3', '0:关闭\r\n1:开启', '登录时是否需要验证码', '1378898976', '1406859544', '1', '0', '2');
INSERT INTO `wp_config` VALUES ('44', 'DEFAULT_PUBLIC_GROUP_ID', '0', '公众号默认等级ID', '0', '', '前台新增加的公众号的默认等级，值为0表示不做权限控制，公众号拥有全部插件的权限', '1393759885', '1393759981', '1', '0', '2');
INSERT INTO `wp_config` VALUES ('45', 'SYSTEM_UPDATE_REMIND', '4', '系统升级提醒', '6', '0:关闭\r\n1:开启', '开启后官方有新升级信息会及时在后台的网站设置页面头部显示升级提醒', '1393764263', '1393764263', '1', '1', '5');
INSERT INTO `wp_config` VALUES ('46', 'SYSTEM_UPDATRE_VERSION', '0', '系统升级最新版本号', '6', '', '记录当前系统的版本号，这是与官方比较是否有升级包的唯一标识，不熟悉者只勿改变其数值', '1393764702', '1394337646', '1', '20170720', '0');
INSERT INTO `wp_config` VALUES ('47', 'FOLLOW_YOUKE_UID', '0', '粉丝游客ID', '0', '', '', '1398927704', '1398927704', '1', '-3', '0');
INSERT INTO `wp_config` VALUES ('48', 'DEFAULT_PUBLIC', '0', '注册后默认可管理的公众号ID', '0', '', '可为空。配置用户注册后即可管理的公众号ID，多个时用英文逗号分割', '1398928794', '1398929088', '1', '', '3');
INSERT INTO `wp_config` VALUES ('49', 'DEFAULT_PUBLIC_CREATE_MAX_NUMB', '0', '默认用户最多可创建的公众号数', '0', '', '注册用户最多的创建数，也可以在用户管理里对每个用户设置不同的值', '1398949652', '1398950115', '1', '5', '4');
INSERT INTO `wp_config` VALUES ('50', 'COPYRIGHT', '1', '版权信息', '1', '', '', '1401018910', '1401018910', '1', '版本由圆梦云科技有限公司所有', '3');
INSERT INTO `wp_config` VALUES ('51', 'WEIPHP_STORE_LICENSE', '1', '应用商店授权许可证', '0', '', '要与 应用商店》网站信息 里的授权许可证保持一致', '1402972720', '1464689362', '1', '', '0');
INSERT INTO `wp_config` VALUES ('52', 'SYSTEM_LOGO', '1', '网站LOGO的URL', '1', '', '填写LOGO的网址，为空时默认显示weiphp的logo', '1403566699', '1403566746', '1', '', '0');
INSERT INTO `wp_config` VALUES ('53', 'SYSTEM_CLOSE_REGISTER', '4', '前台注册开关', '6', '0:不关闭\r\n1:关闭', '关闭后在登录页面不再显示注册链接', '1403568006', '1403568006', '1', '0', '0');
INSERT INTO `wp_config` VALUES ('54', 'SYSTEM_CLOSE_ADMIN', '4', '后台管理开关', '0', '0:不关闭\r\n1:关闭', '关闭后在登录页面不再显示后台登录链接', '1403568006', '1464689374', '1', '0', '0');
INSERT INTO `wp_config` VALUES ('55', 'SYSTEM_CLOSE_WIKI', '4', '二次开发开关', '0', '0:不关闭\r\n1:关闭', '关闭后在登录页面不再显示二次开发链接', '1403568006', '1464689353', '1', '0', '0');
INSERT INTO `wp_config` VALUES ('56', 'SYSTEM_CLOSE_BBS', '4', '官方论坛开关', '0', '0:不关闭\r\n1:关闭', '关闭后在登录页面不再显示官方论坛链接', '1403568006', '1403568006', '1', '0', '0');
INSERT INTO `wp_config` VALUES ('57', 'LOGIN_BACKGROUP', '1', '登录界面背景图', '1', '', '请输入图片网址，为空时默认使用自带的背景图', '1403568006', '1403570059', '1', '', '0');
INSERT INTO `wp_config` VALUES ('60', 'TONGJI_CODE', '2', '第三方统计JS代码', '99', '', '', '1428634717', '1428634717', '1', '', '0');
INSERT INTO `wp_config` VALUES ('61', 'SENSITIVE_WORDS', '1', '敏感词', '1', '', '当出现有敏感词的地方，会用*号代替, (多个敏感词用 , 隔开 )', '1433125977', '1463195869', '1', 'bitch,shit', '11');
INSERT INTO `wp_config` VALUES ('63', 'PUBLIC_BIND', '4', '公众号第三方平台', '5', '0:关闭\r\n1:开启', '申请审核通过微信开放平台里的公众号第三方平台账号后，就可以开启体验了', '1434542818', '1434542818', '1', '0', '0');
INSERT INTO `wp_config` VALUES ('64', 'COMPONENT_APPID', '1', '公众号开放平台的AppID', '5', '', '公众号第三方平台开启后必填的参数', '1434542891', '1434542975', '1', '', '0');
INSERT INTO `wp_config` VALUES ('65', 'COMPONENT_APPSECRET', '1', '公众号开放平台的AppSecret', '5', '', '公众号第三方平台开启后必填的参数', '1434542936', '1434542984', '1', '', '0');
INSERT INTO `wp_config` VALUES ('62', 'REG_AUDIT', '4', '注册审核', '3', '0:需要审核\r\n1:不需要审核', '', '1439811099', '1439811099', '1', '1', '1');
INSERT INTO `wp_config` VALUES ('66', 'SCAN_LOGIN', '4', '扫码登录', '4', '0:关闭\r\n1:开启', '', '1460521364', '1463196104', '1', '0', '0');
INSERT INTO `wp_config` VALUES ('67', 'SCAN_LOGIN_PUBLIC', '0', '用于扫码登录的服务号ID', '0', '', '', '1495098638', '1495098638', '1', '', '0');
INSERT INTO `wp_config` VALUES ('68', 'ENCODING_AES_KEY', '1', '公众号消息加解密Key', '0', '', '', '1495167965', '1495167965', '1', '8hrodtl5ws8lgzaichcsctki88g1zozst1wuljccpxf', '0');
INSERT INTO `wp_config` VALUES ('69', 'ERROR_LOG_SHARE', '4', '错误日志共享计划', '0', '0:不分享\r\n1:分享', '为了方便我们持续改进产品质量，建议开启错误日志共享计划', '1495190627', '1495854000', '1', '1', '0');

-- ----------------------------
-- Table structure for `wp_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `wp_coupon`;
CREATE TABLE `wp_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `background` int(10) unsigned DEFAULT NULL COMMENT '素材背景图',
  `keyword` varchar(100) DEFAULT NULL COMMENT '关键词',
  `use_tips` text COMMENT '使用说明',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `intro` text COMMENT '封面简介',
  `end_time` int(10) DEFAULT NULL COMMENT '领取结束时间',
  `cover` int(10) unsigned DEFAULT NULL COMMENT '优惠券图片',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_tips` text COMMENT '领取结束说明',
  `end_img` int(10) unsigned DEFAULT NULL COMMENT '领取结束提示图片',
  `num` int(10) unsigned DEFAULT '0' COMMENT '优惠券数量',
  `max_num` int(10) unsigned DEFAULT '1' COMMENT '每人最多允许获取次数',
  `follower_condtion` char(50) DEFAULT '1' COMMENT '粉丝状态',
  `credit_conditon` int(10) unsigned DEFAULT '0' COMMENT '积分限制',
  `credit_bug` int(10) unsigned DEFAULT '0' COMMENT '积分消费',
  `addon_condition` varchar(255) DEFAULT NULL COMMENT '插件场景限制',
  `collect_count` int(10) unsigned DEFAULT '0' COMMENT '已领取数',
  `view_count` int(10) unsigned DEFAULT '0' COMMENT '浏览人数',
  `addon` char(50) DEFAULT 'public' COMMENT '插件',
  `shop_uid` varchar(255) DEFAULT NULL COMMENT '商家管理员ID',
  `use_count` int(10) DEFAULT '0' COMMENT '已使用数',
  `pay_password` varchar(255) DEFAULT NULL COMMENT '核销密码',
  `empty_prize_tips` varchar(255) DEFAULT NULL COMMENT '奖品抽完后的提示',
  `start_tips` varchar(255) DEFAULT NULL COMMENT '活动还没开始时的提示语',
  `more_button` text COMMENT '其它按钮',
  `over_time` int(10) DEFAULT NULL COMMENT '使用的截止时间',
  `use_start_time` int(10) DEFAULT NULL COMMENT '使用开始时间',
  `shop_name` varchar(255) DEFAULT '优惠商家' COMMENT '商家名称',
  `shop_logo` int(10) unsigned DEFAULT NULL COMMENT '商家LOGO',
  `head_bg_color` varchar(255) DEFAULT '#35a2dd' COMMENT '头部背景颜色',
  `button_color` varchar(255) DEFAULT '#0dbd02' COMMENT '按钮颜色',
  `template` varchar(255) DEFAULT 'default' COMMENT '素材模板',
  `member` varchar(100) DEFAULT '0' COMMENT '选择人群',
  `is_del` int(10) DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_coupon_shop`
-- ----------------------------
DROP TABLE IF EXISTS `wp_coupon_shop`;
CREATE TABLE `wp_coupon_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) DEFAULT NULL COMMENT '店名',
  `address` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `phone` varchar(30) DEFAULT NULL COMMENT '联系电话',
  `gps` varchar(50) DEFAULT NULL COMMENT 'GPS经纬度',
  `coupon_id` int(10) DEFAULT NULL COMMENT '所属优惠券编号',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员id',
  `open_time` varchar(50) DEFAULT NULL COMMENT '营业时间',
  `img` int(10) unsigned DEFAULT NULL COMMENT '门店展示图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_coupon_shop
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_coupon_shop_link`
-- ----------------------------
DROP TABLE IF EXISTS `wp_coupon_shop_link`;
CREATE TABLE `wp_coupon_shop_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `coupon_id` int(10) DEFAULT NULL COMMENT 'coupon_id',
  `shop_id` int(10) DEFAULT NULL COMMENT 'shop_id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_coupon_shop_link
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_credit_config`
-- ----------------------------
DROP TABLE IF EXISTS `wp_credit_config`;
CREATE TABLE `wp_credit_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '积分描述',
  `name` varchar(50) DEFAULT NULL COMMENT '积分标识',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `experience` varchar(30) DEFAULT '0' COMMENT '经验值',
  `score` varchar(30) DEFAULT '0' COMMENT '金币值',
  `token` varchar(255) DEFAULT '0' COMMENT 'Token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_credit_config
-- ----------------------------
INSERT INTO `wp_credit_config` VALUES ('1', '关注公众号', 'subscribe', '1438587911', '100', '100', '0');
INSERT INTO `wp_credit_config` VALUES ('2', '取消关注公众号', 'unsubscribe', '1438596459', '-100', '-100', '0');
INSERT INTO `wp_credit_config` VALUES ('3', '参与投票', 'vote', '1398565597', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('4', '参与调研', 'survey', '1398565640', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('5', '参与考试', 'exam', '1398565659', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('6', '参与测试', 'test', '1398565681', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('7', '微信聊天', 'chat', '1398565740', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('8', '建议意见反馈', 'suggestions', '1398565798', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('9', '会员卡绑定', 'card_bind', '1438596438', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('10', '获取优惠卷', 'coupons', '1398565926', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('11', '访问微网站', 'weisite', '1398565973', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('12', '查看自定义回复内容', 'custom_reply', '1398566068', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('13', '填写通用表单', 'forms', '1398566118', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('14', '访问微商店', 'shop', '1398566206', '0', '0', '0');
INSERT INTO `wp_credit_config` VALUES ('32', '程序自由增加', 'auto_add', '1442659667', '￥', '￥', '0');

-- ----------------------------
-- Table structure for `wp_credit_data`
-- ----------------------------
DROP TABLE IF EXISTS `wp_credit_data`;
CREATE TABLE `wp_credit_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT '0' COMMENT '用户ID',
  `credit_name` varchar(50) DEFAULT NULL COMMENT '积分标识',
  `experience` int(10) DEFAULT '0' COMMENT '体力值',
  `score` int(10) DEFAULT '0' COMMENT '积分值',
  `cTime` int(10) DEFAULT NULL COMMENT '记录时间',
  `admin_uid` int(10) DEFAULT '0' COMMENT '操作者UID',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `credit_title` varchar(50) DEFAULT NULL COMMENT '积分标题',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_credit_data
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_custom_menu`
-- ----------------------------
DROP TABLE IF EXISTS `wp_custom_menu`;
CREATE TABLE `wp_custom_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pid` int(10) DEFAULT '0' COMMENT '一级菜单',
  `title` varchar(50) NOT NULL COMMENT '菜单名',
  `from` char(50) NOT NULL DEFAULT '0' COMMENT '来源 0一级菜单，1素材 2URL 3自定义',
  `type` varchar(30) NOT NULL DEFAULT 'click' COMMENT '内容类型：\r\ntext:素材文本\r\nimg:素材图片\r\nnews:素材图文\r\nvideo:素材视频\r\nvoice：素材语音\r\nurl:URL地址\r\nclick：点击推事件\r\nscancode_push：扫码推事件 \r\nscancode_waitmsg：扫码带提示\r\npic_sysphoto：弹出系统拍照发图  \r\npic_photo_or_album： 弹出拍照或者相册发图  \r\npic_weixin：弹出微信相册发图器  \r\nlocation_select：弹出地理位置选择器',
  `sort` tinyint(4) DEFAULT '0' COMMENT '排序号',
  `token` varchar(255) NOT NULL COMMENT 'Token',
  `rule_id` int(11) DEFAULT '0' COMMENT '个性化菜单ID，0表示默认菜单',
  `material` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `appid` varchar(50) DEFAULT NULL,
  `pagepath` varchar(100) DEFAULT NULL,
  `appurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_custom_menu
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_custom_menu_rule`
-- ----------------------------
DROP TABLE IF EXISTS `wp_custom_menu_rule`;
CREATE TABLE `wp_custom_menu_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `tag_id` int(11) DEFAULT '0',
  `sex` tinyint(1) DEFAULT '0' COMMENT '0 不限 1 男 2女',
  `os` tinyint(4) DEFAULT '0' COMMENT '0不限 1ios 2android 3other',
  `city` int(11) DEFAULT NULL,
  `province` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `lang` char(30) DEFAULT NULL,
  `token` varchar(255) NOT NULL COMMENT 'Token',
  `menuid` varchar(50) DEFAULT NULL COMMENT '微信返回的ID,用于后续删除菜单接口',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_custom_menu_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_custom_reply_mult`
-- ----------------------------
DROP TABLE IF EXISTS `wp_custom_reply_mult`;
CREATE TABLE `wp_custom_reply_mult` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `keyword_type` tinyint(2) DEFAULT '0' COMMENT '关键词类型',
  `mult_ids` varchar(255) DEFAULT NULL COMMENT '多图文ID',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_custom_reply_mult
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_custom_reply_news`
-- ----------------------------
DROP TABLE IF EXISTS `wp_custom_reply_news`;
CREATE TABLE `wp_custom_reply_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(100) NOT NULL COMMENT '关键词',
  `keyword_type` tinyint(2) DEFAULT NULL COMMENT '关键词类型',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `intro` text COMMENT '简介',
  `cate_id` int(10) unsigned DEFAULT '0' COMMENT '所属类别',
  `cover` int(10) unsigned DEFAULT NULL COMMENT '封面图片',
  `content` text COMMENT '内容',
  `cTime` int(10) DEFAULT NULL COMMENT '发布时间',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序号',
  `view_count` int(10) unsigned DEFAULT '0' COMMENT '浏览数',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `jump_url` varchar(255) DEFAULT NULL COMMENT '外链',
  `author` varchar(50) DEFAULT NULL COMMENT '作者',
  `show_type` varchar(100) DEFAULT '0' COMMENT '显示方式',
  `is_show` char(10) DEFAULT '1' COMMENT '图片是否显示在内容页',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_custom_reply_news
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_custom_reply_text`
-- ----------------------------
DROP TABLE IF EXISTS `wp_custom_reply_text`;
CREATE TABLE `wp_custom_reply_text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `keyword_type` tinyint(2) DEFAULT '0' COMMENT '关键词类型',
  `content` text COMMENT '回复内容',
  `view_count` int(10) unsigned DEFAULT '0' COMMENT '浏览数',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序号',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_custom_reply_text
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_custom_sendall`
-- ----------------------------
DROP TABLE IF EXISTS `wp_custom_sendall`;
CREATE TABLE `wp_custom_sendall` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `ToUserName` varchar(255) DEFAULT NULL COMMENT 'token',
  `FromUserName` varchar(255) DEFAULT NULL COMMENT 'openid',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `msgType` varchar(255) DEFAULT NULL COMMENT '消息类型',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员id',
  `content` text COMMENT '内容',
  `media_id` varchar(255) DEFAULT NULL COMMENT '多媒体文件id',
  `is_send` int(10) DEFAULT NULL COMMENT '是否已经发送',
  `uid` int(10) DEFAULT NULL COMMENT '粉丝uid',
  `news_group_id` varchar(10) DEFAULT NULL COMMENT '图文组id',
  `video_title` varchar(255) DEFAULT NULL COMMENT '视频标题',
  `video_description` text COMMENT '视频描述',
  `video_thumb` varchar(255) DEFAULT NULL COMMENT '视频缩略图',
  `voice_id` int(10) DEFAULT NULL COMMENT '语音id',
  `image_id` int(10) DEFAULT NULL COMMENT '图片id',
  `video_id` int(10) DEFAULT NULL COMMENT '视频id',
  `send_type` int(10) DEFAULT NULL COMMENT '发送方式',
  `send_opends` text COMMENT '指定用户',
  `group_id` int(10) DEFAULT NULL COMMENT '分组id',
  `diff` int(10) DEFAULT '0' COMMENT '区分消息标识',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_custom_sendall
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_customer`
-- ----------------------------
DROP TABLE IF EXISTS `wp_customer`;
CREATE TABLE `wp_customer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8mb4 DEFAULT '',
  `sex` varchar(4) DEFAULT '',
  `mobile` varchar(200) DEFAULT '',
  `tel` varchar(200) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `company` varchar(100) DEFAULT '',
  `job` varchar(20) DEFAULT '',
  `address` varchar(120) DEFAULT '',
  `website` varchar(200) DEFAULT '',
  `qq` varchar(16) DEFAULT '',
  `weixin` varchar(50) DEFAULT '',
  `yixin` varchar(50) DEFAULT '',
  `weibo` varchar(50) DEFAULT '',
  `laiwang` varchar(50) DEFAULT '',
  `remark` varchar(255) DEFAULT '',
  `origin` bigint(20) unsigned NOT NULL DEFAULT '0',
  `originName` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `createUser` varchar(32) NOT NULL DEFAULT '',
  `createTime` int(10) unsigned NOT NULL DEFAULT '0',
  `groupId` varchar(20) NOT NULL DEFAULT '',
  `groupName` varchar(200) DEFAULT '',
  `group` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_customer
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_debug_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_debug_log`;
CREATE TABLE `wp_debug_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `data` text COMMENT '序列化后的参数1',
  `data_post` text COMMENT '序列化后的参数2',
  `cTime_format` varchar(30) DEFAULT NULL COMMENT '格式化后的时间',
  `cTime` int(10) DEFAULT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1773 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_debug_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_docs`
-- ----------------------------
DROP TABLE IF EXISTS `wp_docs`;
CREATE TABLE `wp_docs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(100) DEFAULT NULL COMMENT '文件名',
  `url` varchar(255) DEFAULT NULL COMMENT '下载地址',
  `cTime` int(10) DEFAULT NULL COMMENT '上传时间',
  `download_count` int(10) DEFAULT '0' COMMENT '下载次数',
  `file_id` int(10) unsigned DEFAULT NULL COMMENT '文件在系统中的ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_docs
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_draw_follow_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_draw_follow_log`;
CREATE TABLE `wp_draw_follow_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `follow_id` int(10) DEFAULT NULL COMMENT '粉丝id',
  `sports_id` int(10) DEFAULT NULL COMMENT '场次id',
  `count` int(10) DEFAULT '0' COMMENT '抽奖次数',
  `cTime` int(10) DEFAULT NULL COMMENT '支持时间',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`),
  KEY `sports_id` (`sports_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_draw_follow_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_error_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_error_log`;
CREATE TABLE `wp_error_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `urls` text COMMENT '下载地址',
  `os` varchar(30) DEFAULT NULL COMMENT '操作系统',
  `php` varchar(30) DEFAULT NULL COMMENT 'PHP版本号',
  `mysql` varchar(50) DEFAULT NULL COMMENT 'MYSQL版本号',
  `web` varchar(50) DEFAULT NULL COMMENT 'WEB信息',
  `sapi` varchar(30) DEFAULT NULL COMMENT 'PHP信息',
  `port` int(4) DEFAULT NULL COMMENT '端口号',
  `key` varchar(100) DEFAULT NULL COMMENT '网站唯一标识',
  `cTime` int(10) DEFAULT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_error_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_exam`
-- ----------------------------
DROP TABLE IF EXISTS `wp_exam`;
CREATE TABLE `wp_exam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(100) NOT NULL COMMENT '关键词',
  `keyword_type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '关键词匹配类型',
  `title` varchar(255) NOT NULL COMMENT '试卷标题',
  `intro` text NOT NULL COMMENT '封面简介',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `cover` int(10) unsigned NOT NULL COMMENT '封面图片',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `finish_tip` text NOT NULL COMMENT '结束语',
  `start_time` int(10) DEFAULT NULL COMMENT '考试开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '考试结束时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_exam
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_exam_answer`
-- ----------------------------
DROP TABLE IF EXISTS `wp_exam_answer`;
CREATE TABLE `wp_exam_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `answer` text COMMENT '回答内容',
  `openid` varchar(255) DEFAULT NULL COMMENT 'OpenId',
  `uid` int(10) DEFAULT NULL COMMENT '用户UID',
  `question_id` int(10) unsigned DEFAULT NULL COMMENT 'question_id',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `exam_id` int(10) unsigned DEFAULT NULL COMMENT 'exam_id',
  `score` int(10) unsigned DEFAULT NULL COMMENT '得分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_exam_answer
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_exam_question`
-- ----------------------------
DROP TABLE IF EXISTS `wp_exam_question`;
CREATE TABLE `wp_exam_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '题目标题',
  `intro` text NOT NULL COMMENT '题目描述',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `is_must` tinyint(2) DEFAULT '1' COMMENT '是否必填',
  `extra` text NOT NULL COMMENT '参数',
  `type` char(50) NOT NULL DEFAULT 'radio' COMMENT '题目类型',
  `exam_id` int(10) unsigned DEFAULT NULL COMMENT 'exam_id',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序号',
  `score` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分值',
  `answer` varchar(255) NOT NULL COMMENT '标准答案',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_exam_question
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `wp_feedback`;
CREATE TABLE `wp_feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '姓名',
  `product` varchar(100) DEFAULT '0' COMMENT '关注的产品',
  `from` char(10) DEFAULT '0' COMMENT '来源渠道',
  `area` char(50) DEFAULT '0' COMMENT '你所在地区',
  `score` int(10) DEFAULT '0' COMMENT '打分',
  `is_dev` tinyint(2) DEFAULT '0' COMMENT '是否是前端开发人员',
  `cTime` int(10) DEFAULT NULL COMMENT '反馈时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_file`
-- ----------------------------
DROP TABLE IF EXISTS `wp_file`;
CREATE TABLE `wp_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '原始文件名',
  `savename` char(20) NOT NULL DEFAULT '' COMMENT '保存名称',
  `savepath` char(30) NOT NULL DEFAULT '' COMMENT '文件保存路径',
  `ext` char(5) NOT NULL DEFAULT '' COMMENT '文件后缀',
  `mime` char(40) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `md5` char(32) DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `location` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '文件保存位置',
  `create_time` int(10) unsigned NOT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_md5` (`md5`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='文件表';

-- ----------------------------
-- Records of wp_file
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_forms`
-- ----------------------------
DROP TABLE IF EXISTS `wp_forms`;
CREATE TABLE `wp_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `finish_tip` text COMMENT '用户提交后提示内容',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `password` varchar(255) DEFAULT NULL COMMENT '表单密码',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `intro` text COMMENT '封面简介',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `cover` int(10) unsigned DEFAULT NULL COMMENT '封面图片',
  `keyword` varchar(100) NOT NULL COMMENT '关键词',
  `can_edit` tinyint(2) DEFAULT '0' COMMENT '是否允许编辑',
  `content` text COMMENT '详细介绍',
  `jump_url` varchar(255) DEFAULT NULL COMMENT '提交后跳转的地址',
  `template` varchar(255) DEFAULT 'default' COMMENT '模板',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_forms
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_forms_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `wp_forms_attribute`;
CREATE TABLE `wp_forms_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `type` char(50) NOT NULL DEFAULT 'string' COMMENT '字段类型',
  `title` varchar(255) NOT NULL COMMENT '字段标题',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `extra` text COMMENT '参数',
  `value` varchar(255) DEFAULT NULL COMMENT '默认值',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `name` varchar(100) DEFAULT NULL COMMENT '字段名',
  `remark` varchar(255) DEFAULT NULL COMMENT '字段备注',
  `is_must` tinyint(2) DEFAULT NULL COMMENT '是否必填',
  `validate_rule` varchar(255) DEFAULT NULL COMMENT '正则验证',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序号',
  `error_info` varchar(255) DEFAULT NULL COMMENT '出错提示',
  `forms_id` int(10) unsigned DEFAULT NULL COMMENT '表单ID',
  `is_show` tinyint(2) DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_forms_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_forms_value`
-- ----------------------------
DROP TABLE IF EXISTS `wp_forms_value`;
CREATE TABLE `wp_forms_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT NULL COMMENT '用户ID',
  `openid` varchar(255) DEFAULT NULL COMMENT 'OpenId',
  `forms_id` int(10) unsigned DEFAULT NULL COMMENT '表单ID',
  `value` text COMMENT '表单值',
  `cTime` int(10) DEFAULT NULL COMMENT '增加时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_forms_value
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_forum`
-- ----------------------------
DROP TABLE IF EXISTS `wp_forum`;
CREATE TABLE `wp_forum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `uid` int(10) DEFAULT '0' COMMENT '用户ID',
  `content` text COMMENT '内容',
  `cTime` int(10) DEFAULT NULL COMMENT '发布时间',
  `attach` varchar(255) DEFAULT NULL COMMENT '附件',
  `is_top` int(10) DEFAULT '0' COMMENT '置顶',
  `cid` tinyint(4) DEFAULT NULL COMMENT '分类',
  `view_count` int(11) unsigned DEFAULT '0' COMMENT '浏览数',
  `reply_count` int(11) unsigned DEFAULT '0' COMMENT '回复数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_forum
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_guess`
-- ----------------------------
DROP TABLE IF EXISTS `wp_guess`;
CREATE TABLE `wp_guess` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '竞猜标题',
  `desc` text COMMENT '活动说明',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '结束时间',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `guess_count` int(10) unsigned DEFAULT '0',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `template` varchar(255) DEFAULT 'default' COMMENT '素材模板',
  `cover` int(10) unsigned DEFAULT NULL COMMENT '主题图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_guess
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_guess_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_guess_log`;
CREATE TABLE `wp_guess_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户ID',
  `guess_id` int(10) unsigned DEFAULT '0' COMMENT '竞猜Id',
  `token` varchar(255) DEFAULT NULL COMMENT '用户token',
  `optionIds` varchar(255) DEFAULT NULL COMMENT '用户猜的选项IDs',
  `cTime` int(10) DEFAULT NULL COMMENT '创时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_guess_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_guess_option`
-- ----------------------------
DROP TABLE IF EXISTS `wp_guess_option`;
CREATE TABLE `wp_guess_option` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `guess_id` int(10) DEFAULT '0' COMMENT '竞猜活动的Id',
  `name` varchar(255) DEFAULT NULL COMMENT '选项名称',
  `image` int(10) unsigned DEFAULT NULL COMMENT '选项图片',
  `order` int(10) DEFAULT '0' COMMENT '选项顺序',
  `guess_count` int(10) unsigned DEFAULT '0' COMMENT '竞猜人数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_guess_option
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_hooks`
-- ----------------------------
DROP TABLE IF EXISTS `wp_hooks`;
CREATE TABLE `wp_hooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text NOT NULL COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` text COMMENT '钩子挂载的插件 ''，''分割',
  PRIMARY KEY (`id`),
  UNIQUE KEY `搜索索引` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='插件钩子表';

-- ----------------------------
-- Records of wp_hooks
-- ----------------------------
INSERT INTO `wp_hooks` VALUES ('1', 'pageHeader', '页面header钩子，一般用于加载插件CSS文件和代码', '1', '0', '');
INSERT INTO `wp_hooks` VALUES ('2', 'pageFooter', '页面footer钩子，一般用于加载插件JS文件和JS代码', '1', '0', 'ReturnTop');
INSERT INTO `wp_hooks` VALUES ('3', 'documentEditForm', '添加编辑表单的 扩展内容钩子', '1', '0', '');
INSERT INTO `wp_hooks` VALUES ('4', 'documentDetailAfter', '文档末尾显示', '1', '0', 'SocialComment');
INSERT INTO `wp_hooks` VALUES ('5', 'documentDetailBefore', '页面内容前显示用钩子', '1', '0', '');
INSERT INTO `wp_hooks` VALUES ('6', 'documentSaveComplete', '保存文档数据后的扩展钩子', '2', '0', '');
INSERT INTO `wp_hooks` VALUES ('7', 'documentEditFormContent', '添加编辑表单的内容显示钩子', '1', '0', 'Editor');
INSERT INTO `wp_hooks` VALUES ('8', 'adminArticleEdit', '后台内容编辑页编辑器', '1', '1378982734', 'EditorForAdmin');
INSERT INTO `wp_hooks` VALUES ('13', 'AdminIndex', '首页小格子个性化显示', '1', '1382596073', 'SiteStat,SystemInfo,DevTeam');
INSERT INTO `wp_hooks` VALUES ('14', 'topicComment', '评论提交方式扩展钩子。', '1', '1380163518', 'Editor');
INSERT INTO `wp_hooks` VALUES ('16', 'app_begin', '应用开始', '2', '1384481614', '');
INSERT INTO `wp_hooks` VALUES ('17', 'weixin', '微信插件必须加载的钩子', '1', '1388810858', 'Vote,Wecome,UserCenter,WeiSite,Hitegg,Leaflets,CustomReply,Survey,Diy,CustomMenu,Invite,Game,Ask,Forms,CardVouchers,RedBag,Guess,WishCard,RealPrize,ConfigureAccount,BusinessCard,AutoReply,Payment,Comment,ShopCoupon,Coupon,Card,SingIn,Reserve,Wuguai,Sms,Exam,Test,Draw,YaoTV,Analysis,Weiba,QrAdmin,PublicBind,Cms,Feedback,WeiUserCenter,WeiPicture');
INSERT INTO `wp_hooks` VALUES ('18', 'cascade', '级联菜单', '1', '1398694587', 'Cascade');
INSERT INTO `wp_hooks` VALUES ('19', 'page_diy', '万能页面的钩子', '1', '1399040364', 'Diy');
INSERT INTO `wp_hooks` VALUES ('20', 'dynamic_select', '动态下拉菜单', '1', '1435223189', 'DynamicSelect');
INSERT INTO `wp_hooks` VALUES ('21', 'news', '图文素材选择', '1', '1439196828', 'News');
INSERT INTO `wp_hooks` VALUES ('22', 'dynamic_checkbox', '动态多选菜单', '1', '1464002882', 'DynamicCheckbox');
INSERT INTO `wp_hooks` VALUES ('23', 'material', '素材选择', '1', '1464060023', 'Material');
INSERT INTO `wp_hooks` VALUES ('24', 'prize', '奖品选择', '1', '1464060044', 'Prize');

-- ----------------------------
-- Table structure for `wp_import`
-- ----------------------------
DROP TABLE IF EXISTS `wp_import`;
CREATE TABLE `wp_import` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `attach` int(10) unsigned NOT NULL COMMENT '上传文件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_import
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_invite`
-- ----------------------------
DROP TABLE IF EXISTS `wp_invite`;
CREATE TABLE `wp_invite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(100) NOT NULL COMMENT '关键词',
  `keyword_type` tinyint(2) DEFAULT '0' COMMENT '关键词类型',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `intro` text NOT NULL COMMENT '封面简介',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `cover` int(10) unsigned NOT NULL COMMENT '封面图片',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `experience` int(10) DEFAULT '0' COMMENT '消耗体力值',
  `num` int(10) NOT NULL COMMENT '邀请人数',
  `coupon_id` varchar(100) NOT NULL COMMENT '优惠券编号',
  `coupon_num` int(10) DEFAULT '0' COMMENT '优惠券数',
  `receive_num` int(10) DEFAULT '0' COMMENT '已领取优惠券数',
  `content` text NOT NULL COMMENT '邀约介绍',
  `template` varchar(255) DEFAULT 'default' COMMENT '模板名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_invite
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_invite_code`
-- ----------------------------
DROP TABLE IF EXISTS `wp_invite_code`;
CREATE TABLE `wp_invite_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(100) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_invite_code
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_invite_user`
-- ----------------------------
DROP TABLE IF EXISTS `wp_invite_user`;
CREATE TABLE `wp_invite_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `uid` int(10) DEFAULT NULL COMMENT '用户ID',
  `invite_id` int(10) DEFAULT NULL COMMENT '邀约ID',
  `invite_num` int(10) DEFAULT '0' COMMENT '已邀请人数',
  `invite_uid` int(10) DEFAULT '0' COMMENT '邀请用户',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_invite_user
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_join_count`
-- ----------------------------
DROP TABLE IF EXISTS `wp_join_count`;
CREATE TABLE `wp_join_count` (
  `follow_id` int(10) DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aim_id` int(10) DEFAULT NULL,
  `count` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fid_aim` (`follow_id`,`aim_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_join_count
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_keyword`
-- ----------------------------
DROP TABLE IF EXISTS `wp_keyword`;
CREATE TABLE `wp_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(100) NOT NULL COMMENT '关键词',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `addon` varchar(255) NOT NULL COMMENT '关键词所属插件',
  `aim_id` int(10) unsigned NOT NULL COMMENT '插件表里的ID值',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `keyword_length` int(10) unsigned DEFAULT '0' COMMENT '关键词长度',
  `keyword_type` tinyint(2) DEFAULT '0' COMMENT '匹配类型',
  `extra_text` text COMMENT '文本扩展',
  `extra_int` int(10) DEFAULT NULL COMMENT '数字扩展',
  `request_count` int(10) DEFAULT '0' COMMENT '请求数',
  PRIMARY KEY (`id`),
  KEY `keyword_token` (`keyword`,`token`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_keyword
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lottery_games`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lottery_games`;
CREATE TABLE `wp_lottery_games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '活动名称',
  `game_type` char(10) DEFAULT '1' COMMENT '游戏类型',
  `status` char(10) DEFAULT '1' COMMENT '状态',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '结束时间',
  `day_attend_limit` int(10) DEFAULT '0' COMMENT '每人每天抽奖次数',
  `attend_limit` int(10) DEFAULT '0' COMMENT '每人总共抽奖次数',
  `day_win_limit` int(10) DEFAULT '0' COMMENT '每人每天中奖次数',
  `win_limit` int(10) DEFAULT '0' COMMENT '每人总共中奖次数',
  `day_winners_count` int(10) DEFAULT '0' COMMENT '每天最多中奖人数',
  `url` varchar(300) DEFAULT NULL COMMENT '关注链接',
  `remark` text COMMENT '活动说明',
  `keyword` varchar(255) DEFAULT NULL COMMENT '微信关键词',
  `attend_num` int(10) DEFAULT '0' COMMENT '参与总人数',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员id',
  `test_award` varchar(255) DEFAULT NULL COMMENT '奖品测试字段',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lottery_games
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lottery_games_award_link`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lottery_games_award_link`;
CREATE TABLE `wp_lottery_games_award_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `award_id` int(10) DEFAULT NULL COMMENT '奖品id',
  `games_id` int(10) DEFAULT NULL COMMENT '抽奖游戏id',
  `grade` varchar(255) DEFAULT NULL COMMENT '中奖等级',
  `num` int(10) DEFAULT NULL COMMENT '奖品数量',
  `max_count` int(10) DEFAULT NULL COMMENT '最多抽奖',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lottery_games_award_link
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lottery_prize_list`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lottery_prize_list`;
CREATE TABLE `wp_lottery_prize_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `sports_id` int(10) DEFAULT NULL COMMENT '活动编号',
  `award_id` varchar(255) DEFAULT NULL COMMENT '奖品编号',
  `award_num` int(10) DEFAULT NULL COMMENT '奖品数量',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  PRIMARY KEY (`id`),
  KEY `sports_id` (`sports_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lottery_prize_list
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lucky_follow`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lucky_follow`;
CREATE TABLE `wp_lucky_follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `draw_id` int(10) DEFAULT NULL COMMENT '活动编号',
  `sport_id` int(10) DEFAULT NULL COMMENT '场次编号',
  `award_id` int(10) DEFAULT NULL COMMENT '奖品编号',
  `follow_id` int(10) DEFAULT NULL COMMENT '粉丝id',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `num` int(10) DEFAULT '0' COMMENT '获奖数',
  `state` tinyint(2) DEFAULT '0' COMMENT '兑奖状态',
  `zjtime` int(10) DEFAULT NULL COMMENT '中奖时间',
  `djtime` int(10) DEFAULT NULL COMMENT '兑奖时间',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `aim_table` varchar(255) DEFAULT NULL COMMENT '活动标识',
  `remark` text COMMENT '备注',
  `scan_code` varchar(255) DEFAULT NULL COMMENT '核销码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lucky_follow
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lzwg_activities`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lzwg_activities`;
CREATE TABLE `wp_lzwg_activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '活动名称',
  `remark` text COMMENT '活动描述',
  `logo_img` int(10) unsigned DEFAULT NULL COMMENT '活动LOGO',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '结束时间',
  `get_prize_tip` varchar(255) DEFAULT NULL COMMENT '中奖提示信息',
  `no_prize_tip` varchar(255) DEFAULT NULL COMMENT '未中奖提示信息',
  `ctime` int(10) DEFAULT NULL COMMENT '活动创建时间',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `lottery_number` int(10) DEFAULT '1' COMMENT '抽奖次数',
  `comment_status` char(10) DEFAULT '0' COMMENT '评论是否需要审核',
  `get_prize_count` int(10) DEFAULT '1' COMMENT '中奖次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lzwg_activities
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lzwg_activities_vote`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lzwg_activities_vote`;
CREATE TABLE `wp_lzwg_activities_vote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `lzwg_id` int(10) DEFAULT NULL COMMENT '活动编号',
  `lzwg_type` char(10) DEFAULT '0' COMMENT '活动类型',
  `vote_id` int(10) DEFAULT NULL COMMENT '题目编号',
  `vote_type` char(10) DEFAULT '1' COMMENT '问题类型',
  `vote_limit` int(10) DEFAULT NULL COMMENT '最多选择几项',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lzwg_activities_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lzwg_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lzwg_coupon`;
CREATE TABLE `wp_lzwg_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(100) DEFAULT NULL COMMENT '名称',
  `money` decimal(10,2) DEFAULT NULL COMMENT '减免金额',
  `name` varchar(255) DEFAULT NULL COMMENT '代金券 标题',
  `condition` decimal(10,2) DEFAULT NULL COMMENT '抵押条件',
  `intro` varchar(255) DEFAULT NULL COMMENT '优惠券简述',
  `img` int(10) unsigned DEFAULT NULL COMMENT '优惠卷图标',
  `sn_str` text COMMENT '序列号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lzwg_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lzwg_coupon_receive`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lzwg_coupon_receive`;
CREATE TABLE `wp_lzwg_coupon_receive` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `follow_id` int(10) DEFAULT NULL COMMENT '用户ID',
  `coupon_id` int(10) DEFAULT NULL COMMENT '优惠券ID',
  `sn_id` varchar(100) DEFAULT NULL COMMENT '序列号',
  `cTime` int(10) DEFAULT NULL COMMENT '领取时间',
  `aim_id` int(10) DEFAULT NULL COMMENT '活动编号',
  `aim_table` varchar(255) DEFAULT NULL COMMENT '活动表名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lzwg_coupon_receive
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lzwg_coupon_sn`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lzwg_coupon_sn`;
CREATE TABLE `wp_lzwg_coupon_sn` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `coupon_id` int(10) DEFAULT NULL COMMENT '优惠券Id',
  `sn` varchar(255) DEFAULT NULL COMMENT '优惠券sn',
  `is_use` int(10) DEFAULT '0' COMMENT '是否已领取',
  `is_get` int(10) DEFAULT '0' COMMENT '是否已经被领取',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lzwg_coupon_sn
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lzwg_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lzwg_log`;
CREATE TABLE `wp_lzwg_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `lzwg_id` int(10) DEFAULT NULL COMMENT '活动ID',
  `follow_id` int(10) DEFAULT NULL COMMENT '用户ID',
  `count` int(10) DEFAULT '0' COMMENT '参与次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lzwg_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lzwg_vote`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lzwg_vote`;
CREATE TABLE `wp_lzwg_vote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(50) DEFAULT NULL COMMENT '关键词',
  `title` varchar(100) DEFAULT NULL COMMENT '投票标题',
  `description` text COMMENT '投票描述',
  `picurl` int(10) unsigned DEFAULT NULL COMMENT '封面图片',
  `type` char(10) DEFAULT '0' COMMENT '选择类型',
  `start_date` int(10) DEFAULT NULL COMMENT '开始日期',
  `end_date` int(10) DEFAULT NULL COMMENT '结束日期',
  `is_img` tinyint(2) DEFAULT '0' COMMENT '文字/图片投票',
  `vote_count` int(10) unsigned DEFAULT '0' COMMENT '投票数',
  `cTime` int(10) DEFAULT NULL COMMENT '投票创建时间',
  `mTime` int(10) DEFAULT NULL COMMENT '更新时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `template` varchar(255) DEFAULT 'default' COMMENT '素材模板',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `vote_type` char(10) DEFAULT '0' COMMENT '题目类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lzwg_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lzwg_vote_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lzwg_vote_log`;
CREATE TABLE `wp_lzwg_vote_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `vote_id` int(10) unsigned DEFAULT NULL COMMENT '投票ID',
  `user_id` int(10) DEFAULT NULL COMMENT '用户ID',
  `token` varchar(255) DEFAULT NULL COMMENT '用户TOKEN',
  `options` varchar(255) DEFAULT NULL COMMENT '选择选项',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `activity_id` int(10) DEFAULT NULL COMMENT '活动编号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lzwg_vote_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_lzwg_vote_option`
-- ----------------------------
DROP TABLE IF EXISTS `wp_lzwg_vote_option`;
CREATE TABLE `wp_lzwg_vote_option` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `vote_id` int(10) unsigned NOT NULL COMMENT '投票ID',
  `name` varchar(255) NOT NULL COMMENT '选项标题',
  `image` int(10) unsigned DEFAULT NULL COMMENT '图片选项',
  `opt_count` int(10) unsigned DEFAULT '0' COMMENT '当前选项投票数',
  `order` int(10) unsigned DEFAULT '0' COMMENT '选项排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_lzwg_vote_option
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_manager`
-- ----------------------------
DROP TABLE IF EXISTS `wp_manager`;
CREATE TABLE `wp_manager` (
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `has_public` tinyint(2) DEFAULT '0' COMMENT '是否配置公众号',
  `headface_url` int(10) unsigned DEFAULT NULL COMMENT '管理员头像',
  `GammaAppId` varchar(30) DEFAULT NULL COMMENT '摇电视的AppId',
  `GammaSecret` varchar(100) DEFAULT NULL COMMENT '摇电视的Secret',
  `copy_right` varchar(255) DEFAULT NULL COMMENT '授权信息',
  `tongji_code` text COMMENT '统计代码',
  `website_logo` int(10) unsigned DEFAULT NULL COMMENT '网站LOGO',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_manager
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_material_file`
-- ----------------------------
DROP TABLE IF EXISTS `wp_material_file`;
CREATE TABLE `wp_material_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `file_id` int(10) NOT NULL COMMENT '上传文件',
  `cover_url` varchar(255) DEFAULT NULL COMMENT '本地URL',
  `media_id` varchar(100) DEFAULT '0' COMMENT '微信端图文消息素材的media_id',
  `wechat_url` varchar(255) DEFAULT NULL COMMENT '微信端的文件地址',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `title` varchar(255) NOT NULL COMMENT '素材名称',
  `type` int(10) DEFAULT NULL COMMENT '类型',
  `introduction` text COMMENT '描述',
  `is_use` int(10) DEFAULT '1' COMMENT '可否使用',
  `aim_id` int(10) DEFAULT NULL COMMENT '添加来源标识id',
  `aim_table` varchar(255) DEFAULT NULL COMMENT '来源表名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_material_file
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_material_image`
-- ----------------------------
DROP TABLE IF EXISTS `wp_material_image`;
CREATE TABLE `wp_material_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cover_id` int(10) DEFAULT NULL COMMENT '图片在本地的ID',
  `cover_url` varchar(255) DEFAULT NULL COMMENT '本地URL',
  `media_id` varchar(100) DEFAULT '0' COMMENT '微信端图文消息素材的media_id',
  `wechat_url` varchar(255) DEFAULT NULL COMMENT '微信端的图片地址',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `is_use` int(10) DEFAULT '1' COMMENT '可否使用',
  `aim_id` int(10) DEFAULT NULL COMMENT '添加来源标识id',
  `aim_table` varchar(255) DEFAULT NULL COMMENT '来源表名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_material_image
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_material_news`
-- ----------------------------
DROP TABLE IF EXISTS `wp_material_news`;
CREATE TABLE `wp_material_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `author` varchar(30) DEFAULT NULL COMMENT '作者',
  `cover_id` int(10) unsigned DEFAULT NULL COMMENT '封面',
  `intro` varchar(255) DEFAULT NULL COMMENT '摘要',
  `content` longtext COMMENT '内容',
  `link` varchar(255) DEFAULT NULL COMMENT '外链',
  `group_id` int(10) DEFAULT '0' COMMENT '多图文组的ID',
  `thumb_media_id` varchar(100) DEFAULT NULL COMMENT '图文消息的封面图片素材id（必须是永久mediaID）',
  `media_id` varchar(100) DEFAULT '0' COMMENT '微信端图文消息素材的media_id',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `cTime` int(10) DEFAULT NULL COMMENT '发布时间',
  `url` varchar(255) DEFAULT NULL COMMENT '图文页url',
  `is_use` int(10) DEFAULT '1' COMMENT '可否使用',
  `aim_id` int(10) DEFAULT NULL COMMENT '添加来源标识id',
  `aim_table` varchar(255) DEFAULT NULL COMMENT '来源表名',
  `update_time` int(10) DEFAULT '0' COMMENT 'update_time',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_material_news
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_material_text`
-- ----------------------------
DROP TABLE IF EXISTS `wp_material_text`;
CREATE TABLE `wp_material_text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content` text COMMENT '文本内容',
  `token` varchar(50) DEFAULT NULL COMMENT 'Token',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `is_use` int(10) DEFAULT '1' COMMENT '可否使用',
  `aim_id` int(10) DEFAULT NULL COMMENT '添加来源标识id',
  `aim_table` varchar(255) DEFAULT NULL COMMENT '来源表名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_material_text
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_menu`
-- ----------------------------
DROP TABLE IF EXISTS `wp_menu`;
CREATE TABLE `wp_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `menu_type` tinyint(2) DEFAULT '0' COMMENT '菜单类型',
  `pid` varchar(50) DEFAULT '0' COMMENT '上级菜单',
  `title` varchar(50) DEFAULT NULL COMMENT '菜单名',
  `url_type` tinyint(2) DEFAULT '0' COMMENT '链接类型',
  `addon_name` varchar(30) DEFAULT NULL COMMENT '插件名',
  `url` varchar(255) DEFAULT NULL COMMENT '外链',
  `target` char(50) DEFAULT '_self' COMMENT '打开方式',
  `is_hide` tinyint(2) DEFAULT '0' COMMENT '是否隐藏',
  `sort` int(10) DEFAULT '0' COMMENT '排序号',
  `place` tinyint(1) DEFAULT '0' COMMENT '位置',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=406 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_menu
-- ----------------------------
INSERT INTO `wp_menu` VALUES ('14', '0', '', '首页', '1', '', 'home/index/main', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('15', '0', '', '用户管理', '0', 'UserCenter', '', '_self', '0', '1', '0');
INSERT INTO `wp_menu` VALUES ('16', '1', '15', '微信用户', '0', 'UserCenter', '', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('17', '0', '', '互动应用', '0', 'Vote', '', '_self', '0', '2', '0');
INSERT INTO `wp_menu` VALUES ('18', '1', '17', '普通投票', '0', 'Vote', '', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('19', '1', '17', '微调研', '0', 'Survey', '', '_self', '0', '3', '0');
INSERT INTO `wp_menu` VALUES ('30', '1', '17', '微邀约', '0', 'Invite', '', '_self', '0', '10', '0');
INSERT INTO `wp_menu` VALUES ('23', '1', '17', '通用表单', '0', 'Forms', '', '_self', '0', '2', '0');
INSERT INTO `wp_menu` VALUES ('24', '1', '17', '竞猜', '0', 'Guess', '', '_self', '0', '11', '0');
INSERT INTO `wp_menu` VALUES ('25', '1', '17', '微贺卡', '0', 'WishCard', '', '_self', '0', '8', '0');
INSERT INTO `wp_menu` VALUES ('404', '0', '0', '微信卡券', '0', 'CardVouchers', null, '_self', '0', '8', '2');
INSERT INTO `wp_menu` VALUES ('27', '1', '356', '优惠券', '0', 'Coupon', '', '_self', '0', '15', '0');
INSERT INTO `wp_menu` VALUES ('28', '1', '356', '微信红包', '0', 'RedBag', '', '_self', '0', '17', '0');
INSERT INTO `wp_menu` VALUES ('29', '1', '356', '实物奖励', '0', 'RealPrize', '', '_self', '0', '18', '0');
INSERT INTO `wp_menu` VALUES ('31', '0', '', '微网站', '0', 'WeiSite', '', '_self', '0', '3', '0');
INSERT INTO `wp_menu` VALUES ('32', '1', '31', '微信回复', '0', 'WeiSite', '', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('46', '1', '45', '欢迎语设置', '0', 'Wecome', '', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('33', '1', '31', '首页设置', '1', '', 'WeiSite://Template/index', '_self', '0', '1', '0');
INSERT INTO `wp_menu` VALUES ('34', '1', '31', '内容页配置', '1', '', 'WeiSite://Template/lists', '_self', '0', '2', '0');
INSERT INTO `wp_menu` VALUES ('35', '1', '31', '导航栏配置', '1', '', 'WeiSite://Template/footer', '_self', '0', '3', '0');
INSERT INTO `wp_menu` VALUES ('44', '1', '15', '微信咨询', '1', '', 'home/WeixinMessage/lists', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('45', '0', '', '公众号功能', '0', 'Wecome', '', '_self', '0', '1', '0');
INSERT INTO `wp_menu` VALUES ('41', '1', '15', '用户分组', '1', '', 'home/AuthGroup/lists', '_self', '0', '2', '0');
INSERT INTO `wp_menu` VALUES ('42', '1', '15', '用户积分', '1', '', 'home/CreditConfig/lists', '_self', '0', '3', '0');
INSERT INTO `wp_menu` VALUES ('47', '1', '45', '自定义菜单', '0', 'CustomMenu', '', '_self', '0', '3', '0');
INSERT INTO `wp_menu` VALUES ('48', '1', '45', '自动回复', '0', 'AutoReply', '', '_self', '0', '2', '0');
INSERT INTO `wp_menu` VALUES ('49', '1', '45', '微信宣传页', '0', 'Leaflets', '', '_self', '0', '6', '0');
INSERT INTO `wp_menu` VALUES ('50', '1', '45', '群发消息', '1', '', 'home/Message/add', '_self', '0', '4', '0');
INSERT INTO `wp_menu` VALUES ('60', '0', '', '素材管理', '1', '', 'Home/Material/material_lists', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('338', '1', '45', '工作授权', '1', '', 'Servicer://Servicer/lists', '_self', '0', '12', '0');
INSERT INTO `wp_menu` VALUES ('339', '1', '45', '未识别回复', '0', 'NoAnswer', '', '_self', '0', '1', '0');
INSERT INTO `wp_menu` VALUES ('342', '1', '15', '会员卡', '0', 'Card', '', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('345', '1', '17', '比赛投票', '1', '', 'Vote://ShopVote/lists', '_self', '0', '1', '0');
INSERT INTO `wp_menu` VALUES ('346', '1', '17', '微签到', '0', 'SingIn', '', '_self', '0', '14', '0');
INSERT INTO `wp_menu` VALUES ('349', '1', '17', '微预约', '0', 'Reserve', '', '_self', '0', '9', '0');
INSERT INTO `wp_menu` VALUES ('350', '1', '17', '抽奖游戏', '1', '', 'Draw://Games/lists', '_self', '0', '19', '0');
INSERT INTO `wp_menu` VALUES ('351', '1', '17', '微考试', '0', 'Exam', '', '_self', '0', '4', '0');
INSERT INTO `wp_menu` VALUES ('352', '1', '17', '微测试', '0', 'Test', '', '_self', '0', '5', '0');
INSERT INTO `wp_menu` VALUES ('353', '1', '17', '微抢答', '0', 'Ask', '', '_self', '0', '12', '0');
INSERT INTO `wp_menu` VALUES ('356', '0', '0', '奖品库', '0', 'Coupon', '', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('357', '1', '356', '微信卡券', '0', 'CardVouchers', '', '_self', '0', '19', '0');
INSERT INTO `wp_menu` VALUES ('358', '0', '0', '微社区', '0', 'Weiba', '', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('359', '1', '358', '版块管理', '0', 'Weiba', '', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('360', '1', '358', '版块分类', '1', '', 'Weiba://Category/lists', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('361', '1', '358', '帖子管理', '1', '', 'Weiba://Post/lists', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('362', '1', '15', '用户标签', '1', '', 'home/UserTag/lists', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('363', '1', '15', '扫码管理', '0', 'QrAdmin', '', '_self', '0', '0', '0');
INSERT INTO `wp_menu` VALUES ('364', '1', '358', '首页帖子', '1', '', 'Weiba://Post/indexLists', '_self', '0', '4', '0');
INSERT INTO `wp_menu` VALUES ('366', '0', '0', '数据模型', '1', '', 'Admin/Model/index', '_self', '0', '4', '1');
INSERT INTO `wp_menu` VALUES ('367', '0', '0', '系统', '1', '', 'Admin/Config/group', '_self', '0', '0', '1');
INSERT INTO `wp_menu` VALUES ('368', '0', '0', '菜单管理', '1', '', 'Admin/Menu/lists', '_self', '0', '5', '1');
INSERT INTO `wp_menu` VALUES ('369', '1', '368', '公众号菜单', '1', '', 'Admin/Menu/lists', '_self', '0', '0', '1');
INSERT INTO `wp_menu` VALUES ('370', '1', '368', '后台菜单', '1', '', 'Admin/Menu/lists/place/1', '_self', '0', '2', '1');
INSERT INTO `wp_menu` VALUES ('371', '1', '367', '网站设置', '1', '', 'Admin/Config/group', '_self', '0', '0', '1');
INSERT INTO `wp_menu` VALUES ('372', '1', '367', '配置管理', '1', '', 'Admin/Config/index', '_self', '0', '1', '1');
INSERT INTO `wp_menu` VALUES ('373', '1', '367', '图文样式', '1', '', 'Admin/ArticleStyle/lists', '_self', '0', '2', '1');
INSERT INTO `wp_menu` VALUES ('374', '1', '367', '在线升级', '1', '', 'Admin/Update/index', '_self', '0', '3', '1');
INSERT INTO `wp_menu` VALUES ('375', '1', '367', '清除缓存', '1', '', 'Admin/Update/delcache', '_self', '0', '4', '1');
INSERT INTO `wp_menu` VALUES ('376', '0', '0', '运营者', '1', '', 'Admin/User/index', '_self', '0', '1', '1');
INSERT INTO `wp_menu` VALUES ('377', '1', '376', '运营者列表', '1', '', 'Admin/User/index', '_self', '0', '0', '1');
INSERT INTO `wp_menu` VALUES ('378', '1', '376', '微信接口节点', '1', '', 'Admin/Rule/wechat', '_self', '0', '1', '1');
INSERT INTO `wp_menu` VALUES ('379', '1', '376', '公众号组管理', '1', '', 'Admin/AuthManager/wechat', '_self', '0', '2', '1');
INSERT INTO `wp_menu` VALUES ('380', '0', '0', '插件管理', '1', '', 'Admin/Addons/index', '_self', '0', '3', '1');
INSERT INTO `wp_menu` VALUES ('381', '1', '380', '应用插件', '1', '', 'Admin/Addons/index', '_self', '0', '0', '1');
INSERT INTO `wp_menu` VALUES ('382', '1', '380', 'Widget插件', '1', '', 'Admin/Plugin/index', '_self', '0', '1', '1');
INSERT INTO `wp_menu` VALUES ('383', '1', '380', '钩子管理', '1', '', 'Admin/Addons/hooks', '_self', '0', '2', '1');
INSERT INTO `wp_menu` VALUES ('384', '0', '0', 'API接口', '1', '', 'Admin/Api/lists', '_self', '0', '6', '1');
INSERT INTO `wp_menu` VALUES ('385', '1', '367', '扫码登录', '1', '', 'Admin/Scan/index', '_self', '0', '5', '1');
INSERT INTO `wp_menu` VALUES ('386', '1', '367', '一键绑定', '1', '', 'Admin/PublicBind/index', '_self', '0', '6', '1');
INSERT INTO `wp_menu` VALUES ('387', '0', '0', '日志', '1', '', 'Admin/Log/manage', '_self', '0', '7', '1');
INSERT INTO `wp_menu` VALUES ('388', '1', '387', '运营日志', '1', '', 'Admin/Log/manage', '_self', '0', '0', '1');
INSERT INTO `wp_menu` VALUES ('389', '1', '387', '后台日志', '1', '', 'Admin/Log/admin', '_self', '0', '1', '1');
INSERT INTO `wp_menu` VALUES ('390', '1', '387', '接口日志', '1', '', 'Admin/Log/api', '_self', '0', '2', '1');
INSERT INTO `wp_menu` VALUES ('391', '1', '387', '调试日志', '1', '', 'Admin/Log/debug', '_self', '0', '3', '1');
INSERT INTO `wp_menu` VALUES ('392', '1', '387', '错误日志', '1', '', 'Admin/Log/error', '_self', '0', '4', '1');
INSERT INTO `wp_menu` VALUES ('393', '1', '368', '小程序菜单', '1', '', 'Admin/Menu/lists/place/2', '_self', '0', '1', '1');
INSERT INTO `wp_menu` VALUES ('402', '0', '0', '图片库', '0', 'WeiPicture', '', '_self', '0', '7', '2');
INSERT INTO `wp_menu` VALUES ('401', '0', '0', '用户中心', '0', 'WeiUserCenter', '', '_self', '0', '7', '2');
INSERT INTO `wp_menu` VALUES ('400', '0', '0', 'SMS', '0', 'Sms', null, '_self', '0', '6', '2');

-- ----------------------------
-- Table structure for `wp_message`
-- ----------------------------
DROP TABLE IF EXISTS `wp_message`;
CREATE TABLE `wp_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `bind_keyword` varchar(50) DEFAULT NULL COMMENT '关联关键词',
  `preview_openids` text COMMENT '预览人OPENID',
  `group_id` int(10) DEFAULT '0' COMMENT '群发对象',
  `type` tinyint(2) DEFAULT '0' COMMENT '素材来源',
  `media_id` varchar(100) DEFAULT NULL COMMENT '微信素材ID',
  `send_type` tinyint(1) DEFAULT '0' COMMENT '发送方式',
  `send_openids` text COMMENT '要发送的OpenID',
  `msg_id` varchar(255) DEFAULT NULL COMMENT 'msg_id',
  `content` text COMMENT '文本消息内容',
  `msgtype` varchar(255) DEFAULT NULL COMMENT '消息类型',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `appmsg_id` int(10) DEFAULT NULL COMMENT '图文id',
  `voice_id` int(10) DEFAULT NULL COMMENT '语音id',
  `video_id` int(10) DEFAULT NULL COMMENT '视频id',
  `cTime` int(10) DEFAULT NULL COMMENT '群发时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_message
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_model`
-- ----------------------------
DROP TABLE IF EXISTS `wp_model`;
CREATE TABLE `wp_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '模型标识',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `need_pk` tinyint(1) unsigned DEFAULT '1' COMMENT '新建表时是否需要主键字段',
  `field_sort` text COMMENT '表单字段排序',
  `list_grid` text COMMENT '列表定义',
  `list_row` smallint(2) unsigned DEFAULT '10' COMMENT '列表数据长度',
  `search_key` varchar(50) DEFAULT '' COMMENT '默认搜索字段',
  `engine_type` varchar(25) DEFAULT 'MyISAM' COMMENT '数据库引擎',
  `addon` varchar(50) DEFAULT NULL COMMENT '所属插件',
  `file_md5` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1173 DEFAULT CHARSET=utf8 COMMENT='系统模型表';

-- ----------------------------
-- Records of wp_model
-- ----------------------------
INSERT INTO `wp_model` VALUES ('1', 'user', '用户信息表', '0', '[\"come_from\",\"nickname\",\"password\",\"truename\",\"mobile\",\"email\",\"sex\",\"headimgurl\",\"city\",\"province\",\"country\",\"language\",\"score\",\"experience\",\"unionid\",\"login_count\",\"reg_ip\",\"reg_time\",\"last_login_ip\",\"last_login_time\",\"status\",\"is_init\",\"is_audit\"]', 'headimgurl|url_img_html:头像\r\nlogin_name:登录账号\r\nlogin_password:登录密码\r\nnickname:用户昵称\r\nsex:性别\r\ngroup:分组\r\nscore:金币值\r\nexperience:经历值\r\nids:操作:set_login?uid=[uid]|设置登录账号,detail?uid=[uid]|详细资料,[EDIT]|编辑', '20', '', 'MyISAM', 'Core', 'd0eba6dea42a7ce969cac77905c12b2d');
INSERT INTO `wp_model` VALUES ('2', 'manager', '公众号管理员配置', '1', '', '', '20', '', 'MyISAM', 'Core', '19d64f1f8cd25af0296b4cf0f248320e');
INSERT INTO `wp_model` VALUES ('3', 'menu', '系统菜单', '1', '[\"menu_type\",\"pid\",\"title\",\"url_type\",\"addon_name\",\"url\",\"target\",\"is_hide\",\"sort\"]', 'title:菜单名\r\nmenu_type:菜单类型\r\naddon_name:插件名\r\nurl:外链\r\ntarget:打开方式\r\nis_hide:隐藏\r\nsort:排序号\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', '', 'MyISAM', 'Core', 'bd3840c2b69a9d8819b80accd0be30ea');
INSERT INTO `wp_model` VALUES ('4', 'keyword', '关键词表', '1', '[\"keyword\",\"keyword_type\",\"addon\",\"aim_id\",\"keyword_length\",\"cTime\",\"extra_text\",\"extra_int\"]', 'id:编号\r\nkeyword:关键词\r\naddon:所属插件\r\naim_id:插件数据ID\r\ncTime|time_format:增加时间\r\nrequest_count|intval:请求数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'keyword', 'MyISAM', 'Core', 'c636c20ac6af3d4262c53b4628c56a56');
INSERT INTO `wp_model` VALUES ('5', 'qr_code', '二维码表', '1', '[\"qr_code\",\"addon\",\"aim_id\",\"cTime\",\"extra_text\",\"extra_int\",\"scene_id\",\"action_name\"]', 'scene_id:事件KEY值\r\nqr_code|get_code_img:二维码\r\naction_name: 	二维码类型\r\naddon:所属插件\r\naim_id:插件数据ID\r\ncTime|time_format:增加时间\r\nrequest_count|intval:请求数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'qr_code', 'MyISAM', 'Core', '74bae4b02e7f63be13a6e089830e5e15');
INSERT INTO `wp_model` VALUES ('6', 'apps', '公众号管理', '1', '[\"public_name\",\"public_id\",\"wechat\",\"headface_url\",\"type\",\"appid\",\"secret\",\"encodingaeskey\",\"tips_url\",\"GammaAppId\",\"GammaSecret\",\"public_copy_right\"]', 'id:公众号ID\r\npublic_name:公众号名称\r\ntoken:Token\r\ncount:管理员数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,main&public_id=[id]|进入管理', '20', 'public_name', 'MyISAM', 'Core', 'a976893b9e8bb805f09fa07331e3d9d3');
INSERT INTO `wp_model` VALUES ('7', 'apps_group', '公众号等级', '1', '[\"title\",\"addon_status\"]', 'id:等级ID\r\ntitle:等级名\r\naddon_status:授权的插件\r\npublic_count:公众号数\r\nids:操作:editPublicGroup&id=[id]|编辑,delPublicGroup&id=[id]|删除', '20', 'title', 'MyISAM', 'Core', '0de4c5ceb3fa866b63c099d4686eb4fb');
INSERT INTO `wp_model` VALUES ('8', 'apps_link', '公众号与管理员的关联关系', '1', '[\"uid\",\"addon_status\"]', 'uid|get_nickname|deal_emoji:15%管理员(不包括创始人)\r\naddon_status:授权的插件\r\nids:10%操作:[EDIT]|编辑,[DELETE]|删除', '20', '', 'MyISAM', 'Core', '16758bd9b8236a8b1ae8af6687d008ec');
INSERT INTO `wp_model` VALUES ('9', 'import', '导入数据', '1', '', '', '20', '', 'MyISAM', 'Core', '8740077c635072107e9c8c73444b173e');
INSERT INTO `wp_model` VALUES ('10', 'addon_category', '插件分类', '1', '[\"icon\",\"title\",\"sort\"]', 'icon|get_img_html:分类图标\r\ntitle:分类名\r\nsort:排序号\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'Core', '10ab9eeed45edc3c22b0b05fbbfc9a8d');
INSERT INTO `wp_model` VALUES ('11', 'auto_reply', '自动回复', '1', '[\"keyword\",\"content\",\"group_id\",\"image_id\"]', 'keyword:关键词\r\ncontent:文件内容\r\ngroup_id:图文\r\nimage_id:图片\r\nvoice_id:语音\r\nvideo_id:视频\r\nids:操作:[EDIT]&type=[msg_type]|编辑,[DELETE]|删除', '10', 'keyword:请输入关键词', 'MyISAM', 'AutoReply', 'd33b1e6a8b025df4e75e88ef2004d4ff');
INSERT INTO `wp_model` VALUES ('12', 'common_category', '通用分类', '1', '[\"pid\",\"title\",\"icon\",\"intro\",\"sort\",\"is_show\"]', 'code:编号\r\ntitle:标题\r\nicon|get_img_html:图标\r\nsort:排序号\r\nis_show:显示\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'Core', 'a137209cfafb75436b315f3e5d3f3516');
INSERT INTO `wp_model` VALUES ('13', 'common_category_group', '通用分类分组', '1', '[\"name\",\"title\"]', 'name:分组标识\r\ntitle:分组标题\r\nids:操作:cascade?target=_blank&module=[name]|数据管理,[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'Core', 'cb8e502ae6925e967bb1aa650519205b');
INSERT INTO `wp_model` VALUES ('14', 'credit_config', '积分配置', '1', '[\"name\",\"title\",\"score\",\"experience\"]', 'title:积分描述\r\nname:积分标识\r\nexperience:经验值\r\nscore:金币值\r\nids:操作:[EDIT]|配置', '20', 'title', 'MyISAM', 'Core', 'c76e403560baa992347ef380f2d77e12');
INSERT INTO `wp_model` VALUES ('15', 'credit_data', '用户积分记录', '1', '[\"uid\",\"experience\",\"score\",\"credit_name\"]', 'uid:用户\r\ncredit_title:积分来源\r\nexperience:经验值\r\nscore:金币值\r\ncTime|time_format:记录时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'uid', 'MyISAM', 'Core', 'cd82bf0a30ebcd447219398a7766bb85');
INSERT INTO `wp_model` VALUES ('16', 'material_image', '图片素材', '1', '', '', '10', '', 'MyISAM', 'Core', '8b658ae0327d88666feb856b63d92274');
INSERT INTO `wp_model` VALUES ('17', 'material_news', '图文素材', '1', '', '', '10', '', 'MyISAM', 'Core', '3c3711482cd649746299578e5b8ff599');
INSERT INTO `wp_model` VALUES ('18', 'message', '群发消息', '1', '[\"type\",\"bind_keyword\",\"media_id\",\"openid\",\"send_type\",\"group_id\",\"send_openids\"]', '', '20', '', 'MyISAM', 'Core', 'f7201c4ef19b4daedf55f8fe51c7a818');
INSERT INTO `wp_model` VALUES ('19', 'visit_log', '网站访问日志', '1', '', '', '10', '', 'MyISAM', 'Core', '3c222a77cc60b9f1d4934ee7f777047a');
INSERT INTO `wp_model` VALUES ('20', 'auth_group', '用户组', '1', '[\"title\",\"description\"]', 'title:分组名称\r\ndescription:描述\r\nqr_code:二维码\r\nids:操作:export?id=[id]|导出用户,[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'Core', '25c3b78987531dafd965d41ba0498bf0');
INSERT INTO `wp_model` VALUES ('21', 'analysis', '统计分析', '1', '', '', '20', '', 'MyISAM', 'Core', 'dfa7c0a79a6297fb164bcdaefff770e5');
INSERT INTO `wp_model` VALUES ('22', 'article_style', '图文样式', '1', '', '', '20', '', 'MyISAM', 'Core', 'cfe9384dedf2419f0643f62ea46dd5ba');
INSERT INTO `wp_model` VALUES ('23', 'article_style_group', '图文样式分组', '1', '', '', '20', '', 'MyISAM', 'Core', '54171cbbd3ff8d8e3285869e707986dc');
INSERT INTO `wp_model` VALUES ('24', 'ask', '抢答问卷', '1', '[\"keyword\",\"keyword_type\",\"title\",\"cover\",\"intro\",\"finish_tip\",\"shop_address\",\"appids\",\"finish_button\",\"content\",\"card_id\",\"appsecre\",\"template\"]', 'id:微抢答ID\r\nkeyword:关键词\r\ntitle:标题\r\ncTime|time_format:发布时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,ask_question&id=[id]|问题管理,ask_answer&id=[id]|数据管理,preview&id=[id]&target=_blank|预览', '20', 'title', 'MyISAM', 'Ask', '6ccc1f36b67b7a6d1d4680147555ee22');
INSERT INTO `wp_model` VALUES ('25', 'ask_answer', '抢答回答', '1', '', 'uid:用户ID\r\nnickname:昵称\r\nquestion_id:问题\r\nanswer:回答\r\nis_correct:是否正确\r\ntrue_answer:正确答案\r\ntimes:第几轮\r\ncTime|time_format:回答时间', '20', 'uid:请输入用户ID', 'MyISAM', 'Ask', '6ae44b401f443ee6cfa4555efad00a92');
INSERT INTO `wp_model` VALUES ('26', 'ask_question', '抢答问题', '1', '[\"title\",\"type\",\"extra\",\"answer\",\"wait_time\",\"sort\",\"percent\",\"intro\"]', 'title:标题\r\ntype:问题类型\r\nwait_time:时间间隔\r\npercent:抢中概率\r\nanswer:正确答案\r\nsort:排序号\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'Ask', '061adf9eec101cc03dd6c97080c3436e');
INSERT INTO `wp_model` VALUES ('27', 'business_card', '微名片', '1', '[\"truename\",\"mobile\",\"company\",\"service\",\"position\",\"department\",\"company_url\",\"address\",\"telephone\",\"Email\",\"wechat\",\"qq\",\"weibo\",\"tag\",\"wishing\",\"interest\",\"personal_url\",\"intro\",\"permission\",\"token\"]', 'uid:用户ID\r\ntruename:名称\r\nposition:职位\r\naddress:地址\r\nmobile:电话\r\ncompany:公司\r\nqq:QQ号\r\nwechat:微信号\r\nemail:邮箱\r\nqrcode:二维码\r\nids:操作:[EDIT]|编辑', '10', 'truename:请输入名称搜索', 'MyISAM', 'BusinessCard', '02f712991b8c949d179c371a40133253');
INSERT INTO `wp_model` VALUES ('28', 'business_card_collect', '名片收藏', '1', '', '', '10', '', 'MyISAM', 'BusinessCard', '655aa4d5d7ce8e5a193cbf7f5224ce89');
INSERT INTO `wp_model` VALUES ('29', 'card_vouchers', '微信卡券', '1', '[\"appsecre\",\"code\",\"content\",\"background\",\"title\",\"button_color\",\"head_bg_color\",\"shop_name\",\"uid\",\"token\",\"shop_logo\",\"more_button\",\"template\"]', 'title:卡券名称\r\ncard_id:卡券ID\r\nappsecre:商家公众号密钥\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,preview?id=[id]&target=_blank|预览', '20', 'card_id', 'MyISAM', 'CardVouchers', 'cb342a982bc9b8eddaef68290049b000');
INSERT INTO `wp_model` VALUES ('130', 'comment', '评论互动', '1', '[\"is_audit\"]', 'headimgurl|url_img_html:用户头像\r\nnickname:用户姓名\r\ncontent:评论内容\r\ncTime|time_format:评论时间\r\nis_audit:审核状态\r\nids:操作:[DELETE]|删除', '20', 'content:请输入评论内容', 'MyISAM', 'Comment', '9131bf06f3c1598fb35b48450fce7ca9');
INSERT INTO `wp_model` VALUES ('152', 'coupon', '优惠券', '1', '[\"title\",\"cover\",\"use_tips\",\"start_time\",\"start_tips\",\"end_time\",\"end_tips\",\"end_img\",\"num\",\"max_num\",\"over_time\",\"empty_prize_tips\",\"pay_password\",\"background\",\"more_button\",\"use_start_time\",\"shop_name\",\"shop_logo\",\"head_bg_color\",\"button_color\",\"template\",\"member\"]', 'id:优惠券编号\r\ntitle:标题\r\nnum:计划发送数\r\ncollect_count:已领取数\r\nuse_count:已使用数\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,lists?target_id=[id]&target=_blank&_controller=Sn|成员管理,preview?id=[id]&target=_blank|预览', '20', 'title', 'MyISAM', 'Coupon', '479e1c8a58d9494b90a659db775ea96d');
INSERT INTO `wp_model` VALUES ('153', 'coupon_shop', '适用门店', '1', '[\"name\",\"address\",\"gps\",\"phone\"]', 'name:店名\r\nphone:联系电话\r\naddress:详细地址\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'name:店名搜索', 'MyISAM', 'Coupon', 'e9256cbd8f0942071cbe0ce0f3566533');
INSERT INTO `wp_model` VALUES ('154', 'coupon_shop_link', '门店关联', '1', '', '', '20', '', 'MyISAM', 'Coupon', '7bab76a8b758da810e6fc0bf090c8221');
INSERT INTO `wp_model` VALUES ('34', 'custom_menu', '自定义菜单', '1', '[\"pid\",\"title\",\"from_type\",\"type\",\"jump_type\",\"addon\",\"sucai_type\",\"keyword\",\"url\",\"sort\"]', 'title:10%菜单名\r\nkeyword:10%关联关键词\r\nurl:50%关联URL\r\nsort:5%排序号\r\nid:10%操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'CustomMenu', 'cadd23b9777d70a707bf1724014679fc');
INSERT INTO `wp_model` VALUES ('35', 'custom_reply_mult', '多图文配置', '1', '', '', '20', '', 'MyISAM', 'CustomReply', '958b44bd61bf5436015725f1a0461636');
INSERT INTO `wp_model` VALUES ('36', 'custom_reply_news', '图文回复', '1', '[\"keyword\",\"keyword_type\",\"title\",\"intro\",\"cate_id\",\"cover\",\"content\",\"sort\"]', 'id:5%ID\r\nkeyword:10%关键词\r\nkeyword_type:20%关键词类型\r\ntitle:30%标题\r\ncate_id:10%所属分类\r\nsort:7%排序号\r\nview_count:8%浏览数\r\nid:10%操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'CustomReply', '8bbf55a6ad6a2c0422c94b07a9d0bb9a');
INSERT INTO `wp_model` VALUES ('37', 'custom_reply_text', '文本回复', '1', '[\"keyword\",\"keyword_type\",\"content\",\"sort\"]', 'id:ID\r\nkeyword:关键词\r\nkeyword_type:关键词类型\r\nsort:排序号\r\nview_count:浏览数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'keyword', 'MyISAM', 'CustomReply', 'e8ea53c386128548fc6dbd260026499c');
INSERT INTO `wp_model` VALUES ('38', 'draw_follow_log', '粉丝抽奖记录', '1', '[\"follow_id\",\"sports_id\",\"count\",\"cTime\"]', '', '20', '', 'MyISAM', 'Draw', 'f85578ffbbd5253a9452c2fa98a2a1ee');
INSERT INTO `wp_model` VALUES ('39', 'forms', '通用表单', '1', '[\"keyword\",\"keyword_type\",\"title\",\"intro\",\"cover\",\"can_edit\",\"finish_tip\",\"jump_url\",\"content\",\"template\"]', 'id:通用表单ID\r\nkeyword:关键词\r\nkeyword_type:关键词类型\r\ntitle:标题\r\ncTime|time_format:发布时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,forms_attribute&id=[id]|字段管理,forms_value&id=[id]|数据管理,preview&id=[id]|预览', '20', 'title', 'MyISAM', 'Forms', '9cdc90ff2096fe7f1f339079a23dee7d');
INSERT INTO `wp_model` VALUES ('40', 'forms_attribute', '表单字段', '1', '[\"name\",\"title\",\"type\",\"extra\",\"value\",\"remark\",\"is_must\",\"validate_rule\",\"error_info\",\"sort\"]', 'title:字段标题\r\nname:字段名\r\ntype:字段类型\r\nids:操作:[EDIT]&forms_id=[forms_id]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'Forms', 'b97f36d1587e5eebf660a8f5f8daecf5');
INSERT INTO `wp_model` VALUES ('41', 'forms_value', '通用表单数据', '1', '', '', '20', '', 'MyISAM', 'Forms', 'bb57a17340dff243559bc07146f73c54');
INSERT INTO `wp_model` VALUES ('42', 'guess', '竞猜', '1', '[\"title\",\"desc\",\"start_time\",\"end_time\",\"template\",\"cover\"]', 'title:活动名称\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nguess_count:参与人数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,guessOption&guess_id=[id]&target=_blank|竞猜选项,guessLog&guess_id=[id]&target=_blank|竞猜记录,preview?id=[id]&target=_blank|预览', '20', 'title:活动名称', 'MyISAM', 'Guess', '42bec46a27a8da6fe377aa13c2c3da03');
INSERT INTO `wp_model` VALUES ('43', 'guess_log', '竞猜记录', '1', '[\"token\"]', 'optionIds:竞猜选项\r\nuser_id:用户id\r\nuser_name:用户昵称\r\ntoken:用户token\r\ncTime|time_format:竞猜时间\r\n', '20', '', 'MyISAM', 'Guess', 'da58b50b78a15d6836c9fd2c4d71556b');
INSERT INTO `wp_model` VALUES ('44', 'guess_option', '竞猜项目', '1', '[\"name\",\"image\",\"order\"]', 'title:活动名称\r\nname:选项名称\r\nimage|get_img_html:选项图片\r\norder:选项顺序\r\nguess_count:竞猜人数\r\nids:操作:optionLog&guess_id=[guess_id]&option_id=[id]|查看选项竞猜记录', '20', '', 'MyISAM', 'Guess', '6f6084f582e743fcc813f81d1942aa98');
INSERT INTO `wp_model` VALUES ('45', 'invite', '微邀约', '1', '[\"keyword\",\"keyword_type\",\"title\",\"intro\",\"cover\",\"experience\",\"num\",\"coupon_id\",\"content\",\"template\"]', 'keyword:关键词\r\ntitle:标题\r\nexperience:消耗经验值\r\ncoupon_id:优惠券编号\r\ncoupon_name:优惠券标题\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,lists?target_id=[coupon_id]&target=_blank&_addons=Coupon&_controller=Sn|领取记录,preview?id=[id]&target=_blank|预览', '20', 'title', 'MyISAM', 'Invite', 'fab725733244e7be51d719f72b2b5b46');
INSERT INTO `wp_model` VALUES ('46', 'invite_user', '微邀约用户记录', '1', '', '', '20', '', 'MyISAM', 'Invite', '4bc678d84518d2f94941d844b964a58a');
INSERT INTO `wp_model` VALUES ('47', 'lottery_prize_list', '抽奖奖品列表', '1', '[\"sports_id\",\"award_id\",\"award_num\"]', 'sports_id:比赛场次\r\naward_id:奖品名称\r\naward_num:奖品数量\r\nid:编辑:[EDIT]|编辑,[DELETE]|删除,add?sports_id=[sports_id]|添加', '20', '', 'MyISAM', 'Draw', '6a69feb054bc991bffa543705ad0017d');
INSERT INTO `wp_model` VALUES ('48', 'lucky_follow', '中奖者信息', '1', '[\"draw_id\",\"sport_id\",\"award_id\",\"follow_id\",\"address\",\"num\",\"state\",\"zjtime\",\"djtime\",\"remark\",\"scan_code\"]', 'draw_id:活动\r\naward_id:奖项\r\naward_name:奖品\r\nzjtime|time_format:中奖时间\r\nfollow_id:8%微信昵称\r\nstate:发奖状态\r\nids:8%操作:do_fafang?id=[id]|发放奖品', '20', 'award_id:输入奖品名称', 'MyISAM', 'Draw', '08ce09306af90d155e7f07b2595efd23');
INSERT INTO `wp_model` VALUES ('49', 'lzwg_activities', '靓妆活动', '1', '[\"title\",\"remark\",\"logo_img\",\"start_time\",\"end_time\",\"get_prize_tip\",\"no_prize_tip\",\"lottery_number\",\"get_prize_count\",\"comment_status\"]', 'title:活动名称\r\nremark:活动描述\r\nlogo_img|get_img_html:活动LOGO\r\nactivitie_time:活动时间\r\nget_prize_tip:中将提示信息\r\nno_prize_tip:未中将提示信息\r\ncomment_list:评论列表\r\nset_vote:设置投票\r\nset_award:设置奖品\r\nget_prize_list:中奖列表\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', '', 'MyISAM', 'Draw', '33c0e7fb891c1ac24b322755148df484');
INSERT INTO `wp_model` VALUES ('50', 'lzwg_activities_vote', '投票答题活动', '1', '[\"lzwg_id\",\"vote_type\",\"vote_limit\",\"lzwg_type\",\"vote_id\"]', 'lzwg_name:活动名称\r\nstart_time|time_format:活动开始时间\r\nend_time|time_format:活动结束时间\r\nlzwg_type:活动类型\r\nvote_title:题目\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,tongji&id=[id]|用户参与分析\r\n', '20', 'lzwg_id:活动名称', 'MyISAM', 'Draw', '1830a5bd72254e3c3d8983bd2a3e09d8');
INSERT INTO `wp_model` VALUES ('60', 'payment_order', '订单支付记录', '1', '[\"from\",\"orderName\",\"single_orderid\",\"price\",\"token\",\"wecha_id\",\"paytype\",\"showwxpaytitle\",\"status\"]', '', '20', '', 'MyISAM', 'Payment', 'c0d4fa33a9096de226ccc373b897082b');
INSERT INTO `wp_model` VALUES ('61', 'payment_set', '支付配置', '1', '[\"wxappid\",\"wxappsecret\",\"wxpaysignkey\",\"zfbname\",\"pid\",\"key\",\"partnerid\",\"partnerkey\",\"wappartnerid\",\"wappartnerkey\",\"quick_security_key\",\"quick_merid\",\"quick_merabbr\",\"wxmchid\"]', '', '10', '', 'MyISAM', 'Payment', '219b8a3d3046c8886ee242c9f56de8b8');
INSERT INTO `wp_model` VALUES ('63', 'prize_address', '奖品收货地址', '1', '[\"address\",\"mobile\",\"turename\",\"remark\"]', 'prizeid:奖品名称\r\nturename:收货人\r\nmobile:联系方式\r\naddress:收货地址\r\nremark:备注\r\nids:操作:address_edit&id=[id]&_controller=RealPrize&_addons=RealPrize|编辑,[DELETE]|删除', '20', 'turename:请输入收货人搜索', 'MyISAM', 'RealPrize', '7d85a7fd1974bbb6ece560f081986505');
INSERT INTO `wp_model` VALUES ('64', 'real_prize', '实物奖励', '1', '[\"prize_title\",\"prize_name\",\"prize_conditions\",\"prize_count\",\"prize_image\",\"prize_type\",\"use_content\",\"fail_content\",\"template\"]', 'prize_name:20%奖品名称\r\nprize_conditions:20%活动说明\r\nprize_count:10%奖品个数\r\nprize_type:10%奖品类型\r\nuse_content:20%使用说明\r\nid:20%操作:[EDIT]|编辑,[DELETE]|删除,address_lists?target_id=[id]|查看数据,preview?id=[id]&target=_blank|预览', '20', 'prize_name:请输入奖品名称', 'MyISAM', 'RealPrize', '130781cad4b68137352013177cc8b258');
INSERT INTO `wp_model` VALUES ('65', 'redbag', '微信红包', '1', '[\"mch_id\",\"wxappid\",\"nick_name\",\"send_name\",\"total_amount\",\"min_value\",\"max_value\",\"total_num\",\"wishing\",\"act_name\",\"remark\",\"collect_limit\",\"partner_key\",\"token\",\"uid\",\"template\"]', 'act_name:活动名称\r\nsend_name:商户名称\r\ntotal_amount:付款金额\r\nmin_value:最小红包\r\nmax_value:最大红包\r\ntotal_num:发放人数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,preview?id=[id]&target=_blank|预览', '20', 'act_name:活动名称', 'MyISAM', 'RedBag', '642f74dcce3d8e141794ce75376f704d');
INSERT INTO `wp_model` VALUES ('66', 'redbag_follow', '领取红包的用户', '1', '[\"redbag_id\",\"follow_id\",\"amount\",\"cTime\"]', 'follow_id|get_follow_name:粉丝\r\namount:领取金额（分）\r\ncTime|time_format:领取时间', '20', '', 'MyISAM', 'RedBag', 'f0f1c1416662260d20d4eaabc0007c5c');
INSERT INTO `wp_model` VALUES ('81', 'sn_code', 'SN码', '1', '[\"prize_title\"]', 'sn:SN码\r\nuid|get_nickname:昵称\r\nprize_title:奖项\r\ncTime|time_format:创建时间\r\nis_use:是否已使用\r\nuse_time|time_format:使用时间\r\nids:操作:[DELETE]|删除,set_use?id=[id]|改变使用状态', '20', 'sn', 'MyISAM', 'Core', '29ea1773d49c68a105978477f87b93fe');
INSERT INTO `wp_model` VALUES ('82', 'sport_award', '抽奖奖品', '1', '[\"award_type\",\"name\",\"count\",\"img\",\"price\",\"score\",\"explain\",\"coupon_id\",\"money\"]', 'id:6%编号\r\nname:23%奖项名称\r\nimg|get_img_html:8%商品图片\r\nprice:8%商品价格\r\nexplain:24%奖品说明\r\ncount:8%奖品数量\r\nids:20%操作:[EDIT]|编辑,[DELETE]|删除,getlistByAwardId?awardId=[id]&_controller=LuckyFollow|中奖者列表', '20', 'name:请输入抽奖名称', 'MyISAM', 'Draw', '89c94f784c4bd138e64028d092fea8db');
INSERT INTO `wp_model` VALUES ('83', 'sports', '体育赛事', '1', '[\"home_team\",\"visit_team\",\"start_time\",\"score\",\"content\",\"countdown\",\"comment_status\"]', 'start_time|time_format:20%比赛场次\r\nvs_team:20%对战球队（主场VS客场）\r\nscore_title:8%比分\r\ncontent|lists_msubstr:27%对战球队的介绍\r\nids:23%操作:add?sports_id=[id]&_controller=LotteryPrizeList&_addons=Draw&target=_blank|奖品配置,lists?sports_id=[id]&_addons=Draw&_controller=LuckyFollow&target=_blank|中奖列表,lists?sports_id=[id]&_addons=Comment&_controller=Comment&target=_blank|评论列表,package?id=[id]&_controller=Sucai&_addons=Sucai&source=Sports&is_preview=1&target=_blank|预览,package?id=[id]&_controller=Sucai&_addons=Sucai&source=Sports&is_download=1&target=_blank|下载素材,[EDIT]|编辑,[DELETE]|删除', '20', 'home_team:请输入球队名', 'MyISAM', 'Draw', '4eef0e099596bffead91491e36335e8a');
INSERT INTO `wp_model` VALUES ('84', 'sports_drum', '擂鼓记录', '1', '', '', '20', '', 'MyISAM', 'Draw', '326cf1924730cb131faf19416579458d');
INSERT INTO `wp_model` VALUES ('85', 'sports_support', '球队支持记录', '1', '', '', '20', '', 'MyISAM', 'Draw', 'a661aa3a21a0206e3ef30fab56bf6e2e');
INSERT INTO `wp_model` VALUES ('86', 'sports_team', '比赛球队', '1', '[\"title\",\"logo\",\"intro\"]', 'logo|get_img_html:球队图标\r\ntitle:球队名称\r\nintro|lists_msubstr:球队说明\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title:请输入球队名', 'MyISAM', 'Draw', '49d14886b007edf7005ea1135de58de5');
INSERT INTO `wp_model` VALUES ('87', 'store', '应用商店', '1', '[\"type\",\"title\",\"price\",\"attach\",\"logo\",\"content\",\"img_1\",\"img_2\",\"img_3\",\"img_4\",\"is_top\",\"audit\",\"audit_time\"]', 'id:ID值\r\ntype:应用类型\r\ntitle:应用标题\r\nprice:价格\r\nlogo|get_img_html:应用LOGO\r\nmTime|time_format:更新时间\r\naudit:审核状态\r\naudit_time|time_format:审核时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'Core', '5e8adbfee94e6b54628fa4e5db2dee2a');
INSERT INTO `wp_model` VALUES ('88', 'sucai', '素材管理', '1', '[\"name\",\"status\",\"cTime\",\"url\",\"type\",\"detail\",\"reason\",\"create_time\",\"checked_time\",\"source\",\"source_id\"]', 'name:素材名称\r\nstatus:状态\r\nurl:页面URL\r\ncreate_time|time_format:申请时间\r\nchecked_time|time_format:入库时间\r\nids:操作', '20', 'name', 'MyISAM', 'Core', 'f6307ed02135c93b127690b5391772b1');
INSERT INTO `wp_model` VALUES ('89', 'sucai_template', '素材模板库', '1', '', '', '20', '', 'MyISAM', 'Core', 'd9dbe7052292510622180f3718cc3f60');
INSERT INTO `wp_model` VALUES ('90', 'survey', '调研问卷', '1', '[\"keyword\",\"keyword_type\",\"title\",\"cover\",\"intro\",\"finish_tip\",\"template\",\"start_time\",\"end_time\"]', 'id:微调研ID\r\nkeyword:关键词\r\nkeyword_type:关键词类型\r\ntitle:标题\r\ncTime|time_format:发布时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,survey_answer&id=[id]|数据管理,preview?id=[id]&target=_blank|预览', '20', 'title', 'MyISAM', 'Survey', '1d41a879ec1b69429e79518c7c242396');
INSERT INTO `wp_model` VALUES ('91', 'survey_answer', '调研回答', '1', '', 'openid:OpenId\r\nnickname:昵称\r\nmobile:手机号\r\ncTime|time_format:参与时间\r\nids:操作:detail?uid=[uid]&survey_id=[survey_id]|回答内容', '20', 'title', 'MyISAM', 'Survey', 'ac6db18664f18bade142f0ff2ef88b4f');
INSERT INTO `wp_model` VALUES ('92', 'survey_question', '调研问题', '1', '[\"title\",\"type\",\"extra\",\"intro\",\"is_must\",\"sort\"]', 'title:标题\r\ntype:问题类型\r\nis_must:是否必填\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'Survey', '3bb94f00b45ded719b90ce3d56ac03e1');
INSERT INTO `wp_model` VALUES ('93', 'system_notice', '系统公告表', '1', '', '', '20', '', 'MyISAM', 'Core', 'f807d186283dcff5803e89725268c981');
INSERT INTO `wp_model` VALUES ('94', 'update_version', '系统版本升级', '1', '[\"version\",\"title\",\"description\",\"create_date\",\"package\"]', 'version:版本号\r\ntitle:升级包名\r\ndescription:描述\r\ncreate_date|time_format:创建时间\r\ndownload_count:下载统计数\r\nids:操作:[EDIT]&id=[id]|编辑,[DELETE]&id=[id]|删除', '20', '', 'MyISAM', 'Core', '646e423b87664ef43e0bb0e20e23afd9');
INSERT INTO `wp_model` VALUES ('95', 'vote', '投票', '1', '[\"keyword\",\"title\",\"description\",\"picurl\",\"start_date\",\"end_date\",\"template\"]', 'id:投票ID\r\nkeyword:关键词\r\ntitle:投票标题\r\ntype:类型\r\nis_img:状态\r\nvote_count:投票数\r\nids:操作:[EDIT]&id=[id]|编辑,[DELETE]|删除,showLog&id=[id]|投票记录,showCount&id=[id]|选项票数,preview?id=[id]&target=_blank|预览', '20', 'title', 'MyISAM', 'Vote', 'e692418f1bbffdf2d9063ff0e2d2e20a');
INSERT INTO `wp_model` VALUES ('96', 'vote_log', '投票记录', '1', '[\"vote_id\",\"user_id\",\"options\"]', 'vote_id:25%用户头像\r\nuser_id:25%用户\r\noptions:25%投票选项\r\ncTime|time_format:25%创建时间\r\n\r\n\r\n\r\n', '20', '', 'MyISAM', 'Vote', '10b7b1b767d7fc4a3b684eb768aba639');
INSERT INTO `wp_model` VALUES ('123', 'vote_option', '投票选项', '1', '[\"name\",\"opt_count\",\"order\"]', 'image|get_img_html:选项图片\r\nname:选项标题\r\nopt_count:投票数', '20', '', 'MyISAM', 'Vote', '3900eea5beb71c8229cbecedebf871c7');
INSERT INTO `wp_model` VALUES ('99', 'weisite_category', '微官网分类', '1', '[\"title\",\"icon\",\"url\",\"is_show\",\"sort\",\"pid\"]', 'title:15%分类标题\r\nicon|get_img_html:分类图片\r\nurl:30%外链\r\nsort:10%排序号\r\npid:10%一级目录\r\nis_show:10%显示\r\nid:10%操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'WeiSite', '3a08171653cc2712434f240b9098e964');
INSERT INTO `wp_model` VALUES ('100', 'weisite_cms', '文章管理', '1', '[\"keyword\",\"keyword_type\",\"title\",\"intro\",\"cate_id\",\"cover\",\"content\",\"sort\"]', 'keyword:关键词\r\nkeyword_type:关键词类型\r\ntitle:标题\r\ncate_id:所属分类\r\nsort:排序号\r\nview_count:浏览数\r\nids:操作:[EDIT]&module_id=[pid]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'WeiSite', '7bf53802e037435f2628bb320468b90c');
INSERT INTO `wp_model` VALUES ('101', 'weisite_footer', '底部导航', '1', '[\"pid\",\"title\",\"url\",\"sort\",\"icon\"]', 'title:15%菜单名\r\nicon:10%图标\r\nurl:50%关联URL\r\nsort:8%排序号\r\nids:20%操作:[EDIT]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'WeiSite', '54c23c576370f399b963f95ff115f2db');
INSERT INTO `wp_model` VALUES ('102', 'weisite_slideshow', '幻灯片', '1', '[\"title\",\"img\",\"url\",\"is_show\",\"sort\"]', 'title:标题\r\nimg:图片\r\nurl:链接地址\r\nis_show:显示\r\nsort:排序\r\nids:操作:[EDIT]&module_id=[pid]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'WeiSite', 'eaa4220f487421cbf8999aa259f0eaab');
INSERT INTO `wp_model` VALUES ('103', 'weixin_message', '微信消息管理', '1', '', 'FromUserName:用户\r\ncontent:内容\r\nCreateTime:时间', '20', '', 'MyISAM', 'Core', '6ffd5e379cd4dc8173a1c5efb90b6839');
INSERT INTO `wp_model` VALUES ('104', 'wish_card', '微贺卡', '1', '[\"send_name\",\"receive_name\",\"content\",\"template\"]', 'send_name:10%发送人\r\nreceive_name:10%接收人\r\ncontent:40%祝福语\r\ncreate_time|time_format:15%创建时间\r\nread_count:10%浏览次数\r\nid:15%操作:[EDIT]|编辑,card_show?id=[id]&target=_blank&_controller=Wap|预览,[DELETE]|删除', '20', 'content:祝福语', 'MyISAM', 'WishCard', 'c71ddcff2d9cae210ab8e291afbad0d6');
INSERT INTO `wp_model` VALUES ('105', 'wish_card_content', '祝福语', '1', '[\"content_cate\",\"content\"]', 'content_cate_id:10%类别Id\r\ncontent_cate:20%类别\r\ncontent:50%祝福语\r\nid:20%操作:[EDIT]|编辑,[DELETE]|删除', '20', '', 'MyISAM', 'WishCard', 'e0e9271b915664c5c1384a1ee403dafb');
INSERT INTO `wp_model` VALUES ('106', 'wish_card_content_cate', '祝福语类别', '1', '[\"content_cate_name\",\"content_cate_icon\"]', 'content_cate_name:类别\r\ncontent_cate_icon|get_img_html:图标\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '20', 'content_cate_name:类别', 'MyISAM', 'WishCard', '6568c4701329361fbb0b474e96370d58');
INSERT INTO `wp_model` VALUES ('201', 'custom_sendall', '客服群发消息', '1', '', '', '10', '', 'MyISAM', 'Core', 'c98b6cddbd39c472fbd0651a8a89e5be');
INSERT INTO `wp_model` VALUES ('148', 'material_text', '文本素材', '1', '[\"content\"]', 'id:编号\r\ncontent:文本内容\r\nids:操作:text_edit?id=[id]|编辑,text_del?id=[id]|删除', '10', 'content:请输入文本内容搜索', 'MyISAM', 'Core', '5c75beb4bf31b7d90935ff1cb90e06d1');
INSERT INTO `wp_model` VALUES ('149', 'material_file', '文件素材', '1', '[\"title\",\"file_id\"]', '', '10', '', 'MyISAM', 'Core', 'f336d0964cba557456205d9969472a10');
INSERT INTO `wp_model` VALUES ('202', 'sms', '短信记录', '1', '', '', '10', '', 'MyISAM', 'Sms', '6d4ee8df3100f2b9ae35984946aceb4e');
INSERT INTO `wp_model` VALUES ('143', 'shop_coupon', '代金券', '1', '[\"title\",\"num\",\"money\",\"money_max\",\"is_money_rand\",\"order_money\",\"limit_num\",\"start_time\",\"end_time\",\"limit_goods\",\"limit_goods_ids\",\"is_market_price\",\"content\",\"member\",\"type\"]', 'title:代金券名称\r\nmoney:面值\r\nlimit_num:领取限制\r\nstart_time:有效期\r\ncollect_count:已领取\r\nuse_count:已使用\r\nids:操作:preview?id=[id]|预览,lists?_controller=Sn&target_id=[id]|领取记录,sncode_lists?id=[id]|核销记录,[EDIT]|编辑,[DELETE]|删除,index&_addons=ShopCoupon&_controller=Wap&id=[id]|复制链接', '10', 'title:请输入代金券名称搜索', 'MyISAM', 'ShopCoupon', '642443f8ce2a8ecec1efefd5fa110f78');
INSERT INTO `wp_model` VALUES ('190', 'reserve', '微预约', '1', '[\"title\",\"intro\",\"cover\",\"can_edit\",\"finish_tip\",\"jump_url\",\"content\",\"template\",\"status\",\"start_time\",\"end_time\",\"pay_online\"]', 'title:标题\r\nstatus:状态\r\nstart_time:报名时间\r\nids:操作:preview&id=[id]|预览,[EDIT]|编辑,reserve_value&id=[id]|预约列表,[DELETE]|删除,index&_addons=Reserve&_controller=Wap&reserve_id=[id]|复制链接', '20', 'title', 'MyISAM', 'Reserve', '2ad3deddf605f20b3925330bedc425dd');
INSERT INTO `wp_model` VALUES ('128', 'business_card_column', '名片栏目', '1', '[\"type\",\"cate_id\",\"title\",\"url\",\"sort\"]', 'type:栏目类型\r\ncate_id:分类名\r\ntitle:标题\r\nurl:url\r\nsort:排序\r\nid:操作:[EDIT]|编辑,[DELETE]|删除', '10', '', 'MyISAM', 'BusinessCard', 'b5c757743fee3fd25445c4ad466a6d98');
INSERT INTO `wp_model` VALUES ('176', 'update_score_log', '修改积分记录', '1', '', '', '10', '', 'MyISAM', 'Core', '8bab31be7bbaaca57bb0d7e99a6e1aad');
INSERT INTO `wp_model` VALUES ('177', 'SignIn_Log', '签到记录', '1', '{\"1\":[\"uid\",\"score\"]}', 'uid:用户ID\r\nnickname:呢称\r\nsTime|time_format:签到时间\r\nscore:积分\r\n', '10', 'uid', 'MyISAM', 'SingIn', '1ae42b046281a1a7854926ca8261ac01');
INSERT INTO `wp_model` VALUES ('175', 'buy_log', '会员消费记录', '1', '[\"pay\",\"pay_type\",\"branch_id\",\"cTime\",\"token\",\"manager_id\",\"sn_id\"]', 'member_id:会员名称\r\nphone:电话\r\ncTime|time_format:消费时间\r\nbranch_id:消费门店\r\npay:消费金额\r\nsn_id:优惠金额\r\npay_type:消费方式', '10', 'member:请输入会员名称或手机号', 'MyISAM', 'Card', '61be2938a1b88c7d35e0cd74c89e9aab');
INSERT INTO `wp_model` VALUES ('174', 'recharge_log', '会员充值记录', '1', '[\"recharge\",\"branch_id\",\"operator\",\"cTime\",\"token\",\"manager_id\"]', 'member_id:会员卡号\r\ntruename:姓名\r\nphone:手机号\r\nrecharge:充值金额\r\ncTime|time_format:充值时间\r\nbranch_id:充值门店\r\noperator:操作员', '10', 'operator:请输入姓名或手机号或操作员', 'MyISAM', 'Card', '9040f5602a292e64328e40596bab0015');
INSERT INTO `wp_model` VALUES ('163', 'shop_vote', '商城微投票', '1', '[\"title\",\"select_type\",\"multi_num\",\"start_time\",\"end_time\",\"is_verify\",\"remark\"]', 'title:活动名称\r\nselect_type:投票类型\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nremark:活动说明\r\nids:操作:[EDIT]&id=[id]|编辑,[DELETE]|删除,option_lists&vote_id=[id]|投票选项,show_log&vote_id=[id]|投票记录,preview&vote_id=[id]|预览,index&_addons=Vote&_controller=Wap&vote_id=[id]|复制链接', '10', 'title:请输入活动名称', 'MyISAM', 'Vote', '7d3d1a8078e00579a7e5de6872e13dc3');
INSERT INTO `wp_model` VALUES ('164', 'shop_vote_option', '投票选项表', '1', '[\"truename\",\"image\",\"manifesto\",\"introduce\"]', 'truename:10%参赛者\r\nimage|get_img_html:10%参赛图片\r\nmanifesto:30%参赛宣言\r\nintroduce:25%选手介绍\r\nopt_count:8%得票数\r\nids:17%操作:option_edit&id=[id]|编辑,option_del&id=[id]|删除,show_log&option_id=[id]|投票记录', '10', 'truename:请输入姓名', 'MyISAM', 'Vote', '1797d983742d0933743136e8a7fc93e7');
INSERT INTO `wp_model` VALUES ('165', 'shop_vote_log', '商城投票记录', '1', '[\"vote_id\",\"option_id\",\"uid\"]', 'vote_id:25%用户头像\r\nuid:25%用户\r\noption_id:25%投票选项\r\nctime|time_format:25%投票时间', '10', 'truename:请输入用户名字', 'MyISAM', 'Vote', '65a9aed7b58b1ca8c08e8cb57542235a');
INSERT INTO `wp_model` VALUES ('166', 'card_privilege', '会员卡特权', '1', '[\"title\",\"grade\",\"start_time\",\"end_time\",\"intro\",\"enable\"]', 'start_time|time_format:特权开始时间\r\nend_time|time_format:特权结束时间\r\ntitle:特权标题\r\ngrade:适用人群\r\nintro:特权内容\r\nenable:是否开启\r\nstatus:状态\r\nid:操作:[EDIT]|编辑,[DELETE]|删除', '10', '', 'MyISAM', 'Card', '7f6971091b108709f64f7f18f5ff2d81');
INSERT INTO `wp_model` VALUES ('167', 'card_level', '会员等级', '1', '[\"level\",\"score\",\"recharge\",\"discount\"]', 'level:会员等级\r\nscore:累计积分\r\nrecharge:累计充值\r\ndiscount:享受折扣\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '10', '', 'MyISAM', 'Card', '20b66f08dd9c87d456e44702eb4ae31f');
INSERT INTO `wp_model` VALUES ('171', 'card_coupons', '会员卡优惠券', '1', '{\"1\":[\"title\",\"give_type\",\"start_date\",\"end_date\",\"content\"]}', 'title:标题\r\ngive_type:发放方式\r\nstart_date|time_format:开始时间\r\nend_date|time_format:结束时间\r\ncTime|time_format:发布时间\r\nid:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title', 'MyISAM', 'Card', '69e7629121a4f6efdc9a775568296a65');
INSERT INTO `wp_model` VALUES ('172', 'card_notice', '会员卡通知', '1', '[\"title\",\"img\",\"grade\",\"content\"]', 'title:标题\r\ncTime|time_format:发布时间\r\nid:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title', 'MyISAM', 'Card', 'd04801045a71f3514dee4cd2a12a6d44');
INSERT INTO `wp_model` VALUES ('173', 'card_member', '会员卡成员', '1', '[\"phone\",\"username\",\"recharge\"]', 'number:卡号\r\nuid:uid\r\nusername:姓名\r\nphone:手机号\r\nscore:剩余积分\r\nrecharge:余额\r\nlevel:等级\r\ncTime|time_format:加入时间\r\nstatus:状态\r\nid:操作:[EDIT]|编辑,[DELETE]|删除,do_recharge&id=[id]|会员充值,do_buy&id=[id]|会员消费,update_score&id=[id]|手动修改积分', '10', 'username:请输入姓名', 'MyISAM', 'Card', 'ed801c2ba28f78115bbeb3a53e4c2e91');
INSERT INTO `wp_model` VALUES ('179', 'card_marketing', '会员营销活动', '1', '', '', '10', '', 'MyISAM', 'Card', '56db570aa84c45893ab4ec4b7afbbf70');
INSERT INTO `wp_model` VALUES ('180', 'card_reward', '开卡即送活动', '1', '[\"title\",\"start_time\",\"end_time\",\"type\",\"score\",\"is_show\",\"content\",\"coupon_id\"]', 'title:活动名称\r\ntype:活动策略\r\nstart_time:有效期\r\nstatus:活动状态\r\nid:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title:请输入活动名称搜索', 'MyISAM', 'Card', '67a26c10397c09848d506bc1ab4a04e0');
INSERT INTO `wp_model` VALUES ('181', 'card_score', '积分兑换活动', '1', '[\"title\",\"start_time\",\"end_time\",\"num_limit\",\"coupon_id\",\"score_limit\",\"member\",\"coupon_type\"]', 'title:活动名称\r\ncoupon_id:兑换内容\r\nstart_time:有效期\r\nstatus:活动状态\r\nmember:适用人群\r\nid:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title:请输入活动名称搜索', 'MyISAM', 'Card', '2d96107dc50ea1baa3c59afe2a26689c');
INSERT INTO `wp_model` VALUES ('183', 'card_recharge', '充值赠送活动', '1', '[\"title\",\"start_time\",\"end_time\",\"is_mult\",\"is_all_goods\"]', 'title:活动名称\r\nstart_time:有效期\r\nstatus:活动状态\r\nid:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title:请输入活动名称搜索', 'MyISAM', 'Card', 'fc2b2bfbf6b9d081d41e8573f8779b80');
INSERT INTO `wp_model` VALUES ('184', 'card_recharge_condition', '充值赠送条件', '1', '[\"postage\",\"money_param\",\"sort\",\"condition\",\"score\",\"score_param\",\"shop_coupon\",\"shop_coupon_param\"]', '', '10', '', 'MyISAM', 'Card', '03f23579f26d6ca7ec3495e46f0c3594');
INSERT INTO `wp_model` VALUES ('185', 'card_custom', '客户关怀活动', '1', '[\"title\",\"start_time\",\"end_time\",\"type\",\"score\",\"is_show\",\"content\",\"coupon_id\",\"member\",\"is_birthday\",\"before_day\"]', 'title:节日名称\r\nstart_time:节日时间\r\nmember:目标人群\r\nend_time:赠送时间\r\ntype:赠送内容\r\nid:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title:请输入活动名称搜索', 'MyISAM', 'Card', 'd0c61e563f97572e40c0709388dd91f4');
INSERT INTO `wp_model` VALUES ('186', 'score_exchange_log', '兑换记录', '1', '', '', '10', '', 'MyISAM', 'Card', '69ae7fd3e6359752be0c7d516d0c324f');
INSERT INTO `wp_model` VALUES ('187', 'share_log', '分享记录', '1', '', '', '10', '', 'MyISAM', 'Card', 'cfe864927fffc6405b9ff018ea7bb568');
INSERT INTO `wp_model` VALUES ('188', 'lottery_games', '抽奖游戏', '1', '[\"title\",\"keyword\",\"game_type\",\"start_time\",\"end_time\",\"status\",\"day_attend_limit\",\"attend_limit\",\"day_win_limit\",\"win_limit\",\"day_winners_count\",\"remark\"]', 'id:序号\r\ntitle:活动名称\r\ngame_type:游戏类型\r\nkeyword:关键词\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nstatus:活动状态\r\nattend_num:参与人数\r\nwinners_list:中奖人列表\r\nids:操作:[EDIT]|编辑,[DELETE]|删除,preview&games_id=[id]|预览,index&_addons=Draw&_controller=Wap&games_id=[id]|复制链接', '10', '', 'MyISAM', 'Draw', '0ffb2d8a42e01c0d3b549ff6da0f0ba5');
INSERT INTO `wp_model` VALUES ('189', 'lottery_games_award_link', '抽奖游戏奖品设置', '1', '', '', '10', '', 'MyISAM', 'Draw', '4347342dc5ae1cfef1495c1091fb1329');
INSERT INTO `wp_model` VALUES ('193', 'reserve_option', '预约选项', '1', '', '', '10', '', 'MyISAM', 'Reserve', '54e3477ca7925ff66e68b49142117668');
INSERT INTO `wp_model` VALUES ('191', 'reserve_attribute', '微预约字段', '1', '[\"name\",\"title\",\"type\",\"extra\",\"value\",\"remark\",\"is_must\",\"validate_rule\",\"error_info\",\"sort\"]', 'title:字段标题\r\nname:字段名\r\ntype:字段类型\r\nids:操作:[EDIT]&reserve_id=[reserve_id]|编辑,[DELETE]|删除', '20', 'title', 'MyISAM', 'Reserve', 'ca0583640f800b2a8372c09e92123d82');
INSERT INTO `wp_model` VALUES ('192', 'reserve_value', '微预约数据', '1', '', '', '20', '', 'MyISAM', 'Reserve', '1a20db0aaffc9b0563a4844d6b6f109f');
INSERT INTO `wp_model` VALUES ('1134', 'exam', '考试试卷', '1', '[\"keyword\",\"keyword_type\",\"title\",\"intro\",\"cover\",\"finish_tip\"]', 'keyword:关键词\r\nkeyword_type:关键词匹配类型\r\ntitle:试卷标题\r\nstart_time|time_format:开始时间\r\nend_time|time_format:结束时间\r\nid:操作:[EDIT]|编辑,[DELETE]|删除,exam_question&target=_blank&id=[id]|题目管理,exam_answer&target=_blank&id=[id]|考生成绩,preview&id=[id]&target=_blank|试卷预览', '10', 'title:请输入试卷标题搜索', 'MyISAM', 'Exam', '34986b8d771050f06e189f8b3a7061eb');
INSERT INTO `wp_model` VALUES ('1135', 'exam_question', '考试题目', '1', '{\"1\":[\"title\",\"type\",\"extra\",\"intro\",\"is_must\",\"sort\"]}', 'title:标题\r\ntype:题目类型\r\nscore:分值\r\nid:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title', 'MyISAM', 'Exam', '135f0f5804ab409443eb153552160589');
INSERT INTO `wp_model` VALUES ('1136', 'exam_answer', '考试回答', '1', '', 'openid:OpenId\r\ntruename:姓名\r\nmobile:手机号\r\nscore:成绩\r\ncTime|time_format:考试时间\r\nid:操作:detail?uid=[uid]&exam_id=[exam_id]|答题详情', '10', 'title', 'MyISAM', 'Exam', 'dc80191244c1939f58292977a4543730');
INSERT INTO `wp_model` VALUES ('1137', 'test', '测试问卷', '1', '[\"keyword\",\"keyword_type\",\"title\",\"intro\",\"cover\",\"finish_tip\"]', 'keyword:关键词\r\nkeyword_type:关键词匹配类型\r\ntitle:问卷标题\r\nid:操作:[EDIT]|编辑,[DELETE]|删除,test_question&target=_blank&id=[id]|题目管理,test_answer&target=_blank&id=[id]|用户记录,preview&target=_blank&id=[id]|问卷预览', '10', 'title:请输入问卷标题搜索', 'MyISAM', 'Test', '38ca9322f86b764b7e2f418f8cf04ab8');
INSERT INTO `wp_model` VALUES ('1138', 'test_question', '测试题目', '1', '{\"1\":[\"title\",\"extra\",\"intro\",\"sort\"]}', 'id:问题编号\r\ntitle:标题\r\nextra:参数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title', 'MyISAM', 'Test', '07d69da97728ae5b73e273a08fc3b441');
INSERT INTO `wp_model` VALUES ('1139', 'test_answer', '测试回答', '1', '', 'openid:OpenId\r\ntruename:姓名\r\nmobile:手机号\r\nscore:得分\r\ncTime|time_format:测试时间\r\nid:操作:detail?uid=[uid]&test_id=[test_id]|答题详情', '10', 'title', 'MyISAM', 'Test', '940e3c8db80a675c5df5710f20cb0737');
INSERT INTO `wp_model` VALUES ('1147', 'weiba_category', '微吧分类', '1', '[\"name\"]', 'id:分类编号\r\nname:分类名称\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'name:请输入分类名称搜索', 'MyISAM', 'Weiba', '99a7a6cc3e8be95d8cad012ac0f17494');
INSERT INTO `wp_model` VALUES ('1148', 'weiba', '微社区', '1', '[\"weiba_name\",\"cid\",\"logo\",\"who_can_post\",\"recommend\",\"admin_uid\",\"intro\",\"notify\"]', 'id:微吧ID\r\nweiba_name:版块名称\r\ncid:版块分类\r\nthread_count:帖子数\r\nfollower_count:成员数\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'weiba_name:请输入版块名称搜索', 'MyISAM', 'Weiba', 'f5ec1b287e98526b6f6b30170b0a50b5');
INSERT INTO `wp_model` VALUES ('1149', 'weiba_post', '微社区帖子', '1', '[\"weiba_id\",\"title\",\"content\"]', 'id:帖子编号\r\ntitle:帖子标题\r\nweiba_id:所属版块\r\npost_uid:发帖人\r\nread_count:浏览数\r\nreply_count:回复数\r\npost_time|time_format:发帖时间\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title:请输入标题搜索', 'MyISAM', 'Weiba', '6d623b3e764566a0203fc394ccec2ab3');
INSERT INTO `wp_model` VALUES ('1150', 'user_tag', '用户标签', '1', '[\"title\"]', 'id:标签编号\r\ntitle:标签名称\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '10', 'title:请输入标签名称搜索', 'MyISAM', 'UserCenter', '29aa7d6d57aca5b7edda9ac3b8de3086');
INSERT INTO `wp_model` VALUES ('1151', 'user_tag_link', '用户标签关系表', '1', '', '', '10', '', 'MyISAM', 'UserCenter', 'de1a4aa19fdac24cff8cceb661441c54');
INSERT INTO `wp_model` VALUES ('1152', 'qr_admin', '扫码管理', '1', '[\"action_name\",\"group_id\",\"tag_ids\"]', 'qr_code:二维码\r\naction_name:类型\r\ngroup_id:用户组\r\ntag_ids:标签\r\nids:操作:[EDIT]|编辑,[DELETE]|删除', '10', '', 'MyISAM', 'QrAdmin', '1d0ef6e95f0309ef85fee990e389f547');
INSERT INTO `wp_model` VALUES ('1153', 'servicer', '授权用户', '1', '[\"uid\",\"truename\",\"mobile\",\"role\",\"enable\"]', 'truename:姓名\r\nrole:权限列表\r\nnickname:微信名称\r\nenable:是否启用\r\nids:操作:set_enable?id=[id]&enable=[enable]|改变启用状态,[EDIT]|编辑,[DELETE]|删除', '10', 'truename', 'MyISAM', 'Shop', 'da9fb0db4d62aec8470134997c783248');
INSERT INTO `wp_model` VALUES ('1154', 'shop_address', '收货地址', '1', '', '', '20', '', 'MyISAM', 'Shop', '2a80cf035cddd794b688cc75f11419bc');
INSERT INTO `wp_model` VALUES ('1157', 'tool', '用户信息表', '1', null, null, '10', 'title:请输入标题进行搜索44', 'MyISAM', 'Wecome', 'e3012e3cb91bb906e243084ef994bb3d');
INSERT INTO `wp_model` VALUES ('1160', 'api', 'api应用', '1', null, null, '20', 'title:搜索接口名称', 'MyISAM', 'Api', 'cbc1d8ce04b6e8b12e04e35913d24eca');
INSERT INTO `wp_model` VALUES ('1161', 'api_param', 'API参数', '1', null, null, '0', '', 'MyISAM', 'Api', 'c8dfd7810c4bccfd14ca8306d16132e5');
INSERT INTO `wp_model` VALUES ('1162', 'admin_log', '管理日志表', '1', null, null, '20', '', 'MyISAM', 'Core', null);
INSERT INTO `wp_model` VALUES ('1163', 'request_log', '接口日志', '1', null, null, '20', 'url', 'MyISAM', 'Core', null);
INSERT INTO `wp_model` VALUES ('1164', 'debug_log', '调试日志', '1', null, null, '20', '', 'MyISAM', 'Core', null);
INSERT INTO `wp_model` VALUES ('1165', 'error_log', '错误日志', '1', null, null, '0', '', 'MyISAM', 'Core', null);
INSERT INTO `wp_model` VALUES ('1166', 'docs', '文档库', '1', null, null, '20', '', 'MyISAM', 'WeiApp', null);
INSERT INTO `wp_model` VALUES ('1167', 'api_access_token', 'API ACCESS TOKEN', '1', null, null, '0', '', 'MyISAM', 'Api', null);
INSERT INTO `wp_model` VALUES ('1168', 'cms', '小程序CMS', '1', null, null, '20', '', 'MyISAM', 'Cms', null);
INSERT INTO `wp_model` VALUES ('1169', 'feedback', '用户反馈', '1', null, null, '20', '', 'MyISAM', 'Feedback', null);

-- ----------------------------
-- Table structure for `wp_online_count`
-- ----------------------------
DROP TABLE IF EXISTS `wp_online_count`;
CREATE TABLE `wp_online_count` (
  `publicid` int(11) DEFAULT NULL,
  `addon` varchar(30) DEFAULT NULL,
  `aim_id` int(11) DEFAULT NULL,
  `time` bigint(12) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  KEY `tc` (`time`,`count`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_online_count
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_payment`
-- ----------------------------
DROP TABLE IF EXISTS `wp_payment`;
CREATE TABLE `wp_payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `out_trade_no` char(32) NOT NULL,
  `total_fee` int(11) NOT NULL,
  `appid` char(32) NOT NULL,
  `token` char(32) DEFAULT NULL,
  `openid` char(128) DEFAULT NULL,
  `callback` varchar(200) NOT NULL,
  `prepay_id` char(64) DEFAULT NULL,
  `code_url` char(64) DEFAULT NULL,
  `return_code` char(16) DEFAULT NULL,
  `return_msg` char(128) DEFAULT NULL,
  `result_code` char(16) DEFAULT NULL,
  `err_code_des` char(200) DEFAULT NULL,
  `cTime` int(10) NOT NULL,
  `param` text,
  `res_data` text,
  `is_pay` tinyint(1) DEFAULT '0',
  `after_pay_res` text,
  PRIMARY KEY (`id`),
  KEY `out_trade_no` (`out_trade_no`,`appid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_payment
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_payment_order`
-- ----------------------------
DROP TABLE IF EXISTS `wp_payment_order`;
CREATE TABLE `wp_payment_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `from` varchar(50) NOT NULL COMMENT '回调地址',
  `orderName` varchar(255) DEFAULT NULL COMMENT '订单名称',
  `single_orderid` varchar(100) NOT NULL COMMENT '订单号',
  `price` decimal(10,2) DEFAULT NULL COMMENT '价格',
  `token` varchar(100) NOT NULL COMMENT 'Token',
  `wecha_id` varchar(200) NOT NULL COMMENT 'OpenID',
  `paytype` varchar(30) NOT NULL COMMENT '支付方式',
  `showwxpaytitle` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否显示标题',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '支付状态',
  `aim_id` int(10) DEFAULT NULL COMMENT 'aim_id',
  `uid` int(10) DEFAULT NULL COMMENT '用户uid',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_payment_order
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_payment_scan`
-- ----------------------------
DROP TABLE IF EXISTS `wp_payment_scan`;
CREATE TABLE `wp_payment_scan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `appid` char(32) NOT NULL,
  `callback` char(100) NOT NULL,
  `product_id` char(32) NOT NULL,
  `out_trade_no` char(32) DEFAULT NULL,
  `total_fee` int(11) DEFAULT NULL,
  `cTime` int(10) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `shorturl_res` text,
  `order_param` varchar(255) DEFAULT NULL,
  `order_data` text,
  `order_res` text,
  PRIMARY KEY (`id`),
  KEY `appid_product_id` (`appid`,`product_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_payment_scan
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_payment_set`
-- ----------------------------
DROP TABLE IF EXISTS `wp_payment_set`;
CREATE TABLE `wp_payment_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `ctime` int(10) DEFAULT NULL COMMENT '创建时间',
  `wxappid` varchar(255) DEFAULT NULL COMMENT 'AppID',
  `wxpaysignkey` varchar(255) DEFAULT NULL COMMENT '支付密钥',
  `wxappsecret` varchar(255) DEFAULT NULL COMMENT 'AppSecret',
  `zfbname` varchar(255) DEFAULT NULL COMMENT '帐号',
  `pid` varchar(255) DEFAULT NULL COMMENT 'PID',
  `key` varchar(255) DEFAULT NULL COMMENT 'KEY',
  `partnerid` varchar(255) DEFAULT NULL COMMENT '财付通标识',
  `partnerkey` varchar(255) DEFAULT NULL COMMENT '财付通Key',
  `wappartnerid` varchar(255) DEFAULT NULL COMMENT '财付通标识WAP',
  `wappartnerkey` varchar(255) DEFAULT NULL COMMENT 'WAP财付通Key',
  `wxpartnerkey` varchar(255) DEFAULT NULL COMMENT '微信partnerkey',
  `wxpartnerid` varchar(255) DEFAULT NULL COMMENT '微信partnerid',
  `quick_security_key` varchar(255) DEFAULT NULL COMMENT '银联在线Key',
  `quick_merid` varchar(255) DEFAULT NULL COMMENT '银联在线merid',
  `quick_merabbr` varchar(255) DEFAULT NULL COMMENT '商户名称',
  `shop_id` int(10) DEFAULT '0' COMMENT '商店ID',
  `wxmchid` varchar(255) DEFAULT NULL COMMENT '微信支付商户号',
  `wx_cert_pem` int(10) unsigned DEFAULT NULL COMMENT '上传证书',
  `wx_key_pem` int(10) unsigned DEFAULT NULL COMMENT '上传密匙',
  `shop_pay_score` int(10) DEFAULT '0' COMMENT '支付返积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_payment_set
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_picture`
-- ----------------------------
DROP TABLE IF EXISTS `wp_picture`;
CREATE TABLE `wp_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `category_id` int(255) DEFAULT '0',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `token` varchar(255) DEFAULT NULL,
  `system` tinyint(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `status` (`id`,`status`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=830 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_picture
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_picture_category`
-- ----------------------------
DROP TABLE IF EXISTS `wp_picture_category`;
CREATE TABLE `wp_picture_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `system` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_picture_category
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_plugin`
-- ----------------------------
DROP TABLE IF EXISTS `wp_plugin`;
CREATE TABLE `wp_plugin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  `cate_id` int(11) DEFAULT NULL,
  `is_show` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`) USING BTREE,
  KEY `sti` (`status`,`is_show`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COMMENT='系统插件表';

-- ----------------------------
-- Records of wp_plugin
-- ----------------------------
INSERT INTO `wp_plugin` VALUES ('15', 'EditorForAdmin', '后台编辑器', '用于增强整站长文本的输入和显示', '1', '{\"editor_type\":\"2\",\"editor_wysiwyg\":\"2\",\"editor_height\":\"500px\",\"editor_resize_type\":\"1\"}', 'thinkphp', '0.1', '1383126253', '0', null, '1');
INSERT INTO `wp_plugin` VALUES ('5', 'Editor', '前台编辑器', '用于增强整站长文本的输入和显示', '1', '{\"editor_type\":\"2\",\"editor_wysiwyg\":\"1\",\"editor_height\":\"300px\",\"editor_resize_type\":\"1\"}', 'thinkphp', '0.1', '1379830910', '0', null, '1');
INSERT INTO `wp_plugin` VALUES ('58', 'Cascade', '级联菜单', '支持无级级联菜单，用于地区选择、多层分类选择等场景。菜单的数据来源支持查询数据库和直接用户按格式输入两种方式', '1', 'null', '凡星', '0.1', '1398694996', '0', null, '1');
INSERT INTO `wp_plugin` VALUES ('120', 'DynamicSelect', '动态下拉菜单', '支持动态从数据库里取值显示', '1', 'null', '凡星', '0.1', '1435223177', '0', null, '1');
INSERT INTO `wp_plugin` VALUES ('125', 'News', '图文素材选择器', '', '1', 'null', '凡星', '0.1', '1439198046', '0', null, '1');
INSERT INTO `wp_plugin` VALUES ('127', 'DynamicCheckbox', '动态多选菜单', '支持动态从数据库里取值显示', '1', 'null', '凡星', '0.1', '1464002908', '0', null, '1');
INSERT INTO `wp_plugin` VALUES ('128', 'Prize', '奖品选择', '支持多种奖品选择', '1', 'null', '凡星', '0.1', '1464060178', '0', null, '1');
INSERT INTO `wp_plugin` VALUES ('129', 'Material', '素材选择', '支持动态从素材库里选择素材', '1', 'null', '凡星', '0.1', '1464060381', '0', null, '1');

-- ----------------------------
-- Table structure for `wp_prize_address`
-- ----------------------------
DROP TABLE IF EXISTS `wp_prize_address`;
CREATE TABLE `wp_prize_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `address` varchar(255) DEFAULT NULL COMMENT '奖品收货地址',
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机',
  `turename` varchar(255) DEFAULT NULL COMMENT '收货人姓名',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `prizeid` int(10) DEFAULT NULL COMMENT '奖品编号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_prize_address
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_qr_admin`
-- ----------------------------
DROP TABLE IF EXISTS `wp_qr_admin`;
CREATE TABLE `wp_qr_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `action_name` varchar(30) NOT NULL DEFAULT 'QR_SCENE' COMMENT '类型',
  `group_id` int(10) DEFAULT '0' COMMENT '用户组',
  `tag_ids` varchar(255) DEFAULT NULL COMMENT '用户标签',
  `qr_code` varchar(255) DEFAULT NULL COMMENT '二维码',
  `material` varchar(50) DEFAULT NULL COMMENT '扫码后的回复内容',
  `mult_pic` varchar(255) DEFAULT NULL COMMENT '多图上传',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_qr_admin
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_qr_code`
-- ----------------------------
DROP TABLE IF EXISTS `wp_qr_code`;
CREATE TABLE `wp_qr_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `qr_code` varchar(255) NOT NULL COMMENT '二维码',
  `addon` varchar(255) NOT NULL COMMENT '二维码所属插件',
  `aim_id` int(10) unsigned NOT NULL COMMENT '插件表里的ID值',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `action_name` char(30) DEFAULT 'QR_SCENE' COMMENT '二维码类型',
  `extra_text` text COMMENT '文本扩展',
  `extra_int` int(10) DEFAULT NULL COMMENT '数字扩展',
  `request_count` int(10) DEFAULT '0' COMMENT '请求数',
  `scene_id` int(10) DEFAULT '0' COMMENT '场景ID',
  `expire_seconds` int(11) DEFAULT '2592000' COMMENT '有效期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_qr_code
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_real_prize`
-- ----------------------------
DROP TABLE IF EXISTS `wp_real_prize`;
CREATE TABLE `wp_real_prize` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `prize_name` varchar(255) DEFAULT NULL COMMENT '奖品名称',
  `prize_conditions` text COMMENT '活动说明',
  `prize_count` int(10) DEFAULT NULL COMMENT '奖品个数',
  `prize_image` varchar(255) DEFAULT '上传奖品图片' COMMENT '奖品图片',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `prize_type` tinyint(2) DEFAULT '1' COMMENT '奖品类型',
  `use_content` text COMMENT '使用说明',
  `prize_title` varchar(255) DEFAULT NULL COMMENT '活动标题',
  `fail_content` text COMMENT '领取失败提示',
  `template` varchar(255) DEFAULT 'default' COMMENT '素材模板',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_real_prize
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_recharge_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_recharge_log`;
CREATE TABLE `wp_recharge_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `recharge` float DEFAULT NULL COMMENT '充值金额',
  `branch_id` int(10) DEFAULT '0' COMMENT '充值门店',
  `operator` varchar(255) DEFAULT NULL COMMENT '操作员',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `member_id` int(10) DEFAULT NULL COMMENT '会员id',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员id',
  `type` tinyint(2) DEFAULT '1' COMMENT '充值方式',
  `remark` text COMMENT '备注',
  `uid` int(10) DEFAULT NULL COMMENT '用户ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_recharge_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_redbag`
-- ----------------------------
DROP TABLE IF EXISTS `wp_redbag`;
CREATE TABLE `wp_redbag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `mch_id` varchar(32) DEFAULT NULL COMMENT '商户号',
  `sub_mch_id` varchar(32) DEFAULT NULL COMMENT '子商户号',
  `wxappid` varchar(32) DEFAULT NULL COMMENT '公众账号appid',
  `nick_name` varchar(32) DEFAULT NULL COMMENT '提供方名称',
  `send_name` varchar(32) DEFAULT NULL COMMENT '商户名称',
  `total_amount` int(10) DEFAULT '1000' COMMENT '付款金额',
  `min_value` int(10) DEFAULT '1000' COMMENT '最小红包金额',
  `max_value` int(10) DEFAULT '1000' COMMENT '最大红包金额',
  `total_num` int(10) DEFAULT '1' COMMENT '红包发放总人数',
  `wishing` varchar(255) DEFAULT NULL COMMENT '红包祝福语',
  `act_name` varchar(255) DEFAULT NULL COMMENT '活动名称',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `logo_imgurl` int(10) unsigned DEFAULT NULL COMMENT '商户logo的url',
  `share_content` varchar(255) DEFAULT NULL COMMENT '分享文案',
  `share_url` varchar(255) DEFAULT NULL COMMENT '分享链接',
  `share_imgurl` int(10) unsigned DEFAULT NULL COMMENT '分享的图片',
  `collect_count` int(10) DEFAULT '0' COMMENT '领取人数',
  `collect_amount` int(10) DEFAULT '0' COMMENT '已领取金额',
  `collect_limit` tinyint(2) DEFAULT '0' COMMENT '每人最多领取次数',
  `partner_key` varchar(50) DEFAULT NULL COMMENT '商户API密钥',
  `template` varchar(255) DEFAULT 'default' COMMENT '素材模板',
  `token` varchar(50) DEFAULT NULL COMMENT 'token',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `act_remark` varchar(255) DEFAULT NULL COMMENT '活动备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_redbag
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_redbag_follow`
-- ----------------------------
DROP TABLE IF EXISTS `wp_redbag_follow`;
CREATE TABLE `wp_redbag_follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `redbag_id` int(10) DEFAULT NULL COMMENT '红包ID',
  `follow_id` int(10) DEFAULT NULL COMMENT '粉丝ID',
  `amount` int(10) DEFAULT '0' COMMENT '领取金额',
  `cTime` int(10) DEFAULT NULL COMMENT '发放时间',
  `status` char(10) DEFAULT 'SENDING' COMMENT '发放状态',
  `reason` varchar(50) DEFAULT NULL COMMENT '失败原因 ',
  `Rcv_time` int(10) DEFAULT NULL COMMENT '领取红包的时间 ',
  `Send_time` int(10) DEFAULT NULL COMMENT '红包发送时间 ',
  `Refund_time` int(10) DEFAULT NULL COMMENT '红包退款时间',
  `extra` text COMMENT '微信返回的数据集',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_redbag_follow
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_redbag_recode`
-- ----------------------------
DROP TABLE IF EXISTS `wp_redbag_recode`;
CREATE TABLE `wp_redbag_recode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wxappid` char(32) NOT NULL,
  `re_openid` char(32) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `mch_billno` varchar(100) DEFAULT NULL,
  `cTime` int(10) NOT NULL,
  `status` tinyint(2) DEFAULT '1' COMMENT '0 表示已下发 1 表示待下发 2 延时下发 3 下发失败 4 自定义失败原因',
  `wait_time` int(10) DEFAULT NULL,
  `more_param` text,
  `log_md5` char(32) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `act_id` int(11) DEFAULT NULL,
  `act_mod` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_redbag_recode
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_request_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_request_log`;
CREATE TABLE `wp_request_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `md5` char(32) CHARACTER SET utf8 NOT NULL COMMENT 'md5标识',
  `url` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT '接口地址',
  `param` text CHARACTER SET utf8 COMMENT '序列化后的参数',
  `res` text COMMENT '接口返回的参数',
  `error_code` char(32) CHARACTER SET utf8 DEFAULT NULL COMMENT 'curl的错误码',
  `msg` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'curl的错误提示',
  `server_ip` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '服务器IP地址',
  `cTime` int(10) NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=824 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wp_request_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_reserve`
-- ----------------------------
DROP TABLE IF EXISTS `wp_reserve`;
CREATE TABLE `wp_reserve` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `password` varchar(255) DEFAULT NULL COMMENT '微预约密码',
  `jump_url` varchar(255) DEFAULT NULL COMMENT '提交后跳转的地址',
  `content` text COMMENT '详细介绍',
  `finish_tip` text COMMENT '用户提交后提示内容',
  `can_edit` tinyint(2) DEFAULT '0' COMMENT '是否允许编辑',
  `intro` text COMMENT '封面简介',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `cover` int(10) unsigned DEFAULT NULL COMMENT '封面图片',
  `template` varchar(255) DEFAULT 'default' COMMENT '模板',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态',
  `start_time` int(10) DEFAULT NULL COMMENT '报名开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '报名结束时间',
  `pay_online` tinyint(2) DEFAULT '0' COMMENT '是否支持在线支付',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_reserve
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_reserve_attribute`
-- ----------------------------
DROP TABLE IF EXISTS `wp_reserve_attribute`;
CREATE TABLE `wp_reserve_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `is_show` tinyint(2) DEFAULT '1' COMMENT '是否显示',
  `reserve_id` int(10) unsigned DEFAULT NULL COMMENT '微预约ID',
  `error_info` varchar(255) DEFAULT NULL COMMENT '出错提示',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序号',
  `validate_rule` varchar(255) DEFAULT NULL COMMENT '正则验证',
  `is_must` tinyint(2) DEFAULT NULL COMMENT '是否必填',
  `remark` varchar(255) DEFAULT NULL COMMENT '字段备注',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `value` varchar(255) DEFAULT NULL COMMENT '默认值',
  `title` varchar(255) NOT NULL COMMENT '字段标题',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `extra` text COMMENT '参数',
  `type` char(50) NOT NULL DEFAULT 'string' COMMENT '字段类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_reserve_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_reserve_option`
-- ----------------------------
DROP TABLE IF EXISTS `wp_reserve_option`;
CREATE TABLE `wp_reserve_option` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `reserve_id` int(10) DEFAULT NULL COMMENT '预约活动ID',
  `name` varchar(100) DEFAULT NULL COMMENT '名称',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '报名费用',
  `max_limit` int(10) DEFAULT '0' COMMENT '最大预约数',
  `init_count` int(10) DEFAULT '0' COMMENT '初始化预约数',
  `join_count` int(10) DEFAULT '0' COMMENT '参加人数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_reserve_option
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_reserve_value`
-- ----------------------------
DROP TABLE IF EXISTS `wp_reserve_value`;
CREATE TABLE `wp_reserve_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `reserve_id` int(10) unsigned DEFAULT NULL COMMENT '微预约ID',
  `value` text COMMENT '微预约值',
  `cTime` int(10) DEFAULT NULL COMMENT '增加时间',
  `openid` varchar(255) DEFAULT NULL COMMENT 'OpenId',
  `uid` int(10) DEFAULT NULL COMMENT '用户ID',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `is_check` int(10) DEFAULT '0' COMMENT '验证是否成功',
  `is_pay` int(10) DEFAULT '0' COMMENT '是否支付',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_reserve_value
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_score_exchange_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_score_exchange_log`;
CREATE TABLE `wp_score_exchange_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `card_score_id` int(10) DEFAULT NULL COMMENT '兑换活动id',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `ctime` int(10) DEFAULT NULL COMMENT 'ctime',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_score_exchange_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_servicer`
-- ----------------------------
DROP TABLE IF EXISTS `wp_servicer`;
CREATE TABLE `wp_servicer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) NOT NULL COMMENT '用户选择',
  `truename` varchar(255) NOT NULL COMMENT '真实姓名',
  `mobile` varchar(255) NOT NULL COMMENT '手机号',
  `role` varchar(100) DEFAULT '2' COMMENT '授权列表',
  `enable` int(10) DEFAULT '1' COMMENT '是否启用',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_servicer
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_share_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_share_log`;
CREATE TABLE `wp_share_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `sTime` int(10) DEFAULT NULL COMMENT '分享时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `score` int(10) DEFAULT NULL COMMENT '积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_share_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_shop_address`
-- ----------------------------
DROP TABLE IF EXISTS `wp_shop_address`;
CREATE TABLE `wp_shop_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT NULL COMMENT '用户ID',
  `truename` varchar(100) DEFAULT NULL COMMENT '收货人姓名',
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机号码',
  `city` varchar(255) DEFAULT NULL COMMENT '城市',
  `address` varchar(255) DEFAULT NULL COMMENT '具体地址',
  `is_use` tinyint(2) DEFAULT '0' COMMENT '是否设置为默认',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_shop_address
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_shop_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `wp_shop_coupon`;
CREATE TABLE `wp_shop_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(30) DEFAULT NULL COMMENT '优惠券名称',
  `num` int(10) DEFAULT '0' COMMENT '发放量',
  `money` decimal(11,2) DEFAULT NULL COMMENT '面值',
  `money_max` decimal(11,2) DEFAULT '0.00' COMMENT '最大面值',
  `is_money_rand` tinyint(2) DEFAULT '0' COMMENT '面值是否随机',
  `order_money` decimal(11,2) DEFAULT '0.00' COMMENT '订单金额',
  `limit_num` char(50) DEFAULT '0' COMMENT '每人限领',
  `start_time` int(10) DEFAULT NULL COMMENT '生效时间',
  `end_time` int(10) DEFAULT NULL COMMENT '过期时间',
  `limit_goods` tinyint(2) DEFAULT '0' COMMENT '可适用商品',
  `limit_goods_ids` varchar(100) DEFAULT NULL COMMENT '指定的商品',
  `is_market_price` tinyint(2) DEFAULT '0' COMMENT '仅原价购买商品时可用 ',
  `content` text COMMENT '使用说明',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态',
  `collect_count` int(10) DEFAULT '0' COMMENT '领取数',
  `use_count` int(10) DEFAULT '0' COMMENT '已使用数',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `member` varchar(100) DEFAULT '0' COMMENT '选择人群',
  `type` char(10) DEFAULT '0' COMMENT '优惠券类型',
  `is_del` int(10) DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_shop_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_shop_vote`
-- ----------------------------
DROP TABLE IF EXISTS `wp_shop_vote`;
CREATE TABLE `wp_shop_vote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '活动名称',
  `select_type` char(10) DEFAULT '1' COMMENT '投票类型',
  `multi_num` int(10) DEFAULT '0' COMMENT '多选限制',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '结束时间',
  `remark` text COMMENT '活动说明',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员id',
  `is_verify` tinyint(2) DEFAULT '0' COMMENT '投票是否需要填写验证码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_shop_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_shop_vote_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_shop_vote_log`;
CREATE TABLE `wp_shop_vote_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `vote_id` int(10) DEFAULT NULL COMMENT '活动id',
  `option_id` int(10) DEFAULT NULL COMMENT '选项id',
  `uid` int(10) DEFAULT NULL COMMENT '投票者id',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `ctime` int(10) DEFAULT NULL COMMENT '投票时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_shop_vote_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_shop_vote_option`
-- ----------------------------
DROP TABLE IF EXISTS `wp_shop_vote_option`;
CREATE TABLE `wp_shop_vote_option` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `truename` varchar(255) DEFAULT NULL COMMENT '参赛者',
  `image` int(10) unsigned DEFAULT NULL COMMENT '参赛图片',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `manifesto` text COMMENT '参赛宣言',
  `introduce` text COMMENT '选手介绍',
  `ctime` int(10) DEFAULT NULL COMMENT '创建时间',
  `vote_id` int(10) DEFAULT NULL COMMENT '活动id',
  `opt_count` int(10) DEFAULT '0' COMMENT '投票数',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `number` int(10) DEFAULT '1' COMMENT '编号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_shop_vote_option
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_signin_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_signin_log`;
CREATE TABLE `wp_signin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `score` int(10) NOT NULL COMMENT '积分',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `sTime` int(10) unsigned DEFAULT NULL COMMENT '签到时间',
  `uid` varchar(255) NOT NULL COMMENT '用户ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_signin_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_smalltools`
-- ----------------------------
DROP TABLE IF EXISTS `wp_smalltools`;
CREATE TABLE `wp_smalltools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `tooltype` tinyint(2) DEFAULT '0' COMMENT '工具类型',
  `keyword` varchar(255) DEFAULT NULL COMMENT ' 关键词 ',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `toolname` varchar(255) DEFAULT NULL COMMENT '工具名称',
  `tooldes` text COMMENT '工具描述',
  `toolnum` varchar(255) DEFAULT NULL COMMENT '工具唯一编号',
  `toolstate` tinyint(2) DEFAULT '0' COMMENT '工具状态',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_smalltools
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sms`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sms`;
CREATE TABLE `wp_sms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `from_type` varchar(255) DEFAULT NULL COMMENT '用途',
  `code` varchar(255) DEFAULT NULL COMMENT '验证码',
  `smsId` varchar(255) DEFAULT NULL COMMENT '短信唯一标识',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `status` int(10) DEFAULT NULL COMMENT '使用状态',
  `plat_type` int(10) DEFAULT NULL COMMENT '平台标识',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sms
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sn_code`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sn_code`;
CREATE TABLE `wp_sn_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `sn` varchar(255) DEFAULT NULL COMMENT 'SN码',
  `uid` int(10) DEFAULT NULL COMMENT '粉丝UID',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `is_use` tinyint(2) DEFAULT '0' COMMENT '是否已使用',
  `use_time` int(10) DEFAULT NULL COMMENT '使用时间',
  `addon` varchar(255) DEFAULT 'Coupon' COMMENT '来自的插件',
  `target_id` int(10) unsigned DEFAULT NULL COMMENT '来源ID',
  `prize_id` int(10) unsigned DEFAULT NULL COMMENT '奖项ID',
  `status` tinyint(2) DEFAULT '1' COMMENT '是否可用',
  `prize_title` varchar(255) DEFAULT NULL COMMENT '奖项',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `can_use` tinyint(2) DEFAULT '1' COMMENT '是否可用',
  `server_addr` varchar(50) DEFAULT NULL COMMENT '服务器IP',
  `admin_uid` int(10) DEFAULT NULL COMMENT '核销管理员ID',
  PRIMARY KEY (`id`),
  KEY `id` (`uid`,`target_id`,`addon`) USING BTREE,
  KEY `addon` (`target_id`,`addon`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sn_code
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sport_award`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sport_award`;
CREATE TABLE `wp_sport_award` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(255) NOT NULL COMMENT '奖项名称',
  `img` int(10) NOT NULL COMMENT '奖品图片',
  `price` float DEFAULT '0' COMMENT '商品价格',
  `explain` text COMMENT '奖品说明',
  `award_type` varchar(30) DEFAULT '1' COMMENT '奖品类型',
  `count` int(10) DEFAULT '0' COMMENT '奖品数量',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序号',
  `score` int(10) DEFAULT '0' COMMENT '积分数',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `coupon_id` char(50) DEFAULT NULL COMMENT '选择赠送券',
  `money` float DEFAULT NULL COMMENT '返现金额',
  `aim_table` varchar(255) DEFAULT NULL COMMENT '活动标识',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sport_award
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sports`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sports`;
CREATE TABLE `wp_sports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `home_team` varchar(255) DEFAULT NULL COMMENT '主场球队',
  `visit_team` varchar(255) DEFAULT NULL COMMENT '客场球队',
  `start_time` int(10) DEFAULT NULL COMMENT '时间',
  `score` varchar(30) DEFAULT NULL COMMENT '比分',
  `content` text COMMENT '说明',
  `countdown` int(10) DEFAULT '60' COMMENT '擂鼓时长',
  `drum_count` int(10) DEFAULT '0' COMMENT '擂鼓次数',
  `drum_follow_count` int(10) DEFAULT '0' COMMENT '擂鼓人数',
  `home_team_support_count` int(10) DEFAULT '0' COMMENT '主场球队支持数',
  `visit_team_support_count` int(10) DEFAULT '0' COMMENT '客场球队支持人数',
  `home_team_drum_count` int(10) DEFAULT '0' COMMENT '主场球队擂鼓数',
  `visit_team_drum_count` int(10) DEFAULT '0' COMMENT '客场球队擂鼓数',
  `yaotv_count` int(10) DEFAULT '0' COMMENT '摇一摇总次',
  `draw_count` int(10) DEFAULT '0' COMMENT '抽奖总次数',
  `is_finish` tinyint(2) DEFAULT '0' COMMENT '是否已结束',
  `yaotv_follow_count` int(10) DEFAULT '0' COMMENT '摇电视总人数',
  `draw_follow_count` int(10) DEFAULT '0' COMMENT '抽奖总人数',
  `comment_status` tinyint(2) DEFAULT '0' COMMENT '评论是否需要审核',
  PRIMARY KEY (`id`),
  KEY `start_time` (`start_time`,`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sports
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sports_drum`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sports_drum`;
CREATE TABLE `wp_sports_drum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `sports_id` int(10) DEFAULT NULL COMMENT '场次ID',
  `team_id` int(10) DEFAULT NULL COMMENT '球队ID',
  `follow_id` int(10) DEFAULT NULL COMMENT '用户ID',
  `drum_count` int(10) DEFAULT NULL COMMENT '擂鼓次数',
  `cTime` int(10) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`),
  KEY `ctime` (`sports_id`,`cTime`) USING BTREE,
  KEY `team_id` (`sports_id`,`team_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sports_drum
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sports_join`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sports_join`;
CREATE TABLE `wp_sports_join` (
  `follow_id` int(11) DEFAULT NULL,
  `sports_id` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  KEY `time` (`time`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sports_join
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sports_support`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sports_support`;
CREATE TABLE `wp_sports_support` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `sports_id` int(10) DEFAULT NULL COMMENT '场次ID',
  `team_id` int(10) DEFAULT NULL COMMENT '球队ID',
  `follow_id` int(10) DEFAULT NULL COMMENT '用户ID',
  `cTime` int(10) DEFAULT NULL COMMENT '支持时间',
  PRIMARY KEY (`id`),
  KEY `sf` (`sports_id`,`follow_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sports_support
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sports_team`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sports_team`;
CREATE TABLE `wp_sports_team` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(100) DEFAULT NULL COMMENT '球队名称',
  `logo` int(10) unsigned DEFAULT NULL COMMENT '球队图标',
  `intro` text COMMENT '球队说明',
  `pid` int(10) DEFAULT '0' COMMENT 'pid',
  `sort` int(10) DEFAULT '0' COMMENT '排序号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sports_team
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_store`
-- ----------------------------
DROP TABLE IF EXISTS `wp_store`;
CREATE TABLE `wp_store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `uid` int(10) DEFAULT '0' COMMENT '用户ID',
  `content` text COMMENT '内容',
  `cTime` int(10) DEFAULT NULL COMMENT '发布时间',
  `attach` varchar(255) DEFAULT NULL COMMENT '插件安装包',
  `is_top` int(10) DEFAULT '0' COMMENT '置顶',
  `cid` tinyint(4) DEFAULT NULL COMMENT '分类',
  `view_count` int(11) unsigned DEFAULT '0' COMMENT '浏览数',
  `img_1` int(10) unsigned DEFAULT NULL COMMENT '插件截图1',
  `img_2` int(10) unsigned DEFAULT NULL COMMENT '插件截图2',
  `img_3` int(10) unsigned DEFAULT NULL COMMENT '插件截图3',
  `img_4` int(10) unsigned DEFAULT NULL COMMENT '插件截图4',
  `download_count` int(10) unsigned DEFAULT '0' COMMENT '下载数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_store
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sucai`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sucai`;
CREATE TABLE `wp_sucai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) DEFAULT NULL COMMENT '素材名称',
  `status` char(10) DEFAULT 'UnSubmit' COMMENT '状态',
  `cTime` int(10) DEFAULT NULL COMMENT '提交时间',
  `url` varchar(255) DEFAULT NULL COMMENT '实际摇一摇所使用的页面URL',
  `type` varchar(255) DEFAULT NULL COMMENT '素材类型',
  `detail` text COMMENT '素材内容',
  `reason` text COMMENT '入库失败的原因',
  `create_time` int(10) DEFAULT NULL COMMENT '申请时间',
  `checked_time` int(10) DEFAULT NULL COMMENT '入库时间',
  `source` varchar(50) DEFAULT NULL COMMENT '来源',
  `source_id` int(10) DEFAULT NULL COMMENT '来源ID',
  `wechat_id` int(10) DEFAULT NULL COMMENT '微信端的素材ID',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sucai
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_sucai_template`
-- ----------------------------
DROP TABLE IF EXISTS `wp_sucai_template`;
CREATE TABLE `wp_sucai_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT NULL COMMENT '管理员id',
  `token` varchar(255) DEFAULT NULL COMMENT '用户token',
  `addons` varchar(255) DEFAULT NULL COMMENT '插件名称',
  `template` varchar(255) DEFAULT NULL COMMENT '模版名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_sucai_template
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_survey`
-- ----------------------------
DROP TABLE IF EXISTS `wp_survey`;
CREATE TABLE `wp_survey` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(100) NOT NULL COMMENT '关键词',
  `keyword_type` tinyint(2) DEFAULT NULL COMMENT '关键词类型',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `intro` text COMMENT '封面简介',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `cover` int(10) unsigned DEFAULT NULL COMMENT '封面图片',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `finish_tip` text COMMENT '结束语',
  `template` varchar(255) DEFAULT 'default' COMMENT '素材模板',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '结束时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_survey
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_survey_answer`
-- ----------------------------
DROP TABLE IF EXISTS `wp_survey_answer`;
CREATE TABLE `wp_survey_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `survey_id` int(10) unsigned DEFAULT NULL COMMENT 'survey_id',
  `question_id` int(10) unsigned DEFAULT NULL COMMENT 'question_id',
  `uid` int(10) DEFAULT NULL COMMENT '用户UID',
  `openid` varchar(255) DEFAULT NULL COMMENT 'OpenId',
  `answer` text COMMENT '回答内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_survey_answer
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_survey_question`
-- ----------------------------
DROP TABLE IF EXISTS `wp_survey_question`;
CREATE TABLE `wp_survey_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `intro` text COMMENT '问题描述',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `survey_id` int(10) unsigned DEFAULT NULL COMMENT 'survey_id',
  `type` char(50) NOT NULL DEFAULT 'radio' COMMENT '问题类型',
  `extra` text COMMENT '参数',
  `is_must` tinyint(2) DEFAULT '0' COMMENT '是否必填',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_survey_question
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_system_notice`
-- ----------------------------
DROP TABLE IF EXISTS `wp_system_notice`;
CREATE TABLE `wp_system_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '公告标题',
  `content` text COMMENT '公告内容',
  `create_time` int(10) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_system_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_test`
-- ----------------------------
DROP TABLE IF EXISTS `wp_test`;
CREATE TABLE `wp_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(100) NOT NULL COMMENT '关键词',
  `keyword_type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '关键词匹配类型',
  `title` varchar(255) NOT NULL COMMENT '问卷标题',
  `intro` text NOT NULL COMMENT '封面简介',
  `mTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `cover` int(10) unsigned NOT NULL COMMENT '封面图片',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `finish_tip` text COMMENT '评论语',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_test
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_test_answer`
-- ----------------------------
DROP TABLE IF EXISTS `wp_test_answer`;
CREATE TABLE `wp_test_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `answer` text COMMENT '回答内容',
  `openid` varchar(255) DEFAULT NULL COMMENT 'OpenId',
  `uid` int(10) DEFAULT NULL COMMENT '用户UID',
  `question_id` int(10) unsigned DEFAULT NULL COMMENT 'question_id',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `test_id` int(10) unsigned DEFAULT NULL COMMENT 'test_id',
  `score` int(10) unsigned DEFAULT NULL COMMENT '得分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_test_answer
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_test_question`
-- ----------------------------
DROP TABLE IF EXISTS `wp_test_question`;
CREATE TABLE `wp_test_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL COMMENT '题目标题',
  `intro` text NOT NULL COMMENT '题目描述',
  `cTime` int(10) unsigned DEFAULT NULL COMMENT '发布时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `is_must` tinyint(2) DEFAULT '1' COMMENT '是否必填',
  `extra` text NOT NULL COMMENT '参数',
  `type` char(50) DEFAULT 'radio' COMMENT '题目类型',
  `test_id` int(10) unsigned DEFAULT NULL COMMENT 'test_id',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_test_question
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_tool`
-- ----------------------------
DROP TABLE IF EXISTS `wp_tool`;
CREATE TABLE `wp_tool` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(100) DEFAULT NULL COMMENT '用户名',
  `password` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '登录密码',
  `truename` varchar(30) DEFAULT NULL COMMENT '真实姓名',
  `mobile` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '联系电话',
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '邮箱地址',
  `sex55` tinyint(2) DEFAULT '1' COMMENT '性别33',
  `headimgurl` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '头像地址',
  `city` varchar(30) DEFAULT NULL COMMENT '城市',
  `province` varchar(30) DEFAULT NULL COMMENT '省份',
  `country` varchar(30) DEFAULT NULL COMMENT '国家',
  `language` varchar(20) CHARACTER SET utf8 DEFAULT 'zh-cn' COMMENT '语言',
  `score` int(10) DEFAULT '0' COMMENT '金币值',
  `experience` int(10) DEFAULT '0' COMMENT '经验值',
  `unionid` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '微信第三方ID',
  `login_count` int(10) DEFAULT '0' COMMENT '登录次数',
  `reg_ip` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '注册IP',
  `reg_time` int(10) DEFAULT NULL COMMENT '注册时间',
  `last_login_ip` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '最近登录IP',
  `last_login_time` int(10) DEFAULT NULL COMMENT '最近登录时间',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态',
  `is_init` tinyint(2) DEFAULT '0' COMMENT '初始化状态',
  `is_audit` tinyint(2) DEFAULT '0' COMMENT '审核状态',
  `subscribe_time` int(10) DEFAULT NULL COMMENT '用户关注公众号时间',
  `remark` varchar(100) DEFAULT NULL COMMENT '微信用户备注',
  `groupid` int(10) DEFAULT NULL COMMENT '微信端的分组ID',
  `come_from` tinyint(1) DEFAULT '0' COMMENT '来源',
  `login_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'login_name',
  `level` tinyint(2) DEFAULT '0' COMMENT '管理等级',
  `membership` char(50) CHARACTER SET utf8 DEFAULT '0' COMMENT '会员等级',
  `test` varchar(255) DEFAULT NULL COMMENT '序言',
  `yyy` int(10) DEFAULT NULL COMMENT 'retre',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wp_tool
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_transfers_recode`
-- ----------------------------
DROP TABLE IF EXISTS `wp_transfers_recode`;
CREATE TABLE `wp_transfers_recode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  ` mch_appid` char(32) NOT NULL,
  `openid` char(32) NOT NULL,
  `amount` int(11) NOT NULL,
  `partner_trade_no` varchar(100) DEFAULT NULL,
  `cTime` int(10) NOT NULL,
  `status` tinyint(2) DEFAULT '1' COMMENT '0 表示已下发 1 表示待下发 2 延时下发 3 下发失败 4 自定义失败原因',
  `wait_time` int(10) DEFAULT NULL,
  `more_param` text,
  `log_md5` char(32) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `act_id` int(11) DEFAULT NULL,
  `act_mod` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_transfers_recode
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_update_score_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_update_score_log`;
CREATE TABLE `wp_update_score_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `score` int(10) DEFAULT NULL COMMENT '修改积分',
  `branch_id` int(10) DEFAULT NULL COMMENT '修改门店',
  `operator` varchar(255) DEFAULT NULL COMMENT '操作员',
  `cTime` int(10) DEFAULT NULL COMMENT '修改时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'token',
  `member_id` int(10) DEFAULT NULL COMMENT '会员卡id',
  `manager_id` int(10) DEFAULT NULL COMMENT '管理员id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_update_score_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_update_version`
-- ----------------------------
DROP TABLE IF EXISTS `wp_update_version`;
CREATE TABLE `wp_update_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `version` int(10) unsigned NOT NULL COMMENT '版本号',
  `title` varchar(50) NOT NULL COMMENT '升级包名',
  `description` text COMMENT '描述',
  `create_date` int(10) DEFAULT NULL COMMENT '创建时间',
  `download_count` int(10) unsigned DEFAULT '0' COMMENT '下载统计',
  `package` varchar(255) NOT NULL COMMENT '升级包地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_update_version
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_user`
-- ----------------------------
DROP TABLE IF EXISTS `wp_user`;
CREATE TABLE `wp_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(100) DEFAULT NULL COMMENT '用户名',
  `password` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '登录密码',
  `truename` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '真实姓名',
  `mobile` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '联系电话',
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '邮箱地址',
  `sex` tinyint(2) DEFAULT NULL COMMENT '性别',
  `headimgurl` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '头像地址',
  `city` varchar(30) DEFAULT NULL COMMENT '城市',
  `province` varchar(30) DEFAULT NULL COMMENT '省份',
  `country` varchar(30) DEFAULT NULL COMMENT '国家',
  `language` varchar(20) CHARACTER SET utf8 DEFAULT 'zh-cn' COMMENT '语言',
  `score` int(10) DEFAULT '0' COMMENT '金币值',
  `experience` int(10) DEFAULT '0' COMMENT '经验值',
  `unionid` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '微信第三方ID',
  `login_count` int(10) DEFAULT '0' COMMENT '登录次数',
  `reg_ip` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '注册IP',
  `reg_time` int(10) DEFAULT NULL COMMENT '注册时间',
  `last_login_ip` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '最近登录IP',
  `last_login_time` int(10) DEFAULT NULL COMMENT '最近登录时间',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态',
  `is_init` tinyint(2) DEFAULT '0' COMMENT '初始化状态',
  `is_audit` tinyint(2) DEFAULT '0' COMMENT '审核状态',
  `subscribe_time` int(10) DEFAULT NULL COMMENT '用户关注公众号时间',
  `remark` varchar(100) DEFAULT NULL COMMENT '微信用户备注',
  `groupid` int(10) DEFAULT NULL COMMENT '微信端的分组ID',
  `come_from` tinyint(1) DEFAULT '0' COMMENT '来源',
  `login_password` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '登录密码',
  `manager_id` int(10) DEFAULT '0' COMMENT '公众号管理员ID',
  `level` tinyint(2) DEFAULT '0' COMMENT '管理等级',
  `membership` char(50) CHARACTER SET utf8 DEFAULT '0' COMMENT '会员等级',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wp_user
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_user_follow`
-- ----------------------------
DROP TABLE IF EXISTS `wp_user_follow`;
CREATE TABLE `wp_user_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `publicid` int(11) DEFAULT NULL,
  `follow_id` int(11) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_user_follow
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_user_tag`
-- ----------------------------
DROP TABLE IF EXISTS `wp_user_tag`;
CREATE TABLE `wp_user_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(50) DEFAULT NULL COMMENT '标签名称',
  `token` varchar(100) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_user_tag
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_user_tag_link`
-- ----------------------------
DROP TABLE IF EXISTS `wp_user_tag_link`;
CREATE TABLE `wp_user_tag_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) DEFAULT NULL COMMENT 'uid',
  `tag_id` int(10) DEFAULT NULL COMMENT 'tag_id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_user_tag_link
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_visit_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_visit_log`;
CREATE TABLE `wp_visit_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `publicid` int(10) DEFAULT '0' COMMENT 'publicid',
  `module_name` varchar(30) DEFAULT NULL COMMENT 'module_name',
  `controller_name` varchar(30) DEFAULT NULL COMMENT 'controller_name',
  `action_name` varchar(30) DEFAULT NULL COMMENT 'action_name',
  `uid` varchar(255) DEFAULT '0' COMMENT 'uid',
  `ip` varchar(30) DEFAULT NULL COMMENT 'ip',
  `brower` varchar(30) DEFAULT NULL COMMENT 'brower',
  `param` text COMMENT 'param',
  `referer` varchar(255) DEFAULT NULL COMMENT 'referer',
  `cTime` int(10) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_visit_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_vote`
-- ----------------------------
DROP TABLE IF EXISTS `wp_vote`;
CREATE TABLE `wp_vote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(50) NOT NULL COMMENT '关键词',
  `title` varchar(100) NOT NULL COMMENT '投票标题',
  `description` text COMMENT '投票描述',
  `picurl` int(10) unsigned DEFAULT NULL COMMENT '封面图片',
  `type` char(10) DEFAULT NULL COMMENT '选择类型',
  `start_date` int(10) DEFAULT NULL COMMENT '开始日期',
  `end_date` int(10) DEFAULT NULL COMMENT '结束日期',
  `is_img` tinyint(2) DEFAULT '0' COMMENT '文字/图片投票',
  `vote_count` int(10) unsigned DEFAULT '0' COMMENT '投票数',
  `cTime` int(10) DEFAULT NULL COMMENT '投票创建时间',
  `mTime` int(10) DEFAULT NULL COMMENT '更新时间',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `template` varchar(255) DEFAULT 'default' COMMENT '素材模板',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_vote_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_vote_log`;
CREATE TABLE `wp_vote_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `vote_id` int(10) unsigned DEFAULT NULL COMMENT '投票ID',
  `user_id` int(10) DEFAULT NULL COMMENT '用户ID',
  `token` varchar(255) DEFAULT NULL COMMENT '用户TOKEN',
  `options` varchar(255) DEFAULT NULL COMMENT '选择选项',
  `cTime` int(10) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_vote_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_vote_option`
-- ----------------------------
DROP TABLE IF EXISTS `wp_vote_option`;
CREATE TABLE `wp_vote_option` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `vote_id` int(10) unsigned DEFAULT NULL COMMENT '投票ID',
  `name` varchar(255) NOT NULL COMMENT '选项标题',
  `image` int(10) unsigned DEFAULT NULL COMMENT '图片选项',
  `opt_count` int(10) unsigned DEFAULT '0' COMMENT '当前选项投票数',
  `order` int(10) unsigned DEFAULT '0' COMMENT '选项排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_vote_option
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_wei_shop`
-- ----------------------------
DROP TABLE IF EXISTS `wp_wei_shop`;
CREATE TABLE `wp_wei_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_wei_shop
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_wei_test`
-- ----------------------------
DROP TABLE IF EXISTS `wp_wei_test`;
CREATE TABLE `wp_wei_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `sex` char(50) DEFAULT '1' COMMENT '性别',
  `content` text COMMENT '正文',
  `cTime` int(10) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_wei_test
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba`;
CREATE TABLE `wp_weiba` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cid` varchar(100) DEFAULT NULL COMMENT '所属分类',
  `weiba_name` varchar(255) DEFAULT NULL COMMENT '版块名称',
  `uid` int(10) DEFAULT NULL COMMENT '创建者ID',
  `ctime` int(10) DEFAULT NULL COMMENT '创建时间',
  `logo` int(10) unsigned DEFAULT NULL COMMENT '版块图标',
  `intro` text COMMENT '版块说明',
  `who_can_post` tinyint(1) DEFAULT '0' COMMENT '发帖权限',
  `who_can_reply` tinyint(1) DEFAULT '0' COMMENT '回帖权限',
  `follower_count` int(10) DEFAULT '0' COMMENT '成员数',
  `thread_count` int(10) DEFAULT '0' COMMENT '帖子数',
  `admin_uid` varchar(255) DEFAULT NULL COMMENT '版主',
  `recommend` tinyint(1) DEFAULT '0' COMMENT '是否设置为推荐',
  `status` tinyint(1) DEFAULT '1' COMMENT '审核状态',
  `is_del` tinyint(1) DEFAULT '0' COMMENT '是否删除',
  `notify` text COMMENT '版块公告',
  `avatar_big` text COMMENT 'avatar_big',
  `avatar_middle` text COMMENT 'avatar_middle',
  `new_count` int(10) DEFAULT '0' COMMENT '最新帖子数',
  `new_day` date DEFAULT NULL COMMENT 'new_day',
  `info` varchar(255) DEFAULT NULL COMMENT '申请附件信息',
  `token` varchar(100) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_apply`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_apply`;
CREATE TABLE `wp_weiba_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_uid` int(11) NOT NULL COMMENT '申请者UID',
  `weiba_id` int(11) NOT NULL COMMENT '微吧id',
  `type` tinyint(2) NOT NULL COMMENT '申请类型 1-圈主 2-小主',
  `reason` varchar(255) DEFAULT NULL COMMENT '申请原因',
  `status` tinyint(2) NOT NULL COMMENT '状态 0-待审核 1-审核通过 -1-驳回',
  `manager_uid` int(11) NOT NULL COMMENT '操作者UID',
  `city` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_apply
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_blacklist`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_blacklist`;
CREATE TABLE `wp_weiba_blacklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `weiba_id` int(11) NOT NULL COMMENT '微吧ID',
  `uid` int(11) NOT NULL COMMENT '成员ID',
  `cTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_blacklist
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_category`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_category`;
CREATE TABLE `wp_weiba_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `token` varchar(100) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_category
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_event`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_event`;
CREATE TABLE `wp_weiba_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '创建者',
  `post_id` int(255) DEFAULT NULL COMMENT '对应的话题ID',
  `cover` int(11) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '结束时间',
  `deadline` int(11) DEFAULT NULL COMMENT '报名截止',
  `area` varchar(255) DEFAULT NULL COMMENT '城市',
  `address` varchar(255) DEFAULT NULL COMMENT '具体地址',
  `max` int(11) DEFAULT NULL COMMENT '最大报名人数',
  `join_count` int(11) DEFAULT '0' COMMENT '报名数',
  `share_img` int(11) DEFAULT NULL COMMENT '分享图片',
  `share_title` varchar(255) DEFAULT NULL COMMENT '分享标题',
  `share_desc` varchar(255) DEFAULT NULL COMMENT '分享描述',
  `ctime` int(11) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `city` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_event
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_event_attr`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_event_attr`;
CREATE TABLE `wp_weiba_event_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `type` char(50) DEFAULT NULL COMMENT '控件类型',
  `label` varchar(255) DEFAULT NULL,
  `extra` text COMMENT '参数',
  `default_value` varchar(255) DEFAULT NULL,
  `is_must` tinyint(1) DEFAULT '0' COMMENT '0可选 1必填',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `name` varchar(255) DEFAULT NULL COMMENT '控件名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_event_attr
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_event_user`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_event_user`;
CREATE TABLE `wp_weiba_event_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `value` text,
  `ctime` int(11) DEFAULT NULL,
  `is_refuse` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_event_user
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_favorite`;
CREATE TABLE `wp_weiba_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '收藏者UID',
  `post_id` int(11) NOT NULL COMMENT '帖子ID',
  `weiba_id` int(11) NOT NULL COMMENT '微吧ID',
  `post_uid` int(11) NOT NULL COMMENT '发布者UID',
  `favorite_time` int(11) NOT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_favorite
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_follow`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_follow`;
CREATE TABLE `wp_weiba_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `weiba_id` int(11) NOT NULL COMMENT '微吧ID',
  `follower_uid` int(11) NOT NULL COMMENT '成员ID',
  `level` tinyint(1) NOT NULL DEFAULT '1' COMMENT '等级 1-粉丝 2-小主 3-圈主',
  PRIMARY KEY (`id`),
  KEY `uid` (`follower_uid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_follow
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_log`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_log`;
CREATE TABLE `wp_weiba_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weiba_id` int(11) NOT NULL COMMENT '微吧ID',
  `uid` int(11) NOT NULL COMMENT '操作者UID',
  `type` varchar(10) NOT NULL COMMENT '操作类型',
  `content` text NOT NULL COMMENT '管理内容',
  `ctime` int(11) NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_log
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_post`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_post`;
CREATE TABLE `wp_weiba_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `weiba_id` int(10) DEFAULT NULL COMMENT '所属版块',
  `post_uid` int(10) DEFAULT NULL COMMENT '发表者uid',
  `title` varchar(255) NOT NULL COMMENT '帖子标题',
  `content` text NOT NULL COMMENT '帖子内容',
  `post_time` int(10) DEFAULT NULL COMMENT '发表时间',
  `reply_count` int(10) DEFAULT '0' COMMENT '回复数',
  `read_count` int(10) DEFAULT '0' COMMENT '浏览数',
  `last_reply_uid` varchar(50) DEFAULT '0' COMMENT '最后回复人',
  `last_reply_time` int(10) DEFAULT '0' COMMENT '最后回复时间',
  `digest` tinyint(1) DEFAULT '0' COMMENT '全局精华',
  `top` tinyint(2) DEFAULT '0' COMMENT '置顶帖',
  `lock` tinyint(1) DEFAULT '0' COMMENT '锁帖',
  `recommend` tinyint(1) DEFAULT '0' COMMENT '是否设为推荐',
  `recommend_time` int(10) DEFAULT '0' COMMENT '设为推荐的时间',
  `is_del` tinyint(2) DEFAULT '0' COMMENT '是否已删除',
  `reply_all_count` int(11) DEFAULT '0' COMMENT '全部评论数目',
  `attach` varchar(255) DEFAULT NULL COMMENT 'attach',
  `praise` int(10) DEFAULT '0' COMMENT '喜欢',
  `from` tinyint(1) DEFAULT '1' COMMENT '客户端类型',
  `top_time` int(10) DEFAULT '0' COMMENT 'top_time',
  `is_index` tinyint(2) DEFAULT '0' COMMENT '是否推荐到首页',
  `index_img` int(10) unsigned DEFAULT NULL COMMENT 'index_img',
  `is_index_time` int(10) DEFAULT NULL COMMENT 'is_index_time',
  `img_ids` varchar(255) DEFAULT NULL COMMENT 'img_ids',
  `tag_id` int(10) DEFAULT '0' COMMENT '标签',
  `index_order` int(10) DEFAULT '0' COMMENT '首页帖子排序',
  `is_event` tinyint(2) DEFAULT '0' COMMENT '类型',
  `globle_recommend` tinyint(2) DEFAULT '0' COMMENT '推荐到全站',
  `token` varchar(100) DEFAULT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_post
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_post_digg`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_post_digg`;
CREATE TABLE `wp_weiba_post_digg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `cTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_post_digg
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_post_share_logs`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_post_share_logs`;
CREATE TABLE `wp_weiba_post_share_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT '0' COMMENT '分享的用户id',
  `type` varchar(255) DEFAULT NULL COMMENT '分享方式',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_post_share_logs
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_reply`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_reply`;
CREATE TABLE `wp_weiba_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '回复ID',
  `weiba_id` int(11) NOT NULL COMMENT '所属微吧',
  `post_id` int(11) NOT NULL COMMENT '所属帖子ID',
  `post_uid` int(11) NOT NULL COMMENT '帖子作者UID',
  `uid` int(11) NOT NULL COMMENT '回复者ID',
  `to_reply_id` int(11) NOT NULL DEFAULT '0' COMMENT '回复的评论id',
  `to_uid` int(11) NOT NULL DEFAULT '0' COMMENT '被回复的评论的作者的uid',
  `ctime` int(11) NOT NULL COMMENT '回复时间',
  `content` text NOT NULL COMMENT '回复内容',
  `is_del` tinyint(2) DEFAULT '0' COMMENT '是否已删除 0-否 1-是',
  `comment_id` int(11) NOT NULL COMMENT '对应的分享评论ID',
  `storey` int(11) NOT NULL DEFAULT '0' COMMENT '绝对楼层',
  `attach_id` int(11) NOT NULL,
  `digg_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_reply_digg`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_reply_digg`;
CREATE TABLE `wp_weiba_reply_digg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `row_id` int(11) NOT NULL,
  `cTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_reply_digg
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weiba_tag`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weiba_tag`;
CREATE TABLE `wp_weiba_tag` (
  `weiba_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  `city` int(11) DEFAULT NULL COMMENT '城市',
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weiba_tag
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weisite_category`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weisite_category`;
CREATE TABLE `wp_weisite_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(100) NOT NULL COMMENT '分类标题',
  `icon` int(10) unsigned DEFAULT NULL COMMENT '分类图片',
  `url` varchar(255) DEFAULT NULL COMMENT '外链',
  `is_show` tinyint(2) DEFAULT '1' COMMENT '显示',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `sort` int(10) DEFAULT '0' COMMENT '排序号',
  `pid` int(10) DEFAULT '0' COMMENT '一级目录',
  `template` varchar(255) DEFAULT NULL COMMENT '二级模板',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weisite_category
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weisite_cms`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weisite_cms`;
CREATE TABLE `wp_weisite_cms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(100) NOT NULL COMMENT '关键词',
  `keyword_type` tinyint(2) DEFAULT NULL COMMENT '关键词类型',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `intro` text COMMENT '简介',
  `cate_id` int(10) unsigned DEFAULT '0' COMMENT '所属类别',
  `cover` int(10) unsigned DEFAULT NULL COMMENT '封面图片',
  `content` text COMMENT '内容',
  `cTime` int(10) DEFAULT NULL COMMENT '发布时间',
  `sort` int(10) unsigned DEFAULT '0' COMMENT '排序号',
  `view_count` int(10) unsigned DEFAULT '0' COMMENT '浏览数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weisite_cms
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weisite_footer`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weisite_footer`;
CREATE TABLE `wp_weisite_footer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `url` varchar(255) DEFAULT NULL COMMENT '关联URL',
  `title` varchar(50) NOT NULL COMMENT '菜单名',
  `pid` tinyint(2) DEFAULT '0' COMMENT '一级菜单',
  `sort` tinyint(4) DEFAULT '0' COMMENT '排序号',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `icon` int(10) unsigned DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`id`),
  KEY `token` (`token`,`pid`,`sort`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weisite_footer
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weisite_slideshow`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weisite_slideshow`;
CREATE TABLE `wp_weisite_slideshow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `img` int(10) unsigned NOT NULL COMMENT '图片',
  `url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `is_show` tinyint(2) DEFAULT '1' COMMENT '是否显示',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  `token` varchar(100) DEFAULT NULL COMMENT 'Token',
  `cate_id` varchar(100) DEFAULT '0' COMMENT '所属目录',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weisite_slideshow
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_weixin_message`
-- ----------------------------
DROP TABLE IF EXISTS `wp_weixin_message`;
CREATE TABLE `wp_weixin_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `ToUserName` varchar(100) DEFAULT NULL COMMENT 'Token',
  `FromUserName` varchar(100) DEFAULT NULL COMMENT 'OpenID',
  `CreateTime` int(10) DEFAULT NULL COMMENT '创建时间',
  `MsgType` varchar(30) DEFAULT NULL COMMENT '消息类型',
  `MsgId` varchar(100) DEFAULT NULL COMMENT '消息ID',
  `Content` text COMMENT '文本消息内容',
  `PicUrl` varchar(255) DEFAULT NULL COMMENT '图片链接',
  `MediaId` varchar(100) DEFAULT NULL COMMENT '多媒体文件ID',
  `Format` varchar(30) DEFAULT NULL COMMENT '语音格式',
  `ThumbMediaId` varchar(30) DEFAULT NULL COMMENT '缩略图的媒体id',
  `Title` varchar(100) DEFAULT NULL COMMENT '消息标题',
  `Description` text COMMENT '消息描述',
  `Url` varchar(255) DEFAULT NULL COMMENT 'Url',
  `collect` tinyint(1) DEFAULT '0' COMMENT '收藏状态',
  `deal` tinyint(1) DEFAULT '0' COMMENT '处理状态',
  `is_read` tinyint(1) DEFAULT '0' COMMENT '是否已读',
  `type` tinyint(1) DEFAULT '0' COMMENT '消息分类',
  `is_material` int(10) DEFAULT '0' COMMENT '设置为文本素材',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=262 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_weixin_message
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_wish_card`
-- ----------------------------
DROP TABLE IF EXISTS `wp_wish_card`;
CREATE TABLE `wp_wish_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `send_name` varchar(255) DEFAULT NULL COMMENT '发送人',
  `receive_name` varchar(255) DEFAULT NULL COMMENT '接收人',
  `content` text COMMENT '祝福语',
  `create_time` int(10) DEFAULT NULL COMMENT ' 创建时间',
  `template` char(50) DEFAULT NULL COMMENT '模板',
  `template_cate` varchar(255) DEFAULT NULL COMMENT '模板分类',
  `read_count` int(10) DEFAULT '0' COMMENT '浏览次数',
  `mid` varchar(255) DEFAULT NULL COMMENT '用户Id',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_wish_card
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_wish_card_content`
-- ----------------------------
DROP TABLE IF EXISTS `wp_wish_card_content`;
CREATE TABLE `wp_wish_card_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content_cate_id` int(10) DEFAULT '0' COMMENT '祝福语类别Id',
  `content` text COMMENT '祝福语',
  `content_cate` varchar(255) DEFAULT NULL COMMENT '类别',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_wish_card_content
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_wish_card_content_cate`
-- ----------------------------
DROP TABLE IF EXISTS `wp_wish_card_content_cate`;
CREATE TABLE `wp_wish_card_content_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content_cate_name` varchar(255) DEFAULT NULL COMMENT '祝福语类别',
  `token` varchar(255) DEFAULT NULL COMMENT 'Token',
  `content_cate_icon` int(10) unsigned DEFAULT NULL COMMENT '类别图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_wish_card_content_cate
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_xdlog`
-- ----------------------------
DROP TABLE IF EXISTS `wp_xdlog`;
CREATE TABLE `wp_xdlog` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid_int` int(11) NOT NULL,
  `biztitle` text,
  `biztype` int(11) NOT NULL DEFAULT '0',
  `opttime` bigint(20) DEFAULT NULL,
  `xd` bigint(20) DEFAULT NULL,
  `sceneid` bigint(20) DEFAULT '0',
  `remark` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_xdlog
-- ----------------------------
