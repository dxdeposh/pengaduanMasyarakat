<nav x-data="{ open: false, searchQuery: '' }"
    class="bg-gradient-to-r from-teal-500 to-cyan-600 sticky top-0 z-50 shadow-lg opacity-90 hover:opacity-100 transition-opacity duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Hamburger Icon for Mobile -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Search Bar -->
            <div class="flex items-center w-full max-w-lg px-4">
                <div class="relative w-full">
                    <input type="text" x-model="searchQuery" placeholder="Search..."
                        class="w-full p-2 pr-10 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400 transition-all duration-300 ease-in-out"
                        :class="{ 'bg-white': searchQuery === '', 'bg-teal-100': searchQuery !== '' }">
                    <i class="bi bi-search absolute right-3 top-1/2 transform -translate-y-1/2"></i>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center space-x-4 sm:block">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center px-3 py-2 text-sm font-medium text-white bg-teal-700 rounded-full hover:bg-teal-800 focus:outline-none transition-all duration-300">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"></div>
                            <svg class="ml-2 w-5 h-5 text-teal-200" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="'#'" wire:navigate>{{ __('Profile') }}</x-dropdown-link>
                        <x-dropdown-link :href="'#'" wire:navigate>{{ __('Settings') }}</x-dropdown-link>
                        <x-dropdown-link :href="'#'" wire:navigate>{{ __('Notifications') }}</x-dropdown-link>
                        <button wire:click="toggleTheme" class="w-full text-left">
                            <x-dropdown-link>{{ __('Toggle Dark Mode') }}</x-dropdown-link>
                        </button>

                        <!-- Logout Link with same styling as Profile, Settings, and Notifications -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="transition-colors duration-200 hover:bg-teal-200 px-4 py-2 text-teal-700 w-full text-left flex items-center">
                            <i class="bi bi-box-arrow-right w-6 h-6 mr-3"></i>
                            <span>{{ __('Log Out') }}</span>
                        </a>
                    </x-slot>


                </x-dropdown>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden transition-all duration-300 ease-in-out">
        <div class="pt-2 pb-3 space-y-1 bg-gradient-to-r from-teal-100 to-cyan-200 shadow-lg">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pengaduan.index')" :active="request()->routeIs('pengaduan')" wire:navigate>
                {{ __('Pengaduan') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-300 bg-white shadow-md">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                    x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>{{ __('Profile') }}</x-responsive-nav-link>
                <button wire:click="logout" class="w-full text-left">
                    <x-responsive-nav-link>{{ __('Log Out') }}</x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
