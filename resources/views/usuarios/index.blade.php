@extends('adminlte::page')

@section('title', 'Dashboard')

 {{-- lo activamos directo al adminlte.php @section('plugins.Sweetalert2', true) --}}

@section('content_header')
@stop

@section('content')
<h5 class="text-center"><i>Administración de Usuarios</i></h5>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            @can('crear-usuario')
                            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-plus">Agregar Nuevo Usuario</i></button>
                            @endcan
                        </h4>
                    </div>
                    <table class="table table-bordered display dt-responsive nowrap" style="width:100%" id="usuario">
                        <thead style="background-color:purple">
                            <tr>
                                <th>ID</th>
                                <th><i>Usuario</i></th>
                                <th><i>E-mail</i></th>

                                <th><i>Nombre</i></th>
                                <th><i>Apellido Paterno</i></th>
                                <th><i>Apellido Materno</i></th>
                                <th><i>Fecha de Nacimiento</i></th>
                                <th><i>Telefono</i></th>
                                <th><i>Direccion</i></th>
                                <th><i>Sexo</i></th>
                                <th><i>Rol del Funcionari</i></th>
                                <th><i>Acciones</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td><i>{{ $usuario->id }}</i></td>
                                    <td><i>{{ $usuario->name }}</i></td><!-- usuario es enves de name muy aparte del nombre -->
                                    <td><i>{{ $usuario->email }}</i></td>

                                    <td><i>{{ $usuario->nombre }}</i></td>
                                    <td><i>{{ $usuario->apellido_paterno }}</i></td>
                                    <td><i>{{ $usuario->apellido_materno }}</i></td>
                                    <td><i>{{ $usuario->fecha_nacimiento }}</i></td>
                                    <td><i>{{ $usuario->telefono }}</i></td>
                                    <td><i>{{ $usuario->direccion }}</i></td>
                                    <td><i>{{ $usuario->sexo }}</i></td>

                                    <td>
                                        @if (!empty($usuario->getRoleNames()))
                                            @foreach ($usuario->getRoleNames() as $rolNombre)
                                                <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                            @endforeach
                                        @endif
                                    </td>

                                    {{-- <td>{{ $usuario->estado }}</td> --}}

                                    <td>

                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                            class="formulario-eliminar">
                                            <a class="btn btn-dark btn-move btn-sm"
                                                href="{{ route('usuarios.edit', $usuario->id) }}"><span class="fa fa-pen"></span></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark btn-move btn-sm ">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal crear inicio -->
    <div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  @if ($errors->any())
                  <div class="alert alert-dark alert-dismissible fade show" role="alert">
                  <strong>¡Revise los campos!</strong>
                      @foreach ($errors->all() as $error)
                          <span class="badge badge-danger">{{ $error }}</span>
                      @endforeach
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
              @endif

              {!! Form::open(array('route' => 'usuarios.store','method'=>'POST')) !!}
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="name">Usuario</label>
                          {!! Form::text('name', null, array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="email">E-mail</label>
                          {!! Form::text('email', null, array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="password">Password</label>
                          {!! Form::password('password', array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="confirm-password">Confirmar Password</label>
                          {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="nombre">Nombre</label>
                          {!! Form::text('nombre', null, array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="apellido_paterno">Apellido_paterno</label>
                          {!! Form::text('apellido_paterno', null, array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="apellido_materno">Apellido_materno</label>
                          {!! Form::text('apellido_materno', null, array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="fecha_nacimiento">Fecha_nacimiento</label>
                          {!! Form::date('fecha_nacimiento', null, array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="telefono">telefono</label>
                          {!! Form::text('telefono', null, array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="direccion">Direccion</label>
                          {!! Form::text('direccion', null, array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="sexo">Sexo</label>
                          <div class="form-check">
                              <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                              name="sexo" id="sexoM" value="M" {{ old( 'sexo' ) == 'M' ? 'checked' : '' }}>
                              <label for="sexoM" class="form-check-label">Masculino</label>
                          </div>
                          <div class="form-check">
                              <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                              name="sexo" id="sexoF" value="F" {{ old( 'sexo' ) == 'F' ? 'checked' : '' }}>
                              <label for="sexoF" class="form-check-label">Femenino</label>
                              @error('sexo')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label for="">Roles</label>
                          {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
              </div>
              {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop
<!-- Modal crear fin -->
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
{{-- librearias css para datatable pdf exel print obtenido de https://datatables.net/extensions/buttons/examples/initialisation/export.html inicio--}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
{{-- librearias css para datatable pdf exel print obtenido de https://datatables.net/extensions/buttons/examples/initialisation/export.html final--}}

{{-- librearias css para datatable resñponsive obtenido de https://datatables.net/extensions/fixedheader/examples/integration/responsive-bootstrap.html final--}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
{{-- librearias css para datatable resñponsive obtenido de https://datatables.net/extensions/fixedheader/examples/integration/responsive-bootstrap.html final--}}

@stop

@section('js')
<script>console.log('Hi!');</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
{{-- librearias js para datatable pdf exel print obtenido de https://datatables.net/extensions/buttons/examples/initialisation/export.html inicio--}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
{{-- librearias js para datatable pdf exel print obtenido de https://datatables.net/extensions/buttons/examples/initialisation/export.html inicio--}}

{{-- librearias js para datatable responsive obtenido de https://datatables.net/extensions/fixedheader/examples/integration/responsive-bootstrap.html inicio--}}
<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>
{{-- librearias js para datatable responsive obtenido de https://datatables.net/extensions/fixedheader/examples/integration/responsive-bootstrap.html inicio--}}

    {{-- <script>
        $(document).ready(function() {
            $('#usuario').DataTable({
              "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "ALL"]],
              "language": {
              "lengthMenu": "Mostrar _MENU_ Registros por pagina",
              "zeroRecords": "El dato no existe",
              "info": "Mostrando la pagina _PAGE_ de _PAGES_",
              "infoEmpty": "No records available",
              "infoFiltered": "(filtrado de _MAX_ registros totales)",
              "search": "Buscar",
              "paginate": {
                  'next': 'Siguiente',
                  'previous': 'Anterior'
              }
              },
              scrollY: 200,
              scrollX: true,
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#usuario').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> Exportar a Excel',
                        className: 'btn btn-success',
                        exportOptions: {
                            columns: [0,1,2] // Aquí puedes especificar las columnas que deseas exportar a Excel
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"></i> Exportar a PDF',
                        className: 'btn btn-danger',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9] // Aquí puedes especificar las columnas que deseas exportar a PDF
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Imprimir',
                        className: 'btn btn-secondary',
                        exportOptions: {
                            columns: [0,1,2] // Aquí puedes especificar las columnas que deseas imprimir
                        }
                    }
                ]
            } );
        } );
    </script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'El Usuario se elimino con exito.',
                'success'
            )
        </script>
    @endif
    <script>
        $(' .formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Seguro que desea eliminar?',
                text: "El usuario sera !ELIMINADO¡ definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'Cancelar!'
            }).then((result) => {
                if (result.value) {
                    //Swal.fire(
                    //  'Deleted!',
                    //  'Your file has been deleted.',
                    //  'success'
                    //)
                    this.submit();
                }
            })
        });
    </script>
@stop
