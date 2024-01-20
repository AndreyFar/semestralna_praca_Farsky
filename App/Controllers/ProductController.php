<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
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
        $category = $this->request()->getValue('category');

        if($category == 'all'){
            $filteredProducts = Product::getAll();
        } else{
            $filteredProducts = Product::getAll("category = '" . $category . "'");
        }

        if(empty($filteredProducts)){
            $message="There are no items from " . $category . " category";
            return  $this->json(array("message" => $message));
        }

        return $this->json($filteredProducts);
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

        $product->setPicture1($this->request()->getFiles()['picture1']['name']);
        $newFileName = FileStorage::saveFile($this->request()->getFiles()['picture1']);
        $product->setPicture1($newFileName);

        $product->setPicture2($this->request()->getFiles()['picture2']['name']);
        $newFileName = FileStorage::saveFile($this->request()->getFiles()['picture2']);
        $product->setPicture2($newFileName);

        $product->setPicture3($this->request()->getFiles()['picture3']['name']);
        $newFileName = FileStorage::saveFile($this->request()->getFiles()['picture3']);
        $product->setPicture3($newFileName);

        $product->setTitle($this->request()->getValue('title'));
        $product->setCategory($this->request()->getValue('category'));
        $product->setDescription($this->request()->getValue('description'));
        $product->setPrice($this->request()->getValue('price'));

        /*
        $product->setPicture1($this->request()->getValue('picture1'));
        $product->setPicture2($this->request()->getValue('picture2'));
        $product->setPicture3($this->request()->getValue('picture3'));
        */

        $product->save();
        return new RedirectResponse($this->url('product.index'));
    }
}