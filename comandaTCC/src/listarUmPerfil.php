<?php

try{
    require_once("includes/conexao.php");
    
    $codigo = $_POST['id'];
    
    $sql = "SELECT nm_pessoa, ds_email, n_celular FROM usuario WHERE cd_usuario = $codigo";
    
    $resultado = mysqli_query($conn, $sql);
    
	while($linha = mysqli_fetch_assoc($resultado)){
		$registro = array(
			'pessoa' => array(
				'usuario' => $linha['nm_pessoa'],
                'email' => $linha['ds_email'],
                'celular' => $linha['n_celular'],
			)
		);
	}
	
	echo json_encode($registro);
    
} catch(Exception $erro){
    echo "Erro";
}