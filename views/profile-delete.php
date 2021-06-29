<?php

if( isset($_SESSION['active']) && $_SESSION['active'] && $_SESSION['role'] === 'author' ) {
    

    // delete
    if( isset($_POST['crud']) && $_POST['crud'] === 'delete' ){

        $controller_user = new UsersController();
        $controller_session = new SessionController();
        
        $controller_user->del();
        $controller_session->logout();

        $template_delete = "
        <section>
            <h1>Cuenta eliminada</h1>
            <a href='./'>Volver al inicio</a>
        </section>";

    }else{

    $template_delete = "
    <section>
        <h1>Si elimanas tu cuenta perderás todas tus publicaciones ¿Deseas continuar?</h1>
        <form method=POST>
            <input type=submit value=Si>
            <input type='hidden' name='crud' value='delete'>
        </form>
        <a href='profile-edit'>No</a>
    </section>";

    }

    // Print
    echo $template_delete;

}else {
	$controller_view = new ViewController();
	$controller_view->load_view('error401');
}



