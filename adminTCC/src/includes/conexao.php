<?php

class Conexao{
    private $host = "localhost";
    private $user = "root";
    private $pass = "usbw";
    private $db   = "quiosque";
    
    /*public function __construct($host, $user, $pass, $db){
        $this->host = "localhost";
        $this->user = "admin";
        $this->pass = "123*";
        $this->db = "quiosque";
    }*/
    
    public function conectar(){
        
        try{
            
            if(!($conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db))){
                throw new Exception("Falha ao conectar com o banco de dados");
            }
            
        } catch(Exception $e){
            
            echo $e->getMessage();
            exit;
                
        }
        
        return $conn;
    }
}
?>