<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Message;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class HomeController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action):bool
    {
        switch ($action) {
            //ak chces poslat spravu, musis byt prihlaseny
            case 'contact':
                return $this->app->getAuth()->isLogged();
            default:
                return true;
        }
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */

    public function contact(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $message="";
        if (isset($formData['submit'])) {
            $message = new Message();

            $message->setAuthor($this->app->getAuth()->getLoggedUserName());
            $message->setEmail($this->request()->getValue('email'));
            $message->setPhoneNumber($this->request()->getValue('number'));
            $message->setMessage($this->request()->getValue('message'));
            $message->setSentAt(date("Y-m-d H:i:s"));

            $message->save();
            $message="Message sent succesfully";
        }
        return $this->html([
            'message'=>$message
        ]);
    }

    public function ship(): Response
    {
        return $this->html();
    }

    public function size(): Response
    {
        return $this->html();
    }

    public function legacy(): Response
    {
        return $this->html();
    }
}
