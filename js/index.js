document.addEventListener('DOMContentLoaded', function() {
    const menuBar = document.querySelector('.menu-bar');
    const navbarMenu = document.querySelector('.navbar-menu');
    
    menuBar.addEventListener('click', function() {
        navbarMenu.classList.toggle('show-menu');
    });
});


function toggleFaq(element) {
    const faqItem = element.parentElement;
    const answer = faqItem.querySelector('.faq-answer');
    const symbol = element.querySelector('.toggle-symbol');
  
    if (faqItem.classList.contains('open')) {
      faqItem.classList.remove('open');
      symbol.textContent = '+';
    } else {
      faqItem.classList.add('open');
      symbol.textContent = '-';
    }
  }
  