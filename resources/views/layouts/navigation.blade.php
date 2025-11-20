<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md shadow-sm border-b border-primary-100 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('posts.index') }}" class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-accent-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-primary-800">My Blog</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('posts.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('posts.index') ? 'bg-primary-100 text-primary-800' : 'text-primary-600 hover:text-primary-800 hover:bg-primary-50' }}">
                        {{ __('Home') }}
                    </a>
                    <a href="{{ route('posts.create') }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('posts.create') ? 'bg-accent-100 text-accent-800' : 'text-primary-600 hover:text-primary-800 hover:bg-primary-50' }}">
                        {{ __('Create Post') }}
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 bg-white border border-primary-200 rounded-xl text-sm font-medium text-primary-700 hover:bg-primary-50 hover:border-primary-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 shadow-sm">
                                <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-accent-500 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <div class="text-left">
                                    <div class="text-sm font-semibold">{{ Auth::user()->name }}</div>
                                </div>
                                <div class="ms-3">
                                    <svg class="fill-current h-4 w-4 text-primary-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-primary-600 hover:text-primary-800 px-4 py-2 rounded-lg font-medium transition-colors">
                            {{ __('Login') }}
                        </a>
                        <a href="{{ route('register') }}" class="bg-accent-500 hover:bg-accent-600 text-white px-6 py-2 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-200">
                            {{ __('Register') }}
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-primary-600 hover:text-primary-800 hover:bg-primary-50 focus:outline-none focus:bg-primary-50 focus:text-primary-800 transition duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white/95 backdrop-blur-md border-t border-primary-100">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <a href="{{ route('posts.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('posts.index') ? 'bg-primary-100 text-primary-800' : 'text-primary-600 hover:text-primary-800 hover:bg-primary-50' }} transition-colors">
                {{ __('Home') }}
            </a>
            <a href="{{ route('posts.create') }}" class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('posts.create') ? 'bg-accent-100 text-accent-800' : 'text-primary-600 hover:text-primary-800 hover:bg-primary-50' }} transition-colors">
                {{ __('Create Post') }}
            </a>
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-3 border-t border-primary-100">
                <div class="px-4">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-accent-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <div class="font-medium text-base text-primary-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-primary-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-primary-600 hover:text-primary-800 hover:bg-primary-50 transition-colors">
                            {{ __('Profile') }}
                        </a>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-red-600 hover:text-red-800 hover:bg-red-50 transition-colors"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="pt-4 pb-3 border-t border-primary-100">
                <div class="px-4 space-y-2">
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-primary-600 hover:text-primary-800 hover:bg-primary-50 transition-colors">
                        {{ __('Login') }}
                    </a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-lg text-base font-medium bg-accent-500 text-white hover:bg-accent-600 transition-colors">
                        {{ __('Register') }}
                    </a>
                </div>
            </div>
        @endauth
    </div>
</nav>
