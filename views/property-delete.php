<?php

if( isset($_SESSION['active']) && $_SESSION['active'] && $_SESSION['role'] === 'author' && !isset($_POST['crud']) ) {

    $template = "
    <section>
        <h1>¿Estás seguro de eliminar esta propiedad?</h1>
        <form method='POST'>
            <div>
                <input type='submit' name='action' value='Si'>
                <input type='button' value='No' onclick='history.back()'>
                <input type='hidden' name='r' value='property-delete'>
                <input type='hidden' name='id_property' value='$_GET[id_property]'>
                <input type='hidden' name='crud' value='delete'>

            </div>
        </form>
    </section>";
    echo $template;
}   
elseif( isset($_SESSION['active']) && $_SESSION['active'] && $_SESSION['role'] === 'author' && $_POST['crud'] === 'delete' ) {

    $controller = new PropertiesController();
    $controller->del($_POST['id_property']);
    $template = "
    <section>
        <h1>La propiedad fue eliminada con éxito</h1>
        <a href='my-properties'>Volver a mis propiedades</a>
    </section>
    ";
    echo $template;
}else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
