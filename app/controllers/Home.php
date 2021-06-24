<?php

class Home extends Controller{
    
    public function __construct(){

       $this->usuario = $this ->model('usuario'); 

    }


    public function index(){

      if (isset($_SESSION['logueado'])) {
        $this->view('pages/home');
      }else{
          redirection('/home/login');
      }
   
    }


    public function login(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){//Validacion de los campos de loguep
            $datosLogin = [
                'usuario' => trim($_POST['usuario']),
                'contrasena' => trim($_POST['contrasena'])
            ];  
            
        $datosUsuario = $this->usuario->getUsuario($datosLogin['contrasena']);

        if($this->usuario->verificarContrasena($datosUsuario, $datosLogin['contrasena'])){
            $_SESSION['logueado'] = $datosUsuario->idPrivilegio;
            redirection('/home');

        }else{
            $_SESSION['errorLogin'] = 'EL usuario o la contraseña son invalidas ';
            redirection('/home');   
        }
        }else{
            if (isset($_SESSION['logueado'])) {
                redirection('/home');
            }else{
                $this->view('pages/login');
            }
        }
    }


    public function register(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){//Validacion de los campos de registro
            $datosRegistro = [
                'privilegio' => '2',
                'email' => trim($_POST['email']),
                'usuario' => trim($_POST['usuario']),
                'contrasena' => password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT)
            ];
        
        if ($this->usuario->verificarUsuario($datosRegistro)) {     
            if ($this->usuario->register($datosRegistro)) {
               $_SESSION['loginComplete'] = 'El usuario fue resgistrado satisfactoriamente!';
                redirection('/home/login');
            }else{

            }
        }else{
            $_SESSION['usuarioError'] = 'El usuario no esta disponible, ya se encuentra registrado.';
            $this->view('pages/register');
        }
        }else{
            if (isset($_SESSION['logueado'])) {
                redirection('/home');
            }else{
                $this->view('pages/register');
            }
        }
    }


    public function logout(){

        session_start();

        $_SESSION[] = [];

        session_destroy();

        redirection('/home');
    }
}

?>