<?php
    header('Access-Control-Allow-Origin: *');
    require_once("../../src/includes/conexao.php");

    $conn = new Conexao();
    $conexao = $conn->conectar();
    
    $sql = "SELECT * FROM mesa";
    
    $query = mysqli_query($conexao, $sql) or die ("Falha ao Listar as mesa, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));;
   
	while ($linha = mysqli_fetch_assoc($query)) {

        $mesas[] = $linha;
    
	}

    echo json_encode($mesas, JSON_UNESCAPED_UNICODE); 
    