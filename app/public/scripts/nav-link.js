document.addEventListener("DOMContentLoaded", function () {
    var currentUrl = window.location.pathname;
    var navItems = document.querySelectorAll(".nav-item");

    navItems.forEach(function (item) {
        var link = item.querySelector(".nav-link");
        var href = link.getAttribute("href");

        // Verifica se o caminho atual corresponde ao href do item de navegação
        if (currentUrl === href) {
            item.classList.add("active"); // Adiciona a classe .active ao item de navegação
        } else {
            item.classList.remove("active"); // Remove a classe .active caso não corresponda
        }
    });
});