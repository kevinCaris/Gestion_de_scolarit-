<?php

namespace App\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\SchoolYear;
use Livewire\Component;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;

    public $search="";
    
    public function tooglestatus(SchoolYear $Year){
        //tour les ligne active a 0
        $query=SchoolYear::where('active','1')->update(['active'=>'0']);
        $Year->active ='1';
        $Year->save();
    }
    public function render()
    {
        if (!empty($this->search)) {
            $schoolyear =schoolyear::where('school_year', 'like', '%'.$this->search. '%')->paginate(5);
        }else{
            $schoolyear =schoolyear::paginate(5);
        }

        

        return view('livewire.settings', compact('schoolyear'));
    }
}
