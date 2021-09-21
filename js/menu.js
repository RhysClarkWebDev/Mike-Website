const menuIcon = document.querySelector('.hamburger-menu');
const navBar = document.querySelector('.navBar');
const navList = document.querySelector('.nav-list');

navList.addEventListener('click', () => {
  navBar.classList.toggle('change');
})


menuIcon.addEventListener('click', () => {
  navBar.classList.toggle('change');
})
