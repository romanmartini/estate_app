<?php
$template_login="
<section class='section-login flex-center h-100'>
    <div class='flex-column gap-4 py-6 px-4 border-radius-card'>
        <div>
            <h2>Iniciar sesión</h2> 
            <p class='text-second mt-2'>¿Aún no tienes una cuenta? <a class='link' href='singup'>Regístrate aquí</a></p>
        </div>
        <form method='POST'>
            <div class='mb-3'>
                <i class='fas fa-user'></i>
                <input class='input-icon input-100' type='email' name='email' placeholder='Email' required autocomplete='off'>
            </div>
            <div class='mb-4'>
                <i class='fas fa-key'></i>
                <input class='input-icon input-100' type='password' name='pass'placeholder='Contraseña' required autocomplete='off'>
            </div>
            <div>
                <input class='btn border-radius-sm mt-5' type='submit' value='Iniciar'>
            </div>
        </form>
    </div>
</section>";

echo $template_login;

if( isset($_GET['error']) ){
    $error_template = "
        <div class=''>
            <p class='error'>%s</p>
        </div>";
    printf($error_template, $_GET['error']);
} 
