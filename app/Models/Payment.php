<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDOException;

class Payment extends Model
{
    use HasFactory;

    public function getPayments(string $code, array $filters, int $pages = 15)
    {
        try {
            $query = DB::table('DUPLICATAS')->where('cliente', $code);

            if (isset($filters['type']) && !empty($filters['type'])) {
                switch ($filters['type']) {
                    case 'open':
                        $query->whereNull('data_pagamento');
                        break;
                    case 'paid':
                        $query->whereNotNull('data_pagamento');
                        break;
                    case 'expired':
                        $query->where(function ($q) {
                            $q->whereNotNull('data_pagamento')
                                ->where('data_pagamento', '>', 'vencimento');
                        })->orWhere(function ($qor) {
                            $qor->whereNull('data_pagamento')
                                ->where('vencimento', '<', Carbon::now()->format('Ymd'));
                        });
                        break;
                }
            }

            if (isset($filters['start']) && !empty($filters['start'])) {
                $query->where('vencimento', '>=', Carbon::parse($filters['start'])->format('Ymd'));
            }

            if (isset($filters['start']) && !empty($filters['end'])) {
                $query->where('vencimento', '<=', Carbon::parse($filters['end'])->format('Ymd'));
            }

            return $query->orderBy('vencimento')->paginate($pages);
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
