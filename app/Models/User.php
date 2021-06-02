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
            return trim(DB::table('SALDO_GBMAIS')->select('ZH_CONTEUD')->where('ZH_CLIENTE', $code)->where('ZH_TIPO', 'S')->first()->zh_conteud);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function getHistory(string $code, int $page = 15)
    {
        try {
            return DB::table('SALDO_GBMAIS h')
                ->distinct()
                ->select(
                    'h.ZH_ORDEM',
                    DB::raw("(SELECT DISTINCT n.ZH_CONTEUD FROM SALDO_GBMAIS n WHERE n.ZH_TIPO = 'D' AND n.ZH_ORDEM = h.ZH_ORDEM) ZH_INVOICE"),
                    DB::raw("(SELECT DISTINCT n.ZH_CONTEUD FROM SALDO_GBMAIS n WHERE n.ZH_TIPO = 'V' AND n.ZH_ORDEM = h.ZH_ORDEM) ZH_INVOICE_VALUE"),
                    DB::raw("(SELECT DISTINCT n.ZH_CONTEUD FROM SALDO_GBMAIS n WHERE n.ZH_TIPO = 'C' AND n.ZH_ORDEM = h.ZH_ORDEM) ZH_CREDIT"),
                    'h.ZH_DATA',
                    'h.ZH_FILORIG'
                )
                ->where('h.ZH_CLIENTE', $code)
                ->where('h.ZH_TIPO', '<>', 'S')
                ->groupBy('h.ZH_ORDEM', 'h.ZH_DATA','h.ZH_FILORIG')
                ->orderBy('h.ZH_ORDEM', 'asc')
                ->paginate($page);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
