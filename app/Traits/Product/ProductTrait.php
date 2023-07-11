<?php

namespace App\Traits\Product;

use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\SupplierRepository;
use App\Http\Repositories\WarehouseRepository;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\XmlFile;
use Illuminate\Support\Facades\DB;

trait ProductTrait {

    public function invoice() {
        $xmls = XmlFile::get();

        return view('products.invoice.form')
                    ->with('xmls', $xmls);
    }

    public function invoiceUpload() {
        $file = request()->file('xml');
        $xmlObject = json_decode(json_encode(simplexml_load_string( $file->getContent() )));
        $xmlFile = XmlFile::where('key', $xmlObject->protNFe->infProt->chNFe)->firstOrNew();
        if ( $xmlFile->id ) {
            $xmlObject =  json_decode($xmlFile->body);
        }

        //BUSCAR FORNECEDOR, SE NÃO EXISTIR CADASTRA
        // dd( $xmlObject->NFe->infNFe->emit );
        $supplier = (new SupplierRepository)->findMainCnpj( $xmlObject->NFe->infNFe->emit->CNPJ );
        if ( !$supplier ) {
            $supplier = new Supplier;
            $supplier->social_reason = $xmlObject->NFe->infNFe->emit->xNome;
            if ( property_exists($xmlObject->NFe->infNFe->emit, "xFant") ) {
                $supplier->fantasy_name = $xmlObject->NFe->infNFe->emit->xFant;
            } else {
                $supplier->fantasy_name = $supplier->social_reason;
            }
            $supplier->cnpj = preg_replace("/(..)(...)(...)(....)(..)/", "$1.$2.$3/$4-$5", $xmlObject->NFe->infNFe->emit->CNPJ );
            if ( property_exists($xmlObject->NFe->infNFe->emit->enderEmit, "fone") ) {
                $supplier->phone = preg_replace("/^(..)(.?)(....)(....)$/", "($1) $2$3-$4", $xmlObject->NFe->infNFe->emit->enderEmit->fone );
            }
            $supplier->save();
        }


        if ( !$xmlFile->id ) {
            $xmlFile->number = $xmlObject->NFe->infNFe->ide->nNF;
            $xmlFile->key = $xmlObject->protNFe->infProt->chNFe;
            $xmlFile->supplier_id = $supplier->id;
            $xmlFile->value = $xmlObject->NFe->infNFe->pag->detPag->vPag;
            $xmlFile->is_finished = false;
            $xmlFile->body = json_encode($xmlObject);
            $xmlFile->save();
        } else if ( $xmlFile->is_finished ) {
            return back()->with('error', 'Nota Fiscal já Foi cadastrada');
        }

        $fromToProducts = Product::get();
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
                ->with('xmlFile', $xmlFile)
                ->with('products', $products)
                ->with('warehouses', $warehouses)
                ->with('categories', $categories)
                ->with('supplier', $supplier)
                ->with('fromToProducts', $fromToProducts);

    }
    public function invoiceFinish() {

        DB::beginTransaction();
        $products = request()->get('products');
        // dd( $products );
        foreach( $products as $product) {
            $this->repository->saveProductFromXML($product);
        }

        $xmlFile = XmlFile::find( request()->get("xmlfile"));
        $xmlFile->is_finished = true;
        $xmlFile->save();

        DB::commit();
        return redirect( route('products.index') )->with('success', 'Produto Inserido com sucesso.');
    }

}
