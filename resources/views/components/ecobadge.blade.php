<div {{ $attributes->merge(['class' => 'inline-flex w-full max-w-[309px] items-center gap-3 rounded-[12px] bg-[#E6FEE8] px-[18px] py-[14px]']) }}>
    <img src="{{ asset('images/icons/eco.svg') }}" alt="" width="36" height="36" aria-hidden="true" class="h-[36px] w-[36px] shrink-0 md:h-[42px] md:w-[42px]" />

    <div class="flex min-w-0 flex-col gap-1 text-left">
        <span class="block text-[11px] leading-[1.1] md:text-[15px]" style="font-family: 'Poppins', sans-serif; font-weight: 800; color: #00B80F;">
            {{ __('front.footer.ecological') }}
        </span>
        <span class="block text-[11px] leading-[1.25] md:text-[12.8px]" style="font-family: 'Poppins', sans-serif; font-weight: 500; color: #505050;">
            {{ __('front.footer.verification') }}
        </span>
    </div>
</div>
