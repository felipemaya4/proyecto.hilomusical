<!DOCTYPE html>
<html>
  <head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Iniciar</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
      <!-- recaptcha v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Ler8YoeAAAAAK0yflqxlM-KRQ1T_gsNPO71NIgM"></script>
  </head>
  <body class="bg-secondary"> 
      <?php require_once "barra-navegacion.php"; ?>
      <main class="container fluid pt-5">
        <div class="row my-6">
            <div class="col-md-3"> </div>
            <div class="col-md-6 bg-white rounded-3 " id="signin">
              <form id="login-form" class="form">
                    <h1 class="h1 text-center m-3">INICIAR SESIÓN</h1>
                    <div class="form sm m-2">
                        <label for="Email" class="form-label"></label>
                          <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend2" placeholder="email@example.com" required>
                    </div>
                    <div class="form sm m-2">
                        <label class="form-label" for="password"></label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese contraseña"  aria-label="contraseña debe tener minimo 6 caracteres alafanumericos"required>
                    </div>
                    <div class="form sm m-5">
                        <input class="w-100 btn btn-md btn-primary" type="submit" value="INICIAR SESIÓN">
                    </div>
                </form>
            </div>
            <div class="col-md-6"> </div>
        </div>
    </main>

     <!-- Modal respuesta -->
      <?php require_once'modal-respuesta.php';?>
    <script src="js/sesion.js"></script>
  </body>
</html>
