<?php
class SessionController extends UsersModel{

    private $session;

    public function __construct(){
        
        $this->session = new UsersModel();

    }

    public function login($email, $pass){

        return $this->session->validate_user($email, $pass);

    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: ./');

    }

}
?>