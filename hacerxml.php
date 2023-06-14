<?php 
require './ayuda.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f90d3bf50d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Leer XML</title>
</head>
<body>

    <header id="main-header" class="py-2 bg-info text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="fas fa-cog"></i> Crear XML</h1>
                </div>
            </div>
        </div>
    </header>
    
    <section id="xml">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Seleccione la fecha</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Fecha de entrega</label>
                                <form >
    <select id="select">
        <option value="pret" selected>Seleccione una opcion</option></select>

    
     
    <br><br>
    <input type="button" value="crear xml"class="btn btn-primary" id="Input">
    

    
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
                                </br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="pie-pagina" class="bg-warning text-white mt-5 p-5">
        <div class="container">
            <div class="col">
                <p class="lead text-center">
                    Copyright &copy; Equipo Hersheys
                </p>
            </div>
        </div>
    </footer>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>