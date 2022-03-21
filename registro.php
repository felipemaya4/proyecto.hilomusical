<!DOCTYPE html>
<html>
  <head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Registro</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="crossorigin="anonymous"></script>
    <!-- recaptcha v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Ler8YoeAAAAAK0yflqxlM-KRQ1T_gsNPO71NIgM"></script>
  </head>
  <body class="bg-secondary"> 
    <?php require_once "barra-navegacion.php"; ?>
      <main class="container fluid pt-5">
        <div class="row my-6 ">
            <div class="col-md-6" >
                
            </div>
            <div class="col-md-6 bg-white rounded-3" id="formulario-registro">
                <form id="register-form" class="form">
                    <h1 class="h1 text-center m-3">REGISTRARME</h1>

                    <div class="form sm m-2">
                        <label for="name" class="form-label"></label>
                        <input type="text" class="form-control " id="name" name="name" placeholder="Nombre" required>
                    </div>
                    <div class="form sm m-2">
                        <label for="LastName" class="form-label"></label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Apellido" required>
                    </div>
                    <div class="form sm m-2">
                        <label for="Email" class="form-label"></label>
                          <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend2" placeholder="email@example.com" required>
                    </div>
                    <div class="form sm m-2">
                        <label for="UserType" class="form-label"></label>
                        <select class="form-select" id="userType" name="userType" required>
                          <option selected disabled value="">Seleccione tipo de usuario</option>
                          <option value="NO">PERSONA</option>
                          <option value="SI">EMPRESA</option>
                        </select>
                    </div>
                    <div class="form sm m-2">
                        <label class="form-label" for="password"></label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese una contraseña"  aria-label="contraseña debe tener minimo 6 caracteres alafanumericos"required>
                    </div>
                    <div class="form sm m-2">
                        <label class="form-label" for="validationPassword" ></label>
                        <input class="form-control" type="password" id="validationPassword" name="validationPassword" placeholder="Confirme la contraseña" required>
                    </div>
                    <div class="form sm m-2">
                      <input class="form-check-input" type="checkbox" value="SI" id="checkSendNews" name="checkSendNews" >
                      <label class="form-check-label" for="checkSendNews">Deseo recibir informacion en mi correo
                      </label>
                    </div>
                    <div class="form sm m-2">
                        <input class="form-check-input" type="checkbox" value="SI" id="acceptTerms" name="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Acepto las <a class="link-primary" data-bs-toggle="modal" data-bs-target="#condicionesDeServicio" > condiciones del servicio y política de privacidad.</a>
                        </label>
                    </div>
                    <div class="form sm m-5">
                        <input class="w-100 btn btn-md btn-primary" type="submit" value="REGISTARME">
                    </div>
                </form>
            </div>
        </div>
    </main>

<!-- Modal terminos y condiciones -->
<div class="modal fade" id="condicionesDeServicio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel" style="color: rgb(24, 49, 233);font-weight: bold;text-transform: uppercase;"> 
          Términos y Condiciones de Contratación del Servicio           
        </h2>
      </div>
      <div class="modal-body">
        <div class="item-page">             
            <h4>Hilo Musical : https://www.hilomusical.co</h4>
             <p style="line-height: 18px; text-align: justify;"> 
               Antes de registrarse en https://www.hilomusical.co debes leer y aceptar los siguientes términos y condiciones del servicio. 
               Los presentes términos tienen como finalidad la regulación de los servicios ofrecidos por Sonido y Voz Producciones, 
               ubicada en la Cr. 64 No. 103C-29 Of.301 correo electrónico email: <b>administración@sonidoyvoz.com  * info@hilomusical.co</b> 
               Teléfono 6247075, Cel: 317 3581304 – 3114552444, Bogotá Colombia. 
               
               A través de su web https://www.hilomusical.co servicios trasmitidos via streaming, los cuales son contratados por el cliente y 
               están destinados al servicio de Ambientación Musical de las empresas que requieran este tipo de servicio para ayudar y 
               motivar la venta y/o el servicio de su actividad comercial.  <br><br>               
               
               <b>Contratación: </b> <br>
               El usuario o cliente bajo su responsabilidad suministrara verazmente los datos solicitados en el formulario de registro 
               de la página, a los cuales Sonido y Voz enviara al correo electrónico proporcionado la confirmación para la activación por
               parte del cliente a cerca de su voluntad expresa de contratación del servicio.    <br><br>   
               
               Con el registro inicial el cliente cuenta con 8 días calendario para escuchar el servicio y tomar la decisión 
               de la compra del mismo. Si esta opción se da, entonces se genera la facturación de acuerdo con el plan tomado del servicio,
               o en caso que no desee tomar el mismo, después de estos 8 días el servicio no funcionara mas para su registro.  
               En ese caso deberá contactarse con nosotros para hacer la activación de nuevo o la compra del mismo si desea tomar la solicitud
               del registro. Sus datos se mantendrán de acuerdo con el interés informado en el momento del registro o para el envío de  
               información de parte nuestra o si es su voluntad expresa serán eliminados de nuestras bases de datos.      <br><br>          
               
               <b> Obligaciones del Servicio</b><br>
               Sonido y Voz, se compromete a prestar la atención al cliente en horarios de oficina,procurando que el servicio este activo de
               lunes a viernes de 8am a 6 pm.     
               En ningún caso Sonido y Voz a través de su web https://www.hilomusical.co garantiza la total continuidad del servicio debido a posibles
               fallo técnicos así como otras posibles causas no imputables a Sonido y Voz. Por lo demás el servicio de Ambientación Musical se 
               prestara 24 horas al día los 7 días de la semana. También nos reservamos el derecho a suspender temporalmente el servicio para 
               realizar tareas de mantenimiento, mejoras o actualizaciones del mismo. <br><br>         
                       
               En ningún caso Sonido y Voz será responsable de pérdida de datos, suspensión del negocio, o cualquier otro perjuicio producido
               por el mal funcionamiento del servicio o por  no cumplir con las expectativas del cliente o usuario. Sonido y Voz no enviara 
               información al correo electrónico sin previo consentimiento,excepto cuando el cliente lo ha manifestado mediante la aceptación 
               en la casilla que se encuentra en el formulario de regístrese del web site https://www.hilomusical.co <br> <br> <br> 
               
               <b>Obligaciones del Servicio El Cliente. </b><br>          
               Se prohíbe el uso de los servicios de <b> https://www.hilomusical.co</b> con fines distintos a la buena fe.
               Sonido y Voz tiene contratos con Sayco y Acinpro, Contratos de Licenciamiento para la Reproducción y 
               Comunicación Pública de las Obras Musicales que representa y administra, en los términos de las disposiciones
               consagradas en los artículos 13 y 15 de la Decisión Andina 351 de 1993, concordantes con el artículo 76 de la ley 23 de 1982.     
               Y el cliente es el responsable del pago de los cánones por los derechos de ejecución pública OSA (Asociación Sayco Acinpro), 
               de la música emitida por nuestro web site.<br><br>
               
               Queda totalmente prohibida la venta o alquiler a terceros de los servicios prestados por Sonido y Voz sin consentimiento 
               expreso de este al cliente. <br><br>
               
               El cliente se compromete a mantener activar la dirección de correo electrónica proporcionada para el registro del servicio
               para su permanente comunicación y en caso de cambio de esta enviarla la nueva dirección a nuestro sistema de contáctenos.  <br><br>  
               
               <b>Protección de Datos: </b><br>
               De acuerdo con el Congreso de la República,<b> Ley Estatutaria 1581 del 17 de octubre del  2012 </b>
               “Por la cual se dictan disposiciones generales para la protección de datos personales” los cuales son recolectados en el 
               momento del registro en nuestro portal, que estos solamente serán usados en los casos específicos de comunicación directa 
               con el cliente mismo. También le recomendamos al cliente no facilitar a terceros sus datos de registro contraseñas y 
               demás que le hayan sido  suministrados por nosotros para el funcionamiento del servicio de Ambientación Musical. <br><br>
                     
               Sonido y Voz se reserva el derecho de modificar su política de Seguridad y condiciones del servicio en cualquier momento
               y sin previo aviso. Siempre en conformidad con la legislación Colombiana que se encuentre vigente para tal fin. 
               
                       Los cambios que se efectúen serán enviados   en un correo electrónico informando de los mismos. <br><br>    
                                   <b>Nulidad</b> <br>Si cualquiera de las condiciones de este contrato se declarase nula o sin efecto en todo o en 
               parte por cualquier autoridad competente las restantes conservaran su validez. <br><br> 
                           
               <b>Modificaciones:</b><br>    
               Sonido y Voz ser reserva el derecho a efectuar modificaciones en las características del servicio, 
               procurando actuar en beneficio de este, para lo cual lo notificara y el cliente contara con 8 días calendario 
               para comunicarse en caso de que exista desacuerdo, si transcurrido este tiempo no se recibe respuesta alguna se 
               entenderá que el cliente acepto las nuevas condiciones.<br><br>  
                           
               <b>Resolución de Contrato</b>: <br>     
               Las presentes condiciones se podrán resolver en forma unilateral por cualquiera de las partes,    
               en caso del cliente este podrá informar su voluntad al correo <b>administración@sonidoyvoz.com * info@hilomusical.co</b> , 
               en caso de Sonido y Voz, se contara con 5 días de antelación para ejercer la presente notificación.</p>        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


      <!-- Modal respuesta -->
      <?php require_once'modal-respuesta.php';?>

      <script src="js/registro.js"></script>
  </body>
</html>