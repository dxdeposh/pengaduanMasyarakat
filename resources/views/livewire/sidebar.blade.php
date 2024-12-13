<div class="h-screen bg-white text-[#717171]">
    <div class="flex flex-col h-full">
        <!-- Logo Section -->
        <div class="shrink-0 flex items-center px-4 py-6">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" wire:navigate>
                <img src="{{ asset('images/logoNav.png') }}" alt="Logo" class="block h-16 w-16">
            </a>

            <!-- Logo Text -->
            <div class="ml-3 flex flex-col items-start text-gray-800">
                <span class="text-xl font-semibold text-[#717171]">SIPMA</span>
            </div>
        </div>

        <!-- Sidebar Links -->
        <div class="flex flex-col px-6 space-y-4 overflow-y-auto flex-1 mt-4 w-80">
            <!-- Menu Utama Title -->
            <div class="text-sm text-[#14a7a0] font-semibold uppercase tracking-widest py-2">
                MENU UTAMA
            </div>

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="flex items-center p-3 rounded-lg transition-all duration-300 ease-in-out
                {{ request()->routeIs('dashboard') ? 'bg-[#14a7a0] text-white shadow-lg' : 'hover:bg-[#14a7a0] hover:text-white hover:shadow-md' }}
                hover:scale-105">
                <i class="bi bi-house-door-fill w-6 h-6 mr-3"></i>
                <span>Dashboard</span>
            </a>

            <!-- Pengaduan -->
            <a href="{{ route('pengaduan.index') }}"
                class="flex items-center p-3 rounded-lg transition-all duration-300 ease-in-out
                {{ request()->routeIs('pengaduan.index') ? 'bg-[#14a7a0] text-white shadow-lg' : 'hover:bg-[#14a7a0] hover:text-white hover:shadow-md' }}
                hover:scale-105">
                <i class="bi bi-file-earmark-code w-6 h-6 mr-3"></i>
                <span>Pengaduan</span>
            </a>

            <!-- Profile -->
            <a href="{{ route('profile') }}"
                class="flex items-center p-3 rounded-lg transition-all duration-300 ease-in-out
                {{ request()->routeIs('profile') ? 'bg-[#14a7a0] text-white shadow-lg' : 'hover:bg-[#14a7a0] hover:text-white hover:shadow-md' }}
                hover:scale-105">
                <i class="bi bi-person-circle w-6 h-6 mr-3"></i>
                <span>Profile</span>
            </a>

            <!-- Settings -->
            <a href="#"
                class="flex items-center p-3 rounded-lg transition-all duration-300 ease-in-out
                {{ request()->routeIs('settings') ? 'bg-[#14a7a0] text-white shadow-lg' : 'hover:bg-[#14a7a0] hover:text-white hover:shadow-md' }}
                hover:scale-105">
                <i class="bi bi-gear-fill w-6 h-6 mr-3"></i>
                <span>Settings</span>
            </a>

            <!-- Logout -->
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="flex items-center p-3 rounded-lg transition-all duration-300 ease-in-out hover:bg-[#14a7a0] w-full text-start hover:scale-105">
                <i class="bi bi-box-arrow-right w-6 h-6 mr-3"></i>
                <span>{{ __('Log Out') }}</span>
            </a>

            <!-- Form Logout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>

            <!-- Horizontal Divider -->
            <hr class="my-4 border-t border-[#e0e0e0]">

            <!-- Tentang Kami -->
            <a href="#"
                class="flex items-center p-3 rounded-lg border border-[#14a7a0] text-[#717171] transition-all duration-300 ease-in-out hover:bg-[#14a7a0] hover:text-white hover:shadow-md hover:scale-105">
                <i class="bi bi-info-circle w-6 h-6 mr-3"></i>
                <span>Tentang Kami</span>
            </a>
        </div>
    </div>
</div>
