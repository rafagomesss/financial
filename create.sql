CREATE DATABASE IF NOT EXISTS financial;
ALTER DATABASE financial CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;
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

CREATE TABLE IF NOT EXISTS user_level(
    id INT(2) UNSIGNED AUTO_INCREMENT  NOT NULL,
    description VARCHAR(200) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP(),
    updated_at DATETIME DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

INSERT INTO user_level(description) VALUES('DEVELOPER'), ('ADMINISTRATIVO'), ('USUARIO'), ('COMUM');
SELECT * FROM user_level;

CREATE TABLE IF NOT EXISTS state(
    id INT(3) UNSIGNED AUTO_INCREMENT NOT NULL,
    initials VARCHAR(2) NOT NULL,
    name VARCHAR(25) NOT NULL,
    PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

INSERT INTO state (initials, name)
VALUES  ('AC','Acre'),
        ('AL','Alagoas'),
        ('AP','Amapá'),
        ('AM','Amazonas'),
        ('BA','Bahia'),
        ('CE','Ceará'),
        ('ES','Espírito Santo'),
        ('GO','Goiás'),
        ('MA','Maranhão'),
        ('MT','Mato Grosso'),
        ('MS','Mato Grosso do Sul'),
        ('MG','Minas Gerais'),
        ('PA','Pará'),
        ('PB','Paraíba'),
        ('PR','Paraná'),
        ('PE','Pernambuco'),
        ('PI','Piauí'),
        ('RJ','Rio de Janeiro'),
        ('RN','Rio Grande do Norte'),
        ('RS','Rio Grande do Sul'),
        ('RO','Rondônia'),
        ('RR','Roraima'),
        ('SC','Santa Catarina'),
        ('SP','São Paulo'),
        ('SE','Sergipe'),
        ('TO','Tocantins'),
        ('DF','Distrito Federal');

SELECT * FROM state;

CREATE TABLE IF NOT EXISTS user_personal_data(
    id INT(12) UNSIGNED AUTO_INCREMENT NOT NULL,
    name VARCHAR(200) NOT NULL,
    cpf INT(11) NOT NULL,
    birthdate DATETIME,
    email VARCHAR(100) NOT NULL,
    gender CHAR(1) NOT NULL,
    cellphone VARCHAR(16),
    address VARCHAR(200),
    address_number INT(5),
    complement VARCHAR(200),
    id_state INT(3) UNSIGNED NOT NULL,
    city VARCHAR(255),
    PRIMARY KEY (id),
    CONSTRAINT FK_ID_STATE FOREIGN KEY (id_state) REFERENCES state(id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT CK_USER_PERSONAL_DATA_GENDER CHECK (gender IN('M','F'))
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

SELECT * FROM user_personal_data;
 #DROP TABLE user_personal_data;

CREATE TABLE IF NOT EXISTS user_access(
    id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
    login VARCHAR(100) NOT NULL,
    password VARCHAR(64) NOT NULL,
    id_level INT(2) UNSIGNED NOT NULL,
    id_personal_data INT(11) UNSIGNED NOT NULL,
    personal_data_complete BOOLEAN NOT NULL DEFAULT false,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP(),
    updated_at DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_ID_USER_LEVEL FOREIGN KEY (id_level)
    REFERENCES user_level(id)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
    CONSTRAINT FK_ID_USER_PERSONAL_DATA FOREIGN KEY (id_personal_data)
    REFERENCES user_personal_data(id)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

# DROP TABLE user_access;

SELECT * FROM user_access;