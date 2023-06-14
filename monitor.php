
<?php


// Credenciales de FTP
$ftp_server = "127.0.0.1";
$ftp_user = "ranslack";
$ftp_pass = "root";

// Configuración de la conexión FTP
$conn = ftp_connect($ftp_server);
$login = ftp_login($conn, $ftp_user, $ftp_pass);

// Comprueba la conexión FTP
if ((!$conn) || (!$login)) {
    echo "Fallo en la conexión FTP.";
    exit;
}
// Obtener el directorio actual en el servidor FTP
$remote_dir = ftp_pwd($conn);

    $archivos = ftp_nlist($conn, $remote_dir);
    // Verificar si no hay más archivos
    if ($archivos !== false) {
        foreach ($archivos as $archivo) {
            $nombreArchivo = basename($archivo);
            $rutaArchivo = $remote_dir . '/' . $nombreArchivo;
            
            if (pathinfo($nombreArchivo, PATHINFO_EXTENSION) === 'xml') {
                // Procesar archivo XML
                echo "si es xml, procesando";
                $contenido = file_get_contents($nombreArchivo);
                echo $contenido;
                
             
                
                // Eliminar archivo XML
                ftp_delete($conn, $rutaArchivo);
            } else {
                // Eliminar archivo no XML
                echo "no es xml, borrando";
                ftp_delete($conn, $rutaArchivo);
            }
        }
        
    }

// Cerrar la conexión FTP al salir del bucle
ftp_close($conn);


 ?>