<div wire:poll.5s="loadStatistics">
    @if($profile)

        <!-- Profile Clicks Chart Section -->
        <div class="mb-28">
            <h2 class="text-2xl font-bold text-secondary mb-4">
                {{ __('front.account.statistics.profile_views_title') }}
            </h2>
            <div class="w-[843px] h-[300px] rounded-[15px] relative">
                <!-- Grid lines (120-0) -->
                <div class="absolute inset-0 flex flex-col h-full py-2">
                    @foreach([120, 100, 80, 60, 40, 20] as $num)
                        <div class="flex items-center gap-[16px]" style="height: 60px;">
                            <span class="w-[30px] text-right text-[14px] font-medium text-[#505050]" style="font-family: 'Poppins', sans-serif;">{{ $num }}</span>
                            <div class="flex-grow h-[1px] bg-[#E8E8E8]"></div>
                        </div>
                    @endforeach
                    <!-- Base line -->
                    <div class="flex items-center gap-[16px]">
                        <div class="w-[843px] h-[3px] bg-[#E8E8E8]"></div>
                    </div>
                </div>
                
                <canvas 
                    id="clicksChart" 
                    height="200"
                    wire:ignore
                    class="absolute inset-0 w-full h-full"
                ></canvas>
            </div>
            
            <!-- Month Navigation for Clicks -->
            <div class="flex items-center justify-center gap-4 mt-6">
                <div class="flex-1 h-px bg-gray-300"></div>
                
                <button 
                    type="button" 
                    wire:click="previousMonth"
                    class="w-10 h-10 bg-primary text-white rounded-lg flex items-center justify-center hover:shadow-lg transition-all duration-200 cursor-pointer"
                >
                    ⏴
                </button>
                
                <div class="text-lg font-semibold text-gray-900 min-w-[150px] text-center">
                    {{ $this->formattedMonth }}
                </div>
                
                <button 
                    type="button" 
                    wire:click="nextMonth"
                    class="w-10 h-10 rounded-lg flex items-center justify-center transition-all duration-200 cursor-pointer {{ $this->canGoNext() ? 'bg-primary text-white hover:shadow-lg' : 'bg-gray-300 text-gray-500 cursor-not-allowed' }}"
                    @if(!$this->canGoNext()) disabled @endif
                >
                    ⏵
                </button>
                
                <div class="flex-1 h-px bg-gray-300"></div>
            </div>
        </div>

        <!-- Listing Impressions Chart Section -->
        <div class="mb-20">
            <h2 class="text-2xl font-bold text-secondary mb-4">
                {{ __('front.account.statistics.listing_views_title') }}
            </h2>
            <div class="relative w-[843px]">
                <canvas 
                    id="impressionsChart" 
                    height="200"
                    wire:ignore
                ></canvas>
                <div class="absolute bottom-0 left-0 w-[843px] h-[3px] bg-[#E8E8E8]"></div>
            </div>
            
            <!-- Month Navigation for Impressions -->
            <div class="flex items-center justify-center gap-4 mt-6">
                <div class="flex-1 h-px bg-gray-300"></div>
                
                <button 
                    type="button" 
                    wire:click="previousMonth"
                    class="w-10 h-10 bg-primary text-white rounded-lg flex items-center justify-center hover:shadow-lg transition-all duration-200 cursor-pointer"
                >
                    ⏴
                </button>
                
                <div class="text-lg font-semibold text-gray-900 min-w-[150px] text-center">
                    {{ $this->formattedMonth }}
                </div>
                
                <button 
                    type="button" 
                    wire:click="nextMonth"
                    class="w-10 h-10 rounded-lg flex items-center justify-center transition-all duration-200 cursor-pointer {{ $this->canGoNext() ? 'bg-primary text-white hover:shadow-lg' : 'bg-gray-300 text-gray-500 cursor-not-allowed' }}"
                    @if(!$this->canGoNext()) disabled @endif
                >
                    ⏵
                </button>
                
                <div class="flex-1 h-px bg-gray-300"></div>
            </div>
        </div>

        <!-- VIP Badge (if applicable) -->
        @if($profile->isVip())
            <div class="flex justify-center mt-6">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-400 text-white rounded-full font-semibold">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    VIP
                </div>
            </div>
        @endif
    @endif
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    let clicksChart = null;
    let impressionsChart = null;

    function createChart(canvasId, labels, data, color, label) {
        console.log('Attempting to create chart:', canvasId);
        const ctx = document.getElementById(canvasId);
        if (!ctx) {
            console.error('Canvas not found:', canvasId);
            return null;
        }
        console.log('Canvas found, creating chart:', canvasId);

        return new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: data,
                    backgroundColor: color,
                    borderRadius: { topLeft: 8, topRight: 8, bottomLeft: 0, bottomRight: 0 },
                    barThickness: 30,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                animation: {
                    duration: 750,
                    easing: 'easeInOutQuart'
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        titleColor: '#F9FAFB',
                        bodyColor: '#F9FAFB',
                        borderColor: '#374151',
                        borderWidth: 1,
                        padding: 12,
                        displayColors: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        },
                        border: {
                            display: false
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 11,
                                family: "'Inter', sans-serif"
                            },
                            color: '#6B7280',
                            maxRotation: 45,
                            minRotation: 45
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    function updateCharts(labels, clickData, impressionData) {
        // Update existing charts if they exist, otherwise create them
        if (clicksChart) {
            clicksChart.data.labels = labels;
            clicksChart.data.datasets[0].data = clickData;
            clicksChart.data.datasets[0].backgroundColor = '#DD3888';
            clicksChart.data.datasets[0].borderRadius = { topLeft: 8, topRight: 8, bottomLeft: 0, bottomRight: 0 };
            clicksChart.data.datasets[0].barThickness = 30;
            clicksChart.update('none'); // Update without animation
        } else {
            clicksChart = createChart(
                'clicksChart', 
                labels, 
                clickData, 
                '#DD3888', 
                '{{ __('front.account.statistics.profile_clicks') }}'
            );
        }
        
        if (impressionsChart) {
            impressionsChart.data.labels = labels;
            impressionsChart.data.datasets[0].data = impressionData;
            impressionsChart.data.datasets[0].backgroundColor = '#DD3888';
            impressionsChart.data.datasets[0].borderRadius = { topLeft: 8, topRight: 8, bottomLeft: 0, bottomRight: 0 };
            impressionsChart.data.datasets[0].barThickness = 30;
            impressionsChart.update('none'); // Update without animation
        } else {
            impressionsChart = createChart(
                'impressionsChart', 
                labels, 
                impressionData, 
                '#DD3888', 
                '{{ __('front.account.statistics.listing_impressions') }}'
            );
        }
    }

    // Initialize charts on page load
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM ready, initializing charts...');
        const labels = @json($chartLabels);
        const clickData = @json($clickChartData);
        const impressionData = @json($impressionChartData);
        console.log('Data:', { labels, clickData, impressionData });
        
        if (labels && labels.length > 0) {
            updateCharts(labels, clickData, impressionData);
        } else {
            console.warn('No data for charts or labels is empty!');
        }
    });

    // Update charts when Livewire updates
    document.addEventListener('livewire:initialized', () => {
        Livewire.hook('morph.updated', ({ component }) => {
            setTimeout(() => {
                const labels = @this.chartLabels;
                const clickData = @this.clickChartData;
                const impressionData = @this.impressionChartData;
                updateCharts(labels, clickData, impressionData);
            }, 50);
        });
    });
</script>
@endpush
