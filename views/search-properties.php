<?php

$properties_controller = new PropertiesController();


// Autocomplete data form
$contract = ( isset($contract) ) ? $contract : 'rent' ;
$city = ( isset($city) ) ? $city : '' ;
$type = ( isset($type) ) ? $type : '0' ;
$bedrooms = ( isset($bedrooms) ) ? $bedrooms : '0' ;
$rooms = ( isset($rooms) ) ? $rooms : '0' ;
$currency =  ( isset($currency) ) ? $currency : 'ARS' ;
$price_min = ( isset($price_min) ) ? $price_min : '' ;
$price_max = ( isset($price_max) ) ? $price_max : '' ;
$id_user = '';
if( !empty($_GET) ){

    foreach($_GET as $key => $value) $$key = $value;
    
    $properties = $properties_controller->get($id_user, $contract, $city, $type, $rooms, $bedrooms, $currency, $price_min, $price_max, false);

} 
else{
    $properties = $properties_controller->get();
}

$template_search_filter = "
<aside class='search-filter'>
    <form  method='GET'>

        <div id='search-contract' data-value='$contract' class='contract'>
            <label class='label-rent' for='rent'><input type='radio' name='contract' value='rent' id='rent'>Alquilar</label>
            <label class='label-sale' for='sale'><input type='radio' name='contract' value='sale' id='sale'>Comprar</label>
        </div>  
        <fieldset>
            <legend>Tipo de propiedad</legend>
            <select name='type' data-value='$type'>
                <option value='0'>Todas</option>
                <option value='2'>Departamento</option>
                <option value='1'>Casa</option>
                <option value='3'>Cochera</option>
                <option value='4'>Local comercial</option>
                <option value='5'>Oficina</option>
                <option value='6'>Deposito</option>
                <option value='7'>Galpón</option>
                <option value='8'>Lote / Terreno</option>
                <option value='9'>Campo</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Ubicación</legend>
            <input type='text' name='city' placeholder='Buscar por ciudad' value='$city' autocomplete='off'>
        </fieldset>
        <div>
            <input type='submit' value='Buscar'>
        </div>
        <div>
            <p>Más opciones</p>
        </div>
        <fieldset>
            <legend>Precio</legend>
            <div id='search-currency' data-value='$currency'>
                <label for='ARS'><input name='currency' value='ARS' type='radio' id='ARS'>ARS</label>
                <label for='USD'><input name='currency' value='USD' type='radio' id='USD'>UDS</label>
            </div>
            <div class='price'>
                <input name='price_min' type='text' placeholder='Desde' autocomplete='off' value='$price_min'>
                <input name='price_max' type='text' placeholder='Hasta' autocomplete='off' value='$price_max'>
            </div>
        </fieldset>
        <fieldset>
            <legend>Dormitorios</legend>
            <div>
                <select name='bedrooms' data-value='$bedrooms'>
                    <option value='0'>Sin definir</option>
                    <option value='1'>1 dorm.</option>
                    <option value='2'>2 dorm.</option>
                    <option value='3'>3 dorm.</option>
                    <option value='4'>4 dorm.</option>
                    <option value='5'>5 o más</option>
                </select>
            </div>
        </fieldset>
        <fieldset>
            <legend>Ambientes</legend>
            <div>
                <select name='rooms' data-value='$rooms'>
                    <option value='0'>Sin definir</option>
                    <option value='1'>Monoambiente</option>
                    <option value='2'>2 amb.</option>
                    <option value='3'>3 amb.</option>
                    <option value='4'>4 amb.</option>
                    <option value='5'>5 o más</option>
                </select>
            </div>
        </fieldset>   
    </form>
</aside>";
echo $template_search_filter;

/* Properties
==============================================================*/

echo "<section class='flex main-section'>
        <div class='flex-wrap justify-content-between'>";
foreach( $properties as $property ){

    $template_img = ''; 

    foreach ($property as $key => $value) $$key = $value;

    foreach( $img as $name_img):
        $url = './public/img/'.$creator.'/'.$name_img;
        $template_img .= '<div><img src="'.$url.'"></div>';
    endforeach;


    $template_property = "
        <div class='card mb-4'>
            <div data-img class='flex'>
                $template_img
            </div>
            <div class='card-body flex-column justify-content-between'>
                <div>
                    <div data-price >$currency $price</div>
                    <div data-expenses='$expenses'>+ $ $expenses Expensas</div>
                </div>
                <div>
                    <div data-address>$address</div>
                    <div data-city>
                        <span>$city, </span>
                        <span>$region, </span>
                        <span>$country</span>
                    </div>
                </div>
                <div data-property>
                    <div>   
                        <i class='fa fa-rule'></i>
                        <span data-total-area='$total_area'>$total_area m<sup>2</sup></span>
                    </div>
                    <div>
                        <i class='fa fa-door'></i>
                        <span data-rooms='$rooms'>$rooms amb.</span>
                    </div>
                    <div>
                        <i class='fa fa-bed'></i>
                        <span data-bedrooms='$bedrooms'>$bedrooms dorm.</span>
                    </div>
                    <div>
                        <i class='fa fa-toilet'></i>
                        <span data-bathrooms='$bathrooms'>$bathrooms bañ.</span>
                    </div>
                    <div>
                        <i class='fa fa-garage'></i>
                        <span data-garage='$garage'>$garage coch.</span>
                    </div>
                </div>
                <div data-title>$title</div>
                <hr>
                <form method='GET' >
                    <input type='submit' class='btn-primary' value='Ver' >
                    <input name='id_property' type='hidden' value='$id_property' >
                </form>
            </div>
        </div>";
    echo $template_property;
}
echo '</div></section>';