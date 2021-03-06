<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Api Middleware
 *
 * @package App\Http\Middleware
 * @author Wilton Garcia <wiltonog@gmail.com>
 */
class ApiResult
{
    use ValidatesRequests;
    /**
     * Get the user id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rules = array(
            'cnpj' => 'required|cnpj_mascara',
        );

        $validator = \Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            $messages = $validator->messages();
            return response(['messages' => $messages]);
        }

        $id = Auth::user()->id;
        $request->attributes->add(['user_id' => $id]);
        return $next($request);
    }
}
