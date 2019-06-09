<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\GetListProfDataTable;
use App\DataTables\Admin\ListeCotationsDataTable;
use App\Http\Requests\CrudProfFormRequest;
use App\Http\Requests\RedirectNewControleRequest;
use App\Http\Requests\NewControleRequest;
use App\Models\Professeur;
use App\Models\Ponderations_document;
use App\Models\Controles_document;
use App\Models\Cotations_document;
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

    public function index(ListeCotationsDataTable $dataTables){
        return $dataTables->render('admin.list_controles');
    }
     /*
     * Renvoi une datatable avec la liste des prof.
     *
     * @return void
     */
    public function getListProf(GetListProfDataTable $dataTables)
    {
        return $dataTables->render('admin.list_prof');
    }

    /*
     * CRUD Prof
     *
     * @return void
     */
    public function storeProf(CrudProfFormRequest $request){
        // dd($request->idsecope);
       return Professeur::updateOrCreate(
            [
                'idprofesseurs' => $request->idprofesseurs,
            ],
            [
                'idsecope' => $request->idsecope,
                'nom' => $request->nom,
                'postnom' => $request->postnom,
                'prenom' => $request->prenom,
                'attribution' => $request->attribution,
                'qualification' => $request->qualification,
                'anciennete' => $request->anciennete,
                'user_role' => 'professeur',

            ]
        );

        // Flashy ----------------
    }

   

    public function redirectNewControle(RedirectNewControleRequest $request){
        return redirect()->route('admin.new_controle',[$request->idprofesseurs]);
    }

    // On recupere les donné pour la fiche
    public function newControle(Professeur $professeurs){
        $fiche = Ponderations_document::JoinTypeDocument()
                                        ->get([
                                            'ponderations_documents.idponderations_documents',
                                            'ponderations_documents.lib as ponderation',
                                            'ponderations_documents.commentaire',
                                            'ponderations_documents.max',
                                            'ponderations_documents.slug',
                                            'types_documents.idtypes_documents',
                                            'types_documents.lib as types_document',

                                        ])->groupBy('idtypes_documents');
        return view('admin.new_controle',compact('professeurs','fiche'));
    }


    public function newControleDocument(NewControleRequest $request){
        // dd($request->request);
        $controle = Controles_document::create($request->all());
        foreach ($request->all() as $k=>$v) {
             $ponderation = Ponderations_document::where('slug',$k)->first();
             if($ponderation){
                    Cotations_document::create([
                        'idcontroles_documents' => $controle->idcontroles_documents,
                        'idponderations_documents' => $ponderation->idponderations_documents ,
                        'cote' => $ponderation->max >= $v ? $v : 0,
                    ]);
             }
        }  
        // FLASHY -----------
        return redirect()->route('admin.index');

    }

    // Affichage controle

    public function getControle(Controles_document $controle){
        return ControleDocument::getControl($controle);

    }
}
