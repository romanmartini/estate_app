<?php

    if( isset($_SESSION['active']) && isset($_SESSION['role']) && $_SESSION['role'] === 'author'){
        $template_navbar = "
            <nav class='navbar'>
                    <li><a href='./'>Inicio</a></li>
                    <ul>
                        <li>Propiedades</li>
                        <li class='nav-link'><a href='my-properties' class=''>Mis propiedades</a></li>
                        <li class='nav-link'><a href='gallery' class=''>Imágenes</a></li>
                    </ul>
                    <ul class=''>
                        <li>Mi perfil</li>
                        <li><a class='nav-link' href='my-profile' >Mi perfil</a></li>
                        <li><a class='nav-link' href='profile-edit' >Etidatar perfil</a></li>
                        <li><a class='nav-link' href='logout' >Cerrar sesión</a></li>
                    </ul>
                </ul>
            </nav>
        ";
    }else{
        $template_navbar = "
            <nav>
                <div class='rows gap-5'>
                    <div>
                        <i id ='icon-theme' class='icon icon-moon'></i>
                    </div>
                    <div>
                        <a class='nav-link' href='singup' >Registrarse</a>                   
                    </div>
                    <div>
                        <a class='btn border-radius-sm' href='login' >Ingresar</a>
                    </div>
                </div>
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
        <link rel='icon' type='image/ico' href='./assets/favicon.ico' sizes='64x64'>


        <link rel='preconnect' href='https://fonts.gstatic.com'>
        <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;800&display=swap' rel='stylesheet'>

        <link rel='stylesheet' href='./public/css/normalize.css'>
        <link rel='stylesheet' href='./public/css/style.css'>
        <link rel='stylesheet' href='./public/css/utilities.css'>
        <link rel='stylesheet' href='./public/css/components.css'>
        <link rel='stylesheet' href='./public/css/templates/$style.css'>
        
        
        <script src='./public/js/dom/toggleTheme.js'></script>

    </head>
    <body class='grid ligth-theme'>
        <header class='header'>
            <div class='navbar layout-container'>
                <div>
                    <a class='brand' href='./'>
                        <div class='brand-logo'>
                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30.42 30.97'>
                                <polygon fill='currentColor' points='30.42 5.01 30.42 19.81 25.61 19.81 25.61 14.73 14.96 6.68 4.82 14.35 4.82 19.81 0 19.81 0 11.31 4.82 7.67 10.54 3.34 14.96 0 19.38 3.34 25.61 8.05 25.61 5.01 30.42 5.01'/>
                                <polygon fill='currentColor' points='25.61 21.71 30.42 21.71 30.42 30.97 0 30.97 0 21.71 4.82 21.71 4.82 26.16 25.61 26.16 25.61 21.71'/>
                            </svg>
                        </div>
                        <div class='brand-text'>
                            <span>Real</span> 
                            <span>Estate</span> 
                            <span>App</span> 
                        </div>
                    </a>
                </div>
                $template_navbar
            </div>
        </header>
        <main class='main'>
            <div class='layout-container'>
";
echo $templamte_header;