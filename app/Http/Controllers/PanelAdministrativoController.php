<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\AutenticacionRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Registrar;

class PanelAdministrativoController extends Controller {

    /**
     * @var Guard
     */
    private $auth;
    /**
     * @var Registrar
     */
    private $registrar;

    /**
     * @var Guard
     */

    function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;
    }

    public function mostrarFormularioEntrada()
    {
        if ($this->auth->guest())
        {
            return view('auth.login');
        }

        return view('PanelAdministrativo.inicio');
    }

    protected function getFailedLoginMessage()
    {
        return \Lang::get('formulario.credencialesNoCoinciden');
    }

    public function logout()
    {
        if (!$this->auth->guest())
        {
            $this->auth->logout();
        }

        return redirect()->route('loginPanel');
    }

    public function validarAcceso(AutenticacionRequest $request)
    {
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'usuario';

        $request->merge([$field => $request->input('login')]);
        $request->all();
        if ($this->auth->attempt($request->only($field, 'password')))
        {
            return redirect()->intended(route('loginPanel'));
        }

        return redirect()->route('loginPanel')->withErrors([
            'error' => $this->getFailedLoginMessage(),
        ]);
    }

}
