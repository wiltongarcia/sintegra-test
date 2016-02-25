<?php

namespace App\Http\Middleware;

use App\Result;
use Closure;

/**
 * ResultSaveInDb Middleware
 *
 * @package App\Http\Middleware
 * @author Wilton Garcia <wiltonog@gmail.com>
 */
class ResultSaveInDb
{
    /**
     * Save result in db
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (
            $request->attributes->has('result')
            && !$request->attributes->has('body')
        ) {
            return $next($request);
        }        
        $j = json_encode($request->attributes->get('result'));
        $result = new Result;
        $result->user_id = $request->attributes->get('user_id'); 
        $result->cnpj = $request->get('cnpj'); 
        $result->result = $j; 
        $result->save();

        $request->attributes->add(['result' => $j]);
        
        return $next($request);
    }
}
