<?php

session_start();
require_once(dirname(__FILE__).'../../includes/conexao.php');

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

            $sql = "select * from usuario where usuario.nm_nome ='".$usuario."'";
            
            $queryUsuario = mysqli_query($link, $sql);
            
            if($queryUsuario === false){
                
                throw new Exception("Ocorreu um erro na query SQL. Detalhes: " . $link->error);
                
            }
     
            if(mysqli_num_rows($queryUsuario) == 1){
                
                $dadosUsuario = mysqli_fetch_array($queryUsuario);
                
                if($dadosUsuario["ds_senha"] == $senha){
                    
                    $_SESSION["id_usuario"] = $dadosUsuario["ds_senha"];
                    $_SESSION["logado"] = "sim";
                    header("Location: ../public/mesas.html");
                    
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
    
    private function verificarLogin(){
        if(!$_SESSION['login']){
		    header('location: ../public/index.php');
		    exit();
	    }
    }
    
    public function cadastroUsuario(){
        
    }
    
    private function alterarSenha(){
        
    }
    
    public function encerrarLogin(){
        session_destroy();
        header("Location: ../public/index.php ");
        exit();
    }
    
    //metodos especiais
    
    
}