

<?php 
//Creacion de archivo de configuración de acceso a MySQL:
//A este archivo lo llamaremos acceso_db.php y va a contener los datos de acceso a nuestra Base de Datos.

    $host_db = "localhost"; // Host de la BD - EN ESTE CASO localhost
    $usuario_db = "root"; // Usuario de la BD - EN ESTE CASO root
    $clave_db = ""; // Contraseña de la BD - EN ESTE CASO Informatica1
    $nombre_db = "users"; // Nombre de la BD - informatica1
     
    //conectamos y seleccionamos db
    $conn = new mysqli($host_db, $usuario_db, $clave_db, $nombre_db);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>
