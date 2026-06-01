@extends('layouts.app')

@section('title', __('front.title'))

@section('content')
<style>
    .hero-bg {
        width: min(1331px, calc(100% - 24px));
        height: 602px;
        margin: 0 auto;
        border-bottom-left-radius: 24px;
        border-bottom-right-radius: 24px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        overflow: visible;
        position: relative;
        z-index: 30;
    }

    .hero-bg .hero-inner {
        height: 100%;
        position: relative;
        z-index: 31;
    }

    .hero-search-wrap {
        margin-top: auto;
        padding-left: 0;
        padding-right: 0;
        transform: translateY(28px);
        position: relative;
        z-index: 60;
    }

    .profiles-section-wrap {
        position: relative;
        z-index: 1;
    }

    .hero-main-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-size: 50px;
        line-height: 1.08;
        color: #5C2D62;
    }

    .hero-main-title .hero-main-highlight {
        color: #DD3888;
    }

    .hero-main-title .hero-main-period {
        color: #5C2D62;
    }

    .hero-subtitle {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 20px;
        line-height: 1.3;
        color: #5C5C5C;
        max-width: 430px;
        margin-bottom: 0;
    }

    .hero-copy-block {
        transform: translateX(15px);
    }

    @media (max-width: 1024px) {
        .hero-bg {
            width: calc(100% - 12px);
            height: auto;
            min-height: 520px;
        }
    }

    @media (max-width: 640px) {
        .hero-bg {
            width: 100%;
            min-height: 420px;
            border-bottom-left-radius: 24px;
            border-bottom-right-radius: 24px;
        }

        .hero-main-title {
            font-size: 36px;
        }

        .hero-subtitle {
            font-size: 18px;
        }

        .hero-copy-block {
            transform: translateX(0);
        }

        .hero-search-wrap {
            transform: translateY(16px);
        }
    }
</style>
<!-- Hero Section  max-w-[1331px] -->
<div class="hero-bg" style="background-image: url('/images/header.png');">
    <div class="hero-inner container mx-auto px-4 pt-16 md:pt-24 pb-8 flex flex-col min-h-[420px] md:min-h-[520px]">
        <div class="max-w-2xl px-4 md:pl-16 py-10 md:py-16 hero-copy-block">
            <h1 class="hero-main-title py-4 md:py-5">
                Jsme komunita lidí,<br>
                co rádi <span class="hero-main-highlight">šukají</span><span class="hero-main-period">.</span>
            </h1>

            <p class="hero-subtitle">
                Dívky, registrujte se ještě dnes<br>
                a získej nové zákazníky.
            </p>
        </div>

        <div class="hero-search-wrap">
            <!-- Search Card -->
            <livewire:search-profiles />
        </div>
    </div>
</div>

<!-- Profiles Section -->

<div class="container mx-auto px-4 pt-20 profiles-section-wrap">
    <livewire:profile-list />
</div>

<!-- Blog pages list gallery -->
<x-blog-listing :posts="$blogPosts" />


<div class="-z-10 absolute top-[620px] left-0 right-0 -bottom-1 overflow-x-hidden">
    <div class="radial-blur"></div>
    <div class="radial-blur-secondary radial-blur-right"></div>
    <div class="radial-blur-secondary "></div>
</div>

@endsection