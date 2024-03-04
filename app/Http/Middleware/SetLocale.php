<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // this is language detect middleware
        try {
            $prefferedLang = $request->header('lang');
            if ($prefferedLang)
                App::setLocale($prefferedLang);
        }
        catch(Exception)
        {
            return \response()->json(['message'=>'please enter valid language character'],400);
        }
        return $next($request);
    }
}
