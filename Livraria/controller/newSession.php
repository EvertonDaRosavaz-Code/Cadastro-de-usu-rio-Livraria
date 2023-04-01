<?php
require ('../model/usuario.php');
include ('../api/ReadeUser-GET.php');

$email = $_GET['email'];
$senha = $_GET['senha'];

$login = get($email, $senha);



//Se for true existe esse usuario no banco relacional MySQL
 if($login === true){
    if(!isset($_SESSION)){
        session_start();
        $_SESSION['logged'] = true;
        
        //Consulta no banco mysql
        

        $array =  getemail($email);
        $_SESSION['id'] = $array['_id'];
        $_SESSION['nome'] = $array['nome'];
        $_SESSION['email'] = $array['email'];
        $_SESSION['data'] = $array['data'];

        echo "<pre>";
        var_dump($array);

        echo $array['email'];
        
        header('location: ../view/read.php');
    }

  
}else{
    header('location: ../view/PagCreateUser.php');
}


?>