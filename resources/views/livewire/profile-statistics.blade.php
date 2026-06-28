<div wire:poll.5s="loadStatistics" id="stats-wrapper" class="w-full">
    <!-- Profile Clicks Chart Section -->
    <div class="mb-28">
        <h2 class="text-2xl font-bold text-secondary mb-4">
            {{ __('front.account.statistics.profile_views_title') }}
        </h2>
        <div class="w-[843px] h-[300px] rounded-[15px] relative">
            <!-- Grid lines -->
            <div class="absolute inset-0 flex flex-col h-full py-2 gap-y-4">
                @foreach([120, 100, 80, 60, 40, 20] as $num)
                    <div class="flex items-center gap-[16px]" style="height: 60px;">
                        <span class="w-[30px] text-right text-[14px] font-medium text-[#505050]" style="font-family: 'Poppins', sans-serif;">{{ $num }}</span>
                        <div class="flex-grow h-[1px] bg-[#E8E8E8]"></div>
                    </div>
                @endforeach
                <div class="flex items-center gap-[16px]">
                    <div class="w-[843px] h-[3px] bg-[#E8E8E8]"></div>
                </div>
            </div>
            
            <canvas id="clicksChart" class="absolute inset-0 w-full h-full z-20"></canvas>
        </div>
        
        <!-- Navigation -->
        <div class="flex items-center justify-center gap-4 mt-6">
            <button type="button" wire:click="previousMonth" class="w-10 h-10 bg-primary text-white rounded-lg flex items-center justify-center">⏴</button>
            <div class="text-lg font-semibold text-gray-900 min-w-[150px] text-center">{{ $this->formattedMonth }}</div>
            <button type="button" wire:click="nextMonth" class="w-10 h-10 rounded-lg flex items-center justify-center {{ $this->canGoNext() ? 'bg-primary text-white' : 'bg-gray-300' }}" @if(!$this->canGoNext()) disabled @endif>⏵</button>
        </div>
    </div>

    <!-- Listing Impressions Chart Section -->
    <div class="mb-20">
        <h2 class="text-2xl font-bold text-secondary mb-4">
            {{ __('front.account.statistics.listing_views_title') }}
        </h2>
        <div class="w-[843px] h-[300px] relative">
            <div class="absolute inset-0 flex flex-col h-full py-2 gap-y-4">
                @foreach([120, 100, 80, 60, 40, 20] as $num)
                    <div class="flex items-center gap-[16px]" style="height: 60px;">
                        <span class="w-[30px] text-right text-[14px] font-medium text-[#505050]" style="font-family: 'Poppins', sans-serif;">{{ $num }}</span>
                        <div class="flex-grow h-[1px] bg-[#E8E8E8]"></div>
                    </div>
                @endforeach
                <div class="flex items-center gap-[16px]">
                    <div class="w-[843px] h-[3px] bg-[#E8E8E8]"></div>
                </div>
            </div>
            <canvas id="impressionsChart" class="absolute inset-0 w-full h-full z-20"></canvas>
        </div>
        
        <!-- Navigation -->
        <div class="flex items-center justify-center gap-4 mt-6">
            <button type="button" wire:click="previousMonth" class="w-10 h-10 bg-primary text-white rounded-lg flex items-center justify-center">⏴</button>
            <div class="text-lg font-semibold text-gray-900 min-w-[150px] text-center">{{ $this->formattedMonth }}</div>
            <button type="button" wire:click="nextMonth" class="w-10 h-10 rounded-lg flex items-center justify-center {{ $this->canGoNext() ? 'bg-primary text-white' : 'bg-gray-300' }}" @if(!$this->canGoNext()) disabled @endif>⏵</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        (function() {
            let clicksChart = null;
            let impressionsChart = null;

            function initCharts(labels, clickData, impressionData) {
                if (typeof Chart === 'undefined') return;

                const ctx1 = document.getElementById('clicksChart');
                const ctx2 = document.getElementById('impressionsChart');
                
                if (!ctx1 || !ctx2) return;

                const options = { 
                    responsive: true, 
                    maintainAspectRatio: false,
                    scales: {
                        y: { min: 0, max: 120, display: false },
                        x: { display: true, grid: { display: false } }
                    },
                    plugins: { legend: { display: false } }
                };

                const config = (data) => ({ 
                    type: 'bar', 
                    data: { 
                        labels: labels, 
                        datasets: [{ 
                            data: data, 
                            backgroundColor: '#DD3888',
                            barThickness: 30,
                            barPercentage: 0.8,
                            categoryPercentage: 0.9
                        }] 
                    }, 
                    options 
                });

                if (!clicksChart) {
                    clicksChart = new Chart(ctx1, config(clickData));
                } else {
                    clicksChart.data.labels = labels;
                    clicksChart.data.datasets[0].data = clickData;
                    clicksChart.update();
                }

                if (!impressionsChart) {
                    impressionsChart = new Chart(ctx2, config(impressionData));
                } else {
                    impressionsChart.data.labels = labels;
                    impressionsChart.data.datasets[0].data = impressionData;
                    impressionsChart.update();
                }
            }

            window.addEventListener('load', () => {
                initCharts(@json($chartLabels), @json($clickChartData), @json($impressionChartData));
            });

            Livewire.on('statsUpdated', (event) => {
                const params = event[0]; 
                initCharts(params.labels, params.clicks, params.impressions);
            });
        })();
    </script>
</div>