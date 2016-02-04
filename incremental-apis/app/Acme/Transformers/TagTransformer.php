<?php namespace App\Acme\Transformers;

class TagTransformer extends Transformer
{
    /**
     * Transform a tag
     *
     * @param $tag
     * @return array
     */
    public function transform($tag)
    {
        return [
            'name'  => $tag['name'],
        ];
    }
}