<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/60/60679.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>
<style>
    a{
        text-decoration: none;
        padding: 6px;
    }
</style>


<?php

    if(isset($_POST['submit'])){
        header('location: controller/newSession.php?email='.$_POST['email'].'&senha='.$_POST['senha']);
    }
 ?>
<body>
    <div class="main-login">
        <div class="left-login">
            <h2><?php if(isset($_GET['error'])) echo "Verifique os dados inseridos!";   ?>  </h2>
            <h1>Faça seu Login</h1>
            <img src="img/person-phone-login.svg" alt="person-phone-Login" class="left-login-image">
        </div>
        
        <div class="right-login">
            <form method="post" class="card-login">
                <img src="img/leao.png" alt="marca leao" class="logo-leao">
                <h1>Login</h1>
  
                <div class="textfield">
                    <label for="usuario">Email</label>
                    <input type="email" name="email" placeholder="Seu melhor email" aria-describedby="emailHelp" required>
                </div>

                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha" aria-describedby="passwordHelp" required >
                </div>

                <button class="Btn-Login" name="submit">Entrar</button>
                <a href="view/PagCreateUser.php" style="color: #fff;" > Login in </a>
            </form>
        </div>

    </div>
</body>
</html>