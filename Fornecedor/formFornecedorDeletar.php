<?php
    session_start();
    if(!empty($_GET['id']))
    {
        include_once('../conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM fornecedor WHERE id=$id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM fornecedor WHERE id=$id";
            $resultDelete = $conn->query($sqlDelete);
        }

        if(mysqli_affected_rows($conn)>0){
            $_SESSION['msgSalvar'] = 'DEL';
        } else {
            $_SESSION['msgSalvar'] = 'Não';
        }  
    }
    header('Location: ../ListaFornecedores.php');
   
?>