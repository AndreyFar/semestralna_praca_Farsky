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
        if($formData['password'] != $formData['confirm_password']){
            return $this->redirect($this->url("auth.register"));
        }

        //hashovanie hesla
        $loginHeslo=$formData['password'];
        $nasada = bin2hex(random_bytes(16));
        $hashHesla=password_hash($nasada . $loginHeslo, PASSWORD_DEFAULT);

        $user->setNasada($nasada);
        $user->setPassword($hashHesla);
        $user->setIsAdmin($formData['code']);

        $user->save();
        return $this->redirect($this->url("auth.login"));
    }
}