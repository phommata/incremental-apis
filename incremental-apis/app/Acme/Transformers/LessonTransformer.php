<?php namespace App\Acme\Transformers;

/**
 * Created by PhpStorm.
 * User: andrewphommathep
 * Date: 2/1/16
 * Time: 9:20 PM
 */
class LessonTransformer extends Transformer
{
    /**
     * Transform a lesson
     *
     * @param $lessons
     * @return array
     */
    public function transform($lessons)
    {
        return [
            'title'  => $lessons['title'],
            'body'   => $lessons['body'],
            'active' => (boolean) $lessons['some_bool'],
        ];
    }
}