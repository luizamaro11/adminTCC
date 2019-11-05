<?php
    
    /*if(isset($_POST["cadastrar"]))
    { 
        require_once("../src/includes/validacao.php");
        require_once("../src/classes/Usuario.php");
        
        $objConn = new Conexao();
        $objCadastroUsuario = new Usuario();
        
        $login = mysqli_escape_string($objConn->conectar(), $_POST['nomeUsuario']);
        $telefone = mysqli_escape_string($objConn->conectar(), $_POST['nrPessoa']); 
        $email = mysqli_escape_string($objConn->conectar(), $_POST['email']); 
        $tipoUsuario = mysqli_escape_string($objConn->conectar(), $_POST['tipoUsuario']); 
        $senha = mysqli_escape_string($objConn->conectar(), $_POST['senhaUsuario']);
        $confirmSenha = mysqli_escape_string($objConn->conectar(), $_POST['confirmSenhaUsuario']);
        
        // confere se as senhas são iguais
        if($senha === $confirmSenha) {
            
            $consulta = $objCadastroUsuario->unico($login);
            // caso o login escolhido já exista no banco retorna erro
            
            if($consulta == false) {
                header('Location: cadastroUsuario.php?repetido=senha');
                // caso não haja login parecido, inclui métoro de inserção de dados no banco de dados
                
            } else {
                $insere = $objCadastroUsuario->cadastrar($login, $email, $tipoUsuario, $telefone, $senha);
                // caso o usuario seja cadastrado, exibir mensagem de sucesso
                if($insere == true) {
                    header('Location: cadastroUsuario.php?success=cadastrado');
                }
            }
            
        } else {
            header('location:cadastro.php?erro=senha');
        }
    }*/
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estiloCadastro.css">
</head>
<body>
    <div class="container-fluid">           
        <form action="php_action/createUsuario.php" method="post">
            <div class="row titulo">
                <div class="col-md-12">
                    <h1>Cadastrar</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <label>Nome</label>
                    <input type="text" name="nomeUsuario" class="form-control">
                </div>
                
                <div class="col-md-12">
                    <label>Telefone</label>
                    <input type="number" name="nrPessoa" class="form-control">
                </div>
                
                <div class="col-md-12">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                
                <!-- aqui vem um select para a opção de administrador ou funcionario -->
                
                <!--<select name="tipoUsuario">
                    <option value="administrador">Administrador</option>
                    <option value="funcionario">Funcionário</option>
                </select>-->
                
                <div class="col-md-12">
                    <label>Nivel de Acesso</label>
                    <input type="text" name="nivelUsuario" class="form-control">
                </div>
                
                <div class="col-md-12">
                    <label>Senha</label>
                    <input type="password" name="senhaUsuario" class="form-control">
                </div>
                
                <div class="col-md-12">
                    <label>Conf.Senha</label>
                    <input type="password" name="confirmSenhaUsuario" class="form-control">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <p class="link">  
                        Já tem conta?
                        <a href="index.php"> Ir para Login </a>
                    </p>
                </div>
            </div>
            
            <div class="botao">
                <button type="submit" class="form-control" id="cadastrar" name="btnCadastrar">CADASTRAR</button>
            </div>
        </form>
        
        <?php
        
        /*if(isset($_POST["cadastrar"]))
        { 
            $cadastrar = $objCadastroUsuario->cadastroUsuario($_POST["nome"], 
                                                              $_POST['email'], 
                                                              $_POST['tipoUsuario'],
                                                              $_POST['telefone'],
                                                              $_POST['senha']); 
        }*/
        
        ?>
        
        <?php
            /*// mensagem de erro caso as senhas não sejam iguais
            if(isset($_GET['erro'])) {
                echo '<div class="alert alert-danger">As senhas devem ser iguais!</div>';
            }
            // mensagem de erro caso o login escolhido já exista no banco de dados
            if(isset($_GET['repetido'])) {
                echo '<div class="alert alert-danger">Este Login já foi escolhido por outra pessoa!</div>';
            }
            // mensagem de sucesso caso o usuario seja cadastrado corretamente
            if(isset($_GET['success'])) {
                echo '<div class="alert alert-success">Usuario cadastrado!</div>';
            }*/
        ?>
        
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>