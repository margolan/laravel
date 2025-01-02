<div class="h-16 flex justify-between sm:items-center">
  <div class="left h-max flex justify-center items-center">
    <ul class="burger sm:inline-flex sm:items-center overflow-hidden h-16 sm:h-9 z-10 sm:bg-stone-900 sm:rounded-lg">
      <li class="px-4 pt-5 pb-5 sm:hidden">
        <svg class="icon_burger h-6 w-6 cursor-pointer fill-current   hover:text-emerald-500" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
        <svg class="icon_cross hidden h-7 w-7 cursor-pointer  hover:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </li>
      <li><a href="{{ route('s_index') }}"
          class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800 hover:text-emerald-500">Schedule</a>
      </li>
      <li><a href="{{ route('k_index') }}"
          class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800 hover:text-emerald-500">Key</a>
      </li>
      <li><a href="{{ route('test_index') }}"
          class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800 hover:text-emerald-500">Test</a>
      </li>
      <li><a href="{{ route('auth_admin') }}"
          class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800 hover:text-emerald-500">Admin</a>
      </li>
      <li>
        <a href="{{ route('auth_logout') }}"
          class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800 hover:text-emerald-500">LogOut</a>
      </li>
    </ul>
  </div>
  <div class="right hidden">
    <div class="h-full theme-toggle cursor-default items-center flex">
      &#127761;
    </div>
  </div>
</div>
