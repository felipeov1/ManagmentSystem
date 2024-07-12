<div id="wrapper">
    <!-- Content wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" id="topbar">

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light small" placeholder="Pesquisar..."
                            aria-label="Search" aria-describedby="basic-addon2" id="inputPesquisar">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="btnPesquisar">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <?php if (count($ordersNotifications) > 0): ?>
                                <span class="badge badge-danger badge-counter">
                                    <?php echo count($ordersNotifications) > 99 ? '99+' : count($ordersNotifications); ?>
                                </span>
                            <?php endif; ?>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in" id="dropdown-alert"
                            aria-labelledby="alertsDropdown">
                            <li>
                                <h6 class="dropdown-header">Alertas</h6>
                            </li>
                            <?php if (count($ordersNotifications) > 0): ?>
                                <?php foreach ($ordersNotifications as $notification): ?>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center">
                                            <div class="me-3"></div>
                                            <div>
                                                <span class="font-weight-bold">
                                                    A entrega do pedido do(a)
                                                    <?php echo htmlspecialchars($notification->NomeCliente); ?> está próxima
                                                </span>
                                                <div class="small text-gray-500">
                                                    <?php echo timeElapsedString($notification->DataEntrega, $notification->HorarioEntrega); ?>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>
                                    <a class="dropdown-item text-center">Nenhuma entrega próxima</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="d-flex align-items-center justify-content-center">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo user()->Nome; ?></span>
                    </li>

                </ul>
            </nav>
            <!-- End of Topbar -->

            <?php
            function timeElapsedString($deliveryDate, $deliveryTime, $full = false)
            {
                $deliveryDateTime = new DateTime("$deliveryDate $deliveryTime");
                $now = new DateTime();
                $diff = $now->diff($deliveryDateTime);

                $hours = $diff->h + ($diff->days * 24);

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

            <!-- Page content -->
            <div class="container-fluid" id="container-main">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800" style="font-weight: 400;">Dashboard</h1>
                    <div id="icons-add">
                        <a href="#" class="btn btn-sm btn-outline-primary shadow-sm">
                            <i class="fas fa-user-plus fa-sm"></i>
                            Novo cliente
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-success shadow-sm ml-3">
                            <i class="fas fa-cart-plus fa-sm"></i>
                            Novo pedido
                        </a>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs fw-semibold text-primary text-uppercase mb-1">
                                            Vendas nesse mês</div>
                                        <div class="h5 mb-0 fw-semibold text-gray-800">
                                            <?php echo "R$" . $allSalesMonth; ?>
                                        </div>
                                        <!-- recebe dados do banco de dados -->
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs fw-semibold text-success text-uppercase mb-1">
                                            Comparação mensal
                                        </div>
                                        <div class="h5 mb-0 fw-semibold text-gray-800">
                                            <?php

                                            if ($monthlySalesProgression > 0) {
                                                echo "+R$" . number_format($monthlySalesProgression, 2, ',', '.');
                                            } elseif ($monthlySalesProgression < 0) {
                                                echo "-R$" . number_format(abs($monthlySalesProgression), 2, ',', '.');
                                            } else {
                                                echo "R$" . number_format($monthlySalesProgression, 2, ',', '.');
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs fw-semibold text-warning text-uppercase mb-1">
                                            Vendas esse ano</div>
                                        <div class="h5 mb-0 fw-semibold text-gray-800"><?php echo "R$$allSalesYear"; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabela e botões -->
                <div class="row mt-3">
                    <div class="col-12" id="table-scroll">
                        <table class="table-striped text-center shadow" width="100%" id="tabela-dashboard">
                            <thead>
                                <tr>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Número do pedido</th>
                                    <th scope="col">Data de entrega</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <form action="/dashboard/changeStatus" method="POST" style="display:inline;">

                                        <tr>
                                            <td>
                                                <?php echo $order->NomeCliente; ?>
                                            </td>
                                            <td>
                                                <input type="text"
                                                    style="border: none; pointer-events: none; background-color: transparent; text-align: center;"
                                                    name="IDVenda" value="<?php echo $order->IDVenda; ?>">
                                            </td>
                                            <td>
                                                <?php echo date('d/m/Y', strtotime($order->DataEntrega)); ?>
                                                <?php echo date($order->HorarioEntrega); ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn-visualize" data-bs-toggle="modal"
                                                    data-bs-target="#modalVisualize_<?php echo $order->IDVenda; ?>"
                                                    data-nome="<?php echo $order->NomeCliente; ?>"
                                                    data-telefone1="<?php echo $order->Telefone1; ?>"
                                                    data-telefone2="<?php echo $order->Telefone2; ?>"
                                                    data-idvenda="<?php echo $order->IDVenda; ?>"
                                                    data-dataentrega="<?php echo $order->DataEntrega; ?>"
                                                    data-horarioentrega="<?php echo $order->HorarioEntrega; ?>"
                                                    data-valor="<?php echo $order->Valor; ?>">
                                                    <span>
                                                        <i class="fa-solid fa-eye"></i>
                                                    </span>
                                                </button>
                                                <button type="submit" name="AddMsgCont" value="Entregue">
                                                    <span>
                                                        <i class="fa-solid fa-check"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="mostrarPedidos">
                        <h1 class="text-center mt-3" style="font-size: 0.8rem;"><a href="#">Mostrar mais pedidos</a>
                        </h1>
                    </div>
                </div>
                <!-- fim tabela -->

                <!-- Modal Visualizar Pedido -->
                <?php foreach ($orders as $order): ?>
                    <div class="modal fade" id="modalVisualize_<?php echo $order->IDVenda; ?>" tabindex="-1"
                        aria-labelledby="modalVisualizeLabel_<?php echo $order->IDVenda; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalVisualizeLabel_<?php echo $order->IDVenda; ?>">
                                        Informações do pedido</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><span class="fw-bold">Nome do cliente:</span> <?php echo $order->NomeCliente; ?></p>
                                    <p><span class="fw-bold">Telefone 1:</span> <?php echo $order->Telefone1; ?></p>
                                    <p><span class="fw-bold">Telefone 2:</span> <?php echo $order->Telefone2; ?></p>
                                    <p><span class="fw-bold">Número do pedido:</span> <?php echo $order->IDVenda; ?></p>
                                    <p><span class="fw-bold">Data da entrega:</span> <?php echo date('d/m/Y', strtotime($order->DataEntrega)); ?></p>
                                    <p><span class="fw-bold">Horário da entrega:</span>
                                        <?php echo $order->HorarioEntrega; ?></p>
                                    <p><span class="fw-bold">Valor:</span> <?php echo $order->Valor; ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Fim Modal Visualizar Pedido -->

            </div>
            <!-- End Page content -->
        </div>
        <!-- End Main content -->
    </div>
    <!-- End Content wrapper -->
</div>