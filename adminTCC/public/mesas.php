<?php
    require_once("../src/classes/Usuario.php");
    /*$objValidacao = new Usuario();
    $objValidacao->verificarLogin();*/
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
                        <li><a href="mesas.php">Mesas</a></li>
                        <li><a href="funcionario.html">Funcionário</a></li>
                        <li><a href="cadastroProdutos.php">Produtos</a></li>
                        <li><a href="relatorioVendas.html">Relatorio de vendas</a></li>
                        <li><a href="relatorioEstoque.html">Relatorios de estoque</a></li>
                        <li><a href="index.php">Sair</a></li>
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
    <script type="text/javascript">
        
        let numeroMesa = document.querySelector("#numeroMesa");
        let btnSalvar = document.querySelector("#salvar");
        
        btnSalvar.addEventListener('click', function() {
            
            $.ajax({
                url:'php_action/createMesa.php',
                type:'POST',
                data: {objNumeroMesa: numeroMesa.value},
                success: (data) => {
                
                    if(data == 1){
                   
                        retornaMesas();
                   
                    } else {
                    
                        alert('Falha ao Cadastrar o Número da Mesa');
                    
                    }
                
                }
            });
            
        });
        
        $(document).ready(function (){
           
           retornaMesas();
            
        });
        
        function retornaMesas(){
            
            $.ajax({
                url:'php_action/listarMesa.php',
                type:'POST',
                success: (data) => {
                        
                    let mesas = JSON.parse(data);
                    let linhaNumeroMesa;
                    let contadorMesa = 0;
                            
                    while (contadorMesa < mesas.length){
                                
                    linhaNumeroMesa += `
                        <tr>
                            <th scope="row" style="color: lightgreen; font-size: 20px;">Mesa ${mesas[contadorMesa].nrMesa}</th>
                            <td>
                                <button id="${mesas[contadorMesa].cdMesa}" onclick="deletaMesa(${mesas[contadorMesa].cdMesa})" class="btn-block btn-info">EXCLUIR</button>
                            </td>
                        </tr>`;
                                
                    contadorMesa++;
                                
                    }
                            
                    document.querySelector("#listarMesas").innerHTML = linhaNumeroMesa;
                          
                } 
            
            });
            
        }
        
        function deletaMesa(numeroMesa){
            
            $.ajax({
               url:'php_action/deleteMesa.php',
               type:'POST',
               data: {numeroMesa:numeroMesa},
               success: (data) => {
                
                if(data == 1){
                    
                    alert("Mesa excluída com sucesso");
                    retornaMesas();
                }else{
                    
                    alert("Falha ao excluir uma mesa");
                    
                }
                
               }
            });
            
        }
    </script>
</body>
</html>
