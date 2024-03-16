<?php

namespace App\Livewire;

use App\Models\SchoolYear;
use Carbon\Carbon;
use Exception;
use Livewire\Component;

class CreateNewYear extends Component
{
    public $libelle;

    public function stores(SchoolYear $schoolYear)
    {
        $this->validate([
            'libelle' => 'required|string|unique:school_years,school_year',
        ]);

        try {
            $currentYear = Carbon::now()->format('Y');
            $check = SchoolYear::where('current_year', $currentYear)->get();
            if ($check->count() >= 1) {
                return redirect()->back()->with('error', 'Il existe déjà une année scolaire pour l\'année en cours.');
                 // throw new Exception("Il existe déjà une année scolaire pour l'année en cours.");
            }else{
                 $schoolYear->school_year = $this->libelle;
                 $schoolYear->current_year = $currentYear;
                 $schoolYear->save();
                if ($schoolYear) {
                  $this->libelle = '';
                }
                return redirect()->Route('setting')->with('success', "Niveau ajoutée");
            }
        } catch (Exception $e) {
            // Gérer l'exception selon les besoins
            // Vous pouvez afficher un message d'erreur ou enregistrer des journaux
            // Pour l'instant, nous laissons le bloc catch vide
        }
    }

    public function render()
    {
        return view('livewire.create-new-year');
    }
}
