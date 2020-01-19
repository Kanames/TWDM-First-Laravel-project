<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * ***Aici este linia unde spune ce introducem in tabela din baza de date eu am adaugat sirname si bday !
     * @var array
     */
    protected $fillable = [
        'name','sirname','bday', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tranzactii(){
        return $this->hasMany(Tranzactie::class); // Aici in acest punct spunem ca aceasta clasa Utilizatori va avea mai multe tranzactii
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
