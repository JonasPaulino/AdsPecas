<?php
    session_start();
    include_once('conexao.php');
    
    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $sql = "SELECT * FROM produto WHERE id LIKE '%$data%' or descricao LIKE '%$data%' or id_fornecedor LIKE '%$data%' ORDER BY id DESC";
    }
    else {   
        $sql = "SELECT * FROM produto ORDER BY id DESC";
    }
    $result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/listaProdutos.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body> 
<?php
        if(isset($_SESSION['msgSalvar'])){ 

        function alerta($icone, $titulo, $messagem){ 
            echo "<script type='text/JavaScript'> 
                    Swal.fire({
                        icon: '$icone',
                        title: '$titulo',
                        text: '$messagem',
                        showConfirmButton: false,
                        timer: 1600
                    })
                </script>";};

        if($_SESSION['msgSalvar'] ==='SAL'){
            alerta("success","Atualizado!","Cadastro atualizado com sucesso.");
            unset($_SESSION['msgSalvar']); 
        } else if($_SESSION['msgSalvar'] ==='DEL') {
            alerta("success","Deletado!","O cadastro foi apagado com sucesso"); 
            unset($_SESSION['msgSalvar']);   
        } else if ($_SESSION['msgSalvar'] ==='ADD'){
            alerta("success","Cadastrado!","O cadastro adicionado com sucesso!");
            unset($_SESSION['msgSalvar']);             
        } else {
            alerta("info","Ops...!","Nenhum registro foi atualizado."); 
            unset($_SESSION['msgSalvar']);    
        }           
        
        };
    ?>   
    <div class="container">
        <div style="display:flex;justify-content: space-between;margin-bottom: 20px;">
            <div>
                <!-- <a  href="./Produto/formProduto.php" class="btn">
                    <svg style="margin-right: 10px;"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                    Novo produto
                </a> -->
            </div>
            <div style="width: 50%;" class="box-search">
                <input style="flex: 1;" type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
                <button style="margin-left:5px" onclick="searchData()" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </div>
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Qtd Estoque</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['descricao']."</td>";
                        echo "<td>".$user_data['preco']."</td>";
                        echo "<td>".$user_data['qtd_estoque']."</td>";
                        echo "<td>
                        <a class='btnTable' href='./Movimentacao/formEstoqueEntrada.php?id=$user_data[id]' title='Entrada'>
                            <svg style='width:24px;height:24px' viewBox='0 0 24 24'>
                                <path fill='currentColor' d='M18 13.09V10H20V13.09C19.67 13.04 19.34 13 19 13C18.66 13 18.33 13.04 18 13.09M9.5 11C9.22 11 9 11.22 9 11.5V13H15V11.5C15 11.22 14.78 11 14.5 11H9.5M21 9H3V3H21V9M19 5H5V7H19V5M6 19V10H4V21H13.35C13.13 20.37 13 19.7 13 19H6M20 18V15H18V18H15V20H18V23H20V20H23V18H20Z' />
                            </svg>
                            </a> 
                            
                            <a class='btnTable btn-del' href='./Movimentacao/formEstoqueSaida.php?id=$user_data[id]' title='Saída'>
                                <svg style='width:24px;height:24px' viewBox='0 0 24 24'>
                                    <path fill='currentColor' d='M13 19C13 19.7 13.13 20.37 13.35 21H4V10H6V19H13M19 13C19.34 13 19.67 13.04 20 13.09V10H18V13.09C18.33 13.04 18.66 13 19 13M9.5 11C9.22 11 9 11.22 9 11.5V13H15V11.5C15 11.22 14.78 11 14.5 11H9.5M21 9H3V3H21V9M19 5H5V7H19V5M15 18V20H23V18H15Z' />
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>
<script src="./assets/js/listaEstoque.js"></script>;