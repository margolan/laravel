import './bootstrap';


// ==================== Days Styles ====================


const cell = document.querySelectorAll('.cell');

const cellStyle = {
  "+": "dark:text-orange-500 font-bold",
  // "-": "dark:text-purple-500 font-bold",
  "D": "text-sm dark:text-orange-500",
  "O": "text-sm dark:text-gray-500 dark:bg-[url('/assets/cell_bg.png')]",
  "K": "text-sm dark:text-red-500 dark:bg-[url('/assets/cell_bg.png')]",
};

cell.forEach(e => {
  let text = e.innerText.trim();
  if (cellStyle[text]) {
    e.classList.add(...cellStyle[text].split(' '));
  }
})


// ==================== Keys ====================


const search = document.querySelector('.search');
const found = document.querySelector('.found');
const scroll_up = document.querySelector('.scroll_up');

if (search) {
  search.addEventListener('input', function (e) {

    const query = e.target.value.toLowerCase();
    let matches = 0;

    cell.forEach(el => {
      const cellText = el.textContent.toLowerCase();
      if (query && cellText.includes(query)) {
        matches++;
        found.textContent = matches;
        el.parentElement.classList.remove('hidden')
      } else {
        found.textContent = matches;
        el.parentElement.classList.add('hidden')
      }
    });

    if (!query) {

      cell.forEach(el => {
        el.parentElement.classList.remove('hidden')
      });

    }
  })

  window.addEventListener('scroll', e => {
    window.scrollY > 200 ? scroll_up.classList.remove('invisible') : scroll_up.classList.add('invisible')
  })

  scroll_up.addEventListener('click', () => { window.scrollTo(0, 0); })

}


// ==================== Burger Menu ====================


const menu = document.querySelector('.menu');
const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav');
const arrow = document.querySelector('.arrow');

menu.addEventListener('click', () => {
  nav.classList.toggle('max-h-6');
  nav.classList.toggle('overflow-hidden');
  nav.classList.toggle('max-h-screen');

  burger.classList.toggle('rotate-180');
  burger.classList.toggle('opacity-0');

  arrow.classList.toggle('rotate-180');
  arrow.classList.toggle('opacity-0');
});


// ==================== Session Status ====================


function hide_status() {
  document.querySelector('.status')?.classList.add('opacity-0', 'translate-y-5')
  setTimeout(() => { document.querySelector('.status')?.classList.add('hidden') }, 500);
}
setTimeout(() => { hide_status() }, 4000)
document.querySelector('.status')?.addEventListener('click', hide_status);


// ==================== Main Page ====================


document.querySelectorAll('.link')?.forEach(function (e) {
  e.addEventListener('click', function () {
    let link_id = this.id;
    document.querySelectorAll('.accordion').forEach(function (el) {
      if (!el.classList.contains(link_id)) {
        el.style.height = 0 + 'px'
      } else {
        if (el.style.height == 0 + 'px') {
          el.style.height = el.scrollHeight + 'px'
        } else {
          el.style.height = 0 + 'px'
        }
      }
    })
  })
});