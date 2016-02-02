<?php namespace App\Acme\Transformers;

/**
 * Created by PhpStorm.
 * User: andrewphommathep
 * Date: 2/1/16
 * Time: 9:15 PM
 */
abstract class Transformer
{
    /**
     * Transform a collection of items
     *
     * @param $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}