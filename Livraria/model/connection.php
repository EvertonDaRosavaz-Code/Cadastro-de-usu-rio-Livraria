<?php


function getConnection(){
    $dns = 'mysql:host=localhost;dbname=livraria_santa';
    
    
    try{
        $conn = new PDO ($dns, 'root', '');
        return $conn;
    }

    catch(PDOException $e){
        echo "Error ao conectar".$e->getMessage();
    }


}



?>