<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <title>Bitácora</title>
</head>
<body class="bodySystem">
    <div class="containerApp">
        @include("layouts/headerUser")

        <main class="main" id="mainPage">

        <div class="contenedorBarraAccion">
                <div class="contenedorFiltros">


                    <div class="containerInputsDateFilter">

                        <div class="containerDateFilter">
                            <label class="labelDateFilter">Fecha mínima</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" id="inputFilterDateBefore"> 
                        </div>

                        <div class="containerDateFilter">
                            <label class="labelDateFilter">Fecha máxima</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" id="inputFilterDateAfter">
                        </div>

                    </div>
                   
                    <div class="contenerotBtnsDateFiltros" id="btns-filters">
                        <button class="btn btn-primary" id="btnSendFilterDate">Buscar</button>
                        <button class="btn btn-secondary" id="btnReSetFilterDate">Limpiar</button>
                    </div>

                </div>

                <div class="containerbtnModal">
                    <div class="divBtnContainer">
                        <button  id="PDF-log" class="btn btn-primary BTN-OPEM">Generar reporte PDF</button>
                    </div>
                </div>
        </div>



            
            <div class="contenedotTables">
                <table class="table" id="tableViews">
                    <thead>
                        <tr>
                            <th scope="col">ACCION</th>
                            <th scope="col">USUARIO</th>
                            <th scope="col">FECHA</th>
                        </tr>
                    </thead>
                    <tbody class="BODY-TABLES" id="tbodyBienes">
                        
                    </tbody>
                </table>
            </div>

        </main>

    

        <template id="template-Log-table">
            <tr>
                <td scope="row"  class="tbAccion"></td>
                <td class="tdUser"></td>
                <td class="tdDate"></td>
            </tr>
        </template>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
@include("layouts/scripts")

</html>