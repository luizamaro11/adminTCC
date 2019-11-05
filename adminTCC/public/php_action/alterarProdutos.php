<?php


    require_once("../../src/includes/conexao.php");

    $conexao = $conn->conectar();
    
    $codigo = $_POST['codigoProduto'];
    $nomeProduto = $_POST['nomeProduto'];
    $quantidadeProduto = $_POST['quantidadeProduto'];
    $valorProduto = $_POST['valorProduto'];
    $tpUnidadeProduto = $_POST['tipoUnidadeProduto'];
    
    $sql = "UPDATE produtos SET nm_produtos = '{$nomeProduto}', tp_produto = '{$tpUnidadeProduto}', vl_produto = '{$valorProduto}', qtd_produto = '{$quantidadeProduto}' WHERE cd_produto = '{$codigoProduto}';";
    
    $query = mysqli_query($conexao, $sql) or die ("Falha ao editar o produto, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));
    
    echo 1;