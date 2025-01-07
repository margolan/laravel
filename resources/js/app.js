import './bootstrap';


// ==================== Dark Theme ====================


const htmlElement = document.documentElement;

if (document.querySelector('.theme-toggle')) {
  document.querySelector('.theme-toggle').addEventListener('click', () => {
    if (htmlElement.classList.contains('dark')) {
      htmlElement.classList.remove('dark');
      localStorage.setItem('theme', 'light');
    } else {
      htmlElement.classList.add('dark');
      localStorage.setItem('theme', 'dark');
    }
  });
}

// const savedTheme = localStorage.getItem('theme');
// if (savedTheme === 'dark') {
//   htmlElement.classList.add('dark');
// }


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


document.querySelector('.burger')?.addEventListener('click', function () {
  this.classList.toggle('h-16');
  this.classList.toggle('bg-stone-900');
  document.querySelector('.icon_burger').classList.toggle('hidden');
  document.querySelector('.icon_cross').classList.toggle('hidden');
});


// ==================== Auth ====================


document.querySelector('.login')?.addEventListener('click', function () { document.querySelector('.auth_form').classList.toggle('-left-72') })
document.querySelector('.register')?.addEventListener('click', function () { document.querySelector('.auth_form').classList.toggle('-left-72') })

// ==================== Session Status ====================

document.querySelector('.cross')?.addEventListener('click', function () { document.querySelector('.status').classList.add('hidden') })
document.querySelector('.cross') ? setTimeout(() => { document.querySelector('.status').classList.add('hidden') }, 5000) : '';


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