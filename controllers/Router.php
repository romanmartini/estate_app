<?php
class Router{
    
    // ¿HACE FALTA?
    public $route;

    public function __construct($route){
        
        $session_option = [

            'use_only_cookies' => 1,   
            'auto_start' => 1,
            'read_and_close' => true
        ];

        $controller = new ViewController();


        if( !isset($_SESSION) ) session_start( $session_option );
        
        if( !isset($_SESSION['active']) ) $_SESSION['active'] = false;
        
        if( isset($_GET['r']) && $_GET['r']  === 'property' ) $controller->load_view('property');
        
        elseif( $route === 'search-properties' ) $controller->load_view('search-properties');
        
        elseif( $route === 'components' ) $controller->load_view('components');

        elseif( $_SESSION['active'] && $_SESSION['role'] === 'author'){

            $this->route = isset($_GET['r']) ? $_GET['r'] : 'search-properties' ;

            switch ($route){
  
                case 'my-properties':
                    $controller->load_view('my-properties');
                break;
                case 'property-add':
                    $controller->load_view('property-add');
                    break;
                case 'property-edit':
                    $controller->load_view('property-edit');
                break;
                case 'property-delete':
                    $controller->load_view('property-delete');
                break;
                case 'gallery':
                    $controller->load_view('gallery');
                break;
                case 'my-profile':
                    $controller->load_view('my-profile');
                break;
                case 'profile-edit':
                    $controller->load_view('profile-edit');
                break;
                case 'profile-delete':
                    $controller->load_view('profile-delete');
                break;
                case 'pass-edit':
                    $controller->load_view('pass-edit');
                break;
                case 'logout':
                    $user_session = new SessionController();
                    $user_session->logout();
                break;
                case 'upload_file':
                    $controller->load_view('upload_file');
                break;
                default:
                    $controller->load_view('error404');
                break;
                    

            }
        }      
        elseif($route === 'login'){ 
    
            if( !isset($_POST['email']) && !isset($_POST['pass']) ){

                $controller->load_view($route);
            
            }else{

                $user_session = new SessionController();
                $session = $user_session->login($_POST['email'], $_POST['pass']);
            
                if( empty($session) ){
                    
                    header('Location: ./?r=login&error=El email '. $_POST['email'] .' o la contraseña no son válidos.');
                    
                }else{

                    $_SESSION['active'] = true;

                    foreach( $session as $row ){
                        $_SESSION['id_user'] = $row['id_user'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['role'] = $row['role'];
                    }
                    
                    header("Location: ./?r=my-profile");
                    
                }
            }
        }
        elseif($route === 'singup') $controller->load_view('singup');
        else $controller->load_view('error404');
    }
}