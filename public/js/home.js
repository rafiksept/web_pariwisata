const kotak = document.querySelector('.kotak-2');
const navbar = document.querySelector('.navbar');
const navItem = navbar.querySelectorAll('.nav-link');
const user = document.querySelector('.users');


window.addEventListener('scroll' , function() {
    const Yscroll =  window.scrollY;

    if(Yscroll >= kotak.offsetTop - 100){
        navbar.classList.add('bg-white');
        navbar.classList.remove('bg-transparent');
        navbar.querySelector('.navbar-brand').classList.add('text-warning');
        navbar.querySelector('.navbar-brand').classList.remove('text-white');
        if (user !== null){
          user.classList.add('text-warning');
        user.classList.remove('text-white');

        }
        
        
        navItem.forEach(link => {
            link.classList.add('text-dark');
            link.classList.remove('text-white');

        })
        navbar.style.borderBottom = "orange 1px solid";
    } else {
        navbar.classList.remove('bg-white');
        navbar.classList.add('bg-transparent');
        navbar.querySelector('.navbar-brand').classList.remove('text-warning');
        navbar.querySelector('.navbar-brand').classList.add('text-white');

        if (user !== null){
          user.classList.remove('text-warning');
          user.classList.add('text-white');
        }
        
        navItem.forEach(link => {
            link.classList.remove('text-dark');
            link.classList.add('text-white')
        })
        navbar.style.borderBottom = "none";
    }
    
})


if (user !== null){
  const navLink = document.querySelectorAll('.nav-link');
  const floatingMenu = document.querySelector('.floating-menu');
  
  user.addEventListener('click', function (event) {
      if(event.target.closest('span')) {
          if(event.target.closest('span').classList.contains('users')) {
            floatingMenu.classList.toggle('show');
          } else {
            floatingMenu.classList.remove('show');
          }
        } else {
          floatingMenu.classList.remove('show');
        }
  });
  
  
}

const chatBox = document.querySelector('.chat-box');
const closeBtn = document.querySelector('.chat-header');

closeBtn.addEventListener('click', function() {
  chatBox.classList.toggle('open');
});