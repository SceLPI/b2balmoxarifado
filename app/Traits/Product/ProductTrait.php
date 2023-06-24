<?php

namespace App\Traits\Product;

use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\SupplierRepository;
use App\Http\Repositories\WarehouseRepository;

trait ProductTrait {

    public function invoice() {
        return view('products.invoice.form');
    }

    public function invoiceUpload() {
        $file = request()->file('xml');
        $xmlObject = json_decode(json_encode(simplexml_load_string( $file->getContent() )));
        $products = [];
        if ( is_array($xmlObject->NFe->infNFe->det) ) {
            foreach( $xmlObject->NFe->infNFe->det as $product ) {
                $products[] = $product->prod;
            }
        } else {
            $products[] = $xmlObject->NFe->infNFe->det->prod;
        }

        $warehouses = (new WarehouseRepository)->fetchAll();
        $categories = (new CategoryRepository)->fetchAll();
        $suppliers = (new SupplierRepository)->fetchAll();

        return view('products.invoice.review')
                ->with('products', $products)
                ->with('warehouses', $warehouses)
                ->with('categories', $categories)
                ->with('suppliers', $suppliers);
    }
    public function invoiceFinish() {
        $products = request()->get('products');
        foreach( $products as $product) {
            $this->repository->saveProductFromXML($product);
        }

        return redirect( route('products.index') )->with('success', 'Produto Inserido com sucesso.');
    }

}
