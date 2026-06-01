<style>
    .search-hero-card {
        width: 1134px;
        max-width: 100%;
        height: 218px;
        background: #FFFFFF;
        border-radius: 24px;
        border: 1px solid #EDE7EE;
        box-shadow: 0 10px 25px 0 rgba(220, 214, 221, 0.95);
        padding: 30px 42px;
        box-sizing: border-box;
        margin: 0 auto;
        position: relative;
        z-index: 25;
        opacity: 1;
    }

    .search-hero-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 16px;
    }

    .search-hero-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 18px;
        color: #505050;
        margin: 0;
    }

    .search-hero-heart {
        width: 20px;
        height: 20px;
        stroke: #DD3888;
    }

    .search-hero-badges {
        display: flex;
        gap: 10px;
    }

    .search-badge {
        width: 167px;
        height: 26px;
        border-radius: 999px;
        background: #F2F2F2;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        box-sizing: border-box;
        padding: 0 10px;
    }

    .search-badge-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #00B80F;
        flex: 0 0 10px;
    }

    .search-badge-strong {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 11px;
        color: #505050;
        line-height: 1;
        white-space: nowrap;
    }

    .search-badge-soft {
        font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 11px;
        color: #A6A6A6;
        line-height: 1;
        white-space: nowrap;
    }

    .search-hero-form-row {
        display: flex;
        align-items: flex-end;
        gap: 12px;
    }

    .search-hero-field {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .search-hero-field.region { width: 601px; }
    .search-hero-field.age { width: 205px; }

    .search-hero-label {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 14px;
        color: #505050;
        margin: 0;
    }

    .search-select-wrap {
        position: relative;
        width: 100%;
        height: 60px;
        background: #FFFFFF;
        border: 2px solid #E6E6E6;
        border-radius: 8px;
        box-sizing: border-box;
        overflow: visible;
        transition: transform 240ms cubic-bezier(.2,.9,.3,1), box-shadow 240ms cubic-bezier(.2,.9,.3,1), border-color 240ms cubic-bezier(.2,.9,.3,1);
    }

    .search-select-wrap.is-open {
        border-color: #DD3888;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(221, 56, 136, 0.18);
    }

    .search-select-trigger {
        width: 100%;
        height: 100%;
        border: 0;
        outline: 0;
        background: transparent;
        padding: 0 64px 0 16px;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 14px;
        color: #505050;
        cursor: pointer;
        text-align: left;
        display: flex;
        align-items: center;
    }

    .search-arrow-box {
        position: absolute;
        right: 4px;
        top: 4px;
        width: 50px;
        height: 50px;
        border-radius: 6px;
        background: #F2F2F2;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
        transition: background-color 220ms ease;
    }

    .search-arrow-box svg {
        transition: transform 260ms cubic-bezier(.2,.9,.3,1);
        transform-origin: center;
    }

    .search-select-wrap.is-open .search-arrow-box {
        background: #FBE7F2;
    }

    .search-select-wrap.is-open .search-arrow-box svg {
        transform: rotate(180deg);
    }

    .search-dropdown-panel {
        position: absolute;
        left: -2px;
        top: calc(100% + 8px);
        width: calc(100% + 4px);
        max-height: 260px;
        overflow-y: auto;
        background: #FFFFFF;
        border: 2px solid #F0E7EE;
        border-radius: 12px;
        box-shadow: 0 14px 30px rgba(92, 45, 98, 0.14);
        z-index: 95;
        padding: 8px;
        box-sizing: border-box;
    }

    .search-dropdown-item {
        width: 100%;
        border: 0;
        border-radius: 8px;
        background: transparent;
        padding: 10px 12px;
        text-align: left;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 14px;
        color: #505050;
        cursor: pointer;
        transition: background-color 160ms ease, color 160ms ease, transform 160ms ease;
    }

    .search-dropdown-item:hover {
        background: #F9EFF5;
        color: #5C2D62;
        transform: translateX(2px);
    }

    .search-dropdown-item.is-active {
        background: #DD3888;
        color: #FFFFFF;
    }

    .search-submit {
        width: 210px;
        height: 60px;
        border: 0;
        border-radius: 8px;
        background: #DD3888;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 16px;
        color: #FFFFFF;
        cursor: pointer;
    }

    .search-submit-icon {
        width: 24px;
        height: 24px;
        stroke: #FFFFFF;
    }

    @media (max-width: 1024px) {
        .search-hero-card {
            height: auto;
            padding: 22px 18px;
        }

        .search-hero-top {
            flex-direction: column;
            gap: 12px;
            margin-bottom: 12px;
        }

        .search-hero-form-row {
            flex-wrap: wrap;
        }

        .search-hero-field.region,
        .search-hero-field.age,
        .search-submit {
            width: 100%;
        }

        .search-hero-badges {
            width: 100%;
            flex-wrap: wrap;
        }
    }
</style>

<div class="search-hero-card" x-data="{ openRegion: false, openAge: false, regionValue: @js($region ?: 'Hlavní město Praha'), ageValue: @js($age_range ?: '18'), ages: @js($this->ageRangeOptions) }" @click.outside="openRegion = false; openAge = false" @keydown.escape.window="openRegion = false; openAge = false">
    <div class="search-hero-top">
        <h4 class="search-hero-title">
            <svg class="search-hero-heart" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M12 21s-6.716-4.35-9.11-8.028C.927 10.024 2.08 5.96 5.82 5.14 8.001 4.67 9.83 5.5 11 7.01c1.17-1.51 2.999-2.34 5.18-1.87 3.74.82 4.893 4.885 2.93 7.832C18.716 16.65 12 21 12 21Z" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Najděte si společnost...</span>
        </h4>

        <div class="search-hero-badges" aria-hidden="true">
            <div class="search-badge">
                <span class="search-badge-dot"></span>
                <span class="search-badge-strong">1 420 dívek</span>
                <span class="search-badge-soft">registrováno</span>
            </div>
            <div class="search-badge">
                <span class="search-badge-dot"></span>
                <span class="search-badge-strong">382 mužů</span>
                <span class="search-badge-soft">registrováno</span>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="search">
        <div class="search-hero-form-row">
            <div class="search-hero-field region">
                <label class="search-hero-label" for="region-select">Vyberte kraj</label>
                <div class="search-select-wrap" x-bind:class="{ 'is-open': openRegion }">
                    <button id="region-select" type="button" class="search-select-trigger" @click="openRegion = !openRegion; openAge = false">
                        <span x-text="regionValue"></span>
                    </button>
                    <span class="search-arrow-box">
                        <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M1 1L5 4L9 1" stroke="#DD3888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>

                    <div class="search-dropdown-panel" x-show="openRegion" x-cloak x-transition:enter="transition ease-out duration-220" x-transition:enter-start="opacity-0 -translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-160" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 -translate-y-1">
                        @foreach($this->allRegions as $regionOption)
                            <button type="button" class="search-dropdown-item" x-bind:class="{ 'is-active': regionValue === @js($regionOption) }" @click="regionValue = @js($regionOption); openRegion = false; $wire.set('region', @js($regionOption))">{{ $regionOption }}</button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="search-hero-field age">
                <label class="search-hero-label" for="age-select">Věk dívky</label>
                <div class="search-select-wrap" x-bind:class="{ 'is-open': openAge }">
                    <button id="age-select" type="button" class="search-select-trigger" @click="openAge = !openAge; openRegion = false">
                        <span x-text="ages[ageValue] || '18 let'"></span>
                    </button>
                    <span class="search-arrow-box">
                        <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M1 1L5 4L9 1" stroke="#DD3888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>

                    <div class="search-dropdown-panel" x-show="openAge" x-cloak x-transition:enter="transition ease-out duration-220" x-transition:enter-start="opacity-0 -translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-160" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 -translate-y-1">
                        @foreach($this->ageRangeOptions as $ageKey => $ageLabel)
                            <button type="button" class="search-dropdown-item" x-bind:class="{ 'is-active': ageValue === @js($ageKey) }" @click="ageValue = @js($ageKey); openAge = false; $wire.set('age_range', @js($ageKey))">{{ $ageLabel }}</button>
                        @endforeach
                    </div>
                </div>
            </div>

            <button type="submit" class="search-submit" wire:loading.attr="disabled" wire:loading.class="opacity-80">
                <span wire:loading.remove wire:target="search">Vyhledat</span>
                <span wire:loading wire:target="search">Vyhledávám</span>
                <svg wire:loading.remove wire:target="search" class="search-submit-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <circle cx="11" cy="11" r="7" stroke-width="2"/>
                    <path d="M16.5 16.5L21 21" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </form>
</div>