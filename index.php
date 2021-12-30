<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD - PHP</title>
  <!-- Boostrap 4.0 -->  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center"">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" id="Modal">
        <!-- FORMULARIO PARA REGISTRAR PERSONAS -->
        <div class="form-group">
          <label for="completename">Nombre</label>
          <input type="text" class="form-control" id="completename" aria-describedby="emailHelp" placeholder="Ingresa tu nombre">
        </div>

        <div class="form-group">
          <label for="completeemail">Correo Electronico</label>
          <input type="text" class="form-control" id="completeemail" aria-describedby="emailHelp" placeholder="Ingresa tu correo electronico">
        </div>

        <div class="form-group">
          <label for="completemobile">Telefono</label>
          <input type="text" class="form-control" id="completemobile" aria-describedby="emailHelp" placeholder="Ingresa tu telefono">
        </div>

        <div class="form-group">
          <label for="completeplace">Puesto</label>
          <input type="text" class="form-control" id="completeplace" aria-describedby="emailHelp" placeholder="Ingresa tu puesto">
        </div>
      </div>



      <!-- Boton Formulario Agregar Usuarios -->
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" onclick="addUser()">Enviar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>


    </div>
  </div>
</div>
  
<!-- --------- Update ---------->
  <!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Detalles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- FORMULARIO PARA REGISTRAR PERSONAS -->
          
        <div class="form-group">
          <label for="updatename">Nombre</label>
          <input type="text" class="form-control" id="updatename" aria-describedby="emailHelp" placeholder="Ingresa tu nombre">
        </div>

        <div class="form-group">
          <label for="updateemail">Correo Electronico</label>
          <input type="text" class="form-control" id="updateemail" aria-describedby="emailHelp" placeholder="Ingresa tu correo electronico">
        </div>

        <div class="form-group">
          <label for="updatemobile">Telefono</label>
          <input type="text" class="form-control" id="updatemobile" aria-describedby="emailHelp" placeholder="Ingresa tu telefono">
        </div>

        <div class="form-group">
          <label for="updateplace">Puesto</label>
          <input type="text" class="form-control" id="updateplace" aria-describedby="emailHelp" placeholder="Ingresa tu puesto">
        </div>
      </div>

      <!-- Boton Formulario Agregar Usuarios -->
      <div class="modal-footer">
        <button type="button" class="btn btn-dark"  onclick="updateDetails()">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="hidden" id="hiddendata"/>
      </div>
    </div>
  </div>
</div>

  <!-- ----------Update ----------->
  <div class="container my-3">
    <h1 class="text-center">Operaciones CRUD Usando Boostrap y JQUERY</h1>
    <!-- BOTON AGREGAR PERSONAS -->
    <div class="btn-toolbar"> 
        <button type="button" class="btn btn-dark my-5 mr-3" data-toggle="modal" data-target="#completeModal">
          Agregar Usuarios
        </button>
        <button type="button" class="btn btn-success my-5 mr-3" data-toggle="modal" onclick="displayXML()">
          Mostrar XML
        </button>
        <button type="button" class="btn btn-info my-5 mr-3" data-toggle="modal"  onclick="displayJSON()" >
          Mostrar JSON
        </button>
    </div>
        <!-- Table -->
    <div id="displayDataTable" class="bg-light text-dark p-4">
      <!-- Reemplazar Datos -->
    </div>

    <div class="col text-center">
      <button type="button" class="btn btn-danger my-5 mr-3" data-toggle="modal" onclick="reload()" id ="btnB">
        Regresar 
      </button>
    </div>


  </div>
 

  <!-- Boostrap javascript -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

  <!-- Funciones JAVASCRIPT -->
  <script>
    //Mostrar datos en la tabla en tiempo real
    $(document).ready(function(){
      displayData();
      hideButton();
    });
    //Obtener datos
    function displayData(){
      let displayData = "true";
      $.ajax({
        url: 'display.php',
        type:'post',
        data:{
          displaySend: displayData
        },
        success: function(data,status){
          // JQUERY
          $('#displayDataTable').html(data);
        }
      });
    }
    // Obtener datos del formulario
    function addUser() {
      let nameAdd = $('#completename').val();
      let emailAdd = $('#completeemail').val();
      let mobileAdd = $('#completemobile').val();
      let placeAdd = $('#completeplace').val();
      //AJAX
      $.ajax({
        url:'insert.php',
        type:'post',
        data:{
          nameSend:nameAdd,
          emailSend:emailAdd,
          mobileSend:mobileAdd,
          placeSend:placeAdd
        },
        success:function(data,status){
          $('#completeModal').modal('hide');
          displayData();
        }
      });
      reload();
    }
    //Delete User
    function DeleteUser(deleteid) {
      $.ajax({
        url:'delete.php',
        type:'post',
        data:{
          deletesend:deleteid 
        },
        success:function(data,status){
          displayData();
        }
      });
    }
      //Update User
    function GetDetails(updateid){
      $('#hiddendata').val(updateid);
        $.post("update.php",{updateid:updateid},
          function(data,status){
            let userid = JSON.parse(data);
            $('#updatename').val(userid.nombre);
            $('#updateemail').val(userid.email);
            $('#updatemobile').val(userid.mobile);
            $('#updateplace').val(userid.place);
          });
        
        $('#updateModal').modal("show");
    }

    function updateDetails(){
      let updatename = $('#updatename').val();
      let updateemail = $('#updateemail').val();
      let updatemobile = $('#updatemobile').val();
      let updateplace = $('#updateplace').val();
      let hiddendata = $('#hiddendata').val();

      $.post("update.php",{
        updatename : updatename,
        updateemail : updateemail,
        updatemobile : updatemobile,
        updateplace : updateplace,
        hiddendata : hiddendata
      },
      function(data,status){
        $('#updateModal').modal('hide');
        displayData();
      });
    }

    //Mostrar JSON data
    function displayJSON(){
      // alert('Im JSON');
      let displayData = "true";
      $.ajax({
        url: 'displayJSON.php',
        type:'post',
        data:{
          displaySend: displayData
        },
        success: function(data,status){
          // JQUERY
          $('#displayDataTable').html(data);
        }
      });
      displayButton();
    }
    //Mostrar XML
    function displayXML(){
      let displayData = "true";
      $.ajax({
        url: 'displayXML.php',
        type:'post',
        data:{
          displaySend: displayData
        },
        success: function(data,status){
          // JQUERY
          $('#displayDataTable').html(data);
        }
      });
      displayButton();
    }

    function reload(){
      window.location.reload();
    }

    function hideButton(){
      $('#btnB').hide();
    }

    function displayButton(){
      $('#btnB').show();
    }

  </script>
</body>
</html>