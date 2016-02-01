<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class LessonsController extends Controller
{
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

        return response()->json([
           'data' => $lessons->toArray()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if ( ! $lesson)
        {
            return response()->json([
                'error' => [
                    'message' => 'Lesson does not exist',
//                    'code' => 195
                ]
            ], 404);
        }

        return response()->json([
            'data' => 'Lesson does not exist',
//                    'code' => 195
        ], 200);
    }
}