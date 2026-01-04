<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php
        defined('CONTROL') or die ('Acesso Negado');

        //Verifica se o formulario foi submetido
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //verifica se o usuario e senha foi submetidos
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
            $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
            $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
            $erro = null;

            if (empty($usuario) || empty($senha)){
                $erro = "Usuario e Senha são Obrigatórios!";
            }

            //Verifica se o usuario e senha sao validos
            if (empty($erro)){
                $usuarios = require_once __DIR__ . '/usuarios.php';                     //DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'usuarios.php';

                foreach($usuarios as $user){
                    if ($user['usuario'] == $usuario && password_verify($senha, $user['senha'])){

                        //efetua o login
                        $_SESSION['usuario'] = $usuario;

                        //Voltar a pagina inicial
                        header('location: index.php?rota=home');
                    }
                }
                //login invalido
                $erro = "Usuario ou Senha Invalidos!";
            }
        }
    ?>
</head>
<body>
    <div>
        <form action="index.php?rota=login" method="post">
            <h3>Login</h3>
            <div>
                <label for="usuario">Usuario</label>
                <input type="email" name="usuario" id="usuario"/>
            </div>
            <div>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha"/>
            </div>
            <button type="submit">Entrar</button>
        </form>

        <?php if(!empty($erro)) : ?>
            <p style="color:red"><?php echo $erro; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
