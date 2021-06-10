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
        
        if( isset($_GET['id_property']) ) $controller->load_view('property');
        
        elseif( $route === 'search-properties' ) $controller->load_view('search-properties');


        elseif( $_SESSION['active'] && $_SESSION['role'] === 'author'){

            $this->route = isset($_GET['r']) ? $_GET['r'] : 'search-properties' ;

            switch ($route){
  
                case 'my-properties':
                    if( !isset($_POST['r']) ) $controller->load_view('my-properties');
                    elseif( $_POST['r'] == 'property' )  $controller->load_view('property');
                    elseif( $_POST['r'] == 'property-add' )  $controller->load_view('property-add');
                    elseif( $_POST['r'] == 'property-edit' )  $controller->load_view('property-edit');
                    elseif( $_POST['r'] == 'property-delete' )  $controller->load_view('property-delete');
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
                    
                    header('Location: ./');
                    
                }
            }
        }
        elseif($route === 'singup') $controller->load_view('singup');
        else $controller->load_view('error404');
    }
}