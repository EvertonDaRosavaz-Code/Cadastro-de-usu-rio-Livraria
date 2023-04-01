<?php
require('connection.php');

//Funcionando !
function create(){
    $conn = getConnection();
    $sql = 'INSERT INTO livro (nome, preco, pagina, autor, quantidade) VALUES (?, ?, ?, ?, ?)';    
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $_POST['nome']);
    $stmt->bindParam(2, $_POST['preco']);
    $stmt->bindParam(3, $_POST['pagina']);
    $stmt->bindParam(4, $_POST['autor']);
    $stmt->bindParam(5, $_POST['quantidade']);
   

    $teste = $stmt->execute();// Se executado me retorna true
    
    if($teste == true){
        echo "<script>alert('Salvo com sucesso!')</script>";
    }
    else{
        echo "<script>alert('Erro ao salvar tente novamente !')</script>";
    }
}

//Funcionando !
function read(){
    $conn = getConnection();
    $sql = 'SELECT * FROM livro';
    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
}

//Funcionando !
function update($id){
    $conn = getConnection();
    $sql = "UPDATE livro SET nome = ?, preco = ?, pagina = ?, autor=?, quantidade = ? WHERE id = ?";
    $stmt = $conn-> prepare($sql);
     
    $stmt->bindParam(1, $_POST['nome']);
    $stmt->bindParam(2, $_POST['preco']);
    $stmt->bindParam(3, $_POST['pagina']);
    $stmt->bindParam(4, $_POST['autor']);
    $stmt->bindParam(5, $_POST['quantidade']);
    $stmt->bindParam(6, $id);

    try{
        $stmt->execute();
        echo"<script>alert('Atualizado com sucesso!')</script>";
        header('location:../view/read.php');
    }catch(Exception $e){
        echo"<script>alert('Erro ao atualizar!'".$e->getMessage()."')</script>";
    }
}

//Funcionando !
function delete($id){
    $conn = getConnection();
    $sql = "DELETE  FROM livro WHERE id = ?";  
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id);

    $stmt->execute();

    try{
        echo"<script>alert('Excluido com sucesso!')</script>";
        return true;
    }catch(Exception $e){
        echo"<script>alert('Erro ao Deletar!'".$e->getMessage()."')</script>";
    }
  
}


//Funcionando !
function selectWhere($id){
    $conn = getConnection();
    $sql = "SELECT * FROM livro WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1,$id);

    $stmt->execute();

    $result = $stmt->fetchAll(); // retornar uma array do id correspondente
    return $result;
}
?>