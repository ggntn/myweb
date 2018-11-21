<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Config;

class Locale
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
        $locale = Config::get('app.locale');
        if(session()->has('locale'))
            $locale = session()->get('locale');
        else
            session('locale', $locale);
        App::setLocale($locale);
        return $next($request);
    }
}
