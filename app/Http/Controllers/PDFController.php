<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visita;
use App\Visitante;

class PDFController extends Controller{


    public function reporteGeneral(Request $request){
        $request->validate([
            'fecha_inicio'  => 'required|date',
            'fecha_termina' => 'required|date'
        ]);

        $visitas = Visita::whereBetween('fecha_entrada', [$request['fecha_inicio'], $request['fecha_termina']])
        ->whereNotNull('fecha_salida')
        ->whereNotNull('hora_salida')
        ->join('registro_visitantes', 'registro_visitantes.cedula', '=', 'registro_visitas.cedula')
        ->join('departamentos', 'departamentos.id_depart', '=', 'registro_visitas.id_depart')
        ->leftJoin('lugar', 'lugar.id_lugar', '=', 'registro_visitas.id_lugar')
        ->get();

        $pdf = \PDF::loadview('reporte-pdf', compact('visitas'));
        return $pdf->setPaper('letter', 'landscape')->stream('reporte-pdf');

    }

}
