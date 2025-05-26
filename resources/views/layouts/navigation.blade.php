<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2">
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-9 w-auto">
    @auth
        @if(Auth::user()->role === 'admin')
            <span class="text-lg font-bold text-gray-800 dark:text-gray-200">Admin Panel</span>
        @endif
    @endauth
</a>


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
   @auth
    @if(Auth::user()->role === 'admin')
        <x-nav-link :href="route('admin.vozila.index')">Vozila</x-nav-link>
        <x-nav-link :href="route('admin.termini.index')">Termini</x-nav-link>
        <x-nav-link :href="route('admin.usluge.index')">Usluge</x-nav-link>
    @else
        <x-nav-link :href="route('zakazi')">Zakaži termin</x-nav-link>
        <x-nav-link :href="route('kontakt')">Kontakt</x-nav-link>
        <x-nav-link :href="route('moji.termini')">Moji termini</x-nav-link>
    @endif
@else
    <x-nav-link :href="route('zakazi')">Zakaži termin</x-nav-link>
    <x-nav-link :href="route('kontakt')">Kontakt</x-nav-link>
    <x-nav-link :href="route('login')">Prijava</x-nav-link>
    <x-nav-link :href="route('register')">Registracija</x-nav-link>
@endauth

</div>




            @auth
<!-- User Dropdown -->
<div class="hidden sm:flex sm:items-center sm:ms-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition">
                {{ Auth::user()->name }}

                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
                Profil
            </x-dropdown-link>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Izloguj se
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>
@endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.vozila.index')" :active="request()->routeIs('admin.vozila.*')">
                Vozila
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.termini.index')" :active="request()->routeIs('admin.termini.*')">
                Termini
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.usluge.index')" :active="request()->routeIs('admin.usluge.*')">
                Usluge
            </x-responsive-nav-link>
        </div>

        <!-- Responsive User Info -->
@auth
<div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
    <div class="px-4">
        <div class="font-medium text-base text-gray-800 dark:text-gray-200">
            {{ Auth::user()->name }}
        </div>
        <div class="font-medium text-sm text-gray-500">
            {{ Auth::user()->email }}
        </div>
    </div>

    <div class="mt-3 space-y-1">
        <x-responsive-nav-link :href="route('profile.edit')">Profil</x-responsive-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
                Izloguj se
            </x-responsive-nav-link>
        </form>
    </div>
</div>
@endauth

    </div>
</nav>
