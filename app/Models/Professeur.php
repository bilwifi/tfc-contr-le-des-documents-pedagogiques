<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class Professeur extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'idprofesseurs';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idsecope', 'nom', 'postnom', 'prenom' ,'attribution','qualification','anciennete','user_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    /**
     * Evénement éloquent lors de la creation d'un établissement
     * on crée un pseudo et un mot de passe par defaut pour chaque entrée
     */
    protected static function boot(){
        parent::boot();

        static::creating(function($professeur){
           $professeur->pseudo = self::pseudoUnique(str_slug($professeur->nom, $separator = '-'));
           $professeur->password = Hash::make('azerty');
        });
    }
    public function getAuthIdentifierName()
    {
        return 'idprofesseurs';
    }

    // Génération de pseudo unique
    private static function pseudoUnique($pseudo){
        if(self::where('pseudo',$pseudo)->first()){
            $complement  = random_int(1, 100);
            $pseudo = $pseudo.$complement;
            return self::pseudoUnique($pseudo);
        }

        return $pseudo;
    }
}
