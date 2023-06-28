<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('entities')->insert([
            [
                "type_id" => 1,
                "name" => "PREFEITURA - Entidade 1",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "type_id" => 1,
                "name" => "PREFEITURA - Entidade 2",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "type_id" => 1,
                "name" => "PREFEITURA - Entidade 3",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            //====================================================
            [
                "type_id" => 2,
                "name" => "EDUCAÇÃO - Entidade 1",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "type_id" => 2,
                "name" => "EDUCAÇÃO - Entidade 2",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "type_id" => 2,
                "name" => "EDUCAÇÃO - Entidade 3",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            //====================================================
            [
                "type_id" => 3,
                "name" => "SAUDE - Entidade 1",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "type_id" => 3,
                "name" => "SAUDE - Entidade 2",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "type_id" => 3,
                "name" => "SAUDE - Entidade 3",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            //====================================================
            [
                "type_id" => 4,
                "name" => "SOCIAL - Entidade 1",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "type_id" => 4,
                "name" => "SOCIAL - Entidade 2",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "type_id" => 4,
                "name" => "SOCIAL - Entidade 3",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);

        DB::table('suppliers')->insert([
            [
                "fantasy_name" => "NF - Fornecedor 1",
                "social_reason" => "SR - Fornecedor 1",
                "cnpj" => "00.000.000/0000-01",
                "phone" => "(00) 00000-0001",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "fantasy_name" => "NF - Fornecedor 2",
                "social_reason" => "SR - Fornecedor 2",
                "cnpj" => "00.000.000/0000-02",
                "phone" => "(00) 00000-0002",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "fantasy_name" => "NF - Fornecedor 3",
                "social_reason" => "SR - Fornecedor 3",
                "cnpj" => "00.000.000/0000-03",
                "phone" => "(00) 00000-0003",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);

        DB::table('categories')->insert([
            [
                "name" => "Categoria 1",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Categoria 2",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Categoria 3",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);

        DB::table('warehouses')->insert([
            [
                "name" => "Almoxarifado 1",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Almoxarifado 2",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Almoxarifado 3",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
