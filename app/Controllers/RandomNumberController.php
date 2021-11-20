<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Controllers\Controller;
use App\Helpers\JsonResponse;
use App\Models\RandomNumberModel;

class RandomNumberController extends Controller
{
    private Request $request;
    
    /**
     * __construct
     *
     * @param  Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * Create new random number
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = RandomNumberModel::getNumberArray();
        return new JsonResponse($data, 201);
    }
    
    /**
     * Show random number
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $data = RandomNumberModel::getById($id);
        if (!$data) {
            JsonResponse::error404();
        }
        return new JsonResponse($data, 200);
    }
}
