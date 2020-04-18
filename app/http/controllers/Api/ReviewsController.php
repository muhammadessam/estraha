<?php

namespace App\Http\Controllers\Api;

use App;
use Auth;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Lang;
use Validator;
class ReviewsController extends ApiController
{


    public function __construct()
    {

    }

    public function review(ReviewRequest $request)
    {
        $user_id = auth()->user()->getAuthIdentifier();

        $review = $request->get('review');
        $place_id  = $request->get('place_id');

        $user = User::find($user_id);

        if (!$user)
        {
            return $this->respondNotFound(Lang::get('messages.userNotFound'));
        }
        else {
            $place_review = new Review();
            $place_review->review = $review;
            $place_review->place_id = $place_id;
            $place_review->user_id = $user_id;
            $place_review->save();
            return $this->respondWithSuccess(Lang::get('messages.reviewsuccess'));
        }
    }


}
