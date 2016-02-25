<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

/**
 * Api Middleware
 *
 * @package App\Http\Middleware
 * @author Wilton Garcia <wiltonog@gmail.com>
 */
class ApiResult
{
    /**
     * Get the user id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = Auth::user()->id;
        $request->attributes->add(['user_id' => $id]);
        return $next($request);
    }
}
