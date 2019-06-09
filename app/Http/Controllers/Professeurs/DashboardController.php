<?php

namespace App\Http\Controllers\Professeurs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Prof\ListeControleDataTable;
use App\Models\Controles_document;
use App\Http\Controllers\ControleDocument;




class DashboardController extends Controller
{
    /*
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:professeur');
    }

    public function index(ListeControleDataTable $dataTables){

    	return $dataTables->with(['idprofesseurs'=>auth()->user()->idprofesseurs])->render('prof.index');
    }
    public function getControle(Controles_document $controle){
        return ControleDocument::getControl($controle);

    }

   
}
