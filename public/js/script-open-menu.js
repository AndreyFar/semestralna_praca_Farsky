const menuButton = document.querySelector(".menu-btn");
const navBar = document.querySelector(".nav-links");
const body = document.body;

menuButton.addEventListener('click', () => {
    navBar.classList.toggle("mobile-menu");
    body.classList.toggle("no-scroll");
});

window.addEventListener("scroll", function() {
    navBar.style.paddingTop = 200 + window.scrollY + "px";
});