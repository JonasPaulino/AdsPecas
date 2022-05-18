<?php
    session_start();
    //print_r($_REQUEST);
    
    //tem que ter clicado no botão submit a variavel precisa existir e email e senha tem que esta diferente de vazio
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        include_once('conexao.php');

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // print_r('Email: ' . $email . '<br>');
        // print_r('Senha: ' . $senha . '<br>');
                                                    //as aspas simples são obrigatórias
        $query = "SELECT * FROM usuario WHERE email= '$email' AND senha = '$senha' ";
        $result = $conn->query($query);

        if(mysqli_num_rows($result)<1){
            //grava mensagem de falha na sessão;
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            
            //destroi a sesão para que não possa logar de novo
            unset($_SESSION['email']);
            unset($_SESSION['senha']);

            //manda pra login
            header('Location: index.php');
        } else{
            //grava sessao
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: main.php');
        }
    }else{ 
        //não não preencheu nada não tem acesso
        header('Location: index.php');
    }

?>