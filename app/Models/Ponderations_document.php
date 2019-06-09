<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponderations_document extends Model
{
    protected $primaryKey = 'idponderations_documents';
    public $timestamps = false;

    

    public static function scopeJoinTypeDocument($query){
        return $query->join('types_documents','types_documents.idtypes_documents','ponderations_documents.idtypes_documents');

    }

    public static function scopeGetByTypeDocument($query,$idtypes_documents){
        return $query->JoinTypeDocument()->where('idtypes_documents',$idtypes_documents);

    }
}
