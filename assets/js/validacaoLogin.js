// function logar() {

//     var Login = document.getElementById('Login').value;
//     var Senha = document.getElementById('Senha').value;


//     if (Login == "" && Senha == "") {
//         alert('Por favor, preencha todos os campos!');
//         return false;
//     }
//     if (Login == "") {
//         alert("Usuário não informado. Por favor, preencha o campo!");
//         return false;
//     }
//     if (Senha == '') {
//         alert("Senha não informada. Por favor, preencha o campo!");
//         return false;
//     }
// }
// Criei essa opção de validação, porém existe uma bem melhor que fora desenvolvida depois e será acrescentada aqui.
// por enquanto irei só colocar o ínicio para testar ela em tela.


function validateEmail (email) {
    return /\S+@\S+\.\S+/.test(email);
    //validação do tipo email

}



function recuperar() {
    window.location.href = "public/recuperacao.php";
}
