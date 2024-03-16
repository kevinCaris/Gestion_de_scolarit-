<?php

namespace App\Livewire;

use App\Models\level;
use App\Models\SchoolYear;
use Livewire\Component;
use Livewire\WithPagination;

class ListeNiveaux extends Component
{
    use WithPagination;
    public $search='';
    public function delecte(level $level){
      $level->delete();

      return redirect()->Route('niveaux')->with('success', "Niveau suprimer");

    }
    public function render()
    {
        if (!empty($this->search)) {
            $levellist =level::where('libelle', 'like', '%'.$this->search. '%')->paginate(5);
        }else{
            $activeschoolyear=SchoolYear::where('active','1')->first();

            $levellist =level::where('school_year_id',$activeschoolyear->id)->paginate(5);
        }
        return view('livewire.liste-niveaux',compact('levellist'));
    }
}
