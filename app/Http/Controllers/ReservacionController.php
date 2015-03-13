<?php namespace App\Http\Controllers;

use App\Cliente;
use App\Embarcacion;
use App\Http\Requests;
use App\Http\Requests\ReservacionesRequest;
use App\Paseo;
use App\Reservacion;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Lang;

class ReservacionController extends Controller {

    /**
     * @var Guard
     */
    private $auth;

    function __construct(Guard $auth)
    {

        $this->auth = $auth;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $embarcaciones = Embarcacion::all();
        $paseos = Paseo::all();

        return view('reservacion.create', compact('embarcaciones', 'paseos'));
    }

    /**
     * @param ReservacionesRequest $request
     * @return $reserva
     */
    private function RealizarReserva($datos)
    {

        $reserva = Reservacion::create($datos);
        $reserva->actualizaMontoTotal();

        return $reserva;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ReservacionesRequest $request)
    {
        $cliente = $this->ActualizarOCrearCliente($request);
        $vecesRepetida = Reservacion::ObtenerVecesQueSeRepite($request->input('fecha'), $cliente->id, $request->input
        ('embarcacion_id'), $request->input('paseo_id'))->count();
        if (($this->auth->guest() || !$this->auth->user()->nivelDeAcceso->permiso->esAgencia) && $vecesRepetida > 0)
        {
            flash()->error(Lang::get('formulario.reservaDuplicada'));

            return redirect()->back()->withInput();
        }
        $pasajerosReservados = Reservacion::PasajerosReservadosDeLaFechaEmbarcacionyPaseo($request->input('fecha'),
            $request->input('embarcacion_id'), $request->input('paseo_id'));
        if (!is_integer($pasajerosReservados))
        {
            $pasajerosReservados = 0;
        }
        $pasajerosEnReservaActual = $request->input('adultos') + $request->input('mayores') + $request->input
            ('ninos');
        $totalConEstaReserva = $pasajerosReservados + $pasajerosEnReservaActual;
        if ($this->auth->guest() || !$this->auth->user()->nivelDeAcceso->permiso->cuposExtra)
        {
            $maximoEmbarcacion = Embarcacion::find($request->input('embarcacion_id'))->abordajeNormal;
        } else
        {
            $maximoEmbarcacion = Embarcacion::find($request->input('embarcacion_id'))->abordajeMaximo;
        }
        if ($totalConEstaReserva > $maximoEmbarcacion)
        {
            flash()->error(Lang::get('reservacion.alguienReservoAntes'));

            return redirect()->back()->withInput();
        }
        $respuesta = $request->all() + ['cliente_id' => $cliente->id];

        $reservacion = $this->RealizarReserva($respuesta);
        $totalCuposEnPaseo = Reservacion::PasajerosReservadosDeLaFechaEmbarcacionyPaseo($reservacion->fecha,
            $reservacion->embarcacion_id, $reservacion->paseo_id);

        return view('reservacion.mostrar', compact('reservacion', 'totalCuposEnPaseo'));

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
        $totalCuposEnPaseo = Reservacion::PasajerosReservadosDeLaFechaEmbarcacionyPaseo($reservacion->fecha,
            $reservacion->embarcacion_id, $reservacion->paseo_id);

        return view('reservacion.mostrar', compact('reservacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param ReservacionesRequest $request
     * @return static
     */
    public function ActualizarOCrearCliente(ReservacionesRequest $request)
    {
        $cliente = Cliente::whereIdentificacion($request->input('identificacion'))
            ->orWhere('email', '=', $request->input('email'))
            ->orWhere('telefono', '=', $request->input('telefono'))
            ->get();
        if ($cliente->count() == 0)
        {

            return $cliente = Cliente::create($request->all());
        }
        $cliente = $cliente->first();
        $cliente->fill($request->input())->save();

        return $cliente;
    }
}
