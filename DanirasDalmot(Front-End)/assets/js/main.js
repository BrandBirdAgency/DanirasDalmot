const doc = document;
const menuOpen = doc.querySelector(".menu");
const menuClose = doc.querySelector(".close");
const overlay = doc.querySelector(".overlay");

menuOpen.addEventListener("click", () => {
  overlay.classList.add("overlay--active");
});
menuClose.addEventListener("click", () => {
  overlay.classList.remove("overlay--active");
});

// HEADER SCROLL EFFECT
window.addEventListener("scroll", () => {
  const header = document.querySelector("header");
  header.classList.toggle("scrollingheader", window.scrollY > 150);
});
