<?php

namespace App\Controllers;

use App\Helpers\Request;
use App\Controllers\Controller;
use App\Helpers\JsonResponse;
use App\Models\RandomNumberModel;

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
        return new JsonResponse($data);
    }

    public function show(int $id): JsonResponse
    {
        $randomNumber = new RandomNumberModel();
        $data = (array)$randomNumber->getById($id);
        return new JsonResponse($data);
    }
}
