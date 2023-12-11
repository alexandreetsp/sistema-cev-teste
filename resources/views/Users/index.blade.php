<x-app-layout>

    <div class="grid grid-cols-5 items-center mt-28">
        <section>
            <a class="{{ request()->get('/users') ? 'text-white p-4 rounded-full bg-sky-400/100' : '' }}" href="/users">
                Todas
            </a>
        </section>
        @foreach ($tiposContratos as $tag)
            <section>
                <a class="{{ $tag->id == request()->get('tipo') ? 'text-white p-4 rounded-full bg-sky-400/100' : '' }}"
                    href="{{ route('users.index', ['tipo' => $tag->id]) }}">
                    {{ $tag->name }}
                </a>
            </section>
        @endforeach
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{ route('users.vagas') }}">Minhas Vagas</a>
        </button>
    </div>
    <div class="grid grid-cols-3 gap-28 mt-8">
        @foreach ($vagas as $vaga)
            <section class="grid grid-cols-1 bg-grey shadow-lg p-10 place-items-center mt-10  {{ $vaga->pausada == 1 ? 'bg-red-50' : '' }}" >
                <div class="flex items-center gap-x-2">
                    <div class="">
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
                        @if ( $vaga->pausada == 1)
                        <div class="bg-red-100 font-bold ">
                             Vaga Indisponivel
                        </div>
                         @else 
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            <a href="{{ route('users.subscribe', ['vagaId' => $vaga->id]) }}"
                                onclick="event.preventDefault(); document.getElementById('subscribe-form-{{$vaga->id}}').submit();">
                                Inscrever-se
                             </a>
                            <form id="subscribe-form-{{$vaga->id}}" action="{{ route('users.subscribe', ['vagaId' => $vaga->id]) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </button>
                        @endif
                    </div>
                </div>
            </section>
        @endforeach
        <div class="my-10">
        {{ $vagas->links() }}
        </div>
    </div>
</x-app-layout>
