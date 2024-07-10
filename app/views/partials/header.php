<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Logo -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-text mt-4"><img src="/assets/images/logo.png" alt="Logo Lú Salgados" width="120"
                height="120"></div>
    </div>

    <!-- Divisor -->
    <hr class="sidebar-divider my-0 mt-4 mb-3">

    <!-- Nav Item - Visão geral -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-border-all"></i>
            <span>Visão Geral</span>
        </a>
    </li>
    <!-- Nav Item - Pedidos -->
    <li class="nav-item">
        <a class="nav-link" href="/pedidos">
            <i class="fas fa-fw fa-basket-shopping"></i>
            <span>Pedidos</span>
        </a>
    </li>
    <!-- Nav Item - Clientes -->
    <li class="nav-item">
        <a class="nav-link" href="/clientes">
            <i class="fas fa-fw fa-user-group"></i>
            <span>Clientes</span>
        </a>
    </li>
    <!-- Nav Item - Produtos -->
    <li class="nav-item">
        <a class="nav-link" href="/produtos">
            <i class="fas fa-fw fa-box-archive"></i>
            <span>Produtos</span>
        </a>
    </li>

    <!-- Nav Item - Configurações -->
    <li class="nav-item" style="background-color: #f8f9fc !important;">
        <div class="nav-link bg-light rounded p-2 d-flex align-items-center"
            style="padding-left: 0px !important; justify-content: space-around;">
            <div>
                <i class="fas fa-fw fa-cog"></i>
                <span>Configurações</span>
            </div>
            <i class="fas fa-chevron-down"></i> <!-- Ícone de seta para baixo -->
        </div>
        <!-- Sub-Items - Configurações -->
        <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link" href="/sistema" style="padding-left: 14px;">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuários</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/usuarios" style="padding-left: 14px;">
                    <i class="fas fa-fw fa-user-gear"></i>
                    <span>Nota Fiscal</span>
                </a>
            </li>
        </ul>
    </li>

    <!-- Nav Item - Sair -->
    <li class="nav-item" style="position: absolute; bottom: 0;">
        <a class="nav-link" href="/logout">
            <i class="fas fa-fw fa-arrow-right-from-bracket"></i>
            <span>Sair</span>
        </a>
    </li>

</ul>
<!-- Final da sidebar -->