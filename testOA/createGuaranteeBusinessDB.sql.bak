create database if not exists guarantee_business_db;

grant select, insert, update, delete
on guarantee_business_db.*
to 'gb_db_admin'@'localhost' identified by '12345';
#这里如需远程登陆必须增加 " gb_db_admin@% "

flush privileges;

use guarantee_business_db;
/* *************************************************** */
/* 通用enum表格 */
/* 客户种类： 不同客户有不同属性表格 */
create table if not exists customer_type
(
	id tinyint unsigned not null primary key,
	text char(10) not null
);
insert into customer_type values
	(1, '人'),
	(2, '公司');

/* 评审决定 */
create table if not exists decision
(
	id tinyint unsigned not null primary key,
	text char(15) not null
);
insert into decision values
	(1, '否决'),
	(2, '同意'),
	(3, '打回补充资料');

/* 资料种类 */
create table if not exists info_type
(
	id tinyint unsigned not null primary key,
	text char(20) not null
);
insert into info_type values
	(1, '个人证件'),
	(2, '个人基本资料'),
	(3, '企业证件'),	
	(4, '企业基本资料'),
	(5, '抵押房产类'),
	(6, '企业证件'),
	(7, '企业证件'),
	(8, '企业证件'),
	(9, '企业证件'),
	(10, '企业证件'),
	(11, '企业证件'),
	(12, '企业证件'),
	(13, '企业证件'),
	(14, '企业证件'),
	(15, '企业证件'),
	(16, '企业证件'),
	(17, '企业证件'),
	(18, '企业证件'),
	(19, '企业证件');
	
/* 岗位 */
create table if not exists post
(
	id  tinyint unsigned not null primary key,
	text char(20) not null
);
insert into post values
	(0, 'admin'),
	(1, '客户经理'), 
	(2, '业务部经理'),
	(3, '风险部经理'),
	(4, '副总经理'),
	(5, '董事长助理'),
	(6, '保审会主任'),
	(7, '副董事长'),
	(8, '会计'),
	(9, '反担保经理'),
	(10, '档案管理员');

/* 业务种类 */
create table if not exists business_type
(
	id tinyint unsigned not null primary key,
	text char(20) not null
);
insert into business_type values
	(1, '融资担保业务'),
	(2, '诉讼业务');
	
/* 业务阶段 */
create table if not exists business_stage
(
	id tinyint unsigned not null primary key,
	typeID tinyint unsigned not null references business_type(id),
	text char(20) not null
);
insert into business_stage values
	(0, 1, '中止'),
	(1, 1, '调查阶段'),
	(2, 1, '评审阶段一'),
	(3, 1, '评审阶段二'),
	(4, 1, '评审阶段三'),
	(5, 1, '合同阶段'),
	(6, 1, '收费阶段'),
	(7, 1, '存入保证金阶段'),
	(8, 1, '归档阶段'),
	(9, 1, '还贷阶段'),
	(10, 1, '业务完结'),
	(11, 2, '中止'),
	(12, 2, '业务完结');
	
/* 各阶段权限、人员角色设置 */
create table if not exists stage_responsible
(
	id tinyint unsigned not null primary key,
	stageID tinyint unsigned not null references business_stage(id),
	staffNeeded tinyint unsigned not null,
	haveDecision tinyint not null,
	haveComment tinyint not null
);
insert into stage_responsible values
	(1, 1, 1, 0, 1), /* 调查员 */
	(2, 1, 1, 0, 0), /* 协助调查员 */
	(3, 2, 1, 1, 1), /* 业务部经理 */
	(4, 2, 2, 0, 1), /* 风险部经理 */
	(5, 3, 1, 1, 1), /* 副总经理 */
	(6, 3, 1, 1, 1), /* 董事长助理 */
	(7, 3, 1, 1, 1), /* 保审会主任 */
	(8, 4, 1, 1, 1), /* 副董事长 */
	(9, 5, 2, 0, 0), /* 合同反担保 */
	(10, 6, 2, 0, 0), /* 收费 */
	(11, 7, 2, 0, 0), /* 保证金 */
	(12, 8, 1, 0, 0), /* 归档 */
	(13, 9, 1, 0, 0); /* 还款 */
	
/* 同一个角色可选的岗位 */
create table if not exists responsible_post
(
	id tinyint unsigned not null primary key,
	responsibleID tinyint unsigned not null references stage_responsible(id),
	postID tinyint unsigned not null references post(id)
);
insert into responsible_post values
	(1, 1, 1),	/* 客户经理 调查 */
	(2, 2, 2),	/* 业务部经理 协助调查 */
	(3, 2, 4),	/* 副总经理 协助调查 */
	(4, 2, 5),	/* 董事长助理 协助调查 */
	(5, 2, 6),	/* 保审会主任 协助调查 */
	(6, 3, 2),	/* 业务部经理 审批 */
	(7, 4, 3),	/* 风险部经理 审批 */
	(8, 5, 4),	/* 副总经理 审批2 */
	(9, 6, 5),	/* 董事长助理 审批2 */
	(10, 7, 6),	/* 保审会主任 审批2 */
	(11, 8, 7),	/* 副董事长 审批3 */
	(12, 9, 9),	/* 反担保经理 合同 */
	(13, 10, 8),	/* 会计 收费 */
	(14, 11, 8),	/* 会计 存入保证金 */
	(15, 12, 10),	/* 档案管理员 归档 */
	(16, 13, 1);	/* 客户经理 监督还款 */
/* *************************************************** */
	
	
	
	
/* *************************************************** */
/* 普通表 */
/* staff 需要补充 */
create table if not exists staff
(
	id int unsigned not null primary key
);

/* 客户 自然人 需补充大量资料 */
create table if not exists customer_human
(
	id int unsigned not null auto_increment primary key,
	name char(10),
	age tinyint unsigned,
	identificationType enum('身份证', '驾驶证', '护照', '军官证'),
	identificationNo char(20)
);

/* 客户 公司 需补充大量资料 */
create table if not exists customer_company
(
	id int unsigned not null auto_increment primary key,
	name char(255),
	organizationCodeCertificate char(20),
	taxRegistrationCertificate char(30),
	businessLicence char(40)
);

/* 业务 */
create table if not exists business
(
	id int unsigned not null auto_increment primary key,
	typeID tinyint unsigned not null references business_type(id),
	currentStage tinyint unsigned not null references business_stage(id),
	customerID int unsigned not null references customer(id),
	startTime datetime not null,
	endTime datetime,
	loanDate datetime,
	dueDate datetime
);

/* 业务 对应决议 */
create table if not exists business_decision
(
	id int unsigned not null auto_increment primary key,
	businessID int unsigned not null references business(id),
	staffID int unsigned not null references staff(id),
	decisionID tinyint unsigned not null,
	decisionTime datetime not null
);

/* 业务 对应意见 */
create table if not exists business_comment
(
	id int unsigned not null auto_increment primary key,
	businessID int unsigned not null references business(id),
	staffID int unsigned not null references staff(id),
	decisionComment char(255),
	commentTime datetime not null
);

create table if not exists customer_info
(
	id int unsigned not null auto_increment primary key,
	customerID int unsigned not null references customer(id),
	typeID tinyint unsigned not null references info_type(id), 
	staffID int unsigned not null references staff(id),
	extension char(5) not null,
	fileComment char(255) not null,
	submitTime datetime not null,
	content mediumblob,
	key (submitTime)
);

create table if not exists business_info
(
	id int unsigned not null auto_increment primary key,
	businessID int unsigned not null references business(id),
	typeID tinyint unsigned not null references info_type(id), 
	staffID int unsigned not null references staff(id),
	extension char(5) not null,
	fileComment char(255) not null,
	submitTime datetime not null,
	content mediumblob,
	key (submitTime)
);

/* *************************************************** */
