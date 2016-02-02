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
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function respondNotFound($message = 'Not Found')
    {
        return response()->json([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ]

        ]);
    }
}