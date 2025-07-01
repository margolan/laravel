const btn_expand = document.querySelector('.btn_expand');

btn_expand.addEventListener('click', function () {
  this.parentElement.parentElement.classList.toggle('h-100');
  this.parentElement.style.display = 'none';
})