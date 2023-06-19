<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte General de Visitas</title>
    <link rel="stylesheet" href="{{asset ('css/app.css')}}">
    <style>
    body {
    margin: 0;
    font-family:'Times New Roman', Times, serif;
    color: #212529;
    background-color: #fff;
    }
    table{
    border-collapse:collapse;
	text-align:left;
    margin-top: 10px;
    }
    h3{
    margin-top: -50;
    text-align:center;
    }
    </style>
</head>
<header>
    <div>
    <img src="{{asset('img/cropped-logo-CEBM-removebg-preview.png')}}" style="max-height:100px; max-width:100px; text-align:left; ">
    <h3 class="text-center">Reporte General de Visitas</h3>    
    </div>
</header>
<body>
    <div>
        <table id="data" class="table table-striped">
            <thead>
                <tr>
                    <th>C.I</th>
                    <th>Nombre y Apellido</th>
                    <th>Fecha y Hora de Entrada</th>
                    <th>Motivo</th>
                    <th>Departamento</th>
                    <th>Persona a Visitar</th>
                    <th>Fecha y Hora de Salida</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitas as $visita)
                <tr>
                    <td>{{$visita->cedula}}</td>
                    <td>{{$visita->nombre . " " . $visita->apellido}}</td>
                    <td>
                        {{$visita->fecha_entrada}}
                        {{$visita->hora_entrada}}
                    </td>
                    <td>{{$visita->motivo}}</td>
                    <td>{{$visita->nombre_departamento}}</td>
                    <td>{{$visita->persona_lugar}}</td>
                    <td>
                        {{$visita->fecha_salida}}
                        {{$visita->hora_salida}}
                    </td>
                    <td>{{$visita->observaciones}}</td>
                </tr>
                @endforeach
        </table>
    </div>

</body>
</html>

