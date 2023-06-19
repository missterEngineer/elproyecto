<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de artículo</title>
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
    .containerInfo{
        width: 90%;
        background: red;
        margin: auto;
    }
    .containerRow{
        width: 100%;
        height: 50px;
        background: green;
    }
    /* .containerTableHeader{
        border: solid 2px #000;
        font-weight: 600;
    }
 */
    .containerTableHeader2{
        background: none;
        border-style: none;
        border: solid #fff 1px;
        font-weight: 400;
    }
    </style>
</head>
<header>
    <div>
    <img src="{{asset('img/CEBM1.jpeg')}}" style="max-height:100px; max-width:100px; text-align:left; ">
    <h3 class="text-center">Reporte de artículo</h3>    
    </div>
</header>
<body>
    <div>

        <!-- <div class="containerInfo">

            <div class="containerRow">
                
            </div>

        </div> -->

        
            <table class="table table-striped containerTableHeader2">

                <tbody class="containerTableHeader2">
                    <tr class="containerTableHeader2">
                        <th class="containerTableHeader2"><strong>Codigo:</strong>  <span class="">{{$newObj->cod}}</span></th>
                        <th class="containerTableHeader2"><strong>Articulo:</strong> <span class="">{{$newObj->name}}</span></th>
                        <th class="containerTableHeader2"><strong>Marca:</strong> <span class="">{{$newObj->brand}}</span></th>
                    </tr>
                    <tr>
                        <th class="containerTableHeader2"><strong>Categoria:</strong> <span class="">{{$newObj->Category}}</th></th>
                        <th class="containerTableHeader2"><strong>Unidades:</strong> <span class="">{{$newObj->uds}}</span></th>
                        <th class="containerTableHeader2"><strong>Unidades disponibles:</strong> <span class="">{{$newObj->uds_available}}</span></th>
                    </tr>
                </tbody>

            </table>
        
        

        <table id="data" class="table table-striped">

                <thead>
                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Unidades</th>
                        <th>Observacion</th>
                        <th>Fecha</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($asigne as $h)
                    <tr>
                        <td>{{$h->ci}}</td>
                        <td>{{$h->funcionario}}</td>
                        <td>{{$h->departments}}</td>
                        <td>{{$h->uds}}</td>
                        <td>{{$h->assigne_observations}}</td>
                        <td>{{$h->date}}</td>
                    </tr>
                    @endforeach
            </tbody>
                
                   
        </table>


            
    </div>

</body>
</html>