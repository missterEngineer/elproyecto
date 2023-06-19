
const sendFecth = async (url, method, data) =>{

        const res = await fetch(url ,{
            method,
            headers: {
            'X-CSRF-TOKEN': window.CSRF_TOKEN,
            'Content-Type':'application/json'
            },
            body: JSON.stringify(data)
        });

        return await res.json();
};

export default sendFecth;