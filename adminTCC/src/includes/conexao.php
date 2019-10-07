<?php

/*$host = "localhost";
$user = "admin";
$pass = "123*";
$db = "";

//conecta com o BD
$conn = new mysqli($host, $user, $pass, $db);

if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());*/


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
}

