<?php

if( isset($_SESSION['active']) && $_SESSION['active']){

    $id_user = $_SESSION['id_user'];



    $template = <<<HTML
    <section>
        <h1>Agregar propiedad</h1>
        <form method='POST'>
            <div>
                <input type='hidden' name='creator' value='$id_user'>
            </div>
            <fieldset>
                <legend>Ubicación</legend>
                <label>Dirección<input type="text" placeholder='Catamarca 3987 '></label>
                <label>Ciudad<input type="text" placeholder='Villa Maria'></label>
                <label>Provincia<input type="text" placeholder='Córdoba'></label>
                <label>País<input type="text" placeholder='Argentina'></label>
            </fieldset>
            <fieldset>
                <legend>Información de la propiedad</legend>
                <label>Tipo de propiedad<select name='type'>
                    <option value='2'>Departamento</option>
                    <option value='1'>Casa</option>
                    <option value='3'>Cochera</option>
                    <option value='4'>Local comercial</option>
                    <option value='5'>Oficina</option>
                    <option value='6'>Deposito</option>
                    <option value='7'>Galpón</option>
                    <option value='8'>Lote / Terreno</option>
                    <option value='9'>Campo</option>
                </select></label>
                <label>Área m<sup>2</sup><input type="number" placeholder='80'></label>
                <label>Área cubierta m<sup>2</sup><input type="number" placeholder='70'></label>
                <label>Ambientes<input type="number" placeholder='3'></label>
                <label>Dormitorios<input type="number" placeholder='1'></label>
                <label>Baño/s<input type="number" placeholder='1'></label>
                <label>Cochera/s<input type="number" placeholder='0'></label>
                <label>Balcones<input type="number" placeholder='1'></label>
                <label>Patio<input type="number" placeholder='0'></label>
                <label>Patio de luz<input type="number" placeholder='0'></label>
            </fieldset>
        </form>

    </section>
    
    HTML;
    echo $template;
    
}
/*
    id_property INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    creator INT(11) UNSIGNED NOT NULL,
    FOREIGN KEY (creator) REFERENCES users(id_user)
    ON DELETE CASCADE ON UPDATE CASCADE,

    address VARCHAR(60) NOT NULL,
    city VARCHAR(60) NOT NULL,
    region VARCHAR(60) NOT NULL,
    country VARCHAR(60) NOT NULL,

    total_area INT(3) UNSIGNED,
    covered_area INT(3) UNSIGNED,
    rooms INT(2) UNSIGNED,
    bathrooms INT(2) UNSIGNED,
    bedrooms INT(2) UNSIGNED,
    garage INT(2) UNSIGNED,
    balcony INT(2) UNSIGNED,
    yard ENUM('si', 'no'),
    light_yard INT(2) UNSIGNED,
    
    


    title VARCHAR(60) NOT NULL,
    description TEXT,
    img TEXT,

    
    

    new ENUM('si', 'no'),

    

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
);*/