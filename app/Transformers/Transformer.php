<?php
/**
 * Created by PhpStorm.
 * User: Isa
 * Date: 3/16/2017
 * Time: 11:09 AM
 */

namespace app\Transformers;


abstract class Transformer
{

    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($items);

}