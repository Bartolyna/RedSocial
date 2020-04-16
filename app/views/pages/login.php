<?php

include_once URL_APP. '/views/custom/header.php';
include_once URL_APP. '/views/custom/navbar.php';

?>
<div class="container-center center">
    <div class="container-content center">
    <div class="content-action center">
        <h5>Iniciar sesion</h5>
        <form action="">
            <input type="text" placeholder="Usuruario" required>
            <input type="password" placeholder="Contraseña" required>
            <button class="btn-purple btn-block">Ingresar</button>
        </form>
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