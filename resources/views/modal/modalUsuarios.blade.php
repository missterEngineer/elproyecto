<div class="containerModal">
    <form id="formUsers" class="formModal">
        <div class="contenedorInput">
            <label>Nombre<span class="spanOptionalUtiliti">(S)</span></label>
            <input type="text" id="formName" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter nombre">
            <span class="spanErrorInput" id="spanName"></span>
        </div>
        <div class="contenedorInput">
            <label>Apellido<span class="spanOptionalUtiliti">(S)</span></label>
            <input type="text" id="formSurname" name="surname" class="form-control" aria-describedby="emailHelp" placeholder="Enter apellido">
            <span class="spanErrorInput" id="spanSurname"></span>
        </div>
        <div class="contenedorInput">
            <label>Cedula de identidad</label>
            <input type="text" id="formCi" name="ci" class="form-control" aria-describedby="emailHelp" placeholder="Enter cedula">
            <span class="spanErrorInput" id="spanCi"></span>
        </div>
        <div class="contenedorInput">
            <label>Nombre de usuario</label>
            <input type="text" id="formUsername" name="username" class="form-control" aria-describedby="emailHelp" placeholder="Enter nombre de usuario">
            <span class="spanErrorInput" id="spanUsername"></span>
        </div>
        <div class="contenedorInput">
            <label>Contraseña</label>
            <input type="password" id="formPassword" name="password" class="form-control" aria-describedby="emailHelp" placeholder="Enter contraseña">
            <span class="spanErrorInput" id="spanPassword"></span>
        </div>
        <div class="contenedorInput">
            <label>Confirmación Contraseña</label>
            <input type="password" id="passwordConfirmation" name="passwordConfirmation" class="form-control" aria-describedby="emailHelp" placeholder="Enter repita su contraseña">
            <span class="spanErrorInput" id="spanPasswordConfir"></span>
        </div>

        <div class="containerBtnsForm">
            <input type="submit" value="Crear" id="btnSendModal" class="btn btn-primary btnLeftMargin">
            <button class="btn btn-danger BTN-CLOSE-MODAL" id="btnUserModalCancel">Cancelar</button>
        </div>

    </form>


    <form id="formUsersEdit" class="formModal">

        <input type="text" id="formID" class="form-control inputOculto" id="exampleInputEmail">

        <div class="contenedorInput">
            <label>Cedula de identidad</label>
            <input type="text" id="formCiEdit" class="form-control" aria-describedby="emailHelp" disabled>
            <span class="spanErrorInput" id="spanCiEdit"></span>
        </div>
        <div class="contenedorInput">
            <label>Nombre<span class="spanOptionalUtiliti">(S)</span></label>
            <input type="text" id="formNameEdit" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="spanErrorInput" id="spanNameEdit"></span>
        </div>
        <div class="contenedorInput">
            <label>Apellido<span class="spanOptionalUtiliti">(S)</span></label>
            <input type="text" id="formSurnameEdit" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="spanErrorInput" id="spanSurnameEdit"></span>
        </div>
        <div class="contenedorInput">
            <label>Nombre de usuarioario</label>
            <input type="text" id="formUsernameEdit" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="spanErrorInput" id="spanUsernameEdit"></span>
        </div>

        <!-- <div class="contenedorCheckeInput">

        </div> -->

        <div class="contenedorInput">
        
        </div>

        <div class="contenedorInput">
            <label>Contraseña</label>
            <input type="password" id="formPasswordEdit" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="spanErrorInput" id="spanPasswordEdit"></span>
        </div>
        <div class="contenedorInput">
            <label>Confirmación Contraseña</label>
            <input type="password" id="formPasswordConfirEdit" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="spanErrorInput" id="spanPasswordConfirEdit"></span>
        </div>

        <div class="containerBtnsForm">
            <input type="submit" value="Actualizar" id="btnUpdateModal" class="btn btn-primary btnLeftMargin">
            <button class="btn btn-danger BTN-CLOSE-MODAL">Cancelar</button>
        </div>

    </form>
</div>