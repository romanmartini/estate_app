<?php

$message = '';

$files_controller = new FilesController();

// delete file
if( isset($_POST['action']) && $_POST['action'] === 'delete' ) $message = $files_controller->delete_file($_POST['rute']);

// Add file
if( !empty($_FILES) ) $message = $files_controller->add_file($_FILES['file_img']);

// Get files
$url_files = $files_controller->get_files();


$template_form = "
<div id='show-img' class='picture-frame'>
    <div class='picture'>
        <div id='form-delete'></div>
        <i data-close class='fa fa-closed'></i>
        <figure>
            <img src=''>
        </figure>
    </div>
</div>
<h1>Galería de imágenes</h1>
<form name='send_file_form' method='POST' action='' enctype='multipart/form-data'> 
    <fieldset>
    <legend>Subir imágenes</legend>
        <input type='file' name='file_img'>
        <input type='submit' name='Subir imágen'>
    </fieldset>
</form>
<div>
    <p>$message</p>
</div>";

$template_images = '';

foreach($url_files as $url){
    $template_images .= "
    <div style='display: inline-block;'>
        <img style='width:200px; height:auto;' src='$url'>
        <div>
            <input data-show-img type='submit' value='Ver'>
            <input data-delete-img type='submit' value='Elminar'>
        </div>
    </div>
    ";
}

echo $template_form;
echo $template_images;