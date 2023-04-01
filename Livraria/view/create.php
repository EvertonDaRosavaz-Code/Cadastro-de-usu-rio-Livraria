<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create.css">
    <link rel="shortcut icon" href="../img/leao.png" type="image/x-icon">
    <title>Criação-Livraria</title>
</head>

<?php 
    include('../model/livro.php');
    include('../controller/getSession.php');
    if(isset($_POST['adicionar'])){
        echo create();
    }
?>
<body>
    <header>
        <div class="div-img">
            <img src="../img/leao.png" alt="marca leao">
        </div>
        <h3>Livraria Santa Cruz</h3>
        <div class="box-home-create">
            
            <a href="../view/read.php">Home</a>
            <a href="../view/create.php">Create</a>
        </div>
    </header>
    <section>
        <form  method="post">
           <div class="box-nome box">
                <input onblur="Campo(0)" type="text" id="Idnome" name="nome" required>
                <label for="Idnome">Nome</label>
           </div>

           <div class="box-preco box">
                <input onblur="Campo(1)" type="text" id="Idpreco" name="preco" required>
                <label for="Idpreco">Preço</label>
            </div>

            <div class="box-pagina box">
                <input onblur="Campo(2)" type="text" id="Idpagina" name="pagina" required>
                <label for="Idpagina">Paginas</label>
           </div>

           <div class="box-autor box">
                <input onblur="Campo(3)" type="text" id="Idautor" name="autor" required>
                <label for="Idautor">Autor</label>
            </div>
            <div class="box-quantidade box">
                <input onblur="Campo(4)" type="text" id="Idquantidade" name="quantidade" required>
                <label for="Idquantidade">Quantidade</label>
           </div>

           <div class="Btn">
                <button type="submit" name="adicionar">Adicionar</button>
           </div>
        </form>
    </section>
    <script src="../js/create.js"></script>
    </script> 
</body>
</html>