<?php

class Home extends Controller{
    
    public function __construct(){

       $this->usuario = $this ->model('usuario'); 

    }
    public function index(){

      
   
    }
    public function login(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }else{
            $this->view('pages/login');
        }
    }
    public function register(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){//Validacion del registro de usuarios
            $datosRegistro = [
                'privilegio' => '2',
                'email' => trim($_POST['email']),
                'usuario' => trim($_POST['usuario']),
                'contrasena' => password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT)
            ];
        
        if ($this->usuario->verificarUsuario($datosRegistro)) {     
            if ($this->usuario->register($datosRegistro)) {
               $_SESSION['usaurio'] = $datosRegistro['usuario'];
               redirection('/home/login');
            }else{
                $_SESSION['loginComplete'] = 'El usuario fue resgistrado satisfactoriamente!';
                $this->view('pages/login');   
            }
        }else{
            $_SESSION['usuarioError'] = 'El usuario no esta disponible, ya se encuentra registrado.';
            $this->view('pages/register');
        }
        }else{

            $this->view('pages/register');
        }
    }
}

?>