<?php

    if( isset($_SESSION['active']) && $_SESSION['active']){
        $template_navbar = "
            <nav class='navbar'>
                    <li><a href='./'>Inicio</a></li>
                    <ul>
                        <li>Propiedades</li>
                        <li class=''><a href='my-properties' class=''>Mis propiedades</a></li>
                        <li class=''><a href='gallery' class=''>Imágenes</a></li>
                    </ul>
                    <ul class=''>
                        <li>Mi perfil</li>
                        <li><a href='my-profile' class=''>Mi perfil</a></li>
                        <li><a href='profile-edit' class=''>Etidatar perfil</a></li>
                        <li><a href='logout' class=''>Cerrar sesión</a></li>
                    </ul>
                </ul>
            </nav>
        ";
    }else{
        $template_navbar = "
            <nav class=''>
                <ul class='navbar-nav'>
                    <li class=''><a href='singup' class='nav-link'>Publicar gratis</a></li>
                    <li class=''><a href='login' class='nav-link'>Ingresar</a></li>
                </ul>
            </nav>
        ";
    }

$style = $GLOBALS['route']; 

$templamte_header = "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
        

        <link rel='preconnect' href='https://fonts.gstatic.com'>
        <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;800&display=swap' rel='stylesheet'>

        <link rel='stylesheet' href='./public/css/reset.css'>
        <link rel='stylesheet' href='./public/css/utilities.css'>
        <link rel='stylesheet' href='./public/css/search-properties.css'>
        <link rel='stylesheet' href='./public/css/$style.css'>
        
        
    </head>
    <body class='flex-column justify-content-between'>
        <header class=''>
            <div class='navbar layout-container'>
                <div>
                    <a href='./' class=''>ZoneApp</a>
                </div>
                $template_navbar
            </div>
        </header>
        <main>
            <div class='layout-container'>
";
echo $templamte_header;