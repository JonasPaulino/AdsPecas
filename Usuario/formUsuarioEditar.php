<?php
    include_once('../conexao.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM usuario WHERE id=$id";
        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome       = $user_data['nome'];
                $senha      = $user_data['senha'];
                $email      = $user_data['email'];
                $telefone   = $user_data['telefone'];
                $sexo       = $user_data['genero'];
                $data_nasc  = $user_data['data_nascimento'];
                $cidade     = $user_data['cidade'];
                $estado     = $user_data['estado'];
                $endereco   = $user_data['endereco'];
            }
        }
        else
        {
            header('Location: ../ListaUsuarios.php');
        }
    }
    else
    {
        header('Location: ../ListaUsuarios.php');
    }
?>

<head>
    <link rel="stylesheet" href="../assets/css/formulario.css">
</head>
<body>
    <div class="container">
        <div  style="display:flex;justify-content: space-between;margin-bottom: 30px;">
            <div>
                <a  href="../ListaUsuarios.php" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                    </svg>
                    Voltar
                </a>
            </div>
        </div>
        <div class="box">
            <form action="./formUsuarioSalvar.php" method="POST">
            <fieldset>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value=<?php echo $nome;?> required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" value=<?php echo $senha;?> required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value=<?php echo $email;?> required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value=<?php echo $telefone;?> required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <div class="GeneroDt">
                        <div>
                            <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($sexo == 'feminino') ? 'checked' : '';?> required>
                            <label for="feminino">Feminino</label>
                            <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : '';?> required>
                            <label for="masculino">Masculino</label>
                            <input type="radio" id="outro" name="genero" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : '';?> required>
                            <label for="outro">Outro</label>
                        </div>
                        <div class="dtNascimento">
                            <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                            <input type="date" name="data_nascimento" id="data_nascimento" value=<?php echo $data_nasc;?> required>
                        </div>
                </div>       
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value=<?php echo $cidade;?> required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value=<?php echo $estado;?> required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value=<?php echo $endereco;?> required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <input class="btn" type="submit" name="update" id="update" value="Confirmar alterações">
            </fieldset>
            </form>
        </div>
    </div>
</body>