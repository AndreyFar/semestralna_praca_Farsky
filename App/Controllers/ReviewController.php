<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
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
        }

        $review->setUserName($this->request()->getValue('name'));
        $review->setPicture($this->request()->getValue('picture'));
        $review->setComment($this->request()->getValue('comment'));

        $rating = $this->request()->getValue('rating');
        if($rating !== null && $rating >= 1 && $rating <= 5){
            $review->setRating($rating);
            $review->setImagePath($review->getRating());
        } else {
            return new RedirectResponse($this->url('review.notify'));
        }

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

    public function notify():Response{
        return $this->html();
    }

}