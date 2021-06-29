<?php
if( isset($_SESSION['active']) && $_SESSION['active']){
    
    // Autocomplete form data
    $contract = ( isset($contract) ) ? $contract : 'all' ;
    $city = ( isset($city) ) ? $city : '' ;
    $type = ( isset($type) ) ? $type : '0' ;
    $currency =  ( isset($currency) ) ? $currency : 'ARS' ;
    $price_min = ( isset($price_min) ) ? $price_min : '' ;
    $price_max = ( isset($price_max) ) ? $price_max : '' ;
    $status = ( isset($status) ) ? $status : 'all';

    // Query
    $id_user = $_SESSION['id_user'];
    $properties_controller = new PropertiesController();

    if( !empty($_POST) ){
    
        foreach($_POST as $key => $value) $$key = $value;
        
        $properties = $properties_controller->get($contract, $city, $type, $rooms = 0, $bedrooms = 0, $currency, $price_min, $price_max, false, $status);
    
    } 
    else{
        $properties = $properties_controller->get($contract);
    }

    /* Property templates
    ======================================= */
    $template_table_header = "
    <form method='POST' id='form-admin'>   
        <tr>
            <th colspan='2'>Propiedad</th>
            <th>
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
            </th>
            <th>
                <fieldset>
                    <legend>Ubicación</legend>
                    <input type='text' name='city' placeholder='Buscar por ciudad' value='$city' autocomplete='off'>
                </fieldset>
            </th>
            <th>
                <fieldset>
                    <legend>Contrato</legend>
                    <select name='contract' data-value='$contract'>
                        <option value='all'>Todos</option>
                        <option value='rent'>En alquiler</option>
                        <option value='sale'>En venta</option>
                    </select>
                </fieldset>
            </th>
            <th>
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
            </th>
            <th>
                <fieldset>
                    <legend>Estado</legend>
                    <select name='status' data-value='$status'>
                        <option value='all'>Todos</option>
                        <option value='actived'>Disponible</option>
                        <option value='disabled'>No disponible</option>
                    </select>
                </fieldset>
            </th>
        </tr>
        <tr>   
            <td  colspan='7'> 
                <input for='form-admin' type='submit' value='Buscar' style='display:block; width: 100%;'>
            </td>
        </tr>
    </form>";

    $template_property_row = "";
    foreach( $properties as $property ){
    
        $template_img = ''; 
        foreach ($property as $key => $value) $$key = $value;
        foreach( $img as $name_img):
            $url = './public/img/'.$creator.'/'.$name_img;
            $template_img = '<img src="'.$url.'">';
        endforeach;
    
        $template_property_row .="
        <tr>
            <td>
                <div style='width: 100px; height: 100px;'>
                    $template_img
                </div>
            </td>
            <td>
                <div>$title</div>
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
                <form method='GET' action='./'>
                    <input type='hidden' name='r' value='property'>
                    <input type='hidden' name='id_property' value='$id_property'>
                    <input type='submit' value='Ver'>
                </form>
                <form method='GET' action='./'>
                    <input type='hidden' name='r' value='property-edit'>
                    <input type='hidden' name='id_property' value='$id_property'>
                    <input type='submit' value='Editar'>
                </form>
                <form method='GET' action='./'>
                    <input type='hidden' name='r' value='property-delete'>
                    <input type='hidden' name='id_property' value='$id_property'>
                    <input type='submit' value='Eliminar'>
                </form>
            </td>
            <td>$property_type</td>
            <td>
                <div >$city, $region</div>
                <div >$address</div>
            </td>
            <td>$contract</td>
            <td>
                <div>$currency $price</div>
                <div data-expenses='$expenses'>+ $ $expenses Expensas</div>
            </td>
            <td>$status</td>
        </tr>";
    }
    
    $template_section= "
    <section class=''>
        <h2>Administrar propiedades</h2>
        <div class=''>
            <form method='GET' action='./'>
                <input type='hidden' name='r' value='property-add'>
                <input type='submit' value='Nueva propiedad'>
            </form>
            <table>
                <thead>
                    $template_table_header
                </thead>
                <tbody>
                    $template_property_row
                </tbody>
            </table>
        </div>
    </section>";

    // print
    echo $template_section;
    

}else{
    $controller = new ViewController();
    $controller->load_view('error401');

}