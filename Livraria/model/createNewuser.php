<?php 
require ('connection.php');
include('../api/createNewUser-POST.php');
include('../api/ReadeUser-GET.php');

$nome = $_GET['nome'];
$email = $_GET['email'];
$senha = $_GET['senha'];
$data = $_GET['data'];

//Envia os dados no banco mongooDb 
createUserAPI($nome, $email, $senha ,$data);


//Enviar ao banco Mysql
$conn = getConnection();   
$sql = 'INSERT INTO usuario (nome, email, senha, data_Nasc) VALUES (?,?,?,?)';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_GET['nome']);
$stmt->bindParam(2, $_GET['email']);
$stmt->bindParam(3, $_GET['senha']);
$stmt->bindParam(4, $_GET['data']);
$stmt->execute();


session_start();
//Esperar 6s antes de fazer a busca no banco
sleep(6);

$res = getemail($email);

echo "<pre>";
var_dump( $res);


$_SESSION['id'] = $res['_id'];
$_SESSION['nome'] = $res['nome'];
$_SESSION['email'] = $res['email'];
$_SESSION['data'] = $res['data'];

echo "<pre>";
var_dump($_SESSION);



header('location:../controller/newSession.php?email='.$_GET['email'].'&senha='.$_GET['senha']);
   






