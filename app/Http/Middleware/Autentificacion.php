<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Autentificacion {

    /**
     * @var Guard
     */
    private $auth;

    function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if ($this->auth->guest())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->route('loginPanel');
            }
        }


		return $next($request);
	}

}
