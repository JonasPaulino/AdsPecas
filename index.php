<?php
    //print_r($_SESSION);
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <script src="./assets/js/sweetAlert.js"></script>

</head>
<body>
        
        <?php if(isset($_SESSION['loginErro'])){    //ao iniciar a sessão ja procura se a variavel existe e apresenta a mensagem        
            function alerta($icone, $titulo, $messagem){ 
                echo "<script type='text/JavaScript'> 
                        Swal.fire({
                            icon: '$icone',
                            title: '$titulo',
                            text: '$messagem',
                            showConfirmButton: true
                        })
                    </script>";
            };            
            alerta("error","Ops...",$_SESSION['loginErro']); //chamada da função com a impressão do conteudo da sessão            
            unset($_SESSION['loginErro']); //destruir mensagem contida na sessão
        }?>
    <div class="container">
        <h1>Login</h1>
        <form action="validaLogin.php" method="POST" >
            <input type="text" name="email" placeholder="Email" required>
            <br><br>
            <input type="password" name="senha" placeholder="Senha" required>
            <br><br>
            <input class="btLogin"type="submit" name="submit" value="Entrar">
            <br>
        </form>
    </div>
</body>
</html>