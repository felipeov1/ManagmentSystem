 <div class="table" style="margin-right: 20px">
     <div class="table_header">
         <div class="pageTitle">
             <h5>Sistema</h5>
         </div>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
         <hr>

         <div class="container-fluid">
             <div class="tabs">
                 <div class="tab-header">
                     <div class="active">
                         <i class="fa fa-user"></i> Usuário
                     </div>
                     <div>
                         <i class="fa fa-pencil-square"></i> Sobre
                     </div>
                     <div>
                         <i class="fa fa-bar-chart"></i> Serviços
                     </div>
                     <div>
                         <i class="fa fa-envelope"></i> Contato
                     </div>
                 </div>

                 <div class="tab-indicator"></div>

                 <div class="tab-content">
                     <div class="active">
                         <div class="row mb-5 mt-3">
                             <h4 class="mb-5 mt-3"> <i class="fa fa-user"></i> Configurações do Usuário:</h4>
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
                                 <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="••••••••••">
                                 <div><i class="fa-solid fa-eye" id="btn-senha" onclick="mostrarSenha()"></i></div>

                             </div>
                             <div class="col-6">
                                 <label for="txtNome">Repita sua senha:</label>
                                 <input type="password" name="txtPasswordRpt" id="txtPasswordRpt" class="form-control" placeholder="••••••••••">
                                 <div><i class="fa-solid fa-eye" id="btn-senha-rpt" onclick="mostrarSenhaRpt()"></i></div>

                             </div>


                         </div>

                         <div class="row mb-5">
                             <div class="col-12">
                                 <button type="button" class="btn btn-danger float-end">Salvar</button>
                             </div>
                         </div>



                     </div> <!-- fim div active -->

                     <div>
                         <h1>TESTE</h1>
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