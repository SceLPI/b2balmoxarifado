<?php

namespace App\Traits\Product;

use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\SupplierRepository;
use App\Http\Repositories\WarehouseRepository;
use App\Models\Supplier;

trait ProductTrait {

    public function invoice() {
        return view('products.invoice.form');
    }

    public function invoiceUpload() {
        $file = request()->file('xml');
        $xmlObject = json_decode(json_encode(simplexml_load_string( $file->getContent() )));

        //BUSCAR FORNECEDOR, SE NÃO EXISTIR CADASTRA
        // dd( $xmlObject->NFe->infNFe->emit );
        $supplier = (new SupplierRepository)->findMainCnpj( $xmlObject->NFe->infNFe->emit->CNPJ );
        if ( !$supplier ) {
            $supplier = new Supplier;
            $supplier->fantasy_name = $xmlObject->NFe->infNFe->emit->xFant;
            $supplier->social_reason = $xmlObject->NFe->infNFe->emit->xNome;
            $supplier->cnpj = preg_replace("/(..)(...)(...)(....)(..)/", "$1.$2.$3/$4-$5", $xmlObject->NFe->infNFe->emit->CNPJ );
            $supplier->phone = preg_replace("/^(..)(.?)(....)(....)$/", "($1) $2$3-$4", $xmlObject->NFe->infNFe->emit->enderEmit->fone );
            $supplier->save();
        }

        $products = [];
        if ( is_array($xmlObject->NFe->infNFe->det) ) {
            foreach( $xmlObject->NFe->infNFe->det as $product ) {
                $productobj = (new ProductRepository)->findProductByCodeAndSupplier($supplier->id, $product->prod->cProd);
                if ( $productobj ) {
                    $product->prod->cat_id = $productobj->category_id;
                    $product->prod->cat_name = $productobj->category->name;
                }
                $products[] = $product->prod;
            }
        } else {
            $productobj = (new ProductRepository)->findProductByCodeAndSupplier($supplier->id, $xmlObject->NFe->infNFe->det->prod->cProd);
            if ( $productobj ) {
                $xmlObject->NFe->infNFe->det->prod->cat_id = $productobj->category_id;
                $xmlObject->NFe->infNFe->det->prod->cat_name = $productobj->category->name;
            }
            $products[] = $xmlObject->NFe->infNFe->det->prod;
        }

        $warehouses = (new WarehouseRepository)->fetchAll();
        $categories = (new CategoryRepository)->fetchAll();
        // $supplier = (new SupplierRepository)->fetchAll();

        return view('products.invoice.review')
                ->with('products', $products)
                ->with('warehouses', $warehouses)
                ->with('categories', $categories)
                ->with('supplier', $supplier);
    }
    public function invoiceFinish() {
        $products = request()->get('products');
        // dd( $products );
        foreach( $products as $product) {
            $this->repository->saveProductFromXML($product);
        }

        return redirect( route('products.index') )->with('success', 'Produto Inserido com sucesso.');
    }

}
