<?php
?>
<p>Si ya estás registrado ingresa <a href='login'>aquí</a></p>
<form method="POST">
    <fieldset>
        <div>
            <input type="text" name="name" placeholder="Nombre" required>
        </div>
        <div>
            <input type="text" name="surname" placeholder="Apellido" required>
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div>
            <input type="phone" name="phone" placeholder="Teléfono">
        </div>    
    </fieldset>
    <fieldset>
        <div>
            <input type="radio" name="type" value="owner" id="owner" checked><label for="owner">Dueño</label>
            <input type="radio" name="type" value="estate" id="estate"><label for="estate">Inmobiliaria</label>
        </div>
        <div>
            <input type="text" name="company" placeholder="Nombre de Inmobiliaria">
            <input type="text" name="url_whatsapp" placeholder="URL WhatsApp">
        </div>
    </fieldset>
    <fieldset>
        <div>
            <input type="password" name="pass" placeholder="Contraseña">
        </div>
    </fieldset>
    <fieldset>
        <div>
            <input type="submit" value="Continuar">
        </div>
    </fieldset>
</form>