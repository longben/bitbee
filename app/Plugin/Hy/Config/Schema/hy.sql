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

CREATE TABLE `products` (
    `id`            int(10)          NOT NULL AUTO_INCREMENT COMMENT '主键',
    `code_id`       int(10)          NOT NULL                COMMENT '类型编码',  
    `name`          varchar(64)      NOT NULL                COMMENT '产品名称',
    `price`         decimal(10,2)    DEFAULT NULL            COMMENT '价格',
    `is_new`        tinyint(1)       DEFAULT NULL            COMMENT '是否新品',
    `is_recommend`  tinyint(1)       DEFAULT NULL            COMMENT '是否推荐',
    `picture`       varchar(64)      DEFAULT NULL            COMMENT '图片',
    `material`      int(10)          DEFAULT NULL            COMMENT '材质',
    `series`        int(10)          DEFAULT NULL            COMMENT '系列',
    `color`         int(10)          DEFAULT NULL            COMMENT '颜色',
    `style`         int(10)          DEFAULT NULL            COMMENT '风格',
    `model`         int(10)          DEFAULT NULL            COMMENT '模式',
    `srp`           decimal(10,2)    DEFAULT NULL            COMMENT '建议零售价',
    `dealer_min`    decimal(10,2)    DEFAULT NULL            COMMENT '经销商MIN',
    `dealer_avg`    decimal(10,2)    DEFAULT NULL            COMMENT '经销商AVG',
    `market_min`    decimal(10,2)    DEFAULT NULL            COMMENT '市场MIN',
    `network_min`   decimal(10,2)    DEFAULT NULL            COMMENT '网络MIN',
    `network_avg`   decimal(10,2)    DEFAULT NULL            COMMENT '网络AVG',
    `description`   text                                     COMMENT '说明',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

