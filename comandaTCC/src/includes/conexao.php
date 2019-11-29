<?php

try{
    $conn = mysqli_connect("localhost", "id11557205_codetech", "CodeTech#123", "id11557205_quiosque");

    if(!$conn){
        echo "Erro ao fazer a conexao" . mysqli_connect_error();
    }

} catch(Exception $erro){
    echo $erro->getMessage();
}
    


