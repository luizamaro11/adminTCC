<?php

require_once("../../src/includes/conexao.php");

$conn = new Conexao();
$conexao = $conn->conectar();

$nomeProduto = mysqli_escape_string($conexao, $_POST['objNomeProduto']);
$tipoUnidadeProduto = mysqli_escape_string($conexao, $_POST['objTipoUnidadeProduto']);
$valorProduto = mysqli_escape_string($conexao, $_POST['objValorProduto']);
$qtdProduto = mysqli_escape_string($conexao, $_POST['objQuantidadeProduto']);
    
$sql = "INSERT INTO produtos VALUES (null, '{$nomeProduto}', '{$tipoUnidadeProduto}', '{$valorProduto}', '{$qtdProduto}');";

mysqli_query($conexao, $sql) or die ("Falha ao cadastrar o produto, por favor entre em contato com o suporte. ERRO:" . mysqli_error($conexao));

echo 1;
