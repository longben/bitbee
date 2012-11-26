CREATE TABLE `codes` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `sn` varchar(20) DEFAULT NULL,
  `category` varchar(64) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `flag` tinyint(1) NOT NULL DEFAULT '1',
  `locale` varchar(10) DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='基础代码';

CREATE TABLE `modules` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(60) NOT NULL COMMENT '栏目(功能) 名称',
  `type` varchar(15) DEFAULT 'system' COMMENT '栏目(功能) 类型 (system:系统管理模块 website:网站栏目)',
  `parent_id` int(10) DEFAULT NULL COMMENT '上级栏目id',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `hierarchy` int(3) DEFAULT '1' COMMENT '级别',
  `node` tinyint(1) DEFAULT '0' COMMENT '节点 (1:根  0:节点 )',
  `module_image` varchar(200) DEFAULT 'icon-nav' COMMENT '栏目图标 (限止大小、长度、宽度)',
  `url` varchar(200) DEFAULT NULL COMMENT '链接地址',
  `target` varchar(20) DEFAULT NULL COMMENT '打开方式 (_top/_self/_parent/_winname/_blank)',
  `delete_permit` tinyint(1) DEFAULT NULL COMMENT '此栏目是否允许删除(1：允许 0：不允许)',
  `add_permit` tinyint(1) DEFAULT NULL COMMENT '此栏目是否允许新增子栏目(1：允许 0：不允许)',
  `publish_permit` tinyint(1) DEFAULT NULL COMMENT '此栏目是否允许上文章',
  `duty_person` varchar(200) DEFAULT NULL COMMENT '栏目责任人',
  `duty_company` int(10) DEFAULT NULL COMMENT '栏目责任单位',
  `duty_leader` varchar(200) DEFAULT NULL COMMENT '栏目责任领导',
  `ordering` int(3) DEFAULT NULL COMMENT '栏目的排序',
  `maximum` int(10) DEFAULT '5' COMMENT '每页最大显示记录数',
  `visit_count` int(10) DEFAULT NULL COMMENT '栏目被访问的次数',
  `display_style` varchar(100) DEFAULT NULL COMMENT '显示风格',
  `setting` varchar(4000) DEFAULT NULL COMMENT '设置',
  `description` varchar(2000) DEFAULT NULL COMMENT '简介',
  `flag` tinyint(1) DEFAULT '1' COMMENT '有效标志(1：有效  2：无效)',
  `created` datetime DEFAULT NULL COMMENT '创建日期',
  `modified` datetime DEFAULT NULL COMMENT '修改日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1103 DEFAULT CHARSET=utf8 COMMENT='栏目表';


