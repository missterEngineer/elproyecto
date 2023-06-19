import { closeHistory, showModalHistory } from "./controllerViews/controllerModalHistory.js";
import generatePdf from "./controllerViews/controllerPDF.js";
import { getArticulos, openModalReturn, sendFilter, sendReturn, setStateModal, setVerDetalle, updateListReturne } from "./controllerViews/viewArticulosEntregados.js";
import { createPDFLog, filterDateLog, getLog, updateListLog } from "./controllerViews/viewLog.js";
import { controllerFilters, destroyObj, getBienes, onUpdateArticulo, onUpdateDomTableBienes, openEditModalArticulo, sendAsigValues, sendBienes, sendBuscarFuncionario, setFuncionario, setValuesModalAsig } from "./controllerViews/viewsBienes.js";
import { destroyUser, getUsuarios, openEditModal, sendNewUser, updateUser } from "./controllerViews/viewsUsuarios.js";



// MODAL CONTROLLERS GLOBAL
const containerModal = document.getElementById("contenedorModal");
const mainPage = document.getElementById("mainPage");
const modalNewUser = document.getElementById("formUsers");
const modalEditUser = document.getElementById("formUsersEdit");

// LOAD TABLES
window.onload = async () =>{

    const pageUrl = location.href.split("/");

    if(pageUrl[pageUrl.length - 1] == "usuarios"){
        await getUsuarios();
    }

    if(pageUrl[pageUrl.length - 1] == "articulos"){
        await getBienes();
    }

    if(pageUrl[pageUrl.length - 1] == "articulos-entregados"){
        await getArticulos();
    }

    if(pageUrl[pageUrl.length - 1] == "bitacora"){
        await getLog();
    }
}

// FUNCTION CLOSE MODAL
const closeModal = () =>{
    containerModal.classList.remove("modalActive");
    modalNewUser.classList.remove("formModalActive");
    modalEditUser.classList.remove("formModalActive");
};

if(location.href.split("/")[location.href.split("/").length - 1] == "articulos" || location.href.split("/")[location.href.split("/").length - 1] == "usuarios"){
    // OPEN MODAL
    mainPage.addEventListener("click", e =>{

        e.preventDefault();
        
            // OPEN MODAL NEW USER
            if(e.target.classList.contains("BTN-OPEM")){
                containerModal.classList.toggle("modalActive")
                modalNewUser.classList.toggle("formModalActive")
            }

            // OPEN MODAL EDIT USER
            if(e.target.classList.contains("BTN-OPEN-EDIT")){
                containerModal.classList.toggle("modalActive")
                modalEditUser.classList.toggle("formModalActive")
                if(location.href.split("/")[location.href.split("/").length - 1] == "usuarios") openEditModal(e.target);
                if(location.href.split("/")[location.href.split("/").length - 1] == "articulos") openEditModalArticulo(e.target.dataset.info)
            }

            // OPEM MODAL ASIG
            if(e.target.classList.contains("BTN-ASING")){
                document.getElementById("contenedorModalAsing").classList.toggle("containaerGlobalModalAsingACTIVE");
                setValuesModalAsig(JSON.parse(e.target.dataset.info))
            }

            if(e.target.classList.contains("BTN-HISTORY")){
                showModalHistory(e);
            }

        
    });

    // CLOSE MODAL

    containerModal.addEventListener("click", e =>{

        e.preventDefault();
        const pageUrl = location.href.split("/")
    
        if(e.target.classList.contains("containaerGlobalModal") || e.target.classList.contains("BTN-CLOSE-MODAL")){ 
            
            if(pageUrl[pageUrl.length - 1] == "usuarios"){
                document.getElementById("formName").value = "";
                document.getElementById("formSurname").value = "";
                document.getElementById("formUsername").value = "";
                document.getElementById("formCi").value = "";
                document.getElementById("formPassword").value = "";
                document.getElementById("passwordConfirmation").value = "";
            }
    
            if(pageUrl[pageUrl.length - 1] == "articulos"){
                document.getElementById("formName").value = ""
                document.getElementById("formCod").value = ""
                document.getElementById("formMarca").value = ""
                document.getElementById("FormCategorias").value = ""
                document.getElementById("Formdescripcion").value = ""
            }
            
            closeModal();
        }
    
    });

    // SEND FORM MODAL VIEW USUARIOS AND BIENES
    document.getElementById("btnSendModal").addEventListener("click", async e =>{
        e.preventDefault();
        const pageUrl = location.href.split("/");
        if(pageUrl[pageUrl.length - 1] == "usuarios") sendNewUser(closeModal);

        if(pageUrl[pageUrl.length - 1] == "articulos") sendBienes(closeModal);
    });

    // UPDATE USER
    document.getElementById("btnUpdateModal").addEventListener("click", async e =>{
        e.preventDefault();
        const pageUrl = location.href.split("/");
        if(pageUrl[pageUrl.length - 1] == "usuarios") updateUser(closeModal)
        if(pageUrl[pageUrl.length - 1] == "articulos") onUpdateArticulo(closeModal)
    })

    document.getElementById("idbtnopenPDFUSER").addEventListener("click", () =>{
        generatePdf(location.href.split("/")[location.href.split("/").length - 1] == "articulos" ? "PDF-articulos" : "PDF-users")
    })

}






// DELETE TABLE 
document.querySelector(".BODY-TABLES").addEventListener("click", async (e) =>{
    
    const pageUrl = location.href.split("/")

    if(e.target.classList.contains("BTN-DELETE-INFO")){

        if(pageUrl[pageUrl.length - 1] == "usuarios"){


            const check = await swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              });

              try {

                if(check){
                    await destroyUser(e.target.dataset.id)
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    })
                }

                if(!check){
                    swal("Your imaginary file is safe!");

                }
                  
              } catch (error) {
                  console.log(error)
              }


        }

        if(pageUrl[pageUrl.length - 1] == "articulos"){


            const check = await swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              });

              try {

                if(check){
                    await destroyObj(e.target.dataset.id)
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    })
                }

                if(!check){
                    swal("Your imaginary file is safe!");

                }
                  
              } catch (error) {
                  console.log(error)
              }


        }
        
    }
})


// OPEN MODAL ASIG


// CLOSE MODAL ASIG

// ARTICLE PAGE ACTIONS
if(location.href.split("/")[location.href.split("/").length - 1] == "articulos"){
    
    document.getElementById("contenedorModalAsing").addEventListener("click", e =>{

        e.preventDefault();
        
        if(e.target.classList.contains("BTN-CLOSE-MODAL")){
            document.getElementById("contenedorModalAsing").classList.toggle("containaerGlobalModalAsingACTIVE");
            document.getElementById("targetSelectFuncionario").classList.remove("contenedorTargetFuncionarioACTIVE");
        }

        if(e.target.classList.contains("BTN-SEND-ASIG")){
            sendAsigValues(() =>{
                document.getElementById("contenedorModalAsing").classList.toggle("containaerGlobalModalAsingACTIVE");
                document.getElementById("spanFuncionarioBusqueda").textContent = ""
            });
        }

    });

    // FILTERS CONTROLLERS
    document.getElementById("selectFilter").addEventListener("change", e =>{
       
        const btnsFilter = document.getElementById("btns-filters");
        const containerInputs = document.querySelectorAll(".conteendorInputFiltros");
            

        if(e.target.value == 0){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            btnsFilter.classList.remove("contenerotBtnsFiltrosACTIVE");

            onUpdateDomTableBienes();
        }

        if(e.target.value == 1){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            containerInputs[0].classList.add("conteendorInputFiltrosACTIVE");
            btnsFilter.classList.add("contenerotBtnsFiltrosACTIVE");

        }

        if(e.target.value == 2){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            containerInputs[1].classList.add("conteendorInputFiltrosACTIVE");
            btnsFilter.classList.add("contenerotBtnsFiltrosACTIVE");

        }

        if(e.target.value == 3){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            containerInputs[2].classList.add("conteendorInputFiltrosACTIVE");
            btnsFilter.classList.add("contenerotBtnsFiltrosACTIVE");
        }

        if(e.target.value == 4){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            containerInputs[3].classList.add("conteendorInputFiltrosACTIVE");
            btnsFilter.classList.add("contenerotBtnsFiltrosACTIVE");
        }

        
    })

    // on event filter
    document.getElementById("btnSendFilter").addEventListener("click", controllerFilters);

    // RESET FILTER
    document.getElementById("btnReSetFilter").addEventListener("click", onUpdateDomTableBienes);

    document.getElementById("btn-closehistory").addEventListener("click", closeHistory);

    // BUSCADOR FUNCIONARIO YA REGISTRADO
    document.getElementById("formBuscadorFuncionario").addEventListener("submit", sendBuscarFuncionario);
    document.getElementById("buscadorFuncionarioBTN").addEventListener("click", sendBuscarFuncionario);

    document.getElementById("btnSelectFuncionario").addEventListener("click", setFuncionario);

    // open PDF HISTORY

    document.getElementById("PDF-history").addEventListener("click", e =>{

        let urlPDF = location.href.split("/");
        urlPDF[urlPDF.length - 1] = "PDF-articulo-historia?id=" + e.target.dataset.id
    
        const targetURL = urlPDF.toString().replace(/,/g, "/");
    
        window.open(targetURL);
    });

}


//
if(location.href.split("/")[location.href.split("/").length - 1] == "articulos-entregados"){
    
    
    // FILTERS CONTROLLERS
    document.getElementById("selectFilter").addEventListener("change", e =>{
       
        const btnsFilter = document.getElementById("btns-filters");
        const containerInputs = document.querySelectorAll(".conteendorInputFiltros");
            

        if(e.target.value == 0){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            btnsFilter.classList.remove("contenerotBtnsFiltrosACTIVE");

            updateListReturne()
        }

        if(e.target.value == 1){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            containerInputs[0].classList.add("conteendorInputFiltrosACTIVE");
            btnsFilter.classList.add("contenerotBtnsFiltrosACTIVE");

        }

        if(e.target.value == 2){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            containerInputs[1].classList.add("conteendorInputFiltrosACTIVE");
            btnsFilter.classList.add("contenerotBtnsFiltrosACTIVE");

        }

        if(e.target.value == 3){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            containerInputs[2].classList.add("conteendorInputFiltrosACTIVE");
            btnsFilter.classList.add("contenerotBtnsFiltrosACTIVE");
        }


        if(e.target.value == 4){

            for (const node of containerInputs) {
                node.classList.remove("conteendorInputFiltrosACTIVE");
            }

            containerInputs[3].classList.add("conteendorInputFiltrosACTIVE");
            btnsFilter.classList.add("contenerotBtnsFiltrosACTIVE");
        }

        
    })

    document.getElementById("tbodyBienes").addEventListener("click", e =>{

        if(e.target.classList.contains("DETALLE")){
            setVerDetalle(JSON.parse(e.target.dataset.info))
        }
    })

    // on event filter
    document.getElementById("btnSendFilter").addEventListener("click", sendFilter);

    // RESET FILTER
    document.getElementById("btnReSetFilter").addEventListener("click", updateListReturne);

    // OPEN MODAL RETURN ARTICLE
    document.getElementById("tableReturn").addEventListener("click", e =>{
        if(e.target.classList.contains("BTN-RETURNE")) openModalReturn(e);
    });

    // CLOSE MODAL RETURN ARTICLE
    document.querySelector(".BTN-CLOSE-MODAL").addEventListener("click", setStateModal);

    document.querySelector(".BTN-SEND-RETURNE").addEventListener("click", sendReturn);

}

if(location.href.split("/")[location.href.split("/").length - 1] == "bitacora"){

    document.getElementById("btnSendFilterDate").addEventListener("click", filterDateLog);

    document.getElementById("btnReSetFilterDate").addEventListener("click", updateListLog);

    document.getElementById("PDF-log").addEventListener("click", () =>{

        let urlPDF = location.href.split("/");
        urlPDF[urlPDF.length - 1] = "PDF-articulo-log"
    
        const targetURL = urlPDF.toString().replace(/,/g, "/");
    
        window.open(targetURL);
    });


}
