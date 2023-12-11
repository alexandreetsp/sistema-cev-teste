<x-app-layout>

    @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            $('#success-alert').fadeOut('fast');
        }, 4000); // 4000 milliseconds = 4 seconds
    </script>
@endif

    <div class="grid grid-cols-5 items-center mt-28">
        <section>
            <a class="{{ request()->get('/admin') ? 'text-white p-4 rounded-full bg-sky-400/100' : '' }}" href="/admin">
                Todas
            </a>
        </section>
        @foreach ($tiposContratos as $tag)
            <section>
                <a class="{{ $tag->id == request()->get('tipo') ? 'text-white p-4 rounded-full bg-sky-400/100' : '' }}"
                    href="{{ route('listings.index', ['tipo' => $tag->id]) }}">
                    {{ $tag->name }}
                </a>
            </section>
        @endforeach

        <div class="py-18 ">
            <a href="{{ route('listings.criar') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Criar Vaga</a>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-28 mt-20">
        @foreach ($vagas as $vaga)
            <section class="grid grid-cols-1 bg-grey shadow-lg p-10 place-items-center mt-10  {{ $vaga->pausada == 1 ? 'bg-red-50' : '' }}">
                <div class="flex items-center gap-x-2">
                    <div>
                        <h3 class="text-xl font-bold text-center py-8">{{ $vaga->titulo }}</h3>
                        <span class="text-xs ">{{ $vaga->descricao }}</span>
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
                <div class="flex items-center justify-between gap-10 py-8">
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
                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        @if ($vaga->pausada == 0)
                        <a href="{{ route('listings.pausar', ['id' => $vaga->id]) }}"  onclick="event.preventDefault(); document.getElementById('pause-form-{{$vaga->id}}').submit();">Pausar</a>
                        <form id="pause-form-{{$vaga->id}}" action="{{ route('listings.pausar', ['id' => $vaga->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                        @else
                        <a href="{{ route('listings.despausar', ['id' => $vaga->id]) }}"  onclick="event.preventDefault(); document.getElementById('despause-form-{{$vaga->id}}').submit();">Despausar</a>
                        <form id="despause-form-{{$vaga->id}}" action="{{ route('listings.despausar', ['id' => $vaga->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>

                        @endif
                    
                      </button>

                </div>
            </section>
        @endforeach
        <div class="my-10">
            {{ $vagas->links() }}
         </div>
    </div>
</x-app-layout>
