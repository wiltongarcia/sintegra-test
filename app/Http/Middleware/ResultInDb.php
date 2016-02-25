<?php

namespace App\Http\Middleware;

use App\Result;
use Closure;

/**
 * ResultInDb Middleware
 *
 * @package App\Http\Middleware
 * @author Wilton Garcia <wiltonog@gmail.com>
 */
class ResultInDb
{
    /**
     * Verify if data exists id db
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $result = Result::where('cnpj', $request->get('cnpj'))->first();
        if (!empty($result)) {
            $request->attributes->add(['result' => $result->result]);
        }

        return $next($request);
    }
}
