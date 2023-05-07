<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
* @OA\Info(
*             title="API Robot Rangers", 
*             version="1.0",
*             description="Lista de URI's de la API"
* )
*
* @OA\Server(url="http://localhost:8000")
*/
class ApiController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
}
