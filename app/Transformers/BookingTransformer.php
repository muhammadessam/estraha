<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/16/2017
 * Time: 2:27 PM
 */

namespace App\Transformers;

class BookingTransformer extends Transformer
{

    public function transform($book)
    {
        return [
            'name' => $book['name'],
            'price'   => $book['price'],
            'description' => $book['description'],
            'picture' => $book['picture'],

        ];
    }

}