  <!-- Control Sidebar -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
            <ol class="breadcrumb float-sm-right">
              <li class="btn btn-primary breadcrumb-item">Alta de usuario</li>
              <li class="breadcrumb-item"><a href="inicio">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Administración de usuarios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="usuarios" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Último login</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        //relacion entre campos
                        $item = null;
                        $valor = null;

                        $usuarios = ControladorUsuario::ctrMostrarUsuarios($item, $valor);
                        //muestrame todos los id
                        foreach($usuarios as $key => $value){
                            echo'
                                <tr>
                                    <tfoot>
                                        <td>'.($key+1).'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td>'.$value["usuario"].'</td>
                                        <td>'.$value["email"].'</td>
                                        <td>'.$value["perfil"].'</td>';
                                    //condicion de las fotos
                                    if($value["foto"] != ""){
                                        echo'<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                                    }else{
                                        echo '<td><img src="vistas/dist/img/wtf.jpg"></td>';
                                    }
                                    //condiciones de status
                                    if($value["estado"] != 0){
                                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                                    }else{
                                        echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                                    }
                            echo'   <td>'.$value["ultimo_login"].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="fas fa-recycle"></i></button>
                                        </div>
                                    </td>
                                    </tfoot>
                                </tr>
                            ';
                        }
                        
                    ?>
                  <tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      <!-- /.container-fluid -->
    </section>
  </div>

  <script>
  $(function () {
    $("#usuarios").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#usuarios_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>