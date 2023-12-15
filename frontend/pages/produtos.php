<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../assets/css/produtos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./layout/slideBar/slideBar.css">
    <link rel="stylesheet" href="./layout/body/body.css">
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
                <a href="dashboard.php">
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
                <a href="#"  class="hoverOption">
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

        <div class="table">
            <div class="table_header">
                <h2> Produtos </h2>
                <div class="div"> <img src="logo.png" /> </div>
                <div>
                    <input class="Produtos" placeholder="Produtos" />
                    <button class="Pesquisar"> Pesquisar </button>
                </div>
            </div>
            <div class="table_section">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Estoque</th>
                            <th>Preço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Bolo mousse doce de leite</td>
                            <td>150 </td>
                            <td>48,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Bolacha Água e Sal 350g</td>
                            <td>150 </td>
                            <td>8,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sirio Vegetariano</td>
                            <td>150 </td>
                            <td>8,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Croissant de Sanduíche</td>
                            <td>150 </td>
                            <td>8,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Sanduíche Pão de forma</td>
                            <td>150 </td>
                            <td>8,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Bolo sonho de valsa</td>
                            <td>150 </td>
                            <td>48,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Cueca virada</td>
                            <td>150 </td>
                            <td>8,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Bolo prestígio</td>
                            <td>150 </td>
                            <td>48,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Bolo de brigadeiro</td>
                            <td>150 </td>
                            <td>48,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Bolo gelado</td>
                            <td>150 </td>
                            <td>48,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Bolo abacaxi com côco</td>
                            <td>150 </td>
                            <td>48,00</td>
                            <td>
                                <button> <i class="fa-solid fa-pen-to-square"></i> </button>
                                <button> <i class="fa-solid fa-eye"></i> </button>
                                <button> <i class="fa-solid fa-trash"></i> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <div><i class="fa-solid fa-angles-left"></i></div>
                <div><i class="fa-solid fa-angle-left"></i></div>
                <div>1</div>
                <div>2</div>
                <div><i class="fa-solid fa-angle-right"></i></div>
                <div><i class="fa-solid fa-angles-right"></i></div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>