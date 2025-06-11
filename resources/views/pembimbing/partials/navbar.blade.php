<nav class="fixed top-0 left-0 w-full z-50 bg-gradient-to-b from-black to-blue-500">
  <div class="max-w-full flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
    <img src="{{ asset('img/logo/Logo-UPNVJ.png') }}" alt="Logo 1" class="h-10 lg:h-14 w-auto" />
    <img src="{{ asset('img/logo/Logo-FIK.png') }}" alt="Logo 1" class="h-10 lg:h-14 w-auto" />
  </a>
  <div class="flex items-center md:order-2 gap-x-1 md:gap-x-3 space-x-3 md:space-x-0 rtl:space-x-reverse">

      <button type="button" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <i class="fa-solid fa-circle-user fa-2xl text-white"></i>
      </button>

      <!-- Dropdown profil menu -->
      <div class="z-50 hidden list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm" id="user-dropdown">
        <div class="px-4 py-3">
            @auth
              <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
              <span class="block text-sm text-gray-900">{{ Auth::user()->nim_nip }}</span>
              <span class="block text-sm text-gray-900">{{ Auth::user()->program_studi }}</span>
              <span class="block text-sm text-gray-600 truncate">{{ Auth::user()->email }}</span>
              <span class="block text-sm text-orange-600">{{ Auth::user()->role }}</span>
          @endauth
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin keluar?')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-100">
              @csrf
              <button type="submit" class="w-full">Sign out</button>
            </form>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
      <li>
        <a href="/koor-prodi" class="block text-lg py-2 px-3 text-white rounded-sm hover:bg-black md:hover:bg-transparent md:hover:text-gray-300 md:p-0">Home</a>
      </li>
      <li>
        <button href="#" class="block text-lg py-2 px-3 text-white rounded-sm hover:bg-black md:hover:bg-transparent md:hover:text-gray-300 md:p-0" type="button" id="more-menu-button" aria-expanded="false" data-dropdown-toggle="more-dropdown" data-dropdown-placement="bottom">
          More
          <span><i class="fa-solid fa-caret-down pl-1"></i></span>
        </button>
      </li>

      <!-- Dropdown more menu -->
      <div class="z-50 hidden w-60 list-none bg-white divide-y divide-gray-300 rounded-lg shadow-sm" id="more-dropdown">

        <ul class="py-2 divide-y divide-gray-200" aria-labelledby="user-menu-button">
            <li>
                <a href="#" class="flex items-start gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <span class="text-justify text-left break-words" style="text-align: justify;">
                        Syarat dan Ketentuan Sidang Kalender Jadwal Sidang Alur Pengajuan Judul Sidang Pendaftaran Sidang Status dan Hasil Pendaftaran Nilai dan Hasil Sidang
                    </span>
                </a>
            </li>
        </ul>
      </div>

      <li>
        <a href="#" class="block py-2 px-3 text-lg text-white rounded-sm hover:bg-black md:hover:bg-transparent md:hover:text-gray-300 md:p-0">About US</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
