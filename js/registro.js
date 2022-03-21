// console.log("works!!");

let formulario = document.getElementById('register-form');
let respuestaModal = new bootstrap.Modal(document.getElementById('respuestaModal'), {keyboard: false});
let respuesta = document.getElementById('respuesta');


formulario.addEventListener('submit', function(e){
    e.preventDefault();
    //console.log('me diste un click');
    grecaptcha.ready(function() {
        grecaptcha.execute('6Ler8YoeAAAAAK0yflqxlM-KRQ1T_gsNPO71NIgM', {action: 'registro'}).then(function(token){
            
            let datos = new FormData(formulario);
            //console.log('insertando token')
            if(datos.get('checkSendNews')=== null){
                datos.append('checkSendNews','NO');
            }else{ }
            datos.append('action','registro');
            datos.append('recaptcha', token);
            //convirtiendo formData en JSON
            const value = Object.fromEntries(datos.entries());
            const json =JSON.stringify(value, null, 2);
            
           //console.log(json);
            
            fetch('../backend/validate-Reg.php',{
                method: 'POST',
                body: json
            })
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                
                if(data.status == 'ok'){
                    respuesta.innerHTML=`
                    <div class="alert alert-success" role="alert">
                      ${data.result.error_msg}
                                </div>`;
                    respuestaModal.toggle();
                }else if(data.status == 'error'){
                    respuesta.innerHTML=`
                    <div class="alert alert-danger" role="alert">
                        ${data.result.error_msg}
                                </div>`;
                    respuestaModal.toggle();
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
        });
    });
});