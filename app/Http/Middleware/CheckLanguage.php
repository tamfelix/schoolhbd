<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;

class CheckLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $language = 'fr'; //default

        if (request('language')){
            $language = request('language');
            session()->put('language', $language);
        }elseif(session('language')){
            $language = session('language');
        }
        app()->setLocale($language);
        //$locale = $request['backend_language'];
        //if (session()->has('locale')) {
          //  App::setLocale(session()->get('locale'));

            return $next($request);

    }
}
