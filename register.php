 
<?php 
//Formulario de Registro:
//Ahora procederemos a crear nuestro formulario de registro, al cual llamaremos registro.php

    include('acceso_db.php'); // incluimos el archivo de conexión a la Base de Datos 
    if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos desde el formulario 

        if($_POST['password'] != $_POST['password2']) { 
        // comprobamos que las contraseñas ingresadas coincidan 
          echo "El password ingresado no coincide. <a href='javascript:history.back();'>Reintentar</a>";
        }
        else 
        { 
        //
            $username = $_POST['username'];
            $usuario_clave = $_POST['password'];
      
                $usuario_clave = base64_encode($usuario_clave); // encriptamos la contraseña ingresada con md5
                //$usuario_clave = base64_encode($usuario_clave); 
        // ingresamos los datos a la BD 
                $reg = "INSERT INTO usuarios (username, password, userfreg) 
                        VALUES ('".$username."', '".$usuario_clave."', NOW())";
                
                
                $queryReg = $conn->query($reg);
                
          if($queryReg){ 
            echo "Datos ingresados correctamente. Seras redirigido al login en 5 segundos";
            header( "refresh:5;url=index.php" );
          }
        else 
          { 
            echo "ha ocurrido un error y no se registraron los datos.";
            echo "<br>";
            echo $username. " ".$usuario_clave; 
          } 
            //}
        } 
    }else { 
?>  

  <!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Pagina de Registro</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap-4.1.3-dist/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
     
      <h1 class="h3 mb-3 font-weight-normal">Registrarse</h1>
      
      <label for="inputusername" class="sr-only">Email address</label>
      <input  type="text" 
              id="inputusername"
              name="username" 
              class="form-control" 
              placeholder="Nombre de usuario" 
              required autofocus>
      
      <label for="inputPassword" class="sr-only">Password</label>
      <input  type="password" 
              id="inputPassword"
              name="password" 
              class="form-control" 
              placeholder="Contraseña" 
              required>

      <label for="inputPassword2" class="sr-only">Password</label>
      <input  type="password" 
              id="inputPassword2"
              name="password2" 
              class="form-control" 
              placeholder="Confirmar contraseña" 
              required>      
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="enviar">Registrarse</button>
      
    </form>
  </body>
  </html>
<?php 
    } 
?>