<?php
    include_once('../conexao.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM fornecedor WHERE id=$id";
        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $razao_social       = $user_data['razao_social'];
                $email              = $user_data['email'];
                $telefone           = $user_data['telefone'];
                $endereco           = $user_data['endereco'];
                $cpf_cnpj           = $user_data['cpf_cnpj'];
            }
        }
        else
        {
            header('Location: ../ListaFornecedores.php');
        }
    }
    else
    {
        header('Location: ../ListaFornecedores.php');
    }
?>

<head>
    <link rel="stylesheet" href="../assets/css/formulario.css">
</head>
<body>
    <div class="container">
        <div  style="display:flex;justify-content: space-between;margin-bottom: 30px;">
            <div>
                <a  href="../ListaFornecedores.php" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                    </svg>
                    Voltar
                </a>
            </div>
        </div>
        <div class="box">
            <form action="./formFornecedoresSalvar.php" method="POST">
            <fieldset>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="razao_social" id="razao_social" class="inputUser" value=<?php echo $razao_social;?> required>
                        <label for="razao_social" class="labelInput">Razão Social</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="inputUser" value=<?php echo $cpf_cnpj;?> required>
                        <label for="cpf_cnpj" class="labelInput">CPF/CNPJ</label>
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