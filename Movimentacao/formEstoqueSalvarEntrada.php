<?php
    session_start();
    include_once('../conexao.php');
    var_dump($_POST);
    if(isset($_POST['update']))
    {
        $id                 = $_POST['id'];
        $descricao          = $_POST['descricao'];
        $preco              = $_POST['preco'];
        $qtd_estoque        = $_POST['qtd_estoque'];
        $SaldoAtual         = $_POST['SaldoAtual'];
        $qtd_atualizada     = $SaldoAtual + $qtd_estoque;
        
        $sqlUpdate = "UPDATE produto SET 
                            descricao='$descricao',
                            preco='$preco',
                            qtd_estoque='$qtd_atualizada'
                        WHERE id= $id";

        $result = $conn->query($sqlUpdate);
        
        if(mysqli_affected_rows($conn)>0){
            $_SESSION['msgSalvar'] = 'SAL';
        } else {
            $_SESSION['msgSalvar'] = 'Não';
        }         
    }

    header('Location: ../listaEstoque.php');

?>

