CREATE DATABASE IF NOT EXISTS financial SET utf8 COLLATE utf8_general_ci;
USE financial;

CREATE TABLE IF NOT EXISTS categories(
    id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
    name VARCHAR(150) NOT NULL,
    description VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP(),
    updated_at DATETIME DEFAULT NULL,
    last_name_value VARCHAR(150),
    PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

INSERT INTO categories (name, description) VALUES ('CATEGORIA 1', 'Esta é uma descrição teste...');

SELECT * FROM categories;