CREATE TABLE `sys_admin_user` (
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `username` varchar(60) NOT NULL COMMENT '用户名称',
  `realname` varchar(60) NOT NULL COMMENT '用户名',
  `password` varchar(60) NOT NULL COMMENT '密码',
  `tel` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `reg_date` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `user_salt` varchar(6) NOT NULL DEFAULT '' COMMENT 'salt用于加密',
  `login_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '登录ip',
  `login_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后一次登陆时间',
  `avatar` varchar(255) NOT NULL COMMENT '头像',
  `role_id` int(11) NOT NULL COMMENT '角色',
  `user_game` varchar(500) DEFAULT NULL COMMENT '游戏',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='系统管理员';

CREATE TABLE `sys_admin_user_game` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='管理员管理游戏';

CREATE TABLE `sys_app` (
  `app_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '应用编号',
  `app_ename` varchar(50) DEFAULT NULL COMMENT '应用Code',
  `app_name` varchar(100) DEFAULT NULL COMMENT '应用名称',
  `app_img` varchar(200) DEFAULT NULL COMMENT '图片',
  `app_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `app_tree_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否在导航中显示',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台应用表';

CREATE TABLE `sys_app_function` (
  `func_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '功能编号',
  `app_id` int(11) NOT NULL COMMENT '应用编号',
  `func_name` varchar(50) DEFAULT NULL COMMENT '功能名称',
  `func_ename` varchar(100) DEFAULT NULL COMMENT '功能代码',
  `func_url` varchar(200) DEFAULT NULL COMMENT '地址',
  `func_img` varchar(200) DEFAULT NULL COMMENT '图标',
  `func_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` varchar(45) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`func_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台功能表';

CREATE TABLE `sys_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色',
  `role_name` varchar(100) DEFAULT NULL COMMENT '角色名称',
  `role_ename` varchar(50) DEFAULT NULL COMMENT '角色代码',
  `role_funcnames` varchar(3000) DEFAULT NULL COMMENT '角色功能',
  `role_funcids` varchar(3000) DEFAULT NULL COMMENT '角色功能代码',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台角色表';
CREATE TABLE `sys_role_function` (
  `role_id` int(11) NOT NULL COMMENT '角色编号',
  `func_id` int(11) NOT NULL COMMENT '功能编号',
  `func_op` varchar(100) DEFAULT NULL COMMENT '功能操作',
  PRIMARY KEY (`role_id`,`func_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台角色功能表';

CREATE TABLE `yly_member` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `pid` varchar(100) NOT NULL DEFAULT '' COMMENT '平台id',
  `username` varchar(64) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `tel` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `realname` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `cardno` varchar(18) NOT NULL DEFAULT '' COMMENT '身份证号码',
  `reg_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '注册ip',
  `reg_date` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `gender` enum('f','m') NOT NULL DEFAULT 'm' COMMENT '性别',
  `birthday` varchar(20) NOT NULL DEFAULT '' COMMENT '生日',
  `utype` varchar(20) NOT NULL DEFAULT 'upup' COMMENT '用户类型（facebook、upup等）',
  `nickname` varchar(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `group_id` tinyint(3) unsigned NOT NULL DEFAULT '5' COMMENT '管理级别',
  `locale` varchar(20) NOT NULL COMMENT '语言',
  `avatar` varchar(255) NOT NULL COMMENT '头像',
  `ad` varchar(100) NOT NULL DEFAULT '' COMMENT '用户来源，哪个广告',
  `login_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '登录ip',
  `login_times` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `login_days` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '累计登录天数',
  `login_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后一次登陆时间',
  `pay` decimal(18,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '充值总额',
  `pay_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '充值次数',
  `pay_value` decimal(18,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '最后一次充值金额',
  `pay_date` int(10) NOT NULL DEFAULT '0' COMMENT '最后一次充值时间',
  `forbid_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '封号时间',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '封号备注',
  `regcity` varchar(45) NOT NULL DEFAULT '' COMMENT '城市',
  `new_user` tinyint(1) NOT NULL DEFAULT '1' COMMENT '新用户',
  `_ps` varchar(100) DEFAULT NULL COMMENT 'pass',
  `user_salt` varchar(6) NOT NULL DEFAULT '' COMMENT 'salt',
  `appid` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'appid',
  `logincity` varchar(50) NOT NULL COMMENT '登录地',
  `is_alert` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否弹出',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `logindate` (`login_date`),
  KEY `regdate` (`reg_date`),
  KEY `ad` (`ad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表';

CREATE TABLE `yly_member_weixin` (
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT 'uid',
  `unionid` varchar(50) NOT NULL DEFAULT '' COMMENT '微信unionid',
  `openid` varchar(50) NOT NULL DEFAULT '' COMMENT '微信openid',
  `invitor` int(11) NOT NULL DEFAULT '0' COMMENT '邀请者',
  `ltime` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  `gid` int(11) NOT NULL DEFAULT '0' COMMENT '游戏',
  `page` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  KEY `unionid` (`unionid`),
  KEY `invitor` (`invitor`),
  KEY `index4` (`ltime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


CREATE TABLE `game_userfield` (
  `uid` int(10) unsigned NOT NULL,
  `changes` bigint(20) NOT NULL DEFAULT '0' COMMENT '玩家金币总流水',
  `startdumb` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '禁言开始',
  `dumblimit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '禁言结束',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0:正常;1:禁止私聊;2:禁止聊天;3:禁止旁观;4:禁止进入游戏;5:冻结',
  `online` tinyint(1) NOT NULL DEFAULT '0' COMMENT '在线',
  `online_times` int(11) NOT NULL DEFAULT '0' COMMENT '在线总时长',
  `game_times` int(11) NOT NULL DEFAULT '0' COMMENT '游戏总时长',
  `ismotor` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否机器人',
  `pay_golds` bigint(20) NOT NULL DEFAULT '0' COMMENT '充值总金币',
  `ticket` int(11) NOT NULL DEFAULT '0' COMMENT '福袋',
  `ticket_use` int(11) NOT NULL DEFAULT '0' COMMENT '福袋使用数量',
  `pay_ticket` int(11) NOT NULL,
  `golds` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '金币',
  `bonus_golds` bigint(20) NOT NULL DEFAULT '0' COMMENT '奖励金币',
  `bank` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '银行存款',
  `stones` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '宝石',
  `bonus_stones` bigint(20) NOT NULL DEFAULT '0' COMMENT '奖励宝石',
  `withdrawcash` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '已提现金额',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '未提现金额',
  `withdrawmoney` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总收入',
  `weixin` varchar(20) NOT NULL DEFAULT '' COMMENT '提现微信号',
  `game_rounds` int(11) NOT NULL DEFAULT '0',
  `game_wins` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `startdumb` (`startdumb`),
  KEY `ismotor` (`ismotor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='玩家经验等级';