<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Vagas;
use App\Models\TipoContrato;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        if(Auth::id()){
            $userTipo = Auth()->user()->user_type;

            if($userTipo == 'user'){

                $query = Vagas::where('is_active', true)
                ->latest();
        
               $tiposContratos = TipoContrato::orderBy('name')->get();
        
               if($request->has('tipo')){
                    $tipo = $request->get('tipo');
        
                    $query = Vagas::where('tipo_contrato_id', $tipo);
               }
        
               $vagas = $query->paginate(15);
               return view('users.index', compact('vagas', 'tiposContratos'));
            }

            else if($userTipo == 'admin'){

                $query = Vagas::where('is_active', true)
                ->latest();
        
               $tiposContratos = TipoContrato::orderBy('name')->get();
        
               if($request->has('tipo')){
                    $tipo = $request->get('tipo');
        
                    $query = Vagas::where('tipo_contrato_id', $tipo);
               }
        
               $vagas = $query->paginate(15);
        
                return view('listings.index', compact('vagas', 'tiposContratos'));
            }

            else {
                echo $userTipo;
            }

        }
    }
}
