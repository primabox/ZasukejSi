<?php

namespace App\Livewire;

use App\Models\City;
use Livewire\Component;

class SearchProfiles extends Component
{
    // Search filters
    public $region = '';
    public $age_range = '';

    // UI state
    public $showRegionDropdown = false;
    public $showAgeRangeDropdown = false;

    public function mount()
    {
        $this->region = request('region', request('city', ''));
        $this->age_range = request('age', '');
    }

    /**
     * Get all available regions from approved, public, and verified profiles.
     */
    public function getAllRegionsProperty()
    {
        return City::query()
            ->join('profiles', function ($join) {
                $join->on('cities.country_code', '=', 'profiles.country_code')
                    ->whereRaw('LOWER(cities.name) = LOWER(profiles.city)');
            })
            ->where('profiles.status', 'approved')
            ->where('profiles.is_public', true)
            ->whereNotNull('profiles.verified_at')
            ->whereNotNull('cities.admin_name')
            ->where('cities.admin_name', '!=', '')
            ->distinct()
            ->pluck('cities.admin_name')
            ->sortBy(fn (string $region) => $this->regionSortKey($region), SORT_NATURAL | SORT_FLAG_CASE)
            ->values()
            ->toArray();
    }

    public function updatedRegion()
    {
        $this->showRegionDropdown = true;
    }

    public function selectRegion($region)
    {
        $this->region = $region;
        $this->showRegionDropdown = false;
    }

    public function showDropdown()
    {
        $this->showRegionDropdown = true;
    }

    public function clearAndShowDropdown()
    {
        $this->region = '';
        $this->showRegionDropdown = true;
    }

    // Age Range methods
    public function clearAndShowAgeRangeDropdown()
    {
        $this->age_range = '';
        $this->showAgeRangeDropdown = true;
    }

    public function selectAgeRange($ageRange)
    {
        $this->age_range = $ageRange;
        $this->showAgeRangeDropdown = false;
    }

    public function getFilteredRegionsProperty()
    {
        $regions = $this->allRegions;
        
        if (empty($this->region)) {
            return $regions;
        }

        return collect($regions)
            ->filter(fn ($regionOption) => str_contains(mb_strtolower($regionOption), mb_strtolower($this->region)))
            ->values()
            ->toArray();
    }

    public function getAgeRangeOptionsProperty()
    {
        return [
            '18-25' => '18-25 yo',
            '26-30' => '26-30 yo',
            '31-35' => '31-35 yo',
            '36-40' => '36-40 yo',
            '40-50' => '40-50 yo',
            '50+' => '50 yo +',
        ];
    }

    /**
     * Execute search - redirect to countries page with filters
     */
    public function search()
    {
        $params = [];
        
        if ($this->region) {
            $params['region'] = $this->region;
        }
        
        if ($this->age_range) {
            $params['age'] = $this->age_range;
        }

        return $this->redirect(route('countries.index', $params));
    }

    public function render()
    {
        return view('livewire.search-profiles');
    }

    protected function regionSortKey(string $region): string
    {
        $normalizedRegion = mb_strtolower($region);

        if (in_array($normalizedRegion, ['praha', 'hlavní město praha', 'hlavni mesto praha'], true)) {
            return '0';
        }

        return '1-' . $normalizedRegion;
    }
}
