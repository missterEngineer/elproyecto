


export const getLog = async () =>{
    try {

        const template = document.getElementById("template-Log-table").content;
        const fragment = document.createDocumentFragment();

        const {data} = await axios.get(`api/getlog?dateBefore=${null}&dateAfter=${null}`);

        data.forEach(element => {
            template.querySelector(".tbAccion").textContent = element.action
            template.querySelector(".tdUser").textContent = element.username
            template.querySelector(".tdDate").textContent = element.date

            const clone = template.cloneNode(true);
            fragment.appendChild(clone);
        });        

        document.getElementById("tbodyBienes").appendChild(fragment);

        
    } catch (error) {
        console.log("error")
    }
}

export const updateListLog = () =>{

    const childrenNode = document.getElementById("tbodyBienes")

    while (childrenNode.firstChild) {
        childrenNode.removeChild(childrenNode.firstChild)
    }

    getLog();
}


export const filterDateLog = async () =>{
    try {

        const template = document.getElementById("template-Log-table").content;
        const fragment = document.createDocumentFragment();

        const FORMAT_DATE = "YYYY/MM/DD"

       const dateBefore = document.getElementById("inputFilterDateBefore").value;
       const dateAfter = document.getElementById("inputFilterDateAfter").value;
       

       if(dayjs(dateBefore, FORMAT_DATE).isValid() && dayjs(dateAfter, FORMAT_DATE).isValid()){

            if(dayjs(dateBefore, FORMAT_DATE).isBefore(dayjs(dateAfter, FORMAT_DATE)) || dayjs(dateBefore, FORMAT_DATE).isSame(dayjs(dateAfter, FORMAT_DATE))){
                
                const {data} = await axios.get(`api/getlog?dateBefore=${dateBefore}&dateAfter=${dateAfter}`)

                const childrenNode = document.getElementById("tbodyBienes")

                while (childrenNode.firstChild) {
                    childrenNode.removeChild(childrenNode.firstChild)
                }

                data.forEach(element => {
                    template.querySelector(".tbAccion").textContent = element.action
                    template.querySelector(".tdUser").textContent = element.username
                    template.querySelector(".tdDate").textContent = element.date
        
                    const clone = template.cloneNode(true);
                    fragment.appendChild(clone);
                });        
        
                document.getElementById("tbodyBienes").appendChild(fragment);

            }
       }
       
    

       
        
    } catch (error) {
        console.log(error)
    }
}


export const createPDFLog = () =>{

    let url = location.href.split("/");
    url[url.length -1] = "casa"
    console.log(url)

    // window.open("http://127.0.0.1:8000/inicio")
}