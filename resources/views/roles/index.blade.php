@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h3>Gestion de Recursos</h3> --}}
@stop

@section('content')
<h3 class="text-center">Gestion de Roles</h3>
{{-- Add Modal --}}
<div class="modal fade" id="AddRolModal" tabindex="-1" aria-labelledby="AddRolModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddRolModalLabel">Agregar Nuevo Rol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>

                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="text" required class="name form-control" placeholder="name@example.com">
                        <label for=""><i class="fas fa-user-shield"> Introdusca el Nombre del Rol</i></label>
                    </div>
                    <div class="form-group">
                        <label for="">Permisos para este Rol:</label>
                        <br/>
                        @php $count = 0; @endphp
                        @foreach($permission as $value)
                        @if($count % 4 == 0)
                            <div class="row">
                            @endif
                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                </div>
                            </div>
                            @php $count++; @endphp
                            @if($count % 4 == 0 || $loop->last)
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success add_rol">Guardar Empresa</button>
            </div>

        </div>
    </div>
</div>
{{-- End add modal --}}

{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="empre_id" />

                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="nombre" required class="form-control">
                        <label for=""><i class="fas fa-building"> Nombre</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="descripcion" required class="form-control">
                        <label for=""><i class="fas fa-file-alt"> Descripción</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="sigla" required class="form-control">
                        <label for=""><i class="fas fa-tasks"> Sigla</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="email" id="email" required class="form-control">
                        <label for=""><i class="fas fa-envelope"> Correo Electrónico</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="telefono" required class="form-control">
                        <label for=""><i class="fas fa-phone"> Telefono</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="direccion" required class="form-control">
                        <label for=""><i class="fas fa-map-marker-alt"> Direccion</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="direccion_web" required class="form-control">
                        <label for=""><i class="fas fa-globe"> Dirección Web</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="text" id="nit" required class="form-control">
                        <label for=""><i class="fas fa-id-card"> Nit</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <select id="estado" required class="form-control" aria-label="Default select example">
                            <option value="">-- Escoja el Estado --</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                        <label for=""><i class="fas fa-info-circle"> Estado</i></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success update_empresa">Actualizar el Registro Empresa</button>
            </div>

        </div>
    </div>
</div>
{{-- Edn- Edit Modal --}}


{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar el Registro Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirme si Desea Eliminar el Registro ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary delete_empresa">Si Eliminar</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

{{-- Tabla index2 recursos --}}
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        @can('crear-recurso')
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                            data-bs-target="#AddRolModal"><i class="fas fa-plus">Agragar Nuevo Rol</i></button>
                        @endcan

                    </h4>
                </div>
                <div class="card-body">
                    <table id="tabla-roles" class="table table-bordered display dt-responsive nowrap" style="width:100%">
                        <thead style="background-color:purple">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Tabla index2 final --}}

@stop



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

    <style>
        .modal-header{
            background: purple;
            text-align: center;
        }
    </style>
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

    <script>

        $(document).ready(function () {

            fetchRol();
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

            function fetchRol() {
                // destruir datatable proyectos
                if ($.fn.DataTable.isDataTable('#tabla-roles')) {
                    $('#tabla-roles').DataTable().destroy();
                }
                // destruir datatable proyectos
                $.ajax({
                    type: "GET",
                    url: "/fetch-roles",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.roles, function (key, item) {
                            $('tbody').append('<tr>\
                                <td>' + item.id + '</td>\
                                <td>' + item.name + '</td>\
                                <td>@can('editar-role')<button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm"><i class="fas fa-pen"></i></button>@endcan @can('eliminar-role')<button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm"><i class="fas fa-trash"></i></button>@endcan</td>\
                            \</tr>');
                        });
                        //despues de iterar la tabla se inicializa el datatable
                        ////////////////
                        $(document).ready(function() {
                                $('#tabla-roles').DataTable( {
                                    dom: 'Bfrtip',
                                    buttons: [
                                        {
                                            extend: 'excel',
                                            text: '<i class="fas fa-file-excel"></i> Exportar a Excel',
                                            className: 'btn btn-success',
                                            exportOptions: {
                                                columns: [0,1] // Aquí puedes especificar las columnas que deseas exportar a Excel
                                            }
                                        },
                                        {
                                            extend: 'pdf',
                                            text: '<i class="fas fa-file-pdf"></i> Exportar a PDF',
                                            className: 'btn btn-danger',
                                            exportOptions: {
                                                columns: [0,1] // Aquí puedes especificar las columnas que deseas exportar a PDF
                                            }
                                        },
                                        {
                                            extend: 'print',
                                            text: '<i class="fas fa-print"></i> Imprimir',
                                            className: 'btn btn-secondary',
                                            exportOptions: {
                                                columns: [0,1] // Aquí puedes especificar las columnas que deseas imprimir
                                            }
                                        }
                                    ]
                                } );
                        });
                            ////////////////
                            //despues de iterar la tabla se inicializa el datatable
                    }
                });
            }

            $(document).on('click', '.add_rol', function (e) {
                e.preventDefault();

                $(this).text('Sending..');
                var data = {
                    'name': $('.name').val(),
                    'permission': [],
                }

                $('.name:checked').each(function(){
                    data.permission.push($(this).val());
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/roles",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_rol').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddRolModal').find('input').val('');
                            $('.add_rol').text('Save');
                            $('#AddRolModal').modal('hide');
                            fetchRol();
                            toastr.success('La Empresa se Creo Exitosamente','Success');
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var empre_id = $(this).val();
                // alert(empre_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-empresa/" + empre_id,
                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            // console.log(response.student.name);
                            $('#nombre').val(response.empresa.nombre);
                            $('#descripcion').val(response.empresa.descripcion);
                            $('#sigla').val(response.empresa.sigla);
                            $('#email').val(response.empresa.email);
                            $('#telefono').val(response.empresa.telefono);
                            $('#direccion').val(response.empresa.direccion);
                            $('#direccion_web').val(response.empresa.direccion_web);
                            $('#nit').val(response.empresa.nit);
                            $('#estado').val(response.empresa.estado);
                            $('#empre_id').val(empre_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_empresa', function (e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#empre_id').val();
                // alert(id);

                var data = {
                    'nombre': $('#nombre').val(),
                    'descripcion': $('#descripcion').val(),
                    'sigla': $('#sigla').val(),
                    'email': $('#email').val(),
                    'telefono': $('#telefono').val(),
                    'direccion': $('#direccion').val(),
                    'direccion_web': $('#direccion_web').val(),
                    'nit': $('#nit').val(),
                    'estado': $('#estado').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-empresa/" + id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#update_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.update_empresa').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_empresa').text('Update');
                            $('#editModal').modal('hide');
                            fetchRol();
                            toastr.success('El Registro se Actualizo Exitosamente','Success');
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function () {
                var empre_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(empre_id);
            });

            $(document).on('click', '.delete_empresa', function (e) {
                e.preventDefault();

                $(this).text('Eliminando..');
                var id = $('#deleteing_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/delete-empresa/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_empresa').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_empresa').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchRol();
                            toastr.success('El Registro se Elimino exitosamente','Success');
                        }
                    }
                });
            });

        });

    </script>

@stop








{{-- @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        @can('crear-rol')
                        <a class="btn btn-success" href="{{ route('roles.create') }}">Nuevo</a>
                        @endcan


                            <table class="table table-striped mt-2">
                                <thead style="background-color:#e03737f6">
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('editar-rol')
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                        @endcan

                                        @can('borrar-rol')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}
