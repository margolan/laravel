<div class="h-16 flex justify-between sm:items-center">
  <div class="left h-max flex justify-center items-center">
    <ul class="burger sm:inline-flex sm:items-center overflow-hidden h-16 sm:h-9 z-10 sm:bg-stone-900 sm:rounded-lg">
      <li class="px-4 pt-5 pb-5 sm:hidden">
        <svg class="icon_burger h-6 w-6 cursor-pointer fill-current  hover:text-gray-500" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
        <svg class="icon_cross hidden h-7 w-7 cursor-pointer hover:text-gray-500 " xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </li>
      <li><a href="{{ route('s_index') }}"
          class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800">Schedule</a>
      </li>
      <li class="sm:block hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>
      </li>
      <li><a href="{{ route('k_index') }}" class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800">Key</a>
      </li>
      <li class="sm:block hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>
      </li>
      <li><a href="{{ route('s_import') }}" class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800">UL
          Schedule</a> </li>
      <li class="sm:block hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>
      </li>
      <li><a href="{{ route('k_import') }}" class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800">UL
          Key</a> </li>
      <li><a href="{{ route('test') }}" class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800">Test</a>
      </li>
      <li class="sm:block hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>
      </li>
      <li><a href="{{ route('login') }}" class="block sm:inline px-4 py-2 bg-stone-900 hover:bg-stone-800">Login</a>
      </li>
    </ul>
  </div>
  <div class="right ">
    <div class="h-full theme-toggle cursor-default items-center flex">
      &#127761;
    </div>
  </div>
</div>
