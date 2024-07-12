<div class="table" style="margin-right: 20px">
    <div class="table_header">
        <div class="pageTitle">
            <h5>Gerenciar produtos</h5>
        </div>
        <hr>
        <div class="options_header">
            <div class="searchInput">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control form-input" placeholder="Busque um produto...">
            </div>
            <div class="createBtn">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#novoProdutoModal">Novo Produto</button>
            </div>
        </div>
    </div>
    <div class="table_section" id="tab-produtos">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allProducts as $product): ?>
                    <tr>
                        <td><?php echo $product->IDProduto; ?></td>
                        <td><?php echo $product->Nome; ?> </td>
                        <td><?php echo $product->ValorQuantidade; ?> </td>
                        <td><?php echo $product->Quantidade; ?> </td>
                        <td>

                            <button style="background-color: white; border: none; height: 20px" class="editar-btn"
                                data-bs-toggle="modal" data-bs-target="#editarModal"
                                data-id="<?php echo $product->IDProduto ?>">
                                <i class="fa-solid fa-pen-to-square" style="font-size: 15px"></i>
                            </button>

                            <button class="getId-excluir" style="background-color: white; border: none"
                                data-bs-toggle="modal" data-bs-target="#modalExcluir"
                                data-id="<?php echo $product->IDProduto ?>">
                                <i class="fa-solid fa-trash" style="font-size: 15px"></i>
                            </button>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<!-- modal novo produto -->

<div class="modal fade" id="novoProdutoModal" tabindex="-1" aria-labelledby="novoProdutoModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="productForm" action="/produtos/adicionar" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="novoProdutoModal">Novo produto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="txt-news">
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default">Nome</label>
                            <input type="text" name="txtNameProduct" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <select class="form-select" name="optionsQuantity" aria-label="Default select example">
                            <option selected>Quantidade</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select><br>
                        <div class="preco-uni">
                            <div class="input-group mb-3">
                                <label class="input-group-text" id="inputGroup-sizing-default">Preço por
                                    Quantidade</label>
                                <input type="text" name="txtValuePerQuantity" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
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
        $('#productForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/produtos/add',
                data: $(this).serialize(),
                success: function (response) {
                    alert("Produto adicionado com sucesso!");
                    $('#myModal').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>

<!-- Modal Editar Produto -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editProductForm">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarModalLabel">Editar Produto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="productID" id="editProductID">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="editTxtNameProduct">Nome</label>
                        <input type="text" name="editTxtNameProduct" id="editTxtNameProduct" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="editOptionsQuantity">Quantidade</label>
                        <input type="number" name="editOptionsQuantity" id="editOptionsQuantity" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="editTxtValuePerQuantity">Preço por Quantidade</label>
                        <input type="text" name="editTxtValuePerQuantity" id="editTxtValuePerQuantity"
                            class="form-control">
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
        console.log("Document is ready");

        $('.editar-btn').click(function () {
            var productID = $(this).data('id');
            console.log("Button clicked, productID:", productID);

            $.ajax({
                type: 'GET',
                url: '/produtos/search/' + productID,
                data: { id: productID },
                success: function (response) {
                    console.log("Raw response: ", response);

                    // Attempt to parse the response if it is a string
                    let data;
                    if (typeof response === 'string') {
                        try {
                            data = JSON.parse(response);
                        } catch (e) {
                            console.error("Erro ao decodificar JSON: ", e);
                            alert("Erro ao carregar os dados do produto.");
                            return;
                        }
                    } else {
                        data = response;
                    }

                    // Ensure data contains the expected fields
                    if (data.IDProduto && data.Nome && data.Quantidade && data.ValorQuantidade) {
                        $('#editProductID').val(data.IDProduto);
                        $('#editTxtNameProduct').val(data.Nome);
                        $('#editOptionsQuantity').val(data.Quantidade);
                        $('#editTxtValuePerQuantity').val(data.ValorQuantidade);
                        $('#editarModal').modal('show');
                    } else {
                        console.error("Dados do produto incompletos: ", data);
                        alert("Erro ao carregar os dados do produto.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                    console.error("Response Text: ", xhr.responseText);
                    alert("Erro ao carregar os dados do produto.");
                }
            });

        });





        $('#editProductForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/produtos/update',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        alert(response.success);
                        $('#editarModal').modal('hide');
                        location.reload();
                    }
                },
                error: function () {
                    alert("Erro ao atualizar o produto.");
                }
            });
        });
    });
</script>

<!-- modal EXLUIR produto -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-primary excluir-btn" id="md-close">Excluir</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        var productID;

        $('.getId-excluir').click(function () {
            productID = $(this).data('id');
        });

        $('.excluir-btn').click(function () {

            console.log(productID);
            if (productID) {

                console.log($.ajax({
                    type: 'POST',
                    url: '/produtos/delete',
                    data: { productID: productID },
                    success: function (response) {

                        $('#myModal').modal('hide');
                        location.reload();
                    }
                }));
            } else {
                alert("Erro: Não foi possível obter o ID do produto.");
            }
        });
    });

</script>