<?php

require_once ("../../src/includes/conexao.php");

$conn = new Conexao();
$conexao = $conn->conectar();

if(isset($_POST['btnCadastrar'])){
    $nomePessoa = mysqli_escape_string($conexao, $_POST['nomePessoa']);
    $nomeUsuario = mysqli_escape_string($conexao, $_POST['nomeUsuario']);
    $telefone = mysqli_escape_string($conexao, $_POST['nrPessoa']);
    $email = mysqli_escape_string($conexao, $_POST['email']);
    $nvAcessoUsuario = mysqli_escape_string($conexao, $_POST['tipoUsuario']);
    $senha = mysqli_escape_string($conexao, $_POST['senhaUsuario']);
    $confirmSenha = mysqli_escape_string($conexao, $_POST['confirmSenhaUsuario']);
    
    $sql = "INSERT INTO usuario VALUES (null, '{$nomePessoa}' ,'{$nomeUsuario}', '{$nvAcessoUsuario}', '{$telefone}', '{$email}', '{$senha}');";
    
    if($senha === $confirmSenha){
        mysqli_query($conexao, $sql) or die ("Falha ao Cadastrar um Usuario, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao));
        header("Location: ../cadastroUsuario.php?sucesso");
        echo "<script>alert('Usuario cadastrado com sucesso');</script>";
        exit;
    } else {
        echo "<script>alert('Os campos de senha e confirmar senha não são idênticas');
                      window.location.href = '../cadastroUsuario.php';        
              </script>";
        /*header("Location: ../cadastroUsuario.php?erro");*/
        exit;
    }
    
    //if(mysqli_query($conexao, $sql) or die ("Falha ao Cadastrar um Usuario, por favor entrar em contato com o suporte. ERRO: " . mysqli_error($conexao))){
        //;
    //} else {
        //header("Location: ../cadastroUsuario.php?erro");
    //}
}

