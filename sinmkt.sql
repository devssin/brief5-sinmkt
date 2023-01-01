-- Active: 1668087176276@@localhost@3307
CREATE DATABASE IF NOT EXISTS sinmkt;
USE sinmkt;
CREATE TABLE IF NOT EXISTS users(
    username VARCHAR(255) PRIMARY KEY NOT NULL,
    password VARCHAR(255)
);
INSERT INTO users VALUES('admin', 'admin');

CREATE TABLE IF NOT EXISTS categories (
    id_cat INT PRIMARY KEY AUTO_INCREMENT,
    name_cat VARCHAR(255)
);

INSERT INTO categories (name_cat) VALUES ('New Arrivals');
INSERT INTO categories (name_cat) VALUES ('Featured');


CREATE TABLE IF NOT EXISTS products(
    id_prod INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    image VARCHAR(255),
    description VARCHAR(500),
    id_cat INT,

    Foreign Key (id_cat) REFERENCES categories(id_cat) ON DELETE SET NULL
);

INSERT INTO products(name , image, description , id_cat) VALUES('Produit 1', 'https://target.scene7.com/is/image/Target/GUEST_ba3bf9f2-0b9a-45cb-807a-0863e2fa2063','this is product 1',1);
INSERT INTO products(name , image, description , id_cat) VALUES('Produit 2', 'https://target.scene7.com/is/image/Target/GUEST_ba3bf9f2-0b9a-45cb-807a-0863e2fa2063','this is product 2',2);
INSERT INTO products(name , image, description , id_cat) VALUES('Produit 3', 'https://target.scene7.com/is/image/Target/GUEST_ba3bf9f2-0b9a-45cb-807a-0863e2fa2063','this is product 3',2);
INSERT INTO products(name , image, description , id_cat) VALUES('Produit 4', 'https://target.scene7.com/is/image/Target/GUEST_ba3bf9f2-0b9a-45cb-807a-0863e2fa2063','this is product 4',1);
INSERT INTO products(name , image, description , id_cat) VALUES('Produit 5', 'https://target.scene7.com/is/image/Target/GUEST_ba3bf9f2-0b9a-45cb-807a-0863e2fa2063','this is product 5',2);

SELECT * , name_cat  from products JOIN categories on products.id_cat = categories.id_cat;

ALTER TABLE products ADD COLUMN price DECIMAL AFTER image;