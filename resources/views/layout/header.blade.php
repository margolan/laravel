<div class="h-14 py-3 pl-3 flex justify-between items-center bg-black text-white">
  <div class="flex items-center text-lg drop-shadow-[0_3px_2px_rgba(0,0,0,0.8)]">
    <h1
      class="px-7 tracking-widest font-[roboto_mono] border-2 rounded-[12px] transition-all hover:drop-shadow-[0_3px_2px_rgba(50,50,50,0.6)]">
      <a href="/">0x0.kz</a>
  </div>
  <div class="h-6 z-10">
    <div class="nav flex max-h-6 bg-black gap-3 pr-5 pl-8 not-sm:pb-3 sm:flex-row flex-col items-end overflow-hidden transition-all">
      <div class="menu cursor-pointer relative">
        <div class="burger w-6 min-h-6 flex justify-around flex-col sm:hidden transition-all">
          <div class="w-6 border-t-3"></div>
          <div class="w-6 border-t-3"></div>
          <div class="w-6 border-t-3"></div>
        </div>
        <div class="arrow w-6 min-h-6 flex-col sm:hidden opacity-0 absolute top-0 transition-all">
          <div class="w-6 border-t-3 translate-y-3 rotate-45 absolute"></div>
          <div class="w-6 border-t-3 translate-y-3 -rotate-45 absolute"></div>
        </div>
      </div>
      <a href="{{ route('index') }}"
        class="{{ request()->routeIs('index') ? 'underline underline-offset-4' : 'text-neutral-300' }}">Главная</a>
      <a href="{{ route('s_index') }}"
        class="{{ request()->routeIs('s_index') ? 'underline underline-offset-4' : 'text-neutral-300' }}">График</a>
      <a href="{{ route('k_index') }}"
        class="{{ request()->routeIs('k_index') ? 'underline underline-offset-4' : 'text-neutral-300' }}">Ключи</a>
      <a href="{{ route('kanban') }}"
        class="{{ request()->routeIs('kanban') ? 'underline underline-offset-4' : 'text-neutral-300' }}">Kanban</a>
      @if (Auth::check())
        <a href="{{ route('admin_index') }}"
          class="{{ request()->routeIs('admin_index') ? 'underline underline-offset-4' : 'text-neutral-300' }}">Где-то</a>
        <a href="{{ route('auth_logout') }}"
          class="{{ request()->routeIs('auth_logout') ? 'underline underline-offset-4' : 'text-neutral-300' }}">Выйти</a>
      @else
        <a href="{{ route('login') }}"
          class="{{ request()->routeIs('login') ? 'underline underline-offset-4' : 'text-neutral-300' }}">Войти</a>
      @endif
    </div>
  </div>
</div>
