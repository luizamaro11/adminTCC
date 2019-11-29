<?php

date_default_timezone_set('America/Sao_Paulo');
require_once("includes/conexao.php");

$dataAtual = date("Y-m-d H:i:s");
$nomeCliente = $_POST['objNomeCliente'];

$sql = "INSERT INTO `pedidos` (`cd_pedidos`, `dt_pedido`, `nm_cliente`) VALUES (NULL, '".$dataAtual."', '$nomeCliente');";

$result = mysqli_query($conn, $sql) or die ("Falha ao Cadastrar uma comanda, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));
