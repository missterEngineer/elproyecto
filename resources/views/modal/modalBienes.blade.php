<div class="containerModal">

    <form id="formUsers" class="formModal">
        <h1 class="titleFormRegisterArticle">Registro de articulo</h1>
        <div class="contenedorInput">
            <label>Nombre</label>
            <input type="text" id="formName" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="spanErrorInput" id="spanNameBien"></span>
        </div>
        <div class="contenedorInput">
            <label>Codigo</label>
            <input type="text" id="formCod" name="cod" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" >
            <span class="spanErrorInput" id="spanCodNameBien"></span>
        </div>
        <div class="contenedorInput">
            <label>Unidades</label>
            <input type="number" id="formUds" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" min="1" max="100" value="1">
            <span class="spanErrorInput" id="spanCodUdsBien"></span>
        </div>
        <div class="contenedorInput">
            <label>Marca</label>
            <input type="text" id="formMarca" name="brand" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="spanErrorInput" id="spanMarcaBien"></span>
        </div>
        <div class="contenedorInput">
            <label>Categoria</label>
            <select class="form-control" id="FormCategorias" aria-label="Default select example">
                <option selected>Open this select menu</option>
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
            <span class="spanErrorInput" id="spanCategoriaBien"></span>
        </div>

        <div class="contenedorInput">
            <label class="form-label" for="textAreaExample">Descripcion</label>
            <textarea class="form-control" id="Formdescripcion" rows="5"></textarea>
            <span class="spanErrorInput" id="spanDescripcionBien"></span>
        </div>
        
        <div class="containerBtnsForm">
            <input type="submit" value="Crear" id="btnSendModal" class="btn btn-primary btnLeftMargin" >
            <button id="idbtnCloseModal" class="btn btn-danger BTN-CLOSE-MODAL">Cancelar</button>
        </div>
    </form>

    <form id="formUsersEdit" class="formModal">
    <input type="text" class="inputHidden" id="editObjId">
    <div class="contenedorInput">
            <label>Codigo</label>
            <input type="text" id="editFormCod"  class="form-control" aria-describedby="emailHelp" placeholder="Enter email" disabled>
            <span class="spanErrorInput" id="spanCodNameBienEdit"></span>
        </div>
        <div class="contenedorInput">
            <label>Unidades</label>
            <input type="number" id="EditformUds" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" disabled>
            <span class="spanErrorInput"></span>
        </div>
        <div class="contenedorInput">
            <label>Nombre</label>
            <input type="text" id="editFormName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="spanErrorInput" id="spanNameBienEdit"></span>
        </div>
        <div class="contenedorInput">
            <label>Marca</label>
            <input type="text" id="editFormMarca" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="spanErrorInput" id="spanMarcaBienEdit"></span>
        </div>
        <div class="contenedorInput">
            <label>Categoria</label>
            <select class="form-control" id="editFormCategoria" aria-label="Default select example">
                < <option selected>Open this select menu</option>
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
            <span class="spanErrorInput" id="spanCategoriaBienEdit"></span>
        </div>

        <!-- <div class="contenedorInput">
            <label>Estado del articulo</label> -->
            <!-- <span class="spanExpEstado"></span> -->
            <!-- <select class="form-control" id="editFormState" aria-label="Default select example">
                <option value="1">LIBRE</option>
                <option value="3">NO DISPONIBLE</option>
            </select> -->
        <!-- </div>  -->

        <div class="contenedorInput">
            <label class="form-label" for="textAreaExample">Descripcion</label>
            <textarea class="form-control" id="editFormText" rows="5"></textarea>
            <span class="spanErrorInput" id="spanDescripcionBienEdit"></span>
        </div>
        
        

        <div class="containerBtnsForm">
            <input type="submit" value="Crear" class="btn btn-primary btnLeftMargin" id="btnUpdateModal">
            <button id="idbtnCloseModalEdit" class="btn btn-danger BTN-CLOSE-MODAL">Cancelar</button>
        </div>
    </form>

</div>

