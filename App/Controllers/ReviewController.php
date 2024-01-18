<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Review;

class ReviewController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        $allReviews = Review::getAll();
        return $this->html([
            'reviews'=>$allReviews
        ]);
    }

    public function authorize($action):bool
    {
        switch ($action) {
            //ak chces pridavat recenziu, musis byt prihlaseny
            case 'add':
                return $this->app->getAuth()->isLogged();
            default:
                return true;
        }
    }

    public function add():Response{
        return $this->html();
    }

    public function edit():Response{
        $id = (int)$this->request()->getValue('id');
        $review = Review::getOne($id);

        if (is_null($review)) {
            throw new HTTPException(404);
        }
        return $this->html([
            'review'=> $review
        ]);
    }

    public function save():Response{

        $id = (int)$this->request()->getValue('id');
        $review = Review::getOne($id);

        if (is_null($review)) {
            $review = new Review();
            $review->setUserName($this->app->getAuth()->getLoggedUserName());
        }

        $review->setPicture($this->request()->getFiles()['picture']['name']);
        $formErrors = $this->formErrors();
        if (count($formErrors) > 0) {
            return $this->html(
                [
                    'errors' => $formErrors
                ], 'add'
            );
        } else {
            $newFileName = FileStorage::saveFile($this->request()->getFiles()['picture']);
            $review->setPicture($newFileName);
        }
        $review->setComment($this->request()->getValue('comment'));

        $rating = $this->request()->getValue('rating');
        $review->setRating($rating);
        $review->setImagePath($review->getRating());

        $review->setCreatedAt(date("Y-m-d"));
        $review->save();
        return new RedirectResponse($this->url('review.index'));
    }

    public function delete():Response{
        $id = (int) $this->request()->getValue('id');
        $review = Review::getOne($id);

        if (is_null($review)) {
            throw new HTTPException(404);
        } else {
            $review->delete();
            return new RedirectResponse($this->url("review.index"));
        }
    }

    private function formErrors(): array
    {
        $errors = [];
        if ($this->request()->getFiles()['picture']['name'] != "" && !in_array($this->request()->getFiles()['picture']['type'], ['image/jpeg', 'image/png'])) {
            $errors[] = "Obrázok musí byť typu JPG alebo PNG!";
        }
        return $errors;
    }

}