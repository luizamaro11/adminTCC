<?php

header('Access-Control-Allow-Origin: *');

try{
    require_once("includes/conexao.php");
    
    $usuario = $_POST['usuarioPHP'];
    $senha = $_POST['senhaPHP'];
    
    $sql = "SELECT cd_usuario ,nm_usuario, ds_senha FROM usuario WHERE nm_usuario ='".$usuario."' AND ds_senha = '".$senha."'";
    
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $dados = mysqli_fetch_assoc($result);
        
        $usuarios = array(
            'codigoUsuario' => $dados['cd_usuario'],
            'usuario' => $dados['nm_usuario'],
            'senha' => $dados['ds_senha'],
        );
           
        echo json_encode($usuarios);
    }
    
} catch(Exception $erro){
    echo $erro->getMessage();
}
