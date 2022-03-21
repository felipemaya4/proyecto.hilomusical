//console.log("works!!");

let formularioLogin = document.getElementById('login-form');
let respuestaModal = new bootstrap.Modal(document.getElementById('respuestaModal'), {keyboard: false});
let respuesta = document.getElementById('respuesta');

formularioLogin.addEventListener('submit', function(e){
    e.preventDefault();
    //console.log('me diste un click');
    grecaptcha.ready(function() {
        grecaptcha.execute('6Ler8YoeAAAAAK0yflqxlM-KRQ1T_gsNPO71NIgM', {action: 'login'}).then(function(token){
            let datos = new FormData(formularioLogin);
            //console.log('insertando token')
            datos.append('action','login');
            datos.append('recaptcha', token);
            //convirtiendo formData en JSON
            const value = Object.fromEntries(datos.entries());
            const json =JSON.stringify(value, null, 2);
            //console.log(json);

            fetch('../backend/validate-Login.php',{
                method: 'POST',
                body: json
            })
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                
                if(data.status == 'activo'){
                    localStorage.setItem('nombre',data.nombre);
                    localStorage.setItem('token',data.token);
                    localStorage.setItem('email',data.email);
                    localStorage.setItem('status',data.status);
                    window.location.href = "index.php";

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