<x-app-layout>
    <section class="">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-200 text-red-800">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('success'))
            <div id="successMessage" class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md v"
                role="alert"">
                {{ Session::get('success') }}

                <script>
                    // Automatically close the success message after 5 seconds (5000 milliseconds)
                    setTimeout(function() {
                        document.getElementById('successMessage').style.display = 'none';
                        successMessage.classList.add('transition ease-in-out delay-150');
                    }, 2000);
                </script>
            </div>
        @endif
        <form class="max-w-md mx-auto mt-28" action="/posts/{{ $post->id }}" id="form_criar_vaga" method="post"
            enctype="multipart/form-data" class="bg-gray-100">
            @csrf
            @method('PUT')
            <div class="relative z-0 w-full mb-5 group">
                <input type="titulo" name="titulo" id="titulo"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" required value="{{ $post->titulo }}" />
                <label for="titulo"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Titulo</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <textarea type="descricao" name="descricao" id="descricao"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required>{{ old('descricao', $post->descricao) }}</textarea>
                <label for="descricao"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descricao</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="tipo_contrato" class="block mb-2 text-sm font-medium text-gray-900">Selecione o Tipo do
                    Contrato</label>
                <select id="tipo_contrato" name="tipo_contrato" id="tipo_contrato"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                    <option value="1" {{ old('tipo_contrato', $post->tipo_contrato) == 1 ? 'selected' : '' }}>
                        CLT</option>
                    <option value="2" {{ old('tipo_contrato', $post->tipo_contrato) == 2 ? 'selected' : '' }}>
                        Pessoa Juridica</option>
                    <option value="3" {{ old('tipo_contrato', $post->tipo_contrato) == 3 ? 'selected' : '' }}>
                        Freelancer</option>

                </select>
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </section>

</x-app-layout>
