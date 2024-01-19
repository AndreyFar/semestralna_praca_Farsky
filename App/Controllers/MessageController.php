<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Message;

class MessageController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $messages=Message::getAll();

        return $this->html([
            'messages'=>$messages
        ]);
    }
}