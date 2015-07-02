<?php namespace App\Http\Controllers;

use App\Cliente;
use App\Embarcacion;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ConsultarReservacionRequest;
use App\Http\Requests\ModificarPaseoRequest;
use App\Http\Requests\PagosRequest;
use App\Pago;
use App\PagoDirecto;
use App\Pasajero;
use App\Paseo;
use App\Reservacion;
use App\TipoDePago;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ConsultarReservasAdminController extends Controller
{

    /**
     * @var Guard
     */
    private $auth;

    function __construct(Guard $auth)
    {
        $this->middleware('App\Http\Middleware\autorizadoConsultarReservas');
        $this->auth = $auth;
    }


    /**
     * Muestra Formulario para consulta de Reservas
     *
     * @return Response
     */
    public function mostrarFormulario()
    {
        $paseos = Paseo::lists('horaDeSalida', 'id')->all();

        $embarcaciones = Embarcacion::lists('nombre', 'id')->all();

        return view('reservacion.admin.consulta', compact('paseos', 'embarcaciones'));
    }

    public function mostrarFormularioAbordaje()
    {
        $paseos = Paseo::lists('horaDeSalida', 'id')->all();

        $embarcaciones = Embarcacion::lists('nombre', 'id')->all();

        return view('reservacion.admin.abordaje', compact('paseos', 'embarcaciones'));
    }

    public function delete($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        $reservacion->delete();
    }

    /**
     * @param ConsultarReservacionRequest $request
     * @return string
     */
    public function consultarReservas2(ConsultarReservacionRequest $request)
    {
        if ($request->input('numero_de_reserva') != '') {
            $reservaciones = Reservacion::with(['cliente', 'embarcacion', 'paseo', 'estadoDePago'])->where
            ('id', $request->input('numero_de_reserva'))->get();


            return view('reservacion.admin.show', compact('reservaciones'));
        }
        if ($request->input('nombreoapellido') != '') {
            $reservaciones = Cliente::where('nombre', 'LIKE', $request->input('nombreoapellido'))->reservas()->with([
                'cliente',
                'embarcacion',
                'paseo',
                'estadoDePago'
            ])->get();

            return $reservaciones;
        }
        $horas = $request->input('horas');
        $embarcaciones = $request->input('embarcaciones');
        if ($request->input('horas') == []) {
            $horas = Paseo::lists('id')->all();
        }
        if ($request->input('embarcacion_id') == []) {
            $embarcaciones = Embarcacion::lists('id')->all();
        }
        $reservaciones = $this->consultarReservaciones($request, $embarcaciones, $horas);

        return view('reservacion.admin.show', compact('reservaciones'));
    }

    public function consultarReservas(ConsultarReservacionRequest $request)
    {
        if ($request->input('numero_de_reserva') != '') {
            $reservaciones = Reservacion::with(['cliente', 'embarcacion', 'paseo', 'estadoDePago'])->where
            ('id', $request->input('numero_de_reserva'))->get();


            return view('reservacion.admin.show2', compact('reservaciones'));
        }
        if ($request->input('nombreoapellido') != '') {
            $clientes = Cliente::where('nombre', 'LIKE', $request->input('nombreoapellido'))->with('reservas')->get();
            $reservaciones = new Collection();
            foreach ($clientes as $cliente) {
                if ( ! $cliente->reservas->isEmpty()) {
                    foreach ($cliente->reservas as $reserva) {
                        $reservaciones->push($reserva);
                    }
                }
            }
//            $reservaciones=$reservaciones->groupBy('embarcacion.nombre');
//            dd($reservaciones);
            return view('reservacion.admin.show2', compact('reservaciones'));
        }

        $horas = $request->input('horas');
        $embarcaciones = $request->input('embarcaciones');
        if ($request->input('horas') == []) {
            $horas = Paseo::lists('id')->all();
        }
        if ($request->input('embarcacion_id') == []) {
            $embarcaciones = Embarcacion::lists('id')->all();
        }
        $reservaciones = $this->consultarReservaciones($request, $embarcaciones, $horas);

        return view('reservacion.admin.show2', compact('reservaciones'));
    }

    public function editarReserva($id)
    {
        $reserva = Reservacion::with(['cliente', 'embarcacion', 'paseo', 'estadoDePago'])->find($id);
        $embarcaciones = Embarcacion::lists('nombre', 'id')->all();
        $paseos = Paseo::lists('horaDeSalida', 'id')->all();
        $tiposDePagos = TipoDePago::where('nombre', '!=', 'Mercadopago')->lists('nombre', 'id')->all();
        $pasajerosEnReserva = Reservacion::PasajerosReservadosDeLaFechaEmbarcacionyPaseo($reserva->fecha,
            $reserva->embarcacion_id, $reserva->paseo_id);
        $maximoCupos = $reserva->embarcacion->abordajeNormal;
        if ($this->auth->user()->nivelDeAcceso->permiso->cuposExtra) {
            $maximoCupos = $reserva->embarcacion->abordajeMaximo;
        }
        $cuposDisponibles = $maximoCupos - $pasajerosEnReserva + $reserva->adultos + $reserva->mayores +
            $reserva->ninos;

        return view('reservacion.admin.edit',
            compact('reserva', 'embarcaciones', 'paseos', 'cuposDisponibles', 'tiposDePagos'));

    }

    /**
     * @param ConsultarReservacionRequest $request
     * @param $embarcaciones
     * @param $horas
     * @return mixed
     *
     */
    public function consultarReservaciones(ConsultarReservacionRequest $request, $embarcaciones, $horas)
    {
        $reservaciones = Reservacion::with(['cliente', 'embarcacion', 'paseo', 'estadoDePago'])
            ->whereIn('embarcacion_id', $embarcaciones)
            ->whereIn('paseo_id', $horas)
            ->where('fecha', $request->input('fecha'))
            ->orderBy('embarcacion_id')->orderBy('paseo_id')
            ->orderBy('estado_del_pago_id', 'Desc')
            ->get();

        return $reservaciones;
    }

    public function recibirPago(PagosRequest $request)
    {
        $pf = PagoDirecto::create($request->all());
        $reserva = Reservacion::find($request->input('reservacion_id'))->touch();

        return redirect()->route('editarReservas', $request->input('reservacion_id'));

        //return view('reservacion.admin.partials.recibido.pago', compact('pago'));
    }

    public function borrarPago(Request $r)
    {
        $pago = Pago::find($r->input('id'));
        $id = $pago->reserva->id;
        $pago->delete();
        $reserva = Reservacion::find($id)->touch();

        return redirect()->route('editarReservas', $id);
    }

    public function modificarCliente(ClienteRequest $request)
    {
        $cliente = Cliente::find($request->input('id'));
        $cliente->fill($request->all());
        $cliente->save();

        return redirect()->route('editarReservas', $request->input('reservacion_id'));

    }

    public function modificarPaseo(ModificarPaseoRequest $request)
    {
        $paseo = Reservacion::find($request->input('id'));
        $paseo->fill($request->all());
        $paseo->save();

        return redirect()->route('editarReservas', $request->input('id'));
    }

    public function anadirPasajeros(Request $request)
    {
        $pasajero = Pasajero::create($request->all());

        return redirect()->route('editarReservas', $request->input('reservacion_id'));
    }

    public function borrarPasajero(Request $request)
    {
        $pasajero = Pasajero::find($request->input('id'));
        $pasajero->delete();

        return redirect()->route('editarReservas', $request->input('reservacion_id'));

    }

    public function borrarReserva(Request $id)
    {
        dd($id);
        $reservacion = Reservacion::findOrFail($id);
        $reservacion->delete();

    }
}
