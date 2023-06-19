<div class="containerModalHistoryArticulos">

    <div class="headerContainerModalHistoryArticulos">
        
        <h1 class="titleFormRegisterArticle2">Información del articulo</h1>

        <div class="form-group col-md-10">
            <div class="form-group col-md-6">
                <label>Código</label>
                <input type="text" class="form-control" id="returnCodH" disabled>
            </div>
            <div class="form-group col-md-6">
                <label>Nombre</label>
                <input type="text" class="form-control" id="asigNombreH" disabled>
            </div>
            <div class="form-group col-md-6">
                <label>Marca</label>
                <input type="text" class="form-control" id="asigMarcaH" disabled>
            </div>
            <div class="form-group col-md-6">
                <label>categoría</label>
                <input type="text" class="form-control" id="asigCategoriaH" disabled>
            </div>
            <div class="form-group col-md-6">
                <label>Unidades registradas</label>
                <input type="number" class="form-control" id="asigUdsH" disabled>
            </div>
            <div class="form-group col-md-6">
                <label>Unidades disponibles</label>
                <input type="number" class="form-control" id="asigUdsDisH" disabled>
            </div>
            <!-- <div class="form-group">
                <label>Descripcion</label>
                <textarea class="form-control" id="asigDescripcion" rows="5" disabled></textarea>
            </div> -->

        </div>
    
    </div>

    <div class="contenedorTablesModalHistoryArticulos">

        <table class="table" id="tableViews">
            <thead>
                <tr>
                    <th scope="col">CI</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">UNIDADES</th>
                    <th scope="col">OBSERVACION</th>
                    <th scope="col">FECHA</th>
                </tr>
            </thead>
            <tbody class="BODY-TABLES" id="tbodyHistory">
                            
            </tbody>
        </table>

    </div>

    <div class="containermodalBTNHistory">
        <button class="btn btn-danger" id="btn-closehistory">Cerrar</button> 
        <button class="btn btn-primary BTN-OPEM" id="PDF-history">Generar reporte PDF</button>
    </div>


    <template id="template-articulos-history">
        <tr>
            <td scope="row"  class="tbHCi"></td>
            <td class="tdHname"></td>
            <td class="tdHDireccion"></td>
            <td class="tdHUds"></td>
            <td class="tdHObservacion-1"></td>
            <td class="tdHFecha-1"></td>
        </tr>
    </template>

</div>