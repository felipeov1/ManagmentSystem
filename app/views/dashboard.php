<div class="boxDashboard">
    <main>
        <h1>Dashboard</h1>
        <div class="txtSytem">
            <h2>Olá
                <?php echo user()->Nome; ?> - <span style="font-size: 70%; ">Aqui está um resumo de sua loja</span>
            </h2>
        </div>
        <div class="salesData">
            <div class="sales">
                <span class="material-icons-sharp">insert_chart</span>
                <div class="middle">
                    <div class="left">
                        <h3>Vendas nesse mês:</h3>
                        <h1>
                            <?php echo "R$" . $allSalesMonth; ?>
                        </h1> <!--  recebe dados do banco de dados -->
                    </div>
                    <div class="right">
                    </div>
                </div>
            </div>

            <div class="compare">
                <span class="material-icons-sharp">insert_chart</span>
                <div class="middle">
                    <div class="left">
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
                    <div class="right">
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
                    <div class="right">
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
                    <?php foreach ($orders as $order): ?>
                        <form action="/dashboard/changeStatus" method="POST">
                            <tr>
                                <td>
                                    <?php echo $order->NomeCliente; ?>
                                </td>
                                <td>
                                    <input type="text" style="border: none; pointer-events: none;" name="IDVenda"
                                        value="<?php echo $order->IDVenda; ?>">
                                </td>
                                <td>
                                    <?php echo date('d/m/Y', strtotime($order->DataEntrega)); ?>
                                    <?php echo date($order->HorarioEntrega); ?>
                                </td>
                                <td> <input type="submit" name="AddMsgCont" class="btn" value="Entregue"></td>
                            </tr>
                        </form>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="">Mostrar Todos Pedidos</a>
        </div>
        <!-- fim das vendas recentes e da main-->
    </main>

    <div class="right">
        <div class="orderAlert">
            <h2>Notificações</h2>
            <div class="new">
                <div class="news">
                    <div class="message">
                        <?php foreach ($ordersNotifications as $notification): ?>
                            <p>
                                <b>Alerta!</b>
                                A entrega do pedido do(a) <?php echo $notification->NomeCliente ?> está próxima.<br>
                                <small
                                    class="text-muted"><?php echo timeElapsedString($notification->DataEntrega, $notification->HorarioEntrega); ?></small><br>

                                <a href="">Visualizar pedido</a>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        function timeElapsedString($deliveryDate, $deliveryTime, $full = false)
        {
            $deliveryDateTime = new DateTime("$deliveryDate $deliveryTime");
            $now = new DateTime();
            $diff = $now->diff($deliveryDateTime);

            $hours = $diff->h + ($diff->days * 24); // Converter dias em horas
        
            $string = [
                'h' => 'hora',
                'i' => 'minuto',
                's' => 'segundo',
            ];

            $result = [];
            foreach ($string as $key => $value) {
                if ($diff->$key) {
                    if ($key === 'i' && $hours > 0) {
                        $result[] = $diff->$key . ' ' . $value . ($diff->$key > 1 ? 's' : '');
                    } else {
                        $result[] = $diff->$key . ' ' . $value . ($diff->$key > 1 ? 's' : '');
                    }
                }
            }

            if (!$full) {
                $result = array_slice($result, 0, 2); // Limitar a dois elementos (hora e minutos)
            }

            return $result ? implode(' e ', $result) . ' atrás' : 'agora';
        }
        ?>
        <div class="client">
            <div class="addClient">
                <button><span class="material-icons-sharp" style="font-size: 45px;">person_add</span><br>
                    <h2>Novo Cliente</h2>
                </button>
            </div>
        </div>
    </div>
</div>