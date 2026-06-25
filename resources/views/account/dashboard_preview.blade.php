<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
    <div class="mb-[88px] stats-container flex flex-nowrap justify-end gap-4 mx-auto w-[1134px]">
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
    <!-- Title & Basic Info -->
    <div class="flex flex-col items-end w-[1134px] mx-auto">
        <div class="w-[843px] flex items-center justify-center relative">
            <h2 class="font-bold text-[36px] text-[#5C2D62]" style="font-family: 'Poppins', sans-serif;">Základní údaje</h2>
            
            <div class="absolute right-0 flex flex-col items-end gap-0.5">
                <div class="flex items-center gap-1.5">
                    <div class="w-[14px] h-[14px] rounded-full bg-[#00B80F]"></div>
                    <span class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">Nyní si online</span>
                </div>
                <span class="text-[13px] text-[#505050] underline" style="font-family: 'Poppins', sans-serif; color: #DD3888;">nastavení</span>
            </div>
        </div>
        <div class="w-[843px] h-[1px] bg-[#E6E6E6] mt-8"></div>
    </div>

    <div class="flex justify-end mb-8 gap-x-12 w-[1134px] mx-auto">
        <div class="flex flex-col w-[211px] gap-[10px]">
            <div class="flex flex-col w-[211px] h-[290px] gap-[10px]">
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
        <div class="w-[843px] flex flex-col items-center mt-12">
            
            <!-- Moje údaje -->
            <div x-data="{ 
                zeme: '', 
                mesto: '', 
                openZeme: false, 
                openMesto: false, 
                countryCodes: {
                    'Albánie': 'al', 'Andorra': 'ad', 'Arménie': 'am', 'Belgie': 'be', 
                    'Bělorusko': 'by', 'Bosna a Hercegovina': 'ba', 'Bulharsko': 'bg', 
                    'Černá Hora': 'me', 'Česká republika': 'cz'
                },
                countryData: {
                    'Albánie': ['Tirana', 'Durrës', 'Vlorë', 'Shkodër', 'Fier'],
                    'Andorra': ['Andorra la Vella', 'Escaldes-Engordany', 'Sant Julià de Lòria'],
                    'Arménie': ['Jerevan', 'Gjumri', 'Vanadzor', 'Vagaršapat'],
                    'Belgie': ['Brusel', 'Antverpy', 'Gent', 'Charleroi', 'Lutych'],
                    'Bělorusko': ['Minsk', 'Homel', 'Mahiljow', 'Vicebsk', 'Hrodna'],
                    'Bosna a Hercegovina': ['Sarajevo', 'Banja Luka', 'Tuzla', 'Zenica', 'Mostar', 'Bihać', 'Brčko', 'Doboj', 'Foča', 'Jahorina', 'Konjic', 'Neum', 'Prijedor', 'Šamac'],
                    'Bulharsko': ['Sofie', 'Plovdiv', 'Varna', 'Burgas', 'Ruse'],
                    'Černá Hora': ['Podgorica', 'Nikšić', 'Pljevlja', 'Bijelo Polje', 'Bar'],
                    'Česká republika': ['Praha', 'Brno', 'Ostrava', 'Plzeň', 'Liberec', 'Olomouc', 'České Budějovice', 'Hradec Králové', 'Ústí nad Labem', 'Pardubice']
                },
                get cities() { return this.countryData[this.zeme] || []; }
            }" class="flex flex-col w-[400px] mx-auto">
                <h3 class="font-bold text-[24px] text-[#5C2D62] mb-8" style="font-family: 'Poppins', sans-serif;">Moje údaje</h3>
                
                <div class="w-[400px] h-[84px] flex flex-col gap-2 items-center">
                    <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Vaše přezdívka</label>
                    <input type="text" class="w-[400px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="Příklad přezdívky">
                </div>
                
                <!-- Email -->
                <div class="w-[400px] h-[84px] flex flex-col gap-2 items-center mt-4">
                    <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Váš email</label>
                    <input type="email" class="w-[400px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="priklad@email.cz">
                </div>

                <!-- Země -->
                <div class="w-[400px] h-auto flex flex-col gap-2 items-center mt-4">
                    <div class="flex justify-between w-[400px]">
                        <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Země</label>
                        <div x-show="zeme === ''" class="flex items-center gap-1.5">
                            <img src="{{ asset('images/icons/octagonAlert.svg') }}" class="w-[20px] h-[20px]" alt="Alert">
                            <span class="text-[13px] text-[#D80027]" style="font-family: 'Poppins', sans-serif;">Povinná položka</span>
                        </div>
                    </div>
                    <div class="relative w-[400px]">
                        <input x-model="zeme" type="text" readonly class="w-[400px] h-[50px] rounded-[8px] border-[2px] px-4 font-bold text-[15px] text-[#505050]" :class="zeme === '' ? '!border-[#D80027]' : '!border-[#E6E6E6]'" style="font-family: 'Poppins', sans-serif;" placeholder="Česká republika">
                        <button @click="openZeme = !openZeme; openMesto = false" class="absolute right-1 top-1 w-[42px] h-[42px] rounded-[4px] bg-[#DD3888] flex items-center justify-center">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 4L9 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <!-- Accordion Options -->
                    <div x-show="openZeme" class="w-[400px] border-[2px] border-t-0 border-[#E6E6E6] rounded-b-[8px] bg-white z-10">
                        <template x-for="country in Object.keys(countryData)" :key="country">
                            <div class="flex items-center p-2 cursor-pointer hover:bg-[#FFE0E5]" @click="zeme = country; mesto = ''; openZeme = false">
                                <img :src="'https://flagcdn.com/' + countryCodes[country] + '.svg'" class="w-[24px] h-[24px] mr-2 rounded-full" alt="Flag">
                                <span x-text="country"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Město -->
                <div class="w-[400px] h-auto flex flex-col gap-2 items-center mt-4">
                    <div class="flex justify-between w-[400px]">
                        <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Město</label>
                        <div x-show="mesto === ''" class="flex items-center gap-1.5">
                            <img src="{{ asset('images/icons/octagonAlert.svg') }}" class="w-[20px] h-[20px]" alt="Alert">
                            <span class="text-[13px] text-[#D80027]" style="font-family: 'Poppins', sans-serif;">Povinná položka</span>
                        </div>
                    </div>
                    <div class="relative w-[400px]">
                        <input x-model="mesto" type="text" readonly class="w-[400px] h-[50px] rounded-[8px] border-[2px] px-4 font-bold text-[15px] text-[#505050]" :class="mesto === '' ? '!border-[#D80027]' : '!border-[#E6E6E6]'" style="font-family: 'Poppins', sans-serif;" placeholder="Praha">
                        <button @click="openMesto = !openMesto; openZeme = false" class="absolute right-1 top-1 w-[42px] h-[42px] rounded-[4px] bg-[#DD3888] flex items-center justify-center">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 4L9 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <!-- Accordion Options -->
                    <div x-show="openMesto" class="w-[400px] border-[2px] border-t-0 border-[#E6E6E6] rounded-b-[8px] bg-white z-10">
                        <template x-for="city in cities" :key="city">
                            <div class="p-2 cursor-pointer hover:bg-[#FFE0E5]" @click="mesto = city; openMesto = false">
                                <span x-text="city"></span>
                            </div>
                        </template>
                        <div x-show="cities.length === 0" class="p-2 text-gray-500">Nejdříve vyberte zemi</div>
                    </div>
                </div>

                <!-- Telefon -->
                <div class="w-[400px] h-[84px] flex flex-col gap-2 items-center mt-4">
                    <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Telefon</label>
                    <input type="tel" class="w-[400px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="+420 123 456 789">
                </div>
                
                <!-- Toggle Switches -->
                <div x-data="{ toggled1: false, toggled2: false }" class="w-[400px] mt-5 flex flex-col gap-[21px]">
                    <div class="flex items-center gap-3">
                        <button @click="toggled1 = !toggled1" 
                                class="w-[44px] h-[24px] rounded-full flex items-center p-[2px] transition-colors duration-300"
                                :class="toggled1 ? 'bg-[#00B80F]' : 'bg-[#E4E4E7]'">
                            <div class="w-[20px] h-[20px] bg-white rounded-full shadow-sm transform transition-transform duration-300"
                                 :class="toggled1 ? 'translate-x-[20px]' : 'translate-x-0'"></div>
                        </button>
                        <span class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">mám WhatsApp</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <button @click="toggled2 = !toggled2" 
                                class="w-[44px] h-[24px] rounded-full flex items-center p-[2px] transition-colors duration-300"
                                :class="toggled2 ? 'bg-[#00B80F]' : 'bg-[#E4E4E7]'">
                            <div class="w-[20px] h-[20px] bg-white rounded-full shadow-sm transform transition-transform duration-300"
                                 :class="toggled2 ? 'translate-x-[20px]' : 'translate-x-0'"></div>
                        </button>
                        <span class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">mám Telegram</span>
                    </div>
                </div>

                <!-- Save Button -->
                <button class="w-[400px] h-[50px] bg-[#E8E8E8] rounded-[8px] flex items-center justify-center gap-2 mt-8">
                    <img src="{{ asset('images/icons/save.svg') }}" class="w-[20px] h-[20px]" alt="Save">
                    <span style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 16px; color: #A4A4A4;">Uložit změny</span>
                </button>
            </div>

            <!-- Divider -->
            <div class="w-[843px] h-[1px] bg-[#E6E6E6] mt-8"></div>

            <!-- Moje tělo -->
            <div x-data="{ 
                vek: '', 
                vaha: '', 
                vyska: '', 
                prsa: '', 
                openPrsa: false,
                prsaOptions: ['A', 'B', 'C', 'D', 'E', 'F']
            }" class="flex flex-col w-[400px] mx-auto mt-8">
                <h3 class="font-bold text-[24px] text-[#5C2D62] mb-8" style="font-family: 'Poppins', sans-serif;">Moje tělo</h3>
                
                <!-- Věk -->
                <div class="w-[400px] h-[84px] flex flex-col gap-2 items-center">
                    <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Věk</label>
                    <input x-model="vek" type="number" class="w-[400px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="25">
                </div>

                <!-- Váha -->
                <div class="w-[400px] h-auto flex flex-col gap-2 items-center mt-4">
                    <div class="flex justify-between w-[400px]">
                        <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Váha (kg)</label>
                        <div x-show="vaha === ''" class="flex items-center gap-1.5">
                            <img src="{{ asset('images/icons/octagonAlert.svg') }}" class="w-[20px] h-[20px]" alt="Alert">
                            <span class="text-[13px] text-[#D80027]" style="font-family: 'Poppins', sans-serif;">Povinná položka</span>
                        </div>
                    </div>
                    <input x-model="vaha" type="number" class="w-[400px] h-[50px] rounded-[8px] border-[2px] px-4 font-bold text-[15px] text-[#505050]" :class="vaha === '' ? '!border-[#D80027]' : '!border-[#E6E6E6]'" style="font-family: 'Poppins', sans-serif;" placeholder="60">
                </div>

                <!-- Výška -->
                <div class="w-[400px] h-[84px] flex flex-col gap-2 items-center mt-4">
                    <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Výška (cm)</label>
                    <input x-model="vyska" type="number" class="w-[400px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="170">
                </div>

                <!-- Prsa -->
                <div class="w-[400px] h-auto flex flex-col gap-2 items-center mt-4">
                    <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Prsa</label>
                    <div class="relative w-[400px]">
                        <input x-model="prsa" type="text" readonly class="w-[400px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050] cursor-pointer" style="font-family: 'Poppins', sans-serif;" placeholder="Vyberte" @click="openPrsa = !openPrsa">
                        <button @click="openPrsa = !openPrsa" class="absolute right-1 top-1 w-[42px] h-[42px] rounded-[4px] bg-[#DD3888] flex items-center justify-center">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 4L9 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div x-show="openPrsa" class="w-[400px] border-[2px] border-t-0 border-[#E6E6E6] rounded-b-[8px] bg-white z-10">
                        <template x-for="option in prsaOptions" :key="option">
                            <div class="p-2 cursor-pointer hover:bg-[#FFE0E5]" @click="prsa = option; openPrsa = false">
                                <span x-text="option"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Save Button -->
                <button class="w-[400px] h-[50px] bg-[#E8E8E8] rounded-[8px] flex items-center justify-center gap-2 mt-8">
                    <img src="{{ asset('images/icons/save.svg') }}" class="w-[20px] h-[20px]" alt="Save">
                    <span style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 16px; color: #A4A4A4;">Uložit změny</span>
                </button>
                </div>

                <!-- Divider -->
                <div class="w-[843px] h-[1px] bg-[#E6E6E6] mt-8"></div>

                <!-- O mně -->
                <div class="flex flex-col w-[400px] mx-auto mt-8">
                    <h3 class="font-bold text-[24px] text-[#5C2D62] mb-8" style="font-family: 'Poppins', sans-serif;">O mně</h3>

                    <div class="w-[400px] h-[440px] flex flex-col gap-2 items-center">
                        <label class="text-[13px] text-[#505050] self-start" style="font-family: 'Poppins', sans-serif;">Napište o sobě (max. 640 znaků)</label>
                        <textarea maxlength="640" class="w-[400px] h-[396px] rounded-[8px] border-[2px] border-[#E6E6E6] p-4 font-medium text-[15px] text-[#505050] resize-none" style="font-family: 'Poppins', sans-serif;" placeholder="Povězte o sobě něco zajímavého..."></textarea>
                    </div>
                    
                    <!-- Save Button -->
                    <button class="w-[400px] h-[50px] bg-[#E8E8E8] rounded-[8px] flex items-center justify-center gap-2 mt-8">
                        <img src="{{ asset('images/icons/save.svg') }}" class="w-[20px] h-[20px]" alt="Save">
                        <span style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 16px; color: #A4A4A4;">Uložit změny</span>
                    </button>
                </div>

                <!-- Divider -->
                <div class="w-[843px] h-[1px] bg-[#E6E6E6] mt-8"></div>

                <!-- InCall / OutCall -->
                <div x-data="{ incall: false, outcall: false }" class="flex flex-col w-[400px] mx-auto mt-8">
                    <h3 class="font-bold text-[24px] text-[#5C2D62] mb-8" style="font-family: 'Poppins', sans-serif;">InCall / OutCall</h3>
                    
                    <div class="flex flex-col gap-[21px]">
                        <div class="flex items-center gap-3">
                            <button @click="incall = !incall" 
                                    class="w-[44px] h-[24px] rounded-full flex items-center p-[2px] transition-colors duration-300"
                                    :class="incall ? 'bg-[#00B80F]' : 'bg-[#E4E4E7]'">
                                <div class="w-[20px] h-[20px] bg-white rounded-full shadow-sm transform transition-transform duration-300"
                                     :class="incall ? 'translate-x-[20px]' : 'translate-x-0'"></div>
                            </button>
                            <span class="text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">InCall</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <button @click="outcall = !outcall" 
                                    class="w-[44px] h-[24px] rounded-full flex items-center p-[2px] transition-colors duration-300"
                                    :class="outcall ? 'bg-[#00B80F]' : 'bg-[#E4E4E7]'">
                                <div class="w-[20px] h-[20px] bg-white rounded-full shadow-sm transform transition-transform duration-300"
                                     :class="outcall ? 'translate-x-[20px]' : 'translate-x-0'"></div>
                            </button>
                            <span class="text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">OutCall</span>
                        </div>
                    </div>

                    <!-- Save Button -->
                    <button class="w-[400px] h-[50px] bg-[#E8E8E8] rounded-[8px] flex items-center justify-center gap-2 mt-8">
                        <img src="{{ asset('images/icons/save.svg') }}" class="w-[20px] h-[20px]" alt="Save">
                        <span style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 16px; color: #A4A4A4;">Uložit změny</span>
                    </button>
                </div>

                <!-- Divider -->
                <div class="w-[843px] h-[1px] bg-[#E6E6E6] mt-8"></div>

                <!-- Moje Ceny pro ČR -->
                <div x-data="{ mena: 'CZK', openMena: false, menaOptions: ['CZK', 'EUR', 'USD'] }" class="flex flex-col w-[843px] mx-auto mt-8">
                    <div class="flex items-center gap-3 mb-8">
                        <img src="https://flagcdn.com/cz.svg" class="w-[30px] h-[30px] rounded-full" alt="CZ Flag">
                        <h3 class="font-bold text-[24px] text-[#5C2D62]" style="font-family: 'Poppins', sans-serif;">Moje Ceny pro ČR</h3>
                    </div>

                    <!-- Měna -->
                    <div class="relative w-[240px]">
                        <label class="text-[13px] text-[#505050] mb-2 block" style="font-family: 'Poppins', sans-serif;">Měna pro ČR</label>
                        <button @click="openMena = !openMena" class="w-[240px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 flex items-center justify-between font-bold text-[15px] text-[#505050] cursor-pointer" style="font-family: 'Poppins', sans-serif;">
                            <span x-text="mena"></span>
                            <div class="w-[42px] h-[42px] rounded-[4px] bg-[#DD3888] flex items-center justify-center -mr-3">
                                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L5 4L9 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </button>
                        <div x-show="openMena" class="w-[240px] border-[2px] border-t-0 border-[#E6E6E6] rounded-b-[8px] bg-white z-10 absolute">
                            <template x-for="option in menaOptions" :key="option">
                                <div class="p-2 cursor-pointer hover:bg-[#FFE0E5]" @click="mena = option; openMena = false">
                                    <span x-text="option"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Price Inputs Row -->
                    <div x-data="{ 
                        rows: [{ id: Date.now() }],
                        addRow() { this.rows.push({ id: Date.now() }) },
                        removeRow(index) { this.rows.splice(index, 1) }
                    }">
                        <template x-for="(row, index) in rows" :key="row.id">
                            <div class="flex items-end gap-4 mt-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">Časová dotace (h)</label>
                                    <input type="number" class="w-[240px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="1">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">InCall (KČ)</label>
                                    <input type="number" class="w-[240px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="0">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">OutCall (KČ)</label>
                                    <input type="number" class="w-[240px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="0">
                                </div>
                                <button @click="removeRow(index)" class="w-[35px] h-[35px] rounded-full bg-[#DD3888] flex items-center justify-center mb-[7px]">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L9 9M9 1L1 9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </template>

                        <!-- Add Button -->
                        <button @click="addRow" class="w-[781px] h-[50px] bg-[#F8F9F9] rounded-[8px] flex items-center justify-center mt-6 font-bold text-[16px] text-[#5C2D62]" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            + Přidat další
                        </button>
                    </div>
                </div>

                <!-- Moje Ceny pro zahraničí -->
                <div x-data="{ mena: 'EUR', openMena: false, menaOptions: ['CZK', 'EUR', 'USD'] }" class="flex flex-col w-[843px] mx-auto mt-8">
                    <div class="flex items-center gap-3 mb-8">
                        <img src="https://flagcdn.com/eu.svg" class="w-[30px] h-[30px] rounded-full" alt="EU Flag">
                        <h3 class="font-bold text-[24px] text-[#5C2D62]" style="font-family: 'Poppins', sans-serif;">Moje Ceny pro zahraničí</h3>
                    </div>

                    <!-- Měna -->
                    <div class="relative w-[240px]">
                        <label class="text-[13px] text-[#505050] mb-2 block" style="font-family: 'Poppins', sans-serif;">Měna pro zahraničí</label>
                        <button @click="openMena = !openMena" class="w-[240px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 flex items-center justify-between font-bold text-[15px] text-[#505050] cursor-pointer" style="font-family: 'Poppins', sans-serif;">
                            <span x-text="mena"></span>
                            <div class="w-[42px] h-[42px] rounded-[4px] bg-[#DD3888] flex items-center justify-center -mr-3">
                                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L5 4L9 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </button>
                        <div x-show="openMena" class="w-[240px] border-[2px] border-t-0 border-[#E6E6E6] rounded-b-[8px] bg-white z-10 absolute">
                            <template x-for="option in menaOptions" :key="option">
                                <div class="p-2 cursor-pointer hover:bg-[#FFE0E5]" @click="mena = option; openMena = false">
                                    <span x-text="option"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Price Inputs Row -->
                    <div x-data="{ 
                        rows: [{ id: Date.now() }],
                        addRow() { this.rows.push({ id: Date.now() }) },
                        removeRow(index) { this.rows.splice(index, 1) }
                    }">
                        <template x-for="(row, index) in rows" :key="row.id">
                            <div class="flex items-end gap-4 mt-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">Časová dotace (h)</label>
                                    <input type="number" class="w-[240px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="1">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">InCall (EUR)</label>
                                    <input type="number" class="w-[240px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="0">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[13px] text-[#505050]" style="font-family: 'Poppins', sans-serif;">OutCall (EUR)</label>
                                    <input type="number" class="w-[240px] h-[50px] rounded-[8px] border-[2px] border-[#E6E6E6] px-4 font-bold text-[15px] text-[#505050]" style="font-family: 'Poppins', sans-serif;" placeholder="0">
                                </div>
                                <button @click="removeRow(index)" class="w-[35px] h-[35px] rounded-full bg-[#DD3888] flex items-center justify-center mb-[7px]">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L9 9M9 1L1 9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </template>

                        <!-- Add Button -->
                        <button @click="addRow" class="w-[781px] h-[50px] bg-[#F8F9F9] rounded-[8px] flex items-center justify-center mt-6 font-bold text-[16px] text-[#5C2D62]" style="font-family: 'Plus Jakarta Sans', sans-serif;">
                            + Přidat další
                        </button>
                    </div>
                </div>
        </div>
    </div>
</div>

</body>
</html>
