<?php
    defined('CONTROL') or die ('Acesso Negado!');
?>
<hr>
<span>Usuario: <strong><?php echo $_SESSION['usuario']?> </strong></span>           <!--Informação sobre o usuario-->
<span>
    <a href="index.php?rota=logout">Sair</a>
</span>
<hr>
<nav>
    <a href="?rota=home">Home</a>
    <a href="?rota=page1">Serviços</a>
    <a href="?rota=page2">Sobre nós</a>
    <a href="?rota=page3">Contatos</a>
    <a href="index.php?rota=logout">Sair</a>
</nav>
