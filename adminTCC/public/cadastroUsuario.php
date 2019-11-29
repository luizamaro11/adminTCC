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
        <div class="col-md-5 boxLogin">
            <form action="php_action/createUsuario.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Cadastrar</h1>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <label>Nome</label>
                        <input type="text" name="nomePessoa" class="form-control">
                    </div>
                    
                    <div class="col-md-12">
                        <label>Telefone</label>
                        <input type="number" name="nrPessoa" class="form-control">
                    </div>
                    
                    <div class="col-md-6">
                        <label>Usuario</label>
                        <input type="text" name="nomeUsuario" class="form-control">
                    </div>
                    
                    <!-- aqui vem um select para a opção de administrador ou funcionario -->
                    
                    <div class="col-md-6">
                        <label>Nivel de Acesso</label>
                        <select class="form-control" name="tipoUsuario">
                          <option selected="selected" value="administrador">Administrador</option>
                          <option value="funcionario">Funcionario</option>
                        </select>
                    </div>
                    
                    <div class="col-md-12">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    
                    <div class="col-md-12">
                        <label>Senha</label>
                        <input type="password" name="senhaUsuario" class="form-control">
                    </div>
                    
                    <div class="col-md-12">
                        <label>Confirmar Senha</label>
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
        </div>
        <div class="col-md-7 fundo"></div>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>