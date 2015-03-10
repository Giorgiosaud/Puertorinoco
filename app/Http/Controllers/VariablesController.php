<?php namespace App\Http\Controllers;

use App\Embarcacion;
use App\FechaEspecial;
use App\Http\Requests;
use App\Http\Requests\VariablesRequest;
use App\Paseo;
use App\Variable;
use Carbon\Carbon;
use Illuminate\Auth\Guard;

class VariablesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $variables = Variable::all();
        $valores_de_tabla = [];
        foreach ($variables as $v)
        {
            array_push($valores_de_tabla, ['Nombre de Variable' => '<a href="variables/' . $v->id . '/edit">' . $v->nombre
                . '</a>',
                                           'Valor'              => $v->valor]);
        }

        return view('variables.all', compact('variables', 'valores_de_tabla'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('variables.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(VariablesRequest $request)
    {
        if ($request->file('imagen'))
        {
            $archivo = $request->file('imagen');
            $destinationPath = 'uploads';
            $extension = $archivo->getClientOriginalExtension();
            $name = $request->input('Nombre') . '.' . $extension;
            $archivo->move($destinationPath, $name);
            $valor = $destinationPath . '/' . $name;
            $nombre = $request->input('Nombre');
        } else
        {
            $valor = $request->input('Valor');
            $nombre = $request->input('Nombre');
        }
        Variable::create(array('nombre' => $nombre, 'valor' => $valor));

        return redirect('variables');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
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

    public function fechasEspeciales()
    {
        $minimoDiasAReservar = Variable::whereNombre('minDiasParaReservar')->first()->valor;
        $TemporadaBaja = Variable::whereNombre('temporadaBaja')->first()->valor;
        $diasNoLaborablesDeLaSemana = [];
        $fechasEspecialesFinales = [];
        $embarcacionesDisponiblesPorFecha = [];
        $paseos = Paseo::all();
        if ($paseos->sum('domingo') == 0)
        {
            array_push($diasNoLaborablesDeLaSemana, '0');
        }
        if ($paseos->sum('lunes') == 0)
        {
            array_push($diasNoLaborablesDeLaSemana, '1');
        }
        if ($paseos->sum('martes') == 0)
        {
            array_push($diasNoLaborablesDeLaSemana, '2');
        }
        if ($paseos->sum('miercoles') == 0)
        {
            array_push($diasNoLaborablesDeLaSemana, '3');
        }
        if ($paseos->sum('jueves') == 0)
        {
            array_push($diasNoLaborablesDeLaSemana, '4');
        }
        if ($paseos->sum('viernes') == 0)
        {
            array_push($diasNoLaborablesDeLaSemana, '5');
        }
        if ($paseos->sum('sabado') == 0)
        {
            array_push($diasNoLaborablesDeLaSemana, '6');
        }
        $fechasEspeciales = FechaEspecial::Futuro()->get();
        foreach ($fechasEspeciales as $FechaEspecial)
        {

            $feemb = $FechaEspecial->embarcaciones;
            foreach ($feemb as $fe)
            {
                $embarcacionesDisponiblesPorFecha[$fe->nombre] = $fe->pivot->activa;
            }
            array_push($fechasEspecialesFinales, [
                'fecha'         => $FechaEspecial->fecha,
                'clase'         => $FechaEspecial->clase,
                'descripcion'   => $FechaEspecial->descripcion,
                'Embarcaciones' => $embarcacionesDisponiblesPorFecha,
            ]);
        }

        return $fechas = [
            'diasNoLaborables' => $diasNoLaborablesDeLaSemana,
            'minReservar'      => $minimoDiasAReservar,
            'TeporadaBaja'     => $TemporadaBaja,
            'fechasEspeciales' => $fechasEspecialesFinales
        ];

    }

    public function otrasVariables($fecha, Guard $autorizacion)
    {

        //$autorizacion->loginUsingId(1);
        //$autorizacion->logout();
        $fecha = Carbon::createFromFormat('Y-m-d', $fecha)->setTime(0, 0, 0);
        $diaDeSemana = $this->definirDiaDeSemana($fecha);
        $embarcaciones = $this->definirEmbarcacionesAutorizadas($diaDeSemana, $autorizacion);
        foreach ($embarcaciones as $embarcacion)
        {
            $respuestas['embarcaciones'][$embarcacion->id]['nombre'] = $embarcacion->nombre;
            $respuestas['embarcaciones'][$embarcacion->id]['abordajeMinimo'] = $embarcacion->abordajeMinimo;
            $respuestas['embarcaciones'][$embarcacion->id]['abordajeMaximo'] = $this->obtenerAbordajeMaximoDependiendoDeAutorizacion($embarcacion, $autorizacion);
            $respuestas['embarcaciones'][$embarcacion->id]['orden'] = $embarcacion->orden;

            $paseos = $this->definirPaseosAutorizados($embarcacion, $diaDeSemana, $autorizacion);
            foreach ($paseos as $paseo)
            {
                $respuestas['paseos'][$paseo->id]['nombre'] = $paseo->nombre;
                $respuestas['paseos'][$paseo->id]['horaDeSalida'] = $paseo->horaDeSalida;
                $respuestas['paseos'][$paseo->id]['orden'] = $paseo->orden;
                $respuestas['paseos'][$paseo->id]['publico'] = $paseo->publico;

                $precios = $paseo->tipoDePaseo->precios()->PrecioParaLaFecha($fecha);
                $respuestas['precios'][$paseo->id] = $precios;
                if ($paseo->reservas()->where('embarcacion_id', $embarcacion->id)->whereFecha($fecha)->count() == 0)
                {
                    $respuestas['pasajeros'][$embarcacion->id][$paseo->id]['reservados'] = 0;
                    $respuestas['pasajeros'][$embarcacion->id][$paseo->id]['disponibles'] = $respuestas['embarcaciones'][$embarcacion->id]['abordajeMaximo'];

                } else
                {
                    $pasajerosReservadosDeLaFechayEmbarcacion = $paseo->reservas()->where
                    ('embarcacion_id', $embarcacion->id)
                        ->PasajerosReservadosDeLaFecha($fecha, $embarcacion->id);
                    $respuestas['pasajeros'][$embarcacion->id][$paseo->id]['reservados'] = $pasajerosReservadosDeLaFechayEmbarcacion;
                    $respuestas['pasajeros'][$embarcacion->id][$paseo->id]['disponibles'] =(
                        $respuestas['embarcaciones'][$embarcacion->id]['abordajeMaximo'] -
                        $pasajerosReservadosDeLaFechayEmbarcacion)<0?0:(
                        $respuestas['embarcaciones'][$embarcacion->id]['abordajeMaximo'] -
                        $pasajerosReservadosDeLaFechayEmbarcacion);
                }
            }
        }

        return $respuestas;
    }

    /**
     * @param $fecha
     * @return string
     */
    public function definirDiaDeSemana($fecha)
    {
        $diaDeLaSemanaNumero = $fecha->dayOfWeek;
        switch ($diaDeLaSemanaNumero)
        {
            case 0:
                $diaDeSemana = 'domingo';
                break;
            case 1:
                $diaDeSemana = 'lunes';
                break;
            case 2:
                $diaDeSemana = 'martes';
                break;
            case 3:
                $diaDeSemana = 'miercoles';
                break;
            case 4:
                $diaDeSemana = 'jueves';
                break;
            case 5:
                $diaDeSemana = 'viernes';
                break;
            case 6:
                $diaDeSemana = 'sabado';
                break;
        }

        return $diaDeSemana;
    }

    /**
     * @param $diaDeSemana
     * @return mixed
     */
    public function definirEmbarcacionesAutorizadas($diaDeSemana, Guard $autorizacion)
    {
        if ($autorizacion->check() && $autorizacion->user()
                ->nivelDeAcceso->permiso->DisponibilidadTotalDeEmbarcaciones
        )
        {
            return Embarcacion::get(['id', 'nombre', 'abordajeMinimo',
                'abordajeMaximo', 'abordajeNormal', 'orden']);
        }

        return Embarcacion::wherePublico(1)->where($diaDeSemana, '1')->get(['id', 'nombre', 'abordajeMinimo',
            'abordajeMaximo', 'abordajeNormal', 'orden']);


    }

    /**
     * @param $embarcacion
     * @return mixed
     */
    public function obtenerAbordajeMaximoDependiendoDeAutorizacion($embarcacion, $autorizacion)
    {

        if ($autorizacion->guest() || !$autorizacion->user()->nivelDeAcceso->permiso->cuposExtra)
        {
            return $embarcacion->abordajeNormal;
        }
        if ($autorizacion->user()->nivelDeAcceso->permiso->cuposExtra)
        {
            return $embarcacion->abordajeMaximo;
        }

    }

    /**
     * @param $embarcacion
     * @param $diaDeSemana
     * @return mixed
     */
    public function definirPaseosAutorizados($embarcacion, $diaDeSemana, $autorizacion)
    {
        if ($autorizacion->check() && $autorizacion->user()
            ->nivelDeAcceso->permiso->DisponibilidadTotalDePaseos)
        {
            return $embarcacion->paseos()->get();
        }

        return $embarcacion->paseos()->wherePublico(1)->where($diaDeSemana, '1')->get();

    }

}