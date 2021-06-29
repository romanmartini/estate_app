<?php

if( isset($_SESSION['active']) && $_SESSION['active'] && $_SESSION['role'] === 'author' && !isset($_POST['crud']) ) {
    
    $files_controller = new FilesController();
    $url_files = $files_controller->get_files();



    $template_form = "
    <section>
        <h1>Agregar propiedad</h1>
        <form method='POST'>
            <fieldset>
                <legend>Publicación</legend>
                <div>
                    <label><input type='text' name='title' placeholder='Título para mostrar'></label>
                </div>
                <div>
                    <label><textarea type='text' name='description' rows='10'placeholder='Descripción'></textarea></label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Ubicación de la propiedad</legend>
                <label>Dirección<input type='text' name='address' placeholder='Catamarca 3987 '></label>
                <label>Ciudad<input type='text' name='city' placeholder='Villa Maria'></label>
                <label>Provincia<input type='text' name='region' placeholder='Córdoba'></label>
                <label>País<input type='text' name='country' placeholder='Argentina'></label>
                <label>Latitud<input type='number' name='lat' placeholder=''></label>
                <label>Longitud<input type='number' name='lon' placeholder=''></label>
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
                <label>Área m<sup>2</sup><input type='number' name='total_area' placeholder='80'></label>
                <label>Área cubierta m<sup>2</sup><input type='number' name='covered_area' placeholder='70'></label>
                <label>Ambientes<input type='number' name='rooms' placeholder='3'></label>
                <label>Dormitorios<input type='number' name='bedrooms' placeholder='1'></label>
                <label>Baño/s<input type='number' name='bathrooms' placeholder='1'></label>
                <label>Cochera/s<input type='number' name='garage' placeholder='0'></label>
                <label>Balcones<input type='number' name='balcony' placeholder='1'></label>
                <label>Patio<input type='number' name='yard' placeholder='0'></label>
                <label>Patio de luz<input type='number' name='light_yard' placeholder='0'></label>
                <label>A estrenar<select name='new' >
                        <option value='si'>Si</option>
                        <option value='no'>No</option>
                    </select></label>
            </fieldset>
            <fieldset>
                <legend>Tipo de contrato</legend>
                    <select name='contract' >
                        <option value='rent'>Alquiles</option>
                        <option value='sale'>Compra/venta</option>
                    </select>
                    <div >
                        <label for='ARS'><input type='radio' name='currency' value='ARS' id='ARS' checked>ARS</label>
                        <label for='USD'><input type='radio' name='currency' value='USD' id='USD'>UDS</label>
                    </div>
                    <div >
                        <label>Precio<input type='number' name='price' autocomplete='off'></label>
                        <label>Expensas<input type='number' name='expenses' autocomplete='off'></label>
                    </div>
            </fieldset> 
            <fieldset>
                <legend>Imágenes</legend>
                <div>
                    <label><input type='button' data-open value='+'>Seleccionar imágenes</label>

                </div>
                <div id='img-list'>
                </div>
                <template id='template-img'>
                    <img src='' class='img-template'>
                    <input type='hidden' name='img[]' value=''>
                </template>
            </fieldset>
            <fieldset>
                <legend>Estado</legend>
                <select name='status' >
                        <option value='actived'>Disponible</option>
                        <option value='disabled'>No disponible</option>
                    </select>
            </fieldset>
            <div>
                <input type='submit' value='Aregar propiedad'>
                <input type='button' value='Cancelar' onclick='history.back()'>
                <input type='hidden' name='crud' value='add'>
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

}elseif( isset($_SESSION['active']) && $_SESSION['active'] && $_SESSION['role'] === 'author' && $_POST['crud'] === 'add' ) {

    if( !empty($_POST) ){

        $controller = new PropertiesController();
        $controller->set($_POST);
        
        $template_success ="
        <section>
            <h1>Se agregó una propiedad</h1>
            <div>
                <a href='property-add'>Agregar otra propiedad</a>
            </div>
            <div>
                <a href='my-properties'>Volver a mis propiedades</a>
            </div>
        </section>
        ";
        echo $template_success;
    
    }else{
        echo '<h1>Ocurrió un error</h1>';
    }

    
}else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
