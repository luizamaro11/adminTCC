<?php

    require_once("../../src/includes/conexao.php");

    $conn = new Conexao();
    $conexao = $conn->conectar();
    
    $sql = "SELECT * FROM produtos";
    
    $query = mysqli_query($conexao, $sql) or die ("Falha ao listar os mesa, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));;
   
	while ($linha = mysqli_fetch_assoc($query)) {

        $produtos[] = $linha;
    
	}

    echo json_encode($produtos, JSON_UNESCAPED_UNICODE); 
