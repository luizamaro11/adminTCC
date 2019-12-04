<?php

try{
    require_once("includes/conexao.php");
    
    $codeUser = $_POST['codeUser'];
    $codeCommand = $_POST['codeCommand'];
    $amount = $_POST['objAmount'];
    $productCode = $_POST['objProductCode'];
    
    $sql = "UPDATE pedidos SET qtd_pedido = $amount, id_produto= $productCode, id_usuario= $codeUser WHERE cd_pedidos = $codeCommand";
    
    mysqli_query($conn, $sql) or die ("Falha ao dar update na tabela, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conn));
    
    $sqlUpdateProduto = "UPDATE produtos SET qtd_produto = qtd_produto - $amount WHERE cd_produto = $productCode";
    
    mysqli_query($conn, $sqlUpdateProduto) or die ("Falha ao dar update na tabela, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conn));
       $sqlSelect = "SELECT nm_produto, qtd_pedido, vl_produto, tp_produto FROM produtos 
            INNER JOIN pedidos ON (id_produto = cd_produto)
            WHERE cd_pedidos = $codeCommand";
            
    $result = mysqli_query($conn, $sqlSelect);
    
   while ($dado = mysqli_fetch_assoc($result)) {

        $dados[] = $dado;
    }

    mysqli_close($conn);

    echo json_encode($dados, JSON_UNESCAPED_UNICODE);
    

} catch(Exception $Erro){
    echo $Erro;
}
