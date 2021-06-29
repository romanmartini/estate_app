/* 


DROP DATABASE IF EXISTS estate;

CREATE DATABASE IF NOT EXISTS estate;
*/
USE c2230446_estate;


/* DATA PROPERTY */                                     


CREATE TABLE users(
    id_user INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type ENUM('user', 'owner', 'estate') NOT NULL DEFAULT 'user',
    
    name VARCHAR(30) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    company VARCHAR(30) DEFAULT NULL,
    logotype VARCHAR(255),
    email VARCHAR(30) UNIQUE NOT NULL,
    phone CHAR(12) UNIQUE NOT NULL,
    url_whatsapp VARCHAR(255), 
    pass CHAR(32) NOT NULL,
    role ENUM('suscriber', 'author', 'admin') DEFAULT 'suscriber'
);

CREATE TABLE property_type(
    id_property_type INT(3) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    property_type VARCHAR(20) NOT NULL
);

CREATE TABLE property(
    id_property INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,

    creator INT(11) UNSIGNED NOT NULL,
    FOREIGN KEY (creator) REFERENCES users(id_user)
    ON DELETE CASCADE ON UPDATE CASCADE,

    title VARCHAR(60) NOT NULL,
    description TEXT,
    img TEXT,

    address VARCHAR(60) NOT NULL,
    city VARCHAR(60) NOT NULL,
    region VARCHAR(60) NOT NULL,
    country VARCHAR(60) NOT NULL,

    rooms INT(2) UNSIGNED,
    bathrooms INT(2) UNSIGNED,
    bedrooms INT(2) UNSIGNED,
    
    total_area INT(3) UNSIGNED,
    covered_area INT(3) UNSIGNED,

    new ENUM('si', 'no'),

    balcony INT(2) UNSIGNED,
    garage INT(2) UNSIGNED,
    yard ENUM('si', 'no'),
    light_yard INT(2) UNSIGNED,

    lat VARCHAR(20),
    lon VARCHAR(20),

    contract ENUM('rent', 'sale'),
    currency ENUM('ARS', 'UDS') NOT NULL,
    price INT(11) UNSIGNED NOT NULL,
    expenses INT(7) UNSIGNED,

    type INT(3) UNSIGNED NOT NULL,
    FOREIGN KEY (type) REFERENCES property_type(id_property_type)
    ON DELETE RESTRICT ON UPDATE CASCADE,

    status ENUM('actived', 'disabled') DEFAULT 'actived',
    FULLTEXT KEY sear(city, region, country)
);

INSERT INTO property_type(property_type) 
    VALUE('home'), 
    ('apartament'), 
    ('garage'), 
    ('shop'), 
    ('office'), 
    ('deposit'), 
    ('barn'), 
    ('land'), 
    ('hectares');

