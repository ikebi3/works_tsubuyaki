//作成者:石田生美
//つぶやきサイトのMySQLデータベースファイル
//実行環境LinuxUbuntu1404

CREATE DATABASE tsubuyaki CHARACTER SET utf8;

CREATE TABLE user_table (
id varchar(10) primary key not null,
password varchar(32) not null,
date datetime
);

CREATE TABLE tsubuyaki_table (
code int primary key not null auto_increment
id varchar(10) not null,
content varchar(200) not null,
date datetime
);
