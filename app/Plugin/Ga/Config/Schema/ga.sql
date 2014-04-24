CREATE TABLE `ga_department_metas` (
    `id`                    int(10)            NOT NULL COMMENT '主键',
    `name`                  varchar(100)       NOT NULL COMMENT '名称',
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
