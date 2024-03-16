<div class="p-2 bg-white shadow-sm">
    <form method="POST" wire:submit.prevent='stores'>
        @csrf 
        @method('post')
        @if(Session::get('error'))
            <div  class="bg-red-400 p-2 rounded-sm text-white text-sm">{{session::get('error')}}</div>
        @endif
        <div class="p-5">
            <label for="">{{ __('Libellé de l\'année scolaire') }}</label> 
            <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full @error('libelle') border-red-500 bg-red-100 animate-bounce @enderror" wire:model="libelle" name="libelle"/>  
            @error('libelle')
                <div class="text text-red-500 mt-1"> *Le champ libellé est requis</div>
            @enderror
        </div> 

        <div class="p-5 flex justify-between items-center">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm" type="submit">Annuler</button>
            <button class="bg-green-600 p-3 rounded-sm text-white text-sm" type="submit">Ajouter</button>
        </div> 
    </form>
</div>
