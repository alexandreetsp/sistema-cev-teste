<x-app-layout>

    <div class="grid grid-cols-4">
        <section>
            <a class="{{ request()->get('/') ? 'text-sky-400/100' : '' }}" href="/">
                Todas
            </a>
        </section>
        @foreach ($tiposContratos as $tag)
            <section>
                <a class="{{ $tag->id == request()->get('tipo') ? 'text-sky-400/100' : '' }}"
                    href="{{ route('listings.index', ['tipo' => $tag->id]) }}">
                    {{ $tag->name }}
                </a>
            </section>
        @endforeach


    </div>
    <div class="grid grid-cols-3 gap-28 mt-20">
        @foreach ($vagas as $vaga)
            <section class="grid grid-cols-1"">
                <div class="flex items-center gap-x-2">
                    <div>
                        <h3 class="text-xl font-bold text-center py-8">{{ $vaga->titulo }}</h3>
                        <span class="text-xs ">{{ $vaga->descricao }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-between py-8">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        <a href="{{ route('listings.editar', ['id' => $vaga->id]) }}">Editar</a>
                      </button>
                      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                        <a href="{{ route('listings.destroy', ['id' => $vaga->id]) }}"
                            onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                            Apagar
                         </a>
                        <form id="delete-form" action="{{ route('listings.destroy', ['id' => $vaga->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </button>
                      <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                        Pausar
                      </button>
                </div>
            </section>
        @endforeach
    </div>
</x-app-layout>
