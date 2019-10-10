<?php

class Conexao{
    private $host;
    private $user;
    private $pass;
    private $db;
    
    public function __construct($host, $user, $pass, $db){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }
    
    public function conectar(){
        if(!($conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db))){
            echo "<script>alert('erro ao conectar com o banco')</script>";
            header ("location: index.html");
            exit();
        } else {
            echo "<script>alert('conectado com sucesso')</script>";
        }
    }
}
