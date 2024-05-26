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
                <label for="text">Clientes</label>
            </div>
            <div class="createBtn">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#novoClienteModal">Novo Cliente</button>
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
            <TBody>
                <td>1</td>
                <td>Sarah Paganini</td>
                <td>Rua Elvira botos número XXX</td>
                <td>(43)999518245</td>
                <td>-</td>
                <td>000.000.000-00</td>
                <td>
                    <button style="background-color: white; border: none; height: 20px" data-bs-toggle="modal"
                        data-bs-target="#editarClienteModal">
                        <i class="fa-solid fa-pen-to-square" style="font-size: 15px"></i>
                    </button>
                    <button style="background-color: white; border: none" data-bs-toggle="modal"
                        data-bs-target="#excluirCliente">
                        <i class="fa-solid fa-trash" style="font-size: 15px"></i>
                    </button>

                </td>
            </TBody>
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
</div>
<div>
    <!-- modal novo cliente -->
    <div class="modal" tabindex="-1" id="novoClienteModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="txt-news">
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Nome</label>
                            <input type="text" name="txtNameProduct" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Endereço</label>
                            <input type="text" name="txtEndProduct" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="preco-uni">
                            <div class="input-group mb-3">
                                <label class="input-group-text" id="inputGroup-sizing-default">Telefone/Celular1</label>
                                <input type="text" name="txtValuePerQuantity" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" id="inputGroup-sizing-default">Telefone/Celular2</label>
                                <input type="text" name="txtValuePerQuantity" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" id="inputGroup-sizing-default">CPF/CNPJ</label>
                                <input type="text" name="txtValuePerQuantity" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal Editar cliente -->
    <div class="modal fade" id="editarClienteModal" tabindex="-1" aria-labelledby="novoProdutoModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="form" action="" method="">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editarModal">Editar Cliente</h1>
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
                                    <label class="input-group-text"
                                        id="inputGroup-sizing-default">Telefone/Celular1</label>
                                    <input type="text" name="txtTel-Cel" class="form-control"
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text"
                                        id="inputGroup-sizing-default">Telefone/Celular2</label>
                                    <input type="text" name="txtTel-Cel" class="form-control"
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" id="inputGroup-sizing-default">CPF/CNPJ</label>
                                    <input type="text" name="txtCPF-CNPJ" class="form-control"
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
 <!-- modal EXLUIR cliente -->
    <div class="modal fade" id="excluirCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" id="md-excluir">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Confirme no botão abaixo a exclusão deste registro</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="md-close">Excluir</button>
                </div>
            </div>
        </div>
    </div>