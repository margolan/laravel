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

// let today = document.querySelector('.today').getBoundingClientRect();
// document.body.prepend(document.createElement('div'))
// document.body.firstChild.classList.add('today_box', 'w-10', 'h-10', 'border-2', 'border-red-500', 'relative');
// document.body.firstChild.style.top = `${today.top}px`;
// document.body.firstChild.style.left = `${today.left}px`;



// console.log(today);