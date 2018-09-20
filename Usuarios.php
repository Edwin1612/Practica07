<?php

include_once('db/database_utilities.php');
$user_access = getAllUser();           //Se obtienen todos los registros y se llena el array mediante los usuarios encontrados en la base de datos.
$total_users = count($user_access); //Se hace un conteo de cuantos registros se tinen en el sistema.
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
 <!--Se agrega toda la tabla junto con los botones con acciones href que envian a otro php que tiene cierta funcion en especial, los dos href tienen envio de variables
get para enviar informacion que ocupamos.-->
      <div class="large-9 columns">
        <h3>Listado de jugadores<h3>
          <p></p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <td><a href="./addUsuario.php" class="button radius tiny success">Agregar nuevo registro</a></td>
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Correo</th>
                    <th width="250">Password</th>
                    <th width="250">Editar</th>
                    <th width="250">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($user = $user_access->fetch(PDO::FETCH_ASSOC)) { ?>
                  <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['password'] ?></td>
                    <?//Se generan dos botones, que redireccionan a acutalizaar y eliminar respectivamente."?>
                    <td><a href="./updateUser.php?id=<?php echo($user['id']); ?>" class="button radius tiny warning">Modificar</a></td>
                    <td><a href="./deleteUser.php?id=<?php echo($user['id']); ?>" class="button radius tiny alert" onClick="wait();">Eliminar</a></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>

    </div>


    <script type="text/javascript">
        //Funcion que permite cancelar el evento en caso de querer borrar un archivo.
        function wait(){
          var r = confirm("¿Desea eliminar el usuario?");
          if (!r) 
              event.preventDefault();
        }
    </script>

    <?php require_once('footer.php'); ?>
