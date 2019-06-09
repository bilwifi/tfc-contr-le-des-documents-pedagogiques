<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Controles_document;
use App\Models\Professeur;
use App\Models\Ponderations_document;
use App\Models\Cotations_document;


class ControleDocument extends Controller
{
    public static function getControl(Controles_document $controle){
    	$conseiller = Professeur::find($controle->idconseillers);
        $professeur = Professeur::find($controle->idprofesseurs);
        $cotes = Cotations_document::JoinPonderations()
                                    ->JoinTypesDocuments()
                                    ->where('cotations_documents.idcontroles_documents',$controle->idcontroles_documents)
                                    ->get([
                                        // 'cotations_documents.idcontroles_documents',
                                        'cotations_documents.cote',
                                        'ponderations_documents.lib as ponderations',
                                        'ponderations_documents.max',
                                        'ponderations_documents.commentaire',
                                        'types_documents.idtypes_documents',
                                        'types_documents.lib as type_documents'
                                    ])->groupBy('idtypes_documents');

        return view('admin.view_controle',compact('controle','conseiller','professeur','cotes'));
    } 
}
