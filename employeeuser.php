<?php 
require './ayuda.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>employeed</title>
</head>
<body>
	<form >
	<select id="select">
		<option value="pret" selected>Seleccione una opcion</option></select>

	
	 
    <br><br>
    <input type="button" value="crear xml" id="Input">
	

	
	<script>
      $(document).ready(function() {
        $('#Input').click(function() {
          var selectText = $('#select option:selected').text();
          
          $.ajax({
            type: 'POST',
            url: 'creacion_xml.php',
            data: { selectText: selectText },
            success: function(response) {
              console.log('Solicitud POST enviada correctamente.');
              // Puedes hacer algo con la respuesta del servidor aquí
            },
            error: function() {
              console.log('Error al enviar la solicitud POST.');
            }
          });
        });
      });
    </script>
    </form>
	<script type="text/javascript">
		const j = <?php print "$i"; ?>;
	    var p = 0;

	    $(function() {
	      	$.getJSON('consulta.php', function(json) {
		        for (p = 0; p < j; p++) {
		          $("#select").append('<option value="value'+p+'">' + json[p].fecha + '</option>');
		        };
		    });
		});</script>
		<form action="./conectar_fpt.php" method="POST"
	enctype="multipart/form-data">
	<input type="file" name="archivo">
	<input type="submit" value="ENVIAR">
	</form>
</body>
</html>

