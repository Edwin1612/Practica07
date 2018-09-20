<?php
include_once('db/database_utilities.php');
$t = $todo = filter_input(INPUT_GET, 't');
$t=$t+"";
if(isset($_POST['email']) && isset($_POST['contrasena'])){
    //Si los datos son agregados en el formulario y dan submit pasa a este paso si entran los datos crrectos hacemos un login si tiene respuestas de filas devueltas
    //Se toma en la varialbe respuesta 
    $respuesta = login($_POST['email'],$_POST['contrasena']);
    //Si hubo respuesta haremos ciertos pasos corresponeidntes.
    if($respuesta==1)
    {
       
        session_start();
        session_unset();
        session_destroy();

        $contrasena = $_POST['contrasena'];
        $email = $_POST['email'];
        

        if ($email === false || $email === NULL || $email === '' ||
                $contrasena === false || $contrasena === NULL || $contrasena === '') {
            //header('Location: perfil.php');
            exit();
        }

         //Se hace un llamado a la funcion session que verifica si existe el usuario con esos parametros de contraseña y email.
        $stmt = Session($contrasena,$email);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        //Lo hacemos en un array asociativo con la funcion pdo FEtch.
        $r2=searchLog($email,$contrasena);
        //Obtenermos el id del usuario el cual ha hecho login
        $idd = $r2['id'];
        //Enviamos los datos importantes como el correo y el id usuario.
        header("Location: Perfil.php?id=$email&pass=$idd");
    }
}
?>

<!<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica 07</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
<body>
<?php require_once('header.php'); ?>

<div class="row">
    <h2>INICIAR SESION
    </h2>
    <div class="large-6 columns">    
        <form method="POST" action="login.php">
            <label for="correo">Correo:</label>
            <input type="email" name="email" id="correo">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="contrasena">
            <input type="submit">
        </form>
    </div>
</div>
</body>
</html>

  <?php require_once('footer.php'); ?>