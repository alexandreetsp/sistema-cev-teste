<x-app-layout>
    <div class="grid grid-cols-5 items-center mt-28">
        <section>
            <a class="{{ request()->get('/users') ? 'text-sky-400/100' : '' }}" href="/">
                Todas
            </a>
        </section>
        @foreach ($tiposContratos as $tag)
            <section>
                <a class="{{ $tag->id == request()->get('tipo') ? 'text-sky-400/100' : '' }}"
                    href="{{ route('users.index', ['tipo' => $tag->id]) }}">
                    {{ $tag->name }}
                </a>
            </section>
        @endforeach


    </div>
    <div class="grid grid-cols-3 gap-28 mt-20">
        @foreach ($vagas as $vaga)
 
            <section class="grid grid-cols-1 bg-grey shadow-lg p-10 place-items-center mt-10"">
                <div class="flex items-center gap-x-2">
                    <div>
                        <h3 class="text-xl font-bold text-center py-8">{{ $vaga->titulo }}</h3>
                        <span class=""">{{ $vaga->descricao }}</span>
                        <p class="text-xs my-10">
                            <span>Tipo Contrato: </span>
                            @if($vaga->tipo_contrato_id == 1)
                                CTL
                            @elseif($vaga->tipo_contrato_id == 2)
                                PESSOA JURIDICA
                            @elseif($vaga->tipo_contrato_id == 3)
                                FREELANCE
                            @else
                               Nenhum
                            @endif
                        </p>
                    </div>
                </div>
                <div class="grid items-center justify-between py-8">
                    <div class="grid place-items-center ">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                            <a href="{{ route('users.destroy', ['id' => $vaga->id]) }}"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{$vaga->id}}').submit();">
                                Cancelar
                             </a>
                             <form id="delete-form-{{$vaga->id}}" action="{{ route('users.destroy', ['id' => $vaga->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </button>
                    </div>
                </div>
            </section>
        @endforeach
        <div class="my-10">
            {{ $vagas->links() }}
            </div>
    </div>
</x-app-layout>
