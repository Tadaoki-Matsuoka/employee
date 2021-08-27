SET NAMES utf8;
DROP DATABASE IF EXISTS employee;

CREATE DATABASE employee DEFAULT CHARSET utf8;

USE employee;

DROP TABLE IF EXISTS department;
CREATE TABLE department (
    dept_id int(11) NOT NULL AUTO_INCREMENT,
    dept_name varchar(255) NOT NULL DEFAULT '',
    PRIMARY KEY (dept_id)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO department VALUES
(1,'総務部'),(2,'営業部'),(3,'企画部'),(4,'開発部'),(5,'広報部');

DROP TABLE IF EXISTS employee;
CREATE TABLE employee (
    ID int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL DEFAULT '',
    age int(11) NOT NULL DEFAULT '0',
    address varchar(255) NOT NULL DEFAULT '',
    dept_id int(11) NOT NULL DEFAULT '0',
    updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO employee VALUES
(1,'山田', 25, '東京都世田谷区世田谷1-2-3', 1, now(), now()),
(2,'佐藤', 31, '東京都杉並区杉並1-2-3', 3, now(), now()),
(3,'内藤', 29, '東京台東区台東1-2-3', 5, now(), now()),
(4,'横山', 35, '東京都板橋区上板橋1-2-3', 2, now(), now()),
(5,'長崎', 24, '東京都目黒区目黒1-2-3', 2, now(), now());