<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:ronded-lg p-4">
      <!-- Titre et bouton -->
      <div class="flex justify-between item-center">
        <div class="w-1/3">
          <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full " wire:model="search" />  
        </div>
        <a href="{{route('setting.create_level')}}" class="bg-blue-500 roun ded-md p-2 text-sm text-white">AJOUTER   Niveau</a>
      </div>
        <div class="flex flex-col pt-3">
           @if(Session::get('success'))
               <div  class="bg-red-400 p-2 rounded-sm text-white text-sm">{{session::get('success')}}</div>
           @endif
        </div>

       <!-- styliser le tableau -->
        <div class="overflow-x-auto ">
          <div class="py-4 inline-block min-w-full  "></div>
            <div class="overflow-hidden">
                <table class="min-w-full text-center">
                <thead class="border-b bg-gray-50">
      
                  <tr class="border-b-4 borfer-gray-100">
                  <td class="text-sm font-medium text-gray-900 px-6 py-6">ID</td>
                  <td class="text-sm font-medium text-gray-900 px-6 py-6">Code</td>
                    <td class="text-sm font-medium text-gray-900 px-6 py-6">Libellé</td>
                  <td class="text-sm font-medium text-gray-900 px-6 py-6">Montant scholarité</td>
                  <td class="text-sm font-medium text-gray-900 px-6 py-6">Action</td>

                  </tr>
                
                </thead>
                <Tbody>
                    @forelse($levellist  as $item)
                   <tr class="border-b-4 borfer-gray-100">
                      <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->id}}</td>
                      <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->code}}</td>
                       <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->libelle}}</td>
                        <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->school_year_id}}</td>
                      <td class="text-sm font-medium text-gray-900 px-6 py-6">
                            <a href="{{route('setting.edite',$item->id)}}" class="bg-blue-500 rounded-sm p-3 text text-white">Modifier</a>
                      </td>
                      
                  </tr
                  @empty
                  <tr class="w-full">
                    <td colspan="4" class="flex-1 w-full items-center justify-center">
                      <div>
                          <div> Aucun élement .</div>
                      </div>
                    </td>
                  </tr>
                  @endforelse
                </Tbody>
                    
                </table> 
                <div class="mt-3">
                  {{$levellist ->links()}}
                </div>
             </div>
        </div>

    </div>
</div>