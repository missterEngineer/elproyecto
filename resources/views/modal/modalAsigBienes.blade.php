<div class="containerModalAsig">
    <div class="formModalAsig">
        <input type="text" class="inputHidden" id="asigId">
        <input type="number" class="inputHidden" id="asigMaxUds">
        <h1 class="titleFormRegisterArticle">Registro de asignación de articulo</h1>

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


            <div class="containerSelectPerson">

                <span class="spanBuscadorFuncionario">Buscar un funcionario ya registrado</span>

                <form class="containerBuscardorFuncionario" id="formBuscadorFuncionario">

                    <div class="containerInputBuscardor">
                        <input type="text" class="form-control rounded" placeholder="CI" aria-label="Search" aria-describedby="search-addon" id="buscadorFuncionarioCi" />
                        <span class="spanErrorInput" id="spanFuncionarioBusqueda"></span>
                    </div>
                    <div class="containerBtnBuscardor">
                        <input type="submit" class="btn btn-info" id="buscadorFuncionarioBTN" value="Buscar">
                    </div>

                </form>

                <div class="contenedorTargetFuncionario" id="targetSelectFuncionario">
                    <div class="iconTargetFuncionario">
                        <img src="{{URL::asset('img/icons8-account-96.png')}}">
                    </div>

                    <div class="containerInfoFuncionario">
                        <span class="infoTargetFuncionario ciTargetFuncionario"></span>
                        <span class="infoTargetFuncionario nameTargetFuncionario"></span>
                        <span class="infoTargetFuncionario direccionTargetFuncionario"></span>
                    </div>

                    <div class="containerBtnTargetFuncionario">
                        <button type="button" class="btn btn-success" id="btnSelectFuncionario">Seleccionar</button>
                    </div>

                </div>
                
            </div>

            <form>

                <div class="form-row">
                    <input type="text" class="inputHidden" id="asigPersonaId">
                    <div class="col-md-4 mb-3">
                        <label>nombre<span class="spanOptionalUtiliti">(S)</span></label>
                        <input type="text" class="form-control" id="asigPersonaNombre">
                        <span class="spanErrorInput" id="spanFuncionarioNombre"></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Apellido<span class="spanOptionalUtiliti">(S)</span></label>
                        <input type="text" class="form-control" id="asigPersonaApellido">
                        <span class="spanErrorInput" id="spanFuncionarioApellido"></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>ci</label>
                        <input type="text" class="form-control" id="asigPersonaCi">
                        <span class="spanErrorInput" id="spanFuncionarioCi"></span>
                    </div>
                    
                </div>

                <div class="form-row">
                    <label>Cargo</label>
                    <input type="text" class="form-control" id="asigPersonaCargo">
                    <span class="spanErrorInput" id="spanFuncionarioCargo"></span>
                </div>


                <div class="form-row">
                    <label>Dirección</label>
                    <select class="form-control" id="asigPersonaDireccion" required>
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
                    <span class="spanErrorInput" id="spanFuncionarioDireccion"></span>
                </div>

                <div class="form-row">
                    <label>Unidades a asignar</label>
                    <input type="number" class="form-control" id="asigPersonaUds" min="1" max="100" value="1">
                    <span class="spanTextCountTotal"></span>
                    <span class="spanErrorInput" id="spanFuncionarioUds"></span>
                </div>

                <div class="separador"></div>

                <div class="form-group">
                    <label>Observación</label>
                    <textarea class="form-control" id="observacion" rows="5"></textarea>
                    <span class="spanErrorInput" id="spanFuncionarioObservacion"></span>
                </div>

                <div class="containerBtnsForm">
                    <input type="submit" value="Registrar" id="btnSendAsigModal" class="btn btn-primary BTN-SEND-ASIG btnLeftMargin" >
                    <button class="btn btn-danger BTN-CLOSE-MODAL" id="btnCancelAsigModal" >Cancelar</button>
                </div>

            </form>

        </div>
        
    </div>
</div>