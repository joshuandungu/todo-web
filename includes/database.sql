-- create database todo-list -->
CREATE DATABASE IF NOT EXISTS todo_list;
USE todo_list;

-- create table todo_list -->
CREATE TABLE IF NOT EXISTS todo_list(
    item_id INT(100) PRIMARY KEY NOT NULL,
    item_title VARCHAR(500) NOT NULL,
    item_body TEXT NOT NULL,
    date_inserted DATETIME   ON UPDATE CURRENT TIMESTAMP    NOT NULL
);