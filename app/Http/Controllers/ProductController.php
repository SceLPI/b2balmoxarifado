<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

	use \App\Traits\Product\ProductTrait;

	public function __construct() {
		$this->repository = new ProductRepository();
	}

	public function index() {
		$products = parent::index();

        // SELECT
        //     `title`,
        //     `code`,
        //     SUM(`stock`) as stock,
        //     MAX(`ultimo_valor_compra`),
        //     `supplier_id`,
        //     `category_id`,
        //     GROUP_CONCAT(`warehouse_id`)
        // FROM
        //     products
        // GROUP BY
        //     `title`,
        //     `code`,
        //     `supplier_id`,
        //     `category_id`

        $products = Product::select([
                                'title',
                                'code',
                                'supplier_id',
                                'category_id',
                                DB::raw('GROUP_CONCAT(warehouse_id) as warehouses'),
                                DB::raw('SUM(stock) as stock'),
                                DB::raw('MAX(ultimo_valor_compra) as ultimo_valor_compra')
                            ])
                            ->orderBy('title', 'ASC')
                            ->groupBy([
                                'title',
                                'code',
                                'supplier_id',
                                'category_id'
                            ])->get();

		return view('products.index')->with('model', $products );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$product = parent::show($id);

		return view('products.form')->with('model', $product );
	}

	public function store() {
		$product = parent::store();

		return redirect( route('products.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$product = parent::update($id);

		return redirect( route('products.index') )->with('success', 'Atualizado com sucesso!');
	}

}
