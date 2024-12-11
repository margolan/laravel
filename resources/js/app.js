import './bootstrap';


// ==================== Dark Theme ====================

const themeToggle = document.querySelector('.theme-toggle');
const htmlElement = document.documentElement;

themeToggle.addEventListener('click', () => {
  if (htmlElement.classList.contains('dark')) {
    htmlElement.classList.remove('dark');
    localStorage.setItem('theme', 'light');
  } else {
    htmlElement.classList.add('dark');
    localStorage.setItem('theme', 'dark');
  }
});

const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
  htmlElement.classList.add('dark');
}

// ==================== Misc ====================

const cell = document.querySelectorAll('.cell');

const cellStyle = {
  "+": "dark:text-red-500 font-bold",
  "-": "dark:text-blue-500 font-bold",
  "D": "text-sm dark:text-red-500",
  "O": "text-sm dark:text-gray-500 dark:bg-[url('/assets/cell_bg.png')]",
};

cell.forEach(e => {
  let text = e.innerText.trim();
  if (cellStyle[text]) {
    e.classList.add(...cellStyle[text].split(' '));
  }
})

const search = document.querySelector('.search');
const found = document.querySelector('.found');

search.addEventListener('input', function (e) {
  setTimeout(function () {
    const query = e.target.value.toLowerCase();
    let matches = 0;
    let found_cell;
    cell.forEach(el => {
      const cellText = el.textContent.toLowerCase();
      if (query && cellText.includes(query)) {
        matches++;
        found.textContent = matches;
        found_cell = el;
      } else {
        found.textContent = matches;
      }
    });
    if (matches == 1) {
      window.scrollTo(0, found_cell.offsetTop - 180);
      cell.forEach(el => {
        if (el.getAttribute('row') == found_cell.getAttribute('row')) {
          el.classList.remove('dark:text-white');
          el.classList.add('dark:text-red-500');
        } else {
          el.classList.remove('dark:red-500');
          el.classList.add('dark:text-white');
        }
      })
    }
  }, 500)
})

window.addEventListener('scroll', e => {
  if (window.scrollY > 200) {
    // search.parentElement.classList.add('fixed', 'top-0')
  } else {
    // search.parentElement.classList.remove('fixed', 'top-0')
  }
})

// let today = document.querySelector('.today').getBoundingClientRect();
// document.body.prepend(document.createElement('div'))
// document.body.firstChild.classList.add('today_box', 'w-10', 'h-10', 'border-2', 'border-red-500', 'relative');
// document.body.firstChild.style.top = `${today.top}px`;
// document.body.firstChild.style.left = `${today.left}px`;



// console.log(today);