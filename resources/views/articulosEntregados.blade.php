<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <title>Articulos entregados</title>
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
                            <option value="3">Dirección</option>
                            <option value="4">Funcionario</option>
                        </select>
                    </div>
 
                    <!-- INPUT FILTER CODE -->
                    <div class="conteendorInputFiltros">
                        <label class="labelInputFiltro">Código del articulo</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" id="inputFilterCod">   
                    </div>

                    <!-- INPUT FILTER CATEGORIES -->
                    <div class="conteendorInputFiltros">
                        <label class="labelInputFiltro">categoría del articulo</label>
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

                    <!-- input FILTER DIRECCION -->
                    <div class="conteendorInputFiltros">
                        <label class="labelInputFiltro">Dirección</label>
                        <select class="form-control" aria-label="Default select example" id="selectFilterDireccion" >
                            <option value="1">DIRECCION DEL DESPACHO</option>
                            <option value="2">UNIDAD DE AUDITORIA INTERNA</option>
                            <option value="3">OFICINA DE ATENCION AL CIUDADANO</option>
                            <option value="4">DIRECCION DE COMUNICACION Y RELACIONES PUBLICAS</option>
                            <option value="5">DIRECCION GENERAL</option>
                            <option value="6">DIRECCION DE ADMINISTRACION Y FINANZAS</option>
                            <option value="7">DIRECCION DE CONSULTORIA JURIDICA</option>
                            <option value="8">DIRECCION DE PLANIFICACION, PRESUPUESTO Y CONTROL DE GESTION</option>
                            <option value="9">DIRECCION DE TALENTO HUMANO</option>
                            <option value="10">DIRECCION DE TECNOLOGIA DE INFORMACION Y COMUNICACIONES</option>
                            <option value="11">DIRECCION DE CONTROL DE LA ADMINISTRACION CENTRAL Y OTRO PODER</option>
                            <option value="12">DIRECCION DE CONTROL DE LA ADMINISTRACION DESCENTRALIZADA</option>
                            <option value="13">DIRECCION DE DETERMINACION DE RESPONSABILIDAD ADMINISTRATIVA</option>
                        </select>
                    </div>

                    <!-- INPUT FILTER FUNCIONARIO -->
                    <div class="conteendorInputFiltros">
                        <label class="labelInputFiltro">CI del Funcionario</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" id="inputFilterCIFuncionaro">   
                    </div>

                    <div class="contenerotBtnsFiltros" id="btns-filters">
                        <button class="btn btn-primary" id="btnSendFilter">Buscar</button>
                        <button class="btn btn-secondary" id="btnReSetFilter">Limpiar</button>
                    </div>

                </div>

                <div class="containerbtnModal">
                </div>
            </div>
            
            <div class="contenedotTables">
                <table class="table" id="tableReturn">
                    <thead>
                        <tr>
                        <th scope="col">CODIGO</th>
                        <th scope="col">ARTICULO</th>
                        <th scope="col">MARCA</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">UNIDADES</th>
                        <th scope="col">DIRECCION</th>
                        <th scope="col">CI</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">ACCIONES</th>
                        <th scope="col">
                        
                        </th>
                        </tr>
                    </thead>
                    <tbody class="BODY-TABLES" id="tbodyBienes">
                        
                    </tbody>
                </table>
            </div>

        </main>

        
            
        <!-- MODAL -->
        <div id="contenedorModalReturne" class="containaerGlobalModalAsing">
            @include("modal/modalReturne")
        </div>

        <template id="template-articulos-table">
            <tr>
                <td scope="row" class="tbCodigo"></td>
                <td class="tdName"></td>
                <td class="tdMarca"></td>
                <td class="tdCategoria"></td>
                <td class="tdUnidades"></td>
                <td class="tdDirec"></td>
                <td class="tdCi"></td>
                <td class="tdFun"></td>
                <td class="tdCar"></td>
                <td class="tdFecha"></td>
                <td>
                    <!-- <button type="button" class="btn btn-info DETALLE">Ver detalle</button> -->
                    <button type="button" class="btn btn-primary BTN-RETURNE">Devolución</button>
                </td>
            </tr>
        </template>

    </div>

    <div id="modalDetalleArticulo" class="containaerGlobalModalAsing">
        @include("modal/modalVerDetalle")
    </div>
</body>
@include("layouts/scripts")

</html>