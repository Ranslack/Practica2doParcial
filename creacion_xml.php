<?php
require './conexion.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["selectText"])) {
    $fechaen = $_POST["selectText"];
    $fechaen = mysqli_real_escape_string($conn, $_POST["selectText"]);
    $query = "SELECT * FROM oc WHERE fechaentrega = '$fechaen'";
    

    $result= mysqli_query($conn, $query);  
 
    //Creamos el objecto del elemento de SimpleXML que vimos anteriormente.
    $xml = new SimpleXMLElement('<xml/>');
         
    // Sugerencia de creacion   usar filezilla solo los de fecha se van a enviar
    // añadimos el valor de cada columna del nodo de XML que vamos a crear.
        while($row = mysqli_fetch_assoc($result)) {
            $dato = $xml->addChild('dato');
            $dato->addChild('OC',$row['id_oc']);
            $dato->addChild('Proveedor',$row['proveedor']);
            $dato->addChild('Producto',$row['producto']);
            $dato->addChild('Descripcion',$row['descproducto']);
            $dato->addChild('Cantidad',$row['cantidad']);
            $dato->addChild('FechaEntrega',$row['fechaentrega']);
            $dato->addChild('Precio',$row['precio']);
        }
     
        mysqli_close($conn);
        //Creamos el archivo
        $fp = fopen($fechaen."employeeData.xml","wb");
     
        //Escribimos el XML con sus nodos
        fwrite($fp,$xml->asXML());
     
        //Close the database connection
        fclose($fp);  
  }
}


  

    // Establecer la cabecera del contenido como XML
    //header('Content-type: text/xml');

    // Leer el contenido del archivo XML
    //$xmlContent = file_get_contents('employeeData.xml');

    // Mostrar el contenido del XML
   

    //
    // incluir codigo para enviar por ftp el xml creado, revisar el archivo “FTP con PHP”
    //leer cada campo para enviar parte por parte  $query= "SELECT * from oc where fechaentrega = $fechaen;";
        



    //   Enviarlo a la carpeta Out.
    //  
 
?>
