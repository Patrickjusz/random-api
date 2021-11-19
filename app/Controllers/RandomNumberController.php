<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Controllers\Controller;
use App\Helpers\JsonResponse;
use App\Models\RandomNumberModel;
use RandomNumber;

class RandomNumberController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(): JsonResponse
    {
        $randomNumber = new RandomNumberModel();
        $data = $randomNumber->getNumberArray();
        $data['id'] = $randomNumber->create($data['random']);
        return new JsonResponse($data);
    }

    public function show(int $id): JsonResponse
    {
        $randomNumber = new RandomNumberModel();
        $data = (array)$randomNumber->getById($id);
        $httpCode = !empty($data) ? 200 : 404;
        if (empty($data))
        {
            JsonResponse::error404();
        }
        return new JsonResponse($data, 200);
    }
}
