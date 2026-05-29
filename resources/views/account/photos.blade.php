@extends('layouts.account')

@section('title', __('front.account.photos.title'))

@php
    $activeItem = 'photos';
@endphp

@section('account-content')
    <div class="mb-4 md:mb-8">
        <h1 class="text-2xl md:text-4xl font-semibold text-secondary py-3 md:py-6 text-center">
            {{ __('front.account.photos.title') }}
        </h1>
        <hr>
    </div>

    @livewire('photos-manager')
@endsection