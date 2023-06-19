<div class="containerModalAsig">
    <form class="formModalAsig">
        <h1 class="titleFormRegisterArticle">Registro de recepción de articulo</h1>

        <input type="text" class="inputHidden" id="asigId">
        <input type="text" class="inputHidden" id="returnPersonaId">
        <input type="text" class="inputHidden" id="returnObj">
    
        <div class="form-group col-md-6">
            <label>Codigo</label>
            <input type="text" class="form-control" id="returnCod" disabled>
        </div>
        <div class="form-group col-md-6">
            <label>Nombre</label>
            <input type="text" class="form-control" id="returnNombre" disabled>
        </div>
        <div class="form-group col-md-6">
            <label>Marca</label>
            <input type="text" class="form-control" id="returnMarca" disabled>
        </div>
        <div class="form-group col-md-6">
            <label>Categoria</label>
            <input type="text" class="form-control" id="returnCategoria" disabled>
        </div>
        <div class="form-group">
            <label>Descripcion</label>
            <textarea class="form-control" id="returnDescripcion" rows="5" disabled></textarea>
        </div>

        <div class="containerReINfo">

            <h2 class="subTitleFormModal">Funcionario</h2>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label>nombre<span class="spanOptionalUtiliti">(S)</span></label>
                    <input type="text" class="form-control" id="returnPersonaNombre" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Apellido<span class="spanOptionalUtiliti">(S)</span></label>
                    <input type="text" class="form-control" id="returnPersonaApellido" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label>ci</label>
                    <input type="text" class="form-control" id="returnPersonaCi" disabled>
                </div> 
            </div>

            <div class="form-row">
                <label>Dirección</label>
                <input type="text" class="form-control" id="returnPersonaDireccion" disabled>
            </div>

        </div>

        <div class="containerModalInfoStaff">

            <div class="form-row">
                <label>Unidades a asignar</label>
                <input type="number" class="form-control" id="returnPersonaUds" min="1" max="100" value="1">
                <span class="spanTextCountTotal"></span>
                <span class="spanErrorInput" id="spanReturnFuncionarioUds"></span>
            </div>
           
            <div class="form-group">
                <label>Observación</label>
                <textarea class="form-control" id="returnObservacion" rows="5"></textarea>
                <span class="spanErrorInput" id="spanObservacionReturne"></span>
            </div>

            <div class="containerBtnsForm">
                <input type="submit" value="Registrar recepción" class="btn btn-primary BTN-SEND-RETURNE btnLeftMargin" id="btnReturneModalA">
                <button class="btn btn-danger BTN-CLOSE-MODAL" id="btnCancelReturneModalA">Cancelar</button>
            </div>

        </div>
        
    </form>
</div>