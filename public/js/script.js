// ANIMASI DAFTAR MENU
document.addEventListener("DOMContentLoaded", function () {
    const activeLink = document.querySelector("a.active");
    if (activeLink) {
        activeLink.classList.remove("active");
        void activeLink.offsetWidth;
        activeLink.classList.add("active");
    }
});


// ANIMASI TOMBOL LOGIN
let btnLogin = document.querySelector('.btn-login');
let button = document.querySelector('.btn-nyala');
let interval;

let spawnDistance = 30;
function createParticles(){
    let particles = document.createElement('div');
    particles.classList.add('particles');
    let btnWidth = button.offsetWidth;
    let btnHeight = button.offsetHeight;

    let angle = Math.random() * 2 * Math.PI;
    let x = btnWidth / 2 + Math.cos(angle) * spawnDistance;
    let y = btnHeight / 2 + Math.sin(angle) * spawnDistance;

    let dx = Math.cos(angle) * 100;
    let dy = Math.sin(angle) * 100;

    particles.style.left = `${x}px`;
    particles.style.top = `${y}px`;
    particles.style.setProperty('--dx', `${dx}px`);
    particles.style.setProperty('--dy', `${dy}px`);

    btnLogin.appendChild(particles);
    setTimeout(() => {
        particles.remove()
    },2000)
}

button.addEventListener('mouseenter', () => {
    interval = setInterval(createParticles,80) 
})

button.addEventListener('mouseleave', () => {
    clearInterval(interval)
})


// NAVBAR NAIK TURUN
let lastScrollTop = 0;
  const navbar = document.getElementById('navbar');

  window.addEventListener("scroll", function () {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
      navbar.style.top = "-100px";
    } else {
      navbar.style.top = "0";
    }

    lastScrollTop = scrollTop;
  });


// ANIMASI AWARDS
const container = document.getElementById("rotatingContainer");

setInterval(() => {
  const children = container.children;

  for (let i = 0; i < children.length; i++) {
    children[i].style.transition = "opacity 0.5s ease";
    children[i].style.opacity = "0";
  }

  setTimeout(() => {
    container.appendChild(children[0]);

    for (let i = 0; i < children.length; i++) {
      children[i].style.transition = "opacity 0.5s ease";
      children[i].style.opacity = "1";
    }
  }, 500);
}, 3000);


// ANIMASI WHYUBSI
const bjir = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animate');
    }
  });
});

const target = document.querySelectorAll('.txtbx .p p, .txtbx h1, .imgbx img').forEach(el => {
  bjir.observe(el);
})

// ANIMASI COUNT
const counters = document.querySelectorAll('.counter');
let observerStarted = false;

const animateCount = (counter) => {
  const target = +counter.getAttribute('data-target');
  let count = 0;
  const increment = Math.ceil(target / 100);
  const update = () => {
    count += increment;
    if (count < target) {
      counter.innerText = count;
      requestAnimationFrame(update);
    } else {
      counter.innerText = target;
    }
  };

  update();
};
const arya = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !observerStarted) {
        counters.forEach(counter => animateCount(counter));
        observerStarted = true;
        observer.disconnect();
      }
    });
  }, {
    threshold: 0.3
  });

const section = document.querySelector('.statistik-container');
arya.observe(section);


const boxes = document.querySelectorAll('.fasilitas-box');

boxes.forEach(box => {
  box.addEventListener('mouseenter', () => {
    const position = box.dataset.position; // ambil dari data-position misalnya "left", "center", "right"

    // Reset semua posisi dulu
    boxes.forEach(el => {
      el.classList.remove('active-left', 'active-center', 'active-right');
    });

    if (position === 'left') {
      box.classList.add('active-center');
      boxes.forEach(el => {
        if (el.dataset.position === 'center') el.classList.add('active-right');
        if (el.dataset.position === 'right') el.classList.add('active-left');
      });
    } else if (position === 'center') {
      box.classList.add('active-center');
      // Jangan ubah posisi kiri dan kanan
    } else if (position === 'right') {
      box.classList.add('active-center');
      boxes.forEach(el => {
        if (el.dataset.position === 'left') el.classList.add('active-right');
        if (el.dataset.position === 'center') el.classList.add('active-left');
      });
    }
  });

  box.addEventListener('mouseleave', () => {
    // Reset semua posisi saat mouse keluar
    boxes.forEach(el => {
      el.classList.remove('active-left', 'active-center', 'active-right');
    });
  });
});
