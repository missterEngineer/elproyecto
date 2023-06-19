<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Auditoria</title>
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
    <img src="{{asset('img/CEBM1.jpeg')}}" style="max-height:100px; max-width:100px; text-align:left; ">
    <h3 class="text-center">Reporte de Auditoria</h3>    
    </div>
</header>
<body>
    <div>
        <table id="data" class="table table-striped">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Acción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($log as $logs)
                <tr>
                    <td>{{$logs->username}}</td>
                    <td>{{$logs->action}}</td>
                    <td>{{$logs->date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>

