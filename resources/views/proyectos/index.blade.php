@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>Gestion de Proyectos</h3>
@stop

@section('content')
    {{-- Add Modal --}}
    <div class="modal fade" id="AddProyectoModal" tabindex="-1" aria-labelledby="AddProyectoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddProyectoModalLabel">Agregar Proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <input type="text" required class="nombre form-control" placeholder="name@example.com">
                            <label for=""><i class="fas fa-address-card"> Nombre</i></label>
                        </div>
                        <div class="col-md form-floating mb-3">
                            <input type="text" required class="descripcion form-control" placeholder="name@example.com">
                            <label for=""><i class="fas fa-book"> Descripción</i></label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <select class="id_comunidad form-control">
                                <option value="">-- Escoja la Comunidad --</option>
                                @foreach ($comunidads as $comunidad)
                                    <option value="{{ $comunidad['id'] }}">{{ $comunidad['nombre'] }}</option>
                                @endforeach
                            </select>
                            <label for=""><i class="fas fa-tree">Comunidad</i></label>
                        </div>
                        <div class="col-md form-floating mb-3">
                            <select class="id_recurso form-control">
                                <option value="">-- Escoja el recurso --</option>
                                @foreach ($recursos as $recurso)
                                    <option value="{{ $recurso['id'] }}">{{ $recurso['nombre'] }}</option>
                                @endforeach
                            </select>
                            <label for=""><i class="fas fa-coins">Recurso</i></label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <select class="id_empresa form-control">
                                <option value="">-- Escoja la empresa --</option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa['id'] }}">{{ $empresa['nombre'] }}</option>
                                @endforeach
                            </select>
                            <label for=""><i class="fas fa-building">Empresa</i></label>
                        </div>
                        <div class="col-md form-floating mb-3">
                            <select class="id_categoria form-control">
                                <option value="">-- Escoja la categoria --</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}
                                    </option>
                                @endforeach
                            </select>
                            <label for=""><i class="fas fa-tag">Categoria</i></label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <input type="date" required class="fecha_inicio form-control" placeholder="name@example.com">
                            <label for=""><i class="fas fa-hourglass-start"> Fecha Inicio</i></label>
                        </div>
                        <div class="col-md form-floating mb-3">
                            <input type="date" required class="fecha_final form-control" placeholder="name@example.com">
                            <label for=""><i class="fas fa-hourglass-end"> Fecha Final</i></label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <select class="estado form-control" aria-label="Default select example">
                                <option value="">-- Escoja el Estado --</option>
                                <option value="desarrollo">Desarrollo</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="concluido">Concluido</option>
                            </select>
                            <label for=""><i class="fas fa-info-circle"> Estado</i></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success add_proyecto">Guardar Proyecto</button>
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
                    <h5 class="modal-title" id="editModalLabel">Editar Recuros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="update_msgList"></ul>

                    <input type="hidden" id="proye_id" />

                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <input type="text" id="nombre" required class="form-control">
                            <label for=""><i class="fas fa-address-card"> Nombre</i></label>
                        </div>
                        <div class="col-md form-floating mb-3">
                            <input type="text" id="descripcion" required class="form-control">
                            <label for=""><i class="fas fa-book"> Descripción</i></label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <select id="id_comunidad" class="form-control">
                                <option value="">-- Escoja la Comunidad --</option>
                                @foreach ($comunidads as $comunidad)
                                    <option value="{{ $comunidad['id'] }}">{{ $comunidad['nombre'] }}</option>
                                @endforeach
                            </select>
                            <label for=""><i class="fas fa-tree">Comunidad</i></label>
                        </div>
                        <div class="col-md form-floating mb-3">
                            <select id="id_recurso" class="form-control">
                                <option value="">-- Escoja el recurso --</option>
                                @foreach ($recursos as $recurso)
                                    <option value="{{ $recurso['id'] }}">{{ $recurso['nombre'] }}</option>
                                @endforeach
                            </select>
                            <label for=""><i class="fas fa-coins">Recurso</i></label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <select id="id_empresa" class="form-control">
                                <option value="">-- Escoja la empresa --</option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa['id'] }}">{{ $empresa['nombre'] }}</option>
                                @endforeach
                            </select>
                            <label for=""><i class="fas fa-building">Empresa</i></label>
                        </div>
                        <div class="col-md form-floating mb-3">
                            <select id="id_categoria" class="form-control">
                                <option value="">-- Escoja la categoria --</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}
                                    </option>
                                @endforeach
                            </select>
                            <label for=""><i class="fas fa-tag">Categoria</i></label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <input type="date" id="fecha_inicio" required class="form-control" placeholder="name@example.com">
                            <label for=""><i class="fas fa-hourglass-start"> Fecha Inicio</i></label>
                        </div>
                        <div class="col-md form-floating mb-3">
                            <input type="date" id="fecha_final" required class="form-control" placeholder="name@example.com">
                            <label for=""><i class="fas fa-hourglass-end"> Fecha Final</i></label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md form-floating mb-3">
                            <select id="estado" class="form-control" aria-label="Default select example">
                                <option value="">-- Escoja el Estado --</option>
                                <option value="desarrollo">Desarrollo</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="concluido">Concluido</option>
                            </select>
                            <label for=""><i class="fas fa-info-circle"> Estado</i></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary update_proyecto">Actualizar</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirme si quiere eliminar el registro ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_proyecto">Yes Delete</button>
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
                                    data-bs-target="#AddProyectoModal"><i class="fas fa-plus">Agragar Proyecto</i></button>
                            @endcan

                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered display dt-responsive nowrap" style="width:100%" id="tabla-proyectos">
                            <thead style="background-color:purple">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Comunidad</th>
                                    <th>Recurso</th>
                                    <th>Empresa</th>
                                    <th>Categoria</th>
                                    <th>Inicio</th>
                                    <th>Final</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
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
        $(document).ready(function() {

            fetchProyecto();
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

            function fetchProyecto() {

                // destruir datatable proyectos
                if ($.fn.DataTable.isDataTable('#tabla-proyectos')) {
                    $('#tabla-proyectos').DataTable().destroy();
                }
                // destruir datatable proyectos


                $.ajax({
                    type: "GET",
                    url: "/fetch-proyectos",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.proyectos, function(key, item) {
                            var estado = '';
                            if (item.estado == 'desarrollo') {
                            estado = '<button type="button" class="btn btn-warning text-center" style="width: 80px; height: 30px; line-height: 15px; padding: 5px 0; border-radius: 10px;">Desarrollo</button>';
                            } else if (item.estado == 'pendiente') {
                            estado = '<button type="button" class="btn btn-danger text-center" style="width: 80px; height: 30px; line-height: 15px; padding: 5px 0; border-radius: 10px;">Pendiente</button>';
                            } else if (item.estado == 'concluido') {
                            estado = '<button type="button" class="btn btn-success text-center" style="width: 80px; height: 30px; line-height: 15px; padding: 5px 0; border-radius: 10px;">Concluido</button>';
                            }

                            $('tbody').append('<tr>\
                                                    <td>' + (item.id || '') + '</td>\
                                                    <td>' + (item.nombre || '') + '</td>\
                                                    <td>' + (item.descripcion || '') + '</td>\
                                                    <td>' + (item.comunidads.nombre || '') + '</td>\
                                                    <td>' + (item.recursos.nombre || '') + '</td>\
                                                    <td>' + (item.empresas.nombre || '') + '</td>\
                                                    <td>' + (item.categorias.nombre || '') + '</td>\
                                                    <td>' + (item.fecha_inicio || '') + '</td>\
                                                    <td>' + (item.fecha_final || '') + '</td>\
                                                    <td>' + (estado || '') + '</td>\
                                                    <td>@can('editar-proyecto')<button type="button" value="' + item.id + '" class="btn btn-success editbtn btn-sm"><i class="fas fa-pen"></i></button>@endcan @can('eliminar-proyecto')<button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm"><i class="fas fa-trash"></i></button>@endcan <a href="{{ url('proyectos') }}/' + item.id + '" class="btn btn-warning btn-sm"><i class="fas fa-chart-line"></i>  </a> </td>\
                                                \</tr>');
                        });

                        //despues de iterar la tabla se inicializa el datatable
                        ////////////////
                        $(document).ready(function() {
                            $('#tabla-proyectos').DataTable( {
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
                        ////////////////
                        //despues de iterar la tabla se inicializa el datatable
                    }
                });
            }

            $(document).on('click', '.add_proyecto', function(e) {
                e.preventDefault();

                $(this).text('Sending..');

                var data = {
                    'nombre': $('.nombre').val(),
                    'descripcion': $('.descripcion').val(),
                    'id_comunidad': $('.id_comunidad').val(),
                    'id_recurso': $('.id_recurso').val(),
                    'id_empresa': $('.id_empresa').val(),
                    'id_categoria': $('.id_categoria').val(),
                    'fecha_inicio': $('.fecha_inicio').val(),
                    'fecha_final': $('.fecha_final').val(),
                    'estado': $('.estado').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/proyectos",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_proyecto').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddProyectoModal').find('input').val('');
                            $('.add_proyecto').text('Save');
                            $('#AddProyectoModal').modal('hide');
                            fetchProyecto();
                            toastr.success('La Empresa se Creo Exitosamente', 'Success');
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function(e) {
                e.preventDefault();
                var proye_id = $(this).val();
                // alert(proye_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-proyecto/" + proye_id,
                    success: function(response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {


                            console.log(response.proyecto);
                            $('#nombre').val(response.proyecto.nombre);
                            $('#descripcion').val(response.proyecto.descripcion);
                            $('#id_comunidad').val(response.proyecto.id_comunidad).trigger(
                                'change');
                            $('#id_recurso').val(response.proyecto.id_recurso).trigger(
                                'change');
                            $('#id_empresa').val(response.proyecto.id_empresa).trigger(
                                'change');
                            $('#id_categoria').val(response.proyecto.id_categoria).trigger(
                                'change');
                            $('#fecha_inicio').val(formatearFecha(response.proyecto
                                .fecha_inicio));
                            $('#fecha_final').val(formatearFecha(response.proyecto
                                .fecha_final));
                            $('#estado').val(response.proyecto.estado);
                            $('#proye_id').val(proye_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_proyecto', function(e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#proye_id').val();
                // alert(id);

                var data = {
                    'nombre': $('#nombre').val(),
                    'descripcion': $('#descripcion').val(),
                    'id_comunidad': $('#id_comunidad').val(),
                    'id_recurso': $('#id_recurso').val(),
                    'id_empresa': $('#id_empresa').val(),
                    'id_categoria': $('#id_categoria').val(),
                    'fecha_inicio': $('#fecha_inicio').val(),
                    'fecha_final': $('#fecha_final').val(),
                    'estado': $('#estado').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-proyecto/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_value) {
                                $('#update_msgList').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.update_proyecto').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_proyecto').text('Update');
                            $('#editModal').modal('hide');
                            fetchProyecto();
                            toastr.success('El Registro se Actualizo Exitosamente', 'Success');
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function() {
                var proye_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(proye_id);
            });

            $(document).on('click', '.delete_proyecto', function(e) {
                e.preventDefault();

                $(this).text('Deleting..');
                var id = $('#deleteing_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/delete-proyecto/" + id,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_proyecto').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_proyecto').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchProyecto();
                            toastr.success('El Registro se Elimino exitosamente', 'Success');
                        }
                    }
                });
            });

        });

        function formatearFecha(fecha) {

            if (!fecha) {

                console.log('No hay fecha');
                return null;

            }
            let fecha1 = fecha.split(' ');
            return fecha1[0];

        }
    </script>

@stop
