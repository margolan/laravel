Работа с базой

  Rule::unique('users', 'email')->where('role', 'user')
  проверить уникальность поля email таблицы users, где role = user

  $user = User::create($valid);
  добавляет в базу новую запись на базе валидации

  Auth::attempt($credentials, $request->rememberme)
  попытка авторизации по личным данным с функцией запомни меня

  $user = User::where('id', $request->id)
  Auth::login($user)
  Авторизация
  
  Schedule::find($request->id)->first()




Часто используемые методы коллекций

  all()
  $data = $collection->all();
  Возвращает коллекцию в виде массива.


  pluck()
  $names = $collection->pluck('name'); // Получает все значения поля 'name'
  Извлекает значения определенного ключа из всех элементов коллекции.


  where()
  $filtered = $collection->where('status', 'active');
  Фильтрует коллекцию по заданным условиям.


  first()
  $firstItem = $collection->first();
  Возвращает первый элемент коллекции.


  last()
  $lastItem = $collection->last();
  Возвращает последний элемент коллекции.


  get()
  $item = $collection->get(1); // Второй элемент
  Извлекает элемент по индексу.


  map()
  $updated = $collection->map(function ($item) {
      $item['price'] = $item['price'] * 1.2;
      return $item;
  });
  Применяет функцию ко всем элементам коллекции.


  filter()
  $filtered = $collection->filter(function ($item) {
      return $item['active'] === true;
  });
  Фильтрует коллекцию по заданной функции.
  

  sortBy() / sortByDesc()
  $sorted = $collection->sortBy('price');
  Сортирует коллекцию по ключу.


  groupBy()
  $kanban = Kanban::all()->groupBy('column');
  @foreach ($kanban as $column => $item)
    {{ $column }}
    @foreach ($item as $task)
      {{ $task->title }}
    @endforeach
  @endforeach



  count()
  $count = $collection->count();
  Возвращает количество элементов в коллекции.


  contains()
  $exists = $collection->contains('name', 'John');
  Проверяет, содержит ли коллекция указанный элемент или значение.


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

Symbols
  Arrows
    11164 left 11176
    11165 top 11181
    11166 right 11177
    11167 down 11183