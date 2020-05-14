<?php 
    session_start(); 
    include('acceso_db.php');
    
    
    if(empty($_SESSION['usuario_nombre'])) 
    { // comprobamos que las variables de sesión estén vacías         

      //Formulario de acceso:
      //Ahora pasaremos a crear nuestro formulario de acceso o Login, a este archivo lo llamaremos acceso.php
      
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Ingresar</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap-4.1.3-dist/css/signin.css" rel="stylesheet">
  </head>

  <body >
    
    <form class="form-signin" action="checklogin.php" method="POST">
      <img class="img-fluid" src="assets/dipi.png" alt="" width="300px">
      <h3 class="h3 mb-3 font-weight-normal" align="center">Drawing Ping-Pong</h3>
      <h3 class="h5 mb-3 font-weight-normal" align="center">Por favor identifiquese</h3>
      <label for="inputusername" class="sr-only">Nombre de usuario</label>
      <input  type="text" 
              id="inputusername"
              name="username" 
              class="form-control" 
              placeholder="Nombre de usuario" 
              required 
              autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input  type="password" 
              id="inputPassword"
              name="password" 
              class="form-control" 
              placeholder="Contraseña" 
              required>
      <button class="btn btn-lg btn-primary btn-block btn-dark" type="submit" name="enviar">Ingresar</button>
      <a href="register.php">¿No posee cuenta? Registrese</a>
    </form>

  </body>
</html>

<?php 
    }
  else 
    { 
 
        if($_SESSION['usuario_nombre']=='Admin'){
      
?>
      
            <p>Hola <strong><?=$_SESSION['usuario_nombre']?></strong> | <a href="logout.php">Salir</a></p>
<?php
            echo "Si quieres eliminar un usuario --> <a href=\"delete_BD.php\">Borrar Usuario</a>";
            echo "<br>";
            echo "Si quieres ver datos de un usuario --> <a href=\"ver_BD.php\">Ver Info de Usuario</a>";
        }
        else{
            
        }
    }
  
?>

