<?php namespace App\Acme\Transformers;

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