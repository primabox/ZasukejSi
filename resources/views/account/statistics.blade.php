@extends('layouts.account')

@section('title', __('front.account.statistics.page_title'))

@php
    $activeItem = 'statistics';
@endphp

@section('account-content')
    <div class="mb-4 md:mb-8">
        <h1 class="text-2xl md:text-4xl font-semibold text-secondary py-3 md:py-6 text-center">
            {{ __('front.account.statistics.page_title') }}
        </h1>
        <hr>
    </div>

    <!-- Statistics Content -->
    <div class="py-6">
        @livewire('profile-statistics')
    </div>
@endsection
