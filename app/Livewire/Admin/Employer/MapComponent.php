<?php

namespace App\Livewire\Admin\Employer;

use Livewire\Component;

class MapComponent extends Component
{
    public $latitude;
    public $longitude;

    protected $listeners = ['updateCoordinates'];

    public function updateCoordinates($lat, $lon)
    {
        $this->latitude = $lat;
        $this->longitude = $lon;
    }


    public function render()
    {
        return view('livewire.admin.employer.map-component');
    }

}
