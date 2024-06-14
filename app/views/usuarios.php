<div class="table" style="margin-right: 20px">
    <div class="table_header">
        <div class="pageTitle">
            <h5>Administradores</h5>
        </div>
        <hr>
        <div class="options_header">
            <div class="searchInput">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control form-input" placeholder="Busque um administrador...">
            </div>
            <div class="select-show" style="background-color: #F5F5F5;">
                <label for="text">Mostrar</label>
                <select>
                    <option>5</option>
                    <option>15</option>
                    <option>20</option>
                    <option>25</option>
                    <option>30</option>
                    <option>todos</option>
                </select>
                <label for="text">Administradores</label>
            </div>
            <div class="createBtn">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#novoAdminModal">Novo
                    Administrador</button>
            </div>
        </div>
    </div>
    <div class="table_section" id="tab-administradores">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Setor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allAdmins as $admin): ?>
                    <tr>
                        <td><?php echo $admin->IDAdmin; ?></td>
                        <td><?php echo $admin->Nome; ?></td>
                        <td><?php echo $admin->Email; ?></td>
                        <td><?php echo $admin->CPF; ?></td>
                        <td><?php echo $admin->Setor; ?></td>
                        <td>
                            <button style="background-color: white; border: none; height: 20px" data-bs-toggle="modal"
                                data-admin-id="<?php echo $admin->IDAdmin ?>" data-bs-target="#editarAdminModal">
                                <i class="fa-solid fa-pen-to-square" style="font-size: 15px"></i>
                            </button>
                            <button class="getId-excluir" style="background-color: white; border: none"
                                data-bs-toggle="modal" data-id="<?php echo $admin->IDAdmin ?>"
                                data-bs-target="#excluirAdmin">
                                <i class="fa-solid fa-trash" style="font-size: 15px"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation ">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Modal Novo Administrador -->
<div class="modal fade" tabindex="-1" aria-labelledby="novoAdminModal" id="novoAdminModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="adminForm" action="/admin/add" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Administrador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="txt-news">
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Nome</label>
                            <input type="text" name="txtNameAdmin" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Email</label>
                            <input type="email" name="txtEmailAdmin" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">CPF</label>
                            <input type="text" name="txtCPF" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Setor</label>
                            <input type="text" name="txtSetor" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Senha</label>
                            <input type="password" name="txtSenha" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#adminForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/admin/add',
                data: $(this).serialize(),
                success: function (response) {
                    alert("Administrador adicionado com sucesso!");
                    $('#adminForm').modal('hide');
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    alert('Erro ao adicionar administrador.');
                }
            });
        });
    });
</script>

<!-- Modal Editar Administrador -->
<div class="modal fade" id="editarAdminModal" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editAdminForm" action="/admin/update" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarModal">Editar Administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="txt-news">
                        <input type="hidden" name="adminID" id="editAdminID">
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Nome</label>
                            <input type="text" name="editTxtNameAdmin" id="editTxtNameAdmin" value=""
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Email</label>
                            <input type="email" name="editTxtEmailAdmin" id="editTxtEmailAdmin" value=""
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">CPF</label>
                            <input type="text" name="editTxtCPF" id="editTxtCPF" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Setor</label>
                            <input type="text" name="editTxtSetor" id="editTxtSetor" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Senha</label>
                            <input type="password" name="editTxtSenha" id="editTxtSenha" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="submitBtn" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function loadAdminData(adminID) {
        $.ajax({
            url: '/admin/search/' + adminID,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response && response.IDAdmin) {
                    $('#editAdminID').val(response.IDAdmin);
                    $('#editTxtNameAdmin').val(response.Nome);
                    $('#editTxtEmailAdmin').val(response.Email);
                    $('#editTxtCPF').val(response.CPF);
                    $('#editTxtSetor').val(response.Setor);
                    $('#editTxtSenha').val(response.Senha);
                } else {
                    console.log('Dados inválidos recebidos do servidor.');
                }
            },
            error: function (error) {
                console.log(error);
                alert('Erro ao carregar dados do administrador.');
            }
        });
    }

    $(document).ready(function () {
        $('#editarAdminModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var adminID = button.data('admin-id');
            loadAdminData(adminID);
        });
    });
</script>

<!-- Modal Excluir Administrador -->
<div class="modal fade" id="excluirAdmin" tabindex="-1" aria-labelledby="modalExcluir" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="md-excluir">
                <h1 class="modal-title fs-5" id="modalExcluir">Excluir</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Confirme no botão abaixo a exclusão deste registro</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary excluir-button" id="md-close">Excluir</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var IDAdmin;

        $('.getId-excluir').click(function () {
            IDAdmin = $(this).data('id');
        });

        $('.excluir-button').click(function () {
            if (IDAdmin) {
                $.ajax({
                    type: 'POST',
                    url: '/admin/delete',
                    data: { IDAdmin: IDAdmin },
                    success: function (response) {
                        $('#modalExcluir').modal('hide');
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Erro ao excluir administrador.');
                    }
                });
            } else {
                alert("Erro: Não foi possível obter o ID do administrador.");
            }
        });
    });
</script>