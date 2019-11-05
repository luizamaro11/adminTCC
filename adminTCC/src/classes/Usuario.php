<?php

session_start();
require_once(dirname(__FILE__). "../../includes/conexao.php");

class Usuario{
    private $cdUsuario;
    private $nmUsuario;
    private $nivelUsuario;
    private $nrCelular;
    private $emailUsuario;
    private $senha;
    private $conn;
    
    
    public function __construct(){
        $this->conn = new Conexao();
    }
    //metodos normais
    /*Se vc quer acessar este metodo fora da classe, ele tem que ser public*/
    public function login($usuario, $senha){
        
        $link = $this->conn->conectar();
        
        try{

            $sql = "SELECT * FROM usuario WHERE nm_nome ='".$usuario."'";
            
            $queryUsuario = mysqli_query($link, $sql);
            
            if($queryUsuario === false){
                
                throw new Exception("Ocorreu um erro na query SQL. Detalhes: " . $link->error);
                
            }
     
            if(mysqli_num_rows($queryUsuario) == 1){
                
                $dadosUsuario = mysqli_fetch_array($queryUsuario);
                
                if($dadosUsuario["ds_senha"] == $senha){
                
                    $_SESSION["id_usuario"] = $dadosUsuario["ds_senha"];
                    $_SESSION["logado"] = "sim";
                    header("Location: ../public/mesas.php");
                    
                } else{
                    
                    $Erro = "Senha e/ou Email errado(s)!";
                    return $Erro;
                    
                }
                
            } else{
                
                $Erro = "Senha e/ou Email errado(s)!";
                return $Erro;
            }
            
        } catch(Exception $e){
        
            echo "<font color='white'>" . $e->getMessage() . "</font>";
            exit;
            
        }
            
    }
    
    public function getNmUsuario(){
      return $_SESSION["id_usuario"];
    }
    
    public function verificarLogin(){
        if(!isset($_SESSION["logado"])){
            header("Location: ../public/index.php");
            exit();
        }
    }
    
    public function cadastroUsuario($login, $email, $tipoUsuario, $telefone, $senha){
        $link = $this->conn->conectar();
        
        try{
            
            $sql = "INSERT INTO `usuario` (`cd_usuario`, `nm_nome`, `nv_usuario`, `n_celular`, `ds_email`, `ds_senha`) VALUES (NULL, '$login', '$tipoUsuario', '$telefone', '$email', '$senha');";
            
            $queryCadastroUsuario = mysqli_query($link, $sql);
            
            if($queryCadastroUsuario === false){
                
                throw new Exception("Ocorreu um erro na query SQL. Detalhes: " . $link->error);
                
            }
            
            /*if(mysqli_query($link, $sql)){
                header("Location: ../../public/cadastroUsuario.php?sucesso");
                exit;
            } else {
                header("Location: ../../public/cadastroUsuario.php?erro");
                exit;
            }*/
            
            if(mysqli_affected_rows($link) > 0) {
                return true;
            } else {
                return false;
            }
            
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function unico($login) {
        
        $link = $this->conn->conectar();
        
        $unic = "SELECT * FROM usuario WHERE nm_nome = '$login'";
        $exec = mysqli_query($link, $unic);
        
        if(mysqli_num_rows($exec) > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    private function alterarSenha(){
        
    }
    
    public function encerrarLogin(){
        session_destroy();
        header("Location: ../public/index.php");
        exit();
    }
    
    //metodos especiais
    
    
}