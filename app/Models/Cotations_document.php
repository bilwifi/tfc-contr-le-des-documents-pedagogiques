<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotations_document extends Model
{
    protected $primaryKey = 'idcotations_documents';
     public $timestamps = false;
    

    protected $fillable = [
        'idcontroles_documents', 'idponderations_documents', 'cote',
    ];
    
    public static function scopeJoinPonderations($query){
        return $query->join('ponderations_documents','ponderations_documents.idponderations_documents','cotations_documents.idponderations_documents');

    }
    // Toujour avec ScopeJoinPonderation avant
    public static function scopeJoinTypesDocuments($query){
        return $query->join('types_documents','types_documents.idtypes_documents','ponderations_documents.idtypes_documents');

    }
    
}
