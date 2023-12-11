<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Vagas;
use App\Models\TipoContrato;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\UserVagas;
use Illuminate\Pagination\LengthAwarePaginator;

class UsersController extends Controller
{
    public function index(Request $request){
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

    public function vagasByUser(Request $request){

        $userId = Auth()->user()->id;

        $user = User::find($userId);


        if (!$user) {
            // Handle the case where the user is not found
            abort(404, 'User not found');
        }

        $tiposContratos = TipoContrato::orderBy('name')->get();

        if($request->has('tipo')){
             $tipo = $request->get('tipo');
 
             $query = Vagas::where('tipo_contrato_id', $tipo);
        }

        // Retrieve the "vagas" associated with the user
        $vagas = $user->vagas;

        $perPage = 15;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $vagas->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $vagas = new LengthAwarePaginator($currentPageItems, $vagas->count(), $perPage);
        $vagas->setPath($request->url());


       return view('users.vagas', compact('vagas', 'tiposContratos'));
       
    }

    public function DestroyVaga($id){

        $userId = Auth()->user()->id;

        UserVagas::where('user_id', $userId)
        ->where('vagas_id', $id)
        ->delete();

        $user = User::find($userId);


        if (!$user) {
            abort(404, 'User not found');
        }

        $tiposContratos = TipoContrato::orderBy('name')->get();

        $vagas = $user->vagas;

       return view('users.vagas', compact('vagas', 'tiposContratos'));
       
    }

    public function SubscribeVaga($id){


        $userId = Auth()->user()->id;

        $userVaga = new UserVagas([
            'user_id' => $userId,
            'vagas_id' => $id,
        ]);

        $userVaga->save();

    
        return redirect()->back();
       
    }


}
