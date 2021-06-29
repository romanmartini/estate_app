<?php
if( !$_SESSION['active'] ){

    if( isset($_POST['crud']) && $_POST['crud'] === 'insert' ){
        
        $controller_user = new UsersController();
        $controller_user->create($_POST);

        $template_form = "
        <div class='mb-5 mt-5 text-center'>
            <h2>Tu cuanta se creo con éxito</h2>
            <p class='text-second mt-2'><a class='link' href='login'>Iniciar sesión</a></p>
        </div>";

    }elseif( !isset( $_POST['type'] )){

        $template_form = "
        <div class='mb-5 mt-5 text-center'>
            <h2>¿Con cuál de estos perfiles te identifica mejor?</h2>
            <p class='text-second mt-2'>¿Ya tienes una cuenta? <a class='link' href='login'>Ingresa aquí</a></p>
        </div>

        <div class='type-user flex justify-content-center gap-5'>

            <form class='border-radius-md' method='POST'>
                <input type='submit' value='Dueño'>
                <input type='hidden' name='type' value='owner'>
            </form>

            <form class='border-radius-md' method='POST'>
                <input type='submit' value='Inmobiliaria'>
                <input type='hidden' name='type' value='estate'>
            </form>

        </div>";
    

    }else{

        $template_form = "
        <form class='singup-form py-6 px-5 my-5 border-radius-card' method='POST'>

            <div>
                <div class='mb-5'>
                    <input class='input-100' type='text' name='name' id='name' placeholder=' ' required autocomplete='off'>
                    <label class='label for='name'>Nombre</label>
                </div>
                <div class='mb-5'>
                    <input class='input-100' type='text' name='surname' id='surname' placeholder=' ' required autocomplete='off'>
                    <label class='label for='surname'>Apellido</label>
                </div>
                <div class='mb-5'>
                    <input class='input-100' type='email' name='email' placeholder=' ' required autocomplete='off'>
                    <label class='label for='surname'>Email</label>
                </div>
                <div class='mb-5'>
                    <input class='input-100' type='password' name='pass' id='pass' placeholder=' ' autocomplete='off'>
                    <label class='label for='pass'>Contraseña</label>
                </div>
            </div>

            <div>
                <div class='mb-5'>
                    <input class='input-100' type='phone' name='phone' id='phone' placeholder=' ' autocomplete='off'>
                    <label class='label for='phone'>Teléfono</label>
                </div> 
                <div class='mb-5'>
                    <input class='input-100' type='text' name='company' id='company' placeholder=' ' autocomplete='off'>
                    <label class='label for='company'>Nombre de Inmobiliaria</label>
                </div>
                <div class='mb-5'>
                    <input class='input-100' type='text' name='url_whatsapp' id='url_whatsapp' placeholder=' ' autocomplete='off'>
                    <label class='label for='url_whatsapp'>URL WhatsApp</label>
                </div>
                <div class='rows justify-content-between gap-3'>
                    <div class='link' data-history-back>
                        <i data-events-none class='fas fa-arrow-left'></i><a href='' class='link'>Volver</a>
                    </div>    
                        <input class='btn-50 border-radius-sm' type='submit' value='Finalizar'>
                </div>
                <input type='hidden' name='role' value='author'>
                <input type='hidden' name='crud' value='insert'>
                <input type='hidden' name='type' value='$_POST[type]'>
            </div>
        
        </form>";

    }

    $template_section = "
    <section class='singup-section flex-center radial-background'>

        <div class='singup mx-auto'>
            $template_form
        </div>

    </section>";

    echo $template_section;
}