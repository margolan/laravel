composer.json и composer.lock работают с PHP-зависимостями, а package.json — с JS-зависимостями.
  composer install: Устанавливает PHP-зависимости на основе composer.lock.
  composer update: Обновляет зависимости и перезаписывает composer.lock.



@foreach
  $loop->index 	Индекс текущей итерации цикла (начинается с 0).
  $loop->iteration 	Текущая итерация цикла (начинается с 1).
  $loop->remaining 	Итерации, оставшиеся в цикле.
  $loop->count 	Общее количество элементов в итерируемом массиве.
  $loop->first 	Первая ли это итерация цикла.
  $loop->last 	Последняя ли это итерация цикла.
  $loop->even 	Четная ли это итерация цикла.
  $loop->odd 	Нечетная ли это итерация цикла.
  $loop->depth 	Уровень вложенности текущего цикла.
  $loop->parent 	Переменная родительского цикла во вложенном цикле.


migrate:fresh - удаляет все таблицы

npm run dev Set-ExecutionPolicy RemoteSigned