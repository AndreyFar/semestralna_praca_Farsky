<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("home.index"));
            }
        }

        $data = ($logged === false ? ['message' => 'Incorrect login or password!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->html();
    }

    public function register(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $users=User::getAll();
        $message="";

        if (isset($formData['submit'])) {
            foreach ($users as $pom) {
                if ($pom->getName() == $formData['login']) {
                    $message="This name, already in use";
                    break;
                }
            }
            if($message != ""){
                return $this->html([
                    'message'=>$message
                ]);
            }

            if($formData['password'] != $formData['confirm_password']) {
                $message="Password and confirm password are not the same";
                return $this->html([
                    'message'=>$message
                ]);
            }

            if (!preg_match('/\d/', $formData['password'])) {
                $message = "Password does not contain a number";
                return $this->html([
                    'message' => $message
                ]);
            }

            if (strlen($formData['password']) < 6) {
                $message = "The password is too short, minimum length 6 characters";
                return $this->html([
                    'message' => $message
                ]);
            }

            if ($formData['code'] != '' && $formData['code'] != '123') {
                $message = "The special code is incorrect, contact us";
                return $this->html([
                    'message' => $message
                ]);
            }

            $user = new User();
            $user->setName($formData['login']);

            //hashovanie hesla
            $loginHeslo=$formData['password'];
            $nasada = bin2hex(random_bytes(16));
            $hashHesla=password_hash($nasada . $loginHeslo, PASSWORD_DEFAULT);

            $user->setNasada($nasada);
            $user->setPassword($hashHesla);
            $user->setIsAdmin($formData['code']);
            $user->setItemsCount(0);
            $user->save();

            return $this->redirect($this->url("auth.login"));

        }
        return $this->html();
    }
}
