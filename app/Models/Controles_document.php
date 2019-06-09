<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Controles_document extends Model
{
     protected $primaryKey = 'idcontroles_documents';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idprofesseurs', 'idconseillers', 'remarques',
    ];


    public static function scopeJoinProf($query){
        return $query->join('professeurs','professeurs.idprofesseurs','controles_documents.idprofesseurs');

    }
    public static function scopeJoinConseiller($query){
        return $query->join('professeurs','professeurs.idprofesseurs','controles_documents.idconseillers');

    }
}
