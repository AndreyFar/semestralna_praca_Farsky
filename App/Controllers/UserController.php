<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class UserController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        return $this->html();
    }

    public function add(): Response
    {
        //ziskam data z formularu-username, password
        $formData = $this->app->getRequest()->getPost();
        $user = new User();

        $user->setName($formData['login']);
        $user->setPassword($formData['password']);

        if(empty(trim($formData['code']))){
            $user->setIsAdmin($formData['code']);
        }

        $user->save();
        return $this->redirect($this->url("auth.login"));
    }
}