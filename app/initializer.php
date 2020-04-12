<?php

//llamando a la carpeta config
require_once 'config/config.php';
//llamando a la URL helpers
require_once 'helpers/url_helper.php';
//llamando a todos los archivo de la carpeta libs
spl_autoload_register(function($files){   
    
    require_once 'libs/'.$files.'.php';
});


?>