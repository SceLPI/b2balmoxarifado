<?php

namespace App\Traits\Supplier;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait SupplierRepositoryTrait {
    public function findMainCnpj( $cnpj) : ?Supplier {
        $cnpj = preg_replace("/\D/", "", $cnpj);
        if ( strlen($cnpj) != 14 ) {
            abort(400, "CNPJ INVÁLIDO");
        }
        $main = $this->model->where('cnpj', 'LIKE', substr($cnpj,0,8) . '0001%' )->first();
        if ( !$main ) {
            $main = $this->model
                        ->where('cnpj', 'LIKE', preg_replace("/(..)(...)(...)(....)(..)/", "$1.$2.$3/$4-$5", $cnpj ) )
                        ->first();
        }
        return $main;
    }
}
