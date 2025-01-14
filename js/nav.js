const menu = document.querySelector(".menu");

const nav = document.querySelector("nav");

menu.addEventListener("click", () => {
    menu.classList.toggle("active");
    nav.classList.toggle("active");
});

const profile = document.querySelector(".profile");

const profileImg = document.querySelector(".profileImg  img");

profileImg.addEventListener("click", () => {
    profile.classList.toggle("active");
});