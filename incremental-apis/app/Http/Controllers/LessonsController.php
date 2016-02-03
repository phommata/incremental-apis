<?php

namespace App\Http\Controllers;

use App\Acme\Transformers\LessonTransformer;
use App\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

//class LessonsController extends Controller
class LessonsController extends ApiController
{
    /**
     * @var App\Acme\Transformers\LessonTransformer
     */
    protected $lessonTransformer;

    /**
     * LessonsController constructor.
     * @param App\Acme\Transformers\LessonTransformer $lessonTransformer
     */
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;

        $this->middleware('auth.basic', ['only' => 'post']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // What's wrong with the following return statement:
        // 1. All is bad
        // 2. No way to attach meta data
        // 3. Linking db structure to the API output
        // 4. No way to signal headers/response codes
//        return Lesson::all(); // really bad practice

        $lessons = Lesson::all();

//        return response()->json([
        return $this->respond([
//           'data' => $this->lessonTransformer->transformCollection($lessons->toArray())
           'data' => $this->lessonTransformer->transformCollection($lessons->all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        if ( ! $lesson)
        {
            return $this->respondNotFound('Lesson does not exist');
//            return $this->respondWithError(404, 'Lesson does not exist');

//            return response()->json([
//                'error' => [
//                    'message' => 'Lesson does not exist',
////                    'code' => 195
//                ]
//            ], 404);
        }

//        return response()->json([
        return $this->respond([
//            'data' => $this->transform($lesson->toArray()),
            'data' => $this->lessonTransformer->transform($lesson)
        ]);
    }

    public function store(Request $request)
    {
//        dd('store');
        if ( ! $request->input('title') or ! $request->input('body'))
        {
            // return some kind of response
            // 400 Bad Request, 403 Forbidden, 422 Unproccesable entity
            // provide a message
            return $this->setStatusCode(422)
                        ->respondWithError('Parameters failed validation for a lesson');
        }

        Lesson::create($request->all());

        return $this->setStatusCode(201)->respond([
//            'status'  => 'success',
            'message' => 'Lesson sucessfully created.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
