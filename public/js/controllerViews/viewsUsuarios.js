import sendFecth from "../httpFunction/sendFecth.js";

const spanErrorName = document.getElementById("spanName");
const spanErrorSurname = document.getElementById("spanSurname");
const spanErrorUsername = document.getElementById("spanUsername");
const spanErrorCi = document.getElementById("spanCi");
const spanErrorPassword = document.getElementById("spanPassword");
const spanErrorPasswordConfir = document.getElementById("spanPasswordConfir");


const spanErrorNameEdit = document.getElementById("spanNameEdit");
const spanErrorSurnameEdit = document.getElementById("spanSurnameEdit");
const spanErrorUsernameEdit = document.getElementById("spanUsernameEdit");
const spanErrorCiEdit = document.getElementById("spanCiEdit");
const spanErrorPasswordEdit = document.getElementById("spanPasswordEdit");
const spanErrorPasswordConfirEdit = document.getElementById("spanPasswordConfirEdit");

export const getUsuarios = async () =>{
    
    const fragment = document.createDocumentFragment();
    const template  = document.querySelector("#template-users-table").content;

    const res = await fetch("api/getusuarios");
    const resObj = await res.json()

    resObj.forEach(element => {
        template.querySelector(".tdId").textContent = element.id
        template.querySelector(".tdCi").textContent = element.ci
        template.querySelector(".tdName").textContent = element.names
        template.querySelector(".tdSurname").textContent = element.surnames
        template.querySelector(".tdUsername").textContent = element.username
        template.querySelector(".tdProfile").textContent = element.name
        template.querySelector(".btn-success").dataset.info = JSON.stringify(element)
        template.querySelector(".BTN-DELETE-INFO").dataset.id = element.id

        const clone = template.cloneNode(true);
        fragment.appendChild(clone);

    });

    document.getElementById("tbodyUsers").appendChild(fragment);

};

const onUpdateDom = async () =>{

    const childrenNode = document.getElementById("tbodyUsers")

    while (childrenNode.firstChild) {
        childrenNode.removeChild(childrenNode.firstChild)
    }

    getUsuarios();

}

export const validateFormUser = ({names, surnames, username, ci, password, confirPassword}, stateEdit) =>{

    let inputValidate = true;

    if(!stateEdit){
        spanErrorName.textContent = "";
        spanErrorSurname.textContent = "";
        spanErrorUsername.textContent = "";
        spanErrorCi.textContent = "";
        spanErrorPassword.textContent = "";
        spanErrorPasswordConfir.textContent = "";
    }
    
    if(stateEdit){
        spanErrorNameEdit.textContent = "";
        spanErrorSurnameEdit.textContent = "";
        spanErrorUsernameEdit.textContent = "";
        spanErrorCiEdit.textContent = "";
        spanErrorPasswordEdit.textContent = "";
        spanErrorPasswordConfirEdit.textContent = "";
    }

    if(names == null || names.trim() == "" || /\d/.test(names) || names.length <= 3){
        stateEdit ?
            spanErrorName.textContent = "Nombre invalido"
            :
            spanErrorNameEdit.textContent = "Nombre invalido"
        inputValidate = false;
    }

    if(surnames == null || surnames.trim() == "" || /\d/.test(surnames) || surnames.length <= 3){
        !stateEdit ?
            spanErrorSurname.textContent = "Apellido invalido"
            :
            spanErrorSurnameEdit.textContent = "Apellido invalido"
            inputValidate = false;
    }

    if(username == null || username.trim() == "" || username.length <= 3){
        !stateEdit ?
            spanErrorUsername.textContent = "Nombre de usuario invalido"
            :
            spanErrorUsernameEdit.textContent = "Nombre de usuario invalido"
        inputValidate = false;
    }

    if(ci == null || ci.trim() == "" || ci.length < 6 || ci.length > 9 || !/^[0-9]*$/.test(ci)){
        !stateEdit ?
            spanErrorCi.textContent = "Cedula invalida"
            :
            spanErrorCiEdit.textContent = "Cedula invalida"
        inputValidate = false;
    }

    
    if(!stateEdit){

        if(password == null || password.trim() == "" || password.trim().length < 4){
            spanErrorPassword.textContent = "Contraseña invalida";
            inputValidate = false;
        }
    
        if(confirPassword == null || confirPassword.trim() == "" || confirPassword != password){
            spanErrorPasswordConfir.textContent = "Verificación de contraseña invalida";
            inputValidate = false;
        }

    }

    if(!stateEdit){

        if(password != null){

            if(password.trim() == "" || password.trim().length < 4){
                spanErrorPasswordEdit.textContent = "Contraseña invalida";
                inputValidate = false;
            }
        
            if(confirPassword == null || confirPassword.trim() == "" || confirPassword != password){
                spanErrorPasswordConfirEdit.textContent = "Verificación de contraseña invalida";
                inputValidate = false;
            }

        }

    }

    


    return inputValidate;

};
  
export const sendNewUser = async (cb) =>{
    const btnSEND = document.getElementById("btnSendModal")
    const btnCANCEL = document.getElementById("btnUserModalCancel")
    try {

        const data = {
            names: document.getElementById("formName").value,
            surnames: document.getElementById("formSurname").value,
            username: document.getElementById("formUsername").value,
            ci: document.getElementById("formCi").value,
            password: document.getElementById("formPassword").value,
            confirPassword: document.getElementById("passwordConfirmation").value
        }

        const validation = validateFormUser(data, false)

        if(validation){

            btnSEND.disabled = true
            btnCANCEL.disabled = true
            
            // try {


            //     await 
                
                
            //     sendFecth("api/cretenewuser", "POST", data)
                
            // } catch (error) {
            //     console.log(error)
            // }


            await axios.post("api/cretenewuser", data);
    
            btnSEND.disabled = false
            btnCANCEL.disabled = false

            cb();

            // UPDATE TABLE USERS
            onUpdateDom();

            // CLEAR INPUT FORM
            document.getElementById("formName").value = "";
            document.getElementById("formSurname").value = "";
            document.getElementById("formUsername").value = "";
            document.getElementById("formCi").value = "";
            document.getElementById("formPassword").value = "";
            document.getElementById("passwordConfirmation").value = "";

            spanErrorName.textContent = "";
            spanErrorSurname.textContent = "";
            spanErrorUsername.textContent = "";
            spanErrorCi.textContent = "";
            spanErrorPassword.textContent = "";
            spanErrorPasswordConfir.textContent = "";
        }

        
    } catch (error) {
        btnSEND.disabled = false
        btnCANCEL.disabled = false
        console.log( error.response)
        swal("Campo invalido", error.response.data.msg, "error");
    }
};

export const updateUser = async (cb) =>{
    try {

        const data = {
            id: document.getElementById("formID").value,
            names: document.getElementById("formNameEdit").value,
            surnames: document.getElementById("formSurnameEdit").value,
            username: document.getElementById("formUsernameEdit").value,
            ci: document.getElementById("formCiEdit").value,
        };

        const validation = validateFormUser(data, true)

        if(validation){
            await sendFecth("api/updateuser", "PUT", data)
            cb();
            getUsuarios();
        }

        
    } catch (error) {
        console.log(error)
    }
};

export const openEditModal = (target) =>{
    
    const info = JSON.parse(target.dataset.info)
    document.getElementById("formID").value = info.id;
    document.getElementById("formNameEdit").value = info.names;
    document.getElementById("formSurnameEdit").value = info.surnames;
    document.getElementById("formUsernameEdit").value = info.username;
    document.getElementById("formCiEdit").value= info.ci;

};

export const destroyUser = async (id) =>{
    try {

        await sendFecth("api/deleteuser", "post", {id});

        await onUpdateDom();
        
    } catch (error) {
        throw error
    }
}





