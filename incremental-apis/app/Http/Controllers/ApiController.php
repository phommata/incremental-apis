<?php

namespace App\Http\Controllers;


use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
//    const HTTP_NOT_FOUND = 404;
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found')
    {
//        return response()->json([
//        return $this->respond([
//            'error' => [
//                'message' => $message,
//                'status_code' => $this->getStatusCode(),
//            ]
//
//        ]);
//        return $this->setStatusCode(self::HTTP_NOT_FOUND)->respondWithError($message);
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respondInternalError($message = 'Internal Error!') // return $this->respondInternalError()
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param LengthAwarePaginator $lessons
     * @param $data
     * @return mixed
     */
    protected function respondWithPagination(LengthAwarePaginator $lessons, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $lessons->total(),
                'total_pages' => ceil($lessons->total() / $lessons->perPage()),
                'current_page' => $lessons->currentPage(),
                'limit' => $lessons->perPage()
            ]
        ]);

        return $this->respond($data);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ]

        ]);
    }

    /**
     * @param $message
     * @return mixed
     */
    protected function respondCreated($message)
    {
        return $this->setStatusCode(201)->respond([
//            'status'  => 'success',
            'message' => $message,
        ]);
    }

}