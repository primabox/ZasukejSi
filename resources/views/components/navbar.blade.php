<nav class="fixed top-0 left-0 right-0 z-100 bg-transparent rounded-b-3xl transition-all duration-300" id="navbar" x-data>
    <style>
        body.modal-open #navbar { display: none !important; }

        .navbar-shell {
            width: 1136px;
            max-width: calc(100% - 32px);
            height: 80px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-desktop-grid {
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-columns: auto 440px 1fr;
            align-items: center;
            column-gap: 12px;
        }

        .brand-mark {
            font-family: 'Bungee', cursive;
            font-weight: 400;
            font-size: 24px;
            line-height: 1;
            white-space: nowrap;
        }

        #nav-logo {
            padding-right: 97px;
        }

        .brand-mark .brand-main { color: #5C2D62; }
        .brand-mark .brand-si { color: #DD3888; }
        .brand-mark .brand-cz { color: rgba(50, 50, 50, 0.78); }

        .navbar-links {
            width: 440px;
            height: 100%;
            align-self: stretch;
            display: flex;
            align-items: stretch;
            justify-content: flex-start;
            gap: 20px;
            margin-left: 18px;
        }

        .navbar-links .nav-link {
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 16px;
            line-height: 1;
            color: #323232;
            text-decoration: none;
            height: 80px;
            padding: 0 10px;
            white-space: nowrap;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            transition: color 140ms ease, background-color 140ms ease;
        }

        .navbar-links .nav-link.active,
        .navbar-links .nav-link:hover {
            color: #DD3888;
            background: #FFFFFF;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
        }

        @media (max-width: 1023px) {
            .navbar-shell {
                width: 100%;
                max-width: calc(100% - 24px);
                height: 56px;
            }

            #nav-logo {
                padding-right: 0;
            }
        }
    </style>
    <div class="container mx-auto px-4 ">
        <div class="navbar-shell">
            <!-- Left Side: Logo + Navigation Links -->
            <div class="navbar-desktop-grid hidden lg:grid">
                <!-- Logo -->
                <a href="{{ route('profiles.index') }}" class="text-xl font-bold text-text-default hover:text-primary-600 transition-colors justify-self-start" id="nav-logo">
                    <span class="brand-mark">
                        <span class="brand-main">ZAŠUKEJ</span><span class="brand-si">SI</span><span class="brand-cz">.CZ</span>
                    </span>
                </a>

                <!-- Navigation Links - Desktop -->
                <div class="navbar-links justify-self-center">
                    @php
                        $resolvedNavPages = collect($navPages ?? [])->values();
                        if ($resolvedNavPages->isEmpty()) {
                            $resolvedNavPages = collect([
                                (object) ['id' => 'home', 'slug' => '', 'title' => 'Úvod'],
                                (object) ['id' => 'vip', 'slug' => 'vip-premium', 'title' => 'VIP a Premium'],
                                (object) ['id' => 'faq', 'slug' => 'faq', 'title' => 'FAQ'],
                                (object) ['id' => 'ethics', 'slug' => 'etika', 'title' => 'Etika'],
                                (object) ['id' => 'contact', 'slug' => 'kontakt', 'title' => 'Kontakt'],
                            ]);
                        }
                    @endphp
                    @foreach($resolvedNavPages as $page)
                        @php
                            $normalizedSlug = trim($page->slug, '/');
                            $isHomeSlug = $normalizedSlug === '';
                            $isActive = $isHomeSlug ? request()->path() === '/' : request()->is($normalizedSlug);
                        @endphp
                        <a href="{{ url('/' . $page->slug) }}" class="nav-link {{ $isActive ? 'active' : '' }}" id="nav-link-{{ $page->id }}">
                            {{ $page->title }}
                        </a>
                    @endforeach
                </div>

                <!-- Right Side: Register, Login, Language Switcher -->
                <div class="navbar-actions justify-self-end">
                    @auth
                    <!-- Icon Buttons - Desktop Only -->
                    <div class="hidden lg:flex items-center space-x-2">
                        <!-- Notifications Button -->
                        @livewire('notifications-dropdown')
                        
                        <!-- Mail Button -->
                        <a href="{{ route('messages.index') }}" class="btn nav-button bg-gray-50 !px-2 !py-2 md:!px-4 md:!py-4 !border-1 !text-primary !border-primary relative rounded md:rounded-lg" title="{{ __('front.nav.mail') }}">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            @php
                                $unreadMessages = Auth::user()->receivedMessages()->unread()->count();
                            @endphp
                            @if($unreadMessages > 0)
                                <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full h-4 w-4 md:h-5 md:w-5 flex items-center justify-center text-[10px] md:text-xs">
                                    {{ $unreadMessages > 9 ? '9+' : $unreadMessages }}
                                </span>
                            @endif
                        </a>
                    </div>

                    <!-- Account Dropdown (Profile Button) -->
                    <div class="relative" x-data="{ userMenuOpen: false }">
                        <button @click="userMenuOpen = !userMenuOpen" 
                            class="btn nav-button !px-2 !py-2 md:!px-4 md:!py-4 transition-colors relative z-50"
                            :class="userMenuOpen ? 'translate-y-1 bg-primary !text-white !border-primary !border-t-1 !border-l-1 !border-r-1 !border-b-0 !rounded-b-none !pb-4 md:!pb-6 !mt-0' : 'bg-gray-50 !text-primary !border-primary !border-1 rounded md:rounded-lg'"
                            style="transform-origin: top center;"
                            title="{{ __('front.nav.profile') }}">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </button>
                        
                        <div x-show="userMenuOpen" @click.outside="userMenuOpen = false" x-transition 
                            class="absolute right-0 lg:-right-15 top-10 md:top-16 w-48 bg-primary rounded-lg shadow-lg z-40 p-4 px-5 border-t-1 border-l-1 border-r-1 border-primary">
                            <div>
                               <a href="{{ route('account.dashboard') }}" class="block p-5 py-3 text-sm text-white hover:bg-secondary-500 rounded-lg transition-colors">
                                  {{ __('front.nav.myaccount') }}
                               </a>
                               @can('access-filament-admin')
                                  <a href="/admin" target="_blank" class="block px-4 py-3 text-sm text-white hover:bg-secondary-500 rounded-lg transition-colors">
                                     {{ __('front.nav.adminpanel') }}
                                  </a>
                               @endcan
                               <div class="border-t border-white/30 my-2"></div>
                               <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                                  <button type="submit" class="block w-full text-left p-5 py-3 text-sm text-white hover:bg-secondary-500 rounded-lg transition-colors">
                                     {{ __('front.nav.logout') }}
                                  </button>
                               </form>
                            </div>
                        </div>
                    </div> 
                    @else
                    <!-- Register Button - Desktop Only -->
                    <div class="hidden lg:inline-block">
                        <button @click="$dispatch('show-register-modal')" class="btn-primary">
                            Registrace
                        </button>
                    </div>
                    <!-- Login Link - Desktop Only -->
                    <div class="hidden lg:inline-block">
                         <button @click="$dispatch('show-login-modal')" class="btn-light" id="nav-login">
                             Login
                         </button>
                    </div>
                    @endauth

                    <!-- Language Switcher - Desktop Only -->
                    <div class="hidden lg:inline">
                        <div class="language-dropdown " x-data="{ languageOpen: false }" @click.outside="languageOpen = false">
                            <button @click="languageOpen = !languageOpen" class="language-dropdown-toggle" id="nav-language">
                                @if(app()->getLocale() === 'cs')
                                    <img src="{{ asset('flags/cs.png') }}" alt="Czech">
                                @else
                                    <img src="{{ asset('flags/en.png') }}" alt="English">
                                @endif
                            </button>
                            
                            <div class="language-dropdown-menu">
                                <a href="{{ url()->current() }}?locale=en" 
                                   class="language-dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}"
                                   @click="languageOpen = false"
                                   title="English">
                                    <img src="{{ asset('flags/en.png') }}" alt="English">
                                </a>
                                <a href="{{ url()->current() }}?locale=cs" 
                                   class="language-dropdown-item {{ app()->getLocale() === 'cs' ? 'active' : '' }}"
                                   @click="languageOpen = false"
                                   title="Čeština">
                                    <img src="{{ asset('flags/cs.png') }}" alt="Czech">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex w-full items-center justify-between lg:hidden">
                <a href="{{ route('profiles.index') }}" class="text-xl font-bold text-text-default hover:text-primary-600 transition-colors" id="nav-logo-mobile">
                    <span class="brand-mark" style="font-size:20px;">
                        <span class="brand-main">ZAŠUKEJ</span><span class="brand-si">SI</span><span class="brand-cz">.CZ</span>
                    </span>
                </a>
                <!-- Mobile menu button -->
                <div class="lg:hidden" x-data="{ mobileMenuOpen: false }" @click.outside="mobileMenuOpen = false">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="flex items-center justify-center text-text-default hover:text-primary-600 focus:outline-none focus:text-primary-600" id="mobile-menu-button">
                        <x-icons name="burger" x-show="!mobileMenuOpen" strokeWidth="2" class="h-2 w-6" block="false"/>
                        <x-icons name="close" x-show="mobileMenuOpen" strokeWidth="2" class="h-6 w-6" />
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="lg:hidden hidden" id="mobile-menu">
            <div class="flex flex-wrap p-4 py-5 pt-6 space-y-2 bg-white rounded-2xl">
                
                @auth
                    <!-- Icon Buttons - Mobile Only -->
                    <div class="w-full flex items-center justify-center gap-3 pb-4 border-b border-gray-200 mb-2">
                        <!-- Notifications Button -->
                        @livewire('notifications-dropdown')
                        
                        <!-- Mail Button -->
                        <a href="{{ route('messages.index') }}" class="btn nav-button bg-gray-50 !px-4 !py-4 !border-1 !text-primary !border-primary relative rounded-lg" title="{{ __('front.nav.mail') }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            @php
                                $unreadMessages = Auth::user()->receivedMessages()->unread()->count();
                            @endphp
                            @if($unreadMessages > 0)
                                <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                    {{ $unreadMessages > 9 ? '9+' : $unreadMessages }}
                                </span>
                            @endif
                        </a>
                        
                    </div>
                @endauth
                
                @foreach($navPages ?? [] as $page)
                    <a href="{{ url('/' . $page->slug) }}" class="nav-link-mobile group">
                        {{ $page->title }}
                        <span class="underline"></span>
                    </a>
                @endforeach
                @auth
                    <a href="{{ route('account.dashboard') }}" class="nav-link-mobile group">
                        {{ __('front.nav.accountdashboard') }}
                        <span class="underline"></span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="nav-link-mobile group text-left w-full">
                            {{ __('front.nav.logout') }}
                            <span class="underline"></span>
                        </button>
                    </form>
                @else
                    <!-- Auth Buttons -->
                    <div class="w-full space-y-3 pt-4">
                        <button @click="$dispatch('show-register-modal')" class="w-full btn-primary py-3 text-center">
                            Registrace
                        </button>
                        <button @click="$dispatch('show-login-modal')" class="w-full btn-light py-3 text-center">
                            Login
                        </button>
                    </div>
                @endauth
                
                <!-- Language Switcher -->
                <div class="w-full pt-4 border-t border-gray-300 mt-4">
                    <div class="flex justify-center gap-4">
                        <a href="{{ url()->current() }}?locale=cs" class="flex items-center gap-2 {{ app()->getLocale() === 'cs' ? 'opacity-100' : 'opacity-50' }}">
                            <img src="{{ asset('flags/cs.png') }}" alt="Czech" class="w-8 h-8 rounded-full">
                            <span class="text-sm">Česky</span>
                        </a>
                        <a href="{{ url()->current() }}?locale=en" class="flex items-center gap-2 {{ app()->getLocale() === 'en' ? 'opacity-100' : 'opacity-50' }}">
                            <img src="{{ asset('flags/en.png') }}" alt="English" class="w-8 h-8 rounded-full">
                            <span class="text-sm">English</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>



<script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Language dropdown functionality (fallback for browsers without Alpine.js)
        const languageDropdowns = document.querySelectorAll('.language-dropdown');
        languageDropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.language-dropdown-toggle');
            const menu = dropdown.querySelector('.language-dropdown-menu');
            
            if (toggle && menu) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    dropdown.classList.toggle('open');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target)) {
                        dropdown.classList.remove('open');
                    }
                });
            }
        });
    });
    // Listen for global modal visibility events and toggle body.modal-open accordingly.
    window.addEventListener('modal-visibility-changed', function(e) {
        try {
            const open = e && e.detail && e.detail.open;
            if (open) {
                document.body.classList.add('modal-open');
            } else {
                // Delay briefly and check if any modal-container is still visible
                setTimeout(function() {
                    const modals = Array.from(document.querySelectorAll('.modal-container'));
                    const anyVisible = modals.some(m => window.getComputedStyle(m).display !== 'none' && m.getBoundingClientRect().height > 0);
                    if (!anyVisible) {
                        document.body.classList.remove('modal-open');
                    }
                }, 10);
            }
        } catch (err) {
            console.error('modal-visibility-changed handler error', err);
        }
    });
</script>