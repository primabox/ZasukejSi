<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @media (max-width: 425px) {
            .warning-banner {
                width: 309px !important;
                height: 110px !important;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            .warning-text-container {
                width: 223px !important;
                height: 83px !important;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                text-align: left;
            }
            .warning-text-container span {
                white-space: normal !important;
                line-height: 1.2;
                text-align: left;
            }
            .warning-banner-icon {
                position: absolute;
                top: 8px;
                left: 8px;
            }
            .warning-banner-close {
                position: absolute;
                top: 8px;
                right: 8px;
            }
            /* Stats Cards Mobile */
            .stats-container {
                flex-direction: column !important;
                align-items: center !important;
                width: 100% !important;
                gap: 30px !important;
            }
            .stats-card {
                width: 313px !important;
                height: 100px !important;
            }
            /* Field Containers Mobile */
            .field-container-mobile {
                width: 310px !important;
                margin: 0 auto !important;
            }
            /* Input Forms Mobile */
            .form-input-mobile {
                width: 308px !important;
            }
            /* Mobile Divider */
            .divider-mobile {
                width: 313px !important;
            }
            /* Content Container Mobile */
            .content-container-mobile {
                width: 313px !important;
                margin: 0 auto !important;
            }
            /* Sidebar Mobile Hide */
            .sidebar-desktop {
                display: none !important;
            }
            /* Status Info Mobile */
            .status-container-mobile {
                display: flex !important;
                justify-content: space-between;
                width: 312px !important;
            }
            /* Hide Desktop Status Info */
            .status-container-desktop {
                display: none !important;
            }
            /* Reordering Mobile */
            .mobile-order-1 { order: 1; }
            .mobile-order-2 { order: 2; }
            .mobile-order-3 { order: 3; }
        }
    </style>
</head>
<body class="bg-white">

<x-navbar />

<div class="container mx-auto pt-32 px-4">
    <!-- Warning Banner -->
    <div class="warning-banner w-[1134px] h-[50px] bg-[#FFE0E5] rounded-[8px] flex items-center justify-center relative px-4 mb-8 mx-auto">
        <div class="warning-text-container flex items-center gap-3">
            <img src="{{ asset('images/icons/octagonAlert.svg') }}" class="warning-banner-icon w-[20px] h-[20px]" alt="Alert">
            <span class="font-medium text-[14px] text-[#505050] whitespace-nowrap" style="font-family: 'Poppins', sans-serif;">
                Dokončete registraci Oprávněné aniž i odstoupil o <span class="underline">snadno osoby</span> vede grafikou osobami
            </span>
        </div>
        <button class="warning-banner-close text-[#DD3888] font-bold absolute right-4">X</button>
    </div>
    
    <!-- Stats Cards & Basic Info -->
    <div class="mb-8 flex flex-col md:flex-row">
        <!-- Title & Basic Info -->
        <div class="mobile-order-1 flex flex-col items-center">
            <h2 class="font-bold text-[36px] text-[#5C2D62] mb-8" style="font-family: 'Poppins', sans-serif;">Základní údaje</h2>
            <div class="divider-mobile w-[843px] h-[1px] bg-[#E6E6E6] my-8"></div>
            
            <div class="status-container-mobile hidden mb-8">
                <div class="flex items-center gap-1.5">
                    <div class="w-[14px] h-[14px] rounded-full bg-[#00B80F]"></div>
                    <span class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">Nyní si online</span>
                </div>
                <span class="text-[13px] text-[#505050] underline" style="font-family: 'Poppins', sans-serif; color: #DD3888;">nastavení</span>
            </div>
        </div>

        <!-- Stats Cards Container -->
        <div class="mobile-order-2 stats-container flex flex-wrap justify-end gap-4 mb-8 w-[1134px] mx-auto">
            <div class="stats-card w-[272px] h-[100px] rounded-[8px] flex flex-col items-center justify-center bg-gradient-to-t from-[#FFFFFF] to-[#E6E6E6]">
                <img src="{{ asset('images/icons/eye.svg') }}" class="w-[28px] h-[28px] mb-1" alt="Eye">
                <span class="font-bold text-[24px] text-[#5C2D62]" style="font-family: 'Poppins', sans-serif;">10 458</span>
                <span class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">Celkové zobrazení profilu</span>
            </div>

            <div class="stats-card w-[272px] h-[100px] rounded-[8px] flex flex-col items-center justify-center bg-gradient-to-t from-[#FFFFFF] to-[#E6E6E6]">
                <img src="{{ asset('images/icons/thumbsup.svg') }}" class="w-[28px] h-[28px] mb-1" alt="Thumbsup">
                <span class="font-bold text-[24px] text-[#5C2D62]" style="font-family: 'Poppins', sans-serif;">4.78/5</span>
                <span class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">Moje hodnocení</span>
            </div>
            
            <div class="stats-card w-[272px] h-[100px] rounded-[8px] flex flex-col items-center justify-center bg-gradient-to-t from-[#FFFFFF] to-[#E6E6E6]">
                <img src="{{ asset('images/icons/MessageCircleMore.svg') }}" class="w-[28px] h-[28px] mb-1" alt="Message">
                <span class="font-bold text-[24px] text-[#5C2D62]" style="font-family: 'Poppins', sans-serif;">12</span>
                <span class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">moje recenze</span>
            </div>
        </div>
        <div class="status-container-desktop flex flex-col items-end">
            <div class="flex items-center gap-1.5">
                <div class="w-[14px] h-[14px] rounded-full bg-[#00B80F]"></div>
                <span class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">Nyní si online</span>
            </div>
            <span class="text-[13px] text-[#505050] underline" style="font-family: 'Poppins', sans-serif; color: #DD3888;">nastavení</span>
        </div>
    </div>

    <div class="flex justify-center mb-8 gap-x-4">
        <div class="sidebar-desktop flex flex-col w-[211px] gap-[10px]">
            <div class="flex flex-col w-[211px] h-[290px] gap-[10px] mt-[30px]">
                <div class="w-[210px] h-[50px] rounded-[8px] border border-[#E6E6E6] flex items-center px-4 gap-3 font-medium text-[14px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">
                    <img src="{{ asset('images/icons/User.svg') }}" class="w-[20px] h-[20px]" alt="User" style="filter: invert(36%) sepia(87%) saturate(2222%) hue-rotate(309deg) brightness(90%) contrast(92%);">
                    základní udaje
                </div>
                <div class="w-[210px] h-[50px] rounded-[8px] border border-[#E6E6E6] flex items-center px-4 gap-3 font-medium text-[14px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">
                    <img src="{{ asset('images/icons/Images.svg') }}" class="w-[20px] h-[20px]" alt="Images">
                    Fotografie a video
                </div>
                <div class="w-[210px] h-[50px] rounded-[8px] border border-[#E6E6E6] flex items-center px-4 gap-3 font-medium text-[14px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">
                    <img src="{{ asset('images/icons/list.svg') }}" class="w-[20px] h-[20px]" alt="List">
                    Moje služby a ceny
                </div>
                <div class="w-[210px] h-[50px] rounded-[8px] bg-[#DD3888] flex items-center px-4 gap-3 font-medium text-[14px] text-white" style="font-family: 'Poppins', sans-serif;">
                    <img src="{{ asset('images/icons/BarChart4.svg') }}" class="w-[20px] h-[20px]" alt="BarChart" style="filter: brightness(0) invert(1);">
                    Statistiky
                </div>
                <div class="w-[210px] h-[50px] rounded-[8px] border border-[#E6E6E6] flex items-center px-4 gap-3 font-medium text-[14px] text-[#A4A4A4]" style="font-family: 'Poppins', sans-serif;">
                    <img src="{{ asset('images/icons/thumbsup.svg') }}" class="w-[20px] h-[20px]" alt="Thumbsup" style="filter: invert(75%) sepia(0%) saturate(0%) hue-rotate(186deg) brightness(91%) contrast(85%);">
                    recenze - již brzy
                </div>
            </div>
            <div class="block w-[210px] h-[464px] mt-4">
                <img src="{{ asset('images/dvert2.png') }}?v={{ time() }}" class="w-full h-full object-cover rounded-[8px]" alt="Advertisement">
            </div>
        </div>
        <div class="content-container-mobile w-[843px] flex flex-col items-center">
            <div class="divider-mobile w-[843px] h-[1px] bg-[#E6E6E6] my-8"></div>
            
            <!-- Moje údaje -->
            <div class="moje-udaje-mobile flex flex-col w-[400px]">
                <h3 class="font-bold text-[24px] text-[#5C2D62] mb-8 self-start" style="font-family: 'Poppins', sans-serif;">Moje údaje</h3>
                
                <div class="field-container-mobile w-[400px] h-[84px] flex flex-col gap-2 items-center">
                    <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Vaše přezdívka</label>
                    <input type="text" class="form-input-mobile w-[400px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="Příklad přezdívky">
                </div>
                
                <!-- Email -->
                <div class="field-container-mobile w-[400px] h-[84px] flex flex-col gap-2 items-center mt-4">
                    <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Váš email</label>
                    <input type="email" class="form-input-mobile w-[400px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="priklad@email.cz">
                </div>

                <!-- Moje tělo -->
                <h3 class="font-bold text-[24px] text-[#5C2D62] my-8 self-start" style="font-family: 'Poppins', sans-serif;">Moje tělo</h3>
                <div class="field-container-mobile w-[400px] h-[84px] flex flex-col gap-2 items-center">
                    <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Věk</label>
                    <input type="number" class="form-input-mobile w-[400px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="25">
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>