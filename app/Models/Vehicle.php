<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDOException;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * Retorna os veículos do cliente de acordo com o código informado
     */
    public function getVehicles(string $code, int $pages = 15)
    {
        try {
            return DB::table('VEICULOS')->where('CLIENTE', $code)->paginate($pages);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
