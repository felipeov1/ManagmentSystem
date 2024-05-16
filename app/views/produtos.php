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
    <div class="table_section">
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
            <?php foreach ($allProducts as $product): ?>
                <TBody>
                    <td id="numId"><?php echo $product->IDProduto; ?></td>
                    <td><?php echo $product->Nome; ?> </td>
                    <td><?php echo $product->ValorQuantidade; ?> </td>
                    <td><?php echo $product->Quantidade; ?> </td>
                    <td>

                        <button style="background-color: white; border: none; height: 20px" class="editar-btn"
                            data-bs-toggle="modal" data-bs-target="#editarModal"
                            data-id="<?php echo $product->IDProduto ?>">
                            <i class="fa-solid fa-pen-to-square" style="font-size: 15px"></i>
                        </button>

                        <button class="getId-excluir" style="background-color: white; border: none" data-bs-toggle="modal"
                            data-bs-target="#modalExcluir" data-id="<?php echo $product->IDProduto ?>">
                            <i class="fa-solid fa-trash" style="font-size: 15px"></i>
                        </button>

                    </td>
                </TBody>
            <?php endforeach ?>
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

<!-- modal editar produto -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="novoProdutoModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form" action="/produtos/adicionar" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarModal">Editar Produto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="txt-news">
                        <div class="input-group mb-3">
                            <label class="input-group-text" id="inputGroup-sizing-default" value=""></label>
                            <input type="text" name="txtNameProduct" id="txtNameProduct" class="form-control"
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
        $('.editar-btn').click(function () {
            var productID = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: '/produtos/search',
                data: { id: productID },
                success: function (response) {

                    $('#txtNameProduct').val(response.Nome);
                    $('#optionsQuantity').val(response.Quantidade);
                    $('#txtValuePerQuantity').val(response.ValorQuantidade);

                    console.log(response);
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