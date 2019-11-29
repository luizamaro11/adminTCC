<?php
    require_once("../src/classes/Usuario.php");
    $objValidacao = new Usuario();
    $objValidacao->verificarLogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Mesas</title>
</head>
<body>
    <div class="container-fluid">           
        <div class="col-md-2 menu">
            <div class="row linhaHeader">
                <div class="col-md-12 cabecalho">
                    <ul>
                        <li><a href="mesas.php"><img src="imagens/mesa.png" alt="">Mesas</a></li>
                        <li><a href="funcionario.html"><img src="imagens/funcionario.png" alt="">Funcionário</a></li>
                        <li><a href="cadastroProdutos.php"><img src="imagens/produto.png" alt="">Produtos</a></li>
                        <li><a href="index.php"><img src="imagens/sair.png" alt="">Sair</a></li>
                    </ul>                  
                </div>
            </div>
        </div>
        <div class="col-md-10 tabelaDireita">
            <div class="row formTable">
                <div class="row linhaTable">
                    <div class="col-md-9">
                        <h3>Mesas</h3>
                    </div>
                    <div class="col-md-3">
                            <button class="btn btn-block btn-info" data-toggle="modal" data-target="#mesaNova" id="funcionarioNovo">ADICIONAR MESA</button>
                    </div>
                </div>
                
                <div class="row table-responsive">
                    <div class="col-md-12 funcTable">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Numero da mesa</th>
                                <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody id="listarMesas">
                                
                            </tbody>
                        </table>
                    </div>
                </div>            
            </div>
        </div>
    </div>
    
    <!--Modal do Botão Adicionar-->
    <div id="mesaNova" class="modal fade" role="dialog">
        <div class="modal-dialog">
          
            <!--Container da modal--> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adicionando Mesa</h4>
                </div>
                <div class="modal-body">
                    <label for="" style="color: #000">Número da mesa</label>
                    <input id="numeroMesa" type="text" class="form-control" name="numeroMesa" placeholder="digite o número da mesa">
                </div>
                
                <div class="modal-footer">
                    <button id="salvar" type="button" class="btn btn-default btn-success" data-dismiss="modal">SALVAR</button>
                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
            </div>
        </div>
    </div>     

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mesas.js"></script>
</body>
</html>
