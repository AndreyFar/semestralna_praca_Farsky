<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Product;

class ProductController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $allProducts = Product::getAll();
        $message="";
        return $this->html([
            'products'=>$allProducts,
            'message'=>$message
        ]);
    }

    public function show(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $product = Product::getOne($id);

        return $this->html([
            'product'=>$product
        ]);
    }

    public function filter(): Response
    {
        $products = Product::getAll();
        $category = $this->request()->getValue('category');
        $filteredProducts = [];

        //filtrovanie produktov podla kategorie
        if ($category == 'all'){
            $filteredProducts = $products;
        } else {
            foreach ($products as $product) {
                if ($product->getCategory() == $category) {
                    $filteredProducts[] = $product;
                }
            }
        }
        $message="";
        if(empty($filteredProducts)){
            $message="There are no items from " . $category . " category";
        }

        return $this->html([
            'products'=>$filteredProducts,
            'message'=>$message
        ]);
    }

    public function delete(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $product = Product::getOne($id);

        if (is_null($product)) {
            throw new HTTPException(404);
        } else {
            $product->delete();
            return new RedirectResponse($this->url("product.index"));
        }
    }

    public function add(): Response
    {
        return $this->html();
    }

    public function save(): Response
    {
        $product = new Product();

        $product->setTitle($this->request()->getValue('title'));
        $product->setCategory($this->request()->getValue('category'));
        $product->setDescription($this->request()->getValue('description'));
        $product->setPrice($this->request()->getValue('price'));

        $product->setPicture1($this->request()->getValue('picture1'));
        $product->setPicture2($this->request()->getValue('picture2'));
        $product->setPicture3($this->request()->getValue('picture3'));

        $product->save();
        return new RedirectResponse($this->url('product.index'));
    }
}