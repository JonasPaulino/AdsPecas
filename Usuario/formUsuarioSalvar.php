<?php
    session_start();
    // isset -> serve para saber se uma variável está definida
    include_once('../conexao.php');
    if(isset($_POST['update']))
    {
        $id         = $_POST['id'];
        $nome       = $_POST['nome'];
        $email      = $_POST['email'];
        $senha      = $_POST['senha'];
        $telefone   = $_POST['telefone'];
        $genero     = $_POST['genero'];
        $data_nasc  = $_POST['data_nascimento'];
        $cidade     = $_POST['cidade'];
        $estado     = $_POST['estado'];
        $endereco   = $_POST['endereco'];
        
        $sqlUpdate = "UPDATE usuario SET 
                            nome='$nome',
                            senha='$senha',
                            email='$email',
                            telefone='$telefone',
                            genero='$genero',
                            data_nascimento='$data_nasc',
                            cidade='$cidade',
                            estado='$estado',
                            endereco='$endereco'
                        WHERE id= $id";
        $result = $conn->query($sqlUpdate);
        
        if(mysqli_affected_rows($conn)>0){
            $_SESSION['msgSalvar'] = 'SAL';
        } else {
            $_SESSION['msgSalvar'] = 'Não';
        }         
    }

    header('Location: ../ListaUsuarios.php');

?>

