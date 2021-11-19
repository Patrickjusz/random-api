<?php

namespace App\Controllers;

use App\Helpers\ResponseInterface;

abstract class Controller
{
    abstract function index(): ResponseInterface;
    abstract function show(int $id): ResponseInterface;
}
