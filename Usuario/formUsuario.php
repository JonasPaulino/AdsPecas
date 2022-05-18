<?php
    session_start();
    if(isset($_POST['submit'])){

        include_once('../conexao.php');

        $nome               = $_POST['nome'];
        $email              = $_POST['email'];
        $telefone           = $_POST['telefone'];
        $genero             = $_POST['genero'];
        $data_nascimento    = $_POST['data_nascimento'];
        $cidade             = $_POST['cidade'];
        $estado             = $_POST['estado'];
        $endereco           = $_POST['endereco'];
        $senha              = $_POST['senha'];

        $query = "INSERT INTO usuario (nome,email,telefone,genero,data_nascimento,cidade,estado,endereco,senha) VALUES ( '$nome', '$email', '$telefone', '$genero', '$data_nascimento', '$cidade', '$estado', '$endereco', '$senha' )";

        $result = mysqli_query($conn, $query);

         if(mysqli_affected_rows($conn)>0){
             $_SESSION['msgSalvar'] = 'ADD';
         } else {
             $_SESSION['msgSalvar'] = 'Não';
         }  
        
        //manda pra main
        header('location: ../listaUsuarios.php');
    }

?>

<head>
    <link rel="stylesheet" href="../assets/css/formulario.css">
</head>
<body>
    <div class="container">
        <div  style="display:flex;justify-content: space-between;margin-bottom: 20px;">
            <div>
                <a  href="../listaUsuarios.php" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                    </svg>
                    Voltar
                </a>
            </div>
        </div>
        <div class="box">
            <form action="./formUsuario.php" method="POST">
                <fieldset>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser"  required>
                        <label for="nome" class="labelInput">Nome completo</label>
                    </div>
                    <br> <br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" required>
                        <label for="senha" class="labelInput">Senha</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="email" id="email" class="inputUser" required>
                        <label for="email" class="labelInput">Email</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                        <label for="telefone" class="labelInput">Telefone</label>
                    </div>
                    <p>Sexo:</p>
                    <div class="GeneroDt">
                        <div>
                            <input type="radio" id="feminino" name="genero" value="feminino" required>
                            <label for="feminino">Feminino</label>
                            <input type="radio" id="masculino" name="genero" value="masculino" required>
                            <label for="masculino">Masculino</label>
                            <input type="radio" id="outro" name="genero" value="outro" required>
                            <label for="outro">Outro</label>
                        </div>
                        <div class="dtNascimento">
                            <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                            <input type="date" name="data_nascimento" id="data_nascimento" required>
                        </div>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="cidade" id="cidade" class="inputUser" required>
                        <label for="cidade" class="labelInput">Cidade</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="estado" id="estado" class="inputUser" required>
                        <label for="estado" class="labelInput">Estado</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="endereco" id="endereco" class="inputUser" required>
                        <label for="endereco" class="labelInput">Endereço</label>
                    </div>
                    <br><br>
                    <input class="btn" type="submit" name="submit" id="submit" value="Cadastrar usuário">
                    </input>
                </fieldset>
            </form>
        </div>
    </div>
</body>