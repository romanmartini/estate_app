<?php

$properties_controller = new PropertiesController();

$contract = 'rent' ;
$city = '' ;
$type = [0] ;
$rooms = '0' ;
$bedrooms = '0' ;
$currency = 'ARS' ;
$price_min = '' ;
$price_max = '' ; 

// Query
if( !empty($_GET) ){
    
    $_GET['from_home'] = true;
    foreach($_GET as $key => $value) $$key = $value;
    
    $properties = $properties_controller->get($contract, $city, $type, $rooms, $bedrooms, $currency, $price_min, $price_max, false);

} 
else{

    $_GET['from_home'] = true;
    $properties = $properties_controller->get();

}

$type_checked = array ('','','','','','','','','','');
foreach($type as $value){
    $type_checked[$value] = 'checked';
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
            <div>
                <label><input type='checkbox' name='type[]' $type_checked[0]  value='0'>Todas</label>
                <label><input type='checkbox' name='type[]' $type_checked[1]  value='1'>Casa</label>
                <label><input type='checkbox' name='type[]' $type_checked[2]  value='2'>Departamento</label>
                <label><input type='checkbox' name='type[]' $type_checked[3]  data-type-checkbox value='3'>Cochera</label>
                <label><input type='checkbox' name='type[]' $type_checked[4]  data-type-checkbox value='4'>Local comercial</label>
                <label><input type='checkbox' name='type[]' $type_checked[5]  data-type-checkbox value='5'>Oficina</label>
                <label><input type='checkbox' name='type[]' $type_checked[6]  data-type-checkbox value='6'>Depósito</label>
                <label><input type='checkbox' name='type[]' $type_checked[7]  data-type-checkbox value='7'>Galpón</label>
                <label><input type='checkbox' name='type[]' $type_checked[8]  data-type-checkbox value='8'>Lote / Terreno</label>
                <label><input type='checkbox' name='type[]' $type_checked[9]  data-type-checkbox value='9'>Campo</label>
            </div>
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

            <!-- <div id='search-currency' data-value='$currency'>
                <label for='ARS'><input name='currency' value='ARS' type='radio' id='ARS'>ARS</label>
                <label for='USD'><input name='currency' value='USD' type='radio' id='USD'>UDS</label>
            </div> -->

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

echo "<section class=''>
        <div class='cards-properties'>";
foreach( $properties as $property ){

    $template_img = ''; 

    foreach ($property as $key => $value) $$key = $value;

    foreach( $img as $name_img):
        $url = './public/img/'.$creator.'/'.$name_img;
        $template_img .= '<div class="card-property-img"><img  src="'.$url.'"></div>';
    endforeach;

    $template_property = "
        <div class='card-property'>

            <div class='card-property-images' data-img>
                <div class='img-prev'></div>
                $template_img
                <div class='img-next'></div>
            </div>

            <div class='card-property-body'>

                <div class='card-property-prices'>
                    <div class='card-property-price' data-price >$currency $price</div>
                    <div class='card-property-expenses' data-expenses='$expenses'>+ $ $expenses Expensas</div>
                </div>

                <div class='card-property-header'>
                    <h4 class='card-property-title' data-title>$title</h4>
                    <div class='card-property-location'>
                        <span data-address>$address, </span>
                        <span data-city>$city, $region, $country</span>
                    </div>
                </div>

                <div class='card-property-data' data-property>
                    <div>   
                        <i class='i i-rule'></i>
                        <span data-total-area='$total_area'>$total_area m<sup>2</sup></span>
                    </div>
                    <div>
                        <i class='i i-door'></i>
                        <span data-rooms='$rooms'>$rooms amb.</span>
                    </div>
                    <div>
                        <i class='i i-bed'></i>
                        <span data-bedrooms='$bedrooms'>$bedrooms dorm.</span>
                    </div>
                    <div>
                        <i class='i i-toilet'></i>
                        <span data-bathrooms='$bathrooms'>$bathrooms bañ.</span>
                    </div>
                    <div>
                        <i class='i i-garage'></i>
                        <span data-garage='$garage'>$garage coch.</span>
                    </div>
                </div>

                <div class='card-property-line'>
                    <hr>
                </div>

                <form class='card-property-form'  method='GET' >
                    <input class='btn border-radius-sm' type='submit' class='' value='Ver propiedad' >
                    <input type='hidden' name='r' value='property'>
                    <input type='hidden' name='id_property' value='$id_property'>
                </form>

            </div>

        </div>";
    echo $template_property;
}
echo '</div></section>';
