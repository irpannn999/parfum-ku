// Toggle class active untuk hamburger menu
const navbarNav = document.querySelector(".navbar-nav");

//ketika hamburger di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// toggle class active
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");
const shoppingCart = document.querySelector(".shopping-cart");

document.querySelector("#search-button").onclick = (e) => {
  searchForm.classList.toggle("active");
  searchBox.focus();
  e.preventDefault();
};

document.querySelector("#shopping-cart-button").onclick = (e) => {
  shoppingCart.classList.toggle("active");
  e.preventDefault();
};

// klik disembarang tempat
const hm = document.querySelector("#hamburger-menu");
const sb = document.querySelector("#search-button");
const sc = document.querySelector("#shopping-cart-button");

document.addEventListener("click", function (e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove("active");
  }
  if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
    shoppingCart.classList.remove("active");
  }
});

// modal box
const itemDetailModal = document.querySelector("#item-detail-modal");
const itemDetailButton = document.querySelector(".item-detail-button");

itemDetailButton.onclick = (e) => {
  itemDetailModal.style.display = "flex";
  e.preventDefault();
};

// klik tombol close modal
document.querySelector(".modal .close").onclick = (e) => {
  itemDetailModal.style.display = "none";
  e.preventDefault();
};

// klik sembarang tempat utk modal
window.onclick = (e) => {
  if (e.target === itemDetailModal) {
    itemDetailModal.style.display = "none";
  }
};
