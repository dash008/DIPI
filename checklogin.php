
<?php 
//Este es el archivo que comprueba los datos ingresados en el formulario de login, lo llamaremos comprobar.php

    session_start(); 
    
	include('acceso_db.php'); 
    
	if(isset($_POST['enviar'])) { // comprobamos que se hayan enviado los datos del formulario
        // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos 
        if(empty($_POST['username']) || empty($_POST['password'])) { 
            echo "El usuario o la contrase–a no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
        }else { 
                // "limpiamos" los campos del formulario de posibles códigos maliciosos
                $usuario_nombre = $_POST['username'];
                $usuario_clave = $_POST['password'];
            
                $usuario_clave = base64_encode($usuario_clave);
                //$usuario_clave = base64_encode($usuario_clave);
            
                // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
                $sql = "SELECT id, username, password FROM usuarios WHERE username='".$usuario_nombre."' AND password='".$usuario_clave."'";
            
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0)
                    {
                        // output data of each row
                        while($row = $result->fetch_assoc())
                            {
                    
                                $_SESSION['id'] = $row['id']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
                                $_SESSION['username'] = $row["username"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
                                header("Location: access.php");

                            }
                    }
                else {
                        ?>
                        El usuario o el Password ingresados no son correctos, <a href="access.php">Reintentar</a>
                        <?php
                            }
        }
    }else
    {
        header("Location: access.php");
    }
    
    
?>