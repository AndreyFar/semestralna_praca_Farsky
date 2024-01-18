<?php

namespace App\Controllers;

use App\Core\AControllerBase;
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
        return $this->html([
            'products'=>$allProducts
        ]);
    }

    public function show(): Response
    {
        return $this->html();
    }

    public function filter(): Response
    {
        return $this->html();
    }

    public function delete(): Response
    {
        return $this->html();
    }
}