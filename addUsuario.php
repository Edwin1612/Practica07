<?php
include_once('db/database_utilities.php');
//Si son existentes los parametros entra al if
if(isset($_POST['email']) && isset($_POST['contrasena'])){
  //En el cual mediante la funcion addUsuario se agrega un usuario tomando los valores post que envia el formulario
    addUsuario($_POST['email'],$_POST['contrasena'] ,$_POST['genero']);
}

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Agregar Nuevo Usuario</h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <form method="POST" action="addUsuario.php">
                  <label for="nombre">Email:</label>
                  <input type="text" name="email" value=""><br>
                  <label for="texto">Contraseña:</label>
                  <input type="password" name="contrasena" value=""><br>
                  <div class="form-group">
                      <label for="genero" style="color:#111;">Genero:</label><br>
                      <input for="genero" type="radio" name="genero" value="1" checked> Hombre<br>
                      <input for="genero" type="radio" name="genero" value="2"> Mujer<br>
                  </div>
                  <button type="submit" class="success">Guardar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>