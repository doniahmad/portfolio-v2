// when navbar scroll in main page
let prevYScroll = window.scrollY;
window.onscroll = () => {
  const currentScrollPosition = window.scrollY;
  const navbar = document.getElementById("navbar");

  if (prevYScroll > currentScrollPosition) {
    navbar.style.top = 0;
  } else {
    navbar.style.top = "-80px";
  }
  prevYScroll = currentScrollPosition;
};
