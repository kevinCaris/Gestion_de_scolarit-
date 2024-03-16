<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une année ') }}
        </h2>
    </x-slot> 
 
    <div class="py-2 px-12">
         @livewire('create_new_year')
    </div>
</x-app-layout>
