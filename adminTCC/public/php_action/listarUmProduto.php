<?php

    require_once("../../src/includes/conexao.php");

    $conn = new Conexao();
    $conexao = $conn->conectar();

    $codigoProduto = $_POST['codigoProduto'];

    $sql = "SELECT * FROM produtos where cd_produto = {$codigoProduto};";
    
    $query = mysqli_query($conexao, $sql) or die ("Falha ao listar apenas um produto, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));;
   
	while($linha = mysqli_fetch_assoc($resultado)){
        $registro = array(
            'produtos' => array(
                'codigoProduto' =>$linha['cd_produto'],
                'nomeProduto' => $linha['nm_produto'],
                'tipoUnidadeProduto' => $linha['tp_produto'],
                'valorProduto' => $linha['vl_produto'],
                'quantidadeProduto' => $linha['qtd_produto'],
            )
        );
    }

    echo json_encode($registro, JSON_UNESCAPED_UNICODE);
