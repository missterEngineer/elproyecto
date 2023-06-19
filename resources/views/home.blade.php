<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <title>Inicio</title>
</head>
<body class="bodySystem">
    <div class="containerApp">
        @include("layouts/headerUser")

    
        <div class="containerHomeMsg">

            <div class="containerBienvenido">
                <span class="textBienvenidoInicio">
                    ¡Bienvenido al sistema de Inventario y Control de Artículos! Este sistema te permitirá 
                    llevar un registro detallado de tus articulo y stock, registrar los movimientos y hacer un 
                    seguimiento de los articulos
                </span>
            </div>

            

            <div class="containerTextInicio">
                <div class="containerImgTextInicio">
                    <img src="{{URL::asset('img/check.png')}}" >
                </div>
                <span class="spanTextInicio">Registra un artículo</span>
            </div>

            <div class="containerTextInicio">
                <div class="containerImgTextInicio">
                    <img src="{{URL::asset('img/check.png')}}" >
                </div>
                <span class="spanTextInicio">Asígnale un artículo a un funcionario</span>
            </div>
            
            <div class="containerTextInicio">
                <div class="containerImgTextInicio">
                    <img src="{{URL::asset('img/check.png')}}" >
                </div>
                <span class="spanTextInicio">Registro del historial del artículo</span>
            </div>

            <div class="containerTextInicio">
                <div class="containerImgTextInicio">
                    <img src="{{URL::asset('img/check.png')}}" >
                </div>
                <span class="spanTextInicio">Genera reportes en PDF</span>
            </div>

            <!-- <div class="containerTextInicio">
                <div class="containerImgTextInicio">
                    <img src="{{URL::asset('img/check.png')}}" >
                </div>
                <span class="spanTextInicio">Genera reportes en PDF</span>
            </div> -->

        </div>


        <footer class="footer">
            <span class="textFooter">Dirección de Tecnología de Información y Comunicación</span>
            <span class="textFooter">Todos los derechos reservados &copy 2023</span>
        </footer>


    </div>
</body>
@include("layouts/scripts")

</html>