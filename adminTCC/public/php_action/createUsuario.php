<?php

require_once ("../../src/includes/conexao.php");

$conn = new Conexao();
$conexao = $conn->conectar();

if(isset($_POST['btnCadastrar'])){
    $nome = mysqli_escape_string($conexao, $_POST['nomeUsuario']);
    $telefone = mysqli_escape_string($conexao, $_POST['nrPessoa']);
    $email = mysqli_escape_string($conexao, $_POST['email']);
    $nvUsuario = mysqli_escape_string($conexao, $_POST['nivelUsuario']);
    $senha = mysqli_escape_string($conexao, $_POST['senhaUsuario']);
    $confirmSenha = mysqli_escape_string($conexao, $_POST['confirmSenhaUsuario']);
    
    $sql = "INSERT INTO usuario VALUES (null, '{$nome}', '{$nvUsuario}', '{$telefone}', '{$email}', '{$senha}');";
    
    mysqli_query($conexao, $sql) or die ("Falha ao Cadastrar um Usuario, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));
    
    header("Location: ../cadastroUsuario.php?sucesso");
    
    //if(mysqli_query($conexao, $sql) or die ("Falha ao Cadastrar um Usuario, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao))){
        //;
    //} else {
        //header("Location: ../cadastroUsuario.php?erro");
    //}
}

