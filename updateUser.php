<?php
include_once('db/database_utilities.php');

$id = isset( $_GET['id'] ) ? $_GET['id'] : '';  //Se revisa que el id del usuario se encuentre mediante el metodo get.
$r = search($id); //Se realiza una busqueda en la base de datos donde se obtienen los atributos del registro con el id ingresado.

//Se revisa que la variable nombre y email, se encuentren definidas, para posteriormente realizar la actualizacino y al final se
//realiza un redireccionado a la pagina principal.
if(isset($_POST['Email']) && isset($_POST['contra1'])){
        $id = isset( $_GET['id'] ) ? $_GET['id'] : '';
        if($_POST['contra1']==$_POST['contra2'])
        {
            echo $_POST['Email'];
            updateUser($_POST['Email'],$_POST['contra1'],$_POST['genero'],$id);
            //header("location:index.php");
        }else
        {
            //header("location:index.php");
        }
  
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
                <form method="POST" action="updateUser.php?id=<?php echo($id)?>">
                  <label for="nombre">Email:</label>
                  <input type="text" name="Email" value="<?php echo $r['email']?>"><br>
                  <label for="texto">Contraseña:</label>
                  <input type="text" name="contra1" value=""><br>
                  <label for="texto">Contraseña Nuevamente:</label>
                  <input type="text" name="contra2" value=""><br>
                  <div class="form-group">
                      <label for="genero" style="color:#111;">Genero:</label><br>
                      <input for="genero" type="radio" name="genero" value="1" checked> Hombre<br>
                      <input for="genero" type="radio" name="genero" value="2"> Mujer<br>
                  </div>
                  <button type="submit" class="success">Actualizar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>