import sendFecth from "../httpFunction/sendFecth.js";


const fragment = document.createDocumentFragment()

export const getArticulos = async () =>{
    try {

        const tempate = document.getElementById("template-articulos-table").content;


        const res = await fetch("api/getarticulos-entregados");
        const obj = await res.json();

        obj.forEach(element => {
            tempate.querySelector(".tbCodigo").textContent = element.cod
            tempate.querySelector(".tdName").textContent = element.goods
            tempate.querySelector(".tdMarca").textContent = element.brand
            tempate.querySelector(".tdCategoria").textContent = element.categorie
            tempate.querySelector(".tdUnidades").textContent = element.uds
            tempate.querySelector(".tdDirec").textContent = element.departments
            tempate.querySelector(".tdCi").textContent = element.ci
            tempate.querySelector(".tdFun").textContent = element.funcionario
            tempate.querySelector(".BTN-RETURNE").dataset.info = JSON.stringify(element)
            // tempate.querySelector(".DETALLE").dataset.info = JSON.stringify(element)
            const clone = tempate.cloneNode(true);

            fragment.appendChild(clone);
        });

        document.getElementById("tbodyBienes").appendChild(fragment);

        
    } catch (error) {
        throw error
    }
};

export const updateListReturne = () =>{

    const childrenNode = document.getElementById("tbodyBienes")

    while (childrenNode.firstChild) {
        childrenNode.removeChild(childrenNode.firstChild)
    }

    getArticulos();
}

export const setStateModal = (e) =>{
    if(document.getElementById("contenedorModalReturne").classList.contains("containaerGlobalModalAsingACTIVE")) e.preventDefault();
    document.getElementById("contenedorModalReturne").classList.toggle("containaerGlobalModalAsingACTIVE")
};

export const openModalReturn = (e) =>{

    const obj = JSON.parse(e.target.dataset.info);


    document.getElementById("asigId").value = obj.id;
    document.getElementById("returnPersonaId").value = obj.staff_id
    document.getElementById("returnObj").value = obj.goods_id
    document.getElementById("returnCod").value = obj.cod;
    document.getElementById("returnNombre").value = obj.goods;
    document.getElementById("returnMarca").value = obj.brand;
    document.getElementById("returnCategoria").value = obj.categorie;
    document.getElementById("returnDescripcion").value = obj.description;
    document.getElementById("returnPersonaNombre").value = obj.funcionario;
    document.getElementById("returnPersonaApellido").value = obj.surnames;
    document.getElementById("returnPersonaCi").value = obj.ci;
    document.getElementById("returnPersonaDireccion").value = obj.departments;


    setStateModal();
};


const validateReturn = ({observation, uds}) =>{

    const spanErrorObservacion = document.getElementById("spanObservacionReturne");
    const spanErrorUbs = document.getElementById("spanReturnFuncionarioUds");


    spanErrorObservacion.textContent = "";

    let inputValidate = true;

    if(observation == null || observation.trim() == "" || observation.length <= 5){
        inputValidate = false;
        spanErrorObservacion.textContent = "Campo invalido"
    }

    if(uds == null || uds < 1 || uds > 100 || !/^[0-9]*$/.test(uds)){
        spanErrorUbs.textContent = "Campo invalido"
        inputValidate = false;
    }

    return inputValidate;

}

export const sendReturn = async (e) =>{
    try {

        e.preventDefault();

        const data ={
            idObj: document.getElementById("returnObj").value,
            idObjAsig: document.getElementById("asigId").value,
            idPersona: document.getElementById("returnPersonaId").value,
            observation: document.getElementById("returnObservacion").value,
            uds: document.getElementById("returnPersonaUds").value,
            idUsuario: window.ID_USER
        }

        const validateData = validateReturn(data);

        if(validateData){

            document.getElementById("btnReturneModalA").disabled = true
            document.getElementById("btnCancelReturneModalA").disabled = true
            
            await axios.post("api/returnarticulo", data)

            document.getElementById("btnReturneModalA").disabled = false
            document.getElementById("btnCancelReturneModalA").disabled = false

            updateListReturne()


    
            setStateModal(e);
        }

        
    } catch (error) {
        document.getElementById("btnReturneModalA").disabled = false
        document.getElementById("btnCancelReturneModalA").disabled = false
        swal("Error", error.response.data.msg, "error");
    }
};

export const sendFilter = async () =>{
    try {

        const tempate = document.getElementById("template-articulos-table").content;

        const data = {
            idSelect: document.getElementById("selectFilter").value,
            cod: document.getElementById("inputFilterCod").value,
            categoria: document.getElementById("selectFilterCategories").value,
            direccion: document.getElementById("selectFilterDireccion").value,
            ci: document.getElementById("inputFilterCIFuncionaro").value
        }

        const obj = await sendFecth("api/getfilterarticleasig", "POST", data);
        const childrenNode = document.getElementById("tbodyBienes")

        while (childrenNode.firstChild) {
            childrenNode.removeChild(childrenNode.firstChild)
        }

        obj.forEach(element => {
            tempate.querySelector(".tbCodigo").textContent = element.cod
            tempate.querySelector(".tdName").textContent = element.goods
            tempate.querySelector(".tdMarca").textContent = element.brand
            tempate.querySelector(".tdCategoria").textContent = element.categorie
            tempate.querySelector(".tdUnidades").textContent = element.uds
            tempate.querySelector(".tdDirec").textContent = element.departments
            tempate.querySelector(".tdCi").textContent = element.ci
            tempate.querySelector(".tdFun").textContent = element.funcionario
            tempate.querySelector(".BTN-RETURNE").dataset.info = JSON.stringify(element)
            const clone = tempate.cloneNode(true);

            fragment.appendChild(clone);
        });

        document.getElementById("tbodyBienes").appendChild(fragment);
        
    } catch (error) {
        throw error
    }
};

export const openVerDetalle = () =>{
    document.getElementById("modalDetalleArticulo").classList.toggle("modalActive")
}

export const setVerDetalle = (obj) =>{

    console.log(obj)

}