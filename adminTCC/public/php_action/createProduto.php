<?php

require_once("../../src/includes/conexao.php");

$conn = new Conexao();
$conexao = $conn->conectar();

    $nomeProduto = mysqli_escape_string($conexao, $_POST['nomeProduto']);
    $qtdProduto = mysqli_escape_string($conexao, $_POST['quantidadeProduto']);
    $valorProduto = mysqli_escape_string($conexao, $_POST['valorProduto']);
    $tipoUnidadeProduto = mysqli_escape_string($conexao, $_POST['tipoUnidadeProduto']);

$sql = "INSERT INTO produtos VALUES (null, '{$nomeProduto}', '{$tipoUnidadeProduto}', '{$valorProduto}', '{$qtdProduto}');";

mysqli_query($conexao, $sql) or die ("Falha ao cadastrar o produto, por favor entre em contato com o suporte. ERRO:" . mysqli_error($conexao));

echo 1;
