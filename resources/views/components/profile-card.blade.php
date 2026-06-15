@props(['profile', 'imageOverride' => null, 'imagesOverride' => null, 'variant' => null])

@php
    $shouldBlur = $variant === 'vip-detail';
    $cardContent = is_array($profile->content) ? $profile->content : [];
    $cardLocation = $cardContent['card_location'] ?? $profile->city;
    $cardHeightCm = $cardContent['card_height_cm'] ?? 168;
@endphp

<div class="bg-white rounded-lg overflow-hidden transition-all duration-300 cursor-pointer group relative z-10 home-profile-card" style="width: 210px; height: 510px; border-radius: 15px; box-shadow: 0 15px 15px 0 rgba(92, 45, 98, 0.1);">
    <!-- Profile Image -->
    <div class="relative overflow-hidden home-profile-card-media" style="width: 210px; height: 265px; border-radius: 15px;">

        @if((!$shouldBlur) && ($profile->isVerified() || $profile->isVip()))
        <div class="absolute top-3 left-3 z-20 home-profile-card-badge-stack">
            <!-- Verified Badge -->
            @if($profile->isVerified())
            <div class="home-profile-card-badge">
                <div class="bg-green-100 text-green-500 p-1 px-0.5 rounded-xl flex flex-wrap justify-center home-profile-card-verified-badge">
                    <x-icons name="camera" class="w-5 h-5 home-profile-card-verified-camera" />
                    <p class="text-xs font-bold w-full text-center home-profile-card-verified-copy">
                        {{ __('front.profiles.list.verified') }}
                    </p>
                    <span class="home-profile-card-verified-check" aria-hidden="true">
                        <img src="{{ asset('images/icons/check.svg') }}" alt="" />
                    </span>
                </div>
            </div>
            @endif

            @if($profile->isVip())
            <div class="home-profile-card-vip home-profile-card-vip-mobile" style="width:50px;height:26px;border-radius:999px;background:#FFB700;">
                <x-icons name="star" class="inline-block" style="width:14px;height:14px;color:#FFFFFF;" />
                <span style="font-family:'Poppins', sans-serif; font-weight:900; font-size:10px; color:#FFFFFF; line-height:1;">VIP</span>
            </div>
            @endif
        </div>
        @endif

        @if($shouldBlur)
        <div class="absolute inset-0 z-30 flex items-center justify-center pointer-events-none">
            <span class="inline-flex items-center justify-center bg-white rounded-full p-5 shadow-lg">
                <x-icons name="lock" strokeWidth="1" class="w-8 h-8 -translate-y-0.5" style="color: #DD3888;" />
            </span>
        </div>
        @endif

        <!-- Profile Photo -->
        <div class="w-full h-full bg-gradient-to-br from-primary-100 to-secondary-100 relative overflow-hidden {{ $shouldBlur ? 'blur-md' : '' }}">
            @if($imageOverride)
                <img src="{{ $imageOverride }}" alt="{{ $profile->display_name }}" class="w-full h-full object-cover home-profile-card-image">
            @elseif($profile->getAllImages()->count() > 0)
                @if($profile->hasMultipleImages())
                <!-- Swiper for multiple images -->
                <div class="swiper profile-swiper-{{ $profile->id }} h-full w-full" style="margin-left: 0 !important;">
                    <div class="swiper-wrapper" style="transform: translate3d(0, 0, 0) !important;">
                        @foreach($profile->getAllImages() as $image)
                        <div class="swiper-slide" style="width: 100% !important; flex-shrink: 0;">
                            <img src="{{ $image->getUrl() }}" alt="{{ $profile->display_name }}"
                                class="w-full h-full object-cover home-profile-card-image">
                        </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination swiper-pagination-{{ $profile->id }}"></div>
                </div>
                @else
                <!-- Single image -->
                <img src="{{ $profile->getFirstImageUrl() }}" alt="{{ $profile->display_name }}"
                    class="w-full h-full object-cover home-profile-card-image">
                @endif
            @else
                <!-- No image placeholder -->
                <div class="flex items-center justify-center w-full h-full">
                    <svg class="w-16 h-16 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            @endif

        </div>
    </div>

    <!-- Profile Info -->
    <div class="p-4 space-y-3 home-profile-card-content">
        <!-- Name and VIP Badge -->
        <div class="flex items-center justify-between py-1 home-profile-card-header">
            <h4 class="text-gray-700 flex-grow-0 truncate max-w-[80%] home-profile-card-name {{ $shouldBlur ? 'blur-md' : '' }}" style="font-family: 'Poppins', sans-serif; font-weight:700; font-size:18px; color:#333;">
                {{ $profile->display_name }}
            </h4>
            @if($profile->isVip())
            <div class="home-profile-card-vip home-profile-card-vip-desktop" style="width:50px;height:26px;border-radius:999px;background:#FFB700;display:flex;align-items:center;justify-content:center;gap:6px;">
                <x-icons name="star" class="inline-block" style="width:14px;height:14px;color:#FFFFFF;" />
                <span style="font-family:'Poppins', sans-serif; font-weight:900; font-size:10px; color:#FFFFFF; line-height:1;">VIP</span>
            </div>
            @endif
        </div>

        <!-- Details Button -->
            <a href="{{ $shouldBlur ? '#' : route('profiles.show', $profile) }}"
            class="flex items-center justify-between home-profile-card-cta"
            style="width:170px;height:45px;border-radius:8px;background:#5C2D62;color:#FFFFFF; display:inline-flex; align-items:center; justify-content:space-between; padding:0 16px; font-family:'Poppins', sans-serif; font-weight:600; font-size:16px; text-decoration:none; {{ $shouldBlur ? 'pointer-events:none;' : '' }}">
            <span>{{ __('front.profiles.list.detail') }}</span>
            <x-icons name="search" class="inline-block" style="width:24px;height:24px;color:#FFFFFF;" />
        </a>

            <!-- Age and Height Stats -->
        <div class="home-profile-card-rating-wrap">
            <div class="flex justify-between gap-x-3 home-profile-card-stats">
                <div class="home-profile-card-stat" style="width:82px;height:30px;border-radius:8px;background:#F2F2F2;display:flex;align-items:center;justify-content:center;">
                    <div style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;font-size:11px;color:#505050;">{{ $cardHeightCm }} cm</div>
                </div>
                <div class="home-profile-card-stat" style="width:82px;height:30px;border-radius:8px;background:#F2F2F2;display:flex;align-items:center;justify-content:center;">
                    <div style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;font-size:11px;color:#505050;">{{ $profile->age }} {{ __('front.profiles.list.years') }}</div>
                </div>
            </div>

            <!-- Location -->
            <div class="flex py-2 justify-center items-center gap-x-2 home-profile-card-location">
                @if($cardLocation)
                    <img src="{{ asset('images/icons/location.svg') }}" alt="" aria-hidden="true" class="inline-block" style="width:20px;height:20px;" />
                    <h5 style="margin:0;font-family:'Plus Jakarta Sans', sans-serif;font-weight:600;font-size:11px;color:#505050;">{{ $cardLocation }}</h5>
                @endif
            </div>

            <!-- Rating Badge -->
            <div class="home-profile-card-rating-badge" style="display:flex;align-items:center;justify-content:center;gap:8px;height:40px;border-radius:8px;background:#E6FEE8;padding:0 12px;">
                <div style="font-family:'Plus Jakarta Sans', sans-serif;font-weight:600;font-size:11px;color:#505050;line-height:1;">Hodnocení:</div>
                <div style="font-family:'Poppins', sans-serif;font-weight:600;font-size:14px;color:#5C2D62;line-height:1;">{{ $profile->getTotalRatings() > 0 ? number_format($profile->getAverageRating(), 1) : (4.5 + (($profile->id % 5) * 0.1)) }}/5</div>
                <x-icons name="HeartFilled" class="inline-block flex-shrink-0" style="width:20px;height:20px;" preserveColors="true" />
            </div>

        </div>
    </div>
</div>
