<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Entities\Build;
use App\Models\Entities\CityHall;
use App\Models\Entities\Secretary;
use App\Models\Entities\Warehouse;
use App\Http\Repositories\EntityRepository;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    private EntityRepository $entityRepository;

    public function __construct() {
        $this->entityRepository = new EntityRepository;
    }

    public function index() {

        // $cityHall = new CityHall;
        // $cityHall->name = "Batalha";
        // $cityHall->save();

        // $secretaryEducation = new Secretary;
        // $secretaryEducation->name =  "Secretaria de Educação";
        // $secretaryEducation->save();

        // $secretaryHealty = new Secretary;
        // $secretaryHealty->name = "Secretaria de Saúde";
        // $secretaryHealty->save();

        // $builds = new Build;
        // $builds->name = "Hospital Municipal Santo Eduardo";
        // $builds->save();

        // $warehouse = new Warehouse;
        // $warehouse->name = "Almoxarifado Central - Educação";
        // $warehouse->save();

    }

}
