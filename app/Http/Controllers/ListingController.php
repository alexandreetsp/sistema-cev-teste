<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vagas;
use App\Models\TipoContrato;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class ListingController extends Controller
{
    public function index(Request $request){
        $query = Vagas::where('is_active', true)
        ->latest();

       $tiposContratos = TipoContrato::orderBy('name')->get();

       if($request->has('tipo')){
            $tipo = $request->get('tipo');

            $query = Vagas::where('tipo_contrato_id', $tipo);
       }

       $vagas = $query->get();

        return view('listings.index', compact('vagas', 'tiposContratos'));
    }

    public function criar(){
        return view('listings.criar');
    }

    public function armazenar(Request $request){

        $validacoes = [
            'titulo' => 'required',
            'descricao' => 'required',
            'tipo_contrato' => 'required'
        ];

        $request->validate($validacoes);

        try {

            $vagas = new Vagas;
            $vagas->titulo = $request->input('titulo');
            $vagas->descricao = $request->input('descricao');
            $vagas->tipo_contrato_id = $request->input('tipo_contrato');
            $vagas->save();

            return view('listings.criar');

        } catch ( Exception $e ){

            return redirect()->back()
            ->withErrors(['erros' => $e->getMessage()]);
        };
    }

    public function editar($id) {
            $post = Vagas::findOrFail($id);
            return view('listings.editar', compact('post'));
    }


    public function update(Request $request, $id) {

            $post = Vagas::findOrFail($id);

            $validacoes = [
                'titulo' => 'required',
                'descricao' => 'required',
                'tipo_contrato' => 'required'
            ];
    
            $request->validate($validacoes);


            try {

                $post->update([
                    'titulo' => $request->input('titulo'),
                    'descricao' => $request->input('descricao'),
                    'tipo_contrato_id' => $request->input('tipo_contrato'),
                ]);

                Session::flash('success', 'Post updated successfully');
             
                return view('listings.editar', compact('post'));
    
            } catch ( Exception $e ){
    
                return redirect()->back()
                ->withErrors(['erros' => $e->getMessage()]);
            };

        }
    public function destroy($id)
        {
            try {
                $post = Vagas::findOrFail($id);
                $post->delete();

                $query = Vagas::where('is_active', true)
                ->latest();
                
                $tiposContratos = TipoContrato::orderBy('name')->get();

                $vagas = $query->get();
        
                // Optionally, you can flash a success message
                return view('listings.index', compact('vagas', 'tiposContratos'));
            } catch (\Exception $e) {
                // Handle the exception, e.g., log or show an error message
                return redirect()->back()->with('error', 'Error deleting post');
            }
        }
}
