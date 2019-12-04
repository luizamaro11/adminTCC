<?php

require_once("includes/conexao.php");
 
$sql = "SELECT cd_produto, nm_produto FROM produtos";

$result = mysqli_query($conn, $sql) or die ("Falha ao Listar os produtos de estoque, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));;

// while ($row = mysqli_fetch_assoc($query)) {

//     $produtos[] = $row;
    
// }

    $record = array(
		'products' => array() 
	);
	
	$i = 0;
	
	while($row = mysqli_fetch_assoc($result)){
		$record['products'][$i] = array(
			'codigoProduto' => $row['cd_produto'],
			'nomeProduto' => $row['nm_produto'],
			'tipoProduto' => $row['tp_produto'],
			'valorProduto' => $row['vl_produto'],
			'quantidadeProduto' => $row['qtd_produto'],
		);
		$i++;
	}
	
	echo json_encode($record);

// echo json_encode($produtos, JSON_UNESCAPED_UNICODE);
