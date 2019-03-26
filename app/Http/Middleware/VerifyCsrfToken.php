<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

use Illuminate\Support\Facades\Redirect;
use Closure;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'appointments'
    ];

    // public function handle($request, Closure $next){
    //     if($request->input('_token')){
    //         if(\Session::getToken() != $request->input('token')){
    //             return Redirect::to('/appointments');
    //         }
    //     }
        

    //     return parent::handle($request, $next);
    // }
}
