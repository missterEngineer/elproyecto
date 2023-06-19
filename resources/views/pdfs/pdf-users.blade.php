<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de usuarios</title>
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
    <h3 class="text-center">Reporte de usuarios</h3>    
    </div>
</header>
<body>
    <div>
        <table id="data" class="table table-striped">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nombre de usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->ci}}</td>
                    <td>{{$user->names}}</td>
                    <td>{{$user->surnames}}</td>
                    <td>{{$user->username}}</td>

                </tr>
                @endforeach
        </table>
    </div>

</body>
</html>