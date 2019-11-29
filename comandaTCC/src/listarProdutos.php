<?php

require_once("includes/conexao.php");
 
$sql = "SELECT nm_produto FROM produtos";

$query = mysqli_query($conn, $sql) or die ("Falha ao Listar os produtos de estoque, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));;

while ($row = mysqli_fetch_assoc($query)) {

    $produtos[] = $row;
    
}

echo json_encode($produtos, JSON_UNESCAPED_UNICODE);