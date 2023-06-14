<?php
//credenciales de ftp
$ftp_server = "127.0.0.1";
$ftp_user = "ranslack";
$ftp_pass = "root";
//...................
//credenciales de bd
$servername = "localhost";
$database = "ventas";
$username = "root";
$password = "";
//...................

// Configuración de la conexión FTP y la base de datos

//ftp connection
$conn = ftp_connect($ftp_server);
//ftp loggin
$login = ftp_login($conn, $ftp_user, $ftp_pass);
// db connection
$conndb = mysqli_connect($servername, $username, $password, $database);
//................................................
//comprobate the connection is ok
if ((!$conn) || (!$login) || (!$conndb)) {
    echo "fallo en la conexion ";
} else {
    if ($_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES["archivo"]["name"];
        $archivoTemporal = $_FILES["archivo"]["tmp_name"];
        $directorioDestino = 'C:/xampp/htdocs/Filezilla/';

        if (move_uploaded_file($archivoTemporal, $directorioDestino . $nombreArchivo)) {
            echo "El archivo a se ha subido correctamente.";
           	require "./monitor.php";
        } else {
            echo "Ha ocurrido un error al subir el archivo XML.";
        }
    } else {
        echo "Error al subir el archivo: " . $_FILES["archivo"]["error"];
    }
}

?>
