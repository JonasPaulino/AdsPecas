<?php
    include_once('../conexao.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM produto WHERE id=$id";
        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $descricao      = $user_data['descricao'];
                $preco          = $user_data['preco'];
                $qtd_estoque    = $user_data['qtd_estoque'];
                $id_fornecedor  = $user_data['id_fornecedor'];
            }
        }
        else
        {
            header('Location: ../listaProdutos.php');
        }
    }
    else
    {
        header('Location: ../listaProdutos.php');
    }

    $SqlFornecedor = "SELECT * FROM fornecedor";
    $ResultFornecedor = mysqli_query($conn, $SqlFornecedor);
?>

<head>
    <link rel="stylesheet" href="../assets/css/formulario.css">
    <link rel="stylesheet" href="../assets/css/selectOption.css">
</head>
<body>
    <div class="container">
        <div  style="display:flex;justify-content: space-between;margin-bottom: 30px;">
            <div>
                <a  href="../listaProdutos.php" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                    </svg>
                    Voltar
                </a>
            </div>
        </div>
        <div class="box">
            <form action="./formProdutoSalvar.php" method="POST">
                <fieldset>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="descricao" id="descricao" class="inputUser" value=<?php echo $descricao;?> required>
                        <label for="descricao" class="labelInput">Descri????o do produto</label>
                    </div>
                    <br> <br>
                    <div class="inputBox">
                        <input type="text" name="preco" id="preco" class="inputUser" value=<?php echo $preco;?> required>
                        <label for="preco" class="labelInput">Pre??o</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="qtd_estoque" id="qtd_estoque" class="inputUser" value=<?php echo $qtd_estoque;?> required>
                        <label for="qtd_estoque" class="labelInput">Quantidade em estoque</label>
                    </div>
                    <br><br>
                    <div class="custom-select">
                        <label for="preco" style="font-size: 12px;color: dodgerblue;" class="labelInput">Fornecedor deste produto</label>
                         <br>
                        <select name="Fornecedor">
                        <option>Selecione um fornecedor</option>
                        <?php                        
                            while($Row_ResultFornecedor = mysqli_fetch_assoc($ResultFornecedor)){ ?>                                
                                <option value="<?php echo $Row_ResultFornecedor['id']; ?>" <?php if($Row_ResultFornecedor['id'] == $id_fornecedor){ echo "selected";}?>><?php echo $Row_ResultFornecedor['razao_social']; ?>
                                </option> <?php
                            }
                        ?>
                        </select>
                    </div>
                    <br><br>
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <input class="btn" type="submit" name="update" id="update" value="Confirmar altera????es">
            </fieldset>
            </form>
        </div>
    </div>
</body>
<script src="../assets/js/formProduto.js"></script>