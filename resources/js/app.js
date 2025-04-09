import './bootstrap';

// ==================== Editor [kanban, admin] ====================


const data_edit = document.querySelector('.data_edit');

document.querySelectorAll('.edit').forEach((el) => {
  el.addEventListener('click', function () {
    document.body.classList.add('overflow-hidden');
    data_edit.classList.remove('hidden');
    if (window.location.pathname === '/kanban') init_kanban(this);
    if (window.location.pathname === '/admin') init_admin(this);
  })
})

document.querySelector('.sticker_close')?.addEventListener('click', () => { data_edit.classList.add('hidden'); document.body.classList.remove('overflow-hidden'); })


// ==================== Kanban Page ====================



function init_kanban(el) {
  data_edit.querySelector('input[name=title]').value = el.closest('.sticker').querySelector('h2').textContent.trim();
  data_edit.querySelector('textarea').value = el.closest('.sticker').querySelector('p').textContent.trim();
  data_edit.querySelector('input[name=id]').value = el.closest('.sticker').querySelector('span').id.trim();
}


// ==================== Admin page ====================


const file = document.querySelectorAll('.file_picker');

file.forEach((file_el) => {
  file_el.addEventListener('click', () => {
    file_el.querySelector('input[type="file"]').click();
  });
  file_el.querySelector('input[type="file"]').addEventListener('change', (e) => {
    file_el.querySelector('.file_text').textContent = e.target.files[0].name;
  });
});


function init_admin(el) {
  data_edit.querySelector('.username').textContent = el.children[0].textContent.trim();
  data_edit.querySelector('input[name=email]').value = el.children[1].textContent.trim()
  data_edit.querySelector('input[name=city]').value = el.children[2].textContent.trim();
  data_edit.querySelector('input[name=depart]').value = el.children[3].textContent.trim();
  data_edit.querySelector('input[name=role]').value = el.children[4].textContent.trim();
  data_edit.querySelector('input[name=id]').value = el.id.trim();
}





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


const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav');
const arrow = document.querySelector('.arrow');

document.querySelector('.menu')?.addEventListener('click', () => {
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