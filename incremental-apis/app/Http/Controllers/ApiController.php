<?php
/**
 * Created by PhpStorm.
 * User: andrewphommathep
 * Date: 2/2/16
 * Time: 1:57 PM
 */

namespace App\Http\Controllers;


use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
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
        return $this->setStatusCode(404)->respondWithError($message);
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

}