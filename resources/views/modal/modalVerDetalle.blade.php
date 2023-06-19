<div class="containerModalAsig">
    <div class="formModalAsig">
    
        <div class="form-group col-md-6">
            <label>Codigo</label>
            <input type="text" class="form-control" id="asigCod" disabled>
        </div>
        <div class="form-group col-md-6">
            <label>Nombre</label>
            <input type="text" class="form-control" id="asigNombre" disabled>
        </div>
        <div class="form-group col-md-6">
            <label>Marca</label>
            <input type="text" class="form-control" id="asigMarca" disabled>
        </div>
        <div class="form-group col-md-6">
            <label>Categoria</label>
            <input type="text" class="form-control" id="asigCategoria" disabled>
        </div>

        <div class="form-group col-md-6">
            <label>Unidades registradas</label>
            <input type="number" class="form-control" id="asigUds" disabled>
        </div>
        <div class="form-group col-md-6">
            <label>Unidades disponibles</label>
            <input type="number" class="form-control" id="asigUdsDisponibles" disabled>
        </div>

        <div class="form-group">
            <label>Descripcion</label>
            <textarea class="form-control" id="asigDescripcion" rows="5" disabled></textarea>
        </div>

        <div class="containerModalInfoStaff">
            
            <h2 class="subTitleFormModal">Información del receptor</h2>

            <form>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>nombre<span class="spanOptionalUtiliti">(S)</span></label>
                        <input type="text" class="form-control" id="asigPersonaNombre" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Apellido<span class="spanOptionalUtiliti">(S)</span></label>
                        <input type="text" class="form-control" id="asigPersonaApellido" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>ci</label>
                        <input type="text" class="form-control" id="asigPersonaCi" disabled>
                    </div>
                </div>

                <div class="form-row">
                    <label>Cargo</label>
                    <input type="text" class="form-control" id="asigPersonaCargo" disabled>
                </div>


                <div class="form-row">
                    <label>Dirección</label>
                    <input type="text" class="form-control" id="asigPearsonaCargo" disabled>
                </div>

                <div class="form-row">
                    <label>Unidades a asignar</label>
                    <input type="number" class="form-control" id="asigPersonaUds" disabled>
                </div>

                <div class="separador"></div>

                <div class="form-group">
                    <label>Observación</label>
                    <textarea class="form-control" id="observacion" rows="5" disabled></textarea>
                </div>

                <div class="form-row">
                    <label>Fecha</label>
                    <input type="date" class="form-control" id="asigPersosaUds" min="1" max="100" value="1">
                </div>

                <div class="containerBtnsForm">
                    <button class="btn btn-danger BTN-CLOSE-MODAL" id="btnCancelAsigModal">Cerrar</button>
                </div>

            </form>

        </div>
        
    </div>
</div>