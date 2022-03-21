let formularioUpdate = document.getElementById('update-form');
let respuestaModal = new bootstrap.Modal(document.getElementById('respuestaModal'), {keyboard: false});
let respuesta = document.getElementById('respuesta');

formularioUpdate.addEventListener('submit', function(e){
    e.preventDefault();
    document.getElementById('actualizar').classList.add('disabled');
    let datos = new FormData(formularioUpdate);
    datos.append('action','update');
    datos.append('token', localStorage.getItem('token'))
    //convirtiendo formData en JSON
    const value = Object.fromEntries(datos.entries());
    const json =JSON.stringify(value, null, 2);
    console.log(json);
    //peticion por el matodo put
    fetch('../backend/update-info.php',{
        method: 'PUT',
        body: json
    })
    .then(res => res.json())
    .then(data => {
        console.log(data)
         document.getElementById('actualizar').classList.remove('disabled');
        // se recibe los datos y se valida si se realizo la peticion o no 
        if(data.status == 'ok'){
            respuesta.innerHTML=`
            <div class="alert alert-success" role="alert">
                ${data.result.error_msg}
                        </div>`;
            respuestaModal.toggle();
        }else if(data.status == 'error'){
            respuesta.innerHTML=`
            <div class="alert alert-danger" role="alert">
                ${data.result.error_msg} cerrado sesion
                        </div>`;
            respuestaModal.toggle();
            localStorage.clear();
            window.location.href = "index.php";
            
        }
    })
    .catch(function(err) {
        console.log(err);
        respuesta.innerHTML=`
            <div class="alert alert-danger" role="alert">
                ha ocurrido un error, refresce la pagina
                        </div>`;
        respuestaModal.toggle();
    });
    // botonUpdate.classList.remove('disabled');
});