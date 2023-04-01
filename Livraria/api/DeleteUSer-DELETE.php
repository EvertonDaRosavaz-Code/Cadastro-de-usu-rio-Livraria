<?php
session_start();
require('../model/connection.php');

$idUsuario = $_SESSION["id"];

echo $idUsuario;


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_PORT => "4001",
  CURLOPT_URL => "http://localhost:4001/loginDelete/$idUsuario",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "DELETE",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
  $conn = getConnection();

  //Pegar id do usuario vie SELECT
  $sql_1 =  'SELECT * FROM usuario ';
          
  $stmt = $conn->prepare($sql_1);
  
  $stmt->execute();
  $array = $stmt->fetchAll();
  $idUser = $array[0]["id"];
    

  $sql = 'DELETE FROM usuario WHERE id = ?';
  $stmt = $conn->prepare($sql);

  $stmt->bindParam(1, $idUser);
  $stmt->execute();

  header('location: ../index.php');
}






