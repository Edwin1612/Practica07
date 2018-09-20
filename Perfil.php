<?php
$email =filter_input(INPUT_GET, 'id');
$pass = filter_input(INPUT_GET, 'pass');
$idd = filter_input(INPUT_GET, 'id');
include_once('db/database_utilities.php');
//Se ejecuta la funcion addlog la cual agrega un registro de login con el id usuario y la fecha.
addlog($idd);
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
    </h2>
    <div class="large-6 columns">  
    <h3>Correo :<?php echo $email?> </h3>
    <h3>Correo :<?php echo $pass?> </h3>
</body>
</html>
<?php require_once('footer.php'); ?>