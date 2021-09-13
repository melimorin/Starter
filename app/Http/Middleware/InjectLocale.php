<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class InjectLocale
{
    private const SUPPORTED_LOCALES = array('en', 'fr');

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->route('locale'), self::SUPPORTED_LOCALES)) {
            App::setLocale($request->route('locale'));
            return $next($request);
        } else {
            return redirect(App::getLocale() . $request->getRequestUri());
        }
    }
}
