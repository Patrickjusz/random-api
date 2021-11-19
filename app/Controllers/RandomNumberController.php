<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Controllers\Controller;
use App\Helpers\JsonResponse;
use App\Models\RandomNumberModel;

class RandomNumberController extends Controller
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(): JsonResponse
    {
        $data = RandomNumberModel::getNumberArray();
        return new JsonResponse($data, 201);
    }

    public function show(int $id): JsonResponse
    {
        $data = RandomNumberModel::getById($id);
        if (!$data) {
            JsonResponse::error404();
        }
        return new JsonResponse($data, 200);
    }
}
