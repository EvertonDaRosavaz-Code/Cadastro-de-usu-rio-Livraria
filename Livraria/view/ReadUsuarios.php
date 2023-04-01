<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/readUser.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <title>Read-Usuarios</title>
</head>
<?php
    session_start();
    include('../controller/getSession.php');
?>
<body>
    <header>
        <div class="div-img">
            <img src="../img/leao.png" alt="marca leao">
            <h3>Livraria Santa Cruz </h3>
        </div>
        

        <div class="box-home-create">
            <div class="box-links">
                <a href="read.php">Home</a>
                <a href="create.php">Create</a>
                
                <span><ion-icon class="i" name="person-outline"></ion-icon></span>
                <span class="nameUser">Olá, <?php echo $_SESSION['nome'];?> </span>
            </div>

        </div>
    </header>

    <section>
        <h2>Ola usuário</h2>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Data</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
                
        
            <tbody>
                <tr>
                    <td>
                    <?php  ?>
                        <!--Id-->
                        <?php echo $_SESSION['id']; ?>
                    </td>
                    <td>    
                    <?php echo $_SESSION['nome']; ?>
                        <!--Nome-->
                    </td>
    
                    <td>
                    <?php echo $_SESSION['email']; ?>
                        <!--Email-->
                    </td>
                    <td>
                    <?php echo $_SESSION['data']; ?>
                        <!--Data-->
                    </td>
                
                    <td>
                         <a href="updateUser.php">✏️</a>
                        <a style="cursor: pointer;" id="lixeira">🗑️</a>
                    </td>
                </tr>
           
            </tbody>

        </table>
    </section>
    <script>
        document.getElementById('lixeira').addEventListener('click', ()=>{
           let teste =  confirm('Tem certeza que deseja apagar sua conta ?');
           if(teste == true){
                location.href = "../api/DeleteUser-DELETE.php";
           }
        })
    </script>
    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script> 
    <script nomodule src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"> </script>
</body>
</html>