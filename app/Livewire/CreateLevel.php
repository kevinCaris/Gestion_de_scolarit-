<?php

namespace App\Livewire;

use App\Models\level;
use App\Models\SchoolYear;
use Exception;
use Livewire\Component;

class CreateLevel extends Component
{
        
    public $code;
    public $libelle;
    public $scolarite;
    
    
      public function stores(level $level)
  {
      $this->validate([
         'code' => 'required|string|unique:levels,code',
         'libelle' => 'required|string|unique:levels,libelle',
         'scolarite' => 'required|integer',
      ]);

      try {
        //quelle est l' année dont active =1
        $activeschoolyear=SchoolYear::where('active','1')->first();
          //  dd($activeschoolyear );
          $level->code = $this->code;
          $level->libelle = $this->libelle;
          $level->Scolarite = $this->scolarite;
          $level->school_year_id= $activeschoolyear->id;
          $level->save();
          if ($level) {
            $this->code= '';
           $this->libelle= '';
           $this->scolarite= '';
         }
         return redirect()->Route('niveaux')->with('success', "Niveau ajoutée");
      } catch (Exception $e) {
        //throw $th;
      }
  }
    public function render()
    {
        return view('livewire.create-level');
    }
}
