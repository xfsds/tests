drop database if exists guarantee_business_db;
#revoke all privileges, grant option from 'gb_db_admin'@'localhost';
use mysql;
delete from user where user='gb_db_admin';
flush privileges;