<?php

namespace App\Http\Middleware;

use Closure;

class setLocale
{
    /**
    * Handle an incoming request.
    *
    * @param \Illuminate\Http\Request $request
    * @param \Closure $next
    * @return mixed
    *
    */

	public function handle($request, Closure $next)
	{
		$locale = $request->segment(1);

        if(empty($locale)) {
            return redirect()->to('/' . app()->getLocale());
        }

        if(in_array($locale, ['en','it','de','fr','tr'])) {
            app()->setLocale($locale);
            $request->except(0);
        }

        return $next($request);
	}
}

?>
