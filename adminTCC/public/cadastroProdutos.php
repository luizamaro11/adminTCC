<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Produtos</title>
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
		
		<div class="row formTable">
			<div class="row linhaTable">
				<div class="col-md-12">
					<h3>Produtos</h3>
					<button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#adicionarProduto">ADICIONAR PRODUTO</button>
				</div>
			</div>
			
			<div class="row table-responsive">
				<div class="col-md-12 funcTable">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Nome</th>
								<th scope="col">Quantidade</th>
								<th scope="col">tipo</th>
								<th scope="col">Valor</th>
								<th scope="col">Ação</th>
							</tr>
						</thead>
						<tbody id="listaProdutos">
							
						</tbody>
					</table>
				</div>
			</div>            
		</div>
	</div>

	<!--Modal do Botão Adicionar-->
    <div id="adicionarProduto" class="modal fade" role="dialog">
        <div class="modal-dialog">
          
            <!--Container da modal--> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adicionar Produto</h4>
                </div>

                <div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<label for="" style="color: #000">Nome do produto</label>
							<input id="nomeProduto" type="text" class="form-control" name="nomeProduto" placeholder="digite o nome da mesa">
						</div>

						<div class="col-md-6">
							<label style="color: #000">Quantidade</label>
							<input id="quantidadeProduto" type="number" class="form-control" name="quantidadeProduto">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label style="color: #000">Preço do Produto</label>
							<input id="valorProduto" type="number" class="form-control" name="valorProduto">	
						</div>

						<div class="col-md-6">							
							<label style="color: #000">Tipo de Produto</label>
							<select id="tipoUnidadeProduto" class="form-control" name="tipoUnidadeProduto">
								<option>unidades</option>
								<option>porção</option>
								<option>litros</option>
								<option>kg</option>
							</select>	
						</div>
					</div>
                </div>
                
                <div class="modal-footer">
                    <button id="salvarProduto" type="button" class="btn btn-default btn-success" data-dismiss="modal">SALVAR</button>
                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
                objNomeProduto: nomeProduto.value,
                objQuantidadeProduto: quantidadeProduto.value,
                objValorProduto: valorProduto.value,
                objTipoUnidadeProduto: tipoUnidadeProduto.selectedOptions[0].value
            },

            success: (data) => {
                
                if(data == 1){
                   
                    alert('Produto Cadastrado com Sucesso');
                    retornaProdutos();
                   
                } else {
                    
                    alert('Falha ao Cadastrar o produto');
                    
                }
                
            }
        });
            
    });
       
    $(document).ready(function (){
           
        retornaProdutos();
            
    });
        
    function retornaProdutos(){
            
        $.ajax({
            url:'php_action/listarProdutos.php',
            type:'POST',
            success: (data) => {
                        
                let produtos = JSON.parse(data);
                let linhaProduto;
                let contadorProduto = 0;
                            
                while (contadorProduto < produtos.length){
                                
                    linhaProduto += `
                        <tr>
						    <th scope="row">${produtos[contadorProduto].nm_produto}</th>
							<th>${(produtos[contadorProduto].qtd_produto == null) ? 0 : produtos[contadorProduto].qtd_produto}</th>
							<th>${produtos[contadorProduto].tp_produto}</th>
							<th>${produtos[contadorProduto].vl_produto}</th>
							<td>
								<button class="btn-block btn-warning" onclick="alterarProdutos">Alterar</button>
							</td>
						</tr>`;
                                
                    contadorProduto++;
                                
                }
                            
                document.querySelector("#listaProdutos").innerHTML = linhaProduto;
                          
            } 
            
        });       
    }
        
    function alterarProdutos(codigoProduto){
                
        $.ajax({
            url:'php_action/alterarProdutos.php',
            type:'POST',
            data: {codigoProduto: codigoProduto},
            success: (data) => {
                
                if(data == 1){
                    
                    alert("produto alterado com sucesso");
                    retornaProdutos();
                    
                } else {
                    
                    alert("Falha ao alterar as informações do produto");
                    
                }
                
            }
        });
 
        $.ajax({
            url:'php_action/alterarProdutos.php',
            type:'POST',
            data: {codigoProduto: codigoProduto},
            success: (data) => {
                
                if(data == 1){
                    
                    alert("produto alterado com sucesso");
                    retornaProdutos();
                    
                } else {
                    
                    alert("Falha ao alterar as informações do produto");
                    
                }
                
            }
        });
            
    }
	
</script>
</html>
