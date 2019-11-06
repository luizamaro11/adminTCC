<?php

    require_once("../../src/includes/conexao.php");

    $conn = new Conexao();
    $conexao = $conn->conectar();

    $nomeProduto = $_POST['objNomeProduto'];

    $sql = "SELECT * FROM produtos where nm_produto = {$objNomeProduto};";
    
    $query = mysqli_query($conexao, $sql) or die ("Falha ao listar apenas um produto, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));;
   
	while ($linha = mysqli_fetch_assoc($query)) {

        $produtos[] = $linha;
    
	}

    echo json_encode($produtos, JSON_UNESCAPED_UNICODE);