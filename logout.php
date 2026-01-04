<?php
    defined('CONTROL') or die ('Acesso Negado!');

    //efetuar o logout
    session_destroy();

    //Volta para a pagina inicial
    header('location: index.php?rota=login');
?>