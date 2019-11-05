<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Produtos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container-fluid">           
        <div class="row linhaHeader">
            <div class="col-md-12 cabecalho">
                <img src="imagens/logo1.png" class="logo">
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
        
        <div class="row borda">
            <div class="col-md-12">
        
            </div>
        </div>
        
        <form>
            <div class="row titulo">
                <div class="col-md-12">
                    <h1>Cadastrar Produtos</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <label>Nome do Produto</label>
                    <input id="nomeProduto" type="text" class="form-control">
                </div>
                
                <div class="col-md-4">
                    <label>Quantidade</label>
                    <input id="quantidadeProduto" type="number" class="form-control">
                </div>
            </div>
            
            <div class="">
                <label>Preço do Produto</label>
                <input id="valorProduto" type="number" class="form-control">
            </div>
            
            <div class="">
                <label>Tipo de Produto</label>
                <select id="tipoUnidadeProduto" class="form-control">
                    <option>unidades</option>
                    <option>porção</option>
                    <option>litros</option>
                    <option>kg</option>
                </select>
            </div>
            
            <div class="botao">
                <button class="btn btn-block" id="salvarProduto">SALVAR</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        
        let nomeProduto = document.querySelector("#nomeProduto");
        let quantidadeProduto = document.querySelector("#quantidadeProduto");
        let valorProduto = document.querySelector("#valorProduto");
        let tipoUnidadeProduto = document.querySelector("#tipoUnidadeProduto");
        let btnSalvar = document.querySelector("#salvarProduto");
        
        btnSalvar.addEventListener('click', event => {
           
            $.ajax({
               url:'php_action/createProduto.php',
               type:'POST',
               data: {
                   nomeProduto: nomeProduto.value,
                   quantidadeProduto: quantidadeProduto.value,
                   valorProduto: valorProduto.value,
                   tipoUnidadeProduto: tipoUnidadeProduto.selectedOptions[0].value,
               },
               success: (data) => {
                
                if(data == 1){
                   
                    alert('Produto Cadastrado com Sucesso');
                   
                }else{
                    
                    alert('Falha ao Cadastrar o Número da Mesa');
                    
                }
                
               }
            });
            
        });
        
    </script>
</body>
</html>