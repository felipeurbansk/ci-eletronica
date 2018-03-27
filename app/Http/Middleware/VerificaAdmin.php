<?php

namespace App\Http\Middleware;

use Closure;

class VerificaAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (auth()->user()->admin == '1'){
            return redirect()->route('adm.usuario.inicio');
      }else{
            return redirect()->route('adm.ci.inicio');
      }

    }
}
