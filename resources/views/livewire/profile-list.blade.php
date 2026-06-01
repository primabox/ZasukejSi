<div>
    <div class="mt-1 md:mt-2 md:px-8 lg:px-12 py-4 md:py-9 flex items-center gap-2 md:gap-4">
        <x-icons name="search" class="w-5 h-5 md:w-7 md:h-7 text-primary-600" />
        <h1 class="text-2xl md:text-4xl font-bold text-secondary">{{ __('front.profiles.list.topresults') }}</h1>
    </div>

    <!-- Quick Filters -->
    <div class="mb-4 md:mb-8 md:px-8 lg:px-12" x-data="{
        init() {
            Livewire.on('filters-updated', () => {
                this.$nextTick(() => {
                    // Re-evaluate Alpine bindings if needed
                });
            });
        }
    }">
        <style>
            .filter-pill {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 8px 16px;
                border-radius: 9999px;
                font-size: 14px;
                font-weight: 500;
                transition: all 0.2s ease-in-out;
                cursor: pointer;
                border: 2px solid transparent;
            }

            .filter-pill.inactive {
                background-color: #FFFFFF;
                border-color: #F2F2F2;
                color: #374151;
            }

            .filter-pill.active {
                background-color: #F2F2F2;
                border-color: #F2F2F2;
                color: #374151;
            }

            .filter-pill .icon {
                width: 16px;
                height: 16px;
                margin-right: 8px;
            }

            .filter-switch {
                width: 33px;
                height: 18px;
                border-radius: 7500px;
                background-color: #E4E4E7;
                position: relative;
                transition: background-color 0.2s ease-in-out;
                margin-left: 8px;
            }

            .filter-switch-thumb {
                position: absolute;
                top: 1.5px;
                left: 1.5px;
                width: 15px;
                height: 15px;
                background-color: #FFFFFF;
                border-radius: 9999px;
                transition: transform 0.2s ease-in-out;
            }

            .filter-pill.active .filter-switch {
                background-color: #DD3888;
            }

            .filter-pill.active .filter-switch-thumb {
                transform: translateX(15px);
            }
        </style>

        <!-- Age Group Filters - Desktop Buttons -->
        <div class="hidden md:flex flex-wrap gap-2 md:gap-3 mb-3 md:mb-4">
            <!-- All Girls Filter -->
            <button wire:click.debounce.300ms="toggleAgeGroup('')"
                :class="{
                    'filter-pill active': '{{ $ageGroup }}' === '',
                    'filter-pill inactive': '{{ $ageGroup }}' !== ''
                }">
                <img src="{{ asset('images/icons/profile.svg') }}" alt="Profile Icon" class="icon" style="filter: invert(34%) sepia(98%) saturate(1551%) hue-rotate(310deg) brightness(90%) contrast(95%);">
                {{ __('front.profiles.list.all_girls') }}
            </button>

            @foreach ([
                '18-25' => __('front.profiles.list.age_18_25'),
                '26-30' => __('front.profiles.list.age_26_30'),
                '31-35' => __('front.profiles.list.age_31_35'),
                '36-40' => __('front.profiles.list.age_36_40'),
                '40-50' => __('front.profiles.list.age_40_50'),
                '50+' => __('front.profiles.list.age_50_plus'),
            ] as $value => $label)
                <button wire:click.debounce.300ms="toggleAgeGroup('{{ $value }}')"
                    :class="{
                        'filter-pill active': '{{ $ageGroup }}' === '{{ $value }}',
                        'filter-pill inactive': '{{ $ageGroup }}' !== '{{ $value }}'
                    }">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <!-- Feature Filters -->
        <div class="hidden md:flex flex-wrap gap-2 md:gap-3">
            <!-- Recommendation Filter -->
            <button wire:click.debounce.300ms="toggleRecommendation"
                :class="{
                    'filter-pill active': '{{ $sortRecommendation }}' !== '',
                    'filter-pill inactive': '{{ $sortRecommendation }}' === ''
                }">
                <img src="{{ asset('images/icons/ArrowUp.svg') }}" alt="Arrow Up Icon" class="icon" style="filter: invert(34%) sepia(98%) saturate(1551%) hue-rotate(310deg) brightness(90%) contrast(95%);">
                {{ __('front.profiles.list.recommendation') }}
            </button>

            <!-- Verified Photo Filter -->
            <button wire:click.debounce.300ms="toggleVerifiedPhoto"
                :class="{
                    'filter-pill active': {{ $hasVerifiedPhoto ? 'true' : 'false' }},
                    'filter-pill inactive': {{ !$hasVerifiedPhoto ? 'true' : 'false' }}
                }">
                {{ __('front.profiles.list.verified_photo') }}
                <div class="filter-switch">
                    <div class="filter-switch-thumb"></div>
                </div>
            </button>

            <!-- Video Filter -->
            <button wire:click.debounce.300ms="toggleVideo"
                :class="{
                    'filter-pill active': {{ $hasVideo ? 'true' : 'false' }},
                    'filter-pill inactive': {{ !$hasVideo ? 'true' : 'false' }}
                }">
                {{ __('front.profiles.list.video') }}
                <div class="filter-switch">
                    <div class="filter-switch-thumb"></div>
                </div>
            </button>

            <!-- Porn Actress Filter -->
            <button wire:click.debounce.300ms="togglePornActress"
                :class="{
                    'filter-pill active': {{ $isPornActress ? 'true' : 'false' }},
                    'filter-pill inactive': {{ !$isPornActress ? 'true' : 'false' }}
                }">
                {{ __('front.profiles.list.porn_actress') }}
                <div class="filter-switch">
                    <div class="filter-switch-thumb"></div>
                </div>
            </button>

            <!-- New Filter -->
            <button wire:click.debounce.300ms="toggleNew"
                :class="{
                    'filter-pill active': '{{ $sortNew }}' !== '',
                    'filter-pill inactive': '{{ $sortNew }}' === ''
                }">
                {{ __('front.profiles.list.new') }}
            </button>

            <!-- Rating Filter -->
            <button wire:click.debounce.300ms="toggleRating"
                :class="{
                    'filter-pill active': {{ $hasRating ? 'true' : 'false' }},
                    'filter-pill inactive': {{ !$hasRating ? 'true' : 'false' }}
                }">
                <img src="{{ asset('images/icons/lock.svg') }}" alt="Lock Icon" class="icon">
                {{ __('front.profiles.list.rating') }}
            </button>

            <!-- Clear All Filters Button -->
            @if ($this->activeFiltersCount() > 0)
                <button wire:click.debounce.300ms="resetFilters" wire:loading.attr="disabled" wire:target="resetFilters"
                    class="filter-pill inactive"
                    title="{{ __('front.profiles.list.clear_all_filters') }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            @endif
        </div>

        <!-- Active Filters Count -->
        @if ($this->activeFiltersCount() > 0)
            <div class="mt-4">
                <span class="text-sm text-gray-600">
                    {{ __('front.profiles.list.filters_active', ['count' => $this->activeFiltersCount()]) }}
                </span>
            </div>
        @endif
    </div>

    @if ($this->profiles() && $this->profiles()->count() > 0)
        <!-- Profiles Grid -->
        <div class="space-y-4 md:space-y-6 relative px-0 md:px-8 lg:px-12">
            <!-- Loading Overlay -->
            <div wire:loading
                wire:target="toggleAgeGroup,toggleRecommendation,toggleVerifiedPhoto,toggleVideo,togglePornActress,toggleNew,toggleRating,resetFilters,updateFilters"
                class="absolute inset-0 bg-white/80 z-10 flex items-center justify-center pt-12">
                <div class="flex flex-col items-center">
                    <svg class="animate-spin h-12 w-12 text-primary-600" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($this->profiles() as $profile)
                    {{-- Insert Advert Hero after second row (10 items on xl screens) --}}
                    @if ($loop->iteration === 6)
                        <div class="col-span-full my-4">
                            <div
                                class="shadow md:shadow-none md:bg-green-100 shadow-green-200 transition rounded-2xl py-3.5 px-4 md:px-6 mx-auto">
                                <div
                                    class="flex flex-col md:flex-row items-center justify-center gap-2 md:gap-3 text-center">
                                    <x-icons name="eco"
                                        class="w-7 h-7 md:w-5 md:h-5 text-green-600 flex-shrink-0" />
                                    <p class="text-xs md:text-sm font-medium text-green-600">
                                        <span class="font-semibold text-green-700">
                                            {{ __('front.profiles.list.eco_friendly') }}
                                        </span>
                                        {{ __('front.profiles.list.eco_friendly_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($loop->iteration === 11)
                        <div class="col-span-full hidden lg:block -my-20 -mx-6 md:-mx-8 lg:-mx-12 relative z-0">
                            <x-advert-hero />
                        </div>
                    @endif

                    <x-profile-card :profile="$profile" />
                @endforeach
            </div>

            <!-- Load More Button -->
            @if ($this->profiles()->hasMorePages())
                <div class="text-center mt-8">
                    <button wire:click="loadMore" wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed shadow hover:shadow-md px-8 py-3 text-base bg-secondary-600 text-white hover:bg-secondary-700 focus:ring-secondary-500">
                        <svg wire:loading wire:target="loadMore" class="animate-spin -ml-1 mr-2 h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span wire:loading.remove
                            wire:target="loadMore">{{ __('front.profiles.list.loadmore') }}</span>
                        <span wire:loading wire:target="loadMore">{{ __('front.profiles.list.loadingmore') }}</span>
                    </button>
                </div>
            @endif

            <!-- Results Count -->
            <div class="text-center text-sm text-gray-600 mt-4">
                <span>{{ __('front.profiles.list.showing') }} {{ $this->profiles()->count() }}
                    {{ __('front.profiles.list.of') }} {{ $this->profiles()->total() }}
                    {{ __('front.profiles.list.profiles') }}</span>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-16" wire:loading.remove>
            <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <h3 class="text-gray-500 mb-2">{{ __('front.profiles.list.nofound') }}</h3>
            <p class="text-gray-600 mb-6">{{ __('front.profiles.list.tryadjusting') }}</p>

            <button wire:click="resetFilters" class="btn btn-primary">
                {{ __('front.profiles.list.showall') }}
            </button>
        </div>
    @endif


</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if Swiper is available
            if (typeof Swiper === 'undefined') {
                console.error('Swiper is not loaded. Make sure to build assets with npm run build');
                return;
            }

            initializeSwipers();
        });

        // Initialize Swiper instances
        function initializeSwipers() {
            // Find all profile swipers and initialize them
            document.querySelectorAll('[class*="profile-swiper-"]').forEach(function(swiperEl) {
                const profileId = swiperEl.className.match(/profile-swiper-(\d+)/)[1];

                // Destroy existing swiper instance if any
                if (swiperEl.swiper) {
                    swiperEl.swiper.destroy(true, true);
                }

                // Initialize new Swiper instance
                new Swiper(swiperEl, {
                    loop: true,
                    pagination: {
                        el: `.swiper-pagination-${profileId}`,
                        clickable: true,
                        dynamicBullets: true,
                    },
                    preloadImages: true,
                });
            });
        }

        // Re-initialize Swiper when Livewire updates content
        document.addEventListener('livewire:navigated', function() {
            setTimeout(initializeSwipers, 100);
        });

        // For Livewire v3 - when content is updated via AJAX
        if (typeof Livewire !== 'undefined') {
            Livewire.hook('morph.updated', () => {
                setTimeout(initializeSwipers, 100);
            });

            // Also listen for specific Livewire events
            Livewire.on('profiles-updated', () => {
                setTimeout(initializeSwipers, 100);
            });
        }
    </script>
@endpush
