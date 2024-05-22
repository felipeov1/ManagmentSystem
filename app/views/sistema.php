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
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#novoProdutoModal">Novo Usuário</button>
            </div>
        </div>
    </div>
    <div class="table_section">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Setor</th>
                    <th>Nível</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <TBody>
                <td>Usuário</td>
                <td>email@gmail.com</td>
                <td>000.000.000-00</td>
                <td>Setor</td>
                <td>1</td>
                <td>
                <button style="background-color: white; border: none; height: 20px" data-bs-toggle="modal" data-bs-target="#editarModal">
                        <i class="fa-solid fa-pen-to-square" style="font-size: 15px"></i>
                    </button>
                    <button style="background-color: white; border: none" data-bs-toggle="modal" data-bs-target="#modalExcluir">
                        <i class="fa-solid fa-trash" style="font-size: 15px"></i>
                    </button>
                    <button style="background-color: white; border: none; height: 20px" data-bs-toggle="modal" data-bs-target="#açãoOlhinho">
                        <i class="fa-solid fa-eye" style="font-size: 15px"></i>
                        
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


<!-- modal novo produto -->

<div class="modal fade" id="novoProdutoModal" tabindex="-1" aria-labelledby="novoProdutoModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="novoProdutoModal">Cadastrar novo usuário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="active">
                        <div class="row mb-5 mt-3">

                            <div class="col-6">

                                <label for="txtNome">Nome:</label>
                                <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Digite seu nome">
                            </div>
                            <div class="col-6">
                                <label for="txtEmail">Email:</label>
                                <input type="text" name="" id="txtEmail" class="form-control" placeholder="Digite seu email">
                                <select class="form-select mt-2" id="emailSuggestion" style="display: none;">
                                    <option value="@gmail.com">Gmail</option>
                                    <option value="@outlook.com">Outlook</option>
                                    <option value="@hotmail.com">Hotmail</option>
                                </select>
                            </div>



                        </div>
                        <div class="row mb-5">
                            <div class="col-12">
                                <label for="txtNome">CPF:</label>
                                <input type="text" name="txtCpf" id="txtCpf" class="form-control" placeholder="Digite seu CPF">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="txtNome">Senha:</label>
                                <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="••••••••••">
                                <div><i class="fa-solid fa-eye" id="btn-senha" onclick="mostrarSenha()"></i></div>

                            </div>
                            <div class="col-6">
                                <label for="txtNome">Repita sua senha:</label>
                                <input type="password" name="txtPasswordRpt" id="txtPasswordRpt" class="form-control" placeholder="••••••••••">
                                <div><i class="fa-solid fa-eye" id="btn-senha-rpt" onclick="mostrarSenhaRpt()"></i></div>

                            </div>


                        </div>





                    </div> <!-- fim div active -->



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal olhinho -->
<div class="modal fade" id="açãoOlhinho" tabindex="-1" aria-labelledby="açãoOlhinho" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="açãoOlhinho">Informações do cadastro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="active">
                        <div class="row mb-5 mt-3">

                            <div class="col-6">

                                <label for="txtNome">Nome:</label>
                                <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Digite seu nome">
                            </div>
                            <div class="col-6">
                                <label for="txtEmail">Email:</label>
                                <input type="text" name="" id="txtEmail" class="form-control" placeholder="Digite seu email">
                                <select class="form-select mt-2" id="emailSuggestion" style="display: none;">
                                    <option value="@gmail.com">Gmail</option>
                                    <option value="@outlook.com">Outlook</option>
                                    <option value="@hotmail.com">Hotmail</option>
                                </select>
                            </div>



                        </div>
                        <div class="row mb-5">
                            <div class="col-12">
                                <label for="txtNome">CPF:</label>
                                <input type="text" name="txtCpf" id="txtCpf" class="form-control" placeholder="Digite seu CPF">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="txtNome">Senha:</label>
                                <input type="password" name="txtPasswordRpt1" id="txtPasswordRpt1" class="form-control" placeholder="••••••••••">
                                <div><i class="fa-solid fa-eye" id="btn-senha-rpt1" onclick="mostrarSenha()"></i></div>

                            </div>
                            <div class="col-6">
                                <label for="txtNome">Repita sua senha:</label>
                                <input type="password" name="txtPasswordRpt2" id="txtPasswordRpt2" class="form-control" placeholder="••••••••••">
                                <div><i class="fa-solid fa-eye" id="btn-senha-rpt2" onclick="mostrarSenhaRpt()"></i></div>

                            </div>


                        </div>





                    </div> <!-- fim div active -->



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>


<!-- modal editar produto -->
<div class="modal" id="editarModal" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editarModal">Editar cadastro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="tab-content">
                     <div class="active">
                         <div class="row mb-5 mt-3">
                             <div class="col-6">

                                 <label for="txtNome">Nome:</label>
                                 <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Digite seu nome">
                             </div>
                             <div class="col-6">
                                 <label for="txtEmail">Email:</label>
                                 <input type="text" name="" id="txtEmail" class="form-control" placeholder="Digite seu email">
                                 <select class="form-select mt-2" id="emailSuggestion" style="display: none;">
                                     <option value="@gmail.com">Gmail</option>
                                     <option value="@outlook.com">Outlook</option>
                                     <option value="@hotmail.com">Hotmail</option>
                                 </select>
                             </div>



                         </div>
                         <div class="row mb-5">
                             <div class="col-12">
                                 <label for="txtNome">CPF:</label>
                                 <input type="text" name="txtCpf" id="txtCpf" class="form-control" placeholder="Digite seu CPF">
                             </div>
                         </div>
                         <div class="row mb-5">
                             <div class="col-6">
                                 <label for="txtNome">Senha:</label>
                                 <input type="password" name="txtPasswordRpt3" id="txtPasswordRpt3" class="form-control" placeholder="••••••••••">
                                 <div><i class="fa-solid fa-eye" id="btn-senha-rpt3" onclick="mostrarSenha()"></i></div>

                             </div>
                             <div class="col-6">
                                 <label for="txtNome">Repita sua senha:</label>
                                 <input type="password" name="txtPasswordRpt4" id="txtPasswordRpt4" class="form-control" placeholder="••••••••••">
                                 <div><i class="fa-solid fa-eye" id="btn-senha-rpt4" onclick="mostrarSenhaRpt()"></i></div>

                             </div>


                         </div>

    
                     </div> <!-- fim div active -->

                     

                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- modal EXCLUIR produto -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="md-excluir">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir cadastro?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Confirme no botão abaixo a exclusão deste cadastro.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="md-close">Excluir</button>
            </div>
        </div>
    </div>
</div>


<!-- Script para permitir apenas letras no campo de entrada de nome -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const nomeInput = document.getElementById('txtNome');

        nomeInput.addEventListener('input', () => {
            // Remove caracteres não alfabéticos usando regex
            nomeInput.value = nomeInput.value.replace(/[^a-zA-ZÀ-ÿ\s]/g, '');
        });

        nomeInput.addEventListener('keypress', (event) => {
            // Permitir apenas letras, espaços e caracteres acentuados
            const char = String.fromCharCode(event.which);
            if (!/^[a-zA-ZÀ-ÿ\s]*$/.test(char)) {
                event.preventDefault();
            }
        });
    });
</script>

<!-- Script para sugerir preenchimento de email -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const emailInput = document.getElementById('txtEmail');
        const emailSuggestion = document.getElementById('emailSuggestion');

        emailInput.addEventListener('input', () => {
            const value = emailInput.value.trim();
            const atIndex = value.indexOf('@');

            if (atIndex === -1) {
                emailSuggestion.style.display = 'none';
                return;
            }

            const prefix = value.substring(0, atIndex);
            const domainPart = value.substring(atIndex);
            const domains = ['@gmail.com', '@outlook.com', '@hotmail.com'];
            const matchingDomains = domains.filter(domain => domain.startsWith(domainPart));

            if (matchingDomains.length > 0) {
                emailSuggestion.innerHTML = '';
                matchingDomains.forEach(domain => {
                    const option = document.createElement('option');
                    option.value = domain;
                    option.textContent = domain;
                    emailSuggestion.appendChild(option);
                });
                emailSuggestion.style.display = 'block';
            } else {
                emailSuggestion.style.display = 'none';
            }
        });

        emailSuggestion.addEventListener('change', () => {
            const selectedDomain = emailSuggestion.value;
            const value = emailInput.value;
            const atIndex = value.indexOf('@');
            if (atIndex !== -1) {
                const prefix = value.substring(0, atIndex);
                emailInput.value = prefix + selectedDomain;
            }
            emailSuggestion.style.display = 'none';
        });
    });
</script>

<!-- função show/hide senha -->
<script>
    function mostrarSenha() {
        var inputPass = document.getElementById('txtPassword')
        var btnShowPass = document.getElementById('btn-senha')

        if (inputPass.type === 'password') {
            inputPass.setAttribute('type', 'text')
            btnShowPass.classList.replace('fa-eye', 'fa-eye-slash')
        } else {
            inputPass.setAttribute('type', 'password')
            btnShowPass.classList.replace('fa-eye-slash', 'fa-eye')
        }
    }

    function mostrarSenhaRpt() {
        var inputPass = document.getElementById('txtPasswordRpt')
        var btnShowPass = document.getElementById('btn-senha-rpt')

        if (inputPass.type === 'password') {
            inputPass.setAttribute('type', 'text')
            btnShowPass.classList.replace('fa-eye', 'fa-eye-slash')
        } else {
            inputPass.setAttribute('type', 'password')
            btnShowPass.classList.replace('fa-eye-slash', 'fa-eye')
        }
    }
</script>
<!-- função show/hide senha modal olhinho -->
<script>
    function mostrarSenha() {
        var inputPass = document.getElementById('txtPasswordRpt1')
        var btnShowPass = document.getElementById('btn-senha-rpt1')

        if (inputPass.type === 'password') {
            inputPass.setAttribute('type', 'text')
            btnShowPass.classList.replace('fa-eye', 'fa-eye-slash')
        } else {
            inputPass.setAttribute('type', 'password')
            btnShowPass.classList.replace('fa-eye-slash', 'fa-eye')
        }
    }

    function mostrarSenhaRpt() {
        var inputPass = document.getElementById('txtPasswordRpt2')
        var btnShowPass = document.getElementById('btn-senha-rpt2')

        if (inputPass.type === 'password') {
            inputPass.setAttribute('type', 'text')
            btnShowPass.classList.replace('fa-eye', 'fa-eye-slash')
        } else {
            inputPass.setAttribute('type', 'password')
            btnShowPass.classList.replace('fa-eye-slash', 'fa-eye')
        }
    }
</script>
<!-- função show/hide senha modal editar -->
<script>
    function mostrarSenha() {
        var inputPass = document.getElementById('txtPasswordRpt3')
        var btnShowPass = document.getElementById('btn-senha-rpt3')

        if (inputPass.type === 'password') {
            inputPass.setAttribute('type', 'text')
            btnShowPass.classList.replace('fa-eye', 'fa-eye-slash')
        } else {
            inputPass.setAttribute('type', 'password')
            btnShowPass.classList.replace('fa-eye-slash', 'fa-eye')
        }
    }

    function mostrarSenhaRpt() {
        var inputPass = document.getElementById('txtPasswordRpt4')
        var btnShowPass = document.getElementById('btn-senha-rpt4')

        if (inputPass.type === 'password') {
            inputPass.setAttribute('type', 'text')
            btnShowPass.classList.replace('fa-eye', 'fa-eye-slash')
        } else {
            inputPass.setAttribute('type', 'password')
            btnShowPass.classList.replace('fa-eye-slash', 'fa-eye')
        }
    }
</script>




<!-- Script para aplicar máscara de CPF -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const cpfInput = document.getElementById('txtCpf');

        cpfInput.addEventListener('input', () => {
            let value = cpfInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (value.length > 11) {
                value = value.slice(0, 11); // Limita a 11 dígitos
            }
            // Aplica a máscara no formato XXX.XXX.XXX-XX
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            cpfInput.value = value;
        });
    });
</script>

<!-- FUNÇÃO MUDAR SCREEN  -->

<script>
    function _class(name) {
        return document.getElementsByClassName(name);
    }

    let tabPanes = _class("tab-header")[0].getElementsByTagName("div");

    for (let i = 0; i < tabPanes.length; i++) {
        tabPanes[i].addEventListener("click", function() {
            _class("tab-header")[0].getElementsByClassName("active")[0].classList.remove("active");
            tabPanes[i].classList.add("active");

            _class("tab-indicator")[0].style.top = `calc(20px + ${i*50}px)`;

            _class("tab-content")[0].getElementsByClassName("active")[0].classList.remove("active");

            _class("tab-content")[0].getElementsByTagName("div")[i].classList.add("active");
        });
    }
</script>