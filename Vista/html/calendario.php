<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calendario de Eventos</title>

<!--Scripts CSS-->
<link rel="stylesheet" href="../../Utiles/librerias/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="../estructura/css/bootstrap.min.css">
<link rel="stylesheet" href="../estructura/css/datatables.min.css">
<link rel="stylesheet" href="../estructura/css/bootstrap-clockpicker.css">
<link rel="stylesheet" href="../estructura/fullcalendar/main.css">
<link rel="stylesheet" href="../estructura/css/calendar.css">
<link rel="stylesheet" href="../estructura/css/styles.css">

<!--Scripts JS-->
<script src="../estructura/js/jquery-3.6.0.min.js"></script>
<script src="../estructura/js/popper.min.js"></script>
<script src="../estructura/js/bootstrap.min.js"></script>
<!--<script src="../../Utiles/librerias/bootstrap/bootstrap.bundle.min.js"></script>-->
<script src="../estructura/js/datatables.min.js"></script>
<script src="../estructura/js/bootstrap-clockpicker.js"></script>
<script src="../estructura/js/moment-with-locales.js"></script>
<script src="../estructura/fullcalendar/main.js"></script>
<script src="../estructura/js/calendar.js"></script>

</head>
<body>

<div class="card">
  <ul class="nav nav-underline">
    <li class="nav-item">
      <a class="nav-link" href="home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="formularioCV.php">Crear CV</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="#" aria-current="page">Calendario</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../index.php">Salir</a>
    </li>
  </ul>
</div>

    <div class="container-fluid">
      <div class="title text-center">
        <h1>
          CALENDARIO WEB
        </h1>
      </div>

      <!-- Calendario -->
      <div class="row">
        <div class="calendario col-md-8 offset-md-2">
          <div id="Calendario1" style="border: 1px solid #000; padding:2px"></div>
        </div>
      </div>
    </div>

    <!-- Modal de Eventos -->
    <div class="modal fade" id="FormularioEventos" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">EVENTO</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>

          <div class="modal-body">
            <input type="hidden" id="Id">
            <div class="container-align-center">
              <div class="form-row">
                <div class="form-group col-10 offset-1">
                  <label for="">Titulo del Evento:</label>
                  <input type="text" id="Titulo" class="form-control" placeholder="Titulo del evento">
                </div>
              </div>
            </div>

          <div class="container-align-center">
            <div class="row justify-content-center">
              <div class="form-group col-5">
                <label>Fecha de inicio:</label>
                <div class="input-group" data-autoclose="true">
                  <input type="date" id="FechaInicio" value="" class="form-control">
                </div>
              </div>

              <div class="form-group col-5" id="TituloHoraInicio">
                <label>Hora de inicio:</label>
                <div class="input-group clockpicker" data-autoclose="true">
                  <input type="text" id="HoraInicio" value="" class="form-control" autocomplete="off" readonly>
                </div>
              </div>
            </div>
          </div>

          <div class="container-align-center">
            <div class="row justify-content-center">
              <div class="form-group col-5">
                <label for="">Fecha de fin:</label>
                <div class="input-group" data-autoclose="true">
                  <input type="date" id="FechaFin" class="form-control" value="">
                </div>
              </div>
              <div class="form-group col-5" id="TituloHoraFin">
                <label for="">Hora de fin:</label>
                <div class="input-group clockpicker" data-autoclose="true">
                  <input type="text" id="HoraFin" class="form-control" autocomplete="off" readonly>
                </div>
              </div>
            </div>
          </div>

          <div class="container-align-center">
            <div class="row col-10 offset-1">
              <label for="">Descripcion:</label>
              <textarea id="Descripcion" class="form-control" rows="3" placeholder="Descripcion del evento"></textarea>
            </div>
          </div>


          <div class="container-align-center">
            <div class="row">
              <div class="col-4 offset-1 text-center ">
              <label for="">Color de fondo:</label>
              <input type="color" value="#3788D8" id="ColorFondo" class="form-control" style="height:36px;width: 180px">
              </div>
              <div class="col-4 offset-1 text-center">
              <label for="">Color de texto:</label>
              <input type="color" value="#ffffff" id="ColorTexto" class="form-control" style="height:36px;width: 180px">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" id="BotonAgregar" class="btn btn-success">Agregar</button>
            <button type="button" id="BotonModificar" class="btn btn-success">Modificar</button>
            <button type="button" id="BotonBorrar" class="btn btn-success">Borrar</button>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
          </div>

        </div>
      </div>
    </div>


    <script>
    </script>


  </body>
</html>
