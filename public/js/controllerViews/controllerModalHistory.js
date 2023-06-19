

export const showModalHistory = async (e) =>{
    try {

        const id = e.target.dataset.id;

        const res = await fetch(`api/gethistory?id=${id}`);

        const dataJ = await res.json();        

        if(dataJ.histrory.length > 0){

            document.getElementById("contenedorModalHistory").classList.add("containaerGlobalModalAsingACTIVE");

            document.getElementById("returnCodH").value = dataJ.obj[0].cod
            document.getElementById("asigNombreH").value = dataJ.obj[0].name
            document.getElementById("asigMarcaH").value = dataJ.obj[0].brand
            document.getElementById("asigCategoriaH").value = dataJ.obj[0].Category
            document.getElementById("asigUdsH").value = dataJ.obj[0].uds
            document.getElementById("asigUdsDisH").value = dataJ.obj[0].uds_available

            const template = document.getElementById("template-articulos-history").content;
            const fragment = document.createDocumentFragment();
    
            dataJ.histrory.forEach(element => {
    
                template.querySelector(".tbHCi").textContent = element.ci
                template.querySelector(".tdHname").textContent = element.funcionario
                template.querySelector(".tdHDireccion").textContent = element.departments
                template.querySelector(".tdHUds").textContent = element.uds
                template.querySelector(".tdHObservacion-1").textContent = element.assigne_observations
                template.querySelector(".tdHFecha-1").textContent = element.date
                
                const clone = template.cloneNode(true);
                fragment.appendChild(clone);
            });
            document.getElementById("PDF-history").dataset.id = dataJ.obj[0].id
            document.getElementById("tbodyHistory").appendChild(fragment);
        }

        if(dataJ.histrory.length == 0){

            swal("El artículo no posee historia", "Este artículo no ha sido asignado ");
        }

        
        
    } catch (error) {
        throw error
    }
}

export const closeHistory = () =>{

    document.getElementById("contenedorModalHistory").classList.remove("containaerGlobalModalAsingACTIVE");


    const childrenNode = document.getElementById("tbodyHistory")

    while (childrenNode.firstChild) {
        childrenNode.removeChild(childrenNode.firstChild)
    }


}