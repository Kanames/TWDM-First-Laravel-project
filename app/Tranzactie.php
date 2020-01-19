<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tranzactie extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that are mass assignable.
     * ***Aici este linia unde spune ce introducem in tabela din baza de date eu am adaugat sirname si bday !
     * @var array
     */
    protected $fillable = [
        'user_id','isDebitare','isCreditare', 'motivTranzactie','categorieTranzactie','sursaMonetara','suma'
    ];

}
