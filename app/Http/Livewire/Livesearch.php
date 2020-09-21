<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Agent;
use App\User;

class Livesearch extends Component
{
    public  $searchmatricule=84385;
    public  $agents;



    public function render()
    {


        $this->agents= Agent::where('Matricule_Agent','=',$this->searchmatricule)->get();
        return view('livewire.livesearch');
    }
}
