<?php

namespace App\Controllers;

use App\Helpers\ResponseInterface;

abstract class Controller
{
    abstract public function index(): ResponseInterface;
    abstract public function show(int $id): ResponseInterface;
}
