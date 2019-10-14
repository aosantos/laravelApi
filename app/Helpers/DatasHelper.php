<?php

use Carbon\Carbon;

function convertDate($date)
{
    return converteDate($date);
}

function converteDate($date)
{
    if ($date != '') {
        return Carbon::parse($date)->format('d/m/Y');
    } else {
        return '';
    }
}

function convertTime($date)
{
    return converteTime($date);
}

function converteTime($date)
{
    if ($date != '') {
        return Carbon::parse($date)->format('H:i');
    } else {
        return '';
    }
}

function converteDataCompleta($date)
{
    if ($date != '') {
        return Carbon::parse($date)->format('d/m/Y H:i:s');
    } else {
        return '';
    }
}

function convertDateBD($date)
{
    return converteDateBD($date);
}

function converteDateBD($date)
{
    if ($date != '') {
        $dia = substr($date, 0, 2);
        $mes = substr($date, 3, 2);
        $ano = substr($date, 6, 4);
        return $ano . '/' . $mes . '/' . $dia;
    } else {
        return '';
    }
}

function convertDateTimeBD($date)
{
    return converteDateTimeBD($date);
}

function converteDateTimeBD($date, $tempo = null)
{
    if ($date != '') {
        if ($tempo != null) {
            $dia = substr($date, 0, 2);
            $mes = substr($date, 3, 2);
            $ano = substr($date, 6, 4);
            $segundo = '00';
            return $ano . '/' . $mes . '/' . $dia . ' ' . $tempo . ':' . $segundo;
        } else {
            $dia = substr($date, 0, 2);
            $mes = substr($date, 3, 2);
            $ano = substr($date, 6, 4);
            $hora = substr($date, 10, 2);
            $minuto = substr($date, 13, 2);
            $segundo = '00';
            return $ano . '/' . $mes . '/' . $dia . ' ' . $hora . ':' . $minuto . ':' . $segundo;
        }
    } else {
        return '';
    }
}

function dateNow()
{
    $mytime = Carbon::now();
    return converteDate($mytime->toDateTimeString());
}

function dataHoje()
{
    return Carbon::now();
}

function somarDiasData($data, $dias)
{
    return $data->addDays($dias);
}

function toUpper($texto)
{
    return Illuminate\Support\Str::upper($texto);
}

function data1MaiorData2($data1, $data2)
{
    $dia1 = substr($data1, 0, 2);
    $mes1 = substr($data1, 3, 2);
    $ano1 = substr($data1, 6, 4);
    $dia2 = substr($data2, 0, 2);
    $mes2 = substr($data2, 3, 2);
    $ano2 = substr($data2, 6, 4);
    $first = Carbon::createFromDate($ano1, $mes1, $dia1);
    $second = Carbon::createFromDate($ano2, $mes2, $dia2);
    return ($first->gt($second));
}

function dataMaiorAtual($data)
{
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 2);
    $ano = substr($data, 6, 4);
    $first = Carbon::createFromDate($ano, $mes, $dia);
    $second = Carbon::now();
    return ($first->gt($second));
}

function convertHour($hour)
{
    if ($hour != '') {
        return substr($hour, 3, 5);
    } else {
        return '';
    }
}

function convertHourBD($hour)
{
    if ($hour != '') {
        return '0 ' . $hour . ':00';
    } else {
        return '';
    }
}
