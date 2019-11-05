<?php

    //validando se exite alguma informação nas inputs de usuario e senha no cadastro
    if(!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))){
        header("Location: ../public/cadastroUsuario.php"); 
        exit;
    }

?>