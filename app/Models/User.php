<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use PDOException;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'gender',
        'cpf_cnpj',
        'rg',
        'phone',
        'mobile',
        'birth_date',
        'zipcode',
        'state',
        'county',
        'district',
        'address',
        'number',
        'complement',
        'fidelity',
        'fidelity_date',
        'email',
        'password',
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Retorna o saldo do cliente de acordo com o código informado
     */
    public function getSaldo(string $code)
    {
        try {
            return trim(DB::table('SALDO_GBMAIS')->select('ZH_CONTEUD')->where('ZH_CLIENTE', $code)->first()->zh_conteud);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
