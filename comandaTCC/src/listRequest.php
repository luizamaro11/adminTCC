<?php

try{
    
    require_once("includes/conexao.php");
    
    $productCode = $_POST['codeUser'];
    
    $sqlSelectPendente = "SELECT nm_produto, qtd_pedido, vl_produto, tp_produto FROM produtos 
            INNER JOIN pedidos ON (id_produto = cd_produto)
            WHERE id_usuario = $productCode;";
            
    $result = mysqli_query($conn, $sqlSelectPendente) or die ("Falha ao dar update na tabela, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conn));
    
   while ($dado = mysqli_fetch_assoc($result)) {

        $dados[] = $dado;
    }

    mysqli_close($conn);

    echo json_encode($dados, JSON_UNESCAPED_UNICODE);
    
    
} catch(Exception $Erro){
    getMessage;
}