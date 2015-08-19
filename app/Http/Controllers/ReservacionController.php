<?php namespace App\Http\Controllers;

use App\Cliente;
use App\Embarcacion;
use App\FechaEspecial;
use App\Http\Requests;
use App\Http\Requests\ReservacionesRequest;
use App\Paseo;
use App\Reservacion;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use JavaScript;


class ReservacionController extends Controller
{

    /**
     * @var Guard
     * Añade Variable Autenticacion al Controlador
     */
    private $auth;

    /**
     * @param Guard $auth
     */
    function __construct(Guard $auth)
    {

        $this->auth = $auth;
    }

    /**
     *Muestra un Formulario para realizar la Reservacion
     * @return Response
     */
    public function create()
    {
        $embarcaciones = Embarcacion::all();
        $paseos = Paseo::all();
        $diasNoLaborablesEmbarcaciones = obtenerDiasNoLaborables($embarcaciones);
        $diasNoLaborablesPaseos = obtenerDiasNoLaborables($paseos);
        $fechasEspeciales = FechaEspecial::futuro()->with('embarcaciones')->get();
        $diasLaborables=obtenerDiasLaborablesDesdeFechasEspeciales($fechasEspeciales);
        $diasNoLaborablesEspeciales=obtenerDiasNoLaborablesDesdeFechasEspeciales($fechasEspeciales);
        $diasNoLaborables = array_intersect($diasNoLaborablesEmbarcaciones, $diasNoLaborablesPaseos);
        foreach($diasLaborables as $anadirdia){
            array_push($diasNoLaborables,$anadirdia);
        }
        foreach($diasNoLaborablesEspeciales as $anadirdia){
            array_push($diasNoLaborables,$anadirdia);
        }
//        dd($diasNoLaborables);
        JavaScript::put([
            'localization' => LaravelLocalization::getCurrentLocale(),
            'diasNoLaborables' => $diasNoLaborables
        ]);
        return view('reservacion.create', compact('embarcaciones', 'paseos'));
    }

    /**
     * @param ReservacionesRequest $request
     * @return $reserva
     * Ejecuta la Reserva y devuelve la misma
     */
    private function RealizarReserva($datos)
    {

        $reserva = Reservacion::create($datos);
        $reserva = Reservacion::find($reserva->id);

        return $reserva;
    }

    /**
     * Guardar Reservacion
     * @return Response
     */
    public function store(ReservacionesRequest $request)
    {
        $cliente = $this->ActualizarOCrearCliente($request);
        $vecesRepetida = Reservacion::ObtenerVecesQueSeRepite($request->input('fecha'), $cliente->id, $request->input
        ('embarcacion_id'), $request->input('paseo_id'))->count();
        if (($this->auth->guest() || !$this->auth->user()->nivelDeAcceso->permiso->esAgencia) && $vecesRepetida > 0) {
            flash()->error(Lang::get('formulario.reservaDuplicada'));

            return redirect()->back()->withInput();
        }
        $pasajerosReservados = Reservacion::PasajerosReservadosDeLaFechaEmbarcacionyPaseo($request->input('fecha'),
            $request->input('embarcacion_id'), $request->input('paseo_id'));
        if (!is_integer($pasajerosReservados)) {
            $pasajerosReservados = 0;
        }
        $pasajerosEnReservaActual = $request->input('adultos') + $request->input('mayores') + $request->input
            ('ninos');
        $totalConEstaReserva = $pasajerosReservados + $pasajerosEnReservaActual;
        if ($this->auth->guest() || !$this->auth->user()->nivelDeAcceso->permiso->cuposExtra) {
            $maximoEmbarcacion = Embarcacion::find($request->input('embarcacion_id'))->abordajeNormal;
        } else {
            $maximoEmbarcacion = Embarcacion::find($request->input('embarcacion_id'))->abordajeMaximo;
        }
        if ($totalConEstaReserva > $maximoEmbarcacion) {
            flash()->error(Lang::get('reservacion.alguienReservoAntes'));

            return redirect()->back()->withInput();
        }
        $respuesta = $request->all() + ['cliente_id' => $cliente->id];

        $reservacion = $this->RealizarReserva($respuesta);

        return view('reservacion.mostrar', compact('reservacion'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        //return view('templates.mainSinNav', compact('reservacion'));

        return view('reservacion.mostrar', compact('reservacion'));
    }


    /**
     * @param ReservacionesRequest $request
     * @return array|static|static[]
     */
    public function ActualizarOCrearCliente(ReservacionesRequest $request)
    {
        $cliente = Cliente::whereIdentificacion($request->input('identificacion'))
            ->orWhere('email', '=', $request->input('email'))
            ->orWhere('telefono', '=', $request->input('telefono'))
            ->get();
        if ($cliente->count() == 0) {

            return $cliente = Cliente::create($request->all());
        }
        $cliente = $cliente->first();
        $cliente->fill($request->input())->save();

        return $cliente;
    }

}
