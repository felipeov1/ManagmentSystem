document.addEventListener("DOMContentLoaded", function () {
    var currentUrl = window.location.pathname;
    var navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(function (link) {
        var href = link.getAttribute("href");
        if (currentUrl === href) {
            link.classList.add("selected");
        }
    });
});
