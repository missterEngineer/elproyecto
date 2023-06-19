<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inicio</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    </head>
    <body>

    <div class="containerApp">

      <header class="headerInicio">
          <h1 class="titleSystemHeaderInicio">Sistema de Inventario y Control de Artículos</h1>
      </header>

      <div class="contenedorLogin">
        <div class="contenedorFormLogin">
            <div class="contenedorFormLogin">
                <div class="headerFormLogin">
                    <div class="contenedorspaceImgFormLogin">
                        <div class="contenedorImgLogin">
                            <img src="{{URL::asset('img/icons8-account-96.png')}}" class="imgLogin">
                        </div>
                    </div>
                    <h2 class="titleLogin">Iniciar sesión</h2>
                </div>
            </div>
            <form method="POST" action={{ route("login") }} class="formLogin">

                {{ csrf_field() }}

                <div class="contenedorInput">
                    <label>Nombre de Usuario</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="containerError">
                    {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="contenedorInput">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="containerError">
                    {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="contenedorBtnForm">
                    <input type="submit" class="btn btn-primary" value="Iniciar Sesión">
                </div>
            </form>
        </div>    
      </div>

        

    <footer class="footer">
        <span class="textFooter">Dirección de Tecnología de Información y Comunicación</span>
        <span class="textFooter">Todos los derechos reservados &copy 2023</span>
    </footer>

    </div>
    </body>
</html>
