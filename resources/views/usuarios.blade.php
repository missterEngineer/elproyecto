<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <title>Usuarios</title>
</head>
<body  class="bodySystem">
    <div class="containerApp">
        @include("layouts/headerUser")

        <main class="main" id="mainPage">

            <div class="contenedorBarraAccion">
                
                    <div class="contenedorFiltros"></div>


                    <div class="containerbtnModal">
                        <div class="divBtnContainer">
                            <button  id="idbtnopenModal" class="btn btn-primary BTN-OPEM">Registrar nuevo usuario</button>
                        </div>
                        <div class="divBtnContainer">
                            <button id="idbtnopenPDFUSER" class="btn btn-primary BTN-OPEM">Generar reporte PDF</button>
                        </div>
                    </div>
            </div>


            <div class="contenedotTables">

                <table class="table" id="tableViews">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CI</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">USERNAME</th>
                        <th scope="col">TIPO DE USUARIO</th>
                        <th scope="col">
                        
                        </th>
                        </tr>
                    </thead>
                    <tbody class="BODY-TABLES" id="tbodyUsers">
                        
                    </tbody>
                </table>

            </div>

        </main>

        <!-- MODAL -->

        <div id="contenedorModal" class="containaerGlobalModal">
            @include("modal/modalUsuarios")
        </div>


        <template id="template-users-table">
            <tr>
                <th scope="row" class="tdId"></th>
                <td class="tdCi"></td>
                <td class="tdName"></td>
                <td class="tdSurname"></td>
                <td class="tdUsername"></td>
                <td class="tdProfile"></td>
                <td>
                    <button type="button" class="btn btn-success BTN-OPEN-EDIT">Editar</button>
                    <button type="button" class="btn btn-danger BTN-DELETE-INFO">Eliminar</button>
                </td>
            </tr>
        </template>

    </div>
</body>
    @include("layouts/scripts")
</html>