-- CREATE DATABASES ADD

CREATE DATABASE IF NOT EXISTS api_post;

USE api_post;

-- create user ADD
-- ID , NAME , EMAIL , PASSWORD , last login

CREATE TABLE USER (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
-- create post
-- ID , title , content , image  , user_id

CREATE TABLE POST (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content text ,
    user_id BIGINT,
    FOREIGN KEY(user_id) REFERENCES USER(id) ON DELETE SET NULL
);

