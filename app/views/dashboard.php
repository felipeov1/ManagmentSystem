<div class="container boxDashboard">
    <main>
        <h1>Dashboard</h1>

        <div class="txtSytem">
            <h2>Olá
                <?php echo user()->nome; ?> - <span style="font-size: 70%; ">Aqui está
                    um resumo de sua loja</span>
            </h2>
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
                <button><span class="material-icons-sharp" style="font-size: 45px;">person_add</span><br>
                    <h2>Novo Cliente</h2>
                </button>
            </div>
        </div>
    </div>
</div>