<?php namespace app\Http\Requests;

class ReviewRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'review' => 'required|numeric|In:1,2,3,4,5',
        ];
    }

}