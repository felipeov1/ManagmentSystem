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

            <!-- <div class="createBtn">
                <button type="button" data-bs-toggle="modal" data-bs-target="#novoProdutoModal" class="btn btn-dark" id="btnNews">Novo Produto</button>
            </div> -->

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoProdutoModal">
                Launch demo modal
            </button>

        </div>
    </div>
    <div class="table_section">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <TBody>
                <td>1</td>
                <td>Bolo de chocolate</td>
                <td>20,00</td>
                <td>
                    <button type="button" Id="btn-Editar"  data-bs-toggle="modal" data-bs-target="#modalEditar" style="background-color: white; border: none; height: 20px" >
                        <i class="fa-solid fa-pen-to-square" style="font-size: 15px"></i>
                    </button>
                    <button  style="background-color: white; border: none" id="btn-closed1">
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
<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////// MODAL NOVO PRODUTOS ///////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="modal fade" tabindex="-1" aria-labelledby="novoProdutoModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel1">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- <dialog id="novo-produto">
<h2 class="label-np">Novo produto</h2>
    <hr>
            <div class="txt-news">
            <label for="descricao">Descrição</label>
            <input type="text" id="Descricao" value=""><br><br>
            <label for="unidade-medida">Unidade</label>
            <input type="text" id="um" value=""><br><br>
            <label for="preco">Preço Unitário</label>
            <input type="text" id="preco" value=""><br><br>
            </div>
            <hr>
            <div class="btn-nv-ec">
            <button type="button" class="cancel-button" id="btn-ModalNP">Cancelar</button>
            <button type="submit" class="envia-button">Enviar</button>
            </div>
<dialog> -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////// MODAL EDITAR PRODUTOS ///////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- <dialog id="editar">
    <h2>Editar produto</h2>
    <hr>
    <label for="descricao">Descrição</label>
    <input type="text" id="Descricao1" value=""></br>
    <label for="unidade-medida1">Unidade</label>
    <input type="text" id="um1" value=""></br>
    <label for="preco">Preço Unitário</label>
    <input type="text" id="preco1" value=""></br>
    <hr>
    <div class="btn-">
        <button type="submit">Enviar</button>
            <button type="button" id="btn-ModalEd">Cancelar</button>
            </div>
</dialog> -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////// MODAL EXLUIR PRODUTO///////////////// ///////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<dialog id="modalClosed1">
<div id="modalExcluirProduto" class="modal-excluir">
  <div class="modal-conteudo">
    <span class="modal-fechar">&times;</span>
    <h2>Excluir Produto</h2>
    <p>Tem certeza de que deseja excluir este produto?</p>
    <button id="btnExcluir">Excluir</button>
    <button id="btnCancelar">Cancelar1</button>
  </div>
</div>
<dialog>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////// JAVA ////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- <script>
// const btn = document.getElementById("btnNews")
// const modal = document.getElementById("novo-produto")
// const btnClose = document.getElementById("btn-ModalNP")
// btn.onclick =  function() {
//     modal.showModal()
// }
// btnClose.onclick = function () { 
//     modal.close()
// }
const btnEditar = document.getElementById("btn-Editar")
const modal = document.getElementById("editar")
btnEditar.onclick = function(){
    modal.showModal()
}
const btn2 = document.getElementById("btn-closed1")
const modal2 = document.getElementById("modalClosed1")
const btnClose2 = document.getElementById("btnCancelar")
btn2.onclick =  function() {
    modal2.showModal()
}
btnClose2.onclick = function () { 
    modal2.close()
} -->
</script>

