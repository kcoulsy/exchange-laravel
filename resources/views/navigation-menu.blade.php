<header x-data="{ mobileMenuOpen: false }" class="bg-white pb-4 relative">
    <div class="container mx-auto">
        <!-- Top bar -->
        <div class="flex items-center justify-between px-2 lg:px-0 lg:py-2 text-sm">
            <div class="hidden md:flex items-center space-x-4">
                <a class="hover:underline" href="#" rel="ugc">About</a>
                <a class="hover:underline" href="#" rel="ugc">Contact</a>
                <a class="hover:underline" href="#" rel="ugc">Why Us</a>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" aria-label="Facebook" rel="ugc"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-facebook h-4 w-4">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg></a>
                <a href="#" aria-label="Twitter" rel="ugc"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-twitter h-4 w-4">
                        <path
                            d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z">
                        </path>
                    </svg></a>
                <a href="#" aria-label="Instagram" rel="ugc"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-instagram h-4 w-4">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                    </svg></a>
                <a href="#" aria-label="LinkedIn" rel="ugc"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-linkedin h-4 w-4">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                        <rect width="4" height="12" x="2" y="9"></rect>
                        <circle cx="4" cy="4" r="2"></circle>
                    </svg></a>
            </div>
        </div>

        <!-- Main header -->
        <div class="flex items-center justify-between py-4 px-4 lg:px-0">
            <a class="flex items-center space-x-2" href="{{ route('home') }}" rel="ugc">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                    <path d="M15 9h3a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-3"></path>
                    <path d="M11 15V9"></path>
                    <path d="M7 15V9"></path>
                    <path d="M3 5v14"></path>
                </svg>
                <span class="text-xl font-bold">ExchangeMachines</span>
            </a>
            <div class="hidden md:flex items-center space-x-4">
                <form class="relative">
                    <input id="global-search"
                        class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-64 pl-10 pr-4"
                        placeholder="Search machinery..." type="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-search absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 transform text-gray-400">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </form>
                @auth
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                @endauth

                @guest
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-500 hover:bg-blue-600 text-white h-10 px-4 py-2">Sell
                        Today</a>
                @endguest
            </div>
            <!-- Hamburger menu button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex space-x-6 py-2 text-sm">
            <a class="hover:text-primary" href="{{ route('categories.index') }}" rel="ugc">Buy Machinery</a>
            <a class="hover:text-primary" href="{{ route('listings.create') }}" rel="ugc">Sell Machinery</a>
            <a class="hover:text-primary" href="{{ route('categories.index') }}" rel="ugc">Categories</a>
            <a class="hover:text-primary" href="#" rel="ugc">Manufacturers</a>
            <a class="hover:text-primary" href="#" rel="ugc">Dealers</a>
            <a class="hover:text-primary" href="{{ route('news.index') }}" rel="ugc">News</a>
        </nav>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200 z-50"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" class="md:hidden top-full left-0 right-0 bg-white shadow-md p-4">
        <nav class="flex flex-col space-y-2">
            <a class="hover:text-primary" href="{{ route('categories.index') }}" rel="ugc">Buy Machinery</a>
            @auth
                <a class="hover:text-primary" href="{{ route('listings.create') }}" rel="ugc">Sell Machinery</a>
                <a class="hover:text-primary" href="{{ route('dashboard') }}" rel="ugc">Dashboard</a>
                <a class="hover:text-primary" href="{{ route('profile.show') }}" rel="ugc">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="hover:text-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();" rel="ugc">
                        Log Out
                    </a>
                </form>
            @else
                <a class="hover:text-primary" href="{{ route('register') }}" rel="ugc">Sell Machinery</a>
                <a class="hover:text-primary" href="{{ route('login') }}" rel="ugc">Log In</a>
                <a class="hover:text-primary" href="{{ route('register') }}" rel="ugc">Register</a>
            @endauth
            <a class="hover:text-primary" href="#" rel="ugc">Categories</a>
            <a class="hover:text-primary" href="#" rel="ugc">Manufacturers</a>
            <a class="hover:text-primary" href="#" rel="ugc">Dealers</a>
            <a class="hover:text-primary" href="{{ route('news.index') }}" rel="ugc">News</a>
            <a class="hover:underline" href="#" rel="ugc">About</a>
            <a class="hover:underline" href="#" rel="ugc">Contact</a>
            <a class="hover:underline" href="#" rel="ugc">Why Us</a>
        </nav>
        <div class="mt-4">
            @guest
                <a href="{{ route('register') }}"
                    class="mt-4 w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-500 hover:bg-blue-600 text-white h-10 px-4 py-2">
                    Sell Today
                </a>
            @endguest
        </div>
    </div>

    <!-- Mobile search bar (always visible) -->
    <div class="md:hidden bg-white w-full px-4 py-2 shadow-md">
        <form class="relative">
            <input id="mobile-global-search"
                class="flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full pl-10 pr-4"
                placeholder="Search machinery..." type="search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"
                class="lucide lucide-search absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 transform text-gray-400">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </svg>
        </form>
    </div>
</header>
