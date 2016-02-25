<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * ResultRequest Middleware
 *
 * @package App\Http\Middleware
 * @author Wilton Garcia <wiltonog@gmail.com>
 */
class ResultRequest
{
    /**
     * Request the data from sintegra
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

        $client = new Client([
            'timeout'  => 30,
        ]);                 

        $response = $client->request('POST', 'http://www.sintegra.es.gov.br/resultado.php', [
            'form_params' => [
                'num_cnpj' => $request->get('cnpj'),
                'num_ie' => '',
                'botao' => 'Consultar',
            ]
        ]);
        $body = (string) $response->getBody();

        $request->attributes->add(['body' => $body]);


        return $next($request);
    }
}
