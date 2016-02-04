<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Tag;
use App\Acme\Transformers\TagTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagsController extends ApiController
{
    protected $tagTransformer;

    function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $lessonId
     * @return Response.
     */
    public function index($lessonId = null)
    {
        $tags = $this->getTags($lessonId);
//
        return $this->respond([
            'data' => $this->tagTransformer->transformCollection($tags->all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response.
     */
    public function create()
    {

    }

    /**
     * @param $lessonId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    private function getTags($lessonId)
    {
        return $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all(); // all is bad
    }
}
