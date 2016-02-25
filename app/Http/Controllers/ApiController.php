<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * API Controller
 *
 * @package App\Http\Controllers
 * @author Wilton Garcia <wiltonog@gmail.com>
 */
class ApiController extends Controller
{
    /**
     * Receive request after the middleware and processes the response
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = $request->attributes->get('result');
        return Response($data, 200)->header('Content-Type', 'application/json');
    }
}
