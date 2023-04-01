<!DOCTYPE html>
<html lang="pt-be">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/updateUser.css">

    <title>Atualizar-Dados</title>
</head>
<?php
    session_start();
    if(isset($_GET['submit'])){
        header('location:../api/updateUser-PUT.php?nome='.$_GET['nome']."&email=".$_GET['email']."&data=".$_GET['data']);
    }

?>
<body>
    <header>
        <div class="div-img">
            <img src="../img/leao.png" alt="marca leao">
            <h3>Livraria Santa Cruz </h3>
        </div>

        <div class="box-home-create">
            <div class="box-links">
                <a href="read.php">Voltar</a>
                <span><ion-icon class="i" name="person-outline"></ion-icon></span>
                <?php echo $_SESSION['nome']; ?>
            </div>

        </div>
    </header>

    <section>
        <form method="GET">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" require >
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Data</label>
                <input type="date" name="data" class="form-control" require >
            </div>
            
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Atualizar</button>                
            </div>
            
        </form>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script>
    <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"> </script>
</body>

</html>