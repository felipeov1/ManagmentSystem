<div class="table" style="margin-right: 20px">
    <div class="table_header">
        <div class="pageTitle">
            <h5>Clientes</h5>
        </div>
        <hr>
        <div class="options_header">
            <div class="searchInput">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control form-input" placeholder="Busque um cliente...">
            </div>

            <div class="createBtn">
                <button type="button" class="btn btn-dark" id="openAlertClientChoice">Novo Cliente</button>
                <!-- <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#novoClienteModal">Novo Cliente</button> -->
            </div>
        </div>
    </div>
    <div class="table_section" id="tab-clientes">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone/Celular1</th>
                    <th>Telefone/Celular2</th>
                    <th>CPF/CNPJ</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allClients as $client): ?>
                    <tr>
                        <td><?php echo $client->IDCliente; ?></td>
                        <td><?php echo $client->Nome; ?></td>
                        <td><?php echo $client->Endereco; ?></td>
                        <td><?php echo $client->Telefone1; ?></td>
                        <td><?php echo $client->Telefone2; ?></td>
                        <td><?php echo $client->cpf; ?></td>
                        <td>
                            <button style="background-color: white; border: none; height: 20px" class="editarClienteModal"
                                data-bs-toggle="modal" data-id="<?php echo $client->IDCliente ?>"
                                data-bs-target="#editarClienteModal">
                                <i class="fa-solid fa-pen-to-square" style="font-size: 15px"></i>
                            </button>
                            <button class="getId-excluir" style="background-color: white; border: none"
                                data-bs-toggle="modal" data-id="<?php echo $client->IDCliente ?>"
                                data-bs-target="#excluirCliente2">
                                <i class="fa-solid fa-trash" style="font-size: 15px"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>




<!-- Modal Novo Cliente Sem NFe -->
<div class="modal fade" tabindex="-1" aria-labelledby="novoProdutoModal" id="novoClienteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="clientsForm" action="/cliente/add" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="txt-news">
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Nome</label>
                            <input type="text" name="txtNameCliente" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Endereço</label>
                            <input type="text" name="txtEndCliente" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" id="inputGroup-sizing-default">Telefone/Celular1</label>
                                <input type="text" name="txtTelCel1" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" id="inputGroup-sizing-default">Telefone/Celular2</label>
                                <input type="text" name="txtTelCel2" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" id="inputGroup-sizing-default">CPF/CNPJ</label>
                                <input type="text" name="txtCPFCNPJ" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
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

<!-- Modal Novo Cliente Com NFe -->
<div class="modal fade" tabindex="-1" aria-labelledby="novoClienteNFeModal" id="novoClienteNFeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="clientsNFeForm" action="/cliente/addNFe" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Cliente com NFe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="txtCpf" class="form-label">CPF/CNPJ</label>
                            <input type="text" name="cpf" class="form-control form-control-lg" id="txtCpf">
                        </div>
                        <div class="col-md-6">
                            <label for="txtNomeCompleto" class="form-label">Nome Completo/Razão Social</label>
                            <input type="text" name="nome_completo" class="form-control form-control-lg" id="txtNomeCompleto">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="txtEndereco" class="form-label">Endereço</label>
                            <input type="text" name="endereco" class="form-control form-control-lg" id="txtEndereco">
                        </div>
                        <div class="col-md-4">
                            <label for="txtComplemento" class="form-label">Complemento</label>
                            <input type="text" name="complemento" class="form-control form-control-lg" id="txtComplemento">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="txtNumero" class="form-label">Número</label>
                            <input type="number" name="numero" class="form-control form-control-lg" id="txtNumero">
                        </div>
                        <div class="col-md-3">
                            <label for="txtBairro" class="form-label">Bairro</label>
                            <input type="text" name="bairro" class="form-control form-control-lg" id="txtBairro">
                        </div>
                        <div class="col-md-3">
                            <label for="txtCidade" class="form-label">Cidade</label>
                            <input type="text" name="cidade" class="form-control form-control-lg" id="txtCidade">
                        </div>
                        <div class="col-md-1">
                            <label for="txtUF" class="form-label">UF</label>
                            <input type="text" name="uf" class="form-control form-control-lg" id="txtUF">
                        </div>
                        <div class="col-md-3">
                            <label for="txtCep" class="form-label">CEP</label>
                            <input type="text" name="cep" class="form-control form-control-lg" id="txtCep">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="txtTelefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" class="form-control form-control-lg" id="txtTelefone">
                        </div>
                        <div class="col-md-6">
                            <label for="txtEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg" id="txtEmail">
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


<!-- Modal Custom Alert -->
<div class="modal fade" tabindex="-1" aria-labelledby="customAlertModal" id="customAlertModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Os pedidos desse cliente terá NFe?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCancel">Não</button>
                <button type="button" class="btn btn-primary" id="btnConfirm">Sim</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('openAlertClientChoice').addEventListener('click', function () {
        let customAlertModal = new bootstrap.Modal(document.getElementById('customAlertModal'));
        customAlertModal.show();

        document.getElementById('btnCancel').addEventListener('click', function () {
            customAlertModal.hide();
            let novoClienteModal = new bootstrap.Modal(document.getElementById('novoClienteModal'));
            novoClienteModal.show();
        });

        document.getElementById('btnConfirm').addEventListener('click', function () {
            customAlertModal.hide();
            let outroModal = new bootstrap.Modal(document.getElementById('novoClienteNFeModal'));
            outroModal.show();
        });
    });

    $(document).ready(function () {
        $('#clientsForm').submit(function (e) {
            e.preventDefault();
            console.log($.ajax({
                type: 'POST',
                url: '/cliente/add',
                data: $(this).serialize(),
                success: function (response) {
                    alert("cliente adicionado com sucesso!");
                    $('#clientsForm').modal('hide');
                    location.reload();
                }
            }));
        });
    });
</script>

<!-- Modal Editar Cliente -->
<div class="modal fade" id="editarClienteModal" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editClientForm" action="/cliente/update" method="POST">
                <input type="hidden" name="ClientID" id="editClientID">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarModal">Editar Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="txt-news">
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Nome</label>
                            <input type="text" name="editTxtNameClient" id="editTxtNameClient" value=""
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Endereço</label>
                            <input type="text" name="editTxtAddress" id="editTxtAddress" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Telefone/Celular1</label>
                            <input type="text" name="editTxtPhone1" id="editTxtPhone1" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Telefone/Celular2</label>
                            <input type="text" name="editTxtPhone2" id="editTxtPhone2" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">CPF/CNPJ</label>
                            <input type="text" name="editTxtCPFCNPJ" id="editTxtCPFCNPJ" class="form-control"
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
    $(document).ready(function () {
        console.log("Document is ready");

        $('.editarClienteModal').click(function () {
            var clientID = $(this).data('id');
            console.log("Button clicked, clientID:", clientID);

            $.ajax({
                type: 'GET',
                url: '/cliente/search/' + clientID,
                data: { id: clientID },
                success: function (response) {
                    console.log("Raw response: ", response);

                    let data;
                    if (typeof response === 'string') {
                        try {
                            data = JSON.parse(response);
                        } catch (e) {
                            console.error("Erro ao decodificar JSON: ", e);
                            alert("Erro ao carregar os dados do cliente.");
                            return;
                        }
                    } else {
                        data = response;
                    }

                    if (data.IDCliente && data.Nome && data.Endereco && data.Telefone1 && data.Telefone2 && data.cpf) {
                        $('#editClientID').val(data.IDCliente);
                        $('#editTxtNameClient').val(data.Nome);
                        $('#editTxtAddress').val(data.Endereco);
                        $('#editTxtPhone1').val(data.Telefone1);
                        $('#editTxtPhone2').val(data.Telefone2);
                        $('#editTxtCPFCNPJ').val(data.cpf);
                        $('#editarClienteModal').modal('show');
                    } else {
                        console.error("Dados do cliente incompletos: ", data);
                        alert("Erro ao carregar os dados do cliente.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                    console.error("Response Text: ", xhr.responseText);
                    alert("Erro ao carregar os dados do cliente.");
                }
            });
        });

        $('#editClientForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/cliente/update',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        alert(response.success);
                        $('#editarClienteModal').modal('hide');
                    }
                },
                error: function () {
                    alert("Erro ao atualizar o cliente.");
                }
            });
        });
    });



</script>
<!-- modal EXLUIR cliente -->
<div class="modal fade" id="excluirCliente2" tabindex="-1" aria-labelledby="modalExcluir" aria-hidden="true">
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

        var IDCliente;

        $('.getId-excluir').click(function () {
            IDCliente = $(this).data('id');
        })


        $('.excluir-button').click(function () {

            console.log("btn ex", IDCliente);
            if (IDCliente) {

                console.log($.ajax({
                    type: 'POST',
                    url: '/cliente/delete',
                    data: { IDCliente: IDCliente },
                    success: function (response) {
                        $('#modalExcluir').modal('hide');
                        location.reload();
                    }
                }));
            } else {
                alert("Erro: Não foi possível obter o ID do produto.");
            }
        });
    });

</script>