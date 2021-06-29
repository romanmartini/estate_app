<?php

if( isset($_SESSION['active']) && $_SESSION['active']){

    // get gallery images
    $files_controller = new FilesController();
    $url_files = $files_controller->get_files();

    // get propery
    $controller = new PropertiesController();
    $property = $controller->get('all');
    
    foreach( $property[0] as $key => $value ) $$key = $value;

    if( !empty($_POST) ){
        $controller->set($_POST);
        header('Location: my-properties');
    }

    $template_img = "";
    foreach( $img as $value ){
        $template_img .="
            <img src='./public/img/$_SESSION[id_user]/$value' class='img-template'>
            <input type='hidden' name='img[]' value='./public/img/$_SESSION[id_user]/$value'>
        ";

    }

    $template_form = "
    <section>
        <h1>Edtiar propiedad</h1>
        <form method='POST'>
            <input type='hidden' name='id_property' value='$id_property'>
            <fieldset>
                <legend>Publicación</legend>
                <div>
                    <label><input type='text' name='title' placeholder='Título para mostrar' value='$title'></label>
                </div>
                <div>
                    <label><textarea type='text' name='description' rows='10'placeholder='Descripción' >$description</textarea></label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Ubicación de la propiedad</legend>
                <label>Dirección<input type='text' name='address' placeholder='Catamarca 3987' value='$address'></label>
                <label>Ciudad<input type='text' name='city' placeholder='Villa Maria' value='$city'></label>
                <label>Provincia<input type='text' name='region' placeholder='Córdoba' value='$region'></label>
                <label>País<input type='text' name='country' placeholder='Argentina' value='$country'></label>
                <label>Latitud<input type='number' name='lat' placeholder='' value='$lat'></label>
                <label>Longitud<input type='number' name='lon' placeholder='' value='$lon'></label>
            </fieldset>
            <fieldset>
                <legend>Información de la propiedad</legend>
                <label>Tipo de propiedad<select name='type' data-value='$type'>
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
                <label>Área m<sup>2</sup><input type='number' name='total_area' placeholder='80' value='$total_area'></label>
                <label>Área cubierta m<sup>2</sup><input type='number' name='covered_area' placeholder='70' value='$covered_area'></label>
                <label>Ambientes<input type='number' name='rooms' placeholder='3' value='$rooms'></label>
                <label>Dormitorios<input type='number' name='bedrooms' placeholder='1' value='$bedrooms'></label>
                <label>Baño/s<input type='number' name='bathrooms' placeholder='1' value='$bathrooms'></label>
                <label>Cochera/s<input type='number' name='garage' placeholder='0' value='$garage'></label>
                <label>Balcones<input type='number' name='balcony' placeholder='1' value='$balcony'></label>
                <label>Patio<input type='number' name='yard' placeholder='0' value='$yard'></label>
                <label>Patio de luz<input type='number' name='light_yard' placeholder='0' value='$light_yard'></label>
                <label>A estrenar<select name='new' data-value='$new' >
                        <option value='si'>Si</option>
                        <option value='no'>No</option>
                    </select></label>
            </fieldset>
            <fieldset>
                <legend>Tipo de contrato</legend>
                    <select name='contract' data-value='$contract'>
                        <option value='rent'>Alquiles</option>
                        <option value='sale'>Compra/venta</option>
                    </select>
                    <div id='currency' data-value='$currency'>
                        <label for='ARS'><input type='radio' name='currency' value='ARS' id='ARS'>ARS</label>
                        <label for='USD'><input type='radio' name='currency' value='USD' id='USD'>UDS</label>
                    </div>
                    <div >
                        <label>Precio<input type='number' name='price' autocomplete='off' value='$price'></label>
                        <label>Expensas<input type='number' name='expenses' autocomplete='off' value='$expenses'></label>
                    </div>
            </fieldset> 
            <fieldset>
                <legend>Imágenes</legend>
                <div>
                    <label><input type='button' data-open value='+'>Seleccionar imágenes</label>
                </div>
                <div id='img-list'>
                    $template_img
                </div>
                <template id='template-img'>
                    <img src='' class='img-template'>
                    <input type='hidden' name='img[]' value=''>
                </template>
            </fieldset>
            <fieldset>
                <legend>Estado</legend>
                <select name='status' data-value='$status'>
                    <option value='actived'>Disponible</option>
                    <option value='disabled'>No disponible</option>
                </select>
            </fieldset>
            <div>
                <input type='submit' value='Actualizar propiedad'>
                <input type='button' value='Cancelar' onclick='history.back()'>
            </div>
        </form>
    </section>";

    $template_gallery = "
    <aside id='gallery' class='frame'>
        <div>
            <i data-close class='fa fa-closed'></i>
            <div>
                <input type='button' value='Establecer imágenes' id='add-img'>
            </div>";
    foreach($url_files as $url):
            $template_gallery .= "
            <div class='img'>
                <i class='fa fa-add-img'></i>
                <img src='$url'>
            </div>";
    endforeach;

    $template_gallery .= "
        </div>
    </aside>";

    echo $template_form;
    echo $template_gallery;
}