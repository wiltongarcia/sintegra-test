<?php

namespace App\Http\Middleware;

use Closure;

/**
 * ResultParse Middleware
 *
 * @package App\Http\Middleware
 * @author Wilton Garcia <wiltonog@gmail.com>
 */
class ResultParse
{
    /**
     * Parse html data
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->attributes->has('result')) {
            return $next($request);
        }        

        $body = preg_replace(
            "/<!--(.*)-->|&nbsp;/Uis",
            '',
            $request->attributes->get('body')
        );

        preg_match_all("/class=\"titulo\".*>(&nbsp;)?(.*)<\/td/",
            $body,
            $title, PREG_PATTERN_ORDER);

        preg_match_all("/class=\"valor\".*>(&nbsp;)?(.*)<\/td/",
            $body,
            $value, PREG_PATTERN_ORDER);

        $result = [];
        $l = count($title[2]);
        for ($i = 0; $i < $l; $i++) {
            $result[$i] = [
                'title' => utf8_encode(html_entity_decode(
                    trim(str_replace(':', '', $title[2][$i])), 
                    ENT_NOQUOTES, 
                    'ISO-8859-1'
                )),
                'value' => utf8_encode(html_entity_decode(
                    $value[2][$i]
                )),
            ];
        };


        $request->attributes->add(['result' => $result]);

        return $next($request);
    }
}
