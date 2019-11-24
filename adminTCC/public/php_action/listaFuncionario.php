<?php

    require_once("../../src/includes/conexao.php");

    $conn = new Conexao();
    $conexao = $conn->conectar();
    
    $sql = "SELECT nm_usuario, n_celular, ds_email FROM usuario";
    
    $query = mysqli_query($conexao, $sql) or die ("Falha ao listar os funcionarios, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));;
   
	while ($linha = mysqli_fetch_assoc($query)) {

        $funcionario[] = $linha;
    
	}

    echo json_encode($funcionario, JSON_UNESCAPED_UNICODE);