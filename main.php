<?php
    session_start();
    include_once('conexao.php');

    if( (!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true) ){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);

        header('location: index.php');

        $_SESSION['loginErro'] = "Para acessar o sistema é preciso fazer login antes.";
    }

    $logado = $_SESSION['email'];
    
    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuario WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    }
    else {   
        $sql = "SELECT * FROM usuario ORDER BY id DESC";
    }
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    

    <link rel="stylesheet" href="./assets/css/base.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                <img src="./assets/img/adspecas.png" alt="">
                </span>

                <div class="text logo-text">
                    <div>
                        <span class="name">Bem Vindo</span>
                        <span class="profession">
                            <?php
                                echo "<h6>$logado</h6>";
                            ?>    
                        </span>
                    </div>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                <li class="nav-link">
                        <a onclick="changeSrc('./Dashboard.php','Dashboard')" href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a onclick="changeSrc('./listaUsuarios.php','Lista de usuários')" href="#">
                            <i class='bx icon'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </i>
                            <span class="text nav-text">Usuários</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a onclick="changeSrc('./listaFornecedores.php','Lista de fornecedores')" href="#">
                            <i class='bx icon'>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 18.5C18.83 18.5 19.5 17.83 19.5 17C19.5 16.17 18.83 15.5 18 15.5C17.17 15.5 16.5 16.17 16.5 17C16.5 17.83 17.17 18.5 18 18.5M19.5 9.5H17V12H21.46L19.5 9.5M6 18.5C6.83 18.5 7.5 17.83 7.5 17C7.5 16.17 6.83 15.5 6 15.5C5.17 15.5 4.5 16.17 4.5 17C4.5 17.83 5.17 18.5 6 18.5M20 8L23 12V17H21C21 18.66 19.66 20 18 20C16.34 20 15 18.66 15 17H9C9 18.66 7.66 20 6 20C4.34 20 3 18.66 3 17H1V6C1 4.89 1.89 4 3 4H17V8H20M3 6V15H3.76C4.31 14.39 5.11 14 6 14C6.89 14 7.69 14.39 8.24 15H15V6H3Z" />
                            </svg>
                            </i>
                            <span class="text nav-text">Fornecedor</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a onclick="changeSrc('./listaProdutos.php','Lista de produtos')" href="#">
                            <i class='bx icon'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </i>
                            <span class="text nav-text">Produto</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a onclick="changeSrc('./listaEstoque.php','Movimentação de estoque')" href="#">
                            <i class='bx icon'>
                            <svg style='width:24px;height:24px' viewBox='0 0 24 24'>
                                <path fill='currentColor' d='M20 3H4C2.9 3 2 3.9 2 5V19C2 20.1 2.9 21 4 21H20C21.1 21 22 20.1 22 19V5C22 3.9 21.1 3 20 3M8 19H5V17H8V19M8 16H5V14H8V16M8 13H5V11H8V13M13.5 19H10.5V17H13.5V19M13.5 16H10.5V14H13.5V16M13.5 13H10.5V11H13.5V13M19 19H16V17H19V19M19 16H16V14H19V16M19 13H16V11H19V13M19 9H5V5H19V9Z' />
                            </svg>
                            </i>
                            <span class="text nav-text">Saída estoque</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a id='SairSistema' href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span  class="text nav-text">Sair</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Modo noite</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div  id="titlePage"  class="text">Dashboard</div>
        <iframe allowtransparency="true" frameborder="0"  id="iframeId" src="" width="100%" height="100%"></iframe>
    </section>

</body>
<script src="./assets/js/main.js"></script>
<script>
    $('#SairSistema').on('click',function(){
        Swal.fire({
            title: 'Sair?',
            text: "Deseja confirmar o logout no sistema?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "sair.php"; 
                Swal.fire({
                icon: 'success',
                title: 'Logout realizado com sucesso!',
                showConfirmButton: false,
                timer: 1500
                }) 
            } 
            })
    })
</script>
</html>
