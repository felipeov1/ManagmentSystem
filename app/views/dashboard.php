<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        /*         var data1 = google.visualization.arrayToDataTable([
                    ['Effort', 'Amount given'],
                    ['My all', 100],
                ]); */

        var data2 = google.visualization.arrayToDataTable([
            ['Effort', 'Amount given'],
            ['My compare', 50],
        ]);

        /*         var data3 = google.visualization.arrayToDataTable([
                    ['Effort', 'Amount given'],
                    ['My year', 150],
                ]); */

        var options = {
            pieHole: 0,
            pieSliceTextStyle: {
                color: 'black',
            },
            legend: 'none'
        };

        /*         var chart1 = new google.visualization.PieChart(document.getElementById('donut_single_all_sales_month')); */
        var chart2 = new google.visualization.PieChart(document.getElementById('donut_single_compare_sales_month'));
        /*         var chart3 = new google.visualization.PieChart(document.getElementById('donut_single_all_sales_year')); */


        /*         chart1.draw(data1, options); */
        chart2.draw(data2, options);
        /*         chart3.draw(data3, options); */
    }
</script>

<div class="boxDashboard">
    <main>
        <h1>Dashboard</h1>
        <div class="txtSytem">
            <h2>Olá <?php echo user()->Nome; ?>,
                <br>- <span style="font-size: 70%;">Aqui está um resumo de sua loja</span>
            </h2>
        </div>
        <div>
        </div>
        <div class="salesData">
            <div class="sales">
                <span class="material-icons-sharp">insert_chart</span>
                <div class="middle">
                    <div class="left">
                        <h3>Vendas nesse mês:</h3>
                        <h1>
                            <?php echo "R$$allSalesMonth"; ?>
                        </h1> <!--  recebe dados do banco de dados -->
                    </div>
                    <!-- <div class="right">
                        <div id="donut_single_all_sales_month" style="width: 200px; height: 200px;"></div>
                    </div> -->
                </div>
            </div>
            <div class="compare">
                <span class="material-icons-sharp">insert_chart</span>
                <div class="middle">
                    <div class="left" id="left2">
                        <div id="container-compare">
                            <h3>Comparação Mensal:</h3>
                            <h1>
                                <?php
                                if ($monthlySalesProgression >= 0) {
                                    echo "+R$$monthlySalesProgression";
                                } else {
                                    echo "-R$$monthlySalesProgression";
                                }

                                ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="yearly">
                <span class="material-icons-sharp">insert_chart</span>
                <div class="middle">
                    <div class="left">
                        <h3>Vendas esse ano:</h3>
                        <h1>
                            <?php echo "R$$allSalesYear"; ?>
                        </h1> <!--  recebe dados do banco de dados -->
                    </div>
                    <!-- <div class="right">
                        <div id="donut_single_all_sales_year" style="width: 200px; height: 200px;"></div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- fim dados de vendas -->
        <h2 id="nextOrder-h2">Próximas entregas</h2>
        <div class="nextOrder">
            <table>
                <thead>
                    <tr id="color-th">
                        <th>Cliente</th>
                        <th>Número do pedido</th>
                        <th>Data da entrega</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <form action="/dashboard/changeStatus" method="POST">
                            <tr id="linha-tabela">
                                <td>
                                    <?php echo $order->NomeCliente; ?>
                                </td>
                                <td>
                                    <input type="text" style="border: none; pointer-events: none; background-color: transparent; text-align: center;" name="IDVenda" value="<?php echo $order->IDVenda; ?>">
                                </td>
                                <td>
                                    <?php echo date('d/m/Y', strtotime($order->DataEntrega)); ?>
                                    <?php echo date($order->HorarioEntrega); ?>
                                </td>
                                <td>
                                    <input type="submit" name="AddMsgCont" class="btn btn3" value="Entregue">
                                    <input type="button" name="Visualize" class="btn btn2" value="Visualizar" data-bs-toggle="modal" data-bs-target="#MyModal">
                                </td>
                            </tr>
                        </form>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div id="mostrar-pedidos">
            <a href="">Mostrar Todos Pedidos</a>
        </div>
        <!-- fim das vendas recentes e da main-->
    </main>

    <!-- Modal -->
    <div class="modal fade" id="MyModal" tabindex="-1" aria-labelledby="MyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="MyModalLabel">Informações do pedido</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><span class="fw-bold">Nome do cliente:</span> <?php echo $order->NomeCliente ?></p>
                    <p><span class="fw-bold">Telefone 1:</span> <?php echo $order->Telefone1 ?></p>
                    <p><span class="fw-bold">Telefone 2:</span> <?php echo $order->Telefone2 ?></p>
                    <p><span class="fw-bold">Número do pedido:</span> <?php echo $order->IDVenda ?></p>
                    <p><span class="fw-bold">Data da entrega:</span> <?php echo $order->DataEntrega ?></p>
                    <p><span class="fw-bold">Horario da entrega:</span> <?php echo $order->HorarioEntrega ?></p>
                    <p><span class="fw-bold">Valor:</span> <?php echo $order->Valor ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="right">
        <div class="orderAlert">
            <h2>Notificações</h2>
            <div class="new">
                <div class="news">
                    <div class="message">
                        <!-- <?php foreach ($ordersNotifications as $notification) : ?>
                            <p>
                                <b>Alerta!</b>
                                A entrega do pedido do(a) <?php echo $notification->NomeCliente ?> está próxima.<br>
                                <small class="text-muted">2 minutos atrás.</small><br>
                                <a href="">Visualizar pedido</a>
                            </p>
                        <?php endforeach; ?> -->

                        <p>
                            <b>Alerta!</b>
                            A entrega do pedido do(a) cliente<br>
                            <small>1 hora e 49 minutos</small><br>

                            <a href="">Visualizar pedido</a>
                        </p>

                        <p>
                            <b>Alerta!</b>
                            A entrega do pedido do(a) cliente<br>
                            <small>1 hora e 49 minutos</small><br>

                            <a href="">Visualizar pedido</a>
                        </p>

                        <p>
                            <b>Alerta!</b>
                            A entrega do pedido do(a) cliente<br>
                            <small>1 hora e 49 minutos</small><br>

                            <a href="">Visualizar pedido</a>
                        </p>
                        <p>
                            <b>Alerta!</b>
                            A entrega do pedido do(a) cliente<br>
                            <small>1 hora e 49 minutos</small><br>

                            <a href="">Visualizar pedido</a>
                        </p>
                        <p>
                            <b>Alerta!</b>
                            A entrega do pedido do(a) cliente<br>
                            <small>1 hora e 49 minutos</small><br>

                            <a href="">Visualizar pedido</a>
                        </p>
                        <p>
                            <b>Alerta!</b>
                            A entrega do pedido do(a) cliente<br>
                            <small>1 hora e 49 minutos</small><br>

                            <a href="">Visualizar pedido</a>
                        </p>
                        <p>
                            <b>Alerta!</b>
                            A entrega do pedido do(a) cliente<br>
                            <small>1 hora e 49 minutos</small><br>

                            <a href="">Visualizar pedido</a>
                        </p>
                        <p>
                            <b>Alerta!</b>
                            A entrega do pedido do(a) cliente<br>
                            <small>1 hora e 49 minutos</small><br>

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

            <div class="addPedido">
                <button><span class="material-icons-sharp" style="font-size: 45px;">add_shopping_cart</span><br>
                    <h2>Novo Pedido</h2>
                </button>
            </div>
        </div>
    </div>
</div>