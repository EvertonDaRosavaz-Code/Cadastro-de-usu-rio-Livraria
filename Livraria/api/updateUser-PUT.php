<?php
require('../model/connection.php');
// Posso pegar via SESSION
//Posso pegar via GET
$nome   = $_GET['nome'];
$email  = $_GET['email'];
$data   = $_GET['data'];

//O id optei pegar por SESSION
session_start();

$id = $_SESSION['id'];


function UpdateUser($id, $nome, $email, $data){
    
    $curl = curl_init();

    curl_setopt_array($curl, [
    CURLOPT_PORT => "4001",
    CURLOPT_URL => "http://localhost:4001/loginUpdate/$id",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "PUT",
    CURLOPT_POSTFIELDS => "{
        \n\t\"nome\":\"$nome\",
        \n\t\"email\":\"$email\",
        \n\t\"data\":\"$data\"\n
    }",
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } 
    
    else {
        sleep(3);
         /*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-*/
       try{
            $conn = getConnection();
            //Pegar id do usuario vie SELECT
            $sql_1 =  'SELECT * FROM usuario ';
            
            $stmt = $conn->prepare($sql_1);
         
            
           $stmt->execute();

           $array = $stmt->fetchAll();
           $idUser = $array[0]["id"];

            //Usar o id retornado aqui
            $sql_2 = 'UPDATE usuario SET nome = ?, email = ?, data_Nasc = ? WHERE id= ?';

            $stmt_2 = $conn->prepare($sql_2);
            $stmt_2->bindParam(1, $nome);
            $stmt_2->bindParam(2, $email);
            $stmt_2->bindParam(3, $data);
            $stmt_2->bindParam(4, $idUser);

            $stmt_2->execute();

            header('location: ../index.php');

       }catch(PDOException $e){
            echo "<script>alert('Erro ao salvar, tente novamente')</script>";
       }

    }

}


UpdateUser($id, $nome, $email, $data);



