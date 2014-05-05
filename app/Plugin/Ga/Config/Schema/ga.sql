CREATE TABLE `ga_department_metas` (
    `id`                    int(10)            NOT NULL COMMENT '主键',
    `area_id`               int(10)            DEFAULT NULL COMMENT '所属地区',
    `licence`               varchar(10)        DEFAULT NULL COMMENT '经营许可证号码',
    `airport`               varchar(100)       DEFAULT NULL COMMENT '机场地址',
    `corporation`           varchar(20)        DEFAULT NULL COMMENT '法人代表',
    `registered_capital`    varchar(100)       DEFAULT NULL COMMENT '注册资本',
    `issuing_authority`     int(10)            DEFAULT NULL COMMENT '发证机关',
    `status`                int(1)             NOT NULL DEFAULT '1' COMMENT '经营状态',
    `start_date`            date               DEFAULT NULL COMMENT '有效期限（起）',
    `end_date`              date               DEFAULT NULL COMMENT '有效期限（止）',
    `issuance_date`         date               DEFAULT NULL COMMENT '颁发日期',
    `renewal_date`          date               DEFAULT NULL COMMENT '换证日期',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='通航部门扩展表';


DROP TABLE `aircrafts`;
CREATE TABLE `aircrafts`(
    `id`                    int(10)             NOT NULL AUTO_INCREMENT COMMENT '主键',
    `manufacturer`          varchar(100)        DEFAULT NULL COMMENT '生产厂商',
    `type`                  int(10)             DEFAULT NULL COMMENT '航空器类型',
    `brand`                 int(10)             DEFAULT NULL COMMENT '品牌',
    `model`                 int(10)             DEFAULT NULL COMMENT '型号',
    `oil_type`              int(10)             DEFAULT NULL COMMENT '燃油种类',
    `netweight`             decimal(10,2)       DEFAULT NULL COMMENT '空重',
    `max_load`              decimal(10,2)       DEFAULT NULL COMMENT '最大有效载荷',
    `kts`                   decimal(10,2)       DEFAULT NULL COMMENT '正常巡航速度',
    `maximum_range`         decimal(10,2)       DEFAULT NULL COMMENT '最大航程',
    `passenger_capacity`    int(3)              DEFAULT NULL COMMENT '载员人数',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='通用航空器表';

DROP TABLE `corp_aircrafts`;
CREATE TABLE `corp_aircrafts`(
    `id`                    int(10)             NOT NULL AUTO_INCREMENT COMMENT '主键',
    `department_id`         int(10)             DEFAULT NULL COMMENT '企业名称',
    `aircraft_id`           int(10)             DEFAULT NULL COMMENT '飞行器型号',
    `area_id`               int(10)             DEFAULT NULL COMMENT '所属地区',
    `registration_no`       varchar(20)         DEFAULT NULL COMMENT '国籍登记证',
    `registration_flag`     varchar(20)         DEFAULT NULL COMMENT '国籍和登记标志',
    `register_date`         date                DEFAULT NULL COMMENT '登记日期',
    `age`                   int(3)              DEFAULT NULL COMMENT '机龄',
    `procure_method`        int(1)              DEFAULT NULL COMMENT '获得方式',
    `procure_date`          date                DEFAULT NULL COMMENT '获得时间',
    `purpose`               varchar(100)        DEFAULT NULL COMMENT '主要用途',
    `use_task`              varchar(100)        DEFAULT NULL COMMENT '承担主要飞行种类和任务',
    `maintenance`           int(1)              DEFAULT NULL COMMENT '维护情况',
    `zysg_zh_cs`            int(3)              DEFAULT NULL COMMENT '投入使用以来主要事故或征候次数',
    `damaged`               varchar(1000)       DEFAULT NULL COMMENT '因失事、失踪等原因毁损航空器情况',
    `status`                int(1)              DEFAULT NULL COMMENT '使用状态',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='企业通用航空器表';

DROP TABLE `assignments`;
CREATE TABLE `assignments`(
    `id`                    int(10)             NOT NULL AUTO_INCREMENT COMMENT '主键',
    `assignment_date`       date                DEFAULT NULL COMMENT '作业月份',
    `department_id`         int(10)             DEFAULT NULL COMMENT '企业名称',
    `aircraft_id`           int(10)             DEFAULT NULL COMMENT '飞行器型号',
    `area_id`               int(10)             DEFAULT NULL COMMENT '所属地区',
    `assignment_type`       varchar(100)        DEFAULT NULL COMMENT '作业类型',
    `assignment_hour`       varchar(20)         DEFAULT NULL COMMENT '飞行小时量',
    `assignment_time`       int(10)             DEFAULT NULL COMMENT '飞行架次',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='通用航空飞行作业量表';

DROP TABLE `airports`;
CREATE TABLE `airports`(
    `id`                    int(10)             NOT NULL AUTO_INCREMENT COMMENT '主键',
    `name`                  varchar(100)        DEFAULT NULL COMMENT '机场名称',
    `area_id`               int(10)             DEFAULT NULL COMMENT '所属地区',
    `active_time`           date                DEFAULT NULL COMMENT '启用时间',
    `investor`              int(1)              DEFAULT NULL COMMENT '投资主体',
    `airport_type`          int(1)              DEFAULT NULL COMMENT '机场类型',
    `grade`                 int(1)              DEFAULT NULL COMMENT '机场等级',
    `coordinate`            varchar(30)         DEFAULT NULL COMMENT '坐标',
    `elevation`             varchar(30)         DEFAULT NULL COMMENT '标高',
    `runway_spec`           varchar(200)        DEFAULT NULL COMMENT '跑道规格',
    `parking_spec`          varchar(200)        DEFAULT NULL COMMENT '停机坪规格及位置',
    `runway_heading`        varchar(200)        DEFAULT NULL COMMENT '跑道方向',
    `obstacle_clearance`    varchar(200)        DEFAULT NULL COMMENT '净空条件',
    `position`              varchar(200)        DEFAULT NULL COMMENT '机场位置',
    `alternate_airport`     varchar(200)        DEFAULT NULL COMMENT '备降机场',
    `distance`              varchar(200)        DEFAULT NULL COMMENT '离重要线路（国境线、国道等）距离',
    `telphone`              varchar(200)        DEFAULT NULL COMMENT '联系电话',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='通用航空机场信息表';
