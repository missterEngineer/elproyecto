
const generatePdf = async (direccion) =>{
    let urlPDF = location.href.split("/");
    urlPDF[urlPDF.length - 1] = direccion

    const targetURL = urlPDF.toString().replace(/,/g, "/");

    window.open(targetURL);
};

export default generatePdf;