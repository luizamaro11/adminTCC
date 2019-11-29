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
                            <h3>Produtos</h3>
                        </div>
                        <div class="col-md-3">
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
							<input id="nomeProduto" type="text" class="form-control" name="nomeProduto" placeholder="digite o nome do produto">
						</div>

						<div class="col-md-6">
							<label style="color: #000">Quantidade</label>
							<input id="quantidadeProduto" type="number" class="form-control" name="quantidadeProduto" placeholder="digite a quantidade de produto">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label style="color: #000">Preço do Produto</label>
							<input id="valorProduto" type="number" class="form-control" name="valorProduto" placeholder="digite o valor do produto">	
						</div>

						<div class="col-md-6">							
							<label style="color: #000">Tipo de Produto</label>
							<select id="tipoUnidadeProduto" class="form-control" name="tipoUnidadeProduto">
								<option>Porção</option>
								<option>Bebidas</option>
								<option>Pastel</option>
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

    <!--Modal do Botão alterar para listar as informações do produto selecionado-->
    <div id="alterarProduto" class="modal fade" role="dialog">
        <div class="modal-dialog">
          
            <!--Container da modal--> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alterar Produto</h4>
                </div>

                <div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<label for="" style="color: #000">Nome do produto</label>
							<input id="altNomeProduto" type="text" class="form-control" name="nomeProduto">
						</div>

						<div class="col-md-6">
							<label style="color: #000">Quantidade</label>
							<input id="altQuantidadeProduto" type="number" class="form-control" name="quantidadeProduto">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label style="color: #000">Preço do Produto</label>
							<input id="altValorProduto" type="number" class="form-control" name="valorProduto">	
						</div>

						<div class="col-md-6">							
							<label style="color: #000">Tipo de Unidade</label>
							<select id="altTipoUnidadeProduto" class="form-control" name="tipoUnidadeProduto">
								<option>unidades</option>
								<option>porção</option>
								<option>litros</option>
								<option>kg</option>
							</select>	
						</div>
					</div>
                </div>
                
                <div class="modal-footer">
                    <button id="alteraProduto" type="button" class="btn btn-default btn-success" data-dismiss="modal" onclick="alterarProdutos()" data-id="codigoProduto">SALVAR ALTERAÇÃO</button>
                    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/produtos.js"></script>
</html>
