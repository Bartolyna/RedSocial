<?php

include_once URL_APP. '/views/custom/header.php';
include_once URL_APP. '/views/custom/navbar.php';

?>
<div class="container-center center">
    <div class="container-content center">
    <div class="content-action center">
        <h5>Iniciar sesion</h5>
        <form action="<?php echo URL_PROJECT?>/home/login" method="POST">
            <input type="text" name="usuario" placeholder="Usuruario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button class="btn-purple btn-block">Ingresar</button>
        </form>

        <?php if(isset($_SESSION['loginComplete'])) ://Alerta login satisfactorio ?>
            <div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">
                <?php echo $_SESSION['loginComplete']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php unset($_SESSION['loginComplete']); endif?>

        
        <?php if(isset($_SESSION['errorLogin'])) ://Alerta de error en el login del Usaurio ?>
            <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                <?php echo $_SESSION['errorLogin']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php unset($_SESSION['errorLogin']); endif?>

       
        <div class="contenido-link mt-2">
            <span class="mr-2">¿No tienes una cuneta?</span><a href="<?php echo URL_PROJECT?>/home/register">Registrarme</a>
        </div>
    </div>
    <div class="content-image center">
        <img src="<?php echo URL_PROJECT ?>/img/vector.png" alt="Hombre sentado en la computadora">
    </div>
</div>

</div>
</div>

<?php

include_once URL_APP. '/views/custom/footer.php';

?>