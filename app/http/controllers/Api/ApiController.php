<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\HTTP\Response as IlluminateResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ApiController extends Controller {

    /**
     * @var
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = 'Not Found!')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondAccessDenied($message = 'Access denied')
    {
        return $this->setStatusCode(403)->respondWithError($message);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message)
    {

        return $this->respond([
            'message' => $message,
            'status_code' =>$this->getStatusCode()
        ]);

    }

    public function respondWithSuccess($message)
    {
        return $this->respond([
            'message' =>$message,
            'status_code' =>$this->getStatusCode()
        ]);
    }

    /**
     * @param $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return \Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondCreated($message)
    {
        return $this->setStatusCode(201)->respond([
            'message' => $message,
        ]);
    }

    /**
     * @param $paginatedResult
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithPagination(LengthAwarePaginator $paginatedResult, $data)
    {

        $data = array_merge($data, [

            'paginator' => [

                'totalCount' => $paginatedResult->total(),
                'totalPages' => ceil($paginatedResult->total() / $paginatedResult->perPage()),
                'currentPage' => $paginatedResult->currentPage(),
                'limit' => $paginatedResult->perPage()

            ]
        ]);

        return $this->respond($data);

    }

} 