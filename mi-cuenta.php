<!DOCTYPE html>
<html>
  <head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Mi cuenta</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  </head>
  <body class="bg-secondary"> 
      <?php require_once "barra-navegacion.php"; ?>
    <main class="container fluid position-relative pt-5">
        <div class="bg-white rounded-3" id="formulario-registro">
            <form id="update-form" class="form-control-sm">
                <h1 class="h1 text-center m-3">ACTUALIZAR DATOS</h1>

                <div class="form m-2 col-3">
                    <label for="celular" class="form-label">Celular:</label>
                    <input type="text" class="form-control " id="celular" name="celular" placeholder="celular" required>
                </div>
                <div class="form m-2 col-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="text" class="form-control " id="telefono" name="telefono" placeholder="telefono" required>
                </div>
                <div class="form m-2 col-3">
                    <label for="pais" class="form-label">Pais:</label>
                    <input type="text" class="form-control " id="pais" name="pais" placeholder="pais" required>
                </div>
                <div class="form m-2 col-3">
                    <label for="ciudad " class="form-label">Ciudad:</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad" required>
                </div>
                <div class="form m-2 col-3" >
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" class="form-control " id="direccion" name="direccion" placeholder="direccion" required>
                </div>
                <div class="form sm m-5">
                    <input class="w-100 btn btn-md btn-primary" type="submit" name="actualizar" id="actualizar" value="actualizar">
                </div>
            </form>
        </div>
    </main>  

      <!-- Modal respuesta -->
      <?php require_once'modal-respuesta.php';?>
      <script src="js/actualizar-datos.js"></script>
  </body>
</html>