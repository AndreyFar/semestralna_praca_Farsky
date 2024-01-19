<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class ItemController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $id=$this->app->getAuth()->getLoggedUserId();
        $name=$this->app->getAuth()->getLoggedUserName();
        $this->app->getAuth()->setLoggedUserContext();

        $items=$this->app->getAuth()->getLoggedUserContext();

        return $this->html([
            'id'=>$id,
            'name'=>$name,
            'items'=>$items
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
}