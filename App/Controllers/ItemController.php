<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Item;
use App\Models\Product;
use App\Models\User;

class ItemController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $name=$this->app->getAuth()->getLoggedUserName();
        $items=Item::getAll("personWhoAdded = '" . $name . "'");
        $message="";

        if(empty($items)){
            $message="You have no items in cart";
        }

        return $this->html([
            'items'=>$items,
            'message'=>$message
        ]);
    }

    public function authorize($action):bool
    {
        switch ($action) {
            //ak chces pridavat produkt do kosiku, musis byt prihlaseny
            case 'index':
                return $this->app->getAuth()->isLogged();
            default:
                return true;
        }
    }

    public function delete():Response{
        $id = (int) $this->request()->getValue('id');
        $item = Item::getOne($id);

        if (is_null($item)) {
            throw new HTTPException(404);
        } else {
            $item->delete();
            return new RedirectResponse($this->url("item.index"));
        }
    }

    public function add():Response{
        $id = (int) $this->request()->getValue('id');
        $product = Product::getOne($id);
        $name=$this->app->getAuth()->getLoggedUserName();

        if (is_null($product)) {
            throw new HTTPException(404);
        } else {

            $item= new Item();
            $item->setPersonWhoAdded($name);
            $item->setPicture($product->getPicture1());
            $item->setTitle($product->getTitle());
            $item->setCount(1);
            $item->setPrice($item->getCount()*$product->getPrice());
            $item->setSize('small');
            $item->save();

            $items=Item::getAll("personWhoAdded = '" . $name . "'");

            return $this->html(
                [
                    'items'=>$items,
                    'message'=>"The product was added in cart"
                ], 'index'
            );
        }
    }


}