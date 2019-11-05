<?php

    require_once("../../src/includes/conexao.php");

    $conn = new Conexao();
    $conexao = $conn->conectar();
    
    $codigoMesa = $_POST['numeroMesa'];
    
    $sql = "DELETE FROM `usuario` WHERE `nm_nome` = '{$codigoMesa}';";
    
    $query = mysqli_query($conexao, $sql) or die ("Falha ao deletar uma mesa, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));
    
    echo 1;