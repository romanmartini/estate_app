<?php
echo "
    <form method='POST'>
        <div>
            <input type='text' name='email' placeholder='Ingrese email' required>
        </div>
        <div>
            <input type='password' name='pass'placeholder='Ingrese contraseña' required>
        </div>
        <div>
            <input type='submit' value='Ingresar'>
        </div>
        <div>
            <p>Si aún no tienes una cueta <a href='singup'>regístrate aquí</a></p>
    </form>";

if( isset($_GET['error']) ){
    $error_template = "
        <div class=''>
            <p class='error'>%s</p>
        </div>";
    printf($error_template, $_GET['error']);
} 
