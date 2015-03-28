<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class autorizadoConsultarReservas {

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
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest())
        {
            return redirect()->route('loginPanel');
        }
        if (!$this->auth->user()->nivelDeAcceso->permiso->consultarReservas)
        {
            return response('No Autorizado.', 401);

        }

        return $next($request);

    }

}
