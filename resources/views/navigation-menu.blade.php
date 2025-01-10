<header x-data="{ mobileMenuOpen: false }" class="bg-white pb-4 relative">
    <div class="border-gray-200 border-b shadow-sm">
    <div class="container mx-auto">
        <!-- Top bar -->
        <div class="flex items-center justify-between px-2 lg:px-0 lg:py-2 text-sm">
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" aria-label="Facebook" rel="ugc" class="inline-block relative rounded-full text-center w-8 h-8 bg-[#d3d3d3] hover:bg-gray-400">
                    <svg class="w-4 h-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/>
                    </svg>
                </a>
                <a href="#" aria-label="Twitter" rel="ugc" class="inline-block relative rounded-full text-center w-8 h-8 bg-[#d3d3d3] hover:bg-gray-400">
                    <svg class="w-4 h-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
                    </svg>
                </a>
                <a href="#" aria-label="Instagram" rel="ugc" class="inline-block relative rounded-full text-center w-8 h-8 bg-[#d3d3d3] hover:bg-gray-400">
                    <svg class="w-4 h-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                    </svg>
                </a>
                <a href="#" aria-label="LinkedIn" rel="ugc" class="inline-block relative rounded-full text-center w-8 h-8 bg-[#d3d3d3] hover:bg-gray-400">
                    <svg class="w-4 h-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/>
                    </svg>
                </a>
            </div>
            <nav class="hidden md:flex space-x-6 py-2 text-sm">
                <a class="hover:text-primary" href="{{ route('categories.index') }}" rel="ugc">Buy Machinery</a>
                <a class="hover:text-primary" href="{{ route('listings.create') }}" rel="ugc">Sell Machinery</a>
                <a class="hover:text-primary" href="{{ route('categories.tree') }}" rel="ugc">Categories</a>
                <a class="hover:text-primary" href="#" rel="ugc">Manufacturers</a>
                <a class="hover:text-primary" href="#" rel="ugc">Dealers</a>
                <a class="hover:text-primary" href="{{ route('news.index') }}" rel="ugc">News</a>
            </nav>
        </div>
        </div>
        </div>
    <div class="container mx-auto">

    <!-- Main header -->
    <div class="flex items-center justify-between py-4 px-4 lg:px-0">
            <a class="flex items-center space-x-2" href="{{ route('home') }}" rel="ugc">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                    <path d="M15 9h3a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-3"></path>
                    <path d="M11 15V9"></path>
                    <path d="M7 15V9"></path>
                    <path d="M3 5v14"></path>
                </svg>
                <span class="text-xl font-bold">ExchangeMachines</span> --}}
                <img src="{{ asset('assets/images/logo.gif') }}" alt="ExchangeMachines" class="h-12 w-auto">
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
