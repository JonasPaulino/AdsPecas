<?php
    session_start();
    include_once('../conexao.php');
    if(isset($_POST['update']))
    {
        $razao_social       = $_POST['razao_social'];
        $email              = $_POST['email'];
        $telefone           = $_POST['telefone'];
        $endereco           = $_POST['endereco'];
        $cpf_cnpj           = $_POST['cpf_cnpj'];
        
        $sqlUpdate = "UPDATE fornecedor SET 
                            razao_social='$razao_social',
                            email='$email',
                            telefone='$telefone',
                            endereco='$endereco',
                            cpf_cnpj='$cpf_cnpj'
                        WHERE id= $id";
        $result = $conn->query($sqlUpdate);
        
        if(mysqli_affected_rows($conn)>0){
            $_SESSION['msgSalvar'] = 'SAL';
        } else {
            $_SESSION['msgSalvar'] = 'Não';
        }         
    }

    header('Location: ../ListaFornecedores.php');

?>

