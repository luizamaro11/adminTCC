<?php


    require_once("../../src/includes/conexao.php");

    $conexao = $conn->conectar();
    
    $codigo = $_POST['codigoProduto'];
    $nomeProduto = $_POST['nomeProduto'];
    $quantidadeProduto = $_POST['quantidadeProduto'];
    $valorProduto = $_POST['valorProduto'];
    $tpUnidadeProduto = $_POST['tipoUnidadeProduto'];
    
    $sql = "UPDATE produtos SET nm_produtos = '{$nomeProduto}', tp_produto = '{$quantidadeProduto}', vl_produto = '{$valorProduto}', qt_produto = '{$tpUnidadeProduto}' WHERE cd_produto = '{$codigoProduto}';";
    
    /*celular desligou de novo essa merda, ja ja te ligo*/
    
    $query = mysqli_query($conexao, $sql) or die ("Falha ao editar o produto, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));
    
    echo 1;