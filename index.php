<?php
    //iniciar a sessao
    session_start();

    //definir uma constante de controle para o index
    define('CONTROL', true);

    //Verifica se existe um usuario logado
    $usuario_logado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

    //Verifica qual e a rota da URL
    if (empty($usuario_logado)){
        $rota = 'login';
    }
    else{
        $rota = isset($_GET['rota']) ? $_GET['rota'] :'home';
    }

    //Se o usuario estar logado, mas a rota é login, vai redirecionar para home
    if(!empty($usuario_logado) && $rota == 'login'){
        $rota = 'home';
    }

    //Analisa as rotas
    $rotas = ['login' => 'login.php',
             'home' => 'home.php',
             'logout' => 'logout.php',
             'page1' => 'page1.php',
             'page2' => 'page2.php',
             'page3' => 'page3.php'
    ];

    if (!key_exists($rota, $rotas)){
        die('Acesso Negado!');
    }
    require_once $rotas[$rota];

?>