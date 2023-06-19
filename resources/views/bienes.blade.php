<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <title>Articulos</title>
</head>
<body class="bodySystem">
    <div class="containerApp">
        @include("layouts/headerUser")

        <main class="main" id="mainPage">

            <div class="contenedorBarraAccion">
                <div class="contenedorFiltros">
                    <div class="contenedorSelectTypeFilter">
                        <label class="labelTables">Filtrar por</label>
                        <select class="form-control" id="selectFilter" aria-label="Default select example">
                            <option value="0" selected>Todos</option>
                            <option value="1">Código</option>
                            <option value="2">categoría</option>
                            <!-- <option value="3">Fecha</option> -->
                        </select>
                    </div>
 
                    <!-- INPUT FILTER CODE -->
                    <div class="conteendorInputFiltros">
                        <label class="labelInputFiltro">Código del articulo</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" id="inputFilterCod">   
                    </div>

                    <!-- INPUT FILTER CATEGORIES -->
                    <div class="conteendorInputFiltros">
                        <label class="labelInputFiltro">Categorias del articulo</label>
                        <select class="form-control" aria-label="Default select example" id="selectFilterCategories" >
                            <option value="1">HERRAMIENTAS</option>
                            <option value="2">UTILES DE OFICINA</option>
                            <option value="3">PERIFERICOS DE PC</option>
                            <option value="4">LAPTOPS Y ACCESORIOS</option>
                            <option value="5">IMPRESION</option>
                            <option value="6">COMPONENTES DE PC</option>
                            <option value="7">PERIFERICOS DE PC</option>
                            <option value="8">CABLES Y HUBS USB</option>
                            <option value="9">ALMACENAMIENTO</option>
                            <option value="10">CONECTIVIDAD Y REDES</option>
                            <option value="11">CAJAS Y ORGANIZADORES</option>
                        </select>
                    </div>

                    <!-- INPUT FILTER STATES -->

                    <!-- input FILTER DATE -->
                    <!-- <div class="conteendorInputFiltros">
                        <label class="labelInputFiltro">Fecha de registro</label>
                        <div class="container-inputFIlter-rows">
                            <input type="date" class="form-control" aria-describedby="emailHelp" id="inputFilterDateBefore"> 
                            -  
                            <input type="date" class="form-control" aria-describedby="emailHelp" id="inputFilterDateAfter">
                        </div>
                    </div> -->

                    <div class="contenerotBtnsFiltros" id="btns-filters">
                        <button class="btn btn-primary" id="btnSendFilter">Buscar</button>
                        <button class="btn btn-secondary" id="btnReSetFilter">Limpiar</button>
                    </div>

                </div>

                <div class="containerbtnModal">
                    <div class="divBtnContainer">
                        <button  id="idbtnopenModal" class="btn btn-primary BTN-OPEM">Registro de Articulos</button>
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
                            <th scope="col">CODIGO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">MARCA</th>
                            <th scope="col">CATEGORIA</th>
                            <th scope="col">UNIDADES</th>
                            <th scope="col">UNIDADES DISPONIBLES</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="BODY-TABLES" id="tbodyBienes">
                        
                    </tbody>
                </table>
            </div>

        </main>

        
            
        <!-- MODAL -->
        <div id="contenedorModal" class="containaerGlobalModal">
            @include("modal/modalBienes")
        </div>

        <!-- MODAL ASIGNAL BIENES -->
        <div id="contenedorModalAsing" class="containaerGlobalModalAsing">
            @include("modal/modalAsigBienes")
        </div>


        <div id="contenedorModalHistory" class="containaerGlobalModalHistory">
            @include("modal/modalHistoryArticulos")
        </div>

        <template id="template-Bien-table">
            <tr>
                <td scope="row"  class="tbCodigo"></td>
                <td class="tdName"></td>
                <td class="tdMarca"></td>
                <td class="tdCategoria"></td>
                <td class="tdUds"></td>
                <td class="tdUdsCount"></td>
                <td class="tdFecha"></td>
                <td>
                    <button type="button" class="btn btn-info BTN-HISTORY">Historial</button>
                    <button type="button" class="btn btn-primary BTN-ASING">Asignar</button>
                    <button type="button" class="btn btn-success BTN-OPEN-EDIT">Actualizar</button>
                </td>
            </tr>
        </template>

    </div>
</body>

@include("layouts/scripts")

</html>