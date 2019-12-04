<?php 

require_once("includes/conexao.php");
    
$sql = "SELECT nm_cliente, cd_pedidos FROM pedidos;";
    
$query = mysqli_query($conn, $sql) or die ("Falha ao Listar os clientes das comandas, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));;
   
while ($linha = mysqli_fetch_assoc($query)) {

    $cliente[] = $linha;
    
}

echo json_encode($cliente, JSON_UNESCAPED_UNICODE);
