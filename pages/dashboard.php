<?php
include_once("../config/conexao.php");
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    // Se não estiver autenticado, redirecionar para a página de login
    header('Location: ./index.php');
    exit();
}
$sql = "SELECT * FROM `users` ";
$result = $conn ->query($sql);
$data = mysqli_fetch_assoc($result);




if ($_SESSION["id"] == $data["id"]) {
    $users = $data['user_email'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./layout/slideBar/slideBar.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/faviconImg.ico">
    <title>Lú Salgados</title>
</head>
<body>
    <div class="container boxSide">
        <aside>
            <div class="slideBarHeader">
                <div class="logo">
                    <img src="../assets/img/logo.png" alt="Logotipo">
                </div>
                <div class="btnClose">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="slideBar">
                <a href="#" class="hoverOption">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Visão Geral</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">shopping_basket</span>
                    <h3>Pedidos</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">group</span>
                    <h3>Clientes</h3>
                </a>
                <a href="produtos.php">
                    <span class="material-icons-sharp">inventory_2</span>
                    <h3>Produtos</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">admin_panel_settings</span>
                    <h3>Sistema</h3>
                </a>
                <a href='./logout.php'>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Sair</h3>
                </a>
            </div>
        </aside>
        <!-- fim do menu lateral -->

        <main>
            <h1>Dashboard</h1>

            <div class="txtSytem">
                <h2>Olá <?php echo $users ?> <!--  recebe dados do banco de dados --> - <span style="font-size: 70%; ">Aqui está
                        um resumo de sua loja</span></h2>
            </div>

            <div class="salesData">
                <div class="sales" style="width: 350px; height: 200px;">
                    <span class="material-icons-sharp">insert_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Vendas Totais (mês):</h3>
                            <h1>R$2.357,00</h1> <!--  recebe dados do banco de dados -->
                        </div>
                        <div class="graphic">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>80%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="compare" style="width: 350px; height: 200px;">
                    <span class="material-icons-sharp">insert_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Vedas comparada ao mês anterior:</h3>
                            <h1> +R$1.200,00</h1> <!--  recebe dados do banco de dados -->
                        </div>
                        <div class="graphic">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>+20%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="yearly" style="width: 350px; height: 200px;">
                    <span class="material-icons-sharp">insert_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Vendas esse ano:</h3>
                            <h1>R$12.340,00</h1> <!--  recebe dados do banco de dados -->
                        </div>
                        <div class="graphic">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>+40%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fim dados de vendas -->

            <div class="nextOrder">
                <h2>Próximas entregas</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Número do pedido</th>
                            <th>Data da entrega</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Senai</td>
                            <td>35534545</td>
                            <td>15/12/2023 17:30</td>
                            <td><button>Entregue</button></td>
                        </tr>
                        <tr>
                            <td>Unicesumar</td>
                            <td>3534545</td>
                            <td>15/12/2023 18:00</td>
                            <td><button>Entregue</button></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <a href="">Mostrar Todas</a>
            </div>

            <!-- fim das vendas recentes e da main-->
        </main>

        <div class="right">
            <div class="orderAlert">
                <h2>Notificações</h2>
                <a href="">Ver todas</a>
                <div class="new">
                    <div class="news">
                        <div class="message">
                            <p>
                                <b>Alerta!</b>
                                A entrega do pedido do(a) Unicesumar está próxima.<br>
                                <small class="text-muted">2 minutos atrás.</small><br>
                                <a href="">Visualizar pedido</a>
                            </p>
                            <p>
                                <b>Alerta!</b>
                                A entrega do pedido do(a) Senai está próxima.<br>
                                <small class="text-muted">25 minutos atrás.</small><br>
                                <a href="">Visualizar pedido</a>
                            </p>
                            <p>
                                <b>Alerta!</b>
                                A entrega do pedido do(a) Senai está próxima.<br>
                                <small class="text-muted">25 minutos atrás.</small><br>
                                <a href="">Visualizar pedido</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="client">
                <div class="addClient">
                    <button><span class="material-icons-sharp" style="font-size: 45px;">person_add</span><br><h2>Novo Cliente</h2></button>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>