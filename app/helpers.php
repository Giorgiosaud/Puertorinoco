<?php
function obtenerDiasNoLaborables($embarcaciones)
{
    $respuesta = [1, 2, 3, 4, 5, 6, 0];
    $indisponibilidadSemanal = [];
    foreach ($embarcaciones as $embarcacion) {
        if ($embarcacion->lunes) {
            $respuesta = array_diff($respuesta, [1]);
        }
        if ($embarcacion->martes) {
            $respuesta = array_diff($respuesta, [2]);
        }
        if ($embarcacion->miercoles) {
            $respuesta = array_diff($respuesta, [3]);
        }
        if ($embarcacion->jueves) {
            $respuesta = array_diff($respuesta, [4]);
        }
        if ($embarcacion->viernes) {
            $respuesta = array_diff($respuesta, [5]);
        }
        if ($embarcacion->sabado) {
            $respuesta = array_diff($respuesta, [6]);
        }
        if ($embarcacion->domingo) {
            $respuesta = array_diff($respuesta, [0]);
        }

    }
    return ($respuesta);
}

function obtenerDiasLaborablesDesdeFechasEspeciales($fechasEspeciales)
{
    $diasLaborables = [];
    foreach ($fechasEspeciales as $fechaEspecial) {
        $fecha = [$fechaEspecial->fecha->year, $fechaEspecial->fecha->month, $fechaEspecial->fecha->day];
        foreach ($fechaEspecial->embarcaciones as $embarcacion) {
            if ($embarcacion->pivot->activa) {
                array_push($fecha, 'inverted');
                array_push($diasLaborables, $fecha);
                break;
            }
        }
    }
    return $diasLaborables;
}

function obtenerDiasNoLaborablesDesdeFechasEspeciales($fechasEspeciales)
{
    $diasNoLaborables = [];
    foreach ($fechasEspeciales as $fechaEspecial) {
        $fecha = $fechaEspecial->fecha;
        array_push($diasNoLaborables, $fecha);
        foreach ($fechaEspecial->embarcaciones as $embarcacion) {
            if ($embarcacion->pivot->activa) {
                $diasNoLaborables = array_diff($diasNoLaborables, [$fecha]);
                break;
            }
        }
    }
    $reformatOutput=[];
    foreach($diasNoLaborables as $dia){
        array_push($reformatOutput,[$dia->year,$dia->month,$dia->day]);
    }
    return $reformatOutput;

}