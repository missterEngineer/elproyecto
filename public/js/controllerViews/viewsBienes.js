import sendFecth from "../httpFunction/sendFecth.js";




const fragment = document.createDocumentFragment();


const spanErrorNombre = document.getElementById("spanNameBien");
const spanErrorCod = document.getElementById("spanCodNameBien");
const spanErrorMarca = document.getElementById("spanMarcaBien");
const spanErrorCategoria = document.getElementById("spanCategoriaBien");
const spanErrorDescripcion = document.getElementById("spanDescripcionBien");

const spanErrorCodEdit = document.getElementById("spanCodNameBienEdit");
const spanErrorNombreEdit = document.getElementById("spanNameBienEdit");
const spanErrorMarcaEdit = document.getElementById("spanMarcaBienEdit");
const spanErrorCategoriaEdit = document.getElementById("spanCategoriaBienEdit");
const spanErrorDescripcionEdit = document.getElementById("spanDescripcionBienEdit");
const spanErrorUds = document.getElementById("spanCodUdsBien");


// MODAL ASIG BIENES 




export const getBienes = async () =>{
    try {
        
        const templateTableBien = document.getElementById("template-Bien-table").content;
        const res = await fetch("api/getbienes");
        const resObj = await res.json();


        resObj.forEach(element => {

            templateTableBien.querySelector(".tbCodigo").textContent = element.cod;
            templateTableBien.querySelector(".tdName").textContent = element.name;
            templateTableBien.querySelector(".tdMarca").textContent = element.brand;
            templateTableBien.querySelector(".tdCategoria").textContent = element.Category;
            templateTableBien.querySelector(".tdUds").textContent = element.uds;
            templateTableBien.querySelector(".tdUdsCount").textContent = element.uds_available;
            templateTableBien.querySelector(".tdFecha").textContent = element.date;
            templateTableBien.querySelector(".BTN-HISTORY").dataset.id = element.id;
            templateTableBien.querySelector(".BTN-ASING").dataset.info = JSON.stringify(element);
            templateTableBien.querySelector(".btn-success").dataset.info = JSON.stringify(element);
            
            
            const clone = templateTableBien.cloneNode(true);
          
            if(element.uds_available == 0) clone.querySelector(".BTN-ASING").classList.add("disableClass");


            fragment.appendChild(clone);
        });

        document.getElementById("tbodyBienes").appendChild(fragment);


        
    } catch (error) {
        console.log(error)
    }
};

export const onUpdateDomTableBienes = async () =>{

    const childrenNode = document.getElementById("tbodyBienes")

    while (childrenNode.firstChild) {
        childrenNode.removeChild(childrenNode.firstChild)
    }

    getBienes();

};

const validateFormBienes = ({nombre, codigo, marca, categoria, descripcion, uds}, showEdit) =>{

    if(!showEdit){
        spanErrorNombre.textContent = "";
        spanErrorCod.textContent = "";
        spanErrorMarca.textContent = "";
        spanErrorCategoria.textContent = "";
        spanErrorDescripcion.textContent = "";
        spanErrorUds.textContent = "";
    }


    if(showEdit){
        spanErrorCodEdit.textContent = ""
        spanErrorNombreEdit.textContent = "";
        spanErrorMarcaEdit.textContent = "";
        spanErrorCategoriaEdit.textContent = "";
        spanErrorDescripcionEdit.textContent = "";
    }
   

    let inputValidate = true;

    if(nombre == null || nombre.trim() == "" || nombre.length <= 3){
        !showEdit ? 
            spanErrorNombre.textContent = "Campo invalido"
            :
            spanErrorNombreEdit.textContent = "Campo invalido";

        inputValidate = false;
    }

    if(codigo == null || codigo.trim() == "" || codigo.length <= 2){
        !showEdit ? 
            spanErrorCod.textContent = "Campo invalido"
            :
            spanErrorCodEdit.textContent = "Campo invalido"
        inputValidate = false;
    }

    if(!showEdit){
        if(uds == null || uds < 1 || uds > 100 || !/^[0-9]*$/.test(uds)){
            spanErrorUds.textContent = "Campo invalido"
            inputValidate = false;
        }
    }

    

    if(marca == null || marca.trim() == "" || marca.length <= 3){
        !showEdit ? 
            spanErrorMarca.textContent = "Campo invalido"
            :
            spanErrorMarcaEdit.textContent = "Campo invalido"

        inputValidate = false;
    }

    if(categoria == null || categoria.trim() == ""){
        !showEdit ? 
            spanErrorCategoria.textContent = "Campo invalido"
            :
            spanErrorCategoriaEdit.textContent = "Campo invalido";
        inputValidate = false;
    }

    if(descripcion == null || descripcion.trim() == "" || descripcion.length <= 3){
        !showEdit ? 
            spanErrorDescripcion.textContent = "Campo invalido"
            :
            spanErrorDescripcionEdit.textContent = "Campo invalido";

        inputValidate = false;
    }

    return inputValidate;

};

export const openEditModalArticulo = (target) =>{

    const values = JSON.parse(target);

    document.getElementById("editObjId").value = values.id;
    document.getElementById("editFormCod").value = values.cod
    document.getElementById("editFormName").value = values.name
    document.getElementById("editFormMarca").value = values.brand
    document.getElementById("editFormCategoria").value = values.category_id
    document.getElementById("editFormText").value = values.description
    document.getElementById("EditformUds").value = values.uds

}

export const onUpdateArticulo = async (cd) =>{
    try {

        const data = {
            id: document.getElementById("editObjId").value,
            nombre: document.getElementById("editFormName").value,
            codigo: document.getElementById("editFormCod").value,
            marca: document.getElementById("editFormMarca").value,
            categoria: document.getElementById("editFormCategoria").value,
            descripcion: document.getElementById("editFormText").value
        };

        const validate = validateFormBienes(data, true);

        if(validate){

            await axios.put("api/updatearticulo", data);

            cd();
            onUpdateDomTableBienes();
        }
        
    } catch (error) {
        throw error
    }

}

export const sendBienes = async (cb) =>{
    try {

        const data = {
            nombre: document.getElementById("formName").value,
            codigo: document.getElementById("formCod").value,
            marca: document.getElementById("formMarca").value,
            categoria: document.getElementById("FormCategorias").value,
            descripcion: document.getElementById("Formdescripcion").value,
            uds: parseInt(document.getElementById("formUds").value),
            user: window.ID_USER
        }

        const validateForm = validateFormBienes(data, false);

        if(validateForm){

            document.getElementById("btnSendModal").disabled = true
            document.getElementById("idbtnCloseModal").disabled = true

            await axios.post("api/createbienes", data);

            document.getElementById("formName").value = ""
            document.getElementById("formCod").value = ""
            document.getElementById("formMarca").value = ""
            document.getElementById("FormCategorias").value = ""
            document.getElementById("Formdescripcion").value = ""

            document.getElementById("btnSendModal").disabled = false
            document.getElementById("idbtnCloseModal").disabled = false

            onUpdateDomTableBienes();

            cb();
        }
        
    } catch (error) {
        console.log(error)
        swal("Campo invalido", error.response.data.msg, "error");
        document.getElementById("btnSendModal").disabled = false
        document.getElementById("idbtnCloseModal").disabled = false
    }

};

export const destroyObj = async (id) =>{
    try {
        
        await sendFecth("api/deleteBienes", "POST", {id});

        await onUpdateDomTableBienes();

    } catch (error) {
        throw error
    }
};

export const setValuesModalAsig = (values) =>{
    
    document.getElementById("asigId").value = values.id
    document.getElementById("asigMaxUds").value = values.uds_available
    document.getElementById("asigCod").value = values.cod
    document.getElementById("asigNombre").value = values.name
    document.getElementById("asigMarca").value = values.brand
    document.getElementById("asigCategoria").value = values.Category
    document.getElementById("asigDescripcion").value = values.description
    document.getElementById("asigUds").value = values.uds
    document.getElementById("asigUdsDisponibles").value = values.uds_available


    document.getElementById("asigPersonaId").value = ""
    document.getElementById("asigPersonaNombre").value = ""
    document.getElementById("asigPersonaApellido").value = ""
    document.getElementById("asigPersonaCi").value = ""
    document.getElementById("asigPersonaDireccion").value = ""

    document.querySelector(".spanTextCountTotal").textContent = `Disponibles: ${values.uds_available}`

};

const validacionAisg = ({ci, name, surname, direccion, position, observacion, uds}) =>{
    
    const spanErrorName = document.getElementById("spanFuncionarioNombre")
    const spanErrorSurname = document.getElementById("spanFuncionarioApellido")
    const spanErrorCi = document.getElementById("spanFuncionarioCi")
    const spanErrorDireccion = document.getElementById("spanFuncionarioCargo")
    const spanErrorPosition = document.getElementById("spanFuncionarioDireccion")
    const spanErrorObservacion = document.getElementById("spanFuncionarioObservacion")
    const spanErrorUds = document.getElementById("spanFuncionarioUds");

    spanErrorName.textContent = ""
    spanErrorSurname.textContent = ""
    spanErrorCi.textContent = ""
    spanErrorDireccion.textContent = ""
    spanErrorPosition.textContent = ""
    spanErrorObservacion.textContent = ""
    spanErrorUds.textContent = ""

    let inputValidate = true;

    if(ci == null || ci.trim() == "" || ci.length < 6 || ci.length > 9 || !/^[0-9]*$/.test(ci)){
        inputValidate = false;
        spanErrorCi.textContent = "Campo invalido"
    }

    if(name == null || name.trim() == "" || name.length <= 3 || /\d/.test(name)){
        inputValidate = false;
        spanErrorName.textContent = "Campo invalido"
    }

    if(surname == null || surname.trim() == "" || surname.length <= 3 || /\d/.test(surname)){
        inputValidate = false;
        spanErrorSurname.textContent = "Campo invalido"
    }

    if(uds > parseInt(document.getElementById("asigMaxUds").value)){
        inputValidate = false;
        spanErrorUds.textContent = "Campo invalido"
    }

    if(direccion == null || direccion.trim() == ""){
        inputValidate = false;
        spanErrorDireccion.textContent = "Campo invalido"
    }

    if(position == null || position.trim() == "" || position.length <= 2 || /\d/.test(position)){
        inputValidate = false;
        spanErrorPosition.textContent = "Campo invalido"
    }

    if(observacion == null || observacion.trim() == "" || observacion.length <= 5){
        inputValidate = false;
        spanErrorObservacion.textContent = "Campo invalido"
    }

    return inputValidate;
};

export const sendAsigValues = async (cb) =>{

    try {

        const asig = {
            idObj: document.getElementById("asigId").value,
            ci:document.getElementById("asigPersonaCi").value,
            name: document.getElementById("asigPersonaNombre").value,
            surname: document.getElementById("asigPersonaApellido").value,
            direccion: document.getElementById("asigPersonaDireccion").value,
            position: document.getElementById("asigPersonaCargo").value,
            observacion: document.getElementById("observacion").value,
            uds: parseInt(document.getElementById("asigPersonaUds").value),
            idUsuario: window.ID_USER
        };


        const validacionAsig = validacionAisg(asig);

        if(validacionAsig){

            document.getElementById("btnSendAsigModal").disabled = true
            document.getElementById("btnCancelAsigModal").disabled = true

            await axios.post("api/asigbienes", asig)

            document.getElementById("asigId").value = "";
            document.getElementById("asigPersonaCi").value = "";
            document.getElementById("asigPersonaNombre").value = "";
            document.getElementById("asigPersonaApellido").value = "";
            document.getElementById("asigPersonaDireccion").value = "";
            document.getElementById("asigPersonaCargo").value = "";
            document.getElementById("observacion").value = "";

            document.getElementById("btnSendAsigModal").disabled = false
            document.getElementById("btnCancelAsigModal").disabled = false

            if(document.getElementById("targetSelectFuncionario").classList.contains("contenedorTargetFuncionarioACTIVE")){
                document.getElementById("targetSelectFuncionario").classList.remove("contenedorTargetFuncionarioACTIVE");
            }
            
            onUpdateDomTableBienes()
            
            cb();
        }

       
        
    } catch (error) {
        document.getElementById("btnSendAsigModal").disabled = false
        document.getElementById("btnCancelAsigModal").disabled = false
        swal("Error", error.response.data.msg, "error");
        console.log(error)
    }

}

export const controllerFilters = async () =>{
    try {

        const templateTableBien = document.getElementById("template-Bien-table").content;

        const data = {
            idSelect: document.getElementById("selectFilter").value,
            cod: document.getElementById("inputFilterCod").value,
            categoria: document.getElementById("selectFilterCategories").value,
            state: document.getElementById("selectFilterStates").value, 
            beforeDate: document.getElementById("inputFilterDateBefore").value,
            afterDate: document.getElementById("inputFilterDateAfter").value
        }
        

        const res = await sendFecth("api/getselect", "POST", data);

        const childrenNode = document.getElementById("tbodyBienes")

        while (childrenNode.firstChild) {
            childrenNode.removeChild(childrenNode.firstChild)
        }

        res.forEach(element => {

            templateTableBien.querySelector(".tbCodigo").textContent = element.cod
            templateTableBien.querySelector(".tdName").textContent = element.name
            templateTableBien.querySelector(".tdMarca").textContent = element.brand
            templateTableBien.querySelector(".tdCategoria").textContent = element.Category
            templateTableBien.querySelector(".tdUds").textContent = element.uds;
            templateTableBien.querySelector(".tdUdsCount").textContent = element.uds_available;
            templateTableBien.querySelector(".tdFecha").textContent = element.date
            templateTableBien.querySelector(".BTN-HISTORY").dataset.id = element.id;
            templateTableBien.querySelector(".BTN-ASING").dataset.info = JSON.stringify(element)
            templateTableBien.querySelector(".BTN-RETURN").dataset.info = JSON.stringify(element)
            templateTableBien.querySelector(".btn-success").dataset.info = JSON.stringify(element)
            
            
           

            const clone = templateTableBien.cloneNode(true);
            if(element.tdUdsCount == 0) clone.querySelector(".BTN-ASING").classList.add("disableClass");
            if(element.state_id != 2) clone.querySelector(".BTN-RETURN").classList.add("disableClass");

            fragment.appendChild(clone);
        });

        document.getElementById("tbodyBienes").appendChild(fragment);            


    } catch (error) {
        throw error
    }
};

export const sendBuscarFuncionario = async (e) =>{
    try {
        e.preventDefault();
        document.getElementById("spanFuncionarioBusqueda").textContent = ""

        const ci = document.getElementById("buscadorFuncionarioCi").value;

        if(ci == null || ci.trim() == "" || ci.length <= 6 || ci.length >= 9 || !/^[0-9]*$/.test(ci)){
            return document.getElementById("spanFuncionarioBusqueda").textContent = "campo invalido"
        }

        document.getElementById("buscadorFuncionarioCi").disabled = true;
        document.getElementById("buscadorFuncionarioBTN").disabled = true;

        const {data} = await axios.get(`api/getonestaff?ci=${ci}`);

        document.getElementById("buscadorFuncionarioCi").disabled = false;
        document.getElementById("buscadorFuncionarioBTN").disabled = false;

        if(data.length == 0){
            return document.getElementById("spanFuncionarioBusqueda").textContent = "No se encontraron coincidencias"
        }

        console.log(data)
        const viewTarget = document.getElementById("targetSelectFuncionario");

        document.querySelector(".nameTargetFuncionario").textContent = data[0].names
        document.querySelector(".ciTargetFuncionario").textContent = data[0].ci
        document.querySelector(".direccionTargetFuncionario").textContent = data[0].direccion
        document.getElementById("btnSelectFuncionario").dataset.info = JSON.stringify(data[0])
        
        viewTarget.classList.add("contenedorTargetFuncionarioACTIVE");

    } catch (error) {
        document.getElementById("buscadorFuncionarioCi").disabled = false;
        document.getElementById("buscadorFuncionarioBTN").disabled = false;
        console.log(error)
    }
}

export const setFuncionario = (e) =>{
    e.preventDefault()
    const target = JSON.parse(e.target.dataset.info)

    document.getElementById("asigPersonaCi").value = target.ci
    document.getElementById("asigPersonaNombre").value = target.names
    document.getElementById("asigPersonaApellido").value = target.surnames
    document.getElementById("asigPersonaDireccion").value = target.department_id
    document.getElementById("asigPersonaCargo").value = target.position

    document.getElementById("targetSelectFuncionario").classList.remove("contenedorTargetFuncionarioACTIVE");
}