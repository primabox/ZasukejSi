<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Lang;
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
        $this->region = request('region', request('city', 'Hlavní město Praha'));
        $this->age_range = request('age', '18');
    }

    /**
     * Czech regions list shown in homepage search.
     */
    public function getAllRegionsProperty()
    {
        return [
            'Hlavní město Praha',
            'Středočeský kraj',
            'Jihočeský kraj',
            'Plzeňský kraj',
            'Karlovarský kraj',
            'Ústecký kraj',
            'Liberecký kraj',
            'Královéhradecký kraj',
            'Pardubický kraj',
            'Vysočina',
            'Jihomoravský kraj',
            'Olomoucký kraj',
            'Zlínský kraj',
            'Moravskoslezský kraj',
        ];
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
        $yearsLabel = Lang::get('front.profiles.list.years');

        return [
            '18' => "18 {$yearsLabel}",
            '19' => "19 {$yearsLabel}",
            '20' => "20 {$yearsLabel}",
            '21' => "21 {$yearsLabel}",
            '22' => "22 {$yearsLabel}",
            '23' => "23 {$yearsLabel}",
            '24' => "24 {$yearsLabel}",
            '25' => "25 {$yearsLabel}",
            '26' => "26 {$yearsLabel}",
            '27' => "27 {$yearsLabel}",
            '28' => "28 {$yearsLabel}",
            '29' => "29 {$yearsLabel}",
            '30' => "30 {$yearsLabel}",
            '35' => "35 {$yearsLabel}",
            '40' => "40 {$yearsLabel}",
            '45' => "45 {$yearsLabel}",
            '50' => "50 {$yearsLabel}",
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
}
