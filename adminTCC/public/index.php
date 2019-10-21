<?php

require_once('../src/classes/Usuario.php');

$objConnection = new Conexao();
$objLogin = new Usuario();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estiloLogin.css">
</head>
<body>
    
    <div class="container-fluid">           
        <div class="box">
            <div class="row titulo">
                <div class="col-md-12">
                    <h1>Entrar</h1>
                </div>
            </div>
            
            <form action="#" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <label>Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                    <p id="msgUsuario"></p>
                    <div class="col-md-12">
                        <label>Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <p id="msgSenha"></p>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <p> 
                            <input type="checkbox" name="manterlogado" id="manterlogado" value="" /> 
                            <label for="manterlogado">Manter-me logado</label>
                        </p>
                    </div>
                    <div class="col-md-8">
                        <p class="link">
                        Ainda não tem conta?
                            <a href="cadastro.html">Cadastre-se</a>
                        </p>
                    </div>
                </div>
                
                <input type="submit" class="form-control" id="entrar" name="Entrar" value="Entrar"></button>
            </form>
            
            <?php
            
            if(isset($_POST["Entrar"]) && $_POST["Entrar"] == "Entrar")
            { 
                $logar = $objLogin->login($_POST["usuario"], $_POST['senha']);
            }
            
            ?>
        </div>
    </div>
   
    
</body>
    <script src="js/jquery-3.3.1.min.js"></script>
   
</html>