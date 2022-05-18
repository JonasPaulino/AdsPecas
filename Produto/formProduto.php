<?php
    session_start();
    if(isset($_POST['submit'])){

        include_once('../conexao.php');

        $descricao          = $_POST['descricao'];
        $preco              = $_POST['preco'];
        $qtd_estoque        = $_POST['qtd_estoque'];

        $query = "INSERT INTO produto (descricao,preco,qtd_estoque) VALUES ( '$descricao', '$preco', '$qtd_estoque')";

        $result = mysqli_query($conn, $query);

         if(mysqli_affected_rows($conn)>0){
             $_SESSION['msgSalvar'] = 'ADD';
         } else {
             $_SESSION['msgSalvar'] = 'Não';
         }  
        
        header('location: ../listaProdutos.php');
    }

?>

<head>
    <link rel="stylesheet" href="../assets/css/formulario.css">
</head>
<body>
    <div class="container">
        <div  style="display:flex;justify-content: space-between;margin-bottom: 20px;">
            <div>
                <a  href="../ListaProdutos.php" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                    </svg>
                    Voltar
                </a>
            </div>
        </div>
        <div class="box">
            <form action="./formProduto.php" method="POST">
                <fieldset>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="descricao" id="descricao" class="inputUser"  required>
                        <label for="descricao" class="labelInput">Descrição do produto</label>
                    </div>
                    <br> <br>
                    <div class="inputBox">
                        <input type="text" name="preco" id="preco" class="inputUser" required>
                        <label for="preco" class="labelInput">Preço</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="qtd_estoque" id="qtd_estoque" class="inputUser" required>
                        <label for="qtd_estoque" class="labelInput">Quantidade em estoque</label>
                    </div>
                    <br><br>
                    <input class="btn" type="submit" name="submit" id="submit" value="Cadastrar produto">
                    </input>
                </fieldset>
            </form>
        </div>
    </div>
</body>