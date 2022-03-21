let iniciarSesion = document.getElementById('iniciarSesion')
let status = localStorage.getItem('status');

if(status == "activo"){
    // ocultar y mostrar elementos respectivos cuando la sesion esta iniciada
    let sesion = document.getElementById('sesion').classList.add('d-none');
    let registro = document.getElementById('registrarme').classList.add('d-none');
    document.getElementById('miCuenta').classList.remove('d-none');
}else if(status == null){
    
}
let titulo = document.title;
switch (titulo){
        // poner en activo el link de la seccion escogida
    case "Iniciar":
        document.getElementById('iniciarSesion').classList.add('active');
        break
    case "Registro":
        document.getElementById('registrarme').classList.add('active');
        break
    case "Contacto":
        document.getElementById('contacto').classList.add('active');
        break
    case "Canales":
        document.getElementById('canales').classList.add('active');
        break
    case "Planes":
        document.getElementById('planes').classList.add('active');
        break
    case "Servicio":
        document.getElementById('servicio').classList.add('active');
        break
    case "Hilomusical":
        document.getElementById('Hilomusical').classList.add('active');
        break
    case "Mi cuenta":
        document.getElementById('miCuenta').classList.add('active');
        break
}

function cerrar(){
    // funicion para cerrar la sesion y borrar el token de la base de datos
    let datos = {
        "token" : localStorage.getItem('token'),
        "action" : "cerrar"
    }
    const json =JSON.stringify(datos, null, 2);
    
    fetch('../backend/validate-Login.php',{
            method: 'DELETE',
            body: json
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if(data.status == 'ok'){
            localStorage.clear();
            window.location.href = "index.php";
        }
    })
    .catch(function(err) {
        console.log(err);
    });
}
