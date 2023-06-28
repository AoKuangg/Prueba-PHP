const config = {
    headers: new Headers({ 'Content-Type': 'application/json' }),
};

const Get = async()=>{
    let res= await (
        await fetch("http://localhost/ApolT01-008/Conexion%20pdo/uploads/camper")
    ).json();
    return res;
}

const Post = async(camper)=>{
    let res= await (
        await fetch("http://localhost/ApolT01-008/Conexion%20pdo/uploads/camper", {
            method: "POST",
            body: JSON.stringify(camper),
            headers: config.headers,
        })
    ).json();
    return res;
}

const Put = async(camper)=>{
    let res= await (
        await fetch("http://localhost/ApolT01-008/Conexion%20pdo/uploads/camper", {
            method: "PUT",
            body: JSON.stringify(camper),
            headers: config.headers,
        })
    ).json();
}

const Delete = async(camperId)=>{
    let res= await (
        await fetch("http://localhost/ApolT01-008/Conexion%20pdo/uploads/camper", {
            method: "DELETE",
            headers: config.headers,
        })
    ).join();
}


const ShowCampers = async()=>{
    let campers = await getAll();
    if (campers == false){
        alert("No hay registros")
    }else {
        campers.array.forEach(element => {
            console.log(element)          
        });
    }
}