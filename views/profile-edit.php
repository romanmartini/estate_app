<?php

if( isset($_SESSION['active']) && $_SESSION['active'] && $_SESSION['role'] === 'author' ) {
    
    $controller_user = new UsersController();

    $template_message = '';

    // Update
    if( isset($_POST['crud']) && $_POST['crud'] === 'edit' ){

        $controller_user->update($_POST);

        $template_message = "
        <div>
            <p>Los datos fueron actualizados</p>
        </div>";

    }

    // Get
    $user_data = $controller_user->get();

    // Format
    foreach($user_data[0] as $key => $value) $$key = $value;

    $checked_estate = ( $type === 'estate') ? 'checked' : '';
    $checked_owner = ( $type === 'owner') ? 'checked' : '';

    // Templates
    $template_form = "
    <form method='POST'>
        <fieldset>
            <legend>Datos privados</legend>
            <div>
                <label>Nombre <input type='text' name='name' value='$name' placeholder='Nombre' required></label>
            </div>
            <div>
                <label>Apellido <input type='text' name='surname' value='$surname' placeholder='Apellido' required></label>
            </div>
            <div>
                <label>Email <input type='email' name='email' value='$email' placeholder='Email' required></label>
            </div>  
        </fieldset>
        <fieldset>
            <div>
                <input type='radio' name='type' value='owner' $checked_owner id='owner'><label for='owner'>Dueño</label>
                <input type='radio' name='type' value='estate' $checked_estate id='estate'><label for='estate'>Inmobiliaria</label>
            </div>
            <div>
                <label>Teléfono <input type='phone' name='phone' value='$phone' placeholder='Teléfono'></label>
            </div>  
            <div>
                <input type='text' name='company' value='$company' placeholder='Nombre de Inmobiliaria'>
                <input type='text' name='url_whatsapp' value='$url_whatsapp' placeholder='URL WhatsApp'>
            </div>
        </fieldset>
        <fieldset>
            <div>
                <label>Controseña<input type='password' name='pass' placeholder='****' disabled></label><a href='pass-edit'>Editar</a>
            </div>
        </fieldset>
        <fieldset>
            <div>
                <input type='submit' value='Aplicar cambios'>
                <input type='hidden' name='crud' value='edit'>
                <div>
                    <a href='profile-delete'>Eliminar cuenta</a>
                </div>
            </div>
        </fieldset>
    </form>";

    $template_section = "
    <section>
        <h1>Editar perfil</h1>
        $template_message
        $template_form
    </section>";

    // Print
    echo $template_section;

}else {
	$controller_view = new ViewController();
	$controller_view->load_view('error401');
}
