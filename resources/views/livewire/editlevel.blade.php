<div class="p-2 bg-white shadow-sm">
    <form method="POST" wire:submit.prevent='stores'>
        @csrf 
        @method('post')
        @if(Session::get('error'))
            <div  class="bg-red-400 p-2 rounded-sm text-white text-sm">{{session::get('error')}}</div>
        @endif
        <div class="block">
            <div class="p-5">
                 <label for="">{{ __('code') }}</label> 
                <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full @error('code')
                 border-red-500 bg-red-100 animate-bounce @enderror" wire:model="code" name="code"  />  
                @error('code')
                <div class="text text-red-500 mt-1"> {{$message}}</div>
                 @enderror
            </div> 

            <div class="p-5">
                 <label for="">{{ __('Libelle') }}</label> 
                <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full @error('libelle')
                 border-red-500 bg-red-100 animate-bounce @enderror" wire:model="libelle" name="libelle" />  
            @error('libelle')
                <div class="text text-red-500 mt-1"> {{$message}}</div>
            @enderror
            </div> 

            <div class="p-5">
                <label for="">{{ __('Scolarité') }}</label> 
                <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full @error('scolarite')
                 border-red-500 bg-red-100 animate-bounce @enderror" wire:model="scolarite" name="scolarite" />  
                @error('scolarite')
                    <div class="text text-red-500 mt-1"> *Le champ scolarite est requis</div>
                @enderror
            </div> 
        </div>

        <div class="p-5 flex justify-between items-center">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm" type="submit">Annuler</button>
            <button class="bg-green-600 p-3 rounded-sm text-white text-sm" type="submit">Mettre à jour</button>
        </div> 
    </form>
</div>
