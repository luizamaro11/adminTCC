<?php

require_once("../../src/includes/conexao.php");

$conn = new Conexao();
$conexao = $conn->conectar();

    $numeroMesa = mysqli_escape_string($conexao, $_POST['objNumeroMesa']);
   
    $sql = "INSERT INTO mesa VALUES (null, '{$numeroMesa}');";
    
    mysqli_query($conexao, $sql) or die ("Falha ao Cadastrar uma mesa, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));
    
    echo 1;
    //header("Location: ../mesas.php?sucesso");
   
